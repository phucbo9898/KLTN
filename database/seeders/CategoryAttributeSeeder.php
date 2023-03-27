<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_attribute')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'attribute_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'attribute_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'attribute_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'attribute_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'category_id' => 2,
                'attribute_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'category_id' => 2,
                'attribute_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'category_id' => 2,
                'attribute_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'category_id' => 3,
                'attribute_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'category_id' => 3,
                'attribute_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
