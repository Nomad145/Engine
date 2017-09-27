<?php

namespace Engine\Factory;

use Engine\Roll\AttackRoll;
use Engine\Character;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRollFactory
{
    public function withCharacter(Character $character) : AttackRoll
    {
        return new AttackRoll($character);
    }
}
