<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
interface CalculatedRollInterface extends RollInterface
{
    /**
     * Returns the average value of the dice.
     *
     * @return int
     */
    public function avg() : int;

    /**
     * Returns the max value of the dice.
     *
     * @return int
     */
    public function max() : int;
}
