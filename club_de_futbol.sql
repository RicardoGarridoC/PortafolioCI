-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 21:22:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET TIME_ZONE = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_de_futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `CAMBIOS` (
  `ID` INT(11) NOT NULL,
  `MINUTO` INT(11) NOT NULL,
  `JUGADOR_ENTRANTE_FK` INT(11) NOT NULL,
  `JUGADOR_SALIENTE_FK` INT(11) DEFAULT NULL,
  `PARTIDO_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `CAMBIOS` (
  `ID`,
  `MINUTO`,
  `JUGADOR_ENTRANTE_FK`,
  `JUGADOR_SALIENTE_FK`,
  `PARTIDO_FK`
) VALUES (
  1,
  50,
  11,
  4,
  6
),
(
  2,
  75,
  9,
  8,
  6
),
(
  3,
  60,
  24,
  28,
  8
),
(
  4,
  80,
  29,
  22,
  9
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios_externo`
--

CREATE TABLE `CAMBIOS_EXTERNO` (
  `ID` INT(11) NOT NULL,
  `MINUTO` INT(11) NOT NULL,
  `PARTIDO_ID_FK` INT(11) NOT NULL,
  `NOMBRE_JUGADOR_SALIENTE` VARCHAR(100) NOT NULL,
  `NOMBRE_JUGADOR_ENTRANTE` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `cambios_externo`
--

INSERT INTO `CAMBIOS_EXTERNO` (
  `ID`,
  `MINUTO`,
  `PARTIDO_ID_FK`,
  `NOMBRE_JUGADOR_SALIENTE`,
  `NOMBRE_JUGADOR_ENTRANTE`
) VALUES (
  1,
  50,
  6,
  '4 Calula Melendez',
  '2 Artura Sanhueza'
),
(
  2,
  60,
  6,
  '5 Patricia Yanez',
  '6 Marka Gonzales'
),
(
  3,
  60,
  8,
  '7 Jorge Salah',
  '9 Mauricio Peninsula'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--

CREATE TABLE `CAMPEONATOS` (
  `ID` INT(11) NOT NULL,
  `NOMBRE` VARCHAR(100) DEFAULT NULL,
  `DIVISION_ID_FK` INT(11) DEFAULT NULL,
  `TEMPORADA` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `campeonatos`
--

INSERT INTO `CAMPEONATOS` (
  `ID`,
  `NOMBRE`,
  `DIVISION_ID_FK`,
  `TEMPORADA`
) VALUES (
  1,
  'Campeonato Tercera Femenino',
  1,
  '2023'
),
(
  2,
  'Partido Amistoso',
  NULL,
  NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `CANCHA` (
  `ID` INT(11) NOT NULL,
  `NOMBRE` VARCHAR(100) NOT NULL,
  `UBICACION` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `CANCHA` (
  `ID`,
  `NOMBRE`,
  `UBICACION`
) VALUES (
  1,
  'Caupolican',
  'Ribera Bio Bio, altura Corbeta Ancud, Chiguayante'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigente`
--

CREATE TABLE `DIRIGENTE` (
  `ID` INT(11) NOT NULL,
  `SUELDO` DECIMAL(10, 0) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `dirigente`
--

INSERT INTO `DIRIGENTE` (
  `ID`,
  `SUELDO`
) VALUES (
  1,
  1000000
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `DIVISION` (
  `ID` INT(11) NOT NULL,
  `CATEGORIA` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `DIVISION` (
  `ID`,
  `CATEGORIA`
) VALUES (
  1,
  'Tercera división'
),
(
  2,
  'Cuarta división'
),
(
  3,
  'Quinta división'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `EGRESOS` (
  `ID` INT(11) NOT NULL,
  `CONCEPTO` ENUM('sueldo_jugadores', 'sueldo_e_tecnico', 'sueldo_dirigentes', 'pago_mensualidad') NOT NULL,
  `MONTO` DECIMAL(10, 0) NOT NULL,
  `FECHA` DATE NOT NULL,
  `DETALLE` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `EGRESOS` (
  `ID`,
  `CONCEPTO`,
  `MONTO`,
  `FECHA`,
  `DETALLE`
) VALUES (
  20,
  'sueldo_e_tecnico',
  420000,
  '2023-06-12',
  'Sueldo de equipo tecnico Emilio Gutierrez'
),
(
  21,
  'sueldo_e_tecnico',
  420000,
  '2023-06-12',
  'Sueldo de equipo tecnico Emilio Gutierrez'
),
(
  22,
  'sueldo_e_tecnico',
  420000,
  '2023-06-12',
  'Sueldo de equipo tecnico Emilio Gutierrez'
),
(
  23,
  'sueldo_e_tecnico',
  350000,
  '2023-06-12',
  'Sueldo de equipo tecnico Andres Mundi'
),
(
  24,
  'sueldo_dirigentes',
  1000000,
  '2023-06-12',
  'Pago de sueldo dirigente Andres  Peregrini'
),
(
  25,
  'sueldo_dirigentes',
  1000000,
  '2023-06-12',
  'Pago de sueldo dirigente Andres  Peregrini'
),
(
  26,
  'pago_mensualidad',
  126526,
  '2023-06-12',
  'Pago de mensualidad ANFA mes de June 2023'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `EQUIPOS` (
  `ID` INT(11) NOT NULL,
  `NOMBRE` VARCHAR(100) NOT NULL,
  `GENERO` ENUM('masculino', 'femenino') NOT NULL,
  `DIVISION_ID_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `EQUIPOS` (
  `ID`,
  `NOMBRE`,
  `GENERO`,
  `DIVISION_ID_FK`
) VALUES (
  1,
  'Dragones Rojos',
  'femenino',
  1
),
(
  2,
  'Panteras Negras',
  'femenino',
  3
),
(
  3,
  'Lobas Plateadas',
  'femenino',
  1
),
(
  4,
  'Leonas Blancas',
  'femenino',
  2
),
(
  5,
  'Tigres Dorados',
  'femenino',
  1
),
(
  6,
  'Águilas Azules',
  'femenino',
  1
),
(
  7,
  'Coyotes Salvajes',
  'femenino',
  1
),
(
  8,
  'Jaguares Amarillos',
  'femenino',
  1
),
(
  9,
  'Osos Pardos',
  'femenino',
  1
),
(
  10,
  'Los Alces FC F',
  'femenino',
  1
),
(
  11,
  'Irreal Madrid',
  'femenino',
  1
),
(
  12,
  'Guachipato',
  'femenino',
  1
),
(
  13,
  'Paris San German',
  'femenino',
  1
),
(
  14,
  'Los Alces FC M',
  'masculino',
  1
),
(
  15,
  'Rusia Dortmund',
  'masculino',
  1
),
(
  16,
  'Ohiggins Norte',
  'masculino',
  1
),
(
  17,
  'Tornado Rojo',
  'masculino',
  1
),
(
  18,
  'Concepcion City',
  'masculino',
  1
),
(
  19,
  'Concepcion United',
  'masculino',
  1
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_campeonato`
--

CREATE TABLE `EQUIPOS_CAMPEONATO` (
  `ID` INT(11) NOT NULL,
  `EQUIPO_ID_FK` INT(11) NOT NULL,
  `CAMPEONATO_ID_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tecnico`
--

CREATE TABLE `EQUIPO_TECNICO` (
  `ID` INT(11) NOT NULL,
  `CARGO` ENUM('entrenador', 'asistente_entrenador', 'preparador_fisico', 'utilero', 'kinesiologo') NOT NULL,
  `EQUIPO_PROVIENE_FK` INT(11) DEFAULT NULL,
  `SUELDO` DECIMAL(10, 2) DEFAULT NULL,
  `VALOR_HORA_EXTRA` DECIMAL(10, 2) DEFAULT NULL,
  `HORAS_EXTRAS_MES` INT(11) DEFAULT 0
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `equipo_tecnico`
--

INSERT INTO `EQUIPO_TECNICO` (
  `ID`,
  `CARGO`,
  `EQUIPO_PROVIENE_FK`,
  `SUELDO`,
  `VALOR_HORA_EXTRA`,
  `HORAS_EXTRAS_MES`
) VALUES (
  1,
  'entrenador',
  NULL,
  600000.00,
  10000.00,
  4
),
(
  2,
  'asistente_entrenador',
  1,
  350000.00,
  3000.00,
  0
),
(
  3,
  'preparador_fisico',
  8,
  400000.00,
  4000.00,
  5
),
(
  4,
  'utilero',
  NULL,
  350000.00,
  3000.00,
  0
),
(
  5,
  'kinesiologo',
  NULL,
  400000.00,
  4000.00,
  5
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_campeonato`
--

CREATE TABLE `ESTADISTICAS_CAMPEONATO` (
  `ID` INT(11) NOT NULL,
  `PARTIDOS_GANADOS` INT(11) DEFAULT 0,
  `PARTIDOS_EMPATADOS` INT(11) DEFAULT 0,
  `PARTIDOS_PERDIDOS` INT(11) DEFAULT 0,
  `GOLES_FAVOR` INT(11) DEFAULT 0,
  `GOLES_CONTRA` INT(11) DEFAULT 0,
  `DIFERENCIA_GOLES` INT(11) DEFAULT 0,
  `PUNTOS` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_equipo`
--

CREATE TABLE `ESTADISTICAS_EQUIPO` (
  `ID` INT(11) NOT NULL,
  `GOLES_CONVERTIDOS` INT(11) DEFAULT 0,
  `GOLES_RECIBIDOS` INT(11) DEFAULT 0,
  `CAMBIOS_REALIZADOS` INT(11) DEFAULT 0,
  `TARJETAS_AMARILLAS` INT(11) DEFAULT 0,
  `TARJETAS_ROJAS` INT(11) DEFAULT 0,
  `EQUIPO_ID_FK` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `GOLES` (
  `ID` INT(11) NOT NULL,
  `PARTIDO_ID_FK` INT(11) NOT NULL,
  `JUGADOR_ID_FK` INT(11) DEFAULT NULL,
  `MINUTO` INT(11) DEFAULT NULL,
  `JUGADOR_VISITA` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `goles`
--

INSERT INTO `GOLES` (
  `ID`,
  `PARTIDO_ID_FK`,
  `JUGADOR_ID_FK`,
  `MINUTO`,
  `JUGADOR_VISITA`
) VALUES (
  2,
  6,
  1,
  34,
  NULL
),
(
  3,
  6,
  2,
  45,
  NULL
),
(
  4,
  6,
  NULL,
  50,
  '10 Jorge Valdivia'
),
(
  5,
  7,
  4,
  40,
  NULL
),
(
  6,
  9,
  20,
  4,
  NULL
),
(
  7,
  9,
  21,
  98,
  NULL
),
(
  8,
  9,
  NULL,
  16,
  'Jorge Gonzales'
),
(
  9,
  8,
  26,
  12,
  NULL
),
(
  10,
  8,
  24,
  30,
  NULL
),
(
  11,
  8,
  NULL,
  25,
  'Diego Maratona'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `INGRESOS` (
  `ID` INT(11) NOT NULL,
  `CONCEPTO` ENUM('mensualidad', 'sponsor', 'actividades_extra') NOT NULL,
  `MONTO` DECIMAL(10, 0) NOT NULL,
  `FECHA` DATE NOT NULL,
  `DETALLE` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `INGRESOS` (
  `ID`,
  `CONCEPTO`,
  `MONTO`,
  `FECHA`,
  `DETALLE`
) VALUES (
  17,
  'sponsor',
  200000,
  '2023-06-08',
  'McDonalds'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `JUGADORES` (
  `ID` INT(11) NOT NULL,
  `POSICION` VARCHAR(50) DEFAULT NULL,
  `PARTIDOS_JUGADOS` INT(11) DEFAULT 0,
  `TIPO` ENUM('aficionado', 'profesional') NOT NULL,
  `SUELDO` DECIMAL(10, 2) DEFAULT NULL,
  `AYUDA_ECONOMICA` DECIMAL(10, 2) DEFAULT NULL,
  `EQUIPO_PROVIENE_ID_FK` INT(11) DEFAULT NULL,
  `NUMERO_CAMISETA` INT(11) DEFAULT NULL,
  `GENERO` ENUM('masculino', 'femenino') DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `JUGADORES` (
  `ID`,
  `POSICION`,
  `PARTIDOS_JUGADOS`,
  `TIPO`,
  `SUELDO`,
  `AYUDA_ECONOMICA`,
  `EQUIPO_PROVIENE_ID_FK`,
  `NUMERO_CAMISETA`,
  `GENERO`
) VALUES (
  1,
  'Delantero',
  20,
  'profesional',
  400000.00,
  0.00,
  10,
  7,
  'femenino'
),
(
  2,
  'Defensa',
  15,
  'profesional',
  300000.00,
  0.00,
  10,
  8,
  'femenino'
),
(
  3,
  'Mediocampista',
  18,
  'profesional',
  300000.00,
  0.00,
  10,
  11,
  'femenino'
),
(
  4,
  'Portero',
  10,
  'aficionado',
  NULL,
  150000.00,
  10,
  10,
  'femenino'
),
(
  5,
  'Centrodelantero',
  10,
  'profesional',
  250000.00,
  0.00,
  NULL,
  50,
  'femenino'
),
(
  6,
  'Lateral',
  1,
  'aficionado',
  NULL,
  200000.00,
  NULL,
  44,
  'femenino'
),
(
  7,
  'Delantero',
  17,
  'profesional',
  500000.00,
  0.00,
  10,
  9,
  'femenino'
),
(
  8,
  'Mediocampista',
  12,
  'profesional',
  200000.00,
  0.00,
  10,
  1,
  'femenino'
),
(
  9,
  'Defensa',
  18,
  'profesional',
  175000.00,
  0.00,
  10,
  4,
  'femenino'
),
(
  10,
  'Delantero',
  20,
  'profesional',
  220000.00,
  0.00,
  10,
  22,
  'femenino'
),
(
  11,
  'Mediocampista',
  17,
  'profesional',
  180000.00,
  0.00,
  10,
  20,
  'femenino'
),
(
  12,
  'Portero',
  10,
  'profesional',
  170000.00,
  0.00,
  10,
  24,
  'femenino'
),
(
  13,
  'Mediocampista',
  22,
  'aficionado',
  225000.00,
  151000.00,
  10,
  30,
  'femenino'
),
(
  14,
  'Mediocampista',
  5,
  'aficionado',
  NULL,
  0.00,
  NULL,
  23,
  'femenino'
),
(
  15,
  'Defensa',
  10,
  'profesional',
  100000.00,
  0.00,
  NULL,
  18,
  'femenino'
),
(
  16,
  'Mediocampista',
  15,
  'aficionado',
  NULL,
  150000.00,
  NULL,
  19,
  'femenino'
),
(
  17,
  'Defensa',
  3,
  'aficionado',
  NULL,
  0.00,
  NULL,
  21,
  'femenino'
),
(
  18,
  'Delantero',
  10,
  'profesional',
  200000.00,
  0.00,
  NULL,
  25,
  'femenino'
),
(
  19,
  'Portero',
  3,
  'aficionado',
  NULL,
  200000.00,
  NULL,
  12,
  'masculino'
),
(
  20,
  'Delantero',
  4,
  'aficionado',
  NULL,
  150000.00,
  NULL,
  10,
  'masculino'
),
(
  21,
  'Delantero',
  2,
  'aficionado',
  NULL,
  300000.00,
  NULL,
  9,
  'masculino'
),
(
  22,
  'Defensa',
  4,
  'aficionado',
  NULL,
  200000.00,
  NULL,
  8,
  'masculino'
),
(
  23,
  'Defensa',
  5,
  'profesional',
  200000.00,
  NULL,
  15,
  11,
  'masculino'
),
(
  24,
  'Defensa',
  3,
  'aficionado',
  NULL,
  200000.00,
  NULL,
  16,
  'masculino'
),
(
  25,
  'Mediocampista',
  2,
  'profesional',
  150000.00,
  NULL,
  NULL,
  22,
  'masculino'
),
(
  26,
  'Mediocampista',
  4,
  'aficionado',
  NULL,
  150000.00,
  NULL,
  30,
  'masculino'
),
(
  27,
  'Lateral',
  6,
  'aficionado',
  NULL,
  50000.00,
  18,
  24,
  'masculino'
),
(
  28,
  'Lateral',
  2,
  'profesional',
  150000.00,
  NULL,
  NULL,
  19,
  'masculino'
),
(
  29,
  'Delantero',
  1,
  'aficionado',
  NULL,
  46000.00,
  NULL,
  40,
  'masculino'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lesiones`
--

CREATE TABLE `LESIONES` (
  `ID` INT(11) NOT NULL,
  `FECHA_INICIO_LESION` DATE DEFAULT NULL,
  `FECHA_FIN_LESION` DATE DEFAULT NULL,
  `JUGADOR_ID_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `lesiones`
--

INSERT INTO `LESIONES` (
  `ID`,
  `FECHA_INICIO_LESION`,
  `FECHA_FIN_LESION`,
  `JUGADOR_ID_FK`
) VALUES (
  1,
  '2023-05-11',
  '2023-06-30',
  1
),
(
  2,
  '2023-05-01',
  '2023-07-11',
  18
),
(
  3,
  '2023-04-03',
  '2023-05-02',
  8
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `MOTIVO` (
  `ID` INT(11) NOT NULL,
  `NOMBRE_MOTIVO` VARCHAR(100) DEFAULT NULL,
  `TIPO` CHAR(1) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `MOTIVO` (
  `ID`,
  `NOMBRE_MOTIVO`,
  `TIPO`
) VALUES (
  1,
  'Compra jugadores',
  '1'
),
(
  2,
  'Sueldo jugadores',
  '1'
),
(
  3,
  'Sueldo equipo técnico',
  '1'
),
(
  4,
  'Sueldo dirigentes',
  '1'
),
(
  5,
  'Mensualidad ANFA',
  '1'
),
(
  6,
  'Mensualidad socios',
  '2'
),
(
  7,
  'Aportes Sponsor',
  '2'
),
(
  8,
  'Traspasos',
  '2'
),
(
  9,
  'Actividades extras',
  '2'
),
(
  10,
  'Venta de entradas',
  '2'
),
(
  11,
  'Souvenirs',
  '2'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `MOVIMIENTOS` (
  `ID` INT(11) NOT NULL,
  `MOTIVO_FK` INT(11) DEFAULT NULL,
  `DESCRIPCION` VARCHAR(100) DEFAULT NULL,
  `FECHA` DATETIME DEFAULT NULL,
  `USUARIO_FK` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `PARTIDOS` (
  `ID` INT(11) NOT NULL,
  `EQUIPO_LOCAL_FK` INT(11) DEFAULT NULL,
  `EQUIPO_VISITA_FK` INT(11) DEFAULT NULL,
  `UBICACION_FK` INT(11) DEFAULT NULL,
  `FECHA` DATETIME DEFAULT NULL,
  `CAMPEONATO_ID_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `PARTIDOS` (
  `ID`,
  `EQUIPO_LOCAL_FK`,
  `EQUIPO_VISITA_FK`,
  `UBICACION_FK`,
  `FECHA`,
  `CAMPEONATO_ID_FK`
) VALUES (
  6,
  10,
  11,
  1,
  '2023-06-10 13:00:00',
  1
),
(
  7,
  10,
  1,
  1,
  '2023-06-06 12:00:00',
  1
),
(
  8,
  14,
  18,
  1,
  '2023-06-10 12:00:00',
  2
),
(
  9,
  14,
  19,
  1,
  '2023-06-08 15:00:00',
  2
),
(
  10,
  10,
  2,
  1,
  '2023-06-17 13:30:00',
  2
),
(
  11,
  14,
  16,
  1,
  '2023-07-03 15:00:00',
  2
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `PUNTAJES` (
  `ID` INT(11) NOT NULL,
  `ID_CAMPEONATO_FK` INT(11) NOT NULL,
  `ID_PARTIDO_FK` INT(11) NOT NULL,
  `ID_EQUIPO_FK` INT(11) NOT NULL,
  `PUNTAJE` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `puntajes`
--

INSERT INTO `PUNTAJES` (
  `ID`,
  `ID_CAMPEONATO_FK`,
  `ID_PARTIDO_FK`,
  `ID_EQUIPO_FK`,
  `PUNTAJE`
) VALUES (
  4,
  1,
  6,
  11,
  3
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `RESULTADOS` (
  `ID` INT(11) NOT NULL,
  `EQUIPO_LOCAL_FK` INT(11) NOT NULL,
  `EQUIPO_VISITA_FK` INT(11) NOT NULL,
  `GOLES_LOCAL` INT(11) NOT NULL,
  `GOLES_VISITA` INT(11) NOT NULL,
  `ID_PARTIDO_FK` INT(11) DEFAULT NULL,
  `CAMPEONATO_ID_FK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `RESULTADOS` (
  `ID`,
  `EQUIPO_LOCAL_FK`,
  `EQUIPO_VISITA_FK`,
  `GOLES_LOCAL`,
  `GOLES_VISITA`,
  `ID_PARTIDO_FK`,
  `CAMPEONATO_ID_FK`
) VALUES (
  1,
  10,
  11,
  2,
  1,
  6,
  1
),
(
  2,
  10,
  1,
  1,
  0,
  7,
  1
),
(
  3,
  3,
  7,
  0,
  2,
  NULL,
  1
),
(
  4,
  9,
  11,
  1,
  3,
  NULL,
  1
),
(
  5,
  3,
  6,
  5,
  3,
  NULL,
  2
),
(
  6,
  4,
  8,
  7,
  10,
  NULL,
  2
),
(
  7,
  13,
  12,
  4,
  2,
  NULL,
  1
),
(
  8,
  13,
  5,
  1,
  1,
  NULL,
  1
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `SOCIOS` (
  `ID` INT(11) NOT NULL,
  `FECHA_PAGO` DATE DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `SOCIOS` (
  `ID`,
  `FECHA_PAGO`
) VALUES (
  1,
  '2023-04-20'
),
(
  4,
  '2023-04-20'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE `SPONSORS` (
  `ID` INT(11) NOT NULL,
  `NOMBRE` VARCHAR(100) NOT NULL,
  `MONTO_POR_PARTIDO` DECIMAL(10, 0) NOT NULL,
  `CONDICIONES` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `SPONSORS` (
  `ID`,
  `NOMBRE`,
  `MONTO_POR_PARTIDO`,
  `CONDICIONES`
) VALUES (
  1,
  'McDonalds',
  200000,
  'Ninguna'
),
(
  2,
  'McDonaldss',
  500000,
  'Ninguna'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_partido`
--

CREATE TABLE `TARJETAS_PARTIDO` (
  `ID` INT(11) NOT NULL,
  `JUGADOR_FK` INT(11) DEFAULT NULL,
  `MINUTO` INT(11) DEFAULT NULL,
  `PARTIDO_FK` INT(11) DEFAULT NULL,
  `JUGADOR_EXTERNO` VARCHAR(100) DEFAULT NULL,
  `TARJETA` ENUM('amarilla', 'roja') NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `tarjetas_partido`
--

INSERT INTO `TARJETAS_PARTIDO` (
  `ID`,
  `JUGADOR_FK`,
  `MINUTO`,
  `PARTIDO_FK`,
  `JUGADOR_EXTERNO`,
  `TARJETA`
) VALUES (
  1,
  7,
  50,
  6,
  NULL,
  'amarilla'
),
(
  2,
  NULL,
  70,
  6,
  'Ivana Zamorano',
  'roja'
),
(
  3,
  21,
  60,
  8,
  NULL,
  'amarilla'
),
(
  4,
  NULL,
  50,
  9,
  'Jorge Zamora',
  'roja'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_partido`
--

CREATE TABLE `TARJETAS_PARTIDO` (
  `ID` INT(11) NOT NULL,
  `JUGADOR_FK` INT(11) DEFAULT NULL,
  `MINUTO` INT(11) DEFAULT NULL,
  `PARTIDO_FK` INT(11) DEFAULT NULL,
  `JUGADOR_EXTERNO` VARCHAR(100) DEFAULT NULL,
  `TARJETA` ENUM('amarilla', 'roja') NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `tarjetas_partido`
--

INSERT INTO `TARJETAS_PARTIDO` (
  `ID`,
  `JUGADOR_FK`,
  `MINUTO`,
  `PARTIDO_FK`,
  `JUGADOR_EXTERNO`,
  `TARJETA`
) VALUES (
  1,
  7,
  50,
  6,
  NULL,
  'amarilla'
),
(
  2,
  NULL,
  70,
  6,
  'Ivana Zamorano',
  'roja'
),
(
  3,
  21,
  60,
  8,
  NULL,
  'amarilla'
),
(
  4,
  NULL,
  50,
  9,
  'Jorge Zamora',
  'roja'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasos`
--

CREATE TABLE `TRASPASOS` (
  `ID` INT(11) NOT NULL,
  `JUGADOR_ID_FK` INT(11) DEFAULT NULL,
  `EQUIPO_ORIGEN_ID_FK` INT(11) DEFAULT NULL,
  `EQUIPO_DESTINO_ID_FK` INT(11) DEFAULT NULL,
  `FECHA_TRASPASO` DATE DEFAULT NULL,
  `MONTO` DECIMAL(10, 2) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `USUARIOS` (
  `ID` INT(11) NOT NULL,
  `NOMBRES` VARCHAR(100) NOT NULL,
  `APELLIDOS` VARCHAR(100) NOT NULL,
  `EMAIL` VARCHAR(100) NOT NULL,
  `RUN` VARCHAR(30) NOT NULL,
  `DIRECCION` VARCHAR(100) NOT NULL,
  `TELEFONO` INT(9) NOT NULL,
  `PASSWORD_HASH` VARCHAR(255) NOT NULL,
  `ROL` ENUM('administrador', 'direccion', 'jugador', 'equipo_tecnico', 'socio') NOT NULL,
  `SOCIO_ID_FK` INT(11) DEFAULT NULL,
  `JUGADOR_ID_FK` INT(11) DEFAULT NULL,
  `EQUIPO_TECNICO_ID_FK` INT(11) DEFAULT NULL,
  `DIRECCION_ID_FK` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `USUARIOS` (
  `ID`,
  `NOMBRES`,
  `APELLIDOS`,
  `EMAIL`,
  `RUN`,
  `DIRECCION`,
  `TELEFONO`,
  `PASSWORD_HASH`,
  `ROL`,
  `SOCIO_ID_FK`,
  `JUGADOR_ID_FK`,
  `EQUIPO_TECNICO_ID_FK`,
  `DIRECCION_ID_FK`
) VALUES (
  3,
  'Diego Matias',
  'Servietti Martinez',
  'di.servietti@duocuc.cl',
  '19.532.588-K',
  'Pablo de Rokha',
  988839401,
  '092f4ccc7f9cb7512e3dad89417d2cbbd702adfd2c11deabb7ee866e1360447f0339458b6ad667a339b94431e4f202d3cb8f18751e931d386f1bf0fc4c0e5e70f5c585430abeadb2b2294d25d4ebc64afa7581c06f60',
  'administrador',
  NULL,
  NULL,
  NULL,
  NULL
),
(
  4,
  'Ricardo',
  'Garrido Contreras',
  'rangamind@gmail.com',
  '20.020.289-9',
  'psj 5 636 chgte',
  955269593,
  'b2d6691b7a055d72a3b3da1ee4e590ce22070b3acf3da66984c2c2147139e8cf23c4bfbc48465cf6afb895e62e041f1dc0b8a02f8c1583f4b8505ce58f636cd44fd2e7a819f0ce9a1f040cc14406b49da1bc6d0b7bf5',
  'socio',
  1,
  NULL,
  NULL,
  NULL
),
(
  5,
  'Humberta',
  'Suazo',
  'chupete.suazo@gmail.com',
  '112584128-K',
  'Avenida siempre viva 123',
  11122258,
  '123456',
  'jugador',
  NULL,
  1,
  NULL,
  NULL
),
(
  6,
  'Maite',
  'Fernandez',
  'matigol@gmail.com',
  '44487158-8',
  'calle 123',
  111228420,
  '123456',
  'jugador',
  NULL,
  2,
  NULL,
  NULL
),
(
  7,
  'Marcela',
  'Salas',
  'msalas@gmail.com',
  '11557848-8',
  'chillan',
  4455842,
  '123456',
  'jugador',
  NULL,
  11,
  NULL,
  NULL
),
(
  8,
  'Alexa',
  'Sanchez',
  'asanchez@@gmail.com',
  '448815789-7',
  'tocopilla 1',
  445468487,
  '123456',
  'jugador',
  NULL,
  9,
  NULL,
  NULL
),
(
  9,
  'Artura',
  'Vidal',
  'avidal@gmail.com',
  '448712138-8',
  'pintana 10',
  11544510,
  '123456',
  'jugador',
  NULL,
  4,
  NULL,
  NULL
),
(
  10,
  'Gabriela',
  'Medel',
  'gmedel@gmail.com',
  '17712557-8',
  'pintana 1',
  445122358,
  '123456',
  'jugador',
  NULL,
  8,
  NULL,
  NULL
),
(
  11,
  'Cristina',
  'Ronaldo',
  'cr7@gmail.com',
  '123354875-8',
  'portugal 1',
  1123459,
  '123456',
  'jugador',
  NULL,
  7,
  NULL,
  NULL
),
(
  12,
  'Claudia',
  'Empate',
  'kempate@gmail.com',
  '11254887-2',
  'francia 3',
  15843598,
  '123456',
  'jugador',
  NULL,
  3,
  NULL,
  NULL
),
(
  14,
  'Carla',
  'Caszely',
  'ccaszeli@gmail.com',
  '88752146-8',
  'Santiago 1',
  84257299,
  '123456',
  'jugador',
  NULL,
  5,
  NULL,
  NULL
),
(
  15,
  'Liona',
  'Messa',
  'lmessa@gmail.com',
  '4452175-5',
  'La Plata 533',
  44583321,
  '123456',
  'jugador',
  NULL,
  10,
  NULL,
  NULL
),
(
  16,
  'Claudia',
  'Bravo',
  'cbravo@gmail.com',
  '55887123-8',
  'Viluco 50',
  884263575,
  '123456',
  'jugador',
  NULL,
  12,
  NULL,
  NULL
),
(
  17,
  'Huasa',
  'Isla',
  'hisla@gmail.com',
  '23555782-4',
  'buin 789',
  88752587,
  '123456',
  'jugador',
  NULL,
  13,
  NULL,
  NULL
),
(
  18,
  'Jovanna',
  'Beausejour',
  'jbeausejour@gmail.com',
  '7745123-8',
  'pasaje 1',
  445123548,
  '123456',
  'jugador',
  NULL,
  6,
  NULL,
  NULL
),
(
  19,
  'Joana',
  'Herrera',
  'jherrera@gmail.com',
  '44212354-8',
  'PAsje2',
  48551284,
  '123456',
  'jugador',
  NULL,
  14,
  NULL,
  NULL
),
(
  20,
  'Eugenia',
  'Mena',
  'emena@gmail.com',
  '44212354-8',
  'Pasaje 6 55',
  45615815,
  '123456',
  'jugador',
  NULL,
  15,
  NULL,
  NULL
),
(
  21,
  'Josefa',
  'Rojas',
  'jrojas@gmail.com',
  '11235445-8',
  'pasaje8 10',
  4561238,
  '123456',
  'jugador',
  NULL,
  16,
  NULL,
  NULL
),
(
  22,
  'Fernanda',
  'Gutierrez',
  'fgutierrez@gmail.com',
  '4321587-8',
  'casa 123',
  1456481,
  '123456',
  'jugador',
  NULL,
  17,
  NULL,
  NULL
),
(
  23,
  'Gonzala',
  'Jara',
  'gjara@gmail.com',
  '1122354-5',
  'pasaje 8 santiago',
  112335487,
  '123456',
  'jugador',
  NULL,
  18,
  NULL,
  NULL
),
(
  24,
  'Jorge',
  'Sampaoli',
  'jsampaoli@gmail.com',
  '220481263-8',
  'CALLE 4 Pasaje 5',
  22345681,
  '123456',
  'equipo_tecnico',
  NULL,
  NULL,
  1,
  NULL
),
(
  25,
  'Andres',
  'Mundi',
  'amundi@gmail.com',
  '120228574-8',
  'pasaje 6 76',
  71235481,
  '123456',
  'equipo_tecnico',
  NULL,
  NULL,
  2,
  NULL
),
(
  26,
  'Emilio',
  'Gutierrez',
  'eguttierrez@gmail.com',
  '12502758-4',
  'Calle 6 451',
  77512813,
  '123456',
  'equipo_tecnico',
  NULL,
  NULL,
  3,
  NULL
),
(
  27,
  'Damian',
  'Salgado',
  'dsalgado@gmail.com',
  '50158412-8',
  'Av Libertad 358',
  744812357,
  '123456',
  'equipo_tecnico',
  NULL,
  NULL,
  4,
  NULL
),
(
  28,
  'Antonia',
  'Riffo',
  'ariffo@gmail.com',
  '42242057-8',
  'Chgte Psj 8',
  45212358,
  '123456',
  'equipo_tecnico',
  NULL,
  NULL,
  5,
  NULL
),
(
  29,
  'Andres ',
  'Peregrini',
  'aperegrini@gmail.com',
  '50124805-8',
  'Italia 98 concepción',
  88123587,
  '123456',
  'direccion',
  NULL,
  NULL,
  NULL,
  1
),
(
  30,
  'Cristian',
  'Ronaldinho',
  'cristianronaldinho@gmail.com',
  '221257788-8',
  'Calle Messi 123',
  12345678,
  '123456',
  'jugador',
  NULL,
  19,
  NULL,
  NULL
),
(
  31,
  'Cristiano',
  'Evangelista',
  'cristianoevangelista@gmail.com',
  '22051247-7',
  ' Avenida Neymar 456',
  87654321,
  '123456',
  'jugador',
  NULL,
  20,
  NULL,
  NULL
),
(
  32,
  'Andres',
  'Manchez',
  'andresmanchez@gmail.com',
  '20100863-4',
  'Calle Cristiano Ronaldo 789',
  76543218,
  '123456',
  'jugador',
  NULL,
  21,
  NULL,
  NULL
),
(
  33,
  'Leo',
  'Modric',
  'leomodric@gmail.com',
  '23120931-6',
  'Avenida Hazard 321',
  65432187,
  '123456',
  'jugador',
  NULL,
  22,
  NULL,
  NULL
),
(
  34,
  'Antoine',
  'Curtoa',
  'acurtoa@gmail.com',
  '21040687-5',
  'Calle Messi 654',
  54321876,
  '123456',
  'jugador',
  NULL,
  23,
  NULL,
  NULL
),
(
  35,
  'Paulo',
  'Neyman',
  'pauloneyman@gmail.com',
  '25070392-3',
  'Avenida Salah 987',
  43218765,
  '123456',
  'jugador',
  NULL,
  24,
  NULL,
  NULL
),
(
  36,
  'Kevin',
  'Ronalducci',
  'kevinronalducci@gmail.com',
  '24081574-1',
  'Calle Mbappe 789',
  32187654,
  '123456',
  'jugador',
  NULL,
  25,
  NULL,
  NULL
),
(
  37,
  'Leonardo',
  'Suarez',
  'leonardosuarez@gmail.com',
  '23060528-8',
  'Avenida Lewandowski 654',
  21876543,
  '123456',
  'jugador',
  NULL,
  26,
  NULL,
  NULL
),
(
  38,
  'Karim',
  'Benzeme',
  'karimbenzeme@gmail.com',
  '26031416-0',
  'Calle De Bruyne 987',
  18765432,
  '123456',
  'jugador',
  NULL,
  27,
  NULL,
  NULL
),
(
  39,
  'Robert',
  'Leva',
  'robertleva@gmail.com',
  '27092037-9',
  ' Avenida De Gea 654',
  87654321,
  '123456',
  'jugador',
  NULL,
  28,
  NULL,
  NULL
),
(
  40,
  'Arturo',
  'Mival',
  'amival@gmail.com',
  '28011185-4',
  'Calle Francia 68',
  98765432,
  '123456',
  'jugador',
  NULL,
  29,
  NULL,
  NULL
),
(
  41,
  'Jorge',
  'Valdibia',
  'jvaldibia@gmail.com',
  '1231581-9',
  'casa roja 123',
  99885127,
  '3ae40fec330292d5cf555a8293c1142fed39efb70ab19230660162b92f83bb438d69d6dc36a7b21b1d0220c3a5377da5afbc2bdf3fc4f2eea936b0c184f76306940f6b9981f0d3fd96721422f0b60b055ccf4b0319b4',
  'socio',
  NULL,
  NULL,
  NULL,
  NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_utm`
--

CREATE TABLE `VALOR_UTM` (
  `ID` INT(11) NOT NULL,
  `VALOR` DECIMAL(10, 0) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Volcado de datos para la tabla `valor_utm`
--

INSERT INTO `VALOR_UTM` (
  `ID`,
  `VALOR`
) VALUES (
  1,
  63263
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_partidos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `VISTA_PARTIDOS` (
  `FECHA` DATETIME,
  `EQUIPOS` VARCHAR(204),
  `RESULTADO` VARCHAR(45),
  `GOLES_JUGADORES_LOCAL` MEDIUMTEXT,
  `GOLES_JUGADORES_VISITA` MEDIUMTEXT,
  `CAMBIOS_LOCAL` MEDIUMTEXT,
  `CAMBIOS_VISITA` MEDIUMTEXT,
  `TARJETAS_LOCAL` MEDIUMTEXT,
  `TARJETAS_VISITA` MEDIUMTEXT
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_partidos_hasta_hoy`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `VISTA_PARTIDOS_HASTA_HOY` (
  `FECHA` DATETIME,
  `EQUIPOS` VARCHAR(204),
  `RESULTADO` VARCHAR(45),
  `GOLES_JUGADORES_LOCAL` MEDIUMTEXT,
  `GOLES_JUGADORES_VISITA` MEDIUMTEXT,
  `CAMBIOS_LOCAL` MEDIUMTEXT,
  `CAMBIOS_VISITA` MEDIUMTEXT,
  `TARJETAS_LOCAL` MEDIUMTEXT,
  `TARJETAS_VISITA` MEDIUMTEXT
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_partidos`
--
DROP TABLE IF EXISTS `VISTA_PARTIDOS`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`LOCALHOST` SQL SECURITY DEFINER VIEW `VISTA_PARTIDOS` AS
  SELECT
    `P`.`FECHA` AS `FECHA`,
    CONCAT(`E_LOCAL`.`NOMBRE`,
    ' vs ',
    `E_VISITA`.`NOMBRE`) AS `EQUIPOS`,
    CONCAT(`G`.`GOLES_EQUIPO_LOCAL`,
    ' - ',
    `G`.`GOLES_EQUIPO_VISITA`) AS `RESULTADO`,
    (
    SELECT
      GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`J`.`NUMERO_CAMISETA`,
      ' ',
      `U`.`NOMBRES`,
      ' ',
      `U`.`APELLIDOS`),
      ''),
      IF(`G`.`MINUTO` IS NOT NULL,
      CONCAT(' ',
      `G`.`MINUTO`),
      ''),
      ' (',
      `E_LOCAL`.`NOMBRE`,
      ')') SEPARATOR '\n')
    FROM
      ((`GOLES` `G` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `G`.`JUGADOR_ID_FK`)) LEFT JOIN `USUARIOS` `U` ON(`J`.`ID` = `U`.`JUGADOR_ID_FK`))
    WHERE
      `G`.`PARTIDO_ID_FK` = `P`.`ID`
      AND `G`.`JUGADOR_VISITA` IS NULL
    ORDER BY
      `G`.`MINUTO`) AS `GOLES_JUGADORES_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(`G`.`JUGADOR_VISITA`,
          ''),
          IF(`G`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `G`.`MINUTO`),
          ''),
          ' (',
          `E_VISITA`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          `GOLES` `G`
        WHERE
          `G`.`PARTIDO_ID_FK` = `P`.`ID`
          AND `G`.`JUGADOR_ID_FK` IS NULL
        ORDER BY
          `G`.`MINUTO`
      ) AS `GOLES_JUGADORES_VISITA`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`J2`.`NUMERO_CAMISETA`,
          ' ',
          `U_SAL`.`NOMBRES`,
          ' ',
          `U_SAL`.`APELLIDOS`),
          ''),
          ' -> ',
          CONCAT(`J`.`NUMERO_CAMISETA`,
          ' ',
          `U_ENT`.`NOMBRES`,
          ' ',
          `U_ENT`.`APELLIDOS`),
          IF(`C`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `C`.`MINUTO`),
          ''),
          ' (',
          `E_LOCAL`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          ((((`CAMBIOS` `C` LEFT JOIN `USUARIOS` `U_SAL` ON(`C`.`JUGADOR_SALIENTE_FK` = `U_SAL`.`JUGADOR_ID_FK`)) LEFT JOIN `USUARIOS` `U_ENT` ON(`C`.`JUGADOR_ENTRANTE_FK` = `U_ENT`.`JUGADOR_ID_FK`)) LEFT JOIN `JUGADORES` `J` ON(`C`.`JUGADOR_ENTRANTE_FK` = `J`.`ID`)) LEFT JOIN `JUGADORES` `J2` ON(`C`.`JUGADOR_SALIENTE_FK` = `J2`.`ID`))
        WHERE
          `C`.`PARTIDO_FK` = `P`.`ID`
        ORDER BY
          `C`.`MINUTO`
      ) AS `CAMBIOS_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(`E`.`NOMBRE`,
          ', ',
          `CE`.`NOMBRE_JUGADOR_SALIENTE`,
          ' -> ',
          `CE`.`NOMBRE_JUGADOR_ENTRANTE`,
          IF(`CE`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `CE`.`MINUTO`),
          ''),
          ' (',
          `E_VISITA`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          (`CAMBIOS_EXTERNO` `CE` LEFT JOIN `EQUIPOS` `E` ON(`E`.`ID` = `P`.`EQUIPO_VISITA_FK`))
        WHERE
          `CE`.`PARTIDO_ID_FK` = `P`.`ID`
        ORDER BY
          `CE`.`MINUTO`
      ) AS `CAMBIOS_VISITA`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`U`.`NOMBRES`,
          ' ',
          `U`.`APELLIDOS`),
          ''),
          ' ',
          `TP`.`TARJETA`,
          IF(`TP`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `TP`.`MINUTO`),
          ''),
          ' (',
          `EL`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          (((`TARJETAS_PARTIDO` `TP` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `TP`.`JUGADOR_FK`)) LEFT JOIN `USUARIOS` `U` ON(`U`.`JUGADOR_ID_FK` = `J`.`ID`)) LEFT JOIN `EQUIPOS` `EL` ON(`EL`.`ID` = `P`.`EQUIPO_LOCAL_FK`))
        WHERE
          `TP`.`PARTIDO_FK` = `P`.`ID`
          AND `TP`.`JUGADOR_FK` IS NOT NULL
        ORDER BY
          `TP`.`MINUTO`
      ) AS `TARJETAS_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CASE
            WHEN `TP`.`JUGADOR_FK` IS NOT NULL THEN
              CONCAT(`U`.`NOMBRES`, ' ', `U`.`APELLIDOS`)
            ELSE
              `TP`.`JUGADOR_EXTERNO`
          END,
          ''),
          ' ',
          `TP`.`TARJETA`,
          IF(`TP`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `TP`.`MINUTO`),
          ''),
          ' (',
          `EV`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          ((((`TARJETAS_PARTIDO` `TP` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `TP`.`JUGADOR_FK`)) LEFT JOIN `USUARIOS` `U` ON(`U`.`JUGADOR_ID_FK` = `J`.`ID`)) LEFT JOIN `EQUIPOS` `EL` ON(`EL`.`ID` = `P`.`EQUIPO_LOCAL_FK`)) LEFT JOIN `EQUIPOS` `EV` ON(`EV`.`ID` = `P`.`EQUIPO_VISITA_FK`))
        WHERE
          `TP`.`PARTIDO_FK` = `P`.`ID`
          AND `TP`.`JUGADOR_FK` IS NULL
        ORDER BY
          `TP`.`MINUTO`
      ) AS `TARJETAS_VISITA`
    FROM
      (((`PARTIDOS` `P` JOIN `EQUIPOS` `E_LOCAL` ON(`E_LOCAL`.`ID` = `P`.`EQUIPO_LOCAL_FK`)) JOIN `EQUIPOS` `E_VISITA` ON(`E_VISITA`.`ID` = `P`.`EQUIPO_VISITA_FK`)) LEFT JOIN (
        SELECT
          `P`.`ID` AS `PARTIDO_ID`,
          COUNT(CASE
            WHEN `G`.`JUGADOR_ID_FK` IS NOT NULL THEN
              1
          END) AS `GOLES_EQUIPO_LOCAL`,
          COUNT(CASE
            WHEN `G`.`JUGADOR_ID_FK` IS NULL THEN
              1
          END) AS `GOLES_EQUIPO_VISITA`
        FROM
          (`PARTIDOS` `P` LEFT JOIN `GOLES` `G` ON(`P`.`ID` = `G`.`PARTIDO_ID_FK`))
        WHERE
          `P`.`FECHA` <= CURRENT_TIMESTAMP()
        GROUP BY
          `P`.`ID`
      ) `G` ON(`P`.`ID` = `G`.`PARTIDO_ID`))
    ORDER BY
      `P`.`FECHA` DESC;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_partidos_hasta_hoy`
--
DROP TABLE IF EXISTS `VISTA_PARTIDOS_HASTA_HOY`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ROOT`@`LOCALHOST` SQL SECURITY DEFINER VIEW `VISTA_PARTIDOS_HASTA_HOY` AS
  SELECT
    `P`.`FECHA` AS `FECHA`,
    CONCAT(`E_LOCAL`.`NOMBRE`,
    ' vs ',
    `E_VISITA`.`NOMBRE`) AS `EQUIPOS`,
    CONCAT(`G`.`GOLES_EQUIPO_LOCAL`,
    ' - ',
    `G`.`GOLES_EQUIPO_VISITA`) AS `RESULTADO`,
    (
    SELECT
      GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`J`.`NUMERO_CAMISETA`,
      ' ',
      `U`.`NOMBRES`,
      ' ',
      `U`.`APELLIDOS`),
      ''),
      IF(`G`.`MINUTO` IS NOT NULL,
      CONCAT(' ',
      `G`.`MINUTO`),
      ''),
      ' (',
      `E_LOCAL`.`NOMBRE`,
      ')') SEPARATOR '\n')
    FROM
      ((`GOLES` `G` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `G`.`JUGADOR_ID_FK`)) LEFT JOIN `USUARIOS` `U` ON(`J`.`ID` = `U`.`JUGADOR_ID_FK`))
    WHERE
      `G`.`PARTIDO_ID_FK` = `P`.`ID`
      AND `G`.`JUGADOR_VISITA` IS NULL
    ORDER BY
      `G`.`MINUTO`) AS `GOLES_JUGADORES_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(`G`.`JUGADOR_VISITA`,
          ''),
          IF(`G`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `G`.`MINUTO`),
          ''),
          ' (',
          `E_VISITA`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          `GOLES` `G`
        WHERE
          `G`.`PARTIDO_ID_FK` = `P`.`ID`
          AND `G`.`JUGADOR_ID_FK` IS NULL
        ORDER BY
          `G`.`MINUTO`
      ) AS `GOLES_JUGADORES_VISITA`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`J2`.`NUMERO_CAMISETA`,
          ' ',
          `U_SAL`.`NOMBRES`,
          ' ',
          `U_SAL`.`APELLIDOS`),
          ''),
          ' -> ',
          CONCAT(`J`.`NUMERO_CAMISETA`,
          ' ',
          `U_ENT`.`NOMBRES`,
          ' ',
          `U_ENT`.`APELLIDOS`),
          IF(`C`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `C`.`MINUTO`),
          ''),
          ' (',
          `E_LOCAL`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          ((((`CAMBIOS` `C` LEFT JOIN `USUARIOS` `U_SAL` ON(`C`.`JUGADOR_SALIENTE_FK` = `U_SAL`.`JUGADOR_ID_FK`)) LEFT JOIN `USUARIOS` `U_ENT` ON(`C`.`JUGADOR_ENTRANTE_FK` = `U_ENT`.`JUGADOR_ID_FK`)) LEFT JOIN `JUGADORES` `J` ON(`C`.`JUGADOR_ENTRANTE_FK` = `J`.`ID`)) LEFT JOIN `JUGADORES` `J2` ON(`C`.`JUGADOR_SALIENTE_FK` = `J2`.`ID`))
        WHERE
          `C`.`PARTIDO_FK` = `P`.`ID`
        ORDER BY
          `C`.`MINUTO`
      ) AS `CAMBIOS_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(`E`.`NOMBRE`,
          ', ',
          `CE`.`NOMBRE_JUGADOR_SALIENTE`,
          ' -> ',
          `CE`.`NOMBRE_JUGADOR_ENTRANTE`,
          IF(`CE`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `CE`.`MINUTO`),
          ''),
          ' (',
          `E_VISITA`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          (`CAMBIOS_EXTERNO` `CE` LEFT JOIN `EQUIPOS` `E` ON(`E`.`ID` = `P`.`EQUIPO_VISITA_FK`))
        WHERE
          `CE`.`PARTIDO_ID_FK` = `P`.`ID`
        ORDER BY
          `CE`.`MINUTO`
      ) AS `CAMBIOS_VISITA`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CONCAT(`U`.`NOMBRES`,
          ' ',
          `U`.`APELLIDOS`),
          ''),
          ' ',
          `TP`.`TARJETA`,
          IF(`TP`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `TP`.`MINUTO`),
          ''),
          ' (',
          `E_LOCAL`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          ((`TARJETAS_PARTIDO` `TP` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `TP`.`JUGADOR_FK`)) LEFT JOIN `USUARIOS` `U` ON(`U`.`JUGADOR_ID_FK` = `J`.`ID`))
        WHERE
          `TP`.`PARTIDO_FK` = `P`.`ID`
          AND `TP`.`JUGADOR_FK` IS NOT NULL
        ORDER BY
          `TP`.`MINUTO`
      ) AS `TARJETAS_LOCAL`,
      (
        SELECT
          GROUP_CONCAT(CONCAT(IFNULL(CASE
            WHEN `TP`.`JUGADOR_FK` IS NOT NULL THEN
              CONCAT(`U`.`NOMBRES`, ' ', `U`.`APELLIDOS`)
            ELSE
              `TP`.`JUGADOR_EXTERNO`
          END,
          ''),
          ' ',
          `TP`.`TARJETA`,
          IF(`TP`.`MINUTO` IS NOT NULL,
          CONCAT(' ',
          `TP`.`MINUTO`),
          ''),
          ' (',
          `E_VISITA`.`NOMBRE`,
          ')') SEPARATOR '\n')
        FROM
          ((`TARJETAS_PARTIDO` `TP` LEFT JOIN `JUGADORES` `J` ON(`J`.`ID` = `TP`.`JUGADOR_FK`)) LEFT JOIN `USUARIOS` `U` ON(`U`.`JUGADOR_ID_FK` = `J`.`ID`))
        WHERE
          `TP`.`PARTIDO_FK` = `P`.`ID`
          AND `TP`.`JUGADOR_FK` IS NULL
        ORDER BY
          `TP`.`MINUTO`
      ) AS `TARJETAS_VISITA`
    FROM
      (((`PARTIDOS` `P` JOIN `EQUIPOS` `E_LOCAL` ON(`E_LOCAL`.`ID` = `P`.`EQUIPO_LOCAL_FK`)) JOIN `EQUIPOS` `E_VISITA` ON(`E_VISITA`.`ID` = `P`.`EQUIPO_VISITA_FK`)) LEFT JOIN (
        SELECT
          `P`.`ID` AS `PARTIDO_ID`,
          COUNT(CASE
            WHEN `G`.`JUGADOR_ID_FK` IS NOT NULL THEN
              1
          END) AS `GOLES_EQUIPO_LOCAL`,
          COUNT(CASE
            WHEN `G`.`JUGADOR_ID_FK` IS NULL THEN
              1
          END) AS `GOLES_EQUIPO_VISITA`
        FROM
          (`PARTIDOS` `P` LEFT JOIN `GOLES` `G` ON(`P`.`ID` = `G`.`PARTIDO_ID_FK`))
        WHERE
          `P`.`FECHA` <= CURRENT_TIMESTAMP()
        GROUP BY
          `P`.`ID`
      ) `G` ON(`P`.`ID` = `G`.`PARTIDO_ID`))
    WHERE
      `P`.`FECHA` <= CURRENT_TIMESTAMP()
    ORDER BY
      `P`.`FECHA` DESC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `CAMBIOS` ADD PRIMARY KEY (`ID`), ADD KEY `CAMBIOS_FK` (`PARTIDO_FK`), ADD KEY `CAMBIOS_FK_1` (`JUGADOR_ENTRANTE_FK`), ADD KEY `CAMBIOS_FK_2` (`JUGADOR_SALIENTE_FK`);

