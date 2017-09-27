<?php

namespace Item\Weapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Sword extends Weapon implements RollInterface
{
    public function __construct()
    {
        $this->damage = new Roll(1, 8);
        $this->type = 'slashing';
        $this->weight = 3;
    }

    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return $this->damage->roll();
    }
}
