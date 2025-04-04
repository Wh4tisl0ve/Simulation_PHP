<?php

namespace App\Entity\Dynamic\Creature;

use App\Entity\Coordinate;
use App\Entity\Entity;

abstract class Creature extends Entity
{
    protected int $healthPoint;
    protected int $speed;

    function __construct(Coordinate $coordinate, int $healthPoint, int $speed)
    {
        parent::__construct($coordinate);
        $this->healthPoint = $healthPoint;
        $this->speed = $speed;
    }

    public abstract function makeMove();
}