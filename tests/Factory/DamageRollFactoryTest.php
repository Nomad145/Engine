<?php

namespace Test\Factory;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Weapon;
use Engine\Factory\DamageRollFactory;
use Engine\Roll\DamageRoll;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRollFactoryTest extends TestCase
{
    public function setUp()
    {
        $this->character = $this->createMock(Character::class);
        $this->weapon = $this->createMock(Weapon::class);
        $roll = $this->createMock(RollInterface::class);

        $this->weapon
            ->method('getDamage')
            ->willReturn($roll);
    }

    public function testWithCharacterAndWeapon()
    {
        $subject = new DamageRollFactory();

        $damageRoll = $subject
            ->withCharacterAndWeapon(
                $this->character,
                $this->weapon
            );

        $this->assertInstanceOf(DamageRoll::class, $damageRoll);
    }
}
