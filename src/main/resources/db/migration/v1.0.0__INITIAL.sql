--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

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
-- Name: public; Type: SCHEMA; Schema: -; Owner: cvmanager
--

CREATE SCHEMA IF NOT EXISTS public;


ALTER SCHEMA public OWNER TO cvmanager;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: email; Type: TABLE; Schema: public; Owner: cvmanager
--

CREATE TABLE public.email (
    id bigint NOT NULL,
    created timestamp without time zone NOT NULL,
    updated timestamp without time zone,
    address character varying(50),
    personal_info_id bigint NOT NULL
);


ALTER TABLE public.email OWNER TO cvmanager;

--
-- Name: email_id_seq; Type: SEQUENCE; Schema: public; Owner: cvmanager
--

CREATE SEQUENCE public.email_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_id_seq OWNER TO cvmanager;

--
-- Name: email_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cvmanager
--

ALTER SEQUENCE public.email_id_seq OWNED BY public.email.id;


--
-- Name: personal_info; Type: TABLE; Schema: public; Owner: cvmanager
--

CREATE TABLE public.personal_info (
    id bigint NOT NULL,
    created timestamp without time zone NOT NULL,
    updated timestamp without time zone,
    about_me text,
    first_name character varying(100) NOT NULL,
    image text,
    last_name character varying(100),
    subtitle character varying(50),
    title character varying(30) NOT NULL
);


ALTER TABLE public.personal_info OWNER TO cvmanager;

--
-- Name: personal_info_id_seq; Type: SEQUENCE; Schema: public; Owner: cvmanager
--

CREATE SEQUENCE public.personal_info_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_info_id_seq OWNER TO cvmanager;

--
-- Name: personal_info_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cvmanager
--

ALTER SEQUENCE public.personal_info_id_seq OWNED BY public.personal_info.id;


--
-- Name: phone; Type: TABLE; Schema: public; Owner: cvmanager
--

CREATE TABLE public.phone (
    id bigint NOT NULL,
    created timestamp without time zone NOT NULL,
    updated timestamp without time zone,
    number character varying(30),
    personal_info_id bigint NOT NULL
);


ALTER TABLE public.phone OWNER TO cvmanager;

--
-- Name: phone_id_seq; Type: SEQUENCE; Schema: public; Owner: cvmanager
--

CREATE SEQUENCE public.phone_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.phone_id_seq OWNER TO cvmanager;

--
-- Name: phone_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cvmanager
--

ALTER SEQUENCE public.phone_id_seq OWNED BY public.phone.id;


--
-- Name: reference; Type: TABLE; Schema: public; Owner: cvmanager
--

CREATE TABLE public.reference (
    id bigint NOT NULL,
    created timestamp without time zone NOT NULL,
    updated timestamp without time zone,
    contact character varying(50),
    name character varying(100),
    personal_info_id bigint NOT NULL
);


ALTER TABLE public.reference OWNER TO cvmanager;

--
-- Name: reference_id_seq; Type: SEQUENCE; Schema: public; Owner: cvmanager
--

CREATE SEQUENCE public.reference_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reference_id_seq OWNER TO cvmanager;

--
-- Name: reference_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cvmanager
--

ALTER SEQUENCE public.reference_id_seq OWNED BY public.reference.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: cvmanager
--

CREATE TABLE public."user" (
    id bigint NOT NULL,
    created timestamp without time zone NOT NULL,
    updated timestamp without time zone,
    email character varying(255) NOT NULL,
    enabled boolean NOT NULL,
    name character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public."user" OWNER TO cvmanager;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: cvmanager
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO cvmanager;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cvmanager
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- Name: email id; Type: DEFAULT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.email ALTER COLUMN id SET DEFAULT nextval('public.email_id_seq'::regclass);


--
-- Name: personal_info id; Type: DEFAULT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.personal_info ALTER COLUMN id SET DEFAULT nextval('public.personal_info_id_seq'::regclass);


--
-- Name: phone id; Type: DEFAULT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.phone ALTER COLUMN id SET DEFAULT nextval('public.phone_id_seq'::regclass);


--
-- Name: reference id; Type: DEFAULT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.reference ALTER COLUMN id SET DEFAULT nextval('public.reference_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Name: email email_pkey; Type: CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.email
    ADD CONSTRAINT email_pkey PRIMARY KEY (id);


--
-- Name: personal_info personal_info_pkey; Type: CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.personal_info
    ADD CONSTRAINT personal_info_pkey PRIMARY KEY (id);


--
-- Name: phone phone_pkey; Type: CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.phone
    ADD CONSTRAINT phone_pkey PRIMARY KEY (id);


--
-- Name: reference reference_pkey; Type: CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.reference
    ADD CONSTRAINT reference_pkey PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: phone fk7lae7489cm6jvr5wt32uoqwi0; Type: FK CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.phone
    ADD CONSTRAINT fk7lae7489cm6jvr5wt32uoqwi0 FOREIGN KEY (personal_info_id) REFERENCES public.personal_info(id);


--
-- Name: reference fka3637sus73j1hoxnxycsukt9n; Type: FK CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.reference
    ADD CONSTRAINT fka3637sus73j1hoxnxycsukt9n FOREIGN KEY (personal_info_id) REFERENCES public.personal_info(id);


--
-- Name: email fkgpc4j98i8qs3cw89bok2wce9d; Type: FK CONSTRAINT; Schema: public; Owner: cvmanager
--

ALTER TABLE ONLY public.email
    ADD CONSTRAINT fkgpc4j98i8qs3cw89bok2wce9d FOREIGN KEY (personal_info_id) REFERENCES public.personal_info(id);


INSERT INTO public.personal_info (id, created, title, first_name) VALUES ((select nextval('public.personal_info_id_seq')), now(), 'Example Title', 'Example name');
