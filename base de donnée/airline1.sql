--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    username character varying(50) NOT NULL,
    password character varying
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: airplane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.airplane (
    id character varying(10) NOT NULL,
    type character varying(20),
    company character varying
);


ALTER TABLE public.airplane OWNER TO postgres;

--
-- Name: airport; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.airport (
    name character varying(50) NOT NULL,
    city character varying(30),
    country character varying(20)
);


ALTER TABLE public.airport OWNER TO postgres;

--
-- Name: book; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.book (
    id integer NOT NULL,
    flightno character varying(20),
    classtype character varying(20),
    paid integer DEFAULT 0 NOT NULL,
    "time" timestamp without time zone
);


ALTER TABLE public.book OWNER TO postgres;

--
-- Name: book_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.book_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.book_id_seq OWNER TO postgres;

--
-- Name: book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.book_id_seq OWNED BY public.book.id;


--
-- Name: class; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.class (
    number character varying(20),
    name character varying(20) NOT NULL,
    capacity integer,
    price real,
    id_class integer NOT NULL
);


ALTER TABLE public.class OWNER TO postgres;

--
-- Name: class_id_class_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.class_id_class_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.class_id_class_seq OWNER TO postgres;

--
-- Name: class_id_class_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.class_id_class_seq OWNED BY public.class.id_class;


--
-- Name: flight; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.flight (
    number character varying(20) NOT NULL,
    airplane_id character varying(20),
    departure character varying(30),
    d_time time without time zone,
    arrival character varying(30),
    a_time time(2) without time zone,
    d_date date,
    a_date date
);


ALTER TABLE public.flight OWNER TO postgres;

--
-- Name: passanger; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.passanger (
    firstname character varying(30),
    middlename character varying(30),
    lastname character varying(20),
    email character varying(50) NOT NULL,
    gender character varying(10),
    birthday date,
    cellphone character varying(15)
);


ALTER TABLE public.passanger OWNER TO postgres;

--
-- Name: reserve; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reserve (
    id integer NOT NULL,
    username character varying(50) NOT NULL
);


ALTER TABLE public.reserve OWNER TO postgres;

--
-- Name: réserve _id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."réserve _id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."réserve _id_seq" OWNER TO postgres;

--
-- Name: réserve _id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."réserve _id_seq" OWNED BY public.reserve.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    username character varying(50) NOT NULL,
    password character varying(30)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: book id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.book ALTER COLUMN id SET DEFAULT nextval('public.book_id_seq'::regclass);


--
-- Name: class id_class; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class ALTER COLUMN id_class SET DEFAULT nextval('public.class_id_class_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.admin VALUES ('admin', 'admin');


--
-- Data for Name: airplane; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.airplane VALUES ('1170', 'B738', 'Boeing');
INSERT INTO public.airplane VALUES ('1201', 'A320', 'Airbus');


--
-- Data for Name: airport; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.airport VALUES ('Aéroport Dallas', 'Dallas', 'USA');
INSERT INTO public.airport VALUES ('Orly paris', 'Paris', 'France');
INSERT INTO public.airport VALUES ('Lyon Saint Exupéry', 'Lyon', 'France');
INSERT INTO public.airport VALUES (' John F Kennedy New York', 'New York', 'USA');


--
-- Data for Name: book; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.book VALUES (40, 'A1111', 'Économie', 1, '2020-11-28 06:19:12');
INSERT INTO public.book VALUES (39, 'A1111', 'Affaire', 1, '2020-11-28 06:12:48');
INSERT INTO public.book VALUES (41, 'A1111', 'Économie', 0, '2020-11-28 06:23:11');


--
-- Data for Name: class; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.class VALUES ('A1111', 'Économie', 30, 200, 23);
INSERT INTO public.class VALUES ('A1111', 'Affaire', 20, 30, 24);


--
-- Data for Name: flight; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.flight VALUES ('A1111', '1170', 'Orly paris', '05:48:00', 'Aéroport Dallas', '16:53:00', '2020-11-28', '2020-11-28');


--
-- Data for Name: passanger; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.passanger VALUES ('Abdeslam', 'bislam', 'Tekfa', 'tekfabislam@gmail.com', 'Male', '2020-11-27', '0767506473');


--
-- Data for Name: reserve; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.reserve VALUES (39, 'tekfabislam@gmail.com');
INSERT INTO public.reserve VALUES (40, 'tekfabislam@gmail.com');
INSERT INTO public.reserve VALUES (41, 'tekfabislam@gmail.com');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users VALUES ('tekfabislam@gmail.com', '1234');


--
-- Name: book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.book_id_seq', 41, true);


--
-- Name: class_id_class_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.class_id_class_seq', 24, true);


--
-- Name: réserve _id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."réserve _id_seq"', 1, false);


--
-- Name: admin admin_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pk PRIMARY KEY (username);


--
-- Name: airplane airpalne_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.airplane
    ADD CONSTRAINT airpalne_pk PRIMARY KEY (id);


--
-- Name: airport airport_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.airport
    ADD CONSTRAINT airport_pk PRIMARY KEY (name);


--
-- Name: book book_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.book
    ADD CONSTRAINT book_pk PRIMARY KEY (id);


--
-- Name: class class_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class
    ADD CONSTRAINT class_pk PRIMARY KEY (id_class);


--
-- Name: flight flight_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT flight_pk PRIMARY KEY (number);


--
-- Name: passanger passanger_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.passanger
    ADD CONSTRAINT passanger_pk PRIMARY KEY (email);


--
-- Name: reserve reserve_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT reserve_pk PRIMARY KEY (id, username);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (username);


--
-- Name: fki_book_fk2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_book_fk2 ON public.book USING btree (classtype);


--
-- Name: fki_class_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_class_fk ON public.class USING btree (number);


--
-- Name: fki_flight_airplane_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_flight_airplane_fk ON public.flight USING btree (airplane_id);


--
-- Name: fki_flight_arrival_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_flight_arrival_fk ON public.flight USING btree (arrival);


--
-- Name: fki_flight_departure_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_flight_departure_fk ON public.flight USING btree (departure);


--
-- Name: fki_reserve_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_reserve_fk ON public.reserve USING btree (username);


--
-- Name: fki_reserve_fk2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_reserve_fk2 ON public.reserve USING btree (id);


--
-- Name: class class_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class
    ADD CONSTRAINT class_fk FOREIGN KEY (number) REFERENCES public.flight(number);


--
-- Name: flight flight_airplane_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT flight_airplane_fk FOREIGN KEY (airplane_id) REFERENCES public.airplane(id);


--
-- Name: flight flight_arrival_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT flight_arrival_fk FOREIGN KEY (arrival) REFERENCES public.airport(name);


--
-- Name: flight flight_departure_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT flight_departure_fk FOREIGN KEY (departure) REFERENCES public.airport(name);


--
-- Name: reserve reserve_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT reserve_fk FOREIGN KEY (username) REFERENCES public.passanger(email);


--
-- Name: reserve reserve_fk2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT reserve_fk2 FOREIGN KEY (id) REFERENCES public.book(id);


--
-- Name: users users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_fk FOREIGN KEY (username) REFERENCES public.passanger(email);


--
-- PostgreSQL database dump complete
--

