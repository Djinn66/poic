<?php

namespace App\Repository;

use App\Entity\Inaptitude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Inaptitude|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inaptitude|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inaptitude[]    findAll()
 * @method Inaptitude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InaptitudeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inaptitude::class);
    }

    // /**
    //  * @return Inaptitude[] Returns an array of Inaptitude objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Inaptitude
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
