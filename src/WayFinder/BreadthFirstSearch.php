<?php

namespace App\WayFinder;

use App\Entity\Coordinate;

class BreadthFirstSearch extends AbstractWayFinder
{
    public function findWay(Coordinate $startCoordinate): array
    {
        return [];
    }

    public function getMoves(Coordinate $coordinate): array
    {
        return [];
    }

    public function getGoals(): array
    {
        return [];
    }
}