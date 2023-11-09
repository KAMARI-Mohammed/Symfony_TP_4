<?php

namespace App\Repository;

use App\Entity\LignesComptes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LignesComptes>
 *
 * @method LignesComptes|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignesComptes|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignesComptes[]    findAll()
 * @method LignesComptes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignesComptesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LignesComptes::class);
    }

//    /**
//     * @return LignesComptes[] Returns an array of LignesComptes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LignesComptes
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
