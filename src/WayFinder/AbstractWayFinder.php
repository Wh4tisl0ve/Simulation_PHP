<?php

namespace App\WayFinder;

use App\Map\Map;
use App\Entity\Coordinate;

abstract class AbstractWayFinder
{
    protected Map $map;

    function __construct(Map $map)
    {
        $this->map = $map;
    }

    public abstract function findWay(Coordinate $startCoordinate): array;

    public abstract function getMoves(Coordinate $coordinate): array;

    public abstract function getGoals(): array;
}