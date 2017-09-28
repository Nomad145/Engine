<?php

namespace Engine;

use Engine\Enum\AbilityEnum;
use Engine\Roll\CalculatedRollInterface;

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
     * @var CalculatedRollInterface
     */
    protected $hitDice;

    /**
     * An associative array of class profieciency bonuses.
     *
     * @var array
     */
    protected $proficiencyBonuses;

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
    public function getProficiencyBonus(int $level) : int
    {
        return $this->proficiencyBonuses[$level > 20 ? 20 : $level];
    }
}
