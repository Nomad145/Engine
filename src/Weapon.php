<?php

namespace Engine;

use Engine\Roll\RollInterface;
use Engin\Enum\WeaponCategoryEnum;
use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class Weapon implements RollInterface
{
    /** @var string */
    protected $name;

    /** @var int */
    protected $weight;

    /** @var RollInterface */
    protected $damage;

    /** @var WeaponCategoryEnum */
    protected $category;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return Roll
     */
    public function getDamage() : RollInterface
    {
        return $this->damage;
    }

    /**
     * @return int
     */
    public function getWeight() : int
    {
        return $this->weight;
    }

    /**
     * Used as a pass-through method for the weapon roll.
     *
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return $this->damage->roll();
    }

    /**
     * Returns either the 'martial' or 'simple' enumerable.
     *
     * @return WeaponCategoryEnum
     */
    public function getCategory() : WeaponCategoryEnum
    {
        return $this->category;
    }

    /**
     * Returns the ability modifier for the type of weapon.  Melee weapons will
     * return strength, ranged weapons will return dexterity enums.
     *
     * @todo: Skills, spells, etc may also need this method.  Consider an interface.
     *
     * @return AbilityEnum
     */
    abstract public function getModifier() : AbilityEnum;
}
