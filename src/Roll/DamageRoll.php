<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;
use Engine\Character;
use Engine\Weapon;
use Engine\Enum\AbilityEnum;
use Engine\Weapon\MeleeWeapon;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DamageRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var Weapon */
    protected $weapon;

    /** @var RollInterface */
    protected $roll;

    /** @var bool */
    protected $bonusAction;

    /**
     * @param Character $character
     * @param Weapon $weapon
     * @param RollInterface $roll
     * @param bool $bonusAction
     */
    public function __construct(
        Character $character,
        Weapon $weapon,
        RollInterface $roll,
        bool $bonusAction = false
    ) {
        $this->character = $character;
        $this->weapon = $weapon;
        $this->roll = $roll;
        $this->bonusAction = $bonusAction;
    }

    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        $damage = $this->roll->roll();

        if ($this->bonusAction) {
            return $damage;
        }

        $modifier = $this->character->getAbilityModifier(
            $this->weapon->getModifier()
        );

        return $damage + $modifier;
    }
}
