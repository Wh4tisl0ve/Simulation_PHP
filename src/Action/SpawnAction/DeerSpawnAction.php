<?php

namespace App\Action\SpawnAction;

use App\Entity\Entity;
use App\Entity\Dynamic\Creature\Herbivore\Deer;

class DeerSpawnAction extends SpawnAction
{
    public function getEntity(): Entity
    {
        $healthPoint = rand(50, 100);
        $speed = rand(1, 2);

        return new Deer($healthPoint, $speed);
    }
}