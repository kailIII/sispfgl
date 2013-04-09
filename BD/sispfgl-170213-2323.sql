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
    act_codigo character varying(10) NOT NULL,
    act_descripcion text NOT NULL
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
-- Name: aporte_municipal; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE aporte_municipal (
    aporte_municipal_id integer NOT NULL,
    aporte_estimado numeric(12,2) DEFAULT 0.0,
    fecha_aporte date NOT NULL,
    observaciones character varying(250),
    mun_id integer
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

ALTER SEQUENCE aporte_municipal_aporte_municipal_id_seq OWNED BY aporte_municipal.aporte_municipal_id;


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
    pro_id integer,
    com_codigo character varying(10),
    com_nombre character varying(100) NOT NULL,
    com_objetivo text,
    com_resultado text
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
    pro_pep_id integer NOT NULL,
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
    aporte_municipal_id integer NOT NULL,
    valor_hubo_aporte boolean NOT NULL
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
    pro_pep_id integer NOT NULL
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
    mun_presupuesto numeric(6,2),
    cons_id integer
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
-- Name: nombrefecha_procesoetapa; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE nombrefecha_procesoetapa (
    pro_eta_id integer NOT NULL,
    nom_fec_apr_id integer NOT NULL,
    nomfec_proeta_valor date
);


ALTER TABLE public.nombrefecha_procesoetapa OWNER TO sispfgl;

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
    par_sexo character(1) NOT NULL,
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
    int_ins_id integer
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
-- Name: rol; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE rol (
    rol_id integer NOT NULL,
    rol_nombre character varying(25) NOT NULL,
    rol_descripcion character varying(100)
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
-- Name: sector; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE sector (
    sec_id integer NOT NULL,
    sec_nombre character varying(50)
);


ALTER TABLE public.sector OWNER TO sispfgl;

--
-- Name: seleccion_comite; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE seleccion_comite (
    sel_com_id integer NOT NULL,
    sel_com_fverificacion date,
    sel_com_seleccionado character varying(2),
    sel_com_ruta_archivo character varying(255),
    sel_com_observacion character varying(255),
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
    rol_id integer NOT NULL
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
-- Name: aporte_municipal_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY aporte_municipal ALTER COLUMN aporte_municipal_id SET DEFAULT nextval('aporte_municipal_aporte_municipal_id_seq'::regclass);


--
-- Name: are_dim_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY area_dimension ALTER COLUMN are_dim_id SET DEFAULT nextval('area_dimension_are_dim_id_seq'::regclass);


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

ALTER TABLE ONLY capacitacion ALTER COLUMN cap_id SET DEFAULT nextval('capacitacion_cap_id_seq'::regclass);


--
-- Name: com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente ALTER COLUMN com_id SET DEFAULT nextval('componente_com_id_seq'::regclass);


--
-- Name: comp_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a ALTER COLUMN comp_id SET DEFAULT nextval('componente24a_comp_id_seq'::regclass);


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
-- Name: per_enl_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY personal_enlace ALTER COLUMN per_enl_id SET DEFAULT nextval('personal_enlace_per_enl_id_seq'::regclass);


--
-- Name: pes_pro_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY pestania_proceso ALTER COLUMN pes_pro_id SET DEFAULT nextval('pestania_proceso_pes_pro_id_seq'::regclass);


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
-- Name: rol_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY rol ALTER COLUMN rol_id SET DEFAULT nextval('rol_rol_id_seq'::regclass);


--
-- Name: sel_com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY seleccion_comite ALTER COLUMN sel_com_id SET DEFAULT nextval('seleccion_comite_seleccion_comite_id_seq'::regclass);


--
-- Name: sol_asis_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY solicitud_asistencia ALTER COLUMN sol_asis_id SET DEFAULT nextval('solicitud_asistencia_sol_asis_id_seq'::regclass);


--
-- Name: tip_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo ALTER COLUMN tip_id SET DEFAULT nextval('tipo_tip_id_seq'::regclass);


--
-- Name: tip_act_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo_actor ALTER COLUMN tip_act_id SET DEFAULT nextval('tipo_actor_tip_act_id_seq'::regclass);


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

COPY actividad (act_id, com_id, act_act_id, act_codigo, act_descripcion) FROM stdin;
\.


--
-- Name: actividad_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividad_act_id_seq', 1, false);


--
-- Data for Name: actividades_epi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY actividades_epi (epi_id, act_id, act_nombre, act_fecha_ini, act_fecha_fin, act_estado, act_responsable, act_cargo, act_descripcion, act_recursos) FROM stdin;
3	1	dasdas	2013-01-11	2013-01-03	No iniciada	dasd	das	das	dasd
\.


--
-- Name: actividades_epi_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('actividades_epi_act_id_seq', 1, true);


--
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id, acu_mun_ruta_archivo, eta_id, acu_mun_fecha_observacion, acu_mun_fecha_borrador, acu_mun_fecha_aceptacion) FROM stdin;
3	\N	\N	\N	\N	33	\N	1	\N	\N	\N
\.


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 3, true);


--
-- Data for Name: aporte_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY aporte_municipal (aporte_municipal_id, aporte_estimado, fecha_aporte, observaciones, mun_id) FROM stdin;
\.


--
-- Name: aporte_municipal_aporte_municipal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('aporte_municipal_aporte_municipal_id_seq', 1, false);


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
\.


--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asociatividad_aso_id_seq', 33, true);


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
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) FROM stdin;
\.


--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 75, true);


--
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
44e53054b737be80e321ac4131743a79	::1	Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17	1361158925	
b1df7c91ed3dcedf298f9130e0b56d0e	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64; rv:10.0.12) Gecko/20100101 Firefox/10.0.12 Iceweasel/10.0.12	1361164749	a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"15";s:8:"username";s:7:"kpenate";s:6:"status";s:1:"1";}
\.


--
-- Data for Name: componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente (com_id, com_com_id, pro_id, com_codigo, com_nombre, com_objetivo, com_resultado) FROM stdin;
\.


