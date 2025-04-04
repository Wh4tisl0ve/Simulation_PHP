<?php

namespace App\Map\Renderer;

use App\Entity\Coordinate;
use App\Map\Map;

class ConsoleRenderer implements RendererInterface
{
    public function render(Map $map): void
    {
        [$height, $width] = $map->getSize();

        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $coordinate = new Coordinate($i, $j);
                if (!$map->isOccupiedCoordinate($coordinate)) {
                    echo "🏾";
                } else {
                    echo "👽";
                }
            }
        }
    }
}