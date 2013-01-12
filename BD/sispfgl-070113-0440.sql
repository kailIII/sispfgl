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
-- Name: asistente_dsat; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE asistente_dsat (
    dsat_id integer,
    asis_nombre character varying(100),
    asis_sexo character(1),
    asis_cargo character varying(50),
    asis_sector integer
);


ALTER TABLE public.asistente_dsat OWNER TO sispfgl;

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
    cons_direccion text NOT NULL,
    cons_telefono character(9) NOT NULL,
    cons_telefono2 character(9),
    cons_fax character(9),
    cons_email character varying(200) NOT NULL,
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
    con_acu_valor boolean
);


ALTER TABLE public.contrapartida_acuerdo OWNER TO sispfgl;

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
    START WITH 1
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
    pro_pep_id integer NOT NULL
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
    fue_pri_telefono character(9) NOT NULL,
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
    mon_pro_dispo_financiera numeric(12,2),
    mon_pro_ingresos numeric(12,2),
    mon_pro_anio integer,
    pro_ing_id integer NOT NULL
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
    mun_presupuesto numeric(6,2)
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
    par_cap_participa character varying(6)
);


ALTER TABLE public.participante_capacitacion OWNER TO sispfgl;

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
    pro_pep_id integer
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
    pro_ing_id integer
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
    reu_duracion_horas integer,
    reu_tema character varying(200),
    reu_resultado text,
    reu_observacion text,
    pro_pep_id integer NOT NULL
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
    sec_nombre character varying(25)
);


ALTER TABLE public.sector OWNER TO sispfgl;

--
-- Name: tipo; Type: TABLE; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE TABLE tipo (
    tip_id integer NOT NULL,
    tip_nombre character varying(25)
);


ALTER TABLE public.tipo OWNER TO sispfgl;

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
-- Name: acu_mun_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal ALTER COLUMN acu_mun_id SET DEFAULT nextval('acuerdo_municipal_acu_mun_id_seq'::regclass);


--
-- Name: are_dim_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY area_dimension ALTER COLUMN are_dim_id SET DEFAULT nextval('area_dimension_are_dim_id_seq'::regclass);


--
-- Name: aso_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asociatividad ALTER COLUMN aso_id SET DEFAULT nextval('asociatividad_aso_id_seq'::regclass);


--
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitacion ALTER COLUMN cap_id SET DEFAULT nextval('capacitacion_cap_id_seq'::regclass);


--
-- Name: com_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente ALTER COLUMN com_id SET DEFAULT nextval('componente_com_id_seq'::regclass);


--
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor ALTER COLUMN con_id SET DEFAULT nextval('consultor_con_id_seq'::regclass);


--
-- Name: cons_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultora ALTER COLUMN cons_id SET DEFAULT nextval('consulta_cons_id_seq'::regclass);


--
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida ALTER COLUMN con_id SET DEFAULT nextval('contrapartida_con_id_seq'::regclass);


--
-- Name: cri_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio ALTER COLUMN cri_id SET DEFAULT nextval('criterio_cri_id_seq'::regclass);


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
-- Name: dia_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY diagnostico ALTER COLUMN dia_id SET DEFAULT nextval('diagnostico_dia_id_seq'::regclass);


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
-- Name: opc_sis_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY opcion_sistema ALTER COLUMN opc_sis_id SET DEFAULT nextval('opcion_sistema_opc_sis_id_seq'::regclass);


--
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante ALTER COLUMN par_id SET DEFAULT nextval('participante_par_id_seq'::regclass);


--
-- Name: per_enl_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY personal_enlace ALTER COLUMN per_enl_id SET DEFAULT nextval('personal_enlace_per_enl_id_seq'::regclass);


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
-- Name: tip_id; Type: DEFAULT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY tipo ALTER COLUMN tip_id SET DEFAULT nextval('tipo_tip_id_seq'::regclass);


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
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id, acu_mun_ruta_archivo, eta_id, acu_mun_fecha_observacion, acu_mun_fecha_borrador, acu_mun_fecha_aceptacion) FROM stdin;
13	\N	\N	\N		7	documentos/acuerdo_municipal/acuerdo_municipal13.pdf	1	\N	\N	\N
15	\N	f	\N		7	documentos/acuerdo_municipal/acuerdo_municipal15.doc	4	2012-12-12	2012-12-05	2012-12-19
\.


--
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 15, true);


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
-- Data for Name: asistente_dsat; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asistente_dsat (dsat_id, asis_nombre, asis_sexo, asis_cargo, asis_sector) FROM stdin;
\.


--
-- Data for Name: asociatividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY asociatividad (aso_id, aso_nombre, aso_fecha_constitucion, aso_movil, aso_apoyo, aso_unidad_tecnica, tip_id, pro_pep_id) FROM stdin;
26	nuevo	2012-12-27	qqqqqqqqq	qqqqqqqqqq	t	2	7
24	fffff	2012-12-06	ffffff	ffffff	t	3	7
\.


--
-- Name: asociatividad_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('asociatividad_aso_id_seq', 30, true);


--
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_observacion, pro_pep_id, cap_area, eta_id) FROM stdin;
45	2012-12-13	Tema 1.1	Lugar 1.1		7	Finanzas	2
46	2012-12-14	Tema 2	Lugar 2		7	Finanzas	2
60	2012-12-12	uuuuuuu	ttttttttttt		7	0	4
20	2012-11-07	El beneficio de las finanzas	Casa Comunal La Gloria		7	Finanzas	1
\.


--
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 67, true);


