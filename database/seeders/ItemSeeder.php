<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Rice Meals
            ['category_id' => 1, 'name' => 'Chicken in a Bowl', 'description' => 'Tender grilled chicken with rice and vegetables', 'price' => 150, 'image' => null, 'status' => 1],
            ['category_id' => 1, 'name' => 'Sisig Rice Bowl', 'description' => 'Sizzling pork sisig served with garlic rice', 'price' => 140, 'image' => null, 'status' => 1],
            ['category_id' => 1, 'name' => 'Beef Tapa Rice', 'description' => 'Classic Filipino beef tapa with sunny-side egg', 'price' => 160, 'image' => null, 'status' => 1],
            ['category_id' => 1, 'name' => 'Pork Adobo Bowl', 'description' => 'Savory pork adobo with rice and egg', 'price' => 145, 'image' => null, 'status' => 1],
            ['category_id' => 1, 'name' => 'Longganisa Rice Meal', 'description' => 'Sweet and savory longganisa with garlic rice', 'price' => 135, 'image' => null, 'status' => 1],

            // Coffee
            ['category_id' => 2, 'name' => 'Espresso Small 12oz', 'description' => 'Rich and bold espresso shot', 'price' => 90, 'image' => null, 'status' => 1],
            ['category_id' => 2, 'name' => 'Espresso Large 16oz', 'description' => 'Double espresso for coffee lovers', 'price' => 110, 'image' => null, 'status' => 1],
            ['category_id' => 2, 'name' => 'Latte Small 12oz', 'description' => 'Smooth espresso with steamed milk', 'price' => 120, 'image' => null, 'status' => 1],
            ['category_id' => 2, 'name' => 'Latte Large 16oz', 'description' => 'Creamy latte served large', 'price' => 135, 'image' => null, 'status' => 1],
            ['category_id' => 2, 'name' => 'Cappuccino 12oz', 'description' => 'Foamy cappuccino with espresso base', 'price' => 125, 'image' => null, 'status' => 1],

            // Non Coffee
            ['category_id' => 3, 'name' => 'Iced Chocolate', 'description' => 'Sweet chocolate served over ice', 'price' => 110, 'image' => null, 'status' => 1],
            ['category_id' => 3, 'name' => 'Matcha Latte', 'description' => 'Creamy matcha with milk', 'price' => 130, 'image' => null, 'status' => 1],
            ['category_id' => 3, 'name' => 'Strawberry Milk', 'description' => 'Chilled milk with real strawberry flavor', 'price' => 115, 'image' => null, 'status' => 1],
            ['category_id' => 3, 'name' => 'Milk Tea Classic', 'description' => 'Classic black milk tea with pearls', 'price' => 120, 'image' => null, 'status' => 1],
            ['category_id' => 3, 'name' => 'Wintermelon Milk Tea', 'description' => 'Sweet and aromatic wintermelon tea', 'price' => 125, 'image' => null, 'status' => 1],

            // Snacks
            ['category_id' => 4, 'name' => 'French Fries', 'description' => 'Crispy golden fries with dipping sauce', 'price' => 80, 'image' => null, 'status' => 1],
            ['category_id' => 4, 'name' => 'Nachos', 'description' => 'Corn chips with cheese and beef', 'price' => 100, 'image' => null, 'status' => 1],
            ['category_id' => 4, 'name' => 'Chicken Nuggets', 'description' => 'Bite-sized crispy chicken pieces', 'price' => 90, 'image' => null, 'status' => 1],
            ['category_id' => 4, 'name' => 'Potato Wedges', 'description' => 'Seasoned potato wedges with dip', 'price' => 85, 'image' => null, 'status' => 1],
            ['category_id' => 4, 'name' => 'Cheesy Sticks', 'description' => 'Fried sticks filled with melted cheese', 'price' => 70, 'image' => null, 'status' => 1],

            // Pies
            ['category_id' => 5, 'name' => 'Apple Pie', 'description' => 'Classic apple filling in golden crust', 'price' => 65, 'image' => null, 'status' => 1],
            ['category_id' => 5, 'name' => 'Banana Pie', 'description' => 'Sweet banana pie with flaky crust', 'price' => 60, 'image' => null, 'status' => 1],
            ['category_id' => 5, 'name' => 'Chicken Pie', 'description' => 'Savory chicken filling in buttery pastry', 'price' => 75, 'image' => null, 'status' => 1],
            ['category_id' => 5, 'name' => 'Tuna Pie', 'description' => 'Tuna and creamy filling in hot crust', 'price' => 70, 'image' => null, 'status' => 1],
            ['category_id' => 5, 'name' => 'Beef Pie', 'description' => 'Ground beef and gravy in pie crust', 'price' => 75, 'image' => null, 'status' => 1],

            // Breads
            ['category_id' => 6, 'name' => 'Garlic Bread', 'description' => 'Toasted bread with garlic butter', 'price' => 55, 'image' => null, 'status' => 1],
            ['category_id' => 6, 'name' => 'Cheesy Roll', 'description' => 'Soft roll with gooey cheese inside', 'price' => 60, 'image' => null, 'status' => 1],
            ['category_id' => 6, 'name' => 'Ensaymada', 'description' => 'Filipino-style sweet bread with cheese', 'price' => 50, 'image' => null, 'status' => 1],
            ['category_id' => 6, 'name' => 'Pandesal', 'description' => 'Traditional Filipino breakfast roll', 'price' => 35, 'image' => null, 'status' => 1],
            ['category_id' => 6, 'name' => 'Ham and Cheese Bread', 'description' => 'Savory bread filled with ham and cheese', 'price' => 65, 'image' => null, 'status' => 1],
        ];

        foreach($items as $item){
            Item::factory()->create($item);
        }
    }
}
