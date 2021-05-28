-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 05:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `carritos`
--

CREATE TABLE `carritos` (
  `id` int(11) NOT NULL,
  `carrito` varchar(30) NOT NULL,
  `cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carritos`
--

INSERT INTO `carritos` (`id`, `carrito`, `cliente`, `fecha`) VALUES
(2, 'Carrini', 1, '2018-01-29 22:28:55'),
(3, 'Carrelon', 1, '2018-01-29 22:48:05'),
(4, 'Carrela', 1, '2018-02-07 11:54:58'),
(5, 'Carronco', 1, '2018-02-07 11:56:33'),
(12, 'mendez', 1, '2018-02-13 22:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `carritos_productos`
--

CREATE TABLE `carritos_productos` (
  `id` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL,
  `producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carritos_productos`
--

INSERT INTO `carritos_productos` (`id`, `id_carrito`, `producto`) VALUES
(5, 2, 11),
(6, 2, 3),
(7, 2, 6),
(8, 3, 11),
(9, 3, 3),
(10, 4, 8),
(12, 4, 29),
(13, 4, 6),
(14, 5, 8),
(15, 5, 6),
(16, 5, 22),
(17, 5, 23),
(36, 12, 19),
(37, 12, 6),
(38, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `catalogo`
--

CREATE TABLE `catalogo` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idsupermercado` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogo`
--

INSERT INTO `catalogo` (`id`, `idproducto`, `idsupermercado`, `cantidad`, `precio`) VALUES
(1, 1, 1, 600, 16.39),
(2, 1, 2, 200, 17.50),
(3, 1, 4, 200, 18.90),
(4, 2, 1, 200, 60.45),
(5, 2, 2, 200, 55.30),
(6, 2, 3, 200, 70.12),
(7, 2, 4, 600, 69.00),
(8, 2, 5, 200, 65.34),
(9, 3, 2, 200, 21.34),
(10, 3, 3, 200, 19.32),
(11, 4, 1, 200, 27.76),
(12, 4, 3, 600, 31.32),
(13, 4, 4, 700, 28.15),
(14, 5, 2, 700, 62.34),
(15, 5, 3, 600, 74.92),
(17, 5, 4, 600, 58.10),
(18, 5, 5, 600, 69.32),
(19, 6, 1, 600, 18.45),
(20, 6, 3, 700, 20.20),
(21, 6, 5, 600, 19.00),
(22, 7, 2, 700, 30.32),
(23, 7, 3, 600, 34.10),
(24, 8, 3, 700, 23.00),
(25, 9, 1, 600, 68.50),
(26, 9, 2, 600, 64.25),
(27, 9, 3, 700, 69.00),
(28, 9, 5, 700, 66.54),
(29, 10, 2, 200, 210.30),
(30, 10, 3, 200, 61.14),
(31, 10, 4, 200, 28.99),
(32, 10, 5, 200, 40.99),
(33, 11, 2, 600, 84.50),
(34, 11, 5, 600, 5.99),
(35, 12, 3, 600, 2.99),
(36, 12, 4, 600, 9.80),
(37, 12, 5, 600, 5.67),
(38, 13, 3, 600, 2.99),
(39, 14, 1, 600, 5.50),
(40, 14, 3, 700, 47.00),
(41, 15, 1, 700, 8.20),
(42, 15, 2, 700, 20.03),
(43, 16, 2, 700, 5.60),
(44, 16, 3, 600, 3.90),
(45, 17, 4, 600, 1.30),
(46, 17, 5, 600, 20.30),
(47, 17, 2, 600, 4.90),
(48, 18, 2, 600, 3.45),
(49, 19, 1, 600, 1.14),
(50, 20, 2, 600, 9.99),
(51, 20, 3, 600, 84.00),
(52, 21, 2, 600, 8.34),
(53, 21, 1, 600, 30.45),
(54, 21, 4, 600, 32.00),
(55, 22, 5, 600, 6.78),
(56, 22, 3, 700, 80.99),
(57, 23, 2, 700, 4.56),
(58, 23, 1, 700, 12.21),
(59, 24, 2, 700, 40.76),
(60, 24, 3, 700, 36.35),
(61, 25, 1, 700, 5.10),
(62, 25, 2, 600, 0.99),
(63, 25, 3, 600, 3.00),
(64, 26, 4, 600, 40.14),
(65, 26, 5, 600, 0.99),
(66, 26, 2, 600, 3.15),
(67, 27, 1, 600, 9.99),
(68, 27, 2, 600, 100.50),
(69, 27, 3, 200, 50.00),
(70, 27, 4, 200, 5.50),
(71, 27, 5, 200, 6.65),
(72, 28, 2, 200, 41.00),
(73, 28, 4, 200, 45.64),
(74, 28, 5, 200, 39.99),
(75, 29, 1, 200, 32.10),
(76, 29, 2, 200, 34.50),
(77, 30, 3, 200, 13.50),
(78, 30, 4, 200, 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'almacen'),
(8, 'bebidas'),
(5, 'congelados'),
(10, 'electro'),
(4, 'frescos'),
(3, 'frutas y verduras'),
(9, 'hogar'),
(2, 'lacteos'),
(7, 'limpieza'),
(6, 'saludbelleza');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `correo`, `direccion`, `alias`, `contrasena`) VALUES
(1, 'Alberto', 'Mikulan', '38047203', 'betomiku@gmail.com', 'Mendoza 3157, San Andres, Buenos Aires', 'Amiku', '$2y$10$z4cCqIvgbnXL7sZ9YNT5j.Maj2M3tA4X5pEQxJuh1rMFW4jTX1IR2');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `informacion` varchar(30) DEFAULT NULL,
  `imagen` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `informacion`, `imagen`) VALUES
(1, 'Galletitas vainilla', 1, '170 gr', '../images/productos/1.jpg'),
(2, 'arroz', 1, '1 kg', '../images/productos/2.jpg'),
(3, 'leche', 2, '1 lt', '../images/productos/3.jpg'),
(4, 'manteca', 2, '200 gr', '../images/productos/4.jpg'),
(5, 'manzana', 3, '2 kg', '../images/productos/5.jpg'),
(6, 'queso fresco', 2, '100 gr', '../images/productos/6.jpg'),
(7, 'muzarella', 2, '100 gr', '../images/productos/7.jpg'),
(8, 'jamon cocido', 4, '100 gr', '../images/productos/8.jpg'),
(9, 'papas fritas', 5, '750 gr', '../images/productos/9.jpg'),
(10, 'hamburguesa', 5, '24 u', '../images/productos/10.jpg'),
(11, 'bocaditos de pollo', 5, '400 gr', '../images/productos/11.jpg'),
(12, 'shampoo', 6, '600 gr', '../images/productos/12.jpg'),
(13, 'crema de enjuague', 6, '600 gr', '../images/productos/13.jpg'),
(14, 'desodorante', 6, '200 ml', '../images/productos/14.jpg'),
(15, 'lavandina', 7, '1,5 lt', '../images/productos/15.jpg'),
(16, 'desinfectante', 7, '400 ml', '../images/productos/16.jpg'),
(17, 'lustra muebles', 7, '250 ml', '../images/productos/17.jpg'),
(18, 'trapo rejilla', 7, '30 x 35 cm.', '../images/productos/18.jpg'),
(19, 'vino tinto', 8, '1 lt', '../images/productos/19.jpg'),
(20, 'vino blanco', 8, '1 lt', '../images/productos/20.jpg'),
(21, 'jugo naranja 100%', 8, '1 lt', '../images/productos/21.jpg'),
(22, 'cuchillos', 9, '12 u', '../images/productos/22.jpg'),
(23, 'platos', 9, '12 u', '../images/productos/23.jpg'),
(24, 'vasos', 9, '12 u', '../images/productos/24.jpg'),
(25, 'cocina', 10, 'n/a', '../images/productos/25.jpg'),
(26, 'microondas', 10, 'n/a', '../images/productos/26.jpg'),
(27, 'televisor LED', 10, '23.6 pulgadas', '../images/productos/27.jpg'),
(28, 'dulce de leche', 1, '600 gr', '../images/productos/28.jpg'),
(29, 'tomate', 3, '1 kg', '../images/productos/29.jpg'),
(30, 'lechuga', 3, '0,5 kg', '../images/productos/30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supermercados`
--

CREATE TABLE `supermercados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supermercados`
--

INSERT INTO `supermercados` (`id`, `nombre`, `direccion`) VALUES
(1, 'Coto', 'Bartolome Mitre 1558, Cdad. Aut—noma de Buenos Aires'),
(2, 'Carrefour', 'Jeronimo Salguero 3212, Cdad Autonoma de Buenos Aires'),
(3, 'Jumbo', 'Tronador 801, Cdad Autonoma de Buenos Aires'),
(4, 'Dia', 'Ortega y Gasset 1786, C1426DHF CABA'),
(5, 'Disco', 'Gorostiaga 1636, C1426CTD CABA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `carritos_productos`
--
ALTER TABLE `carritos_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto` (`producto`),
  ADD KEY `id_carrito` (`id_carrito`);

--
-- Indexes for table `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idproducto_2` (`idproducto`,`idsupermercado`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idsupermercado` (`idsupermercado`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `supermercados`
--
ALTER TABLE `supermercados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carritos_productos`
--
ALTER TABLE `carritos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `supermercados`
--
ALTER TABLE `supermercados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_ibfk_3` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carritos_productos`
--
ALTER TABLE `carritos_productos`
  ADD CONSTRAINT `carritos_productos_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carritos_productos_ibfk_3` FOREIGN KEY (`id_carrito`) REFERENCES `carritos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catalogo_ibfk_2` FOREIGN KEY (`idsupermercado`) REFERENCES `supermercados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
