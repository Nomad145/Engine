<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CritRoll implements RollInterface
{
    /**
     * @param RollInterface $roll
     */
    public function __construct(RollInterface $roll)
    {
        $this->roll = $roll;
    }

    /**
     * Rolls twice for critical hits.
     *
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return $this->roll->roll() + $this->roll->roll();
    }
}
