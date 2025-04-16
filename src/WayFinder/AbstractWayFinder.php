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

    public abstract function findWay(Coordinate $startCoordinate, Coordinate $goalCoordinate): array;

    public function getMoves(Coordinate $coordinate): array
    {
        [$x, $y] = $coordinate->getCoordinates();

        $coordinateUp = new Coordinate($x, $y + 1);
        $coordinateDown = new Coordinate($x, $y - 1);
        $coordinateRight = new Coordinate($x + 1, $y);
        $coordinateLeft = new Coordinate($x - 1, $y);

        return [$coordinateUp, $coordinateDown, $coordinateRight, $coordinateLeft];
    }
}