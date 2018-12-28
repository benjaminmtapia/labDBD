<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AirportTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement('
          CREATE OR REPLACE FUNCTION agregarAeropuerto()
          RETURNS trigger AS
          $$
            DECLARE
            id_aeropuerto INTEGER := NEW.id;
            id_origen INTEGER := CURRVAL(\'origins_id_seq\');
            id_destino INTEGER := CURRVAL(\'destinies_id_seq\');
            nombre_ciudad VARCHAR := \'Santiago\';
            nombre VARCHAR := \'Arturo Merino Benitez\';
            BEGIN
            INSERT INTO airports(id, ciudad, nombre, origin_id, destiny_id, created_at, updated_at) VALUES
            (id_aeropuerto, nombre_ciudad, nombre, id_origen, id_destino, NEW.created_at, NEW.updated_at);
            RETURN NEW;
            END
          $$ LANGUAGE plpgsql;
      ');
      DB::unprepared('
          CREATE TRIGGER agregarAeropuerto AFTER INSERT ON origins FOR EACH ROW
          EXECUTE PROCEDURE agregarAeropuerto();
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
