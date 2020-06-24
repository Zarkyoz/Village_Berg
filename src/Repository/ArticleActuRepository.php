<?php

namespace App\Repository;

use App\Entity\ArticleActu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleActu|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleActu|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleActu[]    findAll()
 * @method ArticleActu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleActuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleActu::class);
    }


        

        /**
        * @return ArticleActu[] Returns an array of ArticleActu objects
        */

        public function findLastActu()
            {
                return $this->createQueryBuilder('a')
                            ->orderBy( 'a.id', 'DESC')
                            ->setMaxResults(5)
                            ->getQuery()
                            ->getResult();

            }




    // /**
    //  * @return ArticleActu[] Returns an array of ArticleActu objects
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
    public function findOneBySomeField($value): ?ArticleActu
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
