<?php

namespace App\Map;

use Exception;
use App\Entity\Coordinate;
use App\Entity\Entity;

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
        if (!$this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Координата занята!');
        }
        $this->entities[$coordinate->getHash()] = $entity;
    }

    public function getEntity(Coordinate $coordinate): Entity
    {
        if ($this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Такой координаты нет');
        }
        return $this->entities[$coordinate->getHash()];
    }

    public function removeEntity(Coordinate $coordinate): void
    {
        if ($this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Такой координаты нет');
        }
        unset($this->entities[$coordinate->getHash()]);
    }

    public function getSize(): array
    {
        return [$this->height, $this->width];
    }

    public function getEmptyCoordinate(): Coordinate
    {
        [$height, $width] = $this->getSize();
        $mapSquare = $height * $width;

        $x = rand(0, $height);
        $y = rand(0, $width);

        $coordinate = new Coordinate($x, $y);

        if ($mapSquare == count($this->entities)) {
            throw new Exception('Нет пустых координат на карте');
        }

        if ($this->isEmptyCoordinate($coordinate)) {
            return $coordinate;
        } else {
            return $this->getEmptyCoordinate();
        }
    }

    public function isEmptyCoordinate(Coordinate $coordinate): bool
    {
        return !array_key_exists($coordinate->getHash(), $this->entities);
    }
}
