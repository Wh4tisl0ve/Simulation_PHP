<?php

namespace App\Action;


use App\Map\Map;

abstract class Action
{
    protected Map $map;

    function __construct(Map $map){
        $this->map = $map;
    }

    public abstract function perform(): void;
}
