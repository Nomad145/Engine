<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;
use Engine\Character;
use Engine\Weapon;
use Engine\Enum\AbilityEnum;
use Engine\Weapon\MeleeWeapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var Weapon */
    protected $weapon;

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
        Weapon $weapon,
        bool $bonusAction = false,
        bool $criticalHit = false
    ) {
        $this->character = $character;
        $this->weapon = $weapon;
        $this->bonusAction = $bonusAction;
        $this->criticalHit = $criticalHit;
    }

    public function roll() : int
    {
        $damage = $this->weapon->roll();

        // @todo: Critical Hits should not be the concern of this class.  The
        // instance of RollInterface should be enough to specify the crit.
        if ($this->criticalHit) {
            $damage += $this->weapon->roll();
        }

        // @todo: This is duplicated from the AttackRoll.
        if (!$this->bonusAction) {
            $modifier = $this->character->getAbilityModifier(
                // @todo: The weapon should hold the reference of the stat that
                // modifies the roll so this logic can be moved to
                // `MeleeWeapon` or `RangedWeapon`.  Consider an interface like
                // `WeaponInterface`.
                $this->weapon instanceof MeleeWeapon ?
                AbilityEnum::STRENGTH() :
                AbilityEnum::DEXTERITY()
            );
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
