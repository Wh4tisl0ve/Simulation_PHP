<?php

namespace App\WayFinder;

use App\Entity\Coordinate;
use App\Map\EntityStorage;


class BreadthFirstSearch extends AbstractWayFinder
{
    public function findWay(Coordinate $startCoordinate, Coordinate $goalCoordinate): array
    {
        $visited = [];
        $searchQueue = [];
        $searchQueue[] = $startCoordinate;

        while (!empty($searchQueue)) {
            $currentCoordinate = array_pop($searchQueue);
            $visited[] = $currentCoordinate;
            $coordinateParentMap = new EntityStorage;

            if ($currentCoordinate === $goalCoordinate) {
                # build path
                return [];
            }

            $moves = $this->getMoves($currentCoordinate);
            foreach ($moves as $move) {
                if ($this->map->isEmptyCoordinate($move) && $this->map->isValidCoordinate($move)) {
                    if (!in_array($move, $visited)) {
                        $searchQueue[] = $move;
                        $coordinateParentMap[$move] = $currentCoordinate;
                    }
                }
            }
        }

        return [];
    }
}