<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => $this->faker->unique()->randomElement([
               "Casual Denim Jacket",
               "Classic White T-Shirt",
               "Elegant Evening Gown",
               "Slim Fit Chinos",
               "Vintage Leather Jacket",
               "Comfy Hooded Sweatshirt",
               "Floral Maxi Dress",
               "Basic Crew Neck Tee",
               "Lightweight Windbreaker",
               "Plaid Button-Up Shirt",
               "High-Waist Skinny Jeans",
               "Oversized Knit Sweater",
               "Sporty Running Shorts",
               "Formal Tailored Blazer",
               "Ribbed Tank Top",
               "Waterproof Parka Coat",
               "Boho Fringe Cardigan",
               "Athletic Jogger Pants",
               "Cropped Cotton Hoodie",
               "Polka Dot Midi Skirt"
           ]),
            'description' => fake()->paragraph(),
            'price' => $this->faker->randomFloat(2, 100, 1000),

        ];
    }
}
