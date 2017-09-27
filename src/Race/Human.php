<?php

namespace Engine\Race;

use Engine\Race;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Human extends Race
{
    protected const ABILITY_SCORE_MODIFIERS = [
        'strength' => 1,
        'dexterity' => 1,
        'constitution' => 1,
        'intelligence' => 1,
        'wisdom' => 1,
        'charisma' => 1
    ];
}
