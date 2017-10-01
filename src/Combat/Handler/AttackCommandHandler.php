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
        /** @var Character */
        $character = $command->getCharacter();

        /** @var Weapon */
        $weapon = $command->getWeapon();

        /** @var Character */
        $target = $command->getTarget();

        /* @var int */
        $attackRoll = $this
            ->attackRollFactory
            ->withCharacterAndWeapon(
                $character,
                $weapon
            )->roll();

        // @todo: Advantage/Disadvantage.

        // If the attack roll equals 1, the attack misses.
        // If the attack roll equals 20, the attack auto hits and is critical.
        // Otherwise, compare the attack roll with the target's armor class.
        // The attack roll must be greater than the target's Armor Class to hit.
        if ($attackRoll === 1 ||
            $attackRoll !== 20 &&
            $attackRoll < $target->getArmorClass()
        ) {
            return;
        }

        /* @var int */
        $damage = $this
            ->damageRollFactory
            ->withCharacterAndWeapon(
                $character,
                $weapon,
                $command->getBonusAction(),
                $attackRoll === 20
            )->roll();

        // @todo: Damage Types, Vulnerabilites, and Resistances.
        $target->setHitPoints($target->getHitPoints() - $damage);

        return;
    }
}
