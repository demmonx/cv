<?php

namespace App\Controller\Back\User;

use App\Entity\User;
use App\Entity\Translation;
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
        $lang = $this->get('session')->get('lang');
        $translationRepo = $this->getDoctrine()->getRepository(Translation::class);
        $label = $translationRepo->findOneBy(['lang' => $lang, 'key' => 'job-title'])->getValue();
        $user = $this->getUser();
        $user->setJobLabel($label);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            // Update the translation for job title
            $transRepo = $this->getDoctrine()->getRepository(Translation::class);
            $trans = $transRepo->findOneBy(['lang' => $lang, 'key' => 'job-title']);
            $trans->setValue($form->get('jobLabel')->getData());
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', "Your account has been successfully edited");
            return $this->redirectToRoute('admin.user.details.index');
        }

        return $this->render('back/user/details/index.html.twig', [
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ]);
        
    }

    public function printJobTitle()
    {
        $lang = $this->get('session')->get('lang');
        $translationRepo = $this->getDoctrine()->getRepository(Translation::class);
        $label = $translationRepo->findOneBy(['lang' => $lang, 'key' => 'job-title'])->getValue();
        return new Response($label);
        
    }



}
