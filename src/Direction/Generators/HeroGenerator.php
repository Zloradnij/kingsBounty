<?php

namespace App\Direction\Generators;


use App\Direction\WorldSettings;

class HeroGenerator
{
    public function getNewHero(): array
    {
        $hero = WorldSettings::HERO_SETTINGS;

        return $hero;
    }
}
