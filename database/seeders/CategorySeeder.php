<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Espresso-Based Coffees', 'user_id' => 1],
            ['name' => 'Milk & Foam-Heavy Coffees', 'user_id' => 1],
            ['name' => 'Iced & Cold Coffees', 'user_id' => 1],
            ['name' => 'Traditional / Regional Coffees', 'user_id' => 1],
            ['name' => 'Sweet & Dessert Coffees', 'user_id' => 1],
            ['name' => 'Brew Method Coffees', 'user_id' => 1],
            ['name' => 'Bean Type / Specialty Coffees', 'user_id' => 1],
            ['name' => 'Modern & Trendy Coffees', 'user_id' => 1],
        ];

        foreach ($categories as $category) {
            // ប្រើ updateOrCreate ដើម្បីឆែកមើលឈ្មោះ
            // បើមានឈ្មោះហ្នឹងហើយ វានឹងមិនបញ្ចូលថ្មីទេ (ការពារការស្ទួន)
            Category::updateOrCreate(
                ['name' => $category['name']], // លក្ខខណ្ឌសម្រាប់ឆែក
                [
                    'user_id' => $category['user_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}