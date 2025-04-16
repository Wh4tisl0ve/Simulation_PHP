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
                if ($map->isEmptyCoordinate($coordinate)) {
                    echo "\t🏾";
                } else {
                    $entity = $map->getEntity($coordinate);
                    $icon = $this->getIcon($entity::class);
                    echo "\t$icon";
                }
            }
            print("\n");
        }
        echo PHP_EOL;
    }

    public function getIcon(string $className): string
    {
        $icons = [
            "App\Entity\Static\Rock" => "⛰️",
            "App\Entity\Static\Grass" => "🌾",
            "App\Entity\Static\Tree" => "🌳",
            "App\Entity\Dynamic\Herbivore\Deer" => "🦌",
            "App\Entity\Dynamic\Predator\Wolf" => "🐺"
        ];

        if (!array_key_exists($className, $icons)) {
            return "👽";
        }

        return $icons[$className];
    }
}