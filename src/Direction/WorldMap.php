<?php

namespace App\Direction;

use App\Direction\Generators\HeroGenerator;
use App\Direction\Generators\MapGenerator;
use App\Direction\Generators\ObjectGenerator;
use App\Entity\World;
use App\Entity\Island;
use App\Repository\IslandRepository;
use App\Repository\WorldRepository;
use Symfony\Bundle\SecurityBundle\Security;

class WorldMap
{
    private World $worldModel;
    private Island $islandModel;
    private WorldRepository $worldRepository;
    private IslandRepository $islandRepository;
    private Security $security;

    public function __construct(
        Security $security,
        IslandRepository $islandRepository,
        WorldRepository $worldRepository
    )
    {
        $this->security = $security;

        $this->worldRepository = $worldRepository;
        $this->islandRepository = $islandRepository;

        $this->setWorld();
        $this->setIsland();
        $this->setHero();
    }

    protected function setHero()
    {
        $hero = $this->worldModel->getHero();
        $hero['position']['island'] = $this->islandModel->getId();
        $this->worldModel->setHero($hero);

        $this->worldRepository->save($this->worldModel);
    }

    protected function setWorld()
    {
        $data = [
            'name'     => WorldSettings::LEVEL[1],
            'user_id'  => $this->security->getUser()->getId(),
            'position' => '54.997316 83.652075',
            'geo'      => "SRID=4326;POINT(54.997316 83.652075)",
        ];

        $this->worldModel = $this->worldRepository->findOneOrCreate($data);


        if (!empty($this->worldModel->getHero())) {
            return;
        }

        $this->worldModel->setHero((new HeroGenerator())->getNewHero());
        $this->worldModel->setSuzerain([]);
        $this->worldModel->setVassals([]);
    }

    protected function setIsland()
    {
        $data = [
            'world_id' => $this->worldModel->getId(),
        ];

        $this->islandModel = $this->islandRepository->findOneOrCreate($data);

        if (!empty($this->islandModel->getMap())) {
            return;
        }

        $this->islandModel->setObjects(ObjectGenerator::getDistribution($this->islandModel));
        $this->islandModel->setMap((new MapGenerator($this->islandModel))->getNewMap());

        $this->islandRepository->save($this->islandModel);
    }

    public function getWorldMap()
    {
        return $this->islandModel->getMap();
    }

    public function getWorldObjects(): array
    {
        return $this->islandModel->getObjects();
    }

    public function getHero(): array
    {
        return $this->worldModel->getHero();
    }
}
