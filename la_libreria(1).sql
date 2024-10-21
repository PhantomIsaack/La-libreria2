-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-10-2024 a las 08:44:28
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Isaias', 'isaias@gmail.com', '12345', '2024-10-06 06:11:45'),
(2, 'Isaac', 'isaac57@gmail.com', '0123', '2024-10-14 01:55:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `fecha_agregado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int NOT NULL,
  `id_venta` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `id_venta`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(1, 1, 1, NULL, 405.00),
(2, 2, 2, NULL, 551.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_usuario`, `id_producto`) VALUES
(13, 2, 2),
(14, 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `titulo`, `autor`, `descripcion`, `precio`, `fecha_publicacion`, `categoria`, `imagen_url`) VALUES
(1, 'Crepúsculo', 'Stephenie Meyer', 'Narra la historia de Bella desde el momento en que decide mudarse al pequeño pueblo de Forks en el estado de Washington. Allí conoce al misterioso Edward Cullen, hijo adoptivo del doctor Carlisle Cullen y Esme Cullen, miembros de una familia vampira.', 405.00, '2005-05-02', 'Ficción', 'https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg'),
(2, 'Vida 3.0', 'Max Tegmark', 'Ser humano en la era de la inteligencia artificial es un libro del cosmólogo sueco-estadounidense Max Tegmark del MIT. Vida 3.0 trata sobre la inteligencia artificial, su impacto en la vida terrestre y más.', 551.00, '2017-08-23', 'Ciencia y Tecnología', 'https://images.cdn3.buscalibre.com/fit-in/360x360/16/fd/16fd128c48ccbc4f6bca70224cfe4b51.jpg'),
(3, 'Human Compatible', 'Stuart J. Russell', 'La inteligencia artificial y el problema del control es un libro de no ficción de 2019 del científico informático Stuart J. Russell. Afirma que el riesgo para la humanidad de la inteligencia artificial avanzada es una preocupación seria a pesar de la incertidumbre que rodea el progreso futuro de la IA.', 386.00, '2019-10-08', 'Ciencia y Tecnologia', 'https://m.media-amazon.com/images/I/71h9jhxr7vL._AC_UF350,350_QL50_.jpg'),
(4, 'Historia Universal: Un recorrido visual a través de los años', 'Kindersley, Dorling', 'Un recorrido visual a través de los años es un libro que presenta la historia humana de forma visual, a través de cronologías, imágenes, mapas y ensayos introductorios. Su objetivo es registrar los principales eventos y logros de la historia, desde los primeros humanos hasta el siglo XXI.', 667.00, '2022-02-16', 'Historia', 'https://m.media-amazon.com/images/I/81jZyfNMlXL._SY466_.jpg'),
(5, 'Harry Potter y La Orden del Fénix', 'J.K. Rowling', 'La trama de La Orden del Fénix gira en torno a la saga de intrigas que despierta el Ministerio de Magia al adoptar una postura oficial, que niega el regreso de lord Voldemort y, por ende, negarse a emprender acciones que prevengan el peligro.', 324.00, '2003-02-21', 'Ficcion', 'https://images.unsplash.com/photo-1626618012641-bfbca5a31239?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(27, '¡Gracias!', 'Andrés Manuel López Obrador', '\r\nEl recuento de lo que significó el sexenio de la transformación histórica del país y de cómo el compromiso con la ciudadanía marcó el camino de una nueva política\r\n\r\n«Me voy, y aunque la vida sigue su curso, necesitaba reiterar acerca del pasado para comprender mejor el presente y el porvenir: no hay texto sin contexto y tampoco los procesos políticos y sociales surgen de repente, de la nada, son frutos de un largo camino, de resistencias, fatigas, en los cuales participan muchos, que son, como ha sucedido en nuestro movimiento, los protagonistas principales de esta histórica transformación. Yo soy uno de ellos, de los autores de esta obra, pero no el único; a mí me tocó encabezar esta lucha, pero fui apoyado por hombres y mujeres que forjaron una voluntad colectiva dispuesta a cambiar de verdad la vida pública de México.\r\n\r\nA todas y todos de corazón. Gracias».\r\n\r\nAndrés Manuel López Obrador\r\n', 291.00, '2024-02-09', 'Historia', 'https://m.media-amazon.com/images/I/81URPCG3YTL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `apellidos`, `telefono`, `fecha_registro`) VALUES
(1, 'Peña Juan', 'peaa87@gmail.com', '1234', 'Rivera Ortis', '5587962132', '2024-10-13 22:14:25'),
(2, 'Pablo', 'b@gmail.com', '123455', 'Martinez', '558712323', '2024-10-13 22:56:07'),
(9, 'jijija', 'l@gmail.com', '123', 'kiko', '5548791236', '2024-10-15 21:05:18'),
(10, 'Nano', 'nano@gmail.com', '123', 'Parce', '5548752124', '2024-10-18 04:49:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `total`, `fecha_venta`) VALUES
(1, 2, 0.00, '2024-10-21 06:30:15'),
(2, 10, 551.00, '2024-10-21 06:40:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