--
-- Data for Name: componente24a; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente24a (comp_id, mun_id, fecha_cap, tema_cap, total_mujeres, total_hombres, fecha_instalacion, fecha_operacion, observaciones) FROM stdin;
1	1	2013-12-12	hola	12	12	2013-12-12	2013-12-12	no hay
\.


--
-- Name: componente24a_comp_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente24a_comp_id_seq', 1, true);


--
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente_com_id_seq', 1, false);


--
-- Name: consulta_cons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consulta_cons_id_seq', 8, true);


--
-- Data for Name: consultor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultor (con_id, con_nombre, con_apellido, con_telefono, con_email, pro_pep_id, cons_id, "user") FROM stdin;
2	Coordinador 1	Apellido Coordinado1	2276-1821	karensita_2410@hotmail.com	1	\N	ah01001
35	Karen	Peñate	6666-6666	kpenate@salud.gob.sv	33	\N	sa10193
4	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	2	\N	ah01004
5	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	3	\N	ah01005
6	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	4	\N	ah01012
7	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	5	\N	so13224
8	Coordinador 1	Apellido Coordinado1	7777-7777	karensita_2410@hotmail.com	6	\N	so13226
9	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	7	\N	so13232
10	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	8	\N	an12220
11	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	9	\N	an12218
12	Coordinador 1	Apellido Coordinado1	8888-8888	karensita_2410@hotmail.com	10	\N	an12221
13	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	11	\N	sa10197
14	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	12	\N	sa10185
15	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	13	\N	li05076
16	Coordinador 1	Apellido Coordinado1	1236-5478	karensita_2410@hotmail.com	14	\N	ch03037
17	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	15	\N	ch03046
18	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	16	\N	ch03031
19	Coordinador 1	Apellido Coordinado1	3333-3333	karensita_2410@hotmail.com	17	\N	ch03052
20	Coordinador 1	Apellido Coordinado1	7777-7777	karensita_2410@hotmail.com	18	\N	pa06114
21	Coordinador 1	Apellido Coordinado1	3333-3333	karensita_2410@hotmail.com	19	\N	cu04058
22	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	20	\N	vi11209
23	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	21	\N	us14251
24	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	22	\N	mi09169
25	Coordinador 1	Apellido Coordinado1	2222-2222	karensita_2410@hotmail.com	23	\N	mi09159
26	Coordinador 1	Apellido Coordinado1	5555-5555	karensita_2410@hotmail.com	24	\N	mo08142
27	Coordinador 1	Apellido Coordinado1	6666-6666	karensita_2410@hotmail.com	25	\N	mo08136
28	Coordinador 1	Apellido Coordinado1	8888-8888	karensita_2410@hotmail.com	26	\N	mi09161
29	Coordinador 1	Apellido Coordinado1	1111-1111	karensita_2410@hotmail.com	27	\N	mi09178
30	Coordinador 1	Apellido Coordinado1	4444-4444	karensita_2410@hotmail.com	28	\N	mi09165
31	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	29	\N	un07129
32	Coordinador 1	Apellido Coordinado1	9999-9999	karensita_2410@hotmail.com	30	\N	un07124
\.


--
-- Name: consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultor_con_id_seq', 35, true);


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
\.


--
-- Data for Name: consultores_interes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultores_interes (con_int_id, con_int_tipo, con_int_aplica, con_int_seleccionada, pro_id, cons_id) FROM stdin;
11	Empresa	Si	Si	10	7
13	Empresa	Si	No	10	1
\.


--
-- Name: consultores_interes_con_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultores_interes_con_int_id_seq', 13, true);


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
3	1	\N	\N
3	3	\N	\N
3	5	\N	\N
3	2	\N	\N
3	6	\N	\N
3	4	\N	\N
\.


--
-- Data for Name: contrapartida_aporte; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida_aporte (con_id, aporte_municipal_id, valor_hubo_aporte) FROM stdin;
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
1	3	\N
2	3	\N
3	3	\N
4	3	\N
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
\.


--
-- Data for Name: criterio_integracion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_integracion (cri_id, int_ins_id, cri_int_valor) FROM stdin;
\.


--
-- Data for Name: criterio_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_reunion (cri_id, reu_id, cri_reu_valor) FROM stdin;
\.


--
-- Data for Name: cumplimiento_diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) FROM stdin;
3	13	\N
3	14	\N
3	15	\N
3	16	\N
3	17	\N
3	18	\N
3	19	\N
3	20	\N
3	21	\N
3	22	\N
\.


--
-- Data for Name: cumplimiento_informe; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) FROM stdin;
8	1	\N
8	2	\N
8	3	\N
8	4	\N
8	5	\N
8	6	\N
8	7	\N
8	8	\N
8	9	\N
8	10	\N
8	11	\N
8	12	\N
7	1	\N
7	2	\N
7	3	\N
7	4	\N
7	5	\N
7	6	\N
7	7	\N
7	8	\N
7	9	\N
7	10	\N
7	11	\N
7	12	\N
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
33	23	\N
33	24	\N
33	25	\N
33	26	\N
33	27	\N
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
\.


--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 1, true);


--
-- Data for Name: definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY definicion (def_id, def_fecha, def_ruta_archivo, pro_pep_id, def_observacion) FROM stdin;
\.


--
-- Name: definicion_def_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('definicion_def_id_seq', 4, true);


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
\.


--
-- Name: departamento_dep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('departamento_dep_id_seq', 1, false);


--
-- Data for Name: detmonto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY detmonto_proyeccion (dmon_pro_id, dmon_pro_ingresos, dmon_pro_anio, dmon_pro_correlativo, mon_pro_id) FROM stdin;
\.


--
-- Name: detmonto_proyeccion_dmon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('detmonto_proyeccion_dmon_pro_id_seq', 1, false);


--
-- Data for Name: diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY diagnostico (dia_id, dia_fecha_borrador, dia_fecha_observacion, dia_fecha_concejo_muni, dia_vision, dia_observacion, dia_ruta_archivo, pro_pep_id) FROM stdin;
3	\N	\N	\N	\N			33
\.


