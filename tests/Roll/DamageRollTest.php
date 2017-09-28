<?php

namespace Test\Roll;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Enum\AbilityEnum;
use Engine\Roll\DamageRoll;
use Engine\Weapon\MeleeWeapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRollTest extends TestCase
{
    public function setUp()
    {
        $this->character = $this->createMock(Character::class);
        $this->weapon = $this->createMock(MeleeWeapon::class);

        $this->weapon
            ->method('roll')
            ->willReturn(5);

        $this->character
            ->method('getAbilityModifier')
            ->with(AbilityEnum::STRENGTH())
            ->willReturn(3);
    }
    public function testRollWithoutCrit()
    {
        $subject = new DamageRoll($this->character, $this->weapon);
        $value = $subject->roll();

        $this->assertEquals(8, $value);
    }

    public function testRollWithCrit()
    {
        $subject = new DamageRoll($this->character, $this->weapon, false, true);
        $value = $subject->roll();

        $this->assertEquals(13, $value);
    }

    public function testRollAsBonusAction()
    {
        $subject = new DamageRoll($this->character, $this->weapon, true);
        $value = $subject->roll();

        $this->assertEquals(5, $value);
    }
}
