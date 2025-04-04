<?php

namespace App\Entity\Dynamic\Creature;

use App\Entity\Entity;

abstract class Creature extends Entity
{
    protected int $healthPoint;
    protected int $speed;

    function __construct(int $healthPoint, int $speed)
    {
        $this->healthPoint = $healthPoint;
        $this->speed = $speed;
    }

    public abstract function makeMove();
}