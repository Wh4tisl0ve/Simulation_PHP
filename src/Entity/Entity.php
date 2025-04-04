<?php

namespace App\Entity;


class Entity
{
    protected Coordinate $coordinate;

    function __construct(Coordinate $coordinate)
    {
        $this->coordinate = $coordinate;
    }
}