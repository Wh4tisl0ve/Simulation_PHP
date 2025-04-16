<?php

namespace App\Action\SpawnAction;

use Exception;
use App\Entity\AbstractEntity;
use App\Action\AbstractAction;
use App\Map\Map;

abstract class AbstractSpawnAction extends AbstractAction
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
            } catch (Exception) {
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

    public abstract function getEntity(): AbstractEntity;
}