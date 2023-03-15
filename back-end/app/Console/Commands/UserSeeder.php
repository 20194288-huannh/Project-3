<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fake-user';

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
        for ($i = 0; $i < 200; $i++) {
            $data = [
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '123123',
                'remember_token' => Str::random(10),
            ];
            User::create($data);
        }
        return Command::SUCCESS;
    }
}
