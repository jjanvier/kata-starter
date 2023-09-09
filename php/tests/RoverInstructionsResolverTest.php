<?php

namespace KataStarter\Test;

use KataStarter\RoverInstructionsResolver;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class RoverInstructionsResolverTest extends TestCase
{
    /**
     * @dataProvider followedInstructions
     */
    public function test_the_rover_followed_the_instructions(
        $position,
        $instructions,
        $expectedFinalPosition,
    ) {
        $sut = new RoverInstructionsResolver(
            $position,
            $instructions,
        );
        Assert::assertEquals($expectedFinalPosition, $sut->getFinalPosition());
    }

    public function followedInstructions()
    {
        return [
            'Don\'t move' => ['1 2 N', '', '1 2 N'],
            'Move one cell' => ['1 2 N', 'M', '1 3 N'],
        ];
    }
}
