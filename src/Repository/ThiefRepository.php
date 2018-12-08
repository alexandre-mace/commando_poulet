<?php

namespace App\Repository;

use App\Entity\Thief;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Thief|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thief|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thief[]    findAll()
 * @method Thief[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThiefRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Thief::class);
    }

    // /**
    //  * @return Thief[] Returns an array of Thief objects
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
    public function findOneBySomeField($value): ?Thief
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
