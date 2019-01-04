--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Ubuntu 10.5-0ubuntu0.18.04)
-- Dumped by pg_dump version 11.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: homestead
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO homestead;

--
-- Name: agregarasientos(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.agregarasientos() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
                DECLARE
                i INTEGER := 10;
                j INTEGER := 0;
                letter CHAR:= 'a';
                valor INTEGER := NEW.id;
                BEGIN           
                LOOP 
                    EXIT WHEN j = i;
                    j := j + 1;
                    INSERT INTO seats( flight_id,letra,numero,disponibilidad,created_at,updated_at) VALUES 
                    (valor,letter,j,true, NEW.created_at,NEW.updated_at);
                END LOOP ;
                RETURN NEW;
            END
            $$;


ALTER FUNCTION public.agregarasientos() OWNER TO homestead;

--
-- Name: eliminarhabitaciones(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.eliminarhabitaciones() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
              BEGIN
              DELETE FROM rooms
              WHERE rooms.hotel_id = OLD.id;
              IF NOT FOUND THEN RETURN NULL; END IF;
              OLD.updated_at = now();            
              RETURN OLD;
              END
            $$;


ALTER FUNCTION public.eliminarhabitaciones() OWNER TO homestead;

--
-- Name: habilitardisponibilidad(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.habilitardisponibilidad() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
                DECLARE
                limite INTEGER := 10;
                n INTEGER := 0;          
                disponible BOOLEAN := true;
                rdm INTEGER := 1;
                valor INTEGER := NEW.id;
                BEGIN
                LOOP
                    EXIT WHEN n = limite; 
                    n := n + 1; 
                    rdm:= ((rdm * 1.5 * n * valor)%4) + 1; 
                    INSERT INTO rooms(hotel_id, numero, capacidad, created_at, updated_at) 
                    VALUES (valor, n, rdm, NEW.created_at, NEW.updated_at);
                END LOOP;
                RETURN NEW;
            END
            $$;


ALTER FUNCTION public.habilitardisponibilidad() OWNER TO homestead;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: administrator_packages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.administrator_packages (
    id integer NOT NULL,
    administrator_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.administrator_packages OWNER TO homestead;

--
-- Name: administrator_packages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.administrator_packages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.administrator_packages_id_seq OWNER TO homestead;

--
-- Name: administrator_packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.administrator_packages_id_seq OWNED BY public.administrator_packages.id;


--
-- Name: administrators; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.administrators (
    id integer NOT NULL,
    nombre character varying(40) NOT NULL,
    apellido character varying(40) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.administrators OWNER TO homestead;

--
-- Name: administrators_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.administrators_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.administrators_id_seq OWNER TO homestead;

--
-- Name: administrators_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.administrators_id_seq OWNED BY public.administrators.id;


--
-- Name: airports; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.airports (
    id integer NOT NULL,
    ciudad character varying(60) NOT NULL,
    nombre character varying(60) NOT NULL,
    origin_id integer NOT NULL,
    destiny_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.airports OWNER TO homestead;

--
-- Name: airports_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.airports_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.airports_id_seq OWNER TO homestead;

--
-- Name: airports_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.airports_id_seq OWNED BY public.airports.id;


--
-- Name: cars; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.cars (
    id integer NOT NULL,
    patente character varying(255) NOT NULL,
    marca character varying(255) NOT NULL,
    modelo character varying(255) NOT NULL,
    capacidad numeric(8,2) NOT NULL,
    package_id integer NOT NULL,
    reservation_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.cars OWNER TO homestead;

--
-- Name: cars_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.cars_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cars_id_seq OWNER TO homestead;

--
-- Name: cars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.cars_id_seq OWNED BY public.cars.id;


--
-- Name: check_ins; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.check_ins (
    id integer NOT NULL,
    cuenta integer NOT NULL,
    num_vuelo integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.check_ins OWNER TO homestead;

--
-- Name: check_ins_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.check_ins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.check_ins_id_seq OWNER TO homestead;

--
-- Name: check_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.check_ins_id_seq OWNED BY public.check_ins.id;


--
-- Name: destinies; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.destinies (
    id integer NOT NULL,
    ciudad character varying(60) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.destinies OWNER TO homestead;

--
-- Name: destinies_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.destinies_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.destinies_id_seq OWNER TO homestead;

--
-- Name: destinies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.destinies_id_seq OWNED BY public.destinies.id;


--
-- Name: flightpackages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.flightpackages (
    id integer NOT NULL,
    flight_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.flightpackages OWNER TO homestead;

--
-- Name: flightpackages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.flightpackages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.flightpackages_id_seq OWNER TO homestead;

--
-- Name: flightpackages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.flightpackages_id_seq OWNED BY public.flightpackages.id;


--
-- Name: flights; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.flights (
    id integer NOT NULL,
    fecha_ida date NOT NULL,
    capacidad smallint NOT NULL,
    num_pasajeros smallint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.flights OWNER TO homestead;

--
-- Name: flights_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.flights_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.flights_id_seq OWNER TO homestead;

--
-- Name: flights_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.flights_id_seq OWNED BY public.flights.id;


--
-- Name: hotel_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.hotel_reservations (
    id integer NOT NULL,
    cantidad_personas numeric(8,2) NOT NULL,
    room_id integer NOT NULL,
    package_id integer NOT NULL,
    reservation_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.hotel_reservations OWNER TO homestead;

--
-- Name: hotel_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.hotel_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotel_reservations_id_seq OWNER TO homestead;

--
-- Name: hotel_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.hotel_reservations_id_seq OWNED BY public.hotel_reservations.id;


--
-- Name: hotelreservation_packages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.hotelreservation_packages (
    id integer NOT NULL,
    hotel_reservation_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.hotelreservation_packages OWNER TO homestead;

--
-- Name: hotelreservation_packages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.hotelreservation_packages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotelreservation_packages_id_seq OWNER TO homestead;

--
-- Name: hotelreservation_packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.hotelreservation_packages_id_seq OWNED BY public.hotelreservation_packages.id;


--
-- Name: hotels; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.hotels (
    id integer NOT NULL,
    ciudad character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    clase integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.hotels OWNER TO homestead;

--
-- Name: hotels_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.hotels_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotels_id_seq OWNER TO homestead;

--
-- Name: hotels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.hotels_id_seq OWNED BY public.hotels.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: origins; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.origins (
    id integer NOT NULL,
    ciudad character varying(60) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.origins OWNER TO homestead;

--
-- Name: origins_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.origins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.origins_id_seq OWNER TO homestead;

--
-- Name: origins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.origins_id_seq OWNED BY public.origins.id;


--
-- Name: packages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.packages (
    id integer NOT NULL,
    descuento integer NOT NULL,
    fecha_vencimiento timestamp(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.packages OWNER TO homestead;

--
-- Name: packages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.packages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.packages_id_seq OWNER TO homestead;

--
-- Name: packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.packages_id_seq OWNED BY public.packages.id;


--
-- Name: passengers; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.passengers (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.passengers OWNER TO homestead;

--
-- Name: passengers_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.passengers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.passengers_id_seq OWNER TO homestead;

--
-- Name: passengers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.passengers_id_seq OWNED BY public.passengers.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO homestead;

--
-- Name: purchases; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.purchases (
    id integer NOT NULL,
    fecha timestamp(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.purchases OWNER TO homestead;

--
-- Name: purchases_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.purchases_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purchases_id_seq OWNER TO homestead;

--
-- Name: purchases_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.purchases_id_seq OWNED BY public.purchases.id;


--
-- Name: reservation_administrators; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservation_administrators (
    id integer NOT NULL,
    reservation_id integer NOT NULL,
    administrator_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.reservation_administrators OWNER TO homestead;

--
-- Name: reservation_administrators_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservation_administrators_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservation_administrators_id_seq OWNER TO homestead;

--
-- Name: reservation_administrators_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservation_administrators_id_seq OWNED BY public.reservation_administrators.id;


--
-- Name: reservation_users; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservation_users (
    id integer NOT NULL,
    reservation_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.reservation_users OWNER TO homestead;

--
-- Name: reservation_users_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservation_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservation_users_id_seq OWNER TO homestead;

--
-- Name: reservation_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservation_users_id_seq OWNED BY public.reservation_users.id;


--
-- Name: reservationflights; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservationflights (
    id integer NOT NULL,
    reservation_id integer NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.reservationflights OWNER TO homestead;

--
-- Name: reservationflights_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservationflights_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservationflights_id_seq OWNER TO homestead;

--
-- Name: reservationflights_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservationflights_id_seq OWNED BY public.reservationflights.id;


--
-- Name: reservationpackages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservationpackages (
    id integer NOT NULL,
    reservation_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.reservationpackages OWNER TO homestead;

--
-- Name: reservationpackages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservationpackages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservationpackages_id_seq OWNER TO homestead;

--
-- Name: reservationpackages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservationpackages_id_seq OWNED BY public.reservationpackages.id;


--
-- Name: reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservations (
    id integer NOT NULL,
    monto integer NOT NULL,
    num_pasaporte integer NOT NULL,
    num_reserva_hotel integer NOT NULL,
    origin_id integer NOT NULL,
    destiny_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.reservations OWNER TO homestead;

--
-- Name: reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservations_id_seq OWNER TO homestead;

--
-- Name: reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservations_id_seq OWNED BY public.reservations.id;


--
-- Name: rooms; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.rooms (
    id integer NOT NULL,
    numero integer NOT NULL,
    hotel_id integer NOT NULL,
    capacidad integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.rooms OWNER TO homestead;

--
-- Name: rooms_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.rooms_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rooms_id_seq OWNER TO homestead;

--
-- Name: rooms_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.rooms_id_seq OWNED BY public.rooms.id;


--
-- Name: seats; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.seats (
    id integer NOT NULL,
    letra character(1) NOT NULL,
    numero integer NOT NULL,
    disponibilidad boolean NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.seats OWNER TO homestead;

--
-- Name: seats_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.seats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seats_id_seq OWNER TO homestead;

--
-- Name: seats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.seats_id_seq OWNED BY public.seats.id;


--
-- Name: socios; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.socios (
    id integer NOT NULL,
    numero integer NOT NULL,
    email character varying(255) NOT NULL,
    millas integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.socios OWNER TO homestead;

--
-- Name: socios_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.socios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.socios_id_seq OWNER TO homestead;

--
-- Name: socios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.socios_id_seq OWNED BY public.socios.id;


--
-- Name: stopflights; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.stopflights (
    id integer NOT NULL,
    stop_id integer NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.stopflights OWNER TO homestead;

--
-- Name: stopflights_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.stopflights_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stopflights_id_seq OWNER TO homestead;

--
-- Name: stopflights_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.stopflights_id_seq OWNED BY public.stopflights.id;


--
-- Name: stops; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.stops (
    id integer NOT NULL,
    nombre character varying(60) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.stops OWNER TO homestead;

--
-- Name: stops_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.stops_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stops_id_seq OWNER TO homestead;

--
-- Name: stops_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.stops_id_seq OWNED BY public.stops.id;


--
-- Name: tickets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.tickets (
    id integer NOT NULL,
    num_asiento smallint NOT NULL,
    hora timestamp(0) without time zone NOT NULL,
    origen character varying(80) NOT NULL,
    destino character varying(80) NOT NULL,
    doc_identificacion character varying(40) NOT NULL,
    tipo_pasajero character varying(20) NOT NULL,
    flight_id integer NOT NULL,
    reservation_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.tickets OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.tickets_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tickets_id_seq OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.tickets_id_seq OWNED BY public.tickets.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: administrator_packages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrator_packages ALTER COLUMN id SET DEFAULT nextval('public.administrator_packages_id_seq'::regclass);


--
-- Name: administrators id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrators ALTER COLUMN id SET DEFAULT nextval('public.administrators_id_seq'::regclass);


--
-- Name: airports id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airports ALTER COLUMN id SET DEFAULT nextval('public.airports_id_seq'::regclass);


--
-- Name: cars id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars ALTER COLUMN id SET DEFAULT nextval('public.cars_id_seq'::regclass);


--
-- Name: check_ins id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.check_ins ALTER COLUMN id SET DEFAULT nextval('public.check_ins_id_seq'::regclass);


--
-- Name: destinies id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.destinies ALTER COLUMN id SET DEFAULT nextval('public.destinies_id_seq'::regclass);


--
-- Name: flightpackages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flightpackages ALTER COLUMN id SET DEFAULT nextval('public.flightpackages_id_seq'::regclass);


--
-- Name: flights id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights ALTER COLUMN id SET DEFAULT nextval('public.flights_id_seq'::regclass);


--
-- Name: hotel_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotel_reservations ALTER COLUMN id SET DEFAULT nextval('public.hotel_reservations_id_seq'::regclass);


--
-- Name: hotelreservation_packages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotelreservation_packages ALTER COLUMN id SET DEFAULT nextval('public.hotelreservation_packages_id_seq'::regclass);


--
-- Name: hotels id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotels ALTER COLUMN id SET DEFAULT nextval('public.hotels_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: origins id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.origins ALTER COLUMN id SET DEFAULT nextval('public.origins_id_seq'::regclass);


--
-- Name: packages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages ALTER COLUMN id SET DEFAULT nextval('public.packages_id_seq'::regclass);


--
-- Name: passengers id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers ALTER COLUMN id SET DEFAULT nextval('public.passengers_id_seq'::regclass);


--
-- Name: purchases id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.purchases ALTER COLUMN id SET DEFAULT nextval('public.purchases_id_seq'::regclass);


--
-- Name: reservation_administrators id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_administrators ALTER COLUMN id SET DEFAULT nextval('public.reservation_administrators_id_seq'::regclass);


--
-- Name: reservation_users id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_users ALTER COLUMN id SET DEFAULT nextval('public.reservation_users_id_seq'::regclass);


--
-- Name: reservationflights id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationflights ALTER COLUMN id SET DEFAULT nextval('public.reservationflights_id_seq'::regclass);


--
-- Name: reservationpackages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationpackages ALTER COLUMN id SET DEFAULT nextval('public.reservationpackages_id_seq'::regclass);


--
-- Name: reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservations ALTER COLUMN id SET DEFAULT nextval('public.reservations_id_seq'::regclass);


--
-- Name: rooms id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms ALTER COLUMN id SET DEFAULT nextval('public.rooms_id_seq'::regclass);


--
-- Name: seats id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats ALTER COLUMN id SET DEFAULT nextval('public.seats_id_seq'::regclass);


--
-- Name: socios id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.socios ALTER COLUMN id SET DEFAULT nextval('public.socios_id_seq'::regclass);


--
-- Name: stopflights id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stopflights ALTER COLUMN id SET DEFAULT nextval('public.stopflights_id_seq'::regclass);


--
-- Name: stops id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stops ALTER COLUMN id SET DEFAULT nextval('public.stops_id_seq'::regclass);


--
-- Name: tickets id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets ALTER COLUMN id SET DEFAULT nextval('public.tickets_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: administrator_packages administrator_packages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrator_packages
    ADD CONSTRAINT administrator_packages_pkey PRIMARY KEY (id);


--
-- Name: administrators administrators_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrators
    ADD CONSTRAINT administrators_pkey PRIMARY KEY (id);


--
-- Name: airports airports_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airports
    ADD CONSTRAINT airports_pkey PRIMARY KEY (id);


--
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id);


--
-- Name: check_ins check_ins_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.check_ins
    ADD CONSTRAINT check_ins_pkey PRIMARY KEY (id);


--
-- Name: destinies destinies_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.destinies
    ADD CONSTRAINT destinies_pkey PRIMARY KEY (id);


--
-- Name: flightpackages flightpackages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flightpackages
    ADD CONSTRAINT flightpackages_pkey PRIMARY KEY (id);


--
-- Name: flights flights_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_pkey PRIMARY KEY (id);


--
-- Name: hotel_reservations hotel_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotel_reservations
    ADD CONSTRAINT hotel_reservations_pkey PRIMARY KEY (id);


--
-- Name: hotelreservation_packages hotelreservation_packages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotelreservation_packages
    ADD CONSTRAINT hotelreservation_packages_pkey PRIMARY KEY (id);


--
-- Name: hotels hotels_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotels
    ADD CONSTRAINT hotels_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: origins origins_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.origins
    ADD CONSTRAINT origins_pkey PRIMARY KEY (id);


--
-- Name: packages packages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_pkey PRIMARY KEY (id);


--
-- Name: passengers passengers_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers
    ADD CONSTRAINT passengers_pkey PRIMARY KEY (id);


--
-- Name: purchases purchases_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.purchases
    ADD CONSTRAINT purchases_pkey PRIMARY KEY (id);


--
-- Name: reservation_administrators reservation_administrators_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_administrators
    ADD CONSTRAINT reservation_administrators_pkey PRIMARY KEY (id);


--
-- Name: reservation_users reservation_users_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_users
    ADD CONSTRAINT reservation_users_pkey PRIMARY KEY (id);


--
-- Name: reservationflights reservationflights_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationflights
    ADD CONSTRAINT reservationflights_pkey PRIMARY KEY (id);


--
-- Name: reservationpackages reservationpackages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationpackages
    ADD CONSTRAINT reservationpackages_pkey PRIMARY KEY (id);


--
-- Name: reservations reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservations
    ADD CONSTRAINT reservations_pkey PRIMARY KEY (id);


--
-- Name: rooms rooms_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_pkey PRIMARY KEY (id);


--
-- Name: seats seats_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats
    ADD CONSTRAINT seats_pkey PRIMARY KEY (id);


--
-- Name: socios socios_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.socios
    ADD CONSTRAINT socios_pkey PRIMARY KEY (id);


--
-- Name: stopflights stopflights_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stopflights
    ADD CONSTRAINT stopflights_pkey PRIMARY KEY (id);


--
-- Name: stops stops_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stops
    ADD CONSTRAINT stops_pkey PRIMARY KEY (id);


--
-- Name: tickets tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: homestead
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: flights crearasiento; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER crearasiento AFTER INSERT ON public.flights FOR EACH ROW EXECUTE PROCEDURE public.agregarasientos();


--
-- Name: hotels crearhabitacion; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER crearhabitacion AFTER INSERT ON public.hotels FOR EACH ROW EXECUTE PROCEDURE public.habilitardisponibilidad();


--
-- Name: hotels eliminarhabitaciones; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER eliminarhabitaciones BEFORE DELETE ON public.hotels FOR EACH ROW EXECUTE PROCEDURE public.eliminarhabitaciones();


--
-- Name: administrator_packages administrator_packages_administrator_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrator_packages
    ADD CONSTRAINT administrator_packages_administrator_id_foreign FOREIGN KEY (administrator_id) REFERENCES public.administrators(id);


--
-- Name: administrator_packages administrator_packages_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administrator_packages
    ADD CONSTRAINT administrator_packages_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: airports airports_destiny_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airports
    ADD CONSTRAINT airports_destiny_id_foreign FOREIGN KEY (destiny_id) REFERENCES public.destinies(id);


--
-- Name: airports airports_origin_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airports
    ADD CONSTRAINT airports_origin_id_foreign FOREIGN KEY (origin_id) REFERENCES public.origins(id);


--
-- Name: cars cars_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: cars cars_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: flightpackages flightpackages_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flightpackages
    ADD CONSTRAINT flightpackages_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: flightpackages flightpackages_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flightpackages
    ADD CONSTRAINT flightpackages_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: hotel_reservations hotel_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotel_reservations
    ADD CONSTRAINT hotel_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: hotel_reservations hotel_reservations_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotel_reservations
    ADD CONSTRAINT hotel_reservations_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: hotel_reservations hotel_reservations_room_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotel_reservations
    ADD CONSTRAINT hotel_reservations_room_id_foreign FOREIGN KEY (room_id) REFERENCES public.rooms(id);


--
-- Name: hotelreservation_packages hotelreservation_packages_hotel_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotelreservation_packages
    ADD CONSTRAINT hotelreservation_packages_hotel_reservation_id_foreign FOREIGN KEY (hotel_reservation_id) REFERENCES public.hotel_reservations(id);


--
-- Name: hotelreservation_packages hotelreservation_packages_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotelreservation_packages
    ADD CONSTRAINT hotelreservation_packages_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: passengers passengers_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers
    ADD CONSTRAINT passengers_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: reservation_administrators reservation_administrators_administrator_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_administrators
    ADD CONSTRAINT reservation_administrators_administrator_id_foreign FOREIGN KEY (administrator_id) REFERENCES public.administrators(id);


--
-- Name: reservation_administrators reservation_administrators_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_administrators
    ADD CONSTRAINT reservation_administrators_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: reservation_users reservation_users_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_users
    ADD CONSTRAINT reservation_users_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: reservation_users reservation_users_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservation_users
    ADD CONSTRAINT reservation_users_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: reservationflights reservationflights_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationflights
    ADD CONSTRAINT reservationflights_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: reservationflights reservationflights_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationflights
    ADD CONSTRAINT reservationflights_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: reservationpackages reservationpackages_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationpackages
    ADD CONSTRAINT reservationpackages_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: reservationpackages reservationpackages_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservationpackages
    ADD CONSTRAINT reservationpackages_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- Name: reservations reservations_destiny_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservations
    ADD CONSTRAINT reservations_destiny_id_foreign FOREIGN KEY (destiny_id) REFERENCES public.destinies(id);


--
-- Name: reservations reservations_origin_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservations
    ADD CONSTRAINT reservations_origin_id_foreign FOREIGN KEY (origin_id) REFERENCES public.origins(id);


--
-- Name: rooms rooms_hotel_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_hotel_id_foreign FOREIGN KEY (hotel_id) REFERENCES public.hotels(id);


--
-- Name: seats seats_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats
    ADD CONSTRAINT seats_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: stopflights stopflights_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stopflights
    ADD CONSTRAINT stopflights_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: stopflights stopflights_stop_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.stopflights
    ADD CONSTRAINT stopflights_stop_id_foreign FOREIGN KEY (stop_id) REFERENCES public.stops(id);


--
-- Name: tickets tickets_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: tickets tickets_reservation_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_reservation_id_foreign FOREIGN KEY (reservation_id) REFERENCES public.reservations(id);


--
-- PostgreSQL database dump complete
--

