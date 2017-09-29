<?php

namespace Engine\CharacterClass;

use Engine\CharacterClass;
use Engine\Enum\AbilityEnum;
use Engine\Roll\Roll;
use Engine\ProficiencyInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Wizard extends CharacterClass implements ProficiencyInterface
{
    /**
     * Keys are levels, values are the bonus.
     *
     * @const array
     */
    protected const PROFICIENCY_BONUSES = [
        1 => 2,
        2 => 2,
        3 => 2,
        4 => 2,
        5 => 3,
        6 => 3,
        7 => 3,
        8 => 3,
        9 => 4,
        10 => 4,
        11 => 4,
        12 => 4,
        13 => 5,
        14 => 5,
        15 => 5,
        16 => 5,
        17 => 6,
        18 => 6,
        19 => 6,
        20 => 6
    ];

    /** @const ProficiencyCollection */
    protected const PROFICIENCIES = [
        /* Dagger::class, */
        /* Darts::class, */
        /* Sling::class, */
        /* Quarterstaff::class, */
        /* LightCrossbow::class */
    ];

    public function __construct()
    {
        $this->hitDice = new Roll(1, 6);
    }

    /**
     * {@inheritdoc}
     */
    public function isProficientWith(object $weapon) : bool
    {
        return in_array($skill, self::PROFICIENCIES);
    }

    /**
     * {@inheritdoc}
     */
    public function getProficiencyBonus(int $level) : int
    {
        return self::PROFICIENCY_BONUSES[$level > 20 ? 20 : $level];
    }
}
