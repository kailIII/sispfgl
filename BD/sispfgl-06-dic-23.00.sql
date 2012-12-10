--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.6
-- Dumped by pg_dump version 9.1.6
-- Started on 2012-12-06 22:59:40 CST

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 268 (class 3079 OID 11643)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2555 (class 0 OID 0)
-- Dependencies: 268
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 19103)
-- Dependencies: 6
-- Name: actividad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE actividad (
    act_id integer NOT NULL,
    com_id integer NOT NULL,
    act_act_id integer,
    act_codigo character varying(10) NOT NULL,
    act_descripcion text NOT NULL
);


--
-- TOC entry 162 (class 1259 OID 19109)
-- Dependencies: 6 161
-- Name: actividad_act_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE actividad_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2556 (class 0 OID 0)
-- Dependencies: 162
-- Name: actividad_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE actividad_act_id_seq OWNED BY actividad.act_id;


--
-- TOC entry 2557 (class 0 OID 0)
-- Dependencies: 162
-- Name: actividad_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('actividad_act_id_seq', 1, false);


--
-- TOC entry 163 (class 1259 OID 19111)
-- Dependencies: 6
-- Name: acuerdo_municipal; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE acuerdo_municipal (
    acu_mun_id integer NOT NULL,
    acu_mun_fecha date,
    acu_mun_p1 boolean,
    acu_mun_p2 boolean,
    acu_mun_observacion text,
    pro_pep_id integer NOT NULL,
    acu_mun_ruta_archivo character varying(200)
);


--
-- TOC entry 164 (class 1259 OID 19117)
-- Dependencies: 6 163
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE acuerdo_municipal_acu_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2558 (class 0 OID 0)
-- Dependencies: 164
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE acuerdo_municipal_acu_mun_id_seq OWNED BY acuerdo_municipal.acu_mun_id;


--
-- TOC entry 2559 (class 0 OID 0)
-- Dependencies: 164
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 13, true);


--
-- TOC entry 244 (class 1259 OID 24180)
-- Dependencies: 6
-- Name: area_dimension; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE area_dimension (
    are_dim_id integer NOT NULL,
    are_dim_nombre character varying(50)
);


--
-- TOC entry 243 (class 1259 OID 24178)
-- Dependencies: 6 244
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE area_dimension_are_dim_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2560 (class 0 OID 0)
-- Dependencies: 243
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE area_dimension_are_dim_id_seq OWNED BY area_dimension.are_dim_id;


--
-- TOC entry 2561 (class 0 OID 0)
-- Dependencies: 243
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('area_dimension_are_dim_id_seq', 4, true);


--
-- TOC entry 165 (class 1259 OID 19119)
-- Dependencies: 6
-- Name: asesor_municipal; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE asesor_municipal (
    ase_mun_id integer NOT NULL,
    reg_id integer NOT NULL,
    ase_mun_nombre character varying(50) NOT NULL,
    ase_mun_apellido character varying(50) NOT NULL,
    ase_mun_cargo character varying(25) NOT NULL
);


--
-- TOC entry 237 (class 1259 OID 19823)
-- Dependencies: 6
-- Name: asistente_dsat; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE asistente_dsat (
    dsat_id integer,
    asis_nombre character varying(100),
    asis_sexo character(1),
    asis_cargo character varying(50),
    asis_sector integer
);


--
-- TOC entry 249 (class 1259 OID 24236)
-- Dependencies: 6
-- Name: asociatividad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE asociatividad (
    aso_id integer NOT NULL,
    aso_nombre character varying(250),
    aso_fecha_constitucion date,
    aso_movil character varying(250),
    aso_apoyo character varying(250),
    aso_unidad_tecnica boolean,
    tip_id integer,
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 248 (class 1259 OID 24234)
-- Dependencies: 249 6
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE asociatividad_aso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2562 (class 0 OID 0)
-- Dependencies: 248
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE asociatividad_aso_id_seq OWNED BY asociatividad.aso_id;


--
-- TOC entry 2563 (class 0 OID 0)
-- Dependencies: 248
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('asociatividad_aso_id_seq', 26, true);


--
-- TOC entry 166 (class 1259 OID 19122)
-- Dependencies: 6
-- Name: capacitacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE capacitacion (
    cap_id integer NOT NULL,
    cap_fecha date,
    cap_tema character varying(100),
    cap_lugar character varying(50),
    cap_observacion text,
    pro_pep_id integer NOT NULL,
    cap_area character varying(200),
    eta_id integer NOT NULL
);


--
-- TOC entry 167 (class 1259 OID 19128)
-- Dependencies: 166 6
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE capacitacion_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2564 (class 0 OID 0)
-- Dependencies: 167
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE capacitacion_cap_id_seq OWNED BY capacitacion.cap_id;


--
-- TOC entry 2565 (class 0 OID 0)
-- Dependencies: 167
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 46, true);


--
-- TOC entry 168 (class 1259 OID 19130)
-- Dependencies: 2214 2215 2216 6
-- Name: ci_sessions; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE ci_sessions (
    session_id character varying(40) DEFAULT '0'::character varying NOT NULL,
    ip_address character varying(16) DEFAULT '0'::character varying NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_activity integer DEFAULT 0 NOT NULL,
    user_data text NOT NULL
);


--
-- TOC entry 169 (class 1259 OID 19139)
-- Dependencies: 6
-- Name: componente; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE componente (
    com_id integer NOT NULL,
    com_com_id integer,
    pro_id integer,
    com_codigo character varying(10),
    com_nombre character varying(100) NOT NULL,
    com_objetivo text,
    com_resultado text
);


--
-- TOC entry 170 (class 1259 OID 19145)
-- Dependencies: 6 169
-- Name: componente_com_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE componente_com_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2566 (class 0 OID 0)
-- Dependencies: 170
-- Name: componente_com_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE componente_com_id_seq OWNED BY componente.com_id;


--
-- TOC entry 2567 (class 0 OID 0)
-- Dependencies: 170
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('componente_com_id_seq', 1, false);


--
-- TOC entry 171 (class 1259 OID 19147)
-- Dependencies: 6
-- Name: consultora; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE consultora (
    cons_id integer NOT NULL,
    cons_nombre character varying(200),
    cons_direccion text NOT NULL,
    cons_telefono character(9) NOT NULL,
    cons_telefono2 character(9),
    cons_fax character(9),
    cons_email character varying(200) NOT NULL,
    cons_repres_legal character varying(100),
    cons_observaciones text
);


--
-- TOC entry 172 (class 1259 OID 19153)
-- Dependencies: 6 171
-- Name: consulta_cons_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE consulta_cons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2568 (class 0 OID 0)
-- Dependencies: 172
-- Name: consulta_cons_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE consulta_cons_id_seq OWNED BY consultora.cons_id;


--
-- TOC entry 2569 (class 0 OID 0)
-- Dependencies: 172
-- Name: consulta_cons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('consulta_cons_id_seq', 2, true);


--
-- TOC entry 173 (class 1259 OID 19155)
-- Dependencies: 6
-- Name: consultor; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE consultor (
    con_id integer NOT NULL,
    con_nombre character varying(75) NOT NULL,
    con_apellido character varying(75) NOT NULL,
    con_telefono character varying(9) NOT NULL,
    con_email character varying(100) NOT NULL,
    pro_pep_id integer NOT NULL,
    cons_id integer,
    "user" text
);


--
-- TOC entry 174 (class 1259 OID 19161)
-- Dependencies: 173 6
-- Name: consultor_con_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE consultor_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2570 (class 0 OID 0)
-- Dependencies: 174
-- Name: consultor_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE consultor_con_id_seq OWNED BY consultor.con_id;


--
-- TOC entry 2571 (class 0 OID 0)
-- Dependencies: 174
-- Name: consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('consultor_con_id_seq', 7, true);


--
-- TOC entry 175 (class 1259 OID 19163)
-- Dependencies: 6
-- Name: contrapartida; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE contrapartida (
    con_id integer NOT NULL,
    con_nombre character varying(25) NOT NULL
);


--
-- TOC entry 176 (class 1259 OID 19166)
-- Dependencies: 6
-- Name: contrapartida_acuerdo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE contrapartida_acuerdo (
    acu_mun_id integer NOT NULL,
    con_id integer NOT NULL,
    con_acu_valor boolean
);


--
-- TOC entry 177 (class 1259 OID 19169)
-- Dependencies: 6 175
-- Name: contrapartida_con_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE contrapartida_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2572 (class 0 OID 0)
-- Dependencies: 177
-- Name: contrapartida_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE contrapartida_con_id_seq OWNED BY contrapartida.con_id;


--
-- TOC entry 2573 (class 0 OID 0)
-- Dependencies: 177
-- Name: contrapartida_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('contrapartida_con_id_seq', 5, true);


--
-- TOC entry 178 (class 1259 OID 19171)
-- Dependencies: 6
-- Name: criterio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE criterio (
    cri_id integer NOT NULL,
    cri_nombre character varying(25) NOT NULL
);


--
-- TOC entry 179 (class 1259 OID 19174)
-- Dependencies: 6
-- Name: criterio_acuerdo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE criterio_acuerdo (
    cri_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    cri_acu_valor boolean
);


--
-- TOC entry 180 (class 1259 OID 19177)
-- Dependencies: 6 178
-- Name: criterio_cri_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE criterio_cri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2574 (class 0 OID 0)
-- Dependencies: 180
-- Name: criterio_cri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE criterio_cri_id_seq OWNED BY criterio.cri_id;


--
-- TOC entry 2575 (class 0 OID 0)
-- Dependencies: 180
-- Name: criterio_cri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('criterio_cri_id_seq', 4, true);


--
-- TOC entry 256 (class 1259 OID 24319)
-- Dependencies: 6
-- Name: criterio_grupo_gestor; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE criterio_grupo_gestor (
    cri_id integer NOT NULL,
    gru_ges_id integer NOT NULL,
    cri_gru_ges_valor boolean
);


--
-- TOC entry 245 (class 1259 OID 24191)
-- Dependencies: 6
-- Name: criterio_reunion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE criterio_reunion (
    cri_id integer NOT NULL,
    reu_id integer NOT NULL,
    cri_reu_valor boolean
);


--
-- TOC entry 267 (class 1259 OID 24517)
-- Dependencies: 6
-- Name: cumplimiento_diagnostico; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cumplimiento_diagnostico (
    dia_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_dia_valor boolean
);


--
-- TOC entry 181 (class 1259 OID 19179)
-- Dependencies: 6
-- Name: cumplimiento_informe; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cumplimiento_informe (
    inf_pre_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_inf_valor boolean
);


--
-- TOC entry 182 (class 1259 OID 19184)
-- Dependencies: 6
-- Name: cumplimiento_minimo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cumplimiento_minimo (
    cum_min_id integer NOT NULL,
    cum_min_nombre character varying(100) NOT NULL,
    eta_id integer
);


--
-- TOC entry 183 (class 1259 OID 19187)
-- Dependencies: 182 6
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cumplimiento_minimo_cum_min_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2576 (class 0 OID 0)
-- Dependencies: 183
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cumplimiento_minimo_cum_min_id_seq OWNED BY cumplimiento_minimo.cum_min_id;


--
-- TOC entry 2577 (class 0 OID 0)
-- Dependencies: 183
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cumplimiento_minimo_cum_min_id_seq', 27, true);


--
-- TOC entry 184 (class 1259 OID 19189)
-- Dependencies: 6
-- Name: declaracion_interes; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE declaracion_interes (
    dec_int_id integer NOT NULL,
    dec_int_fecha date,
    dec_int_lugar character varying(100),
    dec_int_comentario text,
    dec_int_ruta_archivo character varying(200),
    pro_pep_id integer
);


--
-- TOC entry 185 (class 1259 OID 19195)
-- Dependencies: 184 6
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE declaracion_interes_dec_int_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2578 (class 0 OID 0)
-- Dependencies: 185
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE declaracion_interes_dec_int_id_seq OWNED BY declaracion_interes.dec_int_id;


--
-- TOC entry 2579 (class 0 OID 0)
-- Dependencies: 185
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 2, true);


