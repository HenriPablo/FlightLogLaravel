--
-- PostgreSQL database dump
--

-- Dumped from database version 11.12 (Ubuntu 11.12-1.pgdg16.04+1)
-- Dumped by pg_dump version 11.12 (Ubuntu 11.12-1.pgdg16.04+1)

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

--
-- Name: select_crew_members_with_roles(); Type: FUNCTION; Schema: public; Owner: tomekpilot
--

CREATE FUNCTION public.select_crew_members_with_roles() RETURNS SETOF record
    LANGUAGE sql
    AS $$
        select 
            crewmember.first_name,
            crewmember.last_name,
            ARRAY(
                select crewmembertype_id
                from crewmember_crewmembertype_xref
                where crewmember_crewmembertype_xref.crewmember_id = crewmember.id
                ) as "roles"
        from
            crewmember
	$$;


ALTER FUNCTION public.select_crew_members_with_roles() OWNER TO tomekpilot;

--
-- Name: select_crewmembers_with_roles(); Type: PROCEDURE; Schema: public; Owner: tomekpilot
--

CREATE PROCEDURE public.select_crewmembers_with_roles()
    LANGUAGE plpgsql
    AS $$
    begin
	
	--returns query
        select
            first_name,
            last_name,
            ARRAY(
                select crewmembertype_id
                from crewmember_crewmembertype_xref
                where crewmember_crewmembertype_xref.crewmember_id = crewmember.id
                ) as "roles"
        from
            crewmember;
end;
$$;


ALTER PROCEDURE public.select_crewmembers_with_roles() OWNER TO tomekpilot;

--
-- Name: select_crewmembers_with_roles(text); Type: PROCEDURE; Schema: public; Owner: tomekpilot
--

CREATE PROCEDURE public.select_crewmembers_with_roles(INOUT first_name text)
    LANGUAGE plpgsql
    AS $$
    begin
        select
            first_name,
            last_name,
            ARRAY(
                select crewmembertype_id
                from crewmember_crewmembertype_xref
                where crewmember_crewmembertype_xref.crewmember_id = crewmember.id
                ) as "roles"
        from
            crewmember where 1=1;
end $$;


ALTER PROCEDURE public.select_crewmembers_with_roles(INOUT first_name text) OWNER TO tomekpilot;

--
-- Name: hibernate_sequence; Type: SEQUENCE; Schema: public; Owner: tomekpilot
--

CREATE SEQUENCE public.hibernate_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hibernate_sequence OWNER TO tomekpilot;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aircraft; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.aircraft (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    aircraft_category bigint NOT NULL,
    aircraft_class bigint NOT NULL,
    aircraft_tail_number character varying(255) NOT NULL,
    aircraft_type character varying(255) NOT NULL,
    complex boolean NOT NULL,
    hi_performance boolean NOT NULL,
    nickname character varying(255) NOT NULL,
    crew bigint DEFAULT 1 NOT NULL
);


ALTER TABLE public.aircraft OWNER TO tomekpilot;

--
-- Name: aircraft_category; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.aircraft_category (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    category character varying(100) NOT NULL
);


ALTER TABLE public.aircraft_category OWNER TO tomekpilot;

--
-- Name: aircraft_class; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.aircraft_class (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    class character varying(255) NOT NULL
);


ALTER TABLE public.aircraft_class OWNER TO tomekpilot;

