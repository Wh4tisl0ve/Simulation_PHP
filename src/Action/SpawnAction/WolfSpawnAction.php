<?php

namespace App\Action\SpawnAction;

use App\Entity\Entity;
use App\Entity\Dynamic\Predator\Wolf;

class WolfSpawnAction extends SpawnAction
{
    public function getEntity(): Entity
    {
        $healthPoint = rand(50, 100);
        $speed = rand(1, 2);
        $powerAttack = rand(5, 20);

        return new Wolf($healthPoint, $speed, $powerAttack);
    }
}