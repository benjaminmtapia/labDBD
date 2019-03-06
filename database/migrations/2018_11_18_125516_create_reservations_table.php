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
            $table->integer('precio');
            $table->integer('num_pasaporte')->nullable();
            $table->string('cod_reserva')->unique();
            $table->date('fecha_reserva');
            $table->boolean('disponibilidad')->default('true');
            $table->boolean('check_in')->default('false');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');            
            $table->timestamps();
            $table->softDeletes();
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
