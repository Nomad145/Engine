<?php

namespace Engine\Roll;

use Engine\Character;
use Engine\Roll\RollInterface;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var RollInterface */
    protected $dice;

    /**
     * @param Character $character
     */
    public function __construct(Character $character)
    {
        $this->character = $character;
        $this->dice = new Dice(20);
    }

    /**
     * Accounts for roll modifiers.
     *
     * {@inheritdoc}
     */
    public function roll() : int
    {
        $rollValue = $this->dice->roll();

        $rollValue += $this->character;
    }

    /**
     * {@inheritdoc}
     */
    public function avg() : int
    {
        return $this->dice->avg();
    }

    /**
     * {@inheritdoc}
     */
    public function max() : int
    {
        return $this->dice->max();
    }
}
