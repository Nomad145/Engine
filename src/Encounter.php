<?php

declare(strict_types=1);

namespace Engine;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Encounter implements \Iterator
{
    /** @var int */
    protected $id;

    /**
     * The array of characters participating in the encounter sorted by their
     * turn order.
     *
     * @var Character[]
     */
    protected $characters;

    /** @var Environment */
    protected $environment;

    /** @var int */
    protected $round = 0;

    /**
     * The integer representing the current turn for the round.
     *
     * @var int
     */
    protected $currentTurn = 0;

    public function __construct(array $characters)
    {
        $this->characters = $characters;
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

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->characters[$this->currentTurn];
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->currentTurn;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->currentTurn++;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->currentTurn = 0;
        $this->round = $this->round++;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->characters[$this->currentTurn]);
    }
}
