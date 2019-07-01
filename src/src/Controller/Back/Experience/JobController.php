<?php

namespace App\Controller\Back\Experience;

use App\Entity\Job;
use App\Entity\Lang;
use App\Form\Back\Experience\JobType;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

/**
 * @Route("/experience/job", name="admin.experience.job.")
 */
class JobController extends AbstractExperienceController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(JobRepository $jobRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/experience/job/index.html.twig', [
            'jobs' => $jobRepository->findBy(["lang" => $lang], ["startDate" => "DESC"])
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function add(Request $request): Response
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang = $this->get('session')->get('lang');
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());
            $job->setLang($lang);
            $entityManager->persist($job);
            $entityManager->flush();

            $technos = $form->get('technos')->getData();
            if (!empty($technos) && strlen($technos) > 2) {
                $job = $this->sync($job, $technos, $entityManager, [
                    "src" => "App\Entity\Job",
                    "dest" => "App\Entity\Technology",
                    "join" => "App\Entity\JobTechnology"]);
            }

            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.experience.job.index');
        }

        return $this->render('back/experience/job/add.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
    }

    protected function setJoinValues($object, $joinItem, $otherItem): Object {
        $joinItem->setJob($object);
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
    public function show(Job $job): Response
    {
        return $this->render('back/experience/job/show.html.twig', [
            'job' => $job,
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
        return $joinRepo->findOneBy(["job" => $object, "technology" => $key]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Job $job): Response
    {
        # Generate data to fill the form
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([new DateTimeNormalizer("Y-m-d"), $normalizer]);
        $data = $serializer->normalize($job, null, ['skip_null_values' => true, 'ignored_attributes' => ['technos', 'lang']]);

        # Obtain technos
        $technos = [];
        foreach($job->getTechnos() as $k => $v) {
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

        $form = $this->createForm(JobType::class, $job, ["data" => $data]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {
            if (empty($form->get('enabled')->getData())) {
                $job->setEnabled(false);
            }
            if (empty($form->get('schoolProject')->getData())) {
                $job->setInternship(false);
            }
            $this->getDoctrine()->getManager()->flush();

            // Update technos
            $technos = $form->get('technos')->getData();
            if (!empty($technos) && strlen($technos) > 2) {
                $this->sync($job, $technos, $this->getDoctrine()->getManager(), [
                    "src" => "App\Entity\Job",
                    "dest" => "App\Entity\Technology",
                    "join" => "App\Entity\JobTechnology"]);
            }

            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.experience.job.index');
        }

        return $this->render('back/experience/job/edit.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Job $job): Response
    {
        if ($this->isCsrfTokenValid('delete' . $job->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($job);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.experience.job.index');
    }
}
