<?php

namespace App\GestionPlat\Repository;

use App\GestionPlat\Entity\LigneRepas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneRepas|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneRepas|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneRepas[]    findAll()
 * @method LigneRepas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneRepasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneRepas::class);
    }

    // /**
    //  * @return LigneRepas[] Returns an array of LigneRepas objects
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
    public function findOneBySomeField($value): ?LigneRepas
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
