<?php

namespace App\Repository;

use App\Entity\WorldEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

abstract class KingsBountyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
    }

    public function save(WorldEntity $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }

    public function update(int $id, $data)
    {
        $entity = $this->find($id);

        if (null == $entity) {
            return new EntityNotFoundException();
        }

        $entity->setParameters($data);

        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }
}
