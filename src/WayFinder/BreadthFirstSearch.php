<?php

namespace App\WayFinder;

use App\Entity\Coordinate;
use App\Map\EntityStorage;


class BreadthFirstSearch extends AbstractWayFinder
{
    public function findWay(Coordinate $startCoordinate, Coordinate $goalCoordinate): array
    {
        $visited = [];
        $searchQueue = [$startCoordinate,];
        $coordinateParentMap = new EntityStorage;

        while (!empty($searchQueue)) {
            $currentCoordinate = array_shift($searchQueue);
            $visited[] = $currentCoordinate;

            if ($currentCoordinate == $goalCoordinate) {
                return $this->buildPath($coordinateParentMap, $goalCoordinate);
            }

            $moves = $this->getMoves($currentCoordinate);
            foreach ($moves as $move) {
                if ($move == $goalCoordinate || $this->map->isEmptyCoordinate($move)) {
                    if (!in_array($move, $visited) && $this->map->isValidCoordinate($move)) {
                        $searchQueue[] = $move;
                        $coordinateParentMap[$move] = $currentCoordinate;
                        $visited[] = $move;
                    }
                }
            }
        }

        return [];
    }

    public function buildPath(EntityStorage $coordinateParentMap, Coordinate $goalCoordinate): array
    {
        $path = [];
        $current = $goalCoordinate;

        while ($coordinateParentMap->offsetExists($current)) {
            $current = $coordinateParentMap[$current];
            array_unshift($path, $current);
        }

        return [...$path, $goalCoordinate];
    }
}