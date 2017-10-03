<?php

namespace Engine\Service;

use Engine\Factory\InitiativeRollFactory;
use Engine\Character;
use Engine\Roll\InitiativeRoll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CombatOrderService
{
    /** @var InitiaveRollFactory */
    protected $initiativeFactory;

    public function __construct(InitiativeRollFactory $initiativeFactory)
    {
        $this->initiativeFactory = $initiativeFactory;
    }

    /**
     * Sorts an array by a character's initiative roll.
     *
     * @param array
     * @return array
     */
    public function sort(array $characters) : array
    {
        $rolls = array_map(
            function (Character $character) {
                return $this->initiativeFactory->withCharacter($character);
            },
            $characters
        );

        usort(
            $rolls,
            function ($a, $b) {
                return $a->roll() <=> $b->roll();
            }
        );

        return array_map(
            function (InitiativeRoll $roll) {
                return $roll->getCharacter();
            },
            $rolls
        );
    }
}
