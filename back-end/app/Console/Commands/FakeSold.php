<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class FakeSold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-sold';

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
            $product->update(['sold' => rand(100, 5000)]);
        }
        return Command::SUCCESS;
    }
}
