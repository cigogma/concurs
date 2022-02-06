<?php

namespace App\Modules\Kindom\Types;

use ReflectionClass;

class VirtueType
{
    const COURAGE = 'courage';
    const JUSTICE = 'justice';
    const MERCY = 'mercy';
    const GENEROSITY = 'generosity';
    const FAITH = 'faith';
    const NOBILITY = 'nobility';
    const HOPE = 'hope';
    const BATTLE_STRATEGY = 'battle_strategy';

    static function getValues()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
