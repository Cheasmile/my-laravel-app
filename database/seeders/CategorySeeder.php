<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            
    [
        'name' => 'Espresso-Based Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Milk & Foam-Heavy Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Iced & Cold Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Traditional / Regional Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Sweet & Dessert Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Brew Method Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Bean Type / Specialty Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Modern & Trendy Coffees',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
];


        foreach ($categories as $category) {
            Category::insert($category);
        }
    }
}
