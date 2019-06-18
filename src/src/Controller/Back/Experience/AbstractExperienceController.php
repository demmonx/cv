<?php

namespace App\Controller\Back\Experience;

use App\Controller\Back\AbstractController;
use Cocur\Slugify\Slugify;
use Symfony\Component\Routing\Annotation\Route;

abstract class AbstractExperienceController extends AbstractController
{

    protected function processInput($input): array
    {
        # Parse form data
        $techs = explode(",", $input);
        $slugify = new Slugify();
        $slugify->addRule('#', '-sharp');
        $technos = [];
        foreach($techs as $techno) {
            $technos[$slugify->slugify($techno)] = $techno;
        }
        return $technos;
    }
  
}
