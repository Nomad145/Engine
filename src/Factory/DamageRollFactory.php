<?php

namespace Engine\Factory;

use Engine\Character;
use Engine\Weapon;
use Engine\Roll\DamageRoll;

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
        return new DamageRoll($character, $weapon, $bonusAction, $criticalHit);
    }
}
