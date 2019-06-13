<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SoftSkillRepository")
 */
class SoftSkill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

        /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lang")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="locale")
     */
    private $lang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLang(): ?Lang
    {
        return $this->lang;
    }

    public function setLang(?Lang $lang): self
    {
        $this->lang = $lang;

        return $this;
    }
}
