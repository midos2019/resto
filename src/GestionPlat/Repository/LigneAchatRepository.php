<?php

namespace App\GestionPlat\Repository;

use App\GestionPlat\Entity\LigneAchat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneAchat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneAchat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneAchat[]    findAll()
 * @method LigneAchat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneAchatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneAchat::class);
    }

    // /**
    //  * @return LigneAchat[] Returns an array of LigneAchat objects
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
    public function findOneBySomeField($value): ?LigneAchat
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
