<?php

namespace App\Controller\Back\Skill;

use App\Entity\LanguageSkill;
use App\Form\Back\Skill\LanguageSkillType;
use App\Repository\LanguageSkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/skill/language", name="admin.skill.language.")
 */
class LanguageSkillController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(LanguageSkillRepository $languageSkillRepository): Response
    {
        return $this->render('back/skill/language/index.html.twig', [
            'language_skills' => $languageSkillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        $languageSkill = new LanguageSkill();
        $form = $this->createForm(LanguageSkillType::class, $languageSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($languageSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.skill.language.index');
        }

        return $this->render('back/skill/language/add.html.twig', [
            'language_skill' => $languageSkill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LanguageSkill $languageSkill): Response
    {
        $form = $this->createForm(LanguageSkillType::class, $languageSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.skill.language.index');
        }

        return $this->render('back/skill/languageedit.html.twig', [
            'language_skill' => $languageSkill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, LanguageSkill $languageSkill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$languageSkill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($languageSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.skill.language.index');
    }
}