<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AdvantageRoll implements RollInterface
{
    /** @var RollInterface */
    protected $roll;

    public function __construct(RollInterface $roll)
    {
        $this->roll = $roll;
    }
    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return max($this->roll->roll(), $this->roll->roll());
    }
}