--
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
5873a4584f95dca51a0b61b9411efba4	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11	1357531323	a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"9";s:8:"username";s:11:"cfuentes_86";s:6:"status";s:1:"1";}
109dd820a3b7ef00b3315a1383a04961	::1	Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11	1357537960	a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"9";s:8:"username";s:11:"cfuentes_86";s:6:"status";s:1:"1";}
87b30855339841d2898a21ed84ac5e35	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11	1357555127	
\.


--
-- Data for Name: componente; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY componente (com_id, com_com_id, pro_id, com_codigo, com_nombre, com_objetivo, com_resultado) FROM stdin;
\.


--
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('componente_com_id_seq', 1, false);


--
-- Name: consulta_cons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consulta_cons_id_seq', 2, true);


--
-- Data for Name: consultor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultor (con_id, con_nombre, con_apellido, con_telefono, con_email, pro_pep_id, cons_id, "user") FROM stdin;
1	Carlos Mario	Morán	7845-9636	cfuentes_86@hotmail.com	1	\N	\N
7	Cristian Oswaldo	Fuentes	7458-9632	cfuentes_86@hotmail.com	7	1	cfuentes_86
\.


--
-- Name: consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('consultor_con_id_seq', 10, true);


--
-- Data for Name: consultora; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY consultora (cons_id, cons_nombre, cons_direccion, cons_telefono, cons_telefono2, cons_fax, cons_email, cons_repres_legal, cons_observaciones) FROM stdin;
2	Consultora 2	Colonia Atlacatl	2278-9632	         	2298-9565	consultora2@gmail.com	Mauricio Cantarero	
1	Consultora1	Colonia nose 	2276-1821	         	2276-9632	consultora1@gmail.com	Lic. Marroquin	
\.


--
-- Data for Name: contrapartida; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida (con_id, con_nombre) FROM stdin;
1	Locales para reuniones
3	Alimentación
4	Materiales y Equipo
5	Personal
2	Transporte
\.


--
-- Data for Name: contrapartida_acuerdo; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) FROM stdin;
13	1	t
13	3	f
13	4	f
13	5	f
13	2	t
\.


--
-- Name: contrapartida_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('contrapartida_con_id_seq', 5, true);


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
1	13	t
2	13	t
3	13	\N
4	13	\N
\.


--
-- Name: criterio_cri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('criterio_cri_id_seq', 4, true);


--
-- Data for Name: criterio_grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_grupo_gestor (cri_id, gru_ges_id, cri_gru_ges_valor) FROM stdin;
1	1	t
2	1	t
3	1	\N
4	1	\N
\.


--
-- Data for Name: criterio_integracion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_integracion (cri_id, int_ins_id, cri_int_valor) FROM stdin;
1	2	t
2	2	t
3	2	t
4	2	t
\.


--
-- Data for Name: criterio_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY criterio_reunion (cri_id, reu_id, cri_reu_valor) FROM stdin;
1	170	t
2	170	t
3	170	\N
4	170	\N
\.


--
-- Data for Name: cumplimiento_diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_diagnostico (dia_id, cum_min_id, cum_dia_valor) FROM stdin;
1	13	t
1	14	t
1	15	\N
1	16	\N
1	17	\N
1	18	\N
1	19	\N
1	20	\N
1	21	\N
1	22	\N
\.


--
-- Data for Name: cumplimiento_informe; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) FROM stdin;
4	1	t
4	2	t
4	3	t
4	4	t
4	5	t
4	6	t
4	7	t
4	8	t
4	9	t
4	10	t
4	11	t
4	12	t
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

SELECT pg_catalog.setval('cumplimiento_minimo_cum_min_id_seq', 27, true);


--
-- Data for Name: cumplimiento_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY cumplimiento_proyecto (pro_pep_id, cum_min_id, cum_pro_valor) FROM stdin;
7	23	t
7	24	t
7	25	\N
7	26	\N
7	27	\N
\.


--
-- Data for Name: declaracion_interes; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY declaracion_interes (dec_int_id, dec_int_fecha, dec_int_lugar, dec_int_comentario, dec_int_ruta_archivo, pro_pep_id) FROM stdin;
1	2012-10-11			documentos/declaracion_interes/declaracion_interes1.doc	7
\.


--
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 2, true);


--
-- Data for Name: definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY definicion (def_id, def_fecha, def_ruta_archivo, pro_pep_id) FROM stdin;
4	2012-12-14	documentos/definicion/definicion4.pdf	7
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
-- Data for Name: diagnostico; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY diagnostico (dia_id, dia_fecha_borrador, dia_fecha_observacion, dia_fecha_concejo_muni, dia_vision, dia_observacion, dia_ruta_archivo, pro_pep_id) FROM stdin;
1	2012-12-06	2012-12-07	2012-12-08	t		documentos/diagnostico/diagnostico1.docx	7
\.


--
-- Name: diagnostico_dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('diagnostico_dia_id_seq', 1, true);


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
8	Hola	ho	45	ka@gmai.com	7415-9632
5	Karen	Peñate	20	karensita_2410@hotmail.com	2276-1821
12	dfa	fadf	60	karen@hotmail.com	5678-9644
\.


--
-- Name: facilitador_fac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('facilitador_fac_id_seq', 12, true);


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

SELECT pg_catalog.setval('fuente_primaria_fue_pri_id_seq', 4, true);


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
1	2012-10-17	f	f		7	Centro Estudiantil Casa Blanca
\.


--
-- Name: grupo_apoyo_gru_apo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('grupo_apoyo_gru_apo_id_seq', 1, true);


