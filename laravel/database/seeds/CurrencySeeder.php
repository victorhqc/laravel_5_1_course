<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::firstOrCreate(['name' => 'USD']);
        \App\Currency::firstOrCreate(['name' => 'MXN']);
        \App\Currency::firstOrCreate(['name' => 'EUR']);
    }
}