--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('diagnostico_dia_id_seq', 3, true);


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
-- Data for Name: epi; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY epi (epi_id, epi_nombre) FROM stdin;
3	Plan-3-Elaborado el: 11-01-2013
4	Plan-4-Elaborado el: 11-01-2013
5	Plan-5-Elaborado el: 11-01-2013
6	Plan-6-Elaborado el: 11-01-2013
\.


--
-- Name: epi_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('epi_seq', 6, true);


--
-- Data for Name: estrategia_comunicacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY estrategia_comunicacion (est_com_id, est_com_observacion, pro_pep_id) FROM stdin;
\.


--
-- Name: estrategia_inversion_est_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('estrategia_inversion_est_inv_id_seq', 1, true);


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
\.


--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('facilitador_fac_id_seq', 1, true);


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
\.


--
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('fuente_secundaria_fue_sec_id_seq', 1, true);


--
-- Data for Name: grupo_apoyo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_apoyo (gru_apo_id, gru_apo_fecha, gru_apo_c3, gru_apo_c4, gru_apo_observacion, pro_pep_id, gru_apo_lugar) FROM stdin;
\.


--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_apoyo_gru_apo_id_seq', 1, true);


--
-- Data for Name: grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_gestor (gru_ges_id, gru_ges_lugar, gru_ges_observacion, gru_ges_acuerdo, pro_pep_id, gru_ges_fecha) FROM stdin;
\.


--
-- Name: grupo_gestor_gru_ges_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_gestor_gru_ges_id_seq', 1, true);


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
-- Data for Name: informe_preliminar; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY informe_preliminar (inf_pre_id, inf_pre_fecha_borrador, inf_pre_fecha_observacion, inf_pre_aceptacion, inf_pre_firmam, inf_pre_firmai, inf_pre_firmau, inf_pre_observacion, pro_pep_id, inf_pre_ruta_archivo, inf_pre_aceptada) FROM stdin;
8	\N	\N	\N	\N	\N	\N		1		\N
7	\N	\N	\N	\N	\N	\N		33		\N
\.


--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 10, true);


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
\.


--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integracion_instancia_int_ins_id_seq', 2, true);


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
\.


--
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('inventario_informacion_inv_inf_id_seq', 2, true);


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
\.


--
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('login_attempts_id_seq', 30, true);


--
-- Data for Name: monto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY monto_proyeccion (mon_pro_id, mon_pro_nombre, mon_pro_dispo_financiera, mon_pro_ingresos, mon_pro_anio, pro_ing_id, mon_pro_idnombre) FROM stdin;
\.


