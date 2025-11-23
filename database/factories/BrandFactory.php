<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            // This will be handled by the seeder now
            'brand_name' => $this->faker->unique()->randomElement(['Nike', 'Adidas', 'Puma']),
            'brandlogo_image' => $this->faker->imageUrl(200, 200, 'logo'),
            'brand_establishment_date' => $this->faker->date(), // Placeholder, will be set in seeder
            'brand_manufacture_country' => $this->faker->country(), // Placeholder
        ];
    }
}