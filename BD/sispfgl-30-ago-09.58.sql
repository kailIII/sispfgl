--
-- PostgreSQL database dump
--

-- Started on 2012-08-30 14:14:38 CST

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
-- TOC entry 140 (class 1259 OID 19289)
-- Dependencies: 6
-- Name: consultor; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE consultor (
    con_id integer NOT NULL,
    con_nombre character varying(75) NOT NULL,
    con_apellido character varying(75) NOT NULL,
    con_telefono character varying(9) NOT NULL,
    con_email character varying(100) NOT NULL
);


ALTER TABLE public.consultor OWNER TO smpfgl;

--
-- TOC entry 141 (class 1259 OID 19292)
-- Dependencies: 6 140
-- Name: Consultor_con_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE "Consultor_con_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."Consultor_con_id_seq" OWNER TO smpfgl;

--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 141
-- Name: Consultor_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE "Consultor_con_id_seq" OWNED BY consultor.con_id;


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 141
-- Name: Consultor_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('"Consultor_con_id_seq"', 1, false);


--
-- TOC entry 142 (class 1259 OID 19294)
-- Dependencies: 6
-- Name: proyecto_pep; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE proyecto_pep (
    pro_pep_id integer NOT NULL,
    pro_pep_nombre text NOT NULL,
    pro_pep_descripcion text,
    mun_id integer NOT NULL,
    acu_mun_id integer,
    inf_pre_id integer,
    inv_inf_id integer,
    gru_apo_id integer
);


ALTER TABLE public.proyecto_pep OWNER TO smpfgl;

--
-- TOC entry 143 (class 1259 OID 19300)
-- Dependencies: 142 6
-- Name: Proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE "Proyecto_Pep_pro_pep_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."Proyecto_Pep_pro_pep_id_seq" OWNER TO smpfgl;

--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 143
-- Name: Proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE "Proyecto_Pep_pro_pep_id_seq" OWNED BY proyecto_pep.pro_pep_id;


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 143
-- Name: Proyecto_Pep_pro_pep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('"Proyecto_Pep_pro_pep_id_seq"', 1, true);


--
-- TOC entry 144 (class 1259 OID 19302)
-- Dependencies: 6
-- Name: actividad; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE actividad (
    act_id integer NOT NULL,
    com_id integer NOT NULL,
    act_act_id integer,
    act_codigo character varying(10) NOT NULL,
    act_descripcion text NOT NULL
);


ALTER TABLE public.actividad OWNER TO smpfgl;

--
-- TOC entry 145 (class 1259 OID 19308)
-- Dependencies: 144 6
-- Name: actividad_act_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE actividad_act_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.actividad_act_id_seq OWNER TO smpfgl;

--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 145
-- Name: actividad_act_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE actividad_act_id_seq OWNED BY actividad.act_id;


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 145
-- Name: actividad_act_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('actividad_act_id_seq', 1, false);


