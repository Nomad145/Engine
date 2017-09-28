<?php

namespace Engine;

use Engine\Armor\ArmorClassInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class Armor implements ArmorClassInterface
{
    /** @var int */
    protected $armorClass;

    /** @var int */
    protected $weight;

    /**
     * {@inheritdoc}
     */
    public function getArmorClass() : int
    {
        return $this->armorClass;
    }
}
