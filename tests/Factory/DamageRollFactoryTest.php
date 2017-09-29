<?php

namespace Test\Factory;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Weapon;
use Engine\Factory\DamageRollFactory;
use Engine\Roll\DamageRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRollFactoryTest extends TestCase
{
    public function setUp()
    {
        $this->character = $this->createMock(Character::class);
        $this->weapon = $this->createMock(Weapon::class);
    }
    public function testWithCharacterAndWeapon()
    {
        $subject = new DamageRollFactory();

        $attackRoll = $subject
            ->withCharacterAndWeapon(
                $this->character,
                $this->weapon
            );

        $this->assertInstanceOf(DamageRoll::class, $attackRoll);
    }
}