--
-- Data for Name: grupo_gestor; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY grupo_gestor (gru_ges_id, gru_ges_lugar, gru_ges_observacion, gru_ges_acuerdo, pro_pep_id, gru_ges_fecha) FROM stdin;
1	Hola		t	7	2012-12-07
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
4	2012-11-01	2012-11-01	2012-11-21	t	t	t		7	documentos/informe_preliminar/informe_preliminar4.docx	t
\.


--
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 4, true);


--
-- Data for Name: institucion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY institucion (ins_id, ins_nombre) FROM stdin;
1	Consejo Municipal
2	Empresa Consultora
3	ISDEM
4	FISDL
5	UEP
6	Otro
\.


--
-- Name: institucion_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('institucion_ins_id_seq', 6, true);


--
-- Data for Name: integracion_instancia; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integracion_instancia (int_ins_id, int_ins_fecha, int_ins_lugar, int_ins_observacion, int_ins_plan_trabajo, int_ins_reglamento_int, int_ins_ruta_archivo, pro_pep_id) FROM stdin;
2	2012-12-11	\N		t	t	documentos/integracion_instancia/integracion_instancia2.doc	7
\.


--
-- Name: integracion_instancia_int_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integracion_instancia_int_ins_id_seq', 2, true);


--
-- Data for Name: integrante_asociatividad; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY integrante_asociatividad (int_aso_id, int_aso_nombre, aso_id) FROM stdin;
1	Alcalde	\N
2	hola	\N
3	Hola	\N
\.


--
-- Name: integrante_asociatividad_int_aso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('integrante_asociatividad_int_aso_id_seq', 4, true);


--
-- Data for Name: inventario_informacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY inventario_informacion (inv_inf_id, inv_inf_observacion, pro_pep_id) FROM stdin;
2		7
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
\.


--
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('login_attempts_id_seq', 14, true);


--
-- Data for Name: monto_proyeccion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY monto_proyeccion (mon_pro_id, mon_pro_nombre, mon_pro_dispo_financiera, mon_pro_ingresos, mon_pro_anio, pro_ing_id) FROM stdin;
9	FODES	\N	\N	\N	4
10	Ingresos Propios	\N	\N	\N	4
11	Donaciones	\N	\N	\N	4
12	Créditos	\N	\N	\N	4
\.


