<?php

namespace Item;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Weapon
{
    /** @var string */
    protected $damage;

    /** @var string */
    protected $type;

    /** @var int */
    protected $weight;

    /**
     * @param Roll $Damage
     * @return $this
     */
    public function setDamage(Roll $Damage) : Weapon
    {
        $this->Damage = Damage;

        return $this;
    }

    /**
     * @return Roll
     */
    public function getDamage() :? Roll
    {
        return $this->Damage;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type) : Weapon
    {
        $this->type = type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType() :? string
    {
        return $this->type;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight(int $weight) : Weapon
    {
        $this->weight = weight;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight() :? int
    {
        return $this->weight;
    }
}
