<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Engine\Character;
use Engine\Enum\AbilityEnum;
use Engine\Race\Human;
use Engine\CharacterClass\Wizard;
use Engine\AbilityScores;
use Engine\Equipment;
use Engine\Armor\LightArmor;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CharacterTest extends TestCase
{
    public function setUp()
    {
        $abilityScores = new AbilityScores();

        array_walk(
            AbilityEnum::values(),
            function (AbilityEnum $ability, string $name) use ($abilityScores) {
                $abilityScores->set($ability, 10);
            }
        );

        $equipment = (new Equipment())
            ->setArmor(new LightArmor());

        $character = new Character('Gandalf', 9, new Human(), new Wizard(), $abilityScores);
        $character->setEquipment($equipment);

        $this->subject = $character;
    }

    public function testGetAbilityScore()
    {
        $constitution = $this->subject->getAbilityScore(AbilityEnum::CONSTITUTION());

        $this->assertEquals(11, $constitution);
    }

    public function testGetAbilityModifier()
    {
        $value = $this->subject->getAbilityModifier(AbilityEnum::CONSTITUTION());

        $this->assertEquals(0, $value);
    }

    public function testGetMaxHitPoints()
    {
        $maxHitPoints = $this->subject->getMaxHitPoints();

        $this->assertEquals(42, $maxHitPoints);
    }

    public function testGetArmorClass()
    {
        $this->assertEquals(11, $this->subject->getArmorClass());
    }
}
