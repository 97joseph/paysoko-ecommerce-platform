<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Add Categories
        Category::create([
            'title' => 'electronics',
            'image' => 'categories/electronics.jpg'
        ]);

        Category::create([
            'title' => 'utensils',
            'image' => 'categories/utensils.jpg'
        ]);

        Category::create([
            'title' => 'cooking',
            'image' => 'categories/kitchen.jpg'
        ]);

        Category::create([
            'title' => 'hardware',
            'image' => 'categories/hardware.jpg'
        ]);
    }
}
