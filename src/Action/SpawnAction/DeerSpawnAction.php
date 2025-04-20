<?php

namespace App\Action\SpawnAction;

use App\Entity\Dynamic\Herbivore\Deer;
use App\Entity\AbstractEntity;

class DeerSpawnAction extends AbstractSpawnAction
{
    public function getEntity(): AbstractEntity
    {
        $healthPoint = rand(50, 100);
        $speed = rand(1, 2);

        return new Deer($healthPoint, $speed);
    }
}