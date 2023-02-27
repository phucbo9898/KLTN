<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ActiveHot extends Enum
{
    const YES = 'yes';
    const NO = 'no';

    public static function getHotName($hot)
    {
        $typeHot = [
            'yes' => __('Yes'),
            'no' => __('No'),
        ];
        return $typeHot[$hot];
    }
}
