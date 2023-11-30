-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1:33065
-- Generation Time: Nov 23, 2023 at 02:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopyworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_vendedor`
--

CREATE TABLE `area_vendedor` (
  `IdArea` int(3) NOT NULL,
  `AreaV` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_vendedor`
--

INSERT INTO `area_vendedor` (`IdArea`, `AreaV`) VALUES
(1, 100),
(2, 200),
(3, 300);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(6) NOT NULL,
  `Edad` int(2) NOT NULL,
  `NombreCliente` varchar(40) NOT NULL,
  `Calle` varchar(40) NOT NULL,
  `Numero` int(5) NOT NULL,
  `CP` int(5) NOT NULL,
  `Colonia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Edad`, `NombreCliente`, `Calle`, `Numero`, `CP`, `Colonia`) VALUES
(1, 25, 'Juan Pérez', 'Calle A', 123, 12345, 'Colonia X'),
(2, 30, 'María Gómez', 'Calle B', 456, 54321, 'Colonia Y'),
(3, 28, 'Pedro Ramírez', 'Calle C', 789, 67890, 'Colonia Z');

-- --------------------------------------------------------

--
-- Table structure for table `comprar`
--

CREATE TABLE `comprar` (
  `clienteIdCliente` int(11) DEFAULT NULL,
  `productoIdProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comprar`
--

INSERT INTO `comprar` (`clienteIdCliente`, `productoIdProducto`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `descuentos_exclusivos`
--

CREATE TABLE `descuentos_exclusivos` (
  `IdDescuentosE` int(6) NOT NULL,
  `TipoDescuentoE` varchar(40) NOT NULL,
  `FechaExpiracionE` date NOT NULL,
  `PorcentajeE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descuentos_exclusivos`
--

INSERT INTO `descuentos_exclusivos` (`IdDescuentosE`, `TipoDescuentoE`, `FechaExpiracionE`, `PorcentajeE`) VALUES
(1, 'Descuento A', '2023-12-31', '10%'),
(2, 'Descuento B', '2023-11-30', '15%'),
(3, 'Descuento C', '2023-10-31', '20%');

-- --------------------------------------------------------

--
-- Table structure for table `descuentos_regulares`
--

CREATE TABLE `descuentos_regulares` (
  `IdDescuentosR` int(6) NOT NULL,
  `PorcentajeR` varchar(40) NOT NULL,
  `FechaExpiracionR` date NOT NULL,
  `TipoDescuentoR` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descuentos_regulares`
--

INSERT INTO `descuentos_regulares` (`IdDescuentosR`, `PorcentajeR`, `FechaExpiracionR`, `TipoDescuentoR`) VALUES
(1, '5%', '2023-12-31', 'Descuento Regular 1'),
(2, '8%', '2023-11-30', 'Descuento Regular 2'),
(3, '12%', '2023-10-31', 'Descuento Regular 3');

-- --------------------------------------------------------

--
-- Table structure for table `mayorista`
--

CREATE TABLE `mayorista` (
  `IdFiscal` int(6) NOT NULL,
  `VolumenCompras` varchar(40) NOT NULL,
  `NombreEmpresa` varchar(40) NOT NULL,
  `CorreoEmpresa` int(6) NOT NULL,
  `ClienteIdCliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mayorista`
--

INSERT INTO `mayorista` (`IdFiscal`, `VolumenCompras`, `NombreEmpresa`, `CorreoEmpresa`, `ClienteIdCliente`) VALUES
(1, 'Alto', 'Empresa A', 123456, 1),
(2, 'Medio', 'Empresa B', 654321, 2),
(3, 'Bajo', 'Empresa C', 987654, 3);

-- --------------------------------------------------------

--
-- Table structure for table `membresia`
--

CREATE TABLE `membresia` (
  `NoMembresia` int(5) NOT NULL,
  `TipoMembresia` varchar(10) NOT NULL,
  `FechaCaducidad` date NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `ClienteIdCliente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membresia`
--

INSERT INTO `membresia` (`NoMembresia`, `TipoMembresia`, `FechaCaducidad`, `Estado`, `ClienteIdCliente`) VALUES
(1, 'Gold', '2023-12-31', 'Activa', 1),
(2, 'Silver', '2023-11-30', 'Inactiva', 2),
(3, 'Bronze', '2023-10-31', 'Activa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `obtener`
--

CREATE TABLE `obtener` (
  `Descuentos_RegularesIdDescuentosR` int(6) NOT NULL,
  `RegularClienteIdCliente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obtener`
--

INSERT INTO `obtener` (`Descuentos_RegularesIdDescuentosR`, `RegularClienteIdCliente`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ocupar`
--

CREATE TABLE `ocupar` (
  `VendedorIdVendedor` int(8) NOT NULL,
  `Area_VendedorIdArea` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ocupar`
--

INSERT INTO `ocupar` (`VendedorIdVendedor`, `Area_VendedorIdArea`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(5) NOT NULL,
  `NombreP` varchar(40) NOT NULL,
  `Categoria` varchar(40) NOT NULL,
  `Marca` varchar(40) NOT NULL,
  `Precio` int(6) NOT NULL,
  `Talla` varchar(3) NOT NULL,
  `Existencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreP`, `Categoria`, `Marca`, `Precio`, `Talla`, `Existencias`) VALUES
(1, 'Producto A', 'Electrónica', 'Marca A', 100, 'M', 50),
(2, 'Producto B', 'Ropa', 'Marca B', 50, 'L', 30),
(3, 'Producto C', 'Hogar', 'Marca C', 80, 'S', 20);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(5) NOT NULL,
  `NombreP` varchar(20) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `NoProducto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `NombreP`, `Direccion`, `NoProducto`) VALUES
(1, 'Proveedor A', 'Dirección A', 1000),
(2, 'Proveedor B', 'Dirección B', 2000),
(3, 'Proveedor C', 'Dirección C', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `proveer`
--

CREATE TABLE `proveer` (
  `ProductoIdProducto` int(11) NOT NULL,
  `ProveedorIdProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveer`
--

INSERT INTO `proveer` (`ProductoIdProducto`, `ProveedorIdProveedor`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `regular`
--

CREATE TABLE `regular` (
  `CorreoPersonal` varchar(30) NOT NULL,
  `DireccionFacturacion` varchar(40) NOT NULL,
  `LimiteCredito` int(6) NOT NULL,
  `ClienteIdCliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regular`
--

INSERT INTO `regular` (`CorreoPersonal`, `DireccionFacturacion`, `LimiteCredito`, `ClienteIdCliente`) VALUES
('correo1@example.com', 'Calle D', 500, 1),
('correo2@example.com', 'Calle E', 700, 2),
('correo3@example.com', 'Calle F', 600, 3);

-- --------------------------------------------------------

--
-- Table structure for table `telefono_cliente`
--

CREATE TABLE `telefono_cliente` (
  `telefono` int(10) NOT NULL,
  `ClienteIdCliente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telefono_cliente`
--

INSERT INTO `telefono_cliente` (`telefono`, `ClienteIdCliente`) VALUES
(1111111111, 1),
(2147483647, 2),
(2147483647, 3);

-- --------------------------------------------------------

--
-- Table structure for table `telefono_proveedor`
--

CREATE TABLE `telefono_proveedor` (
  `telefono` int(10) NOT NULL,
  `ProveedorIdProveedor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telefono_proveedor`
--

INSERT INTO `telefono_proveedor` (`telefono`, `ProveedorIdProveedor`) VALUES
(2147483647, 1),
(2147483647, 2),
(2147483647, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tener`
--

CREATE TABLE `tener` (
  `MayoristaIdFiscal` int(6) NOT NULL,
  `Descuentos_ExclusivosIdDescuentosE` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tener`
--

INSERT INTO `tener` (`MayoristaIdFiscal`, `Descuentos_ExclusivosIdDescuentosE`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `IdVendedor` int(6) NOT NULL,
  `NombreV` varchar(40) NOT NULL,
  `DireccionV` varchar(40) NOT NULL,
  `Sueldo` int(6) NOT NULL,
  `Edad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendedor`
--

INSERT INTO `vendedor` (`IdVendedor`, `NombreV`, `DireccionV`, `Sueldo`, `Edad`) VALUES
(1, 'Vendedor A', 'Calle G', 2000, 25),
(2, 'Vendedor B', 'Calle H', 1800, 30),
(3, 'Vendedor C', 'Calle I', 2200, 28);

-- --------------------------------------------------------

--
-- Table structure for table `vender`
--

CREATE TABLE `vender` (
  `ProductoIdProducto` int(6) NOT NULL,
  `VendedorIdVendedor` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vender`
--

INSERT INTO `vender` (`ProductoIdProducto`, `VendedorIdVendedor`) VALUES
(1, 1),
(2, 2),
(3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_vendedor`
--
ALTER TABLE `area_vendedor`
  ADD PRIMARY KEY (`IdArea`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indexes for table `comprar`
--
ALTER TABLE `comprar`
  ADD KEY `productoIdProducto` (`productoIdProducto`),
  ADD KEY `clienteIdCliente` (`clienteIdCliente`);

--
-- Indexes for table `descuentos_exclusivos`
--
ALTER TABLE `descuentos_exclusivos`
  ADD PRIMARY KEY (`IdDescuentosE`);

--
-- Indexes for table `descuentos_regulares`
--
ALTER TABLE `descuentos_regulares`
  ADD PRIMARY KEY (`IdDescuentosR`);

--
-- Indexes for table `mayorista`
--
ALTER TABLE `mayorista`
  ADD PRIMARY KEY (`IdFiscal`),
  ADD KEY `ClienteIdCliente` (`ClienteIdCliente`);

--
-- Indexes for table `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`NoMembresia`),
  ADD KEY `ClienteIdCliente` (`ClienteIdCliente`);

--
-- Indexes for table `obtener`
--
ALTER TABLE `obtener`
  ADD KEY `Descuentos_RegularesIdDescuentosR` (`Descuentos_RegularesIdDescuentosR`,`RegularClienteIdCliente`),
  ADD KEY `RegularClienteIdCliente` (`RegularClienteIdCliente`);

--
-- Indexes for table `ocupar`
--
ALTER TABLE `ocupar`
  ADD KEY `VendedorIdVendedor` (`VendedorIdVendedor`),
  ADD KEY `Area_VendedorIdArea` (`Area_VendedorIdArea`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indexes for table `proveer`
--
ALTER TABLE `proveer`
  ADD KEY `ProductoIdProducto` (`ProductoIdProducto`,`ProveedorIdProveedor`),
  ADD KEY `ProveedorIdProveedor` (`ProveedorIdProveedor`);

--
-- Indexes for table `regular`
--
ALTER TABLE `regular`
  ADD KEY `ClienteIdCliente` (`ClienteIdCliente`);

--
-- Indexes for table `telefono_cliente`
--
ALTER TABLE `telefono_cliente`
  ADD KEY `ClienteIdCliente` (`ClienteIdCliente`);

--
-- Indexes for table `telefono_proveedor`
--
ALTER TABLE `telefono_proveedor`
  ADD KEY `ProveedorIdProveedor` (`ProveedorIdProveedor`);

--
-- Indexes for table `tener`
--
ALTER TABLE `tener`
  ADD KEY `MayoristaIdFiscal` (`MayoristaIdFiscal`,`Descuentos_ExclusivosIdDescuentosE`),
  ADD KEY `Descuentos_ExclusivosIdDescuentosE` (`Descuentos_ExclusivosIdDescuentosE`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`IdVendedor`);

--
-- Indexes for table `vender`
--
ALTER TABLE `vender`
  ADD KEY `ProductoIdProducto` (`ProductoIdProducto`,`VendedorIdVendedor`),
  ADD KEY `VendedorIdVendedor` (`VendedorIdVendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membresia`
--
ALTER TABLE `membresia`
  MODIFY `NoMembresia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `comprar_ibfk_1` FOREIGN KEY (`productoIdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comprar_ibfk_2` FOREIGN KEY (`clienteIdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mayorista`
--
ALTER TABLE `mayorista`
  ADD CONSTRAINT `mayorista_ibfk_1` FOREIGN KEY (`ClienteIdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membresia`
--
ALTER TABLE `membresia`
  ADD CONSTRAINT `membresia_ibfk_1` FOREIGN KEY (`ClienteIdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obtener`
--
ALTER TABLE `obtener`
  ADD CONSTRAINT `obtener_ibfk_1` FOREIGN KEY (`RegularClienteIdCliente`) REFERENCES `regular` (`ClienteIdCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obtener_ibfk_2` FOREIGN KEY (`Descuentos_RegularesIdDescuentosR`) REFERENCES `descuentos_regulares` (`IdDescuentosR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ocupar`
--
ALTER TABLE `ocupar`
  ADD CONSTRAINT `ocupar_ibfk_1` FOREIGN KEY (`VendedorIdVendedor`) REFERENCES `vendedor` (`IdVendedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ocupar_ibfk_2` FOREIGN KEY (`Area_VendedorIdArea`) REFERENCES `area_vendedor` (`IdArea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proveer`
--
ALTER TABLE `proveer`
  ADD CONSTRAINT `proveer_ibfk_1` FOREIGN KEY (`ProductoIdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveer_ibfk_2` FOREIGN KEY (`ProveedorIdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regular`
--
ALTER TABLE `regular`
  ADD CONSTRAINT `regular_ibfk_1` FOREIGN KEY (`ClienteIdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telefono_cliente`
--
ALTER TABLE `telefono_cliente`
  ADD CONSTRAINT `telefono_cliente_ibfk_1` FOREIGN KEY (`ClienteIdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telefono_proveedor`
--
ALTER TABLE `telefono_proveedor`
  ADD CONSTRAINT `telefono_proveedor_ibfk_1` FOREIGN KEY (`ProveedorIdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tener`
--
ALTER TABLE `tener`
  ADD CONSTRAINT `tener_ibfk_1` FOREIGN KEY (`MayoristaIdFiscal`) REFERENCES `mayorista` (`IdFiscal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tener_ibfk_2` FOREIGN KEY (`Descuentos_ExclusivosIdDescuentosE`) REFERENCES `descuentos_exclusivos` (`IdDescuentosE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vender`
--
ALTER TABLE `vender`
  ADD CONSTRAINT `vender_ibfk_1` FOREIGN KEY (`ProductoIdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vender_ibfk_2` FOREIGN KEY (`VendedorIdVendedor`) REFERENCES `vendedor` (`IdVendedor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
