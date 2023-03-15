<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class OrderSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(User::all() as $user) {
            if (rand(0, 1)) {
                $rand = rand(1, 5);
                for ($i = 0; $i < $rand; $i++) {
                    $date = rand(1647336925, 1678872925);
                    $data = [
                        'payment_method_id' => PaymentMethod::inRandomOrder()->first()->id,
                        'credit_card_number' => fake()->creditCardNumber(),
                        'payment_date' => date("Y-m-d H:i:s",$date)
                    ];
                    $payment = Payment::create($data);
                    $data = [
                        'user_id' => $user->id,
                        'payment_id' => $payment->id,
                    ];
                    $cart = Cart::create($data);
                }
                $carts = Cart::where('user_id', $user->id)->get();
                foreach($carts as $cart) {
                    $rand = rand(1, 10);
                    for ($i = 0; $i < $rand; $i++) {
                        $data = [
                            'user_id' => $user->id,
                            'cart_id' => $cart->id,
                            'product_id' => Product::inRandomOrder()->first()->id,
                            'quantity' => rand(1, 10),
                            'status' => rand(1, 3)
                        ];
                        $order = Order::create($data);
                    }
                }
            }
        }
    }
}
