<?php

namespace App\Repository;

use App\Entity\Camara;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Camara|null find($id, $lockMode = null, $lockVersion = null)
 * @method Camara|null findOneBy(array $criteria, array $orderBy = null)
 * @method Camara[]    findAll()
 * @method Camara[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CamaraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Camara::class);
    }

//    /**
//     * @return Camara[] Returns an array of Camara objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Camara
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