--
-- TOC entry 259 (class 1259 OID 24398)
-- Dependencies: 6
-- Name: definicion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE definicion (
    def_id integer NOT NULL,
    def_fecha date,
    def_ruta_archivo character varying(150),
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 258 (class 1259 OID 24396)
-- Dependencies: 259 6
-- Name: definicion_def_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE definicion_def_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2580 (class 0 OID 0)
-- Dependencies: 258
-- Name: definicion_def_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE definicion_def_id_seq OWNED BY definicion.def_id;


--
-- TOC entry 2581 (class 0 OID 0)
-- Dependencies: 258
-- Name: definicion_def_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('definicion_def_id_seq', 4, true);


--
-- TOC entry 186 (class 1259 OID 19197)
-- Dependencies: 6
-- Name: departamento; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE departamento (
    dep_id integer NOT NULL,
    reg_id integer NOT NULL,
    dep_nombre character varying(50) NOT NULL
);


--
-- TOC entry 187 (class 1259 OID 19200)
-- Dependencies: 6 186
-- Name: departamento_dep_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE departamento_dep_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2582 (class 0 OID 0)
-- Dependencies: 187
-- Name: departamento_dep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE departamento_dep_id_seq OWNED BY departamento.dep_id;


--
-- TOC entry 2583 (class 0 OID 0)
-- Dependencies: 187
-- Name: departamento_dep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('departamento_dep_id_seq', 1, false);


--
-- TOC entry 266 (class 1259 OID 24487)
-- Dependencies: 6
-- Name: diagnostico; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE diagnostico (
    dia_id integer NOT NULL,
    dia_fecha_borrador date,
    dia_fecha_observacion date,
    dia_fecha_concejo_muni date,
    dia_vision boolean,
    dia_observacion text,
    dia_ruta_archivo character varying(250),
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 265 (class 1259 OID 24485)
-- Dependencies: 6 266
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE diagnostico_dia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2584 (class 0 OID 0)
-- Dependencies: 265
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE diagnostico_dia_id_seq OWNED BY diagnostico.dia_id;


--
-- TOC entry 2585 (class 0 OID 0)
-- Dependencies: 265
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('diagnostico_dia_id_seq', 1, true);


--
-- TOC entry 238 (class 1259 OID 19826)
-- Dependencies: 6
-- Name: dsat; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE dsat (
    dsat_id integer NOT NULL,
    dsat_fecha date,
    dsat_actividad character varying(80),
    dsat_municipio integer,
    dsat_observaciones character varying(500),
    dsat_archivo character varying(100)
);


--
-- TOC entry 239 (class 1259 OID 19834)
-- Dependencies: 6
-- Name: dsat_sector; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE dsat_sector (
    dsat_id integer,
    sec_id integer
);


--
-- TOC entry 188 (class 1259 OID 19202)
-- Dependencies: 6
-- Name: email; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE email (
    reg_id integer,
    ase_mun_id integer,
    ema_cuenta character varying(100),
    ema_id integer NOT NULL
);


--
-- TOC entry 189 (class 1259 OID 19205)
-- Dependencies: 188 6
-- Name: email_ema_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE email_ema_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2586 (class 0 OID 0)
-- Dependencies: 189
-- Name: email_ema_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE email_ema_id_seq OWNED BY email.ema_id;


--
-- TOC entry 2587 (class 0 OID 0)
-- Dependencies: 189
-- Name: email_ema_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('email_ema_id_seq', 1, false);


--
-- TOC entry 190 (class 1259 OID 19207)
-- Dependencies: 6
-- Name: etapa; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE etapa (
    eta_id integer NOT NULL,
    eta_nombre character varying(30) NOT NULL
);


--
-- TOC entry 236 (class 1259 OID 19794)
-- Dependencies: 6
-- Name: facilitador; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE facilitador (
    fac_id integer NOT NULL,
    fac_nombre character varying(50) NOT NULL,
    fac_apellido character varying(50) NOT NULL,
    cap_id integer NOT NULL,
    fac_email character varying(255) NOT NULL,
    fac_telefono character varying(9)
);


--
-- TOC entry 235 (class 1259 OID 19792)
-- Dependencies: 6 236
-- Name: facilitador_fac_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE facilitador_fac_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2588 (class 0 OID 0)
-- Dependencies: 235
-- Name: facilitador_fac_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE facilitador_fac_id_seq OWNED BY facilitador.fac_id;


--
-- TOC entry 2589 (class 0 OID 0)
-- Dependencies: 235
-- Name: facilitador_fac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('facilitador_fac_id_seq', 8, true);


--
-- TOC entry 191 (class 1259 OID 19210)
-- Dependencies: 6
-- Name: fecha_recepcion_observacion_din; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE fecha_recepcion_observacion_din (
    fec_correlativo integer NOT NULL,
    pro_id integer,
    fec_rec_din date,
    fec_obs_din date
);


--
-- TOC entry 192 (class 1259 OID 19213)
-- Dependencies: 6
-- Name: fuente_primaria; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE fuente_primaria (
    fue_pri_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_pri_nombre character varying(50) NOT NULL,
    fue_pri_institucion character varying(100) NOT NULL,
    fue_pri_cargo character varying(30) NOT NULL,
    fue_pri_telefono character(9) NOT NULL,
    fue_pri_tipo_info character varying(150) NOT NULL
);


--
-- TOC entry 193 (class 1259 OID 19216)
-- Dependencies: 192 6
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE fuente_primaria_fue_pri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2590 (class 0 OID 0)
-- Dependencies: 193
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE fuente_primaria_fue_pri_id_seq OWNED BY fuente_primaria.fue_pri_id;


--
-- TOC entry 2591 (class 0 OID 0)
-- Dependencies: 193
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('fuente_primaria_fue_pri_id_seq', 4, true);


--
-- TOC entry 194 (class 1259 OID 19218)
-- Dependencies: 6
-- Name: fuente_secundaria; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE fuente_secundaria (
    fue_sec_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_sec_nombre character varying(100) NOT NULL,
    fue_sec_fuente character varying(100) NOT NULL,
    fue_sec_disponible_en character varying(15) NOT NULL,
    fue_sec_anio integer NOT NULL
);


--
-- TOC entry 195 (class 1259 OID 19221)
-- Dependencies: 194 6
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE fuente_secundaria_fue_sec_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2592 (class 0 OID 0)
-- Dependencies: 195
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE fuente_secundaria_fue_sec_id_seq OWNED BY fuente_secundaria.fue_sec_id;


--
-- TOC entry 2593 (class 0 OID 0)
-- Dependencies: 195
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('fuente_secundaria_fue_sec_id_seq', 1, true);


--
-- TOC entry 196 (class 1259 OID 19223)
-- Dependencies: 6
-- Name: grupo_apoyo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE grupo_apoyo (
    gru_apo_id integer NOT NULL,
    gru_apo_fecha date,
    gru_apo_c3 boolean,
    gru_apo_c4 boolean,
    gru_apo_observacion text,
    pro_pep_id integer NOT NULL,
    gru_apo_lugar text
);


--
-- TOC entry 197 (class 1259 OID 19229)
-- Dependencies: 196 6
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE grupo_apoyo_gru_apo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2594 (class 0 OID 0)
-- Dependencies: 197
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE grupo_apoyo_gru_apo_id_seq OWNED BY grupo_apoyo.gru_apo_id;


--
-- TOC entry 2595 (class 0 OID 0)
-- Dependencies: 197
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('grupo_apoyo_gru_apo_id_seq', 1, true);


--
-- TOC entry 255 (class 1259 OID 24300)
-- Dependencies: 6
-- Name: grupo_gestor; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE grupo_gestor (
    gru_ges_id integer NOT NULL,
    gru_ges_lugar character varying(150),
    gru_ges_observacion text,
    gru_ges_acuerdo boolean,
    pro_pep_id integer NOT NULL,
    gru_ges_fecha date
);


--
-- TOC entry 254 (class 1259 OID 24298)
-- Dependencies: 6 255
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE grupo_gestor_gru_ges_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2596 (class 0 OID 0)
-- Dependencies: 254
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE grupo_gestor_gru_ges_id_seq OWNED BY grupo_gestor.gru_ges_id;


--
-- TOC entry 2597 (class 0 OID 0)
-- Dependencies: 254
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('grupo_gestor_gru_ges_id_seq', 1, true);


--
-- TOC entry 198 (class 1259 OID 19231)
-- Dependencies: 6
-- Name: indicador; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE indicador (
    ind_id integer NOT NULL,
    com_id integer NOT NULL,
    ind_nombre text NOT NULL,
    ind_tipo integer NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 19237)
-- Dependencies: 6 198
-- Name: indicador_ind_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE indicador_ind_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2598 (class 0 OID 0)
-- Dependencies: 199
-- Name: indicador_ind_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE indicador_ind_id_seq OWNED BY indicador.ind_id;


--
-- TOC entry 2599 (class 0 OID 0)
-- Dependencies: 199
-- Name: indicador_ind_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('indicador_ind_id_seq', 1, false);


--
-- TOC entry 200 (class 1259 OID 19239)
-- Dependencies: 6
-- Name: informe_preliminar; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE informe_preliminar (
    inf_pre_id integer NOT NULL,
    inf_pre_fecha_borrador date,
    inf_pre_fecha_observacion date,
    inf_pre_aceptacion date,
    inf_pre_firmam boolean,
    inf_pre_firmai boolean,
    inf_pre_firmau boolean,
    inf_pre_observacion text,
    pro_pep_id integer NOT NULL,
    inf_pre_ruta_archivo text,
    inf_pre_aceptada boolean
);


--
-- TOC entry 201 (class 1259 OID 19245)
-- Dependencies: 200 6
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE informe_preliminar_inf_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2600 (class 0 OID 0)
-- Dependencies: 201
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE informe_preliminar_inf_pre_id_seq OWNED BY informe_preliminar.inf_pre_id;


--
-- TOC entry 2601 (class 0 OID 0)
-- Dependencies: 201
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 4, true);


--
-- TOC entry 202 (class 1259 OID 19247)
-- Dependencies: 6
-- Name: institucion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE institucion (
    ins_id integer NOT NULL,
    ins_nombre character varying(50) NOT NULL
);


--
-- TOC entry 203 (class 1259 OID 19250)
-- Dependencies: 6 202
-- Name: institucion_ins_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE institucion_ins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2602 (class 0 OID 0)
-- Dependencies: 203
-- Name: institucion_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE institucion_ins_id_seq OWNED BY institucion.ins_id;


--
-- TOC entry 2603 (class 0 OID 0)
-- Dependencies: 203
-- Name: institucion_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('institucion_ins_id_seq', 6, true);


--
-- TOC entry 253 (class 1259 OID 24271)
-- Dependencies: 6
-- Name: integrante_asociatividad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE integrante_asociatividad (
    int_aso_id integer NOT NULL,
    int_aso_nombre character varying(250) NOT NULL,
    aso_id integer
);


--
-- TOC entry 252 (class 1259 OID 24269)
-- Dependencies: 253 6
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE integrante_asociatividad_int_aso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2604 (class 0 OID 0)
-- Dependencies: 252
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE integrante_asociatividad_int_aso_id_seq OWNED BY integrante_asociatividad.int_aso_id;


--
-- TOC entry 2605 (class 0 OID 0)
-- Dependencies: 252
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('integrante_asociatividad_int_aso_id_seq', 4, true);


--
-- TOC entry 204 (class 1259 OID 19252)
-- Dependencies: 6
-- Name: inventario_informacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE inventario_informacion (
    inv_inf_id integer NOT NULL,
    inv_inf_observacion text,
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 205 (class 1259 OID 19258)
-- Dependencies: 6 204
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE inventario_informacion_inv_inf_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2606 (class 0 OID 0)
-- Dependencies: 205
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE inventario_informacion_inv_inf_id_seq OWNED BY inventario_informacion.inv_inf_id;


--
-- TOC entry 2607 (class 0 OID 0)
-- Dependencies: 205
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('inventario_informacion_inv_inf_id_seq', 2, true);


--
-- TOC entry 206 (class 1259 OID 19260)
-- Dependencies: 6
-- Name: login_attempts; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE login_attempts (
    id integer NOT NULL,
    ip_address character varying(40) NOT NULL,
    login character varying(50) NOT NULL,
    "time" timestamp without time zone
);


--
-- TOC entry 207 (class 1259 OID 19263)
-- Dependencies: 6 206
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE login_attempts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2608 (class 0 OID 0)
-- Dependencies: 207
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


--
-- TOC entry 2609 (class 0 OID 0)
-- Dependencies: 207
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('login_attempts_id_seq', 6, true);


--
-- TOC entry 208 (class 1259 OID 19273)
-- Dependencies: 6
-- Name: municipio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE municipio (
    mun_id integer NOT NULL,
    dep_id integer NOT NULL,
    mun_nombre character varying(50) NOT NULL,
    mun_presupuesto numeric(6,2)
);


--
-- TOC entry 209 (class 1259 OID 19276)
-- Dependencies: 6
-- Name: municipio_componente; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE municipio_componente (
    com_id integer NOT NULL,
    mun_id integer NOT NULL,
    mun_com_asignacion numeric(6,2)
);


--
-- TOC entry 210 (class 1259 OID 19279)
-- Dependencies: 208 6
-- Name: municipio_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE municipio_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2610 (class 0 OID 0)
-- Dependencies: 210
-- Name: municipio_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE municipio_mun_id_seq OWNED BY municipio.mun_id;


--
-- TOC entry 2611 (class 0 OID 0)
-- Dependencies: 210
-- Name: municipio_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('municipio_mun_id_seq', 1, false);


--
-- TOC entry 211 (class 1259 OID 19281)
-- Dependencies: 6
-- Name: opcion_sistema; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE opcion_sistema (
    opc_sis_id integer NOT NULL,
    opc_sis_nombre character varying(40) NOT NULL,
    opc_sis_url character varying(100) NOT NULL,
    opc_opc_sis_id integer,
    opc_sis_orden integer
);


--
-- TOC entry 212 (class 1259 OID 19284)
-- Dependencies: 211 6
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE opcion_sistema_opc_sis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2612 (class 0 OID 0)
-- Dependencies: 212
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE opcion_sistema_opc_sis_id_seq OWNED BY opcion_sistema.opc_sis_id;


--
-- TOC entry 2613 (class 0 OID 0)
-- Dependencies: 212
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 39, true);


--
-- TOC entry 213 (class 1259 OID 19286)
-- Dependencies: 6
-- Name: participante; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE participante (
    par_id integer NOT NULL,
    gru_apo_id integer,
    reu_id integer,
    ins_id integer,
    dec_int_id integer,
    inf_pre_id integer,
    par_nombre character varying(50) NOT NULL,
    par_apellido character varying(50) NOT NULL,
    par_sexo character(1) NOT NULL,
    par_cargo character varying(30),
    par_edad integer,
    par_nivel_esco character varying(25),
    par_tel character(9),
    par_dui character(10),
    par_proviene character(1),
    acu_mun_id integer,
    par_otros integer,
    aso_id integer,
    par_direccion character varying(250),
    par_email character varying(250),
    gru_ges_id integer,
    par_tipo character varying(1)
);


--
-- TOC entry 214 (class 1259 OID 19289)
-- Dependencies: 6
-- Name: participante_capacitacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE participante_capacitacion (
    par_id integer NOT NULL,
    cap_id integer NOT NULL,
    par_cap_participa character varying(6)
);


--
-- TOC entry 257 (class 1259 OID 24370)
-- Dependencies: 6
-- Name: participante_definicion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE participante_definicion (
    par_id integer NOT NULL,
    def_id integer NOT NULL,
    par_def_participa character varying(6)
);


--
-- TOC entry 215 (class 1259 OID 19292)
-- Dependencies: 6 213
-- Name: participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2614 (class 0 OID 0)
-- Dependencies: 215
-- Name: participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE participante_par_id_seq OWNED BY participante.par_id;


--
-- TOC entry 2615 (class 0 OID 0)
-- Dependencies: 215
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('participante_par_id_seq', 50, true);


--
-- TOC entry 264 (class 1259 OID 24470)
-- Dependencies: 6
-- Name: participante_priorizacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE participante_priorizacion (
    par_id integer NOT NULL,
    pri_id integer NOT NULL,
    par_pri_participa character varying(6)
);


--
-- TOC entry 216 (class 1259 OID 19297)
-- Dependencies: 6
-- Name: personal_enlace; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE personal_enlace (
    per_enl_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    per_enl_nombre character varying(50) NOT NULL,
    per_enl_apellido character varying(50) NOT NULL,
    per_enl_sexo character(1) NOT NULL,
    per_enl_cargo character varying(30) NOT NULL
);


--
-- TOC entry 217 (class 1259 OID 19300)
-- Dependencies: 6 216
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE personal_enlace_per_enl_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2616 (class 0 OID 0)
-- Dependencies: 217
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE personal_enlace_per_enl_id_seq OWNED BY personal_enlace.per_enl_id;


--
-- TOC entry 2617 (class 0 OID 0)
-- Dependencies: 217
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('personal_enlace_per_enl_id_seq', 1, false);


--
-- TOC entry 247 (class 1259 OID 24208)
-- Dependencies: 6
-- Name: poblacion_reunion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE poblacion_reunion (
    pob_id integer NOT NULL,
    pob_comunidad boolean,
    pob_sector boolean,
    pob_institucion boolean,
    reu_id integer NOT NULL
);


--
-- TOC entry 246 (class 1259 OID 24206)
-- Dependencies: 6 247
-- Name: poblacion_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE poblacion_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2618 (class 0 OID 0)
-- Dependencies: 246
-- Name: poblacion_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE poblacion_pro_id_seq OWNED BY poblacion_reunion.pob_id;


--
-- TOC entry 2619 (class 0 OID 0)
-- Dependencies: 246
-- Name: poblacion_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('poblacion_pro_id_seq', 12, true);


--
-- TOC entry 218 (class 1259 OID 19302)
-- Dependencies: 6
-- Name: presupuesto; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE presupuesto (
    pre_id integer NOT NULL,
    com_id integer NOT NULL,
    pre_tipo integer NOT NULL,
    pre_cantidad numeric(10,2) NOT NULL
);


--
-- TOC entry 219 (class 1259 OID 19305)
-- Dependencies: 218 6
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE presupuesto_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2620 (class 0 OID 0)
-- Dependencies: 219
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE presupuesto_pre_id_seq OWNED BY presupuesto.pre_id;


--
-- TOC entry 2621 (class 0 OID 0)
-- Dependencies: 219
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('presupuesto_pre_id_seq', 1, false);


--
-- TOC entry 261 (class 1259 OID 24426)
-- Dependencies: 6
-- Name: priorizacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE priorizacion (
    pri_id integer NOT NULL,
    pri_fecha date,
    pri_observacion text,
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 260 (class 1259 OID 24424)
-- Dependencies: 6 261
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE priorizacion_pri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2622 (class 0 OID 0)
-- Dependencies: 260
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE priorizacion_pri_id_seq OWNED BY priorizacion.pri_id;


--
-- TOC entry 2623 (class 0 OID 0)
-- Dependencies: 260
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('priorizacion_pri_id_seq', 2, true);


--
-- TOC entry 242 (class 1259 OID 24169)
-- Dependencies: 6
-- Name: problema_identificado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE problema_identificado (
    pro_ide_id integer NOT NULL,
    pro_ide_tema character varying(250) NOT NULL,
    pro_ide_problema character varying(250) NOT NULL,
    pro_ide_prioridad integer NOT NULL,
    are_dim_id integer NOT NULL,
    reu_id integer,
    def_id integer
);


--
-- TOC entry 241 (class 1259 OID 24167)
-- Dependencies: 6 242
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE problema_identificado_pro_ide_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2624 (class 0 OID 0)
-- Dependencies: 241
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE problema_identificado_pro_ide_id_seq OWNED BY problema_identificado.pro_ide_id;


--
-- TOC entry 2625 (class 0 OID 0)
-- Dependencies: 241
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('problema_identificado_pro_ide_id_seq', 17, true);


--
-- TOC entry 220 (class 1259 OID 19307)
-- Dependencies: 6
-- Name: proyecto; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE proyecto (
    pro_id integer NOT NULL,
    mun_id integer NOT NULL,
    com_id integer NOT NULL,
    pro_codigo integer,
    pro_nombre character varying(150),
    pro_num_ord_llegada integer,
    pro_zona_fisdl character varying(15),
    pro_nom_formulador character varying(50),
    pro_nom_ref_tec_municipal character varying(50),
    pro_email_ref_tec_municipal character varying(50),
    pro_tel_ref_tec_municipal character varying(9),
    pro_nom_ase_fisdl character varying(50),
    pro_email_ase_fisdl character varying(50),
    pro_tel_ase_fisdl character varying(9),
    pro_fec_ent_gl_fisdl date,
    pro_fec_ent_gop_gpr date,
    pro_rec_gpr date,
    pro_fec_ent_gpr_din date,
    pro_estatus integer,
    pro_mon_ejecucion numeric(6,2),
    pro_fec_visita date,
    pro_num_rev integer,
    pro_fec_visado date,
    pro_mon_visado numeric(6,2),
    pro_obs_din character varying(500),
    pro_tipologia character varying(15),
    pro_sal_par_ciudadana character varying(100),
    pro_sal_pue_indigenas character varying(100),
    pro_sal_rea_involuntario character varying(100)
);


--
-- TOC entry 221 (class 1259 OID 19313)
-- Dependencies: 6
-- Name: proyecto_pep; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE proyecto_pep (
    pro_pep_id integer NOT NULL,
    pro_pep_nombre text NOT NULL,
    pro_pep_descripcion text,
    mun_id integer NOT NULL,
    acu_mun_id integer,
    inf_pre_id integer,
    inv_inf_id integer,
    gru_apo_id integer,
    con_id integer,
    pro_pep_fec_fin date,
    pro_pep_fec_contrato date,
    gru_ges_id integer,
    def_id integer,
    pri_id integer,
    dia_id integer
);


--
-- TOC entry 222 (class 1259 OID 19319)
-- Dependencies: 6 221
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "proyecto_Pep_pro_pep_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2626 (class 0 OID 0)
-- Dependencies: 222
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "proyecto_Pep_pro_pep_id_seq" OWNED BY proyecto_pep.pro_pep_id;


--
-- TOC entry 2627 (class 0 OID 0)
-- Dependencies: 222
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"proyecto_Pep_pro_pep_id_seq"', 7, true);


--
-- TOC entry 263 (class 1259 OID 24456)
-- Dependencies: 6
-- Name: proyecto_identificado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE proyecto_identificado (
    pro_ide_id integer NOT NULL,
    pro_ide_nombre character varying(250),
    pro_ide_ubicacion character varying(250),
    pro_ide_ff character(2),
    pro_ide_monto numeric(12,2),
    pro_ide_plazoejec numeric(4,2),
    pro_ide_pbh numeric(12,2),
    pro_ide_pbm numeric(12,2),
    pro_ide_prioridad integer,
    pro_ide_estado character(1),
    pro_ide_ruta_archivo character varying(150),
    pri_id integer
);


--
-- TOC entry 262 (class 1259 OID 24454)
-- Dependencies: 263 6
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE proyecto_identificado_pro_ide_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2628 (class 0 OID 0)
-- Dependencies: 262
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE proyecto_identificado_pro_ide_id_seq OWNED BY proyecto_identificado.pro_ide_id;


--
-- TOC entry 2629 (class 0 OID 0)
-- Dependencies: 262
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('proyecto_identificado_pro_ide_id_seq', 2, true);


--
-- TOC entry 223 (class 1259 OID 19321)
-- Dependencies: 6
-- Name: region; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE region (
    reg_id integer NOT NULL,
    reg_nombre character varying(50) NOT NULL,
    reg_direccion character varying(100)
);


--
-- TOC entry 224 (class 1259 OID 19324)
-- Dependencies: 6 223
-- Name: region_reg_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE region_reg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2630 (class 0 OID 0)
-- Dependencies: 224
-- Name: region_reg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE region_reg_id_seq OWNED BY region.reg_id;


--
-- TOC entry 2631 (class 0 OID 0)
-- Dependencies: 224
-- Name: region_reg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('region_reg_id_seq', 1, false);


--
-- TOC entry 225 (class 1259 OID 19326)
-- Dependencies: 6
-- Name: reunion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE reunion (
    reu_id integer NOT NULL,
    eta_id integer NOT NULL,
    reu_numero integer,
    reu_fecha date,
    reu_duracion_horas integer,
    reu_tema character varying(200),
    reu_resultado text,
    reu_observacion text,
    pro_pep_id integer NOT NULL
);


--
-- TOC entry 2632 (class 0 OID 0)
-- Dependencies: 225
-- Name: COLUMN reunion.reu_resultado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN reunion.reu_resultado IS 'reu_resultado-->> es actividad en la etapa2';


--
-- TOC entry 226 (class 1259 OID 19332)
-- Dependencies: 225 6
-- Name: reunion_reu_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE reunion_reu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2633 (class 0 OID 0)
-- Dependencies: 226
-- Name: reunion_reu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE reunion_reu_id_seq OWNED BY reunion.reu_id;


--
-- TOC entry 2634 (class 0 OID 0)
-- Dependencies: 226
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 173, true);


--
-- TOC entry 227 (class 1259 OID 19334)
-- Dependencies: 6
-- Name: rol; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE rol (
    rol_id integer NOT NULL,
    rol_nombre character varying(25) NOT NULL,
    rol_descripcion character varying(100)
);


--
-- TOC entry 228 (class 1259 OID 19337)
-- Dependencies: 6
-- Name: rol_opcion_sistema; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE rol_opcion_sistema (
    rol_id integer NOT NULL,
    opc_sis_id integer NOT NULL
);


--
-- TOC entry 229 (class 1259 OID 19340)
-- Dependencies: 227 6
-- Name: rol_rol_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE rol_rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2635 (class 0 OID 0)
-- Dependencies: 229
-- Name: rol_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE rol_rol_id_seq OWNED BY rol.rol_id;


--
-- TOC entry 2636 (class 0 OID 0)
-- Dependencies: 229
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('rol_rol_id_seq', 29, true);


--
-- TOC entry 240 (class 1259 OID 19837)
-- Dependencies: 6
-- Name: sector; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE sector (
    sec_id integer NOT NULL,
    sec_nombre character varying(25)
);


--
-- TOC entry 251 (class 1259 OID 24248)
-- Dependencies: 6
-- Name: tipo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE tipo (
    tip_id integer NOT NULL,
    tip_nombre character varying(25)
);


--
-- TOC entry 250 (class 1259 OID 24246)
-- Dependencies: 251 6
-- Name: tipo_tip_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE tipo_tip_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2637 (class 0 OID 0)
-- Dependencies: 250
-- Name: tipo_tip_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE tipo_tip_id_seq OWNED BY tipo.tip_id;


--
-- TOC entry 2638 (class 0 OID 0)
-- Dependencies: 250
-- Name: tipo_tip_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('tipo_tip_id_seq', 3, true);


--
-- TOC entry 230 (class 1259 OID 19355)
-- Dependencies: 2243 6
-- Name: user_autologin; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone NOT NULL
);


