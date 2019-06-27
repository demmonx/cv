<?php

namespace App\Service;
use App\Repository\UserRepository;

class User
{
    private $repo;

    public function __construct(UserRepository $translationRepository)
    {
        $this->repo = $translationRepository;
    }

    public function get()
    {
        $user = $this->repo->findOneBy(['id' => 1]);
        return $user;
    }
}