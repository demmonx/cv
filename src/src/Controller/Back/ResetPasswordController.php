<?php
namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Auth\ResetPasswordForm;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ResetPasswordController extends AbstractController
{
    /**
     * @Route("/password/reset", name="admin.password.reset")
     */
    public function edit(Request $request,  UserPasswordEncoderInterface $passwordEncoder)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
    	$form = $this->createForm(ResetPasswordForm::class, $user);

    	$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $oldPassword = $request->request->get('reset_password_form')['oldPassword'];
            $newPassword = $request->request->get('reset_password_form')['plainPassword']['first'];

            // Si l'ancien mot de passe est bon
            if ($passwordEncoder->isPasswordValid($user, $oldPassword)) {
                $newEncodedPassword = $passwordEncoder->encodePassword($user, $newPassword);
                $user->setPassword($newEncodedPassword);
                
                $em->persist($user);
                $em->flush();

                $this->addFlash('notice', "Your password has been successfully updated !");

                return $this->redirectToRoute('admin.index');
            } else {
                $this->addFlash('error', "Current password doesn't match");
            }
        }
    	
    	return $this->render('back/user/edit_password.html.twig', array(
    		'form' => $form->createView(),
    	));
    }

}