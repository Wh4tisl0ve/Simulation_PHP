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
        return;
    }
}