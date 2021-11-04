<?php

namespace App\Repository;

use App\Entity\DossierAdherent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DossierAdherent|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierAdherent|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierAdherent[]    findAll()
 * @method DossierAdherent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierAdherentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierAdherent::class);
    }

    // /**
    //  * @return DossierAdherent[] Returns an array of DossierAdherent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DossierAdherent
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
