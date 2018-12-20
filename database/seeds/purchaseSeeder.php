<?php

use Illuminate\Database\Seeder;

class purchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\purchase', 10)->create();
    }
}
