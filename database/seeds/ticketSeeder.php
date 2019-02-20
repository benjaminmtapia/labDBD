<?php

use Illuminate\Database\Seeder;

class ticketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
        	seatSeeder::class,
    ]);

        factory('App\Ticket', 10)->create();
    }
}
