<?php

namespace Engine;

use Engine\Roll\RollInterface;
use Engin\Enum\WeaponCategoryEnum;

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
}
