<?php

include "autoload.php";

use App\Map\Map;
use App\Map\Renderer\ConsoleRenderer;
use App\WayFinder\BreadthFirstSearch;
use App\Action\SpawnAction\{TreeSpawnAction, RockSpawnAction, DeerSpawnAction};
use App\Action\MoveAction;
use App\Simulation;


$map = new Map(5, 5);
$consoleRenderer = new ConsoleRenderer();
$wayFinder = new BreadthFirstSearch($map);

$spawnRates = json_decode(file_get_contents("../data/spawn_rates.json"), true);

$initActions = [
    new TreeSpawnAction($spawnRates['Tree'], $map),
    new RockSpawnAction($spawnRates['Rock'], $map),
    new DeerSpawnAction($spawnRates['Deer'], $map),
];
$turnActions = [
    new MoveAction($map, $wayFinder),
];

$simulation = new Simulation($map, $consoleRenderer, $initActions, $turnActions);
$simulation->startSimulation();

