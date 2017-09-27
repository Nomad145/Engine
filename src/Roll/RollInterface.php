<?php

namespace Engine\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
interface RollInterface
{
    /**
     * Returns a random roll from a die or a set of dice.
     *
     * @return int
     */
    public function roll() : int;

    /**
     * Returns the average value of the dice.
     *
     * @todo: Move this to anoter interface to comply with the ISP.
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
