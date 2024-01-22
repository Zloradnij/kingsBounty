<?php

namespace App\Direction\Generators;

use App\Direction\WorldSettings;
use App\Entity\Island;

class MapGenerator
{
    public function __construct(private Island $island)
    {
    }

    public function getNewMap(): array
    {
        $map = [];

        for ($x = 0; $x < WorldSettings::MAP['sizeX']; $x++) {
            for ($y = 0; $y < WorldSettings::MAP['sizeY']; $y++) {
                $isWater = $x < WorldSettings::MAP['waterBreadth']
                        || $y < WorldSettings::MAP['waterBreadth']
                        || $x > (WorldSettings::MAP['sizeX'] - WorldSettings::MAP['waterBreadth'])
                        || $y > (WorldSettings::MAP['sizeY'] - WorldSettings::MAP['waterBreadth']);

                if ($isWater) {
                    $map[$x][$y] = WorldSettings::GEOLOGY['Water'];

                    continue;
                }

                $map[$x][$y] = $this->isObject($x, $y)
                    ? WorldSettings::GEOLOGY['Plain']
                    : WorldSettings::DISTRIBUTION[$this->island->getLevel()][rand(0, 19)];
            }
        }

        return $map;
    }

    protected function isObject($positionX, $positionY)
    {
        foreach ($this->island->getObjects() as $object) {
            if ($object['positionX'] == $positionX && $object['positionY'] == $positionY) {
                return true;
            }
        }

        return false;
    }
}
