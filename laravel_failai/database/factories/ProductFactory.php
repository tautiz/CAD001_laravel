<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'image' => fake()->word(),
            'category_id' => fake()->randomNumber(1),
            'color' => fake()->word(),
            'size' => fake()->word(),
            'price' => fake()->randomNumber(),
            'status_id' => fake()->randomNumber(1),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
