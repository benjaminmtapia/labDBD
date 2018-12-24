<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelReservationPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservation-packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id');
            $table->integer('hotel_reservations_id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('hotel_reservations_id')->references('id')->on('hotel_reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_reservation-packages');
    }
}
