<?php

namespace App\Entity\Dynamic\Herbivore;

use App\Entity\Dynamic\AbstractCreature;
use App\Entity\Static\Grass;
use App\Map\Map;

abstract class AbstractHerbivore extends AbstractCreature
{
    protected string $food = Grass::class;

    public function makeMove(array $way, Map $map): void
    {
        $currentCoordinate = $way[0];
        $goalCoordinate = $way[count($way) - 1];

        if (count($way) - 2 >= $this->speed) {
            $this->migrate($way, $map);
        } else {
            $this->eat($currentCoordinate, $goalCoordinate, $map);
        }
    }

    public function setHealthPoint(int $healthPoint): void
    {
        $this->healthPoint = $healthPoint;
    }

    public function getHealthPoint(): int
    {
        return $this->healthPoint;
    }
}