<?php

include "autoload.php";

use App\Map\Map;
use App\Map\Renderer\ConsoleRenderer;
use App\WayFinder\BreadthFirstSearch;
use App\Action\SpawnAction\{
    TreeSpawnAction,
    RockSpawnAction,
    DeerSpawnAction,
    GrassSpawnAction,
    WolfSpawnAction
};
use App\Action\MoveAction;
use App\Simulation;


$map = new Map(5, 5);
$map->addEntity(new \App\Entity\Coordinate(3, 2), new \App\Entity\Dynamic\Predator\Wolf(100, 3, 5, 4));
$map->addEntity(new \App\Entity\Coordinate(2, 1), new \App\Entity\Dynamic\Herbivore\Deer(6, 1));
$map->addEntity(new \App\Entity\Coordinate(2, 0), new \App\Entity\Static\Grass());
$map->addEntity(new \App\Entity\Coordinate(1, 0), new \App\Entity\Static\Rock());
$map->addEntity(new \App\Entity\Coordinate(3, 0), new \App\Entity\Static\Tree());


$consoleRenderer = new ConsoleRenderer();
$wayFinder = new BreadthFirstSearch($map);

$spawnRates = json_decode(file_get_contents("../data/spawn_rates.json"), true);

$initActions = [
//    new TreeSpawnAction($spawnRates['Tree'], $map),
//    new RockSpawnAction($spawnRates['Rock'], $map),
//    new DeerSpawnAction($spawnRates['Deer'], $map),
//    new GrassSpawnAction($spawnRates['Grass'], $map),
//    new WolfSpawnAction($spawnRates['Wolf'], $map),
];
$turnActions = [
    new MoveAction($map, $wayFinder),
];

$simulation = new Simulation($map, $consoleRenderer, $initActions, $turnActions);
$simulation->startSimulation();