--
-- Name: monto_proyeccion_mon_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('monto_proyeccion_mon_pro_id_seq', 12, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY municipio (mun_id, dep_id, mun_nombre, mun_presupuesto) FROM stdin;
1	1	Ahuachapan	\N
2	1	Jujutla	\N
3	1	Atiquizaya	\N
4	1	Concepcion de Ataco	\N
5	1	El Refugio	\N
6	1	Guaymango	\N
7	1	Apaneca	\N
8	1	San Francisco Menendez	\N
9	1	San Lorenzo	\N
10	1	San Pedro Puxtla	\N
11	1	Tacuba	\N
12	1	Turin	\N
13	2	Cinquera	\N
14	2	Villa Dolores	\N
15	2	Guacotecti	\N
16	2	Ilobasco	\N
17	2	Jutiapa	\N
18	2	San Isidro	\N
19	2	Sensuntepeque	\N
20	2	Ciudad de Tejutepeque	\N
21	2	Victoria	\N
22	3	Agua Caliente	\N
23	3	Arcatao	\N
24	3	Azacualpa	\N
25	3	Chalatenango	\N
26	3	Citala	\N
27	3	Comalapa	\N
28	3	Concepcion Quezaltepeque	\N
29	3	Dulce Nombre de Maria	\N
30	3	El Carrizal	\N
31	3	El Paraiso	\N
32	3	La Laguna	\N
33	3	La Palma	\N
34	3	La Reina	\N
35	3	Las Vueltas	\N
36	3	Nombre de Jesus	\N
37	3	Nueva Concepcion	\N
38	3	Nueva Trinidad	\N
39	3	Ojos de Agua	\N
40	3	Potonico	\N
41	3	San Antonio de la Cruz	\N
42	3	San Antonio Los Ranchos	\N
43	3	San Fernando	\N
44	3	San Francisco Lempa	\N
45	3	San Francisco Morazan	\N
46	3	San Ignacio	\N
47	3	San Isidro Labrador	\N
48	3	San Jose Cancasque	\N
49	3	San Jose Las Flores	\N
50	3	San Luis del Carmen	\N
51	3	San Miguel de Mercedes	\N
52	3	San Rafael	\N
53	3	Santa Rita	\N
54	3	Tejutla	\N
55	4	Candelaria	\N
56	4	Cojutepeque	\N
57	4	El Carmen	\N
58	4	El Rosario	\N
59	4	Monte San Juan	\N
60	4	Oratorio de Concepcion	\N
61	4	San Bartolome Perulapia	\N
62	4	San Cristobal	\N
63	4	San Jose Guayabal	\N
64	4	San Pedro Perulapan	\N
65	4	San Rafael Cedros	\N
66	4	San Ramon	\N
67	4	Santa Cruz Analquito	\N
68	4	Santa Cruz Michapa	\N
69	4	Suchitoto	\N
70	4	Tenancingo	\N
71	5	Antiguo Cuscatlan	\N
72	5	Chiltiupan	\N
73	5	Ciudad Arce	\N
74	5	Colon	\N
75	5	Comasagua	\N
76	5	Huizucar	\N
77	5	Jayaque	\N
78	5	Jicalapa	\N
79	5	La Libertad	\N
80	5	Nueva San Salvador	\N
81	5	Nuevo Cuscatlan	\N
82	5	Opico	\N
83	5	Quezaltepeque	\N
84	5	Sacacoyo	\N
85	5	San Jose Villanueva	\N
86	5	San Matias	\N
87	5	San Pablo Tacachico	\N
88	5	Talnique	\N
89	5	Tamanique	\N
90	5	Teotepeque	\N
91	5	Tepecoyo	\N
92	5	Zaragoza	\N
93	6	Cuyultitan	\N
94	6	El Rosario	\N
95	6	Jerusalen	\N
96	6	Mercedes La Ceiba	\N
97	6	Olocuilta	\N
98	6	Paraiso de Osorio	\N
99	6	San Antonio Masahuat	\N
100	6	San Emigdio	\N
101	6	San Francisco Chinameca	\N
102	6	San Juan Nonualco	\N
103	6	San Juan Talpa	\N
104	6	San Juan Tepezontes	\N
105	6	San Luis La Herradura	\N
106	6	San Luis Talpa	\N
107	6	San Miguel Tepezontes	\N
108	6	San Pedro Masahuat	\N
109	6	San Pedro Nonualco	\N
110	6	San Rafael Obrajuelo	\N
111	6	Santa Maria Ostuma	\N
112	6	Santiago Nonualco	\N
113	6	Tapalhuaca	\N
114	6	Zacatecoluca	\N
115	7	Anamoros	\N
116	7	Bolivar	\N
117	7	Concepcion de Oriente	\N
118	7	Conchagua	\N
119	7	El Carmen	\N
120	7	El Sauce	\N
121	7	Intipuca	\N
122	7	La Union	\N
123	7	Lislique	\N
124	7	Meanguera del Golfo	\N
125	7	Nueva Esparta	\N
126	7	Pasaquina	\N
127	7	Poloros	\N
128	7	San Alejo	\N
129	7	San Jose	\N
130	7	Santa Rosa de Lima	\N
131	7	Yayantique	\N
132	7	Yucuayquin	\N
133	8	Arambala	\N
134	8	Cacaopera	\N
135	8	Chilanga	\N
136	8	Corinto	\N
137	8	Delicias de Concepcion	\N
138	8	El Divisadero	\N
139	8	El Rosario	\N
140	8	Gualococti	\N
141	8	Guatajiagua	\N
142	8	Joateca	\N
143	8	Jocoaitique	\N
144	8	Jocoro	\N
145	8	Lolotiquillo	\N
146	8	Meanguera	\N
147	8	Osicala	\N
148	8	Perquin	\N
149	8	San Carlos	\N
150	8	San Fernando	\N
151	8	San Francisco Gotera	\N
152	8	San Isidro	\N
153	8	San Simon	\N
154	8	Sensembra	\N
155	8	Sociedad	\N
156	8	Torola	\N
157	8	Yamabal	\N
158	8	Yoloaiquin	\N
159	9	Carolina	\N
160	9	Chapeltique	\N
161	9	Chinameca	\N
162	9	Chirilagua	\N
163	9	Ciudad Barrios	\N
164	9	Comacaran	\N
165	9	El Transito	\N
166	9	Lolotique	\N
167	9	Moncagua	\N
168	9	Nueva Guadalupe	\N
169	9	Nuevo Eden de San Juan	\N
170	9	Quelepa	\N
171	9	San Antonio	\N
172	9	San Gerardo	\N
173	9	San Jorge	\N
174	9	San Luis de la Reina	\N
175	9	San Miguel	\N
176	9	San Rafael	\N
177	9	Sesori	\N
178	9	Uluazapa	\N
179	10	Aguilares	\N
180	10	Apopa	\N
181	10	Ayutuxtepeque	\N
182	10	Cuscatancingo	\N
183	10	Delgado	\N
184	10	El Paisnal	\N
185	10	Guazapa	\N
186	10	Ilopango	\N
187	10	Mejicanos	\N
188	10	Nejapa	\N
189	10	Panchimalco	\N
190	10	Rosario de Mora	\N
191	10	San Marcos	\N
192	10	San Martin	\N
193	10	San Salvador	\N
194	10	Santiago Texacuangos	\N
195	10	Santo Tomas	\N
196	10	Soyapango	\N
197	10	Tonacatepeque	\N
198	11	Apastepeque	\N
199	11	Guadalupe	\N
200	11	San Cayetano Istepeque	\N
201	11	San Esteban Catarina	\N
202	11	San Ildefonso	\N
203	11	San Lorenzo	\N
204	11	San Sebastian	\N
205	11	Santa Clara	\N
206	11	Santo Domingo	\N
207	11	San Vicente	\N
208	11	Tecoluca	\N
209	11	Tepetitan	\N
210	11	Verapaz	\N
211	12	Candelaria de la Frontera	\N
212	12	Chalchuapa	\N
213	12	Coatepeque	\N
214	12	El Congo	\N
215	12	El Porvenir	\N
216	12	Masahuat	\N
217	12	Metapan	\N
218	12	San Antonio Pajonal	\N
219	12	San Sebastian Salitrillo	\N
220	12	Santa Ana	\N
221	12	Santa Rosa Guachipilin	\N
222	12	Santiago de la Frontera	\N
223	12	Texistepeque	\N
224	13	Acajutla	\N
225	13	Armenia	\N
226	13	Caluco	\N
227	13	Cuisnahuat	\N
228	13	Izalco	\N
229	13	Juayua	\N
230	13	Nahuizalco	\N
231	13	Nahulingo	\N
232	13	Salcoatitan	\N
233	13	San Antonio del Monte	\N
234	13	San Julian	\N
235	13	Santa Catarina Masahuat	\N
236	13	Santa Isabel Ishuatan	\N
237	13	Santo Domingo	\N
238	13	Sonsonate	\N
239	13	Sonzacate	\N
240	14	Alegria	\N
241	14	Berlin	\N
242	14	California	\N
243	14	Concepcion Batres	\N
244	14	El Triunfo	\N
245	14	Ereguayquin	\N
246	14	Estanzuelas	\N
247	14	Jiquilisco	\N
248	14	Jucuapa	\N
249	14	Jucuaran	\N
250	14	Mercedes Umaña	\N
251	14	Nueva Granada	\N
252	14	Ozatlan	\N
253	14	Puerto El Triunfo	\N
254	14	San Agustin	\N
255	14	San Buenaventura	\N
256	14	San Dionisio	\N
257	14	San Francisco Javier	\N
258	14	Santa Elena	\N
259	14	Santa Maria	\N
260	14	Santiago de Maria	\N
261	14	Tecapan	\N
262	14	Usulutan	\N
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
22	Proyecto Pep	componente2/proyectoPep	\N	2
23	Informe Preliminar	componente2/comp23_E1/InformePreliminar	6	7
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
36	Elementos Mínimos Diagnóstico	componente2/comp23_E2/diagnostico	29	7
37	Etapa 3	componente2/comp23_E3	5	3
38	Cumplimientos Mínimos PEP	componente2/comp23_E3/cumplimientosMinimos	37	6
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
48	Elaboracion de Plan de Implementacion	componente3/componente3/elab_plan_imp	45	\N
49	Divulgacion	componente3/componente3/divu	45	\N
50	Documentos de Descentralizacion	componente3/componente3/docs_desc	45	\N
51	Proyecciones	componente2/comp23_E3/mostrarProyeccionIngresos	37	3
\.


--
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 51, true);


