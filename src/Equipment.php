<?php

namespace Engine;

use Engine\Armor\ArmorClassInterface;
use Engine\Armor;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Equipment implements ArmorClassInterface
{
    /** @var Armor */
    protected $armor;

    /** @var Shield */
    protected $shield;

    /** @var Weapon */
    protected $mainHand;

    /** @var Weapon */
    protected $offHand;

    /**
     * If no armor or shield is set, the AC is 0.
     *
     * {@inheritdoc}
     */
    public function getArmorClass() : int
    {
        return $this->armor->getArmorClass() ?? 0 + $this->shield->getArmorClass() ?? 0;
    }

    /**
     * @param Armor $armor
     * @return $this
     */
    public function setArmor(Armor $armor) : Equipment
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return Armor
     */
    public function getArmor() :? Armor
    {
        return $this->armor;
    }

    /**
     * @param Shield $shield
     * @return $this
     */
    public function setShield(Shield $shield) : Equipment
    {
        $this->shield = $shield;

        return $this;
    }

    /**
     * @return Shield
     */
    public function getShield() : ?Shield
    {
        return $this->shield;
    }

    /**
     * @param Weapon $mainHand
     * @return $this
     */
    public function setMainHand(Weapon $mainHand) : Equipment
    {
        $this->mainHand = $mainHand;

        return $this;
    }

    /**
     * @return Weapon
     */
    public function getMainHand() :? Weapon
    {
        return $this->mainHand;
    }

    /**
     * @param Weapon $offHand
     * @return $this
     */
    public function setOffHand(Weapon $offHand) : Equipment
    {
        $this->offHand = $offHand;

        return $this;
    }

    /**
     * @return Weapon
     */
    public function getOffHand() :? Weapon
    {
        return $this->offHand;
    }
}
