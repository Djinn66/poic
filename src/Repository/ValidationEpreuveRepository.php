<?php

namespace App\Repository;

use App\Entity\ValidationEpreuve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ValidationEpreuve|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValidationEpreuve|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValidationEpreuve[]    findAll()
 * @method ValidationEpreuve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValidationEpreuveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValidationEpreuve::class);
    }

    // /**
    //  * @return ValidationEpreuve[] Returns an array of ValidationEpreuve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValidationEpreuve
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
