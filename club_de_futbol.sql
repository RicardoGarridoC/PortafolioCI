-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 22:41:01
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
(2, 75, 9, 8, 6);

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
(1, 50, 6, '4 Calule Melendez', '2 Arturo Sanhueza'),
(2, 60, 6, '5 Patricio Yanez', '6 Mark Gonzales');

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
(1, 'Campeonato tercera división', 1, '2023'),
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
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Dragones Rojos', 'masculino', 2),
(2, 'Panteras Negras', 'femenino', 3),
(3, 'Lobos Plateados', 'masculino', 3),
(4, 'Leonas Blancas', 'femenino', 2),
(5, 'Tigres Dorados', 'masculino', 1),
(6, 'Águilas Azules', 'femenino', 1),
(7, 'Coyotes Salvajes', 'masculino', 1),
(8, 'Jaguares Amarillos', 'femenino', 1),
(9, 'Osos Pardos', 'masculino', 1),
(10, 'Los Alces FC Tercera M', 'masculino', 1),
(11, 'Arturo Fernandez Vial', 'masculino', 1);

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
(4, 6, NULL, 50, '10 Jorge Valdivia');

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
  `lesionado` tinyint(1) DEFAULT 0,
  `equipo_proviene_id_fk` int(11) DEFAULT NULL,
  `numero_camiseta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `posicion`, `partidos_jugados`, `tipo`, `sueldo`, `ayuda_economica`, `lesionado`, `equipo_proviene_id_fk`, `numero_camiseta`) VALUES
(1, 'Delantero', 20, 'profesional', 1500000.00, 0.00, 0, 10, 7),
(2, 'Defensa', 15, 'profesional', 1200000.00, 0.00, 0, 10, 8),
(3, 'Mediocampista', 18, 'profesional', 1400000.00, 0.00, 0, 10, 11),
(4, 'Portero', 10, 'aficionado', NULL, 0.00, 0, 10, 10),
(7, 'Delantero', 17, 'profesional', 5000000.00, 0.00, 0, 10, 9),
(8, 'Mediocampista', 12, 'profesional', 200000.00, 0.00, 0, 10, 1),
(9, 'Defensa', 18, 'profesional', 175000.00, 0.00, 0, 10, 4),
(10, 'Delantero', 20, 'profesional', 220000.00, 0.00, 0, 10, 22),
(11, 'Mediocampista', 17, 'profesional', 180000.00, 0.00, 0, 10, 20),
(12, 'Portero', 10, 'profesional', 170000.00, 0.00, 0, 10, 24),
(13, 'Delantero', 22, 'profesional', 225000.00, 0.00, 0, 10, 30),
(14, 'Defensa', 16, 'profesional', 185000.00, 0.00, 0, 10, 25),
(15, 'Mediocampista', 19, 'profesional', 190000.00, 0.00, 0, 10, 44),
(16, 'Mediocampista', 30, 'profesional', 800000.00, 0.00, 0, 10, 6),
(17, 'Defensa', 25, 'profesional', 600000.00, 0.00, 0, 10, 17),
(18, 'Delantero', 28, 'profesional', 750000.00, 0.00, 0, 10, 33),
(19, 'Mediocampista', 32, 'profesional', 700000.00, 0.00, 0, 10, 12),
(20, 'Defensa', 22, 'profesional', 550000.00, 0.00, 0, 10, 91);

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
(6, 10, 11, 1, '2023-06-11 16:00:00', 1),
(7, 8, 6, 1, '2023-06-10 12:00:00', 1);

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
-- Estructura de tabla para la tabla `tabla_lesiones`
--

CREATE TABLE `tabla_lesiones` (
  `id` int(11) NOT NULL,
  `fecha_inicio_lesion` date DEFAULT NULL,
  `fecha_fin_lesion` date DEFAULT NULL,
  `jugador_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, NULL, 70, 6, 'Ivan Zamorano', 'roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasos`
--

