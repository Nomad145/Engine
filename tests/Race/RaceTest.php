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
    public function testGetAbilityScoreModifier()
    {
        $subject = new Dwarf();

        $this->assertEquals(2, $subject->getAbilityScoreModifier(AbilityEnum::CONSTITUTION(), 2));
    }
}
