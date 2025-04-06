<?php

namespace App\Entity\Dynamic;

use App\Entity\AbstractEntity;

abstract class AbstractCreature extends AbstractEntity
{
    protected int $healthPoint;
    protected int $speed;

    function __construct(int $healthPoint, int $speed)
    {
        $this->healthPoint = $healthPoint;
        $this->speed = $speed;
    }

    public abstract function makeMove(array $way): void;
}