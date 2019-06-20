<?php

namespace App\Controller\Back;

use App\Entity\Homepage;
use App\Form\Back\HomepageType;
use App\Entity\Lang;

use App\Repository\HomepageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/homepage", name="admin.homepage.")
 */
class HomepageController extends AbstractController
{
    /**
     * @Route("/index", name="index", methods={"GET", "POST"})
     */
    public function index(HomepageRepository $homepageRepository, Request $request): Response
    {
        $lang = $this->get('session')->get('lang');

        // Get the last revision
        $results = $homepageRepository->findBy(["lang" => $lang],['timestamp'=>'DESC']);
        $homepage = null;
        if (count($results) > 0) {
            $homepage = $results[0];
        } else {
            $homepage = new Homepage();
        }

        $form = $this->createForm(HomepageType::class, $homepage);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            // Create new object
            $em = $this->getDoctrine()->getManager();
            $em->detach($homepage);
            $homepage = new Homepage();

            // Set the values
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());
            $homepage->setLang($lang);
            $homepage->setContent($form->get('content')->getData());

            // Store the entity
            $em->persist($homepage);
            $em->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.homepage.index');
        }

        return $this->render('back/homepage/index.html.twig', [
            'pages' => $results,
            'current_revision' => $homepage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/revert/{id}", name="revert", methods={"DELETE"})
     */
    public function revert(Request $request, Homepage $homepage): Response
    {
        if ($this->isCsrfTokenValid('revert'.$homepage->getId(), $request->request->get('_token'))) {
            $new = new Homepage();
            $new->setContent($homepage->getContent());
            $new->setLang($homepage->getLang());

            $em = $this->getDoctrine()->getManager();
            $em->persist($new);
            $em->flush();
            $this->addFlash('success', "Homepage reverted successfully");
        } else {
            $this->addFlash('error', "Unable to revert");
        }

        return $this->redirectToRoute('admin.homepage.index');
    }
}
