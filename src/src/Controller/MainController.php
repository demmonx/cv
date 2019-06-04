<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    /**,  requirements={"_locale"="en|fr"})
     *  @Route({
        "el": "/giasas",
     *  "en": "/hello"
     * }, name="homepage")
     * @Template("welcome.html.twig")
     */
    public function index(TranslatorInterface $translator, $locales, $defaultLocale) {
    }

}