--
-- TOC entry 231 (class 1259 OID 19359)
-- Dependencies: 2244 2245 6
-- Name: user_profiles; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE user_profiles (
    id integer NOT NULL,
    user_id integer NOT NULL,
    country character varying(20) DEFAULT NULL::character varying,
    website character varying(255) DEFAULT NULL::character varying
);


--
-- TOC entry 232 (class 1259 OID 19364)
-- Dependencies: 6 231
-- Name: user_profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE user_profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2639 (class 0 OID 0)
-- Dependencies: 232
-- Name: user_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE user_profiles_id_seq OWNED BY user_profiles.id;


--
-- TOC entry 2640 (class 0 OID 0)
-- Dependencies: 232
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('user_profiles_id_seq', 5, true);


--
-- TOC entry 233 (class 1259 OID 19366)
-- Dependencies: 2247 2248 2249 2250 2251 2252 6
-- Name: users; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    activated integer DEFAULT 1 NOT NULL,
    banned integer DEFAULT 0 NOT NULL,
    ban_reason character varying(255) DEFAULT NULL::character varying,
    new_password_key character varying(50) DEFAULT NULL::character varying,
    new_password_requested date,
    new_email character varying(100) DEFAULT NULL::character varying,
    new_email_key character varying(50) DEFAULT NULL::character varying,
    last_ip character varying(40) NOT NULL,
    last_login date,
    created date,
    modified date,
    rol_id integer NOT NULL
);


--
-- TOC entry 234 (class 1259 OID 19378)
-- Dependencies: 6 233
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2641 (class 0 OID 0)
-- Dependencies: 234
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 2642 (class 0 OID 0)
-- Dependencies: 234
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 9, true);


--
-- TOC entry 2211 (class 2604 OID 19380)
-- Dependencies: 162 161
-- Name: act_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY actividad ALTER COLUMN act_id SET DEFAULT nextval('actividad_act_id_seq'::regclass);


--
-- TOC entry 2212 (class 2604 OID 19381)
-- Dependencies: 164 163
-- Name: acu_mun_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY acuerdo_municipal ALTER COLUMN acu_mun_id SET DEFAULT nextval('acuerdo_municipal_acu_mun_id_seq'::regclass);


--
-- TOC entry 2256 (class 2604 OID 24183)
-- Dependencies: 243 244 244
-- Name: are_dim_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY area_dimension ALTER COLUMN are_dim_id SET DEFAULT nextval('area_dimension_are_dim_id_seq'::regclass);


--
-- TOC entry 2258 (class 2604 OID 24239)
-- Dependencies: 248 249 249
-- Name: aso_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY asociatividad ALTER COLUMN aso_id SET DEFAULT nextval('asociatividad_aso_id_seq'::regclass);


--
-- TOC entry 2213 (class 2604 OID 19382)
-- Dependencies: 167 166
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY capacitacion ALTER COLUMN cap_id SET DEFAULT nextval('capacitacion_cap_id_seq'::regclass);


--
-- TOC entry 2217 (class 2604 OID 19383)
-- Dependencies: 170 169
-- Name: com_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY componente ALTER COLUMN com_id SET DEFAULT nextval('componente_com_id_seq'::regclass);


--
-- TOC entry 2219 (class 2604 OID 19384)
-- Dependencies: 174 173
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY consultor ALTER COLUMN con_id SET DEFAULT nextval('consultor_con_id_seq'::regclass);


--
-- TOC entry 2218 (class 2604 OID 19385)
-- Dependencies: 172 171
-- Name: cons_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY consultora ALTER COLUMN cons_id SET DEFAULT nextval('consulta_cons_id_seq'::regclass);


--
-- TOC entry 2220 (class 2604 OID 19386)
-- Dependencies: 177 175
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY contrapartida ALTER COLUMN con_id SET DEFAULT nextval('contrapartida_con_id_seq'::regclass);


--
-- TOC entry 2221 (class 2604 OID 19387)
-- Dependencies: 180 178
-- Name: cri_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio ALTER COLUMN cri_id SET DEFAULT nextval('criterio_cri_id_seq'::regclass);


--
-- TOC entry 2222 (class 2604 OID 19389)
-- Dependencies: 183 182
-- Name: cum_min_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_minimo ALTER COLUMN cum_min_id SET DEFAULT nextval('cumplimiento_minimo_cum_min_id_seq'::regclass);


--
-- TOC entry 2223 (class 2604 OID 19390)
-- Dependencies: 185 184
-- Name: dec_int_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY declaracion_interes ALTER COLUMN dec_int_id SET DEFAULT nextval('declaracion_interes_dec_int_id_seq'::regclass);


--
-- TOC entry 2262 (class 2604 OID 24411)
-- Dependencies: 259 258 259
-- Name: def_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY definicion ALTER COLUMN def_id SET DEFAULT nextval('definicion_def_id_seq'::regclass);


--
-- TOC entry 2224 (class 2604 OID 19391)
-- Dependencies: 187 186
-- Name: dep_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY departamento ALTER COLUMN dep_id SET DEFAULT nextval('departamento_dep_id_seq'::regclass);


--
-- TOC entry 2265 (class 2604 OID 24490)
-- Dependencies: 266 265 266
-- Name: dia_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY diagnostico ALTER COLUMN dia_id SET DEFAULT nextval('diagnostico_dia_id_seq'::regclass);


--
-- TOC entry 2225 (class 2604 OID 19392)
-- Dependencies: 189 188
-- Name: ema_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY email ALTER COLUMN ema_id SET DEFAULT nextval('email_ema_id_seq'::regclass);


--
-- TOC entry 2254 (class 2604 OID 19797)
-- Dependencies: 236 235 236
-- Name: fac_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY facilitador ALTER COLUMN fac_id SET DEFAULT nextval('facilitador_fac_id_seq'::regclass);


--
-- TOC entry 2226 (class 2604 OID 19393)
-- Dependencies: 193 192
-- Name: fue_pri_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY fuente_primaria ALTER COLUMN fue_pri_id SET DEFAULT nextval('fuente_primaria_fue_pri_id_seq'::regclass);


--
-- TOC entry 2227 (class 2604 OID 19394)
-- Dependencies: 195 194
-- Name: fue_sec_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY fuente_secundaria ALTER COLUMN fue_sec_id SET DEFAULT nextval('fuente_secundaria_fue_sec_id_seq'::regclass);


--
-- TOC entry 2228 (class 2604 OID 19395)
-- Dependencies: 197 196
-- Name: gru_apo_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY grupo_apoyo ALTER COLUMN gru_apo_id SET DEFAULT nextval('grupo_apoyo_gru_apo_id_seq'::regclass);


--
-- TOC entry 2261 (class 2604 OID 24303)
-- Dependencies: 254 255 255
-- Name: gru_ges_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY grupo_gestor ALTER COLUMN gru_ges_id SET DEFAULT nextval('grupo_gestor_gru_ges_id_seq'::regclass);


