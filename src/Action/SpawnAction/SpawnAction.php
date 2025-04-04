<?php

namespace App\Action\SpawnAction;

use Exception;
use App\Entity\Entity;
use App\Action\Action;
use App\Map\Map;

abstract class SpawnAction extends Action
{
    private float $spawnRate;

    function __construct(float $spawnRate, Map $map)
    {
        parent::__construct($map);
        $this->spawnRate = $spawnRate;
    }

    public function perform(): void
    {
        $countEntity = $this->calcCountEntity();

        for ($i = 0; $i < $countEntity; $i++) {
            try {
                $coordinate = $this->map->getEmptyCoordinate();
                $entity = $this->getEntity();

                $this->map->addEntity($coordinate, $entity);
            } catch (Exception $exc) {
                break;
            }
        }
    }

    public function calcCountEntity(): int
    {
        [$height, $width] = $this->map->getSize();
        $mapSquare = $height * $width;
        return floor(($this->spawnRate * $mapSquare));
    }

    public abstract function getEntity(): Entity;
}