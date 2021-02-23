<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_wallets')->insert([
            'user_id' => 1,
            'wallet' => 4141414141414141
        ]);

        DB::table('user_wallets')->insert([
            'user_id' => 2,
            'wallet' => 4242424242424242
        ]);
    }
}
