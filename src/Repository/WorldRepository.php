<?php

namespace App\Repository;

use App\Entity\World;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<World>
 *
 * @method World|null find($id, $lockMode = null, $lockVersion = null)
 * @method World|null findOneBy(array $criteria, array $orderBy = null)
 * @method World[]    findAll()
 * @method World[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorldRepository extends KingsBountyRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, World::class);
    }

    public function findOneOrCreate(array $criteria)
    {
        $entity = $this->findOneBy(['user_id' => $criteria['user_id'] ?? 0]);

        if (null === $entity) {
            $entityName = $this->getClassName();
            $entity = new $entityName();
            $entity->setParameters($criteria);

            $this->_em->persist($entity);
            $this->_em->flush();
        }

        return $entity;
    }
//    /**
//     * @return World[] Returns an array of World objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?World
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
