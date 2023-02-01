<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'zip' => fake()->postcode(),
            'street' => fake()->streetName(),
            'house_number' => fake()->word(),
            'apartment_number' => fake()->word(),
            'state' => fake()->word(),
            'type' => fake()->word(),
            'additional_info' => fake()->word(),
            'user_id' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