--
-- TOC entry 146 (class 1259 OID 19310)
-- Dependencies: 6
-- Name: acuerdo_municipal; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE acuerdo_municipal (
    acu_mun_id integer NOT NULL,
    acu_mun_fecha date NOT NULL,
    acu_mun_archivo oid,
    acu_mun_p1 boolean NOT NULL,
    acu_mun_p2 boolean NOT NULL,
    acu_mun_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.acuerdo_municipal OWNER TO smpfgl;

--
-- TOC entry 147 (class 1259 OID 19316)
-- Dependencies: 146 6
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE acuerdo_municipal_acu_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.acuerdo_municipal_acu_mun_id_seq OWNER TO smpfgl;

--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 147
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE acuerdo_municipal_acu_mun_id_seq OWNED BY acuerdo_municipal.acu_mun_id;


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 147
-- Name: acuerdo_municipal_acu_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('acuerdo_municipal_acu_mun_id_seq', 1, false);


--
-- TOC entry 148 (class 1259 OID 19318)
-- Dependencies: 6
-- Name: asesor_municipal; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE asesor_municipal (
    ase_mun_id integer NOT NULL,
    reg_id integer NOT NULL,
    ase_mun_nombre character varying(50) NOT NULL,
    ase_mun_apellido character varying(50) NOT NULL,
    ase_mun_cargo character varying(25) NOT NULL
);


ALTER TABLE public.asesor_municipal OWNER TO smpfgl;

--
-- TOC entry 149 (class 1259 OID 19321)
-- Dependencies: 6
-- Name: capacitacion; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE capacitacion (
    cap_id integer NOT NULL,
    cap_fecha date NOT NULL,
    cap_tema character varying(100) NOT NULL,
    cap_lugar character varying(50) NOT NULL,
    cap_facilitador character varying(100) NOT NULL,
    cap_observacion text
);


ALTER TABLE public.capacitacion OWNER TO smpfgl;

--
-- TOC entry 150 (class 1259 OID 19327)
-- Dependencies: 149 6
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE capacitacion_cap_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.capacitacion_cap_id_seq OWNER TO smpfgl;

--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 150
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE capacitacion_cap_id_seq OWNED BY capacitacion.cap_id;


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 150
-- Name: capacitacion_cap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('capacitacion_cap_id_seq', 1, false);


--
-- TOC entry 151 (class 1259 OID 19329)
-- Dependencies: 2038 2039 2040 6
-- Name: ci_sessions; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE ci_sessions (
    session_id character varying(40) DEFAULT '0'::character varying NOT NULL,
    ip_address character varying(16) DEFAULT '0'::character varying NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_activity integer DEFAULT 0 NOT NULL,
    user_data text NOT NULL
);


ALTER TABLE public.ci_sessions OWNER TO smpfgl;

--
-- TOC entry 152 (class 1259 OID 19338)
-- Dependencies: 6
-- Name: componente; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
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


ALTER TABLE public.componente OWNER TO smpfgl;

--
-- TOC entry 153 (class 1259 OID 19344)
-- Dependencies: 152 6
-- Name: componente_com_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE componente_com_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.componente_com_id_seq OWNER TO smpfgl;

--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 153
-- Name: componente_com_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE componente_com_id_seq OWNED BY componente.com_id;


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 153
-- Name: componente_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('componente_com_id_seq', 1, false);


--
-- TOC entry 154 (class 1259 OID 19346)
-- Dependencies: 6
-- Name: contrapartida; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE contrapartida (
    con_id integer NOT NULL,
    con_nombre character varying(25) NOT NULL
);


ALTER TABLE public.contrapartida OWNER TO smpfgl;

--
-- TOC entry 155 (class 1259 OID 19349)
-- Dependencies: 6
-- Name: contrapartida_acuerdo; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE contrapartida_acuerdo (
    acu_mun_id integer NOT NULL,
    con_id integer NOT NULL,
    con_acu_valor boolean NOT NULL
);


ALTER TABLE public.contrapartida_acuerdo OWNER TO smpfgl;

--
-- TOC entry 156 (class 1259 OID 19352)
-- Dependencies: 6 154
-- Name: contrapartida_con_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE contrapartida_con_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.contrapartida_con_id_seq OWNER TO smpfgl;

--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 156
-- Name: contrapartida_con_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE contrapartida_con_id_seq OWNED BY contrapartida.con_id;


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 156
-- Name: contrapartida_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('contrapartida_con_id_seq', 5, true);


--
-- TOC entry 157 (class 1259 OID 19354)
-- Dependencies: 6
-- Name: criterio; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE criterio (
    cri_id integer NOT NULL,
    cri_nombre character varying(25) NOT NULL
);


ALTER TABLE public.criterio OWNER TO smpfgl;

--
-- TOC entry 158 (class 1259 OID 19357)
-- Dependencies: 6
-- Name: criterio_acuerdo; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE criterio_acuerdo (
    cri_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    cri_acu_valor boolean NOT NULL
);


ALTER TABLE public.criterio_acuerdo OWNER TO smpfgl;

--
-- TOC entry 159 (class 1259 OID 19360)
-- Dependencies: 157 6
-- Name: criterio_cri_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE criterio_cri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.criterio_cri_id_seq OWNER TO smpfgl;

--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 159
-- Name: criterio_cri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE criterio_cri_id_seq OWNED BY criterio.cri_id;


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 159
-- Name: criterio_cri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('criterio_cri_id_seq', 4, true);


--
-- TOC entry 160 (class 1259 OID 19362)
-- Dependencies: 6
-- Name: cumplimiento_informe; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE cumplimiento_informe (
    inf_pre_id integer NOT NULL,
    cum_min_id integer NOT NULL,
    cum_inf_valor boolean NOT NULL
);


ALTER TABLE public.cumplimiento_informe OWNER TO smpfgl;

--
-- TOC entry 161 (class 1259 OID 19365)
-- Dependencies: 6
-- Name: cumplimiento_minimo; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE cumplimiento_minimo (
    cum_min_id integer NOT NULL,
    cum_min_nombre character varying(100) NOT NULL
);


ALTER TABLE public.cumplimiento_minimo OWNER TO smpfgl;

--
-- TOC entry 162 (class 1259 OID 19368)
-- Dependencies: 161 6
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE cumplimiento_minimo_cum_min_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cumplimiento_minimo_cum_min_id_seq OWNER TO smpfgl;

--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 162
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE cumplimiento_minimo_cum_min_id_seq OWNED BY cumplimiento_minimo.cum_min_id;


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 162
-- Name: cumplimiento_minimo_cum_min_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('cumplimiento_minimo_cum_min_id_seq', 1, false);


--
-- TOC entry 163 (class 1259 OID 19370)
-- Dependencies: 6
-- Name: declaracion_interes; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE declaracion_interes (
    dec_int_id integer NOT NULL,
    dec_int_fecha date NOT NULL,
    dec_int_lugar character varying(100) NOT NULL,
    dec_int_comentario text,
    dec_int_archivo oid
);


ALTER TABLE public.declaracion_interes OWNER TO smpfgl;

--
-- TOC entry 164 (class 1259 OID 19376)
-- Dependencies: 163 6
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE declaracion_interes_dec_int_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.declaracion_interes_dec_int_id_seq OWNER TO smpfgl;

--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 164
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE declaracion_interes_dec_int_id_seq OWNED BY declaracion_interes.dec_int_id;


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 164
-- Name: declaracion_interes_dec_int_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('declaracion_interes_dec_int_id_seq', 1, false);


--
-- TOC entry 165 (class 1259 OID 19378)
-- Dependencies: 6
-- Name: departamento; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE departamento (
    dep_id integer NOT NULL,
    reg_id integer NOT NULL,
    dep_nombre character varying(50) NOT NULL
);


ALTER TABLE public.departamento OWNER TO smpfgl;

--
-- TOC entry 166 (class 1259 OID 19381)
-- Dependencies: 165 6
-- Name: departamento_dep_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE departamento_dep_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.departamento_dep_id_seq OWNER TO smpfgl;

--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 166
-- Name: departamento_dep_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE departamento_dep_id_seq OWNED BY departamento.dep_id;


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 166
-- Name: departamento_dep_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('departamento_dep_id_seq', 1, true);


--
-- TOC entry 167 (class 1259 OID 19383)
-- Dependencies: 6
-- Name: email; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE email (
    reg_id integer,
    ase_mun_id integer,
    ema_cuenta character varying(100),
    ema_id integer NOT NULL
);


ALTER TABLE public.email OWNER TO smpfgl;

--
-- TOC entry 168 (class 1259 OID 19386)
-- Dependencies: 167 6
-- Name: email_ema_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE email_ema_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.email_ema_id_seq OWNER TO smpfgl;

--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 168
-- Name: email_ema_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE email_ema_id_seq OWNED BY email.ema_id;


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 168
-- Name: email_ema_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('email_ema_id_seq', 1, false);


--
-- TOC entry 169 (class 1259 OID 19388)
-- Dependencies: 6
-- Name: etapa; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE etapa (
    eta_nombre character varying(30) NOT NULL,
    eta_id integer NOT NULL
);


ALTER TABLE public.etapa OWNER TO smpfgl;

--
-- TOC entry 219 (class 1259 OID 19937)
-- Dependencies: 169 6
-- Name: etapa_eta_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE etapa_eta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.etapa_eta_id_seq OWNER TO smpfgl;

--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 219
-- Name: etapa_eta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE etapa_eta_id_seq OWNED BY etapa.eta_id;


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 219
-- Name: etapa_eta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('etapa_eta_id_seq', 1, true);


--
-- TOC entry 170 (class 1259 OID 19391)
-- Dependencies: 6
-- Name: fecha_recepcion_observacion_din; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE fecha_recepcion_observacion_din (
    fec_correlativo integer NOT NULL,
    pro_id integer,
    fec_rec_din date,
    fec_obs_din date
);


ALTER TABLE public.fecha_recepcion_observacion_din OWNER TO smpfgl;

--
-- TOC entry 171 (class 1259 OID 19394)
-- Dependencies: 6
-- Name: fuente_primaria; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE fuente_primaria (
    fue_pri_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_pri_nombre character varying(50) NOT NULL,
    fue_pri_institucion character varying(100) NOT NULL,
    fue_pri_cargo character varying(30) NOT NULL,
    fue_pri_telefono character(9) NOT NULL,
    fue_pri_nombre_doc character varying(100) NOT NULL
);


ALTER TABLE public.fuente_primaria OWNER TO smpfgl;

--
-- TOC entry 172 (class 1259 OID 19397)
-- Dependencies: 6 171
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE fuente_primaria_fue_pri_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_primaria_fue_pri_id_seq OWNER TO smpfgl;

--
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 172
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE fuente_primaria_fue_pri_id_seq OWNED BY fuente_primaria.fue_pri_id;


--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 172
-- Name: fuente_primaria_fue_pri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('fuente_primaria_fue_pri_id_seq', 1, false);


--
-- TOC entry 173 (class 1259 OID 19399)
-- Dependencies: 6
-- Name: fuente_secundaria; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE fuente_secundaria (
    fue_sec_id integer NOT NULL,
    inv_inf_id integer NOT NULL,
    fue_sec_nombre character varying(100) NOT NULL,
    fue_sec_fuente character varying(100) NOT NULL,
    fue_sec_disponible_en character varying(15) NOT NULL,
    fue_sec_anio integer NOT NULL
);


ALTER TABLE public.fuente_secundaria OWNER TO smpfgl;

--
-- TOC entry 174 (class 1259 OID 19402)
-- Dependencies: 173 6
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE fuente_secundaria_fue_sec_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_secundaria_fue_sec_id_seq OWNER TO smpfgl;

--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 174
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE fuente_secundaria_fue_sec_id_seq OWNED BY fuente_secundaria.fue_sec_id;


--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 174
-- Name: fuente_secundaria_fue_sec_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('fuente_secundaria_fue_sec_id_seq', 1, false);


--
-- TOC entry 175 (class 1259 OID 19404)
-- Dependencies: 6
-- Name: grupo_apoyo; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE grupo_apoyo (
    gru_apo_id integer NOT NULL,
    gru_apo_fecha date NOT NULL,
    gru_apo_c3 boolean NOT NULL,
    gru_apo_c4 boolean NOT NULL,
    gru_apo_obs text,
    pro_pep_id integer
);


ALTER TABLE public.grupo_apoyo OWNER TO smpfgl;

--
-- TOC entry 176 (class 1259 OID 19410)
-- Dependencies: 6
-- Name: indicador; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE indicador (
    ind_id integer NOT NULL,
    com_id integer NOT NULL,
    ind_nombre text NOT NULL,
    ind_tipo integer NOT NULL
);


ALTER TABLE public.indicador OWNER TO smpfgl;

--
-- TOC entry 177 (class 1259 OID 19416)
-- Dependencies: 176 6
-- Name: indicador_ind_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE indicador_ind_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.indicador_ind_id_seq OWNER TO smpfgl;

--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 177
-- Name: indicador_ind_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE indicador_ind_id_seq OWNED BY indicador.ind_id;


--
-- TOC entry 2295 (class 0 OID 0)
-- Dependencies: 177
-- Name: indicador_ind_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('indicador_ind_id_seq', 1, false);


--
-- TOC entry 178 (class 1259 OID 19418)
-- Dependencies: 6
-- Name: informe_preliminar; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE informe_preliminar (
    inf_pre_id integer NOT NULL,
    inf_pre_fecha_borrador date,
    inf_pre_fecha_observacion date,
    inf_pre_aceptacion date,
    inf_pre_aceptada boolean,
    inf_pre_firmam boolean NOT NULL,
    inf_pre_firmai boolean NOT NULL,
    inf_pre_firmau boolean NOT NULL,
    inf_pre_archivo oid,
    inf_pre_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.informe_preliminar OWNER TO smpfgl;

--
-- TOC entry 179 (class 1259 OID 19424)
-- Dependencies: 178 6
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE informe_preliminar_inf_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.informe_preliminar_inf_pre_id_seq OWNER TO smpfgl;

--
-- TOC entry 2296 (class 0 OID 0)
-- Dependencies: 179
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE informe_preliminar_inf_pre_id_seq OWNED BY informe_preliminar.inf_pre_id;


--
-- TOC entry 2297 (class 0 OID 0)
-- Dependencies: 179
-- Name: informe_preliminar_inf_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('informe_preliminar_inf_pre_id_seq', 1, false);


--
-- TOC entry 180 (class 1259 OID 19426)
-- Dependencies: 6
-- Name: institucion; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE institucion (
    ins_id integer NOT NULL,
    ins_nombre character varying(50) NOT NULL
);


ALTER TABLE public.institucion OWNER TO smpfgl;

--
-- TOC entry 181 (class 1259 OID 19429)
-- Dependencies: 6 180
-- Name: institucion_ins_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE institucion_ins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.institucion_ins_id_seq OWNER TO smpfgl;

--
-- TOC entry 2298 (class 0 OID 0)
-- Dependencies: 181
-- Name: institucion_ins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE institucion_ins_id_seq OWNED BY institucion.ins_id;


--
-- TOC entry 2299 (class 0 OID 0)
-- Dependencies: 181
-- Name: institucion_ins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('institucion_ins_id_seq', 6, true);


--
-- TOC entry 182 (class 1259 OID 19431)
-- Dependencies: 6
-- Name: inventario_informacion; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE inventario_informacion (
    inv_inf_id integer NOT NULL,
    inv_inf_observacion text,
    pro_pep_id integer NOT NULL
);


ALTER TABLE public.inventario_informacion OWNER TO smpfgl;

--
-- TOC entry 183 (class 1259 OID 19437)
-- Dependencies: 182 6
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE inventario_informacion_inv_inf_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.inventario_informacion_inv_inf_id_seq OWNER TO smpfgl;

--
-- TOC entry 2300 (class 0 OID 0)
-- Dependencies: 183
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE inventario_informacion_inv_inf_id_seq OWNED BY inventario_informacion.inv_inf_id;


--
-- TOC entry 2301 (class 0 OID 0)
-- Dependencies: 183
-- Name: inventario_informacion_inv_inf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('inventario_informacion_inv_inf_id_seq', 1, false);


--
-- TOC entry 184 (class 1259 OID 19439)
-- Dependencies: 6
-- Name: login_attempts; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE login_attempts (
    id integer NOT NULL,
    ip_address character varying(40) NOT NULL,
    login character varying(50) NOT NULL,
    "time" timestamp without time zone
);


ALTER TABLE public.login_attempts OWNER TO smpfgl;

--
-- TOC entry 185 (class 1259 OID 19442)
-- Dependencies: 184 6
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE login_attempts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.login_attempts_id_seq OWNER TO smpfgl;

--
-- TOC entry 2302 (class 0 OID 0)
-- Dependencies: 185
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


--
-- TOC entry 2303 (class 0 OID 0)
-- Dependencies: 185
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('login_attempts_id_seq', 12, true);


--
-- TOC entry 186 (class 1259 OID 19444)
-- Dependencies: 6
-- Name: mensaje_correo; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE mensaje_correo (
    men_cor_id integer NOT NULL,
    men_cor_asunto character varying(25) NOT NULL,
    men_cor_cuerpo text NOT NULL
);


ALTER TABLE public.mensaje_correo OWNER TO smpfgl;

--
-- TOC entry 187 (class 1259 OID 19450)
-- Dependencies: 6 186
-- Name: mensaje_correo_men_cor_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE mensaje_correo_men_cor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mensaje_correo_men_cor_id_seq OWNER TO smpfgl;

--
-- TOC entry 2304 (class 0 OID 0)
-- Dependencies: 187
-- Name: mensaje_correo_men_cor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE mensaje_correo_men_cor_id_seq OWNED BY mensaje_correo.men_cor_id;


--
-- TOC entry 2305 (class 0 OID 0)
-- Dependencies: 187
-- Name: mensaje_correo_men_cor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('mensaje_correo_men_cor_id_seq', 1, false);


--
-- TOC entry 188 (class 1259 OID 19452)
-- Dependencies: 6
-- Name: municipio; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE municipio (
    mun_id integer NOT NULL,
    inv_inf_id integer,
    dep_id integer NOT NULL,
    pro_id integer,
    mun_nombre character varying(50) NOT NULL,
    mun_presupuesto numeric(10,2)
);


ALTER TABLE public.municipio OWNER TO smpfgl;

--
-- TOC entry 189 (class 1259 OID 19455)
-- Dependencies: 6
-- Name: municipio_componente; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE municipio_componente (
    com_id integer NOT NULL,
    mun_id integer NOT NULL,
    mun_com_asignacion numeric(6,2)
);


ALTER TABLE public.municipio_componente OWNER TO smpfgl;

--
-- TOC entry 190 (class 1259 OID 19458)
-- Dependencies: 6 188
-- Name: municipio_mun_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE municipio_mun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.municipio_mun_id_seq OWNER TO smpfgl;

--
-- TOC entry 2306 (class 0 OID 0)
-- Dependencies: 190
-- Name: municipio_mun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE municipio_mun_id_seq OWNED BY municipio.mun_id;


--
-- TOC entry 2307 (class 0 OID 0)
-- Dependencies: 190
-- Name: municipio_mun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('municipio_mun_id_seq', 1, true);


--
-- TOC entry 191 (class 1259 OID 19460)
-- Dependencies: 6
-- Name: opcion_sistema; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE opcion_sistema (
    opc_sis_id integer NOT NULL,
    opc_sis_nombre character varying(40) NOT NULL,
    opc_sis_url character varying(100) NOT NULL,
    opc_opc_sis_id integer
);


ALTER TABLE public.opcion_sistema OWNER TO smpfgl;

--
-- TOC entry 192 (class 1259 OID 19463)
-- Dependencies: 6 191
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE opcion_sistema_opc_sis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.opcion_sistema_opc_sis_id_seq OWNER TO smpfgl;

--
-- TOC entry 2308 (class 0 OID 0)
-- Dependencies: 192
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE opcion_sistema_opc_sis_id_seq OWNED BY opcion_sistema.opc_sis_id;


--
-- TOC entry 2309 (class 0 OID 0)
-- Dependencies: 192
-- Name: opcion_sistema_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('opcion_sistema_opc_sis_id_seq', 9, true);


--
-- TOC entry 193 (class 1259 OID 19465)
-- Dependencies: 6
-- Name: participante; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
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
    par_tel character(9)
);


ALTER TABLE public.participante OWNER TO smpfgl;

--
-- TOC entry 194 (class 1259 OID 19468)
-- Dependencies: 6
-- Name: participante_capacitacion; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE participante_capacitacion (
    par_id integer NOT NULL,
    cap_id integer NOT NULL,
    par_cap_participa boolean
);


ALTER TABLE public.participante_capacitacion OWNER TO smpfgl;

--
-- TOC entry 195 (class 1259 OID 19471)
-- Dependencies: 193 6
-- Name: participante_par_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE participante_par_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.participante_par_id_seq OWNER TO smpfgl;

--
-- TOC entry 2310 (class 0 OID 0)
-- Dependencies: 195
-- Name: participante_par_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE participante_par_id_seq OWNED BY participante.par_id;


--
-- TOC entry 2311 (class 0 OID 0)
-- Dependencies: 195
-- Name: participante_par_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('participante_par_id_seq', 1, true);


--
-- TOC entry 196 (class 1259 OID 19473)
-- Dependencies: 6
-- Name: participante_taller; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE participante_taller (
    par_id integer NOT NULL,
    tal_id integer NOT NULL,
    par_tal_participa boolean
);


ALTER TABLE public.participante_taller OWNER TO smpfgl;

--
-- TOC entry 197 (class 1259 OID 19476)
-- Dependencies: 6
-- Name: personal_enlace; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE personal_enlace (
    per_enl_id integer NOT NULL,
    acu_mun_id integer NOT NULL,
    per_enl_nombre character varying(50) NOT NULL,
    per_enl_apellido character varying(50) NOT NULL,
    per_enl_sexo character(1) NOT NULL,
    per_enl_cargo character varying(30) NOT NULL
);


ALTER TABLE public.personal_enlace OWNER TO smpfgl;

--
-- TOC entry 198 (class 1259 OID 19479)
-- Dependencies: 6 197
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE personal_enlace_per_enl_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.personal_enlace_per_enl_id_seq OWNER TO smpfgl;

--
-- TOC entry 2312 (class 0 OID 0)
-- Dependencies: 198
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE personal_enlace_per_enl_id_seq OWNED BY personal_enlace.per_enl_id;


--
-- TOC entry 2313 (class 0 OID 0)
-- Dependencies: 198
-- Name: personal_enlace_per_enl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('personal_enlace_per_enl_id_seq', 1, false);


--
-- TOC entry 199 (class 1259 OID 19481)
-- Dependencies: 6
-- Name: presupuesto; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE presupuesto (
    pre_id integer NOT NULL,
    com_id integer NOT NULL,
    pre_tipo integer NOT NULL,
    pre_cantidad numeric(10,2) NOT NULL
);


ALTER TABLE public.presupuesto OWNER TO smpfgl;

--
-- TOC entry 200 (class 1259 OID 19484)
-- Dependencies: 6 199
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE presupuesto_pre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.presupuesto_pre_id_seq OWNER TO smpfgl;

--
-- TOC entry 2314 (class 0 OID 0)
-- Dependencies: 200
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE presupuesto_pre_id_seq OWNED BY presupuesto.pre_id;


--
-- TOC entry 2315 (class 0 OID 0)
-- Dependencies: 200
-- Name: presupuesto_pre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('presupuesto_pre_id_seq', 1, false);


--
-- TOC entry 201 (class 1259 OID 19486)
-- Dependencies: 6
-- Name: proyecto; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
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


ALTER TABLE public.proyecto OWNER TO smpfgl;

--
-- TOC entry 202 (class 1259 OID 19492)
-- Dependencies: 6
-- Name: region; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE region (
    reg_id integer NOT NULL,
    reg_nombre character varying(50) NOT NULL,
    reg_direccion character varying(100)
);


ALTER TABLE public.region OWNER TO smpfgl;

--
-- TOC entry 203 (class 1259 OID 19495)
-- Dependencies: 6 202
-- Name: region_reg_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE region_reg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.region_reg_id_seq OWNER TO smpfgl;

--
-- TOC entry 2316 (class 0 OID 0)
-- Dependencies: 203
-- Name: region_reg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE region_reg_id_seq OWNED BY region.reg_id;


--
-- TOC entry 2317 (class 0 OID 0)
-- Dependencies: 203
-- Name: region_reg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('region_reg_id_seq', 1, true);


--
-- TOC entry 204 (class 1259 OID 19497)
-- Dependencies: 6
-- Name: reunion; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
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


ALTER TABLE public.reunion OWNER TO smpfgl;

--
-- TOC entry 205 (class 1259 OID 19503)
-- Dependencies: 6 204
-- Name: reunion_reu_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE reunion_reu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.reunion_reu_id_seq OWNER TO smpfgl;

--
-- TOC entry 2318 (class 0 OID 0)
-- Dependencies: 205
-- Name: reunion_reu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE reunion_reu_id_seq OWNED BY reunion.reu_id;


--
-- TOC entry 2319 (class 0 OID 0)
-- Dependencies: 205
-- Name: reunion_reu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('reunion_reu_id_seq', 1, true);


--
-- TOC entry 206 (class 1259 OID 19505)
-- Dependencies: 6
-- Name: rol; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE rol (
    rol_id integer NOT NULL,
    rol_nombre character varying(25) NOT NULL
);


ALTER TABLE public.rol OWNER TO smpfgl;

--
-- TOC entry 207 (class 1259 OID 19508)
-- Dependencies: 6
-- Name: rol_opcion_sistema; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE rol_opcion_sistema (
    rol_id integer NOT NULL,
    opc_sis_id integer NOT NULL,
    rol_opc_sis_id integer NOT NULL
);


ALTER TABLE public.rol_opcion_sistema OWNER TO smpfgl;

--
-- TOC entry 208 (class 1259 OID 19511)
-- Dependencies: 6 207
-- Name: rol_opcion_sistema_rol_opc_sis_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE rol_opcion_sistema_rol_opc_sis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rol_opcion_sistema_rol_opc_sis_id_seq OWNER TO smpfgl;

--
-- TOC entry 2320 (class 0 OID 0)
-- Dependencies: 208
-- Name: rol_opcion_sistema_rol_opc_sis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE rol_opcion_sistema_rol_opc_sis_id_seq OWNED BY rol_opcion_sistema.rol_opc_sis_id;


--
-- TOC entry 2321 (class 0 OID 0)
-- Dependencies: 208
-- Name: rol_opcion_sistema_rol_opc_sis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('rol_opcion_sistema_rol_opc_sis_id_seq', 7, true);


--
-- TOC entry 209 (class 1259 OID 19513)
-- Dependencies: 6 206
-- Name: rol_rol_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE rol_rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rol_rol_id_seq OWNER TO smpfgl;

--
-- TOC entry 2322 (class 0 OID 0)
-- Dependencies: 209
-- Name: rol_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE rol_rol_id_seq OWNED BY rol.rol_id;


--
-- TOC entry 2323 (class 0 OID 0)
-- Dependencies: 209
-- Name: rol_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('rol_rol_id_seq', 3, true);


--
-- TOC entry 210 (class 1259 OID 19515)
-- Dependencies: 6
-- Name: taller; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE taller (
    tal_id integer NOT NULL,
    tal_fecha date NOT NULL,
    tal_facilitador character varying(100) NOT NULL,
    tal_observacion text
);


ALTER TABLE public.taller OWNER TO smpfgl;

--
-- TOC entry 211 (class 1259 OID 19521)
-- Dependencies: 6 210
-- Name: taller_tal_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE taller_tal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.taller_tal_id_seq OWNER TO smpfgl;

--
-- TOC entry 2324 (class 0 OID 0)
-- Dependencies: 211
-- Name: taller_tal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE taller_tal_id_seq OWNED BY taller.tal_id;


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 211
-- Name: taller_tal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('taller_tal_id_seq', 1, false);


--
-- TOC entry 212 (class 1259 OID 19523)
-- Dependencies: 6
-- Name: telefono; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE telefono (
    reg_id integer,
    ase_mun_id integer,
    tel_numero character varying(9) NOT NULL,
    tel_id integer NOT NULL
);


ALTER TABLE public.telefono OWNER TO smpfgl;

--
-- TOC entry 213 (class 1259 OID 19526)
-- Dependencies: 6 212
-- Name: telefono_tel_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE telefono_tel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.telefono_tel_id_seq OWNER TO smpfgl;

--
-- TOC entry 2326 (class 0 OID 0)
-- Dependencies: 213
-- Name: telefono_tel_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE telefono_tel_id_seq OWNED BY telefono.tel_id;


--
-- TOC entry 2327 (class 0 OID 0)
-- Dependencies: 213
-- Name: telefono_tel_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('telefono_tel_id_seq', 1, false);


--
-- TOC entry 214 (class 1259 OID 19528)
-- Dependencies: 2068 6
-- Name: user_autologin; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone NOT NULL
);


