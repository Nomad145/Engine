<?php

namespace Engine\Roll;

use Engine\Character;
use Engine\Roll\RollInterface;
use Engine\Weapon\MeleeWeapon;
use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var RollInterface */
    protected $dice;

    /**
     * @param Character $character
     */
    public function __construct(Character $character, RollInterface $roll = null)
    {
        $this->character = $character;
        $this->dice = $roll ? : new Dice(20);
    }

    /**
     * Accounts for roll modifiers.
     *
     * {@inheritdoc}
     */
    public function roll() : int
    {
        $weapon = $this->character->getMainHand();

        // @todo: Determine the weapon type by it's subclass.  There also might
        // not be a weapon equipped, so it may be necessary to have some
        // "unarmed" type.
        $modifier = $this->character->getAbilityModifier(
            $weapon instanceof MeleeWeapon ?
            AbilityEnum::STRENGTH() :
            AbilityEnum::DEXTERITY()
        );

        $proficiencyBonus = $this->character->isProficientWith($weapon) ?
            $this->character->getProficiencyBonus() :
            0;

        return $this->dice->roll() + $modifier + $proficiencyBonus;
    }

    /**
     * {@inheritdoc}
     */
    public function avg() : int
    {
        return $this->dice->avg();
    }

    /**
     * {@inheritdoc}
     */
    public function max() : int
    {
        return $this->dice->max();
    }
}
