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
        // @todo: Determine the weapon type by it's subclass.  There also might
        // not be a weapon equipped, so it may be necessary to have some
        // "unarmed" type.
        $modifier = $this->character->getAbilityModifier(
            $this->weapon instanceof MeleeWeapon ?
            AbilityEnum::STRENGTH() :
            AbilityEnum::DEXTERITY()
        );

        $proficiencyBonus = $this->character->isProficientWith($this->weapon) ?
            $this->character->getProficiencyBonus() :
            0;

        return $this->roll->roll() + $modifier + $proficiencyBonus;
    }

    /**
     * {@inheritdoc}
     */
    public function avg() : int
    {
        return $this->roll->avg();
    }

    /**
     * {@inheritdoc}
     */
    public function max() : int
    {
        return $this->roll->max();
    }
}
