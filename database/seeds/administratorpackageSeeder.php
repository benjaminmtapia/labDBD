<?php

use Illuminate\Database\Seeder;

class administratorpackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory('App\administrator_package', 10)->create();
    }
}
