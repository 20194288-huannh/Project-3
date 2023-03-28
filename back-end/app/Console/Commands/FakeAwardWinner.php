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
    protected $signature = 'command:fake-award-winner';

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
            if ($product->is_award_winner == NULL) {
                $product->update(['is_award_winner' => rand(0, 1)]);
            }
        }
        return Command::SUCCESS;
    }
}
