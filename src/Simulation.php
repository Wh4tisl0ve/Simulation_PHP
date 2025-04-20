<?php

namespace App;

use App\Map\Map;
use App\Map\Renderer\RendererInterface;

class Simulation
{
    private Map $map;
    private RendererInterface $renderer;
    private array $initActions;
    private array $turnActions;

    function __construct(Map $map, RendererInterface $renderer, array $initActions, array $turnActions)
    {
        $this->map = $map;
        $this->renderer = $renderer;
        $this->initActions = $initActions;
        $this->turnActions = $turnActions;
    }

    public function startSimulation(): void
    {
        $this->performActions($this->initActions);
        $this->renderer->render($this->map);
        while (true) {
            $this->performActions($this->turnActions);
            $this->renderer->render($this->map);
            sleep(3);
        }
    }

    public function pauseSimulation(): void
    {
        return;
    }

    private function performActions(array $actions): void
    {
        foreach ($actions as $action) {
            $action->perform();
        }
    }
}
