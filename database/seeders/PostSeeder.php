<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run()
    {
        // 1. Ensure a user exists to own these posts
        $user = User::first() ?? User::factory()->create();

        $posts = [
    // --- CATEGORY 1: ESPRESSO BASED (IDs 1-15) ---
    ['name' => 'Espresso', 'category_id' => 1, 'subcategory_id' => 1, 'detail' => 'A concentrated shot of coffee produced by forcing hot water through finely-ground beans.', 'image' => 'https://images.unsplash.com/photo-1510707577719-af7c183f1e59?auto=format&fit=crop&w=600&q=80'],
    ['name' => 'Double Espresso (Doppio)', 'category_id' => 1, 'subcategory_id' => 2, 'detail' => 'Two shots of espresso, providing a double dose of caffeine and intensity.', 'image' => 'https://images.unsplash.com/photo-1579992357154-faf4bde95b3d'],
    ['name' => 'Ristretto', 'category_id' => 1, 'subcategory_id' => 3, 'detail' => 'A "short" shot of espresso made with the same amount of coffee but half the water.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Lungo', 'category_id' => 1, 'subcategory_id' => 4, 'detail' => 'An "extended" espresso where more water is pulled through the grounds for a milder taste.', 'image' => 'https://images.unsplash.com/photo-1611854779393-1b2da9d400fe'],
    ['name' => 'Americano', 'category_id' => 1, 'subcategory_id' => 5, 'detail' => 'Espresso diluted with hot water, giving it a similar strength to drip coffee.', 'image' => 'https://images.unsplash.com/photo-1551033406-611cf9a28f67'],
    ['name' => 'Long Black', 'category_id' => 1, 'subcategory_id' => 6, 'detail' => 'Espresso poured over hot water, preserving more crema than an Americano.', 'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93'],
    ['name' => 'Cappuccino', 'category_id' => 1, 'subcategory_id' => 7, 'detail' => 'Balanced parts of espresso, steamed milk, and a thick layer of milk foam.', 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d'],
    ['name' => 'Latte', 'category_id' => 1, 'subcategory_id' => 8, 'detail' => 'Espresso mixed with a generous amount of steamed milk and a thin layer of foam.', 'image' => 'https://images.unsplash.com/photo-1536939459926-301728717817'],
    ['name' => 'Flat White', 'category_id' => 1, 'subcategory_id' => 9, 'detail' => 'Espresso with velvet-textured microfoam milk, originating from Oceania.', 'image' => 'https://images.unsplash.com/photo-1599398054066-846f28917f38'],
    ['name' => 'Cortado', 'category_id' => 1, 'subcategory_id' => 10, 'detail' => 'Espresso cut with an equal amount of warm milk to reduce acidity.', 'image' => 'https://images.unsplash.com/photo-1534040385115-33dcb3acba5b'],
    ['name' => 'Gibraltar', 'category_id' => 1, 'subcategory_id' => 11, 'detail' => 'A larger cortado served in a specific Libbey glass, popular in specialty cafes.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
    ['name' => 'Macchiato', 'category_id' => 1, 'subcategory_id' => 12, 'detail' => 'A shot of espresso "marked" with a small amount of foamed milk.', 'image' => 'https://images.unsplash.com/photo-1485808191679-5f86510681a2'],
    ['name' => 'Latte Macchiato', 'category_id' => 1, 'subcategory_id' => 13, 'detail' => 'Steamed milk "marked" by a shot of espresso poured through it.', 'image' => 'https://images.unsplash.com/photo-1592663527359-cf6642f54cff'],
    ['name' => 'Mocha', 'category_id' => 1, 'subcategory_id' => 14, 'detail' => 'A latte blended with chocolate syrup or cocoa powder for a sweet treat.', 'image' => 'https://images.unsplash.com/photo-1578314675249-a6910f80cc4e'],
    ['name' => 'White Mocha', 'category_id' => 1, 'subcategory_id' => 15, 'detail' => 'A mocha variation using white chocolate sauce for a creamy, buttery flavor.', 'image' => 'https://images.unsplash.com/photo-1461023233037-e56c5607b46d'],

    // --- CATEGORY 2: CLASSIC MILK (IDs 16-21) ---
    ['name' => 'Café au Lait', 'category_id' => 2, 'subcategory_id' => 16, 'detail' => 'French-style coffee made with brewed coffee and hot milk.', 'image' => 'https://images.unsplash.com/photo-1512568400610-62da28bc8a13'],
    ['name' => 'Café con Leche', 'category_id' => 2, 'subcategory_id' => 17, 'detail' => 'Strong Spanish coffee combined with scalded milk.', 'image' => 'https://images.unsplash.com/photo-1542691457-cbb44ff35b9a'],
    ['name' => 'Viennese Coffee', 'category_id' => 2, 'subcategory_id' => 18, 'detail' => 'Black coffee topped with a thick dollop of whipped cream.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Babyccino', 'category_id' => 2, 'subcategory_id' => 19, 'detail' => 'A caffeine-free drink of frothed milk and cocoa for children.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Miel', 'category_id' => 2, 'subcategory_id' => 20, 'detail' => 'Espresso with honey, steamed milk, and a dusting of cinnamon.', 'image' => 'https://images.unsplash.com/photo-1522992319004-4989c795efff'],
    ['name' => 'Flavored Latte', 'category_id' => 2, 'subcategory_id' => 21, 'detail' => 'A standard latte enhanced with vanilla, hazelnut, or caramel syrups.', 'image' => 'https://images.unsplash.com/photo-1461023233037-e56c5607b46d'],

    // --- CATEGORY 3: COLD & ICED (IDs 22-31) ---
    ['name' => 'Iced Coffee', 'category_id' => 3, 'subcategory_id' => 22, 'detail' => 'Brewed coffee served chilled over ice cubes.', 'image' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c'],
    ['name' => 'Iced Latte', 'category_id' => 3, 'subcategory_id' => 23, 'detail' => 'Cold milk and espresso poured over ice for a refreshing drink.', 'image' => 'https://images.unsplash.com/photo-1517701553060-14cc4777ef76'],
    ['name' => 'Iced Americano', 'category_id' => 3, 'subcategory_id' => 24, 'detail' => 'Espresso shots added to cold water and ice.', 'image' => 'https://images.unsplash.com/photo-1551033406-611cf9a28f67'],
    ['name' => 'Iced Mocha', 'category_id' => 3, 'subcategory_id' => 25, 'detail' => 'A blend of chocolate, espresso, and cold milk over ice.', 'image' => 'https://images.unsplash.com/photo-1578314675249-a6910f80cc4e'],
    ['name' => 'Cold Brew', 'category_id' => 3, 'subcategory_id' => 26, 'detail' => 'Coffee grounds steeped in cold water for 12-24 hours for low acidity.', 'image' => 'https://images.unsplash.com/photo-1461023233037-e56c5607b46d'],
    ['name' => 'Nitro Cold Brew', 'category_id' => 3, 'subcategory_id' => 27, 'detail' => 'Cold brew infused with nitrogen for a creamy, stout-like head.', 'image' => 'https://images.unsplash.com/photo-1578314675249-a6910f80cc4e'],
    ['name' => 'Flash Brew', 'category_id' => 3, 'subcategory_id' => 28, 'detail' => 'Hot coffee brewed directly onto ice to preserve bright aromatics.', 'image' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c'],
    ['name' => 'Japanese Iced Coffee', 'category_id' => 3, 'subcategory_id' => 29, 'detail' => 'A precise pour-over method using ice to cool the coffee instantly.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
    ['name' => 'Frappé', 'category_id' => 3, 'subcategory_id' => 30, 'detail' => 'A Greek foam-covered iced coffee drink made from instant coffee.', 'image' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699'],
    ['name' => 'Frappuccino', 'category_id' => 3, 'subcategory_id' => 31, 'detail' => 'A blended iced coffee beverage topped with whipped cream.', 'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772'],

    // --- CATEGORY 4: WORLD & CULTURAL (IDs 32-44) ---
    ['name' => 'Turkish Coffee', 'category_id' => 4, 'subcategory_id' => 32, 'detail' => 'Finely ground beans simmered in a copper pot (cezve).', 'image' => 'https://images.unsplash.com/photo-1563884843476-b605809b0e35'],
    ['name' => 'Greek Coffee', 'category_id' => 4, 'subcategory_id' => 33, 'detail' => 'Similar to Turkish coffee, usually brewed with a thick foam.', 'image' => 'https://images.unsplash.com/photo-1563884843476-b605809b0e35'],
    ['name' => 'Arabic Coffee', 'category_id' => 4, 'subcategory_id' => 34, 'detail' => 'Brewed with cardamom and served in small cups called finjan.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Ethiopian Coffee', 'category_id' => 4, 'subcategory_id' => 35, 'detail' => 'Often part of a ceremony, known for bright and floral profiles.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
    ['name' => 'Vietnamese Coffee', 'category_id' => 4, 'subcategory_id' => 36, 'detail' => 'Strong drip coffee made with a Phin filter and condensed milk.', 'image' => 'https://images.unsplash.com/photo-1493856677181-229f8841a49a'],
    ['name' => 'Vietnamese Iced Coffee', 'category_id' => 4, 'subcategory_id' => 37, 'detail' => 'The iced version (Cà Phê Sữa Đá) of Vietnam\'s iconic coffee.', 'image' => 'https://images.unsplash.com/photo-1493856677181-229f8841a49a'],
    ['name' => 'Café Bombón', 'category_id' => 4, 'subcategory_id' => 38, 'detail' => 'Espresso layered over sweetened condensed milk.', 'image' => 'https://images.unsplash.com/photo-1592663527359-cf6642f54cff'],
    ['name' => 'Café Cubano', 'category_id' => 4, 'subcategory_id' => 39, 'detail' => 'Espresso shot whipped with demerara sugar to create "espumita".', 'image' => 'https://images.unsplash.com/photo-1510707577719-af7c183f1e59'],
    ['name' => 'Café con Miel', 'category_id' => 4, 'subcategory_id' => 40, 'detail' => 'Traditional Spanish honey coffee with spices.', 'image' => 'https://images.unsplash.com/photo-1522992319004-4989c795efff'],
    ['name' => 'Café de Olla', 'category_id' => 4, 'subcategory_id' => 41, 'detail' => 'Mexican coffee brewed in clay pots with cinnamon and raw sugar.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Kopi Tubruk', 'category_id' => 4, 'subcategory_id' => 42, 'detail' => 'Indonesian unfiltered "mud coffee" where grounds remain in the cup.', 'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93'],
    ['name' => 'Kopi Luwak', 'category_id' => 4, 'subcategory_id' => 43, 'detail' => 'Rare coffee made from beans fermented in a civet\'s digestive tract.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
    ['name' => 'Café Touba', 'category_id' => 4, 'subcategory_id' => 44, 'detail' => 'Senegalese coffee spiced with Guinea pepper.', 'image' => 'https://images.unsplash.com/photo-1510707577719-af7c183f1e59'],

    // --- CATEGORY 5: SPECIALTY (IDs 45-51) ---
    ['name' => 'Affogato', 'category_id' => 5, 'subcategory_id' => 45, 'detail' => 'A scoop of vanilla gelato "drowned" with hot espresso.', 'image' => 'https://images.unsplash.com/photo-1594631252845-29fc4586d5d7'],
    ['name' => 'Irish Coffee', 'category_id' => 5, 'subcategory_id' => 46, 'detail' => 'Coffee, Irish whiskey, and sugar, topped with cream.', 'image' => 'https://images.unsplash.com/photo-1591123720164-de1348028a82'],
    ['name' => 'Baileys Coffee', 'category_id' => 5, 'subcategory_id' => 47, 'detail' => 'Coffee mixed with Baileys Irish Cream liqueur.', 'image' => 'https://images.unsplash.com/photo-1591123720164-de1348028a82'],
    ['name' => 'Chocolate Coffee', 'category_id' => 5, 'subcategory_id' => 48, 'detail' => 'Brewed coffee enhanced with melted chocolate or syrup.', 'image' => 'https://images.unsplash.com/photo-1578314675249-a6910f80cc4e'],
    ['name' => 'Caramel Coffee', 'category_id' => 5, 'subcategory_id' => 49, 'detail' => 'A sweet blend of coffee and rich caramel drizzle.', 'image' => 'https://images.unsplash.com/photo-1461023233037-e56c5607b46d'],
    ['name' => 'Mocha Frappé', 'category_id' => 5, 'subcategory_id' => 50, 'detail' => 'A blended, icy chocolate-coffee treat.', 'image' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699'],
    ['name' => 'Honey Coffee', 'category_id' => 5, 'subcategory_id' => 51, 'detail' => 'A soothing drink using honey as the primary sweetener.', 'image' => 'https://images.unsplash.com/photo-1522992319004-4989c795efff'],

    // --- CATEGORY 6: BREW METHODS (IDs 52-59) ---
    ['name' => 'Pour Over', 'category_id' => 6, 'subcategory_id' => 52, 'detail' => 'Water poured over grounds in a filter for clean, bright flavor.', 'image' => 'https://images.unsplash.com/photo-1544787210-2211d64b5655'],
    ['name' => 'Drip Coffee', 'category_id' => 6, 'subcategory_id' => 53, 'detail' => 'Standard machine-brewed coffee, reliable and consistent.', 'image' => 'https://images.unsplash.com/photo-1544190153-060cbdaed511'],
    ['name' => 'French Press', 'category_id' => 6, 'subcategory_id' => 54, 'detail' => 'Immersion brewing that yields a full-bodied, heavy cup.', 'image' => 'https://images.unsplash.com/photo-1544190153-060cbdaed511'],
    ['name' => 'AeroPress', 'category_id' => 6, 'subcategory_id' => 55, 'detail' => 'A manual plunger-style brewer popular for travel and speed.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Moka Pot Coffee', 'category_id' => 6, 'subcategory_id' => 56, 'detail' => 'Stovetop espresso maker using steam pressure.', 'image' => 'https://images.unsplash.com/photo-1544190153-060cbdaed511'],
    ['name' => 'Siphon Coffee', 'category_id' => 6, 'subcategory_id' => 57, 'detail' => 'A theatrical vacuum brewing method using glass chambers.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
    ['name' => 'Percolator Coffee', 'category_id' => 6, 'subcategory_id' => 58, 'detail' => 'Coffee brewed by cycling boiling water through grounds.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Cowboy Coffee', 'category_id' => 6, 'subcategory_id' => 59, 'detail' => 'Rough-ground coffee boiled directly in water.', 'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93'],

    // --- CATEGORY 7: BEAN TYPES (IDs 60-65) ---
    ['name' => 'Arabica Coffee', 'category_id' => 7, 'subcategory_id' => 60, 'detail' => 'Premium beans known for sweetness and complex acidity.', 'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e'],
    ['name' => 'Robusta Coffee', 'category_id' => 7, 'subcategory_id' => 61, 'detail' => 'Hardy beans with higher caffeine and a bitter profile.', 'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e'],
    ['name' => 'Liberica Coffee', 'category_id' => 7, 'subcategory_id' => 62, 'detail' => 'Rare beans with an almond-shaped appearance and floral notes.', 'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e'],
    ['name' => 'Excelsa Coffee', 'category_id' => 7, 'subcategory_id' => 63, 'detail' => 'A subset of Liberica with tart, fruity characteristics.', 'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e'],
    ['name' => 'Single-Origin Coffee', 'category_id' => 7, 'subcategory_id' => 64, 'detail' => 'Coffee beans sourced from a single geographic location.', 'image' => 'https://images.unsplash.com/photo-1521127474489-d524412fd439'],
    ['name' => 'Blend Coffee', 'category_id' => 7, 'subcategory_id' => 65, 'detail' => 'A mix of different beans to create a balanced flavor profile.', 'image' => 'https://images.unsplash.com/photo-1580915411954-282cb1b0d780'],

    // --- CATEGORY 8: WELLNESS (IDs 66-70) ---
    ['name' => 'Bulletproof Coffee', 'category_id' => 8, 'subcategory_id' => 66, 'detail' => 'Coffee blended with grass-fed butter and MCT oil for energy.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Butter Coffee', 'category_id' => 8, 'subcategory_id' => 67, 'detail' => 'A simplified high-fat coffee used in ketogenic diets.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Protein Coffee', 'category_id' => 8, 'subcategory_id' => 68, 'detail' => 'Brewed coffee mixed with whey or collagen protein.', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd'],
    ['name' => 'Dalgona Coffee', 'category_id' => 8, 'subcategory_id' => 69, 'detail' => 'Whipped coffee cream made with instant coffee and sugar.', 'image' => 'https://images.unsplash.com/photo-1594133900913-44ec0ad54f85'],
    ['name' => 'Mushroom Coffee', 'category_id' => 8, 'subcategory_id' => 70, 'detail' => 'Coffee blended with medicinal mushroom extracts like Lion\'s Mane.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085'],
];

        foreach ($posts as $post) {
            Post::create([
                'name'           => $post['name'],
                'detail'         => $post['detail'],
                'category_id'    => $post['category_id'],
                'subcategory_id' => $post['subcategory_id'],
                'image'          => $post['image'],
                'user_id'        => $user->id, // This fixes the error!
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}