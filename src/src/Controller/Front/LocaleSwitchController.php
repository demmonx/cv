<?php 
namespace App\Controller\Front;
  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;use App\Repository\LangRepository;
  
class LocaleSwitchController extends AbstractController {

    /**
     * @Route("/switch/{locale}", name="switch_language")
     */  
    public function switchLanguage(Request $request, $locale) {
		$currentLocale = $request->getLocale();
		$previousRequest = $request->headers->get('referer');
		$previousRequest = substr($previousRequest, strpos($previousRequest, '/'. $currentLocale .'/'), strlen($previousRequest));
		if (!preg_match('/'. $currentLocale . '/', $previousRequest)) {
			$previousRequest =  '/'. $currentLocale .'/';
		}
		$newRequest = str_replace('/'. $currentLocale .'/', '/'. $locale .'/', $previousRequest);
        return $this->redirect($newRequest);
    }

    public function listAvailable(LangRepository $langRepository)   {

        return $this->render('front/layout/_lang.html.twig', [
            'langs' => $langRepository->findBy( ["enabled" => true], ["name" => "ASC"])
        ]);
    }
      
}
