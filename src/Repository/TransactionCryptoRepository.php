<?php

namespace App\Repository;

use App\Entity\TransactionCrypto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransactionCrypto|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransactionCrypto|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransactionCrypto[]    findAll()
 * @method TransactionCrypto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionCryptoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransactionCrypto::class);
    }

    // /**
    //  * @return TransactionCrypto[] Returns an array of TransactionCrypto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransactionCrypto
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
