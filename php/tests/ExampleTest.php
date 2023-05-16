<?php

namespace KataStarter\Test;

use KataStarter\Example;
use PHPUnit\Framework\TestCase;

/**
 * @covers KataStarter\Example
 */
class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function a_simple_addition()
    {
        $sut = new Example();

        $actual = $sut->add(8, 3);

        $this->assertEquals(11, $actual);
    }
}
