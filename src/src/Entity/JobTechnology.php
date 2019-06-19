<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobTechnologyRepository")
 * @ORM\Table(name="job_technology")
 */
class JobTechnology
{


    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="technos")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $job;    
    
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Technology", inversedBy="slug")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="slug")
     */
    private $technology;

    public function setJob(?Job $job): self {
        $this->job = $job;
        return $this;
    }

    public function getJob() :?Job {
        return $this->job;
    }

    public function setTechnology(?Technology $technology): self {
        $this->technology = $technology;
        return $this;
    }

    public function getTechnology() :?Technology {
        return $this->technology;
    }


}
