<?php

namespace App\Controller\Back\Experience;

use App\Entity\Project;
use App\Form\Back\Experience\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/experience/project", name="admin.experience.project.")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/experience/project/index.html.twig', [
            'projects' => $projectRepository->findBy(["lang" => $lang])
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function add(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {
                $entityManager = $this->getDoctrine()->getManager();
                $lang = $this->get('session')->get('lang');
                $project->setLang($lang);
                $entityManager->merge($project);
                $entityManager->flush();
                $this->addFlash('success', "Item has been successfully added");
                return $this->redirectToRoute('admin.experience.project.index');
        }

        return $this->render('back/experience/project/add.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
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

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Project $project): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $this->validForm($form)) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.exeperience.project.index');
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

        return $this->redirectToRoute('admin.exeperience.project.index');
    }
}
