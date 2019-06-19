<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TranslationRepository")
 */
class Translation
{

    public static $keys = [
        "job-title" => "Job title",
        "about-me" => "About me",
        "exp" => "Experiences",
        "project" => "Projects", 
        "resume" => "Resume",
        "contact" => "Contact",
        "skill" => "Skills",
        "soft" => "Soft Skills",
        "education" => "Education",
        "hobbies" => "Hobbies",
        "others" => "Others",
        "lang" => "Languages",
    ];
     

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     */
    private $key;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lang")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="locale")
     */
    private $lang;
    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
