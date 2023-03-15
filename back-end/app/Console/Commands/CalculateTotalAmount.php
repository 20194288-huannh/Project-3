<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CalculateTotalAmount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:calculate-total-amount';

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
        $carts = Cart::all();
        foreach($carts as $cart) {
            $total = $cart->orders()->join('products', 'products.id', '=', 'orders.product_id')
                ->sum(DB::raw('products.price * orders.quantity'));
            $cart->update(['total_price' => $total]);
            $cart->payment()->update(['payment_amount' => $total]);
        }
        return Command::SUCCESS;
    }
}
