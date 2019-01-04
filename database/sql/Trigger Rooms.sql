/*
Trigger que tiene como finalidad habilitar Habitaciones luego de que un Hotel es creado
*/

CREATE OR REPLACE FUNCTION habilitarDisponibilidad()
	RETURN trigger AS

$BODY$
DECLARE limite INTEGER := 10;
DECLARE n INTEGER := 0;          
DECLARE disponible BOOLEAN := true;
DECLARE rdm INTEGER := 1;
DECLARE valor INTEGER := NEW.id;
BEGIN
	EXIT WHEN n = limite; 
	n := n + 1; 
	rdm:= ((rdm * 1.5 * n * valor)%4) + 1; 
	INSERT INTO rooms(hotel_id, numero, capacidad, created_at, updated_at) 
	VALUES (valor, n, rdm, NEW.created_at, NEW.updated_at);
END;
$BODY$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS id_