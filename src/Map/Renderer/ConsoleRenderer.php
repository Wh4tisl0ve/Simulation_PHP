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
                    $entityName = basename(str_replace('\\', '/', $entity::class));
                    $icon = $this->getIcon($entityName);
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
            "Rock" => "⛰️",
            "Deer" => "🦌",
            "Grass" => "🌾",
            "Tree" => "🌳",
            "Wolf" => "🐺"
        ];

        if (!array_key_exists($className, $icons)) {
            return "👽";
        }

        return $icons[$className];
    }
}