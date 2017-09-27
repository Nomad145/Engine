<?php

declare(strict_types=1);

namespace Engine;

use Engine\Enum\AbilityEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AbilityScores
{
    /** @var int */
    protected $strength = 0;

    /** @var int */
    protected $intelligence = 0;

    /** @var int */
    protected $wisdom = 0;

    /** @var int */
    protected $dexterity = 0;

    /** @var int */
    protected $constitution = 0;

    /** @var int */
    protected $charisma = 0;

    /**
     * @param AbilityEnum $type
     * @return int
     */
    public function get(AbilityEnum $type) : int
    {
        return $this->$type;
    }

    /**
     * @param AbilityEnum $type
     * @param int $value
     * @return $this
     */
    public function set(AbilityEnum $type, int $value) : AbilityScores
    {
        $this->$type = $value;

        return $this;
    }
}
