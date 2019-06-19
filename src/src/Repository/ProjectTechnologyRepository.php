<?php

namespace App\Repository;

use App\Entity\ProjectTechnology;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectTechnology|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectTechnology|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectTechnology[]    findAll()
 * @method ProjectTechnology[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectTechnologyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectTechnology::class);
    }


}
