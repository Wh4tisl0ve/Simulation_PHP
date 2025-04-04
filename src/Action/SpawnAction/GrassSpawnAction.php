<?php

namespace App\Action\SpawnAction;

use App\Entity\Entity;
use App\Entity\Static\Grass;

class GrassSpawnAction extends SpawnAction{
    public function getEntity(): Entity
    {
        return new Grass();
    }
}