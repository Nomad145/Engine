<?php

namespace Item\Armor;

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
