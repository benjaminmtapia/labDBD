<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('num_asiento');
            $table->timestamp('hora');
            $table->string('origen', 80);
            $table->string('destino', 80);
            $table->string('doc_identificacion', 40);
            $table->string('tipo_pasajero', 20);
            $table->unsignedInteger('flight_id');

            $table->foreign('flight_id')->references('id')->on('flights');
            $table->unsignedInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');
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
        Schema::dropIfExists('tickets');
    }
}