CREATE TABLE `traspasos` (
  `id` int(11) NOT NULL,
  `jugador_id_fk` int(11) DEFAULT NULL,
  `equipo_origen_id_fk` int(11) DEFAULT NULL,
  `equipo_destino_id_fk` int(11) DEFAULT NULL,
  `fecha_traspaso` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `rol` enum('administrador','direccion','jugador','entrenador','equipo_tecnico','socio') NOT NULL,
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
(4, 'Ricardo', 'Garrido Contreras', 'rangamind@gmail.com', '20.020.289-9', 'psj 5 636 chgte', 955269593, 'b2d6691b7a055d72a3b3da1ee4e590ce22070b3acf3da66984c2c2147139e8cf23c4bfbc48465cf6afb895e62e041f1dc0b8a02f8c1583f4b8505ce58f636cd44fd2e7a819f0ce9a1f040cc14406b49da1bc6d0b7bf5', 'administrador', NULL, NULL, NULL, NULL),
(5, 'Chupete', 'Suazo', 'chupete.suazo@gmail.com', '112584128-K', 'Avenida siempre viva 123', 11122258, '123456', 'jugador', NULL, 1, NULL, NULL),
(6, 'Matias ', 'Fernandez', 'matigol@gmail.com', '44487158-8', 'calle 123', 111228420, '123456', 'jugador', NULL, 2, NULL, NULL),
(7, 'Marcelo', 'Salas', 'msalas@gmail.com', '11557848-8', 'chillan', 4455842, '123456', 'jugador', NULL, 11, NULL, NULL),
(8, 'Alexis', 'Sanchez', 'asanchez@@gmail.com', '448815789-7', 'tocopilla 1', 445468487, '123456', 'jugador', NULL, 9, NULL, NULL),
(9, 'Arturo', 'Vidal', 'avidal@gmail.com', '448712138-8', 'pintana 10', 11544510, '123456', 'jugador', NULL, 4, NULL, NULL),
(10, 'Gary', 'Medel', 'gmedel@gmail.com', '17712557-8', 'pintana 1', 445122358, '123456', 'jugador', NULL, 8, NULL, NULL),
(11, 'Cristiano', 'Ronaldo', 'cr7@gmail.com', '123354875-8', 'portugal 1', 1123459, '123456', 'jugador', NULL, 7, NULL, NULL);

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
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
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
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_proviene_id_fk`);

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
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_lesiones`
--
ALTER TABLE `tabla_lesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jugador_id` (`jugador_id_fk`);

--
-- Indices de la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarjetas_partido_FK` (`jugador_fk`),
  ADD KEY `tarjetas_partido_FK_2` (`partido_fk`);

--
-- Indices de la tabla `traspasos`
--
ALTER TABLE `traspasos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jugador_id` (`jugador_id_fk`),
  ADD KEY `equipo_origen_id` (`equipo_origen_id_fk`),
  ADD KEY `equipo_destino_id` (`equipo_destino_id_fk`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cambios_externo`
--
ALTER TABLE `cambios_externo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `equipos_campeonato`
--
ALTER TABLE `equipos_campeonato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tabla_lesiones`
--
ALTER TABLE `tabla_lesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `traspasos`
--
ALTER TABLE `traspasos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`equipo_proviene_id_fk`) REFERENCES `equipos` (`id`);

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
-- Filtros para la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD CONSTRAINT `puntajes_FK` FOREIGN KEY (`id_equipo_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `puntajes_FK_1` FOREIGN KEY (`id_campeonato_fk`) REFERENCES `campeonatos` (`id`),
  ADD CONSTRAINT `puntajes_FK_2` FOREIGN KEY (`id_partido_fk`) REFERENCES `partidos` (`id`);

--
-- Filtros para la tabla `tabla_lesiones`
--
ALTER TABLE `tabla_lesiones`
  ADD CONSTRAINT `tabla_lesiones_ibfk_1` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `tarjetas_partido`
--
ALTER TABLE `tarjetas_partido`
  ADD CONSTRAINT `tarjetas_partido_FK` FOREIGN KEY (`jugador_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `tarjetas_partido_FK_2` FOREIGN KEY (`partido_fk`) REFERENCES `partidos` (`id`);

--
-- Filtros para la tabla `traspasos`
--
ALTER TABLE `traspasos`
  ADD CONSTRAINT `traspasos_FK` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `traspasos_ibfk_2` FOREIGN KEY (`equipo_origen_id_fk`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `traspasos_ibfk_3` FOREIGN KEY (`equipo_destino_id_fk`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`direccion_id_fk`) REFERENCES `direccion` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`socio_id_fk`) REFERENCES `socios` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`jugador_id_fk`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`equipo_tecnico_id_fk`) REFERENCES `equipo_tecnico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
