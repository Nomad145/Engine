<?php

namespace Engine\Weapon;

use Engine\Weapon;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class MeleeWeapon extends Weapon
{
    /**
     * @param string $name
     * @param int $weight
     * @param RollInterface $damage
     */
    public function __construct(string $name, int $weight, RollInterface $damage)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->damage = $damage;
    }
}
