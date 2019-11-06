--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.5
-- Dumped by pg_dump version 9.6.5

-- Started on 2018-09-16 20:00:21

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 185 (class 1259 OID 80196)
-- Name: acceso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE acceso (
    id bigint DEFAULT nextval(('"acceso_id_seq"'::text)::regclass) NOT NULL,
    menu_id bigint,
    usuario_id bigint
);


ALTER TABLE acceso OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 80200)
-- Name: acceso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE acceso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acceso_id_seq OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 80209)
-- Name: almacen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE almacen_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE almacen_id_seq OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 80218)
-- Name: caja_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE caja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE caja_id_seq OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 81030)
-- Name: cargo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cargo (
    id integer NOT NULL,
    descripcion text
);


ALTER TABLE cargo OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 80227)
-- Name: cargo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cargo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cargo_id_seq OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 80548)
-- Name: categoria_interna_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categoria_interna_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categoria_interna_id_seq OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 80229)
-- Name: cierre_sesion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cierre_sesion (
    id bigint DEFAULT nextval(('"cierre_sesion_id_seq"'::text)::regclass) NOT NULL,
    fecha date,
    sesion_id bigint
);


ALTER TABLE cierre_sesion OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 80233)
-- Name: cierre_sesion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cierre_sesion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cierre_sesion_id_seq OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 80235)
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cliente (
    id bigint DEFAULT nextval(('"cliente_id_seq"'::text)::regclass) NOT NULL,
    ci_nit text,
    nombre_cliente text,
    telefono text,
    estado smallint,
    correo text,
    fecha_registro timestamp without time zone,
    fecha_modificacion timestamp without time zone,
    direccion text,
    usuario_id bigint
);


ALTER TABLE cliente OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 80242)
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente_id_seq OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 80251)
-- Name: color_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE color_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE color_id_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 80260)
-- Name: compra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE compra_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE compra_id_seq OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 80269)
-- Name: detalle_caja_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_caja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_caja_id_seq OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 80275)
-- Name: detalle_compra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_compra_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_compra_id_seq OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 80284)
-- Name: detalle_proforma_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_proforma_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_proforma_id_seq OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 80286)
-- Name: detalle_salida_inventario_sec; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_salida_inventario_sec
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_salida_inventario_sec OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 80296)
-- Name: detalle_venta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_venta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_venta_id_seq OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 80305)
-- Name: egreso_caja_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE egreso_caja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE egreso_caja_id_seq OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 80317)
-- Name: forma_pago_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE forma_pago_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE forma_pago_id_seq OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 80326)
-- Name: ingreso_caja_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ingreso_caja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ingreso_caja_id_seq OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 80335)
-- Name: ingreso_inventario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ingreso_inventario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ingreso_inventario_id_seq OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 80340)
-- Name: inicio_sesion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE inicio_sesion (
    id bigint DEFAULT nextval(('"inicio_sesion_id_seq"'::text)::regclass) NOT NULL,
    fecha date,
    usuario_id bigint,
    impresora_id bigint
);


ALTER TABLE inicio_sesion OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 80344)
-- Name: inicio_sesion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inicio_sesion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE inicio_sesion_id_seq OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 80546)
-- Name: marca_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE marca_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE marca_id_seq OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 80398)
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE menu (
    id bigint DEFAULT nextval(('"menu_id_seq"'::text)::regclass) NOT NULL,
    parent bigint,
    name text,
    icon text,
    slug text,
    number integer
);


ALTER TABLE menu OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 80405)
-- Name: menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE menu_id_seq OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 80414)
-- Name: movimiento_caja_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movimiento_caja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE movimiento_caja_id_seq OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 80420)
-- Name: nota_venta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE nota_venta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE nota_venta_id_seq OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 80441)
-- Name: producto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE producto_id_seq OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 80443)
-- Name: producto_inventario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE producto_inventario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE producto_inventario_id_seq OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 80456)
-- Name: proforma_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proforma_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proforma_id_seq OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 80465)
-- Name: proveedor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedor_id_seq OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 80467)
-- Name: salida_inventario_sec; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE salida_inventario_sec
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE salida_inventario_sec OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 80357)
-- Name: sucursal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE sucursal (
    id bigint DEFAULT nextval(('"sucursal_id_seq"'::text)::regclass) NOT NULL,
    nit text,
    nombre_empresa text,
    sucursal text,
    estado smallint,
    direccion text,
    telefono text,
    email text,
    nombre_impuesto text
);


