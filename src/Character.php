<?php

declare(strict_types=1);

namespace Engine;

use Engine\Enum\AbilityEnum;
use Engine\CharacterClass;
use Engine\Roll\Roll;
use Engine\Weapon;
use Engine\Armor\ArmorClassInterface;
use Engine\Equipment;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Character implements ArmorClassInterface
{
    /** @var string */
    protected $name;

    /** @var int */
    protected $level = 1;

    /** @var int */
    protected $experience = 0;

    /** @var int */
    protected $hitPoints = 0;

    /** @var CharacterClass */
    protected $class;

    /** @var Race */
    protected $race;

    /** @var AbilityScores */
    protected $abilityScores;

    /** @var Equipment */
    protected $equipment;

    /** @var Inventory */
    protected $inventory;

    public function __construct(
        string $name,
        int $level,
        Race $race,
        CharacterClass $class,
        AbilityScores $abilityScores
    ) {
        $this->name = $name;
        $this->level = $level;
        $this->race = $race;
        $this->class = $class;
        $this->abilityScores = $abilityScores;
        $this->hitPoints = $this->getMaxHitPoints();
        $this->equipment = new Equipment();
    }

    /**
     * @param Equipment $equipment
     * @return $this
     */
    public function setEquipment(Equipment $equipment) : Character
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * @return Equipment
     */
    public function getEquipment() : ?Equipment
    {
        return $this->equipment;
    }

    /**
     * Returns the ability score with the race increase.
     *
     * @param AbilityEnum
     * @return int
     */
    public function getAbilityScore(AbilityEnum $ability) : int
    {
        return $this->race->getAbilityScoreIncrease($ability) + $this->abilityScores->get($ability);
    }

    /**
     * Returns the Modifier of an Ability.  Modifiers are calculated by
     * subtracting 10 from the ability score and dividing by two rounded down.
     *
     * @return int
     */
    public function getAbilityModifier(AbilityEnum $ability) : int
    {
        return (int) floor(($this->getAbilityScore($ability) - 10) / 2);
    }

    /**
     * Maximum Hit points are calculated using the average roll of the hit dice
     * plus the constitution modifier times the character's level plus the
     * starting level HP.
     *
     * @return int
     */
    public function getMaxHitPoints() : int
    {
        $constModifier = $this->getAbilityModifier(AbilityEnum::CONSTITUTION());

        $startingHitPoints = $this->class->getStartingHitPoints() + $constModifier;

        if ($this->level === 1) {
            return $startingHitPoints;
        }

        return ($this->class->getHitDice()->avg() + $constModifier)
            * $this->level
            + $startingHitPoints;
    }

    /**
     * @param int $hitPoints
     * @return $this
     */
    public function setHitPoints(int $hitPoints) : Character
    {
        $this->hitPoints = $hitPoints;

        return $this;
    }

    /**
     * @return int
     */
    public function getHitPoints() : int
    {
        return $this->hitPoints;
    }

    public function getArmorClass() : int
    {
        return $this->equipment->getArmorClass();
    }

    /**
     * @todo: Need to check for proficiencies with weapons, armor, spell types,
     * etc.  Maybe `ProficiencyInterface`?  Maybe just deal with a collection
     * of classnames.
     *
     * @param Weapon $weapon
     * @return bool
     */
    public function isProficientWith(Weapon $weapon) : bool
    {
    }

    /**
     * Proficiency bonuses are determined by the class and the character
     * level.
     *
     * @return int
     */
    public function getProficiencyBonus() : int
    {
        $this->class->getProficiencyBonus($this->level);
    }
}
