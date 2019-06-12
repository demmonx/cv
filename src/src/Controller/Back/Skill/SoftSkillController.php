<?php

namespace App\Controller\Back\Skill;

use App\Entity\SoftSkill;
use App\Form\Back\Skill\SoftSkillType;
use App\Repository\SoftSkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/skill/soft", name="admin.skill.soft.")
 */
class SoftSkillController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(SoftSkillRepository $softSkillRepository): Response
    {
        return $this->render('back/skill/soft/index.html.twig', [
            'soft_skills' => $softSkillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET","POST"})
     */
    public function add(Request $request): Response
    {
        $softSkill = new SoftSkill();
        $form = $this->createForm(SoftSkillType::class, $softSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($softSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully added");
            return $this->redirectToRoute('admin.skill.soft.index');
        }

        return $this->render('back/skill/soft/add.html.twig', [
            'soft_skill' => $softSkill,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/edit/{id}", name="admin.skill.soft.edit", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, SoftSkill $softSkill): Response
    {
        $form = $this->createForm(SoftSkillType::class, $softSkill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Item has been successfully edited");
            return $this->redirectToRoute('admin.skill.soft.index');
        }

        return $this->render('back/skill/soft/edit.html.twig', [
            'soft_skill' => $softSkill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, SoftSkill $softSkill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$softSkill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($softSkill);
            $entityManager->flush();
            $this->addFlash('success', "Item has been successfully deleted");
        } else {
            $this->addFlash('error', "Unable to remove the item");
        }

        return $this->redirectToRoute('admin.skill.soft.index');
    }
}
