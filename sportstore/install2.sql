-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2024 a las 02:48:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sportstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'pendiente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` int(12) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `Stock`) VALUES
(1, 'Gorra De Puma Mercedes AMG', 79.00, 'Logo AMG PETRONAS estampado.', 'assets/images/p1.png', 0),
(2, 'Botines De Futbol Nike Phantom', 200.00, 'Botines Adulto Futbol Sintetico.', 'assets/images/p2.png', 0),
(3, 'Boca Juniors Titular', 300.00, 'Remera Boca Juniors 2023 Titular.', 'assets/images/p3.png', 0),
(4, 'Pelotas Tenis Wilson', 250.00, 'Tubo de pelotas x6 Wilson ED', 'assets/images/p4.png', 0),
(5, 'Zapatillas Adidas Runing O9', 200.00, 'Zapatillas Adidas Runing Negras AIR09', 'assets/images/p5.png', 0),
(6, 'Pelota Basquet Nassau', 100.00, 'Pelota de Basquet Nassau Negra Flex', 'assets/images/p6.png', 0),
(7, 'Botines De Futbol Nike Tiempo Legend 10 ', 120.00, 'Nike Tiempo Legend 10 Cuero Sintetico.', 'assets/images/p7.png', 0),
(8, 'Camiseta De Arsenal Adidas Oficial ', 45.00, 'Camiseta del Arsenal de Inglaterra Roja y Blanca', 'assets/images/p8.png', 0),
(9, 'Mochila De Independiente Puma Culture', 80.00, 'Mochila Roja del CAI Texturada.', 'assets/images/p9.png', 0),
(10, 'Campera Inter De Miami Adidas', 150.00, 'Campera del Inter de Miami Rosa ELIM', 'assets/images/p10.png', 0),
(11, 'Remera Argentina 2024', 150.00, 'Remera De Argentina Adidas Prematch Negra.', 'assets/images/p11.png', 0),
(12, 'CAI Alternativa Azul', 30.00, 'Camiseta De Independiente Puma Alternativa Azul.', 'assets/images/p12.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passworda` varchar(255) NOT NULL,
  `nivel` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `passworda`, `nivel`) VALUES
(1, 'pablo', 'ramirezok123@gmail.com', '$2y$10$p4zNNIMdYR5FQcqZCfFLiur2UJvC2X3x.yfjRCxEPtmc.nO.HZW0.', 'user'),
(3, 'pablo', 'aguanteriver123@gmail.com', '$2y$10$Sr11UyCSabCVF/sfS0zMz.ROV7e00v4MLAfTFucgbOQ/kDS8C8egu', 'user'),
(4, 'pablo', 'ramirez123@gmail.com', '$2y$10$do1wfVRGNwAsxKICa/01keI9cKtMTImbX9hCwxnUHceG3CeaQDkX.', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79001;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
