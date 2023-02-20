<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class FakeStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-status';

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
            $product->update(['status' => rand(0, 1)]);
        }
        return Command::SUCCESS;
    }
}
