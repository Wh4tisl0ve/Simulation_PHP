<?php

namespace App\Entity\Dynamic\Creature\Predator;

use App\Entity\Dynamic\Creature\Creature;

abstract class Predator extends Creature
{
    protected int $powerAttack;

    public function makeMove(): void
    {
        return;
    }

    public function migrate(): void
    {
        return;
    }

    public function attack(): void
    {
        return;
    }
}
