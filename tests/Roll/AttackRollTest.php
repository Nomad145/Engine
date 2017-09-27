<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\RollInterface;
use Engine\Weapon\Melee\Longsword;
use Engine\Roll\Roll;
use Engine\Character;
use Engine\Roll\AttackRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRollTest extends TestCase
{
    public function testAttackRollWithProficiencyBonus()
    {
        $dice = $this->createMock(RollInterface::class);
        $character = $this->createMock(Character::class);
        $sword = new Longsword('Anduril', 3, new Roll(1, 10));

        $dice
            ->method('roll')
            ->willReturn(10);

        $character
            ->method('getMainHand')
            ->willReturn($sword);
        $character
            ->method('getAbilityModifier')
            ->willReturn(2);

        $character
            ->method('isProficientWith')
            ->willReturn(true);

        $character
            ->method('getProficiencyBonus')
            ->willReturn(2);

        $subject = new AttackRoll($character, $dice);
        $value = $subject->roll();

        $this->assertEquals(14, $value);
    }
}
