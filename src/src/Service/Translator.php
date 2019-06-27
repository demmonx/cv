<?php

namespace App\Service;
use App\Repository\TranslationRepository;

class Translator
{
    private $repo;

    public function __construct(TranslationRepository $translationRepository)
    {
        $this->repo = $translationRepository;
    }

    public function run($locale, $key)
    {
        if (!is_string($locale)) {
            $locale = $locale->getLocale();
        }
        $translation = $this->repo->findOneBy(['lang' => $locale, "key" => $key]);
        return $translation != null ? $translation->getValue() : $key;
    }
}