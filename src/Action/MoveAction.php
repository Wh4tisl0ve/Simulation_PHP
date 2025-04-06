<?php

namespace App\Action;

use App\Map\Map;
use App\WayFinder\AbstractWayFinder;

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
        $creatures = $this->map->getCreatures();
        foreach ($creatures as $coordinate => $creature) {
            $way = $this->wayFinder->findWay($coordinate);
            $creature->makeMove($way);
        }
    }
}