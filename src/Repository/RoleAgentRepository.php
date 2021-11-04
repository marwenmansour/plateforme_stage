<?php

namespace App\Repository;

use App\Entity\RoleAgent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoleAgent|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoleAgent|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoleAgent[]    findAll()
 * @method RoleAgent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleAgentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoleAgent::class);
    }

    // /**
    //  * @return RoleAgent[] Returns an array of RoleAgent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoleAgent
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
