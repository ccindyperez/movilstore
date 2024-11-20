<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shopping>
 */
class ShoppingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'keyproduct' => fake()->numberBetween(10000000, 99999999),
            'username' => fake()->sentence(),
            'datebuy' => fake()->dateTime(),
            'total' => fake()->numberBetween(1.01, 10000.99),
            'subtotal' => fake()->numberBetween(1.01, 10000.99)
        ];
    }
}
