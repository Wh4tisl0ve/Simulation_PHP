<?php

namespace App\Entity\Dynamic;

use App\Entity\AbstractEntity;
use App\Map\Map;

abstract class AbstractCreature extends AbstractEntity
{
    protected int $healthPoint;
    protected int $speed;
    protected string $food;

    function __construct(int $healthPoint, int $speed)
    {
        $this->healthPoint = $healthPoint;
        $this->speed = $speed;
    }

    public abstract function makeMove(array $way, Map $map): void;

    public function getFood(): string
    {
        return $this->food;
    }
}