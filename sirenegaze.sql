-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2023 a las 03:43:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sirenegaze`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descuento` int(10) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `subcategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id_producto`, `nombre`, `descripcion`, `cantidad`, `precio`, `imagen`, `descuento`, `categoria`, `subcategoria`) VALUES
(1, 'Vestido mini bandeau tablas rayas', 'composición74% viscosa23% poliamida3% elastano', 50, 899, 'woman_vestido.jpg', 0, 'woman', 'vestidos'),
(2, 'Jersey cuello redondo rayas', 'Composición53% poliéster28% acrílico16% poliamida3% lana', 0, 699, 'woman_sueter.jpg', 15, 'woman', 'sueteres'),
(3, 'Cazadora dad fit efecto piel', 'Recubrimiento100% poliuretanoTejido base100% poliésterForro100% poliéster', 50, 899, 'woman_chamarra.jpg', 25, 'woman', 'chamarras'),
(4, 'Camisa manga corta jacquard calados', 'Composición\r\n61% poliéster\r\n33% algodón\r\n6% viscosa', 20, 699, 'man_camisa_mc.jpg', 5, 'men', 'camisas'),
(5, 'Sudadera capucha', 'Composición\r\nSecundario\r\n97% algodón\r\n3% elastano\r\nPrincipal\r\n70% algodón\r\n30% poliéster\r\nForro\r\n70%', 80, 499, 'man_sudadera.jpg', 50, 'men', 'sudaderas'),
(6, 'Jeans baggy cargo tiras', 'ComposiciónExterior100% algodón', 10, 1299, 'woman_pantalon_baggy_cargo1.jpg', 40, 'woman', 'pantalones'),
(7, 'Camiseta manga larga combinada terciopelo', 'Composición92% poliéster8% elastanoPrincipal90% poliéster10% elastano', 4, 599, 'woman_blusa.jpg', 15, 'woman', 'blusas'),
(8, 'Camiseta tirantes rib', 'Composición\r\n95% algodón\r\n5% elastano', 90, 299, 'man_camisa1.jpg', 60, 'men', 'camisas'),
(10, 'Cárdigan cremallera rib', 'Composición 50% viscosa  29% pbt  21% poliamida', 200, 749, 'woman_cardigan.jpg', 35, 'woman', 'sueteres'),
(11, 'Jersey cuello perkins rib', 'Composición Exterior 50% viscosa  28% pbt  22% poliamida', 45, 599, 'woman_jersey.jpg', 0, 'woman', 'sueteres'),
(12, 'Jersey frunce lateral print', 'Composición Exterior 50% poliéster  50% algodón', 100, 549, 'woman_jersey_frunce.jpg', 10, 'woman', 'sueteres'),
(13, 'Sobrecamisa manga larga cropped fluida', 'Composición Exterior 100% liocel', 20, 699, 'men_sobrecamisa.jpg', 5, 'men', 'camisas'),
(14, 'Camisa manga larga oxford', 'Composición Exterior 100% algodón', 30, 799, 'men_camisa_oxford.jpg', 5, 'men', 'camisas'),
(15, 'Cazadora denim borreguillo', 'Composición Exterior 100% algodón  Forro 100% poliéster', 30, 599, 'man_cazadora.jpg', 50, 'men', 'chamarras'),
(16, 'Sudadera Tupac capucha print', 'Composición Principal 65% algodón  35% poliéster', 5, 1199, 'man_sudadera_tupac.jpg', 0, 'men', 'sudaderas'),
(17, 'Jersey boxy fit efecto lavado', 'Composición Exterior 100% algodón', 30, 799, 'man_jersey.jpg', 0, 'men', 'sueteres'),
(18, 'Vestido mini bandeau', '74%viscosa23%poliamida', 30, 899, 'ejemplo1.jpg', 10, 'woman', 'Vestidos'),
(21, 'Sobrecamisa manga larga cuadros', 'Exterior 100% poliéster Forro 100% algodón', 15, 1199, 'ejemplo4.jpg', 30, 'men', 'Camisas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuenta` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pregunta_seleccionada` int(11) NOT NULL,
  `respuesta_pregunta` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `intentos_fallidos` int(11) DEFAULT 0,
  `cuenta_habilitada` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `cuenta`, `email`, `pregunta_seleccionada`, `respuesta_pregunta`, `password`, `intentos_fallidos`, `cuenta_habilitada`) VALUES
(5, 'Alan Kaled', 'AKGO', 'alan22518prog@gmail.com', 2, 'max', '9MxrcsPP0A+UI7/wOX173A==', 0, 1),
(6, 'Omar Reyes', 'ReyRamirez', 'luck@gmail.com', 1, 'Pedro', '3GQLH601iMtrCXTruZrKFg==', 0, 1),
(8, 'Administrador', 'admin', 'admin@gmail.com', 1, 'alan', 'Ql9oznRjxyc2wynVWbTJmg==', 0, 1),
(9, 'Luck', 'Luck', 'omrera@hotmail.com', 1, 'Alan', '9MxrcsPP0A+UI7/wOX173A==', 0, 1),
(10, 'Xitlali Sarahi', 'Xit', 'xit@gmial.com', 1, 'Valeria', '9MxrcsPP0A+UI7/wOX173A==', 0, 1),
(11, 'Maestra', 'geo', 'geo@gmial.com', 1, 'karla', '3GQLH601iMtrCXTruZrKFg==', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
