<?php

namespace Test\Factory;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Weapon;
use Engine\Roll\AttackRoll;
use Engine\Factory\AttackRollFactory;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRollFactoryTest extends TestCase
{
    public function setUp()
    {
        $this->character = $this->createMock(Character::class);
        $this->weapon = $this->createMock(Weapon::class);
    }
    public function testWithCharacterAndWeapon()
    {
        $subject = new AttackRollFactory();

        $attackRoll = $subject
            ->withCharacterAndWeapon(
                $this->character,
                $this->weapon
            );

        $this->assertInstanceOf(AttackRoll::class, $attackRoll);
    }
}