--
-- Data for Name: participante; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel, par_dui, par_proviene, acu_mun_id, par_otros, aso_id, par_direccion, par_email, gru_ges_id, par_tipo, int_ins_id) FROM stdin;
21	\N	\N	2	1	\N	Mina 	de Peñate	F	Jefe	\N	\N	0        	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
1	1	\N	\N	\N	\N	Stephanie 	Peñate	F	Jefa	25	Bachillerato	2278-9635	03417447-9	\N	\N	\N	\N	\N	\N	\N	\N	\N
2	1	\N	\N	\N	\N	Ariana 	Fuentes	F	Super Jefa	15	prepa	2276-1824	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
40	\N	170	\N	\N	\N	Maria	Pacheco	F	Jefe	25	\N	7896-5236	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
46	\N	\N	\N	\N	\N	Karen	Elvira	F	Jefe	18	\N	7841-5236	14759662-2	\N	\N	\N	\N	\N	\N	1	C	\N
49	\N	\N	\N	\N	\N	fdafda	dafdf	M	ddfd	19	fdfdf	1896-3255	17789665-2	u	\N	45	\N	\N	\N	\N	\N	\N
50	\N	\N	\N	\N	\N	gggg	jjjjj	F	afda	14	fadf	7432-2222	          	u	\N	46	\N	\N	\N	\N	\N	\N
55	\N	\N	\N	\N	\N	fff	ffff	M	fff	\N	\N	\N	\N	\N	15	\N	\N	\N	\N	\N	gg	\N
57	\N	\N	\N	\N	\N	Vanessa	Fuentes	F	Jefe	18	\N	1236-9587	78963314-5	\N	\N	\N	\N	\N	\N	\N	C	2
58	\N	\N	\N	\N	\N	Luis	Escobar	M	Secretario	16	\N	5696-3214	\N	\N	\N	\N	\N	\N	\N	\N	S	2
59	\N	208	2	\N	\N	adfafd	afdafa	F	fdafdf	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_capacitacion (par_id, cap_id, par_cap_participa) FROM stdin;
49	45	Si
46	46	Si
50	46	Si
46	45	Si
1	20	No
2	20	Si
58	60	Si
57	60	Si
\.


--
-- Data for Name: participante_definicion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_definicion (par_id, def_id, par_def_participa) FROM stdin;
46	2	\N
46	3	\N
46	4	Si
\.


--
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('participante_par_id_seq', 59, true);


--
-- Data for Name: participante_priorizacion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_priorizacion (par_id, pri_id, par_pri_participa) FROM stdin;
46	2	Si
\.


--
-- Data for Name: participante_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY participante_reunion (par_id, reu_id, par_reu_participa) FROM stdin;
46	189	\N
46	188	No
46	190	\N
46	191	\N
46	192	\N
46	193	\N
46	195	\N
46	194	Si
46	196	\N
46	197	\N
46	198	Si
46	199	\N
46	205	Si
46	213	\N
46	214	\N
46	215	\N
46	216	\N
46	217	\N
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
-- Name: poblacion_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('poblacion_pro_id_seq', 18, true);


--
-- Data for Name: poblacion_reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY poblacion_reunion (pob_id, pob_comunidad, pob_sector, pob_institucion, reu_id) FROM stdin;
9	t	t	f	170
\.


--
-- Data for Name: portafolio_proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY portafolio_proyecto (por_pro_id, por_pro_area, por_pro_tema, por_pro_nombre, por_pro_descripcion, por_pro_ubicacion, por_pro_costo_estimado, por_pro_fecha_desde, por_pro_fecha_hasta, por_pro_beneficiario_h, por_pro_beneficiario_m, por_pro_observacion, por_pro_ruta_archivo, pro_pep_id) FROM stdin;
62	Para cambiar	dfafd	fadfd	fdafd	fdafd	14526.05	2013-01-01	2013-01-31	1475962	1479632	fadfdf	documentos/portafolio_proyecto/portafolio_proyecto62.doc	7
\.


