<?php

namespace App\Entity\Dynamic\Predator;

use App\Entity\Dynamic\AbstractCreature;
use App\Entity\Dynamic\Herbivore\AbstractHerbivore;
use App\Map\Map;


abstract class AbstractPredator extends AbstractCreature
{
    protected int $powerAttack;
    protected string $food = AbstractHerbivore::class;

    function __construct(int $healthPoint, int $speed, int $powerAttack)
    {
        parent::__construct($healthPoint, $speed);
        $this->powerAttack = $powerAttack;
    }

    public function makeMove(array $way, Map $map): void
    {
        return;
    }

    public function migrate(): void
    {
        return;
    }

    public function attack(): void
    {
        return;
    }
}