--
-- Indices de la tabla `cambios_externo`
--
ALTER TABLE `CAMBIOS_EXTERNO` ADD PRIMARY KEY (`ID`), ADD KEY `CAMBIOS_EXTERNO_FK` (`PARTIDO_ID_FK`);

--
-- Indices de la tabla `campeonatos`
--
ALTER TABLE `CAMPEONATOS` ADD PRIMARY KEY (`ID`), ADD KEY `CAMPEONATOS_FK_1` (`DIVISION_ID_FK`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `CANCHA` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dirigente`
--
ALTER TABLE `DIRIGENTE` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `DIVISION` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `EGRESOS` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `EQUIPOS` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPOS_FK` (`DIVISION_ID_FK`);

--
-- Indices de la tabla `equipos_campeonato`
--
ALTER TABLE `EQUIPOS_CAMPEONATO` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPOS_CAMPEONATO_FK` (`CAMPEONATO_ID_FK`), ADD KEY `EQUIPOS_CAMPEONATO_FK_1` (`EQUIPO_ID_FK`);

--
-- Indices de la tabla `equipo_tecnico`
--
ALTER TABLE `EQUIPO_TECNICO` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPO_TECNICO_FK` (`EQUIPO_PROVIENE_FK`);

--
-- Indices de la tabla `estadisticas_campeonato`
--
ALTER TABLE `ESTADISTICAS_CAMPEONATO` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estadisticas_equipo`
--
ALTER TABLE `ESTADISTICAS_EQUIPO` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPO_ID` (`EQUIPO_ID_FK`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `GOLES` ADD PRIMARY KEY (`ID`), ADD KEY `PARTIDO_ID` (`PARTIDO_ID_FK`), ADD KEY `JUGADOR_ID` (`JUGADOR_ID_FK`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `INGRESOS` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `JUGADORES` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPO_ID` (`EQUIPO_PROVIENE_ID_FK`);

--
-- Indices de la tabla `lesiones`
--
ALTER TABLE `LESIONES` ADD PRIMARY KEY (`ID`), ADD KEY `JUGADOR_ID` (`JUGADOR_ID_FK`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `MOTIVO` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `MOVIMIENTOS` ADD PRIMARY KEY (`ID`), ADD KEY `MOVIMIENTOS_FK` (`MOTIVO_FK`), ADD KEY `MOVIMIENTOS_FK_1` (`USUARIO_FK`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `PARTIDOS` ADD PRIMARY KEY (`ID`), ADD KEY `EQUIPO_LOCAL` (`EQUIPO_LOCAL_FK`), ADD KEY `EQUIPO_VISITA` (`EQUIPO_VISITA_FK`), ADD KEY `UBICACION` (`UBICACION_FK`), ADD KEY `PARTIDOS_FK` (`CAMPEONATO_ID_FK`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `PUNTAJES` ADD PRIMARY KEY (`ID`), ADD KEY `PUNTAJES_FK_2` (`ID_PARTIDO_FK`), ADD KEY `PUNTAJES_FK_1` (`ID_CAMPEONATO_FK`), ADD KEY `PUNTAJES_FK` (`ID_EQUIPO_FK`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `RESULTADOS` ADD PRIMARY KEY (`ID`), ADD KEY `NEWTABLE_FK` (`EQUIPO_LOCAL_FK`), ADD KEY `NEWTABLE_FK_1` (`EQUIPO_VISITA_FK`), ADD KEY `NEWTABLE_FK_2` (`ID_PARTIDO_FK`), ADD KEY `RESULTADOS_FK` (`CAMPEONATO_ID_FK`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `SOCIOS` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sponsors`
--
ALTER TABLE `SPONSORS` ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tarjetas_partido`
--
ALTER TABLE `TARJETAS_PARTIDO` ADD PRIMARY KEY (`ID`), ADD KEY `TARJETAS_PARTIDO_FK` (`JUGADOR_FK`), ADD KEY `TARJETAS_PARTIDO_FK_2` (`PARTIDO_FK`);

--
-- Indices de la tabla `traspasos`
--
ALTER TABLE `TRASPASOS` ADD PRIMARY KEY (`ID`), ADD KEY `JUGADOR_ID` (`JUGADOR_ID_FK`), ADD KEY `EQUIPO_ORIGEN_ID` (`EQUIPO_ORIGEN_ID_FK`), ADD KEY `EQUIPO_DESTINO_ID` (`EQUIPO_DESTINO_ID_FK`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `USUARIOS` ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `EMAIL` (`EMAIL`), ADD KEY `SOCIO_ID` (`SOCIO_ID_FK`), ADD KEY `JUGADOR_ID` (`JUGADOR_ID_FK`), ADD KEY `EQUIPO_TECNICO_ID` (`EQUIPO_TECNICO_ID_FK`), ADD KEY `USUARIOS_FK` (`DIRECCION_ID_FK`);

--
-- Indices de la tabla `valor_utm`
--
ALTER TABLE `VALOR_UTM` ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `CAMBIOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cambios_externo`
--
ALTER TABLE `CAMBIOS_EXTERNO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `campeonatos`
--
ALTER TABLE `CAMPEONATOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `CANCHA` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dirigente`
--
ALTER TABLE `DIRIGENTE` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `DIVISION` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `EGRESOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `EQUIPOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `equipos_campeonato`
--
ALTER TABLE `EQUIPOS_CAMPEONATO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_tecnico`
--
ALTER TABLE `EQUIPO_TECNICO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadisticas_campeonato`
--
ALTER TABLE `ESTADISTICAS_CAMPEONATO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadisticas_equipo`
--
ALTER TABLE `ESTADISTICAS_EQUIPO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `GOLES` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `INGRESOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `JUGADORES` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `lesiones`
--
ALTER TABLE `LESIONES` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `MOTIVO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `MOVIMIENTOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `PARTIDOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `puntajes`
--
ALTER TABLE `PUNTAJES` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `RESULTADOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `SOCIOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `SPONSORS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjetas_partido`
--
ALTER TABLE `TARJETAS_PARTIDO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarjetas_partido`
--
ALTER TABLE `TARJETAS_PARTIDO` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `traspasos`
--
ALTER TABLE `TRASPASOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `USUARIOS` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambios`
--
ALTER TABLE `CAMBIOS` ADD CONSTRAINT `CAMBIOS_FK` FOREIGN KEY (`PARTIDO_FK`) REFERENCES `PARTIDOS` (`ID`), ADD CONSTRAINT `CAMBIOS_FK_1` FOREIGN KEY (`JUGADOR_ENTRANTE_FK`) REFERENCES `JUGADORES` (`ID`), ADD CONSTRAINT `CAMBIOS_FK_2` FOREIGN KEY (`JUGADOR_SALIENTE_FK`) REFERENCES `JUGADORES` (`ID`);

--
-- Filtros para la tabla `cambios_externo`
--
ALTER TABLE `CAMBIOS_EXTERNO` ADD CONSTRAINT `CAMBIOS_EXTERNO_FK` FOREIGN KEY (`PARTIDO_ID_FK`) REFERENCES `PARTIDOS` (`ID`);

--
-- Filtros para la tabla `campeonatos`
--
ALTER TABLE `CAMPEONATOS` ADD CONSTRAINT `CAMPEONATOS_FK_1` FOREIGN KEY (`DIVISION_ID_FK`) REFERENCES `DIVISION` (`ID`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `EQUIPOS` ADD CONSTRAINT `EQUIPOS_FK` FOREIGN KEY (`DIVISION_ID_FK`) REFERENCES `DIVISION` (`ID`);

--
-- Filtros para la tabla `equipos_campeonato`
--
ALTER TABLE `EQUIPOS_CAMPEONATO` ADD CONSTRAINT `EQUIPOS_CAMPEONATO_FK` FOREIGN KEY (`CAMPEONATO_ID_FK`) REFERENCES `CAMPEONATOS` (`ID`), ADD CONSTRAINT `EQUIPOS_CAMPEONATO_FK_1` FOREIGN KEY (`EQUIPO_ID_FK`) REFERENCES `EQUIPOS` (`ID`);

--
-- Filtros para la tabla `equipo_tecnico`
--
ALTER TABLE `EQUIPO_TECNICO` ADD CONSTRAINT `EQUIPO_TECNICO_FK` FOREIGN KEY (`EQUIPO_PROVIENE_FK`) REFERENCES `EQUIPOS` (`ID`);

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `GOLES` ADD CONSTRAINT `GOLES_FK` FOREIGN KEY (`PARTIDO_ID_FK`) REFERENCES `PARTIDOS` (`ID`), ADD CONSTRAINT `GOLES_FK_1` FOREIGN KEY (`JUGADOR_ID_FK`) REFERENCES `JUGADORES` (`ID`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `JUGADORES` ADD CONSTRAINT `JUGADORES_IBFK_1` FOREIGN KEY (`EQUIPO_PROVIENE_ID_FK`) REFERENCES `EQUIPOS` (`ID`);

--
-- Filtros para la tabla `lesiones`
--
ALTER TABLE `LESIONES` ADD CONSTRAINT `LESIONES_IBFK_1` FOREIGN KEY (`JUGADOR_ID_FK`) REFERENCES `JUGADORES` (`ID`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `MOVIMIENTOS` ADD CONSTRAINT `MOVIMIENTOS_FK` FOREIGN KEY (`MOTIVO_FK`) REFERENCES `MOTIVO` (`ID`), ADD CONSTRAINT `MOVIMIENTOS_FK_1` FOREIGN KEY (`USUARIO_FK`) REFERENCES `USUARIOS` (`ID`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `PARTIDOS` ADD CONSTRAINT `PARTIDOS_FK` FOREIGN KEY (`CAMPEONATO_ID_FK`) REFERENCES `CAMPEONATOS` (`ID`), ADD CONSTRAINT `PARTIDOS_IBFK_1` FOREIGN KEY (`EQUIPO_LOCAL_FK`) REFERENCES `EQUIPOS` (`ID`), ADD CONSTRAINT `PARTIDOS_IBFK_2` FOREIGN KEY (`EQUIPO_VISITA_FK`) REFERENCES `EQUIPOS` (`ID`), ADD CONSTRAINT `PARTIDOS_IBFK_3` FOREIGN KEY (`UBICACION_FK`) REFERENCES `CANCHA` (`ID`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `RESULTADOS` ADD CONSTRAINT `NEWTABLE_FK` FOREIGN KEY (`EQUIPO_LOCAL_FK`) REFERENCES `EQUIPOS` (`ID`), ADD CONSTRAINT `NEWTABLE_FK_1` FOREIGN KEY (`EQUIPO_VISITA_FK`) REFERENCES `EQUIPOS` (`ID`), ADD CONSTRAINT `NEWTABLE_FK_2` FOREIGN KEY (`ID_PARTIDO_FK`) REFERENCES `PARTIDOS` (`ID`), ADD CONSTRAINT `RESULTADOS_FK` FOREIGN KEY (`CAMPEONATO_ID_FK`) REFERENCES `CAMPEONATOS` (`ID`);

--
-- Filtros para la tabla `tarjetas_partido`
--
ALTER TABLE `TARJETAS_PARTIDO` ADD CONSTRAINT `TARJETAS_PARTIDO_FK` FOREIGN KEY (`JUGADOR_FK`) REFERENCES `JUGADORES` (`ID`), ADD CONSTRAINT `TARJETAS_PARTIDO_FK_2` FOREIGN KEY (`PARTIDO_FK`) REFERENCES `PARTIDOS` (`ID`);

--
-- Filtros para la tabla `traspasos`
--
ALTER TABLE `TRASPASOS` ADD CONSTRAINT `TRASPASOS_FK` FOREIGN KEY (`JUGADOR_ID_FK`) REFERENCES `JUGADORES` (`ID`), ADD CONSTRAINT `TRASPASOS_IBFK_2` FOREIGN KEY (`EQUIPO_ORIGEN_ID_FK`) REFERENCES `EQUIPOS` (`ID`), ADD CONSTRAINT `TRASPASOS_IBFK_3` FOREIGN KEY (`EQUIPO_DESTINO_ID_FK`) REFERENCES `EQUIPOS` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `USUARIOS` ADD CONSTRAINT `USUARIOS_FK` FOREIGN KEY (`DIRECCION_ID_FK`) REFERENCES `DIRIGENTE` (`ID`), ADD CONSTRAINT `USUARIOS_IBFK_1` FOREIGN KEY (`SOCIO_ID_FK`) REFERENCES `SOCIOS` (`ID`), ADD CONSTRAINT `USUARIOS_IBFK_2` FOREIGN KEY (`JUGADOR_ID_FK`) REFERENCES `JUGADORES` (`ID`), ADD CONSTRAINT `USUARIOS_IBFK_3` FOREIGN KEY (`EQUIPO_TECNICO_ID_FK`) REFERENCES `EQUIPO_TECNICO` (`ID`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;