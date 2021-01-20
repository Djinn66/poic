<?php

namespace App\Repository;

use App\Entity\Armee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Armee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Armee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Armee[]    findAll()
 * @method Armee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armee::class);
    }

    // /**
    //  * @return Armee[] Returns an array of Armee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Armee
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
