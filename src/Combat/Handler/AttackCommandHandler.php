<?php

namespace Engine\Combat\Handler;

use Engine\Combat\Command\AttackCommand;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommandHandler // implements CommandHandlerInterface
{
    /**
     * @param AttackCommand $command
     * @return void
     */
    public function handle(AttackCommand $command) : void
    {
        $character = $command->getCharacter();
        $target = $command->getTarget();

        // Much, much better.
        /* $attackRoll = (new AttackRoll($character))->roll(); */

        $attackRoll = $character->getAttackRoll();

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