ALTER TABLE public.user_autologin OWNER TO smpfgl;

--
-- TOC entry 215 (class 1259 OID 19532)
-- Dependencies: 2069 2070 6
-- Name: user_profiles; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE TABLE user_profiles (
    id integer NOT NULL,
    user_id integer NOT NULL,
    country character varying(20) DEFAULT NULL::character varying,
    website character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.user_profiles OWNER TO smpfgl;

--
-- TOC entry 216 (class 1259 OID 19537)
-- Dependencies: 215 6
-- Name: user_profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE user_profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.user_profiles_id_seq OWNER TO smpfgl;

--
-- TOC entry 2328 (class 0 OID 0)
-- Dependencies: 216
-- Name: user_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE user_profiles_id_seq OWNED BY user_profiles.id;


--
-- TOC entry 2329 (class 0 OID 0)
-- Dependencies: 216
-- Name: user_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('user_profiles_id_seq', 1, true);


--
-- TOC entry 217 (class 1259 OID 19539)
-- Dependencies: 2072 2073 2074 2075 2076 2077 6
-- Name: users; Type: TABLE; Schema: public; Owner: smpfgl; Tablespace: 
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
    rol_id integer
);


ALTER TABLE public.users OWNER TO smpfgl;

--
-- TOC entry 218 (class 1259 OID 19551)
-- Dependencies: 217 6
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: smpfgl
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO smpfgl;

