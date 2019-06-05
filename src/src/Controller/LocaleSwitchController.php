<?php 
namespace App\Controller;
  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
  
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
      
}
