<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'CPU - Bộ vi xử lý',
                    'slug' => 'cpu-bo-vi-xu-ly',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => 'VGA - Card màn hình',
                    'slug' => 'vga-card-man-hinh',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => 'Mainbroad - Bo mạch chủ',
                    'slug' => 'mainbroad-bo-mach-chu',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => 'RAM - Bộ nhớ',
                    'slug' => 'ram-bo-nho',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 5,
                    'name' => 'PSU - Nguồn máy tính',
                    'slug' => 'psu-nguon-may-tinh',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 6,
                    'name' => 'CPU - Bộ vi xử lý',
                    'slug' => 'cpu-bo-vi-xu-ly',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 7,
                    'name' => 'Tai nghe',
                    'slug' => 'tai-nghe',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 8,
                    'name' => 'Chuột - Bàn phím',
                    'slug' => 'chuot-ban-phim',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
