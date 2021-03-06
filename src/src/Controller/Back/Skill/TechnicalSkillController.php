<?php

namespace App\Controller\Back\Skill;

use App\Entity\TechnicalSkill;
use App\Form\Back\Skill\TechnicalSkillType;
use App\Entity\Lang;
use App\Repository\TechnicalSkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/skill/technical", name="admin.skill.technical.")
 */
class TechnicalSkillController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(TechnicalSkillRepository $technicalSkillRepository): Response
    {
        $lang = $this->get('session')->get('lang');
        return $this->render('back/skill/technical/index.html.twig', [
            'technical_skills' => $technicalSkillRepository->findBy(["lang" => $lang], ["name" => "ASC"]),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        $technicalSkill = new TechnicalSkill();
        $form = $this->createForm(TechnicalSkillType::class, $technicalSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $entityManager = $this->getDoctrine()->getManager();
            $lang = $this->get('session')->get('lang');
            $lang = $this->getDoctrine()->getRepository(Lang::class)->find($lang->getLocale());
            $technicalSkill->setLang($lang);
            $entityManager->persist($technicalSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.skill.technical.index');
        }

        return $this->render('back/skill/technical/add.html.twig', [
            'technical_skill' => $technicalSkill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, TechnicalSkill $technicalSkill): Response
    {
        $form = $this->createForm(TechnicalSkillType::class, $technicalSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.skill.technical.index');
        }

        return $this->render('back/skill/technical/edit.html.twig', [
            'technical_skill' => $technicalSkill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, TechnicalSkill $technicalSkill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technicalSkill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($technicalSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.skill.technical.index');
    }
}