--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 218
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: smpfgl
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 218
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: smpfgl
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- TOC entry 2035 (class 2604 OID 19553)
-- Dependencies: 145 144
-- Name: act_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY actividad ALTER COLUMN act_id SET DEFAULT nextval('actividad_act_id_seq'::regclass);


--
-- TOC entry 2036 (class 2604 OID 19554)
-- Dependencies: 147 146
-- Name: acu_mun_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY acuerdo_municipal ALTER COLUMN acu_mun_id SET DEFAULT nextval('acuerdo_municipal_acu_mun_id_seq'::regclass);


--
-- TOC entry 2037 (class 2604 OID 19555)
-- Dependencies: 150 149
-- Name: cap_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY capacitacion ALTER COLUMN cap_id SET DEFAULT nextval('capacitacion_cap_id_seq'::regclass);


--
-- TOC entry 2041 (class 2604 OID 19556)
-- Dependencies: 153 152
-- Name: com_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY componente ALTER COLUMN com_id SET DEFAULT nextval('componente_com_id_seq'::regclass);


--
-- TOC entry 2033 (class 2604 OID 19557)
-- Dependencies: 141 140
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY consultor ALTER COLUMN con_id SET DEFAULT nextval('"Consultor_con_id_seq"'::regclass);


--
-- TOC entry 2042 (class 2604 OID 19558)
-- Dependencies: 156 154
-- Name: con_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY contrapartida ALTER COLUMN con_id SET DEFAULT nextval('contrapartida_con_id_seq'::regclass);


--
-- TOC entry 2043 (class 2604 OID 19559)
-- Dependencies: 159 157
-- Name: cri_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY criterio ALTER COLUMN cri_id SET DEFAULT nextval('criterio_cri_id_seq'::regclass);


--
-- TOC entry 2044 (class 2604 OID 19560)
-- Dependencies: 162 161
-- Name: cum_min_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY cumplimiento_minimo ALTER COLUMN cum_min_id SET DEFAULT nextval('cumplimiento_minimo_cum_min_id_seq'::regclass);


--
-- TOC entry 2045 (class 2604 OID 19561)
-- Dependencies: 164 163
-- Name: dec_int_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY declaracion_interes ALTER COLUMN dec_int_id SET DEFAULT nextval('declaracion_interes_dec_int_id_seq'::regclass);


--
-- TOC entry 2046 (class 2604 OID 19562)
-- Dependencies: 166 165
-- Name: dep_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY departamento ALTER COLUMN dep_id SET DEFAULT nextval('departamento_dep_id_seq'::regclass);


--
-- TOC entry 2047 (class 2604 OID 19563)
-- Dependencies: 168 167
-- Name: ema_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY email ALTER COLUMN ema_id SET DEFAULT nextval('email_ema_id_seq'::regclass);


--
-- TOC entry 2048 (class 2604 OID 19939)
-- Dependencies: 219 169
-- Name: eta_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY etapa ALTER COLUMN eta_id SET DEFAULT nextval('etapa_eta_id_seq'::regclass);


--
-- TOC entry 2049 (class 2604 OID 19564)
-- Dependencies: 172 171
-- Name: fue_pri_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY fuente_primaria ALTER COLUMN fue_pri_id SET DEFAULT nextval('fuente_primaria_fue_pri_id_seq'::regclass);


--
-- TOC entry 2050 (class 2604 OID 19565)
-- Dependencies: 174 173
-- Name: fue_sec_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY fuente_secundaria ALTER COLUMN fue_sec_id SET DEFAULT nextval('fuente_secundaria_fue_sec_id_seq'::regclass);


--
-- TOC entry 2051 (class 2604 OID 19566)
-- Dependencies: 177 176
-- Name: ind_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY indicador ALTER COLUMN ind_id SET DEFAULT nextval('indicador_ind_id_seq'::regclass);


--
-- TOC entry 2052 (class 2604 OID 19567)
-- Dependencies: 179 178
-- Name: inf_pre_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY informe_preliminar ALTER COLUMN inf_pre_id SET DEFAULT nextval('informe_preliminar_inf_pre_id_seq'::regclass);


--
-- TOC entry 2053 (class 2604 OID 19568)
-- Dependencies: 181 180
-- Name: ins_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY institucion ALTER COLUMN ins_id SET DEFAULT nextval('institucion_ins_id_seq'::regclass);


--
-- TOC entry 2054 (class 2604 OID 19569)
-- Dependencies: 183 182
-- Name: inv_inf_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY inventario_informacion ALTER COLUMN inv_inf_id SET DEFAULT nextval('inventario_informacion_inv_inf_id_seq'::regclass);


--
-- TOC entry 2055 (class 2604 OID 19570)
-- Dependencies: 185 184
-- Name: id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- TOC entry 2056 (class 2604 OID 19571)
-- Dependencies: 187 186
-- Name: men_cor_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY mensaje_correo ALTER COLUMN men_cor_id SET DEFAULT nextval('mensaje_correo_men_cor_id_seq'::regclass);


--
-- TOC entry 2057 (class 2604 OID 19572)
-- Dependencies: 190 188
-- Name: mun_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio ALTER COLUMN mun_id SET DEFAULT nextval('municipio_mun_id_seq'::regclass);


--
-- TOC entry 2058 (class 2604 OID 19573)
-- Dependencies: 192 191
-- Name: opc_sis_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY opcion_sistema ALTER COLUMN opc_sis_id SET DEFAULT nextval('opcion_sistema_opc_sis_id_seq'::regclass);


--
-- TOC entry 2059 (class 2604 OID 19574)
-- Dependencies: 195 193
-- Name: par_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante ALTER COLUMN par_id SET DEFAULT nextval('participante_par_id_seq'::regclass);


