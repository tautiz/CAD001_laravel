<?php

namespace Database\Factories;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => fake()->randomNumber(),
            'product_name' => fake()->name(),
            'product_id' => fake()->randomNumber(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->word(),
            'status_id' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