ALTER TABLE sucursal OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 80476)
-- Name: sucursal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sucursal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sucursal_id_seq OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 80478)
-- Name: talla_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE talla_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE talla_id_seq OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 80487)
-- Name: tipo_ingreso_egreso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_ingreso_egreso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_ingreso_egreso_id_seq OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 80489)
-- Name: tipo_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_item_id_seq OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 80491)
-- Name: tipo_salida_inventario_sec; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_salida_inventario_sec
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_salida_inventario_sec OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 80500)
-- Name: unidad_medida_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE unidad_medida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE unidad_medida_id_seq OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 80502)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE usuario (
    id bigint DEFAULT nextval(('"usuario_id_seq"'::text)::regclass) NOT NULL,
    ci text,
    nombre_usuario text,
    telefono text,
    cargo bigint,
    usuario text,
    clave text,
    activo smallint,
    estado smallint
);


ALTER TABLE usuario OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 80509)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_id_seq OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 80511)
-- Name: usuario_sucursal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE usuario_sucursal (
    usuario_id bigint,
    sucursal_id bigint
);


ALTER TABLE usuario_sucursal OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 80514)
-- Name: venta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE venta_id_seq OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 80516)
-- Name: venta_pago_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_pago_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE venta_pago_id_seq OWNER TO postgres;

--
-- TOC entry 2236 (class 0 OID 80196)
-- Dependencies: 185
-- Data for Name: acceso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO acceso VALUES (1, 1, 1);
INSERT INTO acceso VALUES (2, 2, 1);
INSERT INTO acceso VALUES (3, 3, 1);
INSERT INTO acceso VALUES (4, 4, 1);
INSERT INTO acceso VALUES (5, 5, 1);
INSERT INTO acceso VALUES (6, 6, 1);
INSERT INTO acceso VALUES (7, 7, 1);
INSERT INTO acceso VALUES (8, 8, 1);
INSERT INTO acceso VALUES (9, 9, 1);
INSERT INTO acceso VALUES (10, 10, 1);
INSERT INTO acceso VALUES (11, 11, 1);
INSERT INTO acceso VALUES (12, 12, 1);
INSERT INTO acceso VALUES (13, 13, 1);
INSERT INTO acceso VALUES (14, 14, 1);
INSERT INTO acceso VALUES (15, 15, 1);
INSERT INTO acceso VALUES (16, 16, 1);
INSERT INTO acceso VALUES (17, 17, 1);
INSERT INTO acceso VALUES (18, 18, 1);
INSERT INTO acceso VALUES (19, 19, 1);
INSERT INTO acceso VALUES (20, 20, 1);
INSERT INTO acceso VALUES (21, 21, 1);
INSERT INTO acceso VALUES (22, 22, 1);
INSERT INTO acceso VALUES (23, 23, 1);
INSERT INTO acceso VALUES (24, 24, 1);
INSERT INTO acceso VALUES (25, 25, 1);
INSERT INTO acceso VALUES (26, 26, 1);
INSERT INTO acceso VALUES (63, 27, 1);
INSERT INTO acceso VALUES (98, 28, 1);
INSERT INTO acceso VALUES (156, 1, 7);
INSERT INTO acceso VALUES (157, 7, 7);
INSERT INTO acceso VALUES (158, 2, 7);
INSERT INTO acceso VALUES (159, 8, 7);
INSERT INTO acceso VALUES (160, 1, 8);
INSERT INTO acceso VALUES (161, 7, 8);


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 186
-- Name: acceso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('acceso_id_seq', 161, true);


--
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 187
-- Name: almacen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('almacen_id_seq', 3, true);


--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 188
-- Name: caja_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('caja_id_seq', 1, true);


--
-- TOC entry 2281 (class 0 OID 81030)
-- Dependencies: 230
-- Data for Name: cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cargo VALUES (1, 'ADMINISTRADOR');
INSERT INTO cargo VALUES (2, 'VENDEDOR');
INSERT INTO cargo VALUES (3, 'OTRO');


--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 189
-- Name: cargo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cargo_id_seq', 3, true);


--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 229
-- Name: categoria_interna_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categoria_interna_id_seq', 22, true);


