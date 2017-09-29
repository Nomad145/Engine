<?php

namespace Engine;

use Engine\Enum\AbilityEnum;
use Engine\Roll\CalculatedRollInterface;
use Engine\ProficiencyInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class CharacterClass implements ProficiencyInterface
{
    /**
     * The hit dice for determining the maximum hit points for a
     * character.  The Character's Class is responsible for
     * determining the dice that gets rolled.
     *
     * @var CalculatedRollInterface
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
    public function getHitDice() : CalculatedRollInterface
    {
        return $this->hitDice;
    }

    /**
     * Returns proficiency bonuses up to level 20.
     *
     * @param int $level
     * @return int
     */
    abstract public function getProficiencyBonus(int $level) : int;
}
