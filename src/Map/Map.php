<?php

namespace App\Map;

use Exception;
use Generator;
use App\Entity\Dynamic\AbstractCreature;
use App\Entity\Coordinate;
use App\Entity\AbstractEntity;

class Map
{
    private EntityStorage $entities;
    private int $height;
    private int $width;

    function __construct(int $height, int $width)
    {
        $this->entities = new EntityStorage;
        $this->height = $height;
        $this->width = $width;
    }

    public function addEntity(Coordinate $coordinate, AbstractEntity $entity): void
    {
        if (!$this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Координата занята!');
        }
        $this->entities[$coordinate] = $entity;
    }

    public function getEntity(Coordinate $coordinate): AbstractEntity
    {
        if ($this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Такой координаты нет');
        }
        return $this->entities[$coordinate];
    }

    public function removeEntity(Coordinate $coordinate): void
    {
        if ($this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Такой координаты нет');
        }
        $this->entities->detach($coordinate);
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

    public function getCreatures(): Generator
    {
        foreach ($this->entities as $entity) {
            if ($entity instanceof AbstractCreature) {
                yield $entity;
            }
        }
    }

    public function isEmptyCoordinate(Coordinate $coordinate): bool
    {
        return !($this->entities->contains($coordinate));
    }
}
