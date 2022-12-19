<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->countryCode(),
            'type' => rand(1,2),
            'minimum_amount' => fake()->numberBetween(0, 100),
            'name' => fake()->name(),
            'value' => fake()->numberBetween(0, 100),
            'description' => fake()->text(),
            'expiry_date' => fake()->date()
        ];
    }
}
