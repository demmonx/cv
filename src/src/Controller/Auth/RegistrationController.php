<?php

namespace App\Controller\Auth;

use App\Entity\User;
use App\Entity\Translation;
use App\Entity\Lang;
use App\Form\Auth\RegistrationForm;
use App\Security\Authenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/install", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, Authenticator $authenticator): Response
    {
        $users = $this->getDoctrine()
        ->getRepository(User::class)
        ->createQueryBuilder('a')
        ->select('count(a.id)')
        ->getQuery()
        ->getSingleScalarResult();

        if ($users > 0) {
            return $this->redirectToRoute('homepage'); 
        }
        $user = new User();
        $form = $this->createForm(RegistrationForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);

            // Create the translation for job title
            $langRepo = $this->getDoctrine()->getRepository(Lang::class);
            $lang = $langRepo->findOneBy(['locale' => 'en']);
            $trans = new Translation();
            $trans->setKey("job-title");
            $trans->setLang($lang);
            $trans->setValue($form->get('jobLabel')->getData());
            $entityManager->persist($trans);

            // Store data
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        } 


        return $this->render('auth/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
