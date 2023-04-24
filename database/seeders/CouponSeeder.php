<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'code' => 'SALE5',
                'sale' => 5,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'code' => 'SALE10',
                'sale' => 10,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'category_id' => 3,
                'code' => 'SALE15',
                'sale' => 15,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'category_id' => 4,
                'code' => 'SALE20',
                'sale' => 20,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'category_id' => 5,
                'code' => 'SALE25',
                'sale' => 25,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'category_id' => 6,
                'code' => 'SALE30',
                'sale' => 30,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'category_id' => 7,
                'code' => 'SALE35',
                'sale' => 35,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'category_id' => 8,
                'code' => 'SALE40',
                'sale' => 40,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'category_id' => 8,
                'code' => 'SALE50',
                'sale' => 50,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'category_id' => 1,
                'code' => 'SALE90',
                'sale' => 90,
                'expire_date' => Carbon::now()->add('days', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
