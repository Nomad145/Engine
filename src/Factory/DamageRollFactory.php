<?php

namespace Engine\Factory;

use Engine\Character;
use Engine\Weapon;
use Engine\Roll\DamageRoll;
use Engine\Roll\RollInterface;
use Engine\Roll\CritRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRollFactory
{
    public function withCharacterAndWeapon(
        Character $character,
        Weapon $weapon,
        bool $bonusAction = false,
        bool $criticalHit = false
    ) {
        $roll = $weapon->getDamage();

        return new DamageRoll(
            $character,
            $weapon,
            $criticalHit ? new CritRoll($roll) : $roll,
            $bonusAction
        );
    }
}
