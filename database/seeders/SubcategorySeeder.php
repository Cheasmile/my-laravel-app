<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
            [
                'name' => 'Football',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PingPong',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Volleyball',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Movie',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Song',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lifestyle',
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Weather',
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($subcategories as $subcat) {
            Subcategory::insert($subcat);
        }
    }
}