--
-- Name: airport; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.airport (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    ico_identifier character varying(255) NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.airport OWNER TO tomekpilot;

--
-- Name: airport_version_seq; Type: SEQUENCE; Schema: public; Owner: tomekpilot
--

CREATE SEQUENCE public.airport_version_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.airport_version_seq OWNER TO tomekpilot;

--
-- Name: crew_assignment; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.crew_assignment (
    id bigint NOT NULL,
    flight_id bigint NOT NULL,
    crewmember_id bigint NOT NULL,
    crewmembertype_id bigint NOT NULL
);


ALTER TABLE public.crew_assignment OWNER TO tomekpilot;

--
-- Name: TABLE crew_assignment; Type: COMMENT; Schema: public; Owner: tomekpilot
--

COMMENT ON TABLE public.crew_assignment IS 'flight - crewmember assignment, flight can have many';


--
-- Name: crew_assignment_id_seq; Type: SEQUENCE; Schema: public; Owner: tomekpilot
--

CREATE SEQUENCE public.crew_assignment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.crew_assignment_id_seq OWNER TO tomekpilot;

--
-- Name: crew_assignment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tomekpilot
--

ALTER SEQUENCE public.crew_assignment_id_seq OWNED BY public.crew_assignment.id;


--
-- Name: crewmember; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.crewmember (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    address1 character varying(255) NOT NULL,
    address2 character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    certificate_no character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    notes character varying(255) NOT NULL,
    state character varying(255) NOT NULL,
    zip character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    display_email boolean,
    enabled boolean,
    password character varying(255),
    username character varying(255),
    self boolean DEFAULT false NOT NULL
);


ALTER TABLE public.crewmember OWNER TO tomekpilot;

--
-- Name: crewmember_crewmembertype_xref; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.crewmember_crewmembertype_xref (
    id integer NOT NULL,
    crewmember_id bigint NOT NULL,
    crewmembertype_id bigint NOT NULL
);


ALTER TABLE public.crewmember_crewmembertype_xref OWNER TO tomekpilot;

--
-- Name: crewmember_crewmembertype_xref_id_seq; Type: SEQUENCE; Schema: public; Owner: tomekpilot
--

CREATE SEQUENCE public.crewmember_crewmembertype_xref_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.crewmember_crewmembertype_xref_id_seq OWNER TO tomekpilot;

--
-- Name: crewmember_crewmembertype_xref_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tomekpilot
--

ALTER SEQUENCE public.crewmember_crewmembertype_xref_id_seq OWNED BY public.crewmember_crewmembertype_xref.id;


--
-- Name: crewmembertype; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.crewmembertype (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    role character varying(250) NOT NULL
);


ALTER TABLE public.crewmembertype OWNER TO tomekpilot;

--
-- Name: flight; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.flight (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    actual_instrument double precision DEFAULT 0 NOT NULL,
    aircraft_id bigint,
    as_flight_instructor double precision DEFAULT 0 NOT NULL,
    cross_country double precision DEFAULT 0 NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL,
    daytime double precision DEFAULT 0 NOT NULL,
    departure bigint NOT NULL,
    destination bigint NOT NULL,
    dual_received double precision DEFAULT 0 NOT NULL,
    extended_flight_details_id bigint,
    ground_trainer double precision DEFAULT 0 NOT NULL,
    nighttime double precision DEFAULT 0 NOT NULL,
    no_day_landings integer DEFAULT 0 NOT NULL,
    no_inst_aproaches integer DEFAULT 0 NOT NULL,
    no_night_landings integer DEFAULT 0 NOT NULL,
    pilot_in_command double precision NOT NULL,
    remarks character varying(255) NOT NULL,
    route character varying(255) NOT NULL,
    second_in_command double precision DEFAULT 0 NOT NULL,
    simulated_instrument double precision DEFAULT 0 NOT NULL,
    total_duration_of_flight double precision DEFAULT 0.1 NOT NULL
);


ALTER TABLE public.flight OWNER TO tomekpilot;

--
-- Name: flight_extended_details; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.flight_extended_details (
    id bigint NOT NULL,
    flight_id bigint,
    glider_tows integer NOT NULL,
    skydive_loads integer NOT NULL
);


ALTER TABLE public.flight_extended_details OWNER TO tomekpilot;

--
-- Name: flight_instructor_xref; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.flight_instructor_xref (
);


ALTER TABLE public.flight_instructor_xref OWNER TO tomekpilot;

--
-- Name: flight_pilot_xref; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.flight_pilot_xref (
    pilot_id bigint,
    flight_id bigint
);


ALTER TABLE public.flight_pilot_xref OWNER TO tomekpilot;

--
-- Name: flight_time_total_to_date; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.flight_time_total_to_date (
    id bigint NOT NULL,
    actual_instrument double precision NOT NULL,
    airplane_multi_engine_land double precision NOT NULL,
    airplane_singe_engine_land double precision NOT NULL,
    as_flight_instructor double precision NOT NULL,
    cross_country double precision NOT NULL,
    cross_country_inst_received double precision NOT NULL,
    cross_country_pic double precision NOT NULL,
    cross_country_solo double precision NOT NULL,
    day double precision NOT NULL,
    dual_received double precision NOT NULL,
    ground_trainer double precision NOT NULL,
    instrument double precision NOT NULL,
    night double precision NOT NULL,
    night_instruction_received double precision NOT NULL,
    night_pic double precision NOT NULL,
    night_pic_solo double precision NOT NULL,
    night_take_off_and_landing_solo integer NOT NULL,
    night_take_off_and_landings integer NOT NULL,
    no_instrument_approaches integer NOT NULL,
    no_landing integer NOT NULL,
    pilot_in_command double precision NOT NULL,
    rotorcraft_helicopter double precision NOT NULL,
    second_in_command double precision NOT NULL,
    simulated_instrument double precision NOT NULL,
    solo double precision NOT NULL,
    total_duration_of_flight double precision NOT NULL,
    total_time_per_aircraft_type bytea
);


ALTER TABLE public.flight_time_total_to_date OWNER TO tomekpilot;

--
-- Name: preferences; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.preferences (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    preference_code character varying(250),
    preference_label character varying(250),
    preference_tip character varying(5000),
    preferences_group_id bigint,
    preference_value character varying DEFAULT 0 NOT NULL
);


ALTER TABLE public.preferences OWNER TO tomekpilot;

--
-- Name: preferences_group; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.preferences_group (
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    preferences_group_label character varying(250) NOT NULL,
    preferences_group_code character varying(250) NOT NULL,
    preferences_group_tip character varying(1000)
);


ALTER TABLE public.preferences_group OWNER TO tomekpilot;

--
-- Name: preferences_group_id_seq; Type: SEQUENCE; Schema: public; Owner: tomekpilot
--

CREATE SEQUENCE public.preferences_group_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.preferences_group_id_seq OWNER TO tomekpilot;

--
-- Name: preferences_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tomekpilot
--

ALTER SEQUENCE public.preferences_group_id_seq OWNED BY public.preferences_group.id;


--
-- Name: slide; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.slide (
    id bigint NOT NULL,
    description character varying(255) NOT NULL,
    slide_alt character varying(255) NOT NULL,
    slide_pix_file_name character varying(255),
    slide_show_id bigint NOT NULL,
    slide_title character varying(255) NOT NULL
);


ALTER TABLE public.slide OWNER TO tomekpilot;

--
-- Name: slide_show; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.slide_show (
    id bigint NOT NULL,
    size_factor integer NOT NULL,
    slide_show_category character varying(255) NOT NULL,
    slide_show_dir character varying(255) NOT NULL,
    slide_show_horizontal boolean NOT NULL,
    slide_show_title character varying(255) NOT NULL
);


ALTER TABLE public.slide_show OWNER TO tomekpilot;

--
-- Name: story; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story (
    id bigint NOT NULL,
    allow_comments boolean NOT NULL,
    body character varying(255) NOT NULL,
    created_on timestamp without time zone,
    flight_id bigint,
    link_to_story character varying(255),
    modified_on timestamp without time zone,
    private_draft boolean NOT NULL,
    story_category_id bigint NOT NULL,
    story_decoration_id bigint,
    title character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    treat_as_public_post boolean
);


ALTER TABLE public.story OWNER TO tomekpilot;

--
-- Name: story_category; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story_category (
    id bigint NOT NULL,
    category_name character varying(255) NOT NULL
);


ALTER TABLE public.story_category OWNER TO tomekpilot;

--
-- Name: story_comments; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story_comments (
    id bigint NOT NULL,
    author character varying(255) NOT NULL,
    comment_body character varying(255) NOT NULL,
    comment_date timestamp without time zone NOT NULL,
    email character varying(255) NOT NULL,
    story_id bigint NOT NULL,
    website character varying(255) NOT NULL
);


ALTER TABLE public.story_comments OWNER TO tomekpilot;

--
-- Name: story_decoration; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story_decoration (
    id bigint NOT NULL,
    story_id bigint,
    theme character varying(255) NOT NULL
);


ALTER TABLE public.story_decoration OWNER TO tomekpilot;

--
-- Name: story_decoration_inlclude; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story_decoration_inlclude (
    id bigint NOT NULL,
    story_decoration_id bigint NOT NULL
);


ALTER TABLE public.story_decoration_inlclude OWNER TO tomekpilot;

--
-- Name: story_decoration_layout; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.story_decoration_layout (
    id bigint NOT NULL
);


ALTER TABLE public.story_decoration_layout OWNER TO tomekpilot;

--
-- Name: users; Type: TABLE; Schema: public; Owner: tomekpilot
--

CREATE TABLE public.users (
    email character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    id bigint DEFAULT nextval('public.hibernate_sequence'::regclass) NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone NOT NULL,
    remember_token character varying(255)
);


ALTER TABLE public.users OWNER TO tomekpilot;

--
-- Name: crew_assignment id; Type: DEFAULT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crew_assignment ALTER COLUMN id SET DEFAULT nextval('public.crew_assignment_id_seq'::regclass);


--
-- Name: crewmember_crewmembertype_xref id; Type: DEFAULT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crewmember_crewmembertype_xref ALTER COLUMN id SET DEFAULT nextval('public.crewmember_crewmembertype_xref_id_seq'::regclass);


--
-- Data for Name: aircraft; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.aircraft (id, aircraft_category, aircraft_class, aircraft_tail_number, aircraft_type, complex, hi_performance, nickname, crew) FROM stdin;
76	51	54	N54666	utility\n	f	f	Triple Six	1
105	51	54	N103DF	utility	f	f	Katana	1
\.


--
-- Data for Name: aircraft_category; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.aircraft_category (id, category) FROM stdin;
51	Normal
52	Transport
53	Utility
84	experimental x
\.


--
-- Data for Name: aircraft_class; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.aircraft_class (id, class) FROM stdin;
56	Rotorcraft
57	Lighter Than Air
58	Glider
54	Airplane
\.


--
-- Data for Name: airport; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.airport (id, ico_identifier, name) FROM stdin;
65	KPIE	St. Petersburg-Clearwater Intnl.
66	KSRQ	Sarasota
67	KTPA	Tampa International
64	KSPG	Albert Whitted
\.


--
-- Data for Name: crew_assignment; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.crew_assignment (id, flight_id, crewmember_id, crewmembertype_id) FROM stdin;
11	99	91	87
23	97	3	62
24	97	2	62
25	97	1	87
26	97	74	59
27	98	1	87
28	98	2	62
29	98	1	87
30	98	74	59
31	116	2	62
32	116	74	59
33	117	2	62
34	117	74	59
35	118	1	87
36	118	74	59
37	119	1	87
38	119	74	59
\.


--
-- Data for Name: crewmember; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.crewmember (id, address1, address2, phone, certificate_no, city, email, first_name, last_name, notes, state, zip, class, display_email, enabled, password, username, self) FROM stdin;
89	123 Main St. South	Suite A	123-456-6789	123000-B	St. Petersburg	c.l.@m.com	Cecily	Lyons	Notes placeholder	FL	33998	Class: WTF?	f	t	cl-password	cl-username	f
90	235 Boulevard St. South	Suite A	999-456-6789	qewrwe-B	London	r.g.@mlb.com	Rob	Gilchrist	Notes placeholder	FL	AB12	Class: WTF?	f	t	rg-password	rg-username	f
91	123 Main St. South	Suite A	666-456-6789	8976-B	Nakajima	M.Y.@nippon.com	Misa	Miguchi	Notes placeholder	FL	AB-339	Class: WTF?	f	t	my-password	my-username	f
74	5979 45 Ave. North		727-798-0759	012343	St. Petersburg	tomekpilot@gmail.com,	Tomasz	Brymora	some notes	FL	33709	Single Engine Land	t	t	some password	tomekpilot	t
107	123 Main St.	Suite A	123-456-7890	123456	St. Petersburg	b@a.com	Bart	Mosley	no notes	FL	334404	what was I thinking?	\N	t	sompass	bart	f
\.


--
-- Data for Name: crewmember_crewmembertype_xref; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.crewmember_crewmembertype_xref (id, crewmember_id, crewmembertype_id) FROM stdin;
22	89	62
23	90	62
24	91	62
25	74	59
26	89	87
\.


--
-- Data for Name: crewmembertype; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.crewmembertype (id, role) FROM stdin;
59	PIC
60	SAFETY PILOT
61	EXAMINER
86	SIC
62	CFII
87	CFI
106	STUDENT
\.


--
-- Data for Name: flight; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.flight (id, actual_instrument, aircraft_id, as_flight_instructor, cross_country, date, daytime, departure, destination, dual_received, extended_flight_details_id, ground_trainer, nighttime, no_day_landings, no_inst_aproaches, no_night_landings, pilot_in_command, remarks, route, second_in_command, simulated_instrument, total_duration_of_flight) FROM stdin;
99	0	105	0	0	2002-08-24 00:00:00	1.5	64	64	1.5	\N	0	0	1	0	0	0	again, remarks, probably did flight fundamentals	kspg-kspg	0	0	1.5
97	0	105	0	0	2002-08-11 00:00:00	0.299999999999999989	64	64	0.299999999999999989	\N	0	0	1	0	0	0	some test remarks	kspg-kspg	0	0	0.299999999999999989
98	0	76	0	0	2002-08-18 00:00:00	1.19999999999999996	64	64	1.19999999999999996	\N	0	0	1	0	0	0	more remarks about second flight	kspg-kspg	0	0	1.19999999999999996
115	0	105	0	0	2018-12-07 00:00:00	1.10000000000000009	65	65	1.30000000000000004	\N	0	0.200000000000000011	3	0	1	1.30000000000000004	j;lj;ljk;lkj;lk	ksrq	0	1.10000000000000009	1.30000000000000004
116	0	105	0	0	2018-12-07 00:00:00	1.10000000000000009	65	65	1.30000000000000004	\N	0	0.200000000000000011	3	0	1	1.30000000000000004	j;lj;ljk;lkj;lk	ksrq	0	1.10000000000000009	1.30000000000000004
117	0	105	0	0	2018-12-07 00:00:00	1.10000000000000009	65	65	1.30000000000000004	\N	0	0.200000000000000011	3	0	1	1.30000000000000004	j;lj;ljk;lkj;lk	ksrq	0	1.10000000000000009	1.30000000000000004
118	0	76	0	0	2018-12-10 00:00:00	1.5	65	65	1.5	\N	0	0	1	0	0	1.5	';lk';lk';lk	ksrq	0	0.5	1.5
119	0	76	1.19999999999999996	0	2018-12-11 00:00:00	1.19999999999999996	65	65	0	\N	0	0	1	0	1	1.19999999999999996	;l;kjhkjfgjhfhgfd	kspg	0	0	1.19999999999999996
\.


--
-- Data for Name: flight_extended_details; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.flight_extended_details (id, flight_id, glider_tows, skydive_loads) FROM stdin;
\.


--
-- Data for Name: flight_instructor_xref; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.flight_instructor_xref  FROM stdin;
\.


--
-- Data for Name: flight_pilot_xref; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.flight_pilot_xref (pilot_id, flight_id) FROM stdin;
\.


--
-- Data for Name: flight_time_total_to_date; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.flight_time_total_to_date (id, actual_instrument, airplane_multi_engine_land, airplane_singe_engine_land, as_flight_instructor, cross_country, cross_country_inst_received, cross_country_pic, cross_country_solo, day, dual_received, ground_trainer, instrument, night, night_instruction_received, night_pic, night_pic_solo, night_take_off_and_landing_solo, night_take_off_and_landings, no_instrument_approaches, no_landing, pilot_in_command, rotorcraft_helicopter, second_in_command, simulated_instrument, solo, total_duration_of_flight, total_time_per_aircraft_type) FROM stdin;
\.


--
-- Data for Name: preferences; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.preferences (id, preference_code, preference_label, preference_tip, preferences_group_id, preference_value) FROM stdin;
103	default_role	Default Role	Default role for the crewmember assigned to a flight by default	100	59
104	default_person	Default Person	Person assigned to flight by default, DEFAULT_ROLE is the role they will perform as a crewmember on the flight	100	self
102	always_render_self	Always Render Self	Whether or not to assign "selft" as the derfault PIC Crewmember on a flight	100	1
\.


--
-- Data for Name: preferences_group; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.preferences_group (id, preferences_group_label, preferences_group_code, preferences_group_tip) FROM stdin;
100	Flight	flight	Suggested default values for handling certain parts of creating a new flight entry.
101	Aircraft	aircraft	Suggested default values for handling certain parts of creating a new Aircraft entry.
\.


--
-- Data for Name: slide; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.slide (id, description, slide_alt, slide_pix_file_name, slide_show_id, slide_title) FROM stdin;
\.


--
-- Data for Name: slide_show; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.slide_show (id, size_factor, slide_show_category, slide_show_dir, slide_show_horizontal, slide_show_title) FROM stdin;
\.


--
-- Data for Name: story; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story (id, allow_comments, body, created_on, flight_id, link_to_story, modified_on, private_draft, story_category_id, story_decoration_id, title, class, treat_as_public_post) FROM stdin;
\.


--
-- Data for Name: story_category; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story_category (id, category_name) FROM stdin;
\.


--
-- Data for Name: story_comments; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story_comments (id, author, comment_body, comment_date, email, story_id, website) FROM stdin;
\.


--
-- Data for Name: story_decoration; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story_decoration (id, story_id, theme) FROM stdin;
\.


--
-- Data for Name: story_decoration_inlclude; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story_decoration_inlclude (id, story_decoration_id) FROM stdin;
\.


--
-- Data for Name: story_decoration_layout; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.story_decoration_layout (id) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: tomekpilot
--

COPY public.users (email, name, password, id, created_at, updated_at, remember_token) FROM stdin;
tomekpilot@gmail.com	henri pablo	$2y$10$Y07.WBkUUvT4lBRWLUb8cO5MgTJQtclxrPOfxPsjHrvg1XYTT5TzS	109	2020-02-29 04:31:21-05	2020-02-29 04:31:21-05	\N
\.


--
-- Name: airport_version_seq; Type: SEQUENCE SET; Schema: public; Owner: tomekpilot
--

SELECT pg_catalog.setval('public.airport_version_seq', 3, true);


--
-- Name: crew_assignment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tomekpilot
--

SELECT pg_catalog.setval('public.crew_assignment_id_seq', 38, true);


--
-- Name: crewmember_crewmembertype_xref_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tomekpilot
--

SELECT pg_catalog.setval('public.crewmember_crewmembertype_xref_id_seq', 26, true);


--
-- Name: hibernate_sequence; Type: SEQUENCE SET; Schema: public; Owner: tomekpilot
--

SELECT pg_catalog.setval('public.hibernate_sequence', 119, true);


--
-- Name: preferences_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tomekpilot
--

SELECT pg_catalog.setval('public.preferences_group_id_seq', 1, false);


--
-- Name: aircraft_category aircraft_category_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.aircraft_category
    ADD CONSTRAINT aircraft_category_pkey PRIMARY KEY (id);


--
-- Name: aircraft_class aircraft_class_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.aircraft_class
    ADD CONSTRAINT aircraft_class_pkey PRIMARY KEY (id);


--
-- Name: aircraft aircraft_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.aircraft
    ADD CONSTRAINT aircraft_pkey PRIMARY KEY (id);


--
-- Name: airport airport_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.airport
    ADD CONSTRAINT airport_pkey PRIMARY KEY (id);


--
-- Name: crew_assignment crew_assignment_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crew_assignment
    ADD CONSTRAINT crew_assignment_pkey PRIMARY KEY (id);


--
-- Name: crewmember_crewmembertype_xref crewmember_crewmembertype_xref_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crewmember_crewmembertype_xref
    ADD CONSTRAINT crewmember_crewmembertype_xref_pkey PRIMARY KEY (id);


--
-- Name: crewmember crewmember_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crewmember
    ADD CONSTRAINT crewmember_pkey PRIMARY KEY (id);


--
-- Name: crewmembertype crewmembertype_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.crewmembertype
    ADD CONSTRAINT crewmembertype_pkey PRIMARY KEY (id);


--
-- Name: flight_extended_details extended_flight_details_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight_extended_details
    ADD CONSTRAINT extended_flight_details_pkey PRIMARY KEY (id);


--
-- Name: flight flight_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT flight_pkey PRIMARY KEY (id);


--
-- Name: preferences_group preferences_group_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.preferences_group
    ADD CONSTRAINT preferences_group_pkey PRIMARY KEY (id);


--
-- Name: preferences preferences_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.preferences
    ADD CONSTRAINT preferences_pkey PRIMARY KEY (id);


--
-- Name: slide slide_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.slide
    ADD CONSTRAINT slide_pkey PRIMARY KEY (id);


--
-- Name: slide_show slide_show_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.slide_show
    ADD CONSTRAINT slide_show_pkey PRIMARY KEY (id);


--
-- Name: story_category story_category_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_category
    ADD CONSTRAINT story_category_pkey PRIMARY KEY (id);


--
-- Name: story_comments story_comment_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_comments
    ADD CONSTRAINT story_comment_pkey PRIMARY KEY (id);


--
-- Name: story_decoration_inlclude story_decoration_css_selector_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration_inlclude
    ADD CONSTRAINT story_decoration_css_selector_pkey PRIMARY KEY (id);


--
-- Name: story_decoration story_decoration_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration
    ADD CONSTRAINT story_decoration_pkey PRIMARY KEY (id);


--
-- Name: story_decoration story_decoration_theme_key; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration
    ADD CONSTRAINT story_decoration_theme_key UNIQUE (theme);


--
-- Name: story_decoration_layout story_decoration_theme_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration_layout
    ADD CONSTRAINT story_decoration_theme_pkey PRIMARY KEY (id);


--
-- Name: story story_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story
    ADD CONSTRAINT story_pkey PRIMARY KEY (id);


--
-- Name: flight_time_total_to_date total_to_date_pkey; Type: CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight_time_total_to_date
    ADD CONSTRAINT total_to_date_pkey PRIMARY KEY (id);


--
-- Name: aircraft_category_category_uindex; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE UNIQUE INDEX aircraft_category_category_uindex ON public.aircraft_category USING btree (category);


--
-- Name: aircraft_category_id_uindex; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE UNIQUE INDEX aircraft_category_id_uindex ON public.aircraft_category USING btree (id);


--
-- Name: aircraft_class_id_uindex; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE UNIQUE INDEX aircraft_class_id_uindex ON public.aircraft_class USING btree (id);


--
-- Name: crew_assignment_id_uindex; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE UNIQUE INDEX crew_assignment_id_uindex ON public.crew_assignment USING btree (id);


--
-- Name: fki_departure_fk; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE INDEX fki_departure_fk ON public.flight USING btree (departure);


--
-- Name: fki_destination_fk; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE INDEX fki_destination_fk ON public.flight USING btree (destination);


--
-- Name: fki_flight_id_fk; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE INDEX fki_flight_id_fk ON public.flight_pilot_xref USING btree (flight_id);


--
-- Name: fki_pilot_id_fk; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE INDEX fki_pilot_id_fk ON public.flight_pilot_xref USING btree (pilot_id);


--
-- Name: fki_preferences_group_fk; Type: INDEX; Schema: public; Owner: tomekpilot
--

CREATE INDEX fki_preferences_group_fk ON public.preferences USING btree (preferences_group_id);


--
-- Name: aircraft aircraft_aircraft_category_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.aircraft
    ADD CONSTRAINT aircraft_aircraft_category_id_fk FOREIGN KEY (aircraft_category) REFERENCES public.aircraft_category(id);


--
-- Name: aircraft aircraft_aircraft_class_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.aircraft
    ADD CONSTRAINT aircraft_aircraft_class_id_fk FOREIGN KEY (aircraft_class) REFERENCES public.aircraft_class(id);


--
-- Name: flight aircraft_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT aircraft_id_fk FOREIGN KEY (aircraft_id) REFERENCES public.aircraft(id);


--
-- Name: flight departure_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT departure_fk FOREIGN KEY (departure) REFERENCES public.airport(id);


--
-- Name: flight destination_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT destination_fk FOREIGN KEY (destination) REFERENCES public.airport(id);


--
-- Name: flight extended_flight_details_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight
    ADD CONSTRAINT extended_flight_details_fk FOREIGN KEY (extended_flight_details_id) REFERENCES public.flight_extended_details(id);


--
-- Name: story_decoration_inlclude fk45403480ee928ca5; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration_inlclude
    ADD CONSTRAINT fk45403480ee928ca5 FOREIGN KEY (story_decoration_id) REFERENCES public.story_decoration(id);


--
-- Name: slide fk6873db1b10b693d; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.slide
    ADD CONSTRAINT fk6873db1b10b693d FOREIGN KEY (slide_show_id) REFERENCES public.slide_show(id);


--
-- Name: story fk68af8f533dec0a5; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story
    ADD CONSTRAINT fk68af8f533dec0a5 FOREIGN KEY (story_category_id) REFERENCES public.story_category(id);


--
-- Name: story fk68af8f5cbfac7da; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story
    ADD CONSTRAINT fk68af8f5cbfac7da FOREIGN KEY (flight_id) REFERENCES public.flight(id);


--
-- Name: story fk68af8f5ee928ca5; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story
    ADD CONSTRAINT fk68af8f5ee928ca5 FOREIGN KEY (story_decoration_id) REFERENCES public.story_decoration(id);


--
-- Name: story_comments fkd2c6c9156b2ae17a; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_comments
    ADD CONSTRAINT fkd2c6c9156b2ae17a FOREIGN KEY (story_id) REFERENCES public.story(id);


--
-- Name: flight_extended_details fke0ce7539cbfac7da; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight_extended_details
    ADD CONSTRAINT fke0ce7539cbfac7da FOREIGN KEY (flight_id) REFERENCES public.flight(id);


--
-- Name: story_decoration fke4f95a3a6b2ae17a; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.story_decoration
    ADD CONSTRAINT fke4f95a3a6b2ae17a FOREIGN KEY (story_id) REFERENCES public.story(id);


--
-- Name: flight_pilot_xref flight_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight_pilot_xref
    ADD CONSTRAINT flight_id_fk FOREIGN KEY (flight_id) REFERENCES public.flight(id);


--
-- Name: flight_pilot_xref pilot_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.flight_pilot_xref
    ADD CONSTRAINT pilot_id_fk FOREIGN KEY (pilot_id) REFERENCES public.crewmember(id);


--
-- Name: preferences preferences_group_fk; Type: FK CONSTRAINT; Schema: public; Owner: tomekpilot
--

ALTER TABLE ONLY public.preferences
    ADD CONSTRAINT preferences_group_fk FOREIGN KEY (preferences_group_id) REFERENCES public.preferences_group(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

