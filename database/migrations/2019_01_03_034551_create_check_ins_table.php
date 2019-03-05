<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCheckInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genero');
            $table->string('email')->unique();
            $table->string('nacionalidad');
            $table->string('nombre_contacto');
            $table->string('telefono_contacto');
            $table->unsignedInteger('passenger_id');
            $table->foreign('passenger_id')->references('id')->on('passengers');
            $table->unsignedInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');
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
        Schema::dropIfExists('check_ins');
    }
}
