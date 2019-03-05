<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(destinySeeder::class);
        $this->call(originSeeder::class);
//        $this->call(reservationSeeder::class);
        $this->call(packageSeeder::class);
        $this->call(flightSeeder::class);
        $this->call(airportSeeder::class);
        $this->call(stopSeeder::class);
//        $this->call(purchaseSeeder::class);
        $this->call(carSeeder::class);
        $this->call(hotelSeeder::class);
        $this->call(roomSeeder::class);      
        $this->call(passengerSeeder::class);
        $this->call(seatSeeder::class);
        $this->call(check_inSeeder::class);
        $this->call(secureSeeder::class);
        $this->call(ticketSeeder::class);
        $this->call(carritoSeeder::class);
    }
}
