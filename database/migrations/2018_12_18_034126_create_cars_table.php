<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patente');
            $table->string('marca');
            $table->string('modelo');
            $table->decimal('capacidad');
            $table->unsignedInteger('id_paquete');
            $table->unsignedInteger('id_reserva');
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
        Schema::dropIfExists('cars');
    }
}
