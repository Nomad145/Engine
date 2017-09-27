<?php

namespace Test\Engine\Combat\Handler;

use PHPUnit\Framework\TestCase;
use Engine\Encounter;
use Engine\Character;
use Engine\Combat\Command\AttackCommand;
use Engine\Combat\Handler\AttackCommandHandler;
use Engine\Factory\AttackRollFactory;
use Engine\Roll\AttackRoll;

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
        $this->factory = $this->createMock(AttackRollFactory::class);

        $this->factory
            ->method('withCharacter')
            ->willReturn($this->attackRoll);

        $this->command = new AttackCommand($this->encounter, $this->character, $this->target);
        $this->subject = new AttackCommandHandler($this->factory);
    }

    public function testSuccessfulAttackRoll()
    {
        $this->attackRoll
            ->method('roll')
            ->willReturn(18);

        $this->character
            ->expects($this->once())
            ->method('getDamageRoll')
            ->willReturn(10);

        $this->target
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

        $this->character
            ->expects($this->never())
            ->method('getDamageRoll');

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

        $this->character
            ->expects($this->never())
            ->method('getDamageRoll');

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

        $this->character
            ->expects($this->once())
            ->method('getDamageRoll')
            ->willReturn(10);

        $this->target
            ->expects($this->once())
            ->method('setHitPoints');

        $this->target
            ->expects($this->once())
            ->method('getHitPoints');

        $this->subject->handle($this->command);
    }
}
