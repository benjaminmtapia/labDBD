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
            $table->integer('capacidad');
            $table->integer('precio');
            $table->integer('dias')->nullable();
            $table->date('fecha_ida')->nullable();
            $table->date('fecha_vuelta')->nullable();
            $table->boolean('disponibilidad');
            $table->unsignedInteger('destiny_id');
            $table->unsignedInteger('packagecar_id');
            $table->unsignedInteger('reservation_id')->nullable();
            $table->foreign('destiny_id')->references('id')->on('destinies');
            $table->foreign('packagecar_id')->references('id')->on('packagecars');
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
        Schema::dropIfExists('cars');
    }
}
