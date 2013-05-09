--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: resultado; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE resultado (
    res_id integer NOT NULL,
    res_nombre character varying(250)
);


ALTER TABLE public.resultado OWNER TO sispfgl;

--
-- Name: Resultado_res_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE "Resultado_res_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."Resultado_res_id_seq" OWNER TO sispfgl;

--
-- Name: Resultado_res_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "Resultado_res_id_seq" OWNED BY resultado.res_id;


--
-- Name: Resultado_res_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"Resultado_res_id_seq"', 6, true);


--
-- Name: actividad; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE actividad (
    act_id integer NOT NULL,
    com_id integer NOT NULL,
    act_act_id integer,
    act_codigo character varying(20) NOT NULL,
    act_descripcion character varying(500) NOT NULL,
    act_tipo character varying(20),
    act_nombre character varying(100),
    fecha_creacion date,
    saldo_goes numeric DEFAULT 0,
    saldo_gmun numeric DEFAULT 0,
    saldo_birf numeric DEFAULT 0
);


ALTER TABLE public.actividad OWNER TO sispfgl;

--
-- Name: actividad_act_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE actividad_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.actividad_act_id_seq OWNER TO sispfgl;

--
-- Name: actividad_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE actividad_act_id_seq OWNED BY actividad.act_id;


--
-- Name: actividad_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividad_act_id_seq', 11, true);


--
-- Name: actividades_epi; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE actividades_epi (
    epi_id integer,
    act_id integer NOT NULL,
    act_nombre character varying(100),
    act_fecha_ini date,
    act_fecha_fin date,
    act_estado character varying(20),
    act_responsable character varying(100),
    act_cargo character varying(50),
    act_descripcion character varying(150),
    act_recursos character varying(150)
);


ALTER TABLE public.actividades_epi OWNER TO sispfgl;

--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE actividades_epi_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.actividades_epi_act_id_seq OWNER TO sispfgl;

--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE actividades_epi_act_id_seq OWNED BY actividades_epi.act_id;


--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividades_epi_act_id_seq', 2, true);


--
-- Name: acuerdo_municipal; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE acuerdo_municipal (
    acu_mun_id integer NOT NULL,
    acu_mun_fecha date,
    acu_mun_p1 boolean,
    acu_mun_p2 boolean,
    acu_mun_observacion text,
    pro_pep_id integer NOT NULL,
    acu_mun_ruta_archivo character varying(200),
    eta_id integer,
    acu_mun_fecha_observacion date,
    acu_mun_fecha_borrador date,
    acu_mun_fecha_aceptacion date
);


ALTER TABLE public.acuerdo_municipal OWNER TO sispfgl;

--
-- Name: acuerdo_municipal2; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE acuerdo_municipal2 (
    acu_mun_id integer NOT NULL,
    mun_id integer,
    acu_mun_fecha_acuerdo date,
    acu_mun_fecha_recepcion date,
    acu_mun_fecha_conformacion date,
    acu_mun_archivo character varying(200),
    acu_mun_observaciones text
);


ALTER TABLE public.acuerdo_municipal2 OWNER TO sispfgl;

--
-- Name: acuerdo_municipal2_acu_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE acuerdo_municipal2_acu_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.acuerdo_municipal2_acu_mun_id_seq OWNER TO sispfgl;

--
-- Name: acuerdo_municipal2_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acuerdo_municipal2_acu_mun_id_seq OWNED BY acuerdo_municipal2.acu_mun_id;


--
-- Name: acuerdo_municipal2_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal2_acu_mun_id_seq', 1, true);


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE acuerdo_municipal_acu_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.acuerdo_municipal_acu_mun_id_seq OWNER TO sispfgl;

--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acuerdo_municipal_acu_mun_id_seq OWNED BY acuerdo_municipal.acu_mun_id;


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 14, true);


--
-- Name: acumun_miembros; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE acumun_miembros (
    mie_id integer NOT NULL,
    acu_mun_id integer,
    mie_nombre character varying(50),
    mie_apellidos character varying(50),
    mie_sexo character varying(1),
    mie_edad smallint,
    mie_cargo character varying(50),
    mie_nivel character varying(50),
    mie_telefono character varying(8)
);


ALTER TABLE public.acumun_miembros OWNER TO sispfgl;

--
-- Name: acumun_miembros_mie_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE acumun_miembros_mie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.acumun_miembros_mie_id_seq OWNER TO sispfgl;

--
-- Name: acumun_miembros_mie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acumun_miembros_mie_id_seq OWNED BY acumun_miembros.mie_id;


--
-- Name: acumun_miembros_mie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acumun_miembros_mie_id_seq', 1, true);


--
-- Name: aporte_municipal; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE aporte_municipal (
    apo_mun_id integer NOT NULL,
    apo_mun_monto_estimado numeric(12,2) DEFAULT 0.0,
    apo_mun_faprobacion date,
    apo_mun_observaciones character varying(250),
    mun_id integer,
    eta_id integer NOT NULL
);


ALTER TABLE public.aporte_municipal OWNER TO sispfgl;

--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE aporte_municipal_aporte_municipal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.aporte_municipal_aporte_municipal_id_seq OWNER TO sispfgl;

--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE aporte_municipal_aporte_municipal_id_seq OWNED BY aporte_municipal.apo_mun_id;


--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('aporte_municipal_aporte_municipal_id_seq', 1, false);


--
-- Name: area_accion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE area_accion (
    id_area_accion integer NOT NULL,
    nombre_area_accion character varying(50)
);


ALTER TABLE public.area_accion OWNER TO sispfgl;

--
-- Name: area_accion_id_area_accion_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE area_accion_id_area_accion_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.area_accion_id_area_accion_seq OWNER TO sispfgl;

--
-- Name: area_accion_id_area_accion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE area_accion_id_area_accion_seq OWNED BY area_accion.id_area_accion;


--
-- Name: area_accion_id_area_accion_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('area_accion_id_area_accion_seq', 1, false);


--
-- Name: area_dimension; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE area_dimension (
    are_dim_id integer NOT NULL,
    are_dim_nombre character varying(50)
);


ALTER TABLE public.area_dimension OWNER TO sispfgl;

--
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE area_dimension_are_dim_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.area_dimension_are_dim_id_seq OWNER TO sispfgl;

--
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE area_dimension_are_dim_id_seq OWNED BY area_dimension.are_dim_id;


--
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('area_dimension_are_dim_id_seq', 4, true);


--
-- Name: asi_tec_miembros; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asi_tec_miembros (
    mie_id integer NOT NULL,
    asi_tec_id integer,
    mie_nombre character varying(50),
    mie_apellidos character varying(50),
    mie_sexo character varying(1),
    mie_edad smallint,
    mie_cargo character varying(50),
    mie_nivel character varying(50),
    mie_telefono character varying(8)
);


ALTER TABLE public.asi_tec_miembros OWNER TO sispfgl;

--
-- Name: asi_tec_miembros_mie_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asi_tec_miembros_mie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.asi_tec_miembros_mie_id_seq OWNER TO sispfgl;

--
-- Name: asi_tec_miembros_mie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asi_tec_miembros_mie_id_seq OWNED BY asi_tec_miembros.mie_id;


--
-- Name: asi_tec_miembros_mie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asi_tec_miembros_mie_id_seq', 1, false);


--
-- Name: asistencia_tecnica; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asistencia_tecnica (
    asi_tec_id integer NOT NULL,
    mun_id integer,
    asi_tec_consultor integer,
    asi_tec_fecha_solicitud date,
    asi_tec_fecha_emision date,
    asi_tec_fecha_envio date,
    asi_tec_fecha_inicio date,
    asi_tec_archivo_perfil character varying(50),
    asi_tec_archivo_trd character varying(50),
    asi_tec_archivo_acuerdo character varying(50),
    asi_tec_observaciones text
);


ALTER TABLE public.asistencia_tecnica OWNER TO sispfgl;

--
-- Name: asistencia_tecnica_asi_tec_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asistencia_tecnica_asi_tec_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.asistencia_tecnica_asi_tec_id_seq OWNER TO sispfgl;

--
-- Name: asistencia_tecnica_asi_tec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asistencia_tecnica_asi_tec_id_seq OWNED BY asistencia_tecnica.asi_tec_id;


--
-- Name: asistencia_tecnica_asi_tec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asistencia_tecnica_asi_tec_id_seq', 1, false);


--
-- Name: asistente_divu; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asistente_divu (
    divu_id integer,
    asis_id integer NOT NULL,
    asis_nombre character varying(100),
    asis_sexo character(1),
    asis_cargo character varying(50),
    asis_sector character varying(100)
);


ALTER TABLE public.asistente_divu OWNER TO sispfgl;

--
-- Name: asistente_divu_asis_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asistente_divu_asis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.asistente_divu_asis_id_seq OWNER TO sispfgl;

--
-- Name: asistente_divu_asis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asistente_divu_asis_id_seq OWNED BY asistente_divu.asis_id;


--
-- Name: asistente_divu_asis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asistente_divu_asis_id_seq', 1, false);


--
-- Name: asistente_dsat; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asistente_dsat (
    dsat_id integer,
    asis_nombre character varying(100),
    asis_sexo character(1),
    asis_cargo character varying(50),
    asis_sector character varying(50)
);


ALTER TABLE public.asistente_dsat OWNER TO sispfgl;

--
-- Name: asistente_fcdp; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asistente_fcdp (
    fcdp_id integer,
    asis_nombre character varying(100),
    asis_sexo character(1),
    asis_cargo character varying(50),
    asis_sector character varying(100)
);


ALTER TABLE public.asistente_fcdp OWNER TO sispfgl;

--
-- Name: asociatividad; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.asociatividad OWNER TO sispfgl;

--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asociatividad_aso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.asociatividad_aso_id_seq OWNER TO sispfgl;

--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asociatividad_aso_id_seq OWNED BY asociatividad.aso_id;


--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asociatividad_aso_id_seq', 47, true);


--
-- Name: autor_estrategia; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE autor_estrategia (
    aut_est_id integer NOT NULL,
    aut_est_nombre character varying(200) NOT NULL,
    aut_est_fecha date NOT NULL,
    aut_est_cantidadm integer NOT NULL,
    aut_est_cantidadh integer,
    est_com_id integer,
    tip_act_id integer
);


ALTER TABLE public.autor_estrategia OWNER TO sispfgl;

--
-- Name: autor_estrategia_aut_est_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE autor_estrategia_aut_est_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.autor_estrategia_aut_est_id_seq OWNER TO sispfgl;

--
-- Name: autor_estrategia_aut_est_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE autor_estrategia_aut_est_id_seq OWNED BY autor_estrategia.aut_est_id;


--
-- Name: autor_estrategia_aut_est_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('autor_estrategia_aut_est_id_seq', 3, true);


--
-- Name: cap_concejo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cap_concejo (
    cap_id integer
);


ALTER TABLE public.cap_concejo OWNER TO sispfgl;

--
-- Name: cap_financiera; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cap_financiera (
    cap_id integer,
    mie_id integer
);


ALTER TABLE public.cap_financiera OWNER TO sispfgl;

--
-- Name: cap_participante; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cap_participante (
    par_id integer NOT NULL,
    cap_id integer,
    par_nombre character varying(50),
    par_apellidos character varying(50),
    par_sexo character varying(1),
    par_edad smallint,
    par_cargo character varying(50),
    par_telefono character varying(8)
);


ALTER TABLE public.cap_participante OWNER TO sispfgl;

--
-- Name: cap_participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE cap_participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cap_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: cap_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cap_participante_par_id_seq OWNED BY cap_participante.par_id;


--
-- Name: cap_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cap_participante_par_id_seq', 1, false);


--
-- Name: capacitacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.capacitacion OWNER TO sispfgl;

--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE capacitacion_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.capacitacion_cap_id_seq OWNER TO sispfgl;

--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE capacitacion_cap_id_seq OWNED BY capacitacion.cap_id;


--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 98, true);


--
-- Name: capacitaciones; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE capacitaciones (
    cap_id integer NOT NULL,
    mun_id integer,
    cap_fecha date,
    cap_tema character varying(200),
    cap_lugar character varying(200),
    cap_facilitadores text,
    cap_observaciones text
);


ALTER TABLE public.capacitaciones OWNER TO sispfgl;

--
-- Name: capacitaciones_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE capacitaciones_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.capacitaciones_cap_id_seq OWNER TO sispfgl;

--
-- Name: capacitaciones_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE capacitaciones_cap_id_seq OWNED BY capacitaciones.cap_id;


--
-- Name: capacitaciones_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitaciones_cap_id_seq', 1, true);


--
-- Name: cat_consultores; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cat_consultores (
    con_id integer NOT NULL,
    con_nombre character varying(100),
    con_telefono character varying(8)
);


ALTER TABLE public.cat_consultores OWNER TO sispfgl;

--
-- Name: cat_consultores_con_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE cat_consultores_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cat_consultores_con_id_seq OWNER TO sispfgl;

--
-- Name: cat_consultores_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cat_consultores_con_id_seq OWNED BY cat_consultores.con_id;


--
-- Name: cat_consultores_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cat_consultores_con_id_seq', 1, false);


--
-- Name: categoria_fortalecimiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE categoria_fortalecimiento (
    cat_for_id integer NOT NULL,
    cat_for_nombre character varying(100)
);


ALTER TABLE public.categoria_fortalecimiento OWNER TO sispfgl;

--
-- Name: categoria_fortalecimiento_cat_for_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE categoria_fortalecimiento_cat_for_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.categoria_fortalecimiento_cat_for_id_seq OWNER TO sispfgl;

--
-- Name: categoria_fortalecimiento_cat_for_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE categoria_fortalecimiento_cat_for_id_seq OWNED BY categoria_fortalecimiento.cat_for_id;


--
-- Name: categoria_fortalecimiento_cat_for_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('categoria_fortalecimiento_cat_for_id_seq', 3, true);


--
-- Name: cc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cc (
    cc_id integer NOT NULL,
    mun_id integer,
    cc_fecha date,
    cc_hora character(5),
    cc_lugar character varying(50),
    total_mujeres integer,
    total_hombres integer,
    acta_final character varying(100),
    listado_asistencia character varying(100)
);


ALTER TABLE public.cc OWNER TO sispfgl;

--
-- Name: cc_cc_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE cc_cc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cc_cc_id_seq OWNER TO sispfgl;

--
-- Name: cc_cc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cc_cc_id_seq OWNED BY cc.cc_id;


--
-- Name: cc_cc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cc_cc_id_seq', 1, false);


--
-- Name: ci_sessions; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE ci_sessions (
    session_id character varying(40) DEFAULT '0'::character varying NOT NULL,
    ip_address character varying(16) DEFAULT '0'::character varying NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_activity integer DEFAULT 0 NOT NULL,
    user_data text NOT NULL
);


ALTER TABLE public.ci_sessions OWNER TO sispfgl;

--
-- Name: componente; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente (
    com_id integer NOT NULL,
    com_com_id integer,
    com_codigo character varying(20),
    com_nombre character varying(100) NOT NULL,
    com_descripcion character varying(500),
    fecha_creacion date,
    com_tipo character varying(20)
);


ALTER TABLE public.componente OWNER TO sispfgl;

--
-- Name: componente24a; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente24a (
    comp_id integer NOT NULL,
    mun_id integer,
    fecha_cap date,
    tema_cap character varying(100),
    total_mujeres integer,
    total_hombres integer,
    fecha_instalacion date,
    fecha_operacion date,
    observaciones character varying(500)
);


ALTER TABLE public.componente24a OWNER TO sispfgl;

--
-- Name: componente24a_atm; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente24a_atm (
    comp_id integer NOT NULL,
    mun_id integer,
    fecha_atm date,
    id_area_accion integer,
    tipo_entidad_asesora character varying(20),
    nombre_entidad_asesora character varying(50),
    monto real
);


ALTER TABLE public.componente24a_atm OWNER TO sispfgl;

--
-- Name: componente24a_atm_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente24a_atm_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente24a_atm_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_atm_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_atm_comp_id_seq OWNED BY componente24a_atm.comp_id;


--
-- Name: componente24a_atm_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_atm_comp_id_seq', 1, false);


--
-- Name: componente24a_cap; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente24a_cap (
    comp_id integer NOT NULL,
    mun_id integer,
    fecha_cap date,
    tema_cap character varying(100),
    total_mujeres integer,
    total_hombres integer,
    fecha_instalacion date,
    fecha_operacion date,
    observaciones character varying(500)
);


ALTER TABLE public.componente24a_cap OWNER TO sispfgl;

--
-- Name: componente24a_cap_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente24a_cap_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente24a_cap_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_cap_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_cap_comp_id_seq OWNED BY componente24a_cap.comp_id;


--
-- Name: componente24a_cap_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_cap_comp_id_seq', 1, true);


--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente24a_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente24a_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_comp_id_seq OWNED BY componente24a.comp_id;


--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_comp_id_seq', 1, true);


--
-- Name: componente26_cap; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente26_cap (
    comp_id integer NOT NULL,
    nombre_cap character varying(100),
    fecha_cap date,
    nombre_capacitador character varying(50),
    total_hombres integer,
    total_mujeres integer,
    monto_cap real,
    entidad character varying(15)
);


ALTER TABLE public.componente26_cap OWNER TO sispfgl;

--
-- Name: componente26_cap_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente26_cap_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente26_cap_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_cap_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_cap_comp_id_seq OWNED BY componente26_cap.comp_id;


--
-- Name: componente26_cap_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_cap_comp_id_seq', 1, false);


--
-- Name: componente26_con; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente26_con (
    comp_id integer NOT NULL,
    nombre_con character varying(100),
    fecha_con date,
    nombre_consultor character varying(50),
    monto_con real,
    entidad character varying(15)
);


ALTER TABLE public.componente26_con OWNER TO sispfgl;

--
-- Name: componente26_con_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente26_con_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente26_con_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_con_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_con_comp_id_seq OWNED BY componente26_con.comp_id;


--
-- Name: componente26_con_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_con_comp_id_seq', 1, false);


--
-- Name: componente26_equi; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE componente26_equi (
    comp_id integer NOT NULL,
    desc_equi character varying(100),
    fecha_equi date,
    monto_equi real,
    entidad character varying(15)
);


ALTER TABLE public.componente26_equi OWNER TO sispfgl;

--
-- Name: componente26_equi_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente26_equi_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente26_equi_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_equi_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_equi_comp_id_seq OWNED BY componente26_equi.comp_id;


--
-- Name: componente26_equi_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_equi_comp_id_seq', 1, false);


--
-- Name: componente_com_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente_com_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente_com_id_seq OWNER TO sispfgl;

--
-- Name: componente_com_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente_com_id_seq OWNED BY componente.com_id;


--
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente_com_id_seq', 8, true);


--
-- Name: consultora; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE consultora (
    cons_id integer NOT NULL,
    cons_nombre character varying(200),
    cons_direccion text,
    cons_telefono character(9),
    cons_telefono2 character(9),
    cons_fax character(9),
    cons_email character varying(200),
    cons_repres_legal character varying(100),
    cons_observaciones text
);


ALTER TABLE public.consultora OWNER TO sispfgl;

--
-- Name: consulta_cons_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE consulta_cons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.consulta_cons_id_seq OWNER TO sispfgl;

--
-- Name: consulta_cons_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consulta_cons_id_seq OWNED BY consultora.cons_id;


--
-- Name: consulta_cons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consulta_cons_id_seq', 9, true);


--
-- Name: consultor; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE consultor (
    con_id integer NOT NULL,
    con_nombre character varying(75) NOT NULL,
    con_apellido character varying(75) NOT NULL,
    con_telefono character varying(9) NOT NULL,
    con_email character varying(100) NOT NULL,
    pro_pep_id integer,
    cons_id integer,
    "user" text
);


ALTER TABLE public.consultor OWNER TO sispfgl;

--
-- Name: consultor_con_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE consultor_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.consultor_con_id_seq OWNER TO sispfgl;

--
-- Name: consultor_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consultor_con_id_seq OWNED BY consultor.con_id;


--
-- Name: consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultor_con_id_seq', 41, true);


--
-- Name: consultores_interes; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE consultores_interes (
    con_int_id integer NOT NULL,
    con_int_tipo character varying(15),
    con_int_aplica character varying(6),
    con_int_seleccionada character varying(6),
    pro_id integer,
    cons_id integer NOT NULL
);


ALTER TABLE public.consultores_interes OWNER TO sispfgl;

--
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE consultores_interes_con_int_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.consultores_interes_con_int_id_seq OWNER TO sispfgl;

--
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consultores_interes_con_int_id_seq OWNED BY consultores_interes.con_int_id;


--
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultores_interes_con_int_id_seq', 3, true);


--
-- Name: contrapartida; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE contrapartida (
    con_id integer NOT NULL,
    con_nombre character varying(25) NOT NULL
);


ALTER TABLE public.contrapartida OWNER TO sispfgl;

--
-- Name: contrapartida_acuerdo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE contrapartida_acuerdo (
    acu_mun_id integer NOT NULL,
    con_id integer NOT NULL,
    con_acu_valor boolean,
    con_especifique character(250)
);


ALTER TABLE public.contrapartida_acuerdo OWNER TO sispfgl;

--
-- Name: contrapartida_aporte; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE contrapartida_aporte (
    con_id integer NOT NULL,
    apo_mun_id integer NOT NULL,
    con_apo_valor boolean,
    con_apo_especifique character varying(250)
);


ALTER TABLE public.contrapartida_aporte OWNER TO sispfgl;

--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE contrapartida_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.contrapartida_con_id_seq OWNER TO sispfgl;

--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE contrapartida_con_id_seq OWNED BY contrapartida.con_id;


--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('contrapartida_con_id_seq', 6, true);


--
-- Name: criterio; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio (
    cri_id integer NOT NULL,
    cri_nombre character varying(25) NOT NULL
);


ALTER TABLE public.criterio OWNER TO sispfgl;

--
-- Name: criterio_e0; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio_e0 (
    criterio_id integer NOT NULL,
    criterio_nombre character varying(300) NOT NULL
);


ALTER TABLE public.criterio_e0 OWNER TO sispfgl;

--
-- Name: criterio_E0_criterio_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE "criterio_E0_criterio_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."criterio_E0_criterio_id_seq" OWNER TO sispfgl;

--
-- Name: criterio_E0_criterio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "criterio_E0_criterio_id_seq" OWNED BY criterio_e0.criterio_id;


--
-- Name: criterio_E0_criterio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"criterio_E0_criterio_id_seq"', 11, true);


--
-- Name: criterio_acuerdo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio_acuerdo (
    cri_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    cri_acu_valor boolean
);


ALTER TABLE public.criterio_acuerdo OWNER TO sispfgl;

--
-- Name: criterio_cri_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE criterio_cri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.criterio_cri_id_seq OWNER TO sispfgl;

--
-- Name: criterio_cri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE criterio_cri_id_seq OWNED BY criterio.cri_id;


--
-- Name: criterio_cri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('criterio_cri_id_seq', 4, true);


--
-- Name: criterio_grupo_gestor; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio_grupo_gestor (
    cri_id integer NOT NULL,
    gru_ges_id integer NOT NULL,
    cri_gru_ges_valor boolean
);


ALTER TABLE public.criterio_grupo_gestor OWNER TO sispfgl;

--
-- Name: criterio_integracion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio_integracion (
    cri_id integer NOT NULL,
    int_ins_id integer NOT NULL,
    cri_int_valor boolean
);


ALTER TABLE public.criterio_integracion OWNER TO sispfgl;

--
-- Name: criterio_reunion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE criterio_reunion (
    cri_id integer NOT NULL,
    reu_id integer NOT NULL,
    cri_reu_valor boolean
);


ALTER TABLE public.criterio_reunion OWNER TO sispfgl;

--
-- Name: cumplimiento_diagnostico; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cumplimiento_diagnostico (
    dia_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_dia_valor boolean
);


ALTER TABLE public.cumplimiento_diagnostico OWNER TO sispfgl;

--
-- Name: cumplimiento_informe; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cumplimiento_informe (
    inf_pre_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_inf_valor boolean
);


ALTER TABLE public.cumplimiento_informe OWNER TO sispfgl;

--
-- Name: cumplimiento_minimo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cumplimiento_minimo (
    cum_min_id integer NOT NULL,
    cum_min_nombre character varying(100) NOT NULL,
    eta_id integer
);


ALTER TABLE public.cumplimiento_minimo OWNER TO sispfgl;

--
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE cumplimiento_minimo_cum_min_id_seq
    START WITH 28
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cumplimiento_minimo_cum_min_id_seq OWNER TO sispfgl;

--
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cumplimiento_minimo_cum_min_id_seq OWNED BY cumplimiento_minimo.cum_min_id;


--
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cumplimiento_minimo_cum_min_id_seq', 28, true);


--
-- Name: cumplimiento_proyecto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cumplimiento_proyecto (
    pro_pep_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_pro_valor boolean
);


ALTER TABLE public.cumplimiento_proyecto OWNER TO sispfgl;

--
-- Name: dd; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE dd (
    dd_id integer NOT NULL,
    dd_fecha date,
    dd_descripcion character varying(150),
    dd_archivo_resumen character varying(100),
    dd_archivo_completo character varying(100)
);


ALTER TABLE public.dd OWNER TO sispfgl;

--
-- Name: dd_sector; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE dd_sector (
    dd_id integer,
    sec_id integer
);


ALTER TABLE public.dd_sector OWNER TO sispfgl;

--
-- Name: dd_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE dd_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.dd_seq OWNER TO sispfgl;

--
-- Name: dd_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('dd_seq', 1, true);


--
-- Name: declaracion_interes; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE declaracion_interes (
    dec_int_id integer NOT NULL,
    dec_int_fecha date,
    dec_int_lugar character varying(100),
    dec_int_comentario text,
    dec_int_ruta_archivo character varying(200),
    pro_pep_id integer
);


ALTER TABLE public.declaracion_interes OWNER TO sispfgl;

--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE declaracion_interes_dec_int_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.declaracion_interes_dec_int_id_seq OWNER TO sispfgl;

--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE declaracion_interes_dec_int_id_seq OWNED BY declaracion_interes.dec_int_id;


--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 8, true);


--
-- Name: definicion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE definicion (
    def_id integer NOT NULL,
    def_fecha date,
    def_ruta_archivo character varying(150),
    pro_pep_id integer NOT NULL,
    def_observacion text
);


ALTER TABLE public.definicion OWNER TO sispfgl;

--
-- Name: definicion_def_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE definicion_def_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.definicion_def_id_seq OWNER TO sispfgl;

--
-- Name: definicion_def_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE definicion_def_id_seq OWNED BY definicion.def_id;


--
-- Name: definicion_def_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('definicion_def_id_seq', 9, true);


--
-- Name: departamento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE departamento (
    dep_id integer NOT NULL,
    reg_id integer NOT NULL,
    dep_nombre character varying(50) NOT NULL
);


ALTER TABLE public.departamento OWNER TO sispfgl;

--
-- Name: departamento_dep_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE departamento_dep_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.departamento_dep_id_seq OWNER TO sispfgl;

--
-- Name: departamento_dep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE departamento_dep_id_seq OWNED BY departamento.dep_id;


--
-- Name: departamento_dep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('departamento_dep_id_seq', 16, true);


--
-- Name: detalle_fortalecimiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE detalle_fortalecimiento (
    for_id integer NOT NULL,
    for_monto numeric(12,2) DEFAULT 0,
    cat_for_id integer,
    rub_id integer
);


ALTER TABLE public.detalle_fortalecimiento OWNER TO sispfgl;

--
-- Name: detalle_fortalecimiento_for_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE detalle_fortalecimiento_for_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.detalle_fortalecimiento_for_id_seq OWNER TO sispfgl;

--
-- Name: detalle_fortalecimiento_for_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detalle_fortalecimiento_for_id_seq OWNED BY detalle_fortalecimiento.for_id;


--
-- Name: detalle_fortalecimiento_for_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detalle_fortalecimiento_for_id_seq', 9, true);


--
-- Name: detalle_obra; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE detalle_obra (
    det_obr_id integer NOT NULL,
    det_obr_monto numeric(12,2) DEFAULT 0,
    obr_id integer,
    rub_id integer
);


ALTER TABLE public.detalle_obra OWNER TO sispfgl;

--
-- Name: detalle_obra_det_obr_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE detalle_obra_det_obr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.detalle_obra_det_obr_id_seq OWNER TO sispfgl;

--
-- Name: detalle_obra_det_obr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detalle_obra_det_obr_id_seq OWNED BY detalle_obra.det_obr_id;


--
-- Name: detalle_obra_det_obr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detalle_obra_det_obr_id_seq', 24, true);


--
-- Name: detmonto_proyeccion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE detmonto_proyeccion (
    dmon_pro_id integer NOT NULL,
    dmon_pro_ingresos numeric(12,2) DEFAULT 0,
    dmon_pro_anio integer,
    dmon_pro_correlativo integer NOT NULL,
    mon_pro_id integer NOT NULL
);


ALTER TABLE public.detmonto_proyeccion OWNER TO sispfgl;

--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE detmonto_proyeccion_dmon_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.detmonto_proyeccion_dmon_pro_id_seq OWNER TO sispfgl;

--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detmonto_proyeccion_dmon_pro_id_seq OWNED BY detmonto_proyeccion.dmon_pro_id;


--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detmonto_proyeccion_dmon_pro_id_seq', 1, false);


--
-- Name: diagnostico; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.diagnostico OWNER TO sispfgl;

--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE diagnostico_dia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.diagnostico_dia_id_seq OWNER TO sispfgl;

--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE diagnostico_dia_id_seq OWNED BY diagnostico.dia_id;


--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('diagnostico_dia_id_seq', 3, true);


--
-- Name: divu; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE divu (
    divu_id integer NOT NULL,
    divu_nombre character varying(100),
    divu_fecha date,
    divu_tipo character varying(50),
    divu_responsable character varying(100),
    divu_municipio integer
);


ALTER TABLE public.divu OWNER TO sispfgl;

--
-- Name: divu_divu_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE divu_divu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.divu_divu_id_seq OWNER TO sispfgl;

--
-- Name: divu_divu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE divu_divu_id_seq OWNED BY divu.divu_id;


--
-- Name: divu_divu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('divu_divu_id_seq', 1, false);


--
-- Name: dsat; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE dsat (
    dsat_id integer NOT NULL,
    dsat_fecha date,
    dsat_actividad character varying(80),
    dsat_municipio integer,
    dsat_observaciones character varying(500),
    dsat_archivo character varying(100)
);


ALTER TABLE public.dsat OWNER TO sispfgl;

--
-- Name: dsat_sector; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE dsat_sector (
    dsat_id integer,
    sec_id integer
);


ALTER TABLE public.dsat_sector OWNER TO sispfgl;

--
-- Name: dsat_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE dsat_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.dsat_seq OWNER TO sispfgl;

--
-- Name: dsat_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('dsat_seq', 1, false);


--
-- Name: elaboracion_proyecto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE elaboracion_proyecto (
    ela_pro_id integer NOT NULL,
    ela_pro_carta_exp boolean,
    ela_pro_fentrega_idem date,
    ela_pro_carta_confirmacion boolean,
    ela_pro_fconformacion date,
    ela_pro_observacion text,
    mun_id integer NOT NULL,
    ela_pro_fentrega_uep date
);


ALTER TABLE public.elaboracion_proyecto OWNER TO sispfgl;

--
-- Name: TABLE elaboracion_proyecto; Type: COMMENT; Schema: public; Owner: sispfgl
--

COMMENT ON TABLE elaboracion_proyecto IS 'Se registrará la elaboración del proyecto para componente 2.5';


--
-- Name: elaboracion_proyecto_ela_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE elaboracion_proyecto_ela_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.elaboracion_proyecto_ela_pro_id_seq OWNER TO sispfgl;

--
-- Name: elaboracion_proyecto_ela_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE elaboracion_proyecto_ela_pro_id_seq OWNED BY elaboracion_proyecto.ela_pro_id;


--
-- Name: elaboracion_proyecto_ela_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('elaboracion_proyecto_ela_pro_id_seq', 5, true);


--
-- Name: empleados; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE empleados (
    emp_id integer NOT NULL,
    emp_mun_id integer,
    emp_nombre character varying(50),
    emp_apellidos character varying(50),
    emp_sexo character varying(1),
    emp_edad smallint,
    emp_cargo character varying(50),
    emp_nivel character varying(50),
    emp_titulo character varying(50),
    emp_experiencia smallint
);


ALTER TABLE public.empleados OWNER TO sispfgl;

--
-- Name: empleados_emp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE empleados_emp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.empleados_emp_id_seq OWNER TO sispfgl;

--
-- Name: empleados_emp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE empleados_emp_id_seq OWNED BY empleados.emp_id;


--
-- Name: empleados_emp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('empleados_emp_id_seq', 1, false);


--
-- Name: empleados_municipales; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE empleados_municipales (
    emp_mun_id integer NOT NULL,
    mun_id integer,
    emp_mun_organigrama character varying(250),
    emp_mun_observaciones text
);


ALTER TABLE public.empleados_municipales OWNER TO sispfgl;

--
-- Name: empleados_municipales_emp_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE empleados_municipales_emp_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.empleados_municipales_emp_mun_id_seq OWNER TO sispfgl;

--
-- Name: empleados_municipales_emp_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE empleados_municipales_emp_mun_id_seq OWNED BY empleados_municipales.emp_mun_id;


--
-- Name: empleados_municipales_emp_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('empleados_municipales_emp_mun_id_seq', 1, false);


--
-- Name: epi; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE epi (
    epi_id integer NOT NULL,
    epi_nombre character varying(100)
);


ALTER TABLE public.epi OWNER TO sispfgl;

--
-- Name: epi_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE epi_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.epi_seq OWNER TO sispfgl;

--
-- Name: epi_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('epi_seq', 7, true);


--
-- Name: estrategia_comunicacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE estrategia_comunicacion (
    est_com_id integer NOT NULL,
    est_com_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.estrategia_comunicacion OWNER TO sispfgl;

--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE estrategia_inversion_est_inv_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.estrategia_inversion_est_inv_id_seq OWNER TO sispfgl;

--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE estrategia_inversion_est_inv_id_seq OWNED BY estrategia_comunicacion.est_com_id;


--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('estrategia_inversion_est_inv_id_seq', 3, true);


--
-- Name: etapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE etapa (
    eta_id integer NOT NULL,
    eta_nombre character varying(30) NOT NULL
);


ALTER TABLE public.etapa OWNER TO sispfgl;

--
-- Name: facilitador; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE facilitador (
    fac_id integer NOT NULL,
    fac_nombre character varying(50) NOT NULL,
    fac_apellido character varying(50) NOT NULL,
    cap_id integer,
    fac_email character varying(255) NOT NULL,
    fac_telefono character varying(9)
);


ALTER TABLE public.facilitador OWNER TO sispfgl;

--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE facilitador_fac_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.facilitador_fac_id_seq OWNER TO sispfgl;

--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE facilitador_fac_id_seq OWNED BY facilitador.fac_id;


--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('facilitador_fac_id_seq', 9, true);


--
-- Name: fcdp; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE fcdp (
    fcdp_id integer NOT NULL,
    fcdp_fecha date,
    fcdp_tematica character varying(80),
    fcdp_ultima character(1),
    fcdp_observaciones character varying(500),
    fcdp_archivo character varying(100)
);


ALTER TABLE public.fcdp OWNER TO sispfgl;

--
-- Name: fcdp_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE fcdp_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fcdp_seq OWNER TO sispfgl;

--
-- Name: fcdp_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fcdp_seq', 2, true);


--
-- Name: fecha_recepcion_observacion_din; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE fecha_recepcion_observacion_din (
    fec_correlativo integer NOT NULL,
    pro_id integer,
    fec_rec_din date,
    fec_obs_din date
);


ALTER TABLE public.fecha_recepcion_observacion_din OWNER TO sispfgl;

--
-- Name: fuente_financiamiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE fuente_financiamiento (
    fue_fin_id integer NOT NULL,
    fue_fin_nombre character varying(100),
    fue_fin_monto numeric(10,2),
    fue_fin_descripcion character varying(300),
    por_pro_id integer
);


ALTER TABLE public.fuente_financiamiento OWNER TO sispfgl;

--
-- Name: fuente_financiamiento_fue_fin_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE fuente_financiamiento_fue_fin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_financiamiento_fue_fin_id_seq OWNER TO sispfgl;

--
-- Name: fuente_financiamiento_fue_fin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_financiamiento_fue_fin_id_seq OWNED BY fuente_financiamiento.fue_fin_id;


--
-- Name: fuente_financiamiento_fue_fin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_financiamiento_fue_fin_id_seq', 1, true);


--
-- Name: fuente_primaria; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE fuente_primaria (
    fue_pri_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_pri_nombre character varying(50) NOT NULL,
    fue_pri_institucion character varying(100) NOT NULL,
    fue_pri_cargo character varying(30) NOT NULL,
    fue_pri_telefono character(9),
    fue_pri_tipo_info character varying(150) NOT NULL
);


ALTER TABLE public.fuente_primaria OWNER TO sispfgl;

--
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE fuente_primaria_fue_pri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_primaria_fue_pri_id_seq OWNER TO sispfgl;

--
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_primaria_fue_pri_id_seq OWNED BY fuente_primaria.fue_pri_id;


--
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_primaria_fue_pri_id_seq', 1, true);


--
-- Name: fuente_secundaria; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE fuente_secundaria (
    fue_sec_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_sec_nombre character varying(100) NOT NULL,
    fue_sec_fuente character varying(100) NOT NULL,
    fue_sec_disponible_en character varying(15) NOT NULL,
    fue_sec_anio integer NOT NULL
);


ALTER TABLE public.fuente_secundaria OWNER TO sispfgl;

--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE fuente_secundaria_fue_sec_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_secundaria_fue_sec_id_seq OWNER TO sispfgl;

--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_secundaria_fue_sec_id_seq OWNED BY fuente_secundaria.fue_sec_id;


--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_secundaria_fue_sec_id_seq', 1, true);


--
-- Name: gescon_participante; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE gescon_participante (
    par_id integer NOT NULL,
    gescon_id integer,
    par_nombre character varying(50),
    par_apellidos character varying(50),
    par_institucion character varying(50),
    par_cargo character varying(50),
    par_telefono character varying(8)
);


ALTER TABLE public.gescon_participante OWNER TO sispfgl;

--
-- Name: gescon_participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE gescon_participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gescon_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: gescon_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gescon_participante_par_id_seq OWNED BY gescon_participante.par_id;


--
-- Name: gescon_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gescon_participante_par_id_seq', 1, false);


--
-- Name: gesrie_participan; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE gesrie_participan (
    par_id integer NOT NULL,
    gesrie_id integer,
    par_nombre character varying(50),
    par_institucion character varying(50),
    par_cargo character varying(50)
);


ALTER TABLE public.gesrie_participan OWNER TO sispfgl;

--
-- Name: gesrie_participan_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE gesrie_participan_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gesrie_participan_par_id_seq OWNER TO sispfgl;

--
-- Name: gesrie_participan_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gesrie_participan_par_id_seq OWNED BY gesrie_participan.par_id;


--
-- Name: gesrie_participan_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gesrie_participan_par_id_seq', 1, false);


--
-- Name: gestion_conocimiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE gestion_conocimiento (
    gescon_id integer NOT NULL,
    mun_id integer,
    gescon_fecha date,
    gescon_tematica character varying(200),
    gescon_observaciones text
);


ALTER TABLE public.gestion_conocimiento OWNER TO sispfgl;

--
-- Name: gestion_conocimiento_gescon_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE gestion_conocimiento_gescon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gestion_conocimiento_gescon_id_seq OWNER TO sispfgl;

--
-- Name: gestion_conocimiento_gescon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gestion_conocimiento_gescon_id_seq OWNED BY gestion_conocimiento.gescon_id;


--
-- Name: gestion_conocimiento_gescon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gestion_conocimiento_gescon_id_seq', 1, false);


--
-- Name: gestion_riesgo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE gestion_riesgo (
    gesrie_id integer NOT NULL,
    mun_id integer,
    gesrie_fecha_orden date,
    gesrie_fecha_acta date,
    gesrie_fecha_diagnostico date,
    gesrie_fecha_socializacion date,
    gesrie_fecha_aprobacion date,
    gesrie_fecha_inicio date,
    gesrie_fecha_aprob_comite date,
    gesrie_fecha_acuerdo date,
    gesrie_fecha_presentacion date,
    gesrie_fecha_seguimiento date,
    gesrie_observaciones text
);


ALTER TABLE public.gestion_riesgo OWNER TO sispfgl;

--
-- Name: gestion_riesgo_gesrie_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE gestion_riesgo_gesrie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.gestion_riesgo_gesrie_id_seq OWNER TO sispfgl;

--
-- Name: gestion_riesgo_gesrie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gestion_riesgo_gesrie_id_seq OWNED BY gestion_riesgo.gesrie_id;


--
-- Name: gestion_riesgo_gesrie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gestion_riesgo_gesrie_id_seq', 1, false);


--
-- Name: grupo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE grupo (
    gru_id integer NOT NULL,
    gru_numero integer NOT NULL
);


ALTER TABLE public.grupo OWNER TO sispfgl;

--
-- Name: grupo_apoyo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.grupo_apoyo OWNER TO sispfgl;

--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE grupo_apoyo_gru_apo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.grupo_apoyo_gru_apo_id_seq OWNER TO sispfgl;

--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_apoyo_gru_apo_id_seq OWNED BY grupo_apoyo.gru_apo_id;


--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_apoyo_gru_apo_id_seq', 8, true);


--
-- Name: grupo_gestor; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE grupo_gestor (
    gru_ges_id integer NOT NULL,
    gru_ges_lugar character varying(150),
    gru_ges_observacion text,
    gru_ges_acuerdo boolean,
    pro_pep_id integer NOT NULL,
    gru_ges_fecha date
);


ALTER TABLE public.grupo_gestor OWNER TO sispfgl;

--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE grupo_gestor_gru_ges_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.grupo_gestor_gru_ges_id_seq OWNER TO sispfgl;

--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_gestor_gru_ges_id_seq OWNED BY grupo_gestor.gru_ges_id;


--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_gestor_gru_ges_id_seq', 8, true);


--
-- Name: grupo_gru_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE grupo_gru_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.grupo_gru_id_seq OWNER TO sispfgl;

--
-- Name: grupo_gru_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_gru_id_seq OWNED BY grupo.gru_id;


--
-- Name: grupo_gru_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_gru_id_seq', 1, false);


--
-- Name: indicador; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE indicador (
    ind_id integer NOT NULL,
    com_id integer NOT NULL,
    ind_nombre text NOT NULL,
    ind_tipo integer NOT NULL
);


ALTER TABLE public.indicador OWNER TO sispfgl;

--
-- Name: indicador_ind_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE indicador_ind_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.indicador_ind_id_seq OWNER TO sispfgl;

--
-- Name: indicador_ind_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicador_ind_id_seq OWNED BY indicador.ind_id;


--
-- Name: indicador_ind_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicador_ind_id_seq', 1, false);


--
-- Name: indicadores_desempeno1; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE indicadores_desempeno1 (
    ind_des_id integer NOT NULL,
    mun_id integer,
    ind_des_fecha date,
    ind_des_periodo_inicio smallint,
    ind_des_periodo_fin smallint,
    ind_des_grupo1_pascir real,
    ind_des_grupo1_deucorpla real,
    ind_des_grupo1_int real,
    ind_des_grupo1_ahoope real,
    ind_des_grupo1_intdeu real,
    ind_des_grupo1_total real,
    ind_des_grupo2_deumuntot real,
    ind_des_grupo2_ingopeper real,
    ind_des_grupo2_total real,
    ind_des_observaciones text
);


ALTER TABLE public.indicadores_desempeno1 OWNER TO sispfgl;

--
-- Name: indicadores_desempeno1_ind_des_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE indicadores_desempeno1_ind_des_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno1_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno1_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno1_ind_des_id_seq OWNED BY indicadores_desempeno1.ind_des_id;


--
-- Name: indicadores_desempeno1_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno1_ind_des_id_seq', 1, false);


--
-- Name: indicadores_desempeno2; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE indicadores_desempeno2 (
    ind_des_id integer NOT NULL,
    mun_id integer,
    ind_des_fecha date,
    ind_des_periodo_inicio smallint,
    ind_des_periodo_fin smallint,
    ind_des_grupo1_ingtotpre real,
    ind_des_grupo1_gastotdev real,
    ind_des_grupo1_total real,
    ind_des_grupo2_ingprodev real,
    ind_des_grupo2_totingdev real,
    ind_des_grupo2_total real,
    ind_des_grupo3_moningpro real,
    ind_des_grupo3_totingdev real,
    ind_des_grupo3_total real,
    ind_des_grupo4_moningpro real,
    ind_des_grupo4_moningpre real,
    ind_des_grupo4_total real,
    ind_des_grupo5_totingtas real,
    ind_des_grupo5_totingpro real,
    ind_des_grupo5_total real,
    ind_des_grupo6_totingimp real,
    ind_des_grupo6_totingpro real,
    ind_des_grupo6_total real,
    ind_des_observaciones text
);


ALTER TABLE public.indicadores_desempeno2 OWNER TO sispfgl;

--
-- Name: indicadores_desempeno2_ind_des_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE indicadores_desempeno2_ind_des_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno2_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno2_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno2_ind_des_id_seq OWNED BY indicadores_desempeno2.ind_des_id;


--
-- Name: indicadores_desempeno2_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno2_ind_des_id_seq', 1, false);


--
-- Name: indicadores_desempeno3; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE indicadores_desempeno3 (
    ind_des_id integer NOT NULL,
    mun_id integer,
    ind_des_fecha date,
    ind_des_periodo_inicio smallint,
    ind_des_periodo_fin smallint,
    ind_des_grupo1_ingcorpre real,
    ind_des_grupo1_gascordev real,
    ind_des_grupo1_total real,
    ind_des_grupo2_gascordev real,
    ind_des_grupo2_totgascor real,
    ind_des_grupo2_total real,
    ind_des_grupo3_ejegasinv real,
    ind_des_grupo3_totgasinv real,
    ind_des_grupo3_total real,
    ind_des_grupo4_gascordev real,
    ind_des_grupo4_ingcorper real,
    ind_des_grupo4_total real,
    ind_des_grupo5_armderdeu real,
    ind_des_grupo5_egrtotdev real,
    ind_des_grupo5_total real,
    ind_des_grupo6_gascordev real,
    ind_des_grupo6_egrtotdev real,
    ind_des_grupo6_total real,
    ind_des_grupo7_gastotinv real,
    ind_des_grupo7_egrtotdev real,
    ind_des_grupo7_total real,
    ind_des_grupo8_gasinvinf real,
    ind_des_grupo8_ejegastot real,
    ind_des_grupo8_total real,
    ind_des_grupo9_ingcorper real,
    ind_des_grupo9_gascordev real,
    ind_des_grupo9_total real,
    ind_des_grupo10_gastotper real,
    ind_des_grupo10_ingcorper real,
    ind_des_grupo10_total real,
    ind_des_grupo11_ingproper real,
    ind_des_grupo11_gascordev real,
    ind_des_grupo11_total real,
    ind_des_grupo12_valdefser real,
    ind_des_grupo12_gastotser real,
    ind_des_grupo12_total real,
    ind_des_observaciones text
);


ALTER TABLE public.indicadores_desempeno3 OWNER TO sispfgl;

--
-- Name: indicadores_desempeno3_ind_des_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE indicadores_desempeno3_ind_des_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno3_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno3_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno3_ind_des_id_seq OWNED BY indicadores_desempeno3.ind_des_id;


--
-- Name: indicadores_desempeno3_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno3_ind_des_id_seq', 1, false);


--
-- Name: informe_preliminar; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.informe_preliminar OWNER TO sispfgl;

--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE informe_preliminar_inf_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.informe_preliminar_inf_pre_id_seq OWNER TO sispfgl;

--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE informe_preliminar_inf_pre_id_seq OWNED BY informe_preliminar.inf_pre_id;


--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 12, true);


--
-- Name: institucion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE institucion (
    ins_id integer NOT NULL,
    ins_nombre character varying(50) NOT NULL
);


ALTER TABLE public.institucion OWNER TO sispfgl;

--
-- Name: institucion_ins_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE institucion_ins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.institucion_ins_id_seq OWNER TO sispfgl;

--
-- Name: institucion_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE institucion_ins_id_seq OWNED BY institucion.ins_id;


--
-- Name: institucion_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('institucion_ins_id_seq', 6, true);


--
-- Name: integracion_instancia; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE integracion_instancia (
    int_ins_id integer NOT NULL,
    int_ins_fecha date,
    int_ins_lugar character varying(255)[],
    int_ins_observacion text,
    int_ins_plan_trabajo boolean,
    int_ins_reglamento_int boolean,
    int_ins_ruta_archivo character varying(250),
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.integracion_instancia OWNER TO sispfgl;

--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE integracion_instancia_int_ins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.integracion_instancia_int_ins_id_seq OWNER TO sispfgl;

--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE integracion_instancia_int_ins_id_seq OWNED BY integracion_instancia.int_ins_id;


--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integracion_instancia_int_ins_id_seq', 3, true);


--
-- Name: integrante_asociatividad; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE integrante_asociatividad (
    int_aso_id integer NOT NULL,
    int_aso_nombre character varying(250) NOT NULL,
    aso_id integer
);


ALTER TABLE public.integrante_asociatividad OWNER TO sispfgl;

--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE integrante_asociatividad_int_aso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.integrante_asociatividad_int_aso_id_seq OWNER TO sispfgl;

--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE integrante_asociatividad_int_aso_id_seq OWNED BY integrante_asociatividad.int_aso_id;


--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integrante_asociatividad_int_aso_id_seq', 1, true);


--
-- Name: inventario_informacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE inventario_informacion (
    inv_inf_id integer NOT NULL,
    inv_inf_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.inventario_informacion OWNER TO sispfgl;

--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE inventario_informacion_inv_inf_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.inventario_informacion_inv_inf_id_seq OWNER TO sispfgl;

--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE inventario_informacion_inv_inf_id_seq OWNED BY inventario_informacion.inv_inf_id;


--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('inventario_informacion_inv_inf_id_seq', 10, true);


--
-- Name: login_attempts; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE login_attempts (
    id integer NOT NULL,
    ip_address character varying(40) NOT NULL,
    login character varying(50) NOT NULL,
    "time" timestamp without time zone
);


ALTER TABLE public.login_attempts OWNER TO sispfgl;

--
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE login_attempts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.login_attempts_id_seq OWNER TO sispfgl;

--
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


--
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('login_attempts_id_seq', 59, true);


--
-- Name: manuales_administrativos; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE manuales_administrativos (
    man_adm_id integer NOT NULL,
    mun_id integer,
    man_adm_nombre character varying(200),
    man_adm_elaboracion date,
    man_adm_vigente boolean,
    man_adm_aprobacion date,
    man_adm_utilizado boolean,
    man_adm_comentario text
);


ALTER TABLE public.manuales_administrativos OWNER TO sispfgl;

--
-- Name: manuales_administrativos_man_adm_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE manuales_administrativos_man_adm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.manuales_administrativos_man_adm_id_seq OWNER TO sispfgl;

--
-- Name: manuales_administrativos_man_adm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE manuales_administrativos_man_adm_id_seq OWNED BY manuales_administrativos.man_adm_id;


--
-- Name: manuales_administrativos_man_adm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('manuales_administrativos_man_adm_id_seq', 1, false);


--
-- Name: mapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE mapa (
    map_id integer NOT NULL,
    map_nombre character varying(100) NOT NULL,
    map_descripcion text,
    tip_map_id integer NOT NULL
);


ALTER TABLE public.mapa OWNER TO sispfgl;

--
-- Name: mapa_map_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE mapa_map_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mapa_map_id_seq OWNER TO sispfgl;

--
-- Name: mapa_map_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE mapa_map_id_seq OWNED BY mapa.map_id;


--
-- Name: mapa_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('mapa_map_id_seq', 1, false);


--
-- Name: monto_proyeccion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE monto_proyeccion (
    mon_pro_id integer NOT NULL,
    mon_pro_nombre character varying(25) NOT NULL,
    mon_pro_dispo_financiera numeric(12,2) DEFAULT 0,
    mon_pro_ingresos numeric(12,2) DEFAULT 0,
    mon_pro_anio integer,
    pro_ing_id integer NOT NULL,
    mon_pro_idnombre character varying(25)
);


ALTER TABLE public.monto_proyeccion OWNER TO sispfgl;

--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE monto_proyeccion_mon_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.monto_proyeccion_mon_pro_id_seq OWNER TO sispfgl;

--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE monto_proyeccion_mon_pro_id_seq OWNED BY monto_proyeccion.mon_pro_id;


--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('monto_proyeccion_mon_pro_id_seq', 44, true);


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE municipio (
    mun_id integer NOT NULL,
    dep_id integer NOT NULL,
    mun_nombre character varying(50) NOT NULL,
    mun_presupuesto numeric(12,2),
    cons_id integer,
    mun_com_observacion text,
    mun_act_ruta_archivo character varying(250),
    mun_pro_ruta_archivo character varying(250),
    mun_fseleccion date,
    ela_pro_id integer,
    rev_inf_id integer,
    rub_id integer,
    per_pro_id integer,
    seg_id integer,
    gru_id integer,
    grup_id_pep integer
);


ALTER TABLE public.municipio OWNER TO sispfgl;

--
-- Name: municipio_componente; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE municipio_componente (
    com_id integer NOT NULL,
    mun_id integer NOT NULL,
    mun_com_asignacion numeric(6,2)
);


ALTER TABLE public.municipio_componente OWNER TO sispfgl;

--
-- Name: municipio_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE municipio_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.municipio_mun_id_seq OWNER TO sispfgl;

--
-- Name: municipio_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE municipio_mun_id_seq OWNED BY municipio.mun_id;


--
-- Name: municipio_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('municipio_mun_id_seq', 304, true);


--
-- Name: nombre_fecha_aprobacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE nombre_fecha_aprobacion (
    nom_fec_apr_id integer NOT NULL,
    nom_fec_apro_nombre character varying(150)
);


ALTER TABLE public.nombre_fecha_aprobacion OWNER TO sispfgl;

--
-- Name: nombre_fecha_aprobacion_nom_fec_apr_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE nombre_fecha_aprobacion_nom_fec_apr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.nombre_fecha_aprobacion_nom_fec_apr_id_seq OWNER TO sispfgl;

--
-- Name: nombre_fecha_aprobacion_nom_fec_apr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nombre_fecha_aprobacion_nom_fec_apr_id_seq OWNED BY nombre_fecha_aprobacion.nom_fec_apr_id;


--
-- Name: nombre_fecha_aprobacion_nom_fec_apr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nombre_fecha_aprobacion_nom_fec_apr_id_seq', 5, true);


--
-- Name: nombre_rubro; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE nombre_rubro (
    nom_rub_id integer NOT NULL,
    nom_rub_nombre character varying(150)
);


ALTER TABLE public.nombre_rubro OWNER TO sispfgl;

--
-- Name: nombre_rubro_nom_rub_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE nombre_rubro_nom_rub_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.nombre_rubro_nom_rub_id_seq OWNER TO sispfgl;

--
-- Name: nombre_rubro_nom_rub_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nombre_rubro_nom_rub_id_seq OWNED BY nombre_rubro.nom_rub_id;


--
-- Name: nombre_rubro_nom_rub_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nombre_rubro_nom_rub_id_seq', 6, true);


--
-- Name: nombrefecha_procesoetapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE nombrefecha_procesoetapa (
    pro_eta_id integer NOT NULL,
    nom_fec_apr_id integer NOT NULL,
    nomfec_proeta_valor date
);


ALTER TABLE public.nombrefecha_procesoetapa OWNER TO sispfgl;

--
-- Name: nota; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE nota (
    not_id integer NOT NULL,
    not_correlativo character varying(5),
    not_fnota date,
    not_observacion text,
    rub_id integer
);


ALTER TABLE public.nota OWNER TO sispfgl;

--
-- Name: nota_not_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE nota_not_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.nota_not_id_seq OWNER TO sispfgl;

--
-- Name: nota_not_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nota_not_id_seq OWNED BY nota.not_id;


--
-- Name: nota_not_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nota_not_id_seq', 1, true);


--
-- Name: obra; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE obra (
    obr_id integer NOT NULL,
    obr_nombre character varying(100) NOT NULL
);


ALTER TABLE public.obra OWNER TO sispfgl;

--
-- Name: obra_obr_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE obra_obr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.obra_obr_id_seq OWNER TO sispfgl;

--
-- Name: obra_obr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE obra_obr_id_seq OWNED BY obra.obr_id;


--
-- Name: obra_obr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('obra_obr_id_seq', 8, true);


--
-- Name: opcion_sistema; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE opcion_sistema (
    opc_sis_id integer NOT NULL,
    opc_sis_nombre character varying(40) NOT NULL,
    opc_sis_url character varying(100) NOT NULL,
    opc_opc_sis_id integer,
    opc_sis_orden integer
);


ALTER TABLE public.opcion_sistema OWNER TO sispfgl;

--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE opcion_sistema_opc_sis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.opcion_sistema_opc_sis_id_seq OWNER TO sispfgl;

--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE opcion_sistema_opc_sis_id_seq OWNED BY opcion_sistema.opc_sis_id;


--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 123, true);


--
-- Name: participante; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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
    par_sexo character(1),
    par_cargo character varying(30),
    par_edad integer,
    par_nivel_esco character varying(25),
    par_tel character(9),
    par_dui character(10),
    par_proviene character varying(1),
    acu_mun_id integer,
    par_otros integer,
    aso_id integer,
    par_direccion character varying(250),
    par_email character varying(250),
    gru_ges_id integer,
    par_tipo character varying(2),
    int_ins_id integer,
    ela_pro_id integer,
    seg_id integer
);


ALTER TABLE public.participante OWNER TO sispfgl;

--
-- Name: participante_capacitacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE participante_capacitacion (
    par_id integer NOT NULL,
    cap_id integer NOT NULL,
    par_cap_participa character varying(6),
    par_cap_id integer NOT NULL
);


ALTER TABLE public.participante_capacitacion OWNER TO sispfgl;

--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE participante_capacitacion_par_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.participante_capacitacion_par_cap_id_seq OWNER TO sispfgl;

--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE participante_capacitacion_par_cap_id_seq OWNED BY participante_capacitacion.par_cap_id;


--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_capacitacion_par_cap_id_seq', 66, true);


--
-- Name: participante_definicion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE participante_definicion (
    par_id integer NOT NULL,
    def_id integer NOT NULL,
    par_def_participa character varying(6)
);


ALTER TABLE public.participante_definicion OWNER TO sispfgl;

--
-- Name: participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.participante_par_id_seq OWNER TO sispfgl;

--
-- Name: participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE participante_par_id_seq OWNED BY participante.par_id;


--
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_par_id_seq', 921, true);


--
-- Name: participante_priorizacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE participante_priorizacion (
    par_id integer NOT NULL,
    pri_id integer NOT NULL,
    par_pri_participa character varying(6)
);


ALTER TABLE public.participante_priorizacion OWNER TO sispfgl;

--
-- Name: participante_reunion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE participante_reunion (
    par_id integer NOT NULL,
    reu_id integer NOT NULL,
    par_reu_participa character varying(6)
);


ALTER TABLE public.participante_reunion OWNER TO sispfgl;

--
-- Name: perfil_municipio; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE perfil_municipio (
    mun_id integer,
    per_mun_partido character varying(100),
    per_mun_territorio numeric,
    per_mun_tipologia character varying(5),
    per_mun_urbana_hombres smallint,
    per_mun_urbana_mujeres smallint,
    per_mun_rural_hombres smallint,
    per_mun_rural_mujeres smallint,
    per_mun_poblacion integer,
    per_mun_observaciones text
);


ALTER TABLE public.perfil_municipio OWNER TO sispfgl;

--
-- Name: perfil_proyecto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE perfil_proyecto (
    per_pro_id integer NOT NULL,
    per_pro_fentrega_isdem date,
    per_pro_fentrega_uep date,
    per_pro_fnota_autorizacion date,
    per_pro_fentrega_u_i date,
    per_pro_ftdr date,
    per_pro_fespecificacion date,
    per_pro_fcarpeta_reducida date,
    per_pro_frecibe_municipio date,
    per_pro_femision_acuerdo date,
    per_pro_fcertificacion date,
    per_pro_frecibe date,
    per_pro_fencio_fisdl date,
    per_pro_consultor_individual boolean,
    per_pro_firma boolean,
    per_pro_ong boolean,
    per_pro_observacion text,
    per_pro_tdr_ruta_archivo character varying(250),
    per_pro_esp_ruta_archivo character varying(250),
    per_pro_car_ruta_archivo character varying(250),
    per_pro_acu_ruta_archivo character varying(250),
    mun_id integer,
    per_pro_per_ruta_archivo character varying(250),
    per_pro_doc_ruta_archivo character varying(250)
);


ALTER TABLE public.perfil_proyecto OWNER TO sispfgl;

--
-- Name: perfil_proyecto_per_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE perfil_proyecto_per_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_proyecto_per_pro_id_seq OWNER TO sispfgl;

--
-- Name: perfil_proyecto_per_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE perfil_proyecto_per_pro_id_seq OWNED BY perfil_proyecto.per_pro_id;


--
-- Name: perfil_proyecto_per_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('perfil_proyecto_per_pro_id_seq', 3, true);


--
-- Name: personal_enlace; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE personal_enlace (
    per_enl_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    per_enl_nombre character varying(50) NOT NULL,
    per_enl_apellido character varying(50) NOT NULL,
    per_enl_sexo character(1) NOT NULL,
    per_enl_cargo character varying(30) NOT NULL
);


ALTER TABLE public.personal_enlace OWNER TO sispfgl;

--
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE personal_enlace_per_enl_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.personal_enlace_per_enl_id_seq OWNER TO sispfgl;

--
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE personal_enlace_per_enl_id_seq OWNED BY personal_enlace.per_enl_id;


--
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('personal_enlace_per_enl_id_seq', 1, false);


--
-- Name: pestania_proceso; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE pestania_proceso (
    pes_pro_id integer NOT NULL,
    pes_pro_nombre character varying(150)
);


ALTER TABLE public.pestania_proceso OWNER TO sispfgl;

--
-- Name: pestania_proceso_pes_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE pestania_proceso_pes_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.pestania_proceso_pes_pro_id_seq OWNER TO sispfgl;

--
-- Name: pestania_proceso_pes_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE pestania_proceso_pes_pro_id_seq OWNED BY pestania_proceso.pes_pro_id;


--
-- Name: pestania_proceso_pes_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('pestania_proceso_pes_pro_id_seq', 5, true);


--
-- Name: plan_contingencia; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE plan_contingencia (
    pla_con_id integer NOT NULL,
    pla_con_numero integer NOT NULL,
    pla_con_nombre character varying(100),
    pla_con_descripcion text,
    pla_con_fdocumento date,
    pla_con_tipo character(1),
    rev_inf_id integer
);


ALTER TABLE public.plan_contingencia OWNER TO sispfgl;

--
-- Name: COLUMN plan_contingencia.pla_con_tipo; Type: COMMENT; Schema: public; Owner: sispfgl
--

COMMENT ON COLUMN plan_contingencia.pla_con_tipo IS '1=plan de contigencia
2=plan con otro formato
3=plan comunal';


--
-- Name: plan_contingencia_pla_con_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE plan_contingencia_pla_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.plan_contingencia_pla_con_id_seq OWNER TO sispfgl;

--
-- Name: plan_contingencia_pla_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_contingencia_pla_con_id_seq OWNED BY plan_contingencia.pla_con_id;


--
-- Name: plan_contingencia_pla_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_contingencia_pla_con_id_seq', 3, true);


--
-- Name: plan_inversion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE plan_inversion (
    pla_inv_id integer NOT NULL,
    pla_inv_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.plan_inversion OWNER TO sispfgl;

--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE plan_inversion_pla_inv_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.plan_inversion_pla_inv_id_seq OWNER TO sispfgl;

--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_inversion_pla_inv_id_seq OWNED BY plan_inversion.pla_inv_id;


--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_inversion_pla_inv_id_seq', 4, true);


--
-- Name: plan_trabajo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE plan_trabajo (
    pla_tra_id integer NOT NULL,
    pla_tra_forden_inicio date,
    pla_tra_fentrega_plan date,
    pla_tra_frecepcion_obs date,
    pla_tra_fsuperacion_obs date,
    pla_tra_fvisto_bueno date,
    pla_tra_fpresentacion date,
    pla_tra_frecepcion date,
    pla_tra_firmada_mun boolean,
    pla_tra_firmada_isdem boolean,
    pla_tra_firmada_uep boolean,
    mun_id integer NOT NULL,
    pla_tra_ruta_archivo character varying(250),
    pla_tra_observaciones character varying(255)
);


ALTER TABLE public.plan_trabajo OWNER TO sispfgl;

--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE plan_trabajo_plan_trab_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.plan_trabajo_plan_trab_id_seq OWNER TO sispfgl;

--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_trabajo_plan_trab_id_seq OWNED BY plan_trabajo.pla_tra_id;


--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_trabajo_plan_trab_id_seq', 2, true);


--
-- Name: poblacion_reunion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE poblacion_reunion (
    pob_id integer NOT NULL,
    pob_comunidad boolean,
    pob_sector boolean,
    pob_institucion boolean,
    reu_id integer NOT NULL
);


ALTER TABLE public.poblacion_reunion OWNER TO sispfgl;

--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE poblacion_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.poblacion_pro_id_seq OWNER TO sispfgl;

--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE poblacion_pro_id_seq OWNED BY poblacion_reunion.pob_id;


--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('poblacion_pro_id_seq', 40, true);


--
-- Name: portafolio_proyecto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE portafolio_proyecto (
    por_pro_id integer NOT NULL,
    por_pro_area character varying(300),
    por_pro_tema character varying(300),
    por_pro_nombre character varying(300),
    por_pro_descripcion text,
    por_pro_ubicacion character varying(300),
    por_pro_costo_estimado numeric(12,2),
    por_pro_fecha_desde date,
    por_pro_fecha_hasta date,
    por_pro_beneficiario_h integer,
    por_pro_beneficiario_m integer,
    por_pro_observacion text,
    por_pro_ruta_archivo text,
    pro_pep_id integer,
    por_pro_anio1 numeric(12,2) DEFAULT 0,
    por_pro_anio2 numeric(12,2) DEFAULT 0,
    por_pro_anio3 numeric(12,2) DEFAULT 0,
    por_pro_anio4 numeric(12,2) DEFAULT 0,
    por_pro_anio5 numeric(12,2) DEFAULT 0
);


ALTER TABLE public.portafolio_proyecto OWNER TO sispfgl;

--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE portafolio_proyecto_por_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.portafolio_proyecto_por_pro_id_seq OWNER TO sispfgl;

--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE portafolio_proyecto_por_pro_id_seq OWNED BY portafolio_proyecto.por_pro_id;


--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('portafolio_proyecto_por_pro_id_seq', 4, true);


--
-- Name: presentes_empleados; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE presentes_empleados (
    seg_eva_id integer,
    emp_id integer
);


ALTER TABLE public.presentes_empleados OWNER TO sispfgl;

--
-- Name: presentes_participante; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE presentes_participante (
    par_id integer NOT NULL,
    seg_eva_id integer,
    par_nombre character varying(50),
    par_apellidos character varying(50),
    par_sexo character varying(1),
    par_edad smallint,
    par_cargo character varying(50),
    par_telefono character varying(8)
);


ALTER TABLE public.presentes_participante OWNER TO sispfgl;

--
-- Name: presentes_participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE presentes_participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.presentes_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: presentes_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE presentes_participante_par_id_seq OWNED BY presentes_participante.par_id;


--
-- Name: presentes_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('presentes_participante_par_id_seq', 1, false);


--
-- Name: presupuesto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE presupuesto (
    pre_id integer NOT NULL,
    com_id integer NOT NULL,
    pre_tipo integer NOT NULL,
    pre_cantidad numeric(10,2) NOT NULL
);


ALTER TABLE public.presupuesto OWNER TO sispfgl;

--
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE presupuesto_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.presupuesto_pre_id_seq OWNER TO sispfgl;

--
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE presupuesto_pre_id_seq OWNED BY presupuesto.pre_id;


--
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('presupuesto_pre_id_seq', 1, false);


--
-- Name: priorizacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE priorizacion (
    pri_id integer NOT NULL,
    pri_fecha date,
    pri_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.priorizacion OWNER TO sispfgl;

--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE priorizacion_pri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.priorizacion_pri_id_seq OWNER TO sispfgl;

--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE priorizacion_pri_id_seq OWNED BY priorizacion.pri_id;


--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('priorizacion_pri_id_seq', 7, true);


--
-- Name: problema_identificado; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.problema_identificado OWNER TO sispfgl;

--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE problema_identificado_pro_ide_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.problema_identificado_pro_ide_id_seq OWNER TO sispfgl;

--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE problema_identificado_pro_ide_id_seq OWNED BY problema_identificado.pro_ide_id;


--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('problema_identificado_pro_ide_id_seq', 1, true);


--
-- Name: proceso; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE proceso (
    pro_id integer NOT NULL,
    pro_numero character varying(150),
    pro_fpublicacion date,
    pro_faclara_dudas date,
    pro_fexpresion_interes date,
    pro_observacion1 text,
    pro_pub_ruta_archivo character varying(250),
    pro_exp_ruta_archivo character varying(250),
    pro_finicio date,
    pro_ffinalizacion date,
    pro_fenvio_informacion date,
    pro_flimite_recepcion date,
    pro_fsolicitud date,
    pro_frecepcion date,
    pro_fcierre_negociacion date,
    pro_ffirma_contrato date,
    mun_id integer NOT NULL,
    pro_faperturatecnica date,
    pro_faperturafinanciera date,
    pro_observacion2 text
);


ALTER TABLE public.proceso OWNER TO sispfgl;

--
-- Name: proceso_etapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE proceso_etapa (
    pro_eta_id integer NOT NULL,
    pro_eta_observacion text,
    pes_pro_id integer,
    mun_id integer
);


ALTER TABLE public.proceso_etapa OWNER TO sispfgl;

--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proceso_etapa_pro_eta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.proceso_etapa_pro_eta_id_seq OWNER TO sispfgl;

--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proceso_etapa_pro_eta_id_seq OWNED BY proceso_etapa.pro_eta_id;


--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_etapa_pro_eta_id_seq', 31, true);


--
-- Name: proceso_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proceso_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.proceso_pro_id_seq OWNER TO sispfgl;

--
-- Name: proceso_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proceso_pro_id_seq OWNED BY proceso.pro_id;


--
-- Name: proceso_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_pro_id_seq', 3, true);


--
-- Name: proyeccion_ingreso; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE proyeccion_ingreso (
    pro_ing_id integer NOT NULL,
    pro_ing_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.proyeccion_ingreso OWNER TO sispfgl;

--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proyeccion_ingreso_pro_ing_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.proyeccion_ingreso_pro_ing_id_seq OWNER TO sispfgl;

--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyeccion_ingreso_pro_ing_id_seq OWNED BY proyeccion_ingreso.pro_ing_id;


--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyeccion_ingreso_pro_ing_id_seq', 1, true);


--
-- Name: proyecto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.proyecto OWNER TO sispfgl;

--
-- Name: proyecto_pep; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE proyecto_pep (
    pro_pep_id integer NOT NULL,
    pro_pep_nombre text NOT NULL,
    mun_id integer NOT NULL,
    inf_pre_id integer,
    inv_inf_id integer,
    gru_apo_id integer,
    con_id integer,
    gru_ges_id integer,
    def_id integer,
    pri_id integer,
    dia_id integer,
    pro_pep_firmacm boolean,
    pro_pep_firmais boolean,
    pro_pep_firmaue boolean,
    pro_pep_fecha_borrador date,
    pro_pep_fecha_observacion date,
    pro_pep_fecha_aprobacion date,
    pro_pep_ruta_archivo text,
    pro_pep_observacion text,
    int_ins_id integer,
    pro_ing_id integer,
    pla_inv_id integer,
    est_com_id integer
);


ALTER TABLE public.proyecto_pep OWNER TO sispfgl;

--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE "proyecto_Pep_pro_pep_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."proyecto_Pep_pro_pep_id_seq" OWNER TO sispfgl;

--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "proyecto_Pep_pro_pep_id_seq" OWNED BY proyecto_pep.pro_pep_id;


--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"proyecto_Pep_pro_pep_id_seq"', 36, true);


--
-- Name: proyecto_identificado; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.proyecto_identificado OWNER TO sispfgl;

--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proyecto_identificado_pro_ide_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.proyecto_identificado_pro_ide_id_seq OWNER TO sispfgl;

--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyecto_identificado_pro_ide_id_seq OWNED BY proyecto_identificado.pro_ide_id;


--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyecto_identificado_pro_ide_id_seq', 2, true);


--
-- Name: proyectos_cc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE proyectos_cc (
    cc_id integer,
    id_proy_cc integer NOT NULL,
    monto_proy numeric,
    com_beneficiadas integer,
    pob_beneficiada character varying(100),
    tipo_proy character varying(25),
    nombre_proy character varying(50)
);


ALTER TABLE public.proyectos_cc OWNER TO sispfgl;

--
-- Name: proyectos_cc_id_proy_cc_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proyectos_cc_id_proy_cc_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.proyectos_cc_id_proy_cc_seq OWNER TO sispfgl;

--
-- Name: proyectos_cc_id_proy_cc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyectos_cc_id_proy_cc_seq OWNED BY proyectos_cc.id_proy_cc;


--
-- Name: proyectos_cc_id_proy_cc_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyectos_cc_id_proy_cc_seq', 1, false);


--
-- Name: recibido_municipalidad; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE recibido_municipalidad (
    rec_mun_id integer NOT NULL,
    rec_mun_correlativo character varying(5) NOT NULL,
    rec_mun_frecibido date NOT NULL,
    rec_mun_observacion text,
    ela_pro_id integer NOT NULL
);


ALTER TABLE public.recibido_municipalidad OWNER TO sispfgl;

--
-- Name: recibido_municipalidad_rec_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE recibido_municipalidad_rec_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.recibido_municipalidad_rec_mun_id_seq OWNER TO sispfgl;

--
-- Name: recibido_municipalidad_rec_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE recibido_municipalidad_rec_mun_id_seq OWNED BY recibido_municipalidad.rec_mun_id;


--
-- Name: recibido_municipalidad_rec_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('recibido_municipalidad_rec_mun_id_seq', 2, true);


--
-- Name: region; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE region (
    reg_id integer NOT NULL,
    reg_nombre character varying(50) NOT NULL,
    reg_direccion character varying(100)
);


ALTER TABLE public.region OWNER TO sispfgl;

--
-- Name: region_reg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE region_reg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.region_reg_id_seq OWNER TO sispfgl;

--
-- Name: region_reg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE region_reg_id_seq OWNED BY region.reg_id;


--
-- Name: region_reg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('region_reg_id_seq', 1, false);


--
-- Name: resultado_reunion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE resultado_reunion (
    res_id integer NOT NULL,
    reu_id integer NOT NULL,
    res_reu_valor boolean
);


ALTER TABLE public.resultado_reunion OWNER TO sispfgl;

--
-- Name: reunion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE reunion (
    reu_id integer NOT NULL,
    eta_id integer NOT NULL,
    reu_numero integer,
    reu_fecha date,
    reu_duracion_horas integer DEFAULT 0,
    reu_tema character varying(200),
    reu_resultado text,
    reu_observacion text,
    pro_pep_id integer NOT NULL,
    reu_duracion_minutos integer DEFAULT 0
);


ALTER TABLE public.reunion OWNER TO sispfgl;

--
-- Name: COLUMN reunion.reu_resultado; Type: COMMENT; Schema: public; Owner: sispfgl
--

COMMENT ON COLUMN reunion.reu_resultado IS 'reu_resultado-->> es actividad en la etapa2';


--
-- Name: reunion_reu_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE reunion_reu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.reunion_reu_id_seq OWNER TO sispfgl;

--
-- Name: reunion_reu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE reunion_reu_id_seq OWNED BY reunion.reu_id;


--
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 75, true);


--
-- Name: revapro_productos; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE revapro_productos (
    rea_pro_id integer NOT NULL,
    mun_id integer,
    rea_pro_fecha_presentacion date,
    rea_pro_fecha_vistobueno date,
    rea_pro_fecha_aprobacion date,
    rea_pro_is_plan_trabajo boolean,
    rea_pro_is_perfil boolean,
    rea_pro_is_ind_endeudamiento boolean,
    rea_pro_is_ind_comp boolean,
    rea_pro_is_informe_diag boolean,
    rea_pro_is_visto_bueno boolean,
    rea_pro_observaciones text,
    rea_pro_archivo_acta character varying(250)
);


ALTER TABLE public.revapro_productos OWNER TO sispfgl;

--
-- Name: revapro_productos2; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE revapro_productos2 (
    rea_pro_id integer NOT NULL,
    mun_id integer,
    rea_pro_fecha_presentacion date,
    rea_pro_fecha_vistobueno date,
    rea_pro_fecha_aprobacion date,
    rea_pro_is_informe_etapa boolean,
    rea_pro_is_borrador boolean,
    rea_pro_is_visto_bueno boolean,
    rea_pro_observaciones text,
    rea_pro_archivo_acta character varying(250)
);


ALTER TABLE public.revapro_productos2 OWNER TO sispfgl;

--
-- Name: revapro_productos2_rea_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE revapro_productos2_rea_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.revapro_productos2_rea_pro_id_seq OWNER TO sispfgl;

--
-- Name: revapro_productos2_rea_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revapro_productos2_rea_pro_id_seq OWNED BY revapro_productos2.rea_pro_id;


--
-- Name: revapro_productos2_rea_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revapro_productos2_rea_pro_id_seq', 1, false);


--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE revapro_productos_rea_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.revapro_productos_rea_pro_id_seq OWNER TO sispfgl;

--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revapro_productos_rea_pro_id_seq OWNED BY revapro_productos.rea_pro_id;


--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revapro_productos_rea_pro_id_seq', 1, false);


--
-- Name: revision_informacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE revision_informacion (
    rev_inf_id integer NOT NULL,
    rev_inf_fregistro_asesor date,
    rev_inf_frevision_uep date,
    rev_inf_adjunto_doc boolean,
    rev_inf_plan_municipalidad boolean,
    rev_inf_plan_contingencia boolean,
    rev_inf_felaboracion date,
    rev_inf_plan_oformato boolean,
    rev_inf_gestion_reactiva boolean,
    rev_inf_ogestion_reactiva text,
    rev_inf_gestion_correctiva boolean,
    rev_inf_ogestion_correctiva text,
    rev_inf_gestion_prospectiva boolean,
    rev_inf_ogestion_prospectiva text,
    rev_inf_plan_comunal boolean,
    rev_inf_mapa boolean,
    rev_inf_presentoa boolean DEFAULT true,
    rev_inf_conclusion text,
    rev_inf_presento boolean,
    rev_inf_comision_conformada boolean,
    rev_inf_fconformacion date,
    rev_inf_presentob_eo boolean,
    rev_inf_dpresentob_eo text,
    rev_inf_comision boolean,
    rev_inf_acta_comision boolean,
    rev_inf_dacta_comision text,
    rev_inf_capacitacion boolean,
    rev_inf_dcapacitacion text,
    rev_inf_herramienta boolean,
    rev_inf_inv_herramienta boolean,
    rev_inf_dinv_herramienta text,
    rev_inf_presentoc boolean,
    rev_inf_dpresentoc text,
    rev_inf_presentod boolean,
    rev_inf_mapa_identificacion boolean,
    rev_inf_dmapa_identificacion text,
    rev_inf_presentoe boolean,
    rev_inf_dpresentoe text,
    rev_inf_presentof boolean,
    rev_inf_dpresentof text,
    mun_id integer
);


ALTER TABLE public.revision_informacion OWNER TO sispfgl;

--
-- Name: revision_informacion_rev_inf_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE revision_informacion_rev_inf_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.revision_informacion_rev_inf_id_seq OWNER TO sispfgl;

--
-- Name: revision_informacion_rev_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revision_informacion_rev_inf_id_seq OWNED BY revision_informacion.rev_inf_id;


--
-- Name: revision_informacion_rev_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revision_informacion_rev_inf_id_seq', 4, true);


--
-- Name: rol; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE rol (
    rol_id integer NOT NULL,
    rol_nombre character varying(25) NOT NULL,
    rol_descripcion character varying(100),
    rol_codigo character(4)
);


ALTER TABLE public.rol OWNER TO sispfgl;

--
-- Name: rol_opcion_sistema; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE rol_opcion_sistema (
    rol_id integer NOT NULL,
    opc_sis_id integer NOT NULL
);


ALTER TABLE public.rol_opcion_sistema OWNER TO sispfgl;

--
-- Name: rol_rol_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE rol_rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rol_rol_id_seq OWNER TO sispfgl;

--
-- Name: rol_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rol_rol_id_seq OWNED BY rol.rol_id;


--
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rol_rol_id_seq', 14, true);


--
-- Name: rubro; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE rubro (
    rub_id integer NOT NULL,
    rub_observacion_general text,
    rub_emite_nota boolean,
    rub_observacion text,
    mun_id integer,
    rub_nombre_proyecto character varying(250)
);


ALTER TABLE public.rubro OWNER TO sispfgl;

--
-- Name: rubro_elegible; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE rubro_elegible (
    rub_ele_id integer NOT NULL,
    rub_ele_seleccionado boolean,
    rub_ele_observacion text,
    rub_ele_monto numeric(12,2) DEFAULT 0,
    rub_id integer,
    nom_rub_id integer
);


ALTER TABLE public.rubro_elegible OWNER TO sispfgl;

--
-- Name: rubro_elegible_rub_ele_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE rubro_elegible_rub_ele_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rubro_elegible_rub_ele_id_seq OWNER TO sispfgl;

--
-- Name: rubro_elegible_rub_ele_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rubro_elegible_rub_ele_id_seq OWNED BY rubro_elegible.rub_ele_id;


--
-- Name: rubro_elegible_rub_ele_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rubro_elegible_rub_ele_id_seq', 18, true);


--
-- Name: rubro_rub_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE rubro_rub_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rubro_rub_id_seq OWNER TO sispfgl;

--
-- Name: rubro_rub_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rubro_rub_id_seq OWNED BY rubro.rub_id;


--
-- Name: rubro_rub_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rubro_rub_id_seq', 3, true);


--
-- Name: sector; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE sector (
    sec_id integer NOT NULL,
    sec_nombre character varying(50)
);


ALTER TABLE public.sector OWNER TO sispfgl;

--
-- Name: seguimiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seguimiento (
    seg_id integer NOT NULL,
    seg_forden_preparacion date,
    seg_facta_recepcion date,
    seg_forden_diagnostico date,
    seg_fsocializacion date,
    seg_facta_aprobacion_d date,
    seg_forden_planificacion date,
    seg_facta_aprobacion_p date,
    seg_facuerdo_municipal date,
    seg_fpresentacion_publica date,
    seg_forden_seguimiento date,
    seg_comentario text,
    mun_id integer NOT NULL,
    seg_ruta_archivo character varying(250)
);


ALTER TABLE public.seguimiento OWNER TO sispfgl;

--
-- Name: seguimiento_3b; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seguimiento_3b (
    seg_id integer NOT NULL,
    mun_id integer,
    seg_fecha_emision date,
    seg_fecha_recepcion date,
    seg_fecha_envio date,
    seg_rubros boolean,
    seg_descripcion text,
    seg_archivo_perfil character varying(250),
    seg_archivo_tdr character varying(250),
    seg_archivo_acuerdo character varying(250),
    seg_observaciones text
);


ALTER TABLE public.seguimiento_3b OWNER TO sispfgl;

--
-- Name: seguimiento_3b_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_3b_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_3b_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_3b_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_3b_seg_id_seq OWNED BY seguimiento_3b.seg_id;


--
-- Name: seguimiento_3b_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_3b_seg_id_seq', 1, false);


--
-- Name: seguimiento_aprimp; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seguimiento_aprimp (
    seg_id integer NOT NULL,
    mun_id integer,
    seg_is_ok boolean,
    seg_fecha_emision date,
    seg_fecha_recepcion date,
    seg_archivo_acuerdo character varying(250),
    seg_observaciones text
);


ALTER TABLE public.seguimiento_aprimp OWNER TO sispfgl;

--
-- Name: seguimiento_aprimp_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_aprimp_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_aprimp_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_aprimp_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_aprimp_seg_id_seq OWNED BY seguimiento_aprimp.seg_id;


--
-- Name: seguimiento_aprimp_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_aprimp_seg_id_seq', 1, false);


--
-- Name: seguimiento_evaluacion; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seguimiento_evaluacion (
    seg_eva_id integer NOT NULL,
    mun_id integer,
    seg_eva_fecha_presentacion date,
    seg_eva_lugar character varying(200),
    seg_eva_is_informe boolean,
    seg_eva_is_divulgado boolean,
    seg_eva_porque text,
    seg_eva_archivo_informe character varying(250),
    seg_eva_observaciones text
);


ALTER TABLE public.seguimiento_evaluacion OWNER TO sispfgl;

--
-- Name: seguimiento_evaluacion_seg_eva_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_evaluacion_seg_eva_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_evaluacion_seg_eva_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_evaluacion_seg_eva_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_evaluacion_seg_eva_id_seq OWNED BY seguimiento_evaluacion.seg_eva_id;


--
-- Name: seguimiento_evaluacion_seg_eva_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_evaluacion_seg_eva_id_seq', 1, false);


--
-- Name: seguimiento_receppro; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seguimiento_receppro (
    seg_id integer NOT NULL,
    mun_id integer,
    seg_fecha_recepcion date,
    seg_fecha_vistobueno date,
    seg_fecha_aprobacion date,
    seg_archivo_acuerdo character varying(250),
    seg_observaciones text
);


ALTER TABLE public.seguimiento_receppro OWNER TO sispfgl;

--
-- Name: seguimiento_receppro_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_receppro_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_receppro_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_receppro_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_receppro_seg_id_seq OWNED BY seguimiento_receppro.seg_id;


--
-- Name: seguimiento_receppro_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_receppro_seg_id_seq', 1, false);


--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_seg_id_seq OWNED BY seguimiento.seg_id;


--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_seg_id_seq', 2, true);


--
-- Name: seleccion_comite; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seleccion_comite (
    sel_com_id integer NOT NULL,
    sel_com_fverificacion date,
    sel_com_seleccionado character varying(2),
    sol_asis_id integer NOT NULL
);


ALTER TABLE public.seleccion_comite OWNER TO sispfgl;

--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seleccion_comite_seleccion_comite_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seleccion_comite_seleccion_comite_id_seq OWNER TO sispfgl;

--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seleccion_comite_seleccion_comite_id_seq OWNED BY seleccion_comite.sel_com_id;


--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seleccion_comite_seleccion_comite_id_seq', 4, true);


--
-- Name: solicitud_asistencia; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE solicitud_asistencia (
    sol_asis_id integer NOT NULL,
    nombre_solicitante character varying(50),
    cargo character varying(50),
    telefono character varying(9),
    sol_asis_ruta_archivo character varying(250),
    mun_id integer,
    c1 boolean,
    c2 boolean,
    sel_com_id integer,
    fecha_solicitud date,
    comentarios character varying(250)
);


ALTER TABLE public.solicitud_asistencia OWNER TO sispfgl;

--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE solicitud_asistencia_sol_asis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.solicitud_asistencia_sol_asis_id_seq OWNER TO sispfgl;

--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE solicitud_asistencia_sol_asis_id_seq OWNED BY solicitud_asistencia.sol_asis_id;


--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('solicitud_asistencia_sol_asis_id_seq', 5, true);


--
-- Name: solicitud_ayuda; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE solicitud_ayuda (
    sol_ayu_id integer NOT NULL,
    mun_id integer,
    sol_ayu_fecha_emision date,
    sol_ayu_fecha_recepcion date
);


ALTER TABLE public.solicitud_ayuda OWNER TO sispfgl;

--
-- Name: solicitud_ayuda_sol_ayu_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE solicitud_ayuda_sol_ayu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.solicitud_ayuda_sol_ayu_id_seq OWNER TO sispfgl;

--
-- Name: solicitud_ayuda_sol_ayu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE solicitud_ayuda_sol_ayu_id_seq OWNED BY solicitud_ayuda.sol_ayu_id;


--
-- Name: solicitud_ayuda_sol_ayu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('solicitud_ayuda_sol_ayu_id_seq', 1, false);


--
-- Name: tipo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE tipo (
    tip_id integer NOT NULL,
    tip_nombre character varying(25)
);


ALTER TABLE public.tipo OWNER TO sispfgl;

--
-- Name: tipo_actor; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE tipo_actor (
    tip_act_id integer NOT NULL,
    tip_act_nombre character varying(250)
);


ALTER TABLE public.tipo_actor OWNER TO sispfgl;

--
-- Name: tipo_actor_tip_act_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE tipo_actor_tip_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.tipo_actor_tip_act_id_seq OWNER TO sispfgl;

--
-- Name: tipo_actor_tip_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_actor_tip_act_id_seq OWNED BY tipo_actor.tip_act_id;


--
-- Name: tipo_actor_tip_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_actor_tip_act_id_seq', 7, true);


--
-- Name: tipo_mapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE tipo_mapa (
    tip_map_id integer NOT NULL,
    tip_map_nombre character varying(50) NOT NULL
);


ALTER TABLE public.tipo_mapa OWNER TO sispfgl;

--
-- Name: tipo_mapa_tip_map_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE tipo_mapa_tip_map_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.tipo_mapa_tip_map_id_seq OWNER TO sispfgl;

--
-- Name: tipo_mapa_tip_map_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_mapa_tip_map_id_seq OWNED BY tipo_mapa.tip_map_id;


--
-- Name: tipo_mapa_tip_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_mapa_tip_map_id_seq', 5, true);


--
-- Name: tipo_tip_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE tipo_tip_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.tipo_tip_id_seq OWNER TO sispfgl;

--
-- Name: tipo_tip_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_tip_id_seq OWNED BY tipo.tip_id;


--
-- Name: tipo_tip_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_tip_id_seq', 3, true);


--
-- Name: transferencia; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE transferencia (
    trans_id integer NOT NULL,
    act_origen integer,
    act_destino integer,
    monto numeric,
    trans_fuente character varying(10),
    trans_desc character varying(100),
    trans_obs character varying(100),
    trans_fecha date
);


ALTER TABLE public.transferencia OWNER TO sispfgl;

--
-- Name: transferencia_trans_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE transferencia_trans_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.transferencia_trans_id_seq OWNER TO sispfgl;

--
-- Name: transferencia_trans_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE transferencia_trans_id_seq OWNED BY transferencia.trans_id;


--
-- Name: transferencia_trans_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('transferencia_trans_id_seq', 6, true);


--
-- Name: user_autologin; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone NOT NULL
);


ALTER TABLE public.user_autologin OWNER TO sispfgl;

--
-- Name: user_profiles; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE user_profiles (
    id integer NOT NULL,
    user_id integer NOT NULL,
    country character varying(20) DEFAULT NULL::character varying,
    website character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.user_profiles OWNER TO sispfgl;

--
-- Name: user_profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE user_profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.user_profiles_id_seq OWNER TO sispfgl;

--
-- Name: user_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE user_profiles_id_seq OWNED BY user_profiles.id;


--
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('user_profiles_id_seq', 66, true);


--
-- Name: users; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
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


ALTER TABLE public.users OWNER TO sispfgl;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO sispfgl;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('users_id_seq', 63, true);


--
-- Name: act_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY actividad ALTER COLUMN act_id SET DEFAULT nextval('actividad_act_id_seq'::regclass);


--
-- Name: act_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY actividades_epi ALTER COLUMN act_id SET DEFAULT nextval('actividades_epi_act_id_seq'::regclass);


--
-- Name: acu_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal ALTER COLUMN acu_mun_id SET DEFAULT nextval('acuerdo_municipal_acu_mun_id_seq'::regclass);


--
-- Name: acu_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal2 ALTER COLUMN acu_mun_id SET DEFAULT nextval('acuerdo_municipal2_acu_mun_id_seq'::regclass);


--
-- Name: mie_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acumun_miembros ALTER COLUMN mie_id SET DEFAULT nextval('acumun_miembros_mie_id_seq'::regclass);


--
-- Name: apo_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY aporte_municipal ALTER COLUMN apo_mun_id SET DEFAULT nextval('aporte_municipal_aporte_municipal_id_seq'::regclass);


--
-- Name: id_area_accion; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY area_accion ALTER COLUMN id_area_accion SET DEFAULT nextval('area_accion_id_area_accion_seq'::regclass);


--
-- Name: are_dim_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY area_dimension ALTER COLUMN are_dim_id SET DEFAULT nextval('area_dimension_are_dim_id_seq'::regclass);


--
-- Name: mie_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asi_tec_miembros ALTER COLUMN mie_id SET DEFAULT nextval('asi_tec_miembros_mie_id_seq'::regclass);


--
-- Name: asi_tec_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistencia_tecnica ALTER COLUMN asi_tec_id SET DEFAULT nextval('asistencia_tecnica_asi_tec_id_seq'::regclass);


--
-- Name: asis_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistente_divu ALTER COLUMN asis_id SET DEFAULT nextval('asistente_divu_asis_id_seq'::regclass);


--
-- Name: aso_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asociatividad ALTER COLUMN aso_id SET DEFAULT nextval('asociatividad_aso_id_seq'::regclass);


--
-- Name: aut_est_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY autor_estrategia ALTER COLUMN aut_est_id SET DEFAULT nextval('autor_estrategia_aut_est_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_participante ALTER COLUMN par_id SET DEFAULT nextval('cap_participante_par_id_seq'::regclass);


--
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitacion ALTER COLUMN cap_id SET DEFAULT nextval('capacitacion_cap_id_seq'::regclass);


--
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitaciones ALTER COLUMN cap_id SET DEFAULT nextval('capacitaciones_cap_id_seq'::regclass);


--
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cat_consultores ALTER COLUMN con_id SET DEFAULT nextval('cat_consultores_con_id_seq'::regclass);


--
-- Name: cat_for_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY categoria_fortalecimiento ALTER COLUMN cat_for_id SET DEFAULT nextval('categoria_fortalecimiento_cat_for_id_seq'::regclass);


--
-- Name: cc_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cc ALTER COLUMN cc_id SET DEFAULT nextval('cc_cc_id_seq'::regclass);


--
-- Name: com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente ALTER COLUMN com_id SET DEFAULT nextval('componente_com_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a ALTER COLUMN comp_id SET DEFAULT nextval('componente24a_comp_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a_atm ALTER COLUMN comp_id SET DEFAULT nextval('componente24a_atm_comp_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a_cap ALTER COLUMN comp_id SET DEFAULT nextval('componente24a_cap_comp_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente26_cap ALTER COLUMN comp_id SET DEFAULT nextval('componente26_cap_comp_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente26_con ALTER COLUMN comp_id SET DEFAULT nextval('componente26_con_comp_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente26_equi ALTER COLUMN comp_id SET DEFAULT nextval('componente26_equi_comp_id_seq'::regclass);


--
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor ALTER COLUMN con_id SET DEFAULT nextval('consultor_con_id_seq'::regclass);


--
-- Name: cons_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultora ALTER COLUMN cons_id SET DEFAULT nextval('consulta_cons_id_seq'::regclass);


--
-- Name: con_int_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultores_interes ALTER COLUMN con_int_id SET DEFAULT nextval('consultores_interes_con_int_id_seq'::regclass);


--
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida ALTER COLUMN con_id SET DEFAULT nextval('contrapartida_con_id_seq'::regclass);


--
-- Name: cri_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio ALTER COLUMN cri_id SET DEFAULT nextval('criterio_cri_id_seq'::regclass);


--
-- Name: criterio_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_e0 ALTER COLUMN criterio_id SET DEFAULT nextval('"criterio_E0_criterio_id_seq"'::regclass);


--
-- Name: cum_min_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_minimo ALTER COLUMN cum_min_id SET DEFAULT nextval('cumplimiento_minimo_cum_min_id_seq'::regclass);


--
-- Name: dec_int_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY declaracion_interes ALTER COLUMN dec_int_id SET DEFAULT nextval('declaracion_interes_dec_int_id_seq'::regclass);


--
-- Name: def_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY definicion ALTER COLUMN def_id SET DEFAULT nextval('definicion_def_id_seq'::regclass);


--
-- Name: dep_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY departamento ALTER COLUMN dep_id SET DEFAULT nextval('departamento_dep_id_seq'::regclass);


--
-- Name: for_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_fortalecimiento ALTER COLUMN for_id SET DEFAULT nextval('detalle_fortalecimiento_for_id_seq'::regclass);


--
-- Name: det_obr_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_obra ALTER COLUMN det_obr_id SET DEFAULT nextval('detalle_obra_det_obr_id_seq'::regclass);


--
-- Name: dmon_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detmonto_proyeccion ALTER COLUMN dmon_pro_id SET DEFAULT nextval('detmonto_proyeccion_dmon_pro_id_seq'::regclass);


--
-- Name: dia_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY diagnostico ALTER COLUMN dia_id SET DEFAULT nextval('diagnostico_dia_id_seq'::regclass);


--
-- Name: divu_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY divu ALTER COLUMN divu_id SET DEFAULT nextval('divu_divu_id_seq'::regclass);


--
-- Name: ela_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY elaboracion_proyecto ALTER COLUMN ela_pro_id SET DEFAULT nextval('elaboracion_proyecto_ela_pro_id_seq'::regclass);


--
-- Name: emp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY empleados ALTER COLUMN emp_id SET DEFAULT nextval('empleados_emp_id_seq'::regclass);


--
-- Name: emp_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY empleados_municipales ALTER COLUMN emp_mun_id SET DEFAULT nextval('empleados_municipales_emp_mun_id_seq'::regclass);


--
-- Name: est_com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY estrategia_comunicacion ALTER COLUMN est_com_id SET DEFAULT nextval('estrategia_inversion_est_inv_id_seq'::regclass);


--
-- Name: fac_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY facilitador ALTER COLUMN fac_id SET DEFAULT nextval('facilitador_fac_id_seq'::regclass);


--
-- Name: fue_fin_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_financiamiento ALTER COLUMN fue_fin_id SET DEFAULT nextval('fuente_financiamiento_fue_fin_id_seq'::regclass);


--
-- Name: fue_pri_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_primaria ALTER COLUMN fue_pri_id SET DEFAULT nextval('fuente_primaria_fue_pri_id_seq'::regclass);


--
-- Name: fue_sec_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_secundaria ALTER COLUMN fue_sec_id SET DEFAULT nextval('fuente_secundaria_fue_sec_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gescon_participante ALTER COLUMN par_id SET DEFAULT nextval('gescon_participante_par_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gesrie_participan ALTER COLUMN par_id SET DEFAULT nextval('gesrie_participan_par_id_seq'::regclass);


--
-- Name: gescon_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_conocimiento ALTER COLUMN gescon_id SET DEFAULT nextval('gestion_conocimiento_gescon_id_seq'::regclass);


--
-- Name: gesrie_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_riesgo ALTER COLUMN gesrie_id SET DEFAULT nextval('gestion_riesgo_gesrie_id_seq'::regclass);


--
-- Name: gru_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo ALTER COLUMN gru_id SET DEFAULT nextval('grupo_gru_id_seq'::regclass);


--
-- Name: gru_apo_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_apoyo ALTER COLUMN gru_apo_id SET DEFAULT nextval('grupo_apoyo_gru_apo_id_seq'::regclass);


--
-- Name: gru_ges_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_gestor ALTER COLUMN gru_ges_id SET DEFAULT nextval('grupo_gestor_gru_ges_id_seq'::regclass);


--
-- Name: ind_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicador ALTER COLUMN ind_id SET DEFAULT nextval('indicador_ind_id_seq'::regclass);


--
-- Name: ind_des_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno1 ALTER COLUMN ind_des_id SET DEFAULT nextval('indicadores_desempeno1_ind_des_id_seq'::regclass);


--
-- Name: ind_des_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno2 ALTER COLUMN ind_des_id SET DEFAULT nextval('indicadores_desempeno2_ind_des_id_seq'::regclass);


--
-- Name: ind_des_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno3 ALTER COLUMN ind_des_id SET DEFAULT nextval('indicadores_desempeno3_ind_des_id_seq'::regclass);


--
-- Name: inf_pre_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY informe_preliminar ALTER COLUMN inf_pre_id SET DEFAULT nextval('informe_preliminar_inf_pre_id_seq'::regclass);


--
-- Name: ins_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY institucion ALTER COLUMN ins_id SET DEFAULT nextval('institucion_ins_id_seq'::regclass);


--
-- Name: int_ins_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY integracion_instancia ALTER COLUMN int_ins_id SET DEFAULT nextval('integracion_instancia_int_ins_id_seq'::regclass);


--
-- Name: int_aso_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY integrante_asociatividad ALTER COLUMN int_aso_id SET DEFAULT nextval('integrante_asociatividad_int_aso_id_seq'::regclass);


--
-- Name: inv_inf_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY inventario_informacion ALTER COLUMN inv_inf_id SET DEFAULT nextval('inventario_informacion_inv_inf_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- Name: man_adm_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY manuales_administrativos ALTER COLUMN man_adm_id SET DEFAULT nextval('manuales_administrativos_man_adm_id_seq'::regclass);


--
-- Name: map_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY mapa ALTER COLUMN map_id SET DEFAULT nextval('mapa_map_id_seq'::regclass);


--
-- Name: mon_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY monto_proyeccion ALTER COLUMN mon_pro_id SET DEFAULT nextval('monto_proyeccion_mon_pro_id_seq'::regclass);


--
-- Name: mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio ALTER COLUMN mun_id SET DEFAULT nextval('municipio_mun_id_seq'::regclass);


--
-- Name: nom_fec_apr_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nombre_fecha_aprobacion ALTER COLUMN nom_fec_apr_id SET DEFAULT nextval('nombre_fecha_aprobacion_nom_fec_apr_id_seq'::regclass);


--
-- Name: nom_rub_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nombre_rubro ALTER COLUMN nom_rub_id SET DEFAULT nextval('nombre_rubro_nom_rub_id_seq'::regclass);


--
-- Name: not_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nota ALTER COLUMN not_id SET DEFAULT nextval('nota_not_id_seq'::regclass);


--
-- Name: obr_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY obra ALTER COLUMN obr_id SET DEFAULT nextval('obra_obr_id_seq'::regclass);


--
-- Name: opc_sis_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY opcion_sistema ALTER COLUMN opc_sis_id SET DEFAULT nextval('opcion_sistema_opc_sis_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante ALTER COLUMN par_id SET DEFAULT nextval('participante_par_id_seq'::regclass);


--
-- Name: par_cap_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_capacitacion ALTER COLUMN par_cap_id SET DEFAULT nextval('participante_capacitacion_par_cap_id_seq'::regclass);


--
-- Name: per_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY perfil_proyecto ALTER COLUMN per_pro_id SET DEFAULT nextval('perfil_proyecto_per_pro_id_seq'::regclass);


--
-- Name: per_enl_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY personal_enlace ALTER COLUMN per_enl_id SET DEFAULT nextval('personal_enlace_per_enl_id_seq'::regclass);


--
-- Name: pes_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY pestania_proceso ALTER COLUMN pes_pro_id SET DEFAULT nextval('pestania_proceso_pes_pro_id_seq'::regclass);


--
-- Name: pla_con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_contingencia ALTER COLUMN pla_con_id SET DEFAULT nextval('plan_contingencia_pla_con_id_seq'::regclass);


--
-- Name: pla_inv_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_inversion ALTER COLUMN pla_inv_id SET DEFAULT nextval('plan_inversion_pla_inv_id_seq'::regclass);


--
-- Name: pla_tra_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_trabajo ALTER COLUMN pla_tra_id SET DEFAULT nextval('plan_trabajo_plan_trab_id_seq'::regclass);


--
-- Name: pob_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY poblacion_reunion ALTER COLUMN pob_id SET DEFAULT nextval('poblacion_pro_id_seq'::regclass);


--
-- Name: por_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY portafolio_proyecto ALTER COLUMN por_pro_id SET DEFAULT nextval('portafolio_proyecto_por_pro_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presentes_participante ALTER COLUMN par_id SET DEFAULT nextval('presentes_participante_par_id_seq'::regclass);


--
-- Name: pre_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presupuesto ALTER COLUMN pre_id SET DEFAULT nextval('presupuesto_pre_id_seq'::regclass);


--
-- Name: pri_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY priorizacion ALTER COLUMN pri_id SET DEFAULT nextval('priorizacion_pri_id_seq'::regclass);


--
-- Name: pro_ide_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado ALTER COLUMN pro_ide_id SET DEFAULT nextval('problema_identificado_pro_ide_id_seq'::regclass);


--
-- Name: pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proceso ALTER COLUMN pro_id SET DEFAULT nextval('proceso_pro_id_seq'::regclass);


--
-- Name: pro_eta_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proceso_etapa ALTER COLUMN pro_eta_id SET DEFAULT nextval('proceso_etapa_pro_eta_id_seq'::regclass);


--
-- Name: pro_ing_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyeccion_ingreso ALTER COLUMN pro_ing_id SET DEFAULT nextval('proyeccion_ingreso_pro_ing_id_seq'::regclass);


--
-- Name: pro_ide_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_identificado ALTER COLUMN pro_ide_id SET DEFAULT nextval('proyecto_identificado_pro_ide_id_seq'::regclass);


--
-- Name: pro_pep_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep ALTER COLUMN pro_pep_id SET DEFAULT nextval('"proyecto_Pep_pro_pep_id_seq"'::regclass);


--
-- Name: id_proy_cc; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyectos_cc ALTER COLUMN id_proy_cc SET DEFAULT nextval('proyectos_cc_id_proy_cc_seq'::regclass);


--
-- Name: rec_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY recibido_municipalidad ALTER COLUMN rec_mun_id SET DEFAULT nextval('recibido_municipalidad_rec_mun_id_seq'::regclass);


--
-- Name: reg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY region ALTER COLUMN reg_id SET DEFAULT nextval('region_reg_id_seq'::regclass);


--
-- Name: res_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY resultado ALTER COLUMN res_id SET DEFAULT nextval('"Resultado_res_id_seq"'::regclass);


--
-- Name: reu_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY reunion ALTER COLUMN reu_id SET DEFAULT nextval('reunion_reu_id_seq'::regclass);


--
-- Name: rea_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revapro_productos ALTER COLUMN rea_pro_id SET DEFAULT nextval('revapro_productos_rea_pro_id_seq'::regclass);


--
-- Name: rea_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revapro_productos2 ALTER COLUMN rea_pro_id SET DEFAULT nextval('revapro_productos2_rea_pro_id_seq'::regclass);


--
-- Name: rev_inf_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revision_informacion ALTER COLUMN rev_inf_id SET DEFAULT nextval('revision_informacion_rev_inf_id_seq'::regclass);


--
-- Name: rol_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rol ALTER COLUMN rol_id SET DEFAULT nextval('rol_rol_id_seq'::regclass);


--
-- Name: rub_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rubro ALTER COLUMN rub_id SET DEFAULT nextval('rubro_rub_id_seq'::regclass);


--
-- Name: rub_ele_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rubro_elegible ALTER COLUMN rub_ele_id SET DEFAULT nextval('rubro_elegible_rub_ele_id_seq'::regclass);


--
-- Name: seg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento ALTER COLUMN seg_id SET DEFAULT nextval('seguimiento_seg_id_seq'::regclass);


--
-- Name: seg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_3b ALTER COLUMN seg_id SET DEFAULT nextval('seguimiento_3b_seg_id_seq'::regclass);


--
-- Name: seg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_aprimp ALTER COLUMN seg_id SET DEFAULT nextval('seguimiento_aprimp_seg_id_seq'::regclass);


--
-- Name: seg_eva_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_evaluacion ALTER COLUMN seg_eva_id SET DEFAULT nextval('seguimiento_evaluacion_seg_eva_id_seq'::regclass);


--
-- Name: seg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_receppro ALTER COLUMN seg_id SET DEFAULT nextval('seguimiento_receppro_seg_id_seq'::regclass);


--
-- Name: sel_com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seleccion_comite ALTER COLUMN sel_com_id SET DEFAULT nextval('seleccion_comite_seleccion_comite_id_seq'::regclass);


--
-- Name: sol_asis_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_asistencia ALTER COLUMN sol_asis_id SET DEFAULT nextval('solicitud_asistencia_sol_asis_id_seq'::regclass);


--
-- Name: sol_ayu_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_ayuda ALTER COLUMN sol_ayu_id SET DEFAULT nextval('solicitud_ayuda_sol_ayu_id_seq'::regclass);


--
-- Name: tip_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo ALTER COLUMN tip_id SET DEFAULT nextval('tipo_tip_id_seq'::regclass);


--
-- Name: tip_act_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo_actor ALTER COLUMN tip_act_id SET DEFAULT nextval('tipo_actor_tip_act_id_seq'::regclass);


--
-- Name: tip_map_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo_mapa ALTER COLUMN tip_map_id SET DEFAULT nextval('tipo_mapa_tip_map_id_seq'::regclass);


--
-- Name: trans_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY transferencia ALTER COLUMN trans_id SET DEFAULT nextval('transferencia_trans_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY user_profiles ALTER COLUMN id SET DEFAULT nextval('user_profiles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: actividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY actividad (act_id, com_id, act_act_id, act_codigo, act_descripcion, act_tipo, act_nombre, fecha_creacion, saldo_goes, saldo_gmun, saldo_birf) FROM stdin;
1	5	\N	B-1.1	Apoyo al diseño de Inversiones	Macroactividad	Apoyo al diseño de Inversiones	2013-03-07	0	0	0
2	4	\N	A-1.1	Subsidio de los SubProy.s baja	Macroactividad	Subsidio de los SubProy.s baja	2013-03-07	0	0	0
3	5	1	B-1.1.1	Apoyo para CO ciudadana determ	Actividad	Apoyo para CO ciudadana determ	2013-03-07	0	0	0
4	5	1	B-1.1.2	Desarrollo de guias y CA. sobr	Actividad	Desarrollo de guias y CA. sobr	2013-03-07	0	0	0
5	5	4	B-1.1.2-1	Desarrollo de guias y CA. sobr	Subactividad	Desarrollo de guias y CA. sobr	2013-03-07	14000	15000	20987
6	4	2	A-1.1.1	Subsidio de los SubProy.s baja	Actividad	Subsidio de los SubProy.s baja	2013-03-07	0	0	0
7	5	4	B-1.1.2-2	Desarrollo de guias y CA. sobr	Subactividad	Desarrollo	2013-03-07	1234	123456	64543
8	8	\N	B-3.1	as	Macroactividad	Equipamiento de la SSDT	2013-04-05	0	0	0
9	8	8	B-3.1.1		Actividad	Compra de Equipo Informático	2013-04-05	0	0	0
11	8	9	B-3.1.1-1	Compra del equipo a proveedor GBM	Subactividad	Compra de Laptop	2013-04-05	0	0	10000.00
\.


--
-- Data for Name: actividades_epi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY actividades_epi (epi_id, act_id, act_nombre, act_fecha_ini, act_fecha_fin, act_estado, act_responsable, act_cargo, act_descripcion, act_recursos) FROM stdin;
3	1	dasdas	2013-01-11	2013-01-03	No iniciada	dasd	das	das	dasd
7	2	xZ	2013-02-22	2013-02-28	\N	xZ	xZc	xZx	222
\.


--
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id, acu_mun_ruta_archivo, eta_id, acu_mun_fecha_observacion, acu_mun_fecha_borrador, acu_mun_fecha_aceptacion) FROM stdin;
4	\N	\N	\N	\N	12	\N	1	\N	\N	\N
6	\N	\N	\N	\N	3	\N	1	\N	\N	\N
7	\N	\N	\N	\N	6	\N	1	\N	\N	\N
9	\N	\N	\N	\N	18	\N	1	\N	\N	\N
8	\N	t	t		9	documentos/acuerdo_municipal/acuerdo_municipal8.pdf	1	\N	\N	\N
11	2012-12-05	t	t		26		1	\N	\N	\N
13	2012-12-10	t	t	Hay disposición del Concejo Municipal a participar en el proceso.	29		1	\N	\N	\N
12	2013-01-11	t	t	Mucha disposición de parte del Concejo Municipal para participar del proceso.	27		1	\N	\N	\N
10	2012-12-08	t	t	El Concejo Municipal, aprobó el Plan y se comprometió a brindar apoyo en todo el proceso.\nSe acordó nombrar al Sr. Elmer Ulises Rodríguez y al Ing. Manuel Dolores Quintanilla, como miembros del Equipo Local de Apoyo.	28		1	\N	\N	\N
14	2012-12-17	t	t	Se trabajó con la Srita. Kayra malinyn Romero Garcia, se tienen programadas actividades con los liderazgos municipales, para cerrar el año.\nDebido a esto no se realizarán las visitas de sinsibilizaciones como se habia previsto y planificado,la Srita Romero y otro enlace municipal se comprometierón a visitar y garantizar la invitación de la convocatoria, CODEIN, proporcionará el material informativo.	30		1	\N	\N	\N
\.


--
-- Data for Name: acuerdo_municipal2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal2 (acu_mun_id, mun_id, acu_mun_fecha_acuerdo, acu_mun_fecha_recepcion, acu_mun_fecha_conformacion, acu_mun_archivo, acu_mun_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N
\.


--
-- Data for Name: acumun_miembros; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acumun_miembros (mie_id, acu_mun_id, mie_nombre, mie_apellidos, mie_sexo, mie_edad, mie_cargo, mie_nivel, mie_telefono) FROM stdin;
1	1	Juan	Perez	M	45	Alcalde	Bachillerato	54654654
\.


--
-- Data for Name: aporte_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY aporte_municipal (apo_mun_id, apo_mun_monto_estimado, apo_mun_faprobacion, apo_mun_observaciones, mun_id, eta_id) FROM stdin;
\.


--
-- Data for Name: area_accion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY area_accion (id_area_accion, nombre_area_accion) FROM stdin;
\.


--
-- Data for Name: area_dimension; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY area_dimension (are_dim_id, are_dim_nombre) FROM stdin;
2	Económico
3	Ambiental
4	Político Institucional
1	Socio-Cultural
\.


--
-- Data for Name: asi_tec_miembros; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asi_tec_miembros (mie_id, asi_tec_id, mie_nombre, mie_apellidos, mie_sexo, mie_edad, mie_cargo, mie_nivel, mie_telefono) FROM stdin;
\.


--
-- Data for Name: asistencia_tecnica; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistencia_tecnica (asi_tec_id, mun_id, asi_tec_consultor, asi_tec_fecha_solicitud, asi_tec_fecha_emision, asi_tec_fecha_envio, asi_tec_fecha_inicio, asi_tec_archivo_perfil, asi_tec_archivo_trd, asi_tec_archivo_acuerdo, asi_tec_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: asistente_divu; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistente_divu (divu_id, asis_id, asis_nombre, asis_sexo, asis_cargo, asis_sector) FROM stdin;
\.


--
-- Data for Name: asistente_dsat; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistente_dsat (dsat_id, asis_nombre, asis_sexo, asis_cargo, asis_sector) FROM stdin;
\.


--
-- Data for Name: asistente_fcdp; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistente_fcdp (fcdp_id, asis_nombre, asis_sexo, asis_cargo, asis_sector) FROM stdin;
1	Carlos	M	cargo1	Educacion
\.


--
-- Data for Name: asociatividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asociatividad (aso_id, aso_nombre, aso_fecha_constitucion, aso_movil, aso_apoyo, aso_unidad_tecnica, tip_id, pro_pep_id) FROM stdin;
34	\N	\N	\N	\N	\N	\N	3
36	\N	\N	\N	\N	\N	\N	12
37	\N	\N	\N	\N	\N	\N	29
38	\N	\N	\N	\N	\N	\N	29
39	\N	\N	\N	\N	\N	\N	26
40	\N	\N	\N	\N	\N	\N	26
41	\N	\N	\N	\N	\N	\N	28
42	\N	\N	\N	\N	\N	\N	28
43	\N	\N	\N	\N	\N	\N	26
44	\N	\N	\N	\N	\N	\N	27
45	\N	\N	\N	\N	\N	\N	27
46	\N	\N	\N	\N	\N	\N	27
47	\N	\N	\N	\N	\N	\N	30
\.


--
-- Data for Name: autor_estrategia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY autor_estrategia (aut_est_id, aut_est_nombre, aut_est_fecha, aut_est_cantidadm, aut_est_cantidadh, est_com_id, tip_act_id) FROM stdin;
\.


--
-- Data for Name: cap_concejo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cap_concejo (cap_id) FROM stdin;
\.


--
-- Data for Name: cap_financiera; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cap_financiera (cap_id, mie_id) FROM stdin;
\.


--
-- Data for Name: cap_participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cap_participante (par_id, cap_id, par_nombre, par_apellidos, par_sexo, par_edad, par_cargo, par_telefono) FROM stdin;
\.


--
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) FROM stdin;
76	\N	\N	\N	\N	36	\N	4
77	\N	\N	\N	\N	6	\N	1
78	2013-01-10	Calendarización de las actividades.	Casa de la Juventud del Municipio.	El Alcalde Municipal envía transporte para movilizar a referentes.	29	Planificación.	1
79	\N	\N	\N	\N	29	\N	1
80	2012-12-10	Establecer funciones y formas de trabajo del ELA.	Oficinas de la Alcaldía Municipal.	Toda comunicación se hará a través de la Srita. Alba Bonilla Secretaria Municipal.\n\nLa Municipalidad gestionará locales para reuniones.	29	Funciones del ELA	1
81	\N	\N	\N	\N	29	\N	2
82	\N	\N	\N	\N	28	\N	1
83	2013-01-23	Conocer La Planificacion Estrategica Participativa	Alcaldia Muncipal 		28		1
84	\N	\N	\N	\N	26	\N	2
85	\N	\N	\N	\N	28	\N	1
86	\N	\N	\N	\N	28	\N	1
87	\N	\N	\N	\N	28	\N	1
88	\N	\N	\N	\N	26	\N	1
89	\N	\N	\N	\N	28	\N	1
90	\N	\N	\N	\N	28	\N	2
91	\N	\N	\N	\N	28	\N	2
92	\N	\N	\N	\N	27	\N	2
93	\N	\N	\N	\N	27	\N	2
94	\N	\N	\N	\N	27	\N	2
95	\N	\N	\N	\N	30	\N	1
96	\N	\N	\N	\N	30	\N	1
97	\N	\N	\N	\N	30	\N	1
98	2013-01-17	Planificación	Casa de la Cultura		30	Planificación y otros	1
\.


--
-- Data for Name: capacitaciones; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitaciones (cap_id, mun_id, cap_fecha, cap_tema, cap_lugar, cap_facilitadores, cap_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N
\.


--
-- Data for Name: cat_consultores; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cat_consultores (con_id, con_nombre, con_telefono) FROM stdin;
\.


--
-- Data for Name: categoria_fortalecimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY categoria_fortalecimiento (cat_for_id, cat_for_nombre) FROM stdin;
1	i. Capacitación
2	ii. Apoyo a la organización
3	iii. Herramientas y material básico para la prevención y atención de emergencia
\.


--
-- Data for Name: cc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cc (cc_id, mun_id, cc_fecha, cc_hora, cc_lugar, total_mujeres, total_hombres, acta_final, listado_asistencia) FROM stdin;
\.


--
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
cdd4d4948768239cb9b6e69046c490d4	190.53.118.188	Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31	1366185646	a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"49";s:8:"username";s:6:"blexis";s:6:"status";s:1:"1";}
66b1d9a441c2ddf44831f7d9774cc182	190.87.0.59	Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31	1366257371	
4487c46b7d702313755c64e21e3a3c94	190.53.118.188	Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31	1366257439	
\.


--
-- Data for Name: componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente (com_id, com_com_id, com_codigo, com_nombre, com_descripcion, fecha_creacion, com_tipo) FROM stdin;
1	\N	A	Promocion  Prestación de Servicios descentralizados	Componente para prestacion de servicios descentralizados	2013-03-06	Componente
2	\N	B	Fortalecimiento de los Gobiernos	Fortalecimiento de los Gobiernos Locales	2013-03-06	Componente
3	\N	C	Apoyo a la Estrategia de Descentralizacion	Apoyos	2013-03-06	Componente
4	1	A-1	Otorgamiento de subsidio a los	Otorgamiento de subsidio a los	2013-03-07	Subcomponente
5	2	B-1	Fortalecimiento  capacidad Ins	Fortalecimiento  capacidad Ins	2013-03-07	Subcomponente
6	2	B-2	Apoyo para la Implementacion a	Apoyo para la Implementacion a	2013-03-07	Subcomponente
8	2	B-3	Apoyo a las Instituciones	Mensaje	2013-04-05	Subcomponente
\.


--
-- Data for Name: componente24a; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente24a (comp_id, mun_id, fecha_cap, tema_cap, total_mujeres, total_hombres, fecha_instalacion, fecha_operacion, observaciones) FROM stdin;
1	1	2013-12-12	hola	12	12	2013-12-12	2013-12-12	no hay
\.


--
-- Data for Name: componente24a_atm; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente24a_atm (comp_id, mun_id, fecha_atm, id_area_accion, tipo_entidad_asesora, nombre_entidad_asesora, monto) FROM stdin;
\.


--
-- Data for Name: componente24a_cap; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente24a_cap (comp_id, mun_id, fecha_cap, tema_cap, total_mujeres, total_hombres, fecha_instalacion, fecha_operacion, observaciones) FROM stdin;
1	2	2013-04-26	TEMA 1	3	2	2013-04-03	2013-04-18	Observaciones
\.


--
-- Data for Name: componente26_cap; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_cap (comp_id, nombre_cap, fecha_cap, nombre_capacitador, total_hombres, total_mujeres, monto_cap, entidad) FROM stdin;
\.


--
-- Data for Name: componente26_con; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_con (comp_id, nombre_con, fecha_con, nombre_consultor, monto_con, entidad) FROM stdin;
\.


--
-- Data for Name: componente26_equi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_equi (comp_id, desc_equi, fecha_equi, monto_equi, entidad) FROM stdin;
\.


--
-- Data for Name: consultor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultor (con_id, con_nombre, con_apellido, con_telefono, con_email, pro_pep_id, cons_id, "user") FROM stdin;
30	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	28	7	mi09165
38	Coordinador 	El Congo	5555-5555	karensita_2410@hotmail.com	34	1	an12214
31	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	29	7	un07129
39	Coordinador 	Chalatenango	5555-5555	karensita_2410@hotmail.com	35	3	ch03025
4	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	2	1	ah01004
5	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	3	1	ah01005
6	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	4	1	ah01012
7	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	5	1	so13224
8	Coordinador 1	Apellido Coordinado1	7777-7777	karensita_2410@hotmail.com	6	2	so13226
9	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	7	2	so13232
10	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	8	2	an12220
11	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	9	2	an12218
12	Coordinador 1	Apellido Coordinado1	8888-8888	karensita_2410@hotmail.com	10	2	an12221
13	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	11	3	sa10197
14	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	12	3	sa10185
15	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	13	3	li05076
16	Coordinador 1	Apellido Coordinado1	1236-5478	karensita_2410@hotmail.com	14	4	ch03037
17	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	15	4	ch03046
18	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	16	4	ch03031
19	Coordinador 1	Apellido Coordinado1	3333-3333	karensita_2410@hotmail.com	17	4	ch03052
20	Coordinador 1	Apellido Coordinado1	7777-7777	karensita_2410@hotmail.com	18	5	pa06114
21	Coordinador 1	Apellido Coordinado1	3333-3333	karensita_2410@hotmail.com	19	5	cu04058
22	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	20	5	vi11209
23	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	21	6	us14251
24	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	22	6	mi09169
25	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	23	6	mi09159
26	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	24	6	mo08142
27	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	25	6	mo08136
28	Coordinador 1	Apellido Coordinado1	8888-8888	karensita_2410@hotmail.com	26	7	mi09161
29	Coordinador 1	Apellido Coordinado1	1111-1111	karensita_2410@hotmail.com	27	7	mi09178
32	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	30	7	un07124
40	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	36	6	ca02021
41	Consultor GDR	Gestion Riesgos	5555-9999	karensita_2410@hotmail.com	\N	9	eaviles
\.


--
-- Data for Name: consultora; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultora (cons_id, cons_nombre, cons_direccion, cons_telefono, cons_telefono2, cons_fax, cons_email, cons_repres_legal, cons_observaciones) FROM stdin;
1	FUNDACION  DR.GUILLERMO MANUEL UNGO, (FUNDAUNGO)		         	         	         			
2	AV CONSULTORES, S.A. DE C.V.		         	         	         			
3	CENTRO DE CAPACITACION Y PROMOCION DE LA DEMOCRACIA (CECADE)		         	         	         			
4	SISTEMA DE ASESORIA Y CAPACITACION PARA EL DESARROLLO LOCAL (SACDEL)		         	         	         			
5	FUNDACION NACIONAL PARA EL DESARROLLO (FUNDE)		         	         	         			
6	FUNDACION DE APOYO A MUNICIPIOS DE EL SALVADOR (FUNDAMUNI)		         	         	         			
7	RESEARCH TRIANGLE INSTITUTE (RTI INTERNACIONAL)		         	         	         			
9	Consultora Nueva	fdafdaf	fdafds   	         	         			
\.


--
-- Data for Name: consultores_interes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultores_interes (con_int_id, con_int_tipo, con_int_aplica, con_int_seleccionada, pro_id, cons_id) FROM stdin;
2	ONG	\N	\N	2	4
3	ONG	\N	\N	2	3
\.


--
-- Data for Name: contrapartida; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida (con_id, con_nombre) FROM stdin;
1	Locales para reuniones
3	Alimentación
5	Personal
2	Transporte
6	Otro
4	Mobiliario y Equipo
\.


--
-- Data for Name: contrapartida_acuerdo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor, con_especifique) FROM stdin;
4	1	\N	\N
4	3	\N	\N
4	5	\N	\N
4	2	\N	\N
4	6	\N	\N
4	4	\N	\N
6	1	\N	\N
6	3	\N	\N
6	5	\N	\N
6	2	\N	\N
6	6	\N	\N
6	4	\N	\N
7	1	\N	\N
7	2	\N	\N
7	3	\N	\N
7	4	\N	\N
7	5	\N	\N
7	6	\N	\N
9	1	\N	\N
9	2	\N	\N
9	3	\N	\N
9	4	\N	\N
9	5	\N	\N
9	6	\N	\N
8	1	f	\N
8	2	f	\N
8	3	f	\N
8	4	t	\N
8	5	t	\N
8	6	f	\N
11	1	t	\N
11	2	f	\N
11	3	f	\N
11	4	t	\N
11	5	f	\N
11	6	f	\N
10	1	t	\N
10	2	f	\N
10	3	f	\N
10	4	t	\N
10	5	f	\N
10	6	f	\N
13	1	t	\N
13	2	f	\N
13	3	f	\N
13	4	t	\N
13	5	f	\N
13	6	f	\N
12	1	t	\N
12	2	f	\N
12	3	f	\N
12	4	t	\N
12	5	f	\N
12	6	f	\N
14	1	t	\N
14	2	f	\N
14	3	f	\N
14	4	f	\N
14	5	f	\N
14	6	f	\N
\.


--
-- Data for Name: contrapartida_aporte; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida_aporte (con_id, apo_mun_id, con_apo_valor, con_apo_especifique) FROM stdin;
\.


--
-- Data for Name: criterio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio (cri_id, cri_nombre) FROM stdin;
1	Representatividad
2	Proporcionalidad
3	Pluralidad
4	Equidad
\.


--
-- Data for Name: criterio_acuerdo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) FROM stdin;
1	4	\N
2	4	\N
3	4	\N
4	4	\N
1	6	\N
2	6	\N
3	6	\N
4	6	\N
1	7	\N
2	7	\N
3	7	\N
4	7	\N
1	14	t
2	14	t
3	14	t
4	14	t
1	9	\N
2	9	\N
3	9	\N
4	9	\N
1	8	t
2	8	t
3	8	t
4	8	t
1	11	t
2	11	t
3	11	t
4	11	f
1	13	t
2	13	t
3	13	t
4	13	f
1	12	t
2	12	t
3	12	t
4	12	t
1	10	t
2	10	t
3	10	t
4	10	t
\.


--
-- Data for Name: criterio_e0; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_e0 (criterio_id, criterio_nombre) FROM stdin;
1	EL MUNICIPIO NO CUENTA CON UN PLAN DE DESARROLLO LOCAL (PLAN ESTRATÉGICO PARTICIPATIVO).
2	LA MUNICIPALIDAD NO  CUENTA CON RECURSOS PROPIOS  NI CON EL APOYO DE OTROS COOPERANTES PARA SU ELABORACIÓN.
11	EXISTE UNA DISPOSICIÓN EXPRESA Y FORMAL POR PARTE DE LOS CONCEJOS MUNICIPALES DE ELABORAR E IMPLEMENTAR EL PLAN.
\.


--
-- Data for Name: criterio_grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) FROM stdin;
1	3	\N
2	3	\N
3	3	\N
4	3	\N
1	4	\N
2	4	\N
3	4	\N
4	4	\N
1	5	t
2	5	t
3	5	\N
4	5	\N
1	6	\N
2	6	\N
3	6	\N
4	6	\N
1	7	\N
2	7	\N
3	7	\N
4	7	\N
1	8	\N
2	8	\N
3	8	\N
4	8	\N
\.


--
-- Data for Name: criterio_integracion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_integracion (cri_id, int_ins_id, cri_int_valor) FROM stdin;
1	3	\N
2	3	\N
3	3	\N
4	3	\N
\.


--
-- Data for Name: criterio_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_reunion (cri_id, reu_id, cri_reu_valor) FROM stdin;
1	16	\N
2	16	\N
3	16	\N
4	16	\N
1	63	\N
2	63	\N
3	63	\N
4	63	\N
1	64	\N
2	64	\N
3	64	\N
4	64	\N
1	65	\N
2	65	\N
3	65	\N
4	65	\N
1	66	\N
2	66	\N
3	66	\N
4	66	\N
1	67	\N
2	67	\N
3	67	\N
4	67	\N
1	69	\N
2	69	\N
3	69	\N
4	69	\N
1	70	\N
2	70	\N
3	70	\N
4	70	\N
1	71	\N
2	71	\N
3	71	\N
4	71	\N
1	72	\N
2	72	\N
3	72	\N
4	72	\N
1	73	\N
2	73	\N
3	73	\N
4	73	\N
1	75	\N
2	75	\N
3	75	\N
4	75	\N
\.


--
-- Data for Name: cumplimiento_diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) FROM stdin;
\.


--
-- Data for Name: cumplimiento_informe; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) FROM stdin;
11	1	\N
11	2	\N
11	3	\N
11	4	\N
11	5	\N
11	6	\N
11	7	\N
11	8	\N
11	9	\N
11	10	\N
11	11	\N
11	12	\N
12	1	\N
12	2	\N
12	3	\N
12	4	\N
12	5	\N
12	6	\N
12	7	\N
12	8	\N
12	9	\N
12	10	\N
12	11	\N
12	12	\N
\.


--
-- Data for Name: cumplimiento_minimo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_minimo (cum_min_id, cum_min_nombre, eta_id) FROM stdin;
1	Caracterización general del municipio	1
2	Descripcion del Tejido Social y productivo existente	1
3	Descripción de oferta de servicio empresarial	1
4	Inventario de actores locales e instituciones	1
5	Cartografía base del municipio	1
6	Referencia de informacion secundaria disponible	1
7	Acuerdo municipal y politicas municipales	1
8	Declaración de compromisos	1
9	Integrantes del equipo local de apoyo	1
10	Plan de trabajo del Proceso	1
11	Valoración de la voluntad politica de trabajar	1
12	Recomendaciones y sugerencias	1
13	Datos generales	2
14	Datos demográficos	2
15	Contexto regional y nacional	2
16	Mapa de actores Socio-económicos	2
18	Información Económica	2
17	Información Socio-cultural	2
19	Información Ambiental	2
20	Información Político-institucional	2
21	Se cuenta con temas, problemas y ejes definidos	2
22	Contiene resumen ejecutivo	2
24	Definición estratégica	3
25	Cronograma de implementación	3
26	Estratégia de seguimiento y evaluación	3
27	Estratégia de comunicaciones y gestión	3
23	Resumen del Diagnóstico del municipio	3
\.


--
-- Data for Name: cumplimiento_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_proyecto (pro_pep_id, cum_min_id, cum_pro_valor) FROM stdin;
\.


--
-- Data for Name: dd; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY dd (dd_id, dd_fecha, dd_descripcion, dd_archivo_resumen, dd_archivo_completo) FROM stdin;
1	2013-01-10	sdsda	documentos/dd/acuerdo_municipal156.doc	documentos/dd/acuerdo_municipal157.doc
\.


--
-- Data for Name: dd_sector; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY dd_sector (dd_id, sec_id) FROM stdin;
1	1
1	3
\.


--
-- Data for Name: declaracion_interes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY declaracion_interes (dec_int_id, dec_int_fecha, dec_int_lugar, dec_int_comentario, dec_int_ruta_archivo, pro_pep_id) FROM stdin;
2	\N	\N	\N	\N	6
3	\N	\N	\N	\N	9
4	2012-12-18	Salón de Convenciones Maquilishuat.	Muy buena disposición de los participantes y Concejo Municipal.		26
5	2013-01-16	Casa Municipal.	Se nombraron los referentes comunitarios de ELA:\n1. Paula Eliza Cuadra "Unidad de Salud" 2619-1566 y 7991-2233\n2. José Tito Parada Vicente "Penifo" 7726-7299\n3. Concepción Reyes "Representante de las Mujeres" 2619-1553		27
6	2012-12-17		Se acordó que los participantes que serían representantes del ELA serán:\n\n1.Teódulo Fuentes.\n2.Yessica Isabel Paz Benitez. \n3.María Virginia Bonilla.\n\nAsistieron tres personas más pero sus letras no son legibles.		29
7	2013-01-19	Zona Urbana, Comedor Popular.	Despuès de leer el Acta de aprobaciòn del Proceso PEP. se levantò la mano de los y las asambleistas para la aprobaciòn.\nSe eligieron los tres representantes de la ciudadania para completar el equipo local de apoyo.\nExpresaròn dispocision de participaciòn en el proceso.		28
8	2012-12-20	cantón El Salvador	Se eligieron las personas que nos van a apoyar como grupo referentes ciudadanos.\n1.- Hernán Alcides Romero.\n2.- Zoila Abigail martínez.\n3.- Medardo Antonio Pineda.\n4.- Jeibin Yobanis Blanco.		30
\.


--
-- Data for Name: definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY definicion (def_id, def_fecha, def_ruta_archivo, pro_pep_id, def_observacion) FROM stdin;
5	\N	\N	29	\N
6	\N	\N	26	\N
7	\N	\N	27	\N
8	\N	\N	28	\N
9	\N	\N	30	\N
\.


--
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY departamento (dep_id, reg_id, dep_nombre) FROM stdin;
1	4	Ahuachapan
2	2	Cabañas
5	1	La Libertad
7	3	La Union
8	3	Morazan
9	3	San Miguel
10	1	San Salvador
12	4	Santa Ana
13	4	Sonsonate
14	3	Usulutan
3	1	Chalatenango
4	1	Cuscatlan
11	2	San Vicente
6	2	La Paz
15	1	Depto 1
16	1	Depto 2
\.


--
-- Data for Name: detalle_fortalecimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY detalle_fortalecimiento (for_id, for_monto, cat_for_id, rub_id) FROM stdin;
1	0.00	1	1
2	0.00	2	1
3	0.00	3	1
4	0.00	1	2
5	0.00	2	2
6	0.00	3	2
7	100.00	1	3
8	200.00	2	3
9	300.00	3	3
\.


--
-- Data for Name: detalle_obra; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY detalle_obra (det_obr_id, det_obr_monto, obr_id, rub_id) FROM stdin;
1	0.00	1	1
2	0.00	2	1
3	0.00	3	1
4	0.00	4	1
5	0.00	5	1
6	0.00	6	1
7	0.00	7	1
8	0.00	8	1
9	0.00	1	2
10	0.00	2	2
11	0.00	3	2
12	0.00	4	2
13	0.00	5	2
14	0.00	6	2
15	0.00	7	2
16	0.00	8	2
17	10.00	1	3
18	20.00	2	3
19	500.00	3	3
20	40.00	4	3
21	50.00	5	3
22	60.00	6	3
23	70.00	7	3
24	80.00	8	3
\.


--
-- Data for Name: detmonto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY detmonto_proyeccion (dmon_pro_id, dmon_pro_ingresos, dmon_pro_anio, dmon_pro_correlativo, mon_pro_id) FROM stdin;
\.


--
-- Data for Name: diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY diagnostico (dia_id, dia_fecha_borrador, dia_fecha_observacion, dia_fecha_concejo_muni, dia_vision, dia_observacion, dia_ruta_archivo, pro_pep_id) FROM stdin;
\.


--
-- Data for Name: divu; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY divu (divu_id, divu_nombre, divu_fecha, divu_tipo, divu_responsable, divu_municipio) FROM stdin;
\.


--
-- Data for Name: dsat; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY dsat (dsat_id, dsat_fecha, dsat_actividad, dsat_municipio, dsat_observaciones, dsat_archivo) FROM stdin;
\.


--
-- Data for Name: dsat_sector; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY dsat_sector (dsat_id, sec_id) FROM stdin;
\.


--
-- Data for Name: elaboracion_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY elaboracion_proyecto (ela_pro_id, ela_pro_carta_exp, ela_pro_fentrega_idem, ela_pro_carta_confirmacion, ela_pro_fconformacion, ela_pro_observacion, mun_id, ela_pro_fentrega_uep) FROM stdin;
1	\N	\N	\N	\N	\N	93	\N
2	\N	\N	\N	\N	\N	1	\N
3	\N	\N	\N	\N	\N	2	\N
4	\N	\N	\N	\N	\N	300	\N
5	t	2013-03-02	t	2013-03-04		301	2013-03-03
\.


--
-- Data for Name: empleados; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY empleados (emp_id, emp_mun_id, emp_nombre, emp_apellidos, emp_sexo, emp_edad, emp_cargo, emp_nivel, emp_titulo, emp_experiencia) FROM stdin;
\.


--
-- Data for Name: empleados_municipales; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY empleados_municipales (emp_mun_id, mun_id, emp_mun_organigrama, emp_mun_observaciones) FROM stdin;
\.


--
-- Data for Name: epi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY epi (epi_id, epi_nombre) FROM stdin;
3	Plan-3-Elaborado el: 11-01-2013
4	Plan-4-Elaborado el: 11-01-2013
5	Plan-5-Elaborado el: 11-01-2013
6	Plan-6-Elaborado el: 11-01-2013
7	Plan-7-Elaborado el: 28-02-2013
\.


--
-- Data for Name: estrategia_comunicacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY estrategia_comunicacion (est_com_id, est_com_observacion, pro_pep_id) FROM stdin;
2	\N	12
3	\N	12
\.


--
-- Data for Name: etapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY etapa (eta_id, eta_nombre) FROM stdin;
1	Etapa 1
2	Etapa 2
3	Etapa 3
4	Etapa 4
\.


--
-- Data for Name: facilitador; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY facilitador (fac_id, fac_nombre, fac_apellido, cap_id, fac_email, fac_telefono) FROM stdin;
2	José Francisco 	Aparicio Soto	78	franapar@hotmail.com	
3	Ana María 	Alfara de Rodas	78	amalfa_o4@hotmail.com	
5	Ana María	Alfaro de Rodas	80	amalfa_04@hotmail.com	
6	Ana Maria	Alfaro de Rodas	83	codein.sv@gmail.com	2229-0534
7	Ana Maria	Alfaro	87	amalfa_04@hotmail.com	
8	José Francisco	Aparicio Soto	97	codein.sv@gmail.com	
9	José Francisco 	Aparicio Soto	98	codein.sv@gmail.com	
\.


--
-- Data for Name: fcdp; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fcdp (fcdp_id, fcdp_fecha, fcdp_tematica, fcdp_ultima, fcdp_observaciones, fcdp_archivo) FROM stdin;
1	2013-01-12	Primera reunion	N	no hay	documentos/fcdp/proyecto_pep71.docx
\.


--
-- Data for Name: fecha_recepcion_observacion_din; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fecha_recepcion_observacion_din (fec_correlativo, pro_id, fec_rec_din, fec_obs_din) FROM stdin;
\.


--
-- Data for Name: fuente_financiamiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fuente_financiamiento (fue_fin_id, fue_fin_nombre, fue_fin_monto, fue_fin_descripcion, por_pro_id) FROM stdin;
\.


--
-- Data for Name: fuente_primaria; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fuente_primaria (fue_pri_id, inv_inf_id, fue_pri_nombre, fue_pri_institucion, fue_pri_cargo, fue_pri_telefono, fue_pri_tipo_info) FROM stdin;
\.


--
-- Data for Name: fuente_secundaria; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fuente_secundaria (fue_sec_id, inv_inf_id, fue_sec_nombre, fue_sec_fuente, fue_sec_disponible_en, fue_sec_anio) FROM stdin;
\.


--
-- Data for Name: gescon_participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gescon_participante (par_id, gescon_id, par_nombre, par_apellidos, par_institucion, par_cargo, par_telefono) FROM stdin;
\.


--
-- Data for Name: gesrie_participan; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gesrie_participan (par_id, gesrie_id, par_nombre, par_institucion, par_cargo) FROM stdin;
\.


--
-- Data for Name: gestion_conocimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gestion_conocimiento (gescon_id, mun_id, gescon_fecha, gescon_tematica, gescon_observaciones) FROM stdin;
\.


--
-- Data for Name: gestion_riesgo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gestion_riesgo (gesrie_id, mun_id, gesrie_fecha_orden, gesrie_fecha_acta, gesrie_fecha_diagnostico, gesrie_fecha_socializacion, gesrie_fecha_aprobacion, gesrie_fecha_inicio, gesrie_fecha_aprob_comite, gesrie_fecha_acuerdo, gesrie_fecha_presentacion, gesrie_fecha_seguimiento, gesrie_observaciones) FROM stdin;
\.


--
-- Data for Name: grupo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo (gru_id, gru_numero) FROM stdin;
\.


--
-- Data for Name: grupo_apoyo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_apoyo (gru_apo_id, gru_apo_fecha, gru_apo_c3, gru_apo_c4, gru_apo_observacion, pro_pep_id, gru_apo_lugar) FROM stdin;
3	\N	\N	\N	\N	6	\N
4	2013-01-17	t	t		26	Alcaldía Municipal
5	\N	\N	\N	\N	27	\N
6	2012-12-17	t	t	La elección del ELA se llevo a cabo el día de la Declaración de Interés Público, siendo los asistentes los mismos de el apartado anterior.	29	Casa de la Juventud del Municipio.
7	2012-12-08	t	t		28	Sala de Reuniones de Alcaldia Municipal
8	\N	t	t	Ninguna	30	
\.


--
-- Data for Name: grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_gestor (gru_ges_id, gru_ges_lugar, gru_ges_observacion, gru_ges_acuerdo, pro_pep_id, gru_ges_fecha) FROM stdin;
3	\N	\N	\N	4	\N
4	\N	\N	\N	29	\N
5			\N	26	\N
6	\N	\N	\N	28	\N
7	\N	\N	\N	27	\N
8	\N	\N	\N	30	\N
\.


--
-- Data for Name: indicador; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicador (ind_id, com_id, ind_nombre, ind_tipo) FROM stdin;
\.


--
-- Data for Name: indicadores_desempeno1; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno1 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_pascir, ind_des_grupo1_deucorpla, ind_des_grupo1_int, ind_des_grupo1_ahoope, ind_des_grupo1_intdeu, ind_des_grupo1_total, ind_des_grupo2_deumuntot, ind_des_grupo2_ingopeper, ind_des_grupo2_total, ind_des_observaciones) FROM stdin;
\.


--
-- Data for Name: indicadores_desempeno2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno2 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_ingtotpre, ind_des_grupo1_gastotdev, ind_des_grupo1_total, ind_des_grupo2_ingprodev, ind_des_grupo2_totingdev, ind_des_grupo2_total, ind_des_grupo3_moningpro, ind_des_grupo3_totingdev, ind_des_grupo3_total, ind_des_grupo4_moningpro, ind_des_grupo4_moningpre, ind_des_grupo4_total, ind_des_grupo5_totingtas, ind_des_grupo5_totingpro, ind_des_grupo5_total, ind_des_grupo6_totingimp, ind_des_grupo6_totingpro, ind_des_grupo6_total, ind_des_observaciones) FROM stdin;
\.


--
-- Data for Name: indicadores_desempeno3; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno3 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_ingcorpre, ind_des_grupo1_gascordev, ind_des_grupo1_total, ind_des_grupo2_gascordev, ind_des_grupo2_totgascor, ind_des_grupo2_total, ind_des_grupo3_ejegasinv, ind_des_grupo3_totgasinv, ind_des_grupo3_total, ind_des_grupo4_gascordev, ind_des_grupo4_ingcorper, ind_des_grupo4_total, ind_des_grupo5_armderdeu, ind_des_grupo5_egrtotdev, ind_des_grupo5_total, ind_des_grupo6_gascordev, ind_des_grupo6_egrtotdev, ind_des_grupo6_total, ind_des_grupo7_gastotinv, ind_des_grupo7_egrtotdev, ind_des_grupo7_total, ind_des_grupo8_gasinvinf, ind_des_grupo8_ejegastot, ind_des_grupo8_total, ind_des_grupo9_ingcorper, ind_des_grupo9_gascordev, ind_des_grupo9_total, ind_des_grupo10_gastotper, ind_des_grupo10_ingcorper, ind_des_grupo10_total, ind_des_grupo11_ingproper, ind_des_grupo11_gascordev, ind_des_grupo11_total, ind_des_grupo12_valdefser, ind_des_grupo12_gastotser, ind_des_grupo12_total, ind_des_observaciones) FROM stdin;
\.


--
-- Data for Name: informe_preliminar; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY informe_preliminar (inf_pre_id, inf_pre_fecha_borrador, inf_pre_fecha_observacion, inf_pre_aceptacion, inf_pre_firmam, inf_pre_firmai, inf_pre_firmau, inf_pre_observacion, pro_pep_id, inf_pre_ruta_archivo, inf_pre_aceptada) FROM stdin;
11	\N	\N	\N	\N	\N	\N	\N	25	\N	\N
12	\N	\N	\N	\N	\N	\N	\N	20	\N	\N
\.


--
-- Data for Name: institucion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY institucion (ins_id, ins_nombre) FROM stdin;
2	Empresa Consultora
3	ISDEM
4	FISDL
5	UEP
6	Otro
1	Concejo Municipal
\.


--
-- Data for Name: integracion_instancia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integracion_instancia (int_ins_id, int_ins_fecha, int_ins_lugar, int_ins_observacion, int_ins_plan_trabajo, int_ins_reglamento_int, int_ins_ruta_archivo, pro_pep_id) FROM stdin;
3	\N	\N	\N	\N	\N	\N	26
\.


--
-- Data for Name: integrante_asociatividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) FROM stdin;
\.


--
-- Data for Name: inventario_informacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY inventario_informacion (inv_inf_id, inv_inf_observacion, pro_pep_id) FROM stdin;
3	\N	12
4	\N	3
5	\N	19
6	\N	26
7	\N	27
8	\N	29
9	\N	28
10	\N	30
\.


--
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY login_attempts (id, ip_address, login, "time") FROM stdin;
8	127.0.0.1	ffff	\N
9	127.0.0.1	fff	\N
10	127.0.0.1	ffff	\N
28	::1	cfuentes_86	\N
29	::1	cfuentes_86	\N
30	::1	cfuentes_86	\N
31	190.120.10.42	cu040058	\N
32	190.120.10.42	cu040058	\N
33	168.243.8.13	cfuentes_86	\N
34	168.243.8.13	desentralizacion	\N
35	168.243.8.13	descentralizacion	\N
36	168.243.8.13	descentralizacion	\N
38	190.150.39.73	Ch03025	\N
39	190.150.39.73	Ch03025	\N
40	190.62.205.230	1322	\N
41	190.62.205.230	13226	\N
42	190.62.205.230	13226	\N
43	190.62.205.230	13232	\N
44	190.62.205.230	12220	\N
46	190.87.3.236	Financiera	\N
47	168.243.8.13	descentralizacion	\N
48	190.62.74.136	un07124	\N
52	190.62.8.149	un07124	\N
53	190.62.8.149	un07124	\N
54	190.62.8.149	un07124	\N
55	190.62.8.149	un07124	\N
57	10.0.0.1	nuriarivas	\N
\.


--
-- Data for Name: manuales_administrativos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY manuales_administrativos (man_adm_id, mun_id, man_adm_nombre, man_adm_elaboracion, man_adm_vigente, man_adm_aprobacion, man_adm_utilizado, man_adm_comentario) FROM stdin;
\.


--
-- Data for Name: mapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY mapa (map_id, map_nombre, map_descripcion, tip_map_id) FROM stdin;
\.


--
-- Data for Name: monto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY monto_proyeccion (mon_pro_id, mon_pro_nombre, mon_pro_dispo_financiera, mon_pro_ingresos, mon_pro_anio, pro_ing_id, mon_pro_idnombre) FROM stdin;
\.


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio (mun_id, dep_id, mun_nombre, mun_presupuesto, cons_id, mun_com_observacion, mun_act_ruta_archivo, mun_pro_ruta_archivo, mun_fseleccion, ela_pro_id, rev_inf_id, rub_id, per_pro_id, seg_id, gru_id, grup_id_pep) FROM stdin;
7	1	Apaneca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	1	San Francisco Menendez	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	1	San Lorenzo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	1	San Pedro Puxtla	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
11	1	Tacuba	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
12	1	Turin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
13	2	Cinquera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
14	2	Villa Dolores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
15	2	Guacotecti	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
16	2	Ilobasco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
17	2	Jutiapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
18	2	San Isidro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	2	Sensuntepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
20	2	Ciudad de Tejutepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
21	2	Victoria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
24	3	Azacualpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
26	3	Citala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
27	3	Comalapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
28	3	Concepcion Quezaltepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
29	3	Dulce Nombre de Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
30	3	El Carrizal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
31	3	El Paraiso	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
32	3	La Laguna	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
33	3	La Palma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
34	3	La Reina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
35	3	Las Vueltas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
36	3	Nombre de Jesus	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
37	3	Nueva Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
38	3	Nueva Trinidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
39	3	Ojos de Agua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
40	3	Potonico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
41	3	San Antonio de la Cruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
42	3	San Antonio Los Ranchos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
43	3	San Fernando	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
44	3	San Francisco Lempa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
45	3	San Francisco Morazan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
46	3	San Ignacio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
47	3	San Isidro Labrador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
48	3	San Jose Cancasque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
49	3	San Jose Las Flores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
50	3	San Luis del Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
51	3	San Miguel de Mercedes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
52	3	San Rafael	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
53	3	Santa Rita	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
54	3	Tejutla	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
55	4	Candelaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
56	4	Cojutepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
57	4	El Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	4	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
59	4	Monte San Juan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
60	4	Oratorio de Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
61	4	San Bartolome Perulapia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
62	4	San Cristobal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
63	4	San Jose Guayabal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
64	4	San Pedro Perulapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
65	4	San Rafael Cedros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
66	4	San Ramon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
67	4	Santa Cruz Analquito	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
68	4	Santa Cruz Michapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
69	4	Suchitoto	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
70	4	Tenancingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
71	5	Antiguo Cuscatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
72	5	Chiltiupan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
74	5	Colon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
75	5	Comasagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
76	5	Huizucar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
77	5	Jayaque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
78	5	Jicalapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
79	5	La Libertad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
80	5	Nueva San Salvador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
81	5	Nuevo Cuscatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
82	5	Opico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
83	5	Quezaltepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
84	5	Sacacoyo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
85	5	San Jose Villanueva	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
86	5	San Matias	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
87	5	San Pablo Tacachico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
88	5	Talnique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
89	5	Tamanique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
90	5	Teotepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
91	5	Tepecoyo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
92	5	Zaragoza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
94	6	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
95	6	Jerusalen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
96	6	Mercedes La Ceiba	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
97	6	Olocuilta	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
98	6	Paraiso de Osorio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
99	6	San Antonio Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
100	6	San Emigdio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
101	6	San Francisco Chinameca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
102	6	San Juan Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
103	6	San Juan Talpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
104	6	San Juan Tepezontes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
105	6	San Luis La Herradura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
106	6	San Luis Talpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
107	6	San Miguel Tepezontes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
108	6	San Pedro Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
109	6	San Pedro Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
110	6	San Rafael Obrajuelo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
111	6	Santa Maria Ostuma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
112	6	Santiago Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
113	6	Tapalhuaca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
114	6	Zacatecoluca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
115	7	Anamoros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
116	7	Bolivar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
117	7	Concepcion de Oriente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
118	7	Conchagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
119	7	El Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
120	7	El Sauce	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
121	7	Intipuca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
122	7	La Union	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
123	7	Lislique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
124	7	Meanguera del Golfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
125	7	Nueva Esparta	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
126	7	Pasaquina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
127	7	Poloros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
128	7	San Alejo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
130	7	Santa Rosa de Lima	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
131	7	Yayantique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
132	7	Yucuayquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
133	8	Arambala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
134	8	Cacaopera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
135	8	Chilanga	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
136	8	Corinto	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
137	8	Delicias de Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
138	8	El Divisadero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
139	8	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
140	8	Gualococti	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
141	8	Guatajiagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
142	8	Joateca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
143	8	Jocoaitique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
144	8	Jocoro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
145	8	Lolotiquillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
146	8	Meanguera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
147	8	Osicala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
148	8	Perquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
149	8	San Carlos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
150	8	San Fernando	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
151	8	San Francisco Gotera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
152	8	San Isidro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	1	Atiquizaya	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	1	Guaymango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	1	El Refugio	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
22	3	Agua Caliente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
25	3	Chalatenango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	3	Arcatao	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
153	8	San Simon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
154	8	Sensembra	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
155	8	Sociedad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
156	8	Torola	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
157	8	Yamabal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
158	8	Yoloaiquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
159	9	Carolina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
160	9	Chapeltique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
161	9	Chinameca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
162	9	Chirilagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
163	9	Ciudad Barrios	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
164	9	Comacaran	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
165	9	El Transito	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
166	9	Lolotique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
167	9	Moncagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
168	9	Nueva Guadalupe	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
169	9	Nuevo Eden de San Juan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
170	9	Quelepa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
171	9	San Antonio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
172	9	San Gerardo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
173	9	San Jorge	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
174	9	San Luis de la Reina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
175	9	San Miguel	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
176	9	San Rafael	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
177	9	Sesori	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
178	9	Uluazapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
180	10	Apopa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
181	10	Ayutuxtepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
182	10	Cuscatancingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
183	10	Delgado	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
184	10	El Paisnal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
185	10	Guazapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
186	10	Ilopango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
187	10	Mejicanos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
188	10	Nejapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
189	10	Panchimalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
190	10	Rosario de Mora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
191	10	San Marcos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
192	10	San Martin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
193	10	San Salvador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
194	10	Santiago Texacuangos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
195	10	Santo Tomas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
196	10	Soyapango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
197	10	Tonacatepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
198	11	Apastepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
199	11	Guadalupe	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
200	11	San Cayetano Istepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
201	11	San Esteban Catarina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
202	11	San Ildefonso	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
203	11	San Lorenzo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
204	11	San Sebastian	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
205	11	Santa Clara	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
206	11	Santo Domingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
207	11	San Vicente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
208	11	Tecoluca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
209	11	Tepetitan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
210	11	Verapaz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
211	12	Candelaria de la Frontera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
212	12	Chalchuapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
213	12	Coatepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
214	12	El Congo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
215	12	El Porvenir	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
216	12	Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
217	12	Metapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
218	12	San Antonio Pajonal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
219	12	San Sebastian Salitrillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
220	12	Santa Ana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
221	12	Santa Rosa Guachipilin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
222	12	Santiago de la Frontera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
223	12	Texistepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
225	13	Armenia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
226	13	Caluco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
227	13	Cuisnahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
228	13	Izalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
229	13	Juayua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
230	13	Nahuizalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
231	13	Nahulingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
232	13	Salcoatitan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
233	13	San Antonio del Monte	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
234	13	San Julian	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
235	13	Santa Catarina Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
236	13	Santa Isabel Ishuatan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
237	13	Santo Domingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
238	13	Sonsonate	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
239	13	Sonzacate	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	14	Alegria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
241	14	Berlin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
242	14	California	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
243	14	Concepcion Batres	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
244	14	El Triunfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
245	14	Ereguayquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
246	14	Estanzuelas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
247	14	Jiquilisco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
248	14	Jucuapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
249	14	Jucuaran	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
250	14	Mercedes Umaña	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
251	14	Nueva Granada	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
252	14	Ozatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
253	14	Puerto El Triunfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
254	14	San Agustin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
255	14	San Buenaventura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
256	14	San Dionisio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
257	14	San Francisco Javier	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
258	14	Santa Elena	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
259	14	Santa Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
260	14	Santiago de Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
261	14	Tecapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
262	14	Usulutan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
129	7	San José la Fuente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	1	Concepcion de Ataco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
179	10	Aguilares	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
93	6	Cuyultitan	\N	\N	\N	\N	\N	\N	1	1	\N	\N	\N	\N	\N
2	1	Jujutla	\N	1	\N	\N	\N	\N	3	2	\N	\N	\N	\N	\N
224	13	Acajutla	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
73	5	Ciudad Arce	\N	\N	\N	\N	\N	\N	\N	\N	2	\N	\N	\N	\N
302	16	Municipio 2	15000.00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	9	\N
1	1	Ahuachapan	\N	1	\N	\N	\N	\N	2	\N	\N	2	\N	\N	\N
303	15	Municipio 3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	9	\N
304	16	Municipio 4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	9	\N
300	9	Nuevo Municipio GDR	40000.60	\N	\N	\N	\N	\N	4	3	1	1	1	9	\N
301	15	Municipio 1	10000.00	\N	\N	\N	\N	\N	5	4	3	3	2	9	\N
\.


--
-- Data for Name: municipio_componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio_componente (com_id, mun_id, mun_com_asignacion) FROM stdin;
\.


--
-- Data for Name: nombre_fecha_aprobacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nombre_fecha_aprobacion (nom_fec_apr_id, nom_fec_apro_nombre) FROM stdin;
1	Fecha de entrega de productos
2	Fecha de observaciones para ETS
3	Fecha de observaciones superadas para consultora
4	Fecha de visto bueno para ETS
5	Fecha de acta de recepción
\.


--
-- Data for Name: nombre_rubro; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nombre_rubro (nom_rub_id, nom_rub_nombre) FROM stdin;
1	a. Planes y mapas de gestión de riesgos
2	b.  Fortalecimiento de la organización municipal y comunitaria para la gestión de riesgos
3	c. Equipamento básico para la prevención y atención de emergencias
4	d. Mejoramiento y habilitación de albergues municipales
6	f. Obras y actividades de mitigación
5	e. Compra de equipo de transporte y maquinaria para la gestión de riesgos
\.


--
-- Data for Name: nombrefecha_procesoetapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nombrefecha_procesoetapa (pro_eta_id, nom_fec_apr_id, nomfec_proeta_valor) FROM stdin;
20	5	\N
20	4	\N
20	3	\N
20	2	\N
20	1	\N
22	1	\N
22	2	\N
22	3	\N
22	4	\N
22	5	\N
23	1	\N
23	2	\N
23	3	\N
23	4	\N
23	5	\N
24	1	\N
24	2	\N
24	3	\N
24	4	\N
24	5	\N
25	1	\N
25	2	\N
25	3	\N
25	4	\N
25	5	\N
26	1	\N
26	2	\N
26	3	\N
26	4	\N
26	5	\N
17	4	\N
17	3	\N
17	2	\N
17	1	\N
17	5	\N
18	1	\N
19	1	\N
21	1	\N
21	2	\N
21	3	\N
21	4	\N
21	5	\N
18	2	\N
19	2	\N
18	3	\N
19	3	\N
18	4	\N
19	4	\N
18	5	\N
19	5	\N
27	1	\N
27	2	\N
27	3	\N
27	4	\N
27	5	\N
28	1	\N
28	2	\N
28	3	\N
28	4	\N
28	5	\N
29	1	\N
29	2	\N
29	3	\N
29	4	\N
29	5	\N
30	1	\N
30	2	\N
30	3	\N
30	4	\N
30	5	\N
31	1	\N
31	2	\N
31	3	\N
31	4	\N
31	5	\N
\.


--
-- Data for Name: nota; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nota (not_id, not_correlativo, not_fnota, not_observacion, rub_id) FROM stdin;
1	1	2013-03-15	Observación	3
\.


--
-- Data for Name: obra; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY obra (obr_id, obr_nombre) FROM stdin;
1	a. Construcción o reconstrucción de muros de contención
2	b. Construcción o reconstrucción de bordas en ríos o quebradas
3	c. Limpieza de ríos
4	d. Rehabilitación y/o reconstrucción de drenajes de aguas lluvias
5	e. Rehabilitación o reconstrucción de caminos vecinales
6	f. Rehabilitación o reconstrucción de infraestructura socieconómica
7	g. Rehabilitación o reconstrucción de sistemas de agua potable
8	h. Planes de resasentamiento de comunidades viviendo en zonas vulnerables
\.


--
-- Data for Name: opcion_sistema; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id, opc_sis_orden) FROM stdin;
1	Componente 1	componente1/componente1	\N	1
2	Componente 2	componente2/componente2	\N	2
6	Etapa 1	componente2/comp23_E1/	5	1
7	Reuniones	componente2/comp23_E1/muestraReuniones	6	1
8	Acuerdo Municipal	componente2/comp23_E1/acuerdoMunicipal	6	2
11	Declaración de Interés	componente2/comp23_E1/declaracionInteres	6	3
12	Equipo Local de Apoyo	componente2/comp23_E1/equipoApoyo	6	4
13	Capacitación Equipo Local	componente2/comp23_E1/capacitacionEquipoApoyo	6	5
9	Componente 2.2.	componente2/comp22/	\N	3
5	Componente 2.3.	componente2/comp23/	\N	4
3	Componente 3	componente3/componente3	\N	5
4	Componente 4	componente4/componente4	\N	6
16	Inventario de Información	componente2/comp23_E1/inventarioInformacion	6	6
17	Consultoras	consultor/consultoraC	\N	4
19	Gestión Consultoras	consultor/consultoraC	17	1
25	Roles	admin/administracion/rolesSistema	24	1
24	Sistema	admin/administracion	\N	3
27	Opciones Sistema	admin/administracion/opcionesSistema	24	2
20	Gestión Coordinador	consultor/consultoraC/coordinadores	17	2
29	Etapa 2	componente2/comp23_E2	5	2
30	Reuniones	componente2/comp23_E2/muestraReuniones	29	1
31	Asociatividad Municipio	componente2/comp23_E2/muestraAsociatividades	29	2
32	Grupo Gestor	componente2/comp23_E2/grupoGestor	29	3
33	Capacitación Grupo Gestor	componente2/comp23_E2/capacitacionGrupoGestor	29	4
34	Definición Temas	componente2/comp23_E2/definicionTema	29	5
35	Priorización Pequeños Proyectos	componente2/comp23_E2/priorizacion	29	6
37	Etapa 3	componente2/comp23_E3	5	3
39	Reuniones	/componente2/comp23_E3/muestraReuniones	37	1
40	Etapa 4	componente2/comp23_E4	5	4
41	Acuerdo Municipal	componente2/comp23_E4/acuerdoMunicipal	40	1
42	Portafolio Proyectos	componente2/comp23_E3/mostrarPortafolioProyecto	37	2
43	Integración de Instancias	componente2/comp23_E4/integracionInstancia	40	2
44	Capacitación Miembros Instancia	componente2/comp23_E4/capacitacionMiembrosInstancia	40	3
10	Registro de Usuarios	auth/register	24	3
45	Componente 3	inicio/index	\N	\N
46	Diagnostico Sectorial y Analisis Trans	componente3/componente3/diag_sect_anal_tran	45	\N
47	Concenso y Discucion de Politicas	componente3/componente3/form_conc_disc_poli	45	\N
49	Divulgacion	componente3/componente3/divu	45	\N
50	Documentos de Descentralizacion	componente3/componente3/docs_desc	45	\N
51	Proyecciones	componente2/comp23_E3/mostrarProyeccionIngresos	37	3
52	Plan Inversión	componente2/comp23_E3/planInversion	37	4
53	Estrategia Comunicación	componente2/comp23_E3/estrategiaComunicacion	37	5
55	Adquisición y Contratación	componente2/procesoAdministrativo/adquisicionContrataciones	54	1
56	Evaluación	componente2/procesoAdministrativo/evaluacionExpresionInteres	54	2
57	Selección Consultora	componente2/procesoAdministrativo/seleccionConsultoras	54	3
58	Propuesta Técnica	componente2/procesoAdministrativo/propuestaTecnica	54	4
59	Recepción y Aprobación	componente2/procesoAdministrativo/recepcionAprobacionProductos	54	5
62	Criterios Manual Operativo	componente2/comp23_E0/gestionCriterios	61	1
22	Proyecto Pep	componente2/proyectoPep	17	2
65	Comité Interinstitucional	componente2/comp23_E0/comiteInterinstitucional	61	5
61	Etapa 0	componente2/comp23_E0/gestionCriterios	\N	1
60	Revisión de productos	componente2/comp23/revisionProducto	\N	3
54	Proceso Administrativo PEP	componente2/procesoAdministrativo	\N	2
48	Elaboracion de Plan Piloto	componente3/componente3/elab_plan_imp	45	\N
63	Solicitud Asistencia	componente2/comp23_E0/gestionsolicitudAsistencia	61	2
64	Plan de trabajo	componente2/comp23_E0/planTrabajoConsultora	60	1
66	Aporte Municipal	componente2/comp23_E0/registroAporteMunicipal	60	2
23	Informe Condiciones Previas	componente2/comp23_E1/InformePreliminar	60	3
36	Diagnóstico	componente2/comp23_E2/diagnostico	60	4
38	Cumplimientos Mínimos PEP	componente2/comp23_E3/cumplimientosMinimos	60	5
95	Integración Grupos	componente2/comp23_E0/integracionDeGrupos	61	3
96	Componente3	inicio/index	\N	\N
97	Diagnósticos Sectoriales y Análisis	componente3/componente3/diag_sect_anal_tran_ssdt	96	1
98	Formación Consenso y Discusión Políticas	componente3/componente3/form_conc_disc_poli_ssdt	96	2
99	Elaboración de Plan Piloto	componente3/componente3/elab_plan_imp_ssdt	96	3
100	Divulgación	componente3/componente3/divu_ssdt	96	4
101	Documentos Descentralización	componente3/componente3/docs_desc_ssdt	96	5
104	Revisión Información	componente2/comp25_fase1/revisionInformacion	102	2
103	Elaboración Proyecto	componente2/comp25/elaboracionProyecto	102	1
102	Subcomponente 2.5	componente2/comp25/	\N	1
105	Asignacion Financiera por Componente	inicio/index	\N	\N
106	Agregar Subcomponente	gestion_componentes/financiera/agregar_subcomp	105	1
107	Agregar Macroactividad	gestion_componentes/financiera/agregar_macroact	105	2
108	Agregar Actividad	gestion_componentes/financiera/agregar_act	105	3
109	Agregar Subactividad	gestion_componentes/financiera/agregar_subact	105	4
110	Registrar Transferencias	gestion_componentes/financiera/registrar_transferencias	105	5
111	Registrar movimientos de Subactividades	gestion_componentes/financiera/registrar_mov_subact	105	6
112	Rubros Elegibles	componente2/comp25_fase1/rubrosElegibles	102	3
114	Rubros Elegibles Aplica	componente2/comp25_fase1/rubrosElegiblesAplica	102	5
115	Seguimiento	componente2/comp25_seguimiento/seguimiento	102	6
113	Aprobación Perfil	componente2/comp25_fase1/aprobacionPerfil	102	4
67	Componente 2.4	componente2/comp24/	\N	5
74	Solicitud de Ayuda	componente2/comp24_E0/solicitudAyuda	68	1
75	Acuerdo Municipal	componente2/comp24_E0/acuerdoMunicipal	68	2
78	Indicadores de Desempleño Administrativo	componente2/comp24_E0/E	68	5
79	Indicadores de Desempeño Administrativo	componente2/comp24_E0/F	68	6
80	Perfil de Municipio	componente2/comp24_E0/perfilMunicipio	68	7
81	Empleados Municipales	componente2/comp24_E0/H	68	8
82	Manuales Administrativos	componente2/comp24_E0/I	68	9
85	Aprobacion e Implementacion	componente2/comp24_E3/aprobacionImplementacion	71	1
86	Aprobacion de Perfil y TDR	componente2/comp24_E3/elaboracionPerfilyTDR	71	2
87	Recepcion de productos del plan	componente2/comp24_E3/recepcionProductosPlan	71	3
88	Informe de Resultados	componente2/comp24_E3/informeResultados	71	4
89	Gestion de Conocimiento	componente2/comp24_E4/gestionConocimiento	72	1
90	Capacitación al Concejo Municipal	componente2/comp24_E4/capacitacionConcejoMunicipal	72	2
91	Gestion de Riesgos	componente2/comp24_Final/gestionRiesgos	73	1
68	Etapa 0	componente2/comp24/	67	1
69	Etapa 1	componente2/comp24/	67	2
70	Etapa 2	componente2/comp24/	67	3
71	Etapa 3	componente2/comp24/	67	4
72	Etapa 4	componente2/comp24/	67	5
73	Final (omitida)	componente2/comp24/	67	7
83	Revisión y Aprobación de Productos	componente2/comp24_E1/	69	1
84	Revisión y Aprobación de Productos	componente2/comp24_E2/	70	1
76	Solicitud de Asistencia Técnica	componente2/comp24_E0/solicitudAsistenciaTecnica	68	3
77	Comportamiento de los Ingresos	componente2/comp24_E0/indicadoresDesempenoAdmin	68	4
116	Registro y Preselección	componente2/comp22/solicitudInscripcion	9	1
117	Asignación de Participantes	componente2/comp22/asignacionParticipantes	9	3
118	Registro de Procesos de Formación	componente2/comp22/registroCapacitaciones	9	3
119	Resultados Finales	componente2/comp22/resultadosParticipantes	9	4
121	Ayuda de Memorias 	uep/ayudaMemorias/	120	1
122	Registro de Actividades 	uep/registroActividades	120	2
123	Perfiles de Eventos	ues/perfilesEventos	120	3
120	Componente UEP	uep/	\N	1
\.


--
-- Data for Name: participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo, int_ins_id, ela_pro_id, seg_id) FROM stdin;
3	\N	19	1	\N	\N	Silvia Liceth 	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	\N	20	1	\N	\N	Oscar 	Sandoval Flores	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	\N	20	1	\N	\N	Walter Elí	Rodriguez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	\N	20	1	\N	\N	Nelly Yaneth	Sandoval	M	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	\N	20	1	\N	\N	Teodora 	Flores	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	\N	20	6	\N	\N	Elsa Nohemy 	Corleto	M	Lider	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	\N	\N	\N	\N	\N	Oscar Sandoval	Flores	H	Concejal	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	\N	\N	\N	\N	\N	Walter Eli	Rodríguez 	H	Concejal	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
11	\N	\N	\N	\N	\N	Nelly Yaneth 	Sandoval	M	Concejal	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
12	\N	\N	\N	\N	\N	Teodora	Flores	M	Concejal	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
13	\N	\N	\N	\N	\N	Elsa Nohemy	Corleto	M	Encargada de Clínica Municipal	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
14	\N	\N	\N	\N	\N	Eva Margarita	Aguilar	M	Lider Comunitaria	\N	\N	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N
15	\N	21	6	\N	\N	Jose Alfredo	Castro Alas	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
17	\N	21	6	\N	\N	Adan 	Murcia	H	Cindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
16	\N	21	6	\N	\N	Ivan 	Sandoval	H	Vicepresidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
18	\N	21	6	\N	\N	Mario Antonio	Flores	H	Beneficiario 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	\N	21	6	\N	\N	Patricia Lorena	Colindrez	M	Beneficiaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
20	\N	21	6	\N	\N	Maria Elva	Colindrez	M	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
21	\N	21	6	\N	\N	Vilma Estela	Flores	M	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
22	\N	21	6	\N	\N	Vilma Esperanza 	Molina	M	Beneficiaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	\N	21	6	\N	\N	Rosa	De Castaneda	M	Cindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
24	\N	21	6	\N	\N	Rigoberto 	Ochoa Linarez	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
25	\N	21	6	\N	\N	Neftali Antonio	Argeta	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
27	\N	21	6	\N	\N	Mario Mauricio	Sanchez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
28	\N	21	6	\N	\N	Julio de Jesus	Linarez	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
29	\N	21	6	\N	\N	Mercedes Antonio	Sandoval	H	Colaborador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
30	\N	21	6	\N	\N	Arturo	Zepeda	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
31	\N	21	6	\N	\N	Jorge	Corleto	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
32	\N	21	6	\N	\N	Blanca Rosa	Valles	M	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
33	\N	21	6	\N	\N	Maria Marta	Vasquez	M	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
34	\N	21	6	\N	\N	Claudio	Monzola Zaldaña	H	Secretario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
35	\N	21	6	\N	\N	Elsa Noemi	Corleto	M	Promotora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
36	\N	21	6	\N	\N	Miguel A.	Zelada Miron	H	Jefe de Puesto PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
37	\N	21	6	\N	\N	Silvia 	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
38	\N	21	6	\N	\N	Pedro A.	Tobar Vega	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
39	\N	21	6	\N	\N	Walter Ely	Rodriguez	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
40	\N	21	6	\N	\N	Claudia IRIZ	Diaz	M	Consultora AV	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
41	\N	21	6	\N	\N	Dimas de Jesus	Sanchez	H	Beneficiario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
42	\N	21	6	\N	\N	Arturo	Zepeda	H	Tesorero ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
43	\N	21	6	\N	\N	Mario Mauricio	Sanchez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
44	\N	21	6	\N	\N	Vilma Estela	Flores	M	Miembro de comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
45	\N	21	6	\N	\N	Blanca Rosa	Valle	M	Miembro de comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
46	\N	23	6	\N	\N	Sonia Esperanza	Perez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
47	\N	23	6	\N	\N	Virginia del Carmen	Gonzalez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
48	\N	23	6	\N	\N	Imelda Rosa	Martinez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
49	\N	23	6	\N	\N	Juana de Jesus	Chavez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
50	\N	23	6	\N	\N	Emigdio	Castaneda	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
51	\N	23	6	\N	\N	Juan 	Salguero	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
52	\N	23	6	\N	\N	Mauricio	Salguero	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
53	\N	23	6	\N	\N	Juan Carlos	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
54	\N	23	6	\N	\N	David	Aguilar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
55	\N	23	6	\N	\N	Juan Carlos	Regalado Ramos	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
56	\N	23	6	\N	\N	Mario Ernesto	Alvanez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
57	\N	23	6	\N	\N	Israel Antonio	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	\N	23	6	\N	\N	Elias de Jesus	Soto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
59	\N	23	6	\N	\N	Wilber	Tovar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
60	\N	23	6	\N	\N	Miguel Angel	Martinez Arriola	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
61	\N	23	6	\N	\N	Yudis Antonio	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
62	\N	23	6	\N	\N	Reina Lissette	Perez Medina	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
63	\N	23	6	\N	\N	Hilda Yaneth	Gutierrez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
64	\N	23	6	\N	\N	Marta Lidia	De Gutierrez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
65	\N	23	6	\N	\N	Dina Noemy	Santeliz	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
66	\N	23	6	\N	\N	Alicia	Soto	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
67	\N	23	6	\N	\N	Margarita	Rodriguez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
68	\N	23	6	\N	\N	Katerine 	Leiva	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
69	\N	23	6	\N	\N	Cristina	Duarte	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
70	\N	23	6	\N	\N	Carolina del Carmen	Castaneda	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
71	\N	23	6	\N	\N	Rosalina	Martinez de Rodriguez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
72	\N	23	6	\N	\N	Ana Julia	Leiva	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
73	\N	23	6	\N	\N	Yuri Vanesa	Guevara Garve	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
74	\N	23	6	\N	\N	Samary Antonia	Rodriguez G.	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
75	\N	23	6	\N	\N	Maria Vilma	Morales	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
76	\N	23	6	\N	\N	Rosa Margarita	Salguero	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
77	\N	23	6	\N	\N	Eduardo Antonio	Mancia	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
78	\N	23	6	\N	\N	Jesus Manuel 	Carranza	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
79	\N	23	6	\N	\N	Manuel Vicente	Rodriguez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
80	\N	23	6	\N	\N	Dina Elizabet	Moreno de Menendez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
81	\N	23	6	\N	\N	Rigoberto 	Menendez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
82	\N	23	6	\N	\N	Santos Elsa	Duarte	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
83	\N	23	6	\N	\N	Enilia	Guerra Ramos	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
84	\N	23	6	\N	\N	Jose Anibal	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
85	\N	23	6	\N	\N	Xavier	Linarez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
86	\N	23	6	\N	\N	Balerio	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
87	\N	23	6	\N	\N	Pedro	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
88	\N	23	6	\N	\N	Oscar Main 	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
89	\N	23	6	\N	\N	Jose Rafael 	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
90	\N	23	6	\N	\N	Julio 	Rodriguez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
91	\N	23	6	\N	\N	Walter	Rodriguez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
92	\N	23	6	\N	\N	Juana	Gonzalez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
93	\N	23	6	\N	\N	Sandra Asusena	Aguilar	M	Promotora PNA	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
94	\N	23	6	\N	\N	Esperanza 	Rodriguez	M	Secretaria ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
95	\N	23	6	\N	\N	Silvia	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
96	\N	23	6	\N	\N	Emperatriz	Romero	M	Delegada Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
97	\N	23	6	\N	\N	Walter Eli	Rodriguez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
98	\N	23	6	\N	\N	Javier	Linarez	H	Comite de Festejo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
99	\N	23	6	\N	\N	Oscar 	Perez	H	Lider Comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
100	\N	23	6	\N	\N	Esperanza 	Rodriguez	M	Secretaria ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
101	\N	23	6	\N	\N	Alberto	Castaneda	H	Tesorero ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
102	\N	23	6	\N	\N	Carlos	Perez	H	Vicepresidente de la AC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
103	\N	23	6	\N	\N	Juana	Gonzalez	M	Lider de la Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
104	\N	24	6	\N	\N	Sandra E.	Galdamez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
105	\N	24	6	\N	\N	Ramon	Soto Najera	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
106	\N	24	6	\N	\N	Pablo	Godoy	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
107	\N	24	6	\N	\N	Francisco	Chinchilla	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
108	\N	24	6	\N	\N	Rigoberto	Linares Montes	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
109	\N	24	6	\N	\N	Ruth Arely	Perez de Figueroa	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
110	\N	24	6	\N	\N	Noemy de Jesus	Palomo	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
111	\N	24	6	\N	\N	Ana Lilian	Palma	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
112	\N	24	6	\N	\N	Bernardo	Mendez Lima	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
113	\N	24	6	\N	\N	Maria del Carmen	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
114	\N	24	6	\N	\N	Olga de Jesus	Ramirez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
115	\N	24	6	\N	\N	Noe Alfredo	Linares	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
116	\N	24	6	\N	\N	Cabino	Perez Portillo	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
117	\N	24	6	\N	\N	Maria del Carmen	Ortiz	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
118	\N	24	6	\N	\N	Ermolindo	Chinchilla	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
119	\N	24	6	\N	\N	Wilber A.	Flores	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
120	\N	24	6	\N	\N	Gustavo A.	Ortiz	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
121	\N	24	6	\N	\N	Victor Alfredo	Velasquez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
122	\N	24	6	\N	\N	Jonathan 	Lopez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
123	\N	24	6	\N	\N	Jorge	Mendez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
124	\N	24	6	\N	\N	Adilio	Linares	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
125	\N	24	6	\N	\N	Carlos 	Linares	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
126	\N	24	6	\N	\N	Humberto	Guevara	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
127	\N	24	6	\N	\N	Valeriano	Gomez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
128	\N	24	6	\N	\N	Juan Francisco	Linares	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
129	\N	24	6	\N	\N	Carlos	Flores M.	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
130	\N	24	6	\N	\N	Edgar	Chinchilla	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
131	\N	24	6	\N	\N	Delmy E.	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
132	\N	24	6	\N	\N	Eva	Ortiz	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
133	\N	24	6	\N	\N	Ana Silvia	Herrera	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
134	\N	24	6	\N	\N	Floridalma Mercedes	Linares E.	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
135	\N	24	6	\N	\N	Santos Leticia	T O	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
136	\N	24	6	\N	\N	Maria Luisa	Arita	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
137	\N	24	6	\N	\N	Silma Esmeralda	Palma	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
138	\N	24	6	\N	\N	Maria Luz	Vasquez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
139	\N	24	6	\N	\N	Brenda Karina	Guevara	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
140	\N	24	6	\N	\N	Felipa	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
141	\N	24	6	\N	\N	Felipa	Leiva	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
142	\N	24	6	\N	\N	Dora	Chinchilla	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
143	\N	24	6	\N	\N	Silvia	Chavarria	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
144	\N	24	6	\N	\N	Dora Ninet	Chinchilla	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
145	\N	24	6	\N	\N	Bertha de Jesus 	Lemus	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
146	\N	24	6	\N	\N	Maria	Chinchilla	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
147	\N	24	6	\N	\N	Deisy E.	Sarmiento	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
148	\N	24	6	\N	\N	Blanca Idalia	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
149	\N	24	6	\N	\N	Telma Elizabeth	Flores Osorio	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
150	\N	24	6	\N	\N	Marina deisy 	Arita	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
151	\N	24	6	\N	\N	Irma Aracely	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
153	\N	24	6	\N	\N	Alma Janira 	Axume Linarez	M	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
152	\N	24	6	\N	\N	Alicia Armi	De Sandoval	M	Directora ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
154	\N	24	6	\N	\N	Lidia Aracely	Monroy de Ochoa	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
155	\N	24	6	\N	\N	Carlos	Linares V.	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
156	\N	24	6	\N	\N	Nelly	Sandoval	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
157	\N	24	6	\N	\N	Elsa	Corleto	M	Promotora de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
158	\N	24	6	\N	\N	Vanesa	Vindel Sandoval	M	Promotora de Alfabetizacion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
159	\N	24	6	\N	\N	Sandra Asuzena	Aguilar	M	Promotora PNA	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
160	\N	24	6	\N	\N	Mario Ernesto	Mendez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
161	\N	24	6	\N	\N	Miguel Angel	Zelada M.	H	Sgto PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
162	\N	24	6	\N	\N	Silvia	Chavarria	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
163	\N	24	6	\N	\N	Nelly Yaneth	Sandoval	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
164	\N	24	6	\N	\N	Margarita Concepcion	Linares I.	M	Presidenta ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
165	\N	24	6	\N	\N	Telma E.	Flores Osorio	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
166	\N	24	6	\N	\N	Irma A.	Linarez de Garcia	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
167	\N	24	6	\N	\N	Silvia	Chavarria	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
168	\N	25	6	\N	\N	Argenis Antonio	Reyes Medina	H	Secretario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
169	\N	25	6	\N	\N	Vilma Estela	Flores de Arevalo	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
170	\N	25	6	\N	\N	Irma Aracely	Linares	M	Vocal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
171	\N	25	6	\N	\N	Margarita Concepcion	Linares	M	Presidenta	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
172	\N	25	6	\N	\N	Nelly Yaneth	Sandoval	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
173	\N	25	6	\N	\N	Yanet 	Tobar	M	Directora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
174	\N	25	6	\N	\N	Gladis Arcida	Linares	M	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
175	\N	25	6	\N	\N	Mario Mauricio	Sanchez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
176	\N	25	6	\N	\N	Javier 	Linares	H	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
177	\N	25	6	\N	\N	Oscar Arnando	Sermeño	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
178	\N	25	6	\N	\N	Blanca Rosa	Valle	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
179	\N	25	6	\N	\N	Arturo	Zepeda	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
180	\N	25	6	\N	\N	Noe 	Velasco Echeverria	H	Tecnico Extensionista	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
181	\N	25	6	\N	\N	Pedro Antonio	Tobar Vega	H	Sindico Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
182	\N	25	6	\N	\N	Oscar 	Sandoval	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
183	\N	25	6	\N	\N	Manuel Vicente	R.	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
184	\N	25	6	\N	\N	Armando	Sandoval	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
185	\N	25	6	\N	\N	Jose Luis Humberto	Ortega	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
186	\N	25	6	\N	\N	Ricardo Alcides	Acosta Morataya	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
187	\N	25	6	\N	\N	Gilberto 	Flores	H	ITGA	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
188	\N	25	6	\N	\N	Salvador 	Hdez	H	Jefe Salud Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
189	\N	25	6	\N	\N	Emperatriz	Romero	M	Delegada Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
190	\N	25	6	\N	\N	Lucy del Carmen	Ruiz	M	Delegada Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
191	\N	25	6	\N	\N	Francisco 	Arevalo	H	Coordinador SIBASI	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
236	\N	27	6	\N	\N	Fredy	Mesquita	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
237	\N	27	6	\N	\N	Anderson	Linares	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
247	\N	27	6	\N	\N	Antonio	Jimenez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
192	\N	25	6	\N	\N	Blanca Esperanza	Soto	M	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
205	\N	26	6	\N	\N	Manuel Vicente	R.	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
214	\N	26	6	\N	\N	Salvador	Shi	H	Jefe Salud Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
220	\N	27	6	\N	\N	Fidelia Amando 	Flores	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
229	\N	27	6	\N	\N	Susana 	R. Uvallo	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	\N	27	6	\N	\N	Jose 	Duarte Luna	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
193	\N	25	6	\N	\N	Alberto	Castaneda	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
206	\N	26	6	\N	\N	Jose Luis Humberto	Ortega	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
221	\N	27	6	\N	\N	Rosando 	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
230	\N	27	6	\N	\N	Geovani de Jesus	Escobar	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
241	\N	27	6	\N	\N	Lorenso	Duarte	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
194	\N	25	6	\N	\N	Carlos Alberto	Henriquez	H	Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
198	\N	26	6	\N	\N	Argenis Antonio	Reyes Medina	H	Secretario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
207	\N	26	6	\N	\N	Ricado Alcides	Acosta M.	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
222	\N	27	6	\N	\N	Erlinda de Maria	Juarez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
231	\N	27	6	\N	\N	Victor Manuel	Hernandez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
242	\N	27	6	\N	\N	Emeli	Juarez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
195	\N	25	6	\N	\N	Maria Isabel	Soto	M	Habit.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
199	\N	26	6	\N	\N	Nelly Yanet 	Sandoval	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
208	\N	26	6	\N	\N	Emperatriz	Romero	M	Delegada Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
223	\N	27	6	\N	\N	Rosario Maricela	Perez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
232	\N	27	6	\N	\N	Wilfredo	Martinez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
243	\N	27	6	\N	\N	Juana A.	Rojas	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
196	\N	25	6	\N	\N	Telma Elizabeth	Flores Osorio	M	Particular	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
200	\N	26	6	\N	\N	Yanet	Tobar	M	Directora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
209	\N	26	6	\N	\N	Lucy del Carmen	Ruiz	M	Delegada M.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
224	\N	27	6	\N	\N	Deisi Areli	Flores	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
233	\N	27	6	\N	\N	Margarito	Guzman F.	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
234	\N	27	6	\N	\N	Wilson 	Juarez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
244	\N	27	6	\N	\N	Maria Elsa 	Cerritos de Sandoval	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
197	\N	25	6	\N	\N	Boris 	Romero	H	Medico Director	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
202	\N	26	6	\N	\N	Aztur	Zepeda	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
211	\N	26	6	\N	\N	Maria Isabel	Soto	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
215	\N	27	6	\N	\N	Wilber 	Esau	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
217	\N	27	6	\N	\N	Alicia 	Hernandez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
226	\N	27	6	\N	\N	Mirian Ramos 	Axume	M	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
246	\N	27	6	\N	\N	Amado 	Sandoval	H	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
201	\N	26	6	\N	\N	Oscar Armando	Sermeño	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
210	\N	26	6	\N	\N	Carlos Alberto	Henriquez	H	Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
216	\N	27	6	\N	\N	Oscar 	Ordoñez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
225	\N	27	6	\N	\N	Afrodicio 	Juarez	H	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
235	\N	27	6	\N	\N	Claudia	Linares	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
245	\N	27	6	\N	\N	Miguel Angel	Sandoval Sandoval	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
203	\N	26	6	\N	\N	Noe	Velasco Echeverria	H	Tecnico Extensionista	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
212	\N	26	6	\N	\N	Francisco	Arevalo	H	Coordinador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
218	\N	27	6	\N	\N	Yulissa	Alachan	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
227	\N	27	6	\N	\N	Yolanda del Carmen	Flores de Flores	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
238	\N	27	6	\N	\N	Saira	Linarez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
204	\N	26	6	\N	\N	Pedro Antonio	Tobar Vega	H	Sindico Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
213	\N	26	6	\N	\N	Gilberto	Flores	H	ITGA	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
219	\N	27	6	\N	\N	Marciano	Mesquita	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
228	\N	27	6	\N	\N	Roberto	Ruballo	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
239	\N	27	6	\N	\N	Wendy Anabel	Mazariego	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
248	\N	27	6	\N	\N	Exialen 	Juarez	H	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
249	\N	27	6	\N	\N	Marciano	Mesquita	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
250	\N	27	6	\N	\N	Neftali 	Linarez	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
251	\N	27	6	\N	\N	Salomon	Flores Vasquez	H	Tesorero ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
252	\N	27	6	\N	\N	Gonzalo	Florez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
253	\N	27	6	\N	\N	Teodora	Flores	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
254	\N	27	6	\N	\N	Ancelmo	Gonzalez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
255	\N	27	6	\N	\N	Afrodicio	Juarez	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
256	\N	27	6	\N	\N	Heralia	Martinez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
257	\N	27	6	\N	\N	Alnulfo 	Sandoval	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
258	\N	27	6	\N	\N	Erio de Jesus	Castillo	H	Tesorero de Junta de Agua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
259	\N	27	6	\N	\N	Evelio 	Florez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
260	\N	27	6	\N	\N	Rigoberto	Flores	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
261	\N	27	6	\N	\N	Carlos Ovidio	Duarte	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
262	\N	27	6	\N	\N	Helen Beatriz 	Ramirez	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
263	\N	27	6	\N	\N	Danny del Carmen 	Flores	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
264	\N	27	6	\N	\N	Maria Julia	S. F.	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
265	\N	27	6	\N	\N	Rosivel	S.F.	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
266	\N	27	6	\N	\N	Anibal de Jesus	Medina	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
267	\N	27	6	\N	\N	Rogelio Amilcar	Magaña S.	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
268	\N	27	6	\N	\N	Wilber Esau	Juarez Martinez	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
269	\N	27	6	\N	\N	Oscar Armando	Sandoval	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
270	\N	27	6	\N	\N	Oscar Alberto	Ordoñez	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
271	\N	27	6	\N	\N	Salomon	Flores	H	Pro-tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
272	\N	27	6	\N	\N	Amado	Sandoval	H	Vocal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
273	\N	27	6	\N	\N	Afrodicio 	Juarez	H	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
274	\N	27	6	\N	\N	Emely Juarez	de Florez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
275	\N	27	6	\N	\N	Enio de Jesus	Castillo	H	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
276	\N	\N	\N	\N	\N	Rodrigo	Vasquez	 	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	5	\N
277	\N	\N	\N	\N	\N	0	0	 	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
278	\N	\N	1	\N	\N	Rodrigo	Vásquez	 	Tesorero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2
279	\N	28	6	\N	\N	Victor Antonio	Garcia	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
280	\N	28	6	\N	\N	Roberto Antonio	Gonzalez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
281	\N	28	6	\N	\N	Cristobal de Jesus	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
282	\N	28	6	\N	\N	Mario Mauricio	Sanchez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
283	\N	28	6	\N	\N	Arturo	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
284	\N	28	6	\N	\N	Carlos Rene 	Escobar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
285	\N	28	6	\N	\N	Pedro Jesus	Rodriguez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
286	\N	28	6	\N	\N	Miguel Antonio	Salazar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
287	\N	28	6	\N	\N	Carlos Saul	Martinez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
288	\N	28	6	\N	\N	Alejandro	Corleto Tobar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
289	\N	28	6	\N	\N	Enrique 	Linarez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
290	\N	28	6	\N	\N	Miguel Alfredo	Sanchez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
291	\N	28	6	\N	\N	Isabel Antonio	Palma Garcia	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
292	\N	28	6	\N	\N	Naun Otoniel	Gonzalez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
293	\N	28	6	\N	\N	Maximo Antonio	Linarez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
294	\N	28	6	\N	\N	Teodoro Antonio	Monroy	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
295	\N	28	6	\N	\N	Heriberto Antonio	Ortiz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
296	\N	28	6	\N	\N	Angela Arely	Bernales	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
297	\N	28	6	\N	\N	Sofia Esperanza	Ruiz	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
298	\N	28	6	\N	\N	Rosa Elena	Ruiz	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
299	\N	28	6	\N	\N	Santos de Maria	Martinez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
300	\N	28	6	\N	\N	Carmen 	Linarez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
301	\N	28	6	\N	\N	Josefina	Aguirrez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
302	\N	28	6	\N	\N	Aminta	Sandoval	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
303	\N	28	6	\N	\N	Evelin del Carmen	Sanchez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
304	\N	28	6	\N	\N	Audelia	Ramirez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
305	\N	28	6	\N	\N	Ana	Linarez de Vides	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
306	\N	28	6	\N	\N	Felipa	Leiva	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
307	\N	28	6	\N	\N	Carmen 	Perez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
308	\N	28	6	\N	\N	Neyda	Linares	M	NSL	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
309	\N	28	6	\N	\N	Manuel Vicente	R.	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
310	\N	28	6	\N	\N	Rufina Victoria	Garcia	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
311	\N	28	6	\N	\N	Alba Marina	Linares	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
312	\N	28	6	\N	\N	Teodora 	Flores	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
313	\N	28	6	\N	\N	Gloria	de Flores	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
314	\N	28	6	\N	\N	Ana Gloria	Rivera	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
315	\N	28	6	\N	\N	Maria Isabel	Rivas	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
316	\N	28	6	\N	\N	Jose Antonio	Salguero	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
317	\N	28	6	\N	\N	Domingo	Ruano	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
318	\N	28	6	\N	\N	Brenda Magaly	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
319	\N	28	6	\N	\N	Oscar Armando	Sermeño	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
320	\N	28	6	\N	\N	Cristobal	Vasquez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
321	\N	28	6	\N	\N	Maria Teresa	Nolasco	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
322	\N	28	6	\N	\N	Maria del Carmen 	Castaneda	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
323	\N	28	6	\N	\N	Claribel del Carmen	Nolasco	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
324	\N	28	6	\N	\N	Angela de Maria	Mesquita	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
325	\N	28	6	\N	\N	Julio Cesar 	Perez Diaz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
326	\N	28	6	\N	\N	Juan de Dios	Salvador	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
327	\N	28	6	\N	\N	Leocandio Ovidio	Corleto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
328	\N	28	6	\N	\N	Celi Isabel	Linares	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
329	\N	28	6	\N	\N	Marina Argelia	Herrera	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
330	\N	28	6	\N	\N	Mario Tulio	Salguero	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
331	\N	28	6	\N	\N	Sonia	Corleto	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
332	\N	28	6	\N	\N	Ana Cristina	Viuda de Marinez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
333	\N	28	6	\N	\N	Juan Antonio	Ruiz Diaz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
334	\N	28	6	\N	\N	Martina	Sandoval Linares	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
335	\N	28	6	\N	\N	Marcelina	Portillo	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
336	\N	28	6	\N	\N	Trinidad Maria	Monrroy	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
337	\N	28	6	\N	\N	Antonio	Tobar	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
338	\N	28	6	\N	\N	Juan Angel	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
339	\N	28	6	\N	\N	Antonio	Orosco	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
340	\N	28	6	\N	\N	Mauricio 	Sanchez Peñate	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
347	\N	28	6	\N	\N	Teodora	Flores	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
356	\N	29	6	\N	\N	Edwin Gabriel	Ruiz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
364	\N	29	6	\N	\N	Julio Jose	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
371	\N	29	6	\N	\N	Alma Yanira	Axume	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
373	\N	29	6	\N	\N	Vilma Karina	Najera	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
374	\N	29	6	\N	\N	Emilio 	Soto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
392	\N	30	6	\N	\N	Carlos Antonio	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
403	\N	30	6	\N	\N	Francisco Leonel	Tenas	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
341	\N	28	6	\N	\N	Heriberto Antonio	Ortiz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
358	\N	29	6	\N	\N	Carlos Humberto	Martinez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
359	\N	29	6	\N	\N	Hilda Yaneth	Gutierrez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
367	\N	29	6	\N	\N	Maria Cristina	Garcia	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
390	\N	30	6	\N	\N	Miguel A.	Zelada M.	H	Jefe de Puesto PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
400	\N	30	6	\N	\N	William Adilio	Ramirez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
401	\N	30	6	\N	\N	Mario	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
342	\N	28	6	\N	\N	Isabel Antonio 	Palma	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
343	\N	28	6	\N	\N	Ana Cristina	Viuda de Martinez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
350	\N	29	6	\N	\N	Gregorio Olivares	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
368	\N	29	6	\N	\N	Evlinda del carmen	Chilin	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
377	\N	29	6	\N	\N	Francisco de Jesus	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
386	\N	30	6	\N	\N	Mirna Margarita	Perez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
395	\N	30	6	\N	\N	Rigoberto Jesus	Acevedo	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
396	\N	30	6	\N	\N	Maria Isabel	Perez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
406	\N	30	6	\N	\N	Ever Adalid	Ochoa Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
344	\N	28	6	\N	\N	Juan Antonio	Ruiz Diaz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
353	\N	29	6	\N	\N	Arcides	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
360	\N	29	6	\N	\N	Adelso Antonio	Corleto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
361	\N	29	6	\N	\N	Orlando 	Soto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
378	\N	29	6	\N	\N	Arcides	Linares	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
397	\N	30	6	\N	\N	Nohemi	Lemus	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
345	\N	28	6	\N	\N	Brenda Magaly	Sandoval	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
354	\N	29	6	\N	\N	Ivan Antonio	Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
362	\N	29	6	\N	\N	Cesar Alberto	Ramirez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
370	\N	29	6	\N	\N	Martina	Martinez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
346	\N	28	6	\N	\N	Oscar	Sermeño	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
355	\N	29	6	\N	\N	Eliseo de Jesus	Martinez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
363	\N	29	6	\N	\N	Isaias	Mejia Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
381	\N	29	6	\N	\N	Zoila Vilma	Ramirez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
389	\N	30	6	\N	\N	Angelica Maria	Interiano	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
399	\N	30	6	\N	\N	Jorge	Corleto	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
408	\N	31	6	\N	\N	Yanet 	Tobar	M	Directora Casa Cultura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
348	\N	28	6	\N	\N	Manuel Vicente	Rodriguez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
349	\N	28	6	\N	\N	Teresa	Nolasco	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
351	\N	29	6	\N	\N	Crecencio 	Sandoval Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
352	\N	29	6	\N	\N	Sergio	Sandoval Linares	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
357	\N	29	6	\N	\N	Edelmira del Carmen 	Sandoval	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
369	\N	29	6	\N	\N	Alejandrina Esmeralda	Linares	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
379	\N	29	6	\N	\N	Ivan	Linares	H	Vice Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
380	\N	29	6	\N	\N	Vilma Karina	Najera	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
387	\N	30	6	\N	\N	Hicelesa	Sandoval	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
388	\N	30	6	\N	\N	Maira Esperanza	Cruz	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
398	\N	30	6	\N	\N	Alejandro	Almagez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
407	\N	31	6	\N	\N	Patricia Leonor	Hernandez Carrillos	M	Colaborador Judicial	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
365	\N	29	6	\N	\N	Carlos	Linares Cerritos	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
366	\N	29	6	\N	\N	Rosario	Soto	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
372	\N	29	6	\N	\N	Zoila Vilma	Ramirez	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
375	\N	29	6	\N	\N	Gloria Esperanza	Sandoval	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
376	\N	29	6	\N	\N	Pedro Rene	Sandoval	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
382	\N	29	6	\N	\N	Eliseo de Jesus	Martinez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
383	\N	29	6	\N	\N	Carlos Humberto 	Martinez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
384	\N	29	6	\N	\N	Pedro Rene	Sandoval	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
385	\N	30	6	\N	\N	Gladis Alcides	Linares	M	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
391	\N	30	6	\N	\N	Geovani	Guerra	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
393	\N	30	6	\N	\N	Luis Alonso	Mejia	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
394	\N	30	6	\N	\N	Juan Carlos	Perez Cruz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
402	\N	30	6	\N	\N	Oscar Maximiliano	Perez	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
404	\N	30	6	\N	\N	Oscar Armando	Cruz	H	Comunidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
405	\N	30	6	\N	\N	Silvia	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
409	\N	31	6	\N	\N	Maricela	de Mendoza	M	Directora C.E. Jose Salazar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
410	\N	31	6	\N	\N	Gilberta	Flores	M	Inspector UCGF	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
411	\N	31	6	\N	\N	Oscar 	Sandoval	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
412	\N	31	6	\N	\N	Cristobal de Jesus	Trinidad L.	H	Lider	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
413	\N	31	6	\N	\N	Rufino Antonio	Serbellon	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
414	\N	31	6	\N	\N	Miguel A.	Zelada Miron	H	Jefe de Puesto PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
415	\N	31	6	\N	\N	Lissette	de Romero	M	AV Consultores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
416	\N	31	6	\N	\N	Emperatriz	Romero	M	Delegada Proteccion Civil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
417	\N	31	6	\N	\N	Pedro	Tobar	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
418	\N	31	6	\N	\N	Silvia Lineth	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
419	\N	32	6	\N	\N	Vilma estela	Flores de Avalos	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
420	\N	32	6	\N	\N	Armando	Sandoval	H	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
421	\N	32	6	\N	\N	Blanca Rosa	Valle	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
422	\N	32	6	\N	\N	Telma Elizabeth	Flores Osorio	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
423	\N	32	6	\N	\N	Wenceslao	Sandoval L.	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
424	\N	32	6	\N	\N	Alfonso 	Gomez Martinez	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
425	\N	32	6	\N	\N	Ana Silvia	Chinchilla	M	Representante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
426	\N	32	6	\N	\N	Alberto	Castaneda	H	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
427	\N	32	6	\N	\N	Blanca Esperanza 	Soto R.	M	Representante ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
428	\N	32	6	\N	\N	Juan Alexander	Moran Arevalo	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
429	\N	32	6	\N	\N	Eva Maria	Ortiz	M	Proteccion Civil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
430	\N	32	6	\N	\N	Oscar 	Sandoval	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
431	\N	32	6	\N	\N	Oscar Armando	Sermeño	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
432	\N	32	6	\N	\N	Manuel Vicente	R.	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
433	\N	32	6	\N	\N	Teodora	Flores de Gonzalez	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
434	\N	32	6	\N	\N	Irma Aracely 	Linares de G.	M	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
435	\N	32	6	\N	\N	Karen 	Garcia	M	Colaboradora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
436	\N	32	6	\N	\N	Maximilia 	Perez	M	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
437	\N	32	6	\N	\N	Yaneth	Tobar	M	Directora Casa Cultura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
438	\N	32	6	\N	\N	Mario Mauricio 	Sanchez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
439	\N	32	6	\N	\N	Carlos Alberto	Henriquez	H	UAM	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
440	\N	32	6	\N	\N	Silvia	Chavarria	M	Alcaldesa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
441	\N	32	6	\N	\N	Elsy Nohemy	Saldoval Corleto	M	Promotora de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
442	\N	32	6	\N	\N	Nelly Yaneth 	de Interiano	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
443	\N	32	6	\N	\N	Gilberto Rene	Flores	H	Unidad de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
444	\N	32	6	\N	\N	Lissette	de Romero	M	AV Consultores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
445	\N	32	6	\N	\N	Tito Mario	Velasquez	H	Consultor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
446	\N	34	6	\N	\N	Elsy Noemy	Sandoval Corleto	M	Promotora de salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
447	\N	34	6	\N	\N	Yaneth Odily	Vasquez de tobar 	M	Encargada casa de la cultura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
448	\N	34	6	\N	\N	Teodoro 	Flores	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
449	\N	34	6	\N	\N	Manuel Vicente	Rodriguez	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
450	\N	34	6	\N	\N	Oscar Armando	Sermeño	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
451	\N	34	6	\N	\N	Maximiliano Antonio	Perez	H	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
452	\N	34	6	\N	\N	Mario Mauricio	Sanchez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
453	\N	34	6	\N	\N	Vilma	Flores	M	Acompañante ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
454	\N	34	6	\N	\N	Thelma	Flores	M	ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
455	\N	34	6	\N	\N	Blanca Rosa	Valle	M	Acompañante ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
456	\N	34	6	\N	\N	Karen 	Garcia	M	Colaborador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
457	\N	34	6	\N	\N	Irma Aracely	de Garcia	M	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
458	\N	34	6	\N	\N	Ana Silvia	Chinchilla	M	Acompañante Prot. Civil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
459	\N	34	6	\N	\N	Nelly Yaneth 	Sandoval de Interiano	M	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
460	\N	34	6	\N	\N	Eva Maria	Ortiz	M	Proteccion Civil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
461	\N	34	6	\N	\N	Amanda	Sandoval	M	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
462	\N	34	6	\N	\N	Oscar	Sandoval	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
463	\N	34	6	\N	\N	Wenceslao	Sandoval	H	Consejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
464	\N	34	6	\N	\N	Gilberto Rene	Flores	H	Inspector S.A.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
465	\N	34	6	\N	\N	Carlos	Henriquez	H	Area Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
466	\N	34	6	\N	\N	Juan Alexander	Moran	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
467	\N	34	6	\N	\N	Alfonso	Gomez Martinez	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
468	\N	34	6	\N	\N	Emigdio Sandro	Juarez	H	Pastor Evangelico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
469	\N	34	6	\N	\N	Esperanza	Soto	H	Secretaria ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
470	\N	34	6	\N	\N	Alberto	Castaneda	H	Tesorero ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
471	\N	34	6	\N	\N	Pedro A.	Tobar Vega	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
472	\N	34	6	\N	\N	Tito Mario	Velasquez	H	AV Consultores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
473	\N	\N	\N	\N	\N	Ramón Antonio	Velásquez	H	Jefe de UACI	\N	\N	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N
474	\N	\N	\N	\N	\N	Rosa María	Reyes	M	Jefa de Proyección Social	\N	\N	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N
475	\N	\N	\N	\N	\N	María Concepción	Sagastizado	M	Cuarto Regidor Propietario	\N	\N	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N
476	\N	\N	\N	\N	\N	Olga Jacqueline	Lemus	M	Secretaria Municipal	\N	\N	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N
477	\N	\N	6	4	\N	Miguel Ángel	Hernández	H	Ciudadano	69	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
478	\N	\N	6	4	\N	José Luis	Díaz Coreas	H	Ciudadano	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
479	\N	\N	6	4	\N	María Alicia	Parada	M	Ciudadana	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
480	\N	\N	6	4	\N	Elmer	González	H	Ciudadano	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
481	\N	\N	6	4	\N	Sandra Ernestina	Morales	M	Ciudadana	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
482	\N	\N	6	4	\N	Carlos Arturo	Avalos	H	Ciudadano	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
483	\N	\N	6	4	\N	Ana Mercedez	Crespín	M	Ciudadano	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
484	\N	\N	6	4	\N	Ana Clodis	Hernández	M	Ciudadana	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
487	\N	\N	6	4	\N	Blanca Lidia	Castro	M	Ciudadana	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
485	\N	\N	6	4	\N	Yesenia Marisol	Hernández de A.	M	Ciudadana	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
486	\N	\N	6	4	\N	Noá Falipa	Aparicio	M	Ciudadana	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
493	\N	\N	3	4	\N	Julio Roberto	Ramos	H	Asesor Municipal	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
488	\N	\N	6	4	\N	Edelmira	López	M	Ciudadana	73	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
489	\N	\N	6	4	\N	Magdalena	López	M	Ciudadana	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
490	\N	\N	6	4	\N	Julio Eduardo	Santos Flores	H	Ciudadano	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
491	\N	\N	6	4	\N	Rigoberto	Cisneros	H	Ciudadano	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
492	\N	\N	3	4	\N	Humberto	Guandique	H	Asesor Municipal	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
494	\N	\N	1	4	\N	Lidia Estela	Rivas Díaz	M	Jefe Unidad de Género	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
495	\N	\N	6	4	\N	Digna del Carmen	Ramírez	M	Ciudadana	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
496	\N	\N	6	4	\N	Matílde Candelaria	Baleriano	M	Ciudadana	68	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
497	\N	\N	6	4	\N	Carlos	García	H	Ciudadano	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
498	\N	\N	6	4	\N	Cristian	Carranza	H	Ciudadano	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
499	\N	\N	6	4	\N	Julia de Jesús	Chévez	M	Cuidadana	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
500	\N	\N	6	4	\N	Dora Alicia	Reyes de Arenivar	M	Ciudadana	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
501	\N	\N	6	4	\N	Blanca Elia	Hernández	M	Ciudadana	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
502	\N	\N	6	4	\N	Yaneth	López	M	Ciudadana	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
503	\N	\N	6	4	\N	Mario Salvador	Ramírez	H	Ciudadano	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
504	\N	\N	6	4	\N	Manuel	Santana Campos	H	Ciudadano	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
505	\N	\N	6	4	\N	Evelin Azucena	Moreira	M	Ciudadana	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
506	\N	\N	1	4	\N	Isis Yamileth	Quintanilla	M	Asistente de NMA	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
507	\N	\N	6	4	\N	Nelly Esperanza	Quintanilla	M	Artesana	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
508	\N	\N	6	4	\N	Morena Silvia	de Guevara	M	Empresaria	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
509	\N	\N	6	4	\N	Wilmer Antonio	Cruz	H	Transporte	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
510	\N	\N	6	4	\N	Ernesto Antonio	Menjivar	H	Mercado	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
511	\N	\N	6	4	\N	Fredis Arnoldo	Hernández	H	Mercado	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
512	\N	\N	6	4	\N	Oscar Guillermo	Chévez	H	Negocio	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
513	\N	\N	6	4	\N	Jhonatan Baltazar	Araniva	H	Estudiante	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
514	\N	\N	6	4	\N	Eliazar Isaias	Gamez	H	Líder	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
515	\N	\N	6	4	\N	Edwin Antonio	Menjivar	H	Líder	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
516	\N	\N	6	4	\N	Josué Alberto	Villalobos H.	H	Ciudadano	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
517	\N	\N	6	4	\N	José Maximiliano	Paches	H	Banda Musical	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
518	\N	\N	6	4	\N	Andrés Eduardo	Ulloa	H	Banda Musical	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
519	\N	\N	6	4	\N	José Jaime	Ramírez	H	Banda Musical	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
520	\N	\N	1	4	\N	Rosa María	Reyes	M	Proyección Social	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
521	\N	\N	6	4	\N	Bayron Alberto	Hernández	H	Banda Musical	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
522	\N	\N	2	4	\N	David Yurandir	Gutierrez	H	Técnico	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
524	\N	37	6	\N	\N	Carlos Galileo	Portillo	H	Promotor de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
525	\N	37	2	\N	\N	Blanca Estela	Gutierrez	M	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
526	\N	38	6	\N	\N	Alicia Valle	Flores	M	Cabo PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
527	\N	38	2	\N	\N	Sergio Antonio	Domínguez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
528	\N	39	1	\N	\N	José Eliseo	Escalante	H	Auxiliar de Proyección Social	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
529	\N	39	1	\N	\N	Rosa María	Reyes	M	Jefa de Proyección Social	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
530	\N	39	2	\N	\N	Doris 	Acosta de Rodríguez	M	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
531	\N	39	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
532	\N	40	1	\N	\N	María Dolores	Martínez Guardado	M	Directora de Casa de la Cultur	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
533	\N	40	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
534	\N	41	1	\N	\N	Rosa María	Reyes	M	Jefa de Proyección Social	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
535	\N	41	1	\N	\N	Carlos Humberto	García	H	Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
536	\N	41	1	\N	\N	Lidia Estela	Rivas Díaz	M	Unidad de la Mujer	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
537	\N	41	1	\N	\N	Raúl Antonio	Velásquez	H	UACI	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
538	\N	41	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
539	\N	42	6	\N	\N	Francisco	Morales	H	Parroco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
540	\N	42	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
541	\N	43	6	\N	\N	Lorena	de Crespín	M	MINED ATP	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
542	\N	43	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
543	\N	44	6	\N	\N	José Rodolfo	Marín	H	ELA Sector Campesino	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
544	\N	44	1	\N	\N	Rosa María	Reyes	M	Jefa de Proyección Social	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
545	\N	44	1	\N	\N	Carlos Humberto	García	H	Jefe Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
546	\N	44	1	\N	\N	Lidia Estela	Rivas Díaz	M	Coordinadora Unidad de Genero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
547	\N	44	3	\N	\N	Zenaida	González	M	Asesora Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
548	\N	44	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
549	\N	44	2	\N	\N	David Yurandir	Gutierrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
550	\N	45	1	\N	\N	Carlos Humberto	García	H	Jefe de Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
551	\N	45	2	\N	\N	Neidy Xiomara	Rodríguez Acosta	M	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
552	\N	45	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
553	\N	\N	\N	\N	\N	María de los Angeles	Velásquez Chicas	M	Unidad Municipal de la Mujer	\N	\N	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N
554	\N	\N	\N	\N	\N	Milagro del Rosario	Guzmán Reyes	M	Jefa de Unidad Ambiental	\N	\N	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N
555	\N	\N	\N	\N	\N	Elmer Iván	Cruz del Cid	H	Jefe de Proyección Social	\N	\N	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N
556	\N	\N	2	5	\N	Oscar Benjamín	Pineda	H	Técnico	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
557	\N	\N	6	5	\N	José Rafael	Salazar	H	Pastor	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
558	\N	\N	6	5	\N	Candelario	Vargas	H	Lider Comunitario	77	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
559	\N	\N	6	5	\N	Fredy Adán	Chévez	H	Presidente de ADESCO	51	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
560	\N	\N	6	5	\N	Miguel A.	Henríquez	H	Ciudadano	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
561	\N	\N	6	5	\N	Felipe Santiago	Torres	H	Presidente de Directiva	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
563	\N	\N	6	5	\N	Edwin Hilmer	Cruz	H	Ciudadano	51	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
564	\N	\N	6	5	\N	María Concepción	Reyes	M	Secretaría ADESCO	67	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
562	\N	\N	6	5	\N	Reina Isabel	Portillo de Ramírez	M	Tesorera ADESCO	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
565	\N	\N	6	5	\N	Sandra Noemy	Chicas de Velásquez	M	Ciudadana	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
566	\N	\N	1	5	\N	Denis Emerson	Gómez	H	Síndico	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
567	\N	\N	6	5	\N	Liliana Georgina	Díaz Rivera	M	Secretaría ADESCO	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
568	\N	\N	6	5	\N	María de la Paz	Chavarria	M	Presidenta ADESCO	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
569	\N	\N	6	5	\N	Hilda Espereranza	Cruz	M	Tesorera ADESCO	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
570	\N	\N	6	5	\N	Sara Elizabeth	González	M	Vocal ADESCO	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
571	\N	\N	6	5	\N	José Lazaro	Blanco	H	Tesorero ADESCO	76	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
572	\N	\N	1	5	\N	Milagro del Rosario	Guzmán	M	Unidad de Medio Ambiente	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
573	\N	\N	6	5	\N	José Tito	Parada Vicente	H	Vocal PRENIFU	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
574	\N	\N	1	5	\N	Beris Yasmina	Interiano	M	Secretaria Municipal	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
575	\N	\N	6	5	\N	Manuel de Jesús	Peréz	H	Vicepresidente ADESCO	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
576	\N	\N	6	5	\N	Eric	Vargas Mendéz	H	Director Ins Nacional de Uluaz	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
577	\N	\N	6	5	\N	Paula Eliza	Cuadra	M	Aux. de Enfermería	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
578	\N	\N	6	5	\N	Vilma Guadalupe	Delgado	M	Ciudadana	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
579	\N	\N	6	5	\N	Olga Emperatriz	Granado	M	Ciudadana	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
589	\N	36	6	\N	\N	Patricia	Rodríguez	M	Secretaria Instituto	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
580	\N	\N	1	5	\N	María de los Angeles	Velásquez	M	Unidad Municipal de la Mujer	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
590	\N	36	6	\N	\N	Sandra Lourdes	S	M	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
581	\N	\N	6	5	\N	Reina de la Paz	Alvarenga	M	Ciudadana	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
591	\N	36	6	\N	\N	Alfonso	Alvarez	H	Ordenanza Centro Escolar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
582	\N	\N	6	5	\N	José Fermin	Gómez U	H	Parroco	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
592	\N	36	6	\N	\N	Nelson Antonio	Morán	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
583	\N	\N	1	5	\N	Elmer Iván	Cruz	H	Proyección Social	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
585	\N	36	6	\N	\N	Miguel de Jesús	Salgado	H	Sacristán Iglesia Católica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
584	\N	\N	3	5	\N	Zenaida Elizabeth	González	M	Asesor Municipal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
586	\N	36	6	\N	\N	Neidy	Cruz	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
587	\N	36	6	\N	\N	Dinora	de Torres	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
588	\N	36	6	\N	\N	Milton Antonio	Ruíz Montencino	H	Enfermero UCSF Uluazapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
593	\N	36	6	\N	\N	Mirna	Portillo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
594	\N	36	6	\N	\N	Iris del Carmen	Yanez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
595	\N	36	6	\N	\N	Mercedes	Argueta	M	Colaborador Judicial Juzgado d	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
596	\N	36	6	\N	\N	Eliza Madahi	Vicente	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
597	\N	36	1	\N	\N	María Concepción	Reyes	M	Sector Mujer	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
598	\N	36	6	\N	\N	Olga Emperatriz	Granados	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
599	\N	36	6	\N	\N	Reina Yamilet	Ramírez Portillo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
600	\N	36	6	\N	\N	Reina Isabel	Portillo de R	M	Tesorera ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
601	\N	36	6	\N	\N	Desconocido	Campos Martínez	H	Agente PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
602	\N	36	6	\N	\N	Victor O	Yanez	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
603	\N	36	6	\N	\N	Rafael	Zalazar	H	Pastor Iglesia Asambleas de Di	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
604	\N	46	6	\N	\N	Sara Elizabeth	González	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
605	\N	46	6	\N	\N	Arturo	Centeno	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
606	\N	46	6	\N	\N	Ada	Castillo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
607	\N	46	6	\N	\N	María de la Paz	Chavarria	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
608	\N	46	6	\N	\N	Ramón	Perla	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
609	\N	46	6	\N	\N	Alex	Díaz	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
610	\N	46	6	\N	\N	Jaime Iván	Rivera	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
611	\N	46	6	\N	\N	Isela	Moreno	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
612	\N	46	6	\N	\N	Norma Yessenia	Alvarenga A	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
613	\N	46	6	\N	\N	Pedro Antonio	Fermán T	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
614	\N	46	6	\N	\N	Santiago	Guevara Espinoza	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
615	\N	46	6	\N	\N	Sandra Nohemi	Chicas	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
616	\N	46	6	\N	\N	Romilio	Chicas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
617	\N	46	6	\N	\N	Reina de la Paz	Alvarenga	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
618	\N	46	6	\N	\N	José García	Hidalgo	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
619	\N	46	2	\N	\N	David Yurandir	Gutierrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
620	\N	36	2	\N	\N	David Yurandir	Gutierrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
621	\N	\N	\N	\N	\N	Elías 	Lazo	H	Síndico	\N	\N	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
624	\N	\N	\N	\N	\N	Cesar Amilcar	López	H	Concejal	\N	\N	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
626	\N	\N	\N	\N	\N	Rafael Antonio 	Villatoro	H	Concejal	\N	\N	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
625	\N	\N	\N	\N	\N	Alba	Bonilla	M	Secretaria Municipal	\N	\N	2680-8005	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
628	\N	\N	\N	\N	\N	Elmer Enrique	Reyes	H	Unidad de Medio Ambiente	\N	\N	6005-4498	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
622	\N	\N	\N	\N	\N	Mario Andrés 	Martínez	H	Alcalde	\N	\N	7885-6852	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
623	\N	\N	\N	\N	\N	Exequiel Osmín	Cuevas	H	Concejal	\N	\N	7934-7349	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
627	\N	\N	\N	\N	\N	Carlos	Morataya	H	Jefe UACI	\N	\N	2613-3607	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
629	\N	50	6	\N	\N	Manuel de Jesús	Peréz	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
630	\N	50	6	\N	\N	Fredis Adán	Chevéz	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
631	\N	50	6	\N	\N	Olga Emperatriz	Granados	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
632	\N	50	2	\N	\N	David Yurandir	Gutierrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
633	\N	\N	\N	\N	\N	Ana María 	Alfaro de Rodas	M	Consultora	\N	\N	7844-5825	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N
634	\N	51	6	\N	\N	Ricardo	Manzanares	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
635	\N	51	6	\N	\N	Gabriel	Umaña	H	Ciudadadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
636	\N	51	6	\N	\N	Carlos	Escobar	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
637	\N	51	6	\N	\N	Mario	Luna	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
638	\N	51	6	\N	\N	Agustin	Carballo	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
639	\N	51	6	\N	\N	Liliana Georgina	Díaz	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
640	\N	51	6	\N	\N	Elida Patricia	Chicas	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
641	\N	51	6	\N	\N	Linda	Guevara	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
642	\N	51	6	\N	\N	Miguel	Henríquez	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
643	\N	51	6	\N	\N	Candelario	Vargas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
644	\N	\N	3	6	\N	Zenaida	Granados	M	Asesora Municipal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
645	\N	51	6	\N	\N	Dora	Henríquez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
646	\N	51	6	\N	\N	Angelina	Gómez Castillo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
647	\N	51	6	\N	\N	José Lazaro	Blanco	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
648	\N	51	6	\N	\N	Luis Aloson	del Cid	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
649	\N	\N	1	6	\N	Alba	Bonilla	M	Secretaria Municipal	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
650	\N	\N	1	6	\N	Mario Andrés	Martínez	H	Alcalde Municipal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
652	\N	52	1	\N	\N	María de los Angeles	Velásquez	M	Unidad Municipal de la Mujer	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
653	\N	52	1	\N	\N	Milagro del Rosario	Guzmán	M	Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
654	\N	52	2	\N	\N	David Yurandir	Gutierrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
655	\N	\N	6	6	\N	Felix Antonio 	Villatoro	H	Ciudadano	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
656	\N	\N	6	6	\N	José Francisco	Paz Benitez	H	Ciudadano	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
657	\N	53	6	\N	\N	Maria Concepción	Reyes	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
658	\N	\N	6	6	\N	Miguel Anguel 	Paz	H	Ciudadano	79	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
659	\N	53	1	\N	\N	María de los Angeles	Velásquez	M	Unidad de la Mujer	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
660	\N	53	1	\N	\N	Milagro del Rosario	Guzmán	M	Unidad Ambiental	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
661	\N	\N	6	6	\N	Carlos Roberto 	Lazo	H	Ciudadano	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
662	\N	53	6	\N	\N	José Tito	Parada Vicente	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
663	\N	\N	6	6	\N	María del Carmen	Cruz Bonilla 	M	Ciudadana	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
664	\N	53	3	\N	\N	Zenaída Elizabeth	Granados Girón	M	Asesora Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
651	\N	\N	1	6	\N	Exequiel Osmín	Cuevas	H	Concejal	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
665	\N	53	6	\N	\N	Paula Eliza	Cuadra	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
666	\N	\N	6	6	\N	Saúl Alfredo	Herrera	H	Ciudadano	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
667	\N	53	1	\N	\N	Elmer Iván	Cruz	H	Proyección Social	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
668	\N	\N	6	6	\N	José Ramón	Rivas	H	Ciudadano	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
669	\N	53	2	\N	\N	Neidy	Rodríguez Acosta	M	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
670	\N	53	2	\N	\N	Oscar Benjamín	Pineda	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
671	\N	\N	6	6	\N	Fernando 	Contreras	H	Ciudadano	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
672	\N	\N	6	6	\N	Roxana Hayde 	Flores	M	Ciudadana	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
673	\N	\N	6	6	\N	José David 	Mercado	H	Ciudadano	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
674	\N	\N	6	6	\N	Teódulo 	Fuentes	H	Ciudadano	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
675	\N	\N	6	6	\N	Yeni Guadalupe 	Flores	M	Ciudadano	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
676	\N	\N	6	6	\N	Saúl 	González	H	Ciudadano	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
677	\N	\N	6	6	\N	Margarita	Hernández de Gómez	H	Ciudadana	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
678	\N	\N	1	6	\N	Ever Omar	Alvaréz Flores	H	Contador Municipal	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
679	\N	\N	6	6	\N	Juan Manuel 	Guerra	H	Ciudadano	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
680	\N	\N	6	6	\N	José Rufino 	Fuentes	H	ADESCO	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
681	\N	\N	6	6	\N	Pedro Ramón	Rivas	H	Ciudadano	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
682	\N	\N	6	6	\N	Filadelfo 	Berrio	H	Ciudadano	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
683	\N	\N	6	6	\N	Alfredo Antonio	Umanzor	H	Ciuddadano	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
684	\N	\N	6	6	\N	Salvador 	Ferrufino	H	Promotor de Salud	63	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
699	\N	\N	6	6	\N	Yessica Isabel 	Paz	M	Ciudadana	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
685	\N	\N	6	6	\N	Lucio	Fuentes	H	Ciudadano	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
694	\N	\N	6	6	\N	Amalia 	Reyes	M	Ciudadana	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
686	\N	\N	6	6	\N	Agustin	Leiva	H	Ciudadano	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
690	\N	\N	6	6	\N	Josselin Marisela 	Rivas	M	Ciudadana	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
695	\N	\N	6	6	\N	Sandra Yaneth	Paz Ventura	M	Ciudadana	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
687	\N	\N	6	6	\N	José Alberto 	Chamul Esquivel	H	Pastor Evangélico	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
688	\N	\N	6	6	\N	Walter omar	Ferrufino	H	Ciudadano	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
689	\N	\N	6	6	\N	Edwin Noé 	Zúniga	H	Ciudadano	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
691	\N	\N	6	6	\N	Bessy Carolina	Ávila	M	Ciudadana	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
693	\N	\N	6	6	\N	Óscar René 	Rivas	H	Ciudadano	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
696	\N	\N	6	6	\N	Griselda Marisol 	Paz Ventura	M	Ciudadana	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
698	\N	\N	6	6	\N	Maria Santos	Granados	M	Ciudadana	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
692	\N	\N	6	6	\N	Maria Virginia	Bonilla	M	ADESCO	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
697	\N	\N	6	6	\N	Carlos Alfredo 	Rodríguez	H	Ciudadano	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
700	\N	\N	6	6	\N	Candida Rosa	Benitez	M	Ciudadana	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
701	\N	\N	6	6	\N	Santos Sixto	Umaña	H	Ciudadano	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
702	\N	\N	6	6	\N	David 	Bass	H	Extranjero colaborador	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
703	\N	\N	6	6	\N	Emertina	Álvarez	M	Ciudadana	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
704	6	\N	\N	\N	\N	Teódulo	Fuentes	H	Cantón El Zapote.	57		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
705	6	\N	\N	\N	\N	Yessica Isabel 	Paz	M	Cantón El Sombrerito.	18		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
706	6	\N	\N	\N	\N	María Virginia	Bonilla de Ávila	M	Cantón El Chaguitillo.	57		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
707	6	\N	\N	\N	\N	Saúl 	González	H	Cantón La Joya.	49		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
708	6	\N	\N	\N	\N	Carlos Roberto 	Lazo	H	San José Centro.	23		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
709	\N	\N	\N	\N	\N	Alba 	Bonilla	M	Secretaria Alcaldía	42	Universitario.	         	          	u	\N	78	\N	\N	\N	\N	\N	\N	\N	\N
710	\N	\N	\N	\N	\N	Elmer Enrique 	Reyes	H	Unidad Medio Ambiente	27	Universitario	         	          	u	\N	78	\N	\N	\N	\N	\N	\N	\N	\N
711	\N	\N	\N	\N	\N	Ever Omar	Álvarez	H	Contador Municipal	25	Universitario	         	          	u	\N	78	\N	\N	\N	\N	\N	\N	\N	\N
712	\N	\N	\N	\N	\N	David Yurandir 	Gutiérrez	H	CODEIN S.A de C.V	29	Universitario	         	          	u	\N	78	\N	\N	\N	\N	\N	\N	\N	\N
713	\N	\N	\N	\N	\N	Exequiel Osmín	Cuevas	H	Concejal	34	Universitario	         	          	u	\N	80	\N	\N	\N	\N	\N	\N	\N	\N
714	\N	\N	\N	\N	\N	Alba	Bonilla	M	Secretaria Municipal	42	Universitario	         	          	u	\N	80	\N	\N	\N	\N	\N	\N	\N	\N
715	\N	48	6	\N	\N	José Candelario	Fuentes	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
716	\N	48	6	\N	\N	José Jesús	Salmerón	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
717	\N	48	6	\N	\N	Mauro	Fuentes Ruíz	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
718	\N	48	6	\N	\N	Andrea 	Álvarez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
719	\N	48	6	\N	\N	Amalia	Reyes	H	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
720	\N	48	6	\N	\N	Roxana Haydee	Flores Reyes	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
721	\N	48	6	\N	\N	Abel	Majano	H	Ciuidadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
722	\N	48	6	\N	\N	Victoria	Guevara	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
723	\N	48	6	\N	\N	Elba Nohemy	Salmerón	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
725	\N	48	6	\N	\N	Cesar Amilcar	López	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
724	\N	48	1	\N	\N	Alejandro	Sandoval	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
726	\N	48	2	\N	\N	David Yurandir	Gutiérrez	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
727	\N	49	6	\N	\N	Saúl 	González 	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
728	\N	49	6	\N	\N	Julio Cesar	Ferrufino	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
729	\N	49	6	\N	\N	Josue	Alfaro	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
730	\N	49	6	\N	\N	Walter Omar 	Ferrufino	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
731	\N	49	6	\N	\N	Exquiel Osmin	Cuevas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
732	\N	49	6	\N	\N	José Alberto 	Chamul	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
733	\N	49	6	\N	\N	Andrés Antonio 	Martínez	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
734	\N	49	6	\N	\N	Joel	González	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
735	\N	49	6	\N	\N	Luis	Villatoro	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
736	\N	49	6	\N	\N	Luis Armando 	Gómez	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
737	\N	49	6	\N	\N	Salvador 	Ferrufino	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
738	\N	49	6	\N	\N	Victoria 	Martínez	H	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
739	\N	49	6	\N	\N	Yeni Guadalupe 	Flores	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
740	\N	49	6	\N	\N	María del Camen	Cruz Bonilla	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
741	\N	49	6	\N	\N	Santos Alcídes 	ferrufino	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
742	\N	49	6	\N	\N	José Felipe 	López	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
743	\N	49	6	\N	\N	Fredy Orlando	Gómez	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
744	\N	49	6	\N	\N	Santos Porfirio	Fuentes	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
745	\N	49	6	\N	\N	Marixsa Esmeralda	Jimenes 	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
746	\N	49	6	\N	\N	Wilmer Ulises	Cuevas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
747	\N	49	2	\N	\N	Estela 	Quijano de Gutiérrez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
748	\N	54	6	\N	\N	José David 	Mercado	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
749	\N	54	6	\N	\N	María Lucinda 	Blanco	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
750	\N	54	6	\N	\N	Edwin Noé	Zúniga	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
751	\N	54	6	\N	\N	María de la Paz	Reyes	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
752	\N	54	6	\N	\N	Bessy Carolina	Ávila	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
753	\N	54	6	\N	\N	Josselin Marisela 	Rivas	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
754	\N	54	6	\N	\N	Ismael 	Berrios	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
755	\N	54	6	\N	\N	Fredy 	Rivas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
756	\N	54	6	\N	\N	José Juan 	Turcios	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
757	\N	54	6	\N	\N	Leandro 	Mercado	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
758	\N	54	6	\N	\N	Reyna de Luz 	García	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
759	\N	54	6	\N	\N	teresa	Rivera	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
760	\N	54	6	\N	\N	Fredy Hernan	Turcios	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
761	\N	54	6	\N	\N	Oscar	Rivas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
762	\N	54	6	\N	\N	José 	Ávila	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
763	\N	54	6	\N	\N	Bernardo 	Rivas	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
764	\N	54	6	\N	\N	Audelia	Zúniga	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
765	\N	54	1	\N	\N	Alba 	Bonilla	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
766	\N	54	6	\N	\N	Carlos Roberto 	Lazo	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
767	\N	55	6	\N	\N	Jorge Alberto 	Villatoro	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
768	\N	55	6	\N	\N	Francisco Antonio 	Reyes	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
769	\N	55	6	\N	\N	Santos Medardo 	Vasquéz	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
770	\N	55	6	\N	\N	Cristina 	Portillo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
771	\N	55	6	\N	\N	José Roberto 	Castillo 	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
772	\N	55	6	\N	\N	Amilcar 	Navarro	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
773	\N	55	6	\N	\N	Elías 	Lazo	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
774	\N	55	6	\N	\N	Marina	Reyes Lazo	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
775	\N	55	6	\N	\N	Ernestina	Álvarez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
776	\N	55	6	\N	\N	Rafael 	Villatoro	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
777	\N	55	6	\N	\N	Santos Tomasa	Gómez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
778	\N	55	6	\N	\N	Margarita 	Hernández	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
779	\N	55	6	\N	\N	Jasmín 	Romero Flores	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
780	\N	55	6	\N	\N	Dany Moises 	Aguirre Berrios	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
781	\N	55	6	\N	\N	BlancaEsperanza	Hernández	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
782	\N	55	6	\N	\N	Alfredo 	Umanzor	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
783	\N	55	2	\N	\N	Óscar Benjamín 	Pineda	H	Consultor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
784	\N	56	6	\N	\N	Francisco	Velásquez	H	Médico Director	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
785	\N	56	2	\N	\N	Neidy Xiomara	Rodríguez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
786	\N	56	2	\N	\N	Ana María	Alfaro de Rodas	M	Consultora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
787	\N	57	6	\N	\N	Yessica Isabel	Paz Benitez	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
788	\N	57	6	\N	\N	María Virginia	Bonilla	M	Ciudadana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
789	\N	57	1	\N	\N	Elmer Enrique	Reyes	H	Unidad de Medio Ambiente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
790	\N	57	6	\N	\N	Saúl	González	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
791	\N	57	6	\N	\N	Ever Omar	Flores	H	Ciudadano	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
792	\N	57	2	\N	\N	Ana María 	Alfaro	M	Consultora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
804	\N	60	1	\N	\N	Silvia Roxana	Parada	M	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
805	\N	60	1	\N	\N	Elmer Ulises	Rodríguez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
813	\N	60	2	\N	\N	Doris	Acosta	M	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
793	\N	57	2	\N	\N	Neidy Xiomara	Rodríguez Acosta	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
794	\N	47	1	\N	\N	Luis David	Penado	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
795	\N	47	2	\N	\N	Doris	Acosta	M	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
796	\N	47	1	\N	\N	Cristian	Amaya	H	Secretario Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
797	\N	47	1	\N	\N	Manuel Dolores 	Quintanilla	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
798	\N	47	1	\N	\N	Elmer Ulises	Rodríguez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
799	\N	59	1	\N	\N	Cristian Omar	Amaya	H	Secretario Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
800	\N	59	2	\N	\N	Ana María 	Alfaro	M	Consultora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
801	\N	59	2	\N	\N	Doris	Acosta	M	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
802	\N	60	1	\N	\N	Luis David	Penado	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
803	\N	60	1	\N	\N	Eunice Nohemy	Parada	M	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
806	\N	60	1	\N	\N	Salvador Romeo	Navarrete	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
807	\N	60	1	\N	\N	Napoleón	Murillo	H	Regidor Propietario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
808	\N	60	1	\N	\N	Ramón	Zerala	H	Regidor Propietario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
809	\N	60	1	\N	\N	José Adelio	Chávez	H	Regidor Suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
810	\N	60	1	\N	\N	María Elena	Ayala	M	Regidor Suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
811	\N	60	1	\N	\N	Manuel Dolores	Quintanilla	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
812	\N	60	1	\N	\N	Milagro Priscila	Peña	M	Concejal Suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
814	\N	61	1	\N	\N	José Armando	Cisneros	H	Unidad de Medio Ambiente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
816	\N	61	2	\N	\N	Neidy	Rodríguez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
817	\N	61	6	\N	\N	Gladis Esmeralda	Flores	M	Colaboradora Casa de Cultura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
815	\N	61	6	\N	\N	Néstor Rigoberto	Váquiz	H	Protección Cívil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
818	\N	62	6	\N	\N	Francisco	Merino	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
819	\N	62	1	\N	\N	Elmer Ulises	Rodríguez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
820	\N	62	1	\N	\N	Manuel Dolores	Quintanilla	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
821	\N	62	3	\N	\N	Humberto 	Guandique	H	Asesor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
822	\N	62	2	\N	\N	Neidy	Rodríguez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
823	\N	62	2	\N	\N	Ana María 	Alfaro	M	Consultora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
826	\N	\N	\N	\N	\N	Milagro Priscila	Peña	M	Primer Regidora, suplente	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
827	\N	\N	\N	\N	\N	Maria Elena	Ayala	M	Tercer Concejala, suplente	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
828	\N	\N	\N	\N	\N	Josè Adelio 	Chàvez	H	Segundo Regidor, suplente	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
829	\N	\N	\N	\N	\N	Napoleòn	Murillo	H	Sexto Regidor, propietario	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
830	\N	\N	\N	\N	\N	Salvador Romeo	Navarrete	H	Cuarto Regidor, suplente	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
831	\N	\N	\N	\N	\N	Elmer Ulises	Rodrìguez	H	Concejal	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
832	\N	\N	\N	\N	\N	Silvia Roxana	Parada	M	Concejal	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
833	\N	\N	\N	\N	\N	Eunice Nohemy	Parada M.	M	Tercer Regidora, propietaria	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
834	\N	\N	\N	\N	\N	David 	Penado	H	Alcalde	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
836	\N	\N	\N	\N	\N	Cristian Omar	Amaya	H	Secretario Municipal	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
837	\N	\N	\N	\N	\N	Estela	Gutièrrez	M	Tècnica	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
824	\N	\N	\N	\N	\N	Manuel Dolores	Quintanilla Q	H	Sindico	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
839	\N	\N	2	7	\N	Doris 	Acosta	M	Coordinadora	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
842	\N	\N	1	7	\N	Manuel Dolores	Quintanilla	H	Sindico	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
843	\N	\N	3	7	\N	Zenaida	Granados	M	Asesora	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
844	\N	\N	3	7	\N	Humberto	Guandique	H	Asesor	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
852	\N	\N	6	7	\N	Oscar	Guerrero	H	Lider	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
857	\N	\N	6	7	\N	Francisco 	Merino	H	Lider	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
860	\N	\N	6	7	\N	Javier	Santana Villalobos	H	Colaborador	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
864	\N	\N	6	7	\N	Sofia Elizabeth	Ayala	M	Lidereza	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
865	\N	\N	6	7	\N	Maria del Rosario	Castro	M	Lidereza	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
866	\N	\N	6	7	\N	Lidia Roxana	Torres	M	Lidereza	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
870	\N	\N	6	7	\N	Miguel Bautista	Garay	H	Lider	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
871	\N	\N	1	7	\N	Maria Elena	Ayala	H	Tercer Regidor, suplente	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
872	\N	\N	6	7	\N	Blanca Lidia	Granillo	M	Miembro de ADESCO	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
873	\N	\N	6	7	\N	Dora Alicia	Urias de Parada	M	Miembra de ADESCO	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
874	\N	\N	6	7	\N	Maria Esperanza	Urrutia	M	Miembra de ADESCO	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
875	\N	\N	1	7	\N	David Antonio	Castro	H	Sindico	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
876	\N	\N	6	7	\N	Alicia	Del Cid Zelaya	M	Encargada del Comedro Popular	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
877	\N	\N	6	7	\N	Oscar Arcides	G	H	Vecino del lugar	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
878	\N	\N	1	7	\N	Jose Elias	Rivas	H	Sindico	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
879	\N	\N	1	7	\N	Cristian Omar	Amaya	H	Secretario Municipal	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
880	\N	\N	6	7	\N	Jose Reinaldo	Argueta	H	Miembro de ADESCO	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
881	\N	\N	6	7	\N	Carlos Antonio	Arriola	H	Miembro de ADESCO	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
882	\N	\N	1	7	\N	Manuel Dolores	Quintanilla	H	Sindico	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
883	\N	\N	\N	\N	\N	Gladis Esmeralda	Flores	M	Casa de la Cultura	40	Bachiller	         	          	u	\N	83	\N	\N	\N	\N	\N	\N	\N	\N
885	7	\N	\N	\N	\N	Manuel Dolores	Quintanilla	H	Alcaldia Municipal	52	Profesional	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
886	\N	\N	\N	\N	\N	Gladis Esmeralda	Flores	M	Casa de la Cultura	40	Universitaria	         	          	u	\N	87	\N	\N	\N	\N	\N	\N	\N	\N
825	\N	\N	\N	\N	\N	Ramòn Sabel 	Zavala	H	Primer Regidor	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
840	\N	\N	1	7	\N	Napoleòn	Murillo	H	Concejal	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
845	\N	\N	6	7	\N	Deysi Milagro	Sòto de Diaz	M	Directora	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
846	\N	\N	6	7	\N	Ana Milagro	Lòpez	M	Profesora	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
850	\N	\N	6	7	\N	Mirna Lissette	Rìvas Cruz	M	Lidereza	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
851	\N	\N	6	7	\N	Marìa Narcisa	Flores	M	Lidereza	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
853	\N	\N	6	7	\N	Josè Luis	Palacios	H	Lider	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
854	\N	\N	6	7	\N	Josè Saùl	Cabrera	H	Lider	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
855	\N	\N	6	7	\N	Jorge Adalberto	Hernàndez	H	Jèfe de Proyectos	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
856	\N	\N	6	7	\N	Roberto Alessandro	Rodrìguez	H	Gerente	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
858	\N	\N	6	7	\N	Rigoberto	Hernàndez Portillo	H	Lider	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
849	\N	\N	6	7	\N	Juan	Andrade Rodrìguez	H	Lider	78	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
859	\N	\N	6	7	\N	Josè Armando	Cabrera	H	Directiva	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
861	\N	\N	6	7	\N	Yudith  Karina	Centeno	M	Lidereza	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
862	\N	\N	1	7	\N	Josè Adilio	Chàvez	H	Concejal	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
863	\N	\N	6	7	\N	Josè  Vicente	Zavala	H	Lider	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
867	\N	\N	6	7	\N	Josè  Rigoberto	Sosa	H	Sub Secretario	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
868	\N	\N	6	7	\N	Marìa Paula	Sosa	M	Lider	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
869	\N	\N	6	7	\N	Marìa Juana	Ayala	M	Lidereza	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
887	\N	\N	\N	\N	\N	Deysi Milagro	Soto de Diaz	M	Centro Escolar 14 de abril	57	Profesional	         	          	u	\N	87	\N	\N	\N	\N	\N	\N	\N	\N
838	\N	\N	\N	\N	\N	Oscar Benjamìn	Pineda	H	Consultor	\N	\N	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N
841	\N	\N	1	7	\N	Elmer Ulises	Rodrìguez	H	Concejal	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
884	7	\N	\N	\N	\N	Elmer Ulises 	Rodrìguez	H	Alcaldia Municipal	38	Profesional	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
888	\N	\N	\N	\N	\N	Orlando Alfredo 	Maldonado	H	Segundo regidor	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
889	\N	\N	\N	\N	\N	Elsi Raquel	Reyes grande	M	Tercera Regidora	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
890	\N	\N	\N	\N	\N	Lucy Idalia	Rodríguez Z.	M	Segunda Regidora suplente	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
891	\N	\N	\N	\N	\N	Fidel Alberto 	Cruz.	H	Sindico Municipal	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
892	\N	\N	\N	\N	\N	Luis Antonio 	Dheming	H	Alcalde Municipal	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
893	\N	\N	\N	\N	\N	José Francisco	Aparicio	H	Consultor	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
894	\N	\N	\N	\N	\N	Stanley Arquimides	Rodríguez	H	Consultor	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
895	\N	\N	\N	\N	\N	Kayra Marily	Romero	M	Jéfa de Participación	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
896	\N	\N	\N	\N	\N	Medardo Antonio	Pineda	H	Encargado de Unidad Ambiental	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
897	\N	\N	\N	\N	\N	Marta Lidia	Flores	M	Secretaria Municipal	\N	\N	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
898	\N	\N	1	8	\N	Kayra Mariyn	Romero	M	Jéfa	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
899	\N	\N	1	8	\N	Lucy Idalia	rodríguez	M	Concejal	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
900	\N	\N	6	8	\N	Isidra Marisol	Reyes	M	Lider Comunal	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
901	\N	\N	1	8	\N	Elsy Raquel	Reyes	M	Concejal	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
902	\N	\N	6	8	\N	Herbin Geovany	Blanco	H	Presidente	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
903	\N	\N	6	8	\N	Andrés	Velásquez	H	Secretario de Directiva	51	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
905	\N	\N	6	8	\N	Manuel de Jesús	Hernández	H	Pastor	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
906	\N	\N	6	8	\N	Joel	Canales	H	Pastor	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
907	\N	\N	6	8	\N	Zoila Abigail	Martínez	M	Secretaria	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
908	\N	\N	6	8	\N	Hernán 	Romero	H	Presidente	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
909	\N	\N	6	8	\N	María	Luna	M	Directiva	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
910	\N	\N	6	8	\N	Salvador 	Aranda Campos	H	Vecino del Lugar	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
911	\N	\N	6	8	\N	Medardo Antonio	Pineda	H	Unidad de Medio Ambiente	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
912	\N	\N	2	8	\N	David Yurandir	Gutiérrez	H	Técnico	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
904	\N	\N	6	8	\N	Nervin	Benítez	H	Vicepresidente	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
913	8	\N	\N	\N	\N	Hernán Alcides	Romero	H	Cantón El Salvadorcito	29		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
914	8	\N	\N	\N	\N	Zoila Abigaíl	Martínez	M	Cantón El Salvadorcito	48		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
915	8	\N	\N	\N	\N	Medardo Antonio	Pineda	H	Alcaldía Municipal.	27		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
916	8	\N	\N	\N	\N	Jeibin Yobanis	Blanco	H	Cantón El Salvadorcito	52		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
917	\N	\N	\N	\N	\N	Kayra Marilyn 	Romero	M	Alcaldía Municipal	32	Secretaria	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
918	\N	\N	\N	\N	\N	Lucy Idalia	Rodríguez	M	Alcaldía Municipal	35	Bachiller	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
919	\N	\N	\N	\N	\N	Stanley Arquímides	Rodríguez	H	Empresa Consultora	49	Profesional	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
920	\N	\N	\N	\N	\N	Luis Stanley	Rodríguez Acosta	H	Empresa Consultora	23	bachiller	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
921	\N	\N	\N	\N	\N	José Francisco	Aparicio Soto	H	Empresa Consultora	65	Profesional	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_capacitacion (par_id, cap_id, par_cap_participa, par_cap_id) FROM stdin;
704	78	Si	28
706	78	Si	30
705	78	Si	29
707	78	Si	31
708	78	Si	32
709	78	Si	33
710	78	Si	34
711	78	Si	35
712	78	Si	36
704	79	\N	37
705	79	\N	38
706	79	\N	39
707	79	\N	40
708	79	\N	41
704	80	No	42
705	80	No	43
706	80	No	44
707	80	No	45
708	80	No	46
713	80	Si	47
714	80	Si	48
883	83	Si	49
884	86	\N	50
885	86	\N	51
884	87	\N	52
885	87	\N	53
886	87	Si	54
887	87	Si	55
885	89	\N	56
884	89	\N	57
913	98	\N	58
914	98	\N	59
915	98	\N	60
916	98	\N	61
917	98	Si	62
918	98	Si	63
919	98	Si	64
920	98	Si	65
921	98	Si	66
\.


--
-- Data for Name: participante_definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_definicion (par_id, def_id, par_def_participa) FROM stdin;
3	7	\N
4	7	\N
5	7	\N
6	7	\N
7	7	\N
8	7	\N
9	7	\N
10	7	\N
11	7	\N
12	7	\N
13	7	\N
14	7	\N
15	7	\N
17	7	\N
16	7	\N
18	7	\N
19	7	\N
20	7	\N
21	7	\N
22	7	\N
23	7	\N
24	7	\N
25	7	\N
27	7	\N
28	7	\N
29	7	\N
30	7	\N
31	7	\N
32	7	\N
33	7	\N
34	7	\N
35	7	\N
36	7	\N
37	7	\N
38	7	\N
39	7	\N
40	7	\N
41	7	\N
42	7	\N
43	7	\N
44	7	\N
45	7	\N
46	7	\N
47	7	\N
48	7	\N
49	7	\N
50	7	\N
51	7	\N
52	7	\N
53	7	\N
54	7	\N
55	7	\N
56	7	\N
57	7	\N
58	7	\N
59	7	\N
60	7	\N
61	7	\N
62	7	\N
63	7	\N
64	7	\N
65	7	\N
66	7	\N
67	7	\N
68	7	\N
69	7	\N
70	7	\N
71	7	\N
72	7	\N
73	7	\N
74	7	\N
75	7	\N
76	7	\N
77	7	\N
78	7	\N
79	7	\N
80	7	\N
81	7	\N
82	7	\N
83	7	\N
84	7	\N
85	7	\N
86	7	\N
87	7	\N
88	7	\N
89	7	\N
90	7	\N
91	7	\N
92	7	\N
93	7	\N
94	7	\N
95	7	\N
96	7	\N
97	7	\N
98	7	\N
99	7	\N
100	7	\N
101	7	\N
102	7	\N
103	7	\N
104	7	\N
105	7	\N
106	7	\N
107	7	\N
108	7	\N
109	7	\N
110	7	\N
111	7	\N
112	7	\N
113	7	\N
114	7	\N
115	7	\N
116	7	\N
117	7	\N
118	7	\N
119	7	\N
120	7	\N
121	7	\N
122	7	\N
123	7	\N
124	7	\N
125	7	\N
126	7	\N
127	7	\N
128	7	\N
129	7	\N
130	7	\N
131	7	\N
132	7	\N
133	7	\N
134	7	\N
135	7	\N
136	7	\N
137	7	\N
138	7	\N
139	7	\N
140	7	\N
141	7	\N
142	7	\N
143	7	\N
144	7	\N
145	7	\N
146	7	\N
147	7	\N
148	7	\N
149	7	\N
150	7	\N
151	7	\N
153	7	\N
152	7	\N
154	7	\N
155	7	\N
156	7	\N
157	7	\N
158	7	\N
159	7	\N
160	7	\N
161	7	\N
162	7	\N
163	7	\N
164	7	\N
165	7	\N
166	7	\N
167	7	\N
168	7	\N
169	7	\N
170	7	\N
171	7	\N
172	7	\N
173	7	\N
174	7	\N
175	7	\N
176	7	\N
177	7	\N
178	7	\N
179	7	\N
180	7	\N
181	7	\N
182	7	\N
183	7	\N
184	7	\N
185	7	\N
186	7	\N
187	7	\N
188	7	\N
189	7	\N
190	7	\N
191	7	\N
236	7	\N
237	7	\N
247	7	\N
192	7	\N
205	7	\N
214	7	\N
220	7	\N
229	7	\N
240	7	\N
193	7	\N
206	7	\N
221	7	\N
230	7	\N
241	7	\N
194	7	\N
198	7	\N
207	7	\N
222	7	\N
231	7	\N
242	7	\N
195	7	\N
199	7	\N
208	7	\N
223	7	\N
232	7	\N
243	7	\N
196	7	\N
200	7	\N
209	7	\N
224	7	\N
233	7	\N
234	7	\N
244	7	\N
197	7	\N
202	7	\N
211	7	\N
215	7	\N
217	7	\N
226	7	\N
246	7	\N
201	7	\N
210	7	\N
216	7	\N
225	7	\N
235	7	\N
245	7	\N
203	7	\N
212	7	\N
218	7	\N
227	7	\N
238	7	\N
204	7	\N
213	7	\N
219	7	\N
228	7	\N
239	7	\N
248	7	\N
249	7	\N
250	7	\N
251	7	\N
252	7	\N
253	7	\N
254	7	\N
255	7	\N
256	7	\N
257	7	\N
258	7	\N
259	7	\N
260	7	\N
261	7	\N
262	7	\N
263	7	\N
264	7	\N
265	7	\N
266	7	\N
267	7	\N
268	7	\N
269	7	\N
270	7	\N
271	7	\N
272	7	\N
273	7	\N
274	7	\N
275	7	\N
276	7	\N
277	7	\N
278	7	\N
279	7	\N
280	7	\N
281	7	\N
282	7	\N
283	7	\N
284	7	\N
285	7	\N
286	7	\N
287	7	\N
288	7	\N
289	7	\N
290	7	\N
291	7	\N
292	7	\N
293	7	\N
294	7	\N
295	7	\N
296	7	\N
297	7	\N
298	7	\N
299	7	\N
300	7	\N
301	7	\N
302	7	\N
303	7	\N
304	7	\N
305	7	\N
306	7	\N
307	7	\N
308	7	\N
309	7	\N
310	7	\N
311	7	\N
312	7	\N
313	7	\N
314	7	\N
315	7	\N
316	7	\N
317	7	\N
318	7	\N
319	7	\N
320	7	\N
321	7	\N
322	7	\N
323	7	\N
324	7	\N
325	7	\N
326	7	\N
327	7	\N
328	7	\N
329	7	\N
330	7	\N
331	7	\N
332	7	\N
333	7	\N
334	7	\N
335	7	\N
336	7	\N
337	7	\N
338	7	\N
339	7	\N
340	7	\N
347	7	\N
356	7	\N
364	7	\N
371	7	\N
373	7	\N
374	7	\N
392	7	\N
403	7	\N
341	7	\N
358	7	\N
359	7	\N
367	7	\N
390	7	\N
400	7	\N
401	7	\N
342	7	\N
343	7	\N
350	7	\N
368	7	\N
377	7	\N
386	7	\N
395	7	\N
396	7	\N
406	7	\N
344	7	\N
353	7	\N
360	7	\N
361	7	\N
378	7	\N
397	7	\N
345	7	\N
354	7	\N
362	7	\N
370	7	\N
346	7	\N
355	7	\N
363	7	\N
381	7	\N
389	7	\N
399	7	\N
408	7	\N
348	7	\N
349	7	\N
351	7	\N
352	7	\N
357	7	\N
369	7	\N
379	7	\N
380	7	\N
387	7	\N
388	7	\N
398	7	\N
407	7	\N
365	7	\N
366	7	\N
372	7	\N
375	7	\N
376	7	\N
382	7	\N
383	7	\N
384	7	\N
385	7	\N
391	7	\N
393	7	\N
394	7	\N
402	7	\N
404	7	\N
405	7	\N
409	7	\N
410	7	\N
411	7	\N
412	7	\N
413	7	\N
414	7	\N
415	7	\N
416	7	\N
417	7	\N
418	7	\N
419	7	\N
420	7	\N
421	7	\N
422	7	\N
423	7	\N
424	7	\N
425	7	\N
426	7	\N
427	7	\N
428	7	\N
429	7	\N
430	7	\N
431	7	\N
432	7	\N
433	7	\N
434	7	\N
435	7	\N
436	7	\N
437	7	\N
438	7	\N
439	7	\N
440	7	\N
441	7	\N
442	7	\N
443	7	\N
444	7	\N
445	7	\N
446	7	\N
447	7	\N
448	7	\N
449	7	\N
450	7	\N
451	7	\N
452	7	\N
453	7	\N
454	7	\N
455	7	\N
456	7	\N
457	7	\N
458	7	\N
459	7	\N
460	7	\N
461	7	\N
462	7	\N
463	7	\N
464	7	\N
465	7	\N
466	7	\N
467	7	\N
468	7	\N
469	7	\N
470	7	\N
471	7	\N
472	7	\N
473	7	\N
474	7	\N
475	7	\N
476	7	\N
477	7	\N
478	7	\N
479	7	\N
480	7	\N
481	7	\N
482	7	\N
483	7	\N
484	7	\N
487	7	\N
485	7	\N
486	7	\N
493	7	\N
488	7	\N
489	7	\N
490	7	\N
491	7	\N
492	7	\N
494	7	\N
495	7	\N
496	7	\N
497	7	\N
498	7	\N
499	7	\N
500	7	\N
501	7	\N
502	7	\N
503	7	\N
504	7	\N
505	7	\N
506	7	\N
507	7	\N
508	7	\N
509	7	\N
510	7	\N
511	7	\N
512	7	\N
513	7	\N
514	7	\N
515	7	\N
516	7	\N
517	7	\N
518	7	\N
519	7	\N
520	7	\N
521	7	\N
522	7	\N
524	7	\N
525	7	\N
526	7	\N
527	7	\N
528	7	\N
529	7	\N
530	7	\N
531	7	\N
532	7	\N
533	7	\N
534	7	\N
535	7	\N
536	7	\N
537	7	\N
538	7	\N
539	7	\N
540	7	\N
541	7	\N
542	7	\N
543	7	\N
544	7	\N
545	7	\N
546	7	\N
547	7	\N
548	7	\N
549	7	\N
550	7	\N
551	7	\N
552	7	\N
553	7	\N
554	7	\N
555	7	\N
556	7	\N
557	7	\N
558	7	\N
559	7	\N
560	7	\N
561	7	\N
563	7	\N
564	7	\N
562	7	\N
565	7	\N
566	7	\N
567	7	\N
568	7	\N
569	7	\N
570	7	\N
571	7	\N
572	7	\N
573	7	\N
574	7	\N
575	7	\N
576	7	\N
577	7	\N
578	7	\N
579	7	\N
589	7	\N
580	7	\N
590	7	\N
581	7	\N
591	7	\N
582	7	\N
592	7	\N
583	7	\N
585	7	\N
584	7	\N
586	7	\N
587	7	\N
588	7	\N
593	7	\N
594	7	\N
595	7	\N
596	7	\N
597	7	\N
598	7	\N
599	7	\N
600	7	\N
601	7	\N
602	7	\N
603	7	\N
604	7	\N
605	7	\N
606	7	\N
607	7	\N
608	7	\N
609	7	\N
610	7	\N
611	7	\N
612	7	\N
613	7	\N
614	7	\N
615	7	\N
616	7	\N
617	7	\N
618	7	\N
619	7	\N
620	7	\N
621	7	\N
624	7	\N
626	7	\N
625	7	\N
628	7	\N
622	7	\N
623	7	\N
627	7	\N
629	7	\N
630	7	\N
631	7	\N
632	7	\N
633	7	\N
634	7	\N
635	7	\N
636	7	\N
637	7	\N
638	7	\N
639	7	\N
640	7	\N
641	7	\N
642	7	\N
643	7	\N
644	7	\N
645	7	\N
646	7	\N
647	7	\N
648	7	\N
649	7	\N
650	7	\N
652	7	\N
653	7	\N
654	7	\N
655	7	\N
656	7	\N
657	7	\N
658	7	\N
659	7	\N
660	7	\N
661	7	\N
662	7	\N
663	7	\N
664	7	\N
651	7	\N
665	7	\N
666	7	\N
667	7	\N
668	7	\N
669	7	\N
670	7	\N
671	7	\N
672	7	\N
673	7	\N
674	7	\N
675	7	\N
676	7	\N
677	7	\N
678	7	\N
679	7	\N
680	7	\N
681	7	\N
682	7	\N
683	7	\N
684	7	\N
699	7	\N
685	7	\N
694	7	\N
686	7	\N
690	7	\N
695	7	\N
687	7	\N
688	7	\N
689	7	\N
691	7	\N
693	7	\N
696	7	\N
698	7	\N
692	7	\N
697	7	\N
700	7	\N
701	7	\N
702	7	\N
703	7	\N
704	7	\N
705	7	\N
706	7	\N
707	7	\N
708	7	\N
709	7	\N
710	7	\N
711	7	\N
712	7	\N
713	7	\N
714	7	\N
715	7	\N
716	7	\N
717	7	\N
718	7	\N
719	7	\N
720	7	\N
721	7	\N
722	7	\N
723	7	\N
725	7	\N
724	7	\N
726	7	\N
727	7	\N
728	7	\N
729	7	\N
730	7	\N
731	7	\N
732	7	\N
733	7	\N
734	7	\N
735	7	\N
736	7	\N
737	7	\N
738	7	\N
739	7	\N
740	7	\N
741	7	\N
742	7	\N
743	7	\N
744	7	\N
745	7	\N
746	7	\N
747	7	\N
748	7	\N
749	7	\N
750	7	\N
751	7	\N
752	7	\N
753	7	\N
754	7	\N
755	7	\N
756	7	\N
757	7	\N
758	7	\N
759	7	\N
760	7	\N
761	7	\N
762	7	\N
763	7	\N
764	7	\N
765	7	\N
766	7	\N
767	7	\N
768	7	\N
769	7	\N
770	7	\N
771	7	\N
772	7	\N
773	7	\N
774	7	\N
775	7	\N
776	7	\N
777	7	\N
778	7	\N
779	7	\N
780	7	\N
781	7	\N
782	7	\N
783	7	\N
784	7	\N
785	7	\N
786	7	\N
787	7	\N
788	7	\N
789	7	\N
790	7	\N
791	7	\N
792	7	\N
804	7	\N
805	7	\N
813	7	\N
793	7	\N
794	7	\N
795	7	\N
796	7	\N
797	7	\N
798	7	\N
799	7	\N
800	7	\N
801	7	\N
802	7	\N
803	7	\N
806	7	\N
807	7	\N
808	7	\N
809	7	\N
810	7	\N
811	7	\N
812	7	\N
814	7	\N
816	7	\N
817	7	\N
815	7	\N
818	7	\N
819	7	\N
820	7	\N
821	7	\N
822	7	\N
823	7	\N
826	7	\N
827	7	\N
828	7	\N
829	7	\N
830	7	\N
831	7	\N
832	7	\N
833	7	\N
834	7	\N
836	7	\N
837	7	\N
824	7	\N
839	7	\N
842	7	\N
843	7	\N
844	7	\N
852	7	\N
857	7	\N
860	7	\N
864	7	\N
865	7	\N
866	7	\N
870	7	\N
871	7	\N
872	7	\N
873	7	\N
874	7	\N
875	7	\N
876	7	\N
877	7	\N
878	7	\N
879	7	\N
880	7	\N
881	7	\N
882	7	\N
883	7	\N
885	7	\N
886	7	\N
825	7	\N
840	7	\N
845	7	\N
846	7	\N
850	7	\N
851	7	\N
853	7	\N
854	7	\N
855	7	\N
856	7	\N
858	7	\N
849	7	\N
859	7	\N
861	7	\N
862	7	\N
863	7	\N
867	7	\N
868	7	\N
869	7	\N
887	7	\N
838	7	\N
841	7	\N
884	7	\N
\.


--
-- Data for Name: participante_priorizacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_priorizacion (par_id, pri_id, par_pri_participa) FROM stdin;
3	5	\N
4	5	\N
5	5	\N
6	5	\N
7	5	\N
8	5	\N
9	5	\N
10	5	\N
11	5	\N
12	5	\N
13	5	\N
14	5	\N
15	5	\N
17	5	\N
16	5	\N
18	5	\N
19	5	\N
20	5	\N
21	5	\N
22	5	\N
23	5	\N
24	5	\N
25	5	\N
27	5	\N
28	5	\N
29	5	\N
30	5	\N
31	5	\N
32	5	\N
33	5	\N
34	5	\N
35	5	\N
36	5	\N
37	5	\N
38	5	\N
39	5	\N
40	5	\N
41	5	\N
42	5	\N
43	5	\N
44	5	\N
45	5	\N
46	5	\N
47	5	\N
48	5	\N
49	5	\N
50	5	\N
51	5	\N
52	5	\N
53	5	\N
54	5	\N
55	5	\N
56	5	\N
57	5	\N
58	5	\N
59	5	\N
60	5	\N
61	5	\N
62	5	\N
63	5	\N
64	5	\N
65	5	\N
66	5	\N
67	5	\N
68	5	\N
69	5	\N
70	5	\N
71	5	\N
72	5	\N
73	5	\N
74	5	\N
75	5	\N
76	5	\N
77	5	\N
78	5	\N
79	5	\N
80	5	\N
81	5	\N
82	5	\N
83	5	\N
84	5	\N
85	5	\N
86	5	\N
87	5	\N
88	5	\N
89	5	\N
90	5	\N
91	5	\N
92	5	\N
93	5	\N
94	5	\N
95	5	\N
96	5	\N
97	5	\N
98	5	\N
99	5	\N
100	5	\N
101	5	\N
102	5	\N
103	5	\N
104	5	\N
105	5	\N
106	5	\N
107	5	\N
108	5	\N
109	5	\N
110	5	\N
111	5	\N
112	5	\N
113	5	\N
114	5	\N
115	5	\N
116	5	\N
117	5	\N
118	5	\N
119	5	\N
120	5	\N
121	5	\N
122	5	\N
123	5	\N
124	5	\N
125	5	\N
126	5	\N
127	5	\N
128	5	\N
129	5	\N
130	5	\N
131	5	\N
132	5	\N
133	5	\N
134	5	\N
135	5	\N
136	5	\N
137	5	\N
138	5	\N
139	5	\N
140	5	\N
141	5	\N
142	5	\N
143	5	\N
144	5	\N
145	5	\N
146	5	\N
147	5	\N
148	5	\N
149	5	\N
150	5	\N
151	5	\N
153	5	\N
152	5	\N
154	5	\N
155	5	\N
156	5	\N
157	5	\N
158	5	\N
159	5	\N
160	5	\N
161	5	\N
162	5	\N
163	5	\N
164	5	\N
165	5	\N
166	5	\N
167	5	\N
168	5	\N
169	5	\N
170	5	\N
171	5	\N
172	5	\N
173	5	\N
174	5	\N
175	5	\N
176	5	\N
177	5	\N
178	5	\N
179	5	\N
180	5	\N
181	5	\N
182	5	\N
183	5	\N
184	5	\N
185	5	\N
186	5	\N
187	5	\N
188	5	\N
189	5	\N
190	5	\N
191	5	\N
236	5	\N
237	5	\N
247	5	\N
192	5	\N
205	5	\N
214	5	\N
220	5	\N
229	5	\N
240	5	\N
193	5	\N
206	5	\N
221	5	\N
230	5	\N
241	5	\N
194	5	\N
198	5	\N
207	5	\N
222	5	\N
231	5	\N
242	5	\N
195	5	\N
199	5	\N
208	5	\N
223	5	\N
232	5	\N
243	5	\N
196	5	\N
200	5	\N
209	5	\N
224	5	\N
233	5	\N
234	5	\N
244	5	\N
197	5	\N
202	5	\N
211	5	\N
215	5	\N
217	5	\N
226	5	\N
246	5	\N
201	5	\N
210	5	\N
216	5	\N
225	5	\N
235	5	\N
245	5	\N
203	5	\N
212	5	\N
218	5	\N
227	5	\N
238	5	\N
204	5	\N
213	5	\N
219	5	\N
228	5	\N
239	5	\N
248	5	\N
249	5	\N
250	5	\N
251	5	\N
252	5	\N
253	5	\N
254	5	\N
255	5	\N
256	5	\N
257	5	\N
258	5	\N
259	5	\N
260	5	\N
261	5	\N
262	5	\N
263	5	\N
264	5	\N
265	5	\N
266	5	\N
267	5	\N
268	5	\N
269	5	\N
270	5	\N
271	5	\N
272	5	\N
273	5	\N
274	5	\N
275	5	\N
276	5	\N
277	5	\N
278	5	\N
279	5	\N
280	5	\N
281	5	\N
282	5	\N
283	5	\N
284	5	\N
285	5	\N
286	5	\N
287	5	\N
288	5	\N
289	5	\N
290	5	\N
291	5	\N
292	5	\N
293	5	\N
294	5	\N
295	5	\N
296	5	\N
297	5	\N
298	5	\N
299	5	\N
300	5	\N
301	5	\N
302	5	\N
303	5	\N
304	5	\N
305	5	\N
306	5	\N
307	5	\N
308	5	\N
309	5	\N
310	5	\N
311	5	\N
312	5	\N
313	5	\N
314	5	\N
315	5	\N
316	5	\N
317	5	\N
318	5	\N
319	5	\N
320	5	\N
321	5	\N
322	5	\N
323	5	\N
324	5	\N
325	5	\N
326	5	\N
327	5	\N
328	5	\N
329	5	\N
330	5	\N
331	5	\N
332	5	\N
333	5	\N
334	5	\N
335	5	\N
336	5	\N
337	5	\N
338	5	\N
339	5	\N
340	5	\N
347	5	\N
356	5	\N
364	5	\N
371	5	\N
373	5	\N
374	5	\N
392	5	\N
403	5	\N
341	5	\N
358	5	\N
359	5	\N
367	5	\N
390	5	\N
400	5	\N
401	5	\N
342	5	\N
343	5	\N
350	5	\N
368	5	\N
377	5	\N
386	5	\N
395	5	\N
396	5	\N
406	5	\N
344	5	\N
353	5	\N
360	5	\N
361	5	\N
378	5	\N
397	5	\N
345	5	\N
354	5	\N
362	5	\N
370	5	\N
346	5	\N
355	5	\N
363	5	\N
381	5	\N
389	5	\N
399	5	\N
408	5	\N
348	5	\N
349	5	\N
351	5	\N
352	5	\N
357	5	\N
369	5	\N
379	5	\N
380	5	\N
387	5	\N
388	5	\N
398	5	\N
407	5	\N
365	5	\N
366	5	\N
372	5	\N
375	5	\N
376	5	\N
382	5	\N
383	5	\N
384	5	\N
385	5	\N
391	5	\N
393	5	\N
394	5	\N
402	5	\N
404	5	\N
405	5	\N
409	5	\N
410	5	\N
411	5	\N
412	5	\N
413	5	\N
414	5	\N
415	5	\N
416	5	\N
417	5	\N
418	5	\N
419	5	\N
420	5	\N
421	5	\N
422	5	\N
423	5	\N
424	5	\N
425	5	\N
426	5	\N
427	5	\N
428	5	\N
429	5	\N
430	5	\N
431	5	\N
432	5	\N
433	5	\N
434	5	\N
435	5	\N
436	5	\N
437	5	\N
438	5	\N
439	5	\N
440	5	\N
441	5	\N
442	5	\N
443	5	\N
444	5	\N
445	5	\N
446	5	\N
447	5	\N
448	5	\N
449	5	\N
450	5	\N
451	5	\N
452	5	\N
453	5	\N
454	5	\N
455	5	\N
456	5	\N
457	5	\N
458	5	\N
459	5	\N
460	5	\N
461	5	\N
462	5	\N
463	5	\N
464	5	\N
465	5	\N
466	5	\N
467	5	\N
468	5	\N
469	5	\N
470	5	\N
471	5	\N
472	5	\N
473	5	\N
474	5	\N
475	5	\N
476	5	\N
477	5	\N
478	5	\N
479	5	\N
480	5	\N
481	5	\N
482	5	\N
483	5	\N
484	5	\N
487	5	\N
485	5	\N
486	5	\N
493	5	\N
488	5	\N
489	5	\N
490	5	\N
491	5	\N
492	5	\N
494	5	\N
495	5	\N
496	5	\N
497	5	\N
498	5	\N
499	5	\N
500	5	\N
501	5	\N
502	5	\N
503	5	\N
504	5	\N
505	5	\N
506	5	\N
507	5	\N
508	5	\N
509	5	\N
510	5	\N
511	5	\N
512	5	\N
513	5	\N
514	5	\N
515	5	\N
516	5	\N
517	5	\N
518	5	\N
519	5	\N
520	5	\N
521	5	\N
522	5	\N
524	5	\N
525	5	\N
526	5	\N
527	5	\N
528	5	\N
529	5	\N
530	5	\N
531	5	\N
532	5	\N
533	5	\N
534	5	\N
535	5	\N
536	5	\N
537	5	\N
538	5	\N
539	5	\N
540	5	\N
541	5	\N
542	5	\N
543	5	\N
544	5	\N
545	5	\N
546	5	\N
547	5	\N
548	5	\N
549	5	\N
550	5	\N
551	5	\N
552	5	\N
553	5	\N
554	5	\N
555	5	\N
556	5	\N
557	5	\N
558	5	\N
559	5	\N
560	5	\N
561	5	\N
563	5	\N
564	5	\N
562	5	\N
565	5	\N
566	5	\N
567	5	\N
568	5	\N
569	5	\N
570	5	\N
571	5	\N
572	5	\N
573	5	\N
574	5	\N
575	5	\N
576	5	\N
577	5	\N
578	5	\N
579	5	\N
589	5	\N
580	5	\N
590	5	\N
581	5	\N
591	5	\N
582	5	\N
592	5	\N
583	5	\N
585	5	\N
584	5	\N
586	5	\N
587	5	\N
588	5	\N
593	5	\N
594	5	\N
595	5	\N
596	5	\N
597	5	\N
598	5	\N
599	5	\N
600	5	\N
601	5	\N
602	5	\N
603	5	\N
604	5	\N
605	5	\N
606	5	\N
607	5	\N
608	5	\N
609	5	\N
610	5	\N
611	5	\N
612	5	\N
613	5	\N
614	5	\N
615	5	\N
616	5	\N
617	5	\N
618	5	\N
619	5	\N
620	5	\N
621	5	\N
624	5	\N
626	5	\N
625	5	\N
628	5	\N
622	5	\N
623	5	\N
627	5	\N
629	5	\N
630	5	\N
631	5	\N
632	5	\N
633	5	\N
634	5	\N
635	5	\N
636	5	\N
637	5	\N
638	5	\N
639	5	\N
640	5	\N
641	5	\N
642	5	\N
643	5	\N
644	5	\N
645	5	\N
646	5	\N
647	5	\N
648	5	\N
649	5	\N
650	5	\N
652	5	\N
653	5	\N
654	5	\N
655	5	\N
656	5	\N
657	5	\N
658	5	\N
659	5	\N
660	5	\N
661	5	\N
662	5	\N
663	5	\N
664	5	\N
651	5	\N
665	5	\N
666	5	\N
667	5	\N
668	5	\N
669	5	\N
670	5	\N
671	5	\N
672	5	\N
673	5	\N
674	5	\N
675	5	\N
676	5	\N
677	5	\N
678	5	\N
679	5	\N
680	5	\N
681	5	\N
682	5	\N
683	5	\N
684	5	\N
699	5	\N
685	5	\N
694	5	\N
686	5	\N
690	5	\N
695	5	\N
687	5	\N
688	5	\N
689	5	\N
691	5	\N
693	5	\N
696	5	\N
698	5	\N
692	5	\N
697	5	\N
700	5	\N
701	5	\N
702	5	\N
703	5	\N
704	5	\N
705	5	\N
706	5	\N
707	5	\N
708	5	\N
709	5	\N
710	5	\N
711	5	\N
712	5	\N
713	5	\N
714	5	\N
715	5	\N
716	5	\N
717	5	\N
718	5	\N
719	5	\N
720	5	\N
721	5	\N
722	5	\N
723	5	\N
725	5	\N
724	5	\N
726	5	\N
727	5	\N
728	5	\N
729	5	\N
730	5	\N
731	5	\N
732	5	\N
733	5	\N
734	5	\N
735	5	\N
736	5	\N
737	5	\N
738	5	\N
739	5	\N
740	5	\N
741	5	\N
742	5	\N
743	5	\N
744	5	\N
745	5	\N
746	5	\N
747	5	\N
748	5	\N
749	5	\N
750	5	\N
751	5	\N
752	5	\N
753	5	\N
754	5	\N
755	5	\N
756	5	\N
757	5	\N
758	5	\N
759	5	\N
760	5	\N
761	5	\N
762	5	\N
763	5	\N
764	5	\N
765	5	\N
766	5	\N
767	5	\N
768	5	\N
769	5	\N
770	5	\N
771	5	\N
772	5	\N
773	5	\N
774	5	\N
775	5	\N
776	5	\N
777	5	\N
778	5	\N
779	5	\N
780	5	\N
781	5	\N
782	5	\N
783	5	\N
784	5	\N
785	5	\N
786	5	\N
787	5	\N
788	5	\N
789	5	\N
790	5	\N
791	5	\N
792	5	\N
804	5	\N
805	5	\N
813	5	\N
793	5	\N
794	5	\N
795	5	\N
796	5	\N
797	5	\N
798	5	\N
799	5	\N
800	5	\N
801	5	\N
802	5	\N
803	5	\N
806	5	\N
807	5	\N
808	5	\N
809	5	\N
810	5	\N
811	5	\N
812	5	\N
814	5	\N
816	5	\N
817	5	\N
815	5	\N
818	5	\N
819	5	\N
820	5	\N
821	5	\N
822	5	\N
823	5	\N
826	5	\N
827	5	\N
828	5	\N
829	5	\N
830	5	\N
831	5	\N
832	5	\N
833	5	\N
834	5	\N
836	5	\N
837	5	\N
824	5	\N
839	5	\N
842	5	\N
843	5	\N
844	5	\N
852	5	\N
857	5	\N
860	5	\N
864	5	\N
865	5	\N
866	5	\N
870	5	\N
871	5	\N
872	5	\N
873	5	\N
874	5	\N
875	5	\N
876	5	\N
877	5	\N
878	5	\N
879	5	\N
880	5	\N
881	5	\N
882	5	\N
883	5	\N
885	5	\N
886	5	\N
825	5	\N
840	5	\N
845	5	\N
846	5	\N
850	5	\N
851	5	\N
853	5	\N
854	5	\N
855	5	\N
856	5	\N
858	5	\N
849	5	\N
859	5	\N
861	5	\N
862	5	\N
863	5	\N
867	5	\N
868	5	\N
869	5	\N
887	5	\N
838	5	\N
841	5	\N
884	5	\N
\.


--
-- Data for Name: participante_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_reunion (par_id, reu_id, par_reu_participa) FROM stdin;
\.


--
-- Data for Name: perfil_municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY perfil_municipio (mun_id, per_mun_partido, per_mun_territorio, per_mun_tipologia, per_mun_urbana_hombres, per_mun_urbana_mujeres, per_mun_rural_hombres, per_mun_rural_mujeres, per_mun_poblacion, per_mun_observaciones) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: perfil_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY perfil_proyecto (per_pro_id, per_pro_fentrega_isdem, per_pro_fentrega_uep, per_pro_fnota_autorizacion, per_pro_fentrega_u_i, per_pro_ftdr, per_pro_fespecificacion, per_pro_fcarpeta_reducida, per_pro_frecibe_municipio, per_pro_femision_acuerdo, per_pro_fcertificacion, per_pro_frecibe, per_pro_fencio_fisdl, per_pro_consultor_individual, per_pro_firma, per_pro_ong, per_pro_observacion, per_pro_tdr_ruta_archivo, per_pro_esp_ruta_archivo, per_pro_car_ruta_archivo, per_pro_acu_ruta_archivo, mun_id, per_pro_per_ruta_archivo, per_pro_doc_ruta_archivo) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	300	\N	\N
2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N	\N
3	2013-03-01	2013-03-02	2013-03-03	2013-03-04	2013-03-05	2013-03-06	2013-03-07	2013-03-08	2013-03-09	2013-03-10	2013-03-11	2013-03-12	t	\N	\N	TDR	0	0	0	0	301	0	\N
\.


--
-- Data for Name: personal_enlace; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY personal_enlace (per_enl_id, acu_mun_id, per_enl_nombre, per_enl_apellido, per_enl_sexo, per_enl_cargo) FROM stdin;
\.


--
-- Data for Name: pestania_proceso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY pestania_proceso (pes_pro_id, pes_pro_nombre) FROM stdin;
4	PEP
1	Plan de Trabajo
2	Condiciones Previas
3	Diagnóstico
5	Gestión y Seguimiento
\.


--
-- Data for Name: plan_contingencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_contingencia (pla_con_id, pla_con_numero, pla_con_nombre, pla_con_descripcion, pla_con_fdocumento, pla_con_tipo, rev_inf_id) FROM stdin;
1	0	MiPlan	Descripción	2013-03-09	1	4
2	0	Otroformato	Descripción	2013-03-10	2	4
3	0	TuPlan	0	2013-03-09	3	4
\.


--
-- Data for Name: plan_inversion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_inversion (pla_inv_id, pla_inv_observacion, pro_pep_id) FROM stdin;
3	\N	28
4	\N	30
\.


--
-- Data for Name: plan_trabajo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_trabajo (pla_tra_id, pla_tra_forden_inicio, pla_tra_fentrega_plan, pla_tra_frecepcion_obs, pla_tra_fsuperacion_obs, pla_tra_fvisto_bueno, pla_tra_fpresentacion, pla_tra_frecepcion, pla_tra_firmada_mun, pla_tra_firmada_isdem, pla_tra_firmada_uep, mun_id, pla_tra_ruta_archivo, pla_tra_observaciones) FROM stdin;
2	2013-02-01	2013-02-04	2013-02-05	2013-02-06	2013-02-07	2013-02-08	2013-02-11	f	t	f	1	documentos/plan_trabajo/plan_trabajo2.pdf	
\.


--
-- Data for Name: poblacion_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY poblacion_reunion (pob_id, pob_comunidad, pob_sector, pob_institucion, reu_id) FROM stdin;
29	\N	\N	\N	16
30	\N	\N	\N	63
31	\N	\N	\N	64
32	\N	\N	\N	65
33	\N	\N	\N	66
34	\N	\N	\N	67
35	\N	\N	\N	69
36	\N	\N	\N	70
37	\N	\N	\N	71
38	\N	\N	\N	72
39	\N	\N	\N	73
40	\N	\N	\N	75
\.


--
-- Data for Name: portafolio_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY portafolio_proyecto (por_pro_id, por_pro_area, por_pro_tema, por_pro_nombre, por_pro_descripcion, por_pro_ubicacion, por_pro_costo_estimado, por_pro_fecha_desde, por_pro_fecha_hasta, por_pro_beneficiario_h, por_pro_beneficiario_m, por_pro_observacion, por_pro_ruta_archivo, pro_pep_id, por_pro_anio1, por_pro_anio2, por_pro_anio3, por_pro_anio4, por_pro_anio5) FROM stdin;
2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	19	0.00	0.00	0.00	0.00	0.00
3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	19	0.00	0.00	0.00	0.00	0.00
4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	30	0.00	0.00	0.00	0.00	0.00
\.


--
-- Data for Name: presentes_empleados; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY presentes_empleados (seg_eva_id, emp_id) FROM stdin;
\.


--
-- Data for Name: presentes_participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY presentes_participante (par_id, seg_eva_id, par_nombre, par_apellidos, par_sexo, par_edad, par_cargo, par_telefono) FROM stdin;
\.


--
-- Data for Name: presupuesto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY presupuesto (pre_id, com_id, pre_tipo, pre_cantidad) FROM stdin;
\.


--
-- Data for Name: priorizacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY priorizacion (pri_id, pri_fecha, pri_observacion, pro_pep_id) FROM stdin;
2	\N	\N	19
3	\N	\N	29
4	\N	\N	26
5	\N	\N	27
6	\N	\N	28
7	\N	\N	30
\.


--
-- Data for Name: problema_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY problema_identificado (pro_ide_id, pro_ide_tema, pro_ide_problema, pro_ide_prioridad, are_dim_id, reu_id, def_id) FROM stdin;
\.


--
-- Data for Name: proceso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proceso (pro_id, pro_numero, pro_fpublicacion, pro_faclara_dudas, pro_fexpresion_interes, pro_observacion1, pro_pub_ruta_archivo, pro_exp_ruta_archivo, pro_finicio, pro_ffinalizacion, pro_fenvio_informacion, pro_flimite_recepcion, pro_fsolicitud, pro_frecepcion, pro_fcierre_negociacion, pro_ffirma_contrato, mun_id, pro_faperturatecnica, pro_faperturafinanciera, pro_observacion2) FROM stdin;
2	1	2013-03-02	2013-03-03	2013-03-04	0			\N	\N	\N	\N	\N	\N	\N	\N	1	\N	\N	\N
\.


--
-- Data for Name: proceso_etapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proceso_etapa (pro_eta_id, pro_eta_observacion, pes_pro_id, mun_id) FROM stdin;
21		5	193
18		2	193
19		3	193
20		4	193
17		1	193
22	\N	1	193
23	\N	2	193
24	\N	3	193
25	\N	4	193
26	\N	5	193
27	\N	1	1
28	\N	2	1
29	\N	3	1
30	\N	4	1
31	\N	5	1
\.


--
-- Data for Name: proyeccion_ingreso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyeccion_ingreso (pro_ing_id, pro_ing_observacion, pro_pep_id) FROM stdin;
\.


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto (pro_id, mun_id, com_id, pro_codigo, pro_nombre, pro_num_ord_llegada, pro_zona_fisdl, pro_nom_formulador, pro_nom_ref_tec_municipal, pro_email_ref_tec_municipal, pro_tel_ref_tec_municipal, pro_nom_ase_fisdl, pro_email_ase_fisdl, pro_tel_ase_fisdl, pro_fec_ent_gl_fisdl, pro_fec_ent_gop_gpr, pro_rec_gpr, pro_fec_ent_gpr_din, pro_estatus, pro_mon_ejecucion, pro_fec_visita, pro_num_rev, pro_fec_visado, pro_mon_visado, pro_obs_din, pro_tipologia, pro_sal_par_ciudadana, pro_sal_pue_indigenas, pro_sal_rea_involuntario) FROM stdin;
\.


--
-- Data for Name: proyecto_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto_identificado (pro_ide_id, pro_ide_nombre, pro_ide_ubicacion, pro_ide_ff, pro_ide_monto, pro_ide_plazoejec, pro_ide_pbh, pro_ide_pbm, pro_ide_prioridad, pro_ide_estado, pro_ide_ruta_archivo, pri_id) FROM stdin;
\.


--
-- Data for Name: proyecto_pep; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto_pep (pro_pep_id, pro_pep_nombre, mun_id, inf_pre_id, inv_inf_id, gru_apo_id, con_id, gru_ges_id, def_id, pri_id, dia_id, pro_pep_firmacm, pro_pep_firmais, pro_pep_firmaue, pro_pep_fecha_borrador, pro_pep_fecha_observacion, pro_pep_fecha_aprobacion, pro_pep_ruta_archivo, pro_pep_observacion, int_ins_id, pro_ing_id, pla_inv_id, est_com_id) FROM stdin;
2	Proyecto PEP Concepción de Ataco	4	\N	\N	\N	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	Proyecto PEP Acajutla 	224	\N	\N	\N	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	Salcoatitan	232	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	Santa Ana	220	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	San Antonio Pajonal	218	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	Santa Rosa Guachipilín	221	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
11	Tonacatepeque	197	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
13	Huizúcar	76	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
14	Nueva Concepción	37	\N	\N	\N	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
15	San Ignacio 	46	\N	\N	\N	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
16	El Paraíso	31	\N	\N	\N	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
17	San Rafael	52	\N	\N	\N	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
18	Zacatecoluca	114	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
21	Nueva Granada	251	\N	\N	\N	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
22	Nuevo Edén de San Juan	169	\N	\N	\N	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	Carolina	159	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
24	Joateca	142	\N	\N	\N	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
12	Guazapa	185	\N	3	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
34	Proyecto PEP El Congo	214	\N	\N	\N	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
35	Proyecto PEP Chalatenango	25	\N	\N	\N	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	Proyecto PEP El Refugio	5	\N	4	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	Proyecto PEP Turín	12	\N	\N	\N	6	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	El Rosario	58	\N	5	\N	21	\N	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
36	Proyecto PEP	21	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	Caluco	226	\N	\N	3	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
25	Corinto	136	11	\N	\N	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
20	Tepetitán	209	12	\N	\N	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
29	San José la Fuente	129	\N	8	6	31	4	5	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
26	Chinameca	161	\N	6	4	28	5	6	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N	\N	\N
28	El Transito	165	\N	9	7	30	6	8	6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
27	Uluazapa	178	\N	7	5	29	7	7	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
30	Meanguera del Golfo	124	\N	10	8	32	8	9	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
\.


--
-- Data for Name: proyectos_cc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyectos_cc (cc_id, id_proy_cc, monto_proy, com_beneficiadas, pob_beneficiada, tipo_proy, nombre_proy) FROM stdin;
\.


--
-- Data for Name: recibido_municipalidad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY recibido_municipalidad (rec_mun_id, rec_mun_correlativo, rec_mun_frecibido, rec_mun_observacion, ela_pro_id) FROM stdin;
1	1	2013-03-08	Ninguna	5
\.


--
-- Data for Name: region; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY region (reg_id, reg_nombre, reg_direccion) FROM stdin;
1	Central	\N
3	Oriental	\N
4	Occidental	\N
2	Paracentral	\N
\.


--
-- Data for Name: resultado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY resultado (res_id, res_nombre) FROM stdin;
1	Visión de desarrollo del municipio
2	Objetivos Socio-Culturales
3	Objetivos Econónicos
4	Objetivos Ambientales
5	Objetivos Político-Institucionales
6	Programas e ideas de acciones estratégicas y proyectos
\.


--
-- Data for Name: resultado_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY resultado_reunion (res_id, reu_id, res_reu_valor) FROM stdin;
1	7	\N
2	7	\N
3	7	\N
4	7	\N
5	7	\N
6	7	\N
1	8	f
2	8	f
3	8	f
4	8	f
5	8	f
6	8	f
\.


--
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY reunion (reu_id, eta_id, reu_numero, reu_fecha, reu_duracion_horas, reu_tema, reu_resultado, reu_observacion, pro_pep_id, reu_duracion_minutos) FROM stdin;
9	1	1	\N	0	\N	\N	\N	12	0
12	1	1	\N	0	\N	\N	\N	3	0
14	1	1	\N	0	\N	\N	\N	5	0
15	1	1	\N	0	\N	\N	\N	36	0
16	2	1	\N	0	\N	\N	\N	12	0
17	1	2	\N	0	\N	\N	\N	12	0
18	1	1	\N	0	\N	\N	\N	6	0
19	1	1	2012-08-21	3	Establecer enlaces con autoridades municipales	Verificación del total de cantones, barrios, colonias y sectores del Municipio. 		9	0
20	1	2	2012-08-27	1	Presentación del Plan de Trabajo	Presentación del Plan de Trabajo presentado al Concejo Municipal y definir compromisos Empresa Consultora y Municipalidad		9	45
41	1	5	2013-01-10	1	Reunión de socialización con equipo Municipal y referentes ELA Municipales.	Realizar la primera jornada de capacitación del ELA el 17 de enero de 2013.		26	45
21	1	3	2012-09-01	1	Divulgación de Colonia Vista Hermosa de San Antonio Pajonal	Presentación y exposición del proceso a seguir para la evaluación del plan estratégico participativo del Municipio. 		9	15
23	1	4	2012-09-03	1	Divulgación en Casa Comunal de Caserio el Mojon Cantón La Piedrona	Compartir con la comunidad el proceso de divulgación del PEP		9	45
24	1	5	2012-09-10	2	Reunión de divulgación en centro escolar del cantón El Angel	Divulgación de inicio de proceso de elaboracion del plan estratégico participativo		9	0
25	1	6	2012-09-12	1	Planificación Estratégica Perticipativa	Divulgación de inicio del Plan Estrategico Participativo en el municipio		9	5
26	1	7	2012-09-13	1	Planificacion Estrategica Participativa	Divulgación de Proceso de ELaboracion del Plan Estrategico en el municipio		9	20
27	1	8	2012-09-13	2	Divulgación del Proceso para elaborar el Plan Estrategico Participativo	Divulgación del Plan Estratégico Participativo dentro de la comunidad.		9	10
28	1	9	2012-09-17	2	Divulgación del proceso para elaborar el plan estratégico participativo en San Antonio Pajonal, Santa Ana	Reunión de Divulgación con los Barrios y Col. España del inicio del proceso de Plan Estratégico Participativo en el Municipio.		9	0
29	1	10	2012-09-19	1	Divulgación del Proceso para elaborar el Plan Estratégico Participativo en Cantón La Piedrona de an Antonio Pajonal, Santa Ana.	Dar a conocer a los pobladores del Cantón La Piedrona Centro, sobre la elaboración del Proceso Participativo denominado: Plan Estratégico Participativo.		9	17
30	1	11	2012-09-20	2	Divulgación del Proceso para Elaborar el Plan Estratégico Participativo en Caserío Las Cuevitas de San Antonio Pajonal, Santa Ana.	Reunión de divulgación de inicio de proceso de elaboración del Plan Estratégico Participativo en la cual se dio a conocer el proceso a seguir y las etapas en la cual esta dividida la consultoria.		9	4
31	1	12	2012-09-20	1	Reunión con Instituciones Gubernamentales	Divulgación del Proceso para elaborar el PEP.		9	9
32	1	13	2012-09-21	1	Asamblea de Compromiso Publico	Desarrollo de Asamblea de Declaración Publica		9	40
33	1	14	2012-09-24	1	Planificación Estrategica Participativa	Reunión con coordinadores de asociación Trifinio y lideres del municipio en taller de identificación de limites del municipio e identificación de los sectores económicos y como están distribuidos en el municipio. 		9	25
34	1	15	2012-09-28	1	Planificación Estrategica Participativa	Desarrollar capacidades básicas al interior del equipo local de apoyo al desarrollo de planificación del municipio.		9	3
37	1	1	2012-12-14	0	Informar a la Unidad de Salud que la empresa CODEIN S.A de C.V va a participar en la realización del PEP del Municipio para mejorar la situación Municipal.	El promotor de salud manifestó que está dispuesto a colaborar con la información que se necesite del estado de salud de la población de Chinameca, solo hay que hablar con la Directora de la Unidad de Salud.	La Unidad de Salud pide identificación de la Empresa, nos identificamos con nuestros números de DUI.	26	30
38	1	2	2012-12-14	0	Invitación abierta a Asamblea Ciudadana.\n	1. La invitación a la Asamblea deberá ser por escrito, con 3 días de anticipación al evento.\n2. Se genera compromiso de asistencia.\n3. Se da el compromiso de acompañar y dar seguridad en la Asamblea y otras etapas del proceso del PEP.	1. Existen niveles de coordinación con centros escolares, Alcaldía, protección civil, cruz roja, iglesias, SIBASI.\n2. Se cuentan con bases de datos, indicadores por sectores o zonas, número de habitantes, nivel de delicuencia, denuncias, violencia intrafamiliar, hurto, robos, violaciones, homicidio.	26	20
39	1	3	2012-12-14	1	Coordinación de visitas a Cantones y Asamblea Ciudadana de compromiso.	1. Realizar durante la etapa de diagnostico visitas más detenidas a los Cantones.\n2. Realizar la Asamblea Ciudadana, con barrios, colonias, sectores y algunos líderes cantonales.		26	30
40	1	4	2013-01-10	0	Levantamiento de información de bienes culturales del Municipio de Chinameca; vaciado de inventario de la ficha de bienes culturales.	La Directora de la Casa de la Cultura se comprometió a participar en el proceso de la elaboración del PEP.	Se finalizó la ficha de inventario.	26	30
42	1	6	2013-01-10	0	Informar al sector Iglesia sobre el proceso de elaboración del PEP.	Mantener informado al sector sobre el proceso del PEP e invitarlo a participar en los talleres diagnostico.		26	30
43	1	7	2013-01-17	0	Recolección de información de educación.	Recolección de información sobre matrícula 2012 y se comprometió a ayudar en el proceso de elaboración del PEP.		26	15
44	1	8	2013-01-22	2	Planificación de visitas diagnostico.	1. Se hizo una propuesta de agrupamiento territorail y se definieron fechas para los talleres.		26	0
45	1	9	2013-01-31	1	Lograr calendarización para Asambleas de diagnósticos municipales, territoriales y sectoriales.	Se logró un acuerdo para calendarizar fechas para la realizacipon de 7 asambleas. Se anexa calendario de zonas, fechas y lugar para la realización de las asambleas.	Contactar por medio de facebook a Rene Girón, un pintor muy destacado de Chinameca.	26	0
46	1	2	2013-01-14	1	Visita de sensibilización a la población de Uluzapa.			27	15
36	1	1	2013-01-14	3	Visita a sectores privados y públicos para sensibilizar del proyecto PEP.	Se comprometieron a asistir a la Asamblea para conocer más del plan PEP y apoyar en dicho momento para su elaboración del plan.		27	0
50	1	3	2013-01-14	0	Sensibilizar a la comunidad sobre la importancia de participar del PEP comenzando por la Asamblea Ciudadana.	Se acordó que asistirían a la Asamblea.		27	30
51	1	4	2013-01-14	1	Entregar invitación a personas para la Asamblea Ciudadana.	Asistirán al evento.		27	45
52	1	5	2013-01-14	0	Entregar invitaciones para la Asamblea Ciudadana.	Se comprometieron a asistir a la Asamblea.		27	40
53	1	6	2013-01-31	2	1. Recopilación relevante del Municipio de Uluazapa obtenida de los miembros del ELA.\n2. Explicación de la forma en que se trabajaran los talleres.	1. Miembros del ELA colaboraran para obtener datos antiguos del Municipio y aportaran nombres de personas que podrían colaborar.\n2. Traer las convocatorias 3 días antes de la Asamblea.	1. Incluir Ley de Impuestos Municipales en el plan.	27	0
48	1	1	2012-12-14	1	Invitar a personas del lugar a que sean parte de una Asamblea Ciudadana.	De los asistentes, cuatro personas van a llegar el lunes 17 de diciembre de 203 a la Asamblea Ciudadana.	Se observan muchas ganas de colaborar el proceso.	29	10
49	1	2	2012-12-14	1	Invitar a personas del Cantón La Joya para que participen en una Asamblea Ciudadana.	De las personas que participaron quedaron que siete de asistir a la Asamblea Ciudadana.	A pesar de las condiciones de la calle en mal estado las personas se ven muy comprometidas a participar del proceso.\nExiste una Directiva del Cantón que se une con líderes cristianos evangélicos.	29	0
54	1	3	2012-12-14	1	Invitar a las personas del Cantón Chaguitillo a participar de la Asamblea Ciudadana.	Las personas invitadas del Cantón acordaron asistir para poder participar del proceso.	Asistió una persona más pero debido a la ilegibilidad no fue colocado en la lista de arriba.\nEn el Cantón se cuenta con un Promotor de Salud.	29	0
55	1	4	2012-12-14	2	Invitar a las personas de los  Barrios del Centro a participar del proceso.	Las personas de los Barrios acordaron que asistirían a la Asamblea Ciudadana para poder participar en el proceso y mejor el Municipio.	Asistieron dos personas más pero existe ilegibilidad en sus nombres, uno es mujer y otro hombre.	29	30
56	1	5	2013-02-01	1	Recopilación de información básica de salud del Municipio. 	El Dr. Francisco Javier Sorto Velásquez se comprometió a brindar información para la elaboración del proceso.	Muy buena actitud del Dr. Velásquez para poder ayudar con el proceso.	29	0
57	1	6	2013-02-01	2	Reunión de socialización con el ELA para socializar las herramientas de trabajo.	Se mantiene el diagnóstico territorial para el día Viernes 22 de febrero, el cual se hará simultáneamente. 	Se observa en relación al diagnóstico que la mayor fortaleza de trabajo e información se encuentra en el área de Medio Ambiente.\n\nSe pudo obtener completo el mapeo de actores del municipio y un mayor conocimiento de integrantes del ELA.	29	30
58	1	1	\N	0	\N	\N	\N	30	0
47	1	1	2013-01-09	0	Revisar la actividades, resultados y tiempos de la primera etapa del proceso de elaboración del Plan Estratégico Participativo.	Se harán las visitas de sensibilización a los Cantones, Zona Urbana y Sectores con el apoyo del Concejo Municipal y el ELA.	Muy buena disposición del Dr. Luis Penado para participar en el proceso.	28	45
59	1	2	2013-01-11	1	Calendarizar actividades pendientes y monitorear el proceso	El próximo lunes 21 de enero se definirá fecha para realizar Asamblea Ciudadana.\n\nSe realizará una reunión informativa sobre el proceso con el personal municipal, queda pendiente la fecha.\n\n	Se mostró mucha apertura y preocupación por parte del Secretario Municipal del retrazo en el proceso.\n	28	45
60	1	3	2013-01-17	0	Coordinar con el Concejo Municipal y con los enlaces para formar el ELA y entregar invitaciones.	Se harán las visitas a las comunidades rurales para invitarlos a la Asamblea.	La Empresa Consultora elaboró modelo de invitaciones para participar en la Asamblea Ciudadana.	28	30
61	1	4	2013-01-23	1	Recopilación de información en área Medio Ambiente y Protección Civil.	Tanto el Sr. Armando Cisneros, Jefe de la Unidad Ambiental como el Técnico Nestor Váquiz de Protección Civil se comprometió a brindar información para realizar un adecuado diagnóstico.	1. Por parte de la Unidad Ambiental se tiene en mente iniciar un proyecto de separación de desechos sólidos.\n\n2. Las aguas negras no son tratadas.	28	30
62	1	5	2013-02-01	2	Reunión con el ELA para mapeo de actores.	Identificación de instituciones y funciones del municipio.	Convocar con dos días de anticipación a los miembros del ELA para lograr el mayor quorum posible.	28	0
63	2	1	\N	0	\N	\N	\N	29	0
64	2	2	\N	0	\N	\N	\N	29	0
65	2	3	\N	0	\N	\N	\N	29	0
66	2	4	\N	0	\N	\N	\N	29	0
67	2	5	\N	0	\N	\N	\N	29	0
68	1	6	\N	0	\N	\N	\N	28	0
69	2	1	\N	0	\N	\N	\N	26	0
70	2	2	\N	0	\N	\N	\N	26	0
71	2	1	\N	0	\N	\N	\N	28	0
72	2	1	\N	0	\N	\N	\N	27	0
73	2	2	\N	0	\N	\N	\N	27	0
74	1	2	\N	0	\N	\N	\N	30	0
75	2	1	\N	0	\N	\N	\N	30	0
\.


--
-- Data for Name: revapro_productos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revapro_productos (rea_pro_id, mun_id, rea_pro_fecha_presentacion, rea_pro_fecha_vistobueno, rea_pro_fecha_aprobacion, rea_pro_is_plan_trabajo, rea_pro_is_perfil, rea_pro_is_ind_endeudamiento, rea_pro_is_ind_comp, rea_pro_is_informe_diag, rea_pro_is_visto_bueno, rea_pro_observaciones, rea_pro_archivo_acta) FROM stdin;
\.


--
-- Data for Name: revapro_productos2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revapro_productos2 (rea_pro_id, mun_id, rea_pro_fecha_presentacion, rea_pro_fecha_vistobueno, rea_pro_fecha_aprobacion, rea_pro_is_informe_etapa, rea_pro_is_borrador, rea_pro_is_visto_bueno, rea_pro_observaciones, rea_pro_archivo_acta) FROM stdin;
\.


--
-- Data for Name: revision_informacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revision_informacion (rev_inf_id, rev_inf_fregistro_asesor, rev_inf_frevision_uep, rev_inf_adjunto_doc, rev_inf_plan_municipalidad, rev_inf_plan_contingencia, rev_inf_felaboracion, rev_inf_plan_oformato, rev_inf_gestion_reactiva, rev_inf_ogestion_reactiva, rev_inf_gestion_correctiva, rev_inf_ogestion_correctiva, rev_inf_gestion_prospectiva, rev_inf_ogestion_prospectiva, rev_inf_plan_comunal, rev_inf_mapa, rev_inf_presentoa, rev_inf_conclusion, rev_inf_presento, rev_inf_comision_conformada, rev_inf_fconformacion, rev_inf_presentob_eo, rev_inf_dpresentob_eo, rev_inf_comision, rev_inf_acta_comision, rev_inf_dacta_comision, rev_inf_capacitacion, rev_inf_dcapacitacion, rev_inf_herramienta, rev_inf_inv_herramienta, rev_inf_dinv_herramienta, rev_inf_presentoc, rev_inf_dpresentoc, rev_inf_presentod, rev_inf_mapa_identificacion, rev_inf_dmapa_identificacion, rev_inf_presentoe, rev_inf_dpresentoe, rev_inf_presentof, rev_inf_dpresentof, mun_id) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	93
2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2
3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	300
4	2013-03-08	2013-03-10	t	t	t	2013-03-09	t	t	A	f	B	t	C	t	\N	t	Conclusiones	t	t	2013-03-09	t	Si la presento	t	t	Descripcion	t	Capacitaciones	t	t	Inventario de herramientas	t	Descripción	t	t	Descripción	t	Descripción	t	Descripción	301
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol (rol_id, rol_nombre, rol_descripcion, rol_codigo) FROM stdin;
3	consultor	Este rol representa al consultor	\N
1	administrador	Este rol representa al administrador del sistema	\N
4	subsecretaria	Rol para la subsecretaria de desarrollo territorial.	\N
5	ISDEM	Rol para usuarios ISDEM	\N
7	asesorMunicipal	Rol que manejará las opciones el asesor municipal	\N
8	temporal	Usuario temporal para pruebas	\N
9	ssdt	Verificará la información ingresada por parte del rol Subsecretaria	\N
11	financiero	Rol para la gestion y asignacion financiera  por componentes	\N
10	gestionRiesgosConsul	Rol para gestión de riesgos para consultor	gdrc
12	capParticipante	Comp2.2: Capacitaciones	\N
13	capCapacitador	Comp2.2: Capacitaciones>Capacitador	\N
14	uep	Componente UEP	\N
\.


--
-- Data for Name: rol_opcion_sistema; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol_opcion_sistema (rol_id, opc_sis_id) FROM stdin;
3	5
3	6
3	7
3	8
3	11
3	12
3	13
3	16
1	24
1	25
1	27
3	29
3	30
3	31
3	32
3	33
3	34
3	35
3	37
3	39
3	41
3	40
3	42
3	43
3	44
1	10
3	51
3	52
3	53
4	46
4	47
4	48
4	49
5	54
5	55
5	56
5	57
5	58
5	59
5	23
5	36
5	38
5	60
5	61
5	62
5	63
5	64
5	65
5	66
5	95
5	17
5	19
5	20
5	22
9	96
9	97
9	98
9	99
9	100
9	101
4	50
4	45
10	104
10	102
10	103
11	105
11	106
11	107
11	108
11	109
11	110
11	111
10	115
10	114
10	113
10	112
8	67
8	68
8	69
8	70
8	71
8	72
8	73
8	74
8	77
8	78
8	79
8	80
8	81
8	82
8	83
8	84
8	85
8	86
8	87
8	88
8	89
8	90
8	91
8	75
8	76
12	9
13	9
12	116
13	116
13	118
13	117
13	119
14	120
14	121
14	122
14	123
\.


--
-- Data for Name: rubro; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rubro (rub_id, rub_observacion_general, rub_emite_nota, rub_observacion, mun_id, rub_nombre_proyecto) FROM stdin;
1	\N	\N	\N	300	\N
2	\N	\N	\N	73	\N
3		t		301	Mi proyecto
\.


--
-- Data for Name: rubro_elegible; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rubro_elegible (rub_ele_id, rub_ele_seleccionado, rub_ele_observacion, rub_ele_monto, rub_id, nom_rub_id) FROM stdin;
1	\N	\N	0.00	1	1
2	\N	\N	0.00	1	2
3	\N	\N	0.00	1	3
4	\N	\N	0.00	1	4
5	\N	\N	0.00	1	5
6	\N	\N	0.00	1	6
7	\N	\N	0.00	2	1
8	\N	\N	0.00	2	2
9	\N	\N	0.00	2	3
10	\N	\N	0.00	2	4
11	\N	\N	0.00	2	5
12	\N	\N	0.00	2	6
13	f	A	200.00	3	1
14	t	B	2000.00	3	2
15	f	C	3000.00	3	3
16	t	D	4000.00	3	4
17	t	E	5000.00	3	5
18	t	F	830.00	3	6
\.


--
-- Data for Name: sector; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY sector (sec_id, sec_nombre) FROM stdin;
1	Salud y Saneamiento Ambiental
2	Educacion
3	Agua y Sanemaiento
4	Obras Publicas y Transporte
5	Analisis Financiero y Neutralidad Fiscal
6	Marco Legal
\.


--
-- Data for Name: seguimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento (seg_id, seg_forden_preparacion, seg_facta_recepcion, seg_forden_diagnostico, seg_fsocializacion, seg_facta_aprobacion_d, seg_forden_planificacion, seg_facta_aprobacion_p, seg_facuerdo_municipal, seg_fpresentacion_publica, seg_forden_seguimiento, seg_comentario, mun_id, seg_ruta_archivo) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N		300	\N
2	2013-04-01	2013-04-02	2013-04-04	2013-04-05	2013-04-06	2013-04-07	2013-04-08	2013-04-09	2013-04-10	2013-04-11	Comentarios	301	\N
\.


--
-- Data for Name: seguimiento_3b; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_3b (seg_id, mun_id, seg_fecha_emision, seg_fecha_recepcion, seg_fecha_envio, seg_rubros, seg_descripcion, seg_archivo_perfil, seg_archivo_tdr, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
\.


--
-- Data for Name: seguimiento_aprimp; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_aprimp (seg_id, mun_id, seg_is_ok, seg_fecha_emision, seg_fecha_recepcion, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
\.


--
-- Data for Name: seguimiento_evaluacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_evaluacion (seg_eva_id, mun_id, seg_eva_fecha_presentacion, seg_eva_lugar, seg_eva_is_informe, seg_eva_is_divulgado, seg_eva_porque, seg_eva_archivo_informe, seg_eva_observaciones) FROM stdin;
\.


--
-- Data for Name: seguimiento_receppro; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_receppro (seg_id, mun_id, seg_fecha_recepcion, seg_fecha_vistobueno, seg_fecha_aprobacion, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
\.


--
-- Data for Name: seleccion_comite; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seleccion_comite (sel_com_id, sel_com_fverificacion, sel_com_seleccionado, sol_asis_id) FROM stdin;
2	\N	Si	3
3	\N	No	4
4	\N	Si	5
\.


--
-- Data for Name: solicitud_asistencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY solicitud_asistencia (sol_asis_id, nombre_solicitante, cargo, telefono, sol_asis_ruta_archivo, mun_id, c1, c2, sel_com_id, fecha_solicitud, comentarios) FROM stdin;
4	Cristian Oswaldo Fuentes	dddddd	8888-8888	documentos/solicitud_asistencia/solicitud_asistencia4.pdf	1	t	t	\N	2013-02-06	
5	Karen Peñate	fdafad	6666-6666	documentos/solicitud_asistencia/solicitud_asistencia5.pdf	2	t	t	\N	2013-02-07	
3	Karen Peñate	Programadora	5555-5555	documentos/solicitud_asistencia/solicitud_asistencia3.pdf	1	t	t	\N	2013-02-07	
\.


--
-- Data for Name: solicitud_ayuda; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY solicitud_ayuda (sol_ayu_id, mun_id, sol_ayu_fecha_emision, sol_ayu_fecha_recepcion) FROM stdin;
\.


--
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY tipo (tip_id, tip_nombre) FROM stdin;
2	Mancomunidad
3	Microregion
1	Asociación
\.


--
-- Data for Name: tipo_actor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY tipo_actor (tip_act_id, tip_act_nombre) FROM stdin;
1	Concejo Municipal
2	Funcionarios y empleados municipales
3	Instituciones públicas presentes en el municipio
4	Instituciones privadas
5	Organizaciones no gubernamentales
6	Líderes locales
7	Sectores organizados
\.


--
-- Data for Name: tipo_mapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY tipo_mapa (tip_map_id, tip_map_nombre) FROM stdin;
1	Mapa de amenaza
2	Mapa documentando un evento específico
3	Mapa de identificación de vulnerabilidades
4	Mapa de riesgos(amenaza y vulnerabilidad)
5	Mapa de recursos o capacitaciones
\.


--
-- Data for Name: transferencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY transferencia (trans_id, act_origen, act_destino, monto, trans_fuente, trans_desc, trans_obs, trans_fecha) FROM stdin;
1	11	\N	0	GOES	\N	\N	\N
2	11	\N	0	GMUN	\N	\N	\N
3	11	\N	0	GOES	\N	\N	\N
4	11	\N	0	GMUN	\N	\N	\N
5	11	\N	0	GOES	\N	\N	\N
6	11	\N	0	GMUN	\N	\N	\N
\.


--
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY user_autologin (key_id, user_id, user_agent, last_ip, last_login) FROM stdin;
\.


--
-- Data for Name: user_profiles; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY user_profiles (id, user_id, country, website) FROM stdin;
1	2	\N	\N
4	8	\N	\N
5	9	\N	\N
6	12	\N	\N
7	13	\N	\N
8	14	\N	\N
9	15	\N	\N
10	16	\N	\N
11	17	\N	\N
12	18	\N	\N
13	19	\N	\N
14	20	\N	\N
15	21	\N	\N
16	22	\N	\N
17	27	\N	\N
18	28	\N	\N
19	29	\N	\N
20	30	\N	\N
21	31	\N	\N
22	15	\N	\N
23	16	\N	\N
24	18	\N	\N
25	19	\N	\N
26	20	\N	\N
27	21	\N	\N
28	22	\N	\N
29	23	\N	\N
30	24	\N	\N
31	25	\N	\N
32	26	\N	\N
33	27	\N	\N
34	28	\N	\N
35	29	\N	\N
36	30	\N	\N
37	31	\N	\N
38	32	\N	\N
39	33	\N	\N
40	34	\N	\N
41	35	\N	\N
42	36	\N	\N
43	37	\N	\N
44	38	\N	\N
45	39	\N	\N
46	40	\N	\N
47	41	\N	\N
48	42	\N	\N
49	43	\N	\N
50	44	\N	\N
51	45	\N	\N
52	46	\N	\N
53	47	\N	\N
54	48	\N	\N
55	52	\N	\N
56	53	\N	\N
57	54	\N	\N
58	55	\N	\N
59	56	\N	\N
60	57	\N	\N
61	59	\N	\N
62	58	\N	\N
63	60	\N	\N
64	61	\N	\N
65	62	\N	\N
66	63	\N	\N
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) FROM stdin;
23	so13232	$2a$08$95RLBLbICbTjBBnRSiCjLufl9wpAn3I1C/MrO0SemZL99TzKRadjG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
24	an12220	$2a$08$RwgTcb8HxxhAlcF3pu1S0.zGJfMFkLp8e0FakMMgACvBiHbXPA.GC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
26	an12221	$2a$08$Za16X5OqjRVJi/pfkMIWKOMBEK1icNOrZ0NItL/s2tTlzH8ygOp0C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
27	sa10197	$2a$08$podpZLbefI6WMSq91SYNQOaqCW/1FdrP2eO0KSLklbyuHAsoVhabG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
29	li05076	$2a$08$IrMFOFDHxcZ6WEfOvuXYi.JSNiPbu7rkt32TF4IOLRiejoNfPocym	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
30	ch03037	$2a$08$Bj3F1.S6d2NX2c2k4.1rGOvLkTVvnP6xM/JGf4/g2KIXlxkWCtuFW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
31	ch03046	$2a$08$9aDPW8JmyWheTllY4W8GlupOpDzDFE9hNEsOh0AaZlI3wByUM1852	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
18	ah01004	$2a$08$BCB39yPJhszT7ic/cTOYUOP4zEMFcV.x1B/HHnkg0Z5KEMAM3L0Pq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-01	2013-02-01	\N	3
32	ch03031	$2a$08$H2DtVMfln04DhW0xPlTEE.54fddg.aszDa4SI.4JBIkC9rYMSgZxW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
33	ch03052	$2a$08$qD93OLiljFRV60hg6IygK.Icmi9k3CcoW16L7UVf5SnRdrfxDz1GO	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
36	vi11209	$2a$08$IFeZIRYBM.HIIh5bZ6dYAOKk/jfg48jnIlSE7d6dapnTeXsdF8T.K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
37	us14251	$2a$08$S9xdb/kI6dCAMNQ0hi8By.2ZclovPBXV6EN8GzVXkMajFKdfa17fq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
38	mi09169	$2a$08$5RTw70P3l4KrrxcG1k1Feei7HQJPufYrkI0kXQzIhQnL5IiD77f2C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
39	mi09159	$2a$08$eQ27nyb0QWOm5hS7vuRPwOKrK04SShSGZJ5.U8HOeu0yusYXAL35S	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
40	mo08142	$2a$08$oRc3aXq/8JzIq9UnibsT..hOdg0S2hWm7F5QvCfMB/z.kivHh8ccK	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
41	mo08136	$2a$08$oBOx17M47nVmLm4igOXc8OJwJTe82hOc14K2yjyEJY1g.Oq.zNUr2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
51	blxRol5	$2a$08$/wTdbAUi.kO.uYSQA6OVoONs6SCEG7E.JXphZjQX8XLx2RJIdig0K	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-02-09	2013-02-09	\N	5
54	desentralizacion	$2a$08$eRsmwvKzF5QEhPzjBh1AbOK3GvAoJuQOYgtDTM8i2IcTmHcllJ3N2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.81.188	2013-04-08	2013-02-20	\N	4
52	an12214	$2a$08$.BV6wvNAGP/LdRcmpiG2de4PKm/8/jpItbYXQsJu6kAs9kawWxZDe	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.7.94	2013-02-19	2013-02-19	\N	3
22	so13226	$2a$08$sJhWdlZRSzSKwhJqGztVZevplGEQtOhI1pc0Yk3Z1olAW5y6TS96K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.205.230	2013-03-05	2013-02-02	\N	3
13	aaron	$2a$08$jRJBfFknSld2/iE2RO.Vb.tQ.rWFSWGKwHbsMzWp0FXDEX2wQHZ5q	carlos.aaromero@gmail.com	1	0	\N	\N	\N	\N	\N	190.62.81.188	2013-04-08	2013-01-05	\N	4
53	ch03025	$2a$08$8KaN0ZQluMR5YHJsWjW1xOSX06TrSw8L/uwjQx7vRFv7LKti1VhiW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.7.94	\N	2013-02-19	\N	3
60	blxComp24	$2a$08$owxrbSfVbLekAQd2MBmPsu/TLCcBeU4hKvKzTheLClg6hHVDK7YeK	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.99.60.210	2013-04-11	2013-03-20	\N	8
19	ah01005	$2a$08$6hK.o39tVrEcYzggckT4IOfOu53/nVazEtRpsfpvcc9KNg5Njyt1W	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.5.149.218	2013-02-20	2013-02-02	\N	3
21	so13224	$2a$08$nHln6RHGVRsYpw9sL4tMQO7syuhvtA5.ir5jz49ZVFfLRlSCZ7bn2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.5.149.218	2013-02-20	2013-02-02	\N	3
20	ah01012	$2a$08$H3TRunvBEJKO40n1GnxpfOmO0NW6pEGSym5rML.Zp4qCX09sT56Zy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.5.149.218	2013-02-20	2013-02-02	\N	3
28	sa10185	$2a$08$/2dgOQYtXdDb5BZqLzdTXOfJ0G96tNsi9sU2WTYolsvyWOrexYCBa	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.150.39.73	2013-03-04	2013-02-02	\N	3
56	nuria_rivas	$2a$08$po0cUhl69GS7RrzqKbXJHuF5NpiZrQrhctRPXhXBe4i.ZhUEkO1bC	hotsaucekco@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.81.188	2013-04-08	2013-02-27	\N	9
35	cu04058	$2a$08$t48x4nhdANPalU66hCcwmOKgEf6ar9sgfUXspBRLph9MlUX26juda	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.120.10.42	2013-02-27	2013-02-02	\N	3
45	un07129	$2a$08$mx9h7dD4hxPlYJ3GZflyueeskiXoFmI3aoXVBH43pvoH38JH47Zcy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.53.8.193	2013-04-10	2013-02-02	\N	3
49	blexis	$2a$08$t5Ct4zewYCgheX30v1ftdeIPjGlojQVJ.RGX8k4I3vwYmgM9yv6cq	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-04-17	2013-02-07	\N	1
55	ca02021	$2a$08$XDExsLEwdSk05TpzArwl9u6T.fMZUXiYRXqxkvUrQnDBFoRo68K9u	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-03-01	2013-02-27	\N	3
25	an12218	$2a$08$fMuWkb5XmOl9mt4V0fru4eB0V4HxHodJ7sHWF6Aqx0swl1aGwyswi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.108.226	2013-03-22	2013-02-02	\N	3
58	financiero	$2a$08$aDtrZJkrlRa/R30ib6i1Ru02KoAPhJsGr5AypRLdCXR2W81Gd.4ji	bdiazcampos@yahoo.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-04-11	2013-03-07	\N	11
1	admin	$2a$08$/nXdYjk2FTZtbB9qxyNbdutoPzhsieMYlU3tNXcxqUb0jJsXx7C7.	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.17.251	2013-04-09	2012-08-19	\N	1
59	finan	$2a$08$1LZyZvZRpFEL.PGeXJcc.uPbAVVTjBC/2xnp6tSY1RNgV5w4x/8D.	hotsaucekco@hotmail.com	1	0	\N	\N	\N	\N	\N	168.243.2.247	2013-03-07	2013-03-07	\N	11
34	pa06114	$2a$08$zZHXRGhTY5Tmj2V5rKYx8OvbK.n3VqizCRJtRLv39xlZN933.6eEi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-03-08	2013-02-02	\N	3
57	eaviles	$2a$08$aNJ2flb4iXCMwnO3l.3ZoufvOziig.dZSDbrBCsZ/nJQxmY7NjgYm	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.150.158.154	2013-03-30	2013-03-04	\N	10
44	mi09165	$2a$08$nyuorJuvW0iawsaTMMyzC.ntFRKVBPvRPuPfeDDCf1nsjYfxOOmDC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.16.131	2013-04-10	2013-02-02	\N	3
16	ah01001	$2a$08$Zspb3nLH2jLzTlSELh/KQeKfXLlUOyvGP6rlGO0Sfviy0M1AYczLW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-03-19	2013-02-01	\N	3
50	blxCoor	$2a$08$sR0PWTRHzYlcmXVi0sM.muTKcDifMhhZmsBQHMcBuAaa8m26nxw7a	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.99.60.210	2013-03-20	2013-02-07	\N	3
15	kpenate	$2a$08$iDSnhWfSv6y1epb6zuf2q.rW9tketjzk5Y9Vv9ZvnF6Xv/8tOS2Pq	kpenate@salud.gob.sv	1	0	\N	\N	\N	\N	\N	190.150.158.154	2013-04-11	2013-02-01	\N	5
43	mi09178	$2a$08$uHrrfXHapeJhTO6dGjf00uDF.RxnY0WQD8aJzXGnV.FwzoTQi6FPq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.16.131	2013-04-10	2013-02-02	\N	3
42	mi09161	$2a$08$SNpO1PXTtuzsxha.7USdv.jQSJEp27jsocoBtE/O/hSSKtQyoZOiW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.53.8.193	2013-04-10	2013-02-02	\N	3
46	un07124	$2a$08$wAOOfCneKOB9IEF6PWRsw.zrZ4j5NMWOY7jEnqXYNHhjjkcPIduAu	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.67.55	2013-04-15	2013-02-02	\N	3
62	test22C	$2a$08$Ccevw1yXy2Gx17guLQ4fUeiivQDj6vmkkyVKxHFwrhWuLj8tYLMI2	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-04-17	2013-04-17	\N	13
61	test22P	$2a$08$6JHF8To61XGklYnWlTV8L.42fyRnqPnmLQYLomdgZYuzn90pENSry	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-04-17	2013-04-17	\N	12
63	testUEP	$2a$08$VOoIxJ7h046Vofp7cIrdzO4Cnz/CPEMMzxmzagQGSizmMFXlwp87e	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-04-17	2013-04-17	\N	14
\.


--
-- Name: ci_sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY ci_sessions
    ADD CONSTRAINT ci_sessions_pkey PRIMARY KEY (session_id);


--
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- Name: pk_actividad; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT pk_actividad PRIMARY KEY (act_id);


--
-- Name: pk_actividades_epi; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY actividades_epi
    ADD CONSTRAINT pk_actividades_epi PRIMARY KEY (act_id);


--
-- Name: pk_acuerdo_municipal; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT pk_acuerdo_municipal PRIMARY KEY (acu_mun_id);


--
-- Name: pk_acuerdo_municipal2; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY acuerdo_municipal2
    ADD CONSTRAINT pk_acuerdo_municipal2 PRIMARY KEY (acu_mun_id);


--
-- Name: pk_acumun_miembros; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY acumun_miembros
    ADD CONSTRAINT pk_acumun_miembros PRIMARY KEY (mie_id);


--
-- Name: pk_apo_mun_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY aporte_municipal
    ADD CONSTRAINT pk_apo_mun_id PRIMARY KEY (apo_mun_id);


--
-- Name: pk_are_dim_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY area_dimension
    ADD CONSTRAINT pk_are_dim_id PRIMARY KEY (are_dim_id);


--
-- Name: pk_area_accion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY area_accion
    ADD CONSTRAINT pk_area_accion PRIMARY KEY (id_area_accion);


--
-- Name: pk_asi_tec_miembros; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asi_tec_miembros
    ADD CONSTRAINT pk_asi_tec_miembros PRIMARY KEY (mie_id);


--
-- Name: pk_asistencia_tecnica; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asistencia_tecnica
    ADD CONSTRAINT pk_asistencia_tecnica PRIMARY KEY (asi_tec_id);


--
-- Name: pk_aso_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT pk_aso_id PRIMARY KEY (aso_id);


--
-- Name: pk_aut_est_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY autor_estrategia
    ADD CONSTRAINT pk_aut_est_id PRIMARY KEY (aut_est_id);


--
-- Name: pk_cap_participante; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cap_participante
    ADD CONSTRAINT pk_cap_participante PRIMARY KEY (par_id);


--
-- Name: pk_capacitacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT pk_capacitacion PRIMARY KEY (cap_id);


--
-- Name: pk_capacitaciones; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY capacitaciones
    ADD CONSTRAINT pk_capacitaciones PRIMARY KEY (cap_id);


--
-- Name: pk_cat_consultores; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cat_consultores
    ADD CONSTRAINT pk_cat_consultores PRIMARY KEY (con_id);


--
-- Name: pk_cat_for_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY categoria_fortalecimiento
    ADD CONSTRAINT pk_cat_for_id PRIMARY KEY (cat_for_id);


--
-- Name: pk_cc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cc
    ADD CONSTRAINT pk_cc PRIMARY KEY (cc_id);


--
-- Name: pk_componente; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT pk_componente PRIMARY KEY (com_id);


--
-- Name: pk_componente24a; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente24a
    ADD CONSTRAINT pk_componente24a PRIMARY KEY (comp_id);


--
-- Name: pk_componente24a_atm; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente24a_atm
    ADD CONSTRAINT pk_componente24a_atm PRIMARY KEY (comp_id);


--
-- Name: pk_componente24a_cap; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente24a_cap
    ADD CONSTRAINT pk_componente24a_cap PRIMARY KEY (comp_id);


--
-- Name: pk_componente26_cap; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente26_cap
    ADD CONSTRAINT pk_componente26_cap PRIMARY KEY (comp_id);


--
-- Name: pk_componente26_con; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente26_con
    ADD CONSTRAINT pk_componente26_con PRIMARY KEY (comp_id);


--
-- Name: pk_componente26_equi; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY componente26_equi
    ADD CONSTRAINT pk_componente26_equi PRIMARY KEY (comp_id);


--
-- Name: pk_con_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT pk_con_id PRIMARY KEY (con_id);


--
-- Name: pk_con_id_acu_mun_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT pk_con_id_acu_mun_id PRIMARY KEY (acu_mun_id, con_id);


--
-- Name: pk_con_int_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY consultores_interes
    ADD CONSTRAINT pk_con_int_id PRIMARY KEY (con_int_id);


--
-- Name: pk_cons_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY consultora
    ADD CONSTRAINT pk_cons_id PRIMARY KEY (cons_id);


--
-- Name: pk_contrapartida; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY contrapartida
    ADD CONSTRAINT pk_contrapartida PRIMARY KEY (con_id);


--
-- Name: pk_contrapartida_aporte; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY contrapartida_aporte
    ADD CONSTRAINT pk_contrapartida_aporte PRIMARY KEY (apo_mun_id, con_id);


--
-- Name: pk_cri_id_acu_mun_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT pk_cri_id_acu_mun_id PRIMARY KEY (cri_id, acu_mun_id);


--
-- Name: pk_cri_id_gru_ges_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT pk_cri_id_gru_ges_id PRIMARY KEY (cri_id, gru_ges_id);


--
-- Name: pk_cri_id_int_ins_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio_integracion
    ADD CONSTRAINT pk_cri_id_int_ins_id PRIMARY KEY (cri_id, int_ins_id);


--
-- Name: pk_cri_id_reu_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT pk_cri_id_reu_id PRIMARY KEY (cri_id, reu_id);


--
-- Name: pk_criterio; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio
    ADD CONSTRAINT pk_criterio PRIMARY KEY (cri_id);


--
-- Name: pk_criterio_E0; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY criterio_e0
    ADD CONSTRAINT "pk_criterio_E0" PRIMARY KEY (criterio_id);


--
-- Name: pk_cumplimiento_minimo; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_cumplimiento_minimo PRIMARY KEY (cum_min_id);


--
-- Name: pk_dd; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY dd
    ADD CONSTRAINT pk_dd PRIMARY KEY (dd_id);


--
-- Name: pk_declaracion_interes; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT pk_declaracion_interes PRIMARY KEY (dec_int_id);


--
-- Name: pk_def_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY definicion
    ADD CONSTRAINT pk_def_id PRIMARY KEY (def_id);


--
-- Name: pk_departamento; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT pk_departamento PRIMARY KEY (dep_id);


--
-- Name: pk_det_obr_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY detalle_obra
    ADD CONSTRAINT pk_det_obr_id PRIMARY KEY (det_obr_id);


--
-- Name: pk_dia_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY diagnostico
    ADD CONSTRAINT pk_dia_id PRIMARY KEY (dia_id);


--
-- Name: pk_dia_id_cum_min_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT pk_dia_id_cum_min_id PRIMARY KEY (dia_id, cum_min_id);


--
-- Name: pk_divu; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY divu
    ADD CONSTRAINT pk_divu PRIMARY KEY (divu_id);


--
-- Name: pk_dmon_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY detmonto_proyeccion
    ADD CONSTRAINT pk_dmon_pro_id PRIMARY KEY (dmon_pro_id);


--
-- Name: pk_dsat; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY dsat
    ADD CONSTRAINT pk_dsat PRIMARY KEY (dsat_id);


--
-- Name: pk_ela_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY elaboracion_proyecto
    ADD CONSTRAINT pk_ela_pro_id PRIMARY KEY (ela_pro_id);


--
-- Name: pk_empleados; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY empleados
    ADD CONSTRAINT pk_empleados PRIMARY KEY (emp_id);


--
-- Name: pk_empleados_municipales; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY empleados_municipales
    ADD CONSTRAINT pk_empleados_municipales PRIMARY KEY (emp_mun_id);


--
-- Name: pk_epi; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY epi
    ADD CONSTRAINT pk_epi PRIMARY KEY (epi_id);


--
-- Name: pk_est_comu_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY estrategia_comunicacion
    ADD CONSTRAINT pk_est_comu_id PRIMARY KEY (est_com_id);


--
-- Name: pk_etapa; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY etapa
    ADD CONSTRAINT pk_etapa PRIMARY KEY (eta_id);


--
-- Name: pk_fac_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY facilitador
    ADD CONSTRAINT pk_fac_id PRIMARY KEY (fac_id);


--
-- Name: pk_fcdp; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY fcdp
    ADD CONSTRAINT pk_fcdp PRIMARY KEY (fcdp_id);


--
-- Name: pk_fecha_recepcion_observacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT pk_fecha_recepcion_observacion PRIMARY KEY (fec_correlativo);


--
-- Name: pk_for_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY detalle_fortalecimiento
    ADD CONSTRAINT pk_for_id PRIMARY KEY (for_id);


--
-- Name: pk_fue_fin_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY fuente_financiamiento
    ADD CONSTRAINT pk_fue_fin_id PRIMARY KEY (fue_fin_id);


--
-- Name: pk_fuente_primaria; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT pk_fuente_primaria PRIMARY KEY (fue_pri_id);


--
-- Name: pk_fuente_secundaria; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT pk_fuente_secundaria PRIMARY KEY (fue_sec_id);


--
-- Name: pk_gescon_participante; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY gescon_participante
    ADD CONSTRAINT pk_gescon_participante PRIMARY KEY (par_id);


--
-- Name: pk_gesrie_participan; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY gesrie_participan
    ADD CONSTRAINT pk_gesrie_participan PRIMARY KEY (par_id);


--
-- Name: pk_gestion_conocimiento; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY gestion_conocimiento
    ADD CONSTRAINT pk_gestion_conocimiento PRIMARY KEY (gescon_id);


--
-- Name: pk_gestion_riesgo; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY gestion_riesgo
    ADD CONSTRAINT pk_gestion_riesgo PRIMARY KEY (gesrie_id);


--
-- Name: pk_gru_apo_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT pk_gru_apo_id PRIMARY KEY (gru_apo_id);


--
-- Name: pk_gru_ges_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY grupo_gestor
    ADD CONSTRAINT pk_gru_ges_id PRIMARY KEY (gru_ges_id);


--
-- Name: pk_gru_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY grupo
    ADD CONSTRAINT pk_gru_id PRIMARY KEY (gru_id);


--
-- Name: pk_indicador; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT pk_indicador PRIMARY KEY (ind_id);


--
-- Name: pk_indicadores_desempeno1; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY indicadores_desempeno1
    ADD CONSTRAINT pk_indicadores_desempeno1 PRIMARY KEY (ind_des_id);


--
-- Name: pk_indicadores_desempeno2; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY indicadores_desempeno2
    ADD CONSTRAINT pk_indicadores_desempeno2 PRIMARY KEY (ind_des_id);


--
-- Name: pk_indicadores_desempeno3; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY indicadores_desempeno3
    ADD CONSTRAINT pk_indicadores_desempeno3 PRIMARY KEY (ind_des_id);


--
-- Name: pk_inf_pre_id_cum_min_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT pk_inf_pre_id_cum_min_id PRIMARY KEY (inf_pre_id, cum_min_id);


--
-- Name: pk_informe_preliminar; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT pk_informe_preliminar PRIMARY KEY (inf_pre_id);


--
-- Name: pk_institucion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY institucion
    ADD CONSTRAINT pk_institucion PRIMARY KEY (ins_id);


--
-- Name: pk_int_aso_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY integrante_asociatividad
    ADD CONSTRAINT pk_int_aso_id PRIMARY KEY (int_aso_id);


--
-- Name: pk_int_ins_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY integracion_instancia
    ADD CONSTRAINT pk_int_ins_id PRIMARY KEY (int_ins_id);


--
-- Name: pk_inventario_informacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT pk_inventario_informacion PRIMARY KEY (inv_inf_id);


--
-- Name: pk_manuales_administrativos; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY manuales_administrativos
    ADD CONSTRAINT pk_manuales_administrativos PRIMARY KEY (man_adm_id);


--
-- Name: pk_map_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY mapa
    ADD CONSTRAINT pk_map_id PRIMARY KEY (map_id);


--
-- Name: pk_mon_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY monto_proyeccion
    ADD CONSTRAINT pk_mon_pro_id PRIMARY KEY (mon_pro_id);


--
-- Name: pk_municipio; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (mun_id);


--
-- Name: pk_nom_fec_apro; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY nombre_fecha_aprobacion
    ADD CONSTRAINT pk_nom_fec_apro PRIMARY KEY (nom_fec_apr_id);


--
-- Name: pk_nom_rub_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY nombre_rubro
    ADD CONSTRAINT pk_nom_rub_id PRIMARY KEY (nom_rub_id);


--
-- Name: pk_not_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY nota
    ADD CONSTRAINT pk_not_id PRIMARY KEY (not_id);


--
-- Name: pk_obr_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY obra
    ADD CONSTRAINT pk_obr_id PRIMARY KEY (obr_id);


--
-- Name: pk_opc_sis_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opc_sis_id PRIMARY KEY (opc_sis_id);


--
-- Name: pk_opc_sis_id_rol_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT pk_opc_sis_id_rol_id PRIMARY KEY (rol_id, opc_sis_id);


--
-- Name: pk_par_cap_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT pk_par_cap_id PRIMARY KEY (par_cap_id);


--
-- Name: pk_participante; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT pk_participante PRIMARY KEY (par_id);


--
-- Name: pk_participante_definicion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante_definicion
    ADD CONSTRAINT pk_participante_definicion PRIMARY KEY (par_id, def_id);


--
-- Name: pk_participante_priorizacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante_priorizacion
    ADD CONSTRAINT pk_participante_priorizacion PRIMARY KEY (par_id, pri_id);


--
-- Name: pk_participante_reunion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante_reunion
    ADD CONSTRAINT pk_participante_reunion PRIMARY KEY (par_id, reu_id);


--
-- Name: pk_per_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY perfil_proyecto
    ADD CONSTRAINT pk_per_pro_id PRIMARY KEY (per_pro_id);


--
-- Name: pk_personal_enlace; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT pk_personal_enlace PRIMARY KEY (per_enl_id);


--
-- Name: pk_pes_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY pestania_proceso
    ADD CONSTRAINT pk_pes_pro_id PRIMARY KEY (pes_pro_id);


--
-- Name: pk_pla_cont_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY plan_contingencia
    ADD CONSTRAINT pk_pla_cont_id PRIMARY KEY (pla_con_id);


--
-- Name: pk_pla_inv_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY plan_inversion
    ADD CONSTRAINT pk_pla_inv_id PRIMARY KEY (pla_inv_id);


--
-- Name: pk_pla_tra_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY plan_trabajo
    ADD CONSTRAINT pk_pla_tra_id PRIMARY KEY (pla_tra_id);


--
-- Name: pk_por_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY portafolio_proyecto
    ADD CONSTRAINT pk_por_pro_id PRIMARY KEY (por_pro_id);


--
-- Name: pk_presentes_participante; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY presentes_participante
    ADD CONSTRAINT pk_presentes_participante PRIMARY KEY (par_id);


--
-- Name: pk_presupuesto; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT pk_presupuesto PRIMARY KEY (pre_id);


--
-- Name: pk_pri_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY priorizacion
    ADD CONSTRAINT pk_pri_id PRIMARY KEY (pri_id);


--
-- Name: pk_pro_eta_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proceso_etapa
    ADD CONSTRAINT pk_pro_eta_id PRIMARY KEY (pro_eta_id);


--
-- Name: pk_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY poblacion_reunion
    ADD CONSTRAINT pk_pro_id PRIMARY KEY (pob_id);


--
-- Name: pk_pro_id_nom_fec_apr_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY nombrefecha_procesoetapa
    ADD CONSTRAINT pk_pro_id_nom_fec_apr_id PRIMARY KEY (nom_fec_apr_id, pro_eta_id);


--
-- Name: pk_pro_ide_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT pk_pro_ide_id PRIMARY KEY (pro_ide_id);


--
-- Name: pk_pro_ing_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proyeccion_ingreso
    ADD CONSTRAINT pk_pro_ing_id PRIMARY KEY (pro_ing_id);


--
-- Name: pk_pro_pep_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT pk_pro_pep_id PRIMARY KEY (pro_pep_id);


--
-- Name: pk_pro_pep_id_cum_min_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_proyecto
    ADD CONSTRAINT pk_pro_pep_id_cum_min_id PRIMARY KEY (pro_pep_id, cum_min_id);


--
-- Name: pk_proceso_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proceso
    ADD CONSTRAINT pk_proceso_id PRIMARY KEY (pro_id);


--
-- Name: pk_proy_ide_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proyecto_identificado
    ADD CONSTRAINT pk_proy_ide_id PRIMARY KEY (pro_ide_id);


--
-- Name: pk_proyecto; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT pk_proyecto PRIMARY KEY (pro_id);


--
-- Name: pk_proyectos_cc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY proyectos_cc
    ADD CONSTRAINT pk_proyectos_cc PRIMARY KEY (id_proy_cc);


--
-- Name: pk_region; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY region
    ADD CONSTRAINT pk_region PRIMARY KEY (reg_id);


--
-- Name: pk_res__id_reu_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY resultado_reunion
    ADD CONSTRAINT pk_res__id_reu_id PRIMARY KEY (res_id, reu_id);


--
-- Name: pk_res_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY resultado
    ADD CONSTRAINT pk_res_id PRIMARY KEY (res_id);


--
-- Name: pk_reunion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT pk_reunion PRIMARY KEY (reu_id);


--
-- Name: pk_rev_inf_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY revision_informacion
    ADD CONSTRAINT pk_rev_inf_id PRIMARY KEY (rev_inf_id);


--
-- Name: pk_revapro_productos; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY revapro_productos
    ADD CONSTRAINT pk_revapro_productos PRIMARY KEY (rea_pro_id);


--
-- Name: pk_revapro_productos2; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY revapro_productos2
    ADD CONSTRAINT pk_revapro_productos2 PRIMARY KEY (rea_pro_id);


--
-- Name: pk_rol_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT pk_rol_id PRIMARY KEY (rol_id);


--
-- Name: pk_rub_ele_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY rubro_elegible
    ADD CONSTRAINT pk_rub_ele_id PRIMARY KEY (rub_ele_id);


--
-- Name: pk_rub_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY rubro
    ADD CONSTRAINT pk_rub_id PRIMARY KEY (rub_id);


--
-- Name: pk_sector; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY sector
    ADD CONSTRAINT pk_sector PRIMARY KEY (sec_id);


--
-- Name: pk_seg_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seguimiento
    ADD CONSTRAINT pk_seg_id PRIMARY KEY (seg_id);


--
-- Name: pk_seguimiento_3b; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seguimiento_3b
    ADD CONSTRAINT pk_seguimiento_3b PRIMARY KEY (seg_id);


--
-- Name: pk_seguimiento_aprimp; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seguimiento_aprimp
    ADD CONSTRAINT pk_seguimiento_aprimp PRIMARY KEY (seg_id);


--
-- Name: pk_seguimiento_evaluacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seguimiento_evaluacion
    ADD CONSTRAINT pk_seguimiento_evaluacion PRIMARY KEY (seg_eva_id);


--
-- Name: pk_seguimiento_receppro; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seguimiento_receppro
    ADD CONSTRAINT pk_seguimiento_receppro PRIMARY KEY (seg_id);


--
-- Name: pk_seleccion_comite_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY seleccion_comite
    ADD CONSTRAINT pk_seleccion_comite_id PRIMARY KEY (sel_com_id);


--
-- Name: pk_sol_asis_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY solicitud_asistencia
    ADD CONSTRAINT pk_sol_asis_id PRIMARY KEY (sol_asis_id);


--
-- Name: pk_solicitud_ayuda; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY solicitud_ayuda
    ADD CONSTRAINT pk_solicitud_ayuda PRIMARY KEY (sol_ayu_id);


--
-- Name: pk_tip_act_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY tipo_actor
    ADD CONSTRAINT pk_tip_act_id PRIMARY KEY (tip_act_id);


--
-- Name: pk_tip_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY tipo
    ADD CONSTRAINT pk_tip_id PRIMARY KEY (tip_id);


--
-- Name: pk_tip_map_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY tipo_mapa
    ADD CONSTRAINT pk_tip_map_id PRIMARY KEY (tip_map_id);


--
-- Name: pk_transferencia; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY transferencia
    ADD CONSTRAINT pk_transferencia PRIMARY KEY (trans_id);


--
-- Name: recibido_municipalidad_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY recibido_municipalidad
    ADD CONSTRAINT recibido_municipalidad_pkey PRIMARY KEY (rec_mun_id);


--
-- Name: user_autologin_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT user_autologin_pkey PRIMARY KEY (key_id, user_id);


--
-- Name: user_profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY user_profiles
    ADD CONSTRAINT user_profiles_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: fki_asociatividad_integrante; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_asociatividad_integrante ON integrante_asociatividad USING btree (aso_id);


--
-- Name: fki_capacitacion_participante_capacitacion; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_capacitacion_participante_capacitacion ON participante_capacitacion USING btree (cap_id);


--
-- Name: fki_definicion_probelmas_identificados; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_definicion_probelmas_identificados ON problema_identificado USING btree (def_id);


--
-- Name: fki_etapa_capacitacion; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_etapa_capacitacion ON capacitacion USING btree (eta_id);


--
-- Name: fki_participante_capacitacion; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_participante_capacitacion ON participante_capacitacion USING btree (par_id);


--
-- Name: fk_activida_conformad_activida; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_conformad_activida FOREIGN KEY (act_act_id) REFERENCES actividad(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_activida_posee_una_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_posee_una_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_activida_reference_epi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY actividades_epi
    ADD CONSTRAINT fk_activida_reference_epi FOREIGN KEY (epi_id) REFERENCES epi(epi_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_acuerdo__reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal2
    ADD CONSTRAINT fk_acuerdo__reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_acuerdo_municipal_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_acuerdo_municipal_participante FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_acumun_m_reference_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acumun_miembros
    ADD CONSTRAINT fk_acumun_m_reference_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal2(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_aporte_muni_mun_id; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY aporte_municipal
    ADD CONSTRAINT fk_aporte_muni_mun_id FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


--
-- Name: fk_aporte_municipal_contrapartida_aporte; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_aporte
    ADD CONSTRAINT fk_aporte_municipal_contrapartida_aporte FOREIGN KEY (apo_mun_id) REFERENCES aporte_municipal(apo_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_area_dimension_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_area_dimension_problema_identificado FOREIGN KEY (are_dim_id) REFERENCES area_dimension(are_dim_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_asi_tec__reference_asistenc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asi_tec_miembros
    ADD CONSTRAINT fk_asi_tec__reference_asistenc FOREIGN KEY (asi_tec_id) REFERENCES asistencia_tecnica(asi_tec_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asistenc_reference_cat_cons; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistencia_tecnica
    ADD CONSTRAINT fk_asistenc_reference_cat_cons FOREIGN KEY (asi_tec_consultor) REFERENCES cat_consultores(con_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asistenc_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistencia_tecnica
    ADD CONSTRAINT fk_asistenc_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asistent_reference_divu; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistente_divu
    ADD CONSTRAINT fk_asistent_reference_divu FOREIGN KEY (divu_id) REFERENCES divu(divu_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asistent_reference_dsat; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistente_dsat
    ADD CONSTRAINT fk_asistent_reference_dsat FOREIGN KEY (dsat_id) REFERENCES dsat(dsat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asistent_reference_fcdp; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistente_fcdp
    ADD CONSTRAINT fk_asistent_reference_fcdp FOREIGN KEY (fcdp_id) REFERENCES fcdp(fcdp_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asociatividad_integrante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY integrante_asociatividad
    ADD CONSTRAINT fk_asociatividad_integrante FOREIGN KEY (aso_id) REFERENCES asociatividad(aso_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cap_conc_reference_capacita; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_concejo
    ADD CONSTRAINT fk_cap_conc_reference_capacita FOREIGN KEY (cap_id) REFERENCES capacitaciones(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cap_fina_reference_acumun_m; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_financiera
    ADD CONSTRAINT fk_cap_fina_reference_acumun_m FOREIGN KEY (mie_id) REFERENCES acumun_miembros(mie_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cap_fina_reference_capacita; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_financiera
    ADD CONSTRAINT fk_cap_fina_reference_capacita FOREIGN KEY (cap_id) REFERENCES capacitaciones(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cap_part_reference_capacita; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_participante
    ADD CONSTRAINT fk_cap_part_reference_capacita FOREIGN KEY (cap_id) REFERENCES capacitaciones(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_capacita_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitaciones
    ADD CONSTRAINT fk_capacita_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_capacitacion_facilitador; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY facilitador
    ADD CONSTRAINT fk_capacitacion_facilitador FOREIGN KEY (cap_id) REFERENCES capacitacion(cap_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_capacitacion_participante_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_capacitacion_participante_capacitacion FOREIGN KEY (cap_id) REFERENCES capacitacion(cap_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_categoria_fortalecimiento_detalle_fortalecimiento; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_fortalecimiento
    ADD CONSTRAINT fk_categoria_fortalecimiento_detalle_fortalecimiento FOREIGN KEY (cat_for_id) REFERENCES categoria_fortalecimiento(cat_for_id);


--
-- Name: fk_cc_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cc
    ADD CONSTRAINT fk_cc_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_reference_area_acc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a_atm
    ADD CONSTRAINT fk_componen_reference_area_acc FOREIGN KEY (id_area_accion) REFERENCES area_accion(id_area_accion) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a
    ADD CONSTRAINT fk_componen_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a_cap
    ADD CONSTRAINT fk_componen_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a_atm
    ADD CONSTRAINT fk_componen_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_se_divide_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_se_divide_componen FOREIGN KEY (com_com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_consulora_consultores_interes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultores_interes
    ADD CONSTRAINT fk_consulora_consultores_interes FOREIGN KEY (cons_id) REFERENCES consultora(cons_id);


--
-- Name: fk_consultor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_consultor_proyecto_pep FOREIGN KEY (con_id) REFERENCES consultor(con_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_consultora_consultor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_consultora_consultor FOREIGN KEY (cons_id) REFERENCES consultora(cons_id);


--
-- Name: fk_cont_aport_contrapartida; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_aporte
    ADD CONSTRAINT fk_cont_aport_contrapartida FOREIGN KEY (con_id) REFERENCES contrapartida(con_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_contrapa_aporta_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_aporta_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_contrapa_conformad_contrapa; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_conformad_contrapa FOREIGN KEY (con_id) REFERENCES contrapartida(con_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_integracion
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_cumple_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_cumple_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_criterio_cumple_integracion_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_integracion
    ADD CONSTRAINT fk_criterio_cumple_integracion_ FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_proyecto
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cumplimi_posee_alg_diagnostico_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_posee_alg_diagnostico_ FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cumplimi_posee_alg_informe_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_posee_alg_informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cumplimi_posee_alg_proyecto_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_proyecto
    ADD CONSTRAINT fk_cumplimi_posee_alg_proyecto_ FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_dd_secto_reference_dd; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY dd_sector
    ADD CONSTRAINT fk_dd_secto_reference_dd FOREIGN KEY (dd_id) REFERENCES dd(dd_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_dd_secto_reference_sector; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY dd_sector
    ADD CONSTRAINT fk_dd_secto_reference_sector FOREIGN KEY (sec_id) REFERENCES sector(sec_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_definicion_probelmas_identificados; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_definicion_probelmas_identificados FOREIGN KEY (def_id) REFERENCES definicion(def_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_definicion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_definicion_proyecto_pep FOREIGN KEY (def_id) REFERENCES definicion(def_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_departam_compuesto_region; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT fk_departam_compuesto_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_diagnostico_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_diagnostico_proyecto_pep FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_divu_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY divu
    ADD CONSTRAINT fk_divu_reference_municipi FOREIGN KEY (divu_municipio) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_dsat_analisan__municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY dsat
    ADD CONSTRAINT fk_dsat_analisan__municipi FOREIGN KEY (dsat_municipio) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_dsat_sec_reference_dsat; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY dsat_sector
    ADD CONSTRAINT fk_dsat_sec_reference_dsat FOREIGN KEY (dsat_id) REFERENCES dsat(dsat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_dsat_sec_reference_sector; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY dsat_sector
    ADD CONSTRAINT fk_dsat_sec_reference_sector FOREIGN KEY (sec_id) REFERENCES sector(sec_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_elaboracion_proyecto_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_elaboracion_proyecto_municipio FOREIGN KEY (ela_pro_id) REFERENCES elaboracion_proyecto(ela_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_elaboracion_proyecto_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_elaboracion_proyecto_participante FOREIGN KEY (ela_pro_id) REFERENCES elaboracion_proyecto(ela_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_elaboracion_proyecto_recibido_municipalidad; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY recibido_municipalidad
    ADD CONSTRAINT fk_elaboracion_proyecto_recibido_municipalidad FOREIGN KEY (ela_pro_id) REFERENCES elaboracion_proyecto(ela_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_empleado_reference_empleado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY empleados
    ADD CONSTRAINT fk_empleado_reference_empleado FOREIGN KEY (emp_mun_id) REFERENCES empleados_municipales(emp_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_empleado_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY empleados_municipales
    ADD CONSTRAINT fk_empleado_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_estrategia_comunicacion_actor_estrategia; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY autor_estrategia
    ADD CONSTRAINT fk_estrategia_comunicacion_actor_estrategia FOREIGN KEY (est_com_id) REFERENCES estrategia_comunicacion(est_com_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_estrategia_comunicacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_estrategia_comunicacion_proyecto_pep FOREIGN KEY (est_com_id) REFERENCES estrategia_comunicacion(est_com_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_etapa_aporte_municipal; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY aporte_municipal
    ADD CONSTRAINT fk_etapa_aporte_municipal FOREIGN KEY (eta_id) REFERENCES etapa(eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_etapa_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT fk_etapa_capacitacion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_etapa_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_etapa_reunion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_fecha_re_din_tiene_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT fk_fecha_re_din_tiene_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_fuente_p_formado_inventar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT fk_fuente_p_formado_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_fuente_s_formado_p_inventar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT fk_fuente_s_formado_p_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_gescon_p_reference_gestion_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gescon_participante
    ADD CONSTRAINT fk_gescon_p_reference_gestion_ FOREIGN KEY (gescon_id) REFERENCES gestion_conocimiento(gescon_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_gesrie_p_reference_gestion_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gesrie_participan
    ADD CONSTRAINT fk_gesrie_p_reference_gestion_ FOREIGN KEY (gesrie_id) REFERENCES gestion_riesgo(gesrie_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_gestion__reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_conocimiento
    ADD CONSTRAINT fk_gestion__reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_gestion__reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_riesgo
    ADD CONSTRAINT fk_gestion__reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_grupo_apoyo_participantes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_grupo_apoyo_participantes FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_grupo_gestor_criterio_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_grupo_gestor_criterio_grupo_gestor FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_grupo_gestor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_grupo_gestor_proyecto_pep FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_grupo_para_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_grupo_para_pep FOREIGN KEY (grup_id_pep) REFERENCES grupo(gru_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_indicado_posee_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT fk_indicado_posee_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_indicado_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno1
    ADD CONSTRAINT fk_indicado_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_indicado_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno2
    ADD CONSTRAINT fk_indicado_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_indicado_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicadores_desempeno3
    ADD CONSTRAINT fk_indicado_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_informe_preliminar_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_informe_preliminar_proyecto_pep FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_integracion_instancia_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_integracion_instancia_participante FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_integracion_instancia_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_integracion_instancia_proyecto_pep FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_manuales_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY manuales_administrativos
    ADD CONSTRAINT fk_manuales_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_monto_proyeccion_det; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detmonto_proyeccion
    ADD CONSTRAINT fk_monto_proyeccion_det FOREIGN KEY (mon_pro_id) REFERENCES monto_proyeccion(mon_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_municipi_comp_cuni_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_cuni_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_municipi_comp_muni_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_muni_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_municipi_conformad_departam; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipi_conformad_departam FOREIGN KEY (dep_id) REFERENCES departamento(dep_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_municipio_consultora; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipio_consultora FOREIGN KEY (cons_id) REFERENCES consultora(cons_id);


--
-- Name: fk_municipio_elaboracion_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY elaboracion_proyecto
    ADD CONSTRAINT fk_municipio_elaboracion_proyecto FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_municipio_perfil_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY perfil_proyecto
    ADD CONSTRAINT fk_municipio_perfil_proyecto FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_municipio_proceso; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proceso
    ADD CONSTRAINT fk_municipio_proceso FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_municipio_proceso_etapa; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proceso_etapa
    ADD CONSTRAINT fk_municipio_proceso_etapa FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_municipio_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_municipio_proyecto_pep FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_municipio_revision_informacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revision_informacion
    ADD CONSTRAINT fk_municipio_revision_informacion FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_municipio_rubro; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rubro
    ADD CONSTRAINT fk_municipio_rubro FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_municipio_seguimiento; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento
    ADD CONSTRAINT fk_municipio_seguimiento FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


--
-- Name: fk_nombre_rubro_rubro_elegible; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rubro_elegible
    ADD CONSTRAINT fk_nombre_rubro_rubro_elegible FOREIGN KEY (nom_rub_id) REFERENCES nombre_rubro(nom_rub_id);


--
-- Name: fk_obra_detalle_obra; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_obra
    ADD CONSTRAINT fk_obra_detalle_obra FOREIGN KEY (obr_id) REFERENCES obra(obr_id);


--
-- Name: fk_opcion_sistema_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT fk_opcion_sistema_opcion_sistema FOREIGN KEY (opc_opc_sis_id) REFERENCES opcion_sistema(opc_sis_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_opcion_sistema_rol_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_opcion_sistema_rol_opcion_sistema FOREIGN KEY (opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- Name: fk_particip_asistente_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_asistente_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_particip_necesita__informe_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita__informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_particip_necesita_declarac; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita_declarac FOREIGN KEY (dec_int_id) REFERENCES declaracion_interes(dec_int_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_particip_pueden_te_instituc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_pueden_te_instituc FOREIGN KEY (ins_id) REFERENCES institucion(ins_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_participante_asociatividad FOREIGN KEY (aso_id) REFERENCES asociatividad(aso_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_participante_capacitacion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_definicion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_definicion
    ADD CONSTRAINT fk_participante_definicion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_participante_grupo_gestor FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_priorizacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_priorizacion
    ADD CONSTRAINT fk_participante_priorizacion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_participante_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante_reunion
    ADD CONSTRAINT fk_participante_reunion FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_perfil_m_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY perfil_municipio
    ADD CONSTRAINT fk_perfil_m_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_perfil_proyecto_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_perfil_proyecto_municipio FOREIGN KEY (per_pro_id) REFERENCES perfil_proyecto(per_pro_id);


--
-- Name: fk_personal_necesita__acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT fk_personal_necesita__acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_pestania_proceso_etapa; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proceso_etapa
    ADD CONSTRAINT fk_pestania_proceso_etapa FOREIGN KEY (pes_pro_id) REFERENCES pestania_proceso(pes_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_plan_inversion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_plan_inversion_proyecto_pep FOREIGN KEY (pla_inv_id) REFERENCES plan_inversion(pla_inv_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_plan_trabajo_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_trabajo
    ADD CONSTRAINT fk_plan_trabajo_municipio FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_por_pro_id; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_financiamiento
    ADD CONSTRAINT fk_por_pro_id FOREIGN KEY (por_pro_id) REFERENCES portafolio_proyecto(por_pro_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_presente_reference_empleado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presentes_empleados
    ADD CONSTRAINT fk_presente_reference_empleado FOREIGN KEY (emp_id) REFERENCES empleados(emp_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_presente_reference_seguimie; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presentes_empleados
    ADD CONSTRAINT fk_presente_reference_seguimie FOREIGN KEY (seg_eva_id) REFERENCES seguimiento_evaluacion(seg_eva_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_presente_reference_seguimie; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presentes_participante
    ADD CONSTRAINT fk_presente_reference_seguimie FOREIGN KEY (seg_eva_id) REFERENCES seguimiento_evaluacion(seg_eva_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_presupue_se_asigna_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT fk_presupue_se_asigna_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_priorizacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_priorizacion_proyecto_pep FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_priorizacion_proyectos_identificados; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_identificado
    ADD CONSTRAINT fk_priorizacion_proyectos_identificados FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proceso_consultora_interes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultores_interes
    ADD CONSTRAINT fk_proceso_consultora_interes FOREIGN KEY (pro_id) REFERENCES proceso(pro_id);


--
-- Name: fk_procesos; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nombrefecha_procesoetapa
    ADD CONSTRAINT fk_procesos FOREIGN KEY (pro_eta_id) REFERENCES proceso_etapa(pro_eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyeccion_ingresos; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY monto_proyeccion
    ADD CONSTRAINT fk_proyeccion_ingresos FOREIGN KEY (pro_ing_id) REFERENCES proyeccion_ingreso(pro_ing_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyeccion_ingresos_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_proyeccion_ingresos_proyecto_pep FOREIGN KEY (pro_ing_id) REFERENCES proyeccion_ingreso(pro_ing_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT fk_proyecto_pep FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_acuerdo_municipal; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT fk_proyecto_pep_acuerdo_municipal FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_consultor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_proyecto_pep_consultor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_declaracion_interes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT fk_proyecto_pep_declaracion_interes FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_diagnostico; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY diagnostico
    ADD CONSTRAINT fk_proyecto_pep_diagnostico FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_estrategia_inversion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY estrategia_comunicacion
    ADD CONSTRAINT fk_proyecto_pep_estrategia_inversion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_gestor
    ADD CONSTRAINT fk_proyecto_pep_grupo_gestor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_informe_preliminar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT fk_proyecto_pep_informe_preliminar FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_integracion_instancia; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY integracion_instancia
    ADD CONSTRAINT fk_proyecto_pep_integracion_instancia FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_plan_inversion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_inversion
    ADD CONSTRAINT fk_proyecto_pep_plan_inversion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_portafolio_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY portafolio_proyecto
    ADD CONSTRAINT fk_proyecto_pep_portafolio_proyecto FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_priorizacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY priorizacion
    ADD CONSTRAINT fk_proyecto_pep_priorizacion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_proyeccion_ingresos; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyeccion_ingreso
    ADD CONSTRAINT fk_proyecto_pep_proyeccion_ingresos FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_proyecto_pep_reunion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_programa_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_programa_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_reference_cc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyectos_cc
    ADD CONSTRAINT fk_proyecto_reference_cc FOREIGN KEY (cc_id) REFERENCES cc(cc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_proyecto_se_realiz_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_se_realiz_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_resultado_resultado_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY resultado_reunion
    ADD CONSTRAINT fk_resultado_resultado_reunion FOREIGN KEY (res_id) REFERENCES resultado(res_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_reunion_criterio_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT fk_reunion_criterio_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_reunion_poblacion_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY poblacion_reunion
    ADD CONSTRAINT fk_reunion_poblacion_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_reunion_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_reunion_problema_identificado FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_reunion_resultado_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY resultado_reunion
    ADD CONSTRAINT fk_reunion_resultado_reunion FOREIGN KEY (res_id) REFERENCES resultado(res_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_revapro__reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revapro_productos
    ADD CONSTRAINT fk_revapro__reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_revapro__reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY revapro_productos2
    ADD CONSTRAINT fk_revapro__reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_revision_informacion_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_revision_informacion_municipio FOREIGN KEY (rev_inf_id) REFERENCES revision_informacion(rev_inf_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_revision_informacion_plan_contingencia; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY plan_contingencia
    ADD CONSTRAINT fk_revision_informacion_plan_contingencia FOREIGN KEY (rev_inf_id) REFERENCES revision_informacion(rev_inf_id);


--
-- Name: fk_rol_rol_sistema; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_rol_rol_sistema FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- Name: fk_rol_user; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_rol_user FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- Name: fk_rubro_detalle_fortalecimiento; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_fortalecimiento
    ADD CONSTRAINT fk_rubro_detalle_fortalecimiento FOREIGN KEY (rub_id) REFERENCES rubro(rub_id);


--
-- Name: fk_rubro_detalle_obra; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY detalle_obra
    ADD CONSTRAINT fk_rubro_detalle_obra FOREIGN KEY (rub_id) REFERENCES rubro(rub_id);


--
-- Name: fk_rubro_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_rubro_municipio FOREIGN KEY (rub_id) REFERENCES rubro(rub_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_rubro_nota; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nota
    ADD CONSTRAINT fk_rubro_nota FOREIGN KEY (rub_id) REFERENCES rubro(rub_id);


--
-- Name: fk_rubro_rubro_elegible; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rubro_elegible
    ADD CONSTRAINT fk_rubro_rubro_elegible FOREIGN KEY (rub_id) REFERENCES rubro(rub_id);


--
-- Name: fk_seguimie_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_3b
    ADD CONSTRAINT fk_seguimie_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_seguimie_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_aprimp
    ADD CONSTRAINT fk_seguimie_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_seguimie_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_evaluacion
    ADD CONSTRAINT fk_seguimie_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_seguimie_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seguimiento_receppro
    ADD CONSTRAINT fk_seguimie_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_seguimiento_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_seguimiento_municipio FOREIGN KEY (seg_id) REFERENCES seguimiento(seg_id) ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: fk_seguimiento_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_seguimiento_participante FOREIGN KEY (seg_id) REFERENCES seguimiento(seg_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_seleccion_comite_solicitud_asistencia; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seleccion_comite
    ADD CONSTRAINT fk_seleccion_comite_solicitud_asistencia FOREIGN KEY (sol_asis_id) REFERENCES solicitud_asistencia(sol_asis_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_seleccion_solicitud; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_asistencia
    ADD CONSTRAINT fk_seleccion_solicitud FOREIGN KEY (sel_com_id) REFERENCES seleccion_comite(sel_com_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_solicitu_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_ayuda
    ADD CONSTRAINT fk_solicitu_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_solicitud_asistencia_municipio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_asistencia
    ADD CONSTRAINT fk_solicitud_asistencia_municipio FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_tipo_actor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY autor_estrategia
    ADD CONSTRAINT fk_tipo_actor FOREIGN KEY (tip_act_id) REFERENCES tipo_actor(tip_act_id);


--
-- Name: fk_tipo_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT fk_tipo_asociatividad FOREIGN KEY (tip_id) REFERENCES tipo(tip_id);


--
-- Name: fk_tipo_mapa_mapa; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY mapa
    ADD CONSTRAINT fk_tipo_mapa_mapa FOREIGN KEY (tip_map_id) REFERENCES tipo_mapa(tip_map_id);


--
-- Name: fk_transfer_reference_actdes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY transferencia
    ADD CONSTRAINT fk_transfer_reference_actdes FOREIGN KEY (act_destino) REFERENCES actividad(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_transfer_reference_actori; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY transferencia
    ADD CONSTRAINT fk_transfer_reference_actori FOREIGN KEY (act_origen) REFERENCES actividad(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pk_etapa_acuerdo_municipal; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT pk_etapa_acuerdo_municipal FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- Name: pk_etapa_cumplimiento_minimo; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_etapa_cumplimiento_minimo FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- Name: pk_nombrefecha; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY nombrefecha_procesoetapa
    ADD CONSTRAINT pk_nombrefecha FOREIGN KEY (nom_fec_apr_id) REFERENCES nombre_fecha_aprobacion(nom_fec_apr_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pro_pep_id; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY definicion
    ADD CONSTRAINT pro_pep_id FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

