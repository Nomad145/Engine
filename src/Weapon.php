<?php

namespace Engine;

use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class Weapon
{
    /** @var string */
    protected $name;

    /** @var int */
    protected $weight;

    /** @var RollInterface */
    protected $damage;

    /**
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @return Roll
     */
    public function getDamage() : ?RollInterface
    {
        return $this->Damage;
    }

    /**
     * @return int
     */
    public function getWeight() : ?int
    {
        return $this->weight;
    }
}
