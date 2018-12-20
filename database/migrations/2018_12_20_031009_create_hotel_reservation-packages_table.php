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
            $table->unsignedInteger('id_paquete');
            $table->unsignedInteger('num_reserva_hotel');
        //    $table->foreign('id_paquete')->references('id')->on('packages');
        //    $table->foreign('num_reserva_hotel')->references('num_reserva')->on('hotels');
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
