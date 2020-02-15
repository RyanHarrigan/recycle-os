<?php

namespace App\Repository;

use App\Entity\Imageuploads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Imageuploads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageuploads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageuploads[]    findAll()
 * @method Imageuploads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageuploadsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imageuploads::class);
    }

    // /**
    //  * @return Imageuploads[] Returns an array of Imageuploads objects
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
    public function findOneBySomeField($value): ?Imageuploads
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
