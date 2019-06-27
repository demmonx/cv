<?php
namespace App\Controller\Front;
use App\Repository\SocialRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Hobby;
use App\Entity\LanguageSkill;
use App\Entity\TechnicalSkill;
use App\Entity\SoftSkill;
use App\Entity\Study;
use App\Entity\Project;
use App\Entity\Job;

class MainController extends AbstractController
{
    /**
     *  @Route({
        "fr": "/",
     *  "en": "/home"
     * }, name="homepage")
     */
    public function index(Request $request) {
		return $this->render('front/'.$request->getLocale().'/index.html.twig');
		//return $this->render($_locale);
    }
    
    /**
     *  @Route({
        "fr": "/projets",
     *  "en": "/projects"
     * }, name="projets")
     */
    public function projet(Request $request) {
		return $this->render('front/'.$request->getLocale().'/projets.html.twig');
    }
    
    /**
     *  @Route({
        "fr": "/experiences",
     *  "en": "/experiences"
     * }, name="exp")
     */
    public function experiences(Request $request) {
		return $this->render('front/'.$request->getLocale().'/exp.html.twig');
    }
    
    /**
     *  @Route({
        "fr": "/cv",
     *  "en": "/resume"
     * }, name="cv")
     */
    public function cv(Request $request) {
        // Load all the repo
        $hobbyRepo = $this->getDoctrine()->getRepository(Hobby::class);
        $skillLanguageRepo = $this->getDoctrine()->getRepository(LanguageSkill::class);
        $skillTechnicalRepo = $this->getDoctrine()->getRepository(TechnicalSkill::class);
        $skillSoftRepo = $this->getDoctrine()->getRepository(SoftSkill::class);
        $studyRepo = $this->getDoctrine()->getRepository(Study::class);
        $projectRepo = $this->getDoctrine()->getRepository(Project::class);
        $jobRepo = $this->getDoctrine()->getRepository(Job::class);

        $lang = $request->getLocale();

        return $this->render('front/pages/cv.html.twig', [
            "hobbies" => $hobbyRepo->findBy(['lang' => $lang]),
            "spoken" => $skillLanguageRepo->findBy(['lang' => $lang]),
            "technical" => $skillTechnicalRepo->findBy(['lang' => $lang]),
            "soft" => $skillSoftRepo->findBy(['lang' => $lang]),
            "studies" => $studyRepo->findBy(['lang' => $lang]),
            "projects" => $projectRepo->findBy(['lang' => $lang]),
            "jobs" => $jobRepo->findBy(['lang' => $lang]),
        ]);
    }

    public function socialList(SocialRepository $repo) {
        return $this->render('front/layout/_social.html.twig', [
            'medias' => $repo->findAll()
        ]);
    }
 }
