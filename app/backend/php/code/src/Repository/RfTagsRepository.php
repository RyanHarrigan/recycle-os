<?php

namespace App\Repository;

use App\Entity\RfTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RfTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method RfTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method RfTags[]    findAll()
 * @method RfTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RfTagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RfTags::class);
    }

    // /**
    //  * @return RfTags[] Returns an array of RfTags objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RfTags
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
