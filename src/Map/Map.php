<?php

namespace App\Map;

use App\Entity\Coordinate;
use App\Entity\Entity;
use Exception;

class Map
{
    private array $entities;
    private int $height;
    private int $width;

    function __construct(int $height, int $width)
    {
        $this->entities = [];
        $this->height = $height;
        $this->width = $width;
    }

    public function addEntity(Coordinate $coordinate, Entity $entity): void
    {
        if ($this->isOccupiedCoordinate($coordinate)) {
            throw new Exception('Координата занята!');
        }
        $this->entities[$coordinate->getHash()] = $entity;
    }

    public function getEntity(Coordinate $coordinate): Entity
    {
        if ($this->isOccupiedCoordinate($coordinate)) {
            throw new Exception('Такой координаты нет');
        }
        return $this->entities[$coordinate->getHash()];
    }

    public function isOccupiedCoordinate(Coordinate $coordinate): bool
    {
        return array_key_exists($coordinate->getHash(), $this->entities);
    }

    public function getSize(): array
    {
        return [$this->height, $this->width];
    }
}
