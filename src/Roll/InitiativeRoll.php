<?php

namespace Engine\Roll;

use Engine\Roll\RollInterface;
use Engine\Character;
use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class InitiativeRoll implements RollInterface
{
    /** @var Character */
    protected $character;

    /** @var RollInterface */
    protected $roll;

    /**
     * @param Character
     */
    public function __construct(Character $character, RollInterface $roll)
    {
        $this->character = $character;
        $this->roll = $roll;
    }

    /**
     * @return Character
     */
    public function getCharacter() : Character
    {
        return $this->character;
    }

    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        $dexModifier = $this->character->getAbilityModifier(AbilityEnum::DEXTERITY());

        return $this->roll->roll() + $dexModifier;
    }
}
