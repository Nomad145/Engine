<?php

namespace Engine;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
interface ProficiencyInterface
{
    /**
     * Returns true if the character or class implementing is proficient with
     * the weapon, skill, or armor.
     *
     * @param obect $skill
     * @return bool
     */
    public function isProficientWith(object $skill) : bool;
}
