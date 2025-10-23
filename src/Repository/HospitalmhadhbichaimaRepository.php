<?php

namespace App\Repository;

use App\Entity\Hospitalmhadhbichaima;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hospitalmhadhbichaima>
 */
class HospitalmhadhbichaimaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hospitalmhadhbichaima::class);
    }

//    /**
//     * @return Hospitalmhadhbichaima[] Returns an array of Hospitalmhadhbichaima objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Hospitalmhadhbichaima
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function findjoinbyid($id){
        $em=$this->getEntityManager();
        $query=$em->createQuery("SELECT p 
        FROM App\Entity\Hospitalmhadhbichaima p  
        WHERE p.id = :id")
        ->setParameter('id', $id);
        return $query->getOneOrNullResult();
    }
}
