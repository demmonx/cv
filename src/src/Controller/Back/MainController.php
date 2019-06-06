<?php
namespace App\Controller\Back;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     *  @Route("/", name="admin.index")
     */
    public function index(Request $request) {
		return $this->render("/fr/exp.html.twig");
    }
    
 }
