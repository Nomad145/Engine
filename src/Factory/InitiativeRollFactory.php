<?php

namespace Engine\Factory;

use Engine\Character;
use Engine\Roll\InitiativeRoll;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class InitiativeRollFactory
{
    public function withCharacter(Character $character) : InitiativeRoll
    {
        return new InitiativeRoll($character, new Roll(1, 20));
    }
}
