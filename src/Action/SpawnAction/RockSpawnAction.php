<?php

namespace App\Action\SpawnAction;

use App\Entity\Entity;
use App\Entity\Static\Rock;

class RockSpawnAction extends SpawnAction{
    public function getEntity(): Entity
    {
        return new Rock();
    }
}