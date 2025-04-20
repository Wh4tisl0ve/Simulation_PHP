<?php

namespace App\Entity\Dynamic;

use App\Entity\AbstractEntity;
use App\Entity\Coordinate;
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

    public function migrate(array $way, Map $map): void
    {
        $currentCoordinate = array_shift($way);
        $goalCoordinate = $way[count($way) - 2];

        if ($this->speed < count($way)) {
            $goalCoordinate = $way[$this->speed - 1];
        }

        $map->removeEntity($currentCoordinate);
        $map->addEntity($goalCoordinate, $this);
    }

    public function eat(Coordinate $currentCoordinate, Coordinate $goalCoordinate, Map $map): void
    {
        $map->removeEntity($currentCoordinate);
        $map->removeEntity($goalCoordinate);
        $map->addEntity($goalCoordinate, $this);
    }

    public function getFood(): string
    {
        return $this->food;
    }
}