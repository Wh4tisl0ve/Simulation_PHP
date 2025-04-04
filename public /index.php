<?php

include "autoload.php";

use App\Map\Map;
use App\Map\Renderer\ConsoleRenderer;
use App\Action\SpawnAction\{TreeSpawnAction, RockSpawnAction};
use App\Simulation;


$map = new Map(5, 5);
$consoleRenderer = new ConsoleRenderer();

$initActions = [
    new TreeSpawnAction(0.4, $map),
    new RockSpawnAction(0.6, $map)
];
$turnActions = [];

$simulation = new Simulation($map, $consoleRenderer, $initActions, $turnActions);
$simulation->startSimulation();

