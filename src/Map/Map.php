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

        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $coordinate = new Coordinate($i, $j);
                if ($this->isEmptyCoordinate($coordinate)) {
                    return $coordinate;
                }
            }
        }

        throw new Exception('Нет пустых координат на карте');
    }

    public function isEmptyCoordinate(Coordinate $coordinate): bool
    {
        return !array_key_exists($coordinate->getHash(), $this->entities);
    }
}
