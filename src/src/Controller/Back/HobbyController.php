<?php

namespace App\Controller\Back;

use App\Entity\Hobby;
use App\Form\Back\HobbyType;
use App\Repository\HobbyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hobby", name="admin.hobby.")
 */
class HobbyController extends AbstractController
{
/**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(HobbyRepository $hobbyRepository): Response
    {
        return $this->render('back/hobby/index.html.twig', [
            'hobbies' => $hobbyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        $hobby = new Hobby();
        $form = $this->createForm(HobbyType::class, $hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hobby);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.hobby.index');
        }

        return $this->render('back/hobby/add.html.twig', [
            'hobby' => $hobby,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Hobby $hobby): Response
    {
        return $this->render('back/hobby/show.html.twig', [
            'hobby' => $hobby,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Hobby $hobby): Response
    {
        $form = $this->createForm(HobbyType::class, $hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.hobby.index');
        }

        return $this->render('back/hobby/edit.html.twig', [
            'hobby' => $hobby,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Hobby $hobby): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hobby->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hobby);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.hobby.index');
    }
}
