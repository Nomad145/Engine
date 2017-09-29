<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Enum\AbilityEnum;
use Engine\Roll\DamageRoll;
use Engine\Weapon\MeleeWeapon;
use Engine\Roll\Roll;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRollTest extends TestCase
{
    public function setUp()
    {
        $this->character = $this->createMock(Character::class);
        $this->weapon = $this->createMock(MeleeWeapon::class);
        $roll = $this->createMock(RollInterface::class);

        $roll
            ->method('roll')
            ->willReturn(5);

        $this->weapon
            ->method('getDamage')
            ->willReturn($roll);

        $this->weapon
            ->method('getModifier')
            ->willReturn(AbilityEnum::STRENGTH());

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::STRENGTH())
            ->willReturn(3);
    }

    public function testRoll()
    {
        $subject = new DamageRoll($this->character, $this->weapon, $this->weapon->getDamage());
        $value = $subject->roll();

        $this->assertEquals(8, $value);
    }

    public function testRollAsBonusAction()
    {
        $subject = new DamageRoll($this->character, $this->weapon, $this->weapon->getDamage(), true);
        $value = $subject->roll();

        $this->assertEquals(5, $value);
    }
}
