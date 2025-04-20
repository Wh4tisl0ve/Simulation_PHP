<?php

namespace App\Action\SpawnAction;

use App\Entity\AbstractEntity;
use App\Entity\Static\Grass;

class GrassSpawnAction extends AbstractSpawnAction{
    public function getEntity(): AbstractEntity
    {
        return new Grass();
    }
}