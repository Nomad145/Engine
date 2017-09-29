<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\RollInterface;
use Engine\Roll\AdvantageRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AdvantageRollTest extends TestCase
{
    public function testRoll()
    {
         $roll = $this->createMock(RollInterface::class);

         $roll
             ->method('roll')
             ->will($this->onConsecutiveCalls(2, 8));

         $subject = new AdvantageRoll($roll);

         $value = $subject->roll();

         $this->assertEquals(8, $value);
    }
}
