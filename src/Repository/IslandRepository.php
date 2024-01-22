<?php

namespace App\Repository;

use App\Direction\WorldSettings;
use App\Entity\Island;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Island>
 *
 * @method Island|null find($id, $lockMode = null, $lockVersion = null)
 * @method Island|null findOneBy(array $criteria, array $orderBy = null)
 * @method Island[]    findAll()
 * @method Island[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IslandRepository extends KingsBountyRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Island::class);
    }

    public function findOneOrCreate(array $criteria)
    {
        $entity = $this->findOneBy($criteria);

        if (null === $entity) {
            $data = [
                'name'     => WorldSettings::LEVEL[1],
                'world_id' => $criteria['world_id'],
                'level'    => WorldSettings::DEFAULT_LEVEL,
                'map'      => [],
                'objects'  => [],
                'hero'     => [],
            ];

            $entityName = $this->getClassName();
            $entity = new $entityName();
            $entity->setParameters($data);

            $this->_em->persist($entity);
            $this->_em->flush();
        }

        return $entity;
    }

//    /**
//     * @return Island[] Returns an array of Island objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Island
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
