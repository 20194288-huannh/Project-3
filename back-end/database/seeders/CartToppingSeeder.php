<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'cart_id' => Cart::all()->random()->id,
            'topping_id' => Topping::all()->random()->id,
            'quantity' => rand(1, 5),
        ];
        for ($i = 1; $i < 50; $i++) {
            
        }
    }
}
