<?php

namespace App\Controller\Back\User;

use App\Entity\ExtraInfo;
use App\Form\Back\User\ExtraInfoType;
use App\Repository\ExtraInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/extra", name="admin.user.extra.")
 */
class ExtraInfoController extends AbstractController
{
   /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ExtraInfoRepository $extraInfoRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/user/extra/index.html.twig', [
            'extra_infos' => $extraInfoRepository->findBy(["lang" => $lang]),
        ]);
    }


    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, ExtraInfo $extraInfo): Response
    {
        $form = $this->createForm(ExtraInfoType::class, $extraInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.user.extra.index');
        }

        return $this->render('back/user/extra/edit.html.twig', [
            'extra_info' => $extraInfo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        
        $extraInfo = new ExtraInfo();
        
        
        $form = $this->createForm(ExtraInfoType::class, $extraInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang = $this->get('session')->get('lang');
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());
            $extraInfo->setLang($lang);
            $entityManager->persist($extraInfo);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.user.extra.index');
        }

        return $this->render('back/user/extra/add.html.twig', [
            'extra_info' => $extraInfo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, ExtraInfo $extraInfo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$extraInfo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($extraInfo);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.user.extra.index');
    }
}
