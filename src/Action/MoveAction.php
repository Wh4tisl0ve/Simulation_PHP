<?php

namespace App\Action;

use App\Entity\Dynamic\AbstractCreature;
use App\WayFinder\AbstractWayFinder;
use App\Map\Map;


class MoveAction extends AbstractAction
{
    private AbstractWayFinder $wayFinder;

    function __construct(Map $map, AbstractWayFinder $wayFinder)
    {
        parent::__construct($map);
        $this->wayFinder = $wayFinder;
    }

    public function perform(): void
    {
        $creatures = $this->map->getEntityOnType(AbstractCreature::class);

        foreach ($creatures as $startCoordinate) {
            $creature = $this->map->getEntity($startCoordinate);

            $foods = $this->map->getEntityOnType($creature->getFood());

            $minWay = [];

            foreach ($foods as $goalCoordinate) {
                $way = $this->wayFinder->findWay($startCoordinate, $goalCoordinate);
                if (count($way) < count($minWay)) {
                    $minWay = $way;
                }
                if (count($minWay) == 1) {
                    break;
                }
            }

            $creature->makeMove($minWay, $this->map);
        }
    }
}