<?php

namespace App\Entity\Dynamic\Herbivore;

use App\Entity\Dynamic\AbstractCreature;

abstract class AbstractHerbivore extends AbstractCreature
{
    public function makeMove(array $way): void
    {
        return;
    }
}