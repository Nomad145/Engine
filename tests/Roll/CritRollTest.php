<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\RollInterface;
use Engine\Roll\CritRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CritRollTest extends TestCase
{
    public function testRoll()
    {
        $roll = $this->createMock(RollInterface::class);

        $roll
            ->method('roll')
            ->willReturn(5);

        $subject = new CritRoll($roll);

        $this->assertEquals(10, $subject->roll());
    }
}
