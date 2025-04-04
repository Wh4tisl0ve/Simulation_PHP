<?php

namespace App\Entity\Dynamic\Predator;

use App\Entity\Dynamic\Creature;

abstract class Predator extends Creature
{
    protected int $powerAttack;

    function __construct(int $healthPoint, int $speed, int $powerAttack)
    {
        parent::__construct($healthPoint, $speed);
        $this->powerAttack = $powerAttack;
    }

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
