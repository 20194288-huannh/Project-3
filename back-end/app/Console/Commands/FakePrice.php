<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class FakePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-price';

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
        $products = Product::all();
        foreach ($products as $product) {
            if ($product->price == 0) {
                $product->update(['price' => rand(200, 1220)]);
            }
        }
        return Command::SUCCESS;
    }
}
