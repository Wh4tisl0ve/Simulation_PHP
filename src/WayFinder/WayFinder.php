<?php

namespace App\WayFinder;

use App\Map\Map;

abstract class WayFinder
{
    private Map $map;

    function __construct(Map $map)
    {
        $this->map = $map;
    }

    public abstract function findWay(): array;

    public abstract function getMoves(): array;

    public abstract function getGoals(): array;
}