--
-- TOC entry 2060 (class 2604 OID 19575)
-- Dependencies: 198 197
-- Name: per_enl_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY personal_enlace ALTER COLUMN per_enl_id SET DEFAULT nextval('personal_enlace_per_enl_id_seq'::regclass);


--
-- TOC entry 2061 (class 2604 OID 19576)
-- Dependencies: 200 199
-- Name: pre_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY presupuesto ALTER COLUMN pre_id SET DEFAULT nextval('presupuesto_pre_id_seq'::regclass);


--
-- TOC entry 2034 (class 2604 OID 19577)
-- Dependencies: 143 142
-- Name: pro_pep_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep ALTER COLUMN pro_pep_id SET DEFAULT nextval('"Proyecto_Pep_pro_pep_id_seq"'::regclass);


--
-- TOC entry 2062 (class 2604 OID 19578)
-- Dependencies: 203 202
-- Name: reg_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY region ALTER COLUMN reg_id SET DEFAULT nextval('region_reg_id_seq'::regclass);


--
-- TOC entry 2063 (class 2604 OID 19579)
-- Dependencies: 205 204
-- Name: reu_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY reunion ALTER COLUMN reu_id SET DEFAULT nextval('reunion_reu_id_seq'::regclass);


--
-- TOC entry 2064 (class 2604 OID 19580)
-- Dependencies: 209 206
-- Name: rol_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY rol ALTER COLUMN rol_id SET DEFAULT nextval('rol_rol_id_seq'::regclass);


--
-- TOC entry 2065 (class 2604 OID 19581)
-- Dependencies: 208 207
-- Name: rol_opc_sis_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY rol_opcion_sistema ALTER COLUMN rol_opc_sis_id SET DEFAULT nextval('rol_opcion_sistema_rol_opc_sis_id_seq'::regclass);


--
-- TOC entry 2066 (class 2604 OID 19582)
-- Dependencies: 211 210
-- Name: tal_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY taller ALTER COLUMN tal_id SET DEFAULT nextval('taller_tal_id_seq'::regclass);


--
-- TOC entry 2067 (class 2604 OID 19583)
-- Dependencies: 213 212
-- Name: tel_id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY telefono ALTER COLUMN tel_id SET DEFAULT nextval('telefono_tel_id_seq'::regclass);


--
-- TOC entry 2071 (class 2604 OID 19584)
-- Dependencies: 216 215
-- Name: id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY user_profiles ALTER COLUMN id SET DEFAULT nextval('user_profiles_id_seq'::regclass);


--
-- TOC entry 2078 (class 2604 OID 19585)
-- Dependencies: 218 217
-- Name: id; Type: DEFAULT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2215 (class 0 OID 19302)
-- Dependencies: 144
-- Data for Name: actividad; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY actividad (act_id, com_id, act_act_id, act_codigo, act_descripcion) FROM stdin;
\.


--
-- TOC entry 2216 (class 0 OID 19310)
-- Dependencies: 146
-- Data for Name: acuerdo_municipal; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY acuerdo_municipal (acu_mun_id, acu_mun_fecha, acu_mun_archivo, acu_mun_p1, acu_mun_p2, acu_mun_observacion, pro_pep_id) FROM stdin;
\.


--
-- TOC entry 2217 (class 0 OID 19318)
-- Dependencies: 148
-- Data for Name: asesor_municipal; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY asesor_municipal (ase_mun_id, reg_id, ase_mun_nombre, ase_mun_apellido, ase_mun_cargo) FROM stdin;
\.


--
-- TOC entry 2218 (class 0 OID 19321)
-- Dependencies: 149
-- Data for Name: capacitacion; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY capacitacion (cap_id, cap_fecha, cap_tema, cap_lugar, cap_facilitador, cap_observacion) FROM stdin;
\.


--
-- TOC entry 2219 (class 0 OID 19329)
-- Dependencies: 151
-- Data for Name: ci_sessions; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
a3459394bc16d1322c1ac0ca6e933f09	127.0.0.1	Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11	1345782447	a:1:{s:9:"user_data";s:0:"";}
5f8687ef5b6952ba1096dc59c740e9ee	127.0.0.1	Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11	1345780157	
c1525834779530c35a027b92a2adbc7e	127.0.0.1	Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11	1345780258	
7310ca4da4bfbc4214f2b65566e38979	127.0.0.1	Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11	1345781676	a:2:{s:9:"user_data";s:0:"";s:17:"flash:old:message";s:103:"Your activation key is incorrect or expired. Please check your email again and follow the instructions.";}
c63f8ed6d1241e5dc57101ff2c3d8c11	127.0.0.1	Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11	1345781816	
\.


--
-- TOC entry 2220 (class 0 OID 19338)
-- Dependencies: 152
-- Data for Name: componente; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY componente (com_id, com_com_id, pro_id, com_codigo, com_nombre, com_objetivo, com_resultado) FROM stdin;
\.


--
-- TOC entry 2213 (class 0 OID 19289)
-- Dependencies: 140
-- Data for Name: consultor; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY consultor (con_id, con_nombre, con_apellido, con_telefono, con_email) FROM stdin;
\.


--
-- TOC entry 2221 (class 0 OID 19346)
-- Dependencies: 154
-- Data for Name: contrapartida; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY contrapartida (con_id, con_nombre) FROM stdin;
1	Locales para reuniones
3	Alimentación
4	Materiales y Equipo
5	Personal
2	Transporte
\.


--
-- TOC entry 2222 (class 0 OID 19349)
-- Dependencies: 155
-- Data for Name: contrapartida_acuerdo; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY contrapartida_acuerdo (acu_mun_id, con_id, con_acu_valor) FROM stdin;
\.


--
-- TOC entry 2223 (class 0 OID 19354)
-- Dependencies: 157
-- Data for Name: criterio; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY criterio (cri_id, cri_nombre) FROM stdin;
1	Representatividad
2	Proporcionalidad
3	Pluralidad
4	Equidad
\.


--
-- TOC entry 2224 (class 0 OID 19357)
-- Dependencies: 158
-- Data for Name: criterio_acuerdo; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY criterio_acuerdo (cri_id, acu_mun_id, cri_acu_valor) FROM stdin;
\.


--
-- TOC entry 2225 (class 0 OID 19362)
-- Dependencies: 160
-- Data for Name: cumplimiento_informe; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY cumplimiento_informe (inf_pre_id, cum_min_id, cum_inf_valor) FROM stdin;
\.


--
-- TOC entry 2226 (class 0 OID 19365)
-- Dependencies: 161
-- Data for Name: cumplimiento_minimo; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY cumplimiento_minimo (cum_min_id, cum_min_nombre) FROM stdin;
\.


--
-- TOC entry 2227 (class 0 OID 19370)
-- Dependencies: 163
-- Data for Name: declaracion_interes; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY declaracion_interes (dec_int_id, dec_int_fecha, dec_int_lugar, dec_int_comentario, dec_int_archivo) FROM stdin;
\.


--
-- TOC entry 2228 (class 0 OID 19378)
-- Dependencies: 165
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY departamento (dep_id, reg_id, dep_nombre) FROM stdin;
1	1	San Salvador
\.


--
-- TOC entry 2229 (class 0 OID 19383)
-- Dependencies: 167
-- Data for Name: email; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY email (reg_id, ase_mun_id, ema_cuenta, ema_id) FROM stdin;
\.


--
-- TOC entry 2230 (class 0 OID 19388)
-- Dependencies: 169
-- Data for Name: etapa; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY etapa (eta_nombre, eta_id) FROM stdin;
Etapa 1	1
\.


--
-- TOC entry 2231 (class 0 OID 19391)
-- Dependencies: 170
-- Data for Name: fecha_recepcion_observacion_din; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY fecha_recepcion_observacion_din (fec_correlativo, pro_id, fec_rec_din, fec_obs_din) FROM stdin;
\.


--
-- TOC entry 2232 (class 0 OID 19394)
-- Dependencies: 171
-- Data for Name: fuente_primaria; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY fuente_primaria (fue_pri_id, inv_inf_id, fue_pri_nombre, fue_pri_institucion, fue_pri_cargo, fue_pri_telefono, fue_pri_nombre_doc) FROM stdin;
\.


--
-- TOC entry 2233 (class 0 OID 19399)
-- Dependencies: 173
-- Data for Name: fuente_secundaria; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY fuente_secundaria (fue_sec_id, inv_inf_id, fue_sec_nombre, fue_sec_fuente, fue_sec_disponible_en, fue_sec_anio) FROM stdin;
\.


--
-- TOC entry 2234 (class 0 OID 19404)
-- Dependencies: 175
-- Data for Name: grupo_apoyo; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY grupo_apoyo (gru_apo_id, gru_apo_fecha, gru_apo_c3, gru_apo_c4, gru_apo_obs, pro_pep_id) FROM stdin;
\.


--
-- TOC entry 2235 (class 0 OID 19410)
-- Dependencies: 176
-- Data for Name: indicador; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY indicador (ind_id, com_id, ind_nombre, ind_tipo) FROM stdin;
\.


--
-- TOC entry 2236 (class 0 OID 19418)
-- Dependencies: 178
-- Data for Name: informe_preliminar; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY informe_preliminar (inf_pre_id, inf_pre_fecha_borrador, inf_pre_fecha_observacion, inf_pre_aceptacion, inf_pre_aceptada, inf_pre_firmam, inf_pre_firmai, inf_pre_firmau, inf_pre_archivo, inf_pre_observacion, pro_pep_id) FROM stdin;
\.


