<?php

use Illuminate\Database\Seeder;

class packagehotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\packagehotel', 10)->create();
    }
}
