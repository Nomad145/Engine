<?php

namespace Engine\Roll;

use Engine\Character;
use Engine\Roll\RollInterface;
use Engine\Weapon\MeleeWeapon;
use Engine\Enum\AbilityEnum;
use Engine\Weapon;

/**
 * @todo: Account for spell attack rolls.
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var Weapon */
    protected $weapon;

    /** @var RollInterface */
    protected $roll;

    /**
     * @param Character $character
     * @param Weapon $weapon
     * @param RollInterface $roll
     */
    public function __construct(
        Character $character,
        Weapon $weapon,
        RollInterface $roll
    ) {
        $this->character = $character;
        $this->weapon = $weapon;
        $this->roll = $roll;
    }

    /**
     * Accounts for roll modifiers.
     *
     * {@inheritdoc}
     */
    public function roll() : int
    {
        $attack = $this->roll->roll();

        $modifier = $this->character->getAbilityModifier(
            $this->weapon->getModifier()
        );

        if (!$this->character->isProficientWith($this->weapon)) {
            return $attack + $modifier;
        }

        return $attack + $modifier + $this->character->getProficiencyBonus();
    }
}
