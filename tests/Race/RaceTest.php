<?php

namespace Test\Race;

use PHPUnit\Framework\TestCase;
use Engine\Race\Dwarf;
use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class RaceTest extends TestCase
{
    public function testGetAbilityScoreIncrease()
    {
        $subject = new Dwarf();

        $this->assertEquals(2, $subject->getAbilityScoreIncrease(AbilityEnum::CONSTITUTION(), 2));
    }
}
