<?php

namespace Engine\CharacterClass;

use Engine\CharacterClass;
use Engine\Enum\AbilityEnum;
use Engine\Roll\Roll;
use Engine\Weapon;
use Engine\Armor\LightArmor;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Fighter extends CharacterClass
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

    /** @const array */
    protected const PROFICIENCIES = [
        LightArmor::class,
        /* MediumArmor::class, */
        /* HeavyArmor::class, */
        /* Shield::class, */
    ];

    public function __construct()
    {
        $this->hitDice = new Roll(1, 10);
    }

    /**
     * {@inheritdoc}
     */
    public function isProficientWith(object $skill) : bool
    {
        // Fighters are proficient with both martial and simple weapons.
        if ($skill instanceof Weapon) {
            return true;
        }

        return in_array(get_class($skill), self::PROFICIENCIES);
    }

    /**
     * {@inheritdoc}
     */
    public function getProficiencyBonus(int $level) : int
    {
        return self::PROFICIENCY_BONUSES[$level > 20 ? 20 : $level];
    }
}
