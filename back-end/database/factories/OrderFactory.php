<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'voucher_id' => Voucher::where('type', 1)->first()->id,
            'total_price' => fake()->numberBetween(200, 500),
            'voucher_shipping_id' => Voucher::where('type', 2)->first()->id,
        ];
    }
}
