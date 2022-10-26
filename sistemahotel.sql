-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2022 a las 07:14:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemahotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `idv` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idprd` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcat` int(11) NOT NULL,
  `nomcat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcat`, `nomcat`, `fere`) VALUES
(1, 'Bebidas', '2022-09-25 07:54:11'),
(3, 'Snacks', '2022-09-25 08:08:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `iddn` int(11) NOT NULL,
  `dnic` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `numc` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `nomc` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `apec` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `corrc` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `estac` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`iddn`, `dnic`, `numc`, `nomc`, `apec`, `corrc`, `estac`, `fere`) VALUES
(1, 'DNI', '78987656', 'Manuel Efrain', 'Flores Rosales', '', '1', '2022-10-06 19:34:23'),
(2, 'DNI', '76567654', 'Ruby', 'Rquena', '', '1', '2022-10-06 23:45:56'),
(3, 'DNI', '76543323', 'Luis ', 'Sosa', '', '1', '2022-10-06 23:50:06'),
(4, 'DNI', '73243234', 'Osvaldo Milo', 'Morales Lozada', '', '1', '2022-10-07 00:06:04'),
(5, 'DNI', '76543654', 'Jimena Barbara', 'Yovera Morales', 'jjmor@gmail.com', '1', '2022-10-07 04:47:47'),
(6, 'DNI', '76687653', 'Anderson', 'Murillo Salas', '', '1', '2022-10-07 04:52:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idhab` int(11) NOT NULL,
  `numiha` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `detaha` text COLLATE utf8_unicode_ci NOT NULL,
  `precha` decimal(10,2) NOT NULL,
  `idps` int(11) NOT NULL,
  `idhc` int(11) NOT NULL,
  `estadha` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idhab`, `numiha`, `detaha`, `precha`, `idps`, `idhc`, `estadha`, `fere`) VALUES
(1, '101', 'TV + CABLE + BAÑO', '50.00', 1, 2, '1', '2022-10-07 04:53:21'),
(2, '102', 'TV + CABLE + BAÑO + WIFI', '80.00', 1, 1, '1', '2022-10-07 00:59:13'),
(3, '201', 'TV + CABLE + WIFI + BAÑO', '150.00', 2, 3, '1', '2022-10-06 18:37:45'),
(6, '301', 'TV+CABLE', '90.00', 3, 2, '1', '2022-09-28 21:59:02'),
(7, '404', 'TV+WIFI+CAMA', '50.00', 6, 6, '1', '2022-10-07 04:49:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hcate`
--

CREATE TABLE `hcate` (
  `idhc` int(11) NOT NULL,
  `nomhc` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `estahc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hcate`
--

INSERT INTO `hcate` (`idhc`, `nomhc`, `estahc`, `fere`) VALUES
(1, 'Doble', '1', '2022-09-28 13:22:29'),
(2, 'Individual', '1', '2022-09-28 13:22:43'),
(3, 'Matrimonial', '1', '2022-09-28 13:22:57'),
(6, 'Individual ejemplo', '1', '2022-10-07 04:48:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `idord` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_cli` int(11) NOT NULL,
  `method` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_products` text COLLATE utf8_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `placed_on` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipc` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`idord`, `user_id`, `user_cli`, `method`, `total_products`, `total_price`, `placed_on`, `payment_status`, `tipc`) VALUES
(1, 1, 3, 'Credito pago', ', Agua mineral ( 4 ), Papas Lays Clásicas Bolsa 210 gr ( 4 ), Agua Piña Golden Light Tottus ( 4 )', '62.00', '28-Sep-2022', 'Aceptado', 'Boleta'),
(2, 1, 5, 'Credito pago', ', Agua mineral ( 1 ), Papas Lays Clásicas Bolsa 210 gr ( 3 ), Agua Piña Golden Light Tottus ( 2 )', '38.50', '04-Oct-2022', 'Aceptado', 'Boleta'),
(3, 1, 2, 'Credito pago', ', Agua mineral ( 3 ), Papas Lays Clásicas Bolsa 210 gr ( 5 )', '45.50', '07-Oct-2022', 'Aceptado', 'Boleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `idps` int(11) NOT NULL,
  `nompis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estp` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pisos`
--

INSERT INTO `pisos` (`idps`, `nompis`, `estp`, `fere`) VALUES
(1, 'Primer piso', '1', '2022-09-28 12:57:27'),
(2, 'Segundo piso', '1', '2022-09-28 12:57:50'),
(3, 'Tercer piso', '1', '2022-09-28 12:58:06'),
(6, 'Piso ejemplo', '1', '2022-10-07 04:48:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idprd` int(11) NOT NULL,
  `nomprd` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `numprd` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `detprd` text COLLATE utf8_unicode_ci NOT NULL,
  `preprd` decimal(10,2) NOT NULL,
  `stckprd` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `staprd` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idcat` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idprd`, `nomprd`, `numprd`, `detprd`, `preprd`, `stckprd`, `staprd`, `fere`, `idcat`, `foto`) VALUES
(1, 'Agua mineral', '757191', 'Agua mineral', '1.00', '99', '1', '2022-10-07 04:50:02', 1, '519292.jpg'),
(2, 'Papas Lays Clásicas Bolsa 210 gr', '757199', '- Contenido de 210 gramos\r\n- Hojuelas de papas fritas con sal\r\n- Sabor: Clásico', '8.50', '99', '1', '2022-09-25 18:47:50', 3, '550936.jpg'),
(4, 'Agua Piña Golden Light Tottus', '09AD61', 'El tamaño de la porción es 485 mililitros. Los valores porcentuales están basados en una dieta de 2000 calorías por día. Todos los valores son aproximados.', '6.00', '99', '1', '2022-10-07 04:50:15', 1, '875594.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservar`
--

CREATE TABLE `reservar` (
  `idrese` int(11) NOT NULL,
  `idhab` int(11) NOT NULL,
  `iddn` int(11) NOT NULL,
  `feentra` date NOT NULL,
  `fesal` date NOT NULL,
  `adel` decimal(10,2) NOT NULL,
  `state` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `observac` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rs_history`
--

CREATE TABLE `rs_history` (
  `idrsh` int(11) NOT NULL,
  `idhab` int(11) NOT NULL,
  `idrese` int(11) NOT NULL,
  `iddn` int(11) NOT NULL,
  `nomc` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `numiha` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `detaha` text COLLATE utf8_unicode_ci NOT NULL,
  `precha` decimal(10,2) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rs_history`
--

INSERT INTO `rs_history` (`idrsh`, `idhab`, `idrese`, `iddn`, `nomc`, `numiha`, `detaha`, `precha`, `fere`) VALUES
(1, 1, 1, 4, 'Osvaldo Milo', '101', 'TV + CABLE + BAÑO', '50.00', '2022-10-07 01:38:00'),
(2, 1, 2, 6, 'Anderson', '101', 'TV + CABLE + BAÑO', '50.00', '2022-10-07 04:53:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `usuario`, `contra`, `rol`, `fere`) VALUES
(1, 'Administrador', 'admin@gmail.com', 'admin01', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', '2022-10-07 02:16:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idprd` (`idprd`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcat`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`iddn`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idhab`),
  ADD KEY `idps` (`idps`),
  ADD KEY `idhc` (`idhc`);

--
-- Indices de la tabla `hcate`
--
ALTER TABLE `hcate`
  ADD PRIMARY KEY (`idhc`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idord`),
  ADD KEY `user_cli` (`user_cli`);

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`idps`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idprd`),
  ADD KEY `idcat` (`idcat`);

--
-- Indices de la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD PRIMARY KEY (`idrese`),
  ADD KEY `idhab` (`idhab`),
  ADD KEY `iddn` (`iddn`);

--
-- Indices de la tabla `rs_history`
--
ALTER TABLE `rs_history`
  ADD PRIMARY KEY (`idrsh`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `iddn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idhab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hcate`
--
ALTER TABLE `hcate`
  MODIFY `idhc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `idord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pisos`
--
ALTER TABLE `pisos`
  MODIFY `idps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idprd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservar`
--
ALTER TABLE `reservar`
  MODIFY `idrese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rs_history`
--
ALTER TABLE `rs_history`
  MODIFY `idrsh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idprd`) REFERENCES `productos` (`idprd`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`idps`) REFERENCES `pisos` (`idps`),
  ADD CONSTRAINT `habitaciones_ibfk_2` FOREIGN KEY (`idhc`) REFERENCES `hcate` (`idhc`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_cli`) REFERENCES `clientes` (`iddn`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `categorias` (`idcat`);

--
-- Filtros para la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD CONSTRAINT `reservar_ibfk_1` FOREIGN KEY (`idhab`) REFERENCES `habitaciones` (`idhab`),
  ADD CONSTRAINT `reservar_ibfk_2` FOREIGN KEY (`iddn`) REFERENCES `clientes` (`iddn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
