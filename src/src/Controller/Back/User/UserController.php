<?php

namespace App\Controller\Back\User;

use App\Entity\User;
use App\Form\Back\User\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/details", name="admin.user.details.")
 */
class UserController extends AbstractController
{
   /**
     * @Route("/", name="index", methods={"GET", "POST"})
     */
    public function index(Request $request): Response
    {

        $form = $this->createForm(UserType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Your account has been successfully edited");
            return $this->redirectToRoute('admin.user.details.index');
        }

        return $this->render('back/user/details/index.html.twig', [
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ]);
        
    }



}
