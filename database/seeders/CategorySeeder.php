<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Rice Meal', 'status' => 1],
            ['id' => 2, 'name' => 'Coffee', 'status' => 1],
            ['id' => 3, 'name' => 'Non Coffee', 'status' => 1],
            ['id' => 4, 'name' => 'Snacks', 'status' => 1],
            ['id' => 5, 'name' => 'Pies', 'status' => 1],
            ['id' => 6, 'name' => 'Breads', 'status' => 1],
        ];

        foreach($categories as $category){
            Category::factory()->create($category);
        }
    }
}
