<?php

namespace App\Repository;

use App\Entity\Asunto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Asunto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asunto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asunto[]    findAll()
 * @method Asunto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsuntoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Asunto::class);
    }

//    /**
//     * @return Asunto[] Returns an array of Asunto objects
//     */
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
    public function findOneBySomeField($value): ?Asunto
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
