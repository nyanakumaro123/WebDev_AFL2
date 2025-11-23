<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        $brands = Brand::all();
        $categories = Category::all();
        $productsPerCategory = 1; // Create one product for each brand/category pair

        foreach ($brands as $brand) {
            foreach ($categories as $category) {
                Product::factory($productsPerCategory)->create([
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
