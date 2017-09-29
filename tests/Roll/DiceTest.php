<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\Dice;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DiceTest extends TestCase
{
    public function testRoll()
    {
        $subject = new Dice(6);
        $value = $subject->roll();

        $this->assertLessThanOrEqual(6, $value);
        $this->assertGreaterThanOrEqual(1, $value);
    }

    public function testAvg()
    {
        $subject1 = new Dice(6);
        $value1 = $subject1->avg();

        $subject2 = new Dice(8);
        $value2 = $subject2->avg();

        $subject3 = new Dice(10);
        $value3 = $subject3->avg();

        $this->assertEquals(4, $value1);
        $this->assertEquals(5, $value2);
        $this->assertEquals(6, $value3);
    }

    public function testSum()
    {
        $subject1 = new Dice(6);
        $value1 = $subject1->sum();

        $subject2 = new Dice(8);
        $value2 = $subject2->sum();

        $subject3 = new Dice(10);
        $value3 = $subject3->sum();

        $this->assertEquals(6, $value1);
        $this->assertEquals(8, $value2);
        $this->assertEquals(10, $value3);
    }
}
