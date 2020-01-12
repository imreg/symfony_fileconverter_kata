<?php

namespace App\Repository;

use App\Entity\VidexEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VidexEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method VidexEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method VidexEntity[]    findAll()
 * @method VidexEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VidexEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VidexEntity::class);
    }

    // /**
    //  * @return VidexEntity[] Returns an array of VidexEntity objects
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
    public function findOneBySomeField($value): ?VidexEntity
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
