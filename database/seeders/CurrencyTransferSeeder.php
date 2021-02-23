<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency_transfers')->insert([
            'from_user_wallet' => 1,
            'to_user_wallet' => 2,
            'amount' => 100,
        ]);

        DB::table('currency_transfers')->insert([
            'from_user_wallet' => 2,
            'to_user_wallet' => 1,
            'amount' => 200,
        ]);
    }
}
