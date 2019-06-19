<?php

namespace App\Repository;

use App\Entity\JobTechnology;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobTechnology|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobTechnology|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobTechnology[]    findAll()
 * @method JobTechnology[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobTechnologyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobTechnology::class);
    }


}
