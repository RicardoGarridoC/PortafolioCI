-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 19:33:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `cambios` (
  `id` int(11) NOT NULL,
  `minuto` int(11) NOT NULL,
  `jugador_entrante_fk` int(11) NOT NULL,
  `jugador_saliente_fk` int(11) DEFAULT NULL,
  `partido_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`id`, `minuto`, `jugador_entrante_fk`, `jugador_saliente_fk`, `partido_fk`) VALUES
(1, 50, 11, 4, 6),
(2, 75, 9, 8, 6),
(3, 60, 24, 28, 8),
(4, 80, 29, 22, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios_externo`
--

CREATE TABLE `cambios_externo` (
  `id` int(11) NOT NULL,
  `minuto` int(11) NOT NULL,
  `partido_id_fk` int(11) NOT NULL,
  `nombre_jugador_saliente` varchar(100) NOT NULL,
  `nombre_jugador_entrante` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cambios_externo`
--

INSERT INTO `cambios_externo` (`id`, `minuto`, `partido_id_fk`, `nombre_jugador_saliente`, `nombre_jugador_entrante`) VALUES
(1, 50, 6, '4 Calula Melendez', '2 Artura Sanhueza'),
(2, 60, 6, '5 Patricia Yanez', '6 Marka Gonzales'),
(3, 60, 8, '7 Jorge Salah', '9 Mauricio Peninsula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--

CREATE TABLE `campeonatos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `division_id_fk` int(11) DEFAULT NULL,
  `temporada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `campeonatos`
--

INSERT INTO `campeonatos` (`id`, `nombre`, `division_id_fk`, `temporada`) VALUES
(1, 'Campeonato Tercera Femenino', 1, '2023'),
(2, 'Partido Amistoso', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`id`, `nombre`, `ubicacion`) VALUES
(1, 'Caupolican', 'Ribera Bio Bio, altura Corbeta Ancud, Chiguayante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigente`
--

CREATE TABLE `dirigente` (
  `id` int(11) NOT NULL,
  `sueldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dirigente`
--

INSERT INTO `dirigente` (`id`, `sueldo`) VALUES
(1, 1000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id`, `categoria`) VALUES
(1, 'Tercera división'),
(2, 'Cuarta división'),
(3, 'Quinta división');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `concepto` enum('sueldo_jugadores','sueldo_e_tecnico','sueldo_dirigentes','pago_mensualidad','impuesto_venta') NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `concepto`, `monto`, `fecha`, `detalle`) VALUES
(20, 'sueldo_e_tecnico', 420000, '2023-06-12', 'Sueldo de equipo tecnico Emilio Gutierrez'),
(21, 'sueldo_e_tecnico', 420000, '2023-06-12', 'Sueldo de equipo tecnico Emilio Gutierrez'),
(22, 'sueldo_e_tecnico', 420000, '2023-06-12', 'Sueldo de equipo tecnico Emilio Gutierrez'),
(23, 'sueldo_e_tecnico', 350000, '2023-06-12', 'Sueldo de equipo tecnico Andres Mundi'),
(24, 'sueldo_dirigentes', 1000000, '2023-06-12', 'Pago de sueldo dirigente Andres  Peregrini'),
(25, 'sueldo_dirigentes', 1000000, '2023-06-12', 'Pago de sueldo dirigente Andres  Peregrini'),
(26, 'pago_mensualidad', 126526, '2023-06-12', 'Pago de mensualidad ANFA mes de June 2023'),
(27, 'impuesto_venta', 2500000, '2023-06-13', 'Comisión venta jugador Paulo Neyman ANFA'),
(28, 'impuesto_venta', 2500000, '2023-06-13', 'Comisión venta jugador Paulo Neyman Asociación del Bio Bio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `genero` enum('masculino','femenino') NOT NULL,
  `division_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `genero`, `division_id_fk`) VALUES
(1, 'Dragones Rojos', 'femenino', 1),
(2, 'Panteras Negras', 'femenino', 3),
(3, 'Lobas Plateadas', 'femenino', 1),
(4, 'Leonas Blancas', 'femenino', 2),
(5, 'Tigres Dorados', 'femenino', 1),
(6, 'Águilas Azules', 'femenino', 1),
(7, 'Coyotes Salvajes', 'femenino', 1),
(8, 'Jaguares Amarillos', 'femenino', 1),
(9, 'Osos Pardos', 'femenino', 1),
(10, 'Los Alces FC F', 'femenino', 1),
(11, 'Irreal Madrid', 'femenino', 1),
(12, 'Guachipato', 'femenino', 1),
(13, 'Paris San German', 'femenino', 1),
(14, 'Los Alces FC M', 'masculino', 1),
(15, 'Rusia Dortmund', 'masculino', 1),
(16, 'Ohiggins Norte', 'masculino', 1),
(17, 'Tornado Rojo', 'masculino', 1),
(18, 'Concepcion City', 'masculino', 1),
(19, 'Concepcion United', 'masculino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_campeonato`
--

CREATE TABLE `equipos_campeonato` (
  `id` int(11) NOT NULL,
  `equipo_id_fk` int(11) NOT NULL,
  `campeonato_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tecnico`
--

CREATE TABLE `equipo_tecnico` (
  `id` int(11) NOT NULL,
  `cargo` enum('entrenador','asistente_entrenador','preparador_fisico','utilero','kinesiologo') NOT NULL,
  `equipo_proviene_fk` int(11) DEFAULT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `valor_hora_extra` decimal(10,2) DEFAULT NULL,
  `horas_extras_mes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo_tecnico`
--

INSERT INTO `equipo_tecnico` (`id`, `cargo`, `equipo_proviene_fk`, `sueldo`, `valor_hora_extra`, `horas_extras_mes`) VALUES
(1, 'entrenador', NULL, 600000.00, 10000.00, 4),
(2, 'asistente_entrenador', 1, 350000.00, 3000.00, 0),
(3, 'preparador_fisico', 8, 400000.00, 4000.00, 5),
(4, 'utilero', NULL, 350000.00, 3000.00, 0),
(5, 'kinesiologo', NULL, 400000.00, 4000.00, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_campeonato`
--

CREATE TABLE `estadisticas_campeonato` (
  `id` int(11) NOT NULL,
  `partidos_ganados` int(11) DEFAULT 0,
  `partidos_empatados` int(11) DEFAULT 0,
  `partidos_perdidos` int(11) DEFAULT 0,
  `goles_favor` int(11) DEFAULT 0,
  `goles_contra` int(11) DEFAULT 0,
  `diferencia_goles` int(11) DEFAULT 0,
  `puntos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_equipo`
--

CREATE TABLE `estadisticas_equipo` (
  `id` int(11) NOT NULL,
  `goles_convertidos` int(11) DEFAULT 0,
  `goles_recibidos` int(11) DEFAULT 0,
  `cambios_realizados` int(11) DEFAULT 0,
  `tarjetas_amarillas` int(11) DEFAULT 0,
  `tarjetas_rojas` int(11) DEFAULT 0,
  `equipo_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `id` int(11) NOT NULL,
  `partido_id_fk` int(11) NOT NULL,
  `jugador_id_fk` int(11) DEFAULT NULL,
  `minuto` int(11) DEFAULT NULL,
  `jugador_visita` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `goles`
--

INSERT INTO `goles` (`id`, `partido_id_fk`, `jugador_id_fk`, `minuto`, `jugador_visita`) VALUES
(2, 6, 1, 34, NULL),
(3, 6, 2, 45, NULL),
(4, 6, NULL, 50, '10 Jorge Valdivia'),
(5, 7, 4, 40, NULL),
(6, 9, 20, 4, NULL),
(7, 9, 21, 98, NULL),
(8, 9, NULL, 16, 'Jorge Gonzales'),
(9, 8, 26, 12, NULL),
(10, 8, 24, 30, NULL),
(11, 8, NULL, 25, 'Diego Maratona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `concepto` enum('mensualidad','sponsor','actividades_extra','venta_jugadores') NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `concepto`, `monto`, `fecha`, `detalle`, `id_usuario_fk`) VALUES
(17, 'sponsor', 200000, '2023-06-08', 'McDonalds', NULL),
(18, 'venta_jugadores', 1233, '2023-06-13', 'Venta de jugador Andres Manchez', NULL),
(19, 'venta_jugadores', 10000000, '2023-06-13', 'Venta de jugador Paulo Neyman', NULL),
(20, 'sponsor', 200000, '2023-06-10', 'McDonalds', NULL),
(21, 'actividades_extra', 150000, '2023-06-09', 'rifa prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `partidos_jugados` int(11) DEFAULT 0,
  `tipo` enum('aficionado','profesional') NOT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `ayuda_economica` decimal(10,2) DEFAULT NULL,
  `equipo_proviene_id_fk` int(11) DEFAULT NULL,
  `numero_camiseta` int(11) DEFAULT NULL,
  `genero` enum('masculino','femenino') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `posicion`, `partidos_jugados`, `tipo`, `sueldo`, `ayuda_economica`, `equipo_proviene_id_fk`, `numero_camiseta`, `genero`) VALUES
(1, 'Delantero', 20, 'profesional', 400000.00, 0.00, 10, 7, 'femenino'),
(2, 'Defensa', 15, 'profesional', 300000.00, 0.00, 10, 8, 'femenino'),
(3, 'Mediocampista', 18, 'profesional', 300000.00, 0.00, 10, 11, 'femenino'),
(4, 'Portero', 10, 'aficionado', NULL, 150000.00, 10, 10, 'femenino'),
(5, 'Centrodelantero', 10, 'profesional', 250000.00, 0.00, NULL, 50, 'femenino'),
(6, 'Lateral', 1, 'aficionado', NULL, 200000.00, NULL, 44, 'femenino'),
(7, 'Delantero', 17, 'profesional', 500000.00, 0.00, 10, 9, 'femenino'),
(8, 'Mediocampista', 12, 'profesional', 200000.00, 0.00, 10, 1, 'femenino'),
(9, 'Defensa', 18, 'profesional', 175000.00, 0.00, 10, 4, 'femenino'),
(10, 'Delantero', 20, 'profesional', 220000.00, 0.00, 10, 22, 'femenino'),
(11, 'Mediocampista', 17, 'profesional', 180000.00, 0.00, 10, 20, 'femenino'),
(12, 'Portero', 10, 'profesional', 170000.00, 0.00, 10, 24, 'femenino'),
(13, 'Mediocampista', 22, 'aficionado', 225000.00, 151000.00, 10, 30, 'femenino'),
(14, 'Mediocampista', 5, 'aficionado', NULL, 0.00, NULL, 23, 'femenino'),
(15, 'Defensa', 10, 'profesional', 100000.00, 0.00, NULL, 18, 'femenino'),
(16, 'Mediocampista', 15, 'aficionado', NULL, 150000.00, NULL, 19, 'femenino'),
(17, 'Defensa', 3, 'aficionado', NULL, 0.00, NULL, 21, 'femenino'),
(18, 'Delantero', 10, 'profesional', 200000.00, 0.00, NULL, 25, 'femenino'),
(19, 'Portero', 3, 'aficionado', NULL, 200000.00, NULL, 12, 'masculino'),
(20, 'Delantero', 4, 'aficionado', NULL, 150000.00, NULL, 10, 'masculino'),
(21, 'Delantero', 2, 'aficionado', NULL, 300000.00, NULL, 9, 'masculino'),
(22, 'Defensa', 4, 'aficionado', NULL, 200000.00, NULL, 8, 'masculino'),
(23, 'Defensa', 5, 'profesional', 200000.00, NULL, 15, 11, 'masculino'),
(24, 'Defensa', 3, 'aficionado', NULL, 200000.00, NULL, 16, 'masculino'),
(25, 'Mediocampista', 2, 'profesional', 150000.00, NULL, NULL, 22, 'masculino'),
(26, 'Mediocampista', 4, 'aficionado', NULL, 150000.00, NULL, 30, 'masculino'),
(27, 'Lateral', 6, 'aficionado', NULL, 50000.00, 18, 24, 'masculino'),
(28, 'Lateral', 2, 'profesional', 150000.00, NULL, NULL, 19, 'masculino'),
(29, 'Delantero', 1, 'aficionado', NULL, 46000.00, NULL, 40, 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lesiones`
--

CREATE TABLE `lesiones` (
  `id` int(11) NOT NULL,
  `fecha_inicio_lesion` date DEFAULT NULL,
  `fecha_fin_lesion` date DEFAULT NULL,
  `jugador_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lesiones`
--

INSERT INTO `lesiones` (`id`, `fecha_inicio_lesion`, `fecha_fin_lesion`, `jugador_id_fk`) VALUES
(1, '2023-05-11', '2023-06-30', 1),
(2, '2023-05-01', '2023-07-11', 18),
(3, '2023-04-03', '2023-05-02', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `nombre_motivo` varchar(100) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`id`, `nombre_motivo`, `tipo`) VALUES
(1, 'Compra jugadores', '1'),
(2, 'Sueldo jugadores', '1'),
(3, 'Sueldo equipo técnico', '1'),
(4, 'Sueldo dirigentes', '1'),
(5, 'Mensualidad ANFA', '1'),
(6, 'Mensualidad socios', '2'),
(7, 'Aportes Sponsor', '2'),
(8, 'Traspasos', '2'),
(9, 'Actividades extras', '2'),
(10, 'Venta de entradas', '2'),
(11, 'Souvenirs', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `motivo_fk` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuario_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_socio`
--

CREATE TABLE `pago_socio` (
  `id` int(11) NOT NULL,
  `monto` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago_socio`
--

INSERT INTO `pago_socio` (`id`, `monto`) VALUES
(1, '30000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `equipo_local_fk` int(11) DEFAULT NULL,
  `equipo_visita_fk` int(11) DEFAULT NULL,
  `ubicacion_fk` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `campeonato_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `equipo_local_fk`, `equipo_visita_fk`, `ubicacion_fk`, `fecha`, `campeonato_id_fk`) VALUES
(6, 10, 11, 1, '2023-06-10 13:00:00', 1),
(7, 10, 1, 1, '2023-06-06 12:00:00', 1),
(8, 14, 18, 1, '2023-06-10 12:00:00', 2),
(9, 14, 19, 1, '2023-06-08 15:00:00', 2),
(10, 10, 2, 1, '2023-06-17 13:30:00', 2),
(11, 14, 16, 1, '2023-07-03 15:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `puntajes` (
  `id` int(11) NOT NULL,
  `id_campeonato_fk` int(11) NOT NULL,
  `id_partido_fk` int(11) NOT NULL,
  `id_equipo_fk` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntajes`
--

INSERT INTO `puntajes` (`id`, `id_campeonato_fk`, `id_partido_fk`, `id_equipo_fk`, `puntaje`) VALUES
(4, 1, 6, 11, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `equipo_local_fk` int(11) NOT NULL,
  `equipo_visita_fk` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visita` int(11) NOT NULL,
  `id_partido_fk` int(11) DEFAULT NULL,
  `campeonato_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `equipo_local_fk`, `equipo_visita_fk`, `goles_local`, `goles_visita`, `id_partido_fk`, `campeonato_id_fk`) VALUES
(1, 10, 11, 2, 1, 6, 1),
(2, 10, 1, 1, 0, 7, 1),
(3, 3, 7, 0, 2, NULL, 1),
(4, 9, 11, 1, 3, NULL, 1),
(5, 3, 6, 5, 3, NULL, 2),
(6, 4, 8, 7, 10, NULL, 2),
(7, 13, 12, 4, 2, NULL, 1),
(8, 13, 5, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `fecha_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `fecha_pago`) VALUES
(1, '2023-04-20'),
(4, '2023-04-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `monto_por_partido` decimal(10,0) NOT NULL,
  `condiciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `sponsors` (`id`, `nombre`, `monto_por_partido`, `condiciones`) VALUES
(1, 'McDonalds', 200000, 'Ninguna'),
(2, 'McDonaldss', 500000, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_partido`
--

CREATE TABLE `tarjetas_partido` (
  `id` int(11) NOT NULL,
  `jugador_fk` int(11) DEFAULT NULL,
  `minuto` int(11) DEFAULT NULL,
  `partido_fk` int(11) DEFAULT NULL,
  `jugador_externo` varchar(100) DEFAULT NULL,
  `tarjeta` enum('amarilla','roja') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas_partido`
--

INSERT INTO `tarjetas_partido` (`id`, `jugador_fk`, `minuto`, `partido_fk`, `jugador_externo`, `tarjeta`) VALUES
(1, 7, 50, 6, NULL, 'amarilla'),
(2, NULL, 70, 6, 'Ivana Zamorano', 'roja'),
(3, 21, 60, 8, NULL, 'amarilla'),
(4, NULL, 50, 9, 'Jorge Zamora', 'roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspaso`
--

CREATE TABLE `traspaso` (
  `id` int(11) NOT NULL,
  `nombre_jugador` varchar(100) NOT NULL,
  `equipo_origen` varchar(100) NOT NULL,
  `equipo_destino` varchar(100) NOT NULL,
  `fecha_traspaso` date NOT NULL,
  `monto` decimal(10,0) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Volcado de datos para la tabla `traspaso`
--

INSERT INTO `traspaso` (`id`, `nombre_jugador`, `equipo_origen`, `equipo_destino`, `fecha_traspaso`, `monto`) VALUES
(1, 'Arturo Mival', 'Los Alces FC M', 'Tigres Dorados', '2023-06-13', 1231231),
(2, 'Maite Fernandez', 'Los Alces FC F', 'Coyotes Salvajes', '2023-06-13', 9999999999),
(3, 'Andres Manchez', 'Los Alces FC M', 'Lobas Plateadas', '2023-06-13', 1233),
(4, 'Paulo Neyman', 'Los Alces FC M', 'Leonas Blancas', '2023-06-13', 10000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `run` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol` enum('administrador','direccion','jugador','equipo_tecnico','socio') NOT NULL,
  `socio_id_fk` int(11) DEFAULT NULL,
  `jugador_id_fk` int(11) DEFAULT NULL,
  `equipo_tecnico_id_fk` int(11) DEFAULT NULL,
  `direccion_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `run`, `direccion`, `telefono`, `password_hash`, `rol`, `socio_id_fk`, `jugador_id_fk`, `equipo_tecnico_id_fk`, `direccion_id_fk`) VALUES
(3, 'Diego Matias', 'Servietti Martinez', 'di.servietti@duocuc.cl', '19.532.588-K', 'Pablo de Rokha', 988839401, '092f4ccc7f9cb7512e3dad89417d2cbbd702adfd2c11deabb7ee866e1360447f0339458b6ad667a339b94431e4f202d3cb8f18751e931d386f1bf0fc4c0e5e70f5c585430abeadb2b2294d25d4ebc64afa7581c06f60', 'administrador', NULL, NULL, NULL, NULL),
(4, 'Ricardo', 'Garrido Contreras', 'rangamind@gmail.com', '20.020.289-9', 'psj 5 636 chgte', 955269593, 'b2d6691b7a055d72a3b3da1ee4e590ce22070b3acf3da66984c2c2147139e8cf23c4bfbc48465cf6afb895e62e041f1dc0b8a02f8c1583f4b8505ce58f636cd44fd2e7a819f0ce9a1f040cc14406b49da1bc6d0b7bf5', 'socio', 1, NULL, NULL, NULL),
(5, 'Humberta', 'Suazo', 'chupete.suazo@gmail.com', '112584128-K', 'Avenida siempre viva 123', 11122258, '6ac0c2e3e24a2c48736f51c42af167a175b8617d91f5d928f095d4aa40f106c6c674a0a93901396e84332ffce25d8f01cc3a6c2adfa01ed087763cb5dc386a640c6442664d5485e0590001c6703cb9749fdfb1bd13c9', 'jugador', NULL, 1, NULL, NULL),
(6, 'Maite', 'Fernandez', 'matigol@gmail.com', '44487158-8', 'calle 123', 111228420, '123456', 'jugador', NULL, 2, NULL, NULL),
(7, 'Marcela', 'Salas', 'msalas@gmail.com', '11557848-8', 'chillan', 4455842, '123456', 'jugador', NULL, 11, NULL, NULL),
(8, 'Alexa', 'Sanchez', 'asanchez@@gmail.com', '448815789-7', 'tocopilla 1', 445468487, '123456', 'jugador', NULL, 9, NULL, NULL),
(9, 'Artura', 'Vidal', 'avidal@gmail.com', '448712138-8', 'pintana 10', 11544510, '123456', 'jugador', NULL, 4, NULL, NULL),
(10, 'Gabriela', 'Medel', 'gmedel@gmail.com', '17712557-8', 'pintana 1', 445122358, '123456', 'jugador', NULL, 8, NULL, NULL),
(11, 'Cristina', 'Ronaldo', 'cr7@gmail.com', '123354875-8', 'portugal 1', 1123459, '123456', 'jugador', NULL, 7, NULL, NULL),
(12, 'Claudia', 'Empate', 'kempate@gmail.com', '11254887-2', 'francia 3', 15843598, '123456', 'jugador', NULL, 3, NULL, NULL),
(14, 'Carla', 'Caszely', 'ccaszeli@gmail.com', '88752146-8', 'Santiago 1', 84257299, '123456', 'jugador', NULL, 5, NULL, NULL),
(15, 'Liona', 'Messa', 'lmessa@gmail.com', '4452175-5', 'La Plata 533', 44583321, '123456', 'jugador', NULL, 10, NULL, NULL),
(16, 'Claudia', 'Bravo', 'cbravo@gmail.com', '55887123-8', 'Viluco 50', 884263575, '123456', 'jugador', NULL, 12, NULL, NULL),
(17, 'Huasa', 'Isla', 'hisla@gmail.com', '23555782-4', 'buin 789', 88752587, '123456', 'jugador', NULL, 13, NULL, NULL),
(18, 'Jovanna', 'Beausejour', 'jbeausejour@gmail.com', '7745123-8', 'pasaje 1', 445123548, '123456', 'jugador', NULL, 6, NULL, NULL),
(19, 'Joana', 'Herrera', 'jherrera@gmail.com', '44212354-8', 'PAsje2', 48551284, '123456', 'jugador', NULL, 14, NULL, NULL),
(20, 'Eugenia', 'Mena', 'emena@gmail.com', '44212354-8', 'Pasaje 6 55', 45615815, '123456', 'jugador', NULL, 15, NULL, NULL),
(21, 'Josefa', 'Rojas', 'jrojas@gmail.com', '11235445-8', 'pasaje8 10', 4561238, '123456', 'jugador', NULL, 16, NULL, NULL),
(22, 'Fernanda', 'Gutierrez', 'fgutierrez@gmail.com', '4321587-8', 'casa 123', 1456481, '123456', 'jugador', NULL, 17, NULL, NULL),
(23, 'Gonzala', 'Jara', 'gjara@gmail.com', '1122354-5', 'pasaje 8 santiago', 112335487, '123456', 'jugador', NULL, 18, NULL, NULL),
(24, 'Jorge', 'Sampaoli', 'jsampaoli@gmail.com', '220481263-8', 'CALLE 4 Pasaje 5', 22345681, '123456', 'equipo_tecnico', NULL, NULL, 1, NULL),
(25, 'Andres', 'Mundi', 'amundi@gmail.com', '120228574-8', 'pasaje 6 76', 71235481, '123456', 'equipo_tecnico', NULL, NULL, 2, NULL),
(26, 'Emilio', 'Gutierrez', 'eguttierrez@gmail.com', '12502758-4', 'Calle 6 451', 77512813, '123456', 'equipo_tecnico', NULL, NULL, 3, NULL),
(27, 'Damian', 'Salgado', 'dsalgado@gmail.com', '50158412-8', 'Av Libertad 358', 744812357, '123456', 'equipo_tecnico', NULL, NULL, 4, NULL),
(28, 'Antonia', 'Riffo', 'ariffo@gmail.com', '42242057-8', 'Chgte Psj 8', 45212358, '123456', 'equipo_tecnico', NULL, NULL, 5, NULL),
(29, 'Andres ', 'Peregrini', 'aperegrini@gmail.com', '50124805-8', 'Italia 98 concepción', 88123587, '123456', 'direccion', NULL, NULL, NULL, 1),
(30, 'Cristian', 'Ronaldinho', 'cristianronaldinho@gmail.com', '221257788-8', 'Calle Messi 123', 12345678, '123456', 'jugador', NULL, 19, NULL, NULL),
(31, 'Cristiano', 'Evangelista', 'cristianoevangelista@gmail.com', '22051247-7', ' Avenida Neymar 456', 87654321, '123456', 'jugador', NULL, 20, NULL, NULL),
(32, 'Andres', 'Manchez', 'andresmanchez@gmail.com', '20100863-4', 'Calle Cristiano Ronaldo 789', 76543218, '123456', 'jugador', NULL, 21, NULL, NULL),
(33, 'Leo', 'Modric', 'leomodric@gmail.com', '23120931-6', 'Avenida Hazard 321', 65432187, '123456', 'jugador', NULL, 22, NULL, NULL),
(34, 'Antoine', 'Curtoa', 'acurtoa@gmail.com', '21040687-5', 'Calle Messi 654', 54321876, '123456', 'jugador', NULL, 23, NULL, NULL),
(35, 'Paulo', 'Neyman', 'pauloneyman@gmail.com', '25070392-3', 'Avenida Salah 987', 43218765, '123456', 'jugador', NULL, 24, NULL, NULL),
(36, 'Kevin', 'Ronalducci', 'kevinronalducci@gmail.com', '24081574-1', 'Calle Mbappe 789', 32187654, '123456', 'jugador', NULL, 25, NULL, NULL),
(37, 'Leonardo', 'Suarez', 'leonardosuarez@gmail.com', '23060528-8', 'Avenida Lewandowski 654', 21876543, '123456', 'jugador', NULL, 26, NULL, NULL),
(38, 'Karim', 'Benzeme', 'karimbenzeme@gmail.com', '26031416-0', 'Calle De Bruyne 987', 18765432, '123456', 'jugador', NULL, 27, NULL, NULL),
(39, 'Robert', 'Leva', 'robertleva@gmail.com', '27092037-9', ' Avenida De Gea 654', 87654321, '123456', 'jugador', NULL, 28, NULL, NULL),
(40, 'Arturo', 'Mival', 'amival@gmail.com', '28011185-4', 'Calle Francia 68', 98765432, '123456', 'jugador', NULL, 29, NULL, NULL),
(41, 'Jorge', 'Valdibia', 'jvaldibia@gmail.com', '1231581-9', 'casa roja 123', 99885127, '3ae40fec330292d5cf555a8293c1142fed39efb70ab19230660162b92f83bb438d69d6dc36a7b21b1d0220c3a5377da5afbc2bdf3fc4f2eea936b0c184f76306940f6b9981f0d3fd96721422f0b60b055ccf4b0319b4', 'socio', NULL, NULL, NULL, NULL),
(42, 'asdasd', 'asdasd', 'dieg.barros@duocuc.cl', '234234', 'dsfsdds', 234234, '9b183761be24fae1ebf03d9ae2aef316d759c77bbb6ad08bba2eaa483ce403f08e5565207bca6fca544a26f3b516ea882a0b7f91c3ea71cdc5cf88c27417a92580999a1f7c91a8d8dc00d2ad30b776f318668c', 'socio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_utm`
--

CREATE TABLE `valor_utm` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valor_utm`
--

INSERT INTO `valor_utm` (`id`, `valor`) VALUES
(1, 63263);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_partidos_hasta_hoy`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_partidos_hasta_hoy` (
`fecha` datetime
,`equipos` varchar(204)
,`resultado` varchar(45)
,`goles_jugadores_local` mediumtext
,`goles_jugadores_visita` mediumtext
,`cambios_local` mediumtext
,`cambios_visita` mediumtext
,`tarjetas_local` mediumtext
,`tarjetas_visita` mediumtext
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_partidos_hasta_hoy`
--
DROP TABLE IF EXISTS `vista_partidos_hasta_hoy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_partidos_hasta_hoy`  AS SELECT `p`.`fecha` AS `fecha`, concat(`e_local`.`nombre`,' vs ',`e_visita`.`nombre`) AS `equipos`, concat(`g`.`goles_equipo_local`,' - ',`g`.`goles_equipo_visita`) AS `resultado`, (select group_concat(concat(ifnull(concat(`j`.`numero_camiseta`,' ',`u`.`nombres`,' ',`u`.`apellidos`),''),if(`g`.`minuto` is not null,concat(' ',`g`.`minuto`),''),' (',`e_local`.`nombre`,')') separator '\n') from ((`goles` `g` left join `jugadores` `j` on(`j`.`id` = `g`.`jugador_id_fk`)) left join `usuarios` `u` on(`j`.`id` = `u`.`jugador_id_fk`)) where `g`.`partido_id_fk` = `p`.`id` and `g`.`jugador_visita` is null order by `g`.`minuto`) AS `goles_jugadores_local`, (select group_concat(concat(ifnull(`g`.`jugador_visita`,''),if(`g`.`minuto` is not null,concat(' ',`g`.`minuto`),''),' (',`e_visita`.`nombre`,')') separator '\n') from `goles` `g` where `g`.`partido_id_fk` = `p`.`id` and `g`.`jugador_id_fk` is null order by `g`.`minuto`) AS `goles_jugadores_visita`, (select group_concat(concat(ifnull(concat(`j2`.`numero_camiseta`,' ',`u_sal`.`nombres`,' ',`u_sal`.`apellidos`),''),' -> ',concat(`j`.`numero_camiseta`,' ',`u_ent`.`nombres`,' ',`u_ent`.`apellidos`),if(`c`.`minuto` is not null,concat(' ',`c`.`minuto`),''),' (',`e_local`.`nombre`,')') separator '\n') from ((((`cambios` `c` left join `usuarios` `u_sal` on(`c`.`jugador_saliente_fk` = `u_sal`.`jugador_id_fk`)) left join `usuarios` `u_ent` on(`c`.`jugador_entrante_fk` = `u_ent`.`jugador_id_fk`)) left join `jugadores` `j` on(`c`.`jugador_entrante_fk` = `j`.`id`)) left join `jugadores` `j2` on(`c`.`jugador_saliente_fk` = `j2`.`id`)) where `c`.`partido_fk` = `p`.`id` order by `c`.`minuto`) AS `cambios_local`, (select group_concat(concat(`e`.`nombre`,', ',`ce`.`nombre_jugador_saliente`,' -> ',`ce`.`nombre_jugador_entrante`,if(`ce`.`minuto` is not null,concat(' ',`ce`.`minuto`),''),' (',`e_visita`.`nombre`,')') separator '\n') from (`cambios_externo` `ce` left join `equipos` `e` on(`e`.`id` = `p`.`equipo_visita_fk`)) where `ce`.`partido_id_fk` = `p`.`id` order by `ce`.`minuto`) AS `cambios_visita`, (select group_concat(concat(ifnull(concat(`u`.`nombres`,' ',`u`.`apellidos`),''),' ',`tp`.`tarjeta`,if(`tp`.`minuto` is not null,concat(' ',`tp`.`minuto`),''),' (',`e_local`.`nombre`,')') separator '\n') from ((`tarjetas_partido` `tp` left join `jugadores` `j` on(`j`.`id` = `tp`.`jugador_fk`)) left join `usuarios` `u` on(`u`.`jugador_id_fk` = `j`.`id`)) where `tp`.`partido_fk` = `p`.`id` and `tp`.`jugador_fk` is not null order by `tp`.`minuto`) AS `tarjetas_local`, (select group_concat(concat(ifnull(case when `tp`.`jugador_fk` is not null then concat(`u`.`nombres`,' ',`u`.`apellidos`) else `tp`.`jugador_externo` end,''),' ',`tp`.`tarjeta`,if(`tp`.`minuto` is not null,concat(' ',`tp`.`minuto`),''),' (',`e_visita`.`nombre`,')') separator '\n') from ((`tarjetas_partido` `tp` left join `jugadores` `j` on(`j`.`id` = `tp`.`jugador_fk`)) left join `usuarios` `u` on(`u`.`jugador_id_fk` = `j`.`id`)) where `tp`.`partido_fk` = `p`.`id` and `tp`.`jugador_fk` is null order by `tp`.`minuto`) AS `tarjetas_visita` FROM (((`partidos` `p` join `equipos` `e_local` on(`e_local`.`id` = `p`.`equipo_local_fk`)) join `equipos` `e_visita` on(`e_visita`.`id` = `p`.`equipo_visita_fk`)) left join (select `p`.`id` AS `partido_id`,count(case when `g`.`jugador_id_fk` is not null then 1 end) AS `goles_equipo_local`,count(case when `g`.`jugador_id_fk` is null then 1 end) AS `goles_equipo_visita` from (`partidos` `p` left join `goles` `g` on(`p`.`id` = `g`.`partido_id_fk`)) where `p`.`fecha` <= current_timestamp() group by `p`.`id`) `g` on(`p`.`id` = `g`.`partido_id`)) WHERE `p`.`fecha` <= current_timestamp() ORDER BY `p`.`fecha` DESC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cambios_FK` (`partido_fk`),
  ADD KEY `cambios_FK_1` (`jugador_entrante_fk`),
  ADD KEY `cambios_FK_2` (`jugador_saliente_fk`);

--
-- Indices de la tabla `cambios_externo`
--
ALTER TABLE `cambios_externo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cambios_externo_FK` (`partido_id_fk`);

--
-- Indices de la tabla `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campeonatos_FK_1` (`division_id_fk`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dirigente`
--
ALTER TABLE `dirigente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_FK` (`division_id_fk`);

--
-- Indices de la tabla `equipos_campeonato`
--
ALTER TABLE `equipos_campeonato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipos_campeonato_FK` (`campeonato_id_fk`),
  ADD KEY `equipos_campeonato_FK_1` (`equipo_id_fk`);

--
-- Indices de la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_tecnico_FK` (`equipo_proviene_fk`);

--
-- Indices de la tabla `estadisticas_campeonato`
--
ALTER TABLE `estadisticas_campeonato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadisticas_equipo`
--
ALTER TABLE `estadisticas_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_id_fk`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partido_id` (`partido_id_fk`),
  ADD KEY `jugador_id` (`jugador_id_fk`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingresos_FK` (`id_usuario_fk`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_proviene_id_fk`);

--
-- Indices de la tabla `lesiones`
--
ALTER TABLE `lesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jugador_id` (`jugador_id_fk`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_FK` (`motivo_fk`),
  ADD KEY `movimientos_FK_1` (`usuario_fk`);

--
-- Indices de la tabla `pago_socio`
--
ALTER TABLE `pago_socio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_local` (`equipo_local_fk`),
  ADD KEY `equipo_visita` (`equipo_visita_fk`),
  ADD KEY `ubicacion` (`ubicacion_fk`),
  ADD KEY `partidos_FK` (`campeonato_id_fk`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puntajes_FK_2` (`id_partido_fk`),
  ADD KEY `puntajes_FK_1` (`id_campeonato_fk`),
  ADD KEY `puntajes_FK` (`id_equipo_fk`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NewTable_FK` (`equipo_local_fk`),
  ADD KEY `NewTable_FK_1` (`equipo_visita_fk`),
  ADD KEY `NewTable_FK_2` (`id_partido_fk`),
  ADD KEY `resultados_FK` (`campeonato_id_fk`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarjetas_partido_FK` (`jugador_fk`),
  ADD KEY `tarjetas_partido_FK_2` (`partido_fk`);

--
-- Indices de la tabla `traspaso`
--
ALTER TABLE `traspaso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `socio_id` (`socio_id_fk`),
  ADD KEY `jugador_id` (`jugador_id_fk`),
  ADD KEY `equipo_tecnico_id` (`equipo_tecnico_id_fk`),
  ADD KEY `usuarios_FK` (`direccion_id_fk`);

--
-- Indices de la tabla `valor_utm`
--
ALTER TABLE `valor_utm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cambios_externo`
--
ALTER TABLE `cambios_externo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `campeonatos`
--
ALTER TABLE `campeonatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `cancha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dirigente`
--
ALTER TABLE `dirigente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `equipos_campeonato`
--
ALTER TABLE `equipos_campeonato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadisticas_campeonato`
--
ALTER TABLE `estadisticas_campeonato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadisticas_equipo`
--
ALTER TABLE `estadisticas_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `lesiones`
--
ALTER TABLE `lesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago_socio`
--
ALTER TABLE `pago_socio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `traspaso`
--
ALTER TABLE `traspaso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD CONSTRAINT `cambios_FK` FOREIGN KEY (`partido_fk`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `cambios_FK_1` FOREIGN KEY (`jugador_entrante_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `cambios_FK_2` FOREIGN KEY (`jugador_saliente_fk`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `cambios_externo`
--
ALTER TABLE `cambios_externo`
  ADD CONSTRAINT `cambios_externo_FK` FOREIGN KEY (`partido_id_fk`) REFERENCES `partidos` (`id`);

--
-- Filtros para la tabla `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD CONSTRAINT `campeonatos_FK_1` FOREIGN KEY (`division_id_fk`) REFERENCES `division` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_FK` FOREIGN KEY (`division_id_fk`) REFERENCES `division` (`id`);

--
-- Filtros para la tabla `equipos_campeonato`
--
ALTER TABLE `equipos_campeonato`
  ADD CONSTRAINT `equipos_campeonato_FK` FOREIGN KEY (`campeonato_id_fk`) REFERENCES `campeonatos` (`id`),
  ADD CONSTRAINT `equipos_campeonato_FK_1` FOREIGN KEY (`equipo_id_fk`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  ADD CONSTRAINT `equipo_tecnico_FK` FOREIGN KEY (`equipo_proviene_fk`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `goles`
  ADD CONSTRAINT `goles_FK` FOREIGN KEY (`partido_id_fk`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `goles_FK_1` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_FK` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`equipo_proviene_id_fk`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `lesiones`
--
ALTER TABLE `lesiones`
  ADD CONSTRAINT `lesiones_ibfk_1` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_FK` FOREIGN KEY (`motivo_fk`) REFERENCES `motivo` (`id`),
  ADD CONSTRAINT `movimientos_FK_1` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_FK` FOREIGN KEY (`campeonato_id_fk`) REFERENCES `campeonatos` (`id`),
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo_local_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo_visita_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`ubicacion_fk`) REFERENCES `cancha` (`id`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `NewTable_FK` FOREIGN KEY (`equipo_local_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `NewTable_FK_1` FOREIGN KEY (`equipo_visita_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `NewTable_FK_2` FOREIGN KEY (`id_partido_fk`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `resultados_FK` FOREIGN KEY (`campeonato_id_fk`) REFERENCES `campeonatos` (`id`);

--
-- Filtros para la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  ADD CONSTRAINT `tarjetas_partido_FK` FOREIGN KEY (`jugador_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `tarjetas_partido_FK_2` FOREIGN KEY (`partido_fk`) REFERENCES `partidos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`direccion_id_fk`) REFERENCES `dirigente` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`socio_id_fk`) REFERENCES `socios` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`equipo_tecnico_id_fk`) REFERENCES `equipo_tecnico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
