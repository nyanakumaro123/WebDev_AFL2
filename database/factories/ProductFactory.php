<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Temporary values, will be set properly in the seeder and afterCreating state
            'product_name' => $this->faker->words(2, true),
            'product_image' => 'image/default.png',
            'product_description' => $this->faker->sentence(15),
            'product_size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'product_color' => $this->faker->randomElement(['black', 'white']),
            'product_price' => 150000, // Default price
            'product_quantity' => 20,
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Set product name from brand and category
            $product->product_name = ucfirst($product->brand->brand_name . ' ' . $product->category->category_name);

            // Set image path to match the product details
            $categoryNameFormatted = str_replace(' ', '_', ucwords($product->category->category_name));
            
            // ==================================================================
            // ## THIS IS THE FIX ##
            // Add ucfirst() to the brand name to match your file names
            // ==================================================================
            $imageName = $categoryNameFormatted . '_' . ucfirst($product->brand->brand_name) . '_' . ucfirst($product->product_color) . '.png';
            $product->product_image = 'image/' . $imageName;

            // Set price based on the final category
            $prices = [
                't shirt' => 100000,
                'hoodie' => 200000,
                'long pants' => 300000,
                'short pants' => 250000,
                'jersey' => 200000,
            ];
            $product->product_price = $prices[$product->category->category_name] ?? 150000;

            $product->save();
        });
    }
}