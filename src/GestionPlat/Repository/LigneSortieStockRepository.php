<?php

namespace App\GestionPlat\Repository;

use App\GestionPlat\Entity\LigneSortieStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneSortieStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneSortieStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneSortieStock[]    findAll()
 * @method LigneSortieStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneSortieStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneSortieStock::class);
    }

    // /**
    //  * @return LigneSortieStock[] Returns an array of LigneSortieStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneSortieStock
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
