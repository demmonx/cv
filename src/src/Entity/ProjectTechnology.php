<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectTechnologyRepository")
 * @ORM\Table(name="project_technology")
 */
class ProjectTechnology
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="technos")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $project;    
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Technology", inversedBy="slug")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="slug")
     */
    private $technology;

    public function setProject(?Project $project): self {
        $this->project = $project;
        return $this;
    }

    public function getProject() :?Project {
        return $this->project;
    }

    public function setTechnology(?Technology $technology): self {
        $this->technology = $technology;
        return $this;
    }

    public function getTechnology() :?Technology {
        return $this->technology;
    }


}
