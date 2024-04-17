SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

almacenes CREATE TABLE `almacenes` (
 `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
 `ubicacion` varchar(255) NOT NULL,
 PRIMARY KEY (`id_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
cantones	CREATE TABLE `cantones` (
 `id_canton` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) NOT NULL,
 `provincia_id` int(11) NOT NULL,
 PRIMARY KEY (`id_canton`),
 KEY `provincia_id` (`provincia_id`),
 CONSTRAINT `cantones_ibfk_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
clientes	CREATE TABLE `clientes` (
 `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) NOT NULL,
 `apellidos` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `telefono` varchar(15) NOT NULL,
 `id_distrito` int(11) NOT NULL,
 `direccion` varchar(255) NOT NULL,
 PRIMARY KEY (`id_cliente`),
 KEY `id_distrito` (`id_distrito`),
 CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id_distrito`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
compras	CREATE TABLE `compras` (
 `id_compra` int(11) NOT NULL AUTO_INCREMENT,
 `id_producto` int(11) NOT NULL,
 `fecha date` date NOT NULL,
 `estado` tinyint(1) NOT NULL,
 PRIMARY KEY (`id_compra`),
 KEY `id_producto` (`id_producto`) USING BTREE,
 CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
detalles_facturas	CREATE TABLE `detalles_facturas` (
 `id_detalle_number` int(11) NOT NULL AUTO_INCREMENT,
 `factura_id_number` int(11) NOT NULL,
 `producto_id` int(11) NOT NULL,
 `cantidad` int(11) NOT NULL,
 `precio_unitario` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_detalle_number`),
 KEY `producto_id` (`producto_id`),
 KEY `factura_id number` (`factura_id_number`),
 CONSTRAINT `detalles_facturas_ibfk_1` FOREIGN KEY (`factura_id_number`) REFERENCES `facturaciones` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `detalles_facturas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
detalle_compras	CREATE TABLE `detalle_compras` (
 `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
 `compra_id` int(11) NOT NULL,
 `producto_id` int(11) NOT NULL,
 `cantidad` int(11) NOT NULL,
 `precio_unitario` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_detalle`,`compra_id`),
 KEY `producto_id` (`producto_id`),
 KEY `compra_id` (`compra_id`),
 CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
distritos	CREATE TABLE `distritos` (
 `id_distrito` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) NOT NULL,
 `canton_id` int(11) NOT NULL,
 PRIMARY KEY (`id_distrito`),
 KEY `id_canton` (`canton_id`),
 CONSTRAINT `distritos_ibfk_1` FOREIGN KEY (`canton_id`) REFERENCES `cantones` (`id_canton`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
facturaciones	CREATE TABLE `facturaciones` (
 `id_factura` int(11) NOT NULL AUTO_INCREMENT,
 `cliente_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
 `total` decimal(10,0) NOT NULL,
 `Estado` varchar(100) NOT NULL,
 PRIMARY KEY (`id_factura`),
 KEY `cliente_id` (`cliente_id`),
 CONSTRAINT `facturaciones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
inventarios	CREATE TABLE `inventarios` (
 `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
 `producto_id` int(11) NOT NULL,
 `almacen_id` int(11) NOT NULL,
 `Ubicacion` varchar(10) NOT NULL,
 `Cantidad_disponible` int(11) NOT NULL,
 PRIMARY KEY (`id_inventario`),
 KEY `producto_id` (`producto_id`),
 KEY `almacen_id` (`almacen_id`),
 CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
productos	CREATE TABLE `productos` (
 `id_producto` int(11) NOT NULL AUTO_INCREMENT,
 `id_proveedor` int(11) NOT NULL,
 `codigo` varchar(10) NOT NULL,
 `nombre` varchar(50) NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `precio` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_producto`),
 KEY `id_proveedor` (`id_proveedor`),
 CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
proveedores	CREATE TABLE `proveedores` (
 `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `direccion` varchar(255) NOT NULL,
 `telefono` varchar(25) NOT NULL,
 `email` varchar(25) NOT NULL,
 PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci
provincias	CREATE TABLE `provincias` (
 `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) NOT NULL,
 PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
rol	CREATE TABLE `rol` (
 `id_rol` int(11) NOT NULL AUTO_INCREMENT,
 `descripcion` varchar(50) NOT NULL,
 PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
usuario	CREATE TABLE `usuario` (
 `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
 `id_rol` int(11) DEFAULT NULL,
 `nombre` varchar(100) DEFAULT NULL,
 `usuario` varchar(50) DEFAULT NULL,
 `contrasenna` varchar(255) DEFAULT NULL,
 `imagen` varchar(255) DEFAULT NULL,
 `activo` tinyint(1) DEFAULT NULL,
 PRIMARY KEY (`id_usuario`),
 UNIQUE KEY `usuario` (`usuario`),
 KEY `id_rol` (`id_rol`),
 CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


INSERT INTO provincias (id_provincia, nombre)
VALUES 
    (1, 'San José'),
    (2, 'Alajuela'),
    (3, 'Cartago'),
    (4, 'Heredia'),
    (5, 'Guanacaste'),
    (6, 'Puntarenas'),
    (7, 'Limón');

INSERT INTO cantones (id_canton, nombre, provincia_id)
VALUES 
    (1, 'San José', 1),
    (2, 'Escazú', 1),
    (3, 'Desamparados', 1),
    (4, 'Alajuela', 2),
    (5, 'San Ramón', 2),
    (6, 'Cartago', 3),
    (7, 'Paraíso', 3);


INSERT INTO distritos (id_distrito, nombre, canton_id)
VALUES 
    (1, 'San José', 1),
    (2, 'Escazú', 2),
    (3, 'Desamparados', 3),
    (4, 'Alajuela', 4),
    (5, 'San Ramón', 5),
    (6, 'Cartago', 6),
    (7, 'Paraíso', 7);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



