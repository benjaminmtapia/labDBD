<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeatsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION agregarAsientos()
            RETURNS trigger AS
            $$
                DECLARE
                i INTEGER := 100;
                j INTEGER := 0;
                index INTEGER := 10;
                valor INTEGER := NEW.id;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    IF j%index = 1 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'A\',j,true, NEW.created_at,NEW.updated_at); END IF; 
                    IF j%index = 2 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'B\',j,true, NEW.created_at,NEW.updated_at); END IF; 
                    IF j%index = 3 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'C\',j,true, NEW.created_at,NEW.updated_at); END IF; 
                    IF j%index = 4 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'D\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 5 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'E\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 6 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'F\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 7 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'G\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 8 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'H\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 9 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'I\',j,true, NEW.created_at,NEW.updated_at); END IF;
                    IF j%index = 0 THEN INSERT INTO seats( reservation_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,\'J\',j,true, NEW.created_at,NEW.updated_at); END IF;
                END LOOP ;
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');
        DB::unprepared('
        CREATE TRIGGER crearAsiento AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE agregarAsientos();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats_trigger');
    }
}
