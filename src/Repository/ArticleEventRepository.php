<?php

namespace App\Repository;

use App\Entity\ArticleEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleEvent[]    findAll()
 * @method ArticleEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleEvent::class);
    }

    // /**
    //  * @return ArticleEvent[] Returns an array of ArticleEvent objects
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
    public function findOneBySomeField($value): ?ArticleEvent
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
