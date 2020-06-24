<?php

namespace App\Repository;

use App\Entity\ArticleEvent;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

        /**
        * @return QueryBuilder
        */

        public function findAllQuery(): QueryBuilder
        {
            return $this->createQueryBuilder('a')               
                        ->orderBy('a.id', 'ASC');
                        
        }



     /**
     * @return ArticleEvent[] Returns an array of ArticleEvent objects
     */
    
            public function findLastEvent()
            {
            return $this->createQueryBuilder('a')
                        ->orderBy('a.id' , 'DESC')
                        ->setMaxResults(5)
                        ->getQuery()
                        ->getResult();
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
