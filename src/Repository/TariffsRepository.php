<?php

namespace App\Repository;

use App\Entity\Tariffs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tariffs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tariffs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tariffs[]    findAll()
 * @method Tariffs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TariffsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tariffs::class);
    }

    // /**
    //  * @return Tariffs[] Returns an array of Tariffs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tariffs
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
