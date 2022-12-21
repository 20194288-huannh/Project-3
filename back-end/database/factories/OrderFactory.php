<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
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
            'voucher_shipping_id' => Voucher::where('type', 2)->first()->id,
            'cart_id' => Cart::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => rand(1, 10),
            'size' => rand(1, 4),
            'status' => rand (1, 3),
        ];
    }
}
