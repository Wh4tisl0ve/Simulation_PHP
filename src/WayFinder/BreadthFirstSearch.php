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
            $currentCoordinate = array_pop($searchQueue);
            $visited[] = $currentCoordinate;

            if ($currentCoordinate == $goalCoordinate) {
                return $this->buildPath($coordinateParentMap,$startCoordinate, $goalCoordinate);
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

    public function buildPath(EntityStorage $coordinateParentMap, Coordinate $startCoordinate, Coordinate $goalCoordinate): array
    {
        $current = $goalCoordinate;
        $path = [];

        while($current != $startCoordinate){
            $current = $coordinateParentMap[$current];
            array_unshift($path, $current);
        }

        return [...$path, $goalCoordinate];
    }
}