<?php

namespace App\Action;

use App\Map\Map;
use App\WayFinder\WayFinder;

class MoveAction extends Action
{
    private WayFinder $wayFinder;

    function __construct(Map $map, WayFinder $wayFinder)
    {
        parent::__construct($map);
        $this->wayFinder = $wayFinder;
    }

    public function perform(): void
    {
        $creatures = $this->map->getCreatures();
        foreach ($creatures as $creature) {
            $way = $this->wayFinder->findWay();
            $creature->makeMove();
        }
    }
}