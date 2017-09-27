<?php

namespace Engine;

use Engine\Enum\AbilityEnum;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class CharacterClass
{
    /**
     * The hit dice for determining the maximum hit points for a
     * character.  The Character's Class is responsible for
     * determining the dice that gets rolled.
     *
     * @var RollInterface
     */
    protected $hitDice;

    /**
     * Get the starting HP for the Character Class.
     *
     * The formula is the maximum value of the HitDice + the Hit
     * Point Modifier of the race.
     *
     * @return int
     */
    public function getStartingHitPoints() : int
    {
        return $this->hitDice->max();
    }

    /**
     * @return Roll
     */
    public function getHitDice() : RollInterface
    {
        return $this->hitDice;
    }
}
