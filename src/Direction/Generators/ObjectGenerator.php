<?php

namespace App\Direction\Generators;

use App\Direction\WorldSettings;
use App\Entity\Island;

class ObjectGenerator
{
    private static $distribution = [];

    public static function getDistribution(Island $island): array
    {
        foreach (WorldSettings::OBJECTS as $objectClassName =>  $objectParams) {
            for ($i = 0; $i < $objectParams['count']; $i++) {
                $object = static::setPosition(WorldSettings::DISTANCE[$objectClassName], $objectClassName);

                if (empty($object)) {
                    continue;
                }

                static::$distribution[$objectClassName][] = $object;
            }
        }

        $line = [];

        foreach (static::$distribution as $objectName => $objectList) {
            foreach ($objectList as $object) {
                $line[] = [
                    'positionX' => $object['positionX'],
                    'positionY' => $object['positionY'],
                    'imageId'   => $object['imageId'],
                    'type'      => $objectName,
                ];
            }
        }

        return $line;
    }

    protected static function setPosition(int $distance, string $objectClassName): array
    {
        $check = false;
        $positionX = $positionY = 0;

        $maxCount = 1000;

        while (!$check) {
            $maxCount--;
            $check = true;

            $positionX = rand(
                WorldSettings::MAP['waterBreadth'] + 1,
                WorldSettings::MAP['sizeX'] - WorldSettings::MAP['waterBreadth'] - 1
            );
            $positionY = rand(
                WorldSettings::MAP['waterBreadth'] + 1,
                WorldSettings::MAP['sizeY'] - WorldSettings::MAP['waterBreadth'] - 1
            );

            foreach (static::$distribution[$objectClassName] ?? [] as $pairPosition) {
                $absX = abs($pairPosition['positionX'] - $positionX);

                if ($absX < $distance) {
                    $check = false;

                    continue;
                }

                $absY = abs($pairPosition['positionY'] - $positionY);

                if ($absY < $distance) {
                    $check = false;

                    continue;
                }
            }

            foreach (static::$distribution as $objectName => $objectList) {
                if ($objectClassName == $objectName) {
                    continue;
                }

                foreach ($objectList as $pairPosition) {
                    $absX = abs($pairPosition['positionX'] - $positionX);

                    if ($absX < 2) {
                        $check = false;

                        continue;
                    }

                    $absY = abs($pairPosition['positionY'] - $positionY);

                    if ($absY < 2) {
                        $check = false;

                        continue;
                    }
                }
            }

            if (!$maxCount) {
                return [];
            }
        }

        return [
            'positionX' => $positionX,
            'positionY' => $positionY,
            'imageId'   => WorldSettings::OBJECTS[$objectClassName]['entityId'],
        ];
    }
}
