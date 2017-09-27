<?php

namespace Engine\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Dice implements RollInterface
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
    public function max() : int
    {
        return $this->sides;
    }
}
