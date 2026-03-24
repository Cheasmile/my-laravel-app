<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // កន្លែងនេះសំខាន់បំផុត៖ ប្រើ firstOrCreate ជំនួស factory()->create()
        // វាមានន័យថា៖ បើមាន email នេះហើយ កុំបញ្ចូលថ្មី តែបើមិនទាន់មាន ទើបបញ្ចូល
        User::firstOrCreate(
            ['email' => 'chea@gmail.com'], // លក្ខខណ្ឌសម្រាប់ឆែកមើល
            [
                'name' => 'chea',
                'password' => bcrypt('password123'), // កុំភ្លេចដាក់ password ផង
                'email_verified_at' => now(),
            ]
        );

        // បង្កើត User ផ្សេងៗទៀត ១០ នាក់ (ប្រើ factory)
        // ដើម្បីកុំឱ្យជាន់គ្នាជាមួយ chea@gmail.com យើងអាចប្រើ count() ធម្មតា
        if (User::count() < 11) {
            User::factory(10)->create();
        }

        // បន្ទាប់មកសឹមហៅ Seeder ផ្សេងៗ
        $this->call([
            CategorySeeder::class,
            SubcategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}