--
-- TOC entry 2229 (class 2604 OID 19396)
-- Dependencies: 199 198
-- Name: ind_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY indicador ALTER COLUMN ind_id SET DEFAULT nextval('indicador_ind_id_seq'::regclass);


--
-- TOC entry 2230 (class 2604 OID 19397)
-- Dependencies: 201 200
-- Name: inf_pre_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY informe_preliminar ALTER COLUMN inf_pre_id SET DEFAULT nextval('informe_preliminar_inf_pre_id_seq'::regclass);


--
-- TOC entry 2231 (class 2604 OID 19398)
-- Dependencies: 203 202
-- Name: ins_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY institucion ALTER COLUMN ins_id SET DEFAULT nextval('institucion_ins_id_seq'::regclass);


--
-- TOC entry 2260 (class 2604 OID 24274)
-- Dependencies: 253 252 253
-- Name: int_aso_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY integrante_asociatividad ALTER COLUMN int_aso_id SET DEFAULT nextval('integrante_asociatividad_int_aso_id_seq'::regclass);


--
-- TOC entry 2232 (class 2604 OID 19399)
-- Dependencies: 205 204
-- Name: inv_inf_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY inventario_informacion ALTER COLUMN inv_inf_id SET DEFAULT nextval('inventario_informacion_inv_inf_id_seq'::regclass);


--
-- TOC entry 2233 (class 2604 OID 19400)
-- Dependencies: 207 206
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- TOC entry 2234 (class 2604 OID 19402)
-- Dependencies: 210 208
-- Name: mun_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY municipio ALTER COLUMN mun_id SET DEFAULT nextval('municipio_mun_id_seq'::regclass);


--
-- TOC entry 2235 (class 2604 OID 19403)
-- Dependencies: 212 211
-- Name: opc_sis_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY opcion_sistema ALTER COLUMN opc_sis_id SET DEFAULT nextval('opcion_sistema_opc_sis_id_seq'::regclass);


--
-- TOC entry 2236 (class 2604 OID 19404)
-- Dependencies: 215 213
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante ALTER COLUMN par_id SET DEFAULT nextval('participante_par_id_seq'::regclass);


--
-- TOC entry 2237 (class 2604 OID 19405)
-- Dependencies: 217 216
-- Name: per_enl_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY personal_enlace ALTER COLUMN per_enl_id SET DEFAULT nextval('personal_enlace_per_enl_id_seq'::regclass);


--
-- TOC entry 2257 (class 2604 OID 24211)
-- Dependencies: 247 246 247
-- Name: pob_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY poblacion_reunion ALTER COLUMN pob_id SET DEFAULT nextval('poblacion_pro_id_seq'::regclass);


--
-- TOC entry 2238 (class 2604 OID 19406)
-- Dependencies: 219 218
-- Name: pre_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY presupuesto ALTER COLUMN pre_id SET DEFAULT nextval('presupuesto_pre_id_seq'::regclass);


--
-- TOC entry 2263 (class 2604 OID 24429)
-- Dependencies: 261 260 261
-- Name: pri_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY priorizacion ALTER COLUMN pri_id SET DEFAULT nextval('priorizacion_pri_id_seq'::regclass);


--
-- TOC entry 2255 (class 2604 OID 24172)
-- Dependencies: 242 241 242
-- Name: pro_ide_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY problema_identificado ALTER COLUMN pro_ide_id SET DEFAULT nextval('problema_identificado_pro_ide_id_seq'::regclass);


--
-- TOC entry 2264 (class 2604 OID 24459)
-- Dependencies: 262 263 263
-- Name: pro_ide_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_identificado ALTER COLUMN pro_ide_id SET DEFAULT nextval('proyecto_identificado_pro_ide_id_seq'::regclass);


--
-- TOC entry 2239 (class 2604 OID 19407)
-- Dependencies: 222 221
-- Name: pro_pep_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep ALTER COLUMN pro_pep_id SET DEFAULT nextval('"proyecto_Pep_pro_pep_id_seq"'::regclass);


--
-- TOC entry 2240 (class 2604 OID 19408)
-- Dependencies: 224 223
-- Name: reg_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY region ALTER COLUMN reg_id SET DEFAULT nextval('region_reg_id_seq'::regclass);


--
-- TOC entry 2241 (class 2604 OID 19409)
-- Dependencies: 226 225
-- Name: reu_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY reunion ALTER COLUMN reu_id SET DEFAULT nextval('reunion_reu_id_seq'::regclass);


--
-- TOC entry 2242 (class 2604 OID 19410)
-- Dependencies: 229 227
-- Name: rol_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY rol ALTER COLUMN rol_id SET DEFAULT nextval('rol_rol_id_seq'::regclass);


--
-- TOC entry 2259 (class 2604 OID 24251)
-- Dependencies: 251 250 251
-- Name: tip_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipo ALTER COLUMN tip_id SET DEFAULT nextval('tipo_tip_id_seq'::regclass);


--
-- TOC entry 2246 (class 2604 OID 19413)
-- Dependencies: 232 231
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY user_profiles ALTER COLUMN id SET DEFAULT nextval('user_profiles_id_seq'::regclass);


--
-- TOC entry 2253 (class 2604 OID 19414)
-- Dependencies: 234 233
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2484 (class 0 OID 19103)
-- Dependencies: 161 2548
-- Data for Name: actividad; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2485 (class 0 OID 19111)
-- Dependencies: 163 2548
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id, acu_mun_ruta_archivo) VALUES (13, NULL, NULL, NULL, '', 7, 'documentos/acuerdo_municipal/acuerdo_municipal13.pdf');


--
-- TOC entry 2533 (class 0 OID 24180)
-- Dependencies: 244 2548
-- Data for Name: area_dimension; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO area_dimension (are_dim_id, are_dim_nombre) VALUES (2, 'Económico');
INSERT INTO area_dimension (are_dim_id, are_dim_nombre) VALUES (3, 'Ambiental');
INSERT INTO area_dimension (are_dim_id, are_dim_nombre) VALUES (4, 'Político Institucional');
INSERT INTO area_dimension (are_dim_id, are_dim_nombre) VALUES (1, 'Socio-Cultural');


--
-- TOC entry 2486 (class 0 OID 19119)
-- Dependencies: 165 2548
-- Data for Name: asesor_municipal; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2528 (class 0 OID 19823)
-- Dependencies: 237 2548
-- Data for Name: asistente_dsat; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2536 (class 0 OID 24236)
-- Dependencies: 249 2548
-- Data for Name: asociatividad; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO asociatividad (aso_id, aso_nombre, aso_fecha_constitucion, aso_movil, aso_apoyo, aso_unidad_tecnica, tip_id, pro_pep_id) VALUES (26, 'nuevo', '2012-12-27', 'qqqqqqqqq', 'qqqqqqqqqq', true, 2, 7);
INSERT INTO asociatividad (aso_id, aso_nombre, aso_fecha_constitucion, aso_movil, aso_apoyo, aso_unidad_tecnica, tip_id, pro_pep_id) VALUES (24, 'fffff', '2012-12-06', 'ffffff', 'ffffff', true, 3, 7);


--
-- TOC entry 2487 (class 0 OID 19122)
-- Dependencies: 166 2548
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) VALUES (45, '2012-12-13', 'Tema 1.1', 'Lugar 1.1', '', 7, 'Finanzas', 2);
INSERT INTO capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) VALUES (46, '2012-12-14', 'Tema 2', 'Lugar 2', '', 7, 'Finanzas', 2);
INSERT INTO capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) VALUES (20, '2012-11-07', 'El beneficio de las finanzas', 'Casa Comunal La Gloria', '', 7, 'Finanzas', 1);


--
-- TOC entry 2488 (class 0 OID 19130)
-- Dependencies: 168 2548
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) VALUES ('8fd0412b91828d4c72ab0e622ad8d391', '127.0.0.3', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.16) Gecko/20121020 Iceweasel/3.5.16 (like Firefox/3.5.16)', 1354849170, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"9";s:8:"username";s:11:"cfuentes_86";s:6:"status";s:1:"1";}');
INSERT INTO ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) VALUES ('e143c7342c5d6bb4babaa15ed454bdc5', '127.0.0.3', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11', 1354855833, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"9";s:8:"username";s:11:"cfuentes_86";s:6:"status";s:1:"1";}');


--
-- TOC entry 2489 (class 0 OID 19139)
-- Dependencies: 169 2548
-- Data for Name: componente; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2491 (class 0 OID 19155)
-- Dependencies: 173 2548
-- Data for Name: consultor; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO consultor (con_id, con_nombre, con_apellido, con_telefono, con_email, pro_pep_id, cons_id, "user") VALUES (1, 'Carlos Mario', 'Morán', '7845-9636', 'cfuentes_86@hotmail.com', 1, NULL, NULL);
INSERT INTO consultor (con_id, con_nombre, con_apellido, con_telefono, con_email, pro_pep_id, cons_id, "user") VALUES (7, 'Cristian Oswaldo', 'Fuentes', '7458-9632', 'cfuentes_86@hotmail.com', 7, 1, 'cfuentes_86');


--
-- TOC entry 2490 (class 0 OID 19147)
-- Dependencies: 171 2548
-- Data for Name: consultora; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO consultora (cons_id, cons_nombre, cons_direccion, cons_telefono, cons_telefono2, cons_fax, cons_email, cons_repres_legal, cons_observaciones) VALUES (2, 'Consultora 2', 'Colonia Atlacatl', '2278-9632', '         ', '2298-9565', 'consultora2@gmail.com', 'Mauricio Cantarero', '');
INSERT INTO consultora (cons_id, cons_nombre, cons_direccion, cons_telefono, cons_telefono2, cons_fax, cons_email, cons_repres_legal, cons_observaciones) VALUES (1, 'Consultora1', 'Colonia nose ', '2276-1821', '         ', '2276-9632', 'consultora1@gmail.com', 'Lic. Marroquin', '');


--
-- TOC entry 2492 (class 0 OID 19163)
-- Dependencies: 175 2548
-- Data for Name: contrapartida; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO contrapartida (con_id, con_nombre) VALUES (1, 'Locales para reuniones');
INSERT INTO contrapartida (con_id, con_nombre) VALUES (3, 'Alimentación');
INSERT INTO contrapartida (con_id, con_nombre) VALUES (4, 'Materiales y Equipo');
INSERT INTO contrapartida (con_id, con_nombre) VALUES (5, 'Personal');
INSERT INTO contrapartida (con_id, con_nombre) VALUES (2, 'Transporte');


--
-- TOC entry 2493 (class 0 OID 19166)
-- Dependencies: 176 2548
-- Data for Name: contrapartida_acuerdo; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) VALUES (13, 1, true);
INSERT INTO contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) VALUES (13, 3, false);
INSERT INTO contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) VALUES (13, 4, false);
INSERT INTO contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) VALUES (13, 5, false);
INSERT INTO contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) VALUES (13, 2, true);


--
-- TOC entry 2494 (class 0 OID 19171)
-- Dependencies: 178 2548
-- Data for Name: criterio; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO criterio (cri_id, cri_nombre) VALUES (1, 'Representatividad');
INSERT INTO criterio (cri_id, cri_nombre) VALUES (2, 'Proporcionalidad');
INSERT INTO criterio (cri_id, cri_nombre) VALUES (3, 'Pluralidad');
INSERT INTO criterio (cri_id, cri_nombre) VALUES (4, 'Equidad');


--
-- TOC entry 2495 (class 0 OID 19174)
-- Dependencies: 179 2548
-- Data for Name: criterio_acuerdo; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) VALUES (1, 13, true);
INSERT INTO criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) VALUES (2, 13, true);
INSERT INTO criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) VALUES (3, 13, NULL);
INSERT INTO criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) VALUES (4, 13, NULL);


--
-- TOC entry 2540 (class 0 OID 24319)
-- Dependencies: 256 2548
-- Data for Name: criterio_grupo_gestor; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) VALUES (1, 1, true);
INSERT INTO criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) VALUES (2, 1, true);
INSERT INTO criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) VALUES (3, 1, NULL);
INSERT INTO criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) VALUES (4, 1, NULL);


--
-- TOC entry 2534 (class 0 OID 24191)
-- Dependencies: 245 2548
-- Data for Name: criterio_reunion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO criterio_reunion (cri_id, reu_id, cri_reu_valor) VALUES (1, 170, true);
INSERT INTO criterio_reunion (cri_id, reu_id, cri_reu_valor) VALUES (2, 170, true);
INSERT INTO criterio_reunion (cri_id, reu_id, cri_reu_valor) VALUES (3, 170, NULL);
INSERT INTO criterio_reunion (cri_id, reu_id, cri_reu_valor) VALUES (4, 170, NULL);


--
-- TOC entry 2547 (class 0 OID 24517)
-- Dependencies: 267 2548
-- Data for Name: cumplimiento_diagnostico; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 13, true);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 14, true);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 15, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 16, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 17, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 18, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 19, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 20, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 21, NULL);
INSERT INTO cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) VALUES (1, 22, NULL);


--
-- TOC entry 2496 (class 0 OID 19179)
-- Dependencies: 181 2548
-- Data for Name: cumplimiento_informe; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 1, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 2, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 3, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 4, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 5, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 6, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 7, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 8, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 9, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 10, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 11, true);
INSERT INTO cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) VALUES (4, 12, true);


