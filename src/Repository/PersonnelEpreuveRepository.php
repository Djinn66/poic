<?php

namespace App\Repository;

use App\Entity\PersonnelEpreuve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonnelEpreuve|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnelEpreuve|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnelEpreuve[]    findAll()
 * @method PersonnelEpreuve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnelEpreuveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnelEpreuve::class);
    }

    // /**
    //  * @return PersonnelEpreuve[] Returns an array of PersonnelEpreuve objects
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
    public function findOneBySomeField($value): ?PersonnelEpreuve
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
