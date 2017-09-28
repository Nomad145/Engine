<?php

declare(strict_types=1);

namespace Engine;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Encounter
{
    /** @var int */
    protected $id;

    /** @var Character[] */
    protected $enemies;

    /** @var Character[] */
    protected $allies;

    /** @var Environment */
    protected $environment;

    /** @var int */
    protected $round;

    /**
     * @param array $enemies
     * @return $this
     */
    public function setEnemies(array $enemies) : Encounter
    {
        $this->enemies = $enemies;

        return $this;
    }

    /**
     * @return array
     */
    public function getEnemies() :? array
    {
        return $this->enemies;
    }

    /**
     * @param array $allies
     * @return $this
     */
    public function setAllies(array $allies) : Encounter
    {
        $this->allies = $allies;

        return $this;
    }

    /**
     * @return array
     */
    public function getAllies() : ?array
    {
        return $this->allies;
    }

    /**
     * @param int $round
     * @return $this
     */
    public function setRound(int $round) : Encounter
    {
        $this->round = $round;

        return $this;
    }

    /**
     * @return int
     */
    public function getRound() : ?int
    {
        return $this->round;
    }
}
