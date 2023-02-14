<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ActiveStatus extends Enum
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    public static function getStatusName($status)
    {
        $typeStatus = [
            'active' => __('active'),
            'inactive' => __('inactive'),
        ];
        return $typeStatus[$status];
    }
}
