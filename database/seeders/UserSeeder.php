<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'phone' => '0969908298',
                    'password' => Hash::make('123456'),
                    'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU',
                    'role' => 'admin',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'company',
                    'email' => 'user@gmail.com',
                    'phone' => '0964938256',
                    'password' => Hash::make('123456'),
                    'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU',
                    'role' => 'user',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'Vũ Ngọc Phúc',
                    'email' => 'phucbo9898@gmail.com',
                    'phone' => '0969908298',
                    'password' => Hash::make('123456'),
                    'avatar' => '',
                    'role' => 'admin',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => 'Test beta',
                    'email' => 'higirl0303@gmail.com',
                    'phone' => '0964938256',
                    'password' => Hash::make('123456'),
                    'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU',
                    'role' => 'user',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
