<?php

namespace App\Repository;

use App\Entity\PriceVariation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceVariation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceVariation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceVariation[]    findAll()
 * @method PriceVariation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceVariationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceVariation::class);
    }

    // /**
    //  * @return PriceVariation[] Returns an array of PriceVariation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceVariation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
