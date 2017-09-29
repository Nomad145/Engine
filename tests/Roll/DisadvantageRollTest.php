<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\RollInterface;
use Engine\Roll\DisadvantageRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DisadvantageRollTest extends TestCase
{
    public function testRoll()
    {
         $roll = $this->createMock(RollInterface::class);

         $roll
             ->method('roll')
             ->will($this->onConsecutiveCalls(2, 8));

         $subject = new DisadvantageRoll($roll);

         $value = $subject->roll();

         $this->assertEquals(2, $value);
    }
}
