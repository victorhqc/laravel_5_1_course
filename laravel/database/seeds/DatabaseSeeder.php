<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CurrencySeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AccountSeeder::class);

        Model::reguard();
    }
}
