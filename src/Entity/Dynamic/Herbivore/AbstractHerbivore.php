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
        $currentCoordinate = array_shift($way);
        $goalCoordinate = $way[count($way) - 1];

        if ($this->speed < count($way)) {
            $goalCoordinate = $way[$this->speed - 1];
        }
        else{
            $map->removeEntity($goalCoordinate);
        }

        $map->removeEntity($currentCoordinate);
        $map->addEntity($goalCoordinate, $this);
    }
}