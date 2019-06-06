<?php
namespace App\Controller\Front;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     *  @Route({
        "fr": "/",
     *  "en": "/home"
     * }, name="homepage")
     */
    public function index(Request $request) {
		return $this->render($request->getLocale().'/index.html.twig');
		//return $this->render($_locale);
    }
    
    /**
     *  @Route({
        "fr": "/projets",
     *  "en": "/projects"
     * }, name="projets")
     */
    public function projet(Request $request) {
		return $this->render($request->getLocale().'/projets.html.twig');
    }
    
    /**
     *  @Route({
        "fr": "/experiences",
     *  "en": "/experiences"
     * }, name="exp")
     */
    public function experiences(Request $request) {
		return $this->render($request->getLocale().'/exp.html.twig');
    }
    
    /**
     *  @Route({
        "fr": "/cv",
     *  "en": "/resume"
     * }, name="cv")
     */
    public function cv(Request $request) {
		return $this->render($request->getLocale().'/cv.html.twig');
    }
 }
