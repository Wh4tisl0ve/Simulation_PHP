<?php

namespace App\Action\SpawnAction;

use App\Entity\Entity;
use App\Entity\Static\Tree;

class TreeSpawnAction extends SpawnAction{
    public function getEntity(): Entity
    {
        return new Tree();
    }
}