<?php

namespace App\Console\Commands;

use App\Models\PaymentMethod;
use Illuminate\Console\Command;

class PaymentMethodSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-payment-method';

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
        $data = [
            'name' => 'Zalo Pay'
        ];
        PaymentMethod::create($data);
        $data = [
            'name' => 'Momo'
        ];
        PaymentMethod::create($data);
        $data = [
            'name' => 'Viettel Pay'
        ];
        PaymentMethod::create($data);
        $data = [
            'name' => 'VISA'
        ];
        PaymentMethod::create($data);
        $data = [
            'name' => 'ATM'
        ];
        PaymentMethod::create($data);
        return Command::SUCCESS;
    }
}