--
-- Name: portafolio_proyecto_por_pro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('portafolio_proyecto_por_pro_id_seq', 69, true);


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
2	2012-12-10		7
\.


--
-- Name: priorizacion_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('priorizacion_pri_id_seq', 2, true);


--
-- Data for Name: problema_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY problema_identificado (pro_ide_id, pro_ide_tema, pro_ide_problema, pro_ide_prioridad, are_dim_id, reu_id, def_id) FROM stdin;
17	Tema1	Problema1	1	2	170	\N
\.


--
-- Name: problema_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('problema_identificado_pro_ide_id_seq', 17, true);


--
-- Data for Name: proyeccion_ingreso; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyeccion_ingreso (pro_ing_id, pro_ing_observacion, pro_pep_id) FROM stdin;
4	\N	7
\.


--
-- Name: proyeccion_ingreso_pro_ing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyeccion_ingreso_pro_ing_id_seq', 4, true);


--
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto (pro_id, mun_id, com_id, pro_codigo, pro_nombre, pro_num_ord_llegada, pro_zona_fisdl, pro_nom_formulador, pro_nom_ref_tec_municipal, pro_email_ref_tec_municipal, pro_tel_ref_tec_municipal, pro_nom_ase_fisdl, pro_email_ase_fisdl, pro_tel_ase_fisdl, pro_fec_ent_gl_fisdl, pro_fec_ent_gop_gpr, pro_rec_gpr, pro_fec_ent_gpr_din, pro_estatus, pro_mon_ejecucion, pro_fec_visita, pro_num_rev, pro_fec_visado, pro_mon_visado, pro_obs_din, pro_tipologia, pro_sal_par_ciudadana, pro_sal_pue_indigenas, pro_sal_rea_involuntario) FROM stdin;
\.


--
-- Name: proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('"proyecto_Pep_pro_pep_id_seq"', 8, true);


--
-- Data for Name: proyecto_identificado; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto_identificado (pro_ide_id, pro_ide_nombre, pro_ide_ubicacion, pro_ide_ff, pro_ide_monto, pro_ide_plazoejec, pro_ide_pbh, pro_ide_pbm, pro_ide_prioridad, pro_ide_estado, pro_ide_ruta_archivo, pri_id) FROM stdin;
1	dddddd	ddddd	GL	1236.68	14.00	144566.00	144559.00	1	I	0	\N
\.


--
-- Name: proyecto_identificado_pro_ide_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('proyecto_identificado_pro_ide_id_seq', 2, true);


--
-- Data for Name: proyecto_pep; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY proyecto_pep (pro_pep_id, pro_pep_nombre, mun_id, inf_pre_id, inv_inf_id, gru_apo_id, con_id, gru_ges_id, def_id, pri_id, dia_id, pro_pep_firmacm, pro_pep_firmais, pro_pep_firmaue, pro_pep_fecha_borrador, pro_pep_fecha_observacion, pro_pep_fecha_aprobacion, pro_pep_ruta_archivo, pro_pep_observacion, int_ins_id, pro_ing_id) FROM stdin;
1	Proyecto de Arreglo de Acera en la colonia Atlacatl	193	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
7	Proyecto de arreglo de una calle empedrada	192	4	2	1	7	1	4	2	1	t	t	\N	2012-12-04	2012-12-12	2012-12-19	documentos/proyecto_pep/proyecto_pep7.docx		2	4
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
1	179	\N
2	179	\N
3	179	\N
4	179	\N
5	179	\N
6	179	\N
1	180	\N
2	180	\N
3	180	\N
4	180	\N
5	180	\N
6	180	\N
1	181	\N
2	181	\N
3	181	\N
4	181	\N
5	181	\N
6	181	\N
1	182	\N
2	182	\N
3	182	\N
4	182	\N
5	182	\N
6	182	\N
1	183	\N
2	183	\N
3	183	\N
4	183	\N
5	183	\N
6	183	\N
1	188	\N
2	188	\N
3	188	\N
4	188	\N
5	188	\N
6	188	\N
1	189	\N
2	189	\N
3	189	\N
4	189	\N
5	189	\N
6	189	\N
1	190	\N
2	190	\N
3	190	\N
4	190	\N
5	190	\N
6	190	\N
1	191	\N
2	191	\N
3	191	\N
4	191	\N
5	191	\N
6	191	\N
1	192	\N
2	192	\N
3	192	\N
4	192	\N
5	192	\N
6	192	\N
1	193	\N
2	193	\N
3	193	\N
4	193	\N
5	193	\N
6	193	\N
1	194	\N
2	194	\N
3	194	\N
4	194	\N
5	194	\N
6	194	\N
1	195	\N
2	195	\N
3	195	\N
4	195	\N
5	195	\N
6	195	\N
1	196	\N
2	196	\N
3	196	\N
4	196	\N
5	196	\N
6	196	\N
1	197	\N
2	197	\N
3	197	\N
4	197	\N
5	197	\N
6	197	\N
1	199	\N
2	199	\N
3	199	\N
4	199	\N
5	199	\N
6	199	\N
1	205	t
2	205	t
3	205	f
4	205	f
5	205	f
6	205	f
1	213	\N
2	213	\N
3	213	\N
4	213	\N
5	213	\N
6	213	\N
1	214	\N
2	214	\N
3	214	\N
4	214	\N
5	214	\N
6	214	\N
1	215	\N
2	215	\N
3	215	\N
4	215	\N
5	215	\N
6	215	\N
1	216	\N
2	216	\N
3	216	\N
4	216	\N
5	216	\N
6	216	\N
1	198	t
2	198	t
3	198	f
4	198	f
5	198	f
6	198	f
1	217	\N
2	217	\N
3	217	\N
4	217	\N
5	217	\N
6	217	\N
\.


