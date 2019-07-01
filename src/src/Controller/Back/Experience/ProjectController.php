<?php

namespace App\Controller\Back\Experience;

use App\Entity\Project;
use App\Entity\Lang;
use App\Form\Back\Experience\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

/**
 * @Route("/experience/project", name="admin.experience.project.")
 */
class ProjectController extends AbstractExperienceController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/experience/project/index.html.twig', [
            'projects' => $projectRepository->findBy(["lang" => $lang], ["startDate" => "DESC", "endDate" => "DESC"])
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function add(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang = $this->get('session')->get('lang');
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());
            $project->setLang($lang);
            $entityManager->persist($project);
            $entityManager->flush();

            $technos = $form->get('technos')->getData();
            if (!empty($technos) && strlen($technos) > 2) {
                $project = $this->sync($project, $technos, $entityManager, [
                    "src" => "App\Entity\Project",
                    "dest" => "App\Entity\Technology",
                    "join" => "App\Entity\ProjectTechnology"]);
            }

            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.experience.project.index');
        }

        return $this->render('back/experience/project/add.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    protected function setJoinValues($object, $joinItem, $otherItem): Object {
        $joinItem->setProject($object);
        $joinItem->setTechnology($otherItem);
        return $joinItem;
    }

    protected function setValue($item, $key, $value) : Object {
        $item->setSlug($key);
        $item->setName($value);
        return $item;
    }
    

    private function validForm($form)
    {
        // Check constraint on end date and current value
        if (empty($form->get('endDate')->getData()) && !$form->get('current')->getData()) {
            $this->addFlash('error', "End date must be set or current should be selected");
            return false;
        }
        if (!empty($form->get('endDate')->getData()) && $form->get('current')->getData()) {
            $this->addFlash('error', "End date and current couldn't be set at the same time");
            return false;
        }
        return true;
    }

    /**
     * @Route("/show/{id}", name="show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Project $project): Response
    {
        return $this->render('back/experience/project/show.html.twig', [
            'project' => $project,
        ]);
    }

    protected function getCurrentValues($object, $em, $joinRepo) : array {
        $data = [];
        foreach ( $object->getTechnos() as $val) {
            $data[$val->getTechnology()->getSlug()] = $val->getTechnology()->getName(); 
        }
        return $data;    
    }

    protected function getValue($object, $key, $joinRepo) : Object {
        return $joinRepo->findOneBy(["project" => $object, "technology" => $key]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Project $project): Response
    {
        # Generate data to fill the form
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([new DateTimeNormalizer("Y-m-d"), $normalizer]);
        $data = $serializer->normalize($project, null, ['skip_null_values' => true, 'ignored_attributes' => ['technos', 'lang']]);

        # Obtain technos
        $technos = [];
        foreach($project->getTechnos() as $k => $v) {
            $technos[$v->getTechnology()->getSlug()] = $v->getTechnology()->getName();
        }
        $technos = ["technos" => implode (",", $technos )];

        # Create form with data
        foreach($data as $k => $v) {
            $date = \DateTime::createFromFormat('Y-m-d', $v);
            if ($date) {
                $data[$k] = $date;
            }
        }
        $data = array_merge($data, $technos);

        $form = $this->createForm(ProjectType::class, $project, ["data" => $data]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {
            if (empty($form->get('enabled')->getData())) {
                $project->setEnabled(false);
            }
            if (empty($form->get('schoolProject')->getData())) {
                $project->setSchoolProject(false);
            }

            $this->getDoctrine()->getManager()->flush();

            // Update technos
            $technos = $form->get('technos')->getData();
            if (!empty($technos) && strlen($technos) > 2) {
                $project = $this->sync($project, $technos, $this->getDoctrine()->getManager(), [
                    "src" => "App\Entity\Project",
                    "dest" => "App\Entity\Technology",
                    "join" => "App\Entity\ProjectTechnology"]);
            }

            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.experience.project.index');
        }

        return $this->render('back/experience/project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Project $project): Response
    {
        if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.experience.project.index');
    }
}
