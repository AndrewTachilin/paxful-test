<?php

use Illuminate\Database\Seeder;
use Database\Seeders\CurrencyTransferSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserWalletSeeder;
use Database\Seeders\CommissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencyTransferSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CommissionSeeder::class);
        $this->call(UserWalletSeeder::class);
    }
}
