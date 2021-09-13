<?php

namespace App\Repository;

use App\Entity\ServiceTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceTicket[]    findAll()
 * @method ServiceTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceTicket::class);
    }

    // /**
    //  * @return ServiceTicket[] Returns an array of ServiceTicket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceTicket
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
