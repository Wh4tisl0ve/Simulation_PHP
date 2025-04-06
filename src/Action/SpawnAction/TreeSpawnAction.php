<?php

namespace App\Action\SpawnAction;

use App\Entity\AbstractEntity;
use App\Entity\Static\Tree;

class TreeSpawnAction extends AbstractSpawnAction{
    public function getEntity(): AbstractEntity
    {
        return new Tree();
    }
}