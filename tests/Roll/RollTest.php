<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class RollTest extends TestCase
{
    public function test2d6Roll()
    {
        $subject = new Roll(2, 6);
        $value = $subject->roll();

        $this->assertLessThanOrEqual(12, $value);
        $this->assertGreaterThanOrEqual(1, $value);
    }

    public function test2d12Avg()
    {
        $subject = new Roll(2, 12);
        $value = $subject->avg();

        $this->assertEquals(14, $value);
    }

    public function test4d10Max()
    {
        $subject = new Roll(4, 10);
        $value = $subject->sum();

        $this->assertEquals(40, $value);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testZeroValueDiceThrowsException()
    {
        new Roll(0, 0);
    }
}