--
-- TOC entry 2237 (class 0 OID 19426)
-- Dependencies: 180
-- Data for Name: institucion; Type: TABLE DATA; Schema: public; Owner: smpfgl
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
-- TOC entry 2238 (class 0 OID 19431)
-- Dependencies: 182
-- Data for Name: inventario_informacion; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY inventario_informacion (inv_inf_id, inv_inf_observacion, pro_pep_id) FROM stdin;
\.


--
-- TOC entry 2239 (class 0 OID 19439)
-- Dependencies: 184
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY login_attempts (id, ip_address, login, "time") FROM stdin;
8	127.0.0.1	ffff	\N
9	127.0.0.1	fff	\N
10	127.0.0.1	ffff	\N
11	127.0.0.1	yyyyyyyy	\N
12	127.0.0.1	yyyyyyyy	\N
\.


--
-- TOC entry 2240 (class 0 OID 19444)
-- Dependencies: 186
-- Data for Name: mensaje_correo; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY mensaje_correo (men_cor_id, men_cor_asunto, men_cor_cuerpo) FROM stdin;
\.


--
-- TOC entry 2241 (class 0 OID 19452)
-- Dependencies: 188
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY municipio (mun_id, inv_inf_id, dep_id, pro_id, mun_nombre, mun_presupuesto) FROM stdin;
1	\N	1	\N	San Salvador	1200.00
\.


--
-- TOC entry 2242 (class 0 OID 19455)
-- Dependencies: 189
-- Data for Name: municipio_componente; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY municipio_componente (com_id, mun_id, mun_com_asignacion) FROM stdin;
\.


--
-- TOC entry 2243 (class 0 OID 19460)
-- Dependencies: 191
-- Data for Name: opcion_sistema; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY opcion_sistema (opc_sis_id, opc_sis_nombre, opc_sis_url, opc_opc_sis_id) FROM stdin;
1	Componente 1	componente1/componente1	\N
2	Componente 2	componente2/componente2	\N
4	Componente 4	componente4/componente4	\N
3	Componente 3	componente3/componente3	\N
5	Sub-Componente 2.3.	componente2/subComp23/	2
6	Etapa 1	componente2/subComp23/etapa1/	5
7	Reuniones	componente2/subComp23/etapa1_producto1	6
8	Acuerdo Municipal	componente2/subComp23/etapa1_producto11	6
9	Sub-Componente 2.2.	componente2/subComp22/	2
\.


--
-- TOC entry 2244 (class 0 OID 19465)
-- Dependencies: 193
-- Data for Name: participante; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY participante (par_id, gru_apo_id, reu_id, ins_id, dec_int_id, inf_pre_id, par_nombre, par_apellido, par_sexo, par_cargo, par_edad, par_nivel_esco, par_tel) FROM stdin;
1	\N	1	\N	\N	\N	Karen Elvira	Peñate Aviles	F	Administradora	24	\N	7808-3064
\.


--
-- TOC entry 2245 (class 0 OID 19468)
-- Dependencies: 194
-- Data for Name: participante_capacitacion; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY participante_capacitacion (par_id, cap_id, par_cap_participa) FROM stdin;
\.


--
-- TOC entry 2246 (class 0 OID 19473)
-- Dependencies: 196
-- Data for Name: participante_taller; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY participante_taller (par_id, tal_id, par_tal_participa) FROM stdin;
\.


--
-- TOC entry 2247 (class 0 OID 19476)
-- Dependencies: 197
-- Data for Name: personal_enlace; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY personal_enlace (per_enl_id, acu_mun_id, per_enl_nombre, per_enl_apellido, per_enl_sexo, per_enl_cargo) FROM stdin;
\.


--
-- TOC entry 2248 (class 0 OID 19481)
-- Dependencies: 199
-- Data for Name: presupuesto; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY presupuesto (pre_id, com_id, pre_tipo, pre_cantidad) FROM stdin;
\.


--
-- TOC entry 2249 (class 0 OID 19486)
-- Dependencies: 201
-- Data for Name: proyecto; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY proyecto (pro_id, mun_id, com_id, pro_codigo, pro_nombre, pro_num_ord_llegada, pro_zona_fisdl, pro_nom_formulador, pro_nom_ref_tec_municipal, pro_email_ref_tec_municipal, pro_tel_ref_tec_municipal, pro_nom_ase_fisdl, pro_email_ase_fisdl, pro_tel_ase_fisdl, pro_fec_ent_gl_fisdl, pro_fec_ent_gop_gpr, pro_rec_gpr, pro_fec_ent_gpr_din, pro_estatus, pro_mon_ejecucion, pro_fec_visita, pro_num_rev, pro_fec_visado, pro_mon_visado, pro_obs_din, pro_tipologia, pro_sal_par_ciudadana, pro_sal_pue_indigenas, pro_sal_rea_involuntario) FROM stdin;
\.


--
-- TOC entry 2214 (class 0 OID 19294)
-- Dependencies: 142
-- Data for Name: proyecto_pep; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY proyecto_pep (pro_pep_id, pro_pep_nombre, pro_pep_descripcion, mun_id, acu_mun_id, inf_pre_id, inv_inf_id, gru_apo_id) FROM stdin;
1	Proyecto para arreglar una calle	Se necesita arreglar la calle para un mejor trafico	1	\N	\N	\N	\N
\.


--
-- TOC entry 2250 (class 0 OID 19492)
-- Dependencies: 202
-- Data for Name: region; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY region (reg_id, reg_nombre, reg_direccion) FROM stdin;
1	Región Central	San salvador
\.


--
-- TOC entry 2251 (class 0 OID 19497)
-- Dependencies: 204
-- Data for Name: reunion; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY reunion (reu_id, eta_id, reu_numero, reu_fecha, reu_duracion_horas, reu_tema, reu_resultado, reu_observacion, pro_pep_id) FROM stdin;
1	1	1	2012-08-28	3	Para estudio preliminar	Avance de la justificacion	\N	1
\.


--
-- TOC entry 2252 (class 0 OID 19505)
-- Dependencies: 206
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY rol (rol_id, rol_nombre) FROM stdin;
1	administrador
2	consultor
3	karen
\.


--
-- TOC entry 2253 (class 0 OID 19508)
-- Dependencies: 207
-- Data for Name: rol_opcion_sistema; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY rol_opcion_sistema (rol_id, opc_sis_id, rol_opc_sis_id) FROM stdin;
1	2	1
1	5	2
1	6	3
1	7	4
1	8	5
1	1	6
1	9	7
\.


--
-- TOC entry 2254 (class 0 OID 19515)
-- Dependencies: 210
-- Data for Name: taller; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY taller (tal_id, tal_fecha, tal_facilitador, tal_observacion) FROM stdin;
\.


--
-- TOC entry 2255 (class 0 OID 19523)
-- Dependencies: 212
-- Data for Name: telefono; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY telefono (reg_id, ase_mun_id, tel_numero, tel_id) FROM stdin;
\.


--
-- TOC entry 2256 (class 0 OID 19528)
-- Dependencies: 214
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY user_autologin (key_id, user_id, user_agent, last_ip, last_login) FROM stdin;
\.


--
-- TOC entry 2257 (class 0 OID 19532)
-- Dependencies: 215
-- Data for Name: user_profiles; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY user_profiles (id, user_id, country, website) FROM stdin;
1	2	\N	\N
\.


--
-- TOC entry 2258 (class 0 OID 19539)
-- Dependencies: 217
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: smpfgl
--

COPY users (id, username, password, email, activated, banned, ban_reason, new_password_key, new_password_requested, new_email, new_email_key, last_ip, last_login, created, modified, rol_id) FROM stdin;
1	admin	$2a$08$pnhlrmeb92XP2TS/O8vgAOTO/dhv16a5olAYnUj8DsKhXXnkruwhm	karensita_2410@hotmail.com	1	0	\N	74828f8b5fef84dc95a3b982a95fc507	2012-08-27	\N	\N	127.0.0.1	2012-08-23	2012-08-19	\N	1
\.


--
-- TOC entry 2093 (class 2606 OID 19587)
-- Dependencies: 151 151
-- Name: ci_sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY ci_sessions
    ADD CONSTRAINT ci_sessions_pkey PRIMARY KEY (session_id);


--
-- TOC entry 2127 (class 2606 OID 19589)
-- Dependencies: 184 184
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- TOC entry 2084 (class 2606 OID 19591)
-- Dependencies: 144 144
-- Name: pk_actividad; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT pk_actividad PRIMARY KEY (act_id);


--
-- TOC entry 2087 (class 2606 OID 19593)
-- Dependencies: 146 146
-- Name: pk_acuerdo_municipal; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT pk_acuerdo_municipal PRIMARY KEY (acu_mun_id);


--
-- TOC entry 2089 (class 2606 OID 19595)
-- Dependencies: 148 148
-- Name: pk_asesor_municipal; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY asesor_municipal
    ADD CONSTRAINT pk_asesor_municipal PRIMARY KEY (ase_mun_id);


--
-- TOC entry 2091 (class 2606 OID 19597)
-- Dependencies: 149 149
-- Name: pk_capacitacion; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY capacitacion
    ADD CONSTRAINT pk_capacitacion PRIMARY KEY (cap_id);


--
-- TOC entry 2095 (class 2606 OID 19599)
-- Dependencies: 152 152
-- Name: pk_componente; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT pk_componente PRIMARY KEY (com_id);


--
-- TOC entry 2080 (class 2606 OID 19601)
-- Dependencies: 140 140
-- Name: pk_con_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY consultor
    ADD CONSTRAINT pk_con_id PRIMARY KEY (con_id);


--
-- TOC entry 2097 (class 2606 OID 19603)
-- Dependencies: 154 154
-- Name: pk_contrapartida; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY contrapartida
    ADD CONSTRAINT pk_contrapartida PRIMARY KEY (con_id);


--
-- TOC entry 2099 (class 2606 OID 19605)
-- Dependencies: 157 157
-- Name: pk_criterio; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY criterio
    ADD CONSTRAINT pk_criterio PRIMARY KEY (cri_id);


