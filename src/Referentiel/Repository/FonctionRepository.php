<?php

namespace App\Referentiel\Repository;

use App\Referentiel\Entity\Fonction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fonction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fonction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fonction[]    findAll()
 * @method Fonction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fonction::class);
    }

    // /**
    //  * @return Fonction[] Returns an array of Fonction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fonction
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
