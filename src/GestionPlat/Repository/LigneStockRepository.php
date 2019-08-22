<?php

namespace App\GestionPlat\Repository;

use App\GestionPlat\Entity\LigneStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneStock[]    findAll()
 * @method LigneStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneStock::class);
    }

    // /**
    //  * @return LigneStock[] Returns an array of LigneStock objects
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
    public function findOneBySomeField($value): ?LigneStock
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
