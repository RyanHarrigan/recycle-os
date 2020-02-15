<?php

namespace App\Repository;

use App\Entity\UserPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPoints[]    findAll()
 * @method UserPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPoints::class);
    }

    // /**
    //  * @return UserPoints[] Returns an array of UserPoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserPoints
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