--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('monto_proyeccion_mon_pro_id_seq', 44, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio (mun_id, dep_id, mun_nombre, mun_presupuesto, cons_id) FROM stdin;
7	1	Apaneca	\N	\N
8	1	San Francisco Menendez	\N	\N
9	1	San Lorenzo	\N	\N
10	1	San Pedro Puxtla	\N	\N
11	1	Tacuba	\N	\N
12	1	Turin	\N	\N
13	2	Cinquera	\N	\N
14	2	Villa Dolores	\N	\N
15	2	Guacotecti	\N	\N
16	2	Ilobasco	\N	\N
17	2	Jutiapa	\N	\N
18	2	San Isidro	\N	\N
19	2	Sensuntepeque	\N	\N
20	2	Ciudad de Tejutepeque	\N	\N
21	2	Victoria	\N	\N
24	3	Azacualpa	\N	\N
26	3	Citala	\N	\N
27	3	Comalapa	\N	\N
28	3	Concepcion Quezaltepeque	\N	\N
29	3	Dulce Nombre de Maria	\N	\N
30	3	El Carrizal	\N	\N
31	3	El Paraiso	\N	\N
32	3	La Laguna	\N	\N
33	3	La Palma	\N	\N
34	3	La Reina	\N	\N
35	3	Las Vueltas	\N	\N
36	3	Nombre de Jesus	\N	\N
37	3	Nueva Concepcion	\N	\N
38	3	Nueva Trinidad	\N	\N
39	3	Ojos de Agua	\N	\N
40	3	Potonico	\N	\N
41	3	San Antonio de la Cruz	\N	\N
42	3	San Antonio Los Ranchos	\N	\N
43	3	San Fernando	\N	\N
44	3	San Francisco Lempa	\N	\N
45	3	San Francisco Morazan	\N	\N
46	3	San Ignacio	\N	\N
47	3	San Isidro Labrador	\N	\N
48	3	San Jose Cancasque	\N	\N
49	3	San Jose Las Flores	\N	\N
50	3	San Luis del Carmen	\N	\N
51	3	San Miguel de Mercedes	\N	\N
52	3	San Rafael	\N	\N
53	3	Santa Rita	\N	\N
54	3	Tejutla	\N	\N
55	4	Candelaria	\N	\N
56	4	Cojutepeque	\N	\N
57	4	El Carmen	\N	\N
58	4	El Rosario	\N	\N
59	4	Monte San Juan	\N	\N
60	4	Oratorio de Concepcion	\N	\N
61	4	San Bartolome Perulapia	\N	\N
62	4	San Cristobal	\N	\N
63	4	San Jose Guayabal	\N	\N
64	4	San Pedro Perulapan	\N	\N
65	4	San Rafael Cedros	\N	\N
66	4	San Ramon	\N	\N
67	4	Santa Cruz Analquito	\N	\N
68	4	Santa Cruz Michapa	\N	\N
69	4	Suchitoto	\N	\N
70	4	Tenancingo	\N	\N
71	5	Antiguo Cuscatlan	\N	\N
72	5	Chiltiupan	\N	\N
73	5	Ciudad Arce	\N	\N
74	5	Colon	\N	\N
75	5	Comasagua	\N	\N
76	5	Huizucar	\N	\N
77	5	Jayaque	\N	\N
78	5	Jicalapa	\N	\N
79	5	La Libertad	\N	\N
80	5	Nueva San Salvador	\N	\N
81	5	Nuevo Cuscatlan	\N	\N
82	5	Opico	\N	\N
83	5	Quezaltepeque	\N	\N
84	5	Sacacoyo	\N	\N
85	5	San Jose Villanueva	\N	\N
86	5	San Matias	\N	\N
87	5	San Pablo Tacachico	\N	\N
88	5	Talnique	\N	\N
89	5	Tamanique	\N	\N
90	5	Teotepeque	\N	\N
91	5	Tepecoyo	\N	\N
92	5	Zaragoza	\N	\N
93	6	Cuyultitan	\N	\N
94	6	El Rosario	\N	\N
95	6	Jerusalen	\N	\N
96	6	Mercedes La Ceiba	\N	\N
97	6	Olocuilta	\N	\N
98	6	Paraiso de Osorio	\N	\N
99	6	San Antonio Masahuat	\N	\N
100	6	San Emigdio	\N	\N
101	6	San Francisco Chinameca	\N	\N
102	6	San Juan Nonualco	\N	\N
103	6	San Juan Talpa	\N	\N
104	6	San Juan Tepezontes	\N	\N
105	6	San Luis La Herradura	\N	\N
106	6	San Luis Talpa	\N	\N
107	6	San Miguel Tepezontes	\N	\N
108	6	San Pedro Masahuat	\N	\N
109	6	San Pedro Nonualco	\N	\N
110	6	San Rafael Obrajuelo	\N	\N
111	6	Santa Maria Ostuma	\N	\N
112	6	Santiago Nonualco	\N	\N
113	6	Tapalhuaca	\N	\N
114	6	Zacatecoluca	\N	\N
115	7	Anamoros	\N	\N
116	7	Bolivar	\N	\N
117	7	Concepcion de Oriente	\N	\N
118	7	Conchagua	\N	\N
119	7	El Carmen	\N	\N
120	7	El Sauce	\N	\N
121	7	Intipuca	\N	\N
122	7	La Union	\N	\N
123	7	Lislique	\N	\N
124	7	Meanguera del Golfo	\N	\N
125	7	Nueva Esparta	\N	\N
126	7	Pasaquina	\N	\N
127	7	Poloros	\N	\N
128	7	San Alejo	\N	\N
130	7	Santa Rosa de Lima	\N	\N
131	7	Yayantique	\N	\N
132	7	Yucuayquin	\N	\N
133	8	Arambala	\N	\N
134	8	Cacaopera	\N	\N
135	8	Chilanga	\N	\N
136	8	Corinto	\N	\N
137	8	Delicias de Concepcion	\N	\N
138	8	El Divisadero	\N	\N
139	8	El Rosario	\N	\N
140	8	Gualococti	\N	\N
141	8	Guatajiagua	\N	\N
142	8	Joateca	\N	\N
143	8	Jocoaitique	\N	\N
144	8	Jocoro	\N	\N
145	8	Lolotiquillo	\N	\N
146	8	Meanguera	\N	\N
147	8	Osicala	\N	\N
148	8	Perquin	\N	\N
149	8	San Carlos	\N	\N
150	8	San Fernando	\N	\N
151	8	San Francisco Gotera	\N	\N
152	8	San Isidro	\N	\N
1	1	Ahuachapan	\N	1
2	1	Jujutla	\N	1
3	1	Atiquizaya	\N	1
6	1	Guaymango	\N	\N
5	1	El Refugio	\N	1
22	3	Agua Caliente	\N	\N
25	3	Chalatenango	\N	\N
23	3	Arcatao	\N	\N
153	8	San Simon	\N	\N
154	8	Sensembra	\N	\N
155	8	Sociedad	\N	\N
156	8	Torola	\N	\N
157	8	Yamabal	\N	\N
158	8	Yoloaiquin	\N	\N
159	9	Carolina	\N	\N
160	9	Chapeltique	\N	\N
161	9	Chinameca	\N	\N
162	9	Chirilagua	\N	\N
163	9	Ciudad Barrios	\N	\N
164	9	Comacaran	\N	\N
165	9	El Transito	\N	\N
166	9	Lolotique	\N	\N
167	9	Moncagua	\N	\N
168	9	Nueva Guadalupe	\N	\N
169	9	Nuevo Eden de San Juan	\N	\N
170	9	Quelepa	\N	\N
171	9	San Antonio	\N	\N
172	9	San Gerardo	\N	\N
173	9	San Jorge	\N	\N
174	9	San Luis de la Reina	\N	\N
175	9	San Miguel	\N	\N
176	9	San Rafael	\N	\N
177	9	Sesori	\N	\N
178	9	Uluazapa	\N	\N
180	10	Apopa	\N	\N
181	10	Ayutuxtepeque	\N	\N
182	10	Cuscatancingo	\N	\N
183	10	Delgado	\N	\N
184	10	El Paisnal	\N	\N
185	10	Guazapa	\N	\N
186	10	Ilopango	\N	\N
187	10	Mejicanos	\N	\N
188	10	Nejapa	\N	\N
189	10	Panchimalco	\N	\N
190	10	Rosario de Mora	\N	\N
191	10	San Marcos	\N	\N
192	10	San Martin	\N	\N
193	10	San Salvador	\N	\N
194	10	Santiago Texacuangos	\N	\N
195	10	Santo Tomas	\N	\N
196	10	Soyapango	\N	\N
197	10	Tonacatepeque	\N	\N
198	11	Apastepeque	\N	\N
199	11	Guadalupe	\N	\N
200	11	San Cayetano Istepeque	\N	\N
201	11	San Esteban Catarina	\N	\N
202	11	San Ildefonso	\N	\N
203	11	San Lorenzo	\N	\N
204	11	San Sebastian	\N	\N
205	11	Santa Clara	\N	\N
206	11	Santo Domingo	\N	\N
207	11	San Vicente	\N	\N
208	11	Tecoluca	\N	\N
209	11	Tepetitan	\N	\N
210	11	Verapaz	\N	\N
211	12	Candelaria de la Frontera	\N	\N
212	12	Chalchuapa	\N	\N
213	12	Coatepeque	\N	\N
214	12	El Congo	\N	\N
215	12	El Porvenir	\N	\N
216	12	Masahuat	\N	\N
217	12	Metapan	\N	\N
218	12	San Antonio Pajonal	\N	\N
219	12	San Sebastian Salitrillo	\N	\N
220	12	Santa Ana	\N	\N
221	12	Santa Rosa Guachipilin	\N	\N
222	12	Santiago de la Frontera	\N	\N
223	12	Texistepeque	\N	\N
224	13	Acajutla	\N	\N
225	13	Armenia	\N	\N
226	13	Caluco	\N	\N
227	13	Cuisnahuat	\N	\N
228	13	Izalco	\N	\N
229	13	Juayua	\N	\N
230	13	Nahuizalco	\N	\N
231	13	Nahulingo	\N	\N
232	13	Salcoatitan	\N	\N
233	13	San Antonio del Monte	\N	\N
234	13	San Julian	\N	\N
235	13	Santa Catarina Masahuat	\N	\N
236	13	Santa Isabel Ishuatan	\N	\N
237	13	Santo Domingo	\N	\N
238	13	Sonsonate	\N	\N
239	13	Sonzacate	\N	\N
240	14	Alegria	\N	\N
241	14	Berlin	\N	\N
242	14	California	\N	\N
243	14	Concepcion Batres	\N	\N
244	14	El Triunfo	\N	\N
245	14	Ereguayquin	\N	\N
246	14	Estanzuelas	\N	\N
247	14	Jiquilisco	\N	\N
248	14	Jucuapa	\N	\N
249	14	Jucuaran	\N	\N
250	14	Mercedes Umaña	\N	\N
251	14	Nueva Granada	\N	\N
252	14	Ozatlan	\N	\N
253	14	Puerto El Triunfo	\N	\N
254	14	San Agustin	\N	\N
255	14	San Buenaventura	\N	\N
256	14	San Dionisio	\N	\N
257	14	San Francisco Javier	\N	\N
258	14	Santa Elena	\N	\N
259	14	Santa Maria	\N	\N
260	14	Santiago de Maria	\N	\N
261	14	Tecapan	\N	\N
262	14	Usulutan	\N	\N
129	7	San José la Fuente	\N	\N
4	1	Concepcion de Ataco	\N	\N
179	10	Aguilares	\N	\N
\.


--
-- Data for Name: municipio_componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio_componente (com_id, mun_id, mun_com_asignacion) FROM stdin;
\.


--
-- Name: municipio_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('municipio_mun_id_seq', 1, false);


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
-- Data for Name: nombrefecha_procesoetapa; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY nombrefecha_procesoetapa (pro_eta_id, nom_fec_apr_id, nomfec_proeta_valor) FROM stdin;
20	5	\N
20	4	\N
20	3	\N
20	2	\N
20	1	\N
17	5	\N
17	4	\N
17	3	\N
17	2	\N
17	1	\N
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
23	Informe Preliminar	componente2/comp23_E1/InformePreliminar	60	1
36	Elementos Mínimos Diagnóstico	componente2/comp23_E2/diagnostico	60	2
38	Cumplimientos Mínimos PEP	componente2/comp23_E3/cumplimientosMinimos	60	3
64	Plan de trabajo	componente2/comp23_E0/planTrabajoConsultora	61	4
62	Criterios Manual Operativo	componente2/comp23_E0/gestionCriterios	61	1
22	Proyecto Pep	componente2/proyectoPep	17	2
65	Comité Interinstitucional	componente2/comp23_E0/comiteInterinstitucional	61	5
66	Aporte Municipal	componente2/comp23_E0/registroAporteMunicipal	61	6
61	Etapa 0	componente2/comp23_E0/gestionCriterios	\N	1
60	Revisión de productos	componente2/comp23/revisionProducto	\N	3
54	Proceso Administrativo PEP	componente2/procesoAdministrativo	\N	2
48	Elaboracion de Plan Piloto	componente3/componente3/elab_plan_imp	45	\N
67	Componente 2.4	componente2/comp24/	\N	5
68	Etapa 0	componente2/comp24_E0	67	1
69	Etapa 1	componente2/comp24_E1	67	2
70	Etapa 2	componente2/comp24_E2	67	3
71	Etapa 3	componente2/comp24_E3	67	4
72	Etapa 4	componente2/comp24_E4	67	5
73	Final	componente2/comp24_Final	67	7
74	Solicitud de Ayuda	componente2/comp24_E0/solicitudAyuda	68	1
75	Acuerdo Municipal	componente2/comp24_E0/acuerdoMunicipal	68	2
76	Solicitud de Asistencia Tecnica	componente2/comp24_E0/solicitudAsistenciaTecnica	68	3
63	Solicitud Asistencia	componente2/comp23_E0/gestionsolicitudAsistencia	61	2
77	Indicadores de Desempeño  Administrativo	componente2/comp24_E0/indicadoresDesempenoAdmin	68	4
78	Indicadores de Desempleño Administrativo	componente2/comp24_E0/E	68	5
79	Indicadores de Desempeño Administrativo	componente2/comp24_E0/F	68	6
80	Perfil de Municipio	componente2/comp24_E0/perfilMunicipio	68	7
81	Perfil Municipio	componente2/comp24_E0/H	68	8
82	Perfil Municipio	componente2/comp24_E0/I	68	9
83	Revicion y Aprovacion de Productos	componente2/comp24_E1/	69	1
84	Revicion y Aprobacion de Productos	componente2/comp24_E2/	70	1
85	Aprobacion e Implementacion	componente2/comp24_E3/aprobacionImplementacion	71	1
86	Aprobacion de Perfil y TDR	componente2/comp24_E3/B	71	2
87	Recepcion de productos del plan	componente2/comp24/E3/C	71	3
88	Informe de Resultados	componente2/com24/E3/D	71	4
89	Gestion de Conocimiento	componentee2/comp24/E4/gestionConocimiento	72	1
90	Capacitación al concejo municipal.png	componente2/comp24-E4/capacitacionConcejoMunicipal	72	2
91	Gestion de Riesgos	componente2/comp24-Final/gestionRiesgos	73	1
95	Integración Grupos	componente2/comp23_E0/integracionDeGrupos	61	3
\.


--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 95, true);


