<?php

namespace App\Map;

use Exception;
use Generator;
use App\Entity\Coordinate;
use App\Entity\AbstractEntity;

class Map
{
    private EntityStorage $entities;
    private int $width;
    private int $height;

    function __construct(int $width, int $height)
    {
        $this->entities = new EntityStorage;
        $this->width = $width;
        $this->height = $height;
    }

    public function addEntity(Coordinate $coordinate, AbstractEntity $entity): void
    {
        if (!$this->isEmptyCoordinate($coordinate)) {
            throw new Exception('Координата занята!');
        }
        if(!$this->isValidCoordinate($coordinate)){
            throw new Exception('Координата находится за пределами карты!');
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
        return [$this->width, $this->height];
    }

    public function getEmptyCoordinate(): Coordinate
    {
        $mapSquare = $this->height * $this->width;

        $x = rand(0, $this->width);
        $y = rand(0, $this->height);

        $coordinate = new Coordinate($x, $y);

        if ($mapSquare == count($this->entities)) {
            throw new Exception('Нет пустых координат на карте');
        }

        if ($this->isEmptyCoordinate($coordinate) && $this->isValidCoordinate($coordinate)) {
            return $coordinate;
        } else {
            return $this->getEmptyCoordinate();
        }
    }

    public function getEntitiesOnType(string $type): array
    {
        $entities = [];
        foreach ($this->entities as $coordinate) {
            $entity = $this->getEntity($coordinate);

            if ($entity instanceof $type) {
                $entities[] = $coordinate;
            }
        }
        return $entities;
    }

    public function isEmptyCoordinate(Coordinate $coordinate): bool
    {
        return !($this->entities->contains($coordinate));
    }

    public function isValidCoordinate(Coordinate $coordinate): bool
    {
        [$x, $y] = $coordinate->getCoordinates();
        return ($x >= 0 && $x < $this->width) && ($y >= 0 && $y < $this->height);
    }
}
