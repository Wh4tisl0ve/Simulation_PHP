<?php

namespace App\Action\SpawnAction;

use App\Entity\AbstractEntity;
use App\Entity\Static\Rock;

class RockSpawnAction extends AbstractSpawnAction{
    public function getEntity(): AbstractEntity
    {
        return new Rock();
    }
}