<?php
namespace App\Controller\Back;
use App\Entity\Lang;  
use App\Entity\Hobby;
use App\Entity\LanguageSkill;
use App\Entity\TechnicalSkill;
use App\Entity\SoftSkill;
use App\Entity\Study;
use App\Entity\Social;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     *  @Route("/", name="admin.index")
     */
    public function index(Request $request) {
      // Load all the repo
      $langRepo = $this->getDoctrine()->getRepository(Lang::class);
      $hobbyRepo = $this->getDoctrine()->getRepository(Hobby::class);
      $skillLanguageRepo = $this->getDoctrine()->getRepository(LanguageSkill::class);
      $skillTechnicalRepo = $this->getDoctrine()->getRepository(TechnicalSkill::class);
      $skillSoftRepo = $this->getDoctrine()->getRepository(SoftSkill::class);
      $studyRepo = $this->getDoctrine()->getRepository(Study::class);
      $socialRepo = $this->getDoctrine()->getRepository(Social::class);

      // Set the lang to default value
      if (! $this->get('session')->has('lang')) {
        $this->get('session')->set('lang', $langRepo->findOneBy(['locale' => 'en']));
      }

      $lang = $this->get('session')->get('lang');

		return $this->render("/back/index.html.twig", [
      "langs" => $langRepo->findBy(['enabled' => true]),
      "hobbies" => $hobbyRepo->findBy(['lang' => $lang]),
      "spoken" => $skillLanguageRepo->findBy(['lang' => $lang]),
      "technical" => $skillTechnicalRepo->findBy(['lang' => $lang]),
      "soft" => $skillSoftRepo->findBy(['lang' => $lang]),
      "studies" => $studyRepo->findBy(['lang' => $lang]),
      "socials" => $socialRepo->findAll(),
    ]);
    }
    
 }
