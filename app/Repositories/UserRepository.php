<?php

namespace App\Repositories;

use App\Enums\UserType;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function prepareUser(array $data)
    {
        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'avatar' => $data['image']
        ];

        return $user;
    }

    public function prepareRegister(array $data)
    {
        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => UserType::USER
        ];

        return $user;
    }

    public function prepareChangePassword(array $data)
    {
        $user = [
            'password' => bcrypt($data['passwordreset']),
        ];

        return $user;
    }
}
