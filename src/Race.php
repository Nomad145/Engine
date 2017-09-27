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
     *     ['wisdom' => '-2, 'strength' => 4]
     */
    protected const ABILITY_SCORE_MODIFIERS = [];

    /**
     * @param AbilityEnum $ability
     * @return int|null
     */
    public function getAbilityScoreModifier(AbilityEnum $ability) : ?int
    {
        if (!array_key_exists((string) $ability, static::ABILITY_SCORE_MODIFIERS)) {
            return null;
        }

        return static::ABILITY_SCORE_MODIFIERS[(string) $ability];
    }
}
