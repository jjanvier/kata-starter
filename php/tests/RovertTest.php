<?php

namespace KataStarter\Test;

use KataStarter\Rover;
use PHPUnit\Framework\TestCase;

/**
 * @todo
 * - Position = X + Y + facing
 * - Position peut pas être < 0 (x & y)
 * - Position peut pas être > x et y du terrain
 * - Facing que N S E W
 */
class RovertTest extends TestCase
{
    public function test_it_gives_its_position(): void
    {
        $sut = new Rover(0, 0, 'N');
        $this->assertSame(0, $sut->getX());
        $this->assertSame(0, $sut->getY());
        $this->assertSame('N', $sut->getDirection());
    }

    /**
     * @dataProvider provideTurnsLeft
     */
    public function test_it_turns_left(string $initialDirection, string $expectedDirection): void
    {
        $sut = new Rover(0, 0, $initialDirection);
        $sut->turnLeft();
        $this->assertSame($expectedDirection, $sut->getDirection());
    }

    /**
     * @dataProvider provideTurnsRight
     */
    public function test_it_turns_right(string $initialDirection, string $expectedDirection): void
    {
        $sut = new Rover(0, 0, $initialDirection);
        $sut->turnRight();
        $this->assertSame($expectedDirection, $sut->getDirection());
    }

    /**
     * @dataProvider provideMovesForward
     */
    public function test_it_moves_forward(string $initialDirection, int $expectedX, int $expectedY): void
    {
        $sut = new Rover(0, 0, $initialDirection);
        $sut->moveForward();
        $this->assertSame($expectedX, $sut->getX());
        $this->assertSame($expectedY, $sut->getY());
        $this->assertSame($initialDirection, $sut->getDirection());
    }

    public function provideTurnsLeft()
    {
        return [
            'fromNorth' => ['N', 'W'],
            'fromWest' => ['W', 'S'],
            'fromSouth' => ['S', 'E'],
            'fromEast' => ['E', 'N'],
        ];
    }

    public function provideTurnsRight()
    {
        return [
            'fromNorth' => ['N', 'E'],
            'fromEast' => ['E', 'S'],
            'fromSouth' => ['S', 'W'],
            'fromWest' => ['W', 'N'],
        ];
    }

    public function provideMovesForward()
    {
        return [
            'toNorth' => ['N', 0, 1],
            'toSouth' => ['S', 0, -1],
            'toWest' => ['W', -1, 0],
            'toEast' => ['E', 1, 0],
        ];
    }
}