--
-- Data for Name: participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo, int_ins_id) FROM stdin;
2	\N	4	2	\N	\N	fdfa	fdadf	M	fdafd	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_capacitacion (par_id, cap_id, par_cap_participa, par_cap_id) FROM stdin;
\.


--
-- Name: participante_capacitacion_par_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_capacitacion_par_cap_id_seq', 27, true);


--
-- Data for Name: participante_definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_definicion (par_id, def_id, par_def_participa) FROM stdin;
\.


--
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_par_id_seq', 2, true);


--
-- Data for Name: participante_priorizacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_priorizacion (par_id, pri_id, par_pri_participa) FROM stdin;
\.


--
-- Data for Name: participante_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_reunion (par_id, reu_id, par_reu_participa) FROM stdin;
2	7	\N
2	8	\N
\.


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
-- Data for Name: plan_inversion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_inversion (pla_inv_id, pla_inv_observacion, pro_pep_id) FROM stdin;
\.


--
-- Name: plan_inversion_pla_inv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_inversion_pla_inv_id_seq', 2, true);


--
-- Data for Name: plan_trabajo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY plan_trabajo (pla_tra_id, pla_tra_forden_inicio, pla_tra_fentrega_plan, pla_tra_frecepcion_obs, pla_tra_fsuperacion_obs, pla_tra_fvisto_bueno, pla_tra_fpresentacion, pla_tra_frecepcion, pla_tra_firmada_mun, pla_tra_firmada_isdem, pla_tra_firmada_uep, mun_id, pla_tra_ruta_archivo, pla_tra_observaciones) FROM stdin;
2	2013-02-01	2013-02-04	2013-02-05	2013-02-06	2013-02-07	2013-02-08	2013-02-11	f	t	f	1	documentos/plan_trabajo/plan_trabajo2.pdf	
\.


