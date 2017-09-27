<?php

namespace Engine\Combat\Handler;

use Engine\Combat\Command\AttackCommand;
use Engine\Factory\AttackRollFactory;
use Engine\Roll\AttackRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommandHandler // implements CommandHandlerInterface
{
    /** @var AttackRollFactory */
    protected $factory;

    /**
     * @param AttackRollFactory $factory
     */
    public function __construct(AttackRollFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param AttackCommand $command
     * @return void
     */
    public function handle(AttackCommand $command) : void
    {
        $character = $command->getCharacter();
        $target = $command->getTarget();
        $attackRoll = ($this->factory->withCharacter($character))->roll();

        // If the attack roll equals 1, the attack misses.
        if ($attackRoll === 1) {
            return;
        }

        // If the attack roll equals 20, the attack hits and is a critical hit.
        if ($attackRoll !== 20) {
            // The attack roll must be greater than the target's Armor Class.
            if ($attackRoll <= $target->getArmorClass()) {
                return;
            }
        }

        $damage = $character->getDamageRoll();

        $target->setHitPoints($target->getHitPoints() - $damage);

        return;
    }
}
