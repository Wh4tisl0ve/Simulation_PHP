<?php

namespace App\Map;

use SplObjectStorage;

class EntityStorage extends SplObjectStorage
{
    public function getHash(object $object): string
    {
        [$x, $y] = $object->getCoordinates();
        return hash("md5", "Coordinate($x, $y)");
    }
}
