<?php

namespace App\Map\Renderer;


use App\Map\Map;

interface RendererInterface
{
    public function render(Map $map): void;
}
