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
            $table->date('fecha_ida');
            $table->date('fecha_vuelta');
            $table->boolean('disponibilidad');
            $table->unsignedInteger('destiny_id');
            $table->unsignedInteger('package_id')->nullable();
            $table->unsignedInteger('reservation_id');
            $table->foreign('destiny_id')->references('id')->on('destinies');
            $table->foreign('package_id')->references('id')->on('packages');
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
