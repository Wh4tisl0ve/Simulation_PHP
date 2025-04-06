<?php

namespace App\Entity;

class Coordinate
{
    private int $x;
    private int $y;

    function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getCoordinates(): array
    {
        return [$this->x, $this->y];
    }
}