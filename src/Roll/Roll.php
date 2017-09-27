<?php

namespace Engine\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Roll implements RollInterface
{
    /** @var RollInterface[] */
    protected $dice;

    /**
     * @param int $number The number of dice to roll.
     * @param int $sides The number of sides per dic.
     * @throws \InvalidArgumentException
     */
    public function __construct(int $number, int $sides)
    {
        if ($number === 0 || $sides === 0) {
            throw new \InvalidArgumentException();
        }

        $this->dice = array_map(
            function () use ($sides) {
                return new Dice($sides);
            },
            range(1, $number)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function roll() : int
    {
        return array_reduce(
            $this->dice,
            function ($sum, $dice) {
                return $sum += $dice->roll();
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function avg() : int
    {
        return $this->dice[0]->avg() * count($this->dice);
    }

    /**
     * {@inheritdoc}
     */
    public function max() : int
    {
        return $this->dice[0]->max() * count($this->dice);
    }
}
