<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AttributeType extends Enum
{
    const TEXT = 'text';
    const NUMBER = 'number';
    const NUMBER_FLOAT = 'number_float';
    const SELECT = 'select';

    public static function getAttributeType($type)
    {
        $data = [
            'text' => __('Text'),
            'Number' => __('Number'),
            'number_float' => __('Number float'),
            'select' => __('Select')
        ];

        return $data[$type];
    }
}