--
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY reunion (reu_id, eta_id, reu_numero, reu_fecha, reu_duracion_horas, reu_tema, reu_resultado, reu_observacion, pro_pep_id) FROM stdin;
208	1	1	2012-12-05	8	fafdafdafafd	fdafafdad		7
170	2	1	2012-12-08	0	Definición de Problemática	Hola		7
198	3	1	2012-12-12	15	Nuevo Tema	0		7
\.


--
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 219, true);


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol (rol_id, rol_nombre, rol_descripcion) FROM stdin;
3	consultor	Este rol representa al consultor
1	administrador	Este rol representa al administrador del sistema
30	subsecretaria	Rol para la subsecretaria de desarrollo territorial.
\.


--
-- Data for Name: rol_opcion_sistema; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY rol_opcion_sistema (rol_id, opc_sis_id) FROM stdin;
3	5
3	2
3	6
3	7
3	8
3	11
3	12
3	13
3	16
1	17
1	19
1	20
1	22
3	23
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
3	36
3	37
3	38
3	39
3	41
3	40
3	42
3	43
3	44
1	10
30	45
30	46
30	47
30	48
30	49
30	50
3	51
\.


--
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('rol_rol_id_seq', 30, true);


--
-- Data for Name: sector; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY sector (sec_id, sec_nombre) FROM stdin;
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
\.


--
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('user_profiles_id_seq', 7, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sispfgl
--

COPY users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) FROM stdin;
12	kpenate	$2a$08$mdi/rPkxCvgIX9g8Fa6qNONUM8DkkPs.NhmvQKYJF0cHg3eIc5Klu	kpenate@salud.gob.sv	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-01-05	2013-01-05	\N	3
13	aaron	$2a$08$jRJBfFknSld2/iE2RO.Vb.tQ.rWFSWGKwHbsMzWp0FXDEX2wQHZ5q	carlos.aaromero@gmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-01-05	2013-01-05	\N	30
1	admin	$2a$08$orzZRVsYd7hePXoZ7s61De5ecu2TD9OIZMqYpA6jvHv44eH8qp31W	karensita_2410@hotmail.com	1	0	\N	\N	\N	\N	\N	::1	2013-01-06	2012-08-19	\N	1
9	cfuentes_86	$2a$08$E8ttuLm0U2cD5lHo8/bzxuPeOJw/8/8nXH912APeL12wCUl4hNbNO	cfuentes_86@hotmail.com	1	0	\N	\N	\N	\N	\N	127.0.0.1	2013-01-07	2012-09-12	\N	3
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sispfgl
--

SELECT pg_catalog.setval('users_id_seq', 13, true);


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
-- Name: pk_acuerdo_municipal; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT pk_acuerdo_municipal PRIMARY KEY (acu_mun_id);


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
-- Name: pk_cumplimiento_minimo; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_cumplimiento_minimo PRIMARY KEY (cum_min_id);


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
-- Name: pk_dsat; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY dsat
    ADD CONSTRAINT pk_dsat PRIMARY KEY (dsat_id);


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
-- Name: pk_participante; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT pk_participante PRIMARY KEY (par_id);


--
-- Name: pk_participante_capacitacion; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT pk_participante_capacitacion PRIMARY KEY (par_id, cap_id);


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
-- Name: pk_pro_id; Type: CONSTRAINT; Schema: public; Owner: sispfgl; Tablespace: 
--

ALTER TABLE ONLY poblacion_reunion
    ADD CONSTRAINT pk_pro_id PRIMARY KEY (pob_id);


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
-- Name: fki_asociatividad_participante; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_asociatividad_participante ON participante USING btree (aso_id);


--
-- Name: fki_capacitacion_facilitador; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_capacitacion_facilitador ON facilitador USING btree (cap_id);


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
-- Name: fki_participante_asociatividad; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_participante_asociatividad ON participante USING btree (aso_id);


--
-- Name: fki_participante_capacitacion; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_participante_capacitacion ON participante_capacitacion USING btree (par_id);


--
-- Name: fki_pk_proyecto_pep_acuerdo_municipal; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_pk_proyecto_pep_acuerdo_municipal ON acuerdo_municipal USING btree (pro_pep_id);


--
-- Name: fki_reunion_resultado_reunion; Type: INDEX; Schema: public; Owner: sispfgl; Tablespace: 
--

CREATE INDEX fki_reunion_resultado_reunion ON resultado_reunion USING btree (res_id);


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
-- Name: fk_acuerdo_municipal_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_acuerdo_municipal_participante FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id);


--
-- Name: fk_area_dimension_problema_identificado; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY problema_identificado
    ADD CONSTRAINT fk_area_dimension_problema_identificado FOREIGN KEY (are_dim_id) REFERENCES area_dimension(are_dim_id);