--
-- TOC entry 2241 (class 0 OID 80229)
-- Dependencies: 190
-- Data for Name: cierre_sesion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cierre_sesion VALUES (1, '2017-11-27', 84);
INSERT INTO cierre_sesion VALUES (2, '2017-11-27', 2);
INSERT INTO cierre_sesion VALUES (3, '2017-11-27', 3);
INSERT INTO cierre_sesion VALUES (4, '2017-11-27', 86);
INSERT INTO cierre_sesion VALUES (5, '2017-11-27', 5);
INSERT INTO cierre_sesion VALUES (6, '2017-11-27', 6);
INSERT INTO cierre_sesion VALUES (7, '2017-11-27', 8);
INSERT INTO cierre_sesion VALUES (8, '2017-11-27', 9);
INSERT INTO cierre_sesion VALUES (9, '2017-11-27', 88);
INSERT INTO cierre_sesion VALUES (10, '2017-11-27', 12);
INSERT INTO cierre_sesion VALUES (11, '2017-11-27', 11);
INSERT INTO cierre_sesion VALUES (12, '2017-11-28', 10);
INSERT INTO cierre_sesion VALUES (13, '2017-11-29', 15);
INSERT INTO cierre_sesion VALUES (14, '2017-12-01', 14);
INSERT INTO cierre_sesion VALUES (15, '2017-12-06', 17);
INSERT INTO cierre_sesion VALUES (16, '2017-12-06', 18);
INSERT INTO cierre_sesion VALUES (17, '2017-12-06', 18);
INSERT INTO cierre_sesion VALUES (18, '2017-12-06', 20);
INSERT INTO cierre_sesion VALUES (19, '2017-12-06', 21);
INSERT INTO cierre_sesion VALUES (20, '2017-12-06', 94);
INSERT INTO cierre_sesion VALUES (21, '2017-12-06', 23);
INSERT INTO cierre_sesion VALUES (22, '2017-12-07', 24);
INSERT INTO cierre_sesion VALUES (23, '2017-12-07', 25);
INSERT INTO cierre_sesion VALUES (24, '2017-12-07', 26);
INSERT INTO cierre_sesion VALUES (25, '2017-12-07', 27);
INSERT INTO cierre_sesion VALUES (26, '2017-12-07', 28);
INSERT INTO cierre_sesion VALUES (27, '2017-12-08', 29);
INSERT INTO cierre_sesion VALUES (28, '2017-12-08', 30);
INSERT INTO cierre_sesion VALUES (29, '2017-12-08', 99);
INSERT INTO cierre_sesion VALUES (30, '2017-12-09', 32);
INSERT INTO cierre_sesion VALUES (31, '2017-12-13', 7);
INSERT INTO cierre_sesion VALUES (32, '2017-12-14', 33);
INSERT INTO cierre_sesion VALUES (33, '2017-12-14', 34);
INSERT INTO cierre_sesion VALUES (34, '2017-12-14', 13);
INSERT INTO cierre_sesion VALUES (35, '2017-12-18', 36);
INSERT INTO cierre_sesion VALUES (36, '2017-12-18', 37);
INSERT INTO cierre_sesion VALUES (37, '2017-12-18', 38);
INSERT INTO cierre_sesion VALUES (38, '2017-12-18', 39);
INSERT INTO cierre_sesion VALUES (39, '2017-12-18', 40);
INSERT INTO cierre_sesion VALUES (40, '2017-12-19', 41);
INSERT INTO cierre_sesion VALUES (41, '2017-12-21', 42);
INSERT INTO cierre_sesion VALUES (42, '2017-12-21', 35);
INSERT INTO cierre_sesion VALUES (43, '2017-12-21', 43);
INSERT INTO cierre_sesion VALUES (44, '2017-12-21', 45);
INSERT INTO cierre_sesion VALUES (45, '2017-12-21', 44);
INSERT INTO cierre_sesion VALUES (46, '2017-12-22', 46);
INSERT INTO cierre_sesion VALUES (47, '2017-12-22', 47);
INSERT INTO cierre_sesion VALUES (48, '2017-12-22', 16);
INSERT INTO cierre_sesion VALUES (49, '2017-12-22', 48);
INSERT INTO cierre_sesion VALUES (50, '2017-12-22', 51);
INSERT INTO cierre_sesion VALUES (51, '2017-12-22', 49);
INSERT INTO cierre_sesion VALUES (52, '2017-12-23', 52);
INSERT INTO cierre_sesion VALUES (53, '2017-12-26', 53);
INSERT INTO cierre_sesion VALUES (54, '2017-12-26', 54);
INSERT INTO cierre_sesion VALUES (55, '2017-12-26', 55);
INSERT INTO cierre_sesion VALUES (56, '2017-12-26', 56);
INSERT INTO cierre_sesion VALUES (57, '2017-12-26', 57);
INSERT INTO cierre_sesion VALUES (58, '2017-12-26', 50);
INSERT INTO cierre_sesion VALUES (59, '2017-12-26', 58);
INSERT INTO cierre_sesion VALUES (60, '2017-12-27', 61);
INSERT INTO cierre_sesion VALUES (61, '2017-12-27', 62);
INSERT INTO cierre_sesion VALUES (62, '2017-12-27', 60);
INSERT INTO cierre_sesion VALUES (63, '2017-12-27', 64);
INSERT INTO cierre_sesion VALUES (64, '2017-12-27', 65);
INSERT INTO cierre_sesion VALUES (65, '2017-12-27', 66);
INSERT INTO cierre_sesion VALUES (66, '2017-12-27', 67);
INSERT INTO cierre_sesion VALUES (67, '2017-12-27', 63);
INSERT INTO cierre_sesion VALUES (68, '2017-12-27', 68);
INSERT INTO cierre_sesion VALUES (69, '2017-12-27', 69);
INSERT INTO cierre_sesion VALUES (70, '2017-12-27', 70);
INSERT INTO cierre_sesion VALUES (71, '2017-12-27', 70);
INSERT INTO cierre_sesion VALUES (72, '2017-12-27', 73);
INSERT INTO cierre_sesion VALUES (73, '2017-12-27', 72);
INSERT INTO cierre_sesion VALUES (74, '2017-12-27', 59);
INSERT INTO cierre_sesion VALUES (75, '2017-12-27', 74);
INSERT INTO cierre_sesion VALUES (76, '2017-12-28', 76);
INSERT INTO cierre_sesion VALUES (77, '2017-12-28', 78);
INSERT INTO cierre_sesion VALUES (78, '2017-12-28', 79);
INSERT INTO cierre_sesion VALUES (79, '2017-12-28', 80);
INSERT INTO cierre_sesion VALUES (80, '2017-12-28', 81);
INSERT INTO cierre_sesion VALUES (81, '2017-12-29', 82);
INSERT INTO cierre_sesion VALUES (82, '2017-12-29', 82);
INSERT INTO cierre_sesion VALUES (83, '2017-12-29', 75);
INSERT INTO cierre_sesion VALUES (84, '2017-12-29', 83);
INSERT INTO cierre_sesion VALUES (85, '2017-12-29', 84);
INSERT INTO cierre_sesion VALUES (86, '2017-12-29', 85);
INSERT INTO cierre_sesion VALUES (87, '2017-12-29', 87);
INSERT INTO cierre_sesion VALUES (88, '2017-12-29', 88);
INSERT INTO cierre_sesion VALUES (89, '2017-12-29', 89);
INSERT INTO cierre_sesion VALUES (90, '2017-12-29', 90);
INSERT INTO cierre_sesion VALUES (91, '2017-12-29', 91);
INSERT INTO cierre_sesion VALUES (92, '2017-12-29', 92);
INSERT INTO cierre_sesion VALUES (93, '2017-12-29', 77);
INSERT INTO cierre_sesion VALUES (94, '2017-12-29', 94);
INSERT INTO cierre_sesion VALUES (95, '2017-12-30', 93);
INSERT INTO cierre_sesion VALUES (96, '2018-01-02', 95);
INSERT INTO cierre_sesion VALUES (97, '2018-01-03', 96);
INSERT INTO cierre_sesion VALUES (98, '2018-01-03', 98);
INSERT INTO cierre_sesion VALUES (99, '2018-01-03', 99);
INSERT INTO cierre_sesion VALUES (100, '2018-01-05', 86);
INSERT INTO cierre_sesion VALUES (101, '2018-01-05', 86);
INSERT INTO cierre_sesion VALUES (102, '2018-01-05', 101);
INSERT INTO cierre_sesion VALUES (103, '2018-01-05', 102);
INSERT INTO cierre_sesion VALUES (104, '2018-01-05', 104);
INSERT INTO cierre_sesion VALUES (105, '2018-01-05', 105);
INSERT INTO cierre_sesion VALUES (106, '2018-01-05', 106);
INSERT INTO cierre_sesion VALUES (107, '2018-01-07', 97);
INSERT INTO cierre_sesion VALUES (108, '2018-01-08', 108);
INSERT INTO cierre_sesion VALUES (109, '2018-01-08', 109);
INSERT INTO cierre_sesion VALUES (110, '2018-01-08', 100);
INSERT INTO cierre_sesion VALUES (111, '2018-01-10', 111);
INSERT INTO cierre_sesion VALUES (112, '2018-01-11', 112);
INSERT INTO cierre_sesion VALUES (113, '2018-01-16', 113);
INSERT INTO cierre_sesion VALUES (114, '2018-01-17', 114);
INSERT INTO cierre_sesion VALUES (115, '2018-01-18', NULL);
INSERT INTO cierre_sesion VALUES (116, '2018-01-18', 115);
INSERT INTO cierre_sesion VALUES (117, '2018-01-18', 116);
INSERT INTO cierre_sesion VALUES (118, '2018-01-20', 107);
INSERT INTO cierre_sesion VALUES (119, '2018-01-23', 118);
INSERT INTO cierre_sesion VALUES (120, '2018-01-24', 119);
INSERT INTO cierre_sesion VALUES (121, '2018-01-26', 117);
INSERT INTO cierre_sesion VALUES (122, '2018-01-26', 121);
INSERT INTO cierre_sesion VALUES (123, '2018-01-27', 122);
INSERT INTO cierre_sesion VALUES (124, '2018-01-27', 123);
INSERT INTO cierre_sesion VALUES (125, '2018-01-29', 110);
INSERT INTO cierre_sesion VALUES (126, '2018-01-29', 124);
INSERT INTO cierre_sesion VALUES (127, '2018-01-29', 125);
INSERT INTO cierre_sesion VALUES (128, '2018-02-02', 126);
INSERT INTO cierre_sesion VALUES (129, '2018-02-02', 127);
INSERT INTO cierre_sesion VALUES (130, '2018-02-02', 128);
INSERT INTO cierre_sesion VALUES (131, '2018-02-03', 129);
INSERT INTO cierre_sesion VALUES (132, '2018-02-05', 130);
INSERT INTO cierre_sesion VALUES (133, '2018-02-06', 132);
INSERT INTO cierre_sesion VALUES (134, '2018-02-26', 134);
INSERT INTO cierre_sesion VALUES (135, '2018-02-26', 134);
INSERT INTO cierre_sesion VALUES (136, '2018-02-26', 135);
INSERT INTO cierre_sesion VALUES (137, '2018-02-26', NULL);
INSERT INTO cierre_sesion VALUES (138, '2018-02-26', 136);
INSERT INTO cierre_sesion VALUES (139, '2018-02-26', 137);
INSERT INTO cierre_sesion VALUES (140, '2018-02-26', 136);
INSERT INTO cierre_sesion VALUES (141, '2018-02-26', 139);
INSERT INTO cierre_sesion VALUES (142, '2018-02-26', 140);
INSERT INTO cierre_sesion VALUES (143, '2018-02-26', 141);
INSERT INTO cierre_sesion VALUES (144, '2018-02-26', 142);
INSERT INTO cierre_sesion VALUES (145, '2018-02-26', 143);
INSERT INTO cierre_sesion VALUES (146, '2018-02-26', 144);
INSERT INTO cierre_sesion VALUES (147, '2018-02-26', 145);
INSERT INTO cierre_sesion VALUES (148, '2018-02-27', 146);
INSERT INTO cierre_sesion VALUES (149, '2018-02-27', 147);
INSERT INTO cierre_sesion VALUES (150, '2018-02-27', 148);
INSERT INTO cierre_sesion VALUES (151, '2018-02-27', 149);
INSERT INTO cierre_sesion VALUES (152, '2018-02-28', 137);
INSERT INTO cierre_sesion VALUES (153, '2018-02-28', 151);
INSERT INTO cierre_sesion VALUES (154, '2018-02-28', 152);
INSERT INTO cierre_sesion VALUES (155, '2018-02-28', 153);
INSERT INTO cierre_sesion VALUES (156, '2018-02-28', 154);
INSERT INTO cierre_sesion VALUES (157, '2018-03-01', 155);
INSERT INTO cierre_sesion VALUES (158, '2018-03-01', 156);
INSERT INTO cierre_sesion VALUES (159, '2018-03-01', 157);
INSERT INTO cierre_sesion VALUES (160, '2018-03-01', 158);
INSERT INTO cierre_sesion VALUES (161, '2018-03-01', 159);
INSERT INTO cierre_sesion VALUES (162, '2018-03-01', 160);
INSERT INTO cierre_sesion VALUES (163, '2018-03-02', 161);
INSERT INTO cierre_sesion VALUES (164, '2018-03-02', 162);
INSERT INTO cierre_sesion VALUES (165, '2018-03-02', 163);
INSERT INTO cierre_sesion VALUES (166, '2018-03-02', 164);
INSERT INTO cierre_sesion VALUES (167, '2018-03-02', 165);
INSERT INTO cierre_sesion VALUES (168, '2018-03-03', 166);
INSERT INTO cierre_sesion VALUES (169, '2018-03-05', 167);
INSERT INTO cierre_sesion VALUES (170, '2018-03-05', 168);
INSERT INTO cierre_sesion VALUES (171, '2018-03-06', 169);
INSERT INTO cierre_sesion VALUES (172, '2018-03-06', 170);
INSERT INTO cierre_sesion VALUES (173, '2018-03-06', 171);
INSERT INTO cierre_sesion VALUES (174, '2018-03-09', 172);
INSERT INTO cierre_sesion VALUES (175, '2018-03-12', 173);
INSERT INTO cierre_sesion VALUES (176, '2018-03-13', 174);
INSERT INTO cierre_sesion VALUES (177, '2018-03-14', 175);
INSERT INTO cierre_sesion VALUES (178, '2018-03-15', 176);
INSERT INTO cierre_sesion VALUES (179, '2018-03-18', 177);
INSERT INTO cierre_sesion VALUES (180, '2018-03-18', 178);
INSERT INTO cierre_sesion VALUES (181, '2018-03-18', 179);
INSERT INTO cierre_sesion VALUES (182, '2018-03-18', 180);
INSERT INTO cierre_sesion VALUES (183, '2018-03-18', 181);
INSERT INTO cierre_sesion VALUES (184, '2018-09-16', 21);
INSERT INTO cierre_sesion VALUES (185, '2018-09-16', 183);
INSERT INTO cierre_sesion VALUES (186, '2018-09-16', 184);
INSERT INTO cierre_sesion VALUES (187, '2018-09-16', 185);
INSERT INTO cierre_sesion VALUES (188, '2018-09-16', 186);
INSERT INTO cierre_sesion VALUES (189, '2018-09-16', 187);
INSERT INTO cierre_sesion VALUES (190, '2018-09-16', 188);
INSERT INTO cierre_sesion VALUES (191, '2018-09-16', 189);
INSERT INTO cierre_sesion VALUES (192, '2018-09-16', 0);
INSERT INTO cierre_sesion VALUES (193, '2018-09-16', 191);
INSERT INTO cierre_sesion VALUES (194, '2018-09-16', 192);


