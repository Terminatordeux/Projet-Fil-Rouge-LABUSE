<?php

namespace App\Repository;

use App\Entity\Annonceprovisoire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Annonceprovisoire>
 *
 * @method Annonceprovisoire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonceprovisoire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonceprovisoire[]    findAll()
 * @method Annonceprovisoire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceprovisoireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonceprovisoire::class);
    }

    public function add(Annonceprovisoire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Annonceprovisoire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Annonceprovisoire[] Returns an array of Annonceprovisoire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Annonceprovisoire
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
