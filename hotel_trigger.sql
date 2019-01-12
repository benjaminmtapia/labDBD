CREATE OR REPLACE FUNCTION public.eliminarhabitaciones()
RETURNS trigger
LANGUAGE plpgsql
AS $function$
                BEGIN
                DELETE FROM rooms
                WHERE rooms.hotel_id = OLD.id;
                IF NOT FOUND THEN RETURN NULL; END IF;
                OLD.updated_at = now();
               RETURN OLD;
               END;
            $function$;

CREATE TRIGGER eliminar_habitaciones BEFORE delete
	ON hotels
	FOR EACH ROW
	EXECUTE PROCEDURE eliminarhabitaciones()