--
-- TOC entry 2101 (class 2606 OID 19607)
-- Dependencies: 161 161
-- Name: pk_cumplimiento_minimo; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY cumplimiento_minimo
    ADD CONSTRAINT pk_cumplimiento_minimo PRIMARY KEY (cum_min_id);


--
-- TOC entry 2103 (class 2606 OID 19609)
-- Dependencies: 163 163
-- Name: pk_declaracion_interes; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY declaracion_interes
    ADD CONSTRAINT pk_declaracion_interes PRIMARY KEY (dec_int_id);


--
-- TOC entry 2105 (class 2606 OID 19611)
-- Dependencies: 165 165
-- Name: pk_departamento; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT pk_departamento PRIMARY KEY (dep_id);


--
-- TOC entry 2107 (class 2606 OID 19613)
-- Dependencies: 167 167
-- Name: pk_ema_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY email
    ADD CONSTRAINT pk_ema_id PRIMARY KEY (ema_id);


--
-- TOC entry 2109 (class 2606 OID 19944)
-- Dependencies: 169 169
-- Name: pk_eta_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY etapa
    ADD CONSTRAINT pk_eta_id PRIMARY KEY (eta_id);


--
-- TOC entry 2111 (class 2606 OID 19617)
-- Dependencies: 170 170
-- Name: pk_fecha_recepcion_observacion; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT pk_fecha_recepcion_observacion PRIMARY KEY (fec_correlativo);


--
-- TOC entry 2113 (class 2606 OID 19619)
-- Dependencies: 171 171
-- Name: pk_fuente_primaria; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT pk_fuente_primaria PRIMARY KEY (fue_pri_id);


--
-- TOC entry 2115 (class 2606 OID 19621)
-- Dependencies: 173 173
-- Name: pk_fuente_secundaria; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT pk_fuente_secundaria PRIMARY KEY (fue_sec_id);


--
-- TOC entry 2117 (class 2606 OID 19623)
-- Dependencies: 175 175
-- Name: pk_grupo_apoyo; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT pk_grupo_apoyo PRIMARY KEY (gru_apo_id);


--
-- TOC entry 2119 (class 2606 OID 19625)
-- Dependencies: 176 176
-- Name: pk_indicador; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT pk_indicador PRIMARY KEY (ind_id);


--
-- TOC entry 2121 (class 2606 OID 19627)
-- Dependencies: 178 178
-- Name: pk_informe_preliminar; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT pk_informe_preliminar PRIMARY KEY (inf_pre_id);


--
-- TOC entry 2123 (class 2606 OID 19629)
-- Dependencies: 180 180
-- Name: pk_institucion; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY institucion
    ADD CONSTRAINT pk_institucion PRIMARY KEY (ins_id);


--
-- TOC entry 2125 (class 2606 OID 19631)
-- Dependencies: 182 182
-- Name: pk_inventario_informacion; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT pk_inventario_informacion PRIMARY KEY (inv_inf_id);


--
-- TOC entry 2129 (class 2606 OID 19633)
-- Dependencies: 186 186
-- Name: pk_mensaje_correo; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY mensaje_correo
    ADD CONSTRAINT pk_mensaje_correo PRIMARY KEY (men_cor_id);


--
-- TOC entry 2131 (class 2606 OID 19635)
-- Dependencies: 188 188
-- Name: pk_municipio; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (mun_id);


--
-- TOC entry 2133 (class 2606 OID 19637)
-- Dependencies: 191 191
-- Name: pk_opc_sis_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opc_sis_id PRIMARY KEY (opc_sis_id);


--
-- TOC entry 2135 (class 2606 OID 19639)
-- Dependencies: 193 193
-- Name: pk_participante; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT pk_participante PRIMARY KEY (par_id);


--
-- TOC entry 2137 (class 2606 OID 19641)
-- Dependencies: 197 197
-- Name: pk_personal_enlace; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT pk_personal_enlace PRIMARY KEY (per_enl_id);


--
-- TOC entry 2139 (class 2606 OID 19643)
-- Dependencies: 199 199
-- Name: pk_presupuesto; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT pk_presupuesto PRIMARY KEY (pre_id);


--
-- TOC entry 2082 (class 2606 OID 19645)
-- Dependencies: 142 142
-- Name: pk_pro_pep_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT pk_pro_pep_id PRIMARY KEY (pro_pep_id);


--
-- TOC entry 2141 (class 2606 OID 19647)
-- Dependencies: 201 201
-- Name: pk_proyecto; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT pk_proyecto PRIMARY KEY (pro_id);


--
-- TOC entry 2143 (class 2606 OID 19649)
-- Dependencies: 202 202
-- Name: pk_region; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY region
    ADD CONSTRAINT pk_region PRIMARY KEY (reg_id);


--
-- TOC entry 2145 (class 2606 OID 19651)
-- Dependencies: 204 204
-- Name: pk_reunion; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT pk_reunion PRIMARY KEY (reu_id);


--
-- TOC entry 2147 (class 2606 OID 19653)
-- Dependencies: 206 206
-- Name: pk_rol_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT pk_rol_id PRIMARY KEY (rol_id);


--
-- TOC entry 2149 (class 2606 OID 19655)
-- Dependencies: 207 207
-- Name: pk_rol_opc_sis_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT pk_rol_opc_sis_id PRIMARY KEY (rol_opc_sis_id);


--
-- TOC entry 2151 (class 2606 OID 19657)
-- Dependencies: 210 210
-- Name: pk_taller; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY taller
    ADD CONSTRAINT pk_taller PRIMARY KEY (tal_id);


--
-- TOC entry 2153 (class 2606 OID 19659)
-- Dependencies: 212 212
-- Name: pk_tel_id; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY telefono
    ADD CONSTRAINT pk_tel_id PRIMARY KEY (tel_id);


--
-- TOC entry 2155 (class 2606 OID 19661)
-- Dependencies: 214 214 214
-- Name: user_autologin_pkey; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT user_autologin_pkey PRIMARY KEY (key_id, user_id);


--
-- TOC entry 2157 (class 2606 OID 19663)
-- Dependencies: 215 215
-- Name: user_profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY user_profiles
    ADD CONSTRAINT user_profiles_pkey PRIMARY KEY (id);


--
-- TOC entry 2159 (class 2606 OID 19665)
-- Dependencies: 217 217
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: smpfgl; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2085 (class 1259 OID 19666)
-- Dependencies: 146
-- Name: fki_pk_proyecto_pep_acuerdo_municipal; Type: INDEX; Schema: public; Owner: smpfgl; Tablespace: 
--

CREATE INDEX fki_pk_proyecto_pep_acuerdo_municipal ON acuerdo_municipal USING btree (pro_pep_id);


--
-- TOC entry 2165 (class 2606 OID 19667)
-- Dependencies: 144 2083 144
-- Name: fk_activida_conformad_activida; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_conformad_activida FOREIGN KEY (act_act_id) REFERENCES actividad(act_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2166 (class 2606 OID 19672)
-- Dependencies: 152 2094 144
-- Name: fk_activida_posee_una_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY actividad
    ADD CONSTRAINT fk_activida_posee_una_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2160 (class 2606 OID 19677)
-- Dependencies: 142 146 2086
-- Name: fk_acuerdo_municipal_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_acuerdo_municipal_proyecto_pep FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id);


--
-- TOC entry 2168 (class 2606 OID 19682)
-- Dependencies: 2142 148 202
-- Name: fk_asesor_m_se_asigna_region; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY asesor_municipal
    ADD CONSTRAINT fk_asesor_m_se_asigna_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2169 (class 2606 OID 19687)
