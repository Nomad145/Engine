<?php

namespace Engine\Combat\Handler;

use Engine\Combat\Command\AttackCommand;
use Engine\Factory\AttackRollFactory;
use Engine\Roll\AttackRoll;
use Engine\Factory\DamageRollFactory;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommandHandler // implements CommandHandlerInterface
{
    /** @var AttackRollFactory */
    protected $attackRollFactory;

    /** @var DamageRollFactory */
    protected $damageRollFactor;

    /**
     * @param AttackRollFactory $factory
     */
    public function __construct(
        AttackRollFactory $attackRollFactory,
        DamageRollFactory $damageRollFactory
    ) {
        $this->attackRollFactory = $attackRollFactory;
        $this->damageRollFactory = $damageRollFactory;
    }

    /**
     * @param AttackCommand $command
     * @return void
     */
    public function handle(AttackCommand $command) : void
    {
        $character = $command->getCharacter();
        $weapon = $command->getWeapon();
        $target = $command->getTarget();

        $attackRoll = ($this
            ->attackRollFactory
            ->withCharacterAndWeapon(
                $character,
                $weapon
            ))->roll();

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

        $damage = ($this
            ->damageRollFactory
            ->withCharacterAndWeapon(
                $character,
                $weapon,
                $command->getBonusAction(),
                $attackRoll === 20
            ))->roll();

        $target->setHitPoints($target->getHitPoints() - $damage);

        return;
    }
}
