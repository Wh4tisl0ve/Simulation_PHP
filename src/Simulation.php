<?php

use App\Map\Map;
use App\Map\Renderer\RendererInterface;

class Simulation
{
    private Map $map;
    private RendererInterface $renderer;
    private array $initActions;
    private array $turnActions;

    public function startSimulation(): void
    {

    }

    public function pauseSimulation(): void
    {
        return;
    }

    public function nextTurn()
    {
        foreach ($this->turnActions as $action) {
            $action->perform();
        }
    }

}
