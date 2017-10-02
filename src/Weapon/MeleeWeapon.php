<?php

namespace Engine\Weapon;

use Engine\Weapon;
use Engine\Roll\RollInterface;
use Engine\Enum\WeaponCategoryEnum;
use Engine\Enum\AbilityEnum;
use Engine\Enum\DamageTypeEnum;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
abstract class MeleeWeapon extends Weapon
{
    /**
     * @param string $name
     * @param int $weight
     * @param RollInterface $damage
     */
    public function __construct(
        string $name,
        int $weight,
        WeaponCategoryEnum $category,
        RollInterface $damage,
        DamageTypeEnum $damageType
    ) {
        $this->name = $name;
        $this->weight = $weight;
        $this->category = $category;
        $this->damage = $damage;
        $this->damageType = $damageType;
    }

    /**
     * {@inheritdoc}
     */
    public function getModifier() : AbilityEnum
    {
        return AbilityEnum::STRENGTH();
    }
}
