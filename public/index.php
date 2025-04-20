<?php

include "autoload.php";

use App\Action\MoveAction;
use App\Action\SpawnAction\{DeerSpawnAction, GrassSpawnAction, RockSpawnAction, TreeSpawnAction, WolfSpawnAction};
use App\Map\Map;
use App\Map\Renderer\ConsoleRenderer;
use App\Simulation;
use App\WayFinder\BreadthFirstSearch;


$map = new Map(7, 7);
$consoleRenderer = new ConsoleRenderer();
$wayFinder = new BreadthFirstSearch($map);

$spawnRates = json_decode(file_get_contents(__DIR__ . "/../data/spawn_rates.json"), true);

$initActions = [
    new TreeSpawnAction($spawnRates['Tree'], $map),
    new RockSpawnAction($spawnRates['Rock'], $map),
    new DeerSpawnAction($spawnRates['Deer'], $map),
    new GrassSpawnAction($spawnRates['Grass'], $map),
    new WolfSpawnAction($spawnRates['Wolf'], $map),
];
$turnActions = [
    new MoveAction($map, $wayFinder),
];

$simulation = new Simulation($map, $consoleRenderer, $initActions, $turnActions);
$simulation->startSimulation();