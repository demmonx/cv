<?php

namespace App\Controller\Back\Setting;

use App\Entity\Lang;
use App\Entity\Translation;
use App\Repository\LangRepository;
use App\Repository\TranslationRepository;
use App\Form\Back\Setting\TranslationType;

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

    public function listAvailable(LangRepository $langRepository)   {

        return $this->render('back/setting/lang/_list.html.twig', [
            'langs' => $langRepository->findBy( ["enabled" => true], ["name" => "ASC"])
        ]);
    }

    /**
     * @Route("/switch", name="switch", methods={"POST"})
     */
    public function switch(Request $request) {
        // Load all the repo
        $langRepo = $this->getDoctrine()->getRepository(Lang::class);

        // Get the lang
        $lang = $langRepo->findOneBy(['locale' => $request->get('id')]);

        // Check if it's valid
        if ($lang != null && $lang->getLocale() != $this->get('session')->get('lang')->getLocale() ) {
            $this->get('session')->set('lang', $lang);
            return new Response(200);
      } else {
          return new Response(503);
      }
    }

    /**
     * @Route("/enable/{id}", name="enable", methods={"GET","POST"}, requirements={"id"="[a-zA-Z]{2}"})
     */
    public function enable(Request $request, TranslationRepository $translationRepository, Lang $lang): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $values = [];
        // Check if lang is alrerady enabled
        if ($lang->isEnabled()) {
            $this->addFlash('warning', $lang->getName() . " is already enabled");
            return $this->redirectToRoute('admin.setting.lang.index');
        }

        // Check if  data are already in database
        $values = $translationRepository->findBy(['lang' => $lang]);
        if (count($values) == count(Translation::$keys)) {
            $lang->setEnabled(true);

            $entityManager->flush();
            $this->addFlash('success', $lang->getName() . " is already translated");
            return $this->redirectToRoute('admin.setting.lang.index');
        }

        $form = $this->createForm(TranslationType::class, null, ['data' => []]);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Get the values 
            $newValues = [];
            foreach(Translation::$keys as $key => $value) {
                $newValues[$key] =  $form->get($key)->getData();
            }

            // Check if all the values are received
            if (count($newValues) != count(Translation::$keys)) {
                $this->addFlash('error', "Some translation are missing");
            } else {
                // Add the data
                foreach($newValues as $key => $value) {
                    $translation = new Translation();
                    $translation->setLang($lang);
                    $translation->setKey($key);
                    $translation->setValue($value);
                    $entityManager->persist($translation);
                }

                $lang->setEnabled(true);

                $entityManager->flush();
                $this->addFlash('success', $lang->getName() . " has been successfully enabled");
                return $this->redirectToRoute('admin.setting.lang.index');
            }            
        }

        return $this->render('back/setting/lang/add.html.twig', [
            'form' => $form->createView(),
            'lang' => $lang
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="[a-zA-Z]{2}"})
     */
    public function edit(Request $request, TranslationRepository $translationRepository, Lang $lang): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $values = [];
        // Check if lang is alrerady enabled
        if (!$lang->isEnabled()) {
            $this->addFlash('error', $lang->getName() . " must be enabled");
            return $this->redirectToRoute('admin.setting.lang.index');
        }

        // Check if  data are already in database
        $data = $translationRepository->findBy(['lang' => $lang]);
        $values = [];
        foreach($data as $value) {
            $values[$value->getKey()] = $value;
        }
 
        $form = $this->createForm(TranslationType::class, null, ['data' => $values]);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Get the values 
            $newValues = [];
            foreach(Translation::$keys as $key => $value) {
                $newValues[$key] =  $form->get($key)->getData();
            }

            // Check if all the values are received
            if (count($newValues) != count(Translation::$keys)) {
                $this->addFlash('error', "Some translation are missing");
            } else {
                // Add the data
                foreach($newValues as $key => $value) {
                    if (!array_key_exists($key, $values)) { // key is missing
                        $translation = new Translation();
                        $translation->setLang($lang);
                        $translation->setKey($key);
                        $translation->setValue($value);
                        $entityManager->persist($translation);
                    } else { // key exist
                        $values[$key]->setValue($value);
                    }
                }

                $entityManager->flush();
                $this->addFlash('success', $lang->getName() . " has been successfully enabled");
                return $this->redirectToRoute('admin.setting.lang.index');
            }            
        }

        return $this->render('back/setting/lang/edit.html.twig', [
            'form' => $form->createView(),
            'lang' => $lang
        ]);
    }

    /**
     * @Route("/disable/{id}", name="disable", methods={"DELETE"}, requirements={"id"="[a-zA-Z]{2}"})
     */
    public function disable(Request $request, Lang $lang): Response
    {
        if ($lang->getLocale() == 'en') {
            $this->addFlash('error', "Unable to disable the default locale");
        } else if ($this->isCsrfTokenValid('disable'.$lang->getLocale(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang->setEnabled(false);
            $entityManager->flush();
            $this->addFlash('success', $lang->getName() . " has been successfully disabled");
        } else {
            $this->addFlash('error', "Unable to disable the item");
        }

        return $this->redirectToRoute('admin.setting.lang.index');
    }

}