--
-- Name: plan_trabajo_plan_trab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('plan_trabajo_plan_trab_id_seq', 2, true);


--
-- Name: poblacion_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('poblacion_pro_id_seq', 27, true);


--
-- Data for Name: poblacion_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY poblacion_reunion (pob_id, pob_comunidad, pob_sector, pob_institucion, reu_id) FROM stdin;
\.


--
-- Data for Name: portafolio_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY portafolio_proyecto (por_pro_id, por_pro_area, por_pro_tema, por_pro_nombre, por_pro_descripcion, por_pro_ubicacion, por_pro_costo_estimado, por_pro_fecha_desde, por_pro_fecha_hasta, por_pro_beneficiario_h, por_pro_beneficiario_m, por_pro_observacion, por_pro_ruta_archivo, pro_pep_id, por_pro_anio1, por_pro_anio2, por_pro_anio3, por_pro_anio4, por_pro_anio5) FROM stdin;
\.


--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('portafolio_proyecto_por_pro_id_seq', 1, true);


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
\.


--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('priorizacion_pri_id_seq', 1, true);


--
-- Data for Name: problema_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY problema_identificado (pro_ide_id, pro_ide_tema, pro_ide_problema, pro_ide_prioridad, are_dim_id, reu_id, def_id) FROM stdin;
\.


--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('problema_identificado_pro_ide_id_seq', 1, true);


--
-- Data for Name: proceso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proceso (pro_id, pro_numero, pro_fpublicacion, pro_faclara_dudas, pro_fexpresion_interes, pro_observacion1, pro_pub_ruta_archivo, pro_exp_ruta_archivo, pro_finicio, pro_ffinalizacion, pro_fenvio_informacion, pro_flimite_recepcion, pro_fsolicitud, pro_frecepcion, pro_fcierre_negociacion, pro_ffirma_contrato, mun_id, pro_faperturatecnica, pro_faperturafinanciera, pro_observacion2) FROM stdin;
10	123456	2013-02-01	2013-02-02	2013-02-03	0			2013-02-04	2013-02-11	2013-02-12	2013-02-15	2013-02-18	2013-02-19	2013-02-22	2013-02-25	193	2013-02-20	2013-02-21	
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
\.


--
-- Name: proceso_etapa_pro_eta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_etapa_pro_eta_id_seq', 21, true);


--
-- Name: proceso_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proceso_pro_id_seq', 16, true);


--
-- Data for Name: proyeccion_ingreso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyeccion_ingreso (pro_ing_id, pro_ing_observacion, pro_pep_id) FROM stdin;
\.


--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyeccion_ingreso_pro_ing_id_seq', 1, true);


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto (pro_id, mun_id, com_id, pro_codigo, pro_nombre, pro_num_ord_llegada, pro_zona_fisdl, pro_nom_formulador, pro_nom_ref_tec_municipal, pro_email_ref_tec_municipal, pro_tel_ref_tec_municipal, pro_nom_ase_fisdl, pro_email_ase_fisdl, pro_tel_ase_fisdl, pro_fec_ent_gl_fisdl, pro_fec_ent_gop_gpr, pro_rec_gpr, pro_fec_ent_gpr_din, pro_estatus, pro_mon_ejecucion, pro_fec_visita, pro_num_rev, pro_fec_visado, pro_mon_visado, pro_obs_din, pro_tipologia, pro_sal_par_ciudadana, pro_sal_pue_indigenas, pro_sal_rea_involuntario) FROM stdin;
\.