--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 191
-- Name: cierre_sesion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cierre_sesion_id_seq', 194, true);


--
-- TOC entry 2243 (class 0 OID 80235)
-- Dependencies: 192
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cliente VALUES (356, '45646544', 'JUAN CARLOS', '7987977', 1, '', '2018-09-16 18:55:40', '2018-09-16 18:56:22', '', 1);
INSERT INTO cliente VALUES (357, '79797978', 'ELIANA ESPINOZA', '787978', 1, '', '2018-09-16 19:58:51', '2018-09-16 19:58:51', '', 1);


--
-- TOC entry 2295 (class 0 OID 0)
-- Dependencies: 193
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cliente_id_seq', 357, true);


--
-- TOC entry 2296 (class 0 OID 0)
-- Dependencies: 194
-- Name: color_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('color_id_seq', 117, true);


--
-- TOC entry 2297 (class 0 OID 0)
-- Dependencies: 195
-- Name: compra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('compra_id_seq', 1, false);


--
-- TOC entry 2298 (class 0 OID 0)
-- Dependencies: 196
-- Name: detalle_caja_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_caja_id_seq', 5, true);


--
-- TOC entry 2299 (class 0 OID 0)
-- Dependencies: 197
-- Name: detalle_compra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_compra_id_seq', 1, false);


