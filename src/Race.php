<?php

namespace Engine;

use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class Race
{
    /**
     * This constant determines race modifiers for ability scores.  Keys are
     * the stats, values are the modifier.
     *
     * Example:
     *     ['wisdom' => 2, 'strength' => 4]
     */
    protected const ABILITY_SCORE_INCREASE = [];

    /**
     * Returns the value of the ability score increase or 0.
     *
     * @param AbilityEnum $ability
     * @return int|null
     */
    public function getAbilityScoreIncrease(AbilityEnum $ability) : int
    {
        return static::ABILITY_SCORE_INCREASE[(string) $ability] ?? 0;
    }
}
