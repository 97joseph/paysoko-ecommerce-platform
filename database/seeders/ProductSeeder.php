<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "title" => "Electric Kettle",
                "image" => "products/kettle.jpg",
                "about" => "Electric kettle for boiling water | kitchen appliances",
                "price" => rand(500, 3000),
                "stock_quantity" => rand(10, 50),
                "discount" => rand(1, 10) * 5,
                "category_id" => 1,
            ],
            [
                "title" => "Portable Radio",
                "image" => "products/radio.jpg",
                "about" => "Portable FM/AM radio | durable | battery-powered",
                "price" => rand(1000, 5000),
                "stock_quantity" => rand(5, 20),
                "discount" => rand(1, 8) * 5,
                "category_id" => 2,
            ],
            [
                "title" => "Bag of Cement",
                "image" => "products/cement.jpg",
                "about" => "50kg bag of cement | construction materials",
                "price" => rand(500, 1000),
                "stock_quantity" => rand(20, 100),
                "discount" => rand(0, 5) * 5,
                "category_id" => 3,
            ],
            [
                "title" => "Charcoal Stove",
                "image" => "products/charcoal_stove.jpg",
                "about" => "Efficient charcoal stove | eco-friendly",
                "price" => rand(300, 1500),
                "stock_quantity" => rand(15, 50),
                "discount" => rand(1, 10) * 5,
                "category_id" => 1,
            ],
            [
                "title" => "Solar Lantern",
                "image" => "products/solar_lantern.jpg",
                "about" => "Rechargeable solar lantern | ideal for homes",
                "price" => rand(800, 2500),
                "stock_quantity" => rand(10, 30),
                "discount" => rand(1, 8) * 5,
                "category_id" => 2,
            ],
            [
                "title" => "Cooking Pot",
                "image" => "products/cooking_pot.jpg",
                "about" => "Durable aluminum cooking pot | essential kitchenware",
                "price" => rand(200, 1000),
                "stock_quantity" => rand(10, 40),
                "discount" => rand(1, 10) * 5,
                "category_id" => 1,
            ],
            [
                "title" => "Jiko Coal",
                "image" => "products/jiko_coal.jpg",
                "about" => "Eco-friendly jiko coal | efficient cooking fuel",
                "price" => rand(100, 500),
                "stock_quantity" => rand(30, 200),
                "discount" => rand(1, 5) * 5,
                "category_id" => 3,
            ],
            [
                "title" => "Wheelbarrow",
                "image" => "products/wheelbarrow.jpg",
                "about" => "Heavy-duty wheelbarrow | construction and farming",
                "price" => rand(3000, 7000),
                "stock_quantity" => rand(5, 20),
                "discount" => rand(1, 5) * 5,
                "category_id" => 4,
            ],
            [
                "title" => "Plastic Water Tank",
                "image" => "products/water_tank.jpg",
                "about" => "500L plastic water tank | durable and portable",
                "price" => rand(5000, 15000),
                "stock_quantity" => rand(2, 10),
                "discount" => rand(1, 10) * 5,
                "category_id" => 3,
            ],
            [
                "title" => "Iron Sheets",
                "image" => "products/iron_sheets.jpg",
                "about" => "Galvanized iron sheets for roofing | durable",
                "price" => rand(500, 1500),
                "stock_quantity" => rand(50, 200),
                "discount" => rand(1, 5) * 5,
                "category_id" => 3,
            ],
            [
                "title" => "Gas Cylinder",
                "image" => "products/gas_cylinder.jpg",
                "about" => "13kg gas cylinder for cooking | safe and durable",
                "price" => rand(2000, 5000),
                "stock_quantity" => rand(10, 30),
                "discount" => rand(1, 8) * 5,
                "category_id" => 3,
            ],
            [
                "title" => "Umbrella",
                "image" => "products/umbrella.jpg",
                "about" => "Portable umbrella | rain and sun protection",
                "price" => rand(300, 1000),
                "stock_quantity" => rand(20, 50),
                "discount" => rand(1, 10) * 5,
                "category_id" => 2,
            ],
            [
                "title" => "School Bag",
                "image" => "products/school_bag.jpg",
                "about" => "Durable school bag for students | multiple compartments",
                "price" => rand(1000, 4000),
                "stock_quantity" => rand(10, 50),
                "discount" => rand(1, 10) * 5,
                "category_id" => 4,
            ],
            [
                "title" => "Mosquito Net",
                "image" => "products/mosquito_net.jpg",
                "about" => "Insecticide-treated mosquito net | safe and effective",
                "price" => rand(500, 1500),
                "stock_quantity" => rand(30, 100),
                "discount" => rand(1, 8) * 5,
                "category_id" => 2,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                "title" => $product['title'],
                "image" => $product['image'],  // Directly referencing the product image path
                "about" => $product['about'],
                "price" => $product['price'],
                "stock_quantity" => $product['stock_quantity'],
                "discount" => $product['discount'],
                "category_id" => $product['category_id'],
            ]);
        }
    }
}
