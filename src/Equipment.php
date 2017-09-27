<?php

namespace Engine;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Equipment
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
     * @param Armor $armor
     * @return $this
     */
    public function setArmor(Armor $armor) : Equipment
    {
        $this->armor = armor;

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
        $this->shield = shield;

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
        $this->mainHand = mainHand;

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
        $this->offHand = offHand;

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
