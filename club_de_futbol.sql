-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 04:09:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `tipo` enum('compra_jugadores','sueldos_jugadores','sueldos_equipo_tecnico','sueldos_dirigentes','mensualidad_anfa') NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `genero` enum('masculino','femenino') NOT NULL,
  `categoria` enum('primera_division','segunda_division','tercera_division','cuarta_division','quinta_division','sexta_division','septima_division','octava_division','novena_division','decima_division') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `genero`, `categoria`) VALUES
(1, 'Dragones Rojos', 'masculino', 'primera_division'),
(2, 'Panteras Negras', 'femenino', 'tercera_division'),
(3, 'Lobos Plateados', 'masculino', 'quinta_division'),
(4, 'Leonas Blancas', 'femenino', 'segunda_division'),
(5, 'Tigres Dorados', 'masculino', 'cuarta_division'),
(6, 'Águilas Azules', 'femenino', 'sexta_division'),
(7, 'Coyotes Salvajes', 'masculino', 'novena_division'),
(8, 'Jaguares Amarillos', 'femenino', 'octava_division'),
(9, 'Osos Pardos', 'masculino', 'septima_division'),
(10, 'Canguros Saltarines', 'femenino', 'decima_division');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tecnico`
--

CREATE TABLE `equipo_tecnico` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `run` varchar(12) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `cargo` enum('entrenador','asistente_entrenador','preparador_fisico','utilero','kinesiologo') NOT NULL,
  `equipo_proviene` varchar(100) DEFAULT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `valor_hora_extra` decimal(10,2) DEFAULT NULL,
  `horas_extras_mes` int(11) DEFAULT 0,
  `equipo_id` int(11) DEFAULT NULL
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
  `equipo_id` int(11) DEFAULT NULL
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
  `equipo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `tipo` enum('mensualidad_socios','sponsor','traspasos','actividades_extras','venta_entradas','souvenir') NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `run` varchar(12) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `goles` int(11) DEFAULT 0,
  `partidos_jugados` int(11) DEFAULT 0,
  `equipo_proviene` varchar(100) DEFAULT NULL,
  `tipo` enum('aficionado','profesional') NOT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `ayuda_economica` decimal(10,2) DEFAULT NULL,
  `lesionado` tinyint(1) DEFAULT 0,
  `equipo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombres`, `apellidos`, `run`, `fecha_nacimiento`, `foto_url`, `posicion`, `goles`, `partidos_jugados`, `equipo_proviene`, `tipo`, `sueldo`, `ayuda_economica`, `lesionado`, `equipo_id`) VALUES
