<?php

use Illuminate\Database\Seeder;

class check_inSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\check_in', 10)->create();
    }
}
