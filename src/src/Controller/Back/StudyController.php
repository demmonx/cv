<?php

namespace App\Controller\Back;

use App\Entity\Study;
use App\Form\Back\StudyType;
use App\Entity\Lang;
use App\Repository\StudyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/study", name="admin.study.")
 */
class StudyController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(StudyRepository $studyRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/study/index.html.twig', [
            'studies' => $studyRepository->findBy(["lang" => $lang], ["endDate" => "DESC"])
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
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        $study = new Study();
        $form = $this->createForm(StudyType::class, $study);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $this->validForm($form)) {

            $entityManager = $this->getDoctrine()->getManager();
            $lang = $this->get('session')->get('lang');
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());

            $study->setLang($lang);
            $entityManager->persist($study);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.study.index');
        }

        return $this->render('back/study/add.html.twig', [
            'study' => $study,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Study $study): Response
    {
        return $this->render('back/study/show.html.twig', [
            'study' => $study,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Study $study): Response
    {
        $form = $this->createForm(StudyType::class, $study);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $this->validForm($form)) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.study.index');
        }

        return $this->render('back/study/edit.html.twig', [
            'study' => $study,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Study $study): Response
    {
        if ($this->isCsrfTokenValid('delete' . $study->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($study);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.study.index');
    }
}
