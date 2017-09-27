<?php

namespace Engine\Combat\Command;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class SpellCommand
{
    /** @var Encounter */
    protected $encounter;

    /** @var Character */
    protected $character;

    /** @var SpellInterface */
    protected $spell;

    /** @var Character[] */
    protected $targets;

    public function __construct(
        Encounter $encounter,
        Character $character,
        Spell $spell,
        array $targets
    ) {
        $this->encounter = $encounter;
        $this->character = $character;
        $this->spell = $spell;
        $this->targets = $targets;
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
    public function getCharacter() : ?Character
    {
        return $this->character;
    }

    /**
     * @return Spell
     */
    public function getSpell() : ?Spell
    {
        return $this->spell;
    }

    /**
     * @return array
     */
    public function getTargets() : ?array
    {
        return $this->targets;
    }
}
