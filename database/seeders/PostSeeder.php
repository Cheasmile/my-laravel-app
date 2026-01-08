<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'name' => 'Football',
                'detail' => 'Football',
                'user_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Volleyball',
                'detail' => 'Volleyball',
                'user_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Avatar',
                'detail' => 'Avatar',
                'user_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baby',
                'detail' => 'Justin Bieber',
                'user_id' => 1,
                'category_id' => 3,
                'subcategory_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Football',
                'detail' => 'Messi',
                'user_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Volleyball',
                'detail' => 'Game',
                'user_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John wick',
                'detail' => 'John wick3',
                'user_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hot Boy',
                'detail' => 'Vannda',
                'user_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            Post::insert($post);
        }
    }
}
