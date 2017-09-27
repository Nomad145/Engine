<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Roll\RollInterface;
use Engine\Weapon\Melee\Longsword;
use Engine\Roll\Roll;
use Engine\Character;
use Engine\Roll\AttackRoll;
use Engine\Enum\AbilityEnum;
use Engine\Weapon\Ranged\Longbow;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRollTest extends TestCase
{
    public function setUp()
    {
        $this->dice = $this->createMock(RollInterface::class);
        $this->character = $this->createMock(Character::class);

        $this->dice
            ->method('roll')
            ->willReturn(10);

        $this->character
            ->method('getProficiencyBonus')
            ->willReturn(2);
    }

    public function testMeleeAttackRollWithProficiencyBonus()
    {
        $sword = new Longsword('Anduril', 3, new Roll(1, 10));

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::STRENGTH())
            ->willReturn(4);

        $this->character
            ->method('isProficientWith')
            ->with($sword)
            ->willReturn(true);

        $subject = new AttackRoll($this->character, $sword, $this->dice);
        $value = $subject->roll();

        $this->assertEquals(16, $value);
    }

    public function testMeleeAttackRollWithoutProficiencyBonus()
    {
        $sword = new Longsword('Anduril', 3, new Roll(1, 10));

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::STRENGTH())
            ->willReturn(4);

        $this->character
            ->method('isProficientWith')
            ->with($sword)
            ->willReturn(false);

        $subject = new AttackRoll($this->character, $sword, $this->dice);
        $value = $subject->roll();

        $this->assertEquals(14, $value);
    }

    public function testRangedAttackRollWithProficiencyBonus()
    {
        $sword = new Longbow('Basic Bow', 3, new Roll(1, 5));

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::DEXTERITY())
            ->willReturn(-1);

        $this->character
            ->method('isProficientWith')
            ->with($sword)
            ->willReturn(true);

        $subject = new AttackRoll($this->character, $sword, $this->dice);
        $value = $subject->roll();

        $this->assertEquals(11, $value);
    }

    public function testRangedAttackRollWithoutProficiencyBonus()
    {
        $sword = new Longbow('Basic Bow', 3, new Roll(1, 5));

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::DEXTERITY())
            ->willReturn(-1);

        $this->character
            ->method('isProficientWith')
            ->with($sword)
            ->willReturn(false);

        $subject = new AttackRoll($this->character, $sword, $this->dice);
        $value = $subject->roll();

        $this->assertEquals(9, $value);
    }
}
