<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monto');
            $table->integer('num_pasaporte');
            $table->integer('num_reserva_hotel');
            /*
            $table->integer('id_origen');
            $table->integer('id_destino');
            $table->foreign('id_destino')->references('id')->on('destinies');
            $table->foreign('id_origen')->references('id')->on('origins');
            */
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
        Schema::dropIfExists('reservations');
    }
}
