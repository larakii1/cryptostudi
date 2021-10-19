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



    public function getTotalPriceVariation()
    {

        $conn = $this->getEntityManager()->getConnection();
        $price = ' SELECT round(sum(quantity * PV.price )) as total FROM price_variation as PV inner join crypto as c on PV.crypto_id = c.id group by PV.date';
        $stmt = $conn->prepare($price);
        $stmt->executeQuery();
        return $stmt->fetchAll();
    }

    public function queryDate()
    {
        $conn = $this->getEntityManager()->getConnection();
        $date = 'SELECT DISTINCT pv.date from price_variation as pv';
        $stmt = $conn->prepare($date);
        $stmt->executeQuery();
        return $stmt->fetchAll();
    }

    public function queryLastVariation($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $price = ' SELECT price from price_variation where crypto_id =' . $id . " ORDER BY crypto_id desc limit 1,1";
        $stmt = $conn->prepare($price);
        $stmt->executeQuery();
        return $stmt->fetchOne();
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
