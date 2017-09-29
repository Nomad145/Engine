<?php

namespace Test\Engine\Combat\Handler;

use PHPUnit\Framework\TestCase;
use Engine\Encounter;
use Engine\Character;
use Engine\Combat\Command\AttackCommand;
use Engine\Combat\Handler\AttackCommandHandler;
use Engine\Factory\AttackRollFactory;
use Engine\Roll\AttackRoll;
use Engine\Weapon\Melee\Longsword;
use Engine\Roll\Roll;
use Engine\Factory\DamageRollFactory;
use Engine\Roll\DamageRoll;
use Engine\Enum\WeaponCategoryEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommandHandlerTest extends TestCase
{
    public function setUp()
    {
        $this->encounter = $this->createMock(Encounter::class);
        $this->character = $this->createMock(Character::class);
        $this->target = $this->createMock(Character::class);
        $this->attackRoll = $this->createMock(AttackRoll::class);
        $this->damageRoll = $this->createMock(DamageRoll::class);
        $attackRollFactory = $this->createMock(AttackRollFactory::class);
        $damageRollFactory = $this->createMock(DamageRollFactory::class);
        $sword = new Longsword('Anduril', 3, WeaponCategoryEnum::MARTIAL(), new Roll(1, 10));

        $attackRollFactory
            ->method('withCharacterAndWeapon')
            ->willReturn($this->attackRoll);

        $damageRollFactory
            ->method('withCharacterAndWeapon')
            ->willReturn($this->damageRoll);

        $this->command = new AttackCommand($this->encounter, $this->character, $sword, $this->target);
        $this->subject = new AttackCommandHandler($attackRollFactory, $damageRollFactory);
    }

    public function testSuccessfulAttackRoll()
    {
        $this->attackRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(18);

        $this->damageRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(10);

        $this->target
            ->expects($this->once())
            ->method('getArmorClass')
            ->willReturn(10);

        $this->target
            ->expects($this->once())
            ->method('setHitPoints');

        $this->target
            ->expects($this->once())
            ->method('getHitPoints');

        $this->subject->handle($this->command);
    }

    public function testUnsuccessfulAttackRoll()
    {
        $this->attackRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(5);

        $this->target
            ->expects($this->once())
            ->method('getArmorClass')
            ->willReturn(10);

        $this->damageRoll
            ->expects($this->never())
            ->method('roll');

        $this->target
            ->expects($this->never())
            ->method('setHitPoints');

        $this->subject->handle($this->command);
    }

    public function testAttackRollOfOne()
    {
        $this->attackRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(1);

        $this->target
            ->expects($this->never())
            ->method('getArmorClass');

        $this->damageRoll
            ->expects($this->never())
            ->method('roll');

        $this->subject->handle($this->command);
    }

    public function testAttackRollOfTwenty()
    {
        $this->attackRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(20);

        $this->target
            ->expects($this->never())
            ->method('getArmorClass');

        $this->damageRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(10);

        $this->target
            ->expects($this->once())
            ->method('setHitPoints');

        $this->target
            ->expects($this->once())
            ->method('getHitPoints');

        $this->subject->handle($this->command);
    }

    public function testAttackRollSameAsArmorClass()
    {
        $this->attackRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(5);

        $this->damageRoll
            ->expects($this->once())
            ->method('roll')
            ->willReturn(10);

        $this->target
            ->expects($this->once())
            ->method('getArmorClass')
            ->willReturn(5);

        $this->subject->handle($this->command);
    }
}
