<?php

namespace App\Entity\Dynamic\Predator;

use App\Entity\Coordinate;
use App\Entity\Dynamic\AbstractCreature;
use App\Entity\Dynamic\Herbivore\AbstractHerbivore;
use App\Map\Map;


abstract class AbstractPredator extends AbstractCreature
{
    protected int $powerAttack;
    protected string $food = AbstractHerbivore::class;
    protected int $attackRange;

    function __construct(int $healthPoint, int $speed, int $powerAttack, int $attackRange)
    {
        parent::__construct($healthPoint, $speed);
        $this->powerAttack = $powerAttack;
        $this->attackRange = $attackRange;
    }

    public function makeMove(array $way, Map $map): void
    {
        $currentCoordinate = $way[0];
        $goalCoordinate = $way[count($way) - 1];

        if (count($way) - 2 < $this->attackRange) {
            $this->attack($currentCoordinate, $goalCoordinate, $map);
        } else {
            $this->migrate($way, $map);
        }
    }

    public function attack(Coordinate $currentCoordinate, Coordinate $goalCoordinate, Map $map): void
    {
        $creature = $map->getEntity($goalCoordinate);
        $healthPoint = $creature->getHealthPoint() - $this->powerAttack;

        if ($healthPoint <= 0) {
            $this->eat($currentCoordinate, $goalCoordinate, $map);
        } else {
            $creature->setHealthPoint($healthPoint);
        }
    }
}
