<?php

namespace KataStarter;

class RoverInstructionsResolver
{

    public function __construct(
        private readonly string $position,
        private readonly string $instructions,
    ) {
    }

    public function getFinalPosition(): string
    {
        $positionArray = \explode(' ', $this->position);
        $rover = new Rover(...$positionArray);

        $this->giveInstructionsTo($rover);

        return \implode(' ', [
            $rover->getX(),
            $rover->getY(),
            $rover->getDirection()
        ]);
    }

    private function giveInstructionsTo(Rover $rover): void
    {
        foreach (str_split($this->instructions) as $instruction) {
            switch ($instruction) {
                case 'M':
                    $rover->moveForward();
                    break;
            }
        }
    }
}
