<?php

namespace App\Controller\Back\User;

use App\Entity\Social;
use App\Form\Back\User\SocialType;
use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/social", name="admin.user.social.")
 */
class SocialController extends AbstractController
{

    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(SocialRepository $socialRepository): Response
    {
        return $this->render('back/user/social/index.html.twig', [
            'socials' => $socialRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {

        // Remove already added socials
        $choices = Social::$choices;
        $repo = $this->getDoctrine()->getRepository(Social::class);
        $socials = $repo->findAll();
        $values = $choices;
        foreach ($socials as $social) {
            $val = $social->getName();
            unset($values[array_search($val, $values)]);
        }
        

        $social = new Social();
        $form = $this->createForm(SocialType::class, $social, ['choices' => $values]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($social);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.user.social.index');
        }

        return $this->render('back/user/social/add.html.twig', [
            'social' => $social,
            'form' => $form->createView(),
            'choices' => $choices,
            'values' => $values,
        ]);
    }


    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Social $social): Response
    {
        $choices = Social::$choices;
        $value = $social->getName();

        $choice[array_search($value, $choices)] = $value;

        $form = $this->createForm(SocialType::class, $social, ['choices' => $choice]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.user.social.index');
        }

        return $this->render('back/user/social/edit.html.twig', [
            'social' => $social,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Social $social): Response
    {
        if ($this->isCsrfTokenValid('delete'.$social->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($social);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.user.social.index');
    }
}
