<?php

namespace App\WayFinder;

use App\Entity\Coordinate;

class BreadthFirstSearch extends AbstractWayFinder
{
    public function findWay(Coordinate $startCoordinate, Coordinate $goalCoordinate): array
    {
        $visited = [];
        $searchQueue = [];
        $searchQueue[] = $startCoordinate;

        while (!$searchQueue) {
            $coordinate = array_pop($searchQueue);

            if ($coordinate === $goalCoordinate) {
                # build path
                return [];
            }

            $moves = $this->getMoves($coordinate);
        }
        return [];
    }
}