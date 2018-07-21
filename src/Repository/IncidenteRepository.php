<?php

namespace App\Repository;

use App\Entity\Incidente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Incidente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Incidente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Incidente[]    findAll()
 * @method Incidente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IncidenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Incidente::class);
    }

//    /**
//     * @return Incidente[] Returns an array of Incidente objects
//     */
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
    public function findOneBySomeField($value): ?Incidente
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
