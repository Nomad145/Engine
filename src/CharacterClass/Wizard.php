<?php

namespace Engine\CharacterClass;

use Engine\CharacterClass;
use Engine\Enum\AbilityEnum;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Wizard extends CharacterClass
{
    public function __construct()
    {
        $this->hitPointModifier = AbilityEnum::CONSTITUTION();
        $this->hitDice = new Roll(1, 6);
    }
}