-- Dependencies: 2140 201 152
-- Name: fk_componen_programa2_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_programa2_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2170 (class 2606 OID 19692)
-- Dependencies: 152 2094 152
-- Name: fk_componen_se_divide_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY componente
    ADD CONSTRAINT fk_componen_se_divide_componen FOREIGN KEY (com_com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2171 (class 2606 OID 19697)
-- Dependencies: 2086 155 146
-- Name: fk_contrapa_aporta_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_aporta_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2172 (class 2606 OID 19702)
-- Dependencies: 2096 154 155
-- Name: fk_contrapa_conformad_contrapa; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY contrapartida_acuerdo
    ADD CONSTRAINT fk_contrapa_conformad_contrapa FOREIGN KEY (con_id) REFERENCES contrapartida(con_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2173 (class 2606 OID 19707)
-- Dependencies: 2098 158 157
-- Name: fk_criterio_conformad_criterio; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_conformad_criterio FOREIGN KEY (cri_id) REFERENCES criterio(cri_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2174 (class 2606 OID 19712)
-- Dependencies: 158 146 2086
-- Name: fk_criterio_cumple_acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY criterio_acuerdo
    ADD CONSTRAINT fk_criterio_cumple_acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2175 (class 2606 OID 19717)
-- Dependencies: 2100 160 161
-- Name: fk_cumplimi_cumplen_a_cumplimi; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_cumplen_a_cumplimi FOREIGN KEY (cum_min_id) REFERENCES cumplimiento_minimo(cum_min_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2176 (class 2606 OID 19722)
-- Dependencies: 2120 178 160
-- Name: fk_cumplimi_posee_alg_informe_; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY cumplimiento_informe
    ADD CONSTRAINT fk_cumplimi_posee_alg_informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2177 (class 2606 OID 19727)
-- Dependencies: 2142 165 202
-- Name: fk_departam_compuesto_region; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT fk_departam_compuesto_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2178 (class 2606 OID 19732)
-- Dependencies: 148 2088 167
-- Name: fk_email_se_comuni_asesor_m; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY email
    ADD CONSTRAINT fk_email_se_comuni_asesor_m FOREIGN KEY (ase_mun_id) REFERENCES asesor_municipal(ase_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2179 (class 2606 OID 19737)
-- Dependencies: 2142 167 202
-- Name: fk_email_se_contac_region; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY email
    ADD CONSTRAINT fk_email_se_contac_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2207 (class 2606 OID 19945)
-- Dependencies: 2108 204 169
-- Name: fk_etapa_reunion; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_etapa_reunion FOREIGN KEY (eta_id) REFERENCES etapa(eta_id);


--
-- TOC entry 2180 (class 2606 OID 19742)
-- Dependencies: 2140 170 201
-- Name: fk_fecha_re_din_tiene_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY fecha_recepcion_observacion_din
    ADD CONSTRAINT fk_fecha_re_din_tiene_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2181 (class 2606 OID 19747)
-- Dependencies: 2124 171 182
-- Name: fk_fuente_p_formado_inventar; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY fuente_primaria
    ADD CONSTRAINT fk_fuente_p_formado_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2182 (class 2606 OID 19752)
-- Dependencies: 2124 173 182
-- Name: fk_fuente_s_formado_p_inventar; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY fuente_secundaria
    ADD CONSTRAINT fk_fuente_s_formado_p_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2161 (class 2606 OID 19757)
-- Dependencies: 175 142 2116
-- Name: fk_grupo_apoyo_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_grupo_apoyo_proyecto_pep FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id);


--
-- TOC entry 2184 (class 2606 OID 19762)
-- Dependencies: 176 2094 152
-- Name: fk_indicado_posee_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY indicador
    ADD CONSTRAINT fk_indicado_posee_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2162 (class 2606 OID 19767)
-- Dependencies: 2120 142 178
-- Name: fk_informe_preliminar_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_informe_preliminar_proyecto_pep FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id);


--
-- TOC entry 2163 (class 2606 OID 19772)
-- Dependencies: 2124 142 182
-- Name: fk_inventario_informacion_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_inventario_informacion_proyecto_pep FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id);


--
-- TOC entry 2190 (class 2606 OID 19777)
-- Dependencies: 2094 152 189
-- Name: fk_municipi_comp_cuni_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_cuni_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2191 (class 2606 OID 19782)
-- Dependencies: 188 2130 189
-- Name: fk_municipi_comp_muni_municipi; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio_componente
    ADD CONSTRAINT fk_municipi_comp_muni_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2187 (class 2606 OID 19787)
-- Dependencies: 2104 188 165
-- Name: fk_municipi_conformad_departam; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipi_conformad_departam FOREIGN KEY (dep_id) REFERENCES departamento(dep_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2188 (class 2606 OID 19792)
-- Dependencies: 2124 188 182
-- Name: fk_municipi_puede_ten_inventar; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipi_puede_ten_inventar FOREIGN KEY (inv_inf_id) REFERENCES inventario_informacion(inv_inf_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2189 (class 2606 OID 19797)
-- Dependencies: 201 188 2140
-- Name: fk_municipi_se_realiz_proyecto; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT fk_municipi_se_realiz_proyecto FOREIGN KEY (pro_id) REFERENCES proyecto(pro_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2164 (class 2606 OID 19802)
-- Dependencies: 142 2130 188
-- Name: fk_municipio_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto_pep
    ADD CONSTRAINT fk_municipio_proyecto_pep FOREIGN KEY (mun_id) REFERENCES municipio(mun_id);


--
-- TOC entry 2208 (class 2606 OID 19807)
-- Dependencies: 207 191 2132
-- Name: fk_opcion_sistema_rol_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_opcion_sistema_rol_opcion_sistema FOREIGN KEY (opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- TOC entry 2200 (class 2606 OID 19812)
-- Dependencies: 210 2150 196
-- Name: fk_particip_asisten_a_taller; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante_taller
    ADD CONSTRAINT fk_particip_asisten_a_taller FOREIGN KEY (tal_id) REFERENCES taller(tal_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2201 (class 2606 OID 19817)
-- Dependencies: 196 193 2134
-- Name: fk_particip_asisten_particip; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante_taller
    ADD CONSTRAINT fk_particip_asisten_particip FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2193 (class 2606 OID 19822)
-- Dependencies: 2144 193 204
-- Name: fk_particip_asistente_reunion; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_asistente_reunion FOREIGN KEY (reu_id) REFERENCES reunion(reu_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2194 (class 2606 OID 19827)
-- Dependencies: 178 2120 193
-- Name: fk_particip_necesita__informe_; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita__informe_ FOREIGN KEY (inf_pre_id) REFERENCES informe_preliminar(inf_pre_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2195 (class 2606 OID 19832)
-- Dependencies: 2102 193 163
-- Name: fk_particip_necesita_declarac; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_necesita_declarac FOREIGN KEY (dec_int_id) REFERENCES declaracion_interes(dec_int_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2196 (class 2606 OID 19837)
-- Dependencies: 2122 180 193
-- Name: fk_particip_pueden_te_instituc; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_pueden_te_instituc FOREIGN KEY (ins_id) REFERENCES institucion(ins_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2198 (class 2606 OID 19842)
-- Dependencies: 2134 193 194
-- Name: fk_particip_reciben_particip; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_particip_reciben_particip FOREIGN KEY (par_id) REFERENCES participante(par_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2199 (class 2606 OID 19847)
-- Dependencies: 194 2090 149
-- Name: fk_particip_reciben_u_capacita; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante_capacitacion
    ADD CONSTRAINT fk_particip_reciben_u_capacita FOREIGN KEY (cap_id) REFERENCES capacitacion(cap_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2197 (class 2606 OID 19852)
-- Dependencies: 175 2116 193
-- Name: fk_particip_tiene_mie_grupo_ap; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY participante
    ADD CONSTRAINT fk_particip_tiene_mie_grupo_ap FOREIGN KEY (gru_apo_id) REFERENCES grupo_apoyo(gru_apo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2202 (class 2606 OID 19857)
-- Dependencies: 2086 146 197
-- Name: fk_personal_necesita__acuerdo_; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY personal_enlace
    ADD CONSTRAINT fk_personal_necesita__acuerdo_ FOREIGN KEY (acu_mun_id) REFERENCES acuerdo_municipal(acu_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2203 (class 2606 OID 19862)
-- Dependencies: 2094 199 152
-- Name: fk_presupue_se_asigna_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY presupuesto
    ADD CONSTRAINT fk_presupue_se_asigna_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2186 (class 2606 OID 19867)
-- Dependencies: 142 2081 182
-- Name: fk_proyecto_pep; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY inventario_informacion
    ADD CONSTRAINT fk_proyecto_pep FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2167 (class 2606 OID 19872)
-- Dependencies: 146 2081 142
-- Name: fk_proyecto_pep_acuerdo_municipal; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY acuerdo_municipal
    ADD CONSTRAINT fk_proyecto_pep_acuerdo_municipal FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2183 (class 2606 OID 19877)
-- Dependencies: 175 2081 142
-- Name: fk_proyecto_pep_grupo_apoyo; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY grupo_apoyo
    ADD CONSTRAINT fk_proyecto_pep_grupo_apoyo FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2185 (class 2606 OID 19882)
-- Dependencies: 2081 142 178
-- Name: fk_proyecto_pep_informe_preliminar; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY informe_preliminar
    ADD CONSTRAINT fk_proyecto_pep_informe_preliminar FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2206 (class 2606 OID 19887)
-- Dependencies: 142 2081 204
-- Name: fk_proyecto_pep_reunion; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY reunion
    ADD CONSTRAINT fk_proyecto_pep_reunion FOREIGN KEY (pro_pep_id) REFERENCES proyecto_pep(pro_pep_id);


--
-- TOC entry 2204 (class 2606 OID 19892)
-- Dependencies: 2094 201 152
-- Name: fk_proyecto_programa_componen; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_programa_componen FOREIGN KEY (com_id) REFERENCES componente(com_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2205 (class 2606 OID 19897)
-- Dependencies: 2130 188 201
-- Name: fk_proyecto_se_realiz_municipi; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY proyecto
    ADD CONSTRAINT fk_proyecto_se_realiz_municipi FOREIGN KEY (mun_id) REFERENCES municipio(mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2209 (class 2606 OID 19907)
-- Dependencies: 206 207 2146
-- Name: fk_rol_rol_sistema; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY rol_opcion_sistema
    ADD CONSTRAINT fk_rol_rol_sistema FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- TOC entry 2212 (class 2606 OID 19912)
-- Dependencies: 217 206 2146
-- Name: fk_rol_user; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY users
    ADD CONSTRAINT fk_rol_user FOREIGN KEY (rol_id) REFERENCES rol(rol_id);


--
-- TOC entry 2210 (class 2606 OID 19917)
-- Dependencies: 212 2142 202
-- Name: fk_telefono_informaci_region; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY telefono
    ADD CONSTRAINT fk_telefono_informaci_region FOREIGN KEY (reg_id) REFERENCES region(reg_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2211 (class 2606 OID 19922)
-- Dependencies: 212 148 2088
-- Name: fk_telefono_tiene_asesor_m; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY telefono
    ADD CONSTRAINT fk_telefono_tiene_asesor_m FOREIGN KEY (ase_mun_id) REFERENCES asesor_municipal(ase_mun_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2192 (class 2606 OID 19927)
-- Dependencies: 2132 191 191
-- Name: pk_opcion_sistema_opcion_sistema; Type: FK CONSTRAINT; Schema: public; Owner: smpfgl
--

ALTER TABLE ONLY opcion_sistema
    ADD CONSTRAINT pk_opcion_sistema_opcion_sistema FOREIGN KEY (opc_opc_sis_id) REFERENCES opcion_sistema(opc_sis_id);


--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2012-08-30 14:14:39 CST

--
-- PostgreSQL database dump complete
--

