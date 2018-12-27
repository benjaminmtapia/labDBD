<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION habilitarDisponibilidad()
            RETURN trigger AS
            $$
                DECLARE
                id_habitacion INTEGER := NEW.id;
                limite INTEGER := 10;                
                n INTEGER := 0;                
                disponible BOOLEAN := true;
                BEGIN
                LOOP
                    EXIT WHEN n = limite; 
                    n := n + 1; 
                    INSERT INTO rooms(id, numero, capacidad, disponible) 
                    VALUES (id_habitacion, n, 4, true);
                END LOOP;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER crearHabitacion AFTER INSERT ON hotels FOR EACH ROW
        EXECUTE PROCEDURE habilitarDisponibilidad();
        ')

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger');
    }
}
