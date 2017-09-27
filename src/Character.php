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
    public function getAbilityScore(AbilityEnum $type) : int
    {
        return $this->race->getAbilityScoreModifier($type) + $this->abilityScores->get($type);
    }

    /**
     * @return int
     */
    public function getMaxHitPoints() : int
    {
        $hitPointModifier = $this
            ->race
            ->getAbilityScoreModifier(
                $this->class->getHitPointModifier()
            );

        $startingHitPoints = $this->class->getStartingHitPoints() + $hitPointModifier;

        if ($this->level === 1) {
            return $startingHitPoints;
        }

        return ($this->class->getHitDice()->avg() + $hitPointModifier)
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
