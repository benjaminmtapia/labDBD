<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PassengerTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION agregarPasajeros()
            RETURNS trigger AS
            $$
                DECLARE
                i INTEGER := 25;
                j INTEGER := 0;
                num_asiento INTEGER:= 2;
                nombre VARCHAR:= \'benjamin\' ;
                apellido VARCHAR:= \'tapia\';
                valor INTEGER := NEW.id;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    INSERT INTO passengers( flight_id,nombre,apellido,num_asiento,created_at,updated_at) VALUES 
                    (valor,nombre,apellido,j, NEW.created_at,NEW.updated_at);
                END LOOP ;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER agregarPasajeros AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE agregarPasajeros();
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
