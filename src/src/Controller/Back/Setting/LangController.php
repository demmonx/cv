<?php

namespace App\Controller\Back\Setting;

use App\Entity\Lang;
use App\Repository\LangRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/setting/lang", name="admin.setting.lang.")
 */
class LangController extends AbstractController
{
/**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(LangRepository $langRepository): Response
    {
        return $this->render('back/setting/lang/index.html.twig', [
            'langs' => $langRepository->findBy( [], [
                "enabled" => "DESC", 
                "name" => "ASC"
            ]
            ),
        ]);
    }

    /**
     * @Route("/disable/{id}", name="disable", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function disable(Request $request, Lang $lang): Response
    {
        if ($lang->getLocale() == 'en') {
            $this->addFlash('error', "Unable to disable the default locale");
        } else if ($this->isCsrfTokenValid('disable'.$lang->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang->setEnabled(false);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully disabled");
        } else {
            $this->addFlash('error', "Unable to disable the item");
        }

        return $this->redirectToRoute('admin.setting.lang.index');
    }

}
