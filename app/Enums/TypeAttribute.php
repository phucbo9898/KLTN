<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TypeAttribute extends Enum
{
    const TEXT = 'text';
    const NUMBER = 'number';
    const NUMBERFLOAT = 'numberfloat';
    const SELECT = 'select';

    public static function getTypeAttr($type)
    {
        $typeAttr = [
            'text' => __('Text'),
            'number' => __('Number'),
            'numberfloat' => __('Number Float'),
            'select' => __('Select'),
        ];
        return $typeAttr[$type];
    }
}
