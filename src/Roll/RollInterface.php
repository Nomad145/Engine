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
}
