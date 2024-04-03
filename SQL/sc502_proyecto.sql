SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `almacenes` (
  `id_almacen` int(11) NOT NULL,
  `ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `cantones` (
  `id_canton` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fechas` date NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `detalles_facturas` (
  `id_detalle_number` int(11) NOT NULL,
  `factura_id_number` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `detalle_compras` (
  `id_detalle` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `distritos` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `canton_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `facturaciones` (
  `id_factura` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `inventarios` (
  `id_inventario` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `Ubicacion` varchar(10) NOT NULL,
  `Cantidad_disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenna` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id_almacen`);

ALTER TABLE `cantones`
  ADD PRIMARY KEY (`id_canton`),
  ADD KEY `id_provincia` (`id_provincia`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_distrito` (`id_distrito`);

ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`) USING BTREE;

ALTER TABLE `detalles_facturas`
  ADD PRIMARY KEY (`id_detalle_number`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `factura_id number` (`factura_id_number`);

ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle`,`compra_id`),
  ADD KEY `compra_id` (`compra_id`);

ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `canton_id` (`canton_id`);

ALTER TABLE `facturaciones`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `cliente_id` (`cliente_id`);

ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `almacen_id` (`almacen_id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`);


ALTER TABLE `almacenes`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cantones`
  MODIFY `id_canton` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `detalles_facturas`
  MODIFY `id_detalle_number` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `detalle_compras`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `distritos`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `facturaciones`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `inventarios`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `cantones`
  ADD CONSTRAINT `cantones_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`);

ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `detalles_facturas`
  ADD CONSTRAINT `detalles_facturas_ibfk_1` FOREIGN KEY (`factura_id_number`) REFERENCES `facturaciones` (`id_factura`),
  ADD CONSTRAINT `detalles_facturas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `distritos`
  ADD CONSTRAINT `distritos_ibfk_1` FOREIGN KEY (`canton_id`) REFERENCES `cantones` (`id_canton`);

ALTER TABLE `facturaciones`
  ADD CONSTRAINT `facturaciones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id_almacen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



