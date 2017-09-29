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
        // This would be great to reduce to.
        /*
            $damage = $this->weapon->roll();

            $modifier = $this->criticalHit->getAbilityModifier(
                $this->weapon->getModifier()
            );
        */

        $damage = $this->weapon->roll();

        // @todo: Critical Hits should not be the concern of this class.  The
        // instance of RollInterface should be enough to specify the crit.
        if ($this->criticalHit) {
            $damage += $this->weapon->roll();
        }

        if (!$this->bonusAction) {
            $modifier = $this->character->getAbilityModifier(
                $this->weapon->getModifier()
            );
        }

        return $damage + $modifier;
    }
}
