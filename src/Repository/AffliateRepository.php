<?php

namespace App\Repository;

use App\Entity\Affliate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Affliate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Affliate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Affliate[]    findAll()
 * @method Affliate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffliateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Affliate::class);
    }

    // /**
    //  * @return Affliate[] Returns an array of Affliate objects
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
    public function findOneBySomeField($value): ?Affliate
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
