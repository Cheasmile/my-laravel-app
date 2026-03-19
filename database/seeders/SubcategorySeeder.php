<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
         
    [ 'name' => 'Espresso', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Double Espresso (Doppio)', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Ristretto', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Lungo', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Americano', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Long Black', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Cappuccino', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Latte', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Flat White', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Cortado', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Gibraltar', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Macchiato', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Latte Macchiato', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Mocha', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'White Mocha', 'user_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now() ],

   
    [ 'name' => 'Café au Lait', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café con Leche', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Viennese Coffee', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Babyccino', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Miel', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Flavored Latte', 'user_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now() ],


    [ 'name' => 'Iced Coffee', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Iced Latte', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Iced Americano', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Iced Mocha', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Cold Brew', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Nitro Cold Brew', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Flash Brew', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Japanese Iced Coffee', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Frappé', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Frappuccino', 'user_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now() ],


    [ 'name' => 'Turkish Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Greek Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Arabic Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Ethiopian Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Vietnamese Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Vietnamese Iced Coffee', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café Bombón', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café Cubano', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café con Miel', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café de Olla', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Kopi Tubruk', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Kopi Luwak', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Café Touba', 'user_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now() ],

    [ 'name' => 'Affogato', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Irish Coffee', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Baileys Coffee', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Chocolate Coffee', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Caramel Coffee', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Mocha Frappé', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Honey Coffee', 'user_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now() ],


    [ 'name' => 'Pour Over', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Drip Coffee', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'French Press', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'AeroPress', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Moka Pot Coffee', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Siphon Coffee', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Percolator Coffee', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Cowboy Coffee', 'user_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now() ],


    [ 'name' => 'Arabica Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Robusta Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Liberica Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Excelsa Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Single-Origin Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Blend Coffee', 'user_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now() ],

    [ 'name' => 'Bulletproof Coffee', 'user_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Butter Coffee', 'user_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Protein Coffee', 'user_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Dalgona Coffee', 'user_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
    [ 'name' => 'Mushroom Coffee', 'user_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now() ],


];

        foreach ($subcategories as $subcat) {
            Subcategory::insert($subcat);
        }
    }
}
