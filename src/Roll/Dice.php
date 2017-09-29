<?php

namespace Engine\Roll;

use Engine\Roll\CalculatedRollInterface;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Dice implements RollInterface, CalculatedRollInterface
{
    public function __construct(int $sides)
    {
        $this->sides = $sides;
    }

    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return rand(1, $this->sides);
    }

    /**
     * {@inheritdoc}
     */
    public function avg() : int
    {
        return ceil((1 + $this->sides) / 2);
    }

    /**
     * {@inheritdoc}
     */
    public function sum() : int
    {
        return $this->sides;
    }
}