--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"proyecto_Pep_pro_pep_id_seq"', 33, true);


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
3	Proyecto PEP El Refugio	5	\N	\N	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
4	Proyecto PEP Turín	12	\N	\N	\N	6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
5	Proyecto PEP Acajutla 	224	\N	\N	\N	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6	Caluco	226	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	Salcoatitan	232	\N	\N	\N	9	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
8	Santa Ana	220	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9	San Antonio Pajonal	218	\N	\N	\N	11	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
10	Santa Rosa Guachipilín	221	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
11	Tonacatepeque	197	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
12	Guazapa	185	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
13	Huizúcar	76	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
14	Nueva Concepción	37	\N	\N	\N	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
15	San Ignacio 	46	\N	\N	\N	17	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
16	El Paraíso	31	\N	\N	\N	18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
17	San Rafael	52	\N	\N	\N	19	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
18	Zacatecoluca	114	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
19	El Rosario	58	\N	\N	\N	21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
20	Tepetitán	209	\N	\N	\N	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
21	Nueva Granada	251	\N	\N	\N	23	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
22	Nuevo Edén de San Juan	169	\N	\N	\N	24	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
23	Carolina	159	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
24	Joateca	142	\N	\N	\N	26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
25	Corinto	136	\N	\N	\N	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
26	Chinameca	161	\N	\N	\N	28	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
27	Uluazapa	178	\N	\N	\N	29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
28	El Transito	165	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
29	San José la Fuente	129	\N	\N	\N	31	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
30	Meanguera del Golfo	124	\N	\N	\N	32	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	Proyecto Pep Ahuachapán	1	8	\N	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
33	proyecto pep	193	\N	\N	\N	35	\N	\N	\N	3	\N	\N	\N	\N	\N	\N			\N	\N	\N	\N
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
\.


--
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY reunion (reu_id, eta_id, reu_numero, reu_fecha, reu_duracion_horas, reu_tema, reu_resultado, reu_observacion, pro_pep_id, reu_duracion_minutos) FROM stdin;
4	1	1	2013-02-05	2	fdafdf	fdafdf	fdasfdf	33	30
8	3	1	2013-02-06	3	FFFFFFFFF	0		33	10
\.


--
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 8, true);


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol (rol_id, rol_nombre, rol_descripcion) FROM stdin;
3	consultor	Este rol representa al consultor
1	administrador	Este rol representa al administrador del sistema
4	subsecretaria	Rol para la subsecretaria de desarrollo territorial.
5	ISDEM	Rol para usuarios ISDEM
7	asesorMunicipal	Rol que manejará las opciones el asesor municipal
8	temporal	Usuario temporal para pruebas
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
4	45
4	46
4	47
4	48
4	49
4	50
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
3	67
3	68
3	69
3	70
3	71
3	72
3	73
3	74
3	77
3	78
3	79
3	80
3	81
3	82
3	83
3	84
3	85
3	86
3	87
3	88
3	89
3	90
3	91
5	95
5	17
5	19
5	20
5	22
\.


--
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rol_rol_id_seq', 8, true);


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
-- Data for Name: seleccion_comite; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY seleccion_comite (sel_com_id, sel_com_fverificacion, sel_com_seleccionado, sel_com_ruta_archivo, sel_com_observacion, sol_asis_id) FROM stdin;
2	\N	\N	\N	\N	3
\.


--
-- Name: seleccion_comite_seleccion_comite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('seleccion_comite_seleccion_comite_id_seq', 2, true);


--
-- Data for Name: solicitud_asistencia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY solicitud_asistencia (sol_asis_id, nombre_solicitante, cargo, telefono, sol_asis_ruta_archivo, mun_id, c1, c2, sel_com_id, fecha_solicitud, comentarios) FROM stdin;
3	Karen Peñate	Programadora	5555-5555	documentos/solicitud_asistencia/solicitud_asistencia3.pdf	1	t	t	\N	2013-02-07	
\.


--
-- Name: solicitud_asistencia_sol_asis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('solicitud_asistencia_sol_asis_id_seq', 3, true);


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
-- Name: tipo_tip_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('tipo_tip_id_seq', 3, true);


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
\.


