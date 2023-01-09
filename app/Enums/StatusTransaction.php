<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusTransaction extends Enum
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const COMPLETED = 'completed';
    const CANCELED = 'canceled';

    public static function getTypeStatus($status)
    {
        $typeStatus = [
            'pending' => __('pending'),
            'processing' => __('processing'),
            'completed' => __('completed'),
            'canceled' => __('canceled'),
        ];
        return $typeStatus[$status];
    }
}
