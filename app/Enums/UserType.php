<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const ADMIN = 'admin';
    const USER = 'user';

    public static function getUserType($role)
    {
        $typeName = [
            'admin' => __('Admin'),
            'user' => __('User'),
        ];
        return $typeName[$role];
    }
}
