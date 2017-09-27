<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;
use Engine\Character;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var RollInterface */
    protected $roll;

    /** @var bool */
    protected $bonusAction;

    /** @var bool */
    protected $criticalHit;

    /**
     * todo: In the future, I want a method on RollInterface that increases the
     * number of dice so we can account for crits without passing the crit flag.
     */
    public function __construct(
        Character $character,
        RollInterface $roll,
        bool $bonus = false,
        bool $criticalHit = false
    ) {
        $this->character = $character;
        $this->roll = $roll;
        $this->bonusAction = $bonusAction;
        $this->criticalHit = $criticalHit;
    }

    public function roll() : int
    {
        $weapon = $this->character->getMainHand();

        // @todo: This is duplicated from the AttackRoll.
        if (!$bonusAction) {
            $modifier = $this->character->getAbilityModifier(
                $weapon instanceof MeleeWeapon ?
                AbilityEnum::STRENGTH() :
                AbilityEnum::DEXTERITY()
            );
        }

        $damage = $this->roll->roll();

        // @todo: Critical Hits should not be the concern of this class.  The
        // instance of RollInterface should be enough to specify the crit.
        if ($this->criticalHit) {
            $damage += $this->roll->roll;
        }

        return $damage + $modifier;
    }

    public function avg() : int
    {
        return $this->roll->avg();
    }

    public function max() : int
    {
        return $this->roll->max();
    }
}
