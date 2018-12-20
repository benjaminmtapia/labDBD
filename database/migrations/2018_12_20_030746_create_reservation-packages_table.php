<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation-packages', function (Blueprint $table) {
            $table->unsignedInteger('id_paquete');
            $table->unsignedInteger('num_reserva');
        //    $table->foreign('id_paquete')->references('id')->on('packages');
        //    $table->foreign('num_reserva')->references('num_reserva')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation-packages');
    }
}