--
-- Name: fk_asistent_reference_dsat; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asistente_dsat
    ADD CONSTRAINT fk_asistent_reference_dsat FOREIGN KEY (dsat_id) REFERENCES dsat(dsat_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
-- Name: fk_componen_se_divide_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_se_divide_componen FOREIGN KEY (com_com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_consultor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_consultor_proyecto_pep FOREIGN KEY (con_id) REFERENCES consultor(con_id);


--
-- Name: fk_consultora_consultor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_consultora_consultor FOREIGN KEY (cons_id) REFERENCES consultora(cons_id);


--
-- Name: fk_contrapa_aporta_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_aporta_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_contrapa_conformad_contrapa; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_conformad_contrapa FOREIGN KEY (con_id) REFERENCES contrapartida(con_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_reunion
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_integracion
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_cumple_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_cumple_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_criterio_cumple_integracion_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_integracion
    ADD CONSTRAINT fk_criterio_cumple_integracion_ FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_proyecto
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_posee_alg_diagnostico_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_diagnostico
    ADD CONSTRAINT fk_cumplimi_posee_alg_diagnostico_ FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_posee_alg_informe_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_posee_alg_informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_cumplimi_posee_alg_proyecto_; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY cumplimiento_proyecto
    ADD CONSTRAINT fk_cumplimi_posee_alg_proyecto_ FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
    ADD CONSTRAINT fk_diagnostico_proyecto_pep FOREIGN KEY (dia_id) REFERENCES diagnostico(dia_id);


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
-- Name: fk_etapa_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT fk_etapa_capacitacion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_etapa_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_etapa_reunion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- Name: fk_fecha_re_din_tiene_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT fk_fecha_re_din_tiene_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_fuente_p_formado_inventar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT fk_fuente_p_formado_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_fuente_s_formado_p_inventar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT fk_fuente_s_formado_p_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_grupo_apoyo_participantes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_grupo_apoyo_participantes FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id);


--
-- Name: fk_grupo_gestor_criterio_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY criterio_grupo_gestor
    ADD CONSTRAINT fk_grupo_gestor_criterio_grupo_gestor FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_grupo_gestor_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_grupo_gestor_proyecto_pep FOREIGN KEY (gru_ges_id) REFERENCES grupo_gestor(gru_ges_id);


--
-- Name: fk_indicado_posee_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT fk_indicado_posee_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_informe_preliminar_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_informe_preliminar_proyecto_pep FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id);


--
-- Name: fk_integracion_instancia_participante; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_integracion_instancia_participante FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_integracion_instancia_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_integracion_instancia_proyecto_pep FOREIGN KEY (int_ins_id) REFERENCES integracion_instancia(int_ins_id);


--
-- Name: fk_inventario_informacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_inventario_informacion_proyecto_pep FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id);


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
-- Name: fk_municipio_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_municipio_proyecto_pep FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


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
    ADD CONSTRAINT fk_particip_necesita__informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_particip_necesita_declarac; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita_declarac FOREIGN KEY (dec_int_id) REFERENCES declaracion_interes(dec_int_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_particip_pueden_te_instituc; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_pueden_te_instituc FOREIGN KEY (ins_id) REFERENCES institucion(ins_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
    ADD CONSTRAINT fk_personal_necesita__acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
    ADD CONSTRAINT fk_priorizacion_proyecto_pep FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id);


--
-- Name: fk_priorizacion_proyectos_identificados; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_identificado
    ADD CONSTRAINT fk_priorizacion_proyectos_identificados FOREIGN KEY (pri_id) REFERENCES priorizacion(pri_id);


--
-- Name: fk_proyeccion_ingresos; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY monto_proyeccion
    ADD CONSTRAINT fk_proyeccion_ingresos FOREIGN KEY (pro_ing_id) REFERENCES proyeccion_ingreso(pro_ing_id);


--
-- Name: fk_proyeccion_ingresos_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_proyeccion_ingresos_proyecto_pep FOREIGN KEY (pro_ing_id) REFERENCES proyeccion_ingreso(pro_ing_id);


--
-- Name: fk_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT fk_proyecto_pep FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_acuerdo_municipal; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT fk_proyecto_pep_acuerdo_municipal FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_asociatividad; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY asociatividad
    ADD CONSTRAINT fk_proyecto_pep_asociatividad FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_capacitacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT fk_proyecto_pep_capacitacion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_consultor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT fk_proyecto_pep_consultor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_declaracion_interes; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT fk_proyecto_pep_declaracion_interes FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_diagnostico; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY diagnostico
    ADD CONSTRAINT fk_proyecto_pep_diagnostico FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id);


--
-- Name: fk_proyecto_pep_grupo_gestor; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY grupo_gestor
    ADD CONSTRAINT fk_proyecto_pep_grupo_gestor FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_informe_preliminar; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT fk_proyecto_pep_informe_preliminar FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_integracion_instancia; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY integracion_instancia
    ADD CONSTRAINT fk_proyecto_pep_integracion_instancia FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_portafolio_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY portafolio_proyecto
    ADD CONSTRAINT fk_proyecto_pep_portafolio_proyecto FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_proyecto_pep_priorizacion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY priorizacion
    ADD CONSTRAINT fk_proyecto_pep_priorizacion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_proyeccion_ingresos; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyeccion_ingreso
    ADD CONSTRAINT fk_proyecto_pep_proyeccion_ingresos FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_pep_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_proyecto_pep_reunion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- Name: fk_proyecto_programa_componen; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_programa_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_proyecto_se_realiz_municipi; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_se_realiz_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_resultado_resultado_reunion; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY resultado_reunion
    ADD CONSTRAINT fk_resultado_resultado_reunion FOREIGN KEY (res_id) REFERENCES resultado(res_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


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
    ADD CONSTRAINT fk_reunion_resultado_reunion FOREIGN KEY (res_id) REFERENCES resultado(res_id);


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
-- Name: pk_opcion_sistema_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opcion_sistema_opcion_sistema FOREIGN KEY (opc_opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- Name: pro_pep_id; Type: FK CONSTRAINT; Schema: public; Owner: sispfgl
--

ALTER TABLE ONLY definicion
    ADD CONSTRAINT pro_pep_id FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


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

