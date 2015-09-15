<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usd = \App\Currency::where('name', 'USD')->first();
        $user = \App\User::where('email', 'foo@bar.com')->first();

        \App\BankAccount::firstOrCreate(['amount' => 0, 'user_id' => $user->getKey(), 'currency_id' => $usd->getKey()]);

    }
}
