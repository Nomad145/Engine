<?php

namespace Engine\Factory;

use Engine\Roll\AttackRoll;
use Engine\Character;
use Engine\Roll\Roll;
use Engine\Weapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRollFactory
{
    public function withCharacterAndWeapon(Character $character, Weapon $weapon) : AttackRoll
    {
        return new AttackRoll($character, $weapon, new Roll(1, 20));
    }
}
