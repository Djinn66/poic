<?php

namespace App\Repository;

use App\Entity\GradeArmee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GradeArmee|null find($id, $lockMode = null, $lockVersion = null)
 * @method GradeArmee|null findOneBy(array $criteria, array $orderBy = null)
 * @method GradeArmee[]    findAll()
 * @method GradeArmee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeArmeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GradeArmee::class);
    }

    // /**
    //  * @return GradeArmee[] Returns an array of GradeArmee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GradeArmee
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