--
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('user_profiles_id_seq', 54, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) FROM stdin;
19	ah01005	$2a$08$6hK.o39tVrEcYzggckT4IOfOu53/nVazEtRpsfpvcc9KNg5Njyt1W	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-02	2013-02-02	\N	3
35	cu04058	$2a$08$t48x4nhdANPalU66hCcwmOKgEf6ar9sgfUXspBRLph9MlUX26juda	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
20	ah01012	$2a$08$H3TRunvBEJKO40n1GnxpfOmO0NW6pEGSym5rML.Zp4qCX09sT56Zy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
13	aaron	$2a$08$jRJBfFknSld2/iE2RO.Vb.tQ.rWFSWGKwHbsMzWp0FXDEX2wQHZ5q	carlos.aaromero@gmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-09	2013-01-05	\N	4
21	so13224	$2a$08$nHln6RHGVRsYpw9sL4tMQO7syuhvtA5.ir5jz49ZVFfLRlSCZ7bn2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
22	so13226	$2a$08$sJhWdlZRSzSKwhJqGztVZevplGEQtOhI1pc0Yk3Z1olAW5y6TS96K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
23	so13232	$2a$08$95RLBLbICbTjBBnRSiCjLufl9wpAn3I1C/MrO0SemZL99TzKRadjG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
24	an12220	$2a$08$RwgTcb8HxxhAlcF3pu1S0.zGJfMFkLp8e0FakMMgACvBiHbXPA.GC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
25	an12218	$2a$08$fMuWkb5XmOl9mt4V0fru4eB0V4HxHodJ7sHWF6Aqx0swl1aGwyswi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
26	an12221	$2a$08$Za16X5OqjRVJi/pfkMIWKOMBEK1icNOrZ0NItL/s2tTlzH8ygOp0C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
27	sa10197	$2a$08$podpZLbefI6WMSq91SYNQOaqCW/1FdrP2eO0KSLklbyuHAsoVhabG	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
48	sa10193	$2a$08$QJfiCrWdFUXaURtP0svk2eIuTI5cCUpuneG3deAtKuiKKnba3xWyC	kpenate@salud.gob.sv	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-09	2013-02-03	\N	3
28	sa10185	$2a$08$/2dgOQYtXdDb5BZqLzdTXOfJ0G96tNsi9sU2WTYolsvyWOrexYCBa	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
15	kpenate	$2a$08$iDSnhWfSv6y1epb6zuf2q.rW9tketjzk5Y9Vv9ZvnF6Xv/8tOS2Pq	kpenate@salud.gob.sv	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-17	2013-02-01	\N	5
29	li05076	$2a$08$IrMFOFDHxcZ6WEfOvuXYi.JSNiPbu7rkt32TF4IOLRiejoNfPocym	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
30	ch03037	$2a$08$Bj3F1.S6d2NX2c2k4.1rGOvLkTVvnP6xM/JGf4/g2KIXlxkWCtuFW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
31	ch03046	$2a$08$9aDPW8JmyWheTllY4W8GlupOpDzDFE9hNEsOh0AaZlI3wByUM1852	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
18	ah01004	$2a$08$BCB39yPJhszT7ic/cTOYUOP4zEMFcV.x1B/HHnkg0Z5KEMAM3L0Pq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-01	2013-02-01	\N	3
16	ah01001	$2a$08$Zspb3nLH2jLzTlSELh/KQeKfXLlUOyvGP6rlGO0Sfviy0M1AYczLW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-01	2013-02-01	\N	3
32	ch03031	$2a$08$H2DtVMfln04DhW0xPlTEE.54fddg.aszDa4SI.4JBIkC9rYMSgZxW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
33	ch03052	$2a$08$qD93OLiljFRV60hg6IygK.Icmi9k3CcoW16L7UVf5SnRdrfxDz1GO	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
34	pa06114	$2a$08$zZHXRGhTY5Tmj2V5rKYx8OvbK.n3VqizCRJtRLv39xlZN933.6eEi	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
36	vi11209	$2a$08$IFeZIRYBM.HIIh5bZ6dYAOKk/jfg48jnIlSE7d6dapnTeXsdF8T.K	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
37	us14251	$2a$08$S9xdb/kI6dCAMNQ0hi8By.2ZclovPBXV6EN8GzVXkMajFKdfa17fq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
38	mi09169	$2a$08$5RTw70P3l4KrrxcG1k1Feei7HQJPufYrkI0kXQzIhQnL5IiD77f2C	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
39	mi09159	$2a$08$eQ27nyb0QWOm5hS7vuRPwOKrK04SShSGZJ5.U8HOeu0yusYXAL35S	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
40	mo08142	$2a$08$oRc3aXq/8JzIq9UnibsT..hOdg0S2hWm7F5QvCfMB/z.kivHh8ccK	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
41	mo08136	$2a$08$oBOx17M47nVmLm4igOXc8OJwJTe82hOc14K2yjyEJY1g.Oq.zNUr2	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
42	mi09161	$2a$08$SNpO1PXTtuzsxha.7USdv.jQSJEp27jsocoBtE/O/hSSKtQyoZOiW	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
43	mi09178	$2a$08$uHrrfXHapeJhTO6dGjf00uDF.RxnY0WQD8aJzXGnV.FwzoTQi6FPq	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
44	mi09165	$2a$08$nyuorJuvW0iawsaTMMyzC.ntFRKVBPvRPuPfeDDCf1nsjYfxOOmDC	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
45	un07129	$2a$08$mx9h7dD4hxPlYJ3GZflyueeskiXoFmI3aoXVBH43pvoH38JH47Zcy	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
46	un07124	$2a$08$wAOOfCneKOB9IEF6PWRsw.zrZ4j5NMWOY7jEnqXYNHhjjkcPIduAu	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	\N	2013-02-02	\N	3
49	blexis	$2a$08$t5Ct4zewYCgheX30v1ftdeIPjGlojQVJ.RGX8k4I3vwYmgM9yv6cq	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-02-09	2013-02-07	\N	1
50	blxCoor	$2a$08$sR0PWTRHzYlcmXVi0sM.muTKcDifMhhZmsBQHMcBuAaa8m26nxw7a	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-02-09	2013-02-07	\N	3
51	blxRol5	$2a$08$/wTdbAUi.kO.uYSQA6OVoONs6SCEG7E.JXphZjQX8XLx2RJIdig0K	rab4585@gmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-02-09	2013-02-09	\N	5
1	admin	$2a$08$/nXdYjk2FTZtbB9qxyNbdutoPzhsieMYlU3tNXcxqUb0jJsXx7C7.	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-02-17	2012-08-19	\N	1
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('users_id_seq', 48, true);


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
-- Name: pk_aporte_municipal_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY aporte_municipal
    ADD CONSTRAINT pk_aporte_municipal_id PRIMARY KEY (aporte_municipal_id);


--
-- Name: pk_are_dim_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY area_dimension
    ADD CONSTRAINT pk_are_dim_id PRIMARY KEY (are_dim_id);


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
-- Name: pk_capacitacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT pk_capacitacion PRIMARY KEY (cap_id);


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
-- Name: pk_contrapartida_id_con_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY contrapartida_aporte
    ADD CONSTRAINT pk_contrapartida_id_con_id PRIMARY KEY (con_id, aporte_municipal_id);


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
-- Name: pk_indicador; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT pk_indicador PRIMARY KEY (ind_id);


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
-- Name: pk_rol_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT pk_rol_id PRIMARY KEY (rol_id);


--
-- Name: pk_sector; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY sector
    ADD CONSTRAINT pk_sector PRIMARY KEY (sec_id);


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
-- Name: fk_acuerdo_municipal_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_acuerdo_municipal_participante FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_aporte_muni_mun_id; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY aporte_municipal
    ADD CONSTRAINT fk_aporte_muni_mun_id FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


--
-- Name: fk_area_dimension_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_area_dimension_problema_identificado FOREIGN KEY (are_dim_id) REFERENCES area_dimension(are_dim_id) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: fk_componen_programa2_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_programa2_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_componen_reference_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente24a
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
    ADD CONSTRAINT fk_consultor_proyecto_pep FOREIGN KEY (con_id) REFERENCES consultor(con_id) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: fk_contra_aporte_aporte_mun; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_aporte
    ADD CONSTRAINT fk_contra_aporte_aporte_mun FOREIGN KEY (aporte_municipal_id) REFERENCES aporte_municipal(aporte_municipal_id) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: fk_indicado_posee_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT fk_indicado_posee_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
    ADD CONSTRAINT fk_proyecto_pep_consultor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: pk_opcion_sistema_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opcion_sistema_opcion_sistema FOREIGN KEY (opc_opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


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

