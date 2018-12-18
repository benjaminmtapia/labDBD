<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->increments('num_reserva');
            $table->decimal('cantidad_personas');
            $table->unsignedInteger('id_habitacion');
            $table->unsignedInteger('id_paquete');
            $table->unsignedInteger('id_reserva');
            $table->foreign('id_habitacion')->references('id')->on('rooms');
            $table->foreign('id_paquete')->references('id')->on('packages');
            $table->foreign('id_reserva')->references('id')->on('reservations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_reservations');
    }
}
