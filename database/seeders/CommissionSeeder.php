<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commissions')->insert([
            'currency_transfer_id' => 1,
            'commission_fee' => 1.5
        ]);

        DB::table('commissions')->insert([
            'currency_transfer_id' => 2,
            'commission_fee' => 2
        ]);
    }
}
