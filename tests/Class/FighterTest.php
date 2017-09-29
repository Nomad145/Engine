<?php

namespace Test\CharacterClass;

use PHPUnit\Framework\TestCase;
use Engine\Weapon\Melee\Longsword;
use Engine\Armor\LightArmor;
use Engine\CharacterClass\Fighter;
use Engine\Enum\WeaponCategoryEnum;
use Engine\Roll\Roll;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class FighterTest extends TestCase
{
    public function testIsProficientWith()
    {
        $subject = new Fighter();

        $sword = new Longsword('Test Sword', 3, WeaponCategoryEnum::MARTIAL(), new Roll(1, 8));
        $lightArmor = new LightArmor();

        $this->assertTrue($subject->isProficientWith($sword));
        $this->assertTrue($subject->isProficientWith($lightArmor));
    }
}
