<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartToppingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cart_id' => Cart::all()->random()->id,
            'topping_id' => Topping::all()->random()->id,
            'quantity' => rand(1, 5),
        ];
    }
}
