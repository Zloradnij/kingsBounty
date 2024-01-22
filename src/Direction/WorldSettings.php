<?php

namespace App\Direction;

class WorldSettings
{
    public const MAP = [
        'sizeX'           => 100,
        'sizeY'           => 100,
        'waterBreadth'    => 6,
        'positionX'       => 3,
        'positionY'       => 3,
        'CityCount'       => 5,
        'RockCount'       => 5,
        'CastleCount'     => 5,
        'KnightCount'     => 25,
        'minimalDistance' => 5,
    ];

    public const LEVEL = [
        1 => 'Plain',
        2 => 'Water',
        3 => 'Forest',
        4 => 'Mountains',
        5 => 'Desert',
    ];

    public const DEFAULT_LEVEL = 1;

    public const DISTRIBUTION = [
        1 => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 3, 3, 3, 4, 5],
        2 => [1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 4, 5],
//        0 => [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
    ];

    public const GEOLOGY = [
        'Plain'     => 1,
        'Water'     => 2,
        'Forest'    => 3,
        'Mountains' => 4,
        'Desert'    => 5,
    ];

    public const DISTANCE = [
        'Ship'    => 0,
        'City'    => 5,
        'Rock'    => 5,
        'Castle'  => 7,
        'Knight'  => 2,
        'Dragon'  => 18,
        'Wizard'  => 19,
        'Enemy'   => 3,
    ];

    public const OBJECTS = [
        'City'    => ['entityId' => 13, 'count' => 5],
        'Rock'    => ['entityId' => 14, 'count' => 5],
        'Castle'  => ['entityId' => 15, 'count' => 5],
        'Knight'  => ['entityId' => 16, 'count' => 25],
        'Dragon'  => ['entityId' => 18, 'count' => 2],
        'Wizard'  => ['entityId' => 19, 'count' => 1],
        'Enemy'   => ['entityId' => 20, 'count' => 10],
    ];

    public const SUCCESS_FIELDS = [
        1,
        5,
        12,
        17,
    ];

    public const HERO_SETTINGS = [
        'ship'       => ['success' => 1, 'positionX' => 0, 'positionY' => 0],
        'gulden'     => 100,
        'mana'       => 100,
        'reputation' => 100,
        'level'      => 1,
        'army'       => [],
        'spells'     => [],
        'workers'    => [],
        'maps'       => ['id' => self::LEVEL[1], 'part' => 3],
        'position'   => ['island' => 0, 'x' => 3, 'y' => 3],
    ];
}