--
-- TOC entry 2300 (class 0 OID 0)
-- Dependencies: 198
-- Name: detalle_proforma_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_proforma_id_seq', 3, true);


--
-- TOC entry 2301 (class 0 OID 0)
-- Dependencies: 199
-- Name: detalle_salida_inventario_sec; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_salida_inventario_sec', 1, true);


--
-- TOC entry 2302 (class 0 OID 0)
-- Dependencies: 200
-- Name: detalle_venta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_venta_id_seq', 589, true);


--
-- TOC entry 2303 (class 0 OID 0)
-- Dependencies: 201
-- Name: egreso_caja_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('egreso_caja_id_seq', 1, false);


--
-- TOC entry 2304 (class 0 OID 0)
-- Dependencies: 202
-- Name: forma_pago_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('forma_pago_id_seq', 1, false);


--
-- TOC entry 2305 (class 0 OID 0)
-- Dependencies: 203
-- Name: ingreso_caja_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ingreso_caja_id_seq', 280, true);


--
-- TOC entry 2306 (class 0 OID 0)
-- Dependencies: 204
-- Name: ingreso_inventario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ingreso_inventario_id_seq', 152, true);


--
-- TOC entry 2256 (class 0 OID 80340)
-- Dependencies: 205
-- Data for Name: inicio_sesion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO inicio_sesion VALUES (183, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (184, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (185, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (186, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (187, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (188, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (189, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (190, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (191, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (192, '2018-09-16', 1, NULL);
INSERT INTO inicio_sesion VALUES (193, '2018-09-16', 1, NULL);


--
-- TOC entry 2307 (class 0 OID 0)
-- Dependencies: 206
-- Name: inicio_sesion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inicio_sesion_id_seq', 193, true);


--
-- TOC entry 2308 (class 0 OID 0)
-- Dependencies: 228
-- Name: marca_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('marca_id_seq', 8, true);


--
-- TOC entry 2259 (class 0 OID 80398)
-- Dependencies: 208
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO menu VALUES (1, NULL, 'REGISTROS', 'fa fa-address-book', 'Item-1', 1);
INSERT INTO menu VALUES (16, 5, 'Usuario', 'fa fa-circle-o', 'usuario', 2);
INSERT INTO menu VALUES (5, NULL, 'CONFIGURACION', 'fa fa-building-o', 'Item-1', 6);
INSERT INTO menu VALUES (6, NULL, 'REPORTES', 'fa fa-area-chart', 'Item-1', 7);
INSERT INTO menu VALUES (28, 6, 'Rep. Docente', 'fa fa-circle-o', 'reporte/reporte_clientes', 1);
INSERT INTO menu VALUES (7, 1, 'Nuevo Docente', 'fa fa-circle-o', 'cliente', 1);


--
-- TOC entry 2309 (class 0 OID 0)
-- Dependencies: 209
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('menu_id_seq', 28, true);


--
-- TOC entry 2310 (class 0 OID 0)
-- Dependencies: 210
-- Name: movimiento_caja_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movimiento_caja_id_seq', 1, false);


--
-- TOC entry 2311 (class 0 OID 0)
-- Dependencies: 211
-- Name: nota_venta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('nota_venta_id_seq', 281, true);


--
-- TOC entry 2312 (class 0 OID 0)
-- Dependencies: 212
-- Name: producto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('producto_id_seq', 504, true);


--
-- TOC entry 2313 (class 0 OID 0)
-- Dependencies: 213
-- Name: producto_inventario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('producto_inventario_id_seq', 626, true);


--
-- TOC entry 2314 (class 0 OID 0)
-- Dependencies: 214
-- Name: proforma_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proforma_id_seq', 1, true);


--
-- TOC entry 2315 (class 0 OID 0)
-- Dependencies: 215
-- Name: proveedor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedor_id_seq', 1, false);


--
-- TOC entry 2316 (class 0 OID 0)
-- Dependencies: 216
-- Name: salida_inventario_sec; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('salida_inventario_sec', 1, true);


--
-- TOC entry 2258 (class 0 OID 80357)
-- Dependencies: 207
-- Data for Name: sucursal; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sucursal VALUES (2, ' 4577400010', 'DICARP', 'CASA MATRIZ', 1, 'AV 2 DE FEBRERO 2DO ANILLO Y CENTENARIO', ' 70838701', 'dicarp@gmail.com', 'casa matriz');


--
-- TOC entry 2317 (class 0 OID 0)
-- Dependencies: 217
-- Name: sucursal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sucursal_id_seq', 2, true);


--
-- TOC entry 2318 (class 0 OID 0)
-- Dependencies: 218
-- Name: talla_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('talla_id_seq', 33, true);


--
-- TOC entry 2319 (class 0 OID 0)
-- Dependencies: 219
-- Name: tipo_ingreso_egreso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_ingreso_egreso_id_seq', 1, false);


--
-- TOC entry 2320 (class 0 OID 0)
-- Dependencies: 220
-- Name: tipo_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_item_id_seq', 2, true);


--
-- TOC entry 2321 (class 0 OID 0)
-- Dependencies: 221
-- Name: tipo_salida_inventario_sec; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_salida_inventario_sec', 1, false);


--
-- TOC entry 2322 (class 0 OID 0)
-- Dependencies: 222
-- Name: unidad_medida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('unidad_medida_id_seq', 9, true);


--
-- TOC entry 2274 (class 0 OID 80502)
-- Dependencies: 223
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario VALUES (8, '2', 'LISETT RAMIREZ RAMIREZ', '77314668', 3, 'Lisett', '$2y$10$eZBlTXr3WTxehkd55ztiz.oZ.HZUsUcrpz81XDyJM0pYJH.qn8OJ6', NULL, 1);
INSERT INTO usuario VALUES (7, '1', 'MARIA DEISY JUSTINIANO', '9302099', 2, 'maria', '$2y$10$oLI7W1TTJnDtOwoRYE8otO/5wXjMAM7/pphLXeWJkjYfXZYFzVv8K', 0, 1);
INSERT INTO usuario VALUES (1, '0', 'LISSY', '0', 1, 'admin', '$2y$10$9kbE0OVkWXln4OqOIi7I2eiPUlatlS0n6J9c36Vs3/ntQ3gTe/UXi', 1, 1);


--
-- TOC entry 2323 (class 0 OID 0)
-- Dependencies: 224
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_id_seq', 8, true);


--
-- TOC entry 2276 (class 0 OID 80511)
-- Dependencies: 225
-- Data for Name: usuario_sucursal; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario_sucursal VALUES (1, 1);
INSERT INTO usuario_sucursal VALUES (1, 2);
INSERT INTO usuario_sucursal VALUES (5, 1);
INSERT INTO usuario_sucursal VALUES (5, 2);
INSERT INTO usuario_sucursal VALUES (1, 3);
INSERT INTO usuario_sucursal VALUES (5, 3);
INSERT INTO usuario_sucursal VALUES (4, 1);
INSERT INTO usuario_sucursal VALUES (4, 2);
INSERT INTO usuario_sucursal VALUES (4, 3);
INSERT INTO usuario_sucursal VALUES (3, 1);
INSERT INTO usuario_sucursal VALUES (3, 2);
INSERT INTO usuario_sucursal VALUES (3, 3);
INSERT INTO usuario_sucursal VALUES (2, 1);
INSERT INTO usuario_sucursal VALUES (2, 2);
INSERT INTO usuario_sucursal VALUES (2, 3);
INSERT INTO usuario_sucursal VALUES (6, 2);
INSERT INTO usuario_sucursal VALUES (6, 3);
INSERT INTO usuario_sucursal VALUES (6, 1);
INSERT INTO usuario_sucursal VALUES (7, 2);
INSERT INTO usuario_sucursal VALUES (8, 2);


--
-- TOC entry 2324 (class 0 OID 0)
-- Dependencies: 226
-- Name: venta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('venta_id_seq', 278, true);


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 227
-- Name: venta_pago_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('venta_pago_id_seq', 286, true);


--
-- TOC entry 2118 (class 2606 OID 80527)
-- Name: menu menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


-- Completed on 2018-09-16 20:00:26

--
-- PostgreSQL database dump complete
--

