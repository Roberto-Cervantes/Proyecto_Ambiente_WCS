almacenes

CREATE TABLE `almacenes` (
 `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
 `ubicacion` varchar(255) NOT NULL,
 PRIMARY KEY (`id_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

cantones

CREATE TABLE `cantones` (
 `id_canton` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `provicia_id` int(11) NOT NULL,
 PRIMARY KEY (`id_canton`),
 KEY `provicia_id` (`provicia_id`),
 KEY `provicia_id_2` (`provicia_id`),
 CONSTRAINT `cantones_ibfk_1` FOREIGN KEY (`provicia_id`) REFERENCES `provincias` (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

clientes

CREATE TABLE `clientes` (
 `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `apellido` varchar(25) NOT NULL,
 `referencia_id` int(11) NOT NULL,
 `telefono` varchar(25) NOT NULL,
 `email` varchar(25) NOT NULL,
 PRIMARY KEY (`id_cliente`),
 KEY `referencia_id` (`referencia_id`),
 CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`referencia_id`) REFERENCES `referencias` (`id_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

compras

CREATE TABLE `compras` (
 `id_compra` int(11) NOT NULL AUTO_INCREMENT,
 `Proveedor_id` int(11) NOT NULL,
 `fecha date` date NOT NULL,
 `estado` tinyint(1) NOT NULL,
 PRIMARY KEY (`id_compra`),
 KEY `Proveedor_id` (`Proveedor_id`),
 CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Proveedor_id`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

detalles_facturas

CREATE TABLE `detalles_facturas` (
 `id_detalle number` int(11) NOT NULL AUTO_INCREMENT,
 `factura_id number` int(11) NOT NULL,
 `producto_id` int(11) NOT NULL,
 `cantidad` int(11) NOT NULL,
 `precio_unitario` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_detalle number`),
 KEY `producto_id` (`producto_id`),
 KEY `factura_id number` (`factura_id number`),
 CONSTRAINT `detalles_facturas_ibfk_1` FOREIGN KEY (`factura_id number`) REFERENCES `facturaciones` (`id_factura`),
 CONSTRAINT `detalles_facturas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

detalle_compras

CREATE TABLE `detalle_compras` (
 `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
 `compra_id` int(11) NOT NULL,
 `producto_id` int(11) NOT NULL,
 `cantidad` int(11) NOT NULL,
 `precio_unitario` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_detalle`,`compra_id`),
 KEY `producto_id` (`producto_id`),
 KEY `compra_id` (`compra_id`),
 CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

distritos

CREATE TABLE `distritos` (
 `id_distritos` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `canton_id` int(11) NOT NULL,
 PRIMARY KEY (`id_distritos`),
 KEY `canton_id` (`canton_id`),
 CONSTRAINT `distritos_ibfk_1` FOREIGN KEY (`canton_id`) REFERENCES `cantones` (`id_canton`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

facturaciones

CREATE TABLE `facturaciones` (
 `id_factura` int(11) NOT NULL AUTO_INCREMENT,
 `cliente_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
 `total` decimal(10,0) NOT NULL,
 `Estado` tinyint(1) NOT NULL,
 PRIMARY KEY (`id_factura`),
 KEY `cliente_id` (`cliente_id`),
 CONSTRAINT `facturaciones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

inventarios

CREATE TABLE `inventarios` (
 `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
 `producto_id` int(11) NOT NULL,
 `almacen_id` int(11) NOT NULL,
 `Ubicacion` varchar(10) NOT NULL,
 `Cantidad_disponible` int(11) NOT NULL,
 PRIMARY KEY (`id_inventario`),
 KEY `producto_id` (`producto_id`),
 KEY `almacen_id` (`almacen_id`),
 CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id_almacen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

productos

CREATE TABLE `productos` (
 `id_producto` int(11) NOT NULL AUTO_INCREMENT,
 `codigo` varchar(10) NOT NULL,
 `nombre` varchar(50) NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `precio` decimal(10,0) NOT NULL,
 PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

proveedores	

CREATE TABLE `proveedores` (
 `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `direccion` varchar(255) NOT NULL,
 `telefono` varchar(25) NOT NULL,
 `email` varchar(25) NOT NULL,
 PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

provincias	

CREATE TABLE `provincias` (
 `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci

referencias

CREATE TABLE `referencias` (
 `id_referencia` int(11) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(25) NOT NULL,
 `distrito_id` int(11) NOT NULL,
 PRIMARY KEY (`id_referencia`),
 KEY `distrito_id` (`distrito_id`),
 CONSTRAINT `referencias_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id_distritos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci