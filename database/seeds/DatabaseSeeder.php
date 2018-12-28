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
        $this->call(packageSeeder::class);
        $this->call(hotelSeeder::class);
        $this->call(destinySeeder::class);
        $this->call(originSeeder::class);
        $this->call(flightSeeder::class);
        $this->call(airportSeeder::class);
        $this->call(stopSeeder::class);
        $this->call(passengerSeeder::class);
        $this->call(socioSeeder::class);
        $this->call(check_inSeeder::class);
        $this->call(purchaseSeeder::class);
        $this->call(reservationSeeder::class);
        $this->call(carSeeder::class);
        $this->call(roomSeeder::class);
        $this->call(hotel_reservationSeeder::class);
        $this->call(ticketSeeder::class);
        $this->call(administratorSeeder::class);
        $this->call(roomSeeder::class);
        $this->call(administratorpackageSeeder::class);
        $this->call(stopflightSeeder::class);
        $this->call(reservation_administratorSeeder::class);
        $this->call(reservationflightSeeder::class);
        $this->call(reservationuserSeeder::class);
        $this->call(reservationpackageSeeder::class);
        $this->call(flightpackageSeeder::class);
        $this->call(hotelreservationpackageSeeder::class);
    }
}
