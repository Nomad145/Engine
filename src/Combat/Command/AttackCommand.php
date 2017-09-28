<?php

namespace Engine\Combat\Command;

use Engine\Encounter;
use Engine\Character;
use Engine\Weapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AttackCommand
{
    /** @var Encounter */
    protected $encounter;

    /** @var Character */
    protected $character;

    /**
     * The weapon $character has chosen to attack with.
     *
     * @var Weapon
     */
    protected $weapon;

    /** @var Character */
    protected $target;

    /** @var bool */
    protected $bonusAction;

    public function __construct(
        Encounter $encounter,
        Character $character,
        Weapon $weapon,
        Character $target,
        bool $bonusAction = false
    ) {
        $this->encounter = $encounter;
        $this->character = $character;
        $this->weapon = $weapon;
        $this->target = $target;
        $this->bonusAction = $bonusAction;
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

    /**
     * @return Weapon
     */
    public function getWeapon() : Weapon
    {
        return $this->weapon;
    }

    /**
     * @return bool
     */
    public function getBonusAction() : bool
    {
        return $this->bonusAction;
    }
}
