<?php

namespace Engine\Factory;

use Engine\AbilityScores;
use Engine\Enum\AbilityEnum;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AbilityScoresFactory
{
    /**
     * @return AbilityScores
     */
    public function getRandomAbilityScores()
    {
        $abilityScores = new AbilityScores();

        foreach (AbilityEnum::values() as $key => $enum) {
            $abilityScores->set($enum, (new Roll(3, 6))->roll());
        }

        return $abilityScores;
    }
}
