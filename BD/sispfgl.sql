--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Resultado_res_id_seq" OWNER TO sispfgl;

--
-- Name: Resultado_res_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "Resultado_res_id_seq" OWNED BY resultado.res_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actividad_act_id_seq OWNER TO sispfgl;

--
-- Name: actividad_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE actividad_act_id_seq OWNED BY actividad.act_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actividades_epi_act_id_seq OWNER TO sispfgl;

--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE actividades_epi_act_id_seq OWNED BY actividades_epi.act_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.acuerdo_municipal2_acu_mun_id_seq OWNER TO sispfgl;

--
-- Name: acuerdo_municipal2_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acuerdo_municipal2_acu_mun_id_seq OWNED BY acuerdo_municipal2.acu_mun_id;


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE acuerdo_municipal_acu_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.acuerdo_municipal_acu_mun_id_seq OWNER TO sispfgl;

--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acuerdo_municipal_acu_mun_id_seq OWNED BY acuerdo_municipal.acu_mun_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.acumun_miembros_mie_id_seq OWNER TO sispfgl;

--
-- Name: acumun_miembros_mie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE acumun_miembros_mie_id_seq OWNED BY acumun_miembros.mie_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aporte_municipal_aporte_municipal_id_seq OWNER TO sispfgl;

--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE aporte_municipal_aporte_municipal_id_seq OWNED BY aporte_municipal.apo_mun_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.area_accion_id_area_accion_seq OWNER TO sispfgl;

--
-- Name: area_accion_id_area_accion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE area_accion_id_area_accion_seq OWNED BY area_accion.id_area_accion;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.area_dimension_are_dim_id_seq OWNER TO sispfgl;

--
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE area_dimension_are_dim_id_seq OWNED BY area_dimension.are_dim_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asi_tec_miembros_mie_id_seq OWNER TO sispfgl;

--
-- Name: asi_tec_miembros_mie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asi_tec_miembros_mie_id_seq OWNED BY asi_tec_miembros.mie_id;


--
-- Name: asis_ccc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asis_ccc (
    asis_ccc_id integer NOT NULL,
    ccc_con_id integer,
    nombre_asis character varying(50),
    responsabilidad character varying(25),
    sexo character(1)
);


ALTER TABLE public.asis_ccc OWNER TO sispfgl;

--
-- Name: asis_ccc_asis_ccc_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asis_ccc_asis_ccc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asis_ccc_asis_ccc_id_seq OWNER TO sispfgl;

--
-- Name: asis_ccc_asis_ccc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asis_ccc_asis_ccc_id_seq OWNED BY asis_ccc.asis_ccc_id;


--
-- Name: asis_cm; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asis_cm (
    asis_cm_id integer NOT NULL,
    cm_id integer,
    nombre_asis character varying(50),
    responsabilidad character varying(25),
    sexo character(1)
);


ALTER TABLE public.asis_cm OWNER TO sispfgl;

--
-- Name: asis_cm_asis_cm_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asis_cm_asis_cm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asis_cm_asis_cm_id_seq OWNER TO sispfgl;

--
-- Name: asis_cm_asis_cm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asis_cm_asis_cm_id_seq OWNED BY asis_cm.asis_cm_id;


--
-- Name: asis_etm; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asis_etm (
    asis_etm_id integer NOT NULL,
    etm_id integer,
    nombre_asis character varying(50),
    responsabilidad character varying(25),
    sexo character(1)
);


ALTER TABLE public.asis_etm OWNER TO sispfgl;

--
-- Name: asis_etm_asis_etm_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE asis_etm_asis_etm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asis_etm_asis_etm_id_seq OWNER TO sispfgl;

--
-- Name: asis_etm_asis_etm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asis_etm_asis_etm_id_seq OWNED BY asis_etm.asis_etm_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asistencia_tecnica_asi_tec_id_seq OWNER TO sispfgl;

--
-- Name: asistencia_tecnica_asi_tec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asistencia_tecnica_asi_tec_id_seq OWNED BY asistencia_tecnica.asi_tec_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asistente_divu_asis_id_seq OWNER TO sispfgl;

--
-- Name: asistente_divu_asis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asistente_divu_asis_id_seq OWNED BY asistente_divu.asis_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asociatividad_aso_id_seq OWNER TO sispfgl;

--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE asociatividad_aso_id_seq OWNED BY asociatividad.aso_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.autor_estrategia_aut_est_id_seq OWNER TO sispfgl;

--
-- Name: autor_estrategia_aut_est_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE autor_estrategia_aut_est_id_seq OWNED BY autor_estrategia.aut_est_id;


--
-- Name: c22_capacitaciones; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_capacitaciones (
    cap_id integer NOT NULL,
    mod_id integer,
    cap_proceso character varying(20),
    cap_area character varying(200),
    cap_nombre character varying(200),
    cap_entidad character varying(200),
    cap_nivel character varying(20),
    cap_facilitador character varying(200),
    cap_fecha_ini date,
    cap_duracion integer,
    cap_duracion_tipo character varying(10),
    cap_descripcion text,
    cap_observaciones text,
    cap_archivo character varying(250),
    cap_add date,
    cap_sede bit varying(200)
);


ALTER TABLE public.c22_capacitaciones OWNER TO sispfgl;

--
-- Name: c22_capacitaciones_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE c22_capacitaciones_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c22_capacitaciones_cap_id_seq OWNER TO sispfgl;

--
-- Name: c22_capacitaciones_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE c22_capacitaciones_cap_id_seq OWNED BY c22_capacitaciones.cap_id;


--
-- Name: c22_cxp_inscritos; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_cxp_inscritos (
    cxp_id integer NOT NULL,
    cxp_cap_id integer,
    cxp_par_id integer,
    cxp_estado character varying(10),
    cxp_promedio character varying(50),
    cxp_constancia character varying(200),
    cxp_observaciones character varying(200)
);


ALTER TABLE public.c22_cxp_inscritos OWNER TO sispfgl;

--
-- Name: c22_cxp_inscritos_cxp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE c22_cxp_inscritos_cxp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c22_cxp_inscritos_cxp_id_seq OWNER TO sispfgl;

--
-- Name: c22_cxp_inscritos_cxp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE c22_cxp_inscritos_cxp_id_seq OWNED BY c22_cxp_inscritos.cxp_id;


--
-- Name: c22_cxp_solicitud; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_cxp_solicitud (
    cap_id integer,
    par_id integer,
    cxp_justificacion text
);


ALTER TABLE public.c22_cxp_solicitud OWNER TO sispfgl;

--
-- Name: c22_modalidades; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_modalidades (
    mod_id integer NOT NULL,
    mod_nombre character varying(100)
);


ALTER TABLE public.c22_modalidades OWNER TO sispfgl;

--
-- Name: c22_modalidades_mod_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE c22_modalidades_mod_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c22_modalidades_mod_id_seq OWNER TO sispfgl;

--
-- Name: c22_modalidades_mod_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE c22_modalidades_mod_id_seq OWNED BY c22_modalidades.mod_id;


--
-- Name: c22_participantes; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_participantes (
    par_id integer NOT NULL,
    par_nombres character varying(100),
    par_apellidos character varying(100),
    par_birthplace character varying(200),
    par_birthday date,
    par_sexo character varying(1),
    par_dui character varying(9),
    par_dir_tipo character varying(10),
    par_dir_nombre character varying(100),
    par_dir_calle character varying(100),
    par_dir_casa character varying(10),
    par_dir_municipio integer,
    par_telefono character varying(8),
    par_movil character varying(8),
    par_nivel character varying(20),
    par_titulos text,
    par_ins_municipio integer,
    par_ins_cargo character varying(200),
    par_ins_categoria character varying(100),
    par_ins_nivel character varying(100),
    par_ins_tiempo smallint,
    par_ins_tiempo2 smallint,
    par_ins_servicio smallint,
    par_ins_servicio2 smallint,
    par_acepta integer,
    par_ins_telefono character varying(8),
    par_ins_movil character varying(8),
    par_username integer,
    mun_id integer
);


ALTER TABLE public.c22_participantes OWNER TO sispfgl;

--
-- Name: c22_participantes_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE c22_participantes_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c22_participantes_par_id_seq OWNER TO sispfgl;

--
-- Name: c22_participantes_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE c22_participantes_par_id_seq OWNED BY c22_participantes.par_id;


--
-- Name: c22_sedes; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c22_sedes (
    sed_id integer NOT NULL,
    sed_nombre character varying(200)
);


ALTER TABLE public.c22_sedes OWNER TO sispfgl;

--
-- Name: c22_sedes_sed_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE c22_sedes_sed_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c22_sedes_sed_id_seq OWNER TO sispfgl;

--
-- Name: c22_sedes_sed_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE c22_sedes_sed_id_seq OWNED BY c22_sedes.sed_id;


--
-- Name: c24_user_depto; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE c24_user_depto (
    user_id integer,
    deptos character varying(40),
    uxd_id integer NOT NULL
);


ALTER TABLE public.c24_user_depto OWNER TO sispfgl;

--
-- Name: cap_concejo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE cap_concejo (
    par_id integer NOT NULL,
    cap_id integer,
    par_nombre character varying(50),
    par_apellidos character varying(50),
    par_sexo character varying(1),
    par_edad smallint,
    par_cargo character varying(50),
    par_telefono character varying(8)
);


ALTER TABLE public.cap_concejo OWNER TO sispfgl;

--
-- Name: cap_concejo_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE cap_concejo_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cap_concejo_par_id_seq OWNER TO sispfgl;

--
-- Name: cap_concejo_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cap_concejo_par_id_seq OWNED BY cap_concejo.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cap_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: cap_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cap_participante_par_id_seq OWNED BY cap_participante.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.capacitacion_cap_id_seq OWNER TO sispfgl;

--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE capacitacion_cap_id_seq OWNED BY capacitacion.cap_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.capacitaciones_cap_id_seq OWNER TO sispfgl;

--
-- Name: capacitaciones_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE capacitaciones_cap_id_seq OWNED BY capacitaciones.cap_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cat_consultores_con_id_seq OWNER TO sispfgl;

--
-- Name: cat_consultores_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cat_consultores_con_id_seq OWNED BY cat_consultores.con_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_fortalecimiento_cat_for_id_seq OWNER TO sispfgl;

--
-- Name: categoria_fortalecimiento_cat_for_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE categoria_fortalecimiento_cat_for_id_seq OWNED BY categoria_fortalecimiento.cat_for_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cc_cc_id_seq OWNER TO sispfgl;

--
-- Name: cc_cc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cc_cc_id_seq OWNED BY cc.cc_id;


--
-- Name: ccc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE ccc (
    ccc_id integer NOT NULL,
    mun_id integer,
    fecha_conformacion date,
    lugar_conformacion character varying(50)
);


ALTER TABLE public.ccc OWNER TO sispfgl;

--
-- Name: ccc_ccc_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE ccc_ccc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ccc_ccc_id_seq OWNER TO sispfgl;

--
-- Name: ccc_ccc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE ccc_ccc_id_seq OWNED BY ccc.ccc_id;


--
-- Name: ccc_con; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE ccc_con (
    ccc_con_id integer NOT NULL,
    ccc_id integer,
    tipo_ccc_con character varying(25),
    fecha_constitucion date,
    fecha_capacitacion date,
    total_mujeres integer,
    total_hombres integer
);


ALTER TABLE public.ccc_con OWNER TO sispfgl;

--
-- Name: ccc_con_ccc_con_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE ccc_con_ccc_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ccc_con_ccc_con_id_seq OWNER TO sispfgl;

--
-- Name: ccc_con_ccc_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE ccc_con_ccc_con_id_seq OWNED BY ccc_con.ccc_con_id;


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
-- Name: comentario_publico_cc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE comentario_publico_cc (
    coment_id integer NOT NULL,
    cc_id integer,
    nombre_persona character varying(50),
    email character varying(30),
    comentario character varying(500),
    fecha_coment date
);


ALTER TABLE public.comentario_publico_cc OWNER TO sispfgl;

--
-- Name: comentario_publico_cc_coment_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE comentario_publico_cc_coment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comentario_publico_cc_coment_id_seq OWNER TO sispfgl;

--
-- Name: comentario_publico_cc_coment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE comentario_publico_cc_coment_id_seq OWNED BY comentario_publico_cc.coment_id;


--
-- Name: comentario_publico_ccc; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE comentario_publico_ccc (
    coment_id integer NOT NULL,
    ccc_id integer,
    nombre_persona character varying(50),
    email character varying(30),
    comentario character varying(500),
    fecha_coment date
);


ALTER TABLE public.comentario_publico_ccc OWNER TO sispfgl;

--
-- Name: comentario_publico_ccc_coment_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE comentario_publico_ccc_coment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comentario_publico_ccc_coment_id_seq OWNER TO sispfgl;

--
-- Name: comentario_publico_ccc_coment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE comentario_publico_ccc_coment_id_seq OWNED BY comentario_publico_ccc.coment_id;


--
-- Name: comision_mant; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE comision_mant (
    cm_id integer NOT NULL,
    ccc_id integer,
    tipo_cm character varying(25),
    fecha_constitucion date,
    total_mujeres integer,
    total_hombres integer
);


ALTER TABLE public.comision_mant OWNER TO sispfgl;

--
-- Name: comision_mant_cm_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE comision_mant_cm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comision_mant_cm_id_seq OWNER TO sispfgl;

--
-- Name: comision_mant_cm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE comision_mant_cm_id_seq OWNED BY comision_mant.cm_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente24a_atm_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_atm_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_atm_comp_id_seq OWNED BY componente24a_atm.comp_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente24a_cap_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_cap_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_cap_comp_id_seq OWNED BY componente24a_cap.comp_id;


--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente24a_comp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente24a_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente24a_comp_id_seq OWNED BY componente24a.comp_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente26_cap_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_cap_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_cap_comp_id_seq OWNED BY componente26_cap.comp_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente26_con_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_con_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_con_comp_id_seq OWNED BY componente26_con.comp_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente26_equi_comp_id_seq OWNER TO sispfgl;

--
-- Name: componente26_equi_comp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente26_equi_comp_id_seq OWNED BY componente26_equi.comp_id;


--
-- Name: componente_com_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE componente_com_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.componente_com_id_seq OWNER TO sispfgl;

--
-- Name: componente_com_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE componente_com_id_seq OWNED BY componente.com_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consulta_cons_id_seq OWNER TO sispfgl;

--
-- Name: consulta_cons_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consulta_cons_id_seq OWNED BY consultora.cons_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consultor_con_id_seq OWNER TO sispfgl;

--
-- Name: consultor_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consultor_con_id_seq OWNED BY consultor.con_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consultores_interes_con_int_id_seq OWNER TO sispfgl;

--
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE consultores_interes_con_int_id_seq OWNED BY consultores_interes.con_int_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contrapartida_con_id_seq OWNER TO sispfgl;

--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE contrapartida_con_id_seq OWNED BY contrapartida.con_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."criterio_E0_criterio_id_seq" OWNER TO sispfgl;

--
-- Name: criterio_E0_criterio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "criterio_E0_criterio_id_seq" OWNED BY criterio_e0.criterio_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.criterio_cri_id_seq OWNER TO sispfgl;

--
-- Name: criterio_cri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE criterio_cri_id_seq OWNED BY criterio.cri_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cumplimiento_minimo_cum_min_id_seq OWNER TO sispfgl;

--
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE cumplimiento_minimo_cum_min_id_seq OWNED BY cumplimiento_minimo.cum_min_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dd_seq OWNER TO sispfgl;

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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.declaracion_interes_dec_int_id_seq OWNER TO sispfgl;

--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE declaracion_interes_dec_int_id_seq OWNED BY declaracion_interes.dec_int_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.definicion_def_id_seq OWNER TO sispfgl;

--
-- Name: definicion_def_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE definicion_def_id_seq OWNED BY definicion.def_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamento_dep_id_seq OWNER TO sispfgl;

--
-- Name: departamento_dep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE departamento_dep_id_seq OWNED BY departamento.dep_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalle_fortalecimiento_for_id_seq OWNER TO sispfgl;

--
-- Name: detalle_fortalecimiento_for_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detalle_fortalecimiento_for_id_seq OWNED BY detalle_fortalecimiento.for_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalle_obra_det_obr_id_seq OWNER TO sispfgl;

--
-- Name: detalle_obra_det_obr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detalle_obra_det_obr_id_seq OWNED BY detalle_obra.det_obr_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detmonto_proyeccion_dmon_pro_id_seq OWNER TO sispfgl;

--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE detmonto_proyeccion_dmon_pro_id_seq OWNED BY detmonto_proyeccion.dmon_pro_id;


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
    pro_pep_id integer NOT NULL,
    dia_firmam boolean,
    dia_firmai boolean,
    dia_firmau boolean
);


ALTER TABLE public.diagnostico OWNER TO sispfgl;

--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE diagnostico_dia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.diagnostico_dia_id_seq OWNER TO sispfgl;

--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE diagnostico_dia_id_seq OWNED BY diagnostico.dia_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.divu_divu_id_seq OWNER TO sispfgl;

--
-- Name: divu_divu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE divu_divu_id_seq OWNED BY divu.divu_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dsat_seq OWNER TO sispfgl;

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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.elaboracion_proyecto_ela_pro_id_seq OWNER TO sispfgl;

--
-- Name: elaboracion_proyecto_ela_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE elaboracion_proyecto_ela_pro_id_seq OWNED BY elaboracion_proyecto.ela_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empleados_emp_id_seq OWNER TO sispfgl;

--
-- Name: empleados_emp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE empleados_emp_id_seq OWNED BY empleados.emp_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empleados_municipales_emp_mun_id_seq OWNER TO sispfgl;

--
-- Name: empleados_municipales_emp_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE empleados_municipales_emp_mun_id_seq OWNED BY empleados_municipales.emp_mun_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.epi_seq OWNER TO sispfgl;

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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estrategia_inversion_est_inv_id_seq OWNER TO sispfgl;

--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE estrategia_inversion_est_inv_id_seq OWNED BY estrategia_comunicacion.est_com_id;


--
-- Name: etapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE etapa (
    eta_id integer NOT NULL,
    eta_nombre character varying(30) NOT NULL
);


ALTER TABLE public.etapa OWNER TO sispfgl;

--
-- Name: etm; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE etm (
    etm_id integer NOT NULL,
    ccc_id integer,
    tipo_etm character varying(25),
    fecha_induccion date,
    fecha_capacitacion date,
    total_mujeres integer,
    total_hombres integer
);


ALTER TABLE public.etm OWNER TO sispfgl;

--
-- Name: etm_etm_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE etm_etm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.etm_etm_id_seq OWNER TO sispfgl;

--
-- Name: etm_etm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE etm_etm_id_seq OWNED BY etm.etm_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facilitador_fac_id_seq OWNER TO sispfgl;

--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE facilitador_fac_id_seq OWNED BY facilitador.fac_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fcdp_seq OWNER TO sispfgl;

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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fuente_financiamiento_fue_fin_id_seq OWNER TO sispfgl;

--
-- Name: fuente_financiamiento_fue_fin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_financiamiento_fue_fin_id_seq OWNED BY fuente_financiamiento.fue_fin_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fuente_primaria_fue_pri_id_seq OWNER TO sispfgl;

--
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_primaria_fue_pri_id_seq OWNED BY fuente_primaria.fue_pri_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fuente_secundaria_fue_sec_id_seq OWNER TO sispfgl;

--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE fuente_secundaria_fue_sec_id_seq OWNED BY fuente_secundaria.fue_sec_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gescon_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: gescon_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gescon_participante_par_id_seq OWNED BY gescon_participante.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gesrie_participan_par_id_seq OWNER TO sispfgl;

--
-- Name: gesrie_participan_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gesrie_participan_par_id_seq OWNED BY gesrie_participan.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gestion_conocimiento_gescon_id_seq OWNER TO sispfgl;

--
-- Name: gestion_conocimiento_gescon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gestion_conocimiento_gescon_id_seq OWNED BY gestion_conocimiento.gescon_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gestion_riesgo_gesrie_id_seq OWNER TO sispfgl;

--
-- Name: gestion_riesgo_gesrie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gestion_riesgo_gesrie_id_seq OWNED BY gestion_riesgo.gesrie_id;


--
-- Name: gestion_seguimiento; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE gestion_seguimiento (
    ges_seg_id integer NOT NULL,
    ges_seg_op1 boolean,
    ges_seg_op2 boolean,
    ges_seg_op3 boolean,
    ges_seg_op4 boolean,
    ges_seg_op5 boolean,
    ges_seg_op6 boolean,
    ges_seg_op7 boolean,
    ges_seg_fentrega date,
    ges_seg_fvobo date,
    ges_seg_fconcejo date,
    ges_seg_concejo_mun boolean,
    ges_seg_isdem boolean,
    ges_seg_uep boolean,
    ges_seg_acu_ruta_archivo character varying(255),
    ges_seg_act_ruta_archivo character varying(255),
    ges_seg_poa_ruta_archivo character varying(255),
    ges_seg_pip_ruta_archivo character varying(255),
    ges_seg_doc_ruta_archivo character varying(255),
    ges_seg_observacion text,
    mun_id integer
);


ALTER TABLE public.gestion_seguimiento OWNER TO sispfgl;

--
-- Name: gestion_seguimiento_ges_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE gestion_seguimiento_ges_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gestion_seguimiento_ges_seg_id_seq OWNER TO sispfgl;

--
-- Name: gestion_seguimiento_ges_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE gestion_seguimiento_ges_seg_id_seq OWNED BY gestion_seguimiento.ges_seg_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupo_apoyo_gru_apo_id_seq OWNER TO sispfgl;

--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_apoyo_gru_apo_id_seq OWNED BY grupo_apoyo.gru_apo_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupo_gestor_gru_ges_id_seq OWNER TO sispfgl;

--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_gestor_gru_ges_id_seq OWNED BY grupo_gestor.gru_ges_id;


--
-- Name: grupo_gru_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE grupo_gru_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupo_gru_id_seq OWNER TO sispfgl;

--
-- Name: grupo_gru_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE grupo_gru_id_seq OWNED BY grupo.gru_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indicador_ind_id_seq OWNER TO sispfgl;

--
-- Name: indicador_ind_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicador_ind_id_seq OWNED BY indicador.ind_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno1_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno1_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno1_ind_des_id_seq OWNED BY indicadores_desempeno1.ind_des_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno2_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno2_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno2_ind_des_id_seq OWNED BY indicadores_desempeno2.ind_des_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indicadores_desempeno3_ind_des_id_seq OWNER TO sispfgl;

--
-- Name: indicadores_desempeno3_ind_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE indicadores_desempeno3_ind_des_id_seq OWNED BY indicadores_desempeno3.ind_des_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.informe_preliminar_inf_pre_id_seq OWNER TO sispfgl;

--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE informe_preliminar_inf_pre_id_seq OWNED BY informe_preliminar.inf_pre_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.institucion_ins_id_seq OWNER TO sispfgl;

--
-- Name: institucion_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE institucion_ins_id_seq OWNED BY institucion.ins_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.integracion_instancia_int_ins_id_seq OWNER TO sispfgl;

--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE integracion_instancia_int_ins_id_seq OWNED BY integracion_instancia.int_ins_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.integrante_asociatividad_int_aso_id_seq OWNER TO sispfgl;

--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE integrante_asociatividad_int_aso_id_seq OWNED BY integrante_asociatividad.int_aso_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_informacion_inv_inf_id_seq OWNER TO sispfgl;

--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE inventario_informacion_inv_inf_id_seq OWNED BY inventario_informacion.inv_inf_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.login_attempts_id_seq OWNER TO sispfgl;

--
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.manuales_administrativos_man_adm_id_seq OWNER TO sispfgl;

--
-- Name: manuales_administrativos_man_adm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE manuales_administrativos_man_adm_id_seq OWNED BY manuales_administrativos.man_adm_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mapa_map_id_seq OWNER TO sispfgl;

--
-- Name: mapa_map_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE mapa_map_id_seq OWNED BY mapa.map_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.monto_proyeccion_mon_pro_id_seq OWNER TO sispfgl;

--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE monto_proyeccion_mon_pro_id_seq OWNED BY monto_proyeccion.mon_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipio_mun_id_seq OWNER TO sispfgl;

--
-- Name: municipio_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE municipio_mun_id_seq OWNED BY municipio.mun_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nombre_fecha_aprobacion_nom_fec_apr_id_seq OWNER TO sispfgl;

--
-- Name: nombre_fecha_aprobacion_nom_fec_apr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nombre_fecha_aprobacion_nom_fec_apr_id_seq OWNED BY nombre_fecha_aprobacion.nom_fec_apr_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nombre_rubro_nom_rub_id_seq OWNER TO sispfgl;

--
-- Name: nombre_rubro_nom_rub_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nombre_rubro_nom_rub_id_seq OWNED BY nombre_rubro.nom_rub_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nota_not_id_seq OWNER TO sispfgl;

--
-- Name: nota_not_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE nota_not_id_seq OWNED BY nota.not_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.obra_obr_id_seq OWNER TO sispfgl;

--
-- Name: obra_obr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE obra_obr_id_seq OWNED BY obra.obr_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.opcion_sistema_opc_sis_id_seq OWNER TO sispfgl;

--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE opcion_sistema_opc_sis_id_seq OWNED BY opcion_sistema.opc_sis_id;


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
    par_nivel_esco character varying(100),
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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.participante_capacitacion_par_cap_id_seq OWNER TO sispfgl;

--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE participante_capacitacion_par_cap_id_seq OWNED BY participante_capacitacion.par_cap_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.participante_par_id_seq OWNER TO sispfgl;

--
-- Name: participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE participante_par_id_seq OWNED BY participante.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfil_proyecto_per_pro_id_seq OWNER TO sispfgl;

--
-- Name: perfil_proyecto_per_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE perfil_proyecto_per_pro_id_seq OWNED BY perfil_proyecto.per_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_enlace_per_enl_id_seq OWNER TO sispfgl;

--
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE personal_enlace_per_enl_id_seq OWNED BY personal_enlace.per_enl_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pestania_proceso_pes_pro_id_seq OWNER TO sispfgl;

--
-- Name: pestania_proceso_pes_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE pestania_proceso_pes_pro_id_seq OWNED BY pestania_proceso.pes_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_contingencia_pla_con_id_seq OWNER TO sispfgl;

--
-- Name: plan_contingencia_pla_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_contingencia_pla_con_id_seq OWNED BY plan_contingencia.pla_con_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_inversion_pla_inv_id_seq OWNER TO sispfgl;

--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_inversion_pla_inv_id_seq OWNED BY plan_inversion.pla_inv_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_trabajo_plan_trab_id_seq OWNER TO sispfgl;

--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE plan_trabajo_plan_trab_id_seq OWNED BY plan_trabajo.pla_tra_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.poblacion_pro_id_seq OWNER TO sispfgl;

--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE poblacion_pro_id_seq OWNED BY poblacion_reunion.pob_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.portafolio_proyecto_por_pro_id_seq OWNER TO sispfgl;

--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE portafolio_proyecto_por_pro_id_seq OWNED BY portafolio_proyecto.por_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.presentes_participante_par_id_seq OWNER TO sispfgl;

--
-- Name: presentes_participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE presentes_participante_par_id_seq OWNED BY presentes_participante.par_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.presupuesto_pre_id_seq OWNER TO sispfgl;

--
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE presupuesto_pre_id_seq OWNED BY presupuesto.pre_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.priorizacion_pri_id_seq OWNER TO sispfgl;

--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE priorizacion_pri_id_seq OWNED BY priorizacion.pri_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.problema_identificado_pro_ide_id_seq OWNER TO sispfgl;

--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE problema_identificado_pro_ide_id_seq OWNED BY problema_identificado.pro_ide_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proceso_etapa_pro_eta_id_seq OWNER TO sispfgl;

--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proceso_etapa_pro_eta_id_seq OWNED BY proceso_etapa.pro_eta_id;


--
-- Name: proceso_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE proceso_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proceso_pro_id_seq OWNER TO sispfgl;

--
-- Name: proceso_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proceso_pro_id_seq OWNED BY proceso.pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyeccion_ingreso_pro_ing_id_seq OWNER TO sispfgl;

--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyeccion_ingreso_pro_ing_id_seq OWNED BY proyeccion_ingreso.pro_ing_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."proyecto_Pep_pro_pep_id_seq" OWNER TO sispfgl;

--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE "proyecto_Pep_pro_pep_id_seq" OWNED BY proyecto_pep.pro_pep_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyecto_identificado_pro_ide_id_seq OWNER TO sispfgl;

--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyecto_identificado_pro_ide_id_seq OWNED BY proyecto_identificado.pro_ide_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proyectos_cc_id_proy_cc_seq OWNER TO sispfgl;

--
-- Name: proyectos_cc_id_proy_cc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE proyectos_cc_id_proy_cc_seq OWNED BY proyectos_cc.id_proy_cc;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recibido_municipalidad_rec_mun_id_seq OWNER TO sispfgl;

--
-- Name: recibido_municipalidad_rec_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE recibido_municipalidad_rec_mun_id_seq OWNED BY recibido_municipalidad.rec_mun_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.region_reg_id_seq OWNER TO sispfgl;

--
-- Name: region_reg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE region_reg_id_seq OWNED BY region.reg_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reunion_reu_id_seq OWNER TO sispfgl;

--
-- Name: reunion_reu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE reunion_reu_id_seq OWNED BY reunion.reu_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.revapro_productos2_rea_pro_id_seq OWNER TO sispfgl;

--
-- Name: revapro_productos2_rea_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revapro_productos2_rea_pro_id_seq OWNED BY revapro_productos2.rea_pro_id;


--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE revapro_productos_rea_pro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.revapro_productos_rea_pro_id_seq OWNER TO sispfgl;

--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revapro_productos_rea_pro_id_seq OWNED BY revapro_productos.rea_pro_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.revision_informacion_rev_inf_id_seq OWNER TO sispfgl;

--
-- Name: revision_informacion_rev_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE revision_informacion_rev_inf_id_seq OWNED BY revision_informacion.rev_inf_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rol_rol_id_seq OWNER TO sispfgl;

--
-- Name: rol_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rol_rol_id_seq OWNED BY rol.rol_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rubro_elegible_rub_ele_id_seq OWNER TO sispfgl;

--
-- Name: rubro_elegible_rub_ele_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rubro_elegible_rub_ele_id_seq OWNED BY rubro_elegible.rub_ele_id;


--
-- Name: rubro_rub_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE rubro_rub_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rubro_rub_id_seq OWNER TO sispfgl;

--
-- Name: rubro_rub_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE rubro_rub_id_seq OWNED BY rubro.rub_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_3b_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_3b_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_3b_seg_id_seq OWNED BY seguimiento_3b.seg_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_aprimp_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_aprimp_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_aprimp_seg_id_seq OWNED BY seguimiento_aprimp.seg_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_evaluacion_seg_eva_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_evaluacion_seg_eva_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_evaluacion_seg_eva_id_seq OWNED BY seguimiento_evaluacion.seg_eva_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_receppro_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_receppro_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_receppro_seg_id_seq OWNED BY seguimiento_receppro.seg_id;


--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE seguimiento_seg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_seg_id_seq OWNER TO sispfgl;

--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seguimiento_seg_id_seq OWNED BY seguimiento.seg_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seleccion_comite_seleccion_comite_id_seq OWNER TO sispfgl;

--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE seleccion_comite_seleccion_comite_id_seq OWNED BY seleccion_comite.sel_com_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_asistencia_sol_asis_id_seq OWNER TO sispfgl;

--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE solicitud_asistencia_sol_asis_id_seq OWNED BY solicitud_asistencia.sol_asis_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_ayuda_sol_ayu_id_seq OWNER TO sispfgl;

--
-- Name: solicitud_ayuda_sol_ayu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE solicitud_ayuda_sol_ayu_id_seq OWNED BY solicitud_ayuda.sol_ayu_id;


--
-- Name: subproy_segui; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE subproy_segui (
    subproy_id integer NOT NULL,
    ccc_id integer,
    nom_subproy character varying(50),
    nom_com_beneficiadas character varying(100),
    num_com_beneficiadas integer
);


ALTER TABLE public.subproy_segui OWNER TO sispfgl;

--
-- Name: subproy_segui_subproy_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE subproy_segui_subproy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.subproy_segui_subproy_id_seq OWNER TO sispfgl;

--
-- Name: subproy_segui_subproy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE subproy_segui_subproy_id_seq OWNED BY subproy_segui.subproy_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_actor_tip_act_id_seq OWNER TO sispfgl;

--
-- Name: tipo_actor_tip_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_actor_tip_act_id_seq OWNED BY tipo_actor.tip_act_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_mapa_tip_map_id_seq OWNER TO sispfgl;

--
-- Name: tipo_mapa_tip_map_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_mapa_tip_map_id_seq OWNED BY tipo_mapa.tip_map_id;


--
-- Name: tipo_tip_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE tipo_tip_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_tip_id_seq OWNER TO sispfgl;

--
-- Name: tipo_tip_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE tipo_tip_id_seq OWNED BY tipo.tip_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transferencia_trans_id_seq OWNER TO sispfgl;

--
-- Name: transferencia_trans_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE transferencia_trans_id_seq OWNED BY transferencia.trans_id;


--
-- Name: uep_act_actividades; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_act_actividades (
    cat_id integer NOT NULL,
    cat_nombre character varying(30)
);


ALTER TABLE public.uep_act_actividades OWNER TO sispfgl;

--
-- Name: uep_act_actividades_cat_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_act_actividades_cat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_act_actividades_cat_id_seq OWNER TO sispfgl;

--
-- Name: uep_act_actividades_cat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_act_actividades_cat_id_seq OWNED BY uep_act_actividades.cat_id;


--
-- Name: uep_act_area; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_act_area (
    ars_id integer NOT NULL,
    ars_nombre character varying(30)
);


ALTER TABLE public.uep_act_area OWNER TO sispfgl;

--
-- Name: uep_act_area_ars_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_act_area_ars_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_act_area_ars_id_seq OWNER TO sispfgl;

--
-- Name: uep_act_area_ars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_act_area_ars_id_seq OWNED BY uep_act_area.ars_id;


--
-- Name: uep_actividades; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_actividades (
    act_id integer NOT NULL,
    cat_id integer,
    ars_id integer,
    act_mun_id integer,
    act_responsable integer,
    act_lugar character varying(200),
    act_fecha date,
    act_componente character varying(200),
    act_subcomponente character varying(200),
    act_tipo character varying(15),
    act_agenda text,
    act_instituciones text,
    act_comentarios text
);


ALTER TABLE public.uep_actividades OWNER TO sispfgl;

--
-- Name: uep_actividades_act_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_actividades_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_actividades_act_id_seq OWNER TO sispfgl;

--
-- Name: uep_actividades_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_actividades_act_id_seq OWNED BY uep_actividades.act_id;


--
-- Name: uep_actividades_participantes; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_actividades_participantes (
    par_id integer NOT NULL,
    par_act_id integer,
    par_nombres character varying(100),
    par_apellidos character varying(100),
    par_edad smallint,
    par_sexo character varying(1),
    par_cargo character varying(100),
    par_telefono character varying(8)
);


ALTER TABLE public.uep_actividades_participantes OWNER TO sispfgl;

--
-- Name: uep_actividades_participantes_par_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_actividades_participantes_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_actividades_participantes_par_id_seq OWNER TO sispfgl;

--
-- Name: uep_actividades_participantes_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_actividades_participantes_par_id_seq OWNED BY uep_actividades_participantes.par_id;


--
-- Name: uep_mem_actividades; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_mem_actividades (
    acs_id integer NOT NULL,
    acs_mem_id integer,
    acs_correlativo integer,
    acs_descripcion text
);


ALTER TABLE public.uep_mem_actividades OWNER TO sispfgl;

--
-- Name: uep_mem_actividades_acs_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_mem_actividades_acs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_mem_actividades_acs_id_seq OWNER TO sispfgl;

--
-- Name: uep_mem_actividades_acs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_mem_actividades_acs_id_seq OWNED BY uep_mem_actividades.acs_id;


--
-- Name: uep_mem_acuerdos; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_mem_acuerdos (
    acu_id integer NOT NULL,
    acu_mem_id integer,
    acu_correlativo integer,
    acu_descripcion text
);


ALTER TABLE public.uep_mem_acuerdos OWNER TO sispfgl;

--
-- Name: uep_mem_acuerdos_acu_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_mem_acuerdos_acu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_mem_acuerdos_acu_id_seq OWNER TO sispfgl;

--
-- Name: uep_mem_acuerdos_acu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_mem_acuerdos_acu_id_seq OWNED BY uep_mem_acuerdos.acu_id;


--
-- Name: uep_mem_areas; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_mem_areas (
    are_id integer NOT NULL,
    are_nombre character varying(50)
);


ALTER TABLE public.uep_mem_areas OWNER TO sispfgl;

--
-- Name: uep_mem_areas_are_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_mem_areas_are_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_mem_areas_are_id_seq OWNER TO sispfgl;

--
-- Name: uep_mem_areas_are_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_mem_areas_are_id_seq OWNED BY uep_mem_areas.are_id;


--
-- Name: uep_memorias; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_memorias (
    mem_id integer NOT NULL,
    mem_mun_id integer,
    mem_area integer,
    mem_nombre character varying(200),
    mem_fecha date,
    mem_comentarios text
);


ALTER TABLE public.uep_memorias OWNER TO sispfgl;

--
-- Name: uep_memorias_mem_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_memorias_mem_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_memorias_mem_id_seq OWNER TO sispfgl;

--
-- Name: uep_memorias_mem_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_memorias_mem_id_seq OWNED BY uep_memorias.mem_id;


--
-- Name: uep_per_desarrollo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_per_desarrollo (
    des_id integer NOT NULL,
    des_per_id integer,
    des_correlativo character varying(20),
    des_descripcion text,
    des_responsable text
);


ALTER TABLE public.uep_per_desarrollo OWNER TO sispfgl;

--
-- Name: uep_per_desarrollo_des_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_per_desarrollo_des_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_per_desarrollo_des_id_seq OWNER TO sispfgl;

--
-- Name: uep_per_desarrollo_des_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_per_desarrollo_des_id_seq OWNED BY uep_per_desarrollo.des_id;


--
-- Name: uep_per_objetivos; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_per_objetivos (
    obj_id integer NOT NULL,
    obj_per_id integer,
    obj_correlativo integer,
    obj_descripcion text
);


ALTER TABLE public.uep_per_objetivos OWNER TO sispfgl;

--
-- Name: uep_per_objetivos_obj_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_per_objetivos_obj_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_per_objetivos_obj_id_seq OWNER TO sispfgl;

--
-- Name: uep_per_objetivos_obj_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_per_objetivos_obj_id_seq OWNED BY uep_per_objetivos.obj_id;


--
-- Name: uep_perfiles; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE uep_perfiles (
    per_id integer NOT NULL,
    per_mun_id integer,
    per_nombre character varying(200),
    per_fecha_ini date,
    per_fecha_fin date,
    per_lugar character varying(200),
    per_participantes text,
    per_objetivo text,
    per_observaciones text
);


ALTER TABLE public.uep_perfiles OWNER TO sispfgl;

--
-- Name: uep_perfiles_per_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE uep_perfiles_per_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uep_perfiles_per_id_seq OWNER TO sispfgl;

--
-- Name: uep_perfiles_per_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE uep_perfiles_per_id_seq OWNED BY uep_perfiles.per_id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_profiles_id_seq OWNER TO sispfgl;

--
-- Name: user_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE user_profiles_id_seq OWNED BY user_profiles.id;


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
    rol_id integer NOT NULL,
    reg_id integer
);


ALTER TABLE public.users OWNER TO sispfgl;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: sispfgl
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO sispfgl;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sispfgl
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


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
-- Name: asis_ccc_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_ccc ALTER COLUMN asis_ccc_id SET DEFAULT nextval('asis_ccc_asis_ccc_id_seq'::regclass);


--
-- Name: asis_cm_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_cm ALTER COLUMN asis_cm_id SET DEFAULT nextval('asis_cm_asis_cm_id_seq'::regclass);


--
-- Name: asis_etm_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_etm ALTER COLUMN asis_etm_id SET DEFAULT nextval('asis_etm_asis_etm_id_seq'::regclass);


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
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_capacitaciones ALTER COLUMN cap_id SET DEFAULT nextval('c22_capacitaciones_cap_id_seq'::regclass);


--
-- Name: cxp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_cxp_inscritos ALTER COLUMN cxp_id SET DEFAULT nextval('c22_cxp_inscritos_cxp_id_seq'::regclass);


--
-- Name: mod_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_modalidades ALTER COLUMN mod_id SET DEFAULT nextval('c22_modalidades_mod_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_participantes ALTER COLUMN par_id SET DEFAULT nextval('c22_participantes_par_id_seq'::regclass);


--
-- Name: sed_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_sedes ALTER COLUMN sed_id SET DEFAULT nextval('c22_sedes_sed_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cap_concejo ALTER COLUMN par_id SET DEFAULT nextval('cap_concejo_par_id_seq'::regclass);


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
-- Name: ccc_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY ccc ALTER COLUMN ccc_id SET DEFAULT nextval('ccc_ccc_id_seq'::regclass);


--
-- Name: ccc_con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY ccc_con ALTER COLUMN ccc_con_id SET DEFAULT nextval('ccc_con_ccc_con_id_seq'::regclass);


--
-- Name: coment_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comentario_publico_cc ALTER COLUMN coment_id SET DEFAULT nextval('comentario_publico_cc_coment_id_seq'::regclass);


--
-- Name: coment_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comentario_publico_ccc ALTER COLUMN coment_id SET DEFAULT nextval('comentario_publico_ccc_coment_id_seq'::regclass);


--
-- Name: cm_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comision_mant ALTER COLUMN cm_id SET DEFAULT nextval('comision_mant_cm_id_seq'::regclass);


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
-- Name: etm_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY etm ALTER COLUMN etm_id SET DEFAULT nextval('etm_etm_id_seq'::regclass);


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
-- Name: ges_seg_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_seguimiento ALTER COLUMN ges_seg_id SET DEFAULT nextval('gestion_seguimiento_ges_seg_id_seq'::regclass);


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
-- Name: subproy_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY subproy_segui ALTER COLUMN subproy_id SET DEFAULT nextval('subproy_segui_subproy_id_seq'::regclass);


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
-- Name: cat_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_act_actividades ALTER COLUMN cat_id SET DEFAULT nextval('uep_act_actividades_cat_id_seq'::regclass);


--
-- Name: ars_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_act_area ALTER COLUMN ars_id SET DEFAULT nextval('uep_act_area_ars_id_seq'::regclass);


--
-- Name: act_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_actividades ALTER COLUMN act_id SET DEFAULT nextval('uep_actividades_act_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_actividades_participantes ALTER COLUMN par_id SET DEFAULT nextval('uep_actividades_participantes_par_id_seq'::regclass);


--
-- Name: acs_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_mem_actividades ALTER COLUMN acs_id SET DEFAULT nextval('uep_mem_actividades_acs_id_seq'::regclass);


--
-- Name: acu_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_mem_acuerdos ALTER COLUMN acu_id SET DEFAULT nextval('uep_mem_acuerdos_acu_id_seq'::regclass);


--
-- Name: are_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_mem_areas ALTER COLUMN are_id SET DEFAULT nextval('uep_mem_areas_are_id_seq'::regclass);


--
-- Name: mem_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_memorias ALTER COLUMN mem_id SET DEFAULT nextval('uep_memorias_mem_id_seq'::regclass);


--
-- Name: des_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_per_desarrollo ALTER COLUMN des_id SET DEFAULT nextval('uep_per_desarrollo_des_id_seq'::regclass);


--
-- Name: obj_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_per_objetivos ALTER COLUMN obj_id SET DEFAULT nextval('uep_per_objetivos_obj_id_seq'::regclass);


--
-- Name: per_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_perfiles ALTER COLUMN per_id SET DEFAULT nextval('uep_perfiles_per_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY user_profiles ALTER COLUMN id SET DEFAULT nextval('user_profiles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: Resultado_res_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"Resultado_res_id_seq"', 6, true);


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
-- Name: actividad_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividad_act_id_seq', 11, true);


--
-- Data for Name: actividades_epi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY actividades_epi (epi_id, act_id, act_nombre, act_fecha_ini, act_fecha_fin, act_estado, act_responsable, act_cargo, act_descripcion, act_recursos) FROM stdin;
3	1	dasdas	2013-01-11	2013-01-03	No iniciada	dasd	das	das	dasd
7	2	xZ	2013-02-22	2013-02-28	\N	xZ	xZc	xZx	222
\.


--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividades_epi_act_id_seq', 2, true);


--
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id, acu_mun_ruta_archivo, eta_id, acu_mun_fecha_observacion, acu_mun_fecha_borrador, acu_mun_fecha_aceptacion) FROM stdin;
4	\N	\N	\N	\N	12	\N	1	\N	\N	\N
6	\N	\N	\N	\N	3	\N	1	\N	\N	\N
7	\N	\N	\N	\N	6	\N	1	\N	\N	\N
8	\N	t	t		9	documentos/acuerdo_municipal/acuerdo_municipal8.pdf	1	\N	\N	\N
11	2012-12-05	t	t		26		1	\N	\N	\N
13	2012-12-10	t	t	Hay disposición del Concejo Municipal a participar en el proceso.	29		1	\N	\N	\N
12	2013-01-11	t	t	Mucha disposición de parte del Concejo Municipal para participar del proceso.	27		1	\N	\N	\N
10	2012-12-08	t	t	El Concejo Municipal, aprobó el Plan y se comprometió a brindar apoyo en todo el proceso.\nSe acordó nombrar al Sr. Elmer Ulises Rodríguez y al Ing. Manuel Dolores Quintanilla, como miembros del Equipo Local de Apoyo.	28		1	\N	\N	\N
14	2012-12-17	t	t	Se trabajó con la Srita. Kayra malinyn Romero Garcia, se tienen programadas actividades con los liderazgos municipales, para cerrar el año.\nDebido a esto no se realizarán las visitas de sinsibilizaciones como se habia previsto y planificado,la Srita Romero y otro enlace municipal se comprometierón a visitar y garantizar la invitación de la convocatoria, CODEIN, proporcionará el material informativo.	30		1	\N	\N	\N
17	\N	\N	\N	\N	37	\N	1	\N	\N	\N
18	\N	\N	\N	\N	28	\N	4	\N	\N	\N
19	\N	\N	\N	\N	27	\N	4	\N	\N	\N
20	\N	\N	\N	\N	20	\N	1	\N	\N	\N
21	2012-09-03	t	t		19		1	\N	\N	\N
9	2012-09-07	t	t	Ninguna	18		1	\N	\N	\N
22	2012-09-01	f	t		36		1	\N	\N	\N
\.


--
-- Data for Name: acuerdo_municipal2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal2 (acu_mun_id, mun_id, acu_mun_fecha_acuerdo, acu_mun_fecha_recepcion, acu_mun_fecha_conformacion, acu_mun_archivo, acu_mun_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N
3	3	\N	\N	\N	\N	\N
142	142	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N
93	93	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N
23	23	\N	\N	\N	\N	\N
97	97	\N	\N	\N	\N	\N
183	183	\N	\N	\N	\N	\N
\.


--
-- Name: acuerdo_municipal2_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal2_acu_mun_id_seq', 1, true);


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 22, true);


--
-- Data for Name: acumun_miembros; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acumun_miembros (mie_id, acu_mun_id, mie_nombre, mie_apellidos, mie_sexo, mie_edad, mie_cargo, mie_nivel, mie_telefono) FROM stdin;
2	3	Roberto	Vásquez	M	34	Tesorero	Bachiller	22222222
3	3	fffff	ffff	F	34	dfdfdf		
4	3	fffff	ffff	F	34	dfdfdf		
5	142	Ilda Concepción	Argueta de Ramos	F	38	Jefe UACI	Bachillerato	22343222
6	142	Pablo Javier	Castillo Chicas	M	29	Tesorero	Bachillerato	22222222
7	142	Paula Estela	Argueta	F	23	Jefe UACI	Bachillerato	33333333
14	58	Vicente Adolfo	Villatoro	M	25	Jefe UACI	Bachiller	
11	58	Xiomara Carolina	Martinez	F	35	Secretaria Municipal	Licenciada Admon de Empresas	
9	58	Odilio de Jesus	Portillo	M	50	Alcalde Municipal	Agronomo	
8	58	Julio Cesar	Peña	M	45	Sindico Municipal	Bachiller	
15	58	Ana Mercedes	Sanchez	M	39	Tesorera	Bachiller	
16	23	juan Manual	López	M	35	Contador		
17	23	juan Manual	López	M	35	Contador		
18	23	juan Manual	López	M	35	Contador		
19	23	Carlos Manuel	Mejía	M	40	Tesorero		
20	1	Roberto	Martinez	M	18	Tesorero	Bachilerato	34567783
21	1	Emma	Torres	F	22	Jefa UACI	Bachillerato	32345676
1	1	Juan	Perez	M	45	Alcalde	Bachillerato	54654654
\.


--
-- Name: acumun_miembros_mie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acumun_miembros_mie_id_seq', 21, true);


--
-- Data for Name: aporte_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY aporte_municipal (apo_mun_id, apo_mun_monto_estimado, apo_mun_faprobacion, apo_mun_observaciones, mun_id, eta_id) FROM stdin;
\.


--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('aporte_municipal_aporte_municipal_id_seq', 1, false);


--
-- Data for Name: area_accion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY area_accion (id_area_accion, nombre_area_accion) FROM stdin;
\.


--
-- Name: area_accion_id_area_accion_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('area_accion_id_area_accion_seq', 1, false);


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
-- Name: area_dimension_are_dim_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('area_dimension_are_dim_id_seq', 4, true);


--
-- Data for Name: asi_tec_miembros; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asi_tec_miembros (mie_id, asi_tec_id, mie_nombre, mie_apellidos, mie_sexo, mie_edad, mie_cargo, mie_nivel, mie_telefono) FROM stdin;
\.


--
-- Name: asi_tec_miembros_mie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asi_tec_miembros_mie_id_seq', 1, false);


--
-- Data for Name: asis_ccc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asis_ccc (asis_ccc_id, ccc_con_id, nombre_asis, responsabilidad, sexo) FROM stdin;
\.


--
-- Name: asis_ccc_asis_ccc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asis_ccc_asis_ccc_id_seq', 1, false);


--
-- Data for Name: asis_cm; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asis_cm (asis_cm_id, cm_id, nombre_asis, responsabilidad, sexo) FROM stdin;
\.


--
-- Name: asis_cm_asis_cm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asis_cm_asis_cm_id_seq', 1, false);


--
-- Data for Name: asis_etm; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asis_etm (asis_etm_id, etm_id, nombre_asis, responsabilidad, sexo) FROM stdin;
\.


--
-- Name: asis_etm_asis_etm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asis_etm_asis_etm_id_seq', 1, false);


--
-- Data for Name: asistencia_tecnica; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistencia_tecnica (asi_tec_id, mun_id, asi_tec_consultor, asi_tec_fecha_solicitud, asi_tec_fecha_emision, asi_tec_fecha_envio, asi_tec_fecha_inicio, asi_tec_archivo_perfil, asi_tec_archivo_trd, asi_tec_archivo_acuerdo, asi_tec_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N	/documentos/asistencia_tecnica/perfil_240.docx	\N	\N	\N
23	23	\N	\N	\N	\N	\N	\N	\N	\N	\N
93	93	\N	2013-04-01	2013-04-01	2013-04-02	2013-04-05	\N	\N	\N	\N
142	142	\N	\N	\N	\N	\N	\N	\N	/documentos/asistencia_tecnica/acuerdo_142.pdf	\N
14	14	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	1	\N	2013-05-01	2013-05-02	2013-05-03	2013-05-04	\N	\N	\N	\N
\.


--
-- Name: asistencia_tecnica_asi_tec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asistencia_tecnica_asi_tec_id_seq', 1, false);


--
-- Data for Name: asistente_divu; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistente_divu (divu_id, asis_id, asis_nombre, asis_sexo, asis_cargo, asis_sector) FROM stdin;
\.


--
-- Name: asistente_divu_asis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asistente_divu_asis_id_seq', 1, false);


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
48	\N	\N	\N	\N	\N	\N	27
49	\N	\N	\N	\N	\N	\N	27
50	\N	\N	\N	\N	\N	\N	27
51	\N	\N	\N	\N	\N	\N	27
52	\N	\N	\N	\N	\N	\N	30
\.


--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asociatividad_aso_id_seq', 52, true);


--
-- Data for Name: autor_estrategia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY autor_estrategia (aut_est_id, aut_est_nombre, aut_est_fecha, aut_est_cantidadm, aut_est_cantidadh, est_com_id, tip_act_id) FROM stdin;
\.


--
-- Name: autor_estrategia_aut_est_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('autor_estrategia_aut_est_id_seq', 3, true);


--
-- Data for Name: c22_capacitaciones; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_capacitaciones (cap_id, mod_id, cap_proceso, cap_area, cap_nombre, cap_entidad, cap_nivel, cap_facilitador, cap_fecha_ini, cap_duracion, cap_duracion_tipo, cap_descripcion, cap_observaciones, cap_archivo, cap_add, cap_sede) FROM stdin;
1	2	procesoAA	Tema	Nombre	Entidad	Dirección	Facilitador555	2013-04-09	5	Meses	Descripcion	Observaciones	documentos/c22_capacitaciones/archivo_1.pdf	\N	\N
2	3	Proceso BBB	Area Tema	Capacitador	Entidad Capacitadora	Técnico	Facilitador Nombre	2013-04-09	15	Días	Proyecto	\N	\N	2013-04-29	\N
3	2	AADEDff	Temas	Capacitador Nombre	Entidad Capacitadora	Administrativo	Facilitador Perez	2013-04-01	25	Días	Alguna Descripcion	\N	\N	2013-04-29	\N
4	1	Proceso	Tema	Juan	IDSJ	Operativo	Juan	2013-04-11	1	Semanas	Jajaja	\N	\N	2013-04-29	\N
\.


--
-- Name: c22_capacitaciones_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('c22_capacitaciones_cap_id_seq', 1, false);


--
-- Data for Name: c22_cxp_inscritos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_cxp_inscritos (cxp_id, cxp_cap_id, cxp_par_id, cxp_estado, cxp_promedio, cxp_constancia, cxp_observaciones) FROM stdin;
1	1	1	Ok	8.9	Un dato	Observacion
2	3	1	\N	\N	\N	\N
8	1	2	Ok	4.5	Constancia	Comentario
10	1	3	\N	\N	\N	\N
11	2	1	\N	\N	\N	\N
\.


--
-- Name: c22_cxp_inscritos_cxp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('c22_cxp_inscritos_cxp_id_seq', 1, false);


--
-- Data for Name: c22_cxp_solicitud; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_cxp_solicitud (cap_id, par_id, cxp_justificacion) FROM stdin;
1	1	Justificacion
1	2	algo
1	3	jus3
1	\N	
2	1	Justificación Decente
2	1	Justificación Decente
3	1	Justificación Decente
4	1	Otra vez por aqui
4	1	Otras Justificacion
\.


--
-- Data for Name: c22_modalidades; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_modalidades (mod_id, mod_nombre) FROM stdin;
1	Carrera Universitaria
2	Modulos/Diplomados
3	Cursos Cortos
\.


--
-- Name: c22_modalidades_mod_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('c22_modalidades_mod_id_seq', 1, false);


--
-- Data for Name: c22_participantes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_participantes (par_id, par_nombres, par_apellidos, par_birthplace, par_birthday, par_sexo, par_dui, par_dir_tipo, par_dir_nombre, par_dir_calle, par_dir_casa, par_dir_municipio, par_telefono, par_movil, par_nivel, par_titulos, par_ins_municipio, par_ins_cargo, par_ins_categoria, par_ins_nivel, par_ins_tiempo, par_ins_tiempo2, par_ins_servicio, par_ins_servicio2, par_acepta, par_ins_telefono, par_ins_movil, par_username, mun_id) FROM stdin;
1	Juan	Perez	Izalco	1985-07-16	M	123456789	Barrio	Centro	3a Avenida	18-4	54	24505458	87878787	Tecnico	titulos	54	Cargo	Categoria	Nivel	1	2	3	4	1	24578878	79878979	61	1
2	Pedro	Alvares	Sonsonate	1956-04-23	M	564546545	Colonia	\N	\N	\N	\N	44545445	\N	\N	\N	\N	Cargo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	Algo 3	Apelluido 3	\N	\N	F	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	0	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
71	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	71
77	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	77
94	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	94
139	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	139
142	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	142
232	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	232
\.


--
-- Name: c22_participantes_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('c22_participantes_par_id_seq', 2, true);


--
-- Data for Name: c22_sedes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c22_sedes (sed_id, sed_nombre) FROM stdin;
1	Oficinas PFGL
\.


--
-- Name: c22_sedes_sed_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('c22_sedes_sed_id_seq', 1, false);


--
-- Data for Name: c24_user_depto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY c24_user_depto (user_id, deptos, uxd_id) FROM stdin;
50	1,2,3,4	1
60		2
64	1,12,13	3
65	1,12,13	4
66	3,5,10	5
67	3,5,10	6
68	4,11,6,2	7
69	4,11,6,2	8
70	7,8,9,14	9
71	7,8,9,14	10
\.


--
-- Data for Name: cap_concejo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cap_concejo (par_id, cap_id, par_nombre, par_apellidos, par_sexo, par_edad, par_cargo, par_telefono) FROM stdin;
\.


--
-- Name: cap_concejo_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cap_concejo_par_id_seq', 1, false);


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
-- Name: cap_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cap_participante_par_id_seq', 1, false);


--
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) FROM stdin;
76	\N	\N	\N	\N	36	\N	4
77	\N	\N	\N	\N	6	\N	1
78	2013-01-10	Calendarización de las actividades.	Casa de la Juventud del Municipio.	El Alcalde Municipal envía transporte para movilizar a referentes.	29	Planificación.	1
79	\N	\N	\N	\N	29	\N	1
124	2013-02-26		Taller Territorial 		30		2
80	2012-12-10	Establecer funciones y formas de trabajo del ELA.	Oficinas de la Alcaldía Municipal.	Toda comunicación se hará a través de la Srita. Alba Bonilla Secretaria Municipal.\n\nLa Municipalidad gestionará locales para reuniones.	29	Funciones del ELA	1
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
95	\N	\N	\N	\N	30	\N	1
96	\N	\N	\N	\N	30	\N	1
97	\N	\N	\N	\N	30	\N	1
125	2013-02-26		Taller Territorial 		30	Área Urbana	2
98	2013-01-17	Planificación	Casa de la Cultura		30	Planificación y otros	1
99	\N	\N	\N	\N	37	\N	1
100	\N	\N	\N	\N	26	\N	2
101	\N	\N	\N	\N	27	\N	1
81	2013-02-22	Taller Territorial	Casa de La Juventud 	Se percibió interés de la población en participar y ser parte de nuevos procesos que les ayuden a mejorar su vida y la del pueblo 	29	5 barrios de la Zona Urbana 	2
111	2013-02-22	Taller de Diagnóstico Territorial 	Cantón El Chaguitillo 	La comunidad se ve comprometida con el proceso 	29	Cantón El Chaguitillo 	2
112	2013-02-22	Taller de Diagnóstico Territorial 	Centro Escolar 	se identificaron problematicas en las que hay que prestar atencion\n\n*Proyectos de talleres vocacionales para jovenes\n*Seguimiento del proyecto de mejoramiento de Centro Escolar\n*Alumbrado público 	29		2
102	2013-01-17	Capacitación a ELA	Alcaldía Municipal 	capacitación sobre metodología de educación popular , técnicas de reflexión en grupos 	26	Chinameca	1
113	2013-02-22	Taller Territorial	Cantón El Zapote		29		2
114	2013-02-22	Tallere Territorial	Cantón La Joya	el taller se realizo en condiciones inadecuadas, sin mobiliario, a la interperie	29		2
103	2013-01-17	Etapas del PEP	Oficina Unidad de la Mujer 	se dio a conocer la situación de apatía por parte de la población ya que anteriormente no fueron tomados en cuenta.\nse cuenta con un diagnóstico municipal previo. \n\n	27	Planificación Estratégica	1
115	2013-03-14	Taller Territorial sobre Economía, Turismo y Productividad	Casa de La Juventud 		29		2
93	2013-02-27	Talleres territoriales 	Caserio El Tablón y Cantón Río Vargas 		27	Talleres territoriales 	2
94	2013-02-27	Talleres territoriales 	Canton Rio Vargas y Caserío La Palanca 	se identificaron los problemas a los cuales debe de darse seguimiento \n\n*Construcción de CDI para atención a la niñez\n\n*Falta de asistencia técnica diversificada para los agricultores\n\n*Mala atención de la salud y impulsar programas de primero auxilios en casos de emergencia  	27		2
92	2013-03-08	Talleres territoriales 	Cantón Los Pilones 		27		2
104	2013-03-08	Diagnostico Territorial Rural 	Casa Comunal Juan Yánes 	se identificaron las sigueintes problematicas:\n\n*Altos indices de delincuencia \n*Débil voltaje de energía eléctrica \n*Deficiente servicio de agua potable \n*Calle cortada en época de invierno\n*Mala atención de la salud	27		2
105	2013-03-08	Diagnostico Territorial Zona Urbana	Casa Comunal de Uluazapa 	Asistencia de personas de diferentes tendencias políticas y respeto de las diversas opiniones	27		2
106	2013-04-05	Taller Sectorial sobre Diagnóstico Económico 	Alcaldía Municipal 	se definieron los elementos del FODA y se incorporaron objetivos a las lineas de acción 	27		2
107	2013-04-05	Taller Sectorial de Educación, Salud y Seguridad	Casa Comunal 		27	Taller Sectorial	2
109	2013-04-05	Teller Sectorial Medio Ambiente y Gestión de Riesgos 	Alcaldía Municipal 		27		2
108	2013-04-12	Organización de logística para capacitaciones	Salón de Usos Múltiples 		27		2
116	2013-03-14	Taller Sectorial Jóvenes y Mujeres	Casa de La Juventud 		29		2
110	2013-05-09	Planidicacion Estrategica Participativa	Salón de Usos Multiples Alcaldía Municipal.		20	Planificiación Estrategica Participativa	1
117	2013-03-14	Taller Sectorial de Educación, Salud y Seguridad	Casa de La Juventud 		29		2
118	2013-03-14	Taller Medio Ambiente y Gestión de Riesgos	Casa de La Juventud 		29		2
119	2013-04-12	Capacitación 	Casa de La Juventud 		29		2
120	2013-04-17	Taller Político Institucional 	Despacho Sr. Alcalde Municipal 		29		2
121	\N	\N	\N	\N	19	\N	2
126	2013-03-04	Taller de Diagnóstico Territorial Rural 	Cantón Guerrero 		30		2
123	2013-02-26	Taller de Diagnóstico Territorial 	Área Urbana 		30	Planificación Estratégica	2
127	\N	\N	\N	\N	20	\N	2
128	\N	\N	\N	\N	20	\N	2
129	2013-03-05	Taller Territorial	Casa Comunal 		30		2
130	2013-03-05	Taller Territorial, Caserio La Negra 	Casa de Orlando Alfredo Maldonado 		30		2
131	2013-03-12	Taller Territorial	Caserío La Periquera 		30		2
132	2013-03-13	Taller Sectorial de Econcmía, Turismo y Productividad	Casa Comunal 		30		2
133	2013-03-13	Taller Medio Ambiente, Gestión de Riesgos	Casa de la Cultura		30		2
135	2013-04-12	Taller Sectorial de Mujeres y Jóvenes 	Casa Comunal 		30		2
122	2012-12-07	Presupuesto Municipal	Alcaldía Municipal		19	Financiamiento	2
134	2013-04-11	Taller Sectorial de Educación, Salud y Seguridad	Casa Comunal 	Pese a las contantes convocatorias y gestiones personales persiste la inasistencia de representantes de la Unidad de Salud y PNC	30		2
136	2013-04-12	Jornada de Capacitación	Casa Comunal 		30		2
\.


--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 136, true);


--
-- Data for Name: capacitaciones; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitaciones (cap_id, mun_id, cap_fecha, cap_tema, cap_lugar, cap_facilitadores, cap_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N
2	1	\N	\N	\N	\N	\N
3	1	\N	\N	\N	\N	\N
4	1	\N	\N	\N	\N	\N
5	1	\N	\N	\N	\N	\N
6	1	\N	\N	\N	\N	\N
7	1	\N	\N	\N	\N	\N
\.


--
-- Name: capacitaciones_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitaciones_cap_id_seq', 7, true);


--
-- Data for Name: cat_consultores; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cat_consultores (con_id, con_nombre, con_telefono) FROM stdin;
\.


--
-- Name: cat_consultores_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cat_consultores_con_id_seq', 1, false);


--
-- Data for Name: categoria_fortalecimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY categoria_fortalecimiento (cat_for_id, cat_for_nombre) FROM stdin;
1	i. Capacitación
2	ii. Apoyo a la organización
3	iii. Herramientas y material básico para la prevención y atención de emergencia
\.


--
-- Name: categoria_fortalecimiento_cat_for_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('categoria_fortalecimiento_cat_for_id_seq', 3, true);


--
-- Data for Name: cc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cc (cc_id, mun_id, cc_fecha, cc_hora, cc_lugar, total_mujeres, total_hombres, acta_final, listado_asistencia) FROM stdin;
\.


--
-- Name: cc_cc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cc_cc_id_seq', 1, false);


--
-- Data for Name: ccc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ccc (ccc_id, mun_id, fecha_conformacion, lugar_conformacion) FROM stdin;
\.


--
-- Name: ccc_ccc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('ccc_ccc_id_seq', 1, false);


--
-- Data for Name: ccc_con; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ccc_con (ccc_con_id, ccc_id, tipo_ccc_con, fecha_constitucion, fecha_capacitacion, total_mujeres, total_hombres) FROM stdin;
\.


--
-- Name: ccc_con_ccc_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('ccc_con_ccc_con_id_seq', 1, false);


--
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
e90380373e8662b4090daa6c735bbf5a	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64; rv:22.0) Gecko/20100101 Firefox/22.0 Iceweasel/22.0	1374986306	a:1:{s:9:"user_data";s:0:"";}
d3883e3a015ad16e000d0befc21ea699	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64; rv:22.0) Gecko/20100101 Firefox/22.0 Iceweasel/22.0	1373014370	
5e47363f261f01272fc2ee6ecdef22ba	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64; rv:22.0) Gecko/20100101 Firefox/22.0 Iceweasel/22.0	1373347690	a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"55";s:8:"username";s:7:"ca02021";s:6:"status";s:1:"1";}
\.


--
-- Data for Name: comentario_publico_cc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY comentario_publico_cc (coment_id, cc_id, nombre_persona, email, comentario, fecha_coment) FROM stdin;
\.


--
-- Name: comentario_publico_cc_coment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('comentario_publico_cc_coment_id_seq', 1, false);


--
-- Data for Name: comentario_publico_ccc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY comentario_publico_ccc (coment_id, ccc_id, nombre_persona, email, comentario, fecha_coment) FROM stdin;
\.


--
-- Name: comentario_publico_ccc_coment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('comentario_publico_ccc_coment_id_seq', 1, false);


--
-- Data for Name: comision_mant; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY comision_mant (cm_id, ccc_id, tipo_cm, fecha_constitucion, total_mujeres, total_hombres) FROM stdin;
\.


--
-- Name: comision_mant_cm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('comision_mant_cm_id_seq', 1, false);


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
-- Name: componente24a_atm_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_atm_comp_id_seq', 1, false);


--
-- Data for Name: componente24a_cap; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente24a_cap (comp_id, mun_id, fecha_cap, tema_cap, total_mujeres, total_hombres, fecha_instalacion, fecha_operacion, observaciones) FROM stdin;
1	2	2013-04-26	TEMA 1	3	2	2013-04-03	2013-04-18	Observaciones
\.


--
-- Name: componente24a_cap_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_cap_comp_id_seq', 1, true);


--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_comp_id_seq', 1, true);


--
-- Data for Name: componente26_cap; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_cap (comp_id, nombre_cap, fecha_cap, nombre_capacitador, total_hombres, total_mujeres, monto_cap, entidad) FROM stdin;
\.


--
-- Name: componente26_cap_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_cap_comp_id_seq', 1, false);


--
-- Data for Name: componente26_con; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_con (comp_id, nombre_con, fecha_con, nombre_consultor, monto_con, entidad) FROM stdin;
\.


--
-- Name: componente26_con_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_con_comp_id_seq', 1, false);


--
-- Data for Name: componente26_equi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente26_equi (comp_id, desc_equi, fecha_equi, monto_equi, entidad) FROM stdin;
\.


--
-- Name: componente26_equi_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente26_equi_comp_id_seq', 1, false);


--
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente_com_id_seq', 8, true);


--
-- Name: consulta_cons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consulta_cons_id_seq', 9, true);


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
42	fffffffff	ffffffffffff	2222-2222	karensita_2410@hotmail.com	37	1	ah01001
\.


--
-- Name: consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultor_con_id_seq', 42, true);


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
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultores_interes_con_int_id_seq', 3, true);


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
17	1	\N	\N
17	2	\N	\N
17	3	\N	\N
17	4	\N	\N
17	5	\N	\N
17	6	\N	\N
20	1	\N	\N
20	2	\N	\N
20	3	\N	\N
20	4	\N	\N
20	5	\N	\N
20	6	\N	\N
21	1	t	\N
21	2	f	\N
21	3	f	\N
21	4	t	\N
21	5	f	\N
21	6	f	\N
9	1	t	\N
9	2	t	\N
9	3	f	\N
9	4	f	\N
9	5	t	\N
9	6	f	\N
22	1	f	\N
22	2	f	\N
22	3	f	\N
22	4	f	\N
22	5	f	\N
22	6	f	\N
\.


--
-- Data for Name: contrapartida_aporte; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida_aporte (con_id, apo_mun_id, con_apo_valor, con_apo_especifique) FROM stdin;
\.


--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('contrapartida_con_id_seq', 6, true);


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
-- Name: criterio_E0_criterio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"criterio_E0_criterio_id_seq"', 11, true);


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
1	8	t
2	8	t
3	8	t
4	8	t
1	11	t
2	11	t
3	11	t
4	11	f
1	17	\N
2	17	\N
3	17	\N
4	17	\N
1	20	\N
2	20	\N
3	20	\N
4	20	\N
1	13	t
2	13	t
3	13	t
4	13	f
1	12	t
2	12	t
3	12	t
4	12	t
1	21	t
2	21	t
3	21	t
4	21	t
1	9	t
2	9	t
3	9	t
4	9	t
1	10	t
2	10	t
3	10	t
4	10	t
1	22	\N
2	22	\N
3	22	\N
4	22	\N
\.


--
-- Name: criterio_cri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('criterio_cri_id_seq', 4, true);


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
1	5	t
2	5	t
3	5	\N
4	5	\N
1	6	\N
2	6	\N
3	6	\N
4	6	\N
1	8	t
2	8	t
3	8	t
4	8	t
1	9	\N
2	9	\N
3	9	\N
4	9	\N
1	10	t
2	10	f
3	10	t
4	10	f
1	7	t
2	7	t
3	7	t
4	7	t
1	4	t
2	4	t
3	4	t
4	4	t
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
1	69	\N
2	69	\N
3	69	\N
4	69	\N
1	70	\N
2	70	\N
3	70	\N
4	70	\N
1	73	\N
2	73	\N
3	73	\N
4	73	\N
1	151	t
2	151	t
3	151	t
4	151	f
1	96	t
2	96	t
3	96	t
4	96	t
1	64	\N
2	64	\N
3	64	\N
4	64	\N
1	63	t
2	63	t
3	63	t
4	63	t
1	67	t
2	67	t
3	67	t
4	67	t
1	66	t
2	66	\N
3	66	\N
4	66	\N
1	65	\N
2	65	\N
3	65	\N
4	65	\N
1	145	t
2	145	f
3	145	t
4	145	t
1	168	\N
2	168	\N
3	168	\N
4	168	\N
1	95	t
2	95	t
3	95	t
4	95	t
1	94	\N
2	94	\N
3	94	\N
4	94	\N
1	93	t
2	93	t
3	93	t
4	93	t
1	72	t
2	72	t
3	72	t
4	72	t
1	169	\N
2	169	\N
3	169	\N
4	169	\N
1	165	t
2	165	t
3	165	t
4	165	t
1	149	t
2	149	f
3	149	t
4	149	f
4	170	f
1	170	t
2	170	f
1	158	\N
2	158	\N
3	158	\N
4	158	\N
1	152	t
2	152	t
3	152	t
4	152	t
1	71	t
2	71	t
3	71	t
4	71	t
1	154	t
2	154	t
3	154	t
4	154	t
1	153	t
2	153	t
3	153	t
4	153	t
1	155	t
2	155	t
3	155	t
4	155	t
1	156	t
2	156	t
3	156	t
4	156	t
1	157	t
2	157	t
3	157	t
4	157	t
1	159	t
2	159	t
3	159	t
4	159	f
1	167	\N
2	167	\N
3	167	\N
4	167	\N
1	148	t
2	148	f
3	148	t
4	148	f
1	147	t
2	147	f
3	147	t
4	147	f
1	75	t
2	75	t
3	75	t
4	75	t
1	166	t
2	166	t
3	166	t
4	166	t
1	161	t
2	161	f
3	161	t
4	161	t
1	163	t
2	163	f
3	163	f
4	163	f
1	164	t
2	164	t
3	164	t
4	164	t
1	150	t
2	150	f
3	150	t
4	150	f
3	170	t
\.


--
-- Data for Name: cumplimiento_diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) FROM stdin;
4	13	\N
4	14	\N
4	15	\N
4	16	\N
4	17	\N
4	18	\N
4	19	\N
4	20	\N
4	21	\N
4	22	\N
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
13	1	\N
13	2	\N
13	3	\N
13	4	\N
13	5	\N
13	6	\N
13	7	\N
13	8	\N
13	9	\N
13	10	\N
13	11	\N
13	12	\N
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
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('cumplimiento_minimo_cum_min_id_seq', 28, true);


--
-- Data for Name: cumplimiento_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_proyecto (pro_pep_id, cum_min_id, cum_pro_valor) FROM stdin;
37	23	\N
37	24	\N
37	25	t
37	26	f
37	27	f
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
-- Name: dd_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('dd_seq', 1, true);


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
9	\N	\N	\N	\N	37
10	2012-08-27				20
11	2012-10-04	Polideportivo, Zacatecoluca, La Paz			18
\.


--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 11, true);


--
-- Data for Name: definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY definicion (def_id, def_fecha, def_ruta_archivo, pro_pep_id, def_observacion) FROM stdin;
5	\N	\N	29	\N
6	\N	\N	26	\N
7	\N	\N	27	\N
8	\N	\N	28	\N
9	\N	\N	30	\N
10	\N	\N	19	\N
\.


--
-- Name: definicion_def_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('definicion_def_id_seq', 10, true);


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
-- Name: departamento_dep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('departamento_dep_id_seq', 16, true);


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
10	0.00	1	4
11	0.00	2	4
12	0.00	3	4
\.


--
-- Name: detalle_fortalecimiento_for_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detalle_fortalecimiento_for_id_seq', 12, true);


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
25	0.00	1	4
26	0.00	2	4
27	0.00	3	4
28	0.00	4	4
29	0.00	5	4
30	0.00	6	4
31	0.00	7	4
32	0.00	8	4
\.


--
-- Name: detalle_obra_det_obr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detalle_obra_det_obr_id_seq', 32, true);


--
-- Data for Name: detmonto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY detmonto_proyeccion (dmon_pro_id, dmon_pro_ingresos, dmon_pro_anio, dmon_pro_correlativo, mon_pro_id) FROM stdin;
1	0.00	\N	1	45
2	0.00	\N	2	45
3	0.00	\N	3	45
4	0.00	\N	4	45
5	0.00	\N	1	46
6	0.00	\N	2	46
7	0.00	\N	3	46
8	0.00	\N	4	46
9	0.00	\N	1	47
10	0.00	\N	2	47
11	0.00	\N	3	47
12	0.00	\N	4	47
13	0.00	\N	1	48
14	0.00	\N	2	48
15	0.00	\N	3	48
16	0.00	\N	4	48
\.


--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detmonto_proyeccion_dmon_pro_id_seq', 16, true);


--
-- Data for Name: diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY diagnostico (dia_id, dia_fecha_borrador, dia_fecha_observacion, dia_fecha_concejo_muni, dia_vision, dia_observacion, dia_ruta_archivo, pro_pep_id, dia_firmam, dia_firmai, dia_firmau) FROM stdin;
4	2013-05-01	2013-05-02	2013-05-03	\N			37	t	t	t
\.


--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('diagnostico_dia_id_seq', 4, true);


--
-- Data for Name: divu; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY divu (divu_id, divu_nombre, divu_fecha, divu_tipo, divu_responsable, divu_municipio) FROM stdin;
\.


--
-- Name: divu_divu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('divu_divu_id_seq', 1, false);


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
-- Name: dsat_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('dsat_seq', 1, false);


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
-- Name: elaboracion_proyecto_ela_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('elaboracion_proyecto_ela_pro_id_seq', 5, true);


--
-- Data for Name: empleados; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY empleados (emp_id, emp_mun_id, emp_nombre, emp_apellidos, emp_sexo, emp_edad, emp_cargo, emp_nivel, emp_titulo, emp_experiencia) FROM stdin;
\.


--
-- Name: empleados_emp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('empleados_emp_id_seq', 1, false);


--
-- Data for Name: empleados_municipales; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY empleados_municipales (emp_mun_id, mun_id, emp_mun_organigrama, emp_mun_observaciones) FROM stdin;
3	3	\N	\N
240	240	\N	\N
58	58	\N	\N
23	23	\N	\N
1	1	\N	\N
\.


--
-- Name: empleados_municipales_emp_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('empleados_municipales_emp_mun_id_seq', 1, false);


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
-- Name: epi_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('epi_seq', 7, true);


--
-- Data for Name: estrategia_comunicacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY estrategia_comunicacion (est_com_id, est_com_observacion, pro_pep_id) FROM stdin;
2	\N	12
3	\N	12
4	\N	27
5	\N	27
\.


--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('estrategia_inversion_est_inv_id_seq', 5, true);


--
-- Data for Name: etapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY etapa (eta_id, eta_nombre) FROM stdin;
1	Etapa 1
2	Etapa 2
3	Etapa 3
4	Etapa 4
5	Todas las Etapas
\.


--
-- Data for Name: etm; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY etm (etm_id, ccc_id, tipo_etm, fecha_induccion, fecha_capacitacion, total_mujeres, total_hombres) FROM stdin;
\.


--
-- Name: etm_etm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('etm_etm_id_seq', 1, false);


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
10	Oscar Benjamín 	Pineda 	102	eco_chacmool@hotmail.com	
12	Ana María 	Alfaro 	103	amalfa_04@hotmail.com	
14	Stanley 	Rodríguez 	93	staley_ro@hotmail.com	
16	Iván	Callejas	94	ivacallejas@yahoo.com.mx	
17	Stanley A.	Rodríguez	92	stanley_ro@hotmail.com	
18	Iván	Callejas	104	ivacallejas@yahoo.com.mx	
19	Ana María	Alfaro	105	amalfa_04@hotmail.com	
20	Estela	Quijano 	105	amau_fun@yahoo.es	
21	Iván 	Callejas	106	ivacallejas@yahoo.com.mx	
22	Stanley	Rodríguez	107	stanley_ro@hotmail.com	
23	Elenilson Bladimir 	Obispo	109	eobispoamaya@gmail.com	
24	Doris 	Acosta	109	dorisa.ro@gmail.com	
25	Doris	Acosta Rodríguez	108	dorisa.ro@gamil.com	
26	Edith 	Del Cid	110	edith@funde.org	2209-5333
27	Doris 	Acosta de Rodríguez	81	dorisa.ro@gmail.com	
28	Luis Stanley	Rodríguez	81	stanley_ro@hotmail.com	
29	Oscar Benjamín 	Píneda	111	eco_chacmool@hotmail.com	
30	Iván 	Callejas	112	ivacallejas@yahoo.com.mx	
31	José Francisco 	Aparicio Soto	113	franapar@hotmail.com	
32	Sergio Antonio 	Dominguez	114	sergydominguez@hotmail.com	
33	Iván	Callejas 	115	ivacallejas@yahoo.com.mx	
34	Ana María 	Alfaro	116	amalfa_04@hotmail.com	
35	Stanley 	Rodríguez	117	stanley_ro@hotmail.com	
36	Doris 	Acosta	117	dorisa.ro@gmail.com	
37	Elenilson Bladimir	Obispo	118	eobispoamaya@gmail.com	
38	Iván 	Callejas	119	ivacallejas@yahoo.com.mx	
39	Stanley 	Rodríguez	120	stanley_ro@hotmail.com	
40	Rommy	Jiménez	122	rjimenez@funde.org	2209-5326
41	Iván 	Callejas 	123	ivacallejas@yahoo.com.mx	
42	Stanley 	Rodríguez	124	stanley_ro@hotmail.com	
43	Stanley  	Rodríguez	125	stanley_ro@hotmail.com	
44	iván 	 Callejas	126	ivacallejas@yahoo.com.mx	
45	José Francisco  	Aparicio	129	franapar@hotmail.com	
46	Stanley A.	Rodríguez	130	stanley_ro@hotmail.com	
47	Stanley A.	Rodríguez	131	stanley_ro@hotmail.com	
48	Iván 	Callejas	132	ivacallejas@yahoo.com.mx	
49	Stanley 	Rodríguez	132	stanley_ro@hotmail.com	
50	Ana María 	Alfaro	133	amalfa_04@hotmail.com	
51	Elenilson Bladimir 	Obispo 	133	eobispoamaya@gmail.com	
52	Stanley A.	Rosríguez	135	stanley_ro@hotmail.com	
53	Stanley A	Rodriíguez	134	stanley_ro@hotmail.com	
54	Stanley A.	Rodríguez	136	stanley_ro@hotmail.com	
\.


--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('facilitador_fac_id_seq', 54, true);


--
-- Data for Name: fcdp; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fcdp (fcdp_id, fcdp_fecha, fcdp_tematica, fcdp_ultima, fcdp_observaciones, fcdp_archivo) FROM stdin;
1	2013-01-12	Primera reunion	N	no hay	documentos/fcdp/proyecto_pep71.docx
\.


--
-- Name: fcdp_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fcdp_seq', 2, true);


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
-- Name: fuente_financiamiento_fue_fin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_financiamiento_fue_fin_id_seq', 1, true);


--
-- Data for Name: fuente_primaria; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fuente_primaria (fue_pri_id, inv_inf_id, fue_pri_nombre, fue_pri_institucion, fue_pri_cargo, fue_pri_telefono, fue_pri_tipo_info) FROM stdin;
\.


--
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_primaria_fue_pri_id_seq', 1, true);


--
-- Data for Name: fuente_secundaria; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY fuente_secundaria (fue_sec_id, inv_inf_id, fue_sec_nombre, fue_sec_fuente, fue_sec_disponible_en, fue_sec_anio) FROM stdin;
2	7	Almanaque 262 Estado del Desarrollo Humano en los municipios de El Salvador. 	Fundación Dr. Guillermo Manuel Ungo (FUNDAUNGO)	Impresa	2009
3	7	Atlas de la Violencia en El Salvador (2005-2011). 	FUNDAUNGO	Impresa	2012
4	7	Directorio Municipal. El Salvador 2012-2015	FUNDAUNGO	Impresa	2012
5	7	Índice de la Legislación Salvadoreña Vigente	Roberto Vidales	Impresa	1991
6	7	Mapa de Pobreza Urbana y Exclusión Social. 	El Salvador. FLACSO El Salvador	Electrónica	2010
7	7	Pautas Metodológicas para la Planificación Estratégicas Participativa del Municipio con Énfasis en e	Secretaría de Asuntos Estratégicos de la Presidencia de la República. Sub Secretaría de Desarrollo T	Impresa	2011
8	7	IV Censo Agropecuario 2007-2008	Ministerio de Economía y Ministerio de Agricultura y Ganadería. Dirección General de Estadística y C	Electrónica	2009
9	7	VI Censo de Población y V de Vivienda del 2007	Dirección General de Estadística y Censos (DIGESTYC).	Electrónica	2008
10	10	Almanaque 262 Estado del Desarrollo Humano en los municipios de El Salvador	Programa de las Naciones Unidas para el Desarrollo (PNUD), Fundación Dr. Guillermo Manuel Ungo (FUND	Impresa	2009
11	10	Atlas de la Violencia en El Salvador (2005-2011). 	FUNDAUNGO 	Impresa	2012
12	10	Directorio Municipal. El Salvador 2012-2015	Fundación Dr. Guillermo Manuel Ungo	Impresa	2012
13	10	Índice de la Legislación Salvadoreña Vigente	Roberto Vidales	Impresa	1991
15	10	Mapa de Pobreza Urbana y Exclusión Social	El Salvador. FLACSO El Salvador, Gobierno de El Salvador. PNUD	Impresa	2010
16	10	Pautas Metodológicas para la Planificación Estratégicas Participativa del Municipio con Énfasis en e	Secretaría de Asuntos Estratégicos de la Presidencia de la República. Sub Secretaría de Desarrollo T	Impresa	2011
17	10	IV Censo Agropecuario 2007-2008	Ministerio de Economía y Ministerio de Agricultura y Ganadería. Dirección General de Estadística y C	Impresa	2009
18	10	VI Censo de Población y V de Vivienda del 2007	Dirección General de Estadística y Censos (DIGESTYC). Ministerio de Economía. San Salvador, El Salva	Impresa	2008
\.


--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_secundaria_fue_sec_id_seq', 18, true);


--
-- Data for Name: gescon_participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gescon_participante (par_id, gescon_id, par_nombre, par_apellidos, par_institucion, par_cargo, par_telefono) FROM stdin;
\.


--
-- Name: gescon_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gescon_participante_par_id_seq', 1, false);


--
-- Data for Name: gesrie_participan; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gesrie_participan (par_id, gesrie_id, par_nombre, par_institucion, par_cargo) FROM stdin;
\.


--
-- Name: gesrie_participan_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gesrie_participan_par_id_seq', 1, false);


--
-- Data for Name: gestion_conocimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gestion_conocimiento (gescon_id, mun_id, gescon_fecha, gescon_tematica, gescon_observaciones) FROM stdin;
1	1	\N	\N	\N
2	1	\N	\N	\N
3	1	\N	\N	\N
4	1	\N	\N	\N
5	1	\N	\N	\N
6	1	\N	\N	\N
\.


--
-- Name: gestion_conocimiento_gescon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gestion_conocimiento_gescon_id_seq', 6, true);


--
-- Data for Name: gestion_riesgo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gestion_riesgo (gesrie_id, mun_id, gesrie_fecha_orden, gesrie_fecha_acta, gesrie_fecha_diagnostico, gesrie_fecha_socializacion, gesrie_fecha_aprobacion, gesrie_fecha_inicio, gesrie_fecha_aprob_comite, gesrie_fecha_acuerdo, gesrie_fecha_presentacion, gesrie_fecha_seguimiento, gesrie_observaciones) FROM stdin;
\.


--
-- Name: gestion_riesgo_gesrie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gestion_riesgo_gesrie_id_seq', 1, false);


--
-- Data for Name: gestion_seguimiento; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY gestion_seguimiento (ges_seg_id, ges_seg_op1, ges_seg_op2, ges_seg_op3, ges_seg_op4, ges_seg_op5, ges_seg_op6, ges_seg_op7, ges_seg_fentrega, ges_seg_fvobo, ges_seg_fconcejo, ges_seg_concejo_mun, ges_seg_isdem, ges_seg_uep, ges_seg_acu_ruta_archivo, ges_seg_act_ruta_archivo, ges_seg_poa_ruta_archivo, ges_seg_pip_ruta_archivo, ges_seg_doc_ruta_archivo, ges_seg_observacion, mun_id) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1
\.


--
-- Name: gestion_seguimiento_ges_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('gestion_seguimiento_ges_seg_id_seq', 1, true);


--
-- Data for Name: grupo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo (gru_id, gru_numero) FROM stdin;
1	1
\.


--
-- Data for Name: grupo_apoyo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_apoyo (gru_apo_id, gru_apo_fecha, gru_apo_c3, gru_apo_c4, gru_apo_observacion, pro_pep_id, gru_apo_lugar) FROM stdin;
3	\N	\N	\N	\N	6	\N
9	\N	\N	\N	\N	37	\N
4	2013-01-17	t	t		26	Alcaldía Municipal
5	\N	t	t		27	
10	2012-10-09	\N	\N		19	Alcaldía Municipal 
11	2012-10-02	\N	\N		20	Alcaldía Municipal
6	2012-12-17	t	t	La elección del ELA se llevo a cabo el día de la Declaración de Interés Público, siendo los asistentes los mismos de el apartado anterior.	29	Casa de la Juventud del Municipio.
7	2012-12-08	t	t		28	Sala de Reuniones de Alcaldia Municipal
8	\N	t	t	Ninguna	30	
\.


--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_apoyo_gru_apo_id_seq', 11, true);


--
-- Data for Name: grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_gestor (gru_ges_id, gru_ges_lugar, gru_ges_observacion, gru_ges_acuerdo, pro_pep_id, gru_ges_fecha) FROM stdin;
3	\N	\N	\N	4	\N
5			\N	26	\N
6	\N	\N	\N	28	\N
7			t	27	2013-02-27
4	San José 		t	29	\N
8			t	30	\N
9	\N	\N	\N	20	\N
10	Alcaldía Municipal		\N	19	2012-12-07
\.


--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_gestor_gru_ges_id_seq', 10, true);


--
-- Name: grupo_gru_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_gru_id_seq', 1, true);


--
-- Data for Name: indicador; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicador (ind_id, com_id, ind_nombre, ind_tipo) FROM stdin;
\.


--
-- Name: indicador_ind_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicador_ind_id_seq', 1, false);


--
-- Data for Name: indicadores_desempeno1; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno1 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_pascir, ind_des_grupo1_deucorpla, ind_des_grupo1_int, ind_des_grupo1_ahoope, ind_des_grupo1_intdeu, ind_des_grupo1_total, ind_des_grupo2_deumuntot, ind_des_grupo2_ingopeper, ind_des_grupo2_total, ind_des_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
142	142	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
85	85	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	1	2013-05-01	2012	2013	12	4	6	2	8	2.20000005	30	10	3	Observaciones
\.


--
-- Name: indicadores_desempeno1_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno1_ind_des_id_seq', 1, false);


--
-- Data for Name: indicadores_desempeno2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno2 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_ingtotpre, ind_des_grupo1_gastotdev, ind_des_grupo1_total, ind_des_grupo2_ingprodev, ind_des_grupo2_totingdev, ind_des_grupo2_total, ind_des_grupo3_moningpro, ind_des_grupo3_totingdev, ind_des_grupo3_total, ind_des_grupo4_moningpro, ind_des_grupo4_moningpre, ind_des_grupo4_total, ind_des_grupo5_totingtas, ind_des_grupo5_totingpro, ind_des_grupo5_total, ind_des_grupo6_totingimp, ind_des_grupo6_totingpro, ind_des_grupo6_total, ind_des_observaciones) FROM stdin;
23	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: indicadores_desempeno2_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno2_ind_des_id_seq', 1, false);


--
-- Data for Name: indicadores_desempeno3; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY indicadores_desempeno3 (ind_des_id, mun_id, ind_des_fecha, ind_des_periodo_inicio, ind_des_periodo_fin, ind_des_grupo1_ingcorpre, ind_des_grupo1_gascordev, ind_des_grupo1_total, ind_des_grupo2_gascordev, ind_des_grupo2_totgascor, ind_des_grupo2_total, ind_des_grupo3_ejegasinv, ind_des_grupo3_totgasinv, ind_des_grupo3_total, ind_des_grupo4_gascordev, ind_des_grupo4_ingcorper, ind_des_grupo4_total, ind_des_grupo5_armderdeu, ind_des_grupo5_egrtotdev, ind_des_grupo5_total, ind_des_grupo6_gascordev, ind_des_grupo6_egrtotdev, ind_des_grupo6_total, ind_des_grupo7_gastotinv, ind_des_grupo7_egrtotdev, ind_des_grupo7_total, ind_des_grupo8_gasinvinf, ind_des_grupo8_ejegastot, ind_des_grupo8_total, ind_des_grupo9_ingcorper, ind_des_grupo9_gascordev, ind_des_grupo9_total, ind_des_grupo10_gastotper, ind_des_grupo10_ingcorper, ind_des_grupo10_total, ind_des_grupo11_ingproper, ind_des_grupo11_gascordev, ind_des_grupo11_total, ind_des_grupo12_valdefser, ind_des_grupo12_gastotser, ind_des_grupo12_total, ind_des_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
142	142	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: indicadores_desempeno3_ind_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('indicadores_desempeno3_ind_des_id_seq', 1, false);


--
-- Data for Name: informe_preliminar; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY informe_preliminar (inf_pre_id, inf_pre_fecha_borrador, inf_pre_fecha_observacion, inf_pre_aceptacion, inf_pre_firmam, inf_pre_firmai, inf_pre_firmau, inf_pre_observacion, pro_pep_id, inf_pre_ruta_archivo, inf_pre_aceptada) FROM stdin;
11	\N	\N	\N	\N	\N	\N	\N	25	\N	\N
12	\N	\N	\N	\N	\N	\N	\N	20	\N	\N
13	\N	\N	\N	\N	\N	\N	\N	37	\N	\N
\.


--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 13, true);


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
-- Name: institucion_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('institucion_ins_id_seq', 6, true);


--
-- Data for Name: integracion_instancia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integracion_instancia (int_ins_id, int_ins_fecha, int_ins_lugar, int_ins_observacion, int_ins_plan_trabajo, int_ins_reglamento_int, int_ins_ruta_archivo, pro_pep_id) FROM stdin;
3	\N	\N	\N	\N	\N	\N	26
\.


--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integracion_instancia_int_ins_id_seq', 3, true);


--
-- Data for Name: integrante_asociatividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) FROM stdin;
\.


--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integrante_asociatividad_int_aso_id_seq', 1, true);


--
-- Data for Name: inventario_informacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY inventario_informacion (inv_inf_id, inv_inf_observacion, pro_pep_id) FROM stdin;
3	\N	12
4	\N	3
5	\N	19
6	\N	26
8	\N	29
9	\N	28
11	\N	37
7		27
12	\N	20
10		30
\.


--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('inventario_informacion_inv_inf_id_seq', 12, true);


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
60	190.5.157.35	gdradmin-01	\N
61	190.5.157.35	gdradmin-01	\N
62	190.5.157.35	gdradmin-01	\N
65	190.5.157.35	fcruz@isdem.gob.sv	\N
66	190.5.157.35	fcruz@isdem.gob.sv	\N
67	190.5.157.111	gdradmin-02	\N
68	190.5.157.111	gdradmin-02	\N
69	190.5.157.111	gdradmin-02	\N
70	190.5.157.111	gdr120113-01	\N
71	190.5.157.111	gdradmin-02	\N
79	190.62.198.101	blxComp24	\N
80	190.62.198.101	blxComp24	\N
81	190.62.198.101	blxComp24	\N
82	190.62.69.181	uno7129	\N
87	190.62.73.177	mi90178	\N
94	190.62.55.114	uno7124	\N
95	190.120.10.42	c404058	\N
96	190.120.10.42	c404058	\N
97	190.120.10.42	c404058	\N
99	10.0.0.1	capacitacion	\N
100	10.0.0.1	territorial	\N
101	190.62.37.23	un07129	\N
102	190.62.37.23	un07129	\N
\.


--
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('login_attempts_id_seq', 102, true);


--
-- Data for Name: manuales_administrativos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY manuales_administrativos (man_adm_id, mun_id, man_adm_nombre, man_adm_elaboracion, man_adm_vigente, man_adm_aprobacion, man_adm_utilizado, man_adm_comentario) FROM stdin;
\.


--
-- Name: manuales_administrativos_man_adm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('manuales_administrativos_man_adm_id_seq', 1, false);


--
-- Data for Name: mapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY mapa (map_id, map_nombre, map_descripcion, tip_map_id) FROM stdin;
\.


--
-- Name: mapa_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('mapa_map_id_seq', 1, false);


--
-- Data for Name: monto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY monto_proyeccion (mon_pro_id, mon_pro_nombre, mon_pro_dispo_financiera, mon_pro_ingresos, mon_pro_anio, pro_ing_id, mon_pro_idnombre) FROM stdin;
45	FODES	0.00	0.00	\N	2	FODES
46	Ingresos Propios	0.00	0.00	\N	2	IngresosPropios
47	Donaciones	0.00	0.00	\N	2	Donaciones
48	Créditos	0.00	0.00	\N	2	Creditos
\.


--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('monto_proyeccion_mon_pro_id_seq', 48, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio (mun_id, dep_id, mun_nombre, mun_presupuesto, cons_id, mun_com_observacion, mun_act_ruta_archivo, mun_pro_ruta_archivo, mun_fseleccion, ela_pro_id, rev_inf_id, rub_id, per_pro_id, seg_id, gru_id, grup_id_pep) FROM stdin;
7	1	Apaneca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
8	1	San Francisco Menendez	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
9	1	San Lorenzo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
10	1	San Pedro Puxtla	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
11	1	Tacuba	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
12	1	Turin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
13	2	Cinquera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
14	2	Villa Dolores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
15	2	Guacotecti	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
16	2	Ilobasco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
17	2	Jutiapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
18	2	San Isidro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
19	2	Sensuntepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
20	2	Ciudad de Tejutepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
21	2	Victoria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
55	4	Candelaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
56	4	Cojutepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
57	4	El Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
58	4	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
59	4	Monte San Juan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
60	4	Oratorio de Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
61	4	San Bartolome Perulapia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
62	4	San Cristobal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
63	4	San Jose Guayabal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
64	4	San Pedro Perulapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
65	4	San Rafael Cedros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
66	4	San Ramon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
67	4	Santa Cruz Analquito	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
68	4	Santa Cruz Michapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
69	4	Suchitoto	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
70	4	Tenancingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
94	6	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
95	6	Jerusalen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
96	6	Mercedes La Ceiba	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
97	6	Olocuilta	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
98	6	Paraiso de Osorio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
99	6	San Antonio Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
100	6	San Emigdio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
101	6	San Francisco Chinameca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
102	6	San Juan Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
103	6	San Juan Talpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
104	6	San Juan Tepezontes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
105	6	San Luis La Herradura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
106	6	San Luis Talpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
107	6	San Miguel Tepezontes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
115	7	Anamoros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
116	7	Bolivar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
117	7	Concepcion de Oriente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
118	7	Conchagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
119	7	El Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
120	7	El Sauce	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
121	7	Intipuca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
122	7	La Union	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
123	7	Lislique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
124	7	Meanguera del Golfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
125	7	Nueva Esparta	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
126	7	Pasaquina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
127	7	Poloros	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
128	7	San Alejo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
130	7	Santa Rosa de Lima	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
131	7	Yayantique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
132	7	Yucuayquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
133	8	Arambala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
134	8	Cacaopera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
135	8	Chilanga	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
136	8	Corinto	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
137	8	Delicias de Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
138	8	El Divisadero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
139	8	El Rosario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
140	8	Gualococti	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
141	8	Guatajiagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
142	8	Joateca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
143	8	Jocoaitique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
22	3	Agua Caliente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
25	3	Chalatenango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
302	16	Municipio 2	15000.00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	9	\N
198	11	Apastepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
3	1	Atiquizaya	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
6	1	Guaymango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
5	1	El Refugio	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
211	12	Candelaria de la Frontera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
212	12	Chalchuapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
213	12	Coatepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
214	12	El Congo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
215	12	El Porvenir	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
216	12	Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
217	12	Metapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
218	12	San Antonio Pajonal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
219	12	San Sebastian Salitrillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
220	12	Santa Ana	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
221	12	Santa Rosa Guachipilin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
222	12	Santiago de la Frontera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
223	12	Texistepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
225	13	Armenia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
226	13	Caluco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
227	13	Cuisnahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
228	13	Izalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
199	11	Guadalupe	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
200	11	San Cayetano Istepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
201	11	San Esteban Catarina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
202	11	San Ildefonso	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
203	11	San Lorenzo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
204	11	San Sebastian	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
205	11	Santa Clara	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
206	11	Santo Domingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
207	11	San Vicente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
208	11	Tecoluca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
209	11	Tepetitan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
210	11	Verapaz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
93	6	Cuyultitan	\N	\N	\N	\N	\N	\N	1	1	\N	\N	\N	3	\N
144	8	Jocoro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
145	8	Lolotiquillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
146	8	Meanguera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
147	8	Osicala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
148	8	Perquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
149	8	San Carlos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
150	8	San Fernando	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
151	8	San Francisco Gotera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
152	8	San Isidro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
153	8	San Simon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
154	8	Sensembra	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
155	8	Sociedad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
156	8	Torola	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
157	8	Yamabal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
158	8	Yoloaiquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
159	9	Carolina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
160	9	Chapeltique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
161	9	Chinameca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
304	16	Municipio 4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	9	\N
300	9	Nuevo Municipio GDR	40000.60	\N	\N	\N	\N	\N	4	3	1	1	1	4	\N
23	3	Arcatao	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	1
301	15	Municipio 1	10000.00	\N	\N	\N	\N	\N	5	4	3	3	2	9	\N
24	3	Azacualpa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
26	3	Citala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
27	3	Comalapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
28	3	Concepcion Quezaltepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
29	3	Dulce Nombre de Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
30	3	El Carrizal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
31	3	El Paraiso	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
32	3	La Laguna	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
33	3	La Palma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
34	3	La Reina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
35	3	Las Vueltas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
36	3	Nombre de Jesus	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
37	3	Nueva Concepcion	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
38	3	Nueva Trinidad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
39	3	Ojos de Agua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
40	3	Potonico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
41	3	San Antonio de la Cruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
42	3	San Antonio Los Ranchos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
43	3	San Fernando	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
44	3	San Francisco Lempa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
45	3	San Francisco Morazan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
46	3	San Ignacio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
47	3	San Isidro Labrador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
48	3	San Jose Cancasque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
49	3	San Jose Las Flores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
50	3	San Luis del Carmen	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
51	3	San Miguel de Mercedes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
52	3	San Rafael	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
53	3	Santa Rita	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
54	3	Tejutla	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
71	5	Antiguo Cuscatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
72	5	Chiltiupan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
74	5	Colon	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
75	5	Comasagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
76	5	Huizucar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
77	5	Jayaque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
78	5	Jicalapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
79	5	La Libertad	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
80	5	Nueva San Salvador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
81	5	Nuevo Cuscatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
82	5	Opico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
83	5	Quezaltepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
84	5	Sacacoyo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
85	5	San Jose Villanueva	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
86	5	San Matias	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
87	5	San Pablo Tacachico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
88	5	Talnique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
89	5	Tamanique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
90	5	Teotepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
91	5	Tepecoyo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
92	5	Zaragoza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
180	10	Apopa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
181	10	Ayutuxtepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
182	10	Cuscatancingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
183	10	Delgado	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
184	10	El Paisnal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
185	10	Guazapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
186	10	Ilopango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
187	10	Mejicanos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
188	10	Nejapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
189	10	Panchimalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
190	10	Rosario de Mora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
191	10	San Marcos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
192	10	San Martin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
193	10	San Salvador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
194	10	Santiago Texacuangos	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
195	10	Santo Tomas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
196	10	Soyapango	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
197	10	Tonacatepeque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
179	10	Aguilares	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	\N
73	5	Ciudad Arce	\N	\N	\N	\N	\N	\N	\N	\N	2	\N	\N	2	\N
229	13	Juayua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
230	13	Nahuizalco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
231	13	Nahulingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
232	13	Salcoatitan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
233	13	San Antonio del Monte	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
234	13	San Julian	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
235	13	Santa Catarina Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
236	13	Santa Isabel Ishuatan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
237	13	Santo Domingo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
238	13	Sonsonate	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
239	13	Sonzacate	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
4	1	Concepcion de Ataco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
2	1	Jujutla	\N	1	\N	\N	\N	\N	3	2	\N	\N	\N	1	\N
224	13	Acajutla	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	\N
1	1	Ahuachapan	\N	1	\N	\N	\N	\N	2	\N	\N	2	\N	1	\N
108	6	San Pedro Masahuat	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
109	6	San Pedro Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
110	6	San Rafael Obrajuelo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
111	6	Santa Maria Ostuma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
112	6	Santiago Nonualco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
113	6	Tapalhuaca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
114	6	Zacatecoluca	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
162	9	Chirilagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
163	9	Ciudad Barrios	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
164	9	Comacaran	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
165	9	El Transito	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
166	9	Lolotique	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
167	9	Moncagua	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
168	9	Nueva Guadalupe	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
169	9	Nuevo Eden de San Juan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
170	9	Quelepa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
171	9	San Antonio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
172	9	San Gerardo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
173	9	San Jorge	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
174	9	San Luis de la Reina	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
175	9	San Miguel	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
176	9	San Rafael	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
177	9	Sesori	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
178	9	Uluazapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
240	14	Alegria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
241	14	Berlin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
242	14	California	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
243	14	Concepcion Batres	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
244	14	El Triunfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
245	14	Ereguayquin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
246	14	Estanzuelas	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
247	14	Jiquilisco	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
248	14	Jucuapa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
249	14	Jucuaran	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
250	14	Mercedes Umaña	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
251	14	Nueva Granada	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
252	14	Ozatlan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
253	14	Puerto El Triunfo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
254	14	San Agustin	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
255	14	San Buenaventura	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
256	14	San Dionisio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
257	14	San Francisco Javier	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
258	14	Santa Elena	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
259	14	Santa Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
260	14	Santiago de Maria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
261	14	Tecapan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
262	14	Usulutan	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
129	7	San José la Fuente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
303	15	Municipio 3	\N	\N	\N	\N	\N	\N	\N	5	4	\N	\N	9	\N
\.


--
-- Data for Name: municipio_componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio_componente (com_id, mun_id, mun_com_asignacion) FROM stdin;
\.


--
-- Name: municipio_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('municipio_mun_id_seq', 304, true);


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
-- Name: nombre_fecha_aprobacion_nom_fec_apr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nombre_fecha_aprobacion_nom_fec_apr_id_seq', 5, true);


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
-- Name: nombre_rubro_nom_rub_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nombre_rubro_nom_rub_id_seq', 6, true);


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
32	1	\N
32	2	\N
32	3	\N
32	4	\N
32	5	\N
33	1	\N
33	2	\N
33	3	\N
33	4	\N
33	5	\N
34	1	\N
34	2	\N
34	3	\N
34	4	\N
34	5	\N
35	1	\N
35	2	\N
35	3	\N
35	4	\N
35	5	\N
36	1	\N
36	2	\N
36	3	\N
36	4	\N
36	5	\N
\.


--
-- Data for Name: nota; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nota (not_id, not_correlativo, not_fnota, not_observacion, rub_id) FROM stdin;
1	1	2013-03-15	Observación	3
\.


--
-- Name: nota_not_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('nota_not_id_seq', 1, true);


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
-- Name: obra_obr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('obra_obr_id_seq', 8, true);


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
25	Roles	admin/administracion/rolesSistema	24	1
24	Sistema	admin/administracion	\N	3
27	Opciones Sistema	admin/administracion/opcionesSistema	24	2
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
59	Recepción y Aprobación	componente2/procesoAdministrativo/recepcionAprobacionProductos	54	5
62	Criterios Manual Operativo	componente2/comp23_E0/gestionCriterios	61	1
48	Elaboracion de Plan Piloto	componente3/componente3/elab_plan_imp	45	\N
19	Gestión Consultoras	consultor/consultoraC	17	1
20	Gestión Coordinador	consultor/consultoraC/coordinadores	17	2
57	Selección Consultora	componente2/procesoAdministrativo/seleccionConsultoras	54	3
58	Propuesta Técnica	componente2/procesoAdministrativo/propuestaTecnica	54	4
22	Proyecto Pep	componente2/proyectoPep	17	2
65	Comité Interinstitucional	componente2/comp23_E0/comiteInterinstitucional	61	5
60	Revisión de productos	componente2/comp23/revisionProducto	\N	3
54	Proceso Administrativo PEP	componente2/procesoAdministrativo	\N	2
63	Solicitud Asistencia	componente2/comp23_E0/gestionsolicitudAsistencia	61	2
64	Plan de trabajo	componente2/comp23_E0/planTrabajoConsultora	60	1
66	Aporte Municipal	componente2/comp23_E0/registroAporteMunicipal	60	2
23	Informe Condiciones Previas	componente2/comp23_E1/InformePreliminar	60	3
36	Diagnóstico	componente2/comp23_E2/diagnostico	60	4
38	Cumplimientos Mínimos PEP	componente2/comp23_E3/cumplimientosMinimos	60	5
56	Lista Corta	componente2/procesoAdministrativo/evaluacionExpresionInteres	54	2
55	Expresiones de Interés	componente2/procesoAdministrativo/adquisicionContrataciones	54	1
61	Etapa previa	componente2/comp23_E0/gestionCriterios	\N	1
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
74	Solicitud de Ayuda	componente2/comp24_E0/solicitudAyuda	68	1
75	Acuerdo Municipal	componente2/comp24_E0/acuerdoMunicipal	68	2
88	Informe de Resultados	componente2/comp24_E3/informeResultados	71	4
90	Capacitación al Concejo Municipal	componente2/comp24_E4/capacitacionConcejoMunicipal	72	2
91	Gestión de Riesgos	componente2/comp24_Final/gestionRiesgos	73	1
121	Ayuda de Memorias 	uep/uep/ayudaMemorias/	120	1
122	Registro de Actividades 	uep/uep/registroActividades	120	2
123	Perfiles de Eventos	uep/uep/perfilesEventos	120	3
124	CCC	componente2/componente21/ccc	\N	\N
73	Final (omitida)	componente2/comp24/	67	7
83	Revisión y Aprobación de Productos	componente2/comp24_E1/	69	1
84	Revisión y Aprobación de Productos	componente2/comp24_E2/	70	1
76	Solicitud de Asistencia Técnica	componente2/comp24_E0/solicitudAsistenciaTecnica	68	3
117	Asignación de Participantes	componente2/comp22/asignacionParticipantes	9	3
118	Registro de Procesos de Formación	componente2/comp22/registroCapacitaciones	9	3
119	Resultados Finales	componente2/comp22/resultadosParticipantes	9	4
120	Componente UEP	uep/	\N	1
95	Integración Grupos	componente2/comp23_E0/integracionDeGrupos	61	3
125	CC	componente2/componente21/cc	\N	\N
68	Condiciones previas	componente2/comp24/	67	1
69	Diagnóstico Administrativo y Financiero	componente2/comp24/	67	2
70	PRFM	componente2/comp24/	67	3
71	Evaluación y Seguimiento	componente2/comp24/	67	4
72	Gestión del Conocimiento	componente2/comp24/	67	5
77	Comportamiento de los Ingresos	componente2/comp24_E0/indicadoresDesempenoAdmin	69	4
78	Indicadores de Desempleño Administrativo	componente2/comp24_E0/E	69	5
79	Indicadores de Desempeño Administrativo	componente2/comp24_E0/F	69	6
80	Perfil de Municipio	componente2/comp24_E0/perfilMunicipio	69	7
81	Empleados Municipales	componente2/comp24_E0/H	69	8
82	Manuales Administrativos	componente2/comp24_E0/I	69	9
85	Aprobación e Implementación	componente2/comp24_E3/aprobacionImplementacion	71	1
89	Gestión de Conocimiento	componente2/comp24_E4/gestionConocimiento	72	1
87	Recepción de productos del plan	componente2/comp24_E3/recepcionProductosPlan	71	3
67	Componente 2.4 PRFM	componente2/comp24/	\N	5
86	Aprobación de Perfil y TDR	componente2/comp24_E3/elaboracionPerfilyTDR	71	2
116	Gestión y Seguimiento	componente2/procesoAdministrativo/gestionSeguimiento	60	5
126	Solicitud de Inscripción	componente2/comp22/solicitudInscripcion	9	1
128	Observaciones CC y CCC	transparencia/observaciones_cc_ccc/agregar_obs	127	\N
127	Transparencia	inicio/index	\N	\N
\.


--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 128, true);


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
1943	\N	\N	\N	\N	\N	Julio	Soto	H	Concejal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
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
1945	\N	\N	\N	\N	\N	Reina	Reyes	M	Concejala	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
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
1954	\N	\N	\N	\N	\N	Oscar	Moreno	H	Concejal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
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
885	7	\N	\N	\N	\N	Manuel Dolores	Quintanilla	H	El Tránsito, San Miguel  	50		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
918	\N	\N	\N	\N	\N	Lucy Idalia	Rodríguez	M	Alcaldía Municipal	35	Bachiller	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
919	\N	\N	\N	\N	\N	Stanley Arquímides	Rodríguez	H	Empresa Consultora	49	Profesional	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
920	\N	\N	\N	\N	\N	Luis Stanley	Rodríguez Acosta	H	Empresa Consultora	23	bachiller	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
921	\N	\N	\N	\N	\N	José Francisco	Aparicio Soto	H	Empresa Consultora	65	Profesional	         	          	u	\N	98	\N	\N	\N	\N	\N	\N	\N	\N
925	\N	\N	\N	\N	\N	Griselda Marisol 	Paz	M	El Sombrerito 	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
930	\N	63	\N	\N	\N	Doris	Acosta	M	coordinadora Codein	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
931	\N	63	\N	\N	\N	Mario Andres	Martínez	H	Alcalde	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
932	\N	63	\N	\N	\N	Exequiel Osmín 	Cuevas Romero 	H	concejal 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
933	\N	63	\N	\N	\N	Alba	Bonilla	M	Secretaria municipal 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
934	\N	63	\N	\N	\N	Ivan 	Callejas	H	Consultor Codein	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
935	\N	63	\N	\N	\N	Oscar Benjamín	Pinerda	H	Consultor Codein	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
936	\N	63	\N	\N	\N	José Francisco 	Aparicio Soto 	H	Consultor Codein	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
937	\N	63	\N	\N	\N	Elmer Enrique	Reyes R.	H	U.A.M	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
938	\N	63	\N	\N	\N	Sergio 	Dominguez 	H	Consultor Codein	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
939	\N	63	\N	\N	\N	Zenaida Elizabeth 	Granada 	M	Tecnico, ISDEM 	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
940	\N	67	\N	\N	\N	Stanley 	Rodriguez Reyes 	H	Consultor Codein 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
941	\N	67	\N	\N	\N	Blanca Estela 	Quijano	M	Asistente Codein 	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
942	\N	67	\N	\N	\N	Exequiel Osmín 	Cuevas Romero 	H	Concejal 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
943	\N	67	\N	\N	\N	Alba 	Bonilla de López 	M	Secretaria Alcaldia Municipal	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
944	\N	67	\N	\N	\N	Mario Andres 	Martinez 	H	Alcalde 	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
945	\N	67	\N	\N	\N	Catalino 	Goméz	H	Concejal 	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
946	\N	67	\N	\N	\N	José Elías 	Lazo Bonilla	H	Sindico 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
947	\N	67	\N	\N	\N	Cesar Amilcar	López	H	Concejal 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
948	\N	66	\N	\N	\N	Alba 	Bonilla	M	Secretaria municipal 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
949	\N	66	\N	\N	\N	Stanley 	Rodriquez Reyes 	H	Técnico Codein 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
954	\N	\N	\N	\N	\N	José Joaquín 	 Arriaza	H	El Zapote	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
961	\N	\N	\N	\N	\N	Alfredo Antonio 	 Umanzor	H	Z. Urbana Barrios	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
989	\N	65	\N	\N	\N	Alba 	Bonilla de López	M	Secretaria Municipal	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
990	\N	65	\N	\N	\N	Francisco Javier 	Sorto Velásquez 	H	Concejal	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
991	\N	65	\N	\N	\N	Jose Francisco 	Aparicio 	H	Consultor Codein	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
997	4	\N	\N	\N	\N	Rosa María	 Reyes	M	Municicpalidad	29		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
998	4	\N	\N	\N	\N	Lidia Estela 	Rivas	M	Municipalidad	31		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1000	\N	\N	\N	\N	\N	Humberto  	Guandique	H	ISDEM 	57	Universitario 	         	          	u	\N	102	\N	\N	\N	\N	\N	\N	\N	\N
996	4	\N	\N	\N	\N	Carlos Humberto 	García	H	Municipalidad	58		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
999	4	\N	\N	\N	\N	Dora Alicia	Reyes 	M	Municipalidad	37		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1001	\N	\N	\N	\N	\N	José Roldolfo 	Marín 	H	Chinameca 	25	universitario 	         	          	u	\N	102	\N	\N	\N	\N	\N	\N	\N	\N
1002	\N	\N	\N	\N	\N	Luis A.	Molina 	H	ASDECHI	32	Universitario 	         	          	u	\N	102	\N	\N	\N	\N	\N	\N	\N	\N
1005	\N	\N	\N	\N	\N	Reina de la Paz	Alvarenga 	M	Bello Horizonte 	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1007	\N	\N	\N	\N	\N	Fredy Adán 	Chévez	H	Bello Horizonte 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1003	5	\N	\N	\N	\N	José Raúl 	Orantes 	H	Uluazapa	51		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1006	\N	\N	\N	\N	\N	Manuel de Jesús 	Perez 	H	Bello Horizonte 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1004	\N	\N	\N	\N	\N	Elida Patricia 	Chicas 	M	C. Los Pilones 	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
926	\N	\N	\N	\N	\N	Ana Deisy 	Berrios	M	El sombrerito 	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
923	5	\N	\N	\N	\N	Elmer Iván 	Cruz	H	Uluazapa	27		2619-1501	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
952	\N	\N	\N	\N	\N	José Jaime 	Guerra	M	El Sombrerito 	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
953	\N	\N	\N	\N	\N	Lorena 	Arriaza	M	El Zapote 	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
955	\N	\N	\N	\N	\N	Mauro 	Fuentes Ruíz	H	El Zapote	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
957	\N	\N	\N	\N	\N	María del Carmen 	Cruz Bonilla	M	La Joya	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
964	\N	\N	\N	\N	\N	Edwin Noé 	Zúniga	H	Z. Urbana Barrios	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	C	\N	\N	\N
975	\N	\N	\N	\N	\N	María Aracely	 Moreno	M	Salud, Educación y Seguridad	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	S	\N	\N	\N
979	\N	\N	\N	\N	\N	Ernestina 	Álvarez de Guevara	M	Mujeres y Jovenes 	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	S	\N	\N	\N
1016	5	\N	\N	\N	\N	Paula Elisa 	Cuadra 	M	Uluazapa	32		2619-1566	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1009	\N	\N	\N	\N	\N	Sara Elizabeth 	Gonzalez	M	Río Vargas	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1010	\N	\N	\N	\N	\N	Edgar David	Ramírez Argueta 	H	Río Vargas 	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1011	\N	\N	\N	\N	\N	José Lázaro	 Blanco 	H	ADESCO 	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1012	\N	\N	\N	\N	\N	Concepción 	Días de Vargas 	M	Salud 	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	S	\N	\N	\N
1013	\N	\N	\N	\N	\N	Rodrigo 	González 	H	Río Vargas	63	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1014	\N	\N	\N	\N	\N	Kathia 	Goméz  	M	Alcaldía Municipal 	68	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
1018	5	\N	\N	\N	\N	María Concepción  	Reyes	M	Uluazapa	67	Licda. en Ciencias de la Com.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1080	\N	100	6	\N	\N	Milton	Portillo	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1081	\N	100	6	\N	\N	Miguel Angel	Ortíz	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1082	\N	101	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
924	5	\N	\N	\N	\N	María de los Angeles	Velasquez	M	Uluazapa	22		2609-1641	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1017	5	\N	\N	\N	\N	José Tito 	Parada	H	Uluazapa	25	Lic. en Psicología 	7726-7299	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1019	\N	72	\N	\N	\N	María Concepción	 Reyes 	M	colaboradora	67	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1020	\N	72	\N	\N	\N	María de los Ángeles 	Velásquez	M	Jefa Unidad de la Mujer 	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1021	\N	72	\N	\N	\N	Elmer Ivan 	Cruz	H	Promotor Social	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1022	\N	72	\N	\N	\N	Milagro del Rosario 	Guzmán 	M	Jefa Unidad de Medio Ambiente	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1023	\N	93	\N	\N	\N	Elmer Ivan 	Cruz	H	Promotor social 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1024	\N	95	\N	\N	\N	María de los Ángeles	Velásquez	M	Jefa Unidad de la Mujer	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1025	\N	95	\N	\N	\N	Ana María 	Alfaro	M	Facilitadora CODEIN	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1029	\N	95	\N	\N	\N	Kathya Yesenia	Goméz	M	Sindica	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1030	\N	94	\N	\N	\N	Zenaida Elizabeth	Granada	M	técnico ISDEM	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1031	\N	94	\N	\N	\N	María de los Ángeles 	Velásquez	M	Jefe Unidad de la Mujer AMU	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1032	\N	94	\N	\N	\N	Milagro del Rosario 	Guzmán	M	Jefe Unidad de Medio Ambiente 	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1033	\N	94	\N	\N	\N	Ana María 	Alfaro	M	Facilitadora CODEIN	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1034	\N	94	\N	\N	\N	Blanca Estela	Quijano	M	Técnico CODEIN	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1035	\N	96	\N	\N	\N	Yurandir	Gutiérrez 	H	Técnico CODEIN	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1036	\N	96	\N	\N	\N	Ana María 	Alfaro 	M	Facilitadora CODEIN	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1037	\N	96	\N	\N	\N	Milagro de Rosario 	Guzmán	M	Jefe Unidad de Medio Ambiente	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1038	\N	96	\N	\N	\N	Paula Elisa	Cuadra	M	Auxiliar de enfermeria	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1039	\N	\N	\N	\N	\N	Herber Leodan 	Medina 	H	C. Los Pilones	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1015	\N	\N	\N	\N	\N	José Raúl 	Orantes 	H	Alcaldía Municipal 	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
1040	\N	\N	\N	\N	\N	Maria de los Ángeles 	Velásquez 	M	Alcaldía Municipal 	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
1041	\N	\N	\N	\N	\N	Rosa Delmy	Gómez de Reyes 	M	B. El Calvario 	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1042	\N	\N	\N	\N	\N	Elmer Ivan 	Cruz del Cid 	H	Alcaldia Municipal 	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
1043	\N	\N	\N	\N	\N	Milagro del Rosario 	Guzmán	M	Alcaldía Municipal 	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
922	5	\N	\N	\N	\N	Milagro del Rosario	Guzmán	M	Uluazapa 	34		7790-4894	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1044	\N	\N	\N	\N	\N	Fredy Adán 	Chévez 	H	C. Bello Horizonte 	51	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	C	\N	\N	\N
1045	\N	\N	\N	\N	\N	Concepción 	Díaz de Vargas 	M	Salud	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	S	\N	\N	\N
1046	\N	\N	\N	\N	\N	Edgar David	Ramírez Argueta 	H	ADESCO	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	7	I	\N	\N	\N
1048	\N	97	1	\N	\N	William 	Portillo Alfaro	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1049	\N	97	1	\N	\N	José Santos 	Rivas Cárcamo	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1050	\N	97	1	\N	\N	Elsy Maribel	Acevedo de Portillo	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1051	\N	97	1	\N	\N	Francisca Guadalupe	López	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1052	\N	97	1	\N	\N	Jóse Luis	Flores B.	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1053	\N	97	1	\N	\N	Julio Cesar	Barrera Arevalo	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1054	\N	97	1	\N	\N	Guillermo Antonio	Mejia	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1055	\N	97	1	\N	\N	Jose Boris	Ramirez Melendez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1056	\N	97	1	\N	\N	Flor Alicia	Villalta Aguillon	M	Secretaria Municipal.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1057	\N	97	2	\N	\N	Carlos	Menjivar	H	Técnico.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1058	\N	97	3	\N	\N	Pedro 	Ortíz	H	Asesor Municipal.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1059	\N	97	3	\N	\N	Jaime	Hernández	H	Asesor Municipal.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1060	\N	97	2	\N	\N	Flora 	Blandon de Grajeda	H	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1061	\N	97	2	\N	\N	Edith 	Del Cid	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1062	\N	97	2	\N	\N	Rommy Ivette	Jimenez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1063	\N	99	6	\N	\N	Olga Margarita	Escamilla	M	Empleada Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1064	\N	99	1	\N	\N	Guillermo Antonio	Mejia	H	Alcalde Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1065	\N	99	6	\N	\N	Flor Alicia	Villalta Aguillón	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1066	\N	100	6	\N	\N	Gorety del Carmen	Olivar Ramos	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1068	\N	100	6	\N	\N	Berfalia del Carmen	Murcia	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1069	\N	100	6	\N	\N	Fredy Orlando	Acevedo	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1070	\N	100	6	\N	\N	Santos del Carmen	Ascencio	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1071	\N	100	6	\N	\N	Isabel Evelin	Ascencio	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1072	\N	100	6	\N	\N	Miguel Edmundo	Ayala F	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1073	\N	100	6	\N	\N	Cecilio	Aceveo R	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1074	\N	100	6	\N	\N	Felix 	Cortez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1075	\N	100	6	\N	\N	Santos Rene	Alfaro	H	Lider comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1077	\N	100	1	\N	\N	Elsy Maribel 	Acevedo Portillo	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1078	\N	100	6	\N	\N	María Concepción	Carcamo	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1076	\N	100	6	\N	\N	María del Transito	Martin	M	Lideresa comunitaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1079	\N	100	6	\N	\N	Romelia del Carmen	Carcamo	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1083	\N	100	6	\N	\N	Ana Rubidia	Portillo Hernández 	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1084	\N	101	1	\N	\N	Julio César	Peña Orellana	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1085	\N	100	6	\N	\N	Francisca 	Carcamo Villalobos	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1086	\N	100	6	\N	\N	Gloria Elba	Alfaro	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1087	\N	100	1	\N	\N	Francisca Guadalupe	Lopez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1088	\N	100	6	\N	\N	Domingo Alberto	Carcamo	M	Habitante 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1089	\N	101	1	\N	\N	Benjamín Alejandro	García	H	Primer regidor propietario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1090	\N	101	1	\N	\N	Mery Eleonor 	Lobato Cruz	M	Segunda regidora propietaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1091	\N	101	1	\N	\N	Mélida Gregoria	Flores	M	Primera regidora suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1092	\N	101	1	\N	\N	Anabel	Navarro Peña	M	Segunda regidora suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1093	\N	101	1	\N	\N	Rósulo	Múñoz López	H	Tercer regidor suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1094	\N	100	6	\N	\N	María del Carmen	Alfaro	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1095	\N	100	6	\N	\N	Dora Reyna	Deras	M	habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1096	\N	101	1	\N	\N	Víctor Manuel	López Argueta	H	Cuarto regidor suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1097	\N	100	6	\N	\N	Victor Manuel	Mejia	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1098	\N	100	6	\N	\N	Marcial Antonio 	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1099	\N	101	6	\N	\N	Xiomara Carolina	Martínez	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1100	\N	100	6	\N	\N	Maria Isabel	Pineda	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1101	\N	100	1	\N	\N	Guillermo Antonio	Mejia	H	Alcalde Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1102	\N	100	6	\N	\N	Flor Alicia	Villalta Aguillon	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1103	\N	100	6	\N	\N	Flor Esperanza 	Villalta	M	Lideresa Comunitaria.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1104	\N	102	6	\N	\N	María del Carmen 	Alfaro	M	JD AMUDET	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1105	\N	102	6	\N	\N	Silvia del Carmen	Ortíz	H	Iglesia Parroquial	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1107	\N	103	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1115	\N	105	6	\N	\N	Guadalupe	Rodríguez de Peña	M	Directora Centro Escolar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1121	\N	102	6	\N	\N	Marvin Ulises	Guevara Villalta	H	Pastor Colonia el refugio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1127	\N	109	6	\N	\N	Glenda del Carmen	Romero	M	Directora Centro Escolar 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1135	\N	108	6	\N	\N	José Alfredo	Delgado	H	Microempresario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1106	\N	103	6	\N	\N	Carlos Alberto	Alfaro	H	Director INER	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1111	\N	104	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1108	\N	102	6	\N	\N	Jóse Andrés	Castro Acevedo	H	Director C.E Col.El Refugio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1112	\N	102	6	\N	\N	Miguel Angel	González	H	Director C.E Pedro Pablo Casti	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1120	\N	107	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1145	\N	112	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1150	\N	108	6	\N	\N	Olga Margarita	Escamilla	M	Empleada Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1159	\N	113	6	\N	\N	Orvelina	Cañas	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1168	\N	113	6	\N	\N	Yanci Guadalupe	Muñóz	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1184	\N	114	6	\N	\N	Guadalupe Beatriz	Hidalgo	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1192	\N	114	6	\N	\N	Rosalina	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1109	\N	102	6	\N	\N	Salvador	Gomez Henríquez	H	Juez de Paz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1124	\N	102	6	\N	\N	William Lorenzo	Portillo	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1134	\N	108	6	\N	\N	Cecilia	Cornejo Cruz	M	Microempresaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1138	\N	111	1	\N	\N	Rósulo	Múñoz	H	Tercer regidor suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1143	\N	112	6	\N	\N	Francisco	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1157	\N	113	6	\N	\N	Rafael Alonso	Cruz	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1166	\N	113	6	\N	\N	Ana Elisabeth	Alfaro	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1176	\N	113	2	\N	\N	Carlos	Menjívar	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1182	\N	114	6	\N	\N	María Antonia	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1190	\N	114	6	\N	\N	Flor Margarita	Mejía Cruz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1199	\N	114	6	\N	\N	Jaqueline Magdalena	Hernández M	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1110	\N	104	6	\N	\N	Verónica	Navidad	M	Encargada Unidad de Género	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1113	\N	102	1	\N	\N	Elsy Maribel	Acevedo de Portillo	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1116	\N	105	2	\N	\N	Rommy	 Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1125	\N	102	1	\N	\N	Guillermo 	Mejia Delgado	H	Alcalde Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1130	\N	110	1	\N	\N	Rósulo 	Múñoz López	H	Tercer regidor suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1146	\N	108	6	\N	\N	Milagro 	Alfaro	M	Microempresario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1151	\N	113	6	\N	\N	José Efraín	Martínez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1160	\N	113	1	\N	\N	Gregoria Mélida	Flores	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1169	\N	113	6	\N	\N	Jennifer Lizbeth	Beltrán	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1186	\N	114	6	\N	\N	María Lilian	Cruz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1194	\N	114	6	\N	\N	Francisco José	Rodríguez	H	miembro ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1114	\N	102	6	\N	\N	Cecilio 	Acevedo R	H	ACOVAN	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1117	\N	106	6	\N	\N	Xiomara 	Martínez	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1126	\N	102	6	\N	\N	Alicia 	Villalta Aguillon	M	Secretaria Municipal.	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1131	\N	110	2	\N	\N	Rommy	jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1132	\N	108	6	\N	\N	Ana Rubidia 	Portillo	M	Microempresaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1137	\N	108	6	\N	\N	Carmen Cecilia	López de Paul	M	Microempresaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1139	\N	111	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1142	\N	112	6	\N	\N	Napoleón	Navidad López	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1144	\N	112	1	\N	\N	Julio César	Peña	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1155	\N	113	6	\N	\N	Manuel	Antonio	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1156	\N	113	6	\N	\N	José Mardoqueo	Rivas	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1164	\N	113	6	\N	\N	Raúl de Jesús	Cruz	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1165	\N	113	6	\N	\N	José Carlos	Vásquez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1174	\N	113	6	\N	\N	Carmen	Rivas	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1175	\N	113	6	\N	\N	Roberto	Villeda	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1180	\N	114	1	\N	\N	Mery Eleonor	Lobato	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1181	\N	114	6	\N	\N	María Elena	Mejía	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1188	\N	114	6	\N	\N	María de jesús	Cruz de Mejía	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1189	\N	114	6	\N	\N	Lucila del Carmen	Sánchez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1198	\N	114	6	\N	\N	Mirna Elisabeth	Mejía	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1118	\N	106	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1119	\N	107	6	\N	\N	Devora Ruth	Peña	M	Directora Unidad de Salud 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1122	\N	102	6	\N	\N	Juan Patricio	López	H	Jefe Puesto PNC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1123	\N	102	6	\N	\N	Clara Nohemy	Molina Rivera	H	UCSF	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1128	\N	109	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1129	\N	110	1	\N	\N	Benjamín 	García	H	Primer regidor propietario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1133	\N	108	6	\N	\N	Maria Elva 	Muñoz	M	Microempresaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1136	\N	108	6	\N	\N	Rosa	Cordova	M	Microempresaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1140	\N	112	6	\N	\N	Gloria	Serrano Rivas	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1141	\N	112	6	\N	\N	Dionisio 	Flores	H	Habitantes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1147	\N	108	6	\N	\N	Oscar 	Rodriguez	H	Comerciante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1148	\N	108	6	\N	\N	Pedro	Duran Serrano	H	Comerciante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1149	\N	108	6	\N	\N	Flor Alicia	Villalta Aguillon	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1152	\N	113	6	\N	\N	Delmis del Carmen	Rivas	M	Miembro Asociación Mujeres	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1153	\N	113	6	\N	\N	Dinora	Santiago Reyes	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1154	\N	113	6	\N	\N	Marta Esmeralda	Santiago	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1158	\N	113	6	\N	\N	José Angel	Martínez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1161	\N	113	1	\N	\N	Julio César	Peña	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1162	\N	113	6	\N	\N	Luis Fernando	Ventura	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1163	\N	113	6	\N	\N	Carlos Arquímedes	Portillo	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1167	\N	113	6	\N	\N	José Lucas	Funes	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1170	\N	113	6	\N	\N	Johana Alejandra	Escobar Cortez	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1171	\N	113	6	\N	\N	Pedro	Muñóz Hernández	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1172	\N	113	6	\N	\N	José Roberto	Tejada	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1173	\N	113	6	\N	\N	José Rodil	Martínez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1177	\N	113	2	\N	\N	Rommy 	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1178	\N	114	6	\N	\N	María Elena	Cáceres	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1179	\N	114	6	\N	\N	María Julia	Aragón Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1235	\N	116	6	\N	\N	Marta Lidia	Velasco	M	Costurera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1183	\N	114	6	\N	\N	María del Carmen	Cruz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1236	\N	116	6	\N	\N	Dora Leticia	Muñóz	M	Costurera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1185	\N	114	6	\N	\N	Felicita de Jesús	Santos	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1237	\N	116	6	\N	\N	Corina	Pérez Rosales	M	Costurera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1187	\N	114	6	\N	\N	Maribel María 	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1191	\N	114	6	\N	\N	Adilia 	Navarro Fernández	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1193	\N	114	6	\N	\N	María Sonia	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1195	\N	114	6	\N	\N	María Irma	Marroquín	M	habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1197	\N	114	1	\N	\N	Rósulo 	Muñóz López	H	Tercer Concejal suplente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1196	\N	114	6	\N	\N	Rubén Antonio	Alvarez Rodríguez	H	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1200	\N	114	6	\N	\N	María Elsa	Lobato	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1201	\N	114	6	\N	\N	María Gloria	López Cruz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1202	\N	114	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1203	\N	114	6	\N	\N	María Esperanza 	Rodríguez	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1204	\N	114	6	\N	\N	Marta isabel	Rodríguez	M	Promotora comunitaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1205	\N	114	6	\N	\N	Josué Teodoro	Lobato	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1206	\N	114	6	\N	\N	Abel	Vásquez	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1207	\N	114	6	\N	\N	Rafaela 	Hernández	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1208	\N	114	6	\N	\N	Santos 	López de Vásquez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1209	\N	114	6	\N	\N	Areli Esmeralda	Lovato	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1210	\N	114	6	\N	\N	Deysi Dinora	Hernández	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1211	\N	114	6	\N	\N	María Hilda 	Lobato	M	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1212	\N	114	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1213	\N	115	6	\N	\N	Yaneth Esmeralda	Barahona	M	Docente C.E. Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1214	\N	115	6	\N	\N	Carlos Alberto	Alfaro	H	Director INER	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1215	\N	115	6	\N	\N	German Wilfredo	Molina	H	Inspector saneamiento	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1216	\N	115	6	\N	\N	Patricia Rosibel	Pérez Mejía	M	Docente C.E Monseñor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1217	\N	115	6	\N	\N	German 	Orellana Vásquez	H	Docente C.E. El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1218	\N	115	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1219	\N	115	6	\N	\N	Rosa Hilda	Platero	M	Promotora de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1220	\N	115	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1221	\N	116	6	\N	\N	Carlos Alberto	Alfaro Rodríguez	H	Director INER	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1222	\N	116	6	\N	\N	Ana Leticia	Tejada	M	Vendedora  mercado municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1224	\N	116	6	\N	\N	Ana Miriam	Velasco	M	Presidenta SERICOSTUR	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1225	\N	116	6	\N	\N	Mariano 	González	H	Secretario ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1226	\N	116	6	\N	\N	María Dora	Membreño	M	Tesorera ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1227	\N	116	6	\N	\N	Alex Alexander	Vásquez	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1228	\N	116	6	\N	\N	José Pilar	Zúñiga	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1229	\N	116	6	\N	\N	José Sergio	Rivera	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1230	\N	116	6	\N	\N	Carmen Elena	Hernández	M	Habitante 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1231	\N	116	6	\N	\N	Roxana	López Muñóz	M	vendedora mercado municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1232	\N	116	6	\N	\N	María Alicia	García	M	ama de casa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1233	\N	116	6	\N	\N	Patricia Evelin	Preza	M	Vendedora mercado municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1223	\N	116	6	\N	\N	Karen Verónica	Rosales	M	Vendedora mercado municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1234	\N	116	6	\N	\N	María Isabel	López	M	Costurera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1238	\N	116	6	\N	\N	María Angelina	Hernández	M	Síndica Asociación de mujeres	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1239	\N	116	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1240	\N	116	6	\N	\N	María Julia	Hernández	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1241	\N	116	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1242	\N	117	6	\N	\N	María Catalina	Deras de Muñóz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1243	\N	117	6	\N	\N	Lorena del Carmen	Navarro	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1244	\N	117	6	\N	\N	Paula 	Navarro	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1245	\N	117	6	\N	\N	Eva Marina	Abarca Martínez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1246	\N	117	6	\N	\N	José Elio	Orellana	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1247	\N	117	6	\N	\N	Adilia del Camen	Reyes	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1248	\N	117	6	\N	\N	Reina Isabel	Reyes	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1249	\N	117	1	\N	\N	Anabel	Navarro Peña	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1250	\N	117	6	\N	\N	Paula 	Villanueva Nolasco	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1251	\N	117	6	\N	\N	María Isabel	Deras	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1252	\N	117	6	\N	\N	Eva 	Muñóz Molina	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1253	\N	117	6	\N	\N	José Domingo	Barrera	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1254	\N	117	2	\N	\N	Rommy 	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1266	\N	119	6	\N	\N	María Kenia	Hernández	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1278	\N	120	6	\N	\N	Roxana	Ramos	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1288	\N	120	6	\N	\N	María Juana	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1297	\N	120	6	\N	\N	Eduviges	Muñóz	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1306	\N	120	6	\N	\N	María Clara	Merino	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1315	\N	120	6	\N	\N	María Rosa	Hernández	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1325	\N	120	6	\N	\N	María Estela	López M	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1334	\N	120	6	\N	\N	Carlos	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1255	\N	118	6	\N	\N	Jaime Adolfo	Orellana	H	miembro red de jóvenes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1261	\N	119	6	\N	\N	Douglas Eduardo	Escobar	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1270	\N	119	6	\N	\N	Melvin Omar	Rodríguez	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1282	\N	120	6	\N	\N	Marina Haydé	González	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1291	\N	120	6	\N	\N	María Angela	Rodríguez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1301	\N	120	6	\N	\N	Jesús	Tejada	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1309	\N	120	6	\N	\N	Lorena del Carmen	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1319	\N	120	6	\N	\N	Vilma Guadalupe	Guerra	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1329	\N	120	6	\N	\N	Angélica	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1338	\N	120	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1340	\N	116	6	\N	\N	Emilio	Sánchez	H	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1350	\N	\N	6	10	\N	Santos Rene	Carcamo	H	Habitante	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1357	\N	\N	3	10	\N	Jaime 	Hernández	H	Técnico Municipal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1256	\N	118	2	\N	\N	Rommy 	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1262	\N	119	6	\N	\N	Jaime Adolfo	Orellana	H	miembro red juvenil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1271	\N	119	6	\N	\N	Carlos Enrique	Rosales	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1274	\N	120	6	\N	\N	María Romina	Romero	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1284	\N	120	6	\N	\N	María Reina	Navidad	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1293	\N	120	6	\N	\N	María Angela	Rodríguez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1303	\N	120	6	\N	\N	María Gloria	Serrano	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1311	\N	120	6	\N	\N	Sandra 	Molina Chávez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1321	\N	120	6	\N	\N	María Leonor	Montoya	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1331	\N	120	6	\N	\N	Ana Gladis	Tejada	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1345	\N	\N	6	10	\N	Manuel 	Candelario	H	Protección Civil	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1349	\N	\N	6	10	\N	Julio Cesar	Barrera	H	Habitante	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1356	\N	\N	6	10	\N	Cecilio	Acevedo Rodriguez	H	Lider	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1257	\N	119	6	\N	\N	Evelyn Vanessa	Marroquin	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1267	\N	119	6	\N	\N	Yessenia 	Tejada Campos	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1279	\N	120	6	\N	\N	María Estela	Ramírez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1298	\N	120	6	\N	\N	Gregorio	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1307	\N	120	6	\N	\N	Vilma Haydé	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1316	\N	120	6	\N	\N	María Bernarda	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1326	\N	120	6	\N	\N	Amparo	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1335	\N	120	6	\N	\N	Candelaria	Orellana	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1339	\N	113	6	\N	\N	María del Carmen	Chávez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1344	\N	\N	6	10	\N	Vicente Evaristo	Portillo	H	PNC	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1353	\N	\N	6	10	\N	Cecilia del Carmen	Olivar 	M	Directora C.E C. de Cañas	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1363	\N	121	1	\N	\N	Reina Isabel	Reyes	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1258	\N	119	6	\N	\N	Mariana	Lemus Martínez	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1268	\N	119	6	\N	\N	Josué Teodoro	Lobato	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1281	\N	120	6	\N	\N	María Rosa	Méndez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1290	\N	120	6	\N	\N	María Arely 	Cuéllar	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1300	\N	120	6	\N	\N	Francisco	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1308	\N	120	6	\N	\N	María 	Alvarado Bonilla	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1318	\N	120	6	\N	\N	Ana María	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1328	\N	120	6	\N	\N	María Hilda 	Navidad	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1337	\N	120	6	\N	\N	Reina 	Valladares	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1259	\N	119	6	\N	\N	Concepción de María	Rivas	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1269	\N	119	6	\N	\N	José Jaime	Rodríguez	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1273	\N	120	6	\N	\N	Elsy Noemi	Delgado	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1283	\N	120	6	\N	\N	María Inés	Hernández	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1292	\N	120	6	\N	\N	María Josefa	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1302	\N	120	6	\N	\N	María Miriam 	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1310	\N	120	6	\N	\N	María Gladis	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1320	\N	120	6	\N	\N	Rosa Amelia 	Mena	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1330	\N	120	6	\N	\N	Fátima Maribel	Navidad	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1260	\N	119	6	\N	\N	Manuel de Jesús	Menjívar	H	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1280	\N	120	6	\N	\N	María Elisabeth	Méndez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1289	\N	120	6	\N	\N	María Aminda	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1299	\N	120	6	\N	\N	Miguel	Tejada	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1317	\N	120	6	\N	\N	Lucía 	López	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1327	\N	120	6	\N	\N	Katia	Estephany	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1336	\N	120	6	\N	\N	Marina Isabel	Molina	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1346	\N	\N	6	10	\N	Darwin Waldo	Blanco	H	Iglesia Evangelica	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1263	\N	119	6	\N	\N	José William	Vásquez	H	miembro ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1272	\N	119	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1275	\N	120	6	\N	\N	Santos 	Cuéllar	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1285	\N	120	6	\N	\N	Emilio 	Sánchez	H	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1294	\N	120	6	\N	\N	María Rubelina	Escobar	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1304	\N	120	6	\N	\N	Mariano 	González	H	Líder comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1312	\N	120	6	\N	\N	María	Reyes Rodríguez	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1322	\N	120	6	\N	\N	Tomasa	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1332	\N	120	6	\N	\N	María Lilian 	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1341	\N	\N	6	10	\N	Clara Nohemy 	Molina	M	Directora UCSF	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1264	\N	119	6	\N	\N	Raúl 	Castro Barrera	H	miembro ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1276	\N	120	6	\N	\N	María Amanda	Peña	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1286	\N	120	6	\N	\N	Brenda	del Carmen	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1295	\N	120	6	\N	\N	María Miriam	Navidad	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1305	\N	120	6	\N	\N	Miguel Angel 	López	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1313	\N	120	6	\N	\N	Olga Marina	Torres	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1323	\N	120	6	\N	\N	Candelaria	Montoya	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1343	\N	\N	6	10	\N	Jose Patricio	López	H	Engardado delegacion PNC	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1265	\N	119	6	\N	\N	Lorena Elisabeth	Muñóz	M	Estudiante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1277	\N	120	6	\N	\N	Marta Lilian	Cuéllar	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1287	\N	120	6	\N	\N	María Imelda	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1296	\N	120	6	\N	\N	Dionisio	Flores	H	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1314	\N	120	6	\N	\N	Juana María	Flores	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1324	\N	120	6	\N	\N	Angela 	Merino	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1333	\N	120	6	\N	\N	René	Flores	H	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1342	\N	\N	6	10	\N	Norberto Jose 	Marroquín	H	Parroco 	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1347	\N	\N	6	10	\N	Miguel Angel	Ortíz	H	Lider comunitario	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1348	\N	\N	6	10	\N	Goreti del Carmen	Olivar	M	Habitante	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1351	\N	\N	6	10	\N	Maria Elva	Muñoz de Martin	M	Lideresa	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1415	\N	132	6	\N	\N	María Elena	Melina	M	Socia de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1352	\N	\N	6	10	\N	Yenny Guadalupe	Sánchez	M	Directora C.E La Virgen	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1354	\N	\N	6	10	\N	Adriana	Mira	M	Presidenta AMUDET	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	S	\N	\N	\N
1355	\N	\N	1	10	\N	Josue Luis	Flores	H	Concejal	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1358	\N	\N	6	10	\N	Miguel Angel	Gonzalez	H	Lider	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1359	\N	\N	6	10	\N	Salvador 	Gomez Henríquez	H	Juez de Paz	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1360	\N	121	1	\N	\N	Denny 	Chicas	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1361	\N	121	1	\N	\N	Julio Andres	Soto	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1362	\N	121	1	\N	\N	Manuel Antonio	Carballo	H	Síndico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1364	\N	121	1	\N	\N	Josefa	de Valdez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1365	\N	121	1	\N	\N	Vilma Jeannette	Henríquez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1367	\N	121	1	\N	\N	Oswaldo	Moreno	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1369	\N	69	\N	\N	\N	Ana Cecilia 	Campos 	M	Estudiante 	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1370	\N	121	1	\N	\N	Lisseth 	de Sánchez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1416	\N	132	6	\N	\N	Vilma	Flores	M	Socia de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1366	\N	121	1	\N	\N	Oscar Lorenzo	Rodríguez	H	Primer Regidor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1368	\N	121	1	\N	\N	Alma	de López	M	Cuarta Regidora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1371	\N	121	1	\N	\N	Zorina	Masferrer	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1372	\N	121	1	\N	\N	Tito	Aparicio	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1373	\N	121	1	\N	\N	Francisco	Hirezi	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1374	\N	121	3	\N	\N	Luis 	Ramírez	H	Coordinador Regional	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1375	\N	121	3	\N	\N	Jaime	Hernández	H	Asesor Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1376	\N	121	5	\N	\N	Jorge	Pozuelo	H	Desarrollo Local	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1377	\N	121	2	\N	\N	Rommy Ivette	Jiménez	M	Asesora Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1378	\N	121	2	\N	\N	Edith	del Cid	M	Asesora Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1379	\N	121	2	\N	\N	Flora	Blandoón de Grajeda	M	Coordinadora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1382	\N	121	1	\N	\N	Ever Stanly	Cruz	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1383	\N	121	2	\N	\N	Carlos	Menjívar	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1384	\N	121	6	\N	\N	Juan Carlos	Martínez	H	Secretario Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1385	\N	128	6	\N	\N	Nelson	Estrada Hernández	H	Gerente General Alcaldia 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1386	\N	128	1	\N	\N	Julio Andrés	Soto	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1387	\N	128	6	\N	\N	Carlos Hamilton	Flores	H	Coordinador de organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1388	\N	129	6	\N	\N	Otto Eduardo	García	H	Jefe Unidad Desarrollo Local	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1389	\N	129	6	\N	\N	Carlos Hamilton	Flores	H	Coordinador de organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1390	\N	129	6	\N	\N	Nelson	Estrada Hernández	H	Gerente General Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1391	\N	130	1	\N	\N	Reina Isabel	Reyes	H	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1392	\N	130	6	\N	\N	Otto Eduardo	García	H	Jefe Unidad Desarrollo Local	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1393	\N	130	6	\N	\N	Carlos Hamilton	Flores	H	Coordinador de organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1394	\N	131	6	\N	\N	Carlos	Alfaro	H	Representante de empresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1395	\N	131	6	\N	\N	Jorge Amilcar	Solorzano	H	Representante de empresa 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1396	\N	131	6	\N	\N	Ismael 	Hernández	H	Presidente de empresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1397	\N	131	6	\N	\N	Reyes de los Santos	Orellana	M	Representante de empresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1398	\N	131	6	\N	\N	Licía Mileydi  	Díaz Ruíz	M	Representante de empresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1400	\N	131	6	\N	\N	Felipe de Jesús	Reyes	H	Representante de cooperativa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1399	\N	131	6	\N	\N	Josué Francisco	Salomón	H	Presidente de cooperativa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1401	\N	131	1	\N	\N	Zorina	Masferrer	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1402	\N	131	1	\N	\N	Alma	de López	M	Cuarta Regidora	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1403	\N	131	6	\N	\N	Carlos Hamilton	Flores	H	Coordinador de organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1404	\N	131	6	\N	\N	Jorge Luis	Nochez	H	Asociado de empresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1405	\N	131	6	\N	\N	María del Rosario	Navarrete	M	Presidenta de Turismo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1406	\N	131	6	\N	\N	Otto Eduardo 	García	H	Jefe Unidad Desarrollo Local	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1407	\N	131	6	\N	\N	Marcela	Cubías	M	Asistente UDEL	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1408	\N	131	6	\N	\N	Alisson Alexandra	Coreas	M	Representante de cooperativa 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1409	\N	131	1	\N	\N	Reina Isabel	Reyes	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1410	\N	131	6	\N	\N	Nelson 	Estrada Hernández	H	Gerente General Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1411	\N	132	6	\N	\N	José Reynaldo	Cerón Romero	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1412	\N	132	6	\N	\N	Sandra Elizabeth	Hernández	M	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1413	\N	132	6	\N	\N	Sandra Lucía	Montano	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1414	\N	132	6	\N	\N	Yessica Raquel	Abarca	M	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1417	\N	132	6	\N	\N	Alejandro 	Hernández	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1418	\N	132	6	\N	\N	Lucio	Villalta	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1419	\N	132	6	\N	\N	Milagro del Carmen	Rauda	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1420	\N	132	6	\N	\N	Celia del Carmen	Palacios	M	Secretaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1421	\N	133	6	\N	\N	Xiomara Carolina	Martínez	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1422	\N	133	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1423	\N	134	6	\N	\N	Dinora Yanet	Rodríguez	M	Directora C.E. Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1424	\N	134	2	\N	\N	Rommy 	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1425	\N	135	6	\N	\N	Ana Miriam	Velasco	M	Presidenta SERICOSTUR	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1426	\N	135	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1428	\N	136	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1427	\N	136	6	\N	\N	Marta Dina 	Ramos de Escobar	M	Miembro CCMPC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1429	\N	137	6	\N	\N	José Rodil 	Martínez	H	Habitante Cantón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1430	\N	137	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1431	\N	138	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1432	\N	138	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1433	\N	\N	\N	\N	\N	Benjamín Alejandro	García Hernández	H	Primer regidor propietario	\N	\N	2379-6431	\N	\N	21	\N	\N	\N	\N	\N	\N	\N	\N	\N
1438	\N	139	6	\N	\N	María	Marroquín	M	Lidereza Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1448	\N	139	6	\N	\N	Ana	Rosales	M	Comité de Jóvenes Ctón San Mar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1458	\N	139	6	\N	\N	José	Quinterios	H	Primer Vocal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1468	\N	139	6	\N	\N	Carlos Enrique	Rosales	H	Red Juvenil	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1478	\N	139	6	\N	\N	José Rodil	Martínez	H	Líder Cantón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1434	\N	\N	\N	\N	\N	Rósulo	Muñóz López	H	Segundo regidor suplente	\N	\N	7855-3783	\N	\N	21	\N	\N	\N	\N	\N	\N	\N	\N	\N
1439	\N	139	6	\N	\N	Deysi	Hernández	M	Lidereza Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1449	\N	139	6	\N	\N	Marta	Sánchez	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1459	\N	139	6	\N	\N	María	Aragón	M	Socia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1469	\N	139	6	\N	\N	Verónica Isabel	Sánchez	M	Directora CE El Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1479	\N	139	6	\N	\N	José Roberto	Villeda	H	Líder Ctón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1489	\N	141	6	\N	\N	Francisco José	Rodríguez	H	ADESCO Ctón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1503	10	\N	\N	\N	\N	Alex Alexander	Vásquez	H	Cantón El Calvario	26		7673-6723	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1513	\N	143	6	\N	\N	María Irma	Marroquín	M	Bombera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1522	\N	143	6	\N	\N	Carlos Osbaldo	Hernández	H	Valvulero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1530	\N	132	6	\N	\N	Jonathan	Morales	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1540	\N	143	1	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1542	\N	145	\N	\N	\N	José Elio	Hernández	H	Habitante	66	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1552	\N	145	\N	\N	\N	José Francisco	Flores	H	Líder comunal	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1435	\N	139	6	\N	\N	María 	Iraheta	M	Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1445	\N	139	6	\N	\N	Marta	Velazco	M	Lidereza Barrio El Centro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1455	\N	139	6	\N	\N	Lorena	Navarro	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1465	\N	139	6	\N	\N	Francisco José	Rodríguez	H	ADESCO Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1475	\N	139	6	\N	\N	Lucio Santos	Molina	H	Líder Cantón El Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1436	\N	139	6	\N	\N	Carmen	Vásquez	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1446	\N	139	6	\N	\N	Irma 	Benitez	M	Lidereza San Martinicito	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1456	\N	139	6	\N	\N	Paula	Navarro	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1466	\N	139	6	\N	\N	Guadalupe 	Rodríguez	M	Directora CE Monseñor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1476	\N	139	6	\N	\N	Eugenio	Hernández Pérez	H	Líder Cantón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1437	\N	139	6	\N	\N	Alex Alexander	Vásquez	H	Promotor Comunidades Solidaria	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1447	\N	139	6	\N	\N	Víctor	Rodríguez	H	Líder Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1457	\N	139	6	\N	\N	Julio Alberto	Tejada	H	Presidente ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1467	\N	139	6	\N	\N	Carlos Alberto	Alfaro	H	Director INER	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1477	\N	139	6	\N	\N	Pedro 	Muñóz Hernández	H	Líder Ctón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1486	\N	140	6	\N	\N	Rubén Antonio	Alvarez	H	Líder  Ctón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1493	\N	141	6	\N	\N	José Rodil	Martínez	H	Líder Ctón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1498	\N	142	1	\N	\N	Rósulo 	Muñóz	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1516	\N	132	6	\N	\N	Manuel	Navarro	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1525	\N	132	6	\N	\N	José	Medina	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1532	\N	143	6	\N	\N	Xiomara Carolina	Martínez	M	Secretaria Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1543	\N	\N	6	10	\N	Cecilia Beatriz	Olivar	M	Habitante	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1553	\N	145	\N	\N	\N	Raúl 	Castro Barrera	H	Tesorero ADESCO	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1440	\N	139	6	\N	\N	Mariano	González	H	Secretario ADESCO San Martín	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1450	\N	139	6	\N	\N	Lucila	Sánchez	M	Lidereza Cantón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1460	\N	139	6	\N	\N	María	Sánchez	M	Socia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1470	\N	139	6	\N	\N	Paula 	Nolasco	M	Lidereza Cantón El Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1480	\N	139	6	\N	\N	Jaime Adolfo	Orellana	H	Líder Barrio El Centro	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1441	\N	139	6	\N	\N	Verónica	Navidad Iraheta	M	Encargada Unidad de Género	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1451	\N	139	6	\N	\N	Santos	Urquilla	H	Líder Cantón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1461	\N	139	6	\N	\N	Ana 	Velasco	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1471	\N	139	6	\N	\N	Eva Marina	Abarca	M	Lidereza Cantón El Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1481	\N	139	2	\N	\N	Edith 	del Cid	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1442	\N	139	1	\N	\N	Odilio	Portillo	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1452	\N	139	6	\N	\N	Marcos 	Hernández	H	Líder Cantón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1462	\N	139	6	\N	\N	Blanca	Mendoza	M	Lidereza Cantón Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1472	\N	139	6	\N	\N	María Eva	López	M	Lidereza Cantón El Amatillo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1443	\N	139	2	\N	\N	Carlos	Menjívar	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1453	\N	139	6	\N	\N	José	García	H	Líder	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1463	\N	139	6	\N	\N	Raúl 	Castro	H	Tesorero ADESCO  	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1473	\N	139	6	\N	\N	Olivia de los Angeles	Abarca	M	Habitante	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1482	\N	139	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1444	\N	139	2	\N	\N	Flora	Blandón	M	Coordinadora proyecto PEP	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1454	\N	139	6	\N	\N	José	Vásquez	H	Tercer Vocal ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1464	\N	139	6	\N	\N	Marta Dina	Ramos de Escobar	M	Miembro de CCMPC	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1474	\N	139	6	\N	\N	Adela Elisabeth	Bolaños Granillo	M	Profesora Ctón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1483	\N	140	1	\N	\N	Mery Eleonor	Lobato	M	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1484	\N	140	6	\N	\N	Francisco José 	Rodríguez	H	miembro ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1485	\N	140	6	\N	\N	Alex Alexander	Vásquez	H	Presidente ADESCO El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1487	\N	140	6	\N	\N	José Rodil	Martínez	H	Líder Ctón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1488	\N	140	2	\N	\N	Rommy 	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1490	\N	141	1	\N	\N	Rósulo 	Muñóz	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1491	\N	141	6	\N	\N	Rubén Antonio	Alvarez	H	Líder comunitario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1492	\N	141	1	\N	\N	Mery Eleonor	Lobato	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1494	\N	141	6	\N	\N	María Angelina	Hernández	M	Síndica Asociación Mujeres	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1495	\N	141	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1496	\N	142	6	\N	\N	Rubén Antonio	Alvarez	H	Líder Ctón Veracruz	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1497	\N	142	6	\N	\N	José Rodil	Martínez	H	Líder Ctón El Calvario	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1499	\N	142	1	\N	\N	Mery Eleonor	Lobato	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1500	\N	142	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1501	10	\N	\N	\N	\N	Mery Eleonor	Lobato	M	Veracruz	40		7573-0232	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1502	10	\N	\N	\N	\N	Franscisco José	Rodríguez	H	Veracruz	63		7785-7384	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1504	10	\N	\N	\N	\N	Rubén Antonio	Alvarez	H	Ctón Veracruz	26		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1505	10	\N	\N	\N	\N	José Rodil	Martínez	H	Cantón El Calvario	48		7394-7624	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1506	10	\N	\N	\N	\N	María Angelina	Hernández	M	Barrio El Centro	49		7212-8672	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1507	10	\N	\N	\N	\N	Rósulo 	Muñóz López	H	Cantón Veracruz	55		7855-3783	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1508	\N	132	6	\N	\N	José	Gonzales	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1509	\N	143	6	\N	\N	Verónica 	Navidad Iraheta	M	Encargada Unidad de Género	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1510	\N	143	6	\N	\N	María Jesús	Palacios	M	Jefa de REF	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1511	\N	143	6	\N	\N	Ana	Sánchez	M	Tesorera 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1512	\N	143	6	\N	\N	Heriberto de Jesús	Campos	H	Barredor de calles	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1514	\N	143	6	\N	\N	Desy Dinora	Hernández	M	Bombera	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1515	\N	143	6	\N	\N	Rubén Antonio	Alvarez	H	Bombero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1517	\N	143	6	\N	\N	Rosalba Maritza	Hernández	M	Personal de apoyo alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1518	\N	132	6	\N	\N	Demétrio	Climaco	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1519	\N	143	6	\N	\N	María Dilsia	Membreño	M	Encargada  Medio ambiente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1520	\N	143	6	\N	\N	Nelson Francisco	Martínez	H	Auxiliar UACI/REF	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1521	\N	143	6	\N	\N	Graciela del Carmen	Velasco	M	Ordenanza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1523	\N	143	6	\N	\N	Juan Manuel	Rosa Orellana	H	Mensajero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1524	\N	132	6	\N	\N	Wilson	Romero	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1526	\N	\N	6	10	\N	Felix 	Cortez 	H	Habitante	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1527	\N	132	6	\N	\N	Andrés 	Rodriguéz	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1528	\N	\N	6	10	\N	Victor Manuel	Mejia 	H	Habitante	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1529	\N	\N	6	10	\N	Milton de Jesús	Portillo	H	Habitante	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1531	\N	132	6	\N	\N	José 	Colíndres	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1533	\N	\N	6	10	\N	Efrain	Alfaro	H	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1534	\N	143	6	\N	\N	Maricela Guadalupe	Escobar	M	Personal de servicio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1535	\N	143	6	\N	\N	Isabel Yamileth	Merino	M	Encargada Cuentas Corrientes	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1536	\N	143	6	\N	\N	Jaime Ernesto	Orellana	H	Instructor de Escuela	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1537	\N	143	6	\N	\N	Vicente de Jesús	Amaya	H	Mantenimiento Polideportivo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1538	\N	143	6	\N	\N	Luis Angel	Rosales	H	Mantenimiento Polideportivo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1539	\N	143	6	\N	\N	José Anibal	Escobar	H	Bombero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1541	\N	143	2	\N	\N	Rommy	Jiménez	M	Técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1544	\N	145	\N	\N	\N	Rósulo 	Muñóz	H	Concejal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1545	\N	\N	6	10	\N	Gloria Elba	Alfaro	M	Habitante	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1546	\N	145	\N	\N	\N	William	Vásquez	H	miembro ADESCO 	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1547	\N	145	\N	\N	\N	Ana María	Guerra	M	Habitante	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1548	\N	\N	6	10	\N	José Atiliano	Palacios	H	Habitante	68	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1549	\N	145	\N	\N	\N	María del Tránsito 	Tejada	M	Habitante	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1550	\N	145	\N	\N	\N	Jimena del Carmen	Tejada	M	Habitante	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1551	\N	145	\N	\N	\N	José Dolores	Quinteros	H	Miembro protección civil	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1554	\N	145	\N	\N	\N	Sonia Maritza	López	M	Lídereza	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1555	\N	145	\N	\N	\N	Mery Eleonor	Lobato	M	Concejal	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1556	\N	145	\N	\N	\N	Jaime Adolfo	Orellana	H	Líder	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1557	\N	145	\N	\N	\N	María Angelina	Hernández	M	Sindica Asociación de mujeres	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1558	\N	145	\N	\N	\N	Laura Yulissa	Hernández	M	Habitante	12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1559	\N	145	\N	\N	\N	Marta 	de la O	M	Lidereza	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1560	\N	145	\N	\N	\N	Pablo	Cruz	H	Habitante	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1561	\N	145	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1562	\N	132	6	\N	\N	Oscar 	Morales	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1563	\N	132	6	\N	\N	Rolando	Pacheco	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1564	\N	132	6	\N	\N	María	Gonzalez	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1565	\N	132	6	\N	\N	Antonio	Durán	H	Presidente	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1566	\N	132	6	\N	\N	Antonia 	Tamayo	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1567	\N	\N	6	10	\N	Marcial Antonio	Flores	H	Habitante	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1568	\N	132	6	\N	\N	Hérman	López	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1569	\N	\N	6	10	\N	Eduardo Herminio	Martinez	H	Habitante 	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1570	\N	132	1	\N	\N	Reina	Reyes	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1571	\N	\N	6	10	\N	Maria Isadora 	Cruz	M	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1572	\N	\N	6	10	\N	Ana Gabriela	Huezo	M	Habitante	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1573	\N	132	6	\N	\N	Carlos	Ortíz	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1575	\N	132	6	\N	\N	Gabriel	Dimas	H	Síndico de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1576	\N	132	6	\N	\N	Verónica	Arce	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1577	\N	\N	6	10	\N	Carlos 	Torres Acevedo	H	Habitante	74	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1578	\N	132	6	\N	\N	María	Contreras	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1579	\N	\N	6	10	\N	Maria del Carmen	Alfaro	M	Habitante	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1580	\N	\N	6	10	\N	María Telma 	Lazo	M	Habitante	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1581	\N	\N	6	10	\N	María Telma 	Lazo	M	Habitante	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1582	\N	132	6	\N	\N	Miguel 	Hernández	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1583	\N	\N	6	10	\N	Maria Magdalena	Cortez	M	Habitante	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1584	\N	132	6	\N	\N	Julia	Calderon	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1590	\N	\N	6	10	\N	Edmundo	Ayala	H	Habitante	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1599	\N	\N	6	10	\N	Olga Margarita	Escamilla	M	Alcaldía Municipal	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1604	\N	132	6	\N	\N	Francisco 	Mena	H	Líder comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1609	\N	132	1	\N	\N	Denny	Chicas	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1615	\N	147	\N	\N	\N	Elida Yaneth 	Gónzalez	M	Habitante	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1629	\N	132	2	\N	\N	Rommy	Jiménez	M	Asesora técnica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1641	\N	\N	1	10	\N	Elsy Maribel 	Acevedo de Portillo	H	Concejala	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1651	\N	148	\N	\N	\N	Rubén Antonio	Alvarez	H	Líder	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1664	\N	132	6	\N	\N	Gabriel	Coto	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1670	\N	148	\N	\N	\N	Maribel	López	M	Habitante	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1677	\N	\N	6	10	\N	Victor Manuel	Alvarado	H	Habitante	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1685	\N	132	6	\N	\N	Dora 	Jiménez	M	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1692	\N	148	\N	\N	\N	Reina Isabel	Villatoro	M	Habitante	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1709	11	\N	\N	\N	\N	Flor Alicia 	Villalta	M	Alcaldía Municipal	25	Lic. Contaduría Pública	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1718	\N	132	6	\N	\N	Marisela	Menjívar	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1722	\N	149	\N	\N	\N	José Antonio	Cruz	H	Estudiante	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1734	\N	132	6	\N	\N	María	Rivera	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1743	\N	132	6	\N	\N	Denys	Durán	M	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1750	\N	150	\N	\N	\N	Lorena 	Navarro	M	Habitante	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1585	\N	132	6	\N	\N	Gerardo	Hernández	H	2º vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1594	\N	\N	6	10	\N	Jose Roberto	Saldivar	H	MINED	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1606	\N	132	6	\N	\N	María	Morales	M	Lidereza comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1616	\N	132	6	\N	\N	José 	Alemán	H	Presidente de DESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1635	\N	132	6	\N	\N	Oscar	Cañas	H	Presidente de DESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1645	\N	132	6	\N	\N	Rosa	 Romero	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1655	\N	148	\N	\N	\N	Rafaela 	Mejía	M	Habitante	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1661	\N	148	\N	\N	\N	Deysi Dinora	Hernández	M	Lidereza	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1667	\N	148	\N	\N	\N	Antonia	López	M	Habitante	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1674	\N	\N	6	10	\N	Cluadia Guadalupe	Ferandez	M	Habitante	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1682	\N	132	6	\N	\N	Salvador	Rosalez	H	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1690	\N	\N	6	10	\N	Ana Rubidia	Portillo	M	Habitante	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1574	\N	\N	6	10	\N	María Milagro	Alfaro	M	Habitante	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1704	\N	132	6	\N	\N	Rene	rivas	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1586	\N	\N	6	10	\N	Oscar Orlando	Barahona	H	Habitante	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1607	\N	132	1	\N	\N	Julio	Soto	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1611	\N	132	6	\N	\N	Ronald	Quezada	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1620	\N	147	\N	\N	\N	Gregoria Mélida	Flores	M	Concejala	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1637	\N	\N	1	10	\N	Francisca Guadalupe	López	M	Concejala	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1647	\N	132	6	\N	\N	Veronica	Olivar	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1657	\N	132	6	\N	\N	Pablo	Ruíz	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1662	\N	\N	6	10	\N	Flor Alicia	Villalta Aguillón	M	Secretaria Municipal	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1676	\N	148	\N	\N	\N	Carlos Benjamín	Alvarez	H	Habitante	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1683	\N	\N	6	10	\N	Consuelo	Peréz	M	Habitante	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1699	\N	148	\N	\N	\N	Bernarda	Muñóz	M	Habitante	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1706	\N	132	6	\N	\N	Tránsito	Ayala	M	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1710	\N	132	6	\N	\N	Esteban	Urbina	H	2º vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1715	\N	132	6	\N	\N	Morena	Calderon	M	Tesorera de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1719	\N	132	6	\N	\N	Lucía 	Quintanilla	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1587	\N	\N	6	10	\N	María del Transito	Martínez 	M	Habitante	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1595	\N	132	6	\N	\N	Juan	Hernández	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1602	\N	132	6	\N	\N	Ramiro	Hernández	H	vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1619	\N	132	6	\N	\N	Yosselin	Osorio	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1626	\N	132	6	\N	\N	Lucía 	Corbera	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1638	\N	148	\N	\N	\N	María Consuelo	Cruz	M	Habitante	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1648	\N	148	\N	\N	\N	María Sonia	López	M	Habitante	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1688	\N	132	6	\N	\N	Gérman	Díaz	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1717	\N	132	6	\N	\N	Serena	Arias	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1588	\N	\N	6	10	\N	Francisca	Carcamo	M	Habitante	69	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1596	\N	\N	4	10	\N	Berfalia del Carmen	Murcia	M	Encargada PATI	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1608	\N	132	1	\N	\N	Alma	de López	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1613	\N	132	2	\N	\N	Carlos	Menjívar	H	Técnico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1623	\N	132	6	\N	\N	Domingo	Hernández	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1631	\N	132	6	\N	\N	Sonia	Mejía	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1640	\N	148	\N	\N	\N	Marcelina 	López	M	Habitante	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1650	\N	132	6	\N	\N	Dora	Rivas	M	Síndica	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1658	\N	148	\N	\N	\N	María Julia	Aragón	M	Habitante	44	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1665	\N	148	\N	\N	\N	Agustín	Muñóz Cruz	H	Habitante	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1671	\N	132	6	\N	\N	Yanira	Quevedo	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1678	\N	148	\N	\N	\N	José Francisco 	Rodríguez	H	Líder comunal	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1686	\N	\N	6	10	\N	Fredy Orlando	Ascencio	H	Habitante	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1693	\N	\N	6	10	\N	Misael Alberto	Barrera	H	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1698	\N	132	6	\N	\N	Miguel	Bermúdez	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1705	\N	132	6	\N	\N	Ada	Chacón	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1714	\N	132	6	\N	\N	José	Rodríguez	H	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1728	\N	149	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1748	\N	150	\N	\N	\N	María Elva	López	M	Habitante	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1758	\N	132	6	\N	\N	Otto	García	H	Jefe Unidad Desarrollo Local	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1589	\N	132	6	\N	\N	Leonardo	Cañas	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1597	\N	\N	6	10	\N	Flor Esperanza 	Villalta	M	Alcaldía Municipal	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1603	\N	132	6	\N	\N	Benjamín 	Cuchilla	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1621	\N	132	6	\N	\N	José	Morales	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1627	\N	132	6	\N	\N	Teodoro	Marín	H	Organizador Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1639	\N	132	6	\N	\N	Mirna	Ramos	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1649	\N	148	\N	\N	\N	María Dolores	Mejía	M	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1666	\N	132	6	\N	\N	María 	Sánchez	M	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1672	\N	148	\N	\N	\N	María Elena 	Mejía	M	Lídereza	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1679	\N	132	6	\N	\N	Rosa	Nolasco	M	Promotora de Género Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1687	\N	148	\N	\N	\N	Ana Liseth	Beltrán	M	Habitante	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1694	\N	132	6	\N	\N	Héctor	Abarca	H	Vocal de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1702	\N	132	6	\N	\N	Edgardo 	Coto	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1708	11	\N	\N	\N	\N	Olga Margarita	Escamilla	M	Alcaldía Municipal	26	Bachiller	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1713	\N	132	6	\N	\N	Angel	Monterrosa	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1591	\N	132	6	\N	\N	María 	de Jesús	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1600	\N	132	6	\N	\N	Eda Arelí	García	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1614	\N	147	\N	\N	\N	Delmis del Carmen	Rivas	M	Habitante	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1624	\N	132	6	\N	\N	Jorge	Solorzano	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1633	\N	132	6	\N	\N	Marta	Mejía	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1643	\N	148	\N	\N	\N	Odilio de Jesús	Portillo	H	Alcalde municipal	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1653	\N	148	\N	\N	\N	Adilia 	Navarro Hernández	M	Habitante	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1659	\N	132	6	\N	\N	Roberto	Garay	H	Síndico de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1673	\N	\N	6	10	\N	Marlene Ileana 	Cruz	M	Habitante	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1680	\N	\N	6	10	\N	Ana Mercedes	Ramos	M	Habitante	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1707	11	\N	\N	\N	\N	Maria Del Carmen	Alfaro	M	AMUDET	49		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1720	\N	132	6	\N	\N	Margott	Barrera	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1723	\N	149	\N	\N	\N	Roxana 	Abarca González	M	Habitante	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1732	\N	132	6	\N	\N	Felipe	Satos	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1737	\N	132	6	\N	\N	Rosa	 Ordoñez	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1739	\N	132	6	\N	\N	María	Cisneros	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1745	\N	132	6	\N	\N	Carlos	García Flores	H	Secretario de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1754	\N	150	\N	\N	\N	María Hilda	Deras de Cruz	M	Habitante	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1592	\N	\N	6	10	\N	José Andrés 	Caseres	H	Habitante	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1605	\N	132	6	\N	\N	Nicolás	Ventura	H	Líder comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1617	\N	147	\N	\N	\N	María Adelina	Rosales	M	Habitante	65	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1625	\N	132	6	\N	\N	María	Martínez	H	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1630	\N	132	6	\N	\N	Marta	Ruíz	M	Síndica de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1636	\N	148	\N	\N	\N	Reina Isabel	Cruz	M	Habitante	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1646	\N	148	\N	\N	\N	Rosalina	López	M	Habitante	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1656	\N	148	\N	\N	\N	María Elena	Reyes	M	Lídereza	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1660	\N	132	6	\N	\N	Ana	Cerna	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1668	\N	\N	1	10	\N	William Lorenzo	Portillo	H	Síndico Municipal	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1675	\N	132	6	\N	\N	Fátima	López	M	Asistente de Gerente Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1695	\N	\N	6	10	\N	Misael Alberto	Barrera	H	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1700	\N	\N	6	10	\N	Dora Reina	Deras	M	Habitante	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1711	11	\N	\N	\N	\N	Gorety Del Carmen	Olivar	M	Cantón Cañas	28	Bachiller	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1593	\N	132	6	\N	\N	Juan 	Pérez	H	Síndico de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1601	\N	132	6	\N	\N	Julio	Palacios	H	Organizador municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1610	\N	132	6	\N	\N	Ulises 	Martínez	H	Comunicaciones Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1618	\N	147	\N	\N	\N	Dinora	Santiago R	M	Habitante	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1634	\N	148	\N	\N	\N	María Yolanda	Rodríguez	M	Habitantes 	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1644	\N	\N	6	10	\N	Julio Cesar	Barrera Arevalo	H	Concejal	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1654	\N	132	6	\N	\N	Nora	Rivas	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1598	\N	132	6	\N	\N	Santos Elida	Morales	M	Socia de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1612	\N	147	\N	\N	\N	Santos Isabel	Rivas	M	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1622	\N	147	\N	\N	\N	Rommy	Jiménez	M	FUNDE	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1628	\N	132	6	\N	\N	Luis	Ortíz	H	Líder comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1632	\N	148	\N	\N	\N	Rosa Erlinda	Rodríguez	M	Habitante	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1642	\N	132	6	\N	\N	Lisandra	de la O	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1652	\N	132	6	\N	\N	Luis	Soto	H	Organizador Alcaldia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1663	\N	148	\N	\N	\N	Josefina	Mejía H	M	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1669	\N	132	6	\N	\N	Manuel	Velázquez	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1681	\N	148	\N	\N	\N	Rósulo 	Muñóz	H	Líder comunal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1684	\N	148	\N	\N	\N	Mery Eleonor	Lobato	M	Lidereza	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1689	\N	148	\N	\N	\N	Lucila del Carmen	Sánchez	M	Habitante	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1691	\N	132	6	\N	\N	Julio	Munguía	H	Organizador Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1696	\N	148	\N	\N	\N	Ana Candelaria	Guevara	M	Habitante	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1697	\N	148	\N	\N	\N	María Irma	Marroquin	M	Habitante	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1701	\N	148	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1703	\N	\N	6	10	\N	Zoila Guadalupe	Carcamo	M	Habitante	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1712	\N	132	6	\N	\N	Juan	Monterrosa	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1716	\N	132	6	\N	\N	Atiliana	de la O	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1721	\N	132	6	\N	\N	Milton	Roque	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1724	\N	149	\N	\N	\N	María Angelina	Hernández	M	Sindica Asociación de mujeres	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1725	\N	149	\N	\N	\N	Florentina	Guzmán	M	Habitante	69	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1726	\N	149	\N	\N	\N	Rosa Angélica	Rosales	M	Habitante	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1727	\N	149	\N	\N	\N	Laura Sofía	Rosales	M	Habitante	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1729	\N	149	\N	\N	\N	Edith	del Cid	M	Técnica	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1730	\N	132	6	\N	\N	Lindor	Arévalo	H	Organizador Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1731	\N	132	6	\N	\N	Mirna	Fenández	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1733	\N	132	6	\N	\N	Angela	Rivera	M	Lidereza	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1735	\N	132	6	\N	\N	Ricardo	Alfonso	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1736	\N	132	6	\N	\N	Ana	Alfaro	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1738	\N	132	6	\N	\N	Francisca	de Morales	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1740	\N	150	\N	\N	\N	María Catalina	Deras	M	Habitante	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1741	\N	132	6	\N	\N	Luis	Duran	H	Lider comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1742	\N	150	\N	\N	\N	Paula 	Villanueva Nolasco	M	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1744	\N	150	\N	\N	\N	Juana María	Flores de Méndez	M	Habitante	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1746	\N	150	\N	\N	\N	María Roxana	Ramírez	M	Habitante	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1747	\N	132	6	\N	\N	Francisco 	Gonzalez	M	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1749	\N	132	6	\N	\N	Carlos Hamilto	Flores	H	Coordinador de Organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1751	\N	150	\N	\N	\N	Anabel 	Navarro Peña	M	Concejala	44	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1752	\N	132	6	\N	\N	Miguel	 Alemán	M	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1753	\N	150	\N	\N	\N	María Blanca	Sánchez	M	Habitante	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1755	\N	132	6	\N	\N	Reina	Ceron	M	Organizadora Alcaldia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1756	\N	150	\N	\N	\N	Rosa Hilda 	Platero	M	Promotora de salud	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1757	\N	150	\N	\N	\N	José Domingo	Barrera	H	Habitante	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1759	\N	150	\N	\N	\N	José Elio 	Orellana	H	Habitante	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1760	\N	132	6	\N	\N	Karla	Flores	M	Asistente UDEL Alcadia	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1761	\N	150	\N	\N	\N	Antonio	Galeas	H	Colaborador	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1762	\N	132	6	\N	\N	Guadalupe	Erazo	H	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1763	\N	150	\N	\N	\N	Sergio Dagoberto	Delgado	H	Habitante	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1764	\N	150	\N	\N	\N	Adilia del Carmen	Reyes	M	Habitante	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1765	\N	132	6	\N	\N	Yeny 	Cruz	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1766	\N	150	\N	\N	\N	Ana Adela 	Deras	M	Habitante	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1767	\N	132	6	\N	\N	aría	Bolaños	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1768	\N	150	\N	\N	\N	Isabel 	Sánchez	M	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1769	\N	132	6	\N	\N	Angela 	Barrera	M	Organizadora Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1770	\N	150	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1771	\N	132	6	\N	\N	Blanca 	Chicas	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1772	\N	132	6	\N	\N	Gregorio	Alvarado	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1773	\N	132	6	\N	\N	Karla 	Orellana	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1774	\N	132	6	\N	\N	Dean	Funes	H	Empleado Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1775	\N	132	6	\N	\N	Sulma	Henríquez	M	Promotora Unidad de Salud	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1776	\N	132	1	\N	\N	Zorina	Masferrer	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1777	\N	132	6	\N	\N	María	Martínez	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1778	\N	132	6	\N	\N	Carlos	Gómez	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1779	\N	132	6	\N	\N	María 	de la O	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1780	6	\N	\N	\N	\N	Alba	Bonilla de Lopez	M	Alcaldía Municipal 	30		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1781	\N	132	6	\N	\N	Pedro 	López	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1782	\N	151	\N	\N	\N	María Dilsia	Membreño	M	Encargada Medio Ambiente	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1783	\N	132	6	\N	\N	Graciela 	Bonilla	M	Síndica de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1784	6	\N	\N	\N	\N	Elmer Enrique 	Reyes	H	Jefe Unidad de Medio Ambiente	25		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1785	6	\N	\N	\N	\N	Ever Omar	Alvarez	H	Alcaldía Municipal	34		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1786	7	\N	\N	\N	\N	Francisco 	Merino 	H	Nueva Granada, Usulutan 	59		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1787	7	\N	\N	\N	\N	Cristian 	Amaya	H	Alcaldía Municipal 	27		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1788	7	\N	\N	\N	\N	Napoleón 	Murillo 	H	Usulután 	53		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
884	7	\N	\N	\N	\N	Elmer Ulises 	Rodrìguez	H	Usulután 	50		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1789	\N	71	\N	\N	\N	Maria Esperanza 	Urrutia 	M	Secretaria ADESCO	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1792	\N	152	\N	\N	\N	Salvador 	Romero Navarrete	H	Concejal 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1793	\N	152	\N	\N	\N	Salvador	Portillo López	H	A.D.C.J , Primer Bocal 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1794	\N	152	\N	\N	\N	David Yurandir	 Gutierrez	H	Técnico 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1795	\N	152	\N	\N	\N	Oscar Benjamín 	Píneda	H	Consultor 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1791	\N	71	\N	\N	\N	Oscar Benjamín 	Píneda 	H	Consultor CODEIN 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1790	\N	71	\N	\N	\N	David Yurandir 	Gutierrez	H	Técnico CODEIN	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1798	\N	154	\N	\N	\N	Ana María 	Alfaro 	M	Facilitadora	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1799	\N	154	\N	\N	\N	David Yurandir 	Gutierrez 	H	Técnico 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1800	\N	154	\N	\N	\N	Cristian Omar	Amaya	H	Secretario 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1801	\N	153	\N	\N	\N	Nestor Rigoberto 	Vasquez	H	Técnico , Protección Civil 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1802	\N	153	\N	\N	\N	Leonardo José 	Parada	H	Insp. Tec	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1803	\N	153	\N	\N	\N	Ana María 	Alfaro	M	Facilitadora	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1804	\N	155	\N	\N	\N	Leonardo José	Parada	H	Ins, Tec	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1805	\N	155	\N	\N	\N	Stanley 	Rodríguez	H	Técnico 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1806	\N	156	\N	\N	\N	Cristian 	Amaya 	H	Secretario 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1807	\N	156	\N	\N	\N	Osiris 	Cruz 	H	Secretario, despacho 	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1818	\N	151	\N	\N	\N	José Anibal	Escobar	H	Bombero	66	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1827	\N	132	6	\N	\N	José	Villalta	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1835	\N	132	6	\N	\N	Balmore	Castro	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1808	\N	156	\N	\N	\N	David 	Rendón	H	Alcalde	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1819	\N	151	\N	\N	\N	José Domingo	Argueta	H	Valvulero	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1828	\N	151	\N	\N	\N	Verónica 	Navidad Iraheta	M	Encargada Unidad de Género	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1830	\N	151	\N	\N	\N	Rosalba Maritza	Hernández	M	Apoyo a personal	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1809	\N	156	\N	\N	\N	Ana María 	Alfaro 	M	Facilitadora	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1821	\N	151	\N	\N	\N	Eduardo de Jesús	Cruz Chávez	H	Valvulero	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1810	\N	156	\N	\N	\N	Doris 	Acosta	M	Técnico	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1820	\N	151	\N	\N	\N	Carlos Osbaldo	Hernández	H	Valvulero	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1829	\N	132	6	\N	\N	Nery Guadalupe	Martínez	M	Presidenta de ADESCO 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1811	\N	157	\N	\N	\N	Iván 	Callejas	H	Técnico 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1822	\N	151	\N	\N	\N	Rubén Antonio	Alvarez	H	Bombero	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1846	\N	132	6	\N	\N	Guadalupe	Escoto	M	Síndica de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1859	\N	159	\N	\N	\N	Anabel 	Navarro Peña	M	Concejala	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1872	\N	160	6	\N	\N	Guadalupe	Torres	M	Secretaria Gasolinera UNO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1881	\N	161	\N	\N	\N	Ismael	Flores	H	Habitante	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1885	\N	161	\N	\N	\N	María Rosa	Hernández	M	Habitante	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1893	\N	161	\N	\N	\N	María Miriam	Rosa	M	Habitante	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1901	\N	160	6	\N	\N	Ana 	Pérez	M	Promotora MINED	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1905	\N	163	\N	\N	\N	María Lidia 	González	M	Habitante	63	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1912	\N	160	6	\N	\N	Francisco 	Rivera	H	Presbítero de CATEDRAL	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1812	\N	157	\N	\N	\N	Eunice Nohemy	Parada Martínez	M	Técnica de ALBA becas	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1815	\N	132	6	\N	\N	Ana 	Berrios	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1823	\N	151	\N	\N	\N	María Irma	Marroquín	M	Bombera, Valvulera	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1813	\N	151	\N	\N	\N	Nelson Francisco	Martínez	H	Auxiliar UACI/REF	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1814	\N	132	6	\N	\N	Alexander	Rodriguez	H	Síndico de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1824	\N	132	6	\N	\N	Karina	 Argueta	M	Secretaria de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1842	\N	132	6	\N	\N	Yesenia	Moreno	M	Lidereza comunal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1864	\N	159	\N	\N	\N	Benjamín  A	García	H	Concejal	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1870	\N	160	6	\N	\N	Luis	Cerna	H	Jefe Gasolinera UNO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1879	\N	161	\N	\N	\N	José Alvaro	Rosa Mejía	H	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1892	\N	160	6	\N	\N	Carlos Hamilton	Flores	H	Coordinador de Organizadores	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1816	\N	132	6	\N	\N	Francisco	Pacas	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1825	\N	151	\N	\N	\N	Deysi Dinora	Hernández	M	Valvulera	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1817	\N	132	6	\N	\N	María Magdalena	Flores	M	Vicepresidenta de DESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1826	\N	151	\N	\N	\N	Vicente Adolfo	Rosales	H	Contador	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1831	\N	151	\N	\N	\N	Elio Esaú	Méndez Velasco	H	UACI	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1832	\N	151	\N	\N	\N	Xiomara Carolina	Martínez	M	Secretaria Municipal	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1833	\N	132	6	\N	\N	Antonio	Aguilar	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1834	\N	132	6	\N	\N	Luis 	Orellana	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1836	\N	132	6	\N	\N	Roberto	Rosales	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1837	\N	132	6	\N	\N	Santos	Amaya	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1838	\N	132	6	\N	\N	Mario	dubón	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1839	\N	158	\N	\N	\N	Ana Leticia	Tejada	M	Vendedora mercado	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1840	\N	132	6	\N	\N	Ivania	Samayoa	M	Comunicaciones Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1843	\N	158	\N	\N	\N	Roxana 	López M	M	Negociante mercado	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1844	\N	158	\N	\N	\N	María Dolores	Mejía	M	Dueña de tienda Ctón Veracruz	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1845	\N	132	6	\N	\N	Tomas	Martínez	H	Vicepresidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1841	\N	158	\N	\N	\N	Marta Hortensia	Navarrete	M	Dueña de tienda Ctón El Calvar	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1847	\N	158	\N	\N	\N	Juana	Calles	M	Dueña de tienda B° El Centro	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1848	\N	132	6	\N	\N	Victoria	Villalta	M	Vicepresidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1849	\N	132	6	\N	\N	Blanca 	Henríquez	M	Presidenta de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1851	\N	132	6	\N	\N	José	Hernández	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1852	\N	158	\N	\N	\N	Herminio	García	H	Dueño de Tienda Ctón Veracruz	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1853	\N	132	6	\N	\N	Rodolfo	Burgos	H	Organizador Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1854	\N	158	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1855	\N	132	6	\N	\N	Felipe	Reyes	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1856	\N	132	6	\N	\N	Manuel de Jesus	M.N	H	Tesorero de Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1857	\N	159	\N	\N	\N	Gregoria Mélida	Flores	M	Concejala	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1858	\N	132	6	\N	\N	Juan	García	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1860	\N	132	6	\N	\N	David	Rivas	H	Presidente de ADESCO	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1861	\N	159	\N	\N	\N	Mery Eleonor	Lobato Cruz	M	Concejala	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1862	\N	159	\N	\N	\N	Víctor Manuel 	López Argueta	H	Concejal	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1863	\N	159	\N	\N	\N	Rósulo	Muñóz	H	Concejal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1865	\N	159	\N	\N	\N	Julio César	Peña	H	Síndico	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1866	\N	159	\N	\N	\N	Odilio de Jesús	Portillo	H	Alcalde	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1867	\N	159	\N	\N	\N	Xiomara Carolina	Martínez	M	Secretaria Municipal	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1868	\N	159	\N	\N	\N	Rommy 	JIménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1869	\N	161	\N	\N	\N	Lorena del Carmen	Flores	M	Lídereza	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1871	\N	161	\N	\N	\N	María Lilian	Flores	M	Habitante	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1873	\N	161	\N	\N	\N	María Arely	Flores	M	Habitante	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1874	\N	161	\N	\N	\N	Sandra Elisabeth	Flores	M	Habitante	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1875	\N	161	\N	\N	\N	José	 García	H	Habitante	73	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1877	\N	161	\N	\N	\N	Emilio 	Sánchez Flores	H	Líder comunal	74	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1876	\N	160	6	\N	\N	Victor	Arevalo	H	Cnel. Destacamento Militar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1878	\N	161	\N	\N	\N	Fidel	Orellana	H	Habitante	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1880	\N	160	6	\N	\N	Andrés	Mercado	H	Vice Gobernador	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1882	\N	161	\N	\N	\N	Rubenia	Escobar	M	Habitante	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1883	\N	161	\N	\N	\N	José Alonso	García	H	Líder comunal	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1884	\N	161	\N	\N	\N	Rosa Idalia	Navidad	M	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1886	\N	161	\N	\N	\N	Dionisio	Flores	H	Líder comunal	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1887	\N	160	6	\N	\N	Rubén	Gálvez	H	Aux. Banco ProCredit	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1888	\N	161	\N	\N	\N	Jesús	Flores	H	Habitante	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1889	\N	161	\N	\N	\N	Efraín 	Flores	H	Habitante	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1890	\N	160	6	\N	\N	María Eugenia 	de Hernández	M	Nutricionista SIBASI	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1891	\N	161	\N	\N	\N	Dionisio	Flores	H	Habitante	62	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1894	\N	160	6	\N	\N	Mercedes	Henríquez	M	Representante MELIDAS	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1895	\N	161	\N	\N	\N	Juan Pablo	Navidad	H	Habitante	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1896	\N	161	\N	\N	\N	María Josefa	Rosa	M	Habitante	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1897	\N	161	\N	\N	\N	Maura 	Navidad	M	Habitante	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1898	\N	160	6	\N	\N	Mercedes Haydeé	Cortez	M	Asistente MINED	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1899	\N	160	6	\N	\N	Noel	Cerón	H	Tesorero Coopertiva Mercado	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1900	\N	161	\N	\N	\N	Rommy 	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1902	\N	160	6	\N	\N	Maritza	Ortiz	M	Promotora MINED	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1903	\N	160	6	\N	\N	Karla	Guadrón	M	Promotora MINED	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1904	\N	160	6	\N	\N	José	 Barrera	H	Ejecutivo Salazar Romero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1906	\N	160	6	\N	\N	Jenniffer	Mundo	M	Ejecutiva Salazar Romero	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1907	\N	163	\N	\N	\N	María Gladis	Beltrán	M	Habitante	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1908	\N	160	6	\N	\N	Ada	Echegoyén	M	Propietaria de comercio	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1909	\N	163	\N	\N	\N	María Candelaria	Sánchez	M	Habitante	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1910	\N	163	\N	\N	\N	Angelina	López	M	Habitante	66	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1911	\N	163	\N	\N	\N	Delmis del Carmen	Rivas	M	Habitante	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1913	\N	163	\N	\N	\N	Santos Isabel	Rivas	M	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1914	\N	163	\N	\N	\N	María Elena	Morales	M	Habitante	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1915	\N	160	1	\N	\N	Oswaldo 	Moreno	H	Primer Regidor	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1916	\N	163	\N	\N	\N	Marta Alicia	Hernández	M	Habitante	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1918	\N	163	\N	\N	\N	María Eugenia	Orellana	M	Habitante	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1919	\N	163	\N	\N	\N	María Felicita	Orellana	M	Habitante	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1917	\N	160	6	\N	\N	FederÍco	BermÚdez	H	Jefe Regional CONAMYPE	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1920	\N	163	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1921	\N	160	6	\N	\N	Raúl	Pineda	H	Director Hospital Sta. Teresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1922	\N	160	6	\N	\N	Carlos	Martínez	H	Médico Hospital SantaTeresa	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1923	\N	160	6	\N	\N	Tomás	Zepeda	H	Supervisor Farmacia 	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1924	\N	160	6	\N	\N	Mauricio	Aparicio	H	Jefe de Unidad Alcaldía	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1925	\N	160	6	\N	\N	Juan Carlos	Martínez	H	Secretario Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1926	\N	160	1	\N	\N	Manuel	Carballo	H	Sindico	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1927	\N	160	1	\N	\N	Josefa	de Valdez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1928	\N	160	1	\N	\N	Raquel 	Sarmiento	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1929	\N	160	1	\N	\N	Zorina	Masferrer	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1930	\N	160	1	\N	\N	Julio	Soto	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1931	\N	160	1	\N	\N	Oscar	Moreno	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1932	\N	160	1	\N	\N	Lisseth 	de Sánchez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1933	\N	160	1	\N	\N	Alma	de López	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1934	\N	160	1	\N	\N	Ever	Henríquez	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1935	\N	160	1	\N	\N	Tito	Aparcio	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1936	\N	160	1	\N	\N	Vilma	Henríquez	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1937	\N	160	1	\N	\N	Francisco	Hirezi	H	Alcalde	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1938	\N	160	1	\N	\N	Reina	Reyes	M	Concejala	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1948	\N	\N	\N	\N	\N	Ever	Cruz	H	Concejal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1958	\N	164	\N	\N	\N	Santos Isabel	Rivas	M	Socia	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1967	\N	164	\N	\N	\N	María Eugenia	Orellana	M	Socia	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1971	\N	\N	6	11	\N	Anastacio	Rivas	H	Segundo Vocal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1939	\N	160	6	\N	\N	Luis	Hernández	H	Asesor Ministerio Trabajo	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1940	\N	160	6	\N	\N	Teresa	Torres	M	Despacho Municipal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1944	\N	\N	\N	\N	\N	Manuel 	Carballo	H	Síndico	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1963	\N	164	\N	\N	\N	Roxana Yaneth	Hidalgo	M	Socia	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1941	\N	160	1	\N	\N	Denny	Chicas	H	Concejal	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1942	\N	\N	\N	\N	\N	Denny	Chicas	H	Concejal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1952	\N	\N	\N	\N	\N	Zorina	Masferrer	M	Concejala	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1960	\N	164	\N	\N	\N	Corina	Pérez	M	Socia	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1974	\N	164	\N	\N	\N	María Angelina 	Hernández	M	Socia	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1946	\N	\N	\N	\N	\N	Josefa	de Valdez	M	Concejala	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1947	\N	\N	\N	\N	\N	Vilma 	Henríquez	M	Concejala 	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1955	\N	\N	\N	\N	\N	Francisco	Hirezi	H	Alcalde	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1956	\N	\N	\N	\N	\N	Juan Carlos	Martínez	H	Secretario Municipal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1964	\N	\N	6	11	\N	Reynaldo	Cerón	H	Presidente de ADESCO	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1950	\N	\N	\N	\N	\N	Alma	de López	M	Cuarta Regidora	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1949	\N	\N	\N	\N	\N	Oswaldo	Moreno	H	Primer Regidor	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1957	\N	164	\N	\N	\N	Delmis del Carmen	Rivas	M	Tesorera Asociación de mujeres	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1965	\N	164	\N	\N	\N	Ana Miriam 	Velasco	M	Socia	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1966	\N	164	\N	\N	\N	María Lidia	Velasco	M	Socia	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1970	\N	\N	6	11	\N	Rogelio	Barrera	H	Presidente de ADESCO	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1951	\N	\N	\N	\N	\N	Lisseth	de Sánchez	M	Concejala	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1961	\N	164	\N	\N	\N	María Luz	Hernández	M	Socia	44	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1969	\N	164	\N	\N	\N	Dora Leticia	Muñóz	M	Socia	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1973	\N	\N	6	11	\N	María	Contreras	M	Presidenta de ADESCO	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1953	\N	\N	\N	\N	\N	Tito	Aparicio	H	Concejal	\N	\N	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N
1959	\N	164	\N	\N	\N	Elida Yaneth	González	M	Socia	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1968	\N	\N	6	11	\N	Carlos	Ortíz	H	Presidente de ADESCO	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1972	\N	\N	6	11	\N	Herman	López	H	Presidente de ADESCO	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1962	\N	164	\N	\N	\N	María Antonia	Pérez	M	Socia	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1975	\N	164	\N	\N	\N	María Evelyn	López	M	Socia	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1977	\N	164	\N	\N	\N	María Angela 	Tejada	M	Socia	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1976	\N	164	\N	\N	\N	María Isabel	López	M	Socia	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1978	\N	164	\N	\N	\N	Ana Isabel 	Pérez García	M	Socia	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1979	\N	164	\N	\N	\N	Edith	del Cid	M	Técnica	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1980	\N	\N	6	11	\N	Antonio	Durán	H	Presidente de ADESCO	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2047	\N	\N	\N	\N	\N	Edgar 	Rodríguez Hernández	H	C. Guanacastal 	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
1982	\N	\N	6	11	\N	Francisca	Molina	M	Presidenta de ADESCO	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1981	\N	\N	6	11	\N	Francisco	Montes	H	Presidente de ADESCO	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1983	\N	\N	6	11	\N	Gabriel	Dimas	H	Síndico de ADESCO	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1984	\N	\N	6	11	\N	José	Saravia	H	Presidente de ADESCO	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1985	\N	\N	6	11	\N	Blanca 	Henríquez	M	Presidenta de ADESCO	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1986	\N	\N	6	11	\N	Santos Marcial	Amaya	H	Presidente de  ADESCO	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1987	\N	\N	6	11	\N	Vidal 	Orellana	H	Vicepresidente de ADESCO	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1988	\N	\N	6	11	\N	Francisca	Arévalo	M	Secretaria de ADESCO	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1989	\N	\N	6	11	\N	Gilberto	Guitierrez	H	Presidente de ADESCO	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1990	\N	\N	6	11	\N	José 	Hernández	H	Presidente de ADESCO	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1991	\N	\N	6	11	\N	Guadalupe 	Coto	M	Síndica de ADESCO	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1992	\N	\N	6	11	\N	Luis 	Soto	H	Organizador Alcaldía	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1993	\N	\N	6	11	\N	Marcela	Cubías	M	Asistente UDEL Alcaldía	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1994	\N	\N	6	11	\N	Ernesto	Martínez	H	Presidente de ADESCO	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
1995	\N	\N	6	11	\N	Joaquín 	Ortíz	H	Empleado Alcaldía	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1996	\N	\N	6	11	\N	Salvador	Saravia	H	Empleado Alcaldía	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1997	\N	\N	6	11	\N	Ulises	Hernández	H	Comunicaciones Alcaldía	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1998	\N	\N	6	11	\N	Juan Carlos	Martínez	H	Secretario Municipal	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
1999	\N	\N	6	11	\N	Santos	Guzmán	H	Pro Secretario ADESCO	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2000	\N	\N	6	11	\N	Tito	Cruz	H	Presidente ADESCO	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2001	\N	\N	6	11	\N	Sonia	Mejía	M	Presidenta ADESCO	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2002	\N	\N	6	11	\N	María 	Rivera	M	Vice Presidenta ADESCO	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2003	\N	\N	6	11	\N	Ricardo	Alfonso	H	Lider comunal	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2004	\N	\N	6	11	\N	Cesar	Iraheta	H	Lider comunal	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2005	\N	\N	6	11	\N	José 	Domínguez	H	Lider comunal	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2006	\N	\N	6	11	\N	Juan Carlos	Lemus	H	Lider comunal	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2007	\N	\N	6	11	\N	José	Olivar	H	Lider comunal	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2008	\N	\N	6	11	\N	Luis	Doño	H	Lider comunal	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2009	\N	\N	6	11	\N	Carlos	Rodríguez	H	Lider comunal	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2010	\N	\N	6	11	\N	Marcelino	Peña	H	Lider comunal	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2011	\N	\N	6	11	\N	Carlos 	Hernández	H	Lider comunal	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2012	\N	\N	6	11	\N	Marlon	Beltran	H	Lider comunal	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2013	\N	\N	6	11	\N	Luis	Monterrosa	H	Lider comunal	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2014	\N	\N	6	11	\N	Berta 	Merino	H	Secretaria ADESCO	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2015	\N	\N	6	11	\N	Santos	Martínez	H	Tesoreo ADESCO	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2016	\N	\N	6	11	\N	Ana	García	M	Primer Vocal	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2017	\N	\N	6	11	\N	Lorenzo	Rodríguez	H	Presidente ADESCO	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2018	\N	\N	6	11	\N	María	Martínez	M	Preisdenta ADESCO	71	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2019	\N	\N	6	11	\N	Lucio	Villalta	H	Presidente ADESCO	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2020	\N	\N	6	11	\N	Mauricio	Chacón	H	Cuarto Vocal	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2021	\N	\N	6	11	\N	Mirna	Ramos	M	Presidenta ADESCO	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2022	\N	\N	6	11	\N	Milagro	Rauda	M	Presidenta ADESCO	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2023	\N	\N	6	11	\N	Rosa	Nolasco	M	Promotora de Genero Alcaldía	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2024	8	\N	\N	\N	\N	Kayra marilin 	Romero	M	Alcaldia Municipal 	23		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2025	8	\N	\N	\N	\N	Lucy Idalia	Rodríguez Zelaya 	M	A. Urbana	42		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2026	\N	\N	6	11	\N	María	Angelina	M	Vicepresidenta ADESCO	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2027	8	\N	\N	\N	\N	Elsy Raquel 	Reyes	M	Z Urbana	38		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2048	\N	\N	\N	\N	\N	Manuel de Jesús 	Hernández\t	H	C. Guanacastal 	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2029	\N	\N	6	11	\N	Jessica	Molina	M	Lidereza comunal	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2030	\N	75	\N	\N	\N	Kayra Marilin 	Romero	M	Unidad de Participación Ciudad	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2028	\N	75	\N	\N	\N	Medardo Antonio 	Píneda	H	Unidad Ambiental 	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2031	\N	75	\N	\N	\N	Lucy Idalia 	Rodriguez	M	Concejal	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2032	\N	75	\N	\N	\N	Stanley	Rodriguez	H	Consultor	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2033	\N	166	\N	\N	\N	Humberto Alexander 	CENDEPESCA	H	Técnico 	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2034	\N	166	\N	\N	\N	Nora 	de Areas 	M	Secretaria	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2035	\N	166	\N	\N	\N	Yeni 	Velásquez 	M	CDA Secretaria	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2036	\N	166	\N	\N	\N	Griselda 	 Rodríguez	M	Secretaria de Gobernación 	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2037	\N	166	\N	\N	\N	Julia	Fuentes Carrión 	M	ASIGOLFO Secretaria	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2038	\N	166	\N	\N	\N	Beatriz	Rodríguez 	M	Secretaria SIBASI, La Unión 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2044	\N	\N	\N	\N	\N	Leonardo	 Grande	H	C. Conchaguita 	65	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2045	\N	\N	\N	\N	\N	Carmen 	Díaz	M	C. Conchaguita	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2046	\N	\N	\N	\N	\N	Samir	Medrano	H	C. Conchaguita 	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2049	\N	\N	\N	\N	\N	José Santos	Romero Hernández\t\t	H	La Periquera	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2050	\N	\N	\N	\N	\N	Claudia Yesenia	 Romero\t	M	Caserío La Periquera 	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2051	\N	\N	\N	\N	\N	Yuri Mirla \t\t\t	Osorio	M	Zona Urbana	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	C	\N	\N	\N
2052	\N	\N	\N	\N	\N	Alex  Ademir   	Avilés	H	Medio ambiente 	37	\N	\N	\N	\N	\N	\N	\N	\N	\N	8	S	\N	\N	\N
2053	\N	\N	6	11	\N	Pedro 	López	H	Presidente ADESCO	76	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2054	\N	\N	6	11	\N	Yenny 	Villalta	M	Presidente ADESCO	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2055	\N	\N	6	11	\N	Francisco	Pacas	H	Presidente ADESCO	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2056	\N	\N	6	11	\N	Ana	Berrios	M	Presidenta ADESCO	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2057	\N	\N	6	11	\N	Gregoria	Alvarado	M	Presidenta ADESCO	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2058	\N	\N	6	11	\N	José	Nolasco	H	Presidente ADESCO	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2059	\N	\N	\N	\N	\N	José Francisco	Flores	H	Barrio El Centro	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2060	\N	\N	\N	\N	\N	Roxana 	López Muñóz	M	Mercado Municipal	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	S	\N	\N	\N
2069	\N	\N	\N	\N	\N	María Dora 	Membreño	M	Cantón San Martín	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2073	\N	\N	\N	\N	\N	José Pilar	Zúñiga	H	Cantón San Martín	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2080	\N	\N	\N	\N	\N	Rósulo 	Muñóz	H	Concejal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	I	\N	\N	\N
2089	\N	167	\N	\N	\N	José Dolores del Carmen	Quinteros	H	Miembro Asociación de Agricult	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2097	\N	167	\N	\N	\N	María Telvina 	Hernández	M	Agricultora	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2105	\N	167	\N	\N	\N	José William	Vásquez	H	Miembro Asoc. Agricultores	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2114	\N	167	\N	\N	\N	Pablo	Cruz Cruz	H	Agricultor/ADESCO Centro	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2128	\N	167	\N	\N	\N	Rommy	JIménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2061	\N	\N	\N	\N	\N	María del Tránsito	 Tejada	M	Barrio El Centro	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2062	\N	\N	\N	\N	\N	Antonio 	Galeas	H	Cantón El Amatillo	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2066	\N	\N	6	11	\N	Carlos	García	H	Secretario ADESCO	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2070	\N	\N	\N	\N	\N	María Lidia	García Vda. de Platero	M	Cantón San Martín	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2074	\N	\N	\N	\N	\N	Emerlinda	Flores	M	Cantón San Martín	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2075	\N	\N	\N	\N	\N	Mariano	González	H	Cantón San Martín	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2081	\N	\N	6	11	\N	José	Martínez	H	Lider comunal	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2082	\N	\N	6	11	\N	Manuel	Menjívar	H	Lider	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2063	\N	\N	\N	\N	\N	Carlos Leonel Tereth	Hernández	H	El Amatillo	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2067	\N	\N	6	11	\N	Marvin	Hércules	H	Lider comunal	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2078	\N	\N	\N	\N	\N	Marta Alicia	Hernández	M	Cantón El Calvario	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2086	\N	\N	6	11	\N	Armando	Mejía	H	Lider	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2064	\N	\N	\N	\N	\N	Osmín Heriberto	Hernández H	H	Cantón El Amatillo	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2076	\N	\N	\N	\N	\N	María Elena	Reyes Cáceres	M	Cantón Veracruz	59	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2084	\N	\N	6	11	\N	Manuel	Isaías	H	Lider	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2088	\N	\N	6	11	\N	Teofilo	Monjoras	H	Presidente 	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2065	\N	\N	6	11	\N	Blanca	Chicas	M	Presidente ADESCO	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2071	\N	\N	\N	\N	\N	Sonia	García	M	Cantón San Martín	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2077	\N	\N	\N	\N	\N	Francisco	Rodríguez	H	Cantón Veracruz	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2068	\N	\N	\N	\N	\N	Walter Javier	Hernández	H	Cantón El Amatillo	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2083	\N	\N	6	11	\N	Ana	Quintanilla	M	Lidereza	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2072	\N	\N	6	11	\N	Juan	Peña	H	Lider comunal	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2079	\N	\N	\N	\N	\N	Rosa 	Idalia	M	Cantón Veracruz	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	10	C	\N	\N	\N
2085	\N	\N	6	11	\N	Victor	Domínguez	H	Lider	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2087	\N	\N	6	11	\N	Marcos	Gálvez	H	Lider	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2090	\N	167	\N	\N	\N	Julio Alberto	Tejada	H	Miembro Asoc. Agricultores	51	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2091	\N	167	\N	\N	\N	José Elio	Hernández	H	Miembro Asoc. Agricultores	66	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2092	\N	169	\N	\N	\N	Kayra Marilin 	Romero	M	UPC	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2093	\N	\N	6	11	\N	Efraín 	Gonzalez	H	Primer Vocal	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2094	\N	167	\N	\N	\N	Maritza Bettis	Cruz de Díaz	M	Miembro Asoc. Agricultores	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2095	\N	167	\N	\N	\N	José Mercedes	Tejada	H	Vocal Asociación Agricultores	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2096	\N	\N	6	11	\N	René	Rivas	H	Presidente	41	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2098	\N	\N	6	11	\N	Nicolás	Moz	H	2º Vocal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2099	\N	165	\N	\N	\N	Kaira Marilin	Romero	M	UPC	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2100	\N	167	\N	\N	\N	Juan Francisco	Escobar	H	Vicepresidente Asoc. Agricult	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2101	\N	\N	6	11	\N	Mario	Morales	H	Presidente	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2102	\N	167	\N	\N	\N	Raúl 	Castro Barrera	H	Miembro Asoc. Agricultores	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2103	\N	\N	6	11	\N	Juan	Coto	H	Presidente	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2104	\N	165	\N	\N	\N	Marta Lidia	Flores 	M	Secretaria Municipal	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2106	\N	\N	6	11	\N	Josefa	Coto	M	Lidereza	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2107	\N	165	\N	\N	\N	Julio Ernesto 	de la O	H	Jefe de UACI	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2108	\N	167	\N	\N	\N	María Margarita	Hernández de García	M	Miembro Asociación Agricultore	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2109	\N	165	\N	\N	\N	Medardo Antonio 	Pineda	H	UAM	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2110	\N	167	\N	\N	\N	José Osmín	Guerra	H	Agricultor	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2111	\N	\N	6	11	\N	German	Nolasco	H	Presidente	47	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2112	\N	165	\N	\N	\N	Liliana Emerita	Peña	M	USM	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2113	\N	165	\N	\N	\N	Sergio 	García	H	Tesorero	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2116	\N	165	\N	\N	\N	Felipe Alberto	Merino	H	Cuentas  corrientes	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2117	\N	167	\N	\N	\N	Sonia Yeny 	García	M	Agricultora 	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2118	\N	165	\N	\N	\N	Claudia Ivony	Ramos	M	Contadora	34	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2119	\N	\N	6	11	\N	Roberto	William	H	presidente	56	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2120	\N	165	\N	\N	\N	Kayra Marilin 	Romero	M	UPC	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2121	\N	167	\N	\N	\N	María Lidia	García	M	Agricultora	61	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2115	\N	\N	6	11	\N	Lorenzo	Quintero	H	Lider	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2122	\N	167	\N	\N	\N	Ermelinda	Flores	M	Agricultora	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2123	\N	\N	6	11	\N	Demetrio	Clímaco	H	Presidente	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2124	\N	167	\N	\N	\N	María Dora	Membreño	M	Agricultora	53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2125	\N	\N	6	11	\N	María	Martínez	M	Presidenta	54	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2126	\N	167	\N	\N	\N	Adán	Tejada	H	Agricultor	73	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2127	\N	\N	6	11	\N	Wilson	Romero	H	Presidente	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2129	\N	\N	6	11	\N	José	Medina	H	Presidente	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2130	\N	\N	6	11	\N	Manuel	Gonzalez	H	Presidente	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2131	\N	\N	6	11	\N	Cristian	Escoto	H	Secretario	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2132	\N	170	\N	\N	\N	Amin Elena	Rosales	M	Habitante	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2133	\N	\N	6	11	\N	Andrés	Rodríguez	H	Presidente	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2134	\N	170	\N	\N	\N	Edwin Amadeo	Pérez	H	Habitante	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2135	\N	\N	6	11	\N	Angel	Contreras	H	Presidente	57	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2136	\N	\N	6	11	\N	Angela	Barrera	M	Promotora Género Alcaldía	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2137	\N	\N	6	11	\N	María	Hernández	M	Promotora Género Alcaldía	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2138	\N	\N	6	11	\N	Francisco	Mena	H	Vicepresidente	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2139	\N	\N	6	11	\N	Leonardo	Alvarado	H	Vicepresidente	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2140	\N	\N	6	11	\N	Julio	Rivera	H	Presidente	46	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2141	\N	170	\N	\N	\N	Héctor Antonio	Molina	H	Habitante	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2142	\N	\N	6	11	\N	Tomasa	Vásquez	M	Tesorea	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2143	\N	170	\N	\N	\N	Fernando José	Molina	H	Habitante	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2144	\N	170	\N	\N	\N	Patrick José	Preza	H	Habitante	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2145	\N	170	\N	\N	\N	Raúl de los Santos	Hernández	H	Habitante	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2146	\N	\N	6	11	\N	Santos 	Morales	M	Socia	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2147	\N	170	\N	\N	\N	Danilo Antonio	Pérez	H	Habitante	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2148	\N	\N	6	11	\N	Gilberto	Hernández	H	2º Vocal	67	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2149	\N	170	\N	\N	\N	Rommy	Jiménez	M	Técnica	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2150	\N	\N	6	11	\N	Roberto	Antonio	H	Vicepresidente	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2151	\N	\N	6	11	\N	Julio	Campos	H	1er Vocal	67	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2152	\N	\N	6	11	\N	Jesús	Meléndez	H	Vocal	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2153	\N	\N	6	11	\N	Luis	Durán	H	Vocal	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2154	\N	\N	6	11	\N	Reynaldo	Cerón	H	Presidente	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2155	\N	\N	6	11	\N	Carlos	Ortíz	H	Presidente	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2156	\N	\N	6	11	\N	Gabriel	Dimas	H	Síndico	52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2157	\N	\N	6	11	\N	Rogelio	Barrera	H	Presidente	48	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2158	\N	\N	6	11	\N	Anastacio	Rivera	H	2º Vocal	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2159	\N	\N	6	11	\N	Hérman	López	H	Presidente	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2160	\N	\N	6	11	\N	María	Contreras	M	Presidenta	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2161	\N	\N	6	11	\N	Antonio	Durán	H	Presidente	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2162	\N	\N	6	11	\N	Francisco	Montes	H	Presidente	43	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2163	\N	\N	6	11	\N	Francisca	Aguilera	H	Presidenta	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2164	\N	\N	6	11	\N	Sandra	Alvarez	M	Lidereza	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2165	\N	\N	6	11	\N	María	Guandique	M	Lidereza	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2166	\N	\N	6	11	\N	Teresa	Hernández	M	Lidereza	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2167	\N	\N	6	11	\N	juana	Rivera	M	Lidereza	67	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2168	\N	\N	6	11	\N	Isabel	López	M	Lidereza	64	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2169	\N	\N	6	11	\N	María	Mejía	M	Lidereza	36	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2170	\N	\N	6	11	\N	Angela	Pérez	M	Lidereza	72	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2171	\N	\N	6	11	\N	Catalina	Zepeda	M	Lidereza	77	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2172	\N	\N	6	11	\N	Iliana	Oliva	M	Lidereza	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2173	\N	\N	6	11	\N	Maria	García	M	Lidereza	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2174	\N	\N	6	11	\N	Jesús	Ramos	H	Lider	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2175	\N	\N	6	11	\N	Dennys	Durán	H	Presidente	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2176	\N	\N	6	11	\N	Francisco 	López	H	Vicepresidente	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2177	\N	\N	6	11	\N	Reyes Orquidea	Orantes	M	Presidenta	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2178	\N	\N	6	11	\N	Efrían 	Rosales	H	Lider	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2179	\N	\N	6	11	\N	Erika	Navarrete	M	Vicepresidenta	38	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	C	\N	\N	\N
2180	\N	\N	1	11	\N	Francisco	Hirezi	H	Alcalde	49	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2181	\N	\N	1	11	\N	Julio	Soto	H	Concejal	69	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2182	\N	\N	6	11	\N	Jaime	Ayala	H	Empleado municipal	39	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
2183	\N	\N	6	11	\N	Vicente	Gómez	H	Empleado municipal	42	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	I	\N	\N	\N
\.


--
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_capacitacion (par_id, cap_id, par_cap_participa, par_cap_id) FROM stdin;
704	78	Si	28
953	113	Si	176
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
955	113	Si	177
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
922	101	\N	67
923	101	\N	68
924	101	\N	69
708	80	No	46
954	113	Si	172
925	114	\N	182
1000	102	Si	73
1001	102	Si	74
1002	102	Si	75
922	103	\N	76
923	103	\N	77
924	103	\N	78
1004	104	\N	79
1005	104	\N	80
1006	104	\N	81
1007	104	\N	82
1009	104	\N	83
1010	104	\N	84
1011	104	\N	85
1012	104	\N	86
1013	104	\N	87
1014	104	\N	88
1015	104	\N	89
1004	105	\N	90
1005	105	\N	91
1006	105	\N	92
1007	105	\N	93
1009	105	\N	94
1010	105	\N	95
1011	105	\N	96
1012	105	\N	97
1013	105	\N	98
1014	105	\N	99
1015	105	\N	100
1005	106	\N	102
1007	106	\N	104
1009	106	\N	105
1010	106	\N	106
1011	106	\N	107
1012	106	\N	108
1013	106	\N	109
1014	106	\N	110
1004	106	Si	101
1006	106	Si	103
1015	106	Si	111
1004	107	\N	112
1005	107	\N	113
1006	107	\N	114
1007	107	\N	115
1009	107	\N	116
1010	107	\N	117
1011	107	\N	118
1012	107	\N	119
1013	107	\N	120
1014	107	\N	121
1015	107	\N	122
1004	108	\N	123
1005	108	\N	124
1006	108	\N	125
1007	108	\N	126
1009	108	\N	127
1010	108	\N	128
1011	108	\N	129
1012	108	\N	130
1013	108	\N	131
1014	108	\N	132
1015	108	\N	133
1004	109	\N	134
1005	109	\N	135
1006	109	\N	136
1007	109	\N	137
1009	109	\N	138
1010	109	\N	139
1011	109	\N	140
1012	109	\N	141
1013	109	\N	142
1014	109	\N	143
1015	109	\N	144
1709	110	\N	145
1708	110	\N	146
1711	110	\N	148
1707	110	No	147
925	111	\N	149
954	111	\N	150
961	111	\N	151
926	111	\N	152
952	111	\N	153
953	111	\N	154
955	111	\N	155
957	111	\N	156
964	111	\N	157
975	111	\N	158
979	111	\N	159
954	112	\N	161
961	112	\N	162
926	112	\N	163
953	112	\N	165
955	112	\N	166
957	112	\N	167
964	112	\N	168
975	112	\N	169
979	112	\N	170
925	112	Si	160
952	112	Si	164
925	113	\N	171
961	113	\N	173
926	113	\N	174
952	113	\N	175
957	113	\N	178
964	113	\N	179
975	113	\N	180
979	113	\N	181
954	114	\N	183
961	114	\N	184
926	114	\N	185
952	114	\N	186
953	114	\N	187
955	114	\N	188
964	114	\N	190
975	114	\N	191
979	114	\N	192
957	114	Si	189
925	115	\N	193
961	115	\N	195
926	115	\N	196
952	115	\N	197
953	115	\N	198
957	115	\N	200
964	115	\N	201
975	115	\N	202
979	115	\N	203
955	115	Si	199
954	115	Si	194
925	116	\N	204
954	116	\N	205
961	116	\N	206
926	116	\N	207
952	116	\N	208
953	116	\N	209
955	116	\N	210
957	116	\N	211
964	116	\N	212
975	116	\N	213
979	116	\N	214
925	117	\N	215
954	117	\N	216
961	117	\N	217
926	117	\N	218
952	117	\N	219
953	117	\N	220
955	117	\N	221
957	117	\N	222
964	117	\N	223
975	117	\N	224
979	117	\N	225
925	118	\N	226
954	118	\N	227
961	118	\N	228
952	118	\N	230
955	118	\N	232
957	118	\N	233
964	118	\N	234
975	118	\N	235
979	118	\N	236
953	118	Si	231
926	118	Si	229
925	119	\N	237
954	119	\N	238
961	119	\N	239
926	119	\N	240
952	119	\N	241
953	119	\N	242
957	119	\N	244
979	119	\N	247
955	119	Si	243
975	119	Si	246
964	119	Si	245
925	120	\N	248
954	120	\N	249
961	120	\N	250
926	120	\N	251
952	120	\N	252
953	120	\N	253
955	120	\N	254
957	120	\N	255
964	120	\N	256
975	120	\N	257
979	120	\N	258
3	121	\N	259
4	121	\N	260
5	121	\N	261
6	121	\N	262
7	121	\N	263
8	121	\N	264
9	121	\N	265
10	121	\N	266
11	121	\N	267
12	121	\N	268
13	121	\N	269
14	121	\N	270
15	121	\N	271
17	121	\N	272
16	121	\N	273
18	121	\N	274
19	121	\N	275
20	121	\N	276
21	121	\N	277
22	121	\N	278
23	121	\N	279
24	121	\N	280
25	121	\N	281
27	121	\N	282
28	121	\N	283
29	121	\N	284
30	121	\N	285
31	121	\N	286
32	121	\N	287
33	121	\N	288
34	121	\N	289
35	121	\N	290
36	121	\N	291
37	121	\N	292
38	121	\N	293
39	121	\N	294
40	121	\N	295
41	121	\N	296
42	121	\N	297
43	121	\N	298
44	121	\N	299
45	121	\N	300
46	121	\N	301
47	121	\N	302
48	121	\N	303
49	121	\N	304
50	121	\N	305
51	121	\N	306
52	121	\N	307
53	121	\N	308
54	121	\N	309
55	121	\N	310
56	121	\N	311
57	121	\N	312
58	121	\N	313
59	121	\N	314
60	121	\N	315
61	121	\N	316
62	121	\N	317
63	121	\N	318
64	121	\N	319
65	121	\N	320
66	121	\N	321
67	121	\N	322
68	121	\N	323
69	121	\N	324
70	121	\N	325
71	121	\N	326
72	121	\N	327
73	121	\N	328
74	121	\N	329
75	121	\N	330
76	121	\N	331
77	121	\N	332
78	121	\N	333
79	121	\N	334
80	121	\N	335
81	121	\N	336
82	121	\N	337
83	121	\N	338
84	121	\N	339
85	121	\N	340
86	121	\N	341
87	121	\N	342
88	121	\N	343
89	121	\N	344
90	121	\N	345
91	121	\N	346
92	121	\N	347
93	121	\N	348
94	121	\N	349
95	121	\N	350
96	121	\N	351
97	121	\N	352
98	121	\N	353
99	121	\N	354
100	121	\N	355
101	121	\N	356
102	121	\N	357
103	121	\N	358
104	121	\N	359
105	121	\N	360
106	121	\N	361
107	121	\N	362
108	121	\N	363
109	121	\N	364
110	121	\N	365
111	121	\N	366
112	121	\N	367
113	121	\N	368
114	121	\N	369
115	121	\N	370
116	121	\N	371
117	121	\N	372
118	121	\N	373
119	121	\N	374
120	121	\N	375
121	121	\N	376
122	121	\N	377
123	121	\N	378
124	121	\N	379
125	121	\N	380
126	121	\N	381
127	121	\N	382
128	121	\N	383
129	121	\N	384
130	121	\N	385
131	121	\N	386
132	121	\N	387
133	121	\N	388
134	121	\N	389
135	121	\N	390
136	121	\N	391
137	121	\N	392
138	121	\N	393
139	121	\N	394
140	121	\N	395
141	121	\N	396
142	121	\N	397
143	121	\N	398
144	121	\N	399
145	121	\N	400
146	121	\N	401
147	121	\N	402
148	121	\N	403
149	121	\N	404
150	121	\N	405
151	121	\N	406
153	121	\N	407
152	121	\N	408
154	121	\N	409
155	121	\N	410
156	121	\N	411
157	121	\N	412
158	121	\N	413
159	121	\N	414
160	121	\N	415
161	121	\N	416
162	121	\N	417
163	121	\N	418
164	121	\N	419
165	121	\N	420
166	121	\N	421
167	121	\N	422
168	121	\N	423
169	121	\N	424
170	121	\N	425
171	121	\N	426
172	121	\N	427
173	121	\N	428
174	121	\N	429
175	121	\N	430
176	121	\N	431
177	121	\N	432
178	121	\N	433
179	121	\N	434
180	121	\N	435
181	121	\N	436
182	121	\N	437
183	121	\N	438
184	121	\N	439
185	121	\N	440
186	121	\N	441
187	121	\N	442
188	121	\N	443
189	121	\N	444
190	121	\N	445
191	121	\N	446
236	121	\N	447
237	121	\N	448
247	121	\N	449
192	121	\N	450
205	121	\N	451
214	121	\N	452
220	121	\N	453
229	121	\N	454
240	121	\N	455
193	121	\N	456
206	121	\N	457
221	121	\N	458
230	121	\N	459
241	121	\N	460
194	121	\N	461
198	121	\N	462
207	121	\N	463
222	121	\N	464
231	121	\N	465
242	121	\N	466
195	121	\N	467
199	121	\N	468
208	121	\N	469
223	121	\N	470
232	121	\N	471
243	121	\N	472
196	121	\N	473
200	121	\N	474
209	121	\N	475
224	121	\N	476
233	121	\N	477
234	121	\N	478
244	121	\N	479
197	121	\N	480
202	121	\N	481
211	121	\N	482
215	121	\N	483
217	121	\N	484
226	121	\N	485
246	121	\N	486
201	121	\N	487
210	121	\N	488
216	121	\N	489
225	121	\N	490
235	121	\N	491
245	121	\N	492
203	121	\N	493
212	121	\N	494
218	121	\N	495
227	121	\N	496
238	121	\N	497
204	121	\N	498
213	121	\N	499
219	121	\N	500
228	121	\N	501
239	121	\N	502
248	121	\N	503
249	121	\N	504
250	121	\N	505
251	121	\N	506
252	121	\N	507
253	121	\N	508
254	121	\N	509
255	121	\N	510
256	121	\N	511
257	121	\N	512
258	121	\N	513
259	121	\N	514
260	121	\N	515
261	121	\N	516
262	121	\N	517
263	121	\N	518
264	121	\N	519
265	121	\N	520
266	121	\N	521
267	121	\N	522
268	121	\N	523
269	121	\N	524
270	121	\N	525
271	121	\N	526
272	121	\N	527
273	121	\N	528
274	121	\N	529
275	121	\N	530
276	121	\N	531
277	121	\N	532
278	121	\N	533
279	121	\N	534
280	121	\N	535
281	121	\N	536
282	121	\N	537
283	121	\N	538
284	121	\N	539
285	121	\N	540
1943	121	\N	541
286	121	\N	542
287	121	\N	543
288	121	\N	544
289	121	\N	545
290	121	\N	546
291	121	\N	547
292	121	\N	548
293	121	\N	549
294	121	\N	550
295	121	\N	551
296	121	\N	552
297	121	\N	553
298	121	\N	554
299	121	\N	555
300	121	\N	556
301	121	\N	557
302	121	\N	558
303	121	\N	559
304	121	\N	560
305	121	\N	561
306	121	\N	562
307	121	\N	563
308	121	\N	564
309	121	\N	565
310	121	\N	566
311	121	\N	567
312	121	\N	568
313	121	\N	569
314	121	\N	570
315	121	\N	571
316	121	\N	572
317	121	\N	573
318	121	\N	574
319	121	\N	575
320	121	\N	576
321	121	\N	577
322	121	\N	578
323	121	\N	579
324	121	\N	580
325	121	\N	581
326	121	\N	582
327	121	\N	583
328	121	\N	584
329	121	\N	585
330	121	\N	586
331	121	\N	587
332	121	\N	588
333	121	\N	589
334	121	\N	590
335	121	\N	591
336	121	\N	592
337	121	\N	593
338	121	\N	594
339	121	\N	595
340	121	\N	596
347	121	\N	597
356	121	\N	598
364	121	\N	599
371	121	\N	600
373	121	\N	601
374	121	\N	602
392	121	\N	603
403	121	\N	604
341	121	\N	605
358	121	\N	606
359	121	\N	607
367	121	\N	608
390	121	\N	609
400	121	\N	610
401	121	\N	611
342	121	\N	612
343	121	\N	613
350	121	\N	614
368	121	\N	615
377	121	\N	616
386	121	\N	617
395	121	\N	618
396	121	\N	619
406	121	\N	620
344	121	\N	621
353	121	\N	622
360	121	\N	623
361	121	\N	624
378	121	\N	625
397	121	\N	626
345	121	\N	627
354	121	\N	628
362	121	\N	629
370	121	\N	630
346	121	\N	631
355	121	\N	632
363	121	\N	633
381	121	\N	634
389	121	\N	635
399	121	\N	636
408	121	\N	637
348	121	\N	638
349	121	\N	639
351	121	\N	640
352	121	\N	641
357	121	\N	642
369	121	\N	643
379	121	\N	644
380	121	\N	645
387	121	\N	646
388	121	\N	647
398	121	\N	648
407	121	\N	649
365	121	\N	650
366	121	\N	651
372	121	\N	652
375	121	\N	653
376	121	\N	654
382	121	\N	655
383	121	\N	656
384	121	\N	657
385	121	\N	658
391	121	\N	659
393	121	\N	660
394	121	\N	661
402	121	\N	662
404	121	\N	663
405	121	\N	664
409	121	\N	665
410	121	\N	666
411	121	\N	667
412	121	\N	668
413	121	\N	669
414	121	\N	670
415	121	\N	671
416	121	\N	672
417	121	\N	673
418	121	\N	674
419	121	\N	675
420	121	\N	676
421	121	\N	677
422	121	\N	678
423	121	\N	679
424	121	\N	680
425	121	\N	681
426	121	\N	682
427	121	\N	683
428	121	\N	684
429	121	\N	685
430	121	\N	686
431	121	\N	687
432	121	\N	688
433	121	\N	689
434	121	\N	690
435	121	\N	691
436	121	\N	692
437	121	\N	693
438	121	\N	694
439	121	\N	695
440	121	\N	696
441	121	\N	697
442	121	\N	698
443	121	\N	699
444	121	\N	700
445	121	\N	701
446	121	\N	702
447	121	\N	703
448	121	\N	704
449	121	\N	705
450	121	\N	706
451	121	\N	707
452	121	\N	708
453	121	\N	709
454	121	\N	710
455	121	\N	711
456	121	\N	712
457	121	\N	713
458	121	\N	714
459	121	\N	715
460	121	\N	716
461	121	\N	717
462	121	\N	718
463	121	\N	719
464	121	\N	720
465	121	\N	721
466	121	\N	722
467	121	\N	723
468	121	\N	724
469	121	\N	725
470	121	\N	726
471	121	\N	727
472	121	\N	728
473	121	\N	729
474	121	\N	730
1945	121	\N	731
475	121	\N	732
476	121	\N	733
477	121	\N	734
478	121	\N	735
479	121	\N	736
480	121	\N	737
481	121	\N	738
482	121	\N	739
483	121	\N	740
484	121	\N	741
487	121	\N	742
485	121	\N	743
486	121	\N	744
493	121	\N	745
488	121	\N	746
489	121	\N	747
490	121	\N	748
491	121	\N	749
492	121	\N	750
494	121	\N	751
495	121	\N	752
496	121	\N	753
497	121	\N	754
498	121	\N	755
499	121	\N	756
500	121	\N	757
501	121	\N	758
502	121	\N	759
503	121	\N	760
504	121	\N	761
505	121	\N	762
506	121	\N	763
507	121	\N	764
508	121	\N	765
509	121	\N	766
510	121	\N	767
511	121	\N	768
512	121	\N	769
513	121	\N	770
514	121	\N	771
515	121	\N	772
516	121	\N	773
517	121	\N	774
518	121	\N	775
519	121	\N	776
520	121	\N	777
521	121	\N	778
522	121	\N	779
524	121	\N	780
525	121	\N	781
526	121	\N	782
527	121	\N	783
528	121	\N	784
529	121	\N	785
530	121	\N	786
531	121	\N	787
532	121	\N	788
533	121	\N	789
534	121	\N	790
535	121	\N	791
536	121	\N	792
537	121	\N	793
538	121	\N	794
539	121	\N	795
540	121	\N	796
541	121	\N	797
542	121	\N	798
543	121	\N	799
544	121	\N	800
545	121	\N	801
546	121	\N	802
547	121	\N	803
548	121	\N	804
549	121	\N	805
550	121	\N	806
551	121	\N	807
552	121	\N	808
553	121	\N	809
554	121	\N	810
555	121	\N	811
556	121	\N	812
557	121	\N	813
558	121	\N	814
559	121	\N	815
560	121	\N	816
561	121	\N	817
563	121	\N	818
564	121	\N	819
562	121	\N	820
565	121	\N	821
566	121	\N	822
567	121	\N	823
568	121	\N	824
569	121	\N	825
570	121	\N	826
571	121	\N	827
572	121	\N	828
573	121	\N	829
574	121	\N	830
575	121	\N	831
576	121	\N	832
577	121	\N	833
578	121	\N	834
579	121	\N	835
589	121	\N	836
580	121	\N	837
590	121	\N	838
581	121	\N	839
591	121	\N	840
582	121	\N	841
592	121	\N	842
583	121	\N	843
585	121	\N	844
584	121	\N	845
586	121	\N	846
587	121	\N	847
588	121	\N	848
593	121	\N	849
594	121	\N	850
595	121	\N	851
596	121	\N	852
597	121	\N	853
598	121	\N	854
599	121	\N	855
600	121	\N	856
601	121	\N	857
602	121	\N	858
603	121	\N	859
604	121	\N	860
605	121	\N	861
606	121	\N	862
607	121	\N	863
608	121	\N	864
609	121	\N	865
610	121	\N	866
611	121	\N	867
612	121	\N	868
613	121	\N	869
614	121	\N	870
615	121	\N	871
616	121	\N	872
617	121	\N	873
618	121	\N	874
619	121	\N	875
620	121	\N	876
621	121	\N	877
624	121	\N	878
626	121	\N	879
625	121	\N	880
628	121	\N	881
622	121	\N	882
623	121	\N	883
627	121	\N	884
629	121	\N	885
630	121	\N	886
631	121	\N	887
632	121	\N	888
633	121	\N	889
634	121	\N	890
635	121	\N	891
636	121	\N	892
637	121	\N	893
638	121	\N	894
639	121	\N	895
640	121	\N	896
641	121	\N	897
642	121	\N	898
643	121	\N	899
644	121	\N	900
645	121	\N	901
646	121	\N	902
647	121	\N	903
648	121	\N	904
649	121	\N	905
650	121	\N	906
1954	121	\N	907
652	121	\N	908
653	121	\N	909
654	121	\N	910
655	121	\N	911
656	121	\N	912
657	121	\N	913
658	121	\N	914
659	121	\N	915
660	121	\N	916
661	121	\N	917
662	121	\N	918
663	121	\N	919
664	121	\N	920
651	121	\N	921
665	121	\N	922
666	121	\N	923
667	121	\N	924
668	121	\N	925
669	121	\N	926
670	121	\N	927
671	121	\N	928
672	121	\N	929
673	121	\N	930
674	121	\N	931
675	121	\N	932
676	121	\N	933
677	121	\N	934
678	121	\N	935
679	121	\N	936
680	121	\N	937
681	121	\N	938
682	121	\N	939
683	121	\N	940
684	121	\N	941
699	121	\N	942
685	121	\N	943
694	121	\N	944
686	121	\N	945
690	121	\N	946
695	121	\N	947
687	121	\N	948
688	121	\N	949
689	121	\N	950
691	121	\N	951
693	121	\N	952
696	121	\N	953
698	121	\N	954
692	121	\N	955
697	121	\N	956
700	121	\N	957
701	121	\N	958
702	121	\N	959
703	121	\N	960
704	121	\N	961
705	121	\N	962
706	121	\N	963
707	121	\N	964
708	121	\N	965
709	121	\N	966
710	121	\N	967
711	121	\N	968
712	121	\N	969
713	121	\N	970
714	121	\N	971
715	121	\N	972
716	121	\N	973
717	121	\N	974
718	121	\N	975
719	121	\N	976
720	121	\N	977
721	121	\N	978
722	121	\N	979
723	121	\N	980
725	121	\N	981
724	121	\N	982
726	121	\N	983
727	121	\N	984
728	121	\N	985
729	121	\N	986
730	121	\N	987
731	121	\N	988
732	121	\N	989
733	121	\N	990
734	121	\N	991
735	121	\N	992
736	121	\N	993
737	121	\N	994
738	121	\N	995
739	121	\N	996
740	121	\N	997
741	121	\N	998
742	121	\N	999
743	121	\N	1000
744	121	\N	1001
745	121	\N	1002
746	121	\N	1003
747	121	\N	1004
748	121	\N	1005
749	121	\N	1006
750	121	\N	1007
751	121	\N	1008
752	121	\N	1009
753	121	\N	1010
754	121	\N	1011
755	121	\N	1012
756	121	\N	1013
757	121	\N	1014
758	121	\N	1015
759	121	\N	1016
760	121	\N	1017
761	121	\N	1018
762	121	\N	1019
763	121	\N	1020
764	121	\N	1021
765	121	\N	1022
766	121	\N	1023
767	121	\N	1024
768	121	\N	1025
769	121	\N	1026
770	121	\N	1027
771	121	\N	1028
772	121	\N	1029
773	121	\N	1030
774	121	\N	1031
775	121	\N	1032
776	121	\N	1033
777	121	\N	1034
778	121	\N	1035
779	121	\N	1036
780	121	\N	1037
781	121	\N	1038
782	121	\N	1039
783	121	\N	1040
784	121	\N	1041
785	121	\N	1042
786	121	\N	1043
787	121	\N	1044
788	121	\N	1045
789	121	\N	1046
790	121	\N	1047
791	121	\N	1048
792	121	\N	1049
804	121	\N	1050
805	121	\N	1051
813	121	\N	1052
793	121	\N	1053
794	121	\N	1054
795	121	\N	1055
796	121	\N	1056
797	121	\N	1057
798	121	\N	1058
799	121	\N	1059
800	121	\N	1060
801	121	\N	1061
802	121	\N	1062
803	121	\N	1063
806	121	\N	1064
807	121	\N	1065
808	121	\N	1066
809	121	\N	1067
810	121	\N	1068
811	121	\N	1069
812	121	\N	1070
814	121	\N	1071
816	121	\N	1072
817	121	\N	1073
815	121	\N	1074
818	121	\N	1075
819	121	\N	1076
820	121	\N	1077
821	121	\N	1078
822	121	\N	1079
823	121	\N	1080
826	121	\N	1081
827	121	\N	1082
828	121	\N	1083
829	121	\N	1084
830	121	\N	1085
831	121	\N	1086
832	121	\N	1087
833	121	\N	1088
834	121	\N	1089
836	121	\N	1090
837	121	\N	1091
824	121	\N	1092
839	121	\N	1093
842	121	\N	1094
843	121	\N	1095
844	121	\N	1096
852	121	\N	1097
857	121	\N	1098
860	121	\N	1099
864	121	\N	1100
865	121	\N	1101
866	121	\N	1102
870	121	\N	1103
871	121	\N	1104
872	121	\N	1105
873	121	\N	1106
874	121	\N	1107
875	121	\N	1108
876	121	\N	1109
877	121	\N	1110
878	121	\N	1111
879	121	\N	1112
880	121	\N	1113
881	121	\N	1114
882	121	\N	1115
883	121	\N	1116
886	121	\N	1117
825	121	\N	1118
840	121	\N	1119
845	121	\N	1120
846	121	\N	1121
850	121	\N	1122
851	121	\N	1123
853	121	\N	1124
854	121	\N	1125
855	121	\N	1126
856	121	\N	1127
858	121	\N	1128
849	121	\N	1129
859	121	\N	1130
861	121	\N	1131
862	121	\N	1132
863	121	\N	1133
867	121	\N	1134
868	121	\N	1135
869	121	\N	1136
887	121	\N	1137
838	121	\N	1138
841	121	\N	1139
888	121	\N	1140
889	121	\N	1141
890	121	\N	1142
891	121	\N	1143
892	121	\N	1144
893	121	\N	1145
894	121	\N	1146
895	121	\N	1147
896	121	\N	1148
897	121	\N	1149
898	121	\N	1150
899	121	\N	1151
900	121	\N	1152
901	121	\N	1153
902	121	\N	1154
903	121	\N	1155
905	121	\N	1156
906	121	\N	1157
907	121	\N	1158
908	121	\N	1159
909	121	\N	1160
910	121	\N	1161
911	121	\N	1162
912	121	\N	1163
904	121	\N	1164
913	121	\N	1165
914	121	\N	1166
915	121	\N	1167
916	121	\N	1168
917	121	\N	1169
885	121	\N	1170
918	121	\N	1171
919	121	\N	1172
920	121	\N	1173
921	121	\N	1174
930	121	\N	1175
931	121	\N	1176
932	121	\N	1177
933	121	\N	1178
934	121	\N	1179
935	121	\N	1180
936	121	\N	1181
937	121	\N	1182
938	121	\N	1183
939	121	\N	1184
940	121	\N	1185
941	121	\N	1186
942	121	\N	1187
943	121	\N	1188
944	121	\N	1189
945	121	\N	1190
946	121	\N	1191
947	121	\N	1192
948	121	\N	1193
949	121	\N	1194
989	121	\N	1195
990	121	\N	1196
991	121	\N	1197
997	121	\N	1198
998	121	\N	1199
1000	121	\N	1200
996	121	\N	1201
999	121	\N	1202
1001	121	\N	1203
1002	121	\N	1204
1003	121	\N	1205
923	121	\N	1206
1016	121	\N	1207
1018	121	\N	1208
1080	121	\N	1209
1081	121	\N	1210
1082	121	\N	1211
924	121	\N	1212
1017	121	\N	1213
1019	121	\N	1214
1020	121	\N	1215
1021	121	\N	1216
1022	121	\N	1217
1023	121	\N	1218
1024	121	\N	1219
1025	121	\N	1220
1029	121	\N	1221
1030	121	\N	1222
1031	121	\N	1223
1032	121	\N	1224
1033	121	\N	1225
1034	121	\N	1226
1035	121	\N	1227
1036	121	\N	1228
1037	121	\N	1229
1038	121	\N	1230
922	121	\N	1231
1048	121	\N	1232
1049	121	\N	1233
1050	121	\N	1234
1051	121	\N	1235
1052	121	\N	1236
1053	121	\N	1237
1054	121	\N	1238
1055	121	\N	1239
1056	121	\N	1240
1057	121	\N	1241
1058	121	\N	1242
1059	121	\N	1243
1060	121	\N	1244
1061	121	\N	1245
1062	121	\N	1246
1063	121	\N	1247
1064	121	\N	1248
1065	121	\N	1249
1066	121	\N	1250
1068	121	\N	1251
1069	121	\N	1252
1070	121	\N	1253
1071	121	\N	1254
1072	121	\N	1255
1073	121	\N	1256
1074	121	\N	1257
1075	121	\N	1258
1077	121	\N	1259
1078	121	\N	1260
1076	121	\N	1261
1079	121	\N	1262
1083	121	\N	1263
1084	121	\N	1264
1085	121	\N	1265
1086	121	\N	1266
1087	121	\N	1267
1088	121	\N	1268
1089	121	\N	1269
1090	121	\N	1270
1091	121	\N	1271
1092	121	\N	1272
1093	121	\N	1273
1094	121	\N	1274
1095	121	\N	1275
1096	121	\N	1276
1097	121	\N	1277
1098	121	\N	1278
1099	121	\N	1279
1100	121	\N	1280
1101	121	\N	1281
1102	121	\N	1282
1103	121	\N	1283
1104	121	\N	1284
1105	121	\N	1285
1107	121	\N	1286
1115	121	\N	1287
1121	121	\N	1288
1127	121	\N	1289
1135	121	\N	1290
1106	121	\N	1291
1111	121	\N	1292
1108	121	\N	1293
1112	121	\N	1294
1120	121	\N	1295
1145	121	\N	1296
1150	121	\N	1297
1159	121	\N	1298
1168	121	\N	1299
1184	121	\N	1300
1192	121	\N	1301
1109	121	\N	1302
1124	121	\N	1303
1134	121	\N	1304
1138	121	\N	1305
1143	121	\N	1306
1157	121	\N	1307
1166	121	\N	1308
1176	121	\N	1309
1182	121	\N	1310
1190	121	\N	1311
1199	121	\N	1312
1110	121	\N	1313
1113	121	\N	1314
1116	121	\N	1315
1125	121	\N	1316
1130	121	\N	1317
1146	121	\N	1318
1151	121	\N	1319
1160	121	\N	1320
1169	121	\N	1321
1186	121	\N	1322
1194	121	\N	1323
1114	121	\N	1324
1117	121	\N	1325
1126	121	\N	1326
1131	121	\N	1327
1132	121	\N	1328
1137	121	\N	1329
1139	121	\N	1330
1142	121	\N	1331
1144	121	\N	1332
1155	121	\N	1333
1156	121	\N	1334
1164	121	\N	1335
1165	121	\N	1336
1174	121	\N	1337
1175	121	\N	1338
1180	121	\N	1339
1181	121	\N	1340
1188	121	\N	1341
1189	121	\N	1342
1198	121	\N	1343
1118	121	\N	1344
1119	121	\N	1345
1122	121	\N	1346
1123	121	\N	1347
1128	121	\N	1348
1129	121	\N	1349
1133	121	\N	1350
1136	121	\N	1351
1140	121	\N	1352
1141	121	\N	1353
1147	121	\N	1354
1148	121	\N	1355
1149	121	\N	1356
1152	121	\N	1357
1153	121	\N	1358
1154	121	\N	1359
1158	121	\N	1360
1161	121	\N	1361
1162	121	\N	1362
1163	121	\N	1363
1167	121	\N	1364
1170	121	\N	1365
1171	121	\N	1366
1172	121	\N	1367
1173	121	\N	1368
1177	121	\N	1369
1178	121	\N	1370
1179	121	\N	1371
1235	121	\N	1372
1183	121	\N	1373
1236	121	\N	1374
1185	121	\N	1375
1237	121	\N	1376
1187	121	\N	1377
1191	121	\N	1378
1193	121	\N	1379
1195	121	\N	1380
1197	121	\N	1381
1196	121	\N	1382
1200	121	\N	1383
1201	121	\N	1384
1202	121	\N	1385
1203	121	\N	1386
1204	121	\N	1387
1205	121	\N	1388
1206	121	\N	1389
1207	121	\N	1390
1208	121	\N	1391
1209	121	\N	1392
1210	121	\N	1393
1211	121	\N	1394
1212	121	\N	1395
1213	121	\N	1396
1214	121	\N	1397
1215	121	\N	1398
1216	121	\N	1399
1217	121	\N	1400
1218	121	\N	1401
1219	121	\N	1402
1220	121	\N	1403
1221	121	\N	1404
1222	121	\N	1405
1224	121	\N	1406
1225	121	\N	1407
1226	121	\N	1408
1227	121	\N	1409
1228	121	\N	1410
1229	121	\N	1411
1230	121	\N	1412
1231	121	\N	1413
1232	121	\N	1414
1233	121	\N	1415
1223	121	\N	1416
1234	121	\N	1417
1238	121	\N	1418
1239	121	\N	1419
1240	121	\N	1420
1241	121	\N	1421
1242	121	\N	1422
1243	121	\N	1423
1244	121	\N	1424
1245	121	\N	1425
1246	121	\N	1426
1247	121	\N	1427
1248	121	\N	1428
1249	121	\N	1429
1250	121	\N	1430
1251	121	\N	1431
1252	121	\N	1432
1253	121	\N	1433
1254	121	\N	1434
1266	121	\N	1435
1278	121	\N	1436
1288	121	\N	1437
1297	121	\N	1438
1306	121	\N	1439
1315	121	\N	1440
1325	121	\N	1441
1334	121	\N	1442
1255	121	\N	1443
1261	121	\N	1444
1270	121	\N	1445
1282	121	\N	1446
1291	121	\N	1447
1301	121	\N	1448
1309	121	\N	1449
1319	121	\N	1450
1329	121	\N	1451
1338	121	\N	1452
1340	121	\N	1453
1350	121	\N	1454
1357	121	\N	1455
1256	121	\N	1456
1262	121	\N	1457
1271	121	\N	1458
1274	121	\N	1459
1284	121	\N	1460
1293	121	\N	1461
1303	121	\N	1462
1311	121	\N	1463
1321	121	\N	1464
1331	121	\N	1465
1345	121	\N	1466
1349	121	\N	1467
1356	121	\N	1468
1257	121	\N	1469
1267	121	\N	1470
1279	121	\N	1471
1298	121	\N	1472
1307	121	\N	1473
1316	121	\N	1474
1326	121	\N	1475
1335	121	\N	1476
1339	121	\N	1477
1344	121	\N	1478
1353	121	\N	1479
1363	121	\N	1480
1258	121	\N	1481
1268	121	\N	1482
1281	121	\N	1483
1290	121	\N	1484
1300	121	\N	1485
1308	121	\N	1486
1318	121	\N	1487
1328	121	\N	1488
1337	121	\N	1489
1259	121	\N	1490
1269	121	\N	1491
1273	121	\N	1492
1283	121	\N	1493
1292	121	\N	1494
1302	121	\N	1495
1310	121	\N	1496
1320	121	\N	1497
1330	121	\N	1498
1260	121	\N	1499
1280	121	\N	1500
1289	121	\N	1501
1299	121	\N	1502
1317	121	\N	1503
1327	121	\N	1504
1336	121	\N	1505
1346	121	\N	1506
1263	121	\N	1507
1272	121	\N	1508
1275	121	\N	1509
1285	121	\N	1510
1294	121	\N	1511
1304	121	\N	1512
1312	121	\N	1513
1322	121	\N	1514
1332	121	\N	1515
1341	121	\N	1516
1264	121	\N	1517
1276	121	\N	1518
1286	121	\N	1519
1295	121	\N	1520
1305	121	\N	1521
1313	121	\N	1522
1323	121	\N	1523
1343	121	\N	1524
1265	121	\N	1525
1277	121	\N	1526
1287	121	\N	1527
1296	121	\N	1528
1314	121	\N	1529
1324	121	\N	1530
1333	121	\N	1531
1342	121	\N	1532
1347	121	\N	1533
1348	121	\N	1534
1351	121	\N	1535
1415	121	\N	1536
1352	121	\N	1537
1354	121	\N	1538
1355	121	\N	1539
1358	121	\N	1540
1359	121	\N	1541
1360	121	\N	1542
1361	121	\N	1543
1362	121	\N	1544
1364	121	\N	1545
1365	121	\N	1546
1367	121	\N	1547
1369	121	\N	1548
1370	121	\N	1549
1416	121	\N	1550
1366	121	\N	1551
1368	121	\N	1552
1371	121	\N	1553
1372	121	\N	1554
1373	121	\N	1555
1374	121	\N	1556
1375	121	\N	1557
1376	121	\N	1558
1377	121	\N	1559
1378	121	\N	1560
1379	121	\N	1561
1382	121	\N	1562
1383	121	\N	1563
1384	121	\N	1564
1385	121	\N	1565
1386	121	\N	1566
1387	121	\N	1567
1388	121	\N	1568
1389	121	\N	1569
1390	121	\N	1570
1391	121	\N	1571
1392	121	\N	1572
1393	121	\N	1573
1394	121	\N	1574
1395	121	\N	1575
1396	121	\N	1576
1397	121	\N	1577
1398	121	\N	1578
1400	121	\N	1579
1399	121	\N	1580
1401	121	\N	1581
1402	121	\N	1582
1403	121	\N	1583
1404	121	\N	1584
1405	121	\N	1585
1406	121	\N	1586
1407	121	\N	1587
1408	121	\N	1588
1409	121	\N	1589
1410	121	\N	1590
1411	121	\N	1591
1412	121	\N	1592
1413	121	\N	1593
1414	121	\N	1594
1417	121	\N	1595
1418	121	\N	1596
1419	121	\N	1597
1420	121	\N	1598
1421	121	\N	1599
1422	121	\N	1600
1423	121	\N	1601
1424	121	\N	1602
1425	121	\N	1603
1426	121	\N	1604
1428	121	\N	1605
1427	121	\N	1606
1429	121	\N	1607
1430	121	\N	1608
1431	121	\N	1609
1432	121	\N	1610
1433	121	\N	1611
1438	121	\N	1612
1448	121	\N	1613
1458	121	\N	1614
1468	121	\N	1615
1478	121	\N	1616
1434	121	\N	1617
1439	121	\N	1618
1449	121	\N	1619
1459	121	\N	1620
1469	121	\N	1621
1479	121	\N	1622
1489	121	\N	1623
1503	121	\N	1624
1513	121	\N	1625
1522	121	\N	1626
1530	121	\N	1627
1540	121	\N	1628
1542	121	\N	1629
1552	121	\N	1630
1435	121	\N	1631
1445	121	\N	1632
1455	121	\N	1633
1465	121	\N	1634
1475	121	\N	1635
1436	121	\N	1636
1446	121	\N	1637
1456	121	\N	1638
1466	121	\N	1639
1476	121	\N	1640
1437	121	\N	1641
1447	121	\N	1642
1457	121	\N	1643
1467	121	\N	1644
1477	121	\N	1645
1486	121	\N	1646
1493	121	\N	1647
1498	121	\N	1648
1516	121	\N	1649
1525	121	\N	1650
1532	121	\N	1651
1543	121	\N	1652
1553	121	\N	1653
1440	121	\N	1654
1450	121	\N	1655
1460	121	\N	1656
1470	121	\N	1657
1480	121	\N	1658
1441	121	\N	1659
1451	121	\N	1660
1461	121	\N	1661
1471	121	\N	1662
1481	121	\N	1663
1442	121	\N	1664
1452	121	\N	1665
1462	121	\N	1666
1472	121	\N	1667
1443	121	\N	1668
1453	121	\N	1669
1463	121	\N	1670
1473	121	\N	1671
1482	121	\N	1672
1444	121	\N	1673
1454	121	\N	1674
1464	121	\N	1675
1474	121	\N	1676
1483	121	\N	1677
1484	121	\N	1678
1485	121	\N	1679
1487	121	\N	1680
1488	121	\N	1681
1490	121	\N	1682
1491	121	\N	1683
1492	121	\N	1684
1494	121	\N	1685
1495	121	\N	1686
1496	121	\N	1687
1497	121	\N	1688
1499	121	\N	1689
1500	121	\N	1690
1501	121	\N	1691
1502	121	\N	1692
1504	121	\N	1693
1505	121	\N	1694
1506	121	\N	1695
1507	121	\N	1696
1508	121	\N	1697
1509	121	\N	1698
1510	121	\N	1699
1511	121	\N	1700
1512	121	\N	1701
1514	121	\N	1702
1515	121	\N	1703
1517	121	\N	1704
1518	121	\N	1705
1519	121	\N	1706
1520	121	\N	1707
1521	121	\N	1708
1523	121	\N	1709
1524	121	\N	1710
1526	121	\N	1711
1527	121	\N	1712
1528	121	\N	1713
1529	121	\N	1714
1531	121	\N	1715
1533	121	\N	1716
1534	121	\N	1717
1535	121	\N	1718
1536	121	\N	1719
1537	121	\N	1720
1538	121	\N	1721
1539	121	\N	1722
1541	121	\N	1723
1544	121	\N	1724
1545	121	\N	1725
1546	121	\N	1726
1547	121	\N	1727
1548	121	\N	1728
1549	121	\N	1729
1550	121	\N	1730
1551	121	\N	1731
1554	121	\N	1732
1555	121	\N	1733
1556	121	\N	1734
1557	121	\N	1735
1558	121	\N	1736
1559	121	\N	1737
1560	121	\N	1738
1561	121	\N	1739
1562	121	\N	1740
1563	121	\N	1741
1564	121	\N	1742
1565	121	\N	1743
1566	121	\N	1744
1567	121	\N	1745
1568	121	\N	1746
1569	121	\N	1747
1570	121	\N	1748
1571	121	\N	1749
1572	121	\N	1750
1573	121	\N	1751
1575	121	\N	1752
1576	121	\N	1753
1577	121	\N	1754
1578	121	\N	1755
1579	121	\N	1756
1580	121	\N	1757
1581	121	\N	1758
1582	121	\N	1759
1583	121	\N	1760
1584	121	\N	1761
1590	121	\N	1762
1599	121	\N	1763
1604	121	\N	1764
1609	121	\N	1765
1615	121	\N	1766
1629	121	\N	1767
1641	121	\N	1768
1651	121	\N	1769
1664	121	\N	1770
1670	121	\N	1771
1677	121	\N	1772
1685	121	\N	1773
1692	121	\N	1774
1709	121	\N	1775
1718	121	\N	1776
1722	121	\N	1777
1734	121	\N	1778
1743	121	\N	1779
1750	121	\N	1780
1585	121	\N	1781
1594	121	\N	1782
1606	121	\N	1783
1616	121	\N	1784
1635	121	\N	1785
1645	121	\N	1786
1655	121	\N	1787
1661	121	\N	1788
1667	121	\N	1789
1674	121	\N	1790
1682	121	\N	1791
1690	121	\N	1792
1574	121	\N	1793
1704	121	\N	1794
1586	121	\N	1795
1607	121	\N	1796
1611	121	\N	1797
1620	121	\N	1798
1637	121	\N	1799
1647	121	\N	1800
1657	121	\N	1801
1662	121	\N	1802
1676	121	\N	1803
1683	121	\N	1804
1699	121	\N	1805
1706	121	\N	1806
1710	121	\N	1807
1715	121	\N	1808
1719	121	\N	1809
1587	121	\N	1810
1595	121	\N	1811
1602	121	\N	1812
1619	121	\N	1813
1626	121	\N	1814
1638	121	\N	1815
1648	121	\N	1816
1688	121	\N	1817
1717	121	\N	1818
1588	121	\N	1819
1596	121	\N	1820
1608	121	\N	1821
1613	121	\N	1822
1623	121	\N	1823
1631	121	\N	1824
1640	121	\N	1825
1650	121	\N	1826
1658	121	\N	1827
1665	121	\N	1828
1671	121	\N	1829
1678	121	\N	1830
1686	121	\N	1831
1693	121	\N	1832
1698	121	\N	1833
1705	121	\N	1834
1714	121	\N	1835
1728	121	\N	1836
1748	121	\N	1837
1758	121	\N	1838
1589	121	\N	1839
1597	121	\N	1840
1603	121	\N	1841
1621	121	\N	1842
1627	121	\N	1843
1639	121	\N	1844
1649	121	\N	1845
1666	121	\N	1846
1672	121	\N	1847
1679	121	\N	1848
1687	121	\N	1849
1694	121	\N	1850
1702	121	\N	1851
1708	121	\N	1852
1713	121	\N	1853
1591	121	\N	1854
1600	121	\N	1855
1614	121	\N	1856
1624	121	\N	1857
1633	121	\N	1858
1643	121	\N	1859
1653	121	\N	1860
1659	121	\N	1861
1673	121	\N	1862
1680	121	\N	1863
1707	121	\N	1864
1720	121	\N	1865
1723	121	\N	1866
1732	121	\N	1867
1737	121	\N	1868
1739	121	\N	1869
1745	121	\N	1870
1754	121	\N	1871
1592	121	\N	1872
1605	121	\N	1873
1617	121	\N	1874
1625	121	\N	1875
1630	121	\N	1876
1636	121	\N	1877
1646	121	\N	1878
1656	121	\N	1879
1660	121	\N	1880
1668	121	\N	1881
1675	121	\N	1882
1695	121	\N	1883
1700	121	\N	1884
1711	121	\N	1885
1593	121	\N	1886
1601	121	\N	1887
1610	121	\N	1888
1618	121	\N	1889
1634	121	\N	1890
1644	121	\N	1891
1654	121	\N	1892
1598	121	\N	1893
1612	121	\N	1894
1622	121	\N	1895
1628	121	\N	1896
1632	121	\N	1897
1642	121	\N	1898
1652	121	\N	1899
1663	121	\N	1900
1669	121	\N	1901
1681	121	\N	1902
1684	121	\N	1903
1689	121	\N	1904
1691	121	\N	1905
1696	121	\N	1906
1697	121	\N	1907
1701	121	\N	1908
1703	121	\N	1909
1712	121	\N	1910
1716	121	\N	1911
1721	121	\N	1912
1724	121	\N	1913
1725	121	\N	1914
1726	121	\N	1915
1727	121	\N	1916
1729	121	\N	1917
1730	121	\N	1918
1731	121	\N	1919
1733	121	\N	1920
1735	121	\N	1921
1736	121	\N	1922
1738	121	\N	1923
1740	121	\N	1924
1741	121	\N	1925
1742	121	\N	1926
1744	121	\N	1927
1746	121	\N	1928
1747	121	\N	1929
1749	121	\N	1930
1751	121	\N	1931
1752	121	\N	1932
1753	121	\N	1933
1755	121	\N	1934
1756	121	\N	1935
1757	121	\N	1936
1759	121	\N	1937
1760	121	\N	1938
1761	121	\N	1939
1762	121	\N	1940
1763	121	\N	1941
1764	121	\N	1942
1765	121	\N	1943
1766	121	\N	1944
1767	121	\N	1945
1768	121	\N	1946
1769	121	\N	1947
1770	121	\N	1948
1771	121	\N	1949
1772	121	\N	1950
1773	121	\N	1951
1774	121	\N	1952
1775	121	\N	1953
1776	121	\N	1954
1777	121	\N	1955
1778	121	\N	1956
1779	121	\N	1957
1780	121	\N	1958
1781	121	\N	1959
1782	121	\N	1960
1783	121	\N	1961
1784	121	\N	1962
1785	121	\N	1963
1786	121	\N	1964
1787	121	\N	1965
1788	121	\N	1966
884	121	\N	1967
1789	121	\N	1968
1792	121	\N	1969
1793	121	\N	1970
1794	121	\N	1971
1795	121	\N	1972
1791	121	\N	1973
1790	121	\N	1974
1798	121	\N	1975
1799	121	\N	1976
1800	121	\N	1977
1801	121	\N	1978
1802	121	\N	1979
1803	121	\N	1980
1804	121	\N	1981
1805	121	\N	1982
3	122	\N	1983
1806	121	\N	1984
1807	121	\N	1985
1818	121	\N	1986
1827	121	\N	1987
4	122	\N	1988
1835	121	\N	1989
5	122	\N	1990
1808	121	\N	1991
6	122	\N	1992
1819	121	\N	1993
7	122	\N	1994
1828	121	\N	1995
8	122	\N	1996
1830	121	\N	1997
9	122	\N	1998
1809	121	\N	1999
10	122	\N	2000
1821	121	\N	2001
11	122	\N	2002
1810	121	\N	2003
12	122	\N	2004
1820	121	\N	2005
13	122	\N	2006
1829	121	\N	2007
14	122	\N	2008
1811	121	\N	2009
15	122	\N	2010
1822	121	\N	2011
17	122	\N	2012
1846	121	\N	2013
16	122	\N	2014
1859	121	\N	2015
18	122	\N	2016
1872	121	\N	2017
19	122	\N	2018
1881	121	\N	2019
20	122	\N	2020
1885	121	\N	2021
21	122	\N	2022
1893	121	\N	2023
22	122	\N	2024
1901	121	\N	2025
23	122	\N	2026
1905	121	\N	2027
24	122	\N	2028
1912	121	\N	2029
25	122	\N	2030
1812	121	\N	2031
27	122	\N	2032
1815	121	\N	2033
28	122	\N	2034
1823	121	\N	2035
29	122	\N	2036
1813	121	\N	2037
30	122	\N	2038
1814	121	\N	2039
31	122	\N	2040
1824	121	\N	2041
32	122	\N	2042
1842	121	\N	2043
33	122	\N	2044
1864	121	\N	2045
34	122	\N	2046
1870	121	\N	2047
35	122	\N	2048
1879	121	\N	2049
36	122	\N	2050
1892	121	\N	2051
37	122	\N	2052
1816	121	\N	2053
38	122	\N	2054
1825	121	\N	2055
39	122	\N	2056
1817	121	\N	2057
40	122	\N	2058
1826	121	\N	2059
1831	121	\N	2061
1832	121	\N	2063
1833	121	\N	2065
1834	121	\N	2067
1836	121	\N	2069
1837	121	\N	2071
1838	121	\N	2073
1839	121	\N	2075
1840	121	\N	2077
1843	121	\N	2079
1844	121	\N	2081
1845	121	\N	2083
1841	121	\N	2085
1847	121	\N	2087
1848	121	\N	2089
1849	121	\N	2091
1851	121	\N	2093
1852	121	\N	2095
1853	121	\N	2097
1854	121	\N	2099
1855	121	\N	2101
1856	121	\N	2103
1857	121	\N	2105
1858	121	\N	2107
1860	121	\N	2109
1861	121	\N	2111
1862	121	\N	2113
1863	121	\N	2115
1865	121	\N	2117
1866	121	\N	2119
1867	121	\N	2121
1868	121	\N	2123
1869	121	\N	2125
1871	121	\N	2127
1873	121	\N	2129
1874	121	\N	2131
1875	121	\N	2133
1877	121	\N	2135
1876	121	\N	2137
1878	121	\N	2139
1880	121	\N	2141
1882	121	\N	2143
1883	121	\N	2145
1884	121	\N	2147
1886	121	\N	2149
1887	121	\N	2151
1888	121	\N	2153
1889	121	\N	2155
1890	121	\N	2157
1891	121	\N	2159
1894	121	\N	2161
1895	121	\N	2163
1896	121	\N	2165
1897	121	\N	2167
1898	121	\N	2169
1899	121	\N	2171
1900	121	\N	2173
1902	121	\N	2175
1903	121	\N	2177
1904	121	\N	2179
1906	121	\N	2181
1907	121	\N	2183
1908	121	\N	2185
1909	121	\N	2187
1910	121	\N	2189
1911	121	\N	2191
1913	121	\N	2193
1914	121	\N	2195
1915	121	\N	2197
1916	121	\N	2199
1918	121	\N	2201
1919	121	\N	2203
1917	121	\N	2205
1920	121	\N	2207
1921	121	\N	2209
1922	121	\N	2211
1923	121	\N	2213
1924	121	\N	2215
1925	121	\N	2217
1926	121	\N	2219
1927	121	\N	2221
1928	121	\N	2223
1929	121	\N	2225
1930	121	\N	2227
1931	121	\N	2229
1932	121	\N	2231
1933	121	\N	2233
1934	121	\N	2235
1935	121	\N	2237
1936	121	\N	2239
1937	121	\N	2241
1938	121	\N	2243
1948	121	\N	2245
1958	121	\N	2247
1967	121	\N	2249
1971	121	\N	2251
1939	121	\N	2253
1940	121	\N	2255
1944	121	\N	2257
1963	121	\N	2259
1941	121	\N	2261
1942	121	\N	2263
1952	121	\N	2265
1960	121	\N	2267
1974	121	\N	2269
1946	121	\N	2271
1947	121	\N	2273
1955	121	\N	2275
1956	121	\N	2277
1964	121	\N	2279
1950	121	\N	2281
1949	121	\N	2283
1957	121	\N	2285
1965	121	\N	2287
1966	121	\N	2289
1970	121	\N	2291
1951	121	\N	2293
1961	121	\N	2295
1969	121	\N	2297
1973	121	\N	2299
1953	121	\N	2301
1959	121	\N	2303
1968	121	\N	2305
1972	121	\N	2307
1962	121	\N	2309
1975	121	\N	2311
1977	121	\N	2313
1976	121	\N	2315
1978	121	\N	2317
1979	121	\N	2319
41	122	\N	2060
42	122	\N	2062
43	122	\N	2064
44	122	\N	2066
45	122	\N	2068
46	122	\N	2070
47	122	\N	2072
48	122	\N	2074
49	122	\N	2076
50	122	\N	2078
51	122	\N	2080
52	122	\N	2082
53	122	\N	2084
54	122	\N	2086
55	122	\N	2088
56	122	\N	2090
57	122	\N	2092
58	122	\N	2094
59	122	\N	2096
60	122	\N	2098
61	122	\N	2100
62	122	\N	2102
63	122	\N	2104
64	122	\N	2106
65	122	\N	2108
66	122	\N	2110
67	122	\N	2112
68	122	\N	2114
69	122	\N	2116
70	122	\N	2118
71	122	\N	2120
72	122	\N	2122
73	122	\N	2124
74	122	\N	2126
75	122	\N	2128
76	122	\N	2130
77	122	\N	2132
78	122	\N	2134
79	122	\N	2136
80	122	\N	2138
81	122	\N	2140
82	122	\N	2142
83	122	\N	2144
84	122	\N	2146
85	122	\N	2148
86	122	\N	2150
87	122	\N	2152
88	122	\N	2154
89	122	\N	2156
90	122	\N	2158
91	122	\N	2160
92	122	\N	2162
93	122	\N	2164
94	122	\N	2166
95	122	\N	2168
96	122	\N	2170
97	122	\N	2172
98	122	\N	2174
99	122	\N	2176
100	122	\N	2178
101	122	\N	2180
102	122	\N	2182
103	122	\N	2184
104	122	\N	2186
105	122	\N	2188
106	122	\N	2190
107	122	\N	2192
108	122	\N	2194
109	122	\N	2196
110	122	\N	2198
111	122	\N	2200
112	122	\N	2202
113	122	\N	2204
114	122	\N	2206
115	122	\N	2208
116	122	\N	2210
117	122	\N	2212
118	122	\N	2214
119	122	\N	2216
120	122	\N	2218
121	122	\N	2220
122	122	\N	2222
123	122	\N	2224
124	122	\N	2226
125	122	\N	2228
126	122	\N	2230
127	122	\N	2232
128	122	\N	2234
129	122	\N	2236
130	122	\N	2238
131	122	\N	2240
132	122	\N	2242
133	122	\N	2244
134	122	\N	2246
135	122	\N	2248
136	122	\N	2250
137	122	\N	2252
138	122	\N	2254
139	122	\N	2256
140	122	\N	2258
141	122	\N	2260
142	122	\N	2262
143	122	\N	2264
144	122	\N	2266
145	122	\N	2268
146	122	\N	2270
147	122	\N	2272
148	122	\N	2274
149	122	\N	2276
150	122	\N	2278
151	122	\N	2280
153	122	\N	2282
152	122	\N	2284
154	122	\N	2286
155	122	\N	2288
156	122	\N	2290
157	122	\N	2292
158	122	\N	2294
159	122	\N	2296
160	122	\N	2298
161	122	\N	2300
162	122	\N	2302
163	122	\N	2304
164	122	\N	2306
165	122	\N	2308
166	122	\N	2310
167	122	\N	2312
168	122	\N	2314
169	122	\N	2316
170	122	\N	2318
171	122	\N	2320
172	122	\N	2321
173	122	\N	2322
174	122	\N	2323
175	122	\N	2324
176	122	\N	2325
177	122	\N	2326
178	122	\N	2327
179	122	\N	2328
180	122	\N	2329
181	122	\N	2330
182	122	\N	2331
183	122	\N	2332
184	122	\N	2333
185	122	\N	2334
186	122	\N	2335
187	122	\N	2336
188	122	\N	2337
189	122	\N	2338
190	122	\N	2339
191	122	\N	2340
236	122	\N	2341
237	122	\N	2342
247	122	\N	2343
192	122	\N	2344
205	122	\N	2345
214	122	\N	2346
220	122	\N	2347
229	122	\N	2348
240	122	\N	2349
193	122	\N	2350
206	122	\N	2351
221	122	\N	2352
230	122	\N	2353
241	122	\N	2354
194	122	\N	2355
198	122	\N	2356
207	122	\N	2357
222	122	\N	2358
231	122	\N	2359
242	122	\N	2360
195	122	\N	2361
199	122	\N	2362
208	122	\N	2363
223	122	\N	2364
232	122	\N	2365
243	122	\N	2366
196	122	\N	2367
200	122	\N	2368
209	122	\N	2369
224	122	\N	2370
233	122	\N	2371
234	122	\N	2372
244	122	\N	2373
197	122	\N	2374
202	122	\N	2375
211	122	\N	2376
215	122	\N	2377
217	122	\N	2378
226	122	\N	2379
246	122	\N	2380
201	122	\N	2381
210	122	\N	2382
216	122	\N	2383
225	122	\N	2384
235	122	\N	2385
245	122	\N	2386
203	122	\N	2387
212	122	\N	2388
218	122	\N	2389
227	122	\N	2390
238	122	\N	2391
204	122	\N	2392
213	122	\N	2393
219	122	\N	2394
228	122	\N	2395
239	122	\N	2396
248	122	\N	2397
249	122	\N	2398
250	122	\N	2399
251	122	\N	2400
252	122	\N	2401
253	122	\N	2402
254	122	\N	2403
255	122	\N	2404
256	122	\N	2405
257	122	\N	2406
258	122	\N	2407
259	122	\N	2408
260	122	\N	2409
261	122	\N	2410
262	122	\N	2411
263	122	\N	2412
264	122	\N	2413
265	122	\N	2414
266	122	\N	2415
267	122	\N	2416
268	122	\N	2417
269	122	\N	2418
270	122	\N	2419
271	122	\N	2420
272	122	\N	2421
273	122	\N	2422
274	122	\N	2423
275	122	\N	2424
276	122	\N	2425
277	122	\N	2426
278	122	\N	2427
279	122	\N	2428
280	122	\N	2429
281	122	\N	2430
282	122	\N	2431
283	122	\N	2432
284	122	\N	2433
285	122	\N	2434
1943	122	\N	2435
286	122	\N	2436
287	122	\N	2437
288	122	\N	2438
289	122	\N	2439
290	122	\N	2440
291	122	\N	2441
292	122	\N	2442
293	122	\N	2443
294	122	\N	2444
295	122	\N	2445
296	122	\N	2446
297	122	\N	2447
298	122	\N	2448
299	122	\N	2449
300	122	\N	2450
301	122	\N	2451
302	122	\N	2452
303	122	\N	2453
304	122	\N	2454
305	122	\N	2455
306	122	\N	2456
307	122	\N	2457
308	122	\N	2458
309	122	\N	2459
310	122	\N	2460
311	122	\N	2461
312	122	\N	2462
313	122	\N	2463
314	122	\N	2464
315	122	\N	2465
316	122	\N	2466
317	122	\N	2467
318	122	\N	2468
319	122	\N	2469
320	122	\N	2470
321	122	\N	2471
322	122	\N	2472
323	122	\N	2473
324	122	\N	2474
325	122	\N	2475
326	122	\N	2476
327	122	\N	2477
328	122	\N	2478
329	122	\N	2479
330	122	\N	2480
331	122	\N	2481
332	122	\N	2482
333	122	\N	2483
334	122	\N	2484
335	122	\N	2485
336	122	\N	2486
337	122	\N	2487
338	122	\N	2488
339	122	\N	2489
340	122	\N	2490
347	122	\N	2491
356	122	\N	2492
364	122	\N	2493
371	122	\N	2494
373	122	\N	2495
374	122	\N	2496
392	122	\N	2497
403	122	\N	2498
341	122	\N	2499
358	122	\N	2500
359	122	\N	2501
367	122	\N	2502
390	122	\N	2503
400	122	\N	2504
401	122	\N	2505
342	122	\N	2506
343	122	\N	2507
350	122	\N	2508
368	122	\N	2509
377	122	\N	2510
386	122	\N	2511
395	122	\N	2512
396	122	\N	2513
406	122	\N	2514
344	122	\N	2515
353	122	\N	2516
360	122	\N	2517
361	122	\N	2518
378	122	\N	2519
397	122	\N	2520
345	122	\N	2521
354	122	\N	2522
362	122	\N	2523
370	122	\N	2524
346	122	\N	2525
355	122	\N	2526
363	122	\N	2527
381	122	\N	2528
389	122	\N	2529
399	122	\N	2530
408	122	\N	2531
348	122	\N	2532
349	122	\N	2533
351	122	\N	2534
352	122	\N	2535
357	122	\N	2536
369	122	\N	2537
379	122	\N	2538
380	122	\N	2539
387	122	\N	2540
388	122	\N	2541
398	122	\N	2542
407	122	\N	2543
365	122	\N	2544
366	122	\N	2545
372	122	\N	2546
375	122	\N	2547
376	122	\N	2548
382	122	\N	2549
383	122	\N	2550
384	122	\N	2551
385	122	\N	2552
391	122	\N	2553
393	122	\N	2554
394	122	\N	2555
402	122	\N	2556
404	122	\N	2557
405	122	\N	2558
409	122	\N	2559
410	122	\N	2560
411	122	\N	2561
412	122	\N	2562
413	122	\N	2563
414	122	\N	2564
415	122	\N	2565
416	122	\N	2566
417	122	\N	2567
418	122	\N	2568
419	122	\N	2569
420	122	\N	2570
421	122	\N	2571
422	122	\N	2572
423	122	\N	2573
424	122	\N	2574
425	122	\N	2575
426	122	\N	2576
427	122	\N	2577
428	122	\N	2578
429	122	\N	2579
430	122	\N	2580
431	122	\N	2581
432	122	\N	2582
433	122	\N	2583
434	122	\N	2584
435	122	\N	2585
436	122	\N	2586
437	122	\N	2587
438	122	\N	2588
439	122	\N	2589
440	122	\N	2590
441	122	\N	2591
442	122	\N	2592
443	122	\N	2593
444	122	\N	2594
445	122	\N	2595
446	122	\N	2596
447	122	\N	2597
448	122	\N	2598
449	122	\N	2599
450	122	\N	2600
451	122	\N	2601
452	122	\N	2602
453	122	\N	2603
454	122	\N	2604
455	122	\N	2605
456	122	\N	2606
457	122	\N	2607
458	122	\N	2608
459	122	\N	2609
460	122	\N	2610
461	122	\N	2611
462	122	\N	2612
463	122	\N	2613
464	122	\N	2614
465	122	\N	2615
466	122	\N	2616
467	122	\N	2617
468	122	\N	2618
469	122	\N	2619
470	122	\N	2620
471	122	\N	2621
472	122	\N	2622
473	122	\N	2623
474	122	\N	2624
1945	122	\N	2625
475	122	\N	2626
476	122	\N	2627
477	122	\N	2628
478	122	\N	2629
479	122	\N	2630
480	122	\N	2631
481	122	\N	2632
482	122	\N	2633
483	122	\N	2634
484	122	\N	2635
487	122	\N	2636
485	122	\N	2637
486	122	\N	2638
493	122	\N	2639
488	122	\N	2640
489	122	\N	2641
490	122	\N	2642
491	122	\N	2643
492	122	\N	2644
494	122	\N	2645
495	122	\N	2646
496	122	\N	2647
497	122	\N	2648
498	122	\N	2649
499	122	\N	2650
500	122	\N	2651
501	122	\N	2652
502	122	\N	2653
503	122	\N	2654
504	122	\N	2655
505	122	\N	2656
506	122	\N	2657
507	122	\N	2658
508	122	\N	2659
509	122	\N	2660
510	122	\N	2661
511	122	\N	2662
512	122	\N	2663
513	122	\N	2664
514	122	\N	2665
515	122	\N	2666
516	122	\N	2667
517	122	\N	2668
518	122	\N	2669
519	122	\N	2670
520	122	\N	2671
521	122	\N	2672
522	122	\N	2673
524	122	\N	2674
525	122	\N	2675
526	122	\N	2676
527	122	\N	2677
528	122	\N	2678
529	122	\N	2679
530	122	\N	2680
531	122	\N	2681
532	122	\N	2682
533	122	\N	2683
534	122	\N	2684
535	122	\N	2685
536	122	\N	2686
537	122	\N	2687
538	122	\N	2688
539	122	\N	2689
540	122	\N	2690
541	122	\N	2691
542	122	\N	2692
543	122	\N	2693
544	122	\N	2694
545	122	\N	2695
546	122	\N	2696
547	122	\N	2697
548	122	\N	2698
549	122	\N	2699
550	122	\N	2700
551	122	\N	2701
552	122	\N	2702
553	122	\N	2703
554	122	\N	2704
555	122	\N	2705
556	122	\N	2706
557	122	\N	2707
558	122	\N	2708
559	122	\N	2709
560	122	\N	2710
561	122	\N	2711
563	122	\N	2712
564	122	\N	2713
562	122	\N	2714
565	122	\N	2715
566	122	\N	2716
567	122	\N	2717
568	122	\N	2718
569	122	\N	2719
570	122	\N	2720
571	122	\N	2721
572	122	\N	2722
573	122	\N	2723
574	122	\N	2724
575	122	\N	2725
576	122	\N	2726
577	122	\N	2727
578	122	\N	2728
579	122	\N	2729
589	122	\N	2730
580	122	\N	2731
590	122	\N	2732
581	122	\N	2733
591	122	\N	2734
582	122	\N	2735
592	122	\N	2736
583	122	\N	2737
585	122	\N	2738
584	122	\N	2739
586	122	\N	2740
587	122	\N	2741
588	122	\N	2742
593	122	\N	2743
594	122	\N	2744
595	122	\N	2745
596	122	\N	2746
597	122	\N	2747
598	122	\N	2748
599	122	\N	2749
600	122	\N	2750
601	122	\N	2751
602	122	\N	2752
603	122	\N	2753
604	122	\N	2754
605	122	\N	2755
606	122	\N	2756
607	122	\N	2757
608	122	\N	2758
609	122	\N	2759
610	122	\N	2760
611	122	\N	2761
612	122	\N	2762
613	122	\N	2763
614	122	\N	2764
615	122	\N	2765
616	122	\N	2766
617	122	\N	2767
618	122	\N	2768
619	122	\N	2769
620	122	\N	2770
621	122	\N	2771
624	122	\N	2772
626	122	\N	2773
625	122	\N	2774
628	122	\N	2775
622	122	\N	2776
623	122	\N	2777
627	122	\N	2778
629	122	\N	2779
630	122	\N	2780
631	122	\N	2781
632	122	\N	2782
633	122	\N	2783
634	122	\N	2784
635	122	\N	2785
636	122	\N	2786
637	122	\N	2787
638	122	\N	2788
639	122	\N	2789
640	122	\N	2790
641	122	\N	2791
642	122	\N	2792
643	122	\N	2793
644	122	\N	2794
645	122	\N	2795
646	122	\N	2796
647	122	\N	2797
648	122	\N	2798
649	122	\N	2799
650	122	\N	2800
1954	122	\N	2801
652	122	\N	2802
653	122	\N	2803
654	122	\N	2804
655	122	\N	2805
656	122	\N	2806
657	122	\N	2807
658	122	\N	2808
659	122	\N	2809
660	122	\N	2810
661	122	\N	2811
662	122	\N	2812
663	122	\N	2813
664	122	\N	2814
651	122	\N	2815
665	122	\N	2816
666	122	\N	2817
667	122	\N	2818
668	122	\N	2819
669	122	\N	2820
670	122	\N	2821
671	122	\N	2822
672	122	\N	2823
673	122	\N	2824
674	122	\N	2825
675	122	\N	2826
676	122	\N	2827
677	122	\N	2828
678	122	\N	2829
679	122	\N	2830
680	122	\N	2831
681	122	\N	2832
682	122	\N	2833
683	122	\N	2834
684	122	\N	2835
699	122	\N	2836
685	122	\N	2837
694	122	\N	2838
686	122	\N	2839
690	122	\N	2840
695	122	\N	2841
687	122	\N	2842
688	122	\N	2843
689	122	\N	2844
691	122	\N	2845
693	122	\N	2846
696	122	\N	2847
698	122	\N	2848
692	122	\N	2849
697	122	\N	2850
700	122	\N	2851
701	122	\N	2852
702	122	\N	2853
703	122	\N	2854
704	122	\N	2855
705	122	\N	2856
706	122	\N	2857
707	122	\N	2858
708	122	\N	2859
709	122	\N	2860
710	122	\N	2861
711	122	\N	2862
712	122	\N	2863
713	122	\N	2864
714	122	\N	2865
715	122	\N	2866
716	122	\N	2867
717	122	\N	2868
718	122	\N	2869
719	122	\N	2870
720	122	\N	2871
721	122	\N	2872
722	122	\N	2873
723	122	\N	2874
725	122	\N	2875
724	122	\N	2876
726	122	\N	2877
727	122	\N	2878
728	122	\N	2879
729	122	\N	2880
730	122	\N	2881
731	122	\N	2882
732	122	\N	2883
733	122	\N	2884
734	122	\N	2885
735	122	\N	2886
736	122	\N	2887
737	122	\N	2888
738	122	\N	2889
739	122	\N	2890
740	122	\N	2891
741	122	\N	2892
742	122	\N	2893
743	122	\N	2894
744	122	\N	2895
745	122	\N	2896
746	122	\N	2897
747	122	\N	2898
748	122	\N	2899
749	122	\N	2900
750	122	\N	2901
751	122	\N	2902
752	122	\N	2903
753	122	\N	2904
754	122	\N	2905
755	122	\N	2906
756	122	\N	2907
757	122	\N	2908
758	122	\N	2909
759	122	\N	2910
760	122	\N	2911
761	122	\N	2912
762	122	\N	2913
763	122	\N	2914
764	122	\N	2915
765	122	\N	2916
766	122	\N	2917
767	122	\N	2918
768	122	\N	2919
769	122	\N	2920
770	122	\N	2921
771	122	\N	2922
772	122	\N	2923
773	122	\N	2924
774	122	\N	2925
775	122	\N	2926
776	122	\N	2927
777	122	\N	2928
778	122	\N	2929
779	122	\N	2930
780	122	\N	2931
781	122	\N	2932
782	122	\N	2933
783	122	\N	2934
784	122	\N	2935
785	122	\N	2936
786	122	\N	2937
787	122	\N	2938
788	122	\N	2939
789	122	\N	2940
790	122	\N	2941
791	122	\N	2942
792	122	\N	2943
804	122	\N	2944
805	122	\N	2945
813	122	\N	2946
793	122	\N	2947
794	122	\N	2948
795	122	\N	2949
796	122	\N	2950
797	122	\N	2951
798	122	\N	2952
799	122	\N	2953
800	122	\N	2954
801	122	\N	2955
802	122	\N	2956
803	122	\N	2957
806	122	\N	2958
807	122	\N	2959
808	122	\N	2960
809	122	\N	2961
810	122	\N	2962
811	122	\N	2963
812	122	\N	2964
814	122	\N	2965
816	122	\N	2966
817	122	\N	2967
815	122	\N	2968
818	122	\N	2969
819	122	\N	2970
820	122	\N	2971
821	122	\N	2972
822	122	\N	2973
823	122	\N	2974
826	122	\N	2975
827	122	\N	2976
828	122	\N	2977
829	122	\N	2978
830	122	\N	2979
831	122	\N	2980
832	122	\N	2981
833	122	\N	2982
834	122	\N	2983
836	122	\N	2984
837	122	\N	2985
824	122	\N	2986
839	122	\N	2987
842	122	\N	2988
843	122	\N	2989
844	122	\N	2990
852	122	\N	2991
857	122	\N	2992
860	122	\N	2993
864	122	\N	2994
865	122	\N	2995
866	122	\N	2996
870	122	\N	2997
871	122	\N	2998
872	122	\N	2999
873	122	\N	3000
874	122	\N	3001
875	122	\N	3002
876	122	\N	3003
877	122	\N	3004
878	122	\N	3005
879	122	\N	3006
880	122	\N	3007
881	122	\N	3008
882	122	\N	3009
883	122	\N	3010
886	122	\N	3011
825	122	\N	3012
840	122	\N	3013
845	122	\N	3014
846	122	\N	3015
850	122	\N	3016
851	122	\N	3017
853	122	\N	3018
854	122	\N	3019
855	122	\N	3020
856	122	\N	3021
858	122	\N	3022
849	122	\N	3023
859	122	\N	3024
861	122	\N	3025
862	122	\N	3026
863	122	\N	3027
867	122	\N	3028
868	122	\N	3029
869	122	\N	3030
887	122	\N	3031
838	122	\N	3032
841	122	\N	3033
888	122	\N	3034
889	122	\N	3035
890	122	\N	3036
891	122	\N	3037
892	122	\N	3038
893	122	\N	3039
894	122	\N	3040
895	122	\N	3041
896	122	\N	3042
897	122	\N	3043
898	122	\N	3044
899	122	\N	3045
900	122	\N	3046
901	122	\N	3047
902	122	\N	3048
903	122	\N	3049
905	122	\N	3050
906	122	\N	3051
907	122	\N	3052
908	122	\N	3053
909	122	\N	3054
910	122	\N	3055
911	122	\N	3056
912	122	\N	3057
904	122	\N	3058
913	122	\N	3059
914	122	\N	3060
915	122	\N	3061
916	122	\N	3062
917	122	\N	3063
885	122	\N	3064
918	122	\N	3065
919	122	\N	3066
920	122	\N	3067
921	122	\N	3068
930	122	\N	3069
931	122	\N	3070
932	122	\N	3071
933	122	\N	3072
934	122	\N	3073
935	122	\N	3074
936	122	\N	3075
937	122	\N	3076
938	122	\N	3077
939	122	\N	3078
940	122	\N	3079
941	122	\N	3080
942	122	\N	3081
943	122	\N	3082
944	122	\N	3083
945	122	\N	3084
946	122	\N	3085
947	122	\N	3086
948	122	\N	3087
949	122	\N	3088
989	122	\N	3089
990	122	\N	3090
991	122	\N	3091
997	122	\N	3092
998	122	\N	3093
1000	122	\N	3094
996	122	\N	3095
999	122	\N	3096
1001	122	\N	3097
1002	122	\N	3098
1003	122	\N	3099
923	122	\N	3100
1016	122	\N	3101
1018	122	\N	3102
1080	122	\N	3103
1081	122	\N	3104
1082	122	\N	3105
924	122	\N	3106
1017	122	\N	3107
1019	122	\N	3108
1020	122	\N	3109
1021	122	\N	3110
1022	122	\N	3111
1023	122	\N	3112
1024	122	\N	3113
1025	122	\N	3114
1029	122	\N	3115
1030	122	\N	3116
1031	122	\N	3117
1032	122	\N	3118
1033	122	\N	3119
1034	122	\N	3120
1035	122	\N	3121
1036	122	\N	3122
1037	122	\N	3123
1038	122	\N	3124
922	122	\N	3125
1048	122	\N	3126
1049	122	\N	3127
1050	122	\N	3128
1051	122	\N	3129
1052	122	\N	3130
1053	122	\N	3131
1054	122	\N	3132
1055	122	\N	3133
1056	122	\N	3134
1057	122	\N	3135
1058	122	\N	3136
1059	122	\N	3137
1060	122	\N	3138
1061	122	\N	3139
1062	122	\N	3140
1063	122	\N	3141
1064	122	\N	3142
1065	122	\N	3143
1066	122	\N	3144
1068	122	\N	3145
1069	122	\N	3146
1070	122	\N	3147
1071	122	\N	3148
1072	122	\N	3149
1073	122	\N	3150
1074	122	\N	3151
1075	122	\N	3152
1077	122	\N	3153
1078	122	\N	3154
1076	122	\N	3155
1079	122	\N	3156
1083	122	\N	3157
1084	122	\N	3158
1085	122	\N	3159
1086	122	\N	3160
1087	122	\N	3161
1088	122	\N	3162
1089	122	\N	3163
1090	122	\N	3164
1091	122	\N	3165
1092	122	\N	3166
1093	122	\N	3167
1094	122	\N	3168
1095	122	\N	3169
1096	122	\N	3170
1097	122	\N	3171
1098	122	\N	3172
1099	122	\N	3173
1100	122	\N	3174
1101	122	\N	3175
1102	122	\N	3176
1103	122	\N	3177
1104	122	\N	3178
1105	122	\N	3179
1107	122	\N	3180
1115	122	\N	3181
1121	122	\N	3182
1127	122	\N	3183
1135	122	\N	3184
1106	122	\N	3185
1111	122	\N	3186
1108	122	\N	3187
1112	122	\N	3188
1120	122	\N	3189
1145	122	\N	3190
1150	122	\N	3191
1159	122	\N	3192
1168	122	\N	3193
1184	122	\N	3194
1192	122	\N	3195
1109	122	\N	3196
1124	122	\N	3197
1134	122	\N	3198
1138	122	\N	3199
1143	122	\N	3200
1157	122	\N	3201
1166	122	\N	3202
1176	122	\N	3203
1182	122	\N	3204
1190	122	\N	3205
1199	122	\N	3206
1110	122	\N	3207
1113	122	\N	3208
1116	122	\N	3209
1125	122	\N	3210
1130	122	\N	3211
1146	122	\N	3212
1151	122	\N	3213
1160	122	\N	3214
1169	122	\N	3215
1186	122	\N	3216
1194	122	\N	3217
1114	122	\N	3218
1117	122	\N	3219
1126	122	\N	3220
1131	122	\N	3221
1132	122	\N	3222
1137	122	\N	3223
1139	122	\N	3224
1142	122	\N	3225
1144	122	\N	3226
1155	122	\N	3227
1156	122	\N	3228
1164	122	\N	3229
1165	122	\N	3230
1174	122	\N	3231
1175	122	\N	3232
1180	122	\N	3233
1181	122	\N	3234
1188	122	\N	3235
1189	122	\N	3236
1198	122	\N	3237
1118	122	\N	3238
1119	122	\N	3239
1122	122	\N	3240
1123	122	\N	3241
1128	122	\N	3242
1129	122	\N	3243
1133	122	\N	3244
1136	122	\N	3245
1140	122	\N	3246
1141	122	\N	3247
1147	122	\N	3248
1148	122	\N	3249
1149	122	\N	3250
1152	122	\N	3251
1153	122	\N	3252
1154	122	\N	3253
1158	122	\N	3254
1161	122	\N	3255
1162	122	\N	3256
1163	122	\N	3257
1167	122	\N	3258
1170	122	\N	3259
1171	122	\N	3260
1172	122	\N	3261
1173	122	\N	3262
1177	122	\N	3263
1178	122	\N	3264
1179	122	\N	3265
1235	122	\N	3266
1183	122	\N	3267
1236	122	\N	3268
1185	122	\N	3269
1237	122	\N	3270
1187	122	\N	3271
1191	122	\N	3272
1193	122	\N	3273
1195	122	\N	3274
1197	122	\N	3275
1196	122	\N	3276
1200	122	\N	3277
1201	122	\N	3278
1202	122	\N	3279
1203	122	\N	3280
1204	122	\N	3281
1205	122	\N	3282
1206	122	\N	3283
1207	122	\N	3284
1208	122	\N	3285
1209	122	\N	3286
1210	122	\N	3287
1211	122	\N	3288
1212	122	\N	3289
1213	122	\N	3290
1214	122	\N	3291
1215	122	\N	3292
1216	122	\N	3293
1217	122	\N	3294
1218	122	\N	3295
1219	122	\N	3296
1220	122	\N	3297
1221	122	\N	3298
1222	122	\N	3299
1224	122	\N	3300
1225	122	\N	3301
1226	122	\N	3302
1227	122	\N	3303
1228	122	\N	3304
1229	122	\N	3305
1230	122	\N	3306
1231	122	\N	3307
1232	122	\N	3308
1233	122	\N	3309
1223	122	\N	3310
1234	122	\N	3311
1238	122	\N	3312
1239	122	\N	3313
1240	122	\N	3314
1241	122	\N	3315
1242	122	\N	3316
1243	122	\N	3317
1244	122	\N	3318
1245	122	\N	3319
1246	122	\N	3320
1247	122	\N	3321
1248	122	\N	3322
1249	122	\N	3323
1250	122	\N	3324
1251	122	\N	3325
1252	122	\N	3326
1253	122	\N	3327
1254	122	\N	3328
1266	122	\N	3329
1278	122	\N	3330
1288	122	\N	3331
1297	122	\N	3332
1306	122	\N	3333
1315	122	\N	3334
1325	122	\N	3335
1334	122	\N	3336
1255	122	\N	3337
1261	122	\N	3338
1270	122	\N	3339
1282	122	\N	3340
1291	122	\N	3341
1301	122	\N	3342
1309	122	\N	3343
1319	122	\N	3344
1329	122	\N	3345
1338	122	\N	3346
1340	122	\N	3347
1350	122	\N	3348
1357	122	\N	3349
1256	122	\N	3350
1262	122	\N	3351
1271	122	\N	3352
1274	122	\N	3353
1284	122	\N	3354
1293	122	\N	3355
1303	122	\N	3356
1311	122	\N	3357
1321	122	\N	3358
1331	122	\N	3359
1345	122	\N	3360
1349	122	\N	3361
1356	122	\N	3362
1257	122	\N	3363
1267	122	\N	3364
1279	122	\N	3365
1298	122	\N	3366
1307	122	\N	3367
1316	122	\N	3368
1326	122	\N	3369
1335	122	\N	3370
1339	122	\N	3371
1344	122	\N	3372
1353	122	\N	3373
1363	122	\N	3374
1258	122	\N	3375
1268	122	\N	3376
1281	122	\N	3377
1290	122	\N	3378
1300	122	\N	3379
1308	122	\N	3380
1318	122	\N	3381
1328	122	\N	3382
1337	122	\N	3383
1259	122	\N	3384
1269	122	\N	3385
1273	122	\N	3386
1283	122	\N	3387
1292	122	\N	3388
1302	122	\N	3389
1310	122	\N	3390
1320	122	\N	3391
1330	122	\N	3392
1260	122	\N	3393
1280	122	\N	3394
1289	122	\N	3395
1299	122	\N	3396
1317	122	\N	3397
1327	122	\N	3398
1336	122	\N	3399
1346	122	\N	3400
1263	122	\N	3401
1272	122	\N	3402
1275	122	\N	3403
1285	122	\N	3404
1294	122	\N	3405
1304	122	\N	3406
1312	122	\N	3407
1322	122	\N	3408
1332	122	\N	3409
1341	122	\N	3410
1264	122	\N	3411
1276	122	\N	3412
1286	122	\N	3413
1295	122	\N	3414
1305	122	\N	3415
1313	122	\N	3416
1323	122	\N	3417
1343	122	\N	3418
1265	122	\N	3419
1277	122	\N	3420
1287	122	\N	3421
1296	122	\N	3422
1314	122	\N	3423
1324	122	\N	3424
1333	122	\N	3425
1342	122	\N	3426
1347	122	\N	3427
1348	122	\N	3428
1351	122	\N	3429
1415	122	\N	3430
1352	122	\N	3431
1354	122	\N	3432
1355	122	\N	3433
1358	122	\N	3434
1359	122	\N	3435
1360	122	\N	3436
1361	122	\N	3437
1362	122	\N	3438
1364	122	\N	3439
1365	122	\N	3440
1367	122	\N	3441
1369	122	\N	3442
1370	122	\N	3443
1416	122	\N	3444
1366	122	\N	3445
1368	122	\N	3446
1371	122	\N	3447
1372	122	\N	3448
1373	122	\N	3449
1374	122	\N	3450
1375	122	\N	3451
1376	122	\N	3452
1377	122	\N	3453
1378	122	\N	3454
1379	122	\N	3455
1382	122	\N	3456
1383	122	\N	3457
1384	122	\N	3458
1385	122	\N	3459
1386	122	\N	3460
1387	122	\N	3461
1388	122	\N	3462
1389	122	\N	3463
1390	122	\N	3464
1391	122	\N	3465
1392	122	\N	3466
1393	122	\N	3467
1394	122	\N	3468
1395	122	\N	3469
1396	122	\N	3470
1397	122	\N	3471
1398	122	\N	3472
1400	122	\N	3473
1399	122	\N	3474
1401	122	\N	3475
1402	122	\N	3476
1403	122	\N	3477
1404	122	\N	3478
1405	122	\N	3479
1406	122	\N	3480
1407	122	\N	3481
1408	122	\N	3482
1409	122	\N	3483
1410	122	\N	3484
1411	122	\N	3485
1412	122	\N	3486
1413	122	\N	3487
1414	122	\N	3488
1417	122	\N	3489
1418	122	\N	3490
1419	122	\N	3491
1420	122	\N	3492
1421	122	\N	3493
1422	122	\N	3494
1423	122	\N	3495
1424	122	\N	3496
1425	122	\N	3497
1426	122	\N	3498
1428	122	\N	3499
1427	122	\N	3500
1429	122	\N	3501
1430	122	\N	3502
1431	122	\N	3503
1432	122	\N	3504
1433	122	\N	3505
1438	122	\N	3506
1448	122	\N	3507
1458	122	\N	3508
1468	122	\N	3509
1478	122	\N	3510
1434	122	\N	3511
1439	122	\N	3512
1449	122	\N	3513
1459	122	\N	3514
1469	122	\N	3515
1479	122	\N	3516
1489	122	\N	3517
1503	122	\N	3518
1513	122	\N	3519
1522	122	\N	3520
1530	122	\N	3521
1540	122	\N	3522
1542	122	\N	3523
1552	122	\N	3524
1435	122	\N	3525
1445	122	\N	3526
1455	122	\N	3527
1465	122	\N	3528
1475	122	\N	3529
1436	122	\N	3530
1446	122	\N	3531
1456	122	\N	3532
1466	122	\N	3533
1476	122	\N	3534
1437	122	\N	3535
1447	122	\N	3536
1457	122	\N	3537
1467	122	\N	3538
1477	122	\N	3539
1486	122	\N	3540
1493	122	\N	3541
1498	122	\N	3542
1516	122	\N	3543
1525	122	\N	3544
1532	122	\N	3545
1543	122	\N	3546
1553	122	\N	3547
1440	122	\N	3548
1450	122	\N	3549
1460	122	\N	3550
1470	122	\N	3551
1480	122	\N	3552
1441	122	\N	3553
1451	122	\N	3554
1461	122	\N	3555
1471	122	\N	3556
1481	122	\N	3557
1442	122	\N	3558
1452	122	\N	3559
1462	122	\N	3560
1472	122	\N	3561
1443	122	\N	3562
1453	122	\N	3563
1463	122	\N	3564
1473	122	\N	3565
1482	122	\N	3566
1444	122	\N	3567
1454	122	\N	3568
1464	122	\N	3569
1474	122	\N	3570
1483	122	\N	3571
1484	122	\N	3572
1485	122	\N	3573
1487	122	\N	3574
1488	122	\N	3575
1490	122	\N	3576
1491	122	\N	3577
1492	122	\N	3578
1494	122	\N	3579
1495	122	\N	3580
1496	122	\N	3581
1497	122	\N	3582
1499	122	\N	3583
1500	122	\N	3584
1501	122	\N	3585
1502	122	\N	3586
1504	122	\N	3587
1505	122	\N	3588
1506	122	\N	3589
1507	122	\N	3590
1508	122	\N	3591
1509	122	\N	3592
1510	122	\N	3593
1511	122	\N	3594
1512	122	\N	3595
1514	122	\N	3596
1515	122	\N	3597
1517	122	\N	3598
1518	122	\N	3599
1519	122	\N	3600
1520	122	\N	3601
1521	122	\N	3602
1523	122	\N	3603
1524	122	\N	3604
1526	122	\N	3605
1527	122	\N	3606
1528	122	\N	3607
1529	122	\N	3608
1531	122	\N	3609
1533	122	\N	3610
1534	122	\N	3611
1535	122	\N	3612
1536	122	\N	3613
1537	122	\N	3614
1538	122	\N	3615
1539	122	\N	3616
1541	122	\N	3617
1544	122	\N	3618
1545	122	\N	3619
1546	122	\N	3620
1547	122	\N	3621
1548	122	\N	3622
1549	122	\N	3623
1550	122	\N	3624
1551	122	\N	3625
1554	122	\N	3626
1555	122	\N	3627
1556	122	\N	3628
1557	122	\N	3629
1558	122	\N	3630
1559	122	\N	3631
1560	122	\N	3632
1561	122	\N	3633
1562	122	\N	3634
1563	122	\N	3635
1564	122	\N	3636
1565	122	\N	3637
1566	122	\N	3638
1567	122	\N	3639
1568	122	\N	3640
1569	122	\N	3641
1570	122	\N	3642
1571	122	\N	3643
1572	122	\N	3644
1573	122	\N	3645
1575	122	\N	3646
1576	122	\N	3647
1577	122	\N	3648
1578	122	\N	3649
1579	122	\N	3650
1580	122	\N	3651
1581	122	\N	3652
1582	122	\N	3653
1583	122	\N	3654
1584	122	\N	3655
1590	122	\N	3656
1599	122	\N	3657
1604	122	\N	3658
1609	122	\N	3659
1615	122	\N	3660
1629	122	\N	3661
1641	122	\N	3662
1651	122	\N	3663
1664	122	\N	3664
1670	122	\N	3665
1677	122	\N	3666
1685	122	\N	3667
1692	122	\N	3668
1709	122	\N	3669
1718	122	\N	3670
1722	122	\N	3671
1734	122	\N	3672
1743	122	\N	3673
1750	122	\N	3674
1585	122	\N	3675
1594	122	\N	3676
1606	122	\N	3677
1616	122	\N	3678
1635	122	\N	3679
1645	122	\N	3680
1655	122	\N	3681
1661	122	\N	3682
1667	122	\N	3683
1674	122	\N	3684
1682	122	\N	3685
1690	122	\N	3686
1574	122	\N	3687
1704	122	\N	3688
1586	122	\N	3689
1607	122	\N	3690
1611	122	\N	3691
1620	122	\N	3692
1637	122	\N	3693
1647	122	\N	3694
1657	122	\N	3695
1662	122	\N	3696
1676	122	\N	3697
1683	122	\N	3698
1699	122	\N	3699
1706	122	\N	3700
1710	122	\N	3701
1715	122	\N	3702
1719	122	\N	3703
1587	122	\N	3704
1595	122	\N	3705
1602	122	\N	3706
1619	122	\N	3707
1626	122	\N	3708
1638	122	\N	3709
1648	122	\N	3710
1688	122	\N	3711
1717	122	\N	3712
1588	122	\N	3713
1596	122	\N	3714
1608	122	\N	3715
1613	122	\N	3716
1623	122	\N	3717
1631	122	\N	3718
1640	122	\N	3719
1650	122	\N	3720
1658	122	\N	3721
1665	122	\N	3722
1671	122	\N	3723
1678	122	\N	3724
1686	122	\N	3725
1693	122	\N	3726
1698	122	\N	3727
1705	122	\N	3728
1714	122	\N	3729
1728	122	\N	3730
1748	122	\N	3731
1758	122	\N	3732
1589	122	\N	3733
1597	122	\N	3734
1603	122	\N	3735
1621	122	\N	3736
1627	122	\N	3737
1639	122	\N	3738
1649	122	\N	3739
1666	122	\N	3740
1672	122	\N	3741
1679	122	\N	3742
1687	122	\N	3743
1694	122	\N	3744
1702	122	\N	3745
1708	122	\N	3746
1713	122	\N	3747
1591	122	\N	3748
1600	122	\N	3749
1614	122	\N	3750
1624	122	\N	3751
1633	122	\N	3752
1643	122	\N	3753
1653	122	\N	3754
1659	122	\N	3755
1673	122	\N	3756
1680	122	\N	3757
1707	122	\N	3758
1720	122	\N	3759
1723	122	\N	3760
1732	122	\N	3761
1737	122	\N	3762
1739	122	\N	3763
1745	122	\N	3764
1754	122	\N	3765
1592	122	\N	3766
1605	122	\N	3767
1617	122	\N	3768
1625	122	\N	3769
1630	122	\N	3770
1636	122	\N	3771
1646	122	\N	3772
1656	122	\N	3773
1660	122	\N	3774
1668	122	\N	3775
1675	122	\N	3776
1695	122	\N	3777
1700	122	\N	3778
1711	122	\N	3779
1593	122	\N	3780
1601	122	\N	3781
1610	122	\N	3782
1618	122	\N	3783
1634	122	\N	3784
1644	122	\N	3785
1654	122	\N	3786
1598	122	\N	3787
1612	122	\N	3788
1622	122	\N	3789
1628	122	\N	3790
1632	122	\N	3791
1642	122	\N	3792
1652	122	\N	3793
1663	122	\N	3794
1669	122	\N	3795
1681	122	\N	3796
1684	122	\N	3797
1689	122	\N	3798
1691	122	\N	3799
1696	122	\N	3800
1697	122	\N	3801
1701	122	\N	3802
1703	122	\N	3803
1712	122	\N	3804
1716	122	\N	3805
1721	122	\N	3806
1724	122	\N	3807
1725	122	\N	3808
1726	122	\N	3809
1727	122	\N	3810
1729	122	\N	3811
1730	122	\N	3812
1731	122	\N	3813
1733	122	\N	3814
1735	122	\N	3815
1736	122	\N	3816
1738	122	\N	3817
1740	122	\N	3818
1741	122	\N	3819
1742	122	\N	3820
1744	122	\N	3821
1746	122	\N	3822
1747	122	\N	3823
1749	122	\N	3824
1751	122	\N	3825
1752	122	\N	3826
1753	122	\N	3827
1755	122	\N	3828
1756	122	\N	3829
1757	122	\N	3830
1759	122	\N	3831
1760	122	\N	3832
1761	122	\N	3833
1762	122	\N	3834
1763	122	\N	3835
1764	122	\N	3836
1765	122	\N	3837
1766	122	\N	3838
1767	122	\N	3839
1768	122	\N	3840
1769	122	\N	3841
1770	122	\N	3842
1771	122	\N	3843
1772	122	\N	3844
1773	122	\N	3845
1774	122	\N	3846
1775	122	\N	3847
1776	122	\N	3848
1777	122	\N	3849
1778	122	\N	3850
1779	122	\N	3851
1780	122	\N	3852
1781	122	\N	3853
1782	122	\N	3854
1783	122	\N	3855
1784	122	\N	3856
1785	122	\N	3857
1786	122	\N	3858
1787	122	\N	3859
1788	122	\N	3860
884	122	\N	3861
1789	122	\N	3862
1792	122	\N	3863
1793	122	\N	3864
1794	122	\N	3865
1795	122	\N	3866
1791	122	\N	3867
1790	122	\N	3868
1798	122	\N	3869
1799	122	\N	3870
1800	122	\N	3871
1801	122	\N	3872
1802	122	\N	3873
1803	122	\N	3874
1804	122	\N	3875
1805	122	\N	3876
1806	122	\N	3877
1807	122	\N	3878
1818	122	\N	3879
1827	122	\N	3880
1835	122	\N	3881
1808	122	\N	3882
1819	122	\N	3883
1828	122	\N	3884
1830	122	\N	3885
1809	122	\N	3886
1821	122	\N	3887
1810	122	\N	3888
1820	122	\N	3889
1829	122	\N	3890
1811	122	\N	3891
1822	122	\N	3892
1846	122	\N	3893
1859	122	\N	3894
1872	122	\N	3895
1881	122	\N	3896
1885	122	\N	3897
1893	122	\N	3898
1901	122	\N	3899
1905	122	\N	3900
1912	122	\N	3901
1812	122	\N	3902
1815	122	\N	3903
1823	122	\N	3904
1813	122	\N	3905
1814	122	\N	3906
1824	122	\N	3907
1842	122	\N	3908
1864	122	\N	3909
1870	122	\N	3910
1879	122	\N	3911
1892	122	\N	3912
1816	122	\N	3913
1825	122	\N	3914
1817	122	\N	3915
1826	122	\N	3916
1831	122	\N	3917
1832	122	\N	3918
1833	122	\N	3919
1834	122	\N	3920
1836	122	\N	3921
1837	122	\N	3922
1838	122	\N	3923
1839	122	\N	3924
1840	122	\N	3925
1843	122	\N	3926
1844	122	\N	3927
1845	122	\N	3928
1841	122	\N	3929
1847	122	\N	3930
1848	122	\N	3931
1849	122	\N	3932
1851	122	\N	3933
1852	122	\N	3934
1853	122	\N	3935
1854	122	\N	3936
1855	122	\N	3937
1856	122	\N	3938
1857	122	\N	3939
1858	122	\N	3940
1860	122	\N	3941
1861	122	\N	3942
1862	122	\N	3943
1863	122	\N	3944
1865	122	\N	3945
1866	122	\N	3946
1867	122	\N	3947
1868	122	\N	3948
1869	122	\N	3949
1871	122	\N	3950
1873	122	\N	3951
1874	122	\N	3952
1875	122	\N	3953
1877	122	\N	3954
1876	122	\N	3955
1878	122	\N	3956
1880	122	\N	3957
1882	122	\N	3958
1883	122	\N	3959
1884	122	\N	3960
1886	122	\N	3961
1887	122	\N	3962
1888	122	\N	3963
1889	122	\N	3964
1890	122	\N	3965
1891	122	\N	3966
1894	122	\N	3967
1895	122	\N	3968
1896	122	\N	3969
1897	122	\N	3970
1898	122	\N	3971
1899	122	\N	3972
1900	122	\N	3973
1902	122	\N	3974
1903	122	\N	3975
1904	122	\N	3976
1906	122	\N	3977
1907	122	\N	3978
1908	122	\N	3979
1909	122	\N	3980
1910	122	\N	3981
1911	122	\N	3982
1913	122	\N	3983
1914	122	\N	3984
1915	122	\N	3985
1916	122	\N	3986
1918	122	\N	3987
1919	122	\N	3988
1917	122	\N	3989
1920	122	\N	3990
1921	122	\N	3991
1922	122	\N	3992
1923	122	\N	3993
1924	122	\N	3994
1925	122	\N	3995
1926	122	\N	3996
1927	122	\N	3997
1928	122	\N	3998
1929	122	\N	3999
1930	122	\N	4000
1931	122	\N	4001
1932	122	\N	4002
1933	122	\N	4003
1934	122	\N	4004
1935	122	\N	4005
1936	122	\N	4006
1937	122	\N	4007
1938	122	\N	4008
1948	122	\N	4009
1958	122	\N	4010
1967	122	\N	4011
1971	122	\N	4012
1939	122	\N	4013
1940	122	\N	4014
1944	122	\N	4015
1963	122	\N	4016
1941	122	\N	4017
1942	122	\N	4018
1952	122	\N	4019
1960	122	\N	4020
1974	122	\N	4021
1946	122	\N	4022
1947	122	\N	4023
1955	122	\N	4024
1956	122	\N	4025
1964	122	\N	4026
1950	122	\N	4027
1949	122	\N	4028
1957	122	\N	4029
1965	122	\N	4030
1966	122	\N	4031
1970	122	\N	4032
1951	122	\N	4033
1961	122	\N	4034
1969	122	\N	4035
1973	122	\N	4036
1953	122	\N	4037
1959	122	\N	4038
1968	122	\N	4039
1972	122	\N	4040
1962	122	\N	4041
1975	122	\N	4042
1977	122	\N	4043
1976	122	\N	4044
1978	122	\N	4045
1979	122	\N	4046
2047	123	\N	4047
2048	123	\N	4048
2044	123	\N	4049
2045	123	\N	4050
2046	123	\N	4051
2049	123	\N	4052
2050	123	\N	4053
2051	123	\N	4054
2052	123	\N	4055
2047	124	\N	4056
2048	124	\N	4057
2044	124	\N	4058
2045	124	\N	4059
2046	124	\N	4060
2049	124	\N	4061
2050	124	\N	4062
2051	124	\N	4063
2052	124	\N	4064
2047	125	\N	4065
2048	125	\N	4066
2044	125	\N	4067
2045	125	\N	4068
2046	125	\N	4069
2049	125	\N	4070
2050	125	\N	4071
2051	125	\N	4072
2052	125	\N	4073
2047	126	\N	4074
2048	126	\N	4075
2044	126	\N	4076
2045	126	\N	4077
2046	126	\N	4078
2049	126	\N	4079
2050	126	\N	4080
2051	126	\N	4081
2052	126	\N	4082
3	127	\N	4083
4	127	\N	4084
5	127	\N	4085
6	127	\N	4086
7	127	\N	4087
8	127	\N	4088
9	127	\N	4089
10	127	\N	4090
11	127	\N	4091
12	127	\N	4092
13	127	\N	4093
14	127	\N	4094
15	127	\N	4095
17	127	\N	4096
16	127	\N	4097
18	127	\N	4098
19	127	\N	4099
20	127	\N	4100
21	127	\N	4101
22	127	\N	4102
23	127	\N	4103
24	127	\N	4104
25	127	\N	4105
27	127	\N	4106
28	127	\N	4107
29	127	\N	4108
30	127	\N	4109
31	127	\N	4110
32	127	\N	4111
33	127	\N	4112
34	127	\N	4113
35	127	\N	4114
36	127	\N	4115
37	127	\N	4116
38	127	\N	4117
39	127	\N	4118
40	127	\N	4119
41	127	\N	4120
42	127	\N	4121
43	127	\N	4122
44	127	\N	4123
45	127	\N	4124
46	127	\N	4125
47	127	\N	4126
48	127	\N	4127
49	127	\N	4128
50	127	\N	4129
51	127	\N	4130
52	127	\N	4131
53	127	\N	4132
54	127	\N	4133
55	127	\N	4134
56	127	\N	4135
57	127	\N	4136
58	127	\N	4137
59	127	\N	4138
60	127	\N	4139
61	127	\N	4140
62	127	\N	4141
63	127	\N	4142
64	127	\N	4143
65	127	\N	4144
66	127	\N	4145
67	127	\N	4146
68	127	\N	4147
69	127	\N	4148
70	127	\N	4149
71	127	\N	4150
72	127	\N	4151
73	127	\N	4152
74	127	\N	4153
75	127	\N	4154
76	127	\N	4155
77	127	\N	4156
78	127	\N	4157
79	127	\N	4158
80	127	\N	4159
81	127	\N	4160
82	127	\N	4161
83	127	\N	4162
84	127	\N	4163
85	127	\N	4164
86	127	\N	4165
87	127	\N	4166
88	127	\N	4167
89	127	\N	4168
90	127	\N	4169
91	127	\N	4170
92	127	\N	4171
93	127	\N	4172
94	127	\N	4173
95	127	\N	4174
96	127	\N	4175
97	127	\N	4176
98	127	\N	4177
99	127	\N	4178
100	127	\N	4179
101	127	\N	4180
102	127	\N	4181
103	127	\N	4182
104	127	\N	4183
105	127	\N	4184
106	127	\N	4185
107	127	\N	4186
108	127	\N	4187
109	127	\N	4188
110	127	\N	4189
111	127	\N	4190
112	127	\N	4191
113	127	\N	4192
114	127	\N	4193
115	127	\N	4194
116	127	\N	4195
117	127	\N	4196
118	127	\N	4197
119	127	\N	4198
120	127	\N	4199
121	127	\N	4200
122	127	\N	4201
123	127	\N	4202
124	127	\N	4203
125	127	\N	4204
126	127	\N	4205
127	127	\N	4206
128	127	\N	4207
129	127	\N	4208
130	127	\N	4209
131	127	\N	4210
132	127	\N	4211
133	127	\N	4212
134	127	\N	4213
135	127	\N	4214
136	127	\N	4215
137	127	\N	4216
138	127	\N	4217
139	127	\N	4218
140	127	\N	4219
141	127	\N	4220
142	127	\N	4221
143	127	\N	4222
144	127	\N	4223
145	127	\N	4224
146	127	\N	4225
147	127	\N	4226
148	127	\N	4227
149	127	\N	4228
150	127	\N	4229
151	127	\N	4230
153	127	\N	4231
152	127	\N	4232
154	127	\N	4233
155	127	\N	4234
156	127	\N	4235
157	127	\N	4236
158	127	\N	4237
159	127	\N	4238
160	127	\N	4239
161	127	\N	4240
162	127	\N	4241
163	127	\N	4242
164	127	\N	4243
165	127	\N	4244
166	127	\N	4245
167	127	\N	4246
168	127	\N	4247
169	127	\N	4248
170	127	\N	4249
171	127	\N	4250
172	127	\N	4251
173	127	\N	4252
174	127	\N	4253
175	127	\N	4254
176	127	\N	4255
177	127	\N	4256
178	127	\N	4257
179	127	\N	4258
180	127	\N	4259
181	127	\N	4260
182	127	\N	4261
183	127	\N	4262
184	127	\N	4263
185	127	\N	4264
186	127	\N	4265
187	127	\N	4266
188	127	\N	4267
189	127	\N	4268
190	127	\N	4269
191	127	\N	4270
236	127	\N	4271
237	127	\N	4272
247	127	\N	4273
192	127	\N	4274
205	127	\N	4275
214	127	\N	4276
220	127	\N	4277
229	127	\N	4278
240	127	\N	4279
193	127	\N	4280
206	127	\N	4281
221	127	\N	4282
230	127	\N	4283
241	127	\N	4284
194	127	\N	4285
198	127	\N	4286
207	127	\N	4287
222	127	\N	4288
231	127	\N	4289
242	127	\N	4290
195	127	\N	4291
199	127	\N	4292
208	127	\N	4293
223	127	\N	4294
232	127	\N	4295
243	127	\N	4296
196	127	\N	4297
200	127	\N	4298
209	127	\N	4299
224	127	\N	4300
233	127	\N	4301
234	127	\N	4302
244	127	\N	4303
197	127	\N	4304
202	127	\N	4305
211	127	\N	4306
215	127	\N	4307
217	127	\N	4308
226	127	\N	4309
246	127	\N	4310
201	127	\N	4311
210	127	\N	4312
216	127	\N	4313
225	127	\N	4314
235	127	\N	4315
245	127	\N	4316
203	127	\N	4317
212	127	\N	4318
218	127	\N	4319
227	127	\N	4320
238	127	\N	4321
204	127	\N	4322
213	127	\N	4323
219	127	\N	4324
228	127	\N	4325
239	127	\N	4326
248	127	\N	4327
249	127	\N	4328
250	127	\N	4329
251	127	\N	4330
252	127	\N	4331
253	127	\N	4332
254	127	\N	4333
255	127	\N	4334
256	127	\N	4335
257	127	\N	4336
258	127	\N	4337
259	127	\N	4338
260	127	\N	4339
261	127	\N	4340
262	127	\N	4341
263	127	\N	4342
264	127	\N	4343
265	127	\N	4344
3	128	\N	4345
266	127	\N	4346
267	127	\N	4347
268	127	\N	4348
269	127	\N	4349
4	128	\N	4350
270	127	\N	4351
5	128	\N	4352
271	127	\N	4353
6	128	\N	4354
272	127	\N	4355
7	128	\N	4356
273	127	\N	4357
8	128	\N	4358
274	127	\N	4359
9	128	\N	4360
275	127	\N	4361
10	128	\N	4362
276	127	\N	4363
11	128	\N	4364
277	127	\N	4365
12	128	\N	4366
278	127	\N	4367
13	128	\N	4368
279	127	\N	4369
14	128	\N	4370
280	127	\N	4371
15	128	\N	4372
281	127	\N	4373
17	128	\N	4374
282	127	\N	4375
16	128	\N	4376
283	127	\N	4377
18	128	\N	4378
284	127	\N	4379
19	128	\N	4380
285	127	\N	4381
20	128	\N	4382
1943	127	\N	4383
21	128	\N	4384
286	127	\N	4385
22	128	\N	4386
287	127	\N	4387
23	128	\N	4388
288	127	\N	4389
24	128	\N	4390
289	127	\N	4391
25	128	\N	4392
290	127	\N	4393
27	128	\N	4394
291	127	\N	4395
28	128	\N	4396
292	127	\N	4397
29	128	\N	4398
293	127	\N	4399
30	128	\N	4400
294	127	\N	4401
31	128	\N	4402
295	127	\N	4403
32	128	\N	4404
296	127	\N	4405
33	128	\N	4406
297	127	\N	4407
34	128	\N	4408
298	127	\N	4409
35	128	\N	4410
36	128	\N	4412
37	128	\N	4413
38	128	\N	4415
39	128	\N	4417
40	128	\N	4419
41	128	\N	4421
42	128	\N	4423
43	128	\N	4425
44	128	\N	4427
45	128	\N	4429
46	128	\N	4431
47	128	\N	4433
48	128	\N	4435
49	128	\N	4437
50	128	\N	4439
51	128	\N	4441
52	128	\N	4443
53	128	\N	4445
54	128	\N	4447
55	128	\N	4449
56	128	\N	4451
57	128	\N	4453
58	128	\N	4455
59	128	\N	4457
60	128	\N	4459
61	128	\N	4461
62	128	\N	4463
63	128	\N	4465
64	128	\N	4467
65	128	\N	4469
66	128	\N	4471
67	128	\N	4472
68	128	\N	4473
69	128	\N	4474
70	128	\N	4475
71	128	\N	4476
72	128	\N	4477
73	128	\N	4479
74	128	\N	4481
75	128	\N	4483
76	128	\N	4485
77	128	\N	4487
78	128	\N	4489
79	128	\N	4491
80	128	\N	4493
81	128	\N	4495
82	128	\N	4497
83	128	\N	4499
84	128	\N	4501
85	128	\N	4503
86	128	\N	4505
87	128	\N	4507
88	128	\N	4509
89	128	\N	4511
90	128	\N	4513
91	128	\N	4515
92	128	\N	4517
93	128	\N	4519
94	128	\N	4521
95	128	\N	4523
96	128	\N	4525
97	128	\N	4527
98	128	\N	4529
99	128	\N	4531
100	128	\N	4533
101	128	\N	4535
102	128	\N	4537
103	128	\N	4539
104	128	\N	4541
105	128	\N	4543
106	128	\N	4545
107	128	\N	4547
108	128	\N	4549
109	128	\N	4551
110	128	\N	4553
111	128	\N	4555
112	128	\N	4557
113	128	\N	4559
114	128	\N	4561
115	128	\N	4563
116	128	\N	4565
117	128	\N	4567
118	128	\N	4569
119	128	\N	4571
120	128	\N	4573
121	128	\N	4575
122	128	\N	4577
123	128	\N	4579
124	128	\N	4581
125	128	\N	4583
126	128	\N	4585
127	128	\N	4587
128	128	\N	4589
129	128	\N	4591
130	128	\N	4593
131	128	\N	4595
132	128	\N	4597
133	128	\N	4599
134	128	\N	4601
135	128	\N	4603
136	128	\N	4605
137	128	\N	4607
138	128	\N	4609
139	128	\N	4611
140	128	\N	4613
141	128	\N	4615
142	128	\N	4617
143	128	\N	4619
144	128	\N	4621
145	128	\N	4623
146	128	\N	4625
147	128	\N	4627
148	128	\N	4629
149	128	\N	4631
150	128	\N	4633
151	128	\N	4635
153	128	\N	4637
152	128	\N	4639
154	128	\N	4641
155	128	\N	4643
156	128	\N	4645
157	128	\N	4647
158	128	\N	4649
159	128	\N	4651
160	128	\N	4653
161	128	\N	4655
162	128	\N	4657
163	128	\N	4659
164	128	\N	4661
165	128	\N	4663
166	128	\N	4665
167	128	\N	4667
168	128	\N	4669
169	128	\N	4671
170	128	\N	4673
171	128	\N	4675
172	128	\N	4677
173	128	\N	4679
174	128	\N	4681
175	128	\N	4683
176	128	\N	4685
177	128	\N	4687
178	128	\N	4689
179	128	\N	4691
180	128	\N	4693
181	128	\N	4695
182	128	\N	4697
183	128	\N	4699
184	128	\N	4701
185	128	\N	4703
186	128	\N	4705
187	128	\N	4707
188	128	\N	4709
189	128	\N	4711
190	128	\N	4713
191	128	\N	4715
236	128	\N	4717
237	128	\N	4719
247	128	\N	4721
192	128	\N	4723
205	128	\N	4725
214	128	\N	4727
220	128	\N	4729
229	128	\N	4731
240	128	\N	4733
193	128	\N	4735
206	128	\N	4737
221	128	\N	4739
230	128	\N	4741
241	128	\N	4743
194	128	\N	4745
198	128	\N	4747
207	128	\N	4749
222	128	\N	4751
231	128	\N	4753
242	128	\N	4755
195	128	\N	4757
199	128	\N	4759
208	128	\N	4761
223	128	\N	4763
232	128	\N	4765
243	128	\N	4767
196	128	\N	4769
200	128	\N	4771
299	127	\N	4411
300	127	\N	4414
301	127	\N	4416
302	127	\N	4418
303	127	\N	4420
304	127	\N	4422
305	127	\N	4424
306	127	\N	4426
307	127	\N	4428
308	127	\N	4430
309	127	\N	4432
310	127	\N	4434
311	127	\N	4436
312	127	\N	4438
313	127	\N	4440
314	127	\N	4442
315	127	\N	4444
316	127	\N	4446
317	127	\N	4448
318	127	\N	4450
319	127	\N	4452
320	127	\N	4454
321	127	\N	4456
322	127	\N	4458
323	127	\N	4460
324	127	\N	4462
325	127	\N	4464
326	127	\N	4466
327	127	\N	4468
328	127	\N	4470
329	127	\N	4478
330	127	\N	4480
331	127	\N	4482
332	127	\N	4484
333	127	\N	4486
334	127	\N	4488
335	127	\N	4490
336	127	\N	4492
337	127	\N	4494
338	127	\N	4496
339	127	\N	4498
340	127	\N	4500
347	127	\N	4502
356	127	\N	4504
364	127	\N	4506
371	127	\N	4508
373	127	\N	4510
374	127	\N	4512
392	127	\N	4514
403	127	\N	4516
341	127	\N	4518
358	127	\N	4520
359	127	\N	4522
367	127	\N	4524
390	127	\N	4526
400	127	\N	4528
401	127	\N	4530
342	127	\N	4532
343	127	\N	4534
350	127	\N	4536
368	127	\N	4538
377	127	\N	4540
386	127	\N	4542
395	127	\N	4544
396	127	\N	4546
406	127	\N	4548
344	127	\N	4550
353	127	\N	4552
360	127	\N	4554
361	127	\N	4556
378	127	\N	4558
397	127	\N	4560
345	127	\N	4562
354	127	\N	4564
362	127	\N	4566
370	127	\N	4568
346	127	\N	4570
355	127	\N	4572
363	127	\N	4574
381	127	\N	4576
389	127	\N	4578
399	127	\N	4580
408	127	\N	4582
348	127	\N	4584
349	127	\N	4586
351	127	\N	4588
352	127	\N	4590
357	127	\N	4592
369	127	\N	4594
379	127	\N	4596
380	127	\N	4598
387	127	\N	4600
388	127	\N	4602
398	127	\N	4604
407	127	\N	4606
365	127	\N	4608
366	127	\N	4610
372	127	\N	4612
375	127	\N	4614
376	127	\N	4616
382	127	\N	4618
383	127	\N	4620
384	127	\N	4622
385	127	\N	4624
391	127	\N	4626
393	127	\N	4628
394	127	\N	4630
402	127	\N	4632
404	127	\N	4634
405	127	\N	4636
409	127	\N	4638
410	127	\N	4640
411	127	\N	4642
412	127	\N	4644
413	127	\N	4646
414	127	\N	4648
415	127	\N	4650
416	127	\N	4652
417	127	\N	4654
418	127	\N	4656
419	127	\N	4658
420	127	\N	4660
421	127	\N	4662
422	127	\N	4664
423	127	\N	4666
424	127	\N	4668
425	127	\N	4670
426	127	\N	4672
427	127	\N	4674
428	127	\N	4676
429	127	\N	4678
430	127	\N	4680
431	127	\N	4682
432	127	\N	4684
433	127	\N	4686
434	127	\N	4688
435	127	\N	4690
436	127	\N	4692
437	127	\N	4694
438	127	\N	4696
439	127	\N	4698
440	127	\N	4700
441	127	\N	4702
442	127	\N	4704
443	127	\N	4706
444	127	\N	4708
445	127	\N	4710
446	127	\N	4712
447	127	\N	4714
448	127	\N	4716
449	127	\N	4718
450	127	\N	4720
451	127	\N	4722
452	127	\N	4724
453	127	\N	4726
454	127	\N	4728
455	127	\N	4730
456	127	\N	4732
457	127	\N	4734
458	127	\N	4736
459	127	\N	4738
460	127	\N	4740
461	127	\N	4742
462	127	\N	4744
463	127	\N	4746
464	127	\N	4748
465	127	\N	4750
466	127	\N	4752
467	127	\N	4754
468	127	\N	4756
469	127	\N	4758
470	127	\N	4760
471	127	\N	4762
472	127	\N	4764
473	127	\N	4766
474	127	\N	4768
1945	127	\N	4770
475	127	\N	4772
476	127	\N	4774
477	127	\N	4776
478	127	\N	4778
479	127	\N	4780
480	127	\N	4782
481	127	\N	4784
482	127	\N	4786
209	128	\N	4773
224	128	\N	4775
233	128	\N	4777
234	128	\N	4779
244	128	\N	4781
197	128	\N	4783
202	128	\N	4785
211	128	\N	4787
215	128	\N	4789
217	128	\N	4791
226	128	\N	4793
246	128	\N	4795
201	128	\N	4797
210	128	\N	4799
216	128	\N	4801
225	128	\N	4803
235	128	\N	4805
245	128	\N	4807
203	128	\N	4809
212	128	\N	4811
218	128	\N	4813
227	128	\N	4815
238	128	\N	4817
204	128	\N	4819
213	128	\N	4821
219	128	\N	4823
228	128	\N	4825
239	128	\N	4827
248	128	\N	4829
249	128	\N	4831
250	128	\N	4833
251	128	\N	4835
252	128	\N	4837
253	128	\N	4839
254	128	\N	4841
255	128	\N	4843
256	128	\N	4845
257	128	\N	4847
258	128	\N	4849
259	128	\N	4851
260	128	\N	4853
261	128	\N	4855
262	128	\N	4857
263	128	\N	4859
264	128	\N	4861
265	128	\N	4863
266	128	\N	4865
267	128	\N	4867
268	128	\N	4869
269	128	\N	4871
270	128	\N	4873
271	128	\N	4875
272	128	\N	4877
273	128	\N	4879
274	128	\N	4881
275	128	\N	4883
276	128	\N	4885
277	128	\N	4887
278	128	\N	4889
279	128	\N	4891
280	128	\N	4893
281	128	\N	4895
282	128	\N	4897
283	128	\N	4899
284	128	\N	4901
285	128	\N	4903
1943	128	\N	4905
286	128	\N	4907
287	128	\N	4909
288	128	\N	4911
289	128	\N	4913
290	128	\N	4915
291	128	\N	4917
292	128	\N	4919
293	128	\N	4921
294	128	\N	4923
295	128	\N	4925
296	128	\N	4927
297	128	\N	4929
298	128	\N	4931
299	128	\N	4933
300	128	\N	4935
301	128	\N	4937
302	128	\N	4939
303	128	\N	4941
304	128	\N	4943
305	128	\N	4945
306	128	\N	4947
307	128	\N	4949
308	128	\N	4951
309	128	\N	4953
310	128	\N	4955
311	128	\N	4957
312	128	\N	4959
313	128	\N	4961
314	128	\N	4963
315	128	\N	4965
316	128	\N	4967
317	128	\N	4969
318	128	\N	4971
319	128	\N	4973
320	128	\N	4975
321	128	\N	4977
322	128	\N	4979
323	128	\N	4981
324	128	\N	4983
325	128	\N	4985
326	128	\N	4987
327	128	\N	4989
328	128	\N	4991
329	128	\N	4993
330	128	\N	4995
331	128	\N	4997
332	128	\N	4999
333	128	\N	5001
334	128	\N	5003
335	128	\N	5005
336	128	\N	5007
337	128	\N	5009
338	128	\N	5011
339	128	\N	5013
340	128	\N	5015
347	128	\N	5017
356	128	\N	5019
364	128	\N	5021
371	128	\N	5023
373	128	\N	5025
374	128	\N	5027
392	128	\N	5029
403	128	\N	5031
341	128	\N	5033
358	128	\N	5035
359	128	\N	5037
367	128	\N	5039
390	128	\N	5041
400	128	\N	5043
401	128	\N	5045
342	128	\N	5047
343	128	\N	5049
350	128	\N	5051
368	128	\N	5053
377	128	\N	5055
386	128	\N	5057
395	128	\N	5059
396	128	\N	5061
406	128	\N	5063
344	128	\N	5065
353	128	\N	5067
360	128	\N	5069
361	128	\N	5071
378	128	\N	5073
397	128	\N	5075
345	128	\N	5077
354	128	\N	5079
362	128	\N	5081
370	128	\N	5083
346	128	\N	5085
355	128	\N	5087
363	128	\N	5089
381	128	\N	5091
389	128	\N	5093
399	128	\N	5095
408	128	\N	5097
348	128	\N	5099
349	128	\N	5101
351	128	\N	5103
352	128	\N	5105
357	128	\N	5107
369	128	\N	5109
379	128	\N	5111
380	128	\N	5113
387	128	\N	5115
388	128	\N	5117
398	128	\N	5119
407	128	\N	5121
365	128	\N	5123
366	128	\N	5125
372	128	\N	5127
375	128	\N	5129
376	128	\N	5131
382	128	\N	5133
383	128	\N	5135
384	128	\N	5137
385	128	\N	5139
391	128	\N	5141
483	127	\N	4788
484	127	\N	4790
487	127	\N	4792
485	127	\N	4794
486	127	\N	4796
493	127	\N	4798
488	127	\N	4800
489	127	\N	4802
490	127	\N	4804
491	127	\N	4806
492	127	\N	4808
494	127	\N	4810
495	127	\N	4812
496	127	\N	4814
497	127	\N	4816
498	127	\N	4818
499	127	\N	4820
500	127	\N	4822
501	127	\N	4824
502	127	\N	4826
503	127	\N	4828
504	127	\N	4830
505	127	\N	4832
506	127	\N	4834
507	127	\N	4836
508	127	\N	4838
509	127	\N	4840
510	127	\N	4842
511	127	\N	4844
512	127	\N	4846
513	127	\N	4848
514	127	\N	4850
515	127	\N	4852
516	127	\N	4854
517	127	\N	4856
518	127	\N	4858
519	127	\N	4860
520	127	\N	4862
521	127	\N	4864
522	127	\N	4866
524	127	\N	4868
525	127	\N	4870
526	127	\N	4872
527	127	\N	4874
528	127	\N	4876
529	127	\N	4878
530	127	\N	4880
531	127	\N	4882
532	127	\N	4884
533	127	\N	4886
534	127	\N	4888
535	127	\N	4890
536	127	\N	4892
537	127	\N	4894
538	127	\N	4896
539	127	\N	4898
540	127	\N	4900
541	127	\N	4902
542	127	\N	4904
543	127	\N	4906
544	127	\N	4908
545	127	\N	4910
546	127	\N	4912
547	127	\N	4914
548	127	\N	4916
549	127	\N	4918
550	127	\N	4920
551	127	\N	4922
552	127	\N	4924
553	127	\N	4926
554	127	\N	4928
555	127	\N	4930
556	127	\N	4932
557	127	\N	4934
558	127	\N	4936
559	127	\N	4938
560	127	\N	4940
561	127	\N	4942
563	127	\N	4944
564	127	\N	4946
562	127	\N	4948
565	127	\N	4950
566	127	\N	4952
567	127	\N	4954
568	127	\N	4956
569	127	\N	4958
570	127	\N	4960
571	127	\N	4962
572	127	\N	4964
573	127	\N	4966
574	127	\N	4968
575	127	\N	4970
576	127	\N	4972
577	127	\N	4974
578	127	\N	4976
579	127	\N	4978
589	127	\N	4980
580	127	\N	4982
590	127	\N	4984
581	127	\N	4986
591	127	\N	4988
582	127	\N	4990
592	127	\N	4992
583	127	\N	4994
585	127	\N	4996
584	127	\N	4998
586	127	\N	5000
587	127	\N	5002
588	127	\N	5004
593	127	\N	5006
594	127	\N	5008
595	127	\N	5010
596	127	\N	5012
597	127	\N	5014
598	127	\N	5016
599	127	\N	5018
600	127	\N	5020
601	127	\N	5022
602	127	\N	5024
603	127	\N	5026
604	127	\N	5028
605	127	\N	5030
606	127	\N	5032
607	127	\N	5034
608	127	\N	5036
609	127	\N	5038
610	127	\N	5040
611	127	\N	5042
612	127	\N	5044
613	127	\N	5046
614	127	\N	5048
615	127	\N	5050
616	127	\N	5052
617	127	\N	5054
618	127	\N	5056
619	127	\N	5058
620	127	\N	5060
621	127	\N	5062
624	127	\N	5064
626	127	\N	5066
625	127	\N	5068
628	127	\N	5070
622	127	\N	5072
623	127	\N	5074
627	127	\N	5076
629	127	\N	5078
630	127	\N	5080
631	127	\N	5082
632	127	\N	5084
633	127	\N	5086
634	127	\N	5088
635	127	\N	5090
636	127	\N	5092
637	127	\N	5094
638	127	\N	5096
639	127	\N	5098
640	127	\N	5100
641	127	\N	5102
642	127	\N	5104
643	127	\N	5106
644	127	\N	5108
645	127	\N	5110
646	127	\N	5112
647	127	\N	5114
648	127	\N	5116
649	127	\N	5118
650	127	\N	5120
1954	127	\N	5122
652	127	\N	5124
653	127	\N	5126
654	127	\N	5128
655	127	\N	5130
656	127	\N	5132
657	127	\N	5134
658	127	\N	5136
659	127	\N	5138
660	127	\N	5140
661	127	\N	5142
662	127	\N	5144
663	127	\N	5146
664	127	\N	5148
651	127	\N	5150
665	127	\N	5152
666	127	\N	5154
667	127	\N	5156
393	128	\N	5143
394	128	\N	5145
402	128	\N	5147
404	128	\N	5149
405	128	\N	5151
409	128	\N	5153
410	128	\N	5155
411	128	\N	5157
412	128	\N	5159
413	128	\N	5161
414	128	\N	5163
415	128	\N	5165
416	128	\N	5167
417	128	\N	5169
418	128	\N	5171
419	128	\N	5173
420	128	\N	5175
421	128	\N	5177
422	128	\N	5179
423	128	\N	5181
424	128	\N	5183
425	128	\N	5185
426	128	\N	5187
427	128	\N	5189
428	128	\N	5191
429	128	\N	5193
430	128	\N	5195
431	128	\N	5197
432	128	\N	5199
433	128	\N	5201
434	128	\N	5203
435	128	\N	5205
436	128	\N	5207
437	128	\N	5209
438	128	\N	5211
439	128	\N	5213
440	128	\N	5215
441	128	\N	5217
442	128	\N	5219
443	128	\N	5221
444	128	\N	5223
445	128	\N	5225
446	128	\N	5227
447	128	\N	5229
448	128	\N	5231
449	128	\N	5233
450	128	\N	5235
451	128	\N	5237
452	128	\N	5239
453	128	\N	5241
454	128	\N	5243
455	128	\N	5245
456	128	\N	5247
457	128	\N	5249
458	128	\N	5251
459	128	\N	5253
460	128	\N	5255
461	128	\N	5257
462	128	\N	5259
463	128	\N	5261
464	128	\N	5263
465	128	\N	5265
466	128	\N	5267
467	128	\N	5269
468	128	\N	5271
469	128	\N	5273
470	128	\N	5275
471	128	\N	5277
472	128	\N	5279
473	128	\N	5281
474	128	\N	5283
1945	128	\N	5285
475	128	\N	5287
476	128	\N	5289
477	128	\N	5291
478	128	\N	5293
479	128	\N	5295
480	128	\N	5297
481	128	\N	5299
482	128	\N	5301
483	128	\N	5303
484	128	\N	5305
487	128	\N	5307
485	128	\N	5309
486	128	\N	5311
493	128	\N	5313
488	128	\N	5315
489	128	\N	5317
490	128	\N	5319
491	128	\N	5321
492	128	\N	5323
494	128	\N	5325
495	128	\N	5327
496	128	\N	5329
497	128	\N	5331
498	128	\N	5333
499	128	\N	5335
500	128	\N	5337
501	128	\N	5339
502	128	\N	5341
503	128	\N	5343
504	128	\N	5345
505	128	\N	5347
506	128	\N	5349
507	128	\N	5351
508	128	\N	5353
509	128	\N	5355
510	128	\N	5357
511	128	\N	5359
512	128	\N	5361
513	128	\N	5363
514	128	\N	5365
515	128	\N	5367
516	128	\N	5369
517	128	\N	5371
518	128	\N	5373
519	128	\N	5375
520	128	\N	5377
521	128	\N	5379
522	128	\N	5381
524	128	\N	5383
525	128	\N	5385
526	128	\N	5387
527	128	\N	5389
528	128	\N	5391
529	128	\N	5393
530	128	\N	5395
531	128	\N	5397
532	128	\N	5399
533	128	\N	5401
534	128	\N	5403
535	128	\N	5405
536	128	\N	5407
537	128	\N	5409
538	128	\N	5411
539	128	\N	5413
540	128	\N	5415
541	128	\N	5417
542	128	\N	5419
543	128	\N	5421
544	128	\N	5423
545	128	\N	5425
546	128	\N	5427
547	128	\N	5429
548	128	\N	5431
549	128	\N	5433
550	128	\N	5435
551	128	\N	5437
552	128	\N	5439
553	128	\N	5441
554	128	\N	5443
555	128	\N	5445
556	128	\N	5447
557	128	\N	5449
558	128	\N	5451
559	128	\N	5453
560	128	\N	5455
561	128	\N	5457
563	128	\N	5459
564	128	\N	5461
562	128	\N	5463
565	128	\N	5465
566	128	\N	5467
567	128	\N	5469
568	128	\N	5471
569	128	\N	5473
570	128	\N	5475
571	128	\N	5477
572	128	\N	5479
573	128	\N	5481
574	128	\N	5483
575	128	\N	5485
576	128	\N	5487
577	128	\N	5489
578	128	\N	5491
579	128	\N	5493
589	128	\N	5495
580	128	\N	5497
590	128	\N	5499
581	128	\N	5501
591	128	\N	5503
582	128	\N	5505
592	128	\N	5507
583	128	\N	5509
585	128	\N	5511
668	127	\N	5158
669	127	\N	5160
670	127	\N	5162
671	127	\N	5164
672	127	\N	5166
673	127	\N	5168
674	127	\N	5170
675	127	\N	5172
676	127	\N	5174
677	127	\N	5176
678	127	\N	5178
679	127	\N	5180
680	127	\N	5182
681	127	\N	5184
682	127	\N	5186
683	127	\N	5188
684	127	\N	5190
699	127	\N	5192
685	127	\N	5194
694	127	\N	5196
686	127	\N	5198
690	127	\N	5200
695	127	\N	5202
687	127	\N	5204
688	127	\N	5206
689	127	\N	5208
691	127	\N	5210
693	127	\N	5212
696	127	\N	5214
698	127	\N	5216
692	127	\N	5218
697	127	\N	5220
700	127	\N	5222
701	127	\N	5224
702	127	\N	5226
703	127	\N	5228
704	127	\N	5230
705	127	\N	5232
706	127	\N	5234
707	127	\N	5236
708	127	\N	5238
709	127	\N	5240
710	127	\N	5242
711	127	\N	5244
712	127	\N	5246
713	127	\N	5248
714	127	\N	5250
715	127	\N	5252
716	127	\N	5254
717	127	\N	5256
718	127	\N	5258
719	127	\N	5260
720	127	\N	5262
721	127	\N	5264
722	127	\N	5266
723	127	\N	5268
725	127	\N	5270
724	127	\N	5272
726	127	\N	5274
727	127	\N	5276
728	127	\N	5278
729	127	\N	5280
730	127	\N	5282
731	127	\N	5284
732	127	\N	5286
733	127	\N	5288
734	127	\N	5290
735	127	\N	5292
736	127	\N	5294
737	127	\N	5296
738	127	\N	5298
739	127	\N	5300
740	127	\N	5302
741	127	\N	5304
742	127	\N	5306
743	127	\N	5308
744	127	\N	5310
745	127	\N	5312
746	127	\N	5314
747	127	\N	5316
748	127	\N	5318
749	127	\N	5320
750	127	\N	5322
751	127	\N	5324
752	127	\N	5326
753	127	\N	5328
754	127	\N	5330
755	127	\N	5332
756	127	\N	5334
757	127	\N	5336
758	127	\N	5338
759	127	\N	5340
760	127	\N	5342
761	127	\N	5344
762	127	\N	5346
763	127	\N	5348
764	127	\N	5350
765	127	\N	5352
766	127	\N	5354
767	127	\N	5356
768	127	\N	5358
769	127	\N	5360
770	127	\N	5362
771	127	\N	5364
772	127	\N	5366
773	127	\N	5368
774	127	\N	5370
775	127	\N	5372
776	127	\N	5374
777	127	\N	5376
778	127	\N	5378
779	127	\N	5380
780	127	\N	5382
781	127	\N	5384
782	127	\N	5386
783	127	\N	5388
784	127	\N	5390
785	127	\N	5392
786	127	\N	5394
787	127	\N	5396
788	127	\N	5398
789	127	\N	5400
790	127	\N	5402
791	127	\N	5404
792	127	\N	5406
804	127	\N	5408
805	127	\N	5410
813	127	\N	5412
793	127	\N	5414
794	127	\N	5416
795	127	\N	5418
796	127	\N	5420
797	127	\N	5422
798	127	\N	5424
799	127	\N	5426
800	127	\N	5428
801	127	\N	5430
802	127	\N	5432
803	127	\N	5434
806	127	\N	5436
807	127	\N	5438
808	127	\N	5440
809	127	\N	5442
810	127	\N	5444
811	127	\N	5446
812	127	\N	5448
814	127	\N	5450
816	127	\N	5452
817	127	\N	5454
815	127	\N	5456
818	127	\N	5458
819	127	\N	5460
820	127	\N	5462
821	127	\N	5464
822	127	\N	5466
823	127	\N	5468
826	127	\N	5470
827	127	\N	5472
828	127	\N	5474
829	127	\N	5476
830	127	\N	5478
831	127	\N	5480
832	127	\N	5482
833	127	\N	5484
834	127	\N	5486
836	127	\N	5488
837	127	\N	5490
824	127	\N	5492
839	127	\N	5494
842	127	\N	5496
843	127	\N	5498
844	127	\N	5500
852	127	\N	5502
857	127	\N	5504
860	127	\N	5506
864	127	\N	5508
865	127	\N	5510
866	127	\N	5512
870	127	\N	5514
871	127	\N	5516
872	127	\N	5518
873	127	\N	5520
874	127	\N	5522
875	127	\N	5524
876	127	\N	5526
584	128	\N	5513
586	128	\N	5515
587	128	\N	5517
588	128	\N	5519
593	128	\N	5521
594	128	\N	5523
595	128	\N	5525
596	128	\N	5527
597	128	\N	5529
598	128	\N	5531
599	128	\N	5533
600	128	\N	5535
601	128	\N	5537
602	128	\N	5539
603	128	\N	5541
604	128	\N	5543
605	128	\N	5545
606	128	\N	5547
607	128	\N	5549
608	128	\N	5551
609	128	\N	5553
610	128	\N	5555
611	128	\N	5557
612	128	\N	5559
613	128	\N	5561
614	128	\N	5563
615	128	\N	5565
616	128	\N	5567
617	128	\N	5569
618	128	\N	5571
619	128	\N	5573
620	128	\N	5575
621	128	\N	5577
624	128	\N	5579
626	128	\N	5581
625	128	\N	5583
628	128	\N	5585
622	128	\N	5587
623	128	\N	5589
627	128	\N	5591
629	128	\N	5593
630	128	\N	5595
631	128	\N	5597
632	128	\N	5599
633	128	\N	5601
634	128	\N	5603
635	128	\N	5605
636	128	\N	5607
637	128	\N	5609
638	128	\N	5611
639	128	\N	5613
640	128	\N	5615
641	128	\N	5617
642	128	\N	5619
643	128	\N	5621
644	128	\N	5623
645	128	\N	5625
646	128	\N	5627
647	128	\N	5629
648	128	\N	5631
649	128	\N	5633
650	128	\N	5635
1954	128	\N	5637
652	128	\N	5639
653	128	\N	5641
654	128	\N	5643
655	128	\N	5645
656	128	\N	5647
657	128	\N	5649
658	128	\N	5651
659	128	\N	5653
660	128	\N	5655
661	128	\N	5657
662	128	\N	5659
663	128	\N	5661
664	128	\N	5663
651	128	\N	5665
665	128	\N	5667
666	128	\N	5669
667	128	\N	5671
668	128	\N	5673
669	128	\N	5675
670	128	\N	5677
671	128	\N	5679
672	128	\N	5681
673	128	\N	5683
674	128	\N	5685
675	128	\N	5687
676	128	\N	5689
677	128	\N	5691
678	128	\N	5693
679	128	\N	5695
680	128	\N	5697
681	128	\N	5699
682	128	\N	5701
683	128	\N	5703
684	128	\N	5705
699	128	\N	5707
685	128	\N	5709
694	128	\N	5711
686	128	\N	5713
690	128	\N	5715
695	128	\N	5717
687	128	\N	5719
688	128	\N	5721
689	128	\N	5723
691	128	\N	5725
693	128	\N	5727
696	128	\N	5729
698	128	\N	5731
692	128	\N	5733
697	128	\N	5735
700	128	\N	5737
701	128	\N	5739
702	128	\N	5741
703	128	\N	5743
704	128	\N	5745
705	128	\N	5747
706	128	\N	5749
707	128	\N	5751
708	128	\N	5753
709	128	\N	5755
710	128	\N	5757
711	128	\N	5759
712	128	\N	5761
713	128	\N	5763
714	128	\N	5765
715	128	\N	5767
716	128	\N	5769
717	128	\N	5771
718	128	\N	5773
719	128	\N	5775
720	128	\N	5777
721	128	\N	5779
722	128	\N	5781
723	128	\N	5783
725	128	\N	5785
724	128	\N	5787
726	128	\N	5789
727	128	\N	5791
728	128	\N	5793
729	128	\N	5795
730	128	\N	5797
731	128	\N	5799
732	128	\N	5801
733	128	\N	5803
734	128	\N	5805
735	128	\N	5807
736	128	\N	5809
737	128	\N	5811
738	128	\N	5813
739	128	\N	5815
740	128	\N	5817
741	128	\N	5819
742	128	\N	5821
743	128	\N	5823
744	128	\N	5825
745	128	\N	5827
746	128	\N	5829
747	128	\N	5831
748	128	\N	5833
749	128	\N	5835
750	128	\N	5837
751	128	\N	5839
752	128	\N	5841
753	128	\N	5843
754	128	\N	5845
755	128	\N	5847
756	128	\N	5849
757	128	\N	5851
758	128	\N	5853
759	128	\N	5855
760	128	\N	5857
761	128	\N	5859
762	128	\N	5861
763	128	\N	5863
764	128	\N	5865
765	128	\N	5867
766	128	\N	5869
767	128	\N	5871
768	128	\N	5873
769	128	\N	5875
770	128	\N	5877
771	128	\N	5879
772	128	\N	5881
877	127	\N	5528
878	127	\N	5530
879	127	\N	5532
880	127	\N	5534
881	127	\N	5536
882	127	\N	5538
883	127	\N	5540
886	127	\N	5542
825	127	\N	5544
840	127	\N	5546
845	127	\N	5548
846	127	\N	5550
850	127	\N	5552
851	127	\N	5554
853	127	\N	5556
854	127	\N	5558
855	127	\N	5560
856	127	\N	5562
858	127	\N	5564
849	127	\N	5566
859	127	\N	5568
861	127	\N	5570
862	127	\N	5572
863	127	\N	5574
867	127	\N	5576
868	127	\N	5578
869	127	\N	5580
887	127	\N	5582
838	127	\N	5584
841	127	\N	5586
888	127	\N	5588
889	127	\N	5590
890	127	\N	5592
891	127	\N	5594
892	127	\N	5596
893	127	\N	5598
894	127	\N	5600
895	127	\N	5602
896	127	\N	5604
897	127	\N	5606
898	127	\N	5608
899	127	\N	5610
900	127	\N	5612
901	127	\N	5614
902	127	\N	5616
903	127	\N	5618
905	127	\N	5620
906	127	\N	5622
907	127	\N	5624
908	127	\N	5626
909	127	\N	5628
910	127	\N	5630
911	127	\N	5632
912	127	\N	5634
904	127	\N	5636
913	127	\N	5638
914	127	\N	5640
915	127	\N	5642
916	127	\N	5644
917	127	\N	5646
885	127	\N	5648
918	127	\N	5650
919	127	\N	5652
920	127	\N	5654
921	127	\N	5656
930	127	\N	5658
931	127	\N	5660
932	127	\N	5662
933	127	\N	5664
934	127	\N	5666
935	127	\N	5668
936	127	\N	5670
937	127	\N	5672
938	127	\N	5674
939	127	\N	5676
940	127	\N	5678
941	127	\N	5680
942	127	\N	5682
943	127	\N	5684
944	127	\N	5686
945	127	\N	5688
946	127	\N	5690
947	127	\N	5692
948	127	\N	5694
949	127	\N	5696
989	127	\N	5698
990	127	\N	5700
991	127	\N	5702
997	127	\N	5704
998	127	\N	5706
1000	127	\N	5708
996	127	\N	5710
999	127	\N	5712
1001	127	\N	5714
1002	127	\N	5716
1003	127	\N	5718
923	127	\N	5720
1016	127	\N	5722
1018	127	\N	5724
1080	127	\N	5726
1081	127	\N	5728
1082	127	\N	5730
924	127	\N	5732
1017	127	\N	5734
1019	127	\N	5736
1020	127	\N	5738
1021	127	\N	5740
1022	127	\N	5742
1023	127	\N	5744
1024	127	\N	5746
1025	127	\N	5748
1029	127	\N	5750
1030	127	\N	5752
1031	127	\N	5754
1032	127	\N	5756
1033	127	\N	5758
1034	127	\N	5760
1035	127	\N	5762
1036	127	\N	5764
1037	127	\N	5766
1038	127	\N	5768
922	127	\N	5770
1048	127	\N	5772
1049	127	\N	5774
1050	127	\N	5776
1051	127	\N	5778
1052	127	\N	5780
1053	127	\N	5782
1054	127	\N	5784
1055	127	\N	5786
1056	127	\N	5788
1057	127	\N	5790
1058	127	\N	5792
1059	127	\N	5794
1060	127	\N	5796
1061	127	\N	5798
1062	127	\N	5800
1063	127	\N	5802
1064	127	\N	5804
1065	127	\N	5806
1066	127	\N	5808
1068	127	\N	5810
1069	127	\N	5812
1070	127	\N	5814
1071	127	\N	5816
1072	127	\N	5818
1073	127	\N	5820
1074	127	\N	5822
1075	127	\N	5824
1077	127	\N	5826
1078	127	\N	5828
1076	127	\N	5830
1079	127	\N	5832
1083	127	\N	5834
1084	127	\N	5836
1085	127	\N	5838
1086	127	\N	5840
1087	127	\N	5842
1088	127	\N	5844
1089	127	\N	5846
1090	127	\N	5848
1091	127	\N	5850
1092	127	\N	5852
1093	127	\N	5854
1094	127	\N	5856
1095	127	\N	5858
1096	127	\N	5860
1097	127	\N	5862
1098	127	\N	5864
1099	127	\N	5866
1100	127	\N	5868
1101	127	\N	5870
1102	127	\N	5872
1103	127	\N	5874
1104	127	\N	5876
1105	127	\N	5878
1107	127	\N	5880
1115	127	\N	5882
1121	127	\N	5884
1127	127	\N	5886
1135	127	\N	5888
1106	127	\N	5890
1111	127	\N	5892
1108	127	\N	5894
1112	127	\N	5896
773	128	\N	5883
774	128	\N	5885
775	128	\N	5887
776	128	\N	5889
777	128	\N	5891
778	128	\N	5893
779	128	\N	5895
780	128	\N	5897
781	128	\N	5899
782	128	\N	5901
783	128	\N	5903
784	128	\N	5905
785	128	\N	5907
786	128	\N	5909
787	128	\N	5911
788	128	\N	5913
789	128	\N	5915
790	128	\N	5917
791	128	\N	5919
792	128	\N	5921
804	128	\N	5923
805	128	\N	5925
813	128	\N	5927
793	128	\N	5929
794	128	\N	5931
795	128	\N	5933
796	128	\N	5935
797	128	\N	5937
798	128	\N	5939
799	128	\N	5941
800	128	\N	5943
801	128	\N	5945
802	128	\N	5947
803	128	\N	5949
806	128	\N	5951
807	128	\N	5953
808	128	\N	5955
809	128	\N	5957
810	128	\N	5959
811	128	\N	5961
812	128	\N	5963
814	128	\N	5965
816	128	\N	5967
817	128	\N	5969
815	128	\N	5971
818	128	\N	5973
819	128	\N	5975
820	128	\N	5977
821	128	\N	5979
822	128	\N	5981
823	128	\N	5983
826	128	\N	5985
827	128	\N	5987
828	128	\N	5989
829	128	\N	5991
830	128	\N	5993
831	128	\N	5995
832	128	\N	5997
833	128	\N	5999
834	128	\N	6001
836	128	\N	6003
837	128	\N	6005
824	128	\N	6007
839	128	\N	6009
842	128	\N	6011
843	128	\N	6013
844	128	\N	6015
852	128	\N	6017
857	128	\N	6019
860	128	\N	6021
864	128	\N	6023
865	128	\N	6025
866	128	\N	6027
870	128	\N	6029
871	128	\N	6031
872	128	\N	6033
873	128	\N	6035
874	128	\N	6037
875	128	\N	6039
876	128	\N	6041
877	128	\N	6042
878	128	\N	6044
879	128	\N	6046
880	128	\N	6048
881	128	\N	6050
882	128	\N	6052
883	128	\N	6054
886	128	\N	6056
825	128	\N	6058
840	128	\N	6060
845	128	\N	6062
846	128	\N	6064
850	128	\N	6066
851	128	\N	6068
853	128	\N	6070
854	128	\N	6072
855	128	\N	6074
856	128	\N	6076
858	128	\N	6078
849	128	\N	6080
859	128	\N	6082
861	128	\N	6084
862	128	\N	6086
863	128	\N	6088
867	128	\N	6090
868	128	\N	6092
869	128	\N	6094
887	128	\N	6096
838	128	\N	6098
841	128	\N	6100
888	128	\N	6102
889	128	\N	6104
890	128	\N	6106
891	128	\N	6108
892	128	\N	6110
893	128	\N	6112
894	128	\N	6114
895	128	\N	6116
896	128	\N	6118
897	128	\N	6120
898	128	\N	6122
899	128	\N	6124
900	128	\N	6126
901	128	\N	6128
902	128	\N	6130
903	128	\N	6132
905	128	\N	6134
906	128	\N	6136
907	128	\N	6138
908	128	\N	6140
909	128	\N	6142
910	128	\N	6144
911	128	\N	6146
912	128	\N	6148
904	128	\N	6150
913	128	\N	6152
914	128	\N	6154
915	128	\N	6156
916	128	\N	6158
917	128	\N	6160
885	128	\N	6162
918	128	\N	6164
919	128	\N	6166
920	128	\N	6168
921	128	\N	6170
930	128	\N	6172
931	128	\N	6174
932	128	\N	6176
933	128	\N	6178
934	128	\N	6180
935	128	\N	6182
936	128	\N	6184
937	128	\N	6186
938	128	\N	6188
939	128	\N	6190
940	128	\N	6192
941	128	\N	6194
942	128	\N	6196
943	128	\N	6198
944	128	\N	6200
945	128	\N	6202
946	128	\N	6204
947	128	\N	6206
948	128	\N	6208
949	128	\N	6210
989	128	\N	6212
990	128	\N	6214
991	128	\N	6216
997	128	\N	6218
998	128	\N	6220
1000	128	\N	6222
996	128	\N	6224
999	128	\N	6226
1001	128	\N	6228
1002	128	\N	6230
1003	128	\N	6232
923	128	\N	6234
1016	128	\N	6236
1018	128	\N	6238
1080	128	\N	6240
1081	128	\N	6242
1082	128	\N	6244
924	128	\N	6246
1017	128	\N	6248
1019	128	\N	6250
1120	127	\N	5898
1145	127	\N	5900
1150	127	\N	5902
1159	127	\N	5904
1168	127	\N	5906
1184	127	\N	5908
1192	127	\N	5910
1109	127	\N	5912
1124	127	\N	5914
1134	127	\N	5916
1138	127	\N	5918
1143	127	\N	5920
1157	127	\N	5922
1166	127	\N	5924
1176	127	\N	5926
1182	127	\N	5928
1190	127	\N	5930
1199	127	\N	5932
1110	127	\N	5934
1113	127	\N	5936
1116	127	\N	5938
1125	127	\N	5940
1130	127	\N	5942
1146	127	\N	5944
1151	127	\N	5946
1160	127	\N	5948
1169	127	\N	5950
1186	127	\N	5952
1194	127	\N	5954
1114	127	\N	5956
1117	127	\N	5958
1126	127	\N	5960
1131	127	\N	5962
1132	127	\N	5964
1137	127	\N	5966
1139	127	\N	5968
1142	127	\N	5970
1144	127	\N	5972
1155	127	\N	5974
1156	127	\N	5976
1164	127	\N	5978
1165	127	\N	5980
1174	127	\N	5982
1175	127	\N	5984
1180	127	\N	5986
1181	127	\N	5988
1188	127	\N	5990
1189	127	\N	5992
1198	127	\N	5994
1118	127	\N	5996
1119	127	\N	5998
1122	127	\N	6000
1123	127	\N	6002
1128	127	\N	6004
1129	127	\N	6006
1133	127	\N	6008
1136	127	\N	6010
1140	127	\N	6012
1141	127	\N	6014
1147	127	\N	6016
1148	127	\N	6018
1149	127	\N	6020
1152	127	\N	6022
1153	127	\N	6024
1154	127	\N	6026
1158	127	\N	6028
1161	127	\N	6030
1162	127	\N	6032
1163	127	\N	6034
1167	127	\N	6036
1170	127	\N	6038
1171	127	\N	6040
1172	127	\N	6043
1173	127	\N	6045
1177	127	\N	6047
1178	127	\N	6049
1179	127	\N	6051
1235	127	\N	6053
1183	127	\N	6055
1236	127	\N	6057
1185	127	\N	6059
1237	127	\N	6061
1187	127	\N	6063
1191	127	\N	6065
1193	127	\N	6067
1195	127	\N	6069
1197	127	\N	6071
1196	127	\N	6073
1200	127	\N	6075
1201	127	\N	6077
1202	127	\N	6079
1203	127	\N	6081
1204	127	\N	6083
1205	127	\N	6085
1206	127	\N	6087
1207	127	\N	6089
1208	127	\N	6091
1209	127	\N	6093
1210	127	\N	6095
1211	127	\N	6097
1212	127	\N	6099
1213	127	\N	6101
1214	127	\N	6103
1215	127	\N	6105
1216	127	\N	6107
1217	127	\N	6109
1218	127	\N	6111
1219	127	\N	6113
1220	127	\N	6115
1221	127	\N	6117
1222	127	\N	6119
1224	127	\N	6121
1225	127	\N	6123
1226	127	\N	6125
1227	127	\N	6127
1228	127	\N	6129
1229	127	\N	6131
1230	127	\N	6133
1231	127	\N	6135
1232	127	\N	6137
1233	127	\N	6139
1223	127	\N	6141
1234	127	\N	6143
1238	127	\N	6145
1239	127	\N	6147
1240	127	\N	6149
1241	127	\N	6151
1242	127	\N	6153
1243	127	\N	6155
1244	127	\N	6157
1245	127	\N	6159
1246	127	\N	6161
1247	127	\N	6163
1248	127	\N	6165
1249	127	\N	6167
1250	127	\N	6169
1251	127	\N	6171
1252	127	\N	6173
1253	127	\N	6175
1254	127	\N	6177
1266	127	\N	6179
1278	127	\N	6181
1288	127	\N	6183
1297	127	\N	6185
1306	127	\N	6187
1315	127	\N	6189
1325	127	\N	6191
1334	127	\N	6193
1255	127	\N	6195
1261	127	\N	6197
1270	127	\N	6199
1282	127	\N	6201
1291	127	\N	6203
1301	127	\N	6205
1309	127	\N	6207
1319	127	\N	6209
1329	127	\N	6211
1338	127	\N	6213
1340	127	\N	6215
1350	127	\N	6217
1357	127	\N	6219
1256	127	\N	6221
1262	127	\N	6223
1271	127	\N	6225
1274	127	\N	6227
1284	127	\N	6229
1293	127	\N	6231
1303	127	\N	6233
1311	127	\N	6235
1321	127	\N	6237
1331	127	\N	6239
1345	127	\N	6241
1349	127	\N	6243
1356	127	\N	6245
1257	127	\N	6247
1267	127	\N	6249
1279	127	\N	6251
1298	127	\N	6253
1307	127	\N	6255
1316	127	\N	6257
1326	127	\N	6259
1335	127	\N	6261
1339	127	\N	6263
1344	127	\N	6265
1353	127	\N	6267
1020	128	\N	6252
1021	128	\N	6254
1022	128	\N	6256
1023	128	\N	6258
1024	128	\N	6260
1025	128	\N	6262
1029	128	\N	6264
1030	128	\N	6266
1031	128	\N	6268
1032	128	\N	6270
1033	128	\N	6272
1034	128	\N	6274
1035	128	\N	6276
1036	128	\N	6278
1037	128	\N	6280
1038	128	\N	6282
922	128	\N	6284
1048	128	\N	6286
1049	128	\N	6288
1050	128	\N	6290
1051	128	\N	6292
1052	128	\N	6294
1053	128	\N	6296
1054	128	\N	6298
1055	128	\N	6300
1056	128	\N	6302
1057	128	\N	6304
1058	128	\N	6306
1059	128	\N	6308
1060	128	\N	6310
1061	128	\N	6312
1062	128	\N	6315
1063	128	\N	6317
1064	128	\N	6319
1065	128	\N	6321
1066	128	\N	6323
1068	128	\N	6325
1069	128	\N	6327
1070	128	\N	6329
1071	128	\N	6331
1072	128	\N	6333
1073	128	\N	6335
1074	128	\N	6337
1075	128	\N	6339
1077	128	\N	6341
1078	128	\N	6343
1076	128	\N	6345
1079	128	\N	6347
1083	128	\N	6349
1084	128	\N	6351
1085	128	\N	6353
1086	128	\N	6355
1087	128	\N	6357
1088	128	\N	6359
1089	128	\N	6361
1090	128	\N	6363
1091	128	\N	6365
1092	128	\N	6367
1093	128	\N	6369
1094	128	\N	6371
1095	128	\N	6373
1096	128	\N	6375
1097	128	\N	6377
1098	128	\N	6379
1099	128	\N	6381
1100	128	\N	6383
1101	128	\N	6385
1102	128	\N	6390
1103	128	\N	6392
1104	128	\N	6394
1105	128	\N	6396
1107	128	\N	6398
1115	128	\N	6400
1121	128	\N	6402
1127	128	\N	6404
1135	128	\N	6406
1106	128	\N	6408
1111	128	\N	6410
1108	128	\N	6412
1112	128	\N	6414
1120	128	\N	6416
1145	128	\N	6418
1150	128	\N	6420
1159	128	\N	6422
1168	128	\N	6424
1184	128	\N	6426
1192	128	\N	6428
1109	128	\N	6430
1124	128	\N	6432
1134	128	\N	6434
1138	128	\N	6436
1143	128	\N	6438
1157	128	\N	6440
1166	128	\N	6442
1176	128	\N	6444
1182	128	\N	6446
1190	128	\N	6448
1199	128	\N	6450
1110	128	\N	6452
1113	128	\N	6454
1116	128	\N	6456
1125	128	\N	6458
1130	128	\N	6460
1146	128	\N	6462
1151	128	\N	6464
1160	128	\N	6466
1169	128	\N	6468
1186	128	\N	6470
1194	128	\N	6472
1114	128	\N	6474
1117	128	\N	6476
1126	128	\N	6478
1131	128	\N	6480
1132	128	\N	6482
1137	128	\N	6484
1139	128	\N	6486
1142	128	\N	6488
1144	128	\N	6490
1155	128	\N	6492
1156	128	\N	6494
1164	128	\N	6496
1165	128	\N	6498
1174	128	\N	6500
1175	128	\N	6502
1180	128	\N	6504
1181	128	\N	6506
1188	128	\N	6508
1189	128	\N	6510
1198	128	\N	6512
1118	128	\N	6514
1119	128	\N	6516
1122	128	\N	6518
1123	128	\N	6520
1128	128	\N	6522
1129	128	\N	6524
1133	128	\N	6526
1136	128	\N	6528
1140	128	\N	6530
1141	128	\N	6532
1147	128	\N	6534
1148	128	\N	6536
1149	128	\N	6538
1152	128	\N	6540
1153	128	\N	6542
1154	128	\N	6544
1158	128	\N	6546
1161	128	\N	6548
1162	128	\N	6550
1163	128	\N	6552
1167	128	\N	6554
1170	128	\N	6556
1171	128	\N	6558
1172	128	\N	6560
1173	128	\N	6562
1177	128	\N	6564
1178	128	\N	6566
1179	128	\N	6568
1235	128	\N	6570
1183	128	\N	6572
1236	128	\N	6574
1185	128	\N	6576
1237	128	\N	6578
1187	128	\N	6580
1191	128	\N	6582
1193	128	\N	6584
1195	128	\N	6586
1197	128	\N	6588
1196	128	\N	6590
1200	128	\N	6592
1201	128	\N	6594
1202	128	\N	6596
1203	128	\N	6598
1204	128	\N	6600
1205	128	\N	6602
1206	128	\N	6604
1207	128	\N	6606
1208	128	\N	6608
1209	128	\N	6610
1210	128	\N	6612
1211	128	\N	6614
1212	128	\N	6616
1213	128	\N	6618
1214	128	\N	6620
1215	128	\N	6622
1216	128	\N	6624
1363	127	\N	6269
1258	127	\N	6271
1268	127	\N	6273
1281	127	\N	6275
1290	127	\N	6277
1300	127	\N	6279
1308	127	\N	6281
1318	127	\N	6283
1328	127	\N	6285
1337	127	\N	6287
1259	127	\N	6289
1269	127	\N	6291
1273	127	\N	6293
1283	127	\N	6295
1292	127	\N	6297
1302	127	\N	6299
1310	127	\N	6301
1320	127	\N	6303
1330	127	\N	6305
1260	127	\N	6307
1280	127	\N	6309
1289	127	\N	6311
1299	127	\N	6313
1317	127	\N	6314
1327	127	\N	6316
1336	127	\N	6318
1346	127	\N	6320
1263	127	\N	6322
1272	127	\N	6324
1275	127	\N	6326
1285	127	\N	6328
1294	127	\N	6330
1304	127	\N	6332
1312	127	\N	6334
1322	127	\N	6336
1332	127	\N	6338
1341	127	\N	6340
1264	127	\N	6342
1276	127	\N	6344
1286	127	\N	6346
1295	127	\N	6348
1305	127	\N	6350
1313	127	\N	6352
1323	127	\N	6354
1343	127	\N	6356
1265	127	\N	6358
1277	127	\N	6360
1287	127	\N	6362
1296	127	\N	6364
1314	127	\N	6366
1324	127	\N	6368
1333	127	\N	6370
1342	127	\N	6372
1347	127	\N	6374
1348	127	\N	6376
1351	127	\N	6378
1415	127	\N	6380
1352	127	\N	6382
1354	127	\N	6384
1355	127	\N	6386
1358	127	\N	6387
1359	127	\N	6388
1360	127	\N	6389
1361	127	\N	6391
1362	127	\N	6393
1364	127	\N	6395
1365	127	\N	6397
1367	127	\N	6399
1369	127	\N	6401
1370	127	\N	6403
1416	127	\N	6405
1366	127	\N	6407
1368	127	\N	6409
1371	127	\N	6411
1372	127	\N	6413
1373	127	\N	6415
1374	127	\N	6417
1375	127	\N	6419
1376	127	\N	6421
1377	127	\N	6423
1378	127	\N	6425
1379	127	\N	6427
1382	127	\N	6429
1383	127	\N	6431
1384	127	\N	6433
1385	127	\N	6435
1386	127	\N	6437
1387	127	\N	6439
1388	127	\N	6441
1389	127	\N	6443
1390	127	\N	6445
1391	127	\N	6447
1392	127	\N	6449
1393	127	\N	6451
1394	127	\N	6453
1395	127	\N	6455
1396	127	\N	6457
1397	127	\N	6459
1398	127	\N	6461
1400	127	\N	6463
1399	127	\N	6465
1401	127	\N	6467
1402	127	\N	6469
1403	127	\N	6471
1404	127	\N	6473
1405	127	\N	6475
1406	127	\N	6477
1407	127	\N	6479
1408	127	\N	6481
1409	127	\N	6483
1410	127	\N	6485
1411	127	\N	6487
1412	127	\N	6489
1413	127	\N	6491
1414	127	\N	6493
1417	127	\N	6495
1418	127	\N	6497
1419	127	\N	6499
1420	127	\N	6501
1421	127	\N	6503
1422	127	\N	6505
1423	127	\N	6507
1424	127	\N	6509
1425	127	\N	6511
1426	127	\N	6513
1428	127	\N	6515
1427	127	\N	6517
1429	127	\N	6519
1430	127	\N	6521
1431	127	\N	6523
1432	127	\N	6525
1433	127	\N	6527
1438	127	\N	6529
1448	127	\N	6531
1458	127	\N	6533
1468	127	\N	6535
1478	127	\N	6537
1434	127	\N	6539
1439	127	\N	6541
1449	127	\N	6543
1459	127	\N	6545
1469	127	\N	6547
1479	127	\N	6549
1489	127	\N	6551
1503	127	\N	6553
1513	127	\N	6555
1522	127	\N	6557
1530	127	\N	6559
1540	127	\N	6561
1542	127	\N	6563
1552	127	\N	6565
1435	127	\N	6567
1445	127	\N	6569
1455	127	\N	6571
1465	127	\N	6573
1475	127	\N	6575
1436	127	\N	6577
1446	127	\N	6579
1456	127	\N	6581
1466	127	\N	6583
1476	127	\N	6585
1437	127	\N	6587
1447	127	\N	6589
1457	127	\N	6591
1467	127	\N	6593
1477	127	\N	6595
1486	127	\N	6597
1493	127	\N	6599
1498	127	\N	6601
1516	127	\N	6603
1525	127	\N	6605
1532	127	\N	6607
1543	127	\N	6609
1553	127	\N	6611
1440	127	\N	6613
1450	127	\N	6615
1460	127	\N	6617
1470	127	\N	6619
1480	127	\N	6621
1441	127	\N	6623
1451	127	\N	6625
1461	127	\N	6627
1471	127	\N	6629
1481	127	\N	6631
1442	127	\N	6633
1217	128	\N	6626
1218	128	\N	6628
1219	128	\N	6630
1220	128	\N	6632
1221	128	\N	6634
1222	128	\N	6636
1224	128	\N	6638
1225	128	\N	6640
1226	128	\N	6642
1227	128	\N	6644
1228	128	\N	6646
1229	128	\N	6648
1230	128	\N	6650
1231	128	\N	6652
1232	128	\N	6654
1233	128	\N	6656
1223	128	\N	6658
1234	128	\N	6660
1238	128	\N	6662
1239	128	\N	6664
1240	128	\N	6666
1241	128	\N	6668
1242	128	\N	6670
1243	128	\N	6672
1244	128	\N	6674
1245	128	\N	6676
1246	128	\N	6678
1247	128	\N	6680
1248	128	\N	6682
1249	128	\N	6684
1250	128	\N	6686
1251	128	\N	6688
1252	128	\N	6690
1253	128	\N	6692
1254	128	\N	6694
1266	128	\N	6696
1278	128	\N	6698
1288	128	\N	6699
1297	128	\N	6701
1306	128	\N	6703
1315	128	\N	6705
1325	128	\N	6707
1334	128	\N	6709
1255	128	\N	6711
1261	128	\N	6713
1270	128	\N	6715
1282	128	\N	6717
1291	128	\N	6719
1301	128	\N	6721
1309	128	\N	6723
1319	128	\N	6725
1329	128	\N	6727
1338	128	\N	6729
1340	128	\N	6731
1350	128	\N	6733
1357	128	\N	6735
1256	128	\N	6737
1262	128	\N	6739
1271	128	\N	6741
1274	128	\N	6743
1284	128	\N	6745
1293	128	\N	6747
1303	128	\N	6749
1311	128	\N	6751
1321	128	\N	6753
1331	128	\N	6755
1345	128	\N	6757
1349	128	\N	6759
1356	128	\N	6761
1257	128	\N	6763
1267	128	\N	6765
1279	128	\N	6767
1298	128	\N	6769
1307	128	\N	6771
1316	128	\N	6773
1326	128	\N	6775
1335	128	\N	6777
1339	128	\N	6779
1344	128	\N	6781
1353	128	\N	6783
1363	128	\N	6785
1258	128	\N	6787
1268	128	\N	6789
1281	128	\N	6791
1290	128	\N	6793
1300	128	\N	6795
1308	128	\N	6797
1318	128	\N	6799
1328	128	\N	6801
1337	128	\N	6803
1259	128	\N	6805
1269	128	\N	6807
1273	128	\N	6809
1283	128	\N	6811
1292	128	\N	6813
1302	128	\N	6815
1310	128	\N	6817
1320	128	\N	6819
1330	128	\N	6821
1260	128	\N	6823
1280	128	\N	6825
1289	128	\N	6827
1299	128	\N	6829
1317	128	\N	6831
1327	128	\N	6833
1336	128	\N	6835
1346	128	\N	6837
1263	128	\N	6839
1272	128	\N	6841
1275	128	\N	6843
1285	128	\N	6845
1294	128	\N	6847
1304	128	\N	6849
1312	128	\N	6851
1322	128	\N	6853
1332	128	\N	6855
1341	128	\N	6857
1264	128	\N	6859
1276	128	\N	6861
1286	128	\N	6863
1295	128	\N	6865
1305	128	\N	6867
1313	128	\N	6869
1323	128	\N	6871
1343	128	\N	6873
1265	128	\N	6875
1277	128	\N	6877
1287	128	\N	6879
1296	128	\N	6881
1314	128	\N	6883
1324	128	\N	6885
1333	128	\N	6887
1342	128	\N	6889
1347	128	\N	6891
1348	128	\N	6893
1351	128	\N	6895
1415	128	\N	6897
1352	128	\N	6899
1354	128	\N	6901
1355	128	\N	6903
1358	128	\N	6905
1359	128	\N	6907
1360	128	\N	6909
1361	128	\N	6911
1362	128	\N	6913
1364	128	\N	6915
1365	128	\N	6917
1367	128	\N	6919
1369	128	\N	6921
1370	128	\N	6923
1416	128	\N	6925
1366	128	\N	6927
1368	128	\N	6929
1371	128	\N	6931
1372	128	\N	6933
1373	128	\N	6935
1374	128	\N	6937
1375	128	\N	6939
1376	128	\N	6941
1377	128	\N	6943
1378	128	\N	6945
1379	128	\N	6947
1382	128	\N	6949
1383	128	\N	6951
1384	128	\N	6953
1385	128	\N	6955
1386	128	\N	6957
1387	128	\N	6959
1388	128	\N	6961
1389	128	\N	6963
1390	128	\N	6965
1391	128	\N	6967
1392	128	\N	6969
1393	128	\N	6971
1394	128	\N	6973
1395	128	\N	6975
1396	128	\N	6977
1397	128	\N	6979
1398	128	\N	6981
1400	128	\N	6983
1399	128	\N	6985
1401	128	\N	6987
1402	128	\N	6989
1403	128	\N	6991
1404	128	\N	6993
1452	127	\N	6635
1462	127	\N	6637
1472	127	\N	6639
1443	127	\N	6641
1453	127	\N	6643
1463	127	\N	6645
1473	127	\N	6647
1482	127	\N	6649
1444	127	\N	6651
1454	127	\N	6653
1464	127	\N	6655
1474	127	\N	6657
1483	127	\N	6659
1484	127	\N	6661
1485	127	\N	6663
1487	127	\N	6665
1488	127	\N	6667
1490	127	\N	6669
1491	127	\N	6671
1492	127	\N	6673
1494	127	\N	6675
1495	127	\N	6677
1496	127	\N	6679
1497	127	\N	6681
1499	127	\N	6683
1500	127	\N	6685
1501	127	\N	6687
1502	127	\N	6689
1504	127	\N	6691
1505	127	\N	6693
1506	127	\N	6695
1507	127	\N	6697
1508	127	\N	6700
1509	127	\N	6702
1510	127	\N	6704
1511	127	\N	6706
1512	127	\N	6708
1514	127	\N	6710
1515	127	\N	6712
1517	127	\N	6714
1518	127	\N	6716
1519	127	\N	6718
1520	127	\N	6720
1521	127	\N	6722
1523	127	\N	6724
1524	127	\N	6726
1526	127	\N	6728
1527	127	\N	6730
1528	127	\N	6732
1529	127	\N	6734
1531	127	\N	6736
1533	127	\N	6738
1534	127	\N	6740
1535	127	\N	6742
1536	127	\N	6744
1537	127	\N	6746
1538	127	\N	6748
1539	127	\N	6750
1541	127	\N	6752
1544	127	\N	6754
1545	127	\N	6756
1546	127	\N	6758
1547	127	\N	6760
1548	127	\N	6762
1549	127	\N	6764
1550	127	\N	6766
1551	127	\N	6768
1554	127	\N	6770
1555	127	\N	6772
1556	127	\N	6774
1557	127	\N	6776
1558	127	\N	6778
1559	127	\N	6780
1560	127	\N	6782
1561	127	\N	6784
1562	127	\N	6786
1563	127	\N	6788
1564	127	\N	6790
1565	127	\N	6792
1566	127	\N	6794
1567	127	\N	6796
1568	127	\N	6798
1569	127	\N	6800
1570	127	\N	6802
1571	127	\N	6804
1572	127	\N	6806
1573	127	\N	6808
1575	127	\N	6810
1576	127	\N	6812
1577	127	\N	6814
1578	127	\N	6816
1579	127	\N	6818
1580	127	\N	6820
1581	127	\N	6822
1582	127	\N	6824
1583	127	\N	6826
1584	127	\N	6828
1590	127	\N	6830
1599	127	\N	6832
1604	127	\N	6834
1609	127	\N	6836
1615	127	\N	6838
1629	127	\N	6840
1641	127	\N	6842
1651	127	\N	6844
1664	127	\N	6846
1670	127	\N	6848
1677	127	\N	6850
1685	127	\N	6852
1692	127	\N	6854
1709	127	\N	6856
1718	127	\N	6858
1722	127	\N	6860
1734	127	\N	6862
1743	127	\N	6864
1750	127	\N	6866
1585	127	\N	6868
1594	127	\N	6870
1606	127	\N	6872
1616	127	\N	6874
1635	127	\N	6876
1645	127	\N	6878
1655	127	\N	6880
1661	127	\N	6882
1667	127	\N	6884
1674	127	\N	6886
1682	127	\N	6888
1690	127	\N	6890
1574	127	\N	6892
1704	127	\N	6894
1586	127	\N	6896
1607	127	\N	6898
1611	127	\N	6900
1620	127	\N	6902
1637	127	\N	6904
1647	127	\N	6906
1657	127	\N	6908
1662	127	\N	6910
1676	127	\N	6912
1683	127	\N	6914
1699	127	\N	6916
1706	127	\N	6918
1710	127	\N	6920
1715	127	\N	6922
1719	127	\N	6924
1587	127	\N	6926
1595	127	\N	6928
1602	127	\N	6930
1619	127	\N	6932
1626	127	\N	6934
1638	127	\N	6936
1648	127	\N	6938
1688	127	\N	6940
1717	127	\N	6942
1588	127	\N	6944
1596	127	\N	6946
1608	127	\N	6948
1613	127	\N	6950
1623	127	\N	6952
1631	127	\N	6954
1640	127	\N	6956
1650	127	\N	6958
1658	127	\N	6960
1665	127	\N	6962
1671	127	\N	6964
1678	127	\N	6966
1686	127	\N	6968
1693	127	\N	6970
1698	127	\N	6972
1705	127	\N	6974
1714	127	\N	6976
1728	127	\N	6978
1748	127	\N	6980
1758	127	\N	6982
1589	127	\N	6984
1597	127	\N	6986
1603	127	\N	6988
1621	127	\N	6990
1627	127	\N	6992
1639	127	\N	6994
1649	127	\N	6996
1666	127	\N	6998
1672	127	\N	7000
1679	127	\N	7002
1687	127	\N	7004
1405	128	\N	6995
1406	128	\N	6997
1407	128	\N	6999
1408	128	\N	7001
1409	128	\N	7003
1410	128	\N	7005
1411	128	\N	7007
1412	128	\N	7009
1413	128	\N	7011
1414	128	\N	7013
1417	128	\N	7015
1418	128	\N	7017
1419	128	\N	7019
1420	128	\N	7021
1421	128	\N	7023
1422	128	\N	7025
1423	128	\N	7027
1424	128	\N	7029
1425	128	\N	7031
1426	128	\N	7033
1428	128	\N	7035
1427	128	\N	7037
1429	128	\N	7039
1430	128	\N	7041
1431	128	\N	7043
1432	128	\N	7045
1433	128	\N	7047
1438	128	\N	7049
1448	128	\N	7051
1458	128	\N	7053
1468	128	\N	7055
1478	128	\N	7057
1434	128	\N	7059
1439	128	\N	7061
1449	128	\N	7063
1459	128	\N	7065
1469	128	\N	7067
1479	128	\N	7069
1489	128	\N	7071
1503	128	\N	7073
1513	128	\N	7075
1522	128	\N	7077
1530	128	\N	7079
1540	128	\N	7081
1542	128	\N	7083
1552	128	\N	7085
1435	128	\N	7087
1445	128	\N	7089
1455	128	\N	7091
1465	128	\N	7093
1475	128	\N	7095
1436	128	\N	7097
1446	128	\N	7099
1456	128	\N	7101
1466	128	\N	7103
1476	128	\N	7105
1437	128	\N	7107
1447	128	\N	7109
1457	128	\N	7111
1467	128	\N	7113
1477	128	\N	7115
1486	128	\N	7117
1493	128	\N	7119
1498	128	\N	7121
1516	128	\N	7123
1525	128	\N	7125
1532	128	\N	7127
1543	128	\N	7129
1553	128	\N	7131
1440	128	\N	7133
1450	128	\N	7135
1460	128	\N	7137
1470	128	\N	7139
1480	128	\N	7141
1441	128	\N	7143
1451	128	\N	7145
1461	128	\N	7147
1471	128	\N	7149
1481	128	\N	7151
1442	128	\N	7153
1452	128	\N	7155
1462	128	\N	7157
1472	128	\N	7159
1443	128	\N	7161
1453	128	\N	7163
1463	128	\N	7165
1473	128	\N	7167
1482	128	\N	7169
1444	128	\N	7171
1454	128	\N	7173
1464	128	\N	7175
1474	128	\N	7177
1483	128	\N	7179
1484	128	\N	7181
1485	128	\N	7183
1487	128	\N	7185
1488	128	\N	7187
1490	128	\N	7189
1491	128	\N	7191
1492	128	\N	7193
1494	128	\N	7195
1495	128	\N	7197
1496	128	\N	7199
1497	128	\N	7201
1499	128	\N	7203
1500	128	\N	7205
1501	128	\N	7207
1502	128	\N	7209
1504	128	\N	7211
1505	128	\N	7213
1506	128	\N	7215
1507	128	\N	7217
1508	128	\N	7219
1509	128	\N	7221
1510	128	\N	7223
1511	128	\N	7225
1512	128	\N	7227
1514	128	\N	7229
1515	128	\N	7231
1517	128	\N	7233
1518	128	\N	7235
1519	128	\N	7237
1520	128	\N	7239
1521	128	\N	7241
1523	128	\N	7243
1524	128	\N	7245
1526	128	\N	7247
1527	128	\N	7249
1528	128	\N	7251
1529	128	\N	7253
1531	128	\N	7255
1533	128	\N	7257
1534	128	\N	7259
1535	128	\N	7261
1536	128	\N	7263
1537	128	\N	7265
1538	128	\N	7267
1539	128	\N	7269
1541	128	\N	7271
1544	128	\N	7273
1545	128	\N	7275
1546	128	\N	7277
1547	128	\N	7279
1548	128	\N	7281
1549	128	\N	7283
1550	128	\N	7285
1551	128	\N	7287
1554	128	\N	7289
1555	128	\N	7291
1556	128	\N	7293
1557	128	\N	7295
1558	128	\N	7297
1559	128	\N	7299
1560	128	\N	7301
1561	128	\N	7303
1562	128	\N	7305
1563	128	\N	7307
1564	128	\N	7309
1565	128	\N	7311
1566	128	\N	7313
1567	128	\N	7315
1568	128	\N	7317
1569	128	\N	7319
1570	128	\N	7321
1571	128	\N	7323
1572	128	\N	7325
1573	128	\N	7327
1575	128	\N	7329
1576	128	\N	7331
1577	128	\N	7333
1578	128	\N	7335
1579	128	\N	7337
1580	128	\N	7339
1581	128	\N	7341
1582	128	\N	7343
1583	128	\N	7345
1584	128	\N	7347
1590	128	\N	7349
1599	128	\N	7351
1604	128	\N	7353
1609	128	\N	7355
1615	128	\N	7357
1629	128	\N	7359
1641	128	\N	7361
1651	128	\N	7363
1694	127	\N	7006
1702	127	\N	7008
1708	127	\N	7010
1713	127	\N	7012
1591	127	\N	7014
1600	127	\N	7016
1614	127	\N	7018
1624	127	\N	7020
1633	127	\N	7022
1643	127	\N	7024
1653	127	\N	7026
1659	127	\N	7028
1673	127	\N	7030
1680	127	\N	7032
1707	127	\N	7034
1720	127	\N	7036
1723	127	\N	7038
1732	127	\N	7040
1737	127	\N	7042
1739	127	\N	7044
1745	127	\N	7046
1754	127	\N	7048
1592	127	\N	7050
1605	127	\N	7052
1617	127	\N	7054
1625	127	\N	7056
1630	127	\N	7058
1636	127	\N	7060
1646	127	\N	7062
1656	127	\N	7064
1660	127	\N	7066
1668	127	\N	7068
1675	127	\N	7070
1695	127	\N	7072
1700	127	\N	7074
1711	127	\N	7076
1593	127	\N	7078
1601	127	\N	7080
1610	127	\N	7082
1618	127	\N	7084
1634	127	\N	7086
1644	127	\N	7088
1654	127	\N	7090
1598	127	\N	7092
1612	127	\N	7094
1622	127	\N	7096
1628	127	\N	7098
1632	127	\N	7100
1642	127	\N	7102
1652	127	\N	7104
1663	127	\N	7106
1669	127	\N	7108
1681	127	\N	7110
1684	127	\N	7112
1689	127	\N	7114
1691	127	\N	7116
1696	127	\N	7118
1697	127	\N	7120
1701	127	\N	7122
1703	127	\N	7124
1712	127	\N	7126
1716	127	\N	7128
1721	127	\N	7130
1724	127	\N	7132
1725	127	\N	7134
1726	127	\N	7136
1727	127	\N	7138
1729	127	\N	7140
1730	127	\N	7142
1731	127	\N	7144
1733	127	\N	7146
1735	127	\N	7148
1736	127	\N	7150
1738	127	\N	7152
1740	127	\N	7154
1741	127	\N	7156
1742	127	\N	7158
1744	127	\N	7160
1746	127	\N	7162
1747	127	\N	7164
1749	127	\N	7166
1751	127	\N	7168
1752	127	\N	7170
1753	127	\N	7172
1755	127	\N	7174
1756	127	\N	7176
1757	127	\N	7178
1759	127	\N	7180
1760	127	\N	7182
1761	127	\N	7184
1762	127	\N	7186
1763	127	\N	7188
1764	127	\N	7190
1765	127	\N	7192
1766	127	\N	7194
1767	127	\N	7196
1768	127	\N	7198
1769	127	\N	7200
1770	127	\N	7202
1771	127	\N	7204
1772	127	\N	7206
1773	127	\N	7208
1774	127	\N	7210
1775	127	\N	7212
1776	127	\N	7214
1777	127	\N	7216
1778	127	\N	7218
1779	127	\N	7220
1780	127	\N	7222
1781	127	\N	7224
1782	127	\N	7226
1783	127	\N	7228
1784	127	\N	7230
1785	127	\N	7232
1786	127	\N	7234
1787	127	\N	7236
1788	127	\N	7238
884	127	\N	7240
1789	127	\N	7242
1792	127	\N	7244
1793	127	\N	7246
1794	127	\N	7248
1795	127	\N	7250
1791	127	\N	7252
1790	127	\N	7254
1798	127	\N	7256
1799	127	\N	7258
1800	127	\N	7260
1801	127	\N	7262
1802	127	\N	7264
1803	127	\N	7266
1804	127	\N	7268
1805	127	\N	7270
1806	127	\N	7272
1807	127	\N	7274
1818	127	\N	7276
1827	127	\N	7278
1835	127	\N	7280
1808	127	\N	7282
1819	127	\N	7284
1828	127	\N	7286
1830	127	\N	7288
1809	127	\N	7290
1821	127	\N	7292
1810	127	\N	7294
1820	127	\N	7296
1829	127	\N	7298
1811	127	\N	7300
1822	127	\N	7302
1846	127	\N	7304
1859	127	\N	7306
1872	127	\N	7308
1881	127	\N	7310
1885	127	\N	7312
1893	127	\N	7314
1901	127	\N	7316
1905	127	\N	7318
1912	127	\N	7320
1812	127	\N	7322
1815	127	\N	7324
1823	127	\N	7326
1813	127	\N	7328
1814	127	\N	7330
1824	127	\N	7332
1842	127	\N	7334
1864	127	\N	7336
1870	127	\N	7338
1879	127	\N	7340
1892	127	\N	7342
1816	127	\N	7344
1825	127	\N	7346
1817	127	\N	7348
1826	127	\N	7350
1831	127	\N	7352
1832	127	\N	7354
1833	127	\N	7356
1834	127	\N	7358
1836	127	\N	7360
1837	127	\N	7362
1838	127	\N	7364
1839	127	\N	7366
1840	127	\N	7368
1843	127	\N	7370
1844	127	\N	7372
1845	127	\N	7374
1664	128	\N	7365
1670	128	\N	7367
1677	128	\N	7369
1685	128	\N	7371
1692	128	\N	7373
1709	128	\N	7375
1718	128	\N	7377
1722	128	\N	7379
1734	128	\N	7381
1743	128	\N	7383
1750	128	\N	7385
1585	128	\N	7387
1594	128	\N	7389
1606	128	\N	7391
1616	128	\N	7393
1635	128	\N	7395
1645	128	\N	7397
1655	128	\N	7399
1661	128	\N	7401
1667	128	\N	7403
1674	128	\N	7405
1682	128	\N	7407
1690	128	\N	7409
1574	128	\N	7411
1704	128	\N	7413
1586	128	\N	7415
1607	128	\N	7417
1611	128	\N	7419
1620	128	\N	7421
1637	128	\N	7423
1647	128	\N	7425
1657	128	\N	7427
1662	128	\N	7429
1676	128	\N	7431
1683	128	\N	7433
1699	128	\N	7435
1706	128	\N	7437
1710	128	\N	7439
1715	128	\N	7441
1719	128	\N	7443
1587	128	\N	7445
1595	128	\N	7447
1602	128	\N	7449
1619	128	\N	7451
1626	128	\N	7453
1638	128	\N	7455
1648	128	\N	7457
1688	128	\N	7459
1717	128	\N	7461
1588	128	\N	7463
1596	128	\N	7465
1608	128	\N	7467
1613	128	\N	7469
1623	128	\N	7471
1631	128	\N	7473
1640	128	\N	7475
1650	128	\N	7477
1658	128	\N	7479
1665	128	\N	7481
1671	128	\N	7483
1678	128	\N	7485
1686	128	\N	7487
1693	128	\N	7489
1698	128	\N	7491
1705	128	\N	7493
1714	128	\N	7495
1728	128	\N	7497
1748	128	\N	7499
1758	128	\N	7501
1589	128	\N	7503
1597	128	\N	7505
1603	128	\N	7507
1621	128	\N	7509
1627	128	\N	7511
1639	128	\N	7513
1649	128	\N	7515
1666	128	\N	7517
1672	128	\N	7519
1679	128	\N	7521
1687	128	\N	7523
1694	128	\N	7525
1702	128	\N	7527
1708	128	\N	7529
1713	128	\N	7531
1591	128	\N	7533
1600	128	\N	7535
1614	128	\N	7537
1624	128	\N	7539
1633	128	\N	7541
1643	128	\N	7543
1653	128	\N	7545
1659	128	\N	7547
1673	128	\N	7549
1680	128	\N	7551
1707	128	\N	7553
1720	128	\N	7555
1723	128	\N	7557
1732	128	\N	7559
1737	128	\N	7561
1739	128	\N	7563
1745	128	\N	7565
1754	128	\N	7567
1592	128	\N	7569
1605	128	\N	7571
1617	128	\N	7573
1625	128	\N	7575
1630	128	\N	7577
1636	128	\N	7579
1646	128	\N	7581
1656	128	\N	7583
1660	128	\N	7585
1668	128	\N	7587
1675	128	\N	7589
1695	128	\N	7591
1700	128	\N	7593
1711	128	\N	7595
1593	128	\N	7597
1601	128	\N	7599
1610	128	\N	7601
1618	128	\N	7603
1634	128	\N	7605
1644	128	\N	7607
1654	128	\N	7609
1598	128	\N	7611
1612	128	\N	7613
1622	128	\N	7615
1628	128	\N	7617
1632	128	\N	7619
1642	128	\N	7621
1652	128	\N	7623
1663	128	\N	7625
1669	128	\N	7627
1681	128	\N	7629
1684	128	\N	7631
1689	128	\N	7633
1691	128	\N	7635
1696	128	\N	7637
1697	128	\N	7639
1701	128	\N	7641
1703	128	\N	7643
1712	128	\N	7645
1716	128	\N	7647
1721	128	\N	7649
1724	128	\N	7651
1725	128	\N	7653
1726	128	\N	7655
1727	128	\N	7657
1729	128	\N	7659
1730	128	\N	7661
1731	128	\N	7663
1733	128	\N	7665
1735	128	\N	7667
1736	128	\N	7669
1738	128	\N	7671
1740	128	\N	7673
1741	128	\N	7675
1742	128	\N	7677
1744	128	\N	7679
1746	128	\N	7681
1747	128	\N	7683
1749	128	\N	7685
1751	128	\N	7687
1752	128	\N	7689
1753	128	\N	7691
1755	128	\N	7693
1756	128	\N	7695
1757	128	\N	7697
1759	128	\N	7699
1760	128	\N	7701
1761	128	\N	7703
1762	128	\N	7705
1763	128	\N	7707
1764	128	\N	7709
1765	128	\N	7710
1766	128	\N	7713
1767	128	\N	7715
1768	128	\N	7717
1769	128	\N	7719
1770	128	\N	7721
1771	128	\N	7723
1772	128	\N	7725
1773	128	\N	7727
1774	128	\N	7729
1775	128	\N	7731
1776	128	\N	7733
1841	127	\N	7376
1847	127	\N	7378
1848	127	\N	7380
1849	127	\N	7382
1851	127	\N	7384
1852	127	\N	7386
1853	127	\N	7388
1854	127	\N	7390
1855	127	\N	7392
1856	127	\N	7394
1857	127	\N	7396
1858	127	\N	7398
1860	127	\N	7400
1861	127	\N	7402
1862	127	\N	7404
1863	127	\N	7406
1865	127	\N	7408
1866	127	\N	7410
1867	127	\N	7412
1868	127	\N	7414
1869	127	\N	7416
1871	127	\N	7418
1873	127	\N	7420
1874	127	\N	7422
1875	127	\N	7424
1877	127	\N	7426
1876	127	\N	7428
1878	127	\N	7430
1880	127	\N	7432
1882	127	\N	7434
1883	127	\N	7436
1884	127	\N	7438
1886	127	\N	7440
1887	127	\N	7442
1888	127	\N	7444
1889	127	\N	7446
1890	127	\N	7448
1891	127	\N	7450
1894	127	\N	7452
1895	127	\N	7454
1896	127	\N	7456
1897	127	\N	7458
1898	127	\N	7460
1899	127	\N	7462
1900	127	\N	7464
1902	127	\N	7466
1903	127	\N	7468
1904	127	\N	7470
1906	127	\N	7472
1907	127	\N	7474
1908	127	\N	7476
1909	127	\N	7478
1910	127	\N	7480
1911	127	\N	7482
1913	127	\N	7484
1914	127	\N	7486
1915	127	\N	7488
1916	127	\N	7490
1918	127	\N	7492
1919	127	\N	7494
1917	127	\N	7496
1920	127	\N	7498
1921	127	\N	7500
1922	127	\N	7502
1923	127	\N	7504
1924	127	\N	7506
1925	127	\N	7508
1926	127	\N	7510
1927	127	\N	7512
1928	127	\N	7514
1929	127	\N	7516
1930	127	\N	7518
1931	127	\N	7520
1932	127	\N	7522
1933	127	\N	7524
1934	127	\N	7526
1935	127	\N	7528
1936	127	\N	7530
1937	127	\N	7532
1938	127	\N	7534
1948	127	\N	7536
1958	127	\N	7538
1967	127	\N	7540
1971	127	\N	7542
1939	127	\N	7544
1940	127	\N	7546
1944	127	\N	7548
1963	127	\N	7550
1941	127	\N	7552
1942	127	\N	7554
1952	127	\N	7556
1960	127	\N	7558
1974	127	\N	7560
1946	127	\N	7562
1947	127	\N	7564
1955	127	\N	7566
1956	127	\N	7568
1964	127	\N	7570
1950	127	\N	7572
1949	127	\N	7574
1957	127	\N	7576
1965	127	\N	7578
1966	127	\N	7580
1970	127	\N	7582
1951	127	\N	7584
1961	127	\N	7586
1969	127	\N	7588
1973	127	\N	7590
1953	127	\N	7592
1959	127	\N	7594
1968	127	\N	7596
1972	127	\N	7598
1962	127	\N	7600
1975	127	\N	7602
1977	127	\N	7604
1976	127	\N	7606
1978	127	\N	7608
1979	127	\N	7610
1980	127	\N	7612
1982	127	\N	7614
1981	127	\N	7616
1983	127	\N	7618
1984	127	\N	7620
1985	127	\N	7622
1986	127	\N	7624
1987	127	\N	7626
1988	127	\N	7628
1989	127	\N	7630
1990	127	\N	7632
1991	127	\N	7634
1992	127	\N	7636
1993	127	\N	7638
1994	127	\N	7640
1995	127	\N	7642
1996	127	\N	7644
1997	127	\N	7646
1998	127	\N	7648
1999	127	\N	7650
2000	127	\N	7652
2001	127	\N	7654
2002	127	\N	7656
2003	127	\N	7658
2004	127	\N	7660
2005	127	\N	7662
2006	127	\N	7664
2007	127	\N	7666
2008	127	\N	7668
2009	127	\N	7670
2010	127	\N	7672
2011	127	\N	7674
2012	127	\N	7676
2013	127	\N	7678
2014	127	\N	7680
2015	127	\N	7682
2016	127	\N	7684
2017	127	\N	7686
2018	127	\N	7688
2019	127	\N	7690
2020	127	\N	7692
2021	127	\N	7694
2022	127	\N	7696
2023	127	\N	7698
2024	127	\N	7700
2025	127	\N	7702
2026	127	\N	7704
2027	127	\N	7706
2029	127	\N	7708
2030	127	\N	7711
2028	127	\N	7712
2031	127	\N	7714
2032	127	\N	7716
2033	127	\N	7718
2034	127	\N	7720
2035	127	\N	7722
2036	127	\N	7724
2037	127	\N	7726
2038	127	\N	7728
2053	127	\N	7740
2054	127	\N	7742
2055	127	\N	7744
1777	128	\N	7735
1778	128	\N	7737
1779	128	\N	7739
1780	128	\N	7741
1781	128	\N	7743
1782	128	\N	7745
1783	128	\N	7747
1784	128	\N	7749
1785	128	\N	7751
1786	128	\N	7752
1787	128	\N	7753
1788	128	\N	7754
884	128	\N	7755
1789	128	\N	7756
1792	128	\N	7757
1793	128	\N	7758
1794	128	\N	7759
1795	128	\N	7760
1791	128	\N	7761
1790	128	\N	7762
1798	128	\N	7763
1799	128	\N	7764
1800	128	\N	7765
1801	128	\N	7766
1802	128	\N	7767
1803	128	\N	7768
1804	128	\N	7769
1805	128	\N	7770
1806	128	\N	7771
1807	128	\N	7772
1818	128	\N	7773
1827	128	\N	7774
1835	128	\N	7775
1808	128	\N	7776
1819	128	\N	7777
1828	128	\N	7778
1830	128	\N	7779
1809	128	\N	7780
1821	128	\N	7781
1810	128	\N	7782
1820	128	\N	7783
1829	128	\N	7784
1811	128	\N	7785
1822	128	\N	7786
1846	128	\N	7787
1859	128	\N	7788
1872	128	\N	7789
1881	128	\N	7790
1885	128	\N	7791
1893	128	\N	7792
1901	128	\N	7793
1905	128	\N	7794
1912	128	\N	7795
1812	128	\N	7796
1815	128	\N	7797
1823	128	\N	7798
1813	128	\N	7799
1814	128	\N	7800
1824	128	\N	7801
1842	128	\N	7802
1864	128	\N	7803
1870	128	\N	7804
1879	128	\N	7805
1892	128	\N	7806
1816	128	\N	7807
1825	128	\N	7808
1817	128	\N	7809
1826	128	\N	7810
1831	128	\N	7811
1832	128	\N	7812
1833	128	\N	7813
1834	128	\N	7814
1836	128	\N	7815
1837	128	\N	7816
1838	128	\N	7817
1839	128	\N	7818
1840	128	\N	7819
1843	128	\N	7820
1844	128	\N	7821
1845	128	\N	7822
1841	128	\N	7823
1847	128	\N	7824
1848	128	\N	7825
1849	128	\N	7826
1851	128	\N	7827
1852	128	\N	7828
1853	128	\N	7829
1854	128	\N	7830
1855	128	\N	7831
1856	128	\N	7832
1857	128	\N	7833
1858	128	\N	7834
1860	128	\N	7835
1861	128	\N	7836
1862	128	\N	7837
1863	128	\N	7838
1865	128	\N	7839
1866	128	\N	7840
1867	128	\N	7841
1868	128	\N	7842
1869	128	\N	7843
1871	128	\N	7844
1873	128	\N	7845
1874	128	\N	7846
1875	128	\N	7847
1877	128	\N	7848
1876	128	\N	7849
1878	128	\N	7850
1880	128	\N	7851
1882	128	\N	7852
1883	128	\N	7853
1884	128	\N	7854
1886	128	\N	7855
1887	128	\N	7856
1888	128	\N	7857
1889	128	\N	7858
1890	128	\N	7859
1891	128	\N	7860
1894	128	\N	7861
1895	128	\N	7862
1896	128	\N	7863
1897	128	\N	7864
1898	128	\N	7865
1899	128	\N	7866
1900	128	\N	7867
1902	128	\N	7868
1903	128	\N	7869
1904	128	\N	7870
1906	128	\N	7871
1907	128	\N	7872
1908	128	\N	7873
1909	128	\N	7874
1910	128	\N	7875
1911	128	\N	7876
1913	128	\N	7877
1914	128	\N	7878
1915	128	\N	7879
1916	128	\N	7880
1918	128	\N	7881
1919	128	\N	7882
1917	128	\N	7883
1920	128	\N	7884
1921	128	\N	7885
1922	128	\N	7886
1923	128	\N	7887
1924	128	\N	7888
1925	128	\N	7889
1926	128	\N	7890
1927	128	\N	7891
1928	128	\N	7892
1929	128	\N	7893
1930	128	\N	7894
1931	128	\N	7895
1932	128	\N	7896
1933	128	\N	7897
1934	128	\N	7898
1935	128	\N	7899
1936	128	\N	7900
1937	128	\N	7901
1938	128	\N	7902
1948	128	\N	7903
1958	128	\N	7904
1967	128	\N	7905
1971	128	\N	7906
1939	128	\N	7907
1940	128	\N	7908
1944	128	\N	7909
1963	128	\N	7910
1941	128	\N	7911
1942	128	\N	7912
1952	128	\N	7913
1960	128	\N	7914
1974	128	\N	7915
1946	128	\N	7916
1947	128	\N	7917
1955	128	\N	7918
1956	128	\N	7919
1964	128	\N	7920
1950	128	\N	7921
1949	128	\N	7922
1957	128	\N	7923
1965	128	\N	7924
1966	128	\N	7925
1970	128	\N	7926
1951	128	\N	7927
2056	127	\N	7746
2057	127	\N	7748
2058	127	\N	7750
1961	128	\N	7928
1969	128	\N	7929
1973	128	\N	7930
1953	128	\N	7931
1959	128	\N	7932
1968	128	\N	7933
1972	128	\N	7934
1962	128	\N	7935
1975	128	\N	7936
1977	128	\N	7937
1976	128	\N	7938
1978	128	\N	7939
1979	128	\N	7940
1980	128	\N	7941
1982	128	\N	7942
1981	128	\N	7943
1983	128	\N	7944
1984	128	\N	7945
1985	128	\N	7946
1986	128	\N	7947
1987	128	\N	7948
1988	128	\N	7949
1989	128	\N	7950
1990	128	\N	7951
1991	128	\N	7952
1992	128	\N	7953
1993	128	\N	7954
1994	128	\N	7955
1995	128	\N	7956
1996	128	\N	7957
1997	128	\N	7958
1998	128	\N	7959
1999	128	\N	7960
2000	128	\N	7961
2001	128	\N	7962
2002	128	\N	7963
2003	128	\N	7964
2004	128	\N	7965
2005	128	\N	7966
2006	128	\N	7967
2007	128	\N	7968
2008	128	\N	7969
2009	128	\N	7970
2010	128	\N	7971
2011	128	\N	7972
2012	128	\N	7973
2013	128	\N	7974
2014	128	\N	7975
2015	128	\N	7976
2016	128	\N	7977
2017	128	\N	7978
2018	128	\N	7979
2019	128	\N	7980
2020	128	\N	7981
2021	128	\N	7982
2022	128	\N	7983
2023	128	\N	7984
2024	128	\N	7985
2025	128	\N	7986
2026	128	\N	7987
2027	128	\N	7988
2029	128	\N	7989
2030	128	\N	7990
2028	128	\N	7991
2031	128	\N	7992
2032	128	\N	7993
2033	128	\N	7994
2034	128	\N	7995
2035	128	\N	7996
2036	128	\N	7997
2037	128	\N	7998
2038	128	\N	7999
2053	128	\N	8005
2054	128	\N	8006
2055	128	\N	8007
2056	128	\N	8008
2057	128	\N	8009
2058	128	\N	8010
2047	129	\N	8011
2048	129	\N	8012
2044	129	\N	8013
2049	129	\N	8016
2050	129	\N	8017
2051	129	\N	8018
2052	129	\N	8019
2045	129	Si	8014
2046	129	Si	8015
2047	130	\N	8020
2044	130	\N	8022
2045	130	\N	8023
2046	130	\N	8024
2049	130	\N	8025
2050	130	\N	8026
2051	130	\N	8027
2052	130	\N	8028
2048	130	Si	8021
2047	131	\N	8029
2048	131	\N	8030
2044	131	\N	8031
2045	131	\N	8032
2046	131	\N	8033
2051	131	\N	8036
2052	131	\N	8037
2049	131	Si	8034
2050	131	Si	8035
2047	132	\N	8038
2048	132	\N	8039
2044	132	\N	8040
2045	132	\N	8041
2046	132	\N	8042
2049	132	\N	8043
2050	132	\N	8044
2051	132	\N	8045
2052	132	\N	8046
2047	133	\N	8047
2048	133	\N	8048
2044	133	\N	8049
2045	133	\N	8050
2046	133	\N	8051
2049	133	\N	8052
2050	133	\N	8053
2051	133	\N	8054
2047	134	\N	8056
2048	134	\N	8057
2044	134	\N	8058
2045	134	\N	8059
2046	134	\N	8060
2049	134	\N	8061
2050	134	\N	8062
2051	134	\N	8063
2052	134	\N	8064
2052	133	Si	8055
2047	135	\N	8065
2048	135	\N	8066
2044	135	\N	8067
2045	135	\N	8068
2046	135	\N	8069
2049	135	\N	8070
2050	135	\N	8071
2051	135	\N	8072
2052	135	\N	8073
2047	136	\N	8074
2048	136	\N	8075
2050	136	\N	8080
2052	136	\N	8082
2051	136	Si	8081
2044	136	Si	8076
2045	136	Si	8077
2046	136	Si	8078
2049	136	Si	8079
\.


--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_capacitacion_par_cap_id_seq', 8082, true);


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
3	10	\N
4	10	\N
5	10	\N
6	10	\N
7	10	\N
8	10	\N
9	10	\N
10	10	\N
11	10	\N
12	10	\N
13	10	\N
14	10	\N
15	10	\N
17	10	\N
16	10	\N
18	10	\N
19	10	\N
20	10	\N
21	10	\N
22	10	\N
23	10	\N
24	10	\N
25	10	\N
27	10	\N
28	10	\N
29	10	\N
30	10	\N
31	10	\N
32	10	\N
33	10	\N
34	10	\N
35	10	\N
36	10	\N
37	10	\N
38	10	\N
39	10	\N
40	10	\N
41	10	\N
42	10	\N
43	10	\N
44	10	\N
45	10	\N
46	10	\N
47	10	\N
48	10	\N
49	10	\N
50	10	\N
51	10	\N
52	10	\N
53	10	\N
54	10	\N
55	10	\N
56	10	\N
57	10	\N
58	10	\N
59	10	\N
60	10	\N
61	10	\N
62	10	\N
63	10	\N
64	10	\N
65	10	\N
66	10	\N
67	10	\N
68	10	\N
69	10	\N
70	10	\N
71	10	\N
72	10	\N
73	10	\N
74	10	\N
75	10	\N
76	10	\N
77	10	\N
78	10	\N
79	10	\N
80	10	\N
81	10	\N
82	10	\N
83	10	\N
84	10	\N
85	10	\N
86	10	\N
87	10	\N
88	10	\N
89	10	\N
90	10	\N
91	10	\N
92	10	\N
93	10	\N
94	10	\N
95	10	\N
96	10	\N
97	10	\N
98	10	\N
99	10	\N
100	10	\N
101	10	\N
102	10	\N
103	10	\N
104	10	\N
105	10	\N
106	10	\N
107	10	\N
108	10	\N
109	10	\N
110	10	\N
111	10	\N
112	10	\N
113	10	\N
114	10	\N
115	10	\N
116	10	\N
117	10	\N
118	10	\N
119	10	\N
120	10	\N
121	10	\N
122	10	\N
123	10	\N
124	10	\N
125	10	\N
126	10	\N
127	10	\N
128	10	\N
129	10	\N
130	10	\N
131	10	\N
132	10	\N
133	10	\N
134	10	\N
135	10	\N
136	10	\N
137	10	\N
138	10	\N
139	10	\N
140	10	\N
141	10	\N
142	10	\N
143	10	\N
144	10	\N
145	10	\N
146	10	\N
147	10	\N
148	10	\N
149	10	\N
150	10	\N
151	10	\N
153	10	\N
152	10	\N
154	10	\N
155	10	\N
156	10	\N
157	10	\N
158	10	\N
159	10	\N
160	10	\N
161	10	\N
162	10	\N
163	10	\N
164	10	\N
165	10	\N
166	10	\N
167	10	\N
168	10	\N
169	10	\N
170	10	\N
171	10	\N
172	10	\N
173	10	\N
174	10	\N
175	10	\N
176	10	\N
177	10	\N
178	10	\N
179	10	\N
180	10	\N
181	10	\N
182	10	\N
183	10	\N
184	10	\N
185	10	\N
186	10	\N
187	10	\N
188	10	\N
189	10	\N
190	10	\N
191	10	\N
236	10	\N
237	10	\N
247	10	\N
192	10	\N
205	10	\N
214	10	\N
220	10	\N
229	10	\N
240	10	\N
193	10	\N
206	10	\N
221	10	\N
230	10	\N
241	10	\N
194	10	\N
198	10	\N
207	10	\N
222	10	\N
231	10	\N
242	10	\N
195	10	\N
199	10	\N
208	10	\N
223	10	\N
232	10	\N
243	10	\N
196	10	\N
200	10	\N
209	10	\N
224	10	\N
233	10	\N
234	10	\N
244	10	\N
197	10	\N
202	10	\N
211	10	\N
215	10	\N
217	10	\N
226	10	\N
246	10	\N
201	10	\N
210	10	\N
216	10	\N
225	10	\N
235	10	\N
245	10	\N
203	10	\N
212	10	\N
218	10	\N
227	10	\N
238	10	\N
204	10	\N
213	10	\N
219	10	\N
228	10	\N
239	10	\N
248	10	\N
249	10	\N
250	10	\N
251	10	\N
252	10	\N
253	10	\N
254	10	\N
255	10	\N
256	10	\N
257	10	\N
258	10	\N
259	10	\N
260	10	\N
261	10	\N
262	10	\N
263	10	\N
264	10	\N
265	10	\N
266	10	\N
267	10	\N
268	10	\N
269	10	\N
270	10	\N
271	10	\N
272	10	\N
273	10	\N
274	10	\N
275	10	\N
276	10	\N
277	10	\N
278	10	\N
279	10	\N
280	10	\N
281	10	\N
282	10	\N
283	10	\N
284	10	\N
285	10	\N
1943	10	\N
286	10	\N
287	10	\N
288	10	\N
289	10	\N
290	10	\N
291	10	\N
292	10	\N
293	10	\N
294	10	\N
295	10	\N
296	10	\N
297	10	\N
298	10	\N
299	10	\N
300	10	\N
301	10	\N
302	10	\N
303	10	\N
304	10	\N
305	10	\N
306	10	\N
307	10	\N
308	10	\N
309	10	\N
310	10	\N
311	10	\N
312	10	\N
313	10	\N
314	10	\N
315	10	\N
316	10	\N
317	10	\N
318	10	\N
319	10	\N
320	10	\N
321	10	\N
322	10	\N
323	10	\N
324	10	\N
325	10	\N
326	10	\N
327	10	\N
328	10	\N
329	10	\N
330	10	\N
331	10	\N
332	10	\N
333	10	\N
334	10	\N
335	10	\N
336	10	\N
337	10	\N
338	10	\N
339	10	\N
340	10	\N
347	10	\N
356	10	\N
364	10	\N
371	10	\N
373	10	\N
374	10	\N
392	10	\N
403	10	\N
341	10	\N
358	10	\N
359	10	\N
367	10	\N
390	10	\N
400	10	\N
401	10	\N
342	10	\N
343	10	\N
350	10	\N
368	10	\N
377	10	\N
386	10	\N
395	10	\N
396	10	\N
406	10	\N
344	10	\N
353	10	\N
360	10	\N
361	10	\N
378	10	\N
397	10	\N
345	10	\N
354	10	\N
362	10	\N
370	10	\N
346	10	\N
355	10	\N
363	10	\N
381	10	\N
389	10	\N
399	10	\N
408	10	\N
348	10	\N
349	10	\N
351	10	\N
352	10	\N
357	10	\N
369	10	\N
379	10	\N
380	10	\N
387	10	\N
388	10	\N
398	10	\N
407	10	\N
365	10	\N
366	10	\N
372	10	\N
375	10	\N
376	10	\N
382	10	\N
383	10	\N
384	10	\N
385	10	\N
391	10	\N
393	10	\N
394	10	\N
402	10	\N
404	10	\N
405	10	\N
409	10	\N
410	10	\N
411	10	\N
412	10	\N
413	10	\N
414	10	\N
415	10	\N
416	10	\N
417	10	\N
418	10	\N
419	10	\N
420	10	\N
421	10	\N
422	10	\N
423	10	\N
424	10	\N
425	10	\N
426	10	\N
427	10	\N
428	10	\N
429	10	\N
430	10	\N
431	10	\N
432	10	\N
433	10	\N
434	10	\N
435	10	\N
436	10	\N
437	10	\N
438	10	\N
439	10	\N
440	10	\N
441	10	\N
442	10	\N
443	10	\N
444	10	\N
445	10	\N
446	10	\N
447	10	\N
448	10	\N
449	10	\N
450	10	\N
451	10	\N
452	10	\N
453	10	\N
454	10	\N
455	10	\N
456	10	\N
457	10	\N
458	10	\N
459	10	\N
460	10	\N
461	10	\N
462	10	\N
463	10	\N
464	10	\N
465	10	\N
466	10	\N
467	10	\N
468	10	\N
469	10	\N
470	10	\N
471	10	\N
472	10	\N
473	10	\N
474	10	\N
1945	10	\N
475	10	\N
476	10	\N
477	10	\N
478	10	\N
479	10	\N
480	10	\N
481	10	\N
482	10	\N
483	10	\N
484	10	\N
487	10	\N
485	10	\N
486	10	\N
493	10	\N
488	10	\N
489	10	\N
490	10	\N
491	10	\N
492	10	\N
494	10	\N
495	10	\N
496	10	\N
497	10	\N
498	10	\N
499	10	\N
500	10	\N
501	10	\N
502	10	\N
503	10	\N
504	10	\N
505	10	\N
506	10	\N
507	10	\N
508	10	\N
509	10	\N
510	10	\N
511	10	\N
512	10	\N
513	10	\N
514	10	\N
515	10	\N
516	10	\N
517	10	\N
518	10	\N
519	10	\N
520	10	\N
521	10	\N
522	10	\N
524	10	\N
525	10	\N
526	10	\N
527	10	\N
528	10	\N
529	10	\N
530	10	\N
531	10	\N
532	10	\N
533	10	\N
534	10	\N
535	10	\N
536	10	\N
537	10	\N
538	10	\N
539	10	\N
540	10	\N
541	10	\N
542	10	\N
543	10	\N
544	10	\N
545	10	\N
546	10	\N
547	10	\N
548	10	\N
549	10	\N
550	10	\N
551	10	\N
552	10	\N
553	10	\N
554	10	\N
555	10	\N
556	10	\N
557	10	\N
558	10	\N
559	10	\N
560	10	\N
561	10	\N
563	10	\N
564	10	\N
562	10	\N
565	10	\N
566	10	\N
567	10	\N
568	10	\N
569	10	\N
570	10	\N
571	10	\N
572	10	\N
573	10	\N
574	10	\N
575	10	\N
576	10	\N
577	10	\N
578	10	\N
579	10	\N
589	10	\N
580	10	\N
590	10	\N
581	10	\N
591	10	\N
582	10	\N
592	10	\N
583	10	\N
585	10	\N
584	10	\N
586	10	\N
587	10	\N
588	10	\N
593	10	\N
594	10	\N
595	10	\N
596	10	\N
597	10	\N
598	10	\N
599	10	\N
600	10	\N
601	10	\N
602	10	\N
603	10	\N
604	10	\N
605	10	\N
606	10	\N
607	10	\N
608	10	\N
609	10	\N
610	10	\N
611	10	\N
612	10	\N
613	10	\N
614	10	\N
615	10	\N
616	10	\N
617	10	\N
618	10	\N
619	10	\N
620	10	\N
621	10	\N
624	10	\N
626	10	\N
625	10	\N
628	10	\N
622	10	\N
623	10	\N
627	10	\N
629	10	\N
630	10	\N
631	10	\N
632	10	\N
633	10	\N
634	10	\N
635	10	\N
636	10	\N
637	10	\N
638	10	\N
639	10	\N
640	10	\N
641	10	\N
642	10	\N
643	10	\N
644	10	\N
645	10	\N
646	10	\N
647	10	\N
648	10	\N
649	10	\N
650	10	\N
1954	10	\N
652	10	\N
653	10	\N
654	10	\N
655	10	\N
656	10	\N
657	10	\N
658	10	\N
659	10	\N
660	10	\N
661	10	\N
662	10	\N
663	10	\N
664	10	\N
651	10	\N
665	10	\N
666	10	\N
667	10	\N
668	10	\N
669	10	\N
670	10	\N
671	10	\N
672	10	\N
673	10	\N
674	10	\N
675	10	\N
676	10	\N
677	10	\N
678	10	\N
679	10	\N
680	10	\N
681	10	\N
682	10	\N
683	10	\N
684	10	\N
699	10	\N
685	10	\N
694	10	\N
686	10	\N
690	10	\N
695	10	\N
687	10	\N
688	10	\N
689	10	\N
691	10	\N
693	10	\N
696	10	\N
698	10	\N
692	10	\N
697	10	\N
700	10	\N
701	10	\N
702	10	\N
703	10	\N
704	10	\N
705	10	\N
706	10	\N
707	10	\N
708	10	\N
709	10	\N
710	10	\N
711	10	\N
712	10	\N
713	10	\N
714	10	\N
715	10	\N
716	10	\N
717	10	\N
718	10	\N
719	10	\N
720	10	\N
721	10	\N
722	10	\N
723	10	\N
725	10	\N
724	10	\N
726	10	\N
727	10	\N
728	10	\N
729	10	\N
730	10	\N
731	10	\N
732	10	\N
733	10	\N
734	10	\N
735	10	\N
736	10	\N
737	10	\N
738	10	\N
739	10	\N
740	10	\N
741	10	\N
742	10	\N
743	10	\N
744	10	\N
745	10	\N
746	10	\N
747	10	\N
748	10	\N
749	10	\N
750	10	\N
751	10	\N
752	10	\N
753	10	\N
754	10	\N
755	10	\N
756	10	\N
757	10	\N
758	10	\N
759	10	\N
760	10	\N
761	10	\N
762	10	\N
763	10	\N
764	10	\N
765	10	\N
766	10	\N
767	10	\N
768	10	\N
769	10	\N
770	10	\N
771	10	\N
772	10	\N
773	10	\N
774	10	\N
775	10	\N
776	10	\N
777	10	\N
778	10	\N
779	10	\N
780	10	\N
781	10	\N
782	10	\N
783	10	\N
784	10	\N
785	10	\N
786	10	\N
787	10	\N
788	10	\N
789	10	\N
790	10	\N
791	10	\N
792	10	\N
804	10	\N
805	10	\N
813	10	\N
793	10	\N
794	10	\N
795	10	\N
796	10	\N
797	10	\N
798	10	\N
799	10	\N
800	10	\N
801	10	\N
802	10	\N
803	10	\N
806	10	\N
807	10	\N
808	10	\N
809	10	\N
810	10	\N
811	10	\N
812	10	\N
814	10	\N
816	10	\N
817	10	\N
815	10	\N
818	10	\N
819	10	\N
820	10	\N
821	10	\N
822	10	\N
823	10	\N
826	10	\N
827	10	\N
828	10	\N
829	10	\N
830	10	\N
831	10	\N
832	10	\N
833	10	\N
834	10	\N
836	10	\N
837	10	\N
824	10	\N
839	10	\N
842	10	\N
843	10	\N
844	10	\N
852	10	\N
857	10	\N
860	10	\N
864	10	\N
865	10	\N
866	10	\N
870	10	\N
871	10	\N
872	10	\N
873	10	\N
874	10	\N
875	10	\N
876	10	\N
877	10	\N
878	10	\N
879	10	\N
880	10	\N
881	10	\N
882	10	\N
883	10	\N
886	10	\N
825	10	\N
840	10	\N
845	10	\N
846	10	\N
850	10	\N
851	10	\N
853	10	\N
854	10	\N
855	10	\N
856	10	\N
858	10	\N
849	10	\N
859	10	\N
861	10	\N
862	10	\N
863	10	\N
867	10	\N
868	10	\N
869	10	\N
887	10	\N
838	10	\N
841	10	\N
888	10	\N
889	10	\N
890	10	\N
891	10	\N
892	10	\N
893	10	\N
894	10	\N
895	10	\N
896	10	\N
897	10	\N
898	10	\N
899	10	\N
900	10	\N
901	10	\N
902	10	\N
903	10	\N
905	10	\N
906	10	\N
907	10	\N
908	10	\N
909	10	\N
910	10	\N
911	10	\N
912	10	\N
904	10	\N
913	10	\N
914	10	\N
915	10	\N
916	10	\N
917	10	\N
885	10	\N
918	10	\N
919	10	\N
920	10	\N
921	10	\N
930	10	\N
931	10	\N
932	10	\N
933	10	\N
934	10	\N
935	10	\N
936	10	\N
937	10	\N
938	10	\N
939	10	\N
940	10	\N
941	10	\N
942	10	\N
943	10	\N
944	10	\N
945	10	\N
946	10	\N
947	10	\N
948	10	\N
949	10	\N
989	10	\N
990	10	\N
991	10	\N
997	10	\N
998	10	\N
1000	10	\N
996	10	\N
999	10	\N
1001	10	\N
1002	10	\N
1003	10	\N
923	10	\N
1016	10	\N
1018	10	\N
1080	10	\N
1081	10	\N
1082	10	\N
924	10	\N
1017	10	\N
1019	10	\N
1020	10	\N
1021	10	\N
1022	10	\N
1023	10	\N
1024	10	\N
1025	10	\N
1029	10	\N
1030	10	\N
1031	10	\N
1032	10	\N
1033	10	\N
1034	10	\N
1035	10	\N
1036	10	\N
1037	10	\N
1038	10	\N
922	10	\N
1048	10	\N
1049	10	\N
1050	10	\N
1051	10	\N
1052	10	\N
1053	10	\N
1054	10	\N
1055	10	\N
1056	10	\N
1057	10	\N
1058	10	\N
1059	10	\N
1060	10	\N
1061	10	\N
1062	10	\N
1063	10	\N
1064	10	\N
1065	10	\N
1066	10	\N
1068	10	\N
1069	10	\N
1070	10	\N
1071	10	\N
1072	10	\N
1073	10	\N
1074	10	\N
1075	10	\N
1077	10	\N
1078	10	\N
1076	10	\N
1079	10	\N
1083	10	\N
1084	10	\N
1085	10	\N
1086	10	\N
1087	10	\N
1088	10	\N
1089	10	\N
1090	10	\N
1091	10	\N
1092	10	\N
1093	10	\N
1094	10	\N
1095	10	\N
1096	10	\N
1097	10	\N
1098	10	\N
1099	10	\N
1100	10	\N
1101	10	\N
1102	10	\N
1103	10	\N
1104	10	\N
1105	10	\N
1107	10	\N
1115	10	\N
1121	10	\N
1127	10	\N
1135	10	\N
1106	10	\N
1111	10	\N
1108	10	\N
1112	10	\N
1120	10	\N
1145	10	\N
1150	10	\N
1159	10	\N
1168	10	\N
1184	10	\N
1192	10	\N
1109	10	\N
1124	10	\N
1134	10	\N
1138	10	\N
1143	10	\N
1157	10	\N
1166	10	\N
1176	10	\N
1182	10	\N
1190	10	\N
1199	10	\N
1110	10	\N
1113	10	\N
1116	10	\N
1125	10	\N
1130	10	\N
1146	10	\N
1151	10	\N
1160	10	\N
1169	10	\N
1186	10	\N
1194	10	\N
1114	10	\N
1117	10	\N
1126	10	\N
1131	10	\N
1132	10	\N
1137	10	\N
1139	10	\N
1142	10	\N
1144	10	\N
1155	10	\N
1156	10	\N
1164	10	\N
1165	10	\N
1174	10	\N
1175	10	\N
1180	10	\N
1181	10	\N
1188	10	\N
1189	10	\N
1198	10	\N
1118	10	\N
1119	10	\N
1122	10	\N
1123	10	\N
1128	10	\N
1129	10	\N
1133	10	\N
1136	10	\N
1140	10	\N
1141	10	\N
1147	10	\N
1148	10	\N
1149	10	\N
1152	10	\N
1153	10	\N
1154	10	\N
1158	10	\N
1161	10	\N
1162	10	\N
1163	10	\N
1167	10	\N
1170	10	\N
1171	10	\N
1172	10	\N
1173	10	\N
1177	10	\N
1178	10	\N
1179	10	\N
1235	10	\N
1183	10	\N
1236	10	\N
1185	10	\N
1237	10	\N
1187	10	\N
1191	10	\N
1193	10	\N
1195	10	\N
1197	10	\N
1196	10	\N
1200	10	\N
1201	10	\N
1202	10	\N
1203	10	\N
1204	10	\N
1205	10	\N
1206	10	\N
1207	10	\N
1208	10	\N
1209	10	\N
1210	10	\N
1211	10	\N
1212	10	\N
1213	10	\N
1214	10	\N
1215	10	\N
1216	10	\N
1217	10	\N
1218	10	\N
1219	10	\N
1220	10	\N
1221	10	\N
1222	10	\N
1224	10	\N
1225	10	\N
1226	10	\N
1227	10	\N
1228	10	\N
1229	10	\N
1230	10	\N
1231	10	\N
1232	10	\N
1233	10	\N
1223	10	\N
1234	10	\N
1238	10	\N
1239	10	\N
1240	10	\N
1241	10	\N
1242	10	\N
1243	10	\N
1244	10	\N
1245	10	\N
1246	10	\N
1247	10	\N
1248	10	\N
1249	10	\N
1250	10	\N
1251	10	\N
1252	10	\N
1253	10	\N
1254	10	\N
1266	10	\N
1278	10	\N
1288	10	\N
1297	10	\N
1306	10	\N
1315	10	\N
1325	10	\N
1334	10	\N
1255	10	\N
1261	10	\N
1270	10	\N
1282	10	\N
1291	10	\N
1301	10	\N
1309	10	\N
1319	10	\N
1329	10	\N
1338	10	\N
1340	10	\N
1350	10	\N
1357	10	\N
1256	10	\N
1262	10	\N
1271	10	\N
1274	10	\N
1284	10	\N
1293	10	\N
1303	10	\N
1311	10	\N
1321	10	\N
1331	10	\N
1345	10	\N
1349	10	\N
1356	10	\N
1257	10	\N
1267	10	\N
1279	10	\N
1298	10	\N
1307	10	\N
1316	10	\N
1326	10	\N
1335	10	\N
1339	10	\N
1344	10	\N
1353	10	\N
1363	10	\N
1258	10	\N
1268	10	\N
1281	10	\N
1290	10	\N
1300	10	\N
1308	10	\N
1318	10	\N
1328	10	\N
1337	10	\N
1259	10	\N
1269	10	\N
1273	10	\N
1283	10	\N
1292	10	\N
1302	10	\N
1310	10	\N
1320	10	\N
1330	10	\N
1260	10	\N
1280	10	\N
1289	10	\N
1299	10	\N
1317	10	\N
1327	10	\N
1336	10	\N
1346	10	\N
1263	10	\N
1272	10	\N
1275	10	\N
1285	10	\N
1294	10	\N
1304	10	\N
1312	10	\N
1322	10	\N
1332	10	\N
1341	10	\N
1264	10	\N
1276	10	\N
1286	10	\N
1295	10	\N
1305	10	\N
1313	10	\N
1323	10	\N
1343	10	\N
1265	10	\N
1277	10	\N
1287	10	\N
1296	10	\N
1314	10	\N
1324	10	\N
1333	10	\N
1342	10	\N
1347	10	\N
1348	10	\N
1351	10	\N
1415	10	\N
1352	10	\N
1354	10	\N
1355	10	\N
1358	10	\N
1359	10	\N
1360	10	\N
1361	10	\N
1362	10	\N
1364	10	\N
1365	10	\N
1367	10	\N
1369	10	\N
1370	10	\N
1416	10	\N
1366	10	\N
1368	10	\N
1371	10	\N
1372	10	\N
1373	10	\N
1374	10	\N
1375	10	\N
1376	10	\N
1377	10	\N
1378	10	\N
1379	10	\N
1382	10	\N
1383	10	\N
1384	10	\N
1385	10	\N
1386	10	\N
1387	10	\N
1388	10	\N
1389	10	\N
1390	10	\N
1391	10	\N
1392	10	\N
1393	10	\N
1394	10	\N
1395	10	\N
1396	10	\N
1397	10	\N
1398	10	\N
1400	10	\N
1399	10	\N
1401	10	\N
1402	10	\N
1403	10	\N
1404	10	\N
1405	10	\N
1406	10	\N
1407	10	\N
1408	10	\N
1409	10	\N
1410	10	\N
1411	10	\N
1412	10	\N
1413	10	\N
1414	10	\N
1417	10	\N
1418	10	\N
1419	10	\N
1420	10	\N
1421	10	\N
1422	10	\N
1423	10	\N
1424	10	\N
1425	10	\N
1426	10	\N
1428	10	\N
1427	10	\N
1429	10	\N
1430	10	\N
1431	10	\N
1432	10	\N
1433	10	\N
1438	10	\N
1448	10	\N
1458	10	\N
1468	10	\N
1478	10	\N
1434	10	\N
1439	10	\N
1449	10	\N
1459	10	\N
1469	10	\N
1479	10	\N
1489	10	\N
1503	10	\N
1513	10	\N
1522	10	\N
1530	10	\N
1540	10	\N
1542	10	\N
1552	10	\N
1435	10	\N
1445	10	\N
1455	10	\N
1465	10	\N
1475	10	\N
1436	10	\N
1446	10	\N
1456	10	\N
1466	10	\N
1476	10	\N
1437	10	\N
1447	10	\N
1457	10	\N
1467	10	\N
1477	10	\N
1486	10	\N
1493	10	\N
1498	10	\N
1516	10	\N
1525	10	\N
1532	10	\N
1543	10	\N
1553	10	\N
1440	10	\N
1450	10	\N
1460	10	\N
1470	10	\N
1480	10	\N
1441	10	\N
1451	10	\N
1461	10	\N
1471	10	\N
1481	10	\N
1442	10	\N
1452	10	\N
1462	10	\N
1472	10	\N
1443	10	\N
1453	10	\N
1463	10	\N
1473	10	\N
1482	10	\N
1444	10	\N
1454	10	\N
1464	10	\N
1474	10	\N
1483	10	\N
1484	10	\N
1485	10	\N
1487	10	\N
1488	10	\N
1490	10	\N
1491	10	\N
1492	10	\N
1494	10	\N
1495	10	\N
1496	10	\N
1497	10	\N
1499	10	\N
1500	10	\N
1501	10	\N
1502	10	\N
1504	10	\N
1505	10	\N
1506	10	\N
1507	10	\N
1508	10	\N
1509	10	\N
1510	10	\N
1511	10	\N
1512	10	\N
1514	10	\N
1515	10	\N
1517	10	\N
1518	10	\N
1519	10	\N
1520	10	\N
1521	10	\N
1523	10	\N
1524	10	\N
1526	10	\N
1527	10	\N
1528	10	\N
1529	10	\N
1531	10	\N
1533	10	\N
1534	10	\N
1535	10	\N
1536	10	\N
1537	10	\N
1538	10	\N
1539	10	\N
1541	10	\N
1544	10	\N
1545	10	\N
1546	10	\N
1547	10	\N
1548	10	\N
1549	10	\N
1550	10	\N
1551	10	\N
1554	10	\N
1555	10	\N
1556	10	\N
1557	10	\N
1558	10	\N
1559	10	\N
1560	10	\N
1561	10	\N
1562	10	\N
1563	10	\N
1564	10	\N
1565	10	\N
1566	10	\N
1567	10	\N
1568	10	\N
1569	10	\N
1570	10	\N
1571	10	\N
1572	10	\N
1573	10	\N
1575	10	\N
1576	10	\N
1577	10	\N
1578	10	\N
1579	10	\N
1580	10	\N
1581	10	\N
1582	10	\N
1583	10	\N
1584	10	\N
1590	10	\N
1599	10	\N
1604	10	\N
1609	10	\N
1615	10	\N
1629	10	\N
1641	10	\N
1651	10	\N
1664	10	\N
1670	10	\N
1677	10	\N
1685	10	\N
1692	10	\N
1709	10	\N
1718	10	\N
1722	10	\N
1734	10	\N
1743	10	\N
1750	10	\N
1585	10	\N
1594	10	\N
1606	10	\N
1616	10	\N
1635	10	\N
1645	10	\N
1655	10	\N
1661	10	\N
1667	10	\N
1674	10	\N
1682	10	\N
1690	10	\N
1574	10	\N
1704	10	\N
1586	10	\N
1607	10	\N
1611	10	\N
1620	10	\N
1637	10	\N
1647	10	\N
1657	10	\N
1662	10	\N
1676	10	\N
1683	10	\N
1699	10	\N
1706	10	\N
1710	10	\N
1715	10	\N
1719	10	\N
1587	10	\N
1595	10	\N
1602	10	\N
1619	10	\N
1626	10	\N
1638	10	\N
1648	10	\N
1688	10	\N
1717	10	\N
1588	10	\N
1596	10	\N
1608	10	\N
1613	10	\N
1623	10	\N
1631	10	\N
1640	10	\N
1650	10	\N
1658	10	\N
1665	10	\N
1671	10	\N
1678	10	\N
1686	10	\N
1693	10	\N
1698	10	\N
1705	10	\N
1714	10	\N
1728	10	\N
1748	10	\N
1758	10	\N
1589	10	\N
1597	10	\N
1603	10	\N
1621	10	\N
1627	10	\N
1639	10	\N
1649	10	\N
1666	10	\N
1672	10	\N
1679	10	\N
1687	10	\N
1694	10	\N
1702	10	\N
1708	10	\N
1713	10	\N
1591	10	\N
1600	10	\N
1614	10	\N
1624	10	\N
1633	10	\N
1643	10	\N
1653	10	\N
1659	10	\N
1673	10	\N
1680	10	\N
1707	10	\N
1720	10	\N
1723	10	\N
1732	10	\N
1737	10	\N
1739	10	\N
1745	10	\N
1754	10	\N
1592	10	\N
1605	10	\N
1617	10	\N
1625	10	\N
1630	10	\N
1636	10	\N
1646	10	\N
1656	10	\N
1660	10	\N
1668	10	\N
1675	10	\N
1695	10	\N
1700	10	\N
1711	10	\N
1593	10	\N
1601	10	\N
1610	10	\N
1618	10	\N
1634	10	\N
1644	10	\N
1654	10	\N
1598	10	\N
1612	10	\N
1622	10	\N
1628	10	\N
1632	10	\N
1642	10	\N
1652	10	\N
1663	10	\N
1669	10	\N
1681	10	\N
1684	10	\N
1689	10	\N
1691	10	\N
1696	10	\N
1697	10	\N
1701	10	\N
1703	10	\N
1712	10	\N
1716	10	\N
1721	10	\N
1724	10	\N
1725	10	\N
1726	10	\N
1727	10	\N
1729	10	\N
1730	10	\N
1731	10	\N
1733	10	\N
1735	10	\N
1736	10	\N
1738	10	\N
1740	10	\N
1741	10	\N
1742	10	\N
1744	10	\N
1746	10	\N
1747	10	\N
1749	10	\N
1751	10	\N
1752	10	\N
1753	10	\N
1755	10	\N
1756	10	\N
1757	10	\N
1759	10	\N
1760	10	\N
1761	10	\N
1762	10	\N
1763	10	\N
1764	10	\N
1765	10	\N
1766	10	\N
1767	10	\N
1768	10	\N
1769	10	\N
1770	10	\N
1771	10	\N
1772	10	\N
1773	10	\N
1774	10	\N
1775	10	\N
1776	10	\N
1777	10	\N
1778	10	\N
1779	10	\N
1780	10	\N
1781	10	\N
1782	10	\N
1783	10	\N
1784	10	\N
1785	10	\N
1786	10	\N
1787	10	\N
1788	10	\N
884	10	\N
1789	10	\N
1792	10	\N
1793	10	\N
1794	10	\N
1795	10	\N
1791	10	\N
1790	10	\N
1798	10	\N
1799	10	\N
1800	10	\N
1801	10	\N
1802	10	\N
1803	10	\N
1804	10	\N
1805	10	\N
1806	10	\N
1807	10	\N
1818	10	\N
1827	10	\N
1835	10	\N
1808	10	\N
1819	10	\N
1828	10	\N
1830	10	\N
1809	10	\N
1821	10	\N
1810	10	\N
1820	10	\N
1829	10	\N
1811	10	\N
1822	10	\N
1846	10	\N
1859	10	\N
1872	10	\N
1881	10	\N
1885	10	\N
1893	10	\N
1901	10	\N
1905	10	\N
1912	10	\N
1812	10	\N
1815	10	\N
1823	10	\N
1813	10	\N
1814	10	\N
1824	10	\N
1842	10	\N
1864	10	\N
1870	10	\N
1879	10	\N
1892	10	\N
1816	10	\N
1825	10	\N
1817	10	\N
1826	10	\N
1831	10	\N
1832	10	\N
1833	10	\N
1834	10	\N
1836	10	\N
1837	10	\N
1838	10	\N
1839	10	\N
1840	10	\N
1843	10	\N
1844	10	\N
1845	10	\N
1841	10	\N
1847	10	\N
1848	10	\N
1849	10	\N
1851	10	\N
1852	10	\N
1853	10	\N
1854	10	\N
1855	10	\N
1856	10	\N
1857	10	\N
1858	10	\N
1860	10	\N
1861	10	\N
1862	10	\N
1863	10	\N
1865	10	\N
1866	10	\N
1867	10	\N
1868	10	\N
1869	10	\N
1871	10	\N
1873	10	\N
1874	10	\N
1875	10	\N
1877	10	\N
1876	10	\N
1878	10	\N
1880	10	\N
1882	10	\N
1883	10	\N
1884	10	\N
1886	10	\N
1887	10	\N
1888	10	\N
1889	10	\N
1890	10	\N
1891	10	\N
1894	10	\N
1895	10	\N
1896	10	\N
1897	10	\N
1898	10	\N
1899	10	\N
1900	10	\N
1902	10	\N
1903	10	\N
1904	10	\N
1906	10	\N
1907	10	\N
1908	10	\N
1909	10	\N
1910	10	\N
1911	10	\N
1913	10	\N
1914	10	\N
1915	10	\N
1916	10	\N
1918	10	\N
1919	10	\N
1917	10	\N
1920	10	\N
1921	10	\N
1922	10	\N
1923	10	\N
1924	10	\N
1925	10	\N
1926	10	\N
1927	10	\N
1928	10	\N
1929	10	\N
1930	10	\N
1931	10	\N
1932	10	\N
1933	10	\N
1934	10	\N
1935	10	\N
1936	10	\N
1937	10	\N
1938	10	\N
1948	10	\N
1958	10	\N
1967	10	\N
1971	10	\N
1939	10	\N
1940	10	\N
1944	10	\N
1963	10	\N
1941	10	\N
1942	10	\N
1952	10	\N
1960	10	\N
1974	10	\N
1946	10	\N
1947	10	\N
1955	10	\N
1956	10	\N
1964	10	\N
1950	10	\N
1949	10	\N
1957	10	\N
1965	10	\N
1966	10	\N
1970	10	\N
1951	10	\N
1961	10	\N
1969	10	\N
1973	10	\N
1953	10	\N
1959	10	\N
1968	10	\N
1972	10	\N
1962	10	\N
1975	10	\N
1977	10	\N
1976	10	\N
1978	10	\N
1979	10	\N
1980	10	\N
1982	10	\N
1981	10	\N
1983	10	\N
\.


--
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_par_id_seq', 2183, true);


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
1004	92	\N
1005	92	\N
1006	92	\N
1007	92	\N
1009	92	\N
1010	92	\N
1011	92	\N
1012	92	\N
1013	92	\N
1014	92	\N
1015	92	\N
926	126	\N
953	126	\N
975	126	Si
952	126	Si
925	126	Si
961	126	Si
964	126	Si
957	126	Si
979	126	Si
955	126	Si
954	126	Si
\.


--
-- Data for Name: perfil_municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY perfil_municipio (mun_id, per_mun_partido, per_mun_territorio, per_mun_tipologia, per_mun_urbana_hombres, per_mun_urbana_mujeres, per_mun_rural_hombres, per_mun_rural_mujeres, per_mun_poblacion, per_mun_observaciones) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	Arena	200	\N	3000	4000	1500	2000	10500	\N
93	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	\N	\N	\N	\N	\N	\N	\N	\N	\N
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
-- Name: perfil_proyecto_per_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('perfil_proyecto_per_pro_id_seq', 3, true);


--
-- Data for Name: personal_enlace; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY personal_enlace (per_enl_id, acu_mun_id, per_enl_nombre, per_enl_apellido, per_enl_sexo, per_enl_cargo) FROM stdin;
\.


--
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('personal_enlace_per_enl_id_seq', 1, false);


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
-- Name: pestania_proceso_pes_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('pestania_proceso_pes_pro_id_seq', 5, true);


--
-- Data for Name: plan_contingencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_contingencia (pla_con_id, pla_con_numero, pla_con_nombre, pla_con_descripcion, pla_con_fdocumento, pla_con_tipo, rev_inf_id) FROM stdin;
1	0	MiPlan	Descripción	2013-03-09	1	4
2	0	Otroformato	Descripción	2013-03-10	2	4
3	0	TuPlan	0	2013-03-09	3	4
\.


--
-- Name: plan_contingencia_pla_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_contingencia_pla_con_id_seq', 3, true);


--
-- Data for Name: plan_inversion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_inversion (pla_inv_id, pla_inv_observacion, pro_pep_id) FROM stdin;
3	\N	28
4	\N	30
5	\N	27
\.


--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_inversion_pla_inv_id_seq', 5, true);


--
-- Data for Name: plan_trabajo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_trabajo (pla_tra_id, pla_tra_forden_inicio, pla_tra_fentrega_plan, pla_tra_frecepcion_obs, pla_tra_fsuperacion_obs, pla_tra_fvisto_bueno, pla_tra_fpresentacion, pla_tra_frecepcion, pla_tra_firmada_mun, pla_tra_firmada_isdem, pla_tra_firmada_uep, mun_id, pla_tra_ruta_archivo, pla_tra_observaciones) FROM stdin;
2	2013-02-01	2013-02-04	2013-02-05	2013-02-06	2013-02-07	2013-02-08	2013-02-11	f	t	f	1	documentos/plan_trabajo/plan_trabajo2.pdf	
3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	23	\N	\N
\.


--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_trabajo_plan_trab_id_seq', 3, true);


--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('poblacion_pro_id_seq', 68, true);


--
-- Data for Name: poblacion_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY poblacion_reunion (pob_id, pob_comunidad, pob_sector, pob_institucion, reu_id) FROM stdin;
29	\N	\N	\N	16
35	\N	\N	\N	69
36	\N	\N	\N	70
39	\N	\N	\N	73
31	f	f	f	64
30	f	f	f	63
34	f	f	f	67
33	f	f	f	66
32	f	f	f	65
43	f	f	f	95
42	f	t	t	94
41	f	f	f	93
38	f	f	f	72
44	f	f	f	96
45	t	f	f	145
52	f	f	f	152
37	f	f	f	71
54	f	f	f	154
53	f	f	f	153
55	f	f	f	155
56	f	f	f	156
57	f	f	f	157
51	f	f	t	151
58	f	t	f	158
59	f	f	t	159
40	f	f	f	75
64	f	f	f	166
60	f	f	f	161
61	t	f	f	163
50	t	f	f	150
49	t	f	f	149
48	t	f	f	148
47	t	f	f	147
62	f	t	f	164
66	\N	\N	\N	168
67	\N	\N	\N	169
63	f	f	f	165
65	f	t	f	167
68	f	t	f	170
\.


--
-- Data for Name: portafolio_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY portafolio_proyecto (por_pro_id, por_pro_area, por_pro_tema, por_pro_nombre, por_pro_descripcion, por_pro_ubicacion, por_pro_costo_estimado, por_pro_fecha_desde, por_pro_fecha_hasta, por_pro_beneficiario_h, por_pro_beneficiario_m, por_pro_observacion, por_pro_ruta_archivo, pro_pep_id, por_pro_anio1, por_pro_anio2, por_pro_anio3, por_pro_anio4, por_pro_anio5) FROM stdin;
2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	19	0.00	0.00	0.00	0.00	0.00
3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	19	0.00	0.00	0.00	0.00	0.00
4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	30	0.00	0.00	0.00	0.00	0.00
5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	27	0.00	0.00	0.00	0.00	0.00
6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	27	0.00	0.00	0.00	0.00	0.00
\.


--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('portafolio_proyecto_por_pro_id_seq', 6, true);


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
-- Name: presentes_participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('presentes_participante_par_id_seq', 1, false);


--
-- Data for Name: presupuesto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY presupuesto (pre_id, com_id, pre_tipo, pre_cantidad) FROM stdin;
\.


--
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('presupuesto_pre_id_seq', 1, false);


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
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('priorizacion_pri_id_seq', 7, true);


--
-- Data for Name: problema_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY problema_identificado (pro_ide_id, pro_ide_tema, pro_ide_problema, pro_ide_prioridad, are_dim_id, reu_id, def_id) FROM stdin;
3	Educación	Falta de oportunidades  de superación y estudio para jóvenes 	4	1	145	\N
4	Recreación, deportes y cultura	Falta de espacios y de recreación para los jóvenes	4	1	145	\N
5	Prestación de servicios municipales	Falta de mantenimiento de estructuras municipales 	3	4	145	\N
6	Seguridad ciudadana	Venta de Alcohol	1	1	145	\N
2	Acceso al empleo	Desempleo en mujeres	2	2	145	\N
7	Seguridad Ciudadana	Consumo de alcohol	1	1	145	\N
8	Seguridad Ciudadana	Delincuencia que afecta a mujeres  y mala influencia a niños	1	1	145	\N
9	Discriminación	Adultos mayores no tienen canasta básica	5	1	145	\N
\.


--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('problema_identificado_pro_ide_id_seq', 36, true);


--
-- Data for Name: proceso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proceso (pro_id, pro_numero, pro_fpublicacion, pro_faclara_dudas, pro_fexpresion_interes, pro_observacion1, pro_pub_ruta_archivo, pro_exp_ruta_archivo, pro_finicio, pro_ffinalizacion, pro_fenvio_informacion, pro_flimite_recepcion, pro_fsolicitud, pro_frecepcion, pro_fcierre_negociacion, pro_ffirma_contrato, mun_id, pro_faperturatecnica, pro_faperturafinanciera, pro_observacion2) FROM stdin;
2	1	2013-03-02	2013-03-03	2013-03-04	0			\N	\N	\N	\N	\N	\N	\N	\N	1	\N	\N	\N
4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	23	\N	\N	\N
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
32	\N	1	23
33	\N	2	23
34	\N	3	23
35	\N	4	23
36	\N	5	23
\.


--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_etapa_pro_eta_id_seq', 36, true);


--
-- Name: proceso_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_pro_id_seq', 4, true);


--
-- Data for Name: proyeccion_ingreso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyeccion_ingreso (pro_ing_id, pro_ing_observacion, pro_pep_id) FROM stdin;
2	\N	27
\.


--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyeccion_ingreso_pro_ing_id_seq', 2, true);


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto (pro_id, mun_id, com_id, pro_codigo, pro_nombre, pro_num_ord_llegada, pro_zona_fisdl, pro_nom_formulador, pro_nom_ref_tec_municipal, pro_email_ref_tec_municipal, pro_tel_ref_tec_municipal, pro_nom_ase_fisdl, pro_email_ase_fisdl, pro_tel_ase_fisdl, pro_fec_ent_gl_fisdl, pro_fec_ent_gop_gpr, pro_rec_gpr, pro_fec_ent_gpr_din, pro_estatus, pro_mon_ejecucion, pro_fec_visita, pro_num_rev, pro_fec_visado, pro_mon_visado, pro_obs_din, pro_tipologia, pro_sal_par_ciudadana, pro_sal_pue_indigenas, pro_sal_rea_involuntario) FROM stdin;
\.


--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"proyecto_Pep_pro_pep_id_seq"', 37, true);


--
-- Data for Name: proyecto_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto_identificado (pro_ide_id, pro_ide_nombre, pro_ide_ubicacion, pro_ide_ff, pro_ide_monto, pro_ide_plazoejec, pro_ide_pbh, pro_ide_pbm, pro_ide_prioridad, pro_ide_estado, pro_ide_ruta_archivo, pri_id) FROM stdin;
\.


--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyecto_identificado_pro_ide_id_seq', 2, true);


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
36	Proyecto PEP	21	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	Caluco	226	\N	\N	3	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
25	Corinto	136	11	\N	\N	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
29	San José la Fuente	129	\N	8	6	31	4	5	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
26	Chinameca	161	\N	6	4	28	5	6	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N	\N	\N
28	El Transito	165	\N	9	7	30	6	8	6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	3	\N
30	Meanguera del Golfo	124	\N	10	8	32	8	9	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	4	\N
27	Uluazapa	178	\N	7	5	29	7	7	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2	5	\N
20	Tepetitán	209	12	12	11	22	9	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	El Rosario	58	\N	5	10	21	10	10	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
37	ahuachapan	1	13	11	9	42	\N	\N	\N	4	f	f	f	2013-05-01	2013-05-08	2013-05-09			\N	\N	\N	\N
\.


--
-- Data for Name: proyectos_cc; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyectos_cc (cc_id, id_proy_cc, monto_proy, com_beneficiadas, pob_beneficiada, tipo_proy, nombre_proy) FROM stdin;
\.


--
-- Name: proyectos_cc_id_proy_cc_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyectos_cc_id_proy_cc_seq', 1, false);


--
-- Data for Name: recibido_municipalidad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY recibido_municipalidad (rec_mun_id, rec_mun_correlativo, rec_mun_frecibido, rec_mun_observacion, ela_pro_id) FROM stdin;
1	1	2013-03-08	Ninguna	5
3	GGG	2013-06-06		5
\.


--
-- Name: recibido_municipalidad_rec_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('recibido_municipalidad_rec_mun_id_seq', 3, true);


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
-- Name: region_reg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('region_reg_id_seq', 1, false);


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
1	86	f
2	86	f
3	86	f
4	86	f
5	86	f
6	86	f
1	87	f
2	87	f
3	87	f
4	87	f
5	87	f
6	87	f
1	88	f
2	88	f
3	88	f
4	88	f
5	88	f
6	88	f
1	92	f
2	92	f
3	92	f
4	92	f
5	92	f
6	92	f
1	89	f
2	89	f
3	89	f
4	89	f
5	89	f
6	89	f
1	125	f
2	125	f
3	125	f
4	125	f
5	125	f
6	125	f
1	90	f
2	90	f
3	90	f
4	90	f
5	90	f
6	90	f
1	122	f
2	122	f
3	122	f
4	122	f
5	122	f
6	122	f
1	123	f
2	123	f
3	123	f
4	123	f
5	123	f
6	123	f
1	124	f
2	124	f
3	124	f
4	124	f
5	124	f
6	124	f
1	126	f
2	126	f
3	126	f
4	126	f
5	126	f
6	126	f
1	91	f
2	91	f
3	91	f
4	91	f
5	91	f
6	91	f
1	127	f
2	127	f
3	127	f
4	127	f
5	127	f
6	127	f
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
41	1	5	2013-01-10	1	Reunión de socialización con equipo Municipal y referentes ELA Municipales.	Realizar la primera jornada de capacitación del ELA el 17 de enero de 2013.		26	45
52	1	5	2013-01-14	0	Entregar invitaciones para la Asamblea Ciudadana.	Se comprometieron a asistir a la Asamblea.		27	40
130	1	4	2012-09-13	0	Precisar fechas de las actividades que se harán en la etapa 1.	Se definieron fechas concretas de actividades en la etapa 1.	Ninguna	18	0
53	1	6	2013-01-31	2	1. Recopilación relevante del Municipio de Uluazapa obtenida de los miembros del ELA.\n2. Explicación de la forma en que se trabajaran los talleres.	1. Miembros del ELA colaboraran para obtener datos antiguos del Municipio y aportaran nombres de personas que podrían colaborar.\n2. Traer las convocatorias 3 días antes de la Asamblea.	1. Incluir Ley de Impuestos Municipales en el plan.	27	0
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
68	1	6	\N	0	\N	\N	\N	28	0
69	2	1	\N	0	\N	\N	\N	26	0
70	2	2	\N	0	\N	\N	\N	26	0
73	2	2	\N	0	\N	\N	\N	27	0
74	1	2	\N	0	\N	\N	\N	30	0
81	1	1	\N	0	\N	\N	\N	2	0
82	1	1	\N	0	\N	\N	\N	37	0
48	1	1	2012-12-14	1	Invitar a personas del lugar a que sean parte de una Asamblea Ciudadana.	De los asistentes, cuatro personas van a llegar el lunes 17 de diciembre de 2012 a la Asamblea Ciudadana.	Se observan muchas ganas de colaborar el proceso.	29	10
63	2	1	2013-02-22	0	Roles y funciones en el proceso de planificación estratégica 	Roles y funciones en el proceso de planificación estratégica 	la asesorea municipal lic. Zenaida , preparo una exposicion de los roles y funciones del ELA y grupo gestor , como apoyo al proceso de elaboracion del PEP  	29	0
67	2	5	2013-03-06	0	Preparación de condiciones previas para la formulación del PEP 	Presentación del segundo producto 	Se recibe informe de la etapa 1 el cual fue aprobado y ademas se hacen observaciones a considerar en el PEP 	29	0
66	2	4	2013-04-04	0	Coordinación de taller municipal con instituciones y grupo gestor 	Coordinación de taller municipal con instituciones y grupo gestor 	Ninguna 	29	0
65	2	3	2013-02-14	0	Preparación logística para desarrollar talleres territoriales 	Preparación logística para desarrollar talleres territoriales 	La reunión era con el director de la unidad de salud Francisco J. Sorto para pedirle información sobre el tema de salud y tomarlo como base para formular el diagnóstico, no hubo reunión pero la información la brindó por medio electrónico 	29	0
64	2	2	2013-02-14	0	Preparación logística para desarrollar talleres territoriales	Preparación logística para desarrollar talleres territoriales 	La reunión era con el director de la unidad de salud Francisco J. Sorto para pedirle información sobre el tema de salud y tomarlo como base para formular el diagnóstico, no hubo reunión pero la información la brindó por medio electrónico 	29	0
86	3	1	2013-05-03	4	Reunión y capacitación Grupo Gestor 	0		27	0
72	2	1	2013-02-19	0	Presentación del proceso PEP y de informe de diagnóstico del municipio 	Presentación del proceso PEP y de informe de diagnóstico del municipio 		27	0
94	2	4	2013-03-07	0	Presentación de resultados de la primera etapa	Presentación de informe sobre etapa 1		27	0
87	3	2	2013-05-15	4	Capacitación sobre Municipalismo 	0		27	0
88	3	3	2013-05-23	2	Presentación de Diagnóstico PEP, Etapa II	0		27	0
89	3	1	2013-04-28	3	Capacitación a Grupo Gestor	0		28	0
75	2	1	2013-02-08	0		Recopilación de información 		30	0
91	3	2	2013-05-24	0	Socialización de Diagnóstico	0		29	0
95	2	5	2013-03-15	0	Recopilación de información complementaria del diagnóstico y planificación de talleres sectoriales 	Reunión con ELA		27	0
131	1	5	2012-09-18	1	Presentación de la propuesta del PEP a los sectores económicos del municipio.	Expresaron participar en la consulta sectorial	Ninguna	18	30
93	2	3	2013-03-04	0	Entrega de información para realización de PEP 	Entrega de información para realización de PEP 	Se entrego información a todas las personas de diferentes credos e ideologías y partidos políticos 	27	0
96	2	6	2013-03-22	0	Recopilación de información para el diagnóstico 	Recopilación de información para el diagnóstico	Se visito la PNC pero no se pudo obtener información 	27	0
98	1	1	\N	0	\N	\N	\N	19	0
97	1	1	2012-09-07	0	Presentación Plan de Trabajo a Gobierno Municipal de Tepetitán. 			20	0
99	1	2	2012-09-12	0	Presentación de la propuesta metodologica de la primera etapa a las personas referentes.			20	0
117	1	16	2012-09-26	0	Reunión Cantón El Amatillo para presentar Plan de trabajo de Plan Estratégico Participativo			19	0
100	1	3	2012-09-18	0	Reunión con liderazgos comunitarios.\n			20	0
101	1	2	2012-09-03	1	Presentación Plan de trabajo a Concejo Municipal por parte de la Fundación Nacional para el Desarrollo(FUNDE)	a) Concejo Municipal expresó su interés en participar del proceso de construcción del Plan Estratégico Participativo(PEP).  \nb) El Concejo Municipal tomará decisión para la firma del acuerdo municipal		19	0
103	1	3	2012-09-04	0	 Recabar información del Instituto Nacional El Rosario(INER) y la población estudiantil que asiste al mismo. 	El Director del Instituto Nacional de El Rosario(INER) mostró mucha colaboración para proporcionar información sobre la institución que dirige y mucha disposición para la participación de los jóvenes en las consultas. 		19	40
104	1	4	2012-09-04	0	Recabar información sobre la existencia de políticas municipales.	a) FUNDE remite por escrito la lista de información que hace completar sobre Unidad de Género.\nb) Verónica Navidad, encargada de la Unidad de Género remite la información. 		19	40
105	1	5	2012-09-04	0	Consultar información sobre matrícula, estadísticas educativas del Centro Escolar Monseñor Luis Chávez y González.	Sra. Rodríguez de Peña, Directora de Centro Escolar Monseñor Luis Chávez y González, proporcionará información sobre estadísticas educativas solicitadas.		19	45
106	1	6	2012-09-11	0	Retirar acta de recepción de Plan de trabajo del Plan Estratégico Participativo(PEP)y acuerdo municipal.	Ese día se retiró acuerdo municipal y acta de recepción del Plan de trabajo del Plan Estratégico Participativo, presentado por la Fundación Nacional para el Desarrollo(FUNDE) al Concejo Municipal. 		19	15
102	1	4	2012-09-19	0	Reunion con Instituciones públicas y privadas.			20	0
107	1	7	2012-09-11	0	Solicitar información sobre situación de salud en el municipio	La Fundación Nacional para el Desarrollo(FUNDE) remite una nota a directora de unidad de salud del municipio, solicitando la información sobre salud que se requiere, así como el propósito y para qué será útil la información.  Especificando qué significa un Plan Estratégico Participativo.		19	0
109	1	8	2012-09-11	0	Solicitar información sobre Centro Escolar y población estudiantil, así como actores claves en la relación alumnos, maestros, escuela		Hay mucha disposición a colaborar y proveer de infomación. 	19	30
110	1	9	2012-09-12	1	Reunión con referentes municipales para el inicio del proceso de construcción del Plan Estratégico Participativo en el municipio. 	 Se definieron fechas para la presentación del Plan de trabajo del Plan Estratégico Participativo (PEP) en el municipio. \n\n18 de septiembre 2012( Cantón Veracruz)Hora: 2:00 p.m.\n19 de septiembre 2012( líderes de Cantón San Martín y Amatillo, 2:00 p.m.  \n20 septiembre 2012( Cantón El Calvario y el Centro) 2:00 p.m.\n\n	Los Concejales( nombrados como referentes del Concejo Municipal), recomiendan que en estas reuniones siempre participe el Sr. Alcalde. Solicitan que se haga un esfuerzo en este sentido.\n\nEl Sr. Alcalde, solicitó cambio de fecha para reunión en Cantón Veracruz, para el día 21 de septiembre de 2012. 	19	45
111	1	10	2012-09-19	0	Intercambio para coordinar reunión del día 21 de septiembre de 2012 en Cantón Veracruz.	La reunión se mantiene como está programado, hay que establecer coordinación con Marina Lobato en Cantón Veracruz. 		19	15
112	1	11	2012-09-19	0	Presentación de plan de trabajo del Plan Estratégico Participativo a habitantes de Cantón San Martín.		Se recomienda convocar a una segunda presentación con líderes y habitantes del Cantón San Martín. 	19	0
108	1	5	2012-09-19	0	Reunión con pequeños empresarios/as			20	0
116	1	15	2012-09-25	0	Reunión con representantes de negocios y líderes comunitarios			19	0
114	1	13	2012-09-21	0	Reunión con liderazgo del Cantón Veracruz			19	0
115	1	14	2012-09-25	0	Reunión con representantes de instituciones para presentación de Plan de trabajo para la elaboración del Plan Estratégico Participativo		Significado: C.E. = Centro Escolar\n             INER= Instituto Nacional El Rosario	19	0
118	1	17	2012-09-26	0	 Conocer sobre la red de jóvenes en El Rosario e invitarles a que participen en reunión de presentación del plan de trabajo del Plan Estratégico Participativo		 Se invitó a la reunión programada para el día 27 de septiembre de 2012 en la alcaldía municipal( 2:30 p.m.) \n\nLa red de jóvenes fue promovida por Plan Internacional, pero en este momento necesita reestructuración. 	19	30
119	1	18	2012-09-27	0	Reunión con liderazgo local de Barrio El Centro y jóvenes de Instituto Nacional de El Rosario.	Presentación del Plan de Trabajo para la realización del Plan Estratégico Participativo en el municipio		19	0
120	1	19	2012-09-28	0	Reunión Cantón San Martín con liderazgo local 			19	0
113	1	12	2012-08-20	0	Presentación de plan de trabajo para la elaboración del Plan Estratégico a habitantes de Cantón El Calvario			19	0
92	3	4	2013-05-27	3	Presentación de Diagnóstico a Grupo Gestor 	0		27	30
123	3	2	2013-05-18	2	Capacitación de Grupo Gestor 	0		26	30
122	3	1	2013-04-30	4	Capacitación a Grupo Gestor	0		26	0
124	3	3	2013-05-27	3	Presentación de Diagnóstico al Concejo Municipal 	0		26	30
125	3	2	2013-05-13	3	Taller con Grupo Gestor	0		28	0
90	3	1	2013-05-09	3	Capacitación a Grupo Gestor	0		29	30
126	3	3	2013-05-25	3	Socialización de Diagnóstico 	0		29	0
127	3	1	2013-05-04	4	Taller Grupo Gestor sobre Municipalismo	0		30	30
121	1	1	2012-09-05	1	Presentación de la Plan de Trabajo para la facilitación del proceso del PEP	El Concejo Municipal y Alcalde expresaron lo importante del proceso del PEP en Zacatecoluca, por lo que definirian el acuerdo municipal.	Ninguna	18	0
128	1	2	2012-09-06	1	Tener informacion sobre el tejido social del municipio	Información del tejido social y divisíon territorial del municipio	Ninguna	18	30
129	1	3	2012-09-12	2	Presentar a las personas referentes de la municipalidad el proceso metodológico del PEP	Definición de un cronograma de actividades en la etapa 1.	Ninguna	18	0
133	1	20	2012-10-02	1	Solicitar información sobre el municipio	La secretaria municipal, licenciada Xiomara Martínez, remite información sobre: municipio y caseríos, diagnóstico de salud elaborado por unidad de salud.  Se envían invitaciones( la municipalidad) para Asamblea de compromiso público. FUNDE se comunica para convocatorias. 		19	0
134	1	21	2012-10-02	0	Consulta de estadísticas de atención en educación en Centro Escolar Cantón Veracruz( cobertura educativa)	 Sra. Directora completa datos de educación(cobertura educativa) solicitados. 	C.E. = Centro Escolar. 	19	10
135	1	22	2012-10-02	0	Invitarle a participar en Equipo Local de Apoyo y consultar información sobre cooperativa. 	Tiene interés en participar en el proceso y puede hacerlo especialmente por las tardes.	SERICOSTUR( Asociación cooperativa de comercialización, producción artesanal, aprovisionamiento, ahorro y crédito de costureras y serigrafistas de El Rosario, Cuscatlán de responsabilidad limitada, de R.L.)	19	20
136	1	23	2012-10-03	0	Invitar a miembro del CCMPC a participar en el Equipo Local de Apoyo(ELA)e información sobre el municipio.	FUNDE se comunica con Doña Dina Ramos de Escobar para ampliar información sobre el municipio.	Aportó información sobre el municipio.\nNo está interesada en participar. \n\nCCMPC ( Comité Municipal de Protección Civil)	19	35
137	1	24	2012-10-03	0	Invitar al Sr. Rodil Martínez para que participe en el Equipo Local de Apoyo. 	 La persona invitada acepta participar y sugiere el nombre de Alex Vásquez.		19	45
138	1	25	2012-10-03	1	Presentar programa para Asamblea pública de compromiso.	Sr. alcade mostró interés y acuerdo con el programa propuesto. 		19	0
139	1	26	2012-10-10	0	Asamblea de firma de acta de compromiso público			19	0
140	1	27	2012-10-09	0	Reunión para instalación de Equipo Local de Apoyo			19	0
153	2	3	2013-04-04	0	Recopilación de información para Diagnóstico 			28	0
142	1	29	2012-10-17	0	Reunión con Equipo Local de Apoyo para precisar fechas de reuniones			19	40
141	1	28	2012-10-11	3	Taller de Capacitación Equipo Local de Apoyo sobre Planificiación.	El Equipo Local de Apoyo fue capacitado en contenidos sobre Planificación Estratégica.  \n\nMiembros de Equipo Local de Apoyo, buscan mejores fechas para dar inicio a presentaciones de Plan de trabajo del Plan Estratégico Participativo(PEP) en cada uno de los Cantones o sectores. 		19	0
144	1	6	\N	0	\N	\N	\N	20	0
143	1	30	2012-10-19	0	Presentación a empleados y empleadas municipales		REF: Registro del Estado Familiar\nUACI: Unidad de Adquisiciones y Contrataciones Institucional\n\nLos cargos denominados Bombero o Bombera, se refieren a las personas encargadas de las bombas de agua potable en el municipio. 	19	0
145	2	1	2012-10-26	0	 Consultar a líderes y habitantes del área urbana del municipio sobre principales problemas que les afectan	Consulta área urbana del municipio		19	0
164	2	11	2012-12-07	0	Consultas a las mujeres de las problemáticas que identifican	Consulta Asociación Mujeres El Rosario		19	0
148	2	3	2012-10-31	0	Consultar sobre los principales problemas que afectan en el Cantón Veracruz	Taller de consulta Cantón Veracruz		19	0
147	2	2	2012-10-30	0	Consulta con habitantes de Cantón El Calvario sobre principales problemas que les afectan.	Taller de Consulta Cantón El Calvario		19	0
150	2	5	2012-11-06	0	Consultar sobre principales problemas en Cantón El Amatillo	Consulta Cantón El Amatillo		19	0
149	2	4	2012-10-31	0	Consulta con los habitantes sobre principales problemas que les afectan en el área urbana	Consulta Barrio El Centro, área urbana		19	0
152	2	2	2013-03-15	0	Entrega de Convocatoria , Taller de Diagnóstico 			28	0
71	2	1	2013-02-15	0	entrega de invitaciones a Taller de Diagnóstico 	Planificación estratégica participativa		28	0
154	2	4	2013-02-28	0	Presentación y validación de informe Etapa I	Presentación y validación de informe Etapa I	el mapa de exclusión de zonas urbanas no coinciden en las comunidades planteadas con el municicpio	28	0
155	2	5	2013-04-05	0	Recolección de información 			28	0
156	2	6	2013-05-05	0	Reunión con Alcalde Municipal 			28	0
157	2	7	2013-04-05	0	Entrevista con responsable de ALBA becas			28	0
151	2	6	2012-11-07	0	Consulta FODA empleados y empleadas municipales	Consulta a empleados municipales		19	0
158	2	7	2012-11-07	0	 Consultar con sector comercio sobre los principales problemas que les afectan	Consulta con sector comercio		19	0
132	1	6	2012-09-20	2	Presentación de la propuesta del PEP al liderazgo local	Se desperto el interés del liderazgo por participar en el proceso del PEP	Las personas líderes expresaron que la participacion de las comunidades fuera muy representativa. 	18	0
159	2	8	2012-11-12	0	Consulta sobre los principales problemas de la municipalidad identificados por Concejales	Consulta Concejo Municipal		19	0
162	1	8	\N	0	\N	\N	\N	18	0
163	2	10	2012-11-26	0	Consulta a habitantes de Cantón El Calvario	Consulta Cantón El Calvario		19	0
160	1	7	2012-10-03	1	Presentación de la propuesta del PEP a instituciones públicas y privadas.	Los representantes de instituciones públicas y privadas conocieron la propuesta del PEP y se interesaron en apoyar el proceso con información relevante.	Ninguna	18	30
166	2	3	2013-02-01	0	Recopilación de información en instituciones del Gobierno Central 			30	0
167	2	12	2012-12-12	0	Consultar a agricultores y agricultoras sobre las principales problemáticas identificadas	Consulta Agricultores y Agricultoras		19	0
161	2	9	2012-11-13	0	Consultar a los participantes sobre prinicipales problemas en el Cantón San Martín.	Consulta Cantón San Martín		19	0
168	2	4	\N	0	\N	\N	\N	30	0
169	2	5	\N	0	\N	\N	\N	30	0
165	2	2	2013-03-11	0	Recolección de información para Diagnóstico Político Institucional 	Recolección de información para Diagnóstico Político Institucional 		30	0
170	2	13	2012-12-12	0	Consultar a jóvenes del municipio sobre los problemas que les afectan	Consulta Jóvenes Municipio		19	0
\.


--
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 170, true);


--
-- Data for Name: revapro_productos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revapro_productos (rea_pro_id, mun_id, rea_pro_fecha_presentacion, rea_pro_fecha_vistobueno, rea_pro_fecha_aprobacion, rea_pro_is_plan_trabajo, rea_pro_is_perfil, rea_pro_is_ind_endeudamiento, rea_pro_is_ind_comp, rea_pro_is_informe_diag, rea_pro_is_visto_bueno, rea_pro_observaciones, rea_pro_archivo_acta) FROM stdin;
2	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
3	3	2013-04-01	2013-04-08	2013-04-30	t	t	f	t	t	t	\N	\N
240	240	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
142	142	2013-04-03	2013-04-04	2013-04-12	t	t	f	t	f	t	\N	\N
1	1	2013-05-01	2013-05-02	2013-05-03	t	t	t	t	t	t	Observaciones	\N
\.


--
-- Data for Name: revapro_productos2; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revapro_productos2 (rea_pro_id, mun_id, rea_pro_fecha_presentacion, rea_pro_fecha_vistobueno, rea_pro_fecha_aprobacion, rea_pro_is_informe_etapa, rea_pro_is_borrador, rea_pro_is_visto_bueno, rea_pro_observaciones, rea_pro_archivo_acta) FROM stdin;
3	3	\N	\N	\N	\N	\N	\N	\N	\N
14	14	\N	\N	\N	\N	\N	\N	\N	\N
160	160	\N	\N	\N	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N	\N	\N	\N
93	93	\N	\N	\N	\N	\N	\N	\N	\N
1	1	2013-05-01	2013-05-02	2013-05-03	f	f	f	Observaciones	\N
\.


--
-- Name: revapro_productos2_rea_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revapro_productos2_rea_pro_id_seq', 1, false);


--
-- Name: revapro_productos_rea_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revapro_productos_rea_pro_id_seq', 1, false);


--
-- Data for Name: revision_informacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY revision_informacion (rev_inf_id, rev_inf_fregistro_asesor, rev_inf_frevision_uep, rev_inf_adjunto_doc, rev_inf_plan_municipalidad, rev_inf_plan_contingencia, rev_inf_felaboracion, rev_inf_plan_oformato, rev_inf_gestion_reactiva, rev_inf_ogestion_reactiva, rev_inf_gestion_correctiva, rev_inf_ogestion_correctiva, rev_inf_gestion_prospectiva, rev_inf_ogestion_prospectiva, rev_inf_plan_comunal, rev_inf_mapa, rev_inf_presentoa, rev_inf_conclusion, rev_inf_presento, rev_inf_comision_conformada, rev_inf_fconformacion, rev_inf_presentob_eo, rev_inf_dpresentob_eo, rev_inf_comision, rev_inf_acta_comision, rev_inf_dacta_comision, rev_inf_capacitacion, rev_inf_dcapacitacion, rev_inf_herramienta, rev_inf_inv_herramienta, rev_inf_dinv_herramienta, rev_inf_presentoc, rev_inf_dpresentoc, rev_inf_presentod, rev_inf_mapa_identificacion, rev_inf_dmapa_identificacion, rev_inf_presentoe, rev_inf_dpresentoe, rev_inf_presentof, rev_inf_dpresentof, mun_id) FROM stdin;
1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	93
2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2
3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	300
4	2013-03-08	2013-03-10	t	t	t	2013-03-09	t	t	A	f	B	t	C	t	\N	t	Conclusiones	t	t	2013-03-09	t	Si la presento	t	t	Descripcion	t	Capacitaciones	t	t	Inventario de herramientas	t	Descripción	t	t	Descripción	t	Descripción	\N		301
5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	303
\.


--
-- Name: revision_informacion_rev_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('revision_informacion_rev_inf_id_seq', 5, true);


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol (rol_id, rol_nombre, rol_descripcion, rol_codigo) FROM stdin;
3	consultor	Este rol representa al consultor	\N
1	administrador	Este rol representa al administrador del sistema	\N
4	subsecretaria	Rol para la subsecretaria de desarrollo territorial.	\N
7	asesorMunicipal	Rol que manejará las opciones el asesor municipal	\N
9	ssdt	Verificará la información ingresada por parte del rol Subsecretaria	\N
11	financiero	Rol para la gestion y asignacion financiera  por componentes	\N
10	gestionRiesgosConsul	Rol para gestión de riesgos para consultor	gdrc
12	capParticipante	Comp2.2: Capacitaciones	\N
13	capCapacitador	Comp2.2: Capacitaciones>Capacitador	\N
14	uep	Componente UEP	\N
15	Comites	para CC y CCC	\N
8	Comp 2.4 PRFM	Usuario temporal para pruebas	\N
16	AdminPEPRegion	\N	apr 
5	AdministrativoPEP	Rol para usuarios administrativo del proyecto PEP	apg 
17	transparencia	usuario temporal para prueba de modulos de transparencia	\N
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
5	23
5	36
5	38
5	60
5	61
5	63
5	64
5	65
5	66
5	95
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
13	118
13	117
13	119
14	120
14	121
14	122
14	123
5	76
15	124
15	125
16	54
16	55
16	56
16	57
16	58
16	23
16	36
16	38
16	60
16	61
16	64
16	65
16	66
16	95
16	19
16	20
16	22
16	63
16	116
5	116
12	126
13	126
17	127
17	128
\.


--
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rol_rol_id_seq', 17, true);


--
-- Data for Name: rubro; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rubro (rub_id, rub_observacion_general, rub_emite_nota, rub_observacion, mun_id, rub_nombre_proyecto) FROM stdin;
1	\N	\N	\N	300	\N
2	\N	\N	\N	73	\N
4	\N	\N	\N	303	\N
3		t	\N	301	Mi proyecto
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
19	\N	\N	0.00	4	1
20	\N	\N	0.00	4	2
21	\N	\N	0.00	4	3
22	\N	\N	0.00	4	4
23	\N	\N	0.00	4	5
24	\N	\N	0.00	4	6
13	t	A	200.00	3	1
14	t	B	2000.00	3	2
15	t	C	3000.00	3	3
16	t	D	4000.00	3	4
17	t	E	5000.00	3	5
18	f	F	830.00	3	6
\.


--
-- Name: rubro_elegible_rub_ele_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rubro_elegible_rub_ele_id_seq', 24, true);


--
-- Name: rubro_rub_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rubro_rub_id_seq', 4, true);


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
2	2013-04-01	2013-04-02	2013-04-04	2013-04-05	2013-04-06	2013-04-07	2013-04-08	2013-04-09	2013-04-10	2013-04-11	Comentarios	301	documentos/seguimiento/seguimiento2.docx
\.


--
-- Data for Name: seguimiento_3b; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_3b (seg_id, mun_id, seg_fecha_emision, seg_fecha_recepcion, seg_fecha_envio, seg_rubros, seg_descripcion, seg_archivo_perfil, seg_archivo_tdr, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: seguimiento_3b_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_3b_seg_id_seq', 1, false);


--
-- Data for Name: seguimiento_aprimp; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_aprimp (seg_id, mun_id, seg_is_ok, seg_fecha_emision, seg_fecha_recepcion, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N
73	73	\N	\N	\N	\N	\N
2	2	\N	\N	\N	\N	\N
183	183	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N
93	93	\N	\N	\N	\N	\N
1	1	f	2013-05-02	2013-05-02	\N	Observaciones
\.


--
-- Name: seguimiento_aprimp_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_aprimp_seg_id_seq', 1, false);


--
-- Data for Name: seguimiento_evaluacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_evaluacion (seg_eva_id, mun_id, seg_eva_fecha_presentacion, seg_eva_lugar, seg_eva_is_informe, seg_eva_is_divulgado, seg_eva_porque, seg_eva_archivo_informe, seg_eva_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N	\N	\N
240	240	\N	\N	\N	\N	\N	\N	\N
58	58	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: seguimiento_evaluacion_seg_eva_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_evaluacion_seg_eva_id_seq', 1, false);


--
-- Data for Name: seguimiento_receppro; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seguimiento_receppro (seg_id, mun_id, seg_fecha_recepcion, seg_fecha_vistobueno, seg_fecha_aprobacion, seg_archivo_acuerdo, seg_observaciones) FROM stdin;
3	3	\N	\N	\N	\N	\N
1	1	\N	\N	\N	\N	\N
225	225	\N	\N	\N	\N	\N
\.


--
-- Name: seguimiento_receppro_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_receppro_seg_id_seq', 1, false);


--
-- Name: seguimiento_seg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seguimiento_seg_id_seq', 2, true);


--
-- Data for Name: seleccion_comite; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seleccion_comite (sel_com_id, sel_com_fverificacion, sel_com_seleccionado, sol_asis_id) FROM stdin;
3	\N	No	4
4	\N	Si	5
5	\N	\N	6
2	2013-05-02	No	3
6	\N	\N	7
7	\N	\N	8
8	\N	\N	9
\.


--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seleccion_comite_seleccion_comite_id_seq', 9, true);


--
-- Data for Name: solicitud_asistencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY solicitud_asistencia (sol_asis_id, nombre_solicitante, cargo, telefono, sol_asis_ruta_archivo, mun_id, c1, c2, sel_com_id, fecha_solicitud, comentarios) FROM stdin;
4	Cristian Oswaldo Fuentes	dddddd	8888-8888	documentos/solicitud_asistencia/solicitud_asistencia4.pdf	1	t	t	\N	2013-02-06	
5	Karen Peñate	fdafad	6666-6666	documentos/solicitud_asistencia/solicitud_asistencia5.pdf	2	t	t	\N	2013-02-07	
3	Karen Peñate	Programadora	5555-5555	documentos/solicitud_asistencia/solicitud_asistencia3.pdf	1	t	t	\N	2013-02-07	
6	Roberto Galdamez	Secretario	2222-2222		23	t	t	\N	2013-05-04	xxxxxxxxxxxxxxxx
7	qqqqqqqqqqqqqqqqqqqq	xxxxxxxxxxxxx	2222-2222		23	t	t	\N	2013-05-01	xx
9	\N	\N	\N	\N	23	\N	\N	\N	\N	\N
8	ggggggggg	gggggggg	7777-7777		1	t	t	\N	2013-05-01	
\.


--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('solicitud_asistencia_sol_asis_id_seq', 10, true);


--
-- Data for Name: solicitud_ayuda; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY solicitud_ayuda (sol_ayu_id, mun_id, sol_ayu_fecha_emision, sol_ayu_fecha_recepcion) FROM stdin;
\.


--
-- Name: solicitud_ayuda_sol_ayu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('solicitud_ayuda_sol_ayu_id_seq', 1, false);


--
-- Data for Name: subproy_segui; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY subproy_segui (subproy_id, ccc_id, nom_subproy, nom_com_beneficiadas, num_com_beneficiadas) FROM stdin;
\.


--
-- Name: subproy_segui_subproy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('subproy_segui_subproy_id_seq', 1, false);


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
-- Name: tipo_actor_tip_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_actor_tip_act_id_seq', 7, true);


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
-- Name: tipo_mapa_tip_map_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_mapa_tip_map_id_seq', 5, true);


--
-- Name: tipo_tip_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_tip_id_seq', 3, true);


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
-- Name: transferencia_trans_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('transferencia_trans_id_seq', 6, true);


--
-- Data for Name: uep_act_actividades; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_act_actividades (cat_id, cat_nombre) FROM stdin;
\.


--
-- Name: uep_act_actividades_cat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_act_actividades_cat_id_seq', 1, false);


--
-- Data for Name: uep_act_area; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_act_area (ars_id, ars_nombre) FROM stdin;
\.


--
-- Name: uep_act_area_ars_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_act_area_ars_id_seq', 1, false);


--
-- Data for Name: uep_actividades; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_actividades (act_id, cat_id, ars_id, act_mun_id, act_responsable, act_lugar, act_fecha, act_componente, act_subcomponente, act_tipo, act_agenda, act_instituciones, act_comentarios) FROM stdin;
\.


--
-- Name: uep_actividades_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_actividades_act_id_seq', 1, false);


--
-- Data for Name: uep_actividades_participantes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_actividades_participantes (par_id, par_act_id, par_nombres, par_apellidos, par_edad, par_sexo, par_cargo, par_telefono) FROM stdin;
\.


--
-- Name: uep_actividades_participantes_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_actividades_participantes_par_id_seq', 1, false);


--
-- Data for Name: uep_mem_actividades; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_mem_actividades (acs_id, acs_mem_id, acs_correlativo, acs_descripcion) FROM stdin;
\.


--
-- Name: uep_mem_actividades_acs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_mem_actividades_acs_id_seq', 1, false);


--
-- Data for Name: uep_mem_acuerdos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_mem_acuerdos (acu_id, acu_mem_id, acu_correlativo, acu_descripcion) FROM stdin;
\.


--
-- Name: uep_mem_acuerdos_acu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_mem_acuerdos_acu_id_seq', 1, false);


--
-- Data for Name: uep_mem_areas; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_mem_areas (are_id, are_nombre) FROM stdin;
\.


--
-- Name: uep_mem_areas_are_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_mem_areas_are_id_seq', 1, false);


--
-- Data for Name: uep_memorias; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_memorias (mem_id, mem_mun_id, mem_area, mem_nombre, mem_fecha, mem_comentarios) FROM stdin;
1	1	\N	\N	\N	\N
\.


--
-- Name: uep_memorias_mem_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_memorias_mem_id_seq', 1, true);


--
-- Data for Name: uep_per_desarrollo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_per_desarrollo (des_id, des_per_id, des_correlativo, des_descripcion, des_responsable) FROM stdin;
\.


--
-- Name: uep_per_desarrollo_des_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_per_desarrollo_des_id_seq', 1, false);


--
-- Data for Name: uep_per_objetivos; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_per_objetivos (obj_id, obj_per_id, obj_correlativo, obj_descripcion) FROM stdin;
\.


--
-- Name: uep_per_objetivos_obj_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_per_objetivos_obj_id_seq', 1, false);


--
-- Data for Name: uep_perfiles; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY uep_perfiles (per_id, per_mun_id, per_nombre, per_fecha_ini, per_fecha_fin, per_lugar, per_participantes, per_objetivo, per_observaciones) FROM stdin;
1	1	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Name: uep_perfiles_per_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('uep_perfiles_per_id_seq', 1, true);


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
67	64	\N	\N
68	65	\N	\N
69	66	\N	\N
70	67	\N	\N
71	68	\N	\N
72	69	\N	\N
73	70	\N	\N
74	71	\N	\N
75	72	\N	\N
76	73	\N	\N
77	74	\N	\N
78	80	\N	\N
\.


--
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('user_profiles_id_seq', 78, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id, reg_id) FROM stdin;
23	so13232	$2a$08$95RLBLbICbTjBBnRSiCjLufl9wpAn3I1C/MrO0SemZL99TzKRadjG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
24	an12220	$2a$08$RwgTcb8HxxhAlcF3pu1S0.zGJfMFkLp8e0FakMMgACvBiHbXPA.GC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
26	an12221	$2a$08$Za16X5OqjRVJi/pfkMIWKOMBEK1icNOrZ0NItL/s2tTlzH8ygOp0C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
27	sa10197	$2a$08$podpZLbefI6WMSq91SYNQOaqCW/1FdrP2eO0KSLklbyuHAsoVhabG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
29	li05076	$2a$08$IrMFOFDHxcZ6WEfOvuXYi.JSNiPbu7rkt32TF4IOLRiejoNfPocym	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
30	ch03037	$2a$08$Bj3F1.S6d2NX2c2k4.1rGOvLkTVvnP6xM/JGf4/g2KIXlxkWCtuFW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
31	ch03046	$2a$08$9aDPW8JmyWheTllY4W8GlupOpDzDFE9hNEsOh0AaZlI3wByUM1852	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
32	ch03031	$2a$08$H2DtVMfln04DhW0xPlTEE.54fddg.aszDa4SI.4JBIkC9rYMSgZxW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
33	ch03052	$2a$08$qD93OLiljFRV60hg6IygK.Icmi9k3CcoW16L7UVf5SnRdrfxDz1GO	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
37	us14251	$2a$08$S9xdb/kI6dCAMNQ0hi8By.2ZclovPBXV6EN8GzVXkMajFKdfa17fq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
38	mi09169	$2a$08$5RTw70P3l4KrrxcG1k1Feei7HQJPufYrkI0kXQzIhQnL5IiD77f2C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
39	mi09159	$2a$08$eQ27nyb0QWOm5hS7vuRPwOKrK04SShSGZJ5.U8HOeu0yusYXAL35S	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
40	mo08142	$2a$08$oRc3aXq/8JzIq9UnibsT..hOdg0S2hWm7F5QvCfMB/z.kivHh8ccK	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
41	mo08136	$2a$08$oBOx17M47nVmLm4igOXc8OJwJTe82hOc14K2yjyEJY1g.Oq.zNUr2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3	\N
51	blxRol5	$2a$08$/wTdbAUi.kO.uYSQA6OVoONs6SCEG7E.JXphZjQX8XLx2RJIdig0K	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-02-09	2013-02-09	\N	5	\N
54	desentralizacion	$2a$08$eRsmwvKzF5QEhPzjBh1AbOK3GvAoJuQOYgtDTM8i2IcTmHcllJ3N2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-09	2013-02-20	\N	4	\N
52	an12214	$2a$08$.BV6wvNAGP/LdRcmpiG2de4PKm/8/jpItbYXQsJu6kAs9kawWxZDe	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.7.94	2013-02-19	2013-02-19	\N	3	\N
22	so13226	$2a$08$sJhWdlZRSzSKwhJqGztVZevplGEQtOhI1pc0Yk3Z1olAW5y6TS96K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.205.230	2013-03-05	2013-02-02	\N	3	\N
13	aaron	$2a$08$jRJBfFknSld2/iE2RO.Vb.tQ.rWFSWGKwHbsMzWp0FXDEX2wQHZ5q	carlos.aaromero@gmail.com	1	0	\N	\N	\N	\N	\N	190.62.81.188	2013-04-08	2013-01-05	\N	4	\N
53	ch03025	$2a$08$8KaN0ZQluMR5YHJsWjW1xOSX06TrSw8L/uwjQx7vRFv7LKti1VhiW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.7.94	\N	2013-02-19	\N	3	\N
46	un07124	$2a$08$wAOOfCneKOB9IEF6PWRsw.zrZ4j5NMWOY7jEnqXYNHhjjkcPIduAu	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.37.23	2013-05-30	2013-02-02	\N	3	\N
20	ah01012	$2a$08$H3TRunvBEJKO40n1GnxpfOmO0NW6pEGSym5rML.Zp4qCX09sT56Zy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.33.13	2013-05-05	2013-02-02	\N	3	\N
56	nuria_rivas	$2a$08$po0cUhl69GS7RrzqKbXJHuF5NpiZrQrhctRPXhXBe4i.ZhUEkO1bC	hotsaucekco@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-30	2013-02-27	\N	9	\N
21	so13224	$2a$08$nHln6RHGVRsYpw9sL4tMQO7syuhvtA5.ir5jz49ZVFfLRlSCZ7bn2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.33.13	2013-05-05	2013-02-02	\N	3	\N
28	sa10185	$2a$08$/2dgOQYtXdDb5BZqLzdTXOfJ0G96tNsi9sU2WTYolsvyWOrexYCBa	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.150.39.73	2013-03-04	2013-02-02	\N	3	\N
1	admin	$2a$08$/nXdYjk2FTZtbB9qxyNbdutoPzhsieMYlU3tNXcxqUb0jJsXx7C7.	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-05-29	2012-08-19	\N	1	\N
49	blexis	$2a$08$t5Ct4zewYCgheX30v1ftdeIPjGlojQVJ.RGX8k4I3vwYmgM9yv6cq	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-02-07	\N	1	\N
34	pa06114	$2a$08$zZHXRGhTY5Tmj2V5rKYx8OvbK.n3VqizCRJtRLv39xlZN933.6eEi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.120.10.42	2013-05-30	2013-02-02	\N	3	\N
25	an12218	$2a$08$fMuWkb5XmOl9mt4V0fru4eB0V4HxHodJ7sHWF6Aqx0swl1aGwyswi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.108.226	2013-03-22	2013-02-02	\N	3	\N
35	cu04058	$2a$08$t48x4nhdANPalU66hCcwmOKgEf6ar9sgfUXspBRLph9MlUX26juda	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.120.10.42	2013-05-30	2013-02-02	\N	3	\N
58	financiero	$2a$08$aDtrZJkrlRa/R30ib6i1Ru02KoAPhJsGr5AypRLdCXR2W81Gd.4ji	bdiazcampos@yahoo.com	1	0	\N	\N	\N	\N	\N	190.87.29.18	2013-05-29	2013-03-07	\N	11	\N
43	mi09178	$2a$08$uHrrfXHapeJhTO6dGjf00uDF.RxnY0WQD8aJzXGnV.FwzoTQi6FPq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.55.114	2013-05-28	2013-02-02	\N	3	\N
19	ah01005	$2a$08$6hK.o39tVrEcYzggckT4IOfOu53/nVazEtRpsfpvcc9KNg5Njyt1W	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.33.13	2013-05-05	2013-02-02	\N	3	\N
60	blxComp24	$2a$08$NELwVCA85erox0s1mlKd9ubI8Kcqa4BWohzxI291foCutGYMIowJy	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-03-20	\N	8	\N
59	finan	$2a$08$HVIqx5kGUYo/QEz0K5rNJeoiEODBe5Lcq4ZB7ri7twicReXhhjUp.	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-30	2013-03-07	\N	11	\N
62	test22C	$2a$08$Ccevw1yXy2Gx17guLQ4fUeiivQDj6vmkkyVKxHFwrhWuLj8tYLMI2	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-04-17	\N	13	\N
18	ah01004	$2a$08$BCB39yPJhszT7ic/cTOYUOP4zEMFcV.x1B/HHnkg0Z5KEMAM3L0Pq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.87.33.13	2013-05-05	2013-02-01	\N	3	\N
44	mi09165	$2a$08$nyuorJuvW0iawsaTMMyzC.ntFRKVBPvRPuPfeDDCf1nsjYfxOOmDC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.42.248	2013-05-29	2013-02-02	\N	3	\N
50	blxCoor	$2a$08$sR0PWTRHzYlcmXVi0sM.muTKcDifMhhZmsBQHMcBuAaa8m26nxw7a	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-20	2013-02-07	\N	3	\N
36	vi11209	$2a$08$IFeZIRYBM.HIIh5bZ6dYAOKk/jfg48jnIlSE7d6dapnTeXsdF8T.K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.120.10.42	2013-05-30	2013-02-02	\N	3	\N
42	mi09161	$2a$08$SNpO1PXTtuzsxha.7USdv.jQSJEp27jsocoBtE/O/hSSKtQyoZOiW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.55.114	2013-05-28	2013-02-02	\N	3	\N
45	un07129	$2a$08$mx9h7dD4hxPlYJ3GZflyueeskiXoFmI3aoXVBH43pvoH38JH47Zcy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.62.42.248	2013-05-29	2013-02-02	\N	3	\N
75	regionpep001	$2a$08$zQhxOCBMb2Lb8s2iSS9t6OkjJu9XQPf32uX08nzirvqZB7IA1xJIi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.86.247.20	2013-05-22	2013-05-12	\N	16	1
66	regCen4	$2a$08$wkNM/qxcrOUUvlCBlzx24OQCYtAqr1.re/kN3F1kE0Lpq7VskjAI6	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.5.134.138	2013-05-07	2013-04-22	\N	8	\N
76	adminpep001	$2a$08$LjnBBvGIjUaWR7P/vu639e2LDj.8ltbip.iYv.SiUX8wpgmwdlaAe	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	190.86.247.20	2013-05-22	2013-05-09	\N	5	\N
55	ca02021	$2a$08$XDExsLEwdSk05TpzArwl9u6T.fMZUXiYRXqxkvUrQnDBFoRo68K9u	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-07-08	2013-02-27	\N	3	\N
61	test22P	$2a$08$6JHF8To61XGklYnWlTV8L.42fyRnqPnmLQYLomdgZYuzn90pENSry	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-04-17	\N	12	\N
71	regOri7	$2a$08$rujlRTbUtU32JqlmxcQfPeStq59Ww2kX9xeF7FsmctnfzC8E66XDm	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	\N	2013-04-22	\N	8	\N
72	corisdem	$2a$08$jO17jLq3W81NpSh1NQUlweecUjidkRe4.4hNLDLakV8tDz9DNp0aq	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	\N	2013-04-22	\N	8	\N
74	tempCCC	$2a$08$EqcLbOHJjJQP3bI2kdHgz.rbyn9p3O0LxHh1R6xC0oDmoxcvRNKjO	hotsaucekco@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-30	2013-05-09	\N	15	\N
80	prueba_transparencia	$2a$08$CNvAaAOzcZQeR5oRVNUNxeb5ZcXAUPQmqgkqk5VEO7zbuZyzLJ/sG	hotsaucekco@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-30	2013-05-29	\N	17	\N
65	regOcc6	$2a$08$ObHiwguqYRSXdg19q6pmNOUWz83bGuD4fsPZpZaCZMjbn5Ak8Ut8m	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-05-15	2013-04-22	\N	8	\N
68	regPar8	$2a$08$3sLjaQNO.Y5kAOBj7yn.b.vkQNziNLOxhI8SqeitB7966Rc.NWQHu	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.5.157.35	2013-04-29	2013-04-22	\N	8	\N
69	regPar5	$2a$08$RyyqKGWkoBF1tzA9a2FAKuMDH5RLmyqLs2wunPhAXWK19aK/ubEpS	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.5.157.35	2013-04-29	2013-04-22	\N	8	\N
70	regOri1	$2a$08$/9UQfQ1LHHOBKHflyXMIzu05652Sea/i95n.vHoW1txplttmDf/om	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.5.157.35	2013-04-29	2013-04-22	\N	8	\N
73	repuep	$2a$08$gheWAhYhjVA2/XgxgqL/yuuO8GdSmWINTls.K2FN0XcqyeWFJi4qS	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.5.157.35	2013-04-29	2013-04-22	\N	8	\N
64	regOcc3	$2a$08$0fYb/3ci9kHls7drqikZD.YmM4bLvXQ66/71DqJbYC68feU9gFJqa	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	168.243.8.13	2013-05-22	2013-04-22	\N	8	\N
63	testUEP	$2a$08$VOoIxJ7h046Vofp7cIrdzO4Cnz/CPEMMzxmzagQGSizmMFXlwp87e	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-04-17	\N	14	\N
67	regCen2	$2a$08$sbjkxNEz89FHoKZdx7U7eeXzW/hO0M/G/5zZDho7Zl0n2rOFSzT2K	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	190.53.118.188	2013-05-22	2013-04-22	\N	8	\N
77	adminpep002	$2a$08$CLQtEVUP391I2k5.8UN0WuC1dmAY7mI6cdEp7C1weW4PUjMig5Vg2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-05-09	2013-05-09	\N	5	\N
78	adminpep003	$2a$08$8xlDTamDaZPndQwtWT8lC.5.0XpY4jrG/yGfWl/XlE3YT4YXmxdxm	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-05-09	2013-05-09	\N	5	\N
79	adminpep004	$2a$08$GXTYK4B4.UTf0t7daCvlNOXqWBT0v14iAmQNu9KhA4P/b8iot2Q2O	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-05-09	2013-05-09	\N	5	\N
57	eaviles	$2a$08$aNJ2flb4iXCMwnO3l.3ZoufvOziig.dZSDbrBCsZ/nJQxmY7NjgYm	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-07-04	2013-03-04	\N	10	\N
16	ah01001	$2a$08$20c..IKeUGselbQ3XzDkju2r2OFUz4ajCZjVxfJ7PnMo0J2jmrUz.	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	10.0.0.1	2013-05-09	2013-02-01	\N	3	\N
15	kpenate	$2a$08$oVWscWst4kaHRMkAqn3TlOXWPba/AJjkWyF6uYmW4AhwPTbBMH39q	kpenate@salud.gob.sv	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-07-08	2013-02-01	\N	5	\N
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('users_id_seq', 80, true);


--
-- Name: c22_capacitaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c22_capacitaciones
    ADD CONSTRAINT c22_capacitaciones_pkey PRIMARY KEY (cap_id);


--
-- Name: c22_cxp_inscritos_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c22_cxp_inscritos
    ADD CONSTRAINT c22_cxp_inscritos_pkey PRIMARY KEY (cxp_id);


--
-- Name: c22_modalidades_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c22_modalidades
    ADD CONSTRAINT c22_modalidades_pkey PRIMARY KEY (mod_id);


--
-- Name: c22_participantes_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c22_participantes
    ADD CONSTRAINT c22_participantes_pkey PRIMARY KEY (par_id);


--
-- Name: c22_sedes_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c22_sedes
    ADD CONSTRAINT c22_sedes_pkey PRIMARY KEY (sed_id);


--
-- Name: c24_user_depto_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c24_user_depto
    ADD CONSTRAINT c24_user_depto_pkey PRIMARY KEY (uxd_id);


--
-- Name: c24_user_depto_uxd_id_key; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY c24_user_depto
    ADD CONSTRAINT c24_user_depto_uxd_id_key UNIQUE (uxd_id);


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
-- Name: pk_asis_ccc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asis_ccc
    ADD CONSTRAINT pk_asis_ccc PRIMARY KEY (asis_ccc_id);


--
-- Name: pk_asis_cm; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asis_cm
    ADD CONSTRAINT pk_asis_cm PRIMARY KEY (asis_cm_id);


--
-- Name: pk_asis_etm; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY asis_etm
    ADD CONSTRAINT pk_asis_etm PRIMARY KEY (asis_etm_id);


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
-- Name: pk_cap_concejo; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cap_concejo
    ADD CONSTRAINT pk_cap_concejo PRIMARY KEY (par_id);


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
-- Name: pk_ccc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY ccc
    ADD CONSTRAINT pk_ccc PRIMARY KEY (ccc_id);


--
-- Name: pk_ccc_con; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY ccc_con
    ADD CONSTRAINT pk_ccc_con PRIMARY KEY (ccc_con_id);


--
-- Name: pk_comentario_publico_cc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY comentario_publico_cc
    ADD CONSTRAINT pk_comentario_publico_cc PRIMARY KEY (coment_id);


--
-- Name: pk_comentario_publico_ccc; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY comentario_publico_ccc
    ADD CONSTRAINT pk_comentario_publico_ccc PRIMARY KEY (coment_id);


--
-- Name: pk_comision_mant; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY comision_mant
    ADD CONSTRAINT pk_comision_mant PRIMARY KEY (cm_id);


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
-- Name: pk_etm; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY etm
    ADD CONSTRAINT pk_etm PRIMARY KEY (etm_id);


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
-- Name: pk_gestion_seguimiento; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY gestion_seguimiento
    ADD CONSTRAINT pk_gestion_seguimiento PRIMARY KEY (ges_seg_id);


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
-- Name: pk_subproy_segui; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY subproy_segui
    ADD CONSTRAINT pk_subproy_segui PRIMARY KEY (subproy_id);


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
-- Name: uep_act_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_act_actividades
    ADD CONSTRAINT uep_act_actividades_pkey PRIMARY KEY (cat_id);


--
-- Name: uep_act_area_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_act_area
    ADD CONSTRAINT uep_act_area_pkey PRIMARY KEY (ars_id);


--
-- Name: uep_actividades_participantes_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_actividades_participantes
    ADD CONSTRAINT uep_actividades_participantes_pkey PRIMARY KEY (par_id);


--
-- Name: uep_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_actividades
    ADD CONSTRAINT uep_actividades_pkey PRIMARY KEY (act_id);


--
-- Name: uep_mem_actividades_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_mem_actividades
    ADD CONSTRAINT uep_mem_actividades_pkey PRIMARY KEY (acs_id);


--
-- Name: uep_mem_acuerdos_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_mem_acuerdos
    ADD CONSTRAINT uep_mem_acuerdos_pkey PRIMARY KEY (acu_id);


--
-- Name: uep_mem_areas_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_mem_areas
    ADD CONSTRAINT uep_mem_areas_pkey PRIMARY KEY (are_id);


--
-- Name: uep_memorias_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_memorias
    ADD CONSTRAINT uep_memorias_pkey PRIMARY KEY (mem_id);


--
-- Name: uep_per_desarrollo_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_per_desarrollo
    ADD CONSTRAINT uep_per_desarrollo_pkey PRIMARY KEY (des_id);


--
-- Name: uep_per_objetivos_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_per_objetivos
    ADD CONSTRAINT uep_per_objetivos_pkey PRIMARY KEY (obj_id);


--
-- Name: uep_perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY uep_perfiles
    ADD CONSTRAINT uep_perfiles_pkey PRIMARY KEY (per_id);


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
-- Name: c22_capacitaciones_mod_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_capacitaciones
    ADD CONSTRAINT c22_capacitaciones_mod_id_fkey FOREIGN KEY (mod_id) REFERENCES c22_modalidades(mod_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: c22_cxp_inscritos_cxp_cap_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_cxp_inscritos
    ADD CONSTRAINT c22_cxp_inscritos_cxp_cap_id_fkey FOREIGN KEY (cxp_cap_id) REFERENCES c22_capacitaciones(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: c22_cxp_inscritos_cxp_par_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_cxp_inscritos
    ADD CONSTRAINT c22_cxp_inscritos_cxp_par_id_fkey FOREIGN KEY (cxp_par_id) REFERENCES c22_participantes(par_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: c22_cxp_solicitud_cap_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_cxp_solicitud
    ADD CONSTRAINT c22_cxp_solicitud_cap_id_fkey FOREIGN KEY (cap_id) REFERENCES c22_capacitaciones(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: c22_cxp_solicitud_par_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c22_cxp_solicitud
    ADD CONSTRAINT c22_cxp_solicitud_par_id_fkey FOREIGN KEY (par_id) REFERENCES c22_participantes(par_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: c24_user_depto_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY c24_user_depto
    ADD CONSTRAINT c24_user_depto_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE RESTRICT ON DELETE CASCADE;


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
-- Name: fk_asis_ccc_reference_ccc_con; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_ccc
    ADD CONSTRAINT fk_asis_ccc_reference_ccc_con FOREIGN KEY (ccc_con_id) REFERENCES ccc_con(ccc_con_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asis_cm_reference_comision; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_cm
    ADD CONSTRAINT fk_asis_cm_reference_comision FOREIGN KEY (cm_id) REFERENCES comision_mant(cm_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_asis_etm_reference_etm; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asis_etm
    ADD CONSTRAINT fk_asis_etm_reference_etm FOREIGN KEY (etm_id) REFERENCES etm(etm_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
-- Name: fk_ccc_con_reference_ccc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY ccc_con
    ADD CONSTRAINT fk_ccc_con_reference_ccc FOREIGN KEY (ccc_id) REFERENCES ccc(ccc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_ccc_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY ccc
    ADD CONSTRAINT fk_ccc_reference_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_comentar_reference_cc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comentario_publico_cc
    ADD CONSTRAINT fk_comentar_reference_cc FOREIGN KEY (cc_id) REFERENCES cc(cc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_comentar_reference_ccc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comentario_publico_ccc
    ADD CONSTRAINT fk_comentar_reference_ccc FOREIGN KEY (ccc_id) REFERENCES ccc(ccc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_comision_reference_ccc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY comision_mant
    ADD CONSTRAINT fk_comision_reference_ccc FOREIGN KEY (ccc_id) REFERENCES ccc(ccc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
-- Name: fk_etm_reference_ccc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY etm
    ADD CONSTRAINT fk_etm_reference_ccc FOREIGN KEY (ccc_id) REFERENCES ccc(ccc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
-- Name: fk_municipio_gestion_seguimiento; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY gestion_seguimiento
    ADD CONSTRAINT fk_municipio_gestion_seguimiento FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: fk_region_user; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_region_user FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE SET NULL ON DELETE SET NULL;


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
-- Name: fk_subproy__reference_ccc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY subproy_segui
    ADD CONSTRAINT fk_subproy__reference_ccc FOREIGN KEY (ccc_id) REFERENCES ccc(ccc_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
-- Name: uep_actividades_ars_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_actividades
    ADD CONSTRAINT uep_actividades_ars_id_fkey FOREIGN KEY (ars_id) REFERENCES uep_act_area(ars_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_actividades_cat_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_actividades
    ADD CONSTRAINT uep_actividades_cat_id_fkey FOREIGN KEY (cat_id) REFERENCES uep_act_actividades(cat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_actividades_participantes_par_act_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_actividades_participantes
    ADD CONSTRAINT uep_actividades_participantes_par_act_id_fkey FOREIGN KEY (par_act_id) REFERENCES uep_actividades(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_mem_actividades_acs_mem_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_mem_actividades
    ADD CONSTRAINT uep_mem_actividades_acs_mem_id_fkey FOREIGN KEY (acs_mem_id) REFERENCES uep_memorias(mem_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_mem_acuerdos_acu_mem_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_mem_acuerdos
    ADD CONSTRAINT uep_mem_acuerdos_acu_mem_id_fkey FOREIGN KEY (acu_mem_id) REFERENCES uep_memorias(mem_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_memorias_mem_area_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_memorias
    ADD CONSTRAINT uep_memorias_mem_area_fkey FOREIGN KEY (mem_area) REFERENCES uep_mem_areas(are_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_per_desarrollo_des_per_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_per_desarrollo
    ADD CONSTRAINT uep_per_desarrollo_des_per_id_fkey FOREIGN KEY (des_per_id) REFERENCES uep_perfiles(per_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: uep_per_objetivos_obj_per_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY uep_per_objetivos
    ADD CONSTRAINT uep_per_objetivos_obj_per_id_fkey FOREIGN KEY (obj_per_id) REFERENCES uep_perfiles(per_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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