--
-- TOC entry 2497 (class 0 OID 19184)
-- Dependencies: 182 2548
-- Data for Name: cumplimiento_minimo; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (1, 'Caracterización general del municipio', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (2, 'Descripcion del Tejido Social y productivo existente', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (3, 'Descripción de oferta de servicio empresarial', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (4, 'Inventario de actores locales e instituciones', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (5, 'Cartografía base del municipio', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (6, 'Referencia de informacion secundaria disponible', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (7, 'Acuerdo municipal y politicas municipales', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (8, 'Declaración de compromisos', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (9, 'Integrantes del equipo local de apoyo', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (10, 'Plan de trabajo del Proceso', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (11, 'Valoración de la voluntad politica de trabajar', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (12, 'Recomendaciones y sugerencias', 1);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (13, 'Datos generales', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (14, 'Datos demográficos', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (15, 'Contexto regional y nacional', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (16, 'Mapa de actores Socio-económicos', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (18, 'Información Económica', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (17, 'Información Socio-cultural', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (19, 'Información Ambiental', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (20, 'Información Político-institucional', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (21, 'Se cuenta con temas, problemas y ejes definidos', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (22, 'Contiene resumen ejecutivo', 2);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (23, 'Resumen del Diagnòstico del municipio', 3);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (24, 'Definición estratégica', 3);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (25, 'Cronograma de implementación', 3);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (26, 'Estratégia de seguimiento y evaluación', 3);
INSERT INTO cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) VALUES (27, 'Estratégia de comunicaciones y gestión', 3);


--
-- TOC entry 2498 (class 0 OID 19189)
-- Dependencies: 184 2548
-- Data for Name: declaracion_interes; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO declaracion_interes (dec_int_id, dec_int_fecha, dec_int_lugar, dec_int_comentario, dec_int_ruta_archivo, pro_pep_id) VALUES (1, '2012-10-11', '', '', 'documentos/declaracion_interes/declaracion_interes1.doc', 7);


--
-- TOC entry 2542 (class 0 OID 24398)
-- Dependencies: 259 2548
-- Data for Name: definicion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO definicion (def_id, def_fecha, def_ruta_archivo, pro_pep_id) VALUES (4, '2012-12-14', 'documentos/definicion/definicion4.pdf', 7);


--
-- TOC entry 2499 (class 0 OID 19197)
-- Dependencies: 186 2548
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (1, 4, 'Ahuachapan');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (2, 2, 'Cabañas');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (5, 1, 'La Libertad');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (7, 3, 'La Union');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (8, 3, 'Morazan');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (9, 3, 'San Miguel');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (10, 1, 'San Salvador');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (12, 4, 'Santa Ana');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (13, 4, 'Sonsonate');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (14, 3, 'Usulutan');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (3, 1, 'Chalatenango');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (4, 1, 'Cuscatlan');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (11, 2, 'San Vicente');
INSERT INTO departamento (dep_id, reg_id, dep_nombre) VALUES (6, 2, 'La Paz');


--
-- TOC entry 2546 (class 0 OID 24487)
-- Dependencies: 266 2548
-- Data for Name: diagnostico; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO diagnostico (dia_id, dia_fecha_borrador, dia_fecha_observacion, dia_fecha_concejo_muni, dia_vision, dia_observacion, dia_ruta_archivo, pro_pep_id) VALUES (1, '2012-12-06', '2012-12-07', '2012-12-08', true, '', 'documentos/diagnostico/diagnostico1.docx', 7);


--
-- TOC entry 2529 (class 0 OID 19826)
-- Dependencies: 238 2548
-- Data for Name: dsat; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2530 (class 0 OID 19834)
-- Dependencies: 239 2548
-- Data for Name: dsat_sector; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2500 (class 0 OID 19202)
-- Dependencies: 188 2548
-- Data for Name: email; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2501 (class 0 OID 19207)
-- Dependencies: 190 2548
-- Data for Name: etapa; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO etapa (eta_id, eta_nombre) VALUES (1, 'Etapa 1');
INSERT INTO etapa (eta_id, eta_nombre) VALUES (2, 'Etapa 2');
INSERT INTO etapa (eta_id, eta_nombre) VALUES (3, 'Etapa 3');


--
-- TOC entry 2527 (class 0 OID 19794)
-- Dependencies: 236 2548
-- Data for Name: facilitador; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO facilitador (fac_id, fac_nombre, fac_apellido, cap_id, fac_email, fac_telefono) VALUES (5, 'Karen ', 'Peñate', 20, 'karensita_2410@hotmail.com', '2276-1821');
INSERT INTO facilitador (fac_id, fac_nombre, fac_apellido, cap_id, fac_email, fac_telefono) VALUES (8, 'Hola', 'ho', 45, 'ka@gmai.com', '7415-9632');


--
-- TOC entry 2502 (class 0 OID 19210)
-- Dependencies: 191 2548
-- Data for Name: fecha_recepcion_observacion_din; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2503 (class 0 OID 19213)
-- Dependencies: 192 2548
-- Data for Name: fuente_primaria; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2504 (class 0 OID 19218)
-- Dependencies: 194 2548
-- Data for Name: fuente_secundaria; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2505 (class 0 OID 19223)
-- Dependencies: 196 2548
-- Data for Name: grupo_apoyo; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO grupo_apoyo (gru_apo_id, gru_apo_fecha, gru_apo_c3, gru_apo_c4, gru_apo_observacion, pro_pep_id, gru_apo_lugar) VALUES (1, '2012-10-17', false, false, '', 7, 'Centro Estudiantil Casa Blanca');


--
-- TOC entry 2539 (class 0 OID 24300)
-- Dependencies: 255 2548
-- Data for Name: grupo_gestor; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO grupo_gestor (gru_ges_id, gru_ges_lugar, gru_ges_observacion, gru_ges_acuerdo, pro_pep_id, gru_ges_fecha) VALUES (1, 'Hola', '', true, 7, '2012-12-07');


--
-- TOC entry 2506 (class 0 OID 19231)
-- Dependencies: 198 2548
-- Data for Name: indicador; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2507 (class 0 OID 19239)
-- Dependencies: 200 2548
-- Data for Name: informe_preliminar; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO informe_preliminar (inf_pre_id, inf_pre_fecha_borrador, inf_pre_fecha_observacion, inf_pre_aceptacion, inf_pre_firmam, inf_pre_firmai, inf_pre_firmau, inf_pre_observacion, pro_pep_id, inf_pre_ruta_archivo, inf_pre_aceptada) VALUES (4, '2012-11-01', '2012-11-01', '2012-11-21', true, true, true, '', 7, 'documentos/informe_preliminar/informe_preliminar4.docx', true);


--
-- TOC entry 2508 (class 0 OID 19247)
-- Dependencies: 202 2548
-- Data for Name: institucion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO institucion (ins_id, ins_nombre) VALUES (1, 'Consejo Municipal');
INSERT INTO institucion (ins_id, ins_nombre) VALUES (2, 'Empresa Consultora');
INSERT INTO institucion (ins_id, ins_nombre) VALUES (3, 'ISDEM');
INSERT INTO institucion (ins_id, ins_nombre) VALUES (4, 'FISDL');
INSERT INTO institucion (ins_id, ins_nombre) VALUES (5, 'UEP');
INSERT INTO institucion (ins_id, ins_nombre) VALUES (6, 'Otro');


--
-- TOC entry 2538 (class 0 OID 24271)
-- Dependencies: 253 2548
-- Data for Name: integrante_asociatividad; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) VALUES (1, 'Alcalde', NULL);
INSERT INTO integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) VALUES (2, 'hola', NULL);
INSERT INTO integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) VALUES (3, 'Hola', NULL);


--
-- TOC entry 2509 (class 0 OID 19252)
-- Dependencies: 204 2548
-- Data for Name: inventario_informacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO inventario_informacion (inv_inf_id, inv_inf_observacion, pro_pep_id) VALUES (2, '', 7);


--
-- TOC entry 2510 (class 0 OID 19260)
-- Dependencies: 206 2548
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO login_attempts (id, ip_address, login, "time") VALUES (8, '127.0.0.1', 'ffff', NULL);
INSERT INTO login_attempts (id, ip_address, login, "time") VALUES (9, '127.0.0.1', 'fff', NULL);
INSERT INTO login_attempts (id, ip_address, login, "time") VALUES (10, '127.0.0.1', 'ffff', NULL);
INSERT INTO login_attempts (id, ip_address, login, "time") VALUES (11, '127.0.0.1', 'yyyyyyyy', NULL);
INSERT INTO login_attempts (id, ip_address, login, "time") VALUES (12, '127.0.0.1', 'yyyyyyyy', NULL);


--
-- TOC entry 2511 (class 0 OID 19273)
-- Dependencies: 208 2548
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (1, 1, 'Ahuachapan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (2, 1, 'Jujutla', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (3, 1, 'Atiquizaya', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (4, 1, 'Concepcion de Ataco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (5, 1, 'El Refugio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (6, 1, 'Guaymango', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (7, 1, 'Apaneca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (8, 1, 'San Francisco Menendez', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (9, 1, 'San Lorenzo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (10, 1, 'San Pedro Puxtla', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (11, 1, 'Tacuba', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (12, 1, 'Turin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (13, 2, 'Cinquera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (14, 2, 'Villa Dolores', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (15, 2, 'Guacotecti', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (16, 2, 'Ilobasco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (17, 2, 'Jutiapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (18, 2, 'San Isidro', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (19, 2, 'Sensuntepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (20, 2, 'Ciudad de Tejutepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (21, 2, 'Victoria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (22, 3, 'Agua Caliente', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (23, 3, 'Arcatao', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (24, 3, 'Azacualpa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (25, 3, 'Chalatenango', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (26, 3, 'Citala', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (27, 3, 'Comalapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (28, 3, 'Concepcion Quezaltepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (29, 3, 'Dulce Nombre de Maria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (30, 3, 'El Carrizal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (31, 3, 'El Paraiso', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (32, 3, 'La Laguna', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (33, 3, 'La Palma', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (34, 3, 'La Reina', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (35, 3, 'Las Vueltas', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (36, 3, 'Nombre de Jesus', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (37, 3, 'Nueva Concepcion', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (38, 3, 'Nueva Trinidad', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (39, 3, 'Ojos de Agua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (40, 3, 'Potonico', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (41, 3, 'San Antonio de la Cruz', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (42, 3, 'San Antonio Los Ranchos', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (43, 3, 'San Fernando', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (44, 3, 'San Francisco Lempa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (45, 3, 'San Francisco Morazan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (46, 3, 'San Ignacio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (47, 3, 'San Isidro Labrador', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (48, 3, 'San Jose Cancasque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (49, 3, 'San Jose Las Flores', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (50, 3, 'San Luis del Carmen', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (51, 3, 'San Miguel de Mercedes', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (52, 3, 'San Rafael', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (53, 3, 'Santa Rita', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (54, 3, 'Tejutla', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (55, 4, 'Candelaria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (56, 4, 'Cojutepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (57, 4, 'El Carmen', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (58, 4, 'El Rosario', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (59, 4, 'Monte San Juan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (60, 4, 'Oratorio de Concepcion', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (61, 4, 'San Bartolome Perulapia', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (62, 4, 'San Cristobal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (63, 4, 'San Jose Guayabal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (64, 4, 'San Pedro Perulapan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (65, 4, 'San Rafael Cedros', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (66, 4, 'San Ramon', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (67, 4, 'Santa Cruz Analquito', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (68, 4, 'Santa Cruz Michapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (69, 4, 'Suchitoto', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (70, 4, 'Tenancingo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (71, 5, 'Antiguo Cuscatlan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (72, 5, 'Chiltiupan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (73, 5, 'Ciudad Arce', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (74, 5, 'Colon', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (75, 5, 'Comasagua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (76, 5, 'Huizucar', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (77, 5, 'Jayaque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (78, 5, 'Jicalapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (79, 5, 'La Libertad', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (80, 5, 'Nueva San Salvador', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (81, 5, 'Nuevo Cuscatlan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (82, 5, 'Opico', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (83, 5, 'Quezaltepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (84, 5, 'Sacacoyo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (85, 5, 'San Jose Villanueva', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (86, 5, 'San Matias', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (87, 5, 'San Pablo Tacachico', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (88, 5, 'Talnique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (89, 5, 'Tamanique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (90, 5, 'Teotepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (91, 5, 'Tepecoyo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (92, 5, 'Zaragoza', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (93, 6, 'Cuyultitan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (94, 6, 'El Rosario', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (95, 6, 'Jerusalen', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (96, 6, 'Mercedes La Ceiba', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (97, 6, 'Olocuilta', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (98, 6, 'Paraiso de Osorio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (99, 6, 'San Antonio Masahuat', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (100, 6, 'San Emigdio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (101, 6, 'San Francisco Chinameca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (102, 6, 'San Juan Nonualco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (103, 6, 'San Juan Talpa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (104, 6, 'San Juan Tepezontes', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (105, 6, 'San Luis La Herradura', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (106, 6, 'San Luis Talpa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (107, 6, 'San Miguel Tepezontes', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (108, 6, 'San Pedro Masahuat', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (109, 6, 'San Pedro Nonualco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (110, 6, 'San Rafael Obrajuelo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (111, 6, 'Santa Maria Ostuma', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (112, 6, 'Santiago Nonualco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (113, 6, 'Tapalhuaca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (114, 6, 'Zacatecoluca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (115, 7, 'Anamoros', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (116, 7, 'Bolivar', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (117, 7, 'Concepcion de Oriente', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (118, 7, 'Conchagua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (119, 7, 'El Carmen', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (120, 7, 'El Sauce', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (121, 7, 'Intipuca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (122, 7, 'La Union', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (123, 7, 'Lislique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (124, 7, 'Meanguera del Golfo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (125, 7, 'Nueva Esparta', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (126, 7, 'Pasaquina', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (127, 7, 'Poloros', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (128, 7, 'San Alejo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (129, 7, 'San Jose', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (130, 7, 'Santa Rosa de Lima', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (131, 7, 'Yayantique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (132, 7, 'Yucuayquin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (133, 8, 'Arambala', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (134, 8, 'Cacaopera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (135, 8, 'Chilanga', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (136, 8, 'Corinto', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (137, 8, 'Delicias de Concepcion', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (138, 8, 'El Divisadero', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (139, 8, 'El Rosario', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (140, 8, 'Gualococti', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (141, 8, 'Guatajiagua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (142, 8, 'Joateca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (143, 8, 'Jocoaitique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (144, 8, 'Jocoro', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (145, 8, 'Lolotiquillo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (146, 8, 'Meanguera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (147, 8, 'Osicala', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (148, 8, 'Perquin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (149, 8, 'San Carlos', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (150, 8, 'San Fernando', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (151, 8, 'San Francisco Gotera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (152, 8, 'San Isidro', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (153, 8, 'San Simon', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (154, 8, 'Sensembra', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (155, 8, 'Sociedad', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (156, 8, 'Torola', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (157, 8, 'Yamabal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (158, 8, 'Yoloaiquin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (159, 9, 'Carolina', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (160, 9, 'Chapeltique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (161, 9, 'Chinameca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (162, 9, 'Chirilagua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (163, 9, 'Ciudad Barrios', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (164, 9, 'Comacaran', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (165, 9, 'El Transito', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (166, 9, 'Lolotique', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (167, 9, 'Moncagua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (168, 9, 'Nueva Guadalupe', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (169, 9, 'Nuevo Eden de San Juan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (170, 9, 'Quelepa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (171, 9, 'San Antonio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (172, 9, 'San Gerardo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (173, 9, 'San Jorge', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (174, 9, 'San Luis de la Reina', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (175, 9, 'San Miguel', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (176, 9, 'San Rafael', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (177, 9, 'Sesori', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (178, 9, 'Uluazapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (179, 10, 'Aguilares', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (180, 10, 'Apopa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (181, 10, 'Ayutuxtepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (182, 10, 'Cuscatancingo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (183, 10, 'Delgado', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (184, 10, 'El Paisnal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (185, 10, 'Guazapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (186, 10, 'Ilopango', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (187, 10, 'Mejicanos', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (188, 10, 'Nejapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (189, 10, 'Panchimalco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (190, 10, 'Rosario de Mora', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (191, 10, 'San Marcos', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (192, 10, 'San Martin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (193, 10, 'San Salvador', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (194, 10, 'Santiago Texacuangos', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (195, 10, 'Santo Tomas', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (196, 10, 'Soyapango', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (197, 10, 'Tonacatepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (198, 11, 'Apastepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (199, 11, 'Guadalupe', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (200, 11, 'San Cayetano Istepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (201, 11, 'San Esteban Catarina', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (202, 11, 'San Ildefonso', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (203, 11, 'San Lorenzo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (204, 11, 'San Sebastian', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (205, 11, 'Santa Clara', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (206, 11, 'Santo Domingo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (207, 11, 'San Vicente', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (208, 11, 'Tecoluca', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (209, 11, 'Tepetitan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (210, 11, 'Verapaz', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (211, 12, 'Candelaria de la Frontera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (212, 12, 'Chalchuapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (213, 12, 'Coatepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (214, 12, 'El Congo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (215, 12, 'El Porvenir', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (216, 12, 'Masahuat', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (217, 12, 'Metapan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (218, 12, 'San Antonio Pajonal', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (219, 12, 'San Sebastian Salitrillo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (220, 12, 'Santa Ana', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (221, 12, 'Santa Rosa Guachipilin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (222, 12, 'Santiago de la Frontera', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (223, 12, 'Texistepeque', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (224, 13, 'Acajutla', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (225, 13, 'Armenia', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (226, 13, 'Caluco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (227, 13, 'Cuisnahuat', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (228, 13, 'Izalco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (229, 13, 'Juayua', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (230, 13, 'Nahuizalco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (231, 13, 'Nahulingo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (232, 13, 'Salcoatitan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (233, 13, 'San Antonio del Monte', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (234, 13, 'San Julian', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (235, 13, 'Santa Catarina Masahuat', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (236, 13, 'Santa Isabel Ishuatan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (237, 13, 'Santo Domingo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (238, 13, 'Sonsonate', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (239, 13, 'Sonzacate', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (240, 14, 'Alegria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (241, 14, 'Berlin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (242, 14, 'California', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (243, 14, 'Concepcion Batres', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (244, 14, 'El Triunfo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (245, 14, 'Ereguayquin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (246, 14, 'Estanzuelas', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (247, 14, 'Jiquilisco', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (248, 14, 'Jucuapa', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (249, 14, 'Jucuaran', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (250, 14, 'Mercedes Umaña', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (251, 14, 'Nueva Granada', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (252, 14, 'Ozatlan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (253, 14, 'Puerto El Triunfo', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (254, 14, 'San Agustin', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (255, 14, 'San Buenaventura', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (256, 14, 'San Dionisio', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (257, 14, 'San Francisco Javier', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (258, 14, 'Santa Elena', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (259, 14, 'Santa Maria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (260, 14, 'Santiago de Maria', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (261, 14, 'Tecapan', NULL);
INSERT INTO municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) VALUES (262, 14, 'Usulutan', NULL);


--
-- TOC entry 2512 (class 0 OID 19276)
-- Dependencies: 209 2548
-- Data for Name: municipio_componente; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2513 (class 0 OID 19281)
-- Dependencies: 211 2548
-- Data for Name: opcion_sistema; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (10, 'Registro de Usuarios', 'auth/register', NULL, NULL);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (1, 'Componente 1', 'componente1/componente1', NULL, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (2, 'Componente 2', 'componente2/componente2', NULL, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (6, 'Etapa 1', 'componente2/comp23_E1/', 5, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (7, 'Reuniones', 'componente2/comp23_E1/muestraReuniones', 6, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (8, 'Acuerdo Municipal', 'componente2/comp23_E1/acuerdoMunicipal', 6, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (11, 'Declaración de Interés', 'componente2/comp23_E1/declaracionInteres', 6, 3);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (12, 'Equipo Local de Apoyo', 'componente2/comp23_E1/equipoApoyo', 6, 4);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (13, 'Capacitación Equipo Local', 'componente2/comp23_E1/capacitacionEquipoApoyo', 6, 5);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (9, 'Componente 2.2.', 'componente2/comp22/', NULL, 3);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (5, 'Componente 2.3.', 'componente2/comp23/', NULL, 4);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (3, 'Componente 3', 'componente3/componente3', NULL, 5);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (4, 'Componente 4', 'componente4/componente4', NULL, 6);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (16, 'Inventario de Información', 'componente2/comp23_E1/inventarioInformacion', 6, 6);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (17, 'Consultoras', 'consultor/consultoraC', NULL, 4);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (19, 'Gestión Consultoras', 'consultor/consultoraC', 17, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (22, 'Proyecto Pep', 'componente2/proyectoPep', NULL, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (23, 'Informe Preliminar', 'componente2/comp23_E1/InformePreliminar', 6, 7);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (25, 'Roles', 'admin/administracion/rolesSistema', 24, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (24, 'Sistema', 'admin/administracion', NULL, 3);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (27, 'Opciones Sistema', 'admin/administracion/opcionesSistema', 24, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (20, 'Gestión Coordinador', 'consultor/consultoraC/coordinadores', 17, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (29, 'Etapa 2', 'componente2/comp23_E2', 5, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (30, 'Reuniones', 'componente2/comp23_E2/muestraReuniones', 29, 1);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (31, 'Asociatividad Municipio', 'componente2/comp23_E2/muestraAsociatividades', 29, 2);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (32, 'Grupo Gestor', 'componente2/comp23_E2/grupoGestor', 29, 3);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (33, 'Capacitación Grupo Gestor', 'componente2/comp23_E2/capacitacionGrupoGestor', 29, 4);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (34, 'Definición Temas', 'componente2/comp23_E2/definicionTema', 29, 5);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (35, 'Priorización Pequeños Proyectos', 'componente2/comp23_E2/priorizacion', 29, 6);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (36, 'Elementos Mínimos Diagnóstico', 'componente2/comp23_E2/diagnostico', 29, 7);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (37, 'Etapa 3', 'componente2/comp23_E3', 5, 3);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (38, 'Cumplimientos Mínimos PEP', 'componente2/comp23_E3/cumplimientosMinimos', 37, 6);
INSERT INTO opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) VALUES (39, 'Reuniones', '/componente2/comp23_E3/muestraReuniones', 37, 1);


--
-- TOC entry 2514 (class 0 OID 19286)
-- Dependencies: 213 2548
-- Data for Name: participante; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (21, NULL, NULL, 2, 1, NULL, 'Mina ', 'de Peñate', 'F', 'Jefe', NULL, NULL, '0        ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (1, 1, NULL, NULL, NULL, NULL, 'Stephanie ', 'Peñate', 'F', 'Jefa', 25, 'Bachillerato', '2278-9635', '03417447-9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (2, 1, NULL, NULL, NULL, NULL, 'Ariana ', 'Fuentes', 'F', 'Super Jefa', 15, 'prepa', '2276-1824', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (40, NULL, 170, NULL, NULL, NULL, 'Maria', 'Pacheco', 'F', 'Jefe', 25, NULL, '7896-5236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (46, NULL, NULL, NULL, NULL, NULL, 'Karen', 'Elvira', 'F', 'Jefe', 18, NULL, '7841-5236', '14759662-2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'C');
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (49, NULL, NULL, NULL, NULL, NULL, 'fdafda', 'dafdf', 'M', 'ddfd', 19, 'fdfdf', '1896-3255', '17789665-2', 'u', NULL, 45, NULL, NULL, NULL, NULL, NULL);
INSERT INTO participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo) VALUES (50, NULL, NULL, NULL, NULL, NULL, 'gggg', 'jjjjj', 'F', 'afda', 14, 'fadf', '7432-2222', '          ', 'u', NULL, 46, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 2515 (class 0 OID 19289)
-- Dependencies: 214 2548
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (49, 45, 'Si');
INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (46, 46, 'Si');
INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (50, 46, 'Si');
INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (46, 45, 'Si');
INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (1, 20, 'No');
INSERT INTO participante_capacitacion (par_id, cap_id, par_cap_participa) VALUES (2, 20, 'Si');


--
-- TOC entry 2541 (class 0 OID 24370)
-- Dependencies: 257 2548
-- Data for Name: participante_definicion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO participante_definicion (par_id, def_id, par_def_participa) VALUES (46, 2, NULL);
INSERT INTO participante_definicion (par_id, def_id, par_def_participa) VALUES (46, 3, NULL);
INSERT INTO participante_definicion (par_id, def_id, par_def_participa) VALUES (46, 4, 'Si');


--
-- TOC entry 2545 (class 0 OID 24470)
-- Dependencies: 264 2548
-- Data for Name: participante_priorizacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO participante_priorizacion (par_id, pri_id, par_pri_participa) VALUES (46, 2, 'Si');


--
-- TOC entry 2516 (class 0 OID 19297)
-- Dependencies: 216 2548
-- Data for Name: personal_enlace; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2535 (class 0 OID 24208)
-- Dependencies: 247 2548
-- Data for Name: poblacion_reunion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO poblacion_reunion (pob_id, pob_comunidad, pob_sector, pob_institucion, reu_id) VALUES (9, true, true, false, 170);


--
-- TOC entry 2517 (class 0 OID 19302)
-- Dependencies: 218 2548
-- Data for Name: presupuesto; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2543 (class 0 OID 24426)
-- Dependencies: 261 2548
-- Data for Name: priorizacion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO priorizacion (pri_id, pri_fecha, pri_observacion, pro_pep_id) VALUES (2, '2012-12-10', '', 7);


--
-- TOC entry 2532 (class 0 OID 24169)
-- Dependencies: 242 2548
-- Data for Name: problema_identificado; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO problema_identificado (pro_ide_id, pro_ide_tema, pro_ide_problema, pro_ide_prioridad, are_dim_id, reu_id, def_id) VALUES (17, 'Tema1', 'Problema1', 1, 2, 170, NULL);


--
-- TOC entry 2518 (class 0 OID 19307)
-- Dependencies: 220 2548
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2544 (class 0 OID 24456)
-- Dependencies: 263 2548
-- Data for Name: proyecto_identificado; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO proyecto_identificado (pro_ide_id, pro_ide_nombre, pro_ide_ubicacion, pro_ide_ff, pro_ide_monto, pro_ide_plazoejec, pro_ide_pbh, pro_ide_pbm, pro_ide_prioridad, pro_ide_estado, pro_ide_ruta_archivo, pri_id) VALUES (1, 'dddddd', 'ddddd', 'GL', 1236.68, 14.00, 144566.00, 144559.00, 1, 'I', '0', NULL);


--
-- TOC entry 2519 (class 0 OID 19313)
-- Dependencies: 221 2548
-- Data for Name: proyecto_pep; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO proyecto_pep (pro_pep_id, pro_pep_nombre, pro_pep_descripcion, mun_id, acu_mun_id, inf_pre_id, inv_inf_id, gru_apo_id, con_id, pro_pep_fec_fin, pro_pep_fec_contrato, gru_ges_id, def_id, pri_id, dia_id) VALUES (1, 'Proyecto de Arreglo de Acera en la colonia Atlacatl', NULL, 193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO proyecto_pep (pro_pep_id, pro_pep_nombre, pro_pep_descripcion, mun_id, acu_mun_id, inf_pre_id, inv_inf_id, gru_apo_id, con_id, pro_pep_fec_fin, pro_pep_fec_contrato, gru_ges_id, def_id, pri_id, dia_id) VALUES (7, 'Proyecto de arreglo de una calle empedrada', NULL, 192, 13, 4, 2, 1, NULL, NULL, NULL, 1, 4, 2, 1);


--
-- TOC entry 2520 (class 0 OID 19321)
-- Dependencies: 223 2548
-- Data for Name: region; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO region (reg_id, reg_nombre, reg_direccion) VALUES (1, 'Central', NULL);
INSERT INTO region (reg_id, reg_nombre, reg_direccion) VALUES (3, 'Oriental', NULL);
INSERT INTO region (reg_id, reg_nombre, reg_direccion) VALUES (4, 'Occidental', NULL);
INSERT INTO region (reg_id, reg_nombre, reg_direccion) VALUES (2, 'Paracentral', NULL);


--
-- TOC entry 2521 (class 0 OID 19326)
-- Dependencies: 225 2548
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO reunion (reu_id, eta_id, reu_numero, reu_fecha, reu_duracion_horas, reu_tema, reu_resultado, reu_observacion, pro_pep_id) VALUES (170, 2, 1, '2012-12-08', 0, 'Definición de Problemática', 'Hola', '', 7);


--
-- TOC entry 2522 (class 0 OID 19334)
-- Dependencies: 227 2548
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO rol (rol_id, rol_nombre, rol_descripcion) VALUES (3, 'consultor', 'Este rol representa al consultor');
INSERT INTO rol (rol_id, rol_nombre, rol_descripcion) VALUES (1, 'administrador', 'Este rol representa al administrador del sistema');


--
-- TOC entry 2523 (class 0 OID 19337)
-- Dependencies: 228 2548
-- Data for Name: rol_opcion_sistema; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 5);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 2);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 6);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 7);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 8);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 11);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 12);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 13);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 16);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 17);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 19);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 20);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 22);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 23);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 24);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 25);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (1, 27);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 29);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 30);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 31);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 32);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 33);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 34);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 35);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 36);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 37);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 38);
INSERT INTO rol_opcion_sistema (rol_id, opc_sis_id) VALUES (3, 39);


--
-- TOC entry 2531 (class 0 OID 19837)
-- Dependencies: 240 2548
-- Data for Name: sector; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2537 (class 0 OID 24248)
-- Dependencies: 251 2548
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO tipo (tip_id, tip_nombre) VALUES (2, 'Mancomunidad');
INSERT INTO tipo (tip_id, tip_nombre) VALUES (3, 'Microregion');
INSERT INTO tipo (tip_id, tip_nombre) VALUES (1, 'Asociación');


--
-- TOC entry 2524 (class 0 OID 19355)
-- Dependencies: 230 2548
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2525 (class 0 OID 19359)
-- Dependencies: 231 2548
-- Data for Name: user_profiles; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO user_profiles (id, user_id, country, website) VALUES (1, 2, NULL, NULL);
INSERT INTO user_profiles (id, user_id, country, website) VALUES (4, 8, NULL, NULL);
INSERT INTO user_profiles (id, user_id, country, website) VALUES (5, 9, NULL, NULL);


--
-- TOC entry 2526 (class 0 OID 19366)
-- Dependencies: 233 2548
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) VALUES (1, 'admin', '$2a$08$orzZRVsYd7hePXoZ7s61De5ecu2TD9OIZMqYpA6jvHv44eH8qp31W', 'karensita_2410@hotmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.3', '2012-12-06', '2012-08-19', NULL, 1);
INSERT INTO users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) VALUES (9, 'cfuentes_86', '$2a$08$E8ttuLm0U2cD5lHo8/bzxuPeOJw/8/8nXH912APeL12wCUl4hNbNO', 'cfuentes_86@hotmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.3', '2012-12-06', '2012-09-12', NULL, 3);


--
-- TOC entry 2277 (class 2606 OID 19416)
-- Dependencies: 168 168 2549
-- Name: ci_sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ci_sessions
    ADD CONSTRAINT ci_sessions_pkey PRIMARY KEY (session_id);


--
-- TOC entry 2321 (class 2606 OID 19418)
-- Dependencies: 206 206 2549
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- TOC entry 2267 (class 2606 OID 19420)
-- Dependencies: 161 161 2549
-- Name: pk_actividad; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT pk_actividad PRIMARY KEY (act_id);


--
-- TOC entry 2270 (class 2606 OID 19422)
-- Dependencies: 163 163 2549
-- Name: pk_acuerdo_municipal; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT pk_acuerdo_municipal PRIMARY KEY (acu_mun_id);


--
-- TOC entry 2368 (class 2606 OID 24185)
-- Dependencies: 244 244 2549
-- Name: pk_are_dim_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY area_dimension
    ADD CONSTRAINT pk_are_dim_id PRIMARY KEY (are_dim_id);


--
-- TOC entry 2272 (class 2606 OID 19424)
-- Dependencies: 165 165 2549
-- Name: pk_asesor_municipal; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY asesor_municipal
    ADD CONSTRAINT pk_asesor_municipal PRIMARY KEY (ase_mun_id);


--
-- TOC entry 2374 (class 2606 OID 24244)
-- Dependencies: 249 249 2549
-- Name: pk_aso_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT pk_aso_id PRIMARY KEY (aso_id);


--
-- TOC entry 2275 (class 2606 OID 19426)
-- Dependencies: 166 166 2549
-- Name: pk_capacitacion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT pk_capacitacion PRIMARY KEY (cap_id);


--
-- TOC entry 2279 (class 2606 OID 19428)
-- Dependencies: 169 169 2549
-- Name: pk_componente; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT pk_componente PRIMARY KEY (com_id);


--
-- TOC entry 2283 (class 2606 OID 19430)
-- Dependencies: 173 173 2549
-- Name: pk_con_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT pk_con_id PRIMARY KEY (con_id);


--
-- TOC entry 2287 (class 2606 OID 19432)
-- Dependencies: 176 176 176 2549
-- Name: pk_con_id_acu_mun_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT pk_con_id_acu_mun_id PRIMARY KEY (acu_mun_id, con_id);


--
-- TOC entry 2281 (class 2606 OID 19434)
-- Dependencies: 171 171 2549
-- Name: pk_cons_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY consultora
    ADD CONSTRAINT pk_cons_id PRIMARY KEY (cons_id);


--
-- TOC entry 2285 (class 2606 OID 19436)
-- Dependencies: 175 175 2549
-- Name: pk_contrapartida; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contrapartida
    ADD CONSTRAINT pk_contrapartida PRIMARY KEY (con_id);


--
-- TOC entry 2291 (class 2606 OID 19438)
-- Dependencies: 179 179 179 2549
-- Name: pk_cri_id_acu_mun_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT pk_cri_id_acu_mun_id PRIMARY KEY (cri_id, acu_mun_id);


--
-- TOC entry 2383 (class 2606 OID 24323)
-- Dependencies: 256 256 256 2549
-- Name: pk_cri_id_gru_ges_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT pk_cri_id_gru_ges_id PRIMARY KEY (cri_id, gru_ges_id);


--
-- TOC entry 2370 (class 2606 OID 24195)
-- Dependencies: 245 245 245 2549
-- Name: pk_cri_id_reu_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT pk_cri_id_reu_id PRIMARY KEY (cri_id, reu_id);


--
-- TOC entry 2289 (class 2606 OID 19440)
-- Dependencies: 178 178 2549
-- Name: pk_criterio; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY criterio
    ADD CONSTRAINT pk_criterio PRIMARY KEY (cri_id);


--
-- TOC entry 2295 (class 2606 OID 19444)
-- Dependencies: 182 182 2549
-- Name: pk_cumplimiento_minimo; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_cumplimiento_minimo PRIMARY KEY (cum_min_id);


--
-- TOC entry 2297 (class 2606 OID 19446)
-- Dependencies: 184 184 2549
-- Name: pk_declaracion_interes; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT pk_declaracion_interes PRIMARY KEY (dec_int_id);


--
-- TOC entry 2387 (class 2606 OID 24403)
-- Dependencies: 259 259 2549
-- Name: pk_def_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY definicion
    ADD CONSTRAINT pk_def_id PRIMARY KEY (def_id);


--
-- TOC entry 2299 (class 2606 OID 19448)
-- Dependencies: 186 186 2549
-- Name: pk_departamento; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT pk_departamento PRIMARY KEY (dep_id);


--
-- TOC entry 2395 (class 2606 OID 24495)
-- Dependencies: 266 266 2549
-- Name: pk_dia_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY diagnostico
    ADD CONSTRAINT pk_dia_id PRIMARY KEY (dia_id);


--
-- TOC entry 2397 (class 2606 OID 24521)
-- Dependencies: 267 267 267 2549
-- Name: pk_dia_id_cum_min_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT pk_dia_id_cum_min_id PRIMARY KEY (dia_id, cum_min_id);


--
-- TOC entry 2361 (class 2606 OID 19833)
-- Dependencies: 238 238 2549
-- Name: pk_dsat; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY dsat
    ADD CONSTRAINT pk_dsat PRIMARY KEY (dsat_id);


--
-- TOC entry 2301 (class 2606 OID 19450)
-- Dependencies: 188 188 2549
-- Name: pk_ema_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY email
    ADD CONSTRAINT pk_ema_id PRIMARY KEY (ema_id);


--
-- TOC entry 2303 (class 2606 OID 19452)
-- Dependencies: 190 190 2549
-- Name: pk_etapa; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY etapa
    ADD CONSTRAINT pk_etapa PRIMARY KEY (eta_id);


--
-- TOC entry 2359 (class 2606 OID 19799)
-- Dependencies: 236 236 2549
-- Name: pk_fac_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY facilitador
    ADD CONSTRAINT pk_fac_id PRIMARY KEY (fac_id);


--
-- TOC entry 2305 (class 2606 OID 19454)
-- Dependencies: 191 191 2549
-- Name: pk_fecha_recepcion_observacion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT pk_fecha_recepcion_observacion PRIMARY KEY (fec_correlativo);


--
-- TOC entry 2307 (class 2606 OID 19456)
-- Dependencies: 192 192 2549
-- Name: pk_fuente_primaria; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT pk_fuente_primaria PRIMARY KEY (fue_pri_id);


--
-- TOC entry 2309 (class 2606 OID 19458)
-- Dependencies: 194 194 2549
-- Name: pk_fuente_secundaria; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT pk_fuente_secundaria PRIMARY KEY (fue_sec_id);


--
-- TOC entry 2311 (class 2606 OID 19460)
-- Dependencies: 196 196 2549
-- Name: pk_gru_apo_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT pk_gru_apo_id PRIMARY KEY (gru_apo_id);


--
-- TOC entry 2381 (class 2606 OID 24308)
-- Dependencies: 255 255 2549
-- Name: pk_gru_ges_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY grupo_gestor
    ADD CONSTRAINT pk_gru_ges_id PRIMARY KEY (gru_ges_id);


--
-- TOC entry 2313 (class 2606 OID 19462)
-- Dependencies: 198 198 2549
-- Name: pk_indicador; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT pk_indicador PRIMARY KEY (ind_id);


--
-- TOC entry 2293 (class 2606 OID 19822)
-- Dependencies: 181 181 181 2549
-- Name: pk_inf_pre_id_cum_min_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT pk_inf_pre_id_cum_min_id PRIMARY KEY (inf_pre_id, cum_min_id);


--
-- TOC entry 2315 (class 2606 OID 19464)
-- Dependencies: 200 200 2549
-- Name: pk_informe_preliminar; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT pk_informe_preliminar PRIMARY KEY (inf_pre_id);


--
-- TOC entry 2317 (class 2606 OID 19466)
-- Dependencies: 202 202 2549
-- Name: pk_institucion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY institucion
    ADD CONSTRAINT pk_institucion PRIMARY KEY (ins_id);


--
-- TOC entry 2379 (class 2606 OID 24276)
-- Dependencies: 253 253 2549
-- Name: pk_int_aso_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY integrante_asociatividad
    ADD CONSTRAINT pk_int_aso_id PRIMARY KEY (int_aso_id);


--
-- TOC entry 2319 (class 2606 OID 19468)
-- Dependencies: 204 204 2549
-- Name: pk_inventario_informacion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT pk_inventario_informacion PRIMARY KEY (inv_inf_id);


--
-- TOC entry 2323 (class 2606 OID 19472)
-- Dependencies: 208 208 2549
-- Name: pk_municipio; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (mun_id);


--
-- TOC entry 2325 (class 2606 OID 19474)
-- Dependencies: 211 211 2549
-- Name: pk_opc_sis_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opc_sis_id PRIMARY KEY (opc_sis_id);


--
-- TOC entry 2350 (class 2606 OID 19476)
-- Dependencies: 228 228 228 2549
-- Name: pk_opc_sis_id_rol_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT pk_opc_sis_id_rol_id PRIMARY KEY (rol_id, opc_sis_id);


--
-- TOC entry 2329 (class 2606 OID 19478)
-- Dependencies: 213 213 2549
-- Name: pk_participante; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT pk_participante PRIMARY KEY (par_id);


--
-- TOC entry 2333 (class 2606 OID 19480)
-- Dependencies: 214 214 214 2549
-- Name: pk_participante_capacitacion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT pk_participante_capacitacion PRIMARY KEY (par_id, cap_id);


--
-- TOC entry 2385 (class 2606 OID 24374)
-- Dependencies: 257 257 257 2549
-- Name: pk_participante_definicion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY participante_definicion
    ADD CONSTRAINT pk_participante_definicion PRIMARY KEY (par_id, def_id);


--
-- TOC entry 2393 (class 2606 OID 24474)
-- Dependencies: 264 264 264 2549
-- Name: pk_participante_priorizacion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY participante_priorizacion
    ADD CONSTRAINT pk_participante_priorizacion PRIMARY KEY (par_id, pri_id);


--
-- TOC entry 2335 (class 2606 OID 19482)
-- Dependencies: 216 216 2549
-- Name: pk_personal_enlace; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT pk_personal_enlace PRIMARY KEY (per_enl_id);


--
-- TOC entry 2337 (class 2606 OID 19484)
-- Dependencies: 218 218 2549
-- Name: pk_presupuesto; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT pk_presupuesto PRIMARY KEY (pre_id);


--
-- TOC entry 2389 (class 2606 OID 24434)
-- Dependencies: 261 261 2549
-- Name: pk_pri_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY priorizacion
    ADD CONSTRAINT pk_pri_id PRIMARY KEY (pri_id);


--
-- TOC entry 2372 (class 2606 OID 24213)
-- Dependencies: 247 247 2549
-- Name: pk_pro_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY poblacion_reunion
    ADD CONSTRAINT pk_pro_id PRIMARY KEY (pob_id);


--
-- TOC entry 2366 (class 2606 OID 24177)
-- Dependencies: 242 242 2549
-- Name: pk_pro_ide_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT pk_pro_ide_id PRIMARY KEY (pro_ide_id);


--
-- TOC entry 2342 (class 2606 OID 19486)
-- Dependencies: 221 221 2549
-- Name: pk_pro_pep_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT pk_pro_pep_id PRIMARY KEY (pro_pep_id);


--
-- TOC entry 2391 (class 2606 OID 24464)
-- Dependencies: 263 263 2549
-- Name: pk_proy_ide_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY proyecto_identificado
    ADD CONSTRAINT pk_proy_ide_id PRIMARY KEY (pro_ide_id);


--
-- TOC entry 2339 (class 2606 OID 19488)
-- Dependencies: 220 220 2549
-- Name: pk_proyecto; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT pk_proyecto PRIMARY KEY (pro_id);


--
-- TOC entry 2344 (class 2606 OID 19490)
-- Dependencies: 223 223 2549
-- Name: pk_region; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY region
    ADD CONSTRAINT pk_region PRIMARY KEY (reg_id);


--
-- TOC entry 2346 (class 2606 OID 19492)
-- Dependencies: 225 225 2549
-- Name: pk_reunion; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT pk_reunion PRIMARY KEY (reu_id);


--
-- TOC entry 2348 (class 2606 OID 19494)
-- Dependencies: 227 227 2549
-- Name: pk_rol_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT pk_rol_id PRIMARY KEY (rol_id);


--
-- TOC entry 2363 (class 2606 OID 19841)
-- Dependencies: 240 240 2549
-- Name: pk_sector; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY sector
    ADD CONSTRAINT pk_sector PRIMARY KEY (sec_id);


--
-- TOC entry 2376 (class 2606 OID 24253)
-- Dependencies: 251 251 2549
-- Name: pk_tip_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY tipo
    ADD CONSTRAINT pk_tip_id PRIMARY KEY (tip_id);


--
-- TOC entry 2352 (class 2606 OID 19500)
-- Dependencies: 230 230 230 2549
-- Name: user_autologin_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT user_autologin_pkey PRIMARY KEY (key_id, user_id);


--
-- TOC entry 2354 (class 2606 OID 19502)
-- Dependencies: 231 231 2549
-- Name: user_profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_profiles
    ADD CONSTRAINT user_profiles_pkey PRIMARY KEY (id);


--
-- TOC entry 2356 (class 2606 OID 19504)
-- Dependencies: 233 233 2549
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2377 (class 1259 OID 24282)
-- Dependencies: 253 2549
-- Name: fki_asociatividad_integrante; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_asociatividad_integrante ON integrante_asociatividad USING btree (aso_id);


--
-- TOC entry 2326 (class 1259 OID 24288)
-- Dependencies: 213 2549
-- Name: fki_asociatividad_participante; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_asociatividad_participante ON participante USING btree (aso_id);


--
-- TOC entry 2357 (class 1259 OID 24359)
-- Dependencies: 236 2549
-- Name: fki_capacitacion_facilitador; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_capacitacion_facilitador ON facilitador USING btree (cap_id);


--
-- TOC entry 2330 (class 1259 OID 19820)
-- Dependencies: 214 2549
-- Name: fki_capacitacion_participante_capacitacion; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_capacitacion_participante_capacitacion ON participante_capacitacion USING btree (cap_id);


--
-- TOC entry 2364 (class 1259 OID 24423)
-- Dependencies: 242 2549
-- Name: fki_definicion_probelmas_identificados; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_definicion_probelmas_identificados ON problema_identificado USING btree (def_id);


--
-- TOC entry 2340 (class 1259 OID 24417)
-- Dependencies: 221 2549
-- Name: fki_definicion_proyecto_pep; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_definicion_proyecto_pep ON proyecto_pep USING btree (def_id);


--
-- TOC entry 2273 (class 1259 OID 24353)
-- Dependencies: 166 2549
-- Name: fki_etapa_capacitacion; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_etapa_capacitacion ON capacitacion USING btree (eta_id);


--
-- TOC entry 2327 (class 1259 OID 24294)
-- Dependencies: 213 2549
-- Name: fki_participante_asociatividad; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_participante_asociatividad ON participante USING btree (aso_id);


--
-- TOC entry 2331 (class 1259 OID 19814)
-- Dependencies: 214 2549
-- Name: fki_participante_capacitacion; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_participante_capacitacion ON participante_capacitacion USING btree (par_id);


--
-- TOC entry 2268 (class 1259 OID 19505)
-- Dependencies: 163 2549
-- Name: fki_pk_proyecto_pep_acuerdo_municipal; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX fki_pk_proyecto_pep_acuerdo_municipal ON acuerdo_municipal USING btree (pro_pep_id);


--
-- TOC entry 2398 (class 2606 OID 19506)
-- Dependencies: 161 161 2266 2549
-- Name: fk_activida_conformad_activida; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_conformad_activida FOREIGN KEY (act_act_id) REFERENCES actividad(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2399 (class 2606 OID 19511)
-- Dependencies: 161 169 2278 2549
-- Name: fk_activida_posee_una_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_posee_una_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2430 (class 2606 OID 19516)
-- Dependencies: 213 163 2269 2549
-- Name: fk_acuerdo_municipal_participante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_acuerdo_municipal_participante FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id);


--
-- TOC entry 2444 (class 2606 OID 19521)
-- Dependencies: 221 163 2269 2549
-- Name: fk_acuerdo_municipal_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_acuerdo_municipal_proyecto_pep FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id);


--
-- TOC entry 2464 (class 2606 OID 24186)
-- Dependencies: 242 244 2367 2549
-- Name: fk_area_dimension_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_area_dimension_problema_identificado FOREIGN KEY (are_dim_id) REFERENCES area_dimension(are_dim_id);


--
-- TOC entry 2401 (class 2606 OID 19526)
-- Dependencies: 2343 165 223 2549
-- Name: fk_asesor_m_se_asigna_region; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY asesor_municipal
    ADD CONSTRAINT fk_asesor_m_se_asigna_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2460 (class 2606 OID 19842)
-- Dependencies: 2360 238 237 2549
-- Name: fk_asistent_reference_dsat; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY asistente_dsat
    ADD CONSTRAINT fk_asistent_reference_dsat FOREIGN KEY (dsat_id) REFERENCES dsat(dsat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2472 (class 2606 OID 24277)
-- Dependencies: 249 2373 253 2549
-- Name: fk_asociatividad_integrante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY integrante_asociatividad
    ADD CONSTRAINT fk_asociatividad_integrante FOREIGN KEY (aso_id) REFERENCES asociatividad(aso_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2459 (class 2606 OID 24354)
-- Dependencies: 166 2274 236 2549
-- Name: fk_capacitacion_facilitador; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY facilitador
    ADD CONSTRAINT fk_capacitacion_facilitador FOREIGN KEY (cap_id) REFERENCES capacitacion(cap_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2439 (class 2606 OID 19815)
-- Dependencies: 214 2274 166 2549
-- Name: fk_capacitacion_participante_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_capacitacion_participante_capacitacion FOREIGN KEY (cap_id) REFERENCES capacitacion(cap_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2404 (class 2606 OID 19531)
-- Dependencies: 169 220 2338 2549
-- Name: fk_componen_programa2_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_programa2_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2405 (class 2606 OID 19536)
-- Dependencies: 169 169 2278 2549
-- Name: fk_componen_se_divide_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_se_divide_componen FOREIGN KEY (com_com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2445 (class 2606 OID 19541)
-- Dependencies: 221 173 2282 2549
-- Name: fk_consultor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_consultor_proyecto_pep FOREIGN KEY (con_id) REFERENCES consultor(con_id);


--
-- TOC entry 2406 (class 2606 OID 19546)
-- Dependencies: 173 171 2280 2549
-- Name: fk_consultora_consultor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_consultora_consultor FOREIGN KEY (cons_id) REFERENCES consultora(cons_id);


--
-- TOC entry 2408 (class 2606 OID 19551)
-- Dependencies: 176 163 2269 2549
-- Name: fk_contrapa_aporta_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_aporta_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2409 (class 2606 OID 19556)
-- Dependencies: 176 175 2284 2549
-- Name: fk_contrapa_conformad_contrapa; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_conformad_contrapa FOREIGN KEY (con_id) REFERENCES contrapartida(con_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2410 (class 2606 OID 19561)
-- Dependencies: 178 179 2288 2549
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2467 (class 2606 OID 24196)
-- Dependencies: 245 178 2288 2549
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2474 (class 2606 OID 24324)
-- Dependencies: 178 256 2288 2549
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2411 (class 2606 OID 19566)
-- Dependencies: 179 163 2269 2549
-- Name: fk_criterio_cumple_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_cumple_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2412 (class 2606 OID 19571)
-- Dependencies: 181 182 2294 2549
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2482 (class 2606 OID 24522)
-- Dependencies: 2294 267 182 2549
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2483 (class 2606 OID 24527)
-- Dependencies: 266 267 2394 2549
-- Name: fk_cumplimi_posee_alg_diagnostico_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_posee_alg_diagnostico_ FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2413 (class 2606 OID 19576)
-- Dependencies: 181 200 2314 2549
-- Name: fk_cumplimi_posee_alg_informe_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_posee_alg_informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2466 (class 2606 OID 24418)
-- Dependencies: 2386 242 259 2549
-- Name: fk_definicion_probelmas_identificados; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_definicion_probelmas_identificados FOREIGN KEY (def_id) REFERENCES definicion(def_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2451 (class 2606 OID 24412)
-- Dependencies: 2386 221 259 2549
-- Name: fk_definicion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_definicion_proyecto_pep FOREIGN KEY (def_id) REFERENCES definicion(def_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2416 (class 2606 OID 19581)
-- Dependencies: 186 223 2343 2549
-- Name: fk_departam_compuesto_region; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT fk_departam_compuesto_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2453 (class 2606 OID 24502)
-- Dependencies: 266 2394 221 2549
-- Name: fk_diagnostico_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_diagnostico_proyecto_pep FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id);


--
-- TOC entry 2461 (class 2606 OID 19847)
-- Dependencies: 2322 208 238 2549
-- Name: fk_dsat_analisan__municipi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY dsat
    ADD CONSTRAINT fk_dsat_analisan__municipi FOREIGN KEY (dsat_municipio) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2462 (class 2606 OID 19852)
-- Dependencies: 2360 238 239 2549
-- Name: fk_dsat_sec_reference_dsat; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY dsat_sector
    ADD CONSTRAINT fk_dsat_sec_reference_dsat FOREIGN KEY (dsat_id) REFERENCES dsat(dsat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2463 (class 2606 OID 19857)
-- Dependencies: 239 240 2362 2549
-- Name: fk_dsat_sec_reference_sector; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY dsat_sector
    ADD CONSTRAINT fk_dsat_sec_reference_sector FOREIGN KEY (sec_id) REFERENCES sector(sec_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2417 (class 2606 OID 19586)
-- Dependencies: 188 165 2271 2549
-- Name: fk_email_se_comuni_asesor_m; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY email
    ADD CONSTRAINT fk_email_se_comuni_asesor_m FOREIGN KEY (ase_mun_id) REFERENCES asesor_municipal(ase_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2418 (class 2606 OID 19591)
-- Dependencies: 188 223 2343 2549
-- Name: fk_email_se_contac_region; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY email
    ADD CONSTRAINT fk_email_se_contac_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2403 (class 2606 OID 24348)
-- Dependencies: 190 2302 166 2549
-- Name: fk_etapa_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT fk_etapa_capacitacion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2454 (class 2606 OID 19596)
-- Dependencies: 225 190 2302 2549
-- Name: fk_etapa_reunion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_etapa_reunion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- TOC entry 2419 (class 2606 OID 19601)
-- Dependencies: 191 220 2338 2549
-- Name: fk_fecha_re_din_tiene_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT fk_fecha_re_din_tiene_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2420 (class 2606 OID 19606)
-- Dependencies: 192 204 2318 2549
-- Name: fk_fuente_p_formado_inventar; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT fk_fuente_p_formado_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2421 (class 2606 OID 19611)
-- Dependencies: 194 204 2318 2549
-- Name: fk_fuente_s_formado_p_inventar; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT fk_fuente_s_formado_p_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2431 (class 2606 OID 19616)
-- Dependencies: 213 196 2310 2549
-- Name: fk_grupo_apoyo_participantes; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_grupo_apoyo_participantes FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id);


--
-- TOC entry 2475 (class 2606 OID 24329)
-- Dependencies: 2380 256 255 2549
-- Name: fk_grupo_gestor_criterio_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_grupo_gestor_criterio_grupo_gestor FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2450 (class 2606 OID 24314)
-- Dependencies: 2380 255 221 2549
-- Name: fk_grupo_gestor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_grupo_gestor_proyecto_pep FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id);


--
-- TOC entry 2423 (class 2606 OID 19621)
-- Dependencies: 198 169 2278 2549
-- Name: fk_indicado_posee_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT fk_indicado_posee_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2446 (class 2606 OID 19626)
-- Dependencies: 2314 221 200 2549
-- Name: fk_informe_preliminar_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_informe_preliminar_proyecto_pep FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id);


--
-- TOC entry 2447 (class 2606 OID 19631)
-- Dependencies: 221 204 2318 2549
-- Name: fk_inventario_informacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_inventario_informacion_proyecto_pep FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id);


--
-- TOC entry 2427 (class 2606 OID 19636)
-- Dependencies: 209 169 2278 2549
-- Name: fk_municipi_comp_cuni_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_cuni_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2428 (class 2606 OID 19641)
-- Dependencies: 209 208 2322 2549
-- Name: fk_municipi_comp_muni_municipi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_muni_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2426 (class 2606 OID 19646)
-- Dependencies: 208 186 2298 2549
-- Name: fk_municipi_conformad_departam; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipi_conformad_departam FOREIGN KEY (dep_id) REFERENCES departamento(dep_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2448 (class 2606 OID 19651)
-- Dependencies: 221 208 2322 2549
-- Name: fk_municipio_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_municipio_proyecto_pep FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


--
-- TOC entry 2456 (class 2606 OID 19656)
-- Dependencies: 228 211 2324 2549
-- Name: fk_opcion_sistema_rol_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_opcion_sistema_rol_opcion_sistema FOREIGN KEY (opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- TOC entry 2432 (class 2606 OID 19671)
-- Dependencies: 213 225 2345 2549
-- Name: fk_particip_asistente_reunion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_asistente_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2433 (class 2606 OID 19676)
-- Dependencies: 213 200 2314 2549
-- Name: fk_particip_necesita__informe_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita__informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2434 (class 2606 OID 19681)
-- Dependencies: 213 184 2296 2549
-- Name: fk_particip_necesita_declarac; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita_declarac FOREIGN KEY (dec_int_id) REFERENCES declaracion_interes(dec_int_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2435 (class 2606 OID 19686)
-- Dependencies: 213 202 2316 2549
-- Name: fk_particip_pueden_te_instituc; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_pueden_te_instituc FOREIGN KEY (ins_id) REFERENCES institucion(ins_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2436 (class 2606 OID 24289)
-- Dependencies: 2373 213 249 2549
-- Name: fk_participante_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_participante_asociatividad FOREIGN KEY (aso_id) REFERENCES asociatividad(aso_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2438 (class 2606 OID 19809)
-- Dependencies: 2328 213 214 2549
-- Name: fk_participante_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_participante_capacitacion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2476 (class 2606 OID 24380)
-- Dependencies: 213 2328 257 2549
-- Name: fk_participante_definicion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante_definicion
    ADD CONSTRAINT fk_participante_definicion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2437 (class 2606 OID 24334)
-- Dependencies: 255 213 2380 2549
-- Name: fk_participante_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_participante_grupo_gestor FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2480 (class 2606 OID 24475)
-- Dependencies: 213 264 2328 2549
-- Name: fk_participante_priorizacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY participante_priorizacion
    ADD CONSTRAINT fk_participante_priorizacion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2440 (class 2606 OID 19701)
-- Dependencies: 216 163 2269 2549
-- Name: fk_personal_necesita__acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT fk_personal_necesita__acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2441 (class 2606 OID 19706)
-- Dependencies: 218 169 2278 2549
-- Name: fk_presupue_se_asigna_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT fk_presupue_se_asigna_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2452 (class 2606 OID 24440)
-- Dependencies: 2388 261 221 2549
-- Name: fk_priorizacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_priorizacion_proyecto_pep FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id);


--
-- TOC entry 2479 (class 2606 OID 24465)
-- Dependencies: 261 2388 263 2549
-- Name: fk_priorizacion_proyectos_identificados; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_identificado
    ADD CONSTRAINT fk_priorizacion_proyectos_identificados FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id);


--
-- TOC entry 2425 (class 2606 OID 19711)
-- Dependencies: 204 221 2341 2549
-- Name: fk_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT fk_proyecto_pep FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2400 (class 2606 OID 19716)
-- Dependencies: 163 221 2341 2549
-- Name: fk_proyecto_pep_acuerdo_municipal; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT fk_proyecto_pep_acuerdo_municipal FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2471 (class 2606 OID 24259)
-- Dependencies: 221 249 2341 2549
-- Name: fk_proyecto_pep_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT fk_proyecto_pep_asociatividad FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2402 (class 2606 OID 19787)
-- Dependencies: 166 2341 221 2549
-- Name: fk_proyecto_pep_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT fk_proyecto_pep_capacitacion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2407 (class 2606 OID 19721)
-- Dependencies: 173 221 2341 2549
-- Name: fk_proyecto_pep_consultor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_proyecto_pep_consultor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2415 (class 2606 OID 19726)
-- Dependencies: 184 221 2341 2549
-- Name: fk_proyecto_pep_declaracion_interes; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT fk_proyecto_pep_declaracion_interes FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2481 (class 2606 OID 24496)
-- Dependencies: 266 2341 221 2549
-- Name: fk_proyecto_pep_diagnostico; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY diagnostico
    ADD CONSTRAINT fk_proyecto_pep_diagnostico FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2422 (class 2606 OID 19731)
-- Dependencies: 196 221 2341 2549
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2449 (class 2606 OID 19736)
-- Dependencies: 221 196 2310 2549
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id);


--
-- TOC entry 2473 (class 2606 OID 24309)
-- Dependencies: 255 221 2341 2549
-- Name: fk_proyecto_pep_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grupo_gestor
    ADD CONSTRAINT fk_proyecto_pep_grupo_gestor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2424 (class 2606 OID 19741)
-- Dependencies: 200 221 2341 2549
-- Name: fk_proyecto_pep_informe_preliminar; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT fk_proyecto_pep_informe_preliminar FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2478 (class 2606 OID 24435)
-- Dependencies: 2341 261 221 2549
-- Name: fk_proyecto_pep_priorizacion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY priorizacion
    ADD CONSTRAINT fk_proyecto_pep_priorizacion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2455 (class 2606 OID 19746)
-- Dependencies: 225 221 2341 2549
-- Name: fk_proyecto_pep_reunion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_proyecto_pep_reunion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2442 (class 2606 OID 19751)
-- Dependencies: 220 169 2278 2549
-- Name: fk_proyecto_programa_componen; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_programa_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2443 (class 2606 OID 19756)
-- Dependencies: 220 208 2322 2549
-- Name: fk_proyecto_se_realiz_municipi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_se_realiz_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2468 (class 2606 OID 24219)
-- Dependencies: 245 225 2345 2549
-- Name: fk_reunion_criterio_reunion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT fk_reunion_criterio_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2469 (class 2606 OID 24229)
-- Dependencies: 247 225 2345 2549
-- Name: fk_reunion_poblacion_reunion; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY poblacion_reunion
    ADD CONSTRAINT fk_reunion_poblacion_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2465 (class 2606 OID 24224)
-- Dependencies: 242 225 2345 2549
-- Name: fk_reunion_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_reunion_problema_identificado FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2457 (class 2606 OID 19761)
-- Dependencies: 228 2347 227 2549
-- Name: fk_rol_rol_sistema; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_rol_rol_sistema FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- TOC entry 2458 (class 2606 OID 19766)
-- Dependencies: 2347 233 227 2549
-- Name: fk_rol_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_rol_user FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- TOC entry 2470 (class 2606 OID 24254)
-- Dependencies: 2375 249 251 2549
-- Name: fk_tipo_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT fk_tipo_asociatividad FOREIGN KEY (tip_id) REFERENCES tipo(tip_id);


--
-- TOC entry 2414 (class 2606 OID 24480)
-- Dependencies: 182 2302 190 2549
-- Name: pk_etapa_cumplimiento_minimo; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_etapa_cumplimiento_minimo FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- TOC entry 2429 (class 2606 OID 19781)
-- Dependencies: 211 2324 211 2549
-- Name: pk_opcion_sistema_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opcion_sistema_opcion_sistema FOREIGN KEY (opc_opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- TOC entry 2477 (class 2606 OID 24404)
-- Dependencies: 2341 221 259 2549
-- Name: pro_pep_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY definicion
    ADD CONSTRAINT pro_pep_id FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2554 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2012-12-06 22:59:40 CST

--
-- PostgreSQL database dump complete
--

