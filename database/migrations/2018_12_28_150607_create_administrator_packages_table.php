<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrator_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('administrator_id');
            $table->unsignedInteger('package_id');
            $table->foreign('administrator_id')->references('id')->on('administrators');
            $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('administrator_packages');
    }
}
