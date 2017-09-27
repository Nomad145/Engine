<?php

namespace Engine\Combat\Command;

use Engine\Encounter;
use Engine\Character;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommand
{
    /** @var Encounter */
    protected $encounter;

    /** @var Character */
    protected $character;

    /** @var Character */
    protected $targets;

    public function __construct(
        Encounter $encounter,
        Character $character,
        Character $target
    ) {
        $this->encounter = $encounter;
        $this->character = $character;
        $this->target = $target;
    }
    /**
     * @return Encounter
     */
    public function getEncounter() : Encounter
    {
        return $this->encounter;
    }

    /**
     * @return Character
     */
    public function getCharacter() : Character
    {
        return $this->character;
    }

    /**
     * @return array
     */
    public function getTarget() : Character
    {
        return $this->target;
    }
}
