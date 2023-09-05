<?php

declare(strict_types=1);

namespace KataStarter;

class Rover
{
    public function __construct(private int $x, private int $y, private string $direction)
    {
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function turnLeft(): void
    {
        $this->direction = match ($this->direction) {
            'N' => 'W',
            'W' => 'S',
            'S' => 'E',
            'E' => 'N',
        };
    }

    public function turnRight(): void
    {
        $this->direction = match ($this->direction) {
            'N' => 'E',
            'E' => 'S',
            'S' => 'W',
            'W' => 'N',
        };
    }

    public function moveForward(): void
    {
        switch ($this->direction) {
            case 'N':
                $this->y++;
                break;
            case 'S':
                $this->y--;
                break;
            case 'W':
                $this->x--;
                break;
            case 'E':
                $this->x++;
                break;
        }
    }
}
