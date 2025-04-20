<?php

namespace App\Action\SpawnAction;

use App\Entity\AbstractEntity;
use App\Entity\Dynamic\Predator\Wolf;

class WolfSpawnAction extends AbstractSpawnAction
{
    public function getEntity(): AbstractEntity
    {
        $healthPoint = rand(50, 100);
        $speed = rand(1, 2);
        $powerAttack = rand(5, 20);
        $attackRange = rand(1, 3);

        return new Wolf($healthPoint, $speed, $powerAttack, $attackRange);
    }
}