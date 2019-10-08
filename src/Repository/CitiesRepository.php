<?php

namespace App\Repository;

use App\Entity\Cities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * @method Cities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cities[]    findAll()
 * @method Cities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CitiesRepository extends ServiceEntityRepository
{
    public $em;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Cities::class);
        $this->em = $manager;
    }
    // /**
    //  * @return Cities[] Returns an array of Cities objects
    //  */
    
    public function getList()
    {
        
        //$rsm = new ResultSetMapping();
// build rsm here
        $conn = $this->em->getConnection();
        $sql = "select tariffs.id, tariffs.name, s.city, tariffs.price, tariffs.created_at from tariffs right join ( select * from cities join cities_tariffs on cities.id = cities_tariffs.cities_id) s on tariffs.id = s.tariffs_id;";
        $stmt = $conn->prepare($sql);
       // $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
       // $query = $this->em->createNativeQuery('SELECT * FROM tariffs', $rsm);
        //$query->setParameter(1, 'romanb');
        //dd($query->getResult());
       // return $query;
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Cities
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
