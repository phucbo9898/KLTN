<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Bộ nhớ Ram',
                    'slug' => 'bo-nho-ram',
                    'type' => 'select',
                    'value' => '2GB; 4GB; 6GB; 8GB; 16GB; 32GB',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Độ phân giải',
                    'slug' => 'do-phan-giai',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Kích thước',
                    'slug' => 'kick-thuoc',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 4,
                    'name' => 'Socket',
                    'slug' => 'socket',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 5,
                    'name' => 'Khe cắm ram',
                    'slug' => 'khe-cam-ram',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 6,
                    'name' => 'Nhà sản xuất',
                    'slug' => 'nha-san-xuat',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 7,
                    'name' => 'Tốc độ xử lý',
                    'slug' => 'toc-do-xu-ly',
                    'type' => 'text',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 8,
                    'name' => 'Số luồng',
                    'slug' => 'so-luong',
                    'type' => 'number',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 9,
                    'name' => 'Số nhân',
                    'slug' => 'so-nhan',
                    'type' => 'number',
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