(1, 'Pedro', 'González', '18.887.650-3', '1995-03-12', 'https://randomuser.me/api/portraits/men/1.jpg', 'Delantero', 10, 20, 'Equipo 2', 'profesional', '1500000.00', '0.00', 0, 1),
(2, 'Juan', 'Pérez', '14.345.789-1', '1990-12-10', 'https://randomuser.me/api/portraits/men/2.jpg', 'Defensa', 2, 15, 'Equipo 3', 'profesional', '1200000.00', '0.00', 0, 1),
(3, 'Andrés', 'Ramírez', '12.345.678-9', '1992-07-05', 'https://randomuser.me/api/portraits/men/3.jpg', 'Mediocampista', 5, 18, 'Equipo 4', 'profesional', '1400000.00', '0.00', 0, 1),
(4, 'Fernando', 'Gómez', '20.235.345-6', '1998-02-18', 'https://randomuser.me/api/portraits/men/4.jpg', 'Portero', 0, 10, 'Equipo 5', 'aficionado', NULL, '0.00', 0, 1),
(5, 'Pablo', 'Martínez', '19.453.798-2', '1996-09-24', 'https://randomuser.me/api/portraits/men/5.jpg', 'Mediocampista', 3, 19, 'Equipo 6', 'profesional', '1350000.00', '0.00', 0, 1),
(6, 'Carlos', 'López', '17.567.890-1', '1997-01-30', 'https://randomuser.me/api/portraits/men/6.jpg', 'Delantero', 8, 22, 'Equipo 7', 'profesional', '1600000.00', '0.00', 0, 1),
(7, 'José', 'Fernández', '16.789.234-5', '1993-05-08', 'https://randomuser.me/api/portraits/men/7.jpg', 'Defensa', 1, 17, 'Equipo 8', 'profesional', '1250000.00', '0.00', 0, 1),
(8, 'Eduardo', 'González', '17.354.987-5', '1995-07-02', 'https://randomuser.me/api/portraits/men/11.jpg', 'Mediocampista', 5, 12, 'CD Victoria', 'profesional', '200000.00', '0.00', 0, 1),
(9, 'Andrés', 'Méndez', '13.123.456-6', '1993-03-24', 'https://randomuser.me/api/portraits/men/12.jpg', 'Defensa', 2, 18, 'San Antonio FC', 'profesional', '175000.00', '0.00', 0, 1),
(10, 'Felipe', 'Pérez', '18.765.432-1', '1996-01-15', 'https://randomuser.me/api/portraits/men/13.jpg', 'Delantero', 7, 20, 'Deportivo Santiago', 'profesional', '220000.00', '0.00', 0, 1),
(11, 'Manuel', 'Vera', '11.234.567-8', '1992-11-03', 'https://randomuser.me/api/portraits/men/14.jpg', 'Mediocampista', 4, 17, 'Unión Fénix', 'profesional', '180000.00', '0.00', 0, 1),
(12, 'Cristóbal', 'Álvarez', '19.876.543-2', '1997-05-12', 'https://randomuser.me/api/portraits/men/15.jpg', 'Portero', 0, 10, 'Ferroviarios FC', 'profesional', '170000.00', '0.00', 0, 1),
(13, 'Camilo', 'Bustos', '16.543.210-7', '1994-09-20', 'https://randomuser.me/api/portraits/men/16.jpg', 'Delantero', 8, 22, 'Rangers FC', 'profesional', '225000.00', '0.00', 0, 1),
(14, 'Daniel', 'Rojas', '15.098.765-4', '1993-01-30', 'https://randomuser.me/api/portraits/men/17.jpg', 'Defensa', 1, 16, 'Arica United', 'profesional', '185000.00', '0.00', 0, 1),
(15, 'Patricio', 'Muñoz', '12.345.778-9', '1991-07-13', 'https://randomuser.me/api/portraits/men/18.jpg', 'Mediocampista', 3, 19, 'Ñublense', 'profesional', '190000.00', '0.00', 0, 1),
(16, 'Diego', 'González', '11.111.111-1', '1994-05-12', 'https://randomuser.me/api/portraits/men/19.jpg', 'Mediocampista', 5, 30, 'River Plate', 'profesional', '800000.00', '0.00', 0, 1),
(17, 'Sebastián', 'Martínez', '22.222.222-2', '1992-08-25', 'https://randomuser.me/api/portraits/men/20.jpg', 'Defensa', 2, 25, 'Lanus', 'profesional', '600000.00', '0.00', 0, 1),
(18, 'Juan', 'Pérez', '33.333.333-3', '1997-02-20', 'https://randomuser.me/api/portraits/men/21.jpg', 'Delantero', 10, 28, 'Boca Juniors', 'profesional', '750000.00', '0.00', 0, 1),
(19, 'Luis', 'Rodríguez', '44.444.444-4', '1990-12-01', 'https://randomuser.me/api/portraits/men/22.jpg', 'Mediocampista', 3, 32, 'Independiente', 'profesional', '700000.00', '0.00', 0, 1),
(20, 'Miguel', 'Gómez', '55.555.555-5', '1995-11-11', 'https://randomuser.me/api/portraits/men/23.jpg', 'Defensa', 1, 22, 'San Lorenzo', 'profesional', '550000.00', '0.00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `run` varchar(12) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombres`, `apellidos`, `run`, `direccion`, `telefono`, `email`, `fecha_pago`, `password`) VALUES
(1, 'Ricardo Esteban', 'Garrido Contreras', '20020289-9', 'Pasaje 5, 636', '+56955269593', 'rangamind@gmail.com', '2023-04-20', ''),
(4, 'Luis Garrido', 'Garrido Contreras', '11240246-2', 'Pasaje 5, 636', '+56955269593', 'jorgito', '2023-04-20', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_lesiones`
--

CREATE TABLE `tabla_lesiones` (
  `id` int(11) NOT NULL,
  `fecha_inicio_lesion` date DEFAULT NULL,
  `fecha_fin_lesion` date DEFAULT NULL,
  `jugador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasos`
--

CREATE TABLE `traspasos` (
  `id` int(11) NOT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `equipo_origen_id` int(11) DEFAULT NULL,
  `equipo_destino_id` int(11) DEFAULT NULL,
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
  `password_hash` varchar(255) NOT NULL,
  `rol` enum('administrador','direccion','jugador','entrenador','equipo_tecnico','socio') NOT NULL,
  `socio_id` int(11) DEFAULT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `equipo_tecnico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `run` (`run`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `estadisticas_campeonato`
--
ALTER TABLE `estadisticas_campeonato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `estadisticas_equipo`
--
ALTER TABLE `estadisticas_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `run` (`run`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `run` (`run`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tabla_lesiones`
--
ALTER TABLE `tabla_lesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jugador_id` (`jugador_id`);

--
-- Indices de la tabla `traspasos`
--
ALTER TABLE `traspasos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jugador_id` (`jugador_id`),
  ADD KEY `equipo_origen_id` (`equipo_origen_id`),
  ADD KEY `equipo_destino_id` (`equipo_destino_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `socio_id` (`socio_id`),
  ADD KEY `jugador_id` (`jugador_id`),
  ADD KEY `equipo_tecnico_id` (`equipo_tecnico_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT de la tabla `traspasos`
--
ALTER TABLE `traspasos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo_tecnico`
--
ALTER TABLE `equipo_tecnico`
  ADD CONSTRAINT `equipo_tecnico_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `estadisticas_campeonato`
--
ALTER TABLE `estadisticas_campeonato`
  ADD CONSTRAINT `estadisticas_campeonato_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `estadisticas_equipo`
--
ALTER TABLE `estadisticas_equipo`
  ADD CONSTRAINT `estadisticas_equipo_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `tabla_lesiones`
--
ALTER TABLE `tabla_lesiones`
  ADD CONSTRAINT `tabla_lesiones_ibfk_1` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `traspasos`
--
ALTER TABLE `traspasos`
  ADD CONSTRAINT `traspasos_ibfk_1` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `traspasos_ibfk_2` FOREIGN KEY (`equipo_origen_id`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `traspasos_ibfk_3` FOREIGN KEY (`equipo_destino_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`equipo_tecnico_id`) REFERENCES `equipo_tecnico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
