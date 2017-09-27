<?php

declare(strict_types=1);

namespace Engine;

use Engine\Enum\AbilityEnum;
use Engine\CharacterClass;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Character
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

    /** @var RollInterface */
    protected $attackRoll;

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
        /* $this->inventory = new Investory(); */
        $this->equipment = new Equipment();
        $this->hitPoints = $this->getMaxHitPoints();
        $this->attackRoll = new Roll(1, 20);
    }

    /**
     * @param AbilityEnum
     * @return int
     */
    public function getAbilityScore(AbilityEnum $ability) : int
    {
        return $this->race->getAbilityScoreIncrease($ability) + $this->abilityScores->get($ability);
    }

    /**
     * Returns the Modifier of an Ability.
     *
     * @return int
     */
    public function getAbilityModifier(AbilityEnum $ability) : int
    {
        return (int) floor(($this->getAbilityScore($ability) - 10) / 2);
    }

    /**
     * Maximum Hit points is calculated using the average roll of the hit dice
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
        $this->hitPoints = hitPoints;

        return $this;
    }

    /**
     * @return int
     */
    public function getHitPoints() : int
    {
        return $this->hitPoints;
    }

    /**
     * @return int
     */
    public function getAttackRoll() : int
    {
        return $this->attackRoll->roll();
    }

    public function getArmorClass() : int
    {
    }

    public function getDamageRoll() : int
    {
    }
}
