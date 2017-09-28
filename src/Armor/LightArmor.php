<?php

namespace Engine\Armor;

use Engine\Armor;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LightArmor extends Armor
{
    public function __construct()
    {
        $this->armorClass = 11;
        $this->weight = 8;
    }
}
