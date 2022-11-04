-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2022 a las 23:35:09
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
-- Base de datos: `lp3calzado2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_actualizar_password` (IN `prm_id_usuario` INTEGER, IN `prm_current_password` VARCHAR(200), IN `prm_new_password` VARCHAR(200))   BEGIN
	DECLARE existe INTEGER;
    SET existe = (SELECT count(1) FROM usuario WHERE pasword = prm_current_password AND idUsuario = prm_id_usuario);
    
    IF existe = 1 THEN
		UPDATE usuario SET
        pasword = prm_new_password
        WHERE idUsuario = prm_id_usuario;
    END IF;
    
    SELECT existe;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_get_calzados` ()   BEGIN
	SELECT c.idCalzado, c.nombre, c.descripcion, c.imagen, c.idTipoCalzado, tc.nombre as nombreT, c.idProveedor, p.nombre as nombreP 
	FROM calzado c INNER JOIN tipocalzado tc  ON c.idTipoCalzado = tc.idTipoCalzado
	INNER JOIN proveedor p ON c.idProveedor = p.idProveedor
    WHERE (
		SELECT count(*) FROM detallecalzado WHERE idCalzado = c.idCalzado AND stock > 0
	) > 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_get_detalles_calzado` (IN `prm_id_calzado` INTEGER)   BEGIN
	SELECT c.idDetallaCalzado, c.idCalzado, c.color, c.stock, c.precio, t.idTalla, t.tamaño FROM detallecalzado c 
    INNER JOIN talla t ON c.idTalla = t.idTalla
    WHERE c.stock > 0 AND c.idCalzado = prm_id_calzado
	ORDER BY t.tamaño;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insert_detalle_calzado` (IN `prm_id_calzado` INTEGER, IN `prm_id_talla` INTEGER, IN `prm_color` VARCHAR(100), IN `prm_stock` INTEGER, IN `prm_precio` DOUBLE(10,2))   BEGIN
	INSERT INTO detalleCalzado (idCalzado, idTalla, color, stock, precio)
    VALUE (prm_id_calzado, prm_id_talla, prm_color, prm_stock, prm_precio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_insert_venta` (IN `prm_id_cliente` INTEGER)   BEGIN
	INSERT INTO venta (idCliente, fecha) 
    VALUES( prm_id_cliente, NOW());
    
    SELECT idVenta FROM venta ORDER BY idVenta DESC LIMIT 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzado`
--

CREATE TABLE `calzado` (
  `idCalzado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idTipoCalzado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calzado`
--

INSERT INTO `calzado` (`idCalzado`, `nombre`, `descripcion`, `imagen`, `idProveedor`, `idTipoCalzado`) VALUES
(2, 'Moda Casual Mujer Zapato', 'Package:1×shoes(pair) (Note:not include shoe box) I wish you the best A happy shopping', 'https://dl.dropboxusercontent.com/s/fl4vjg38bso3p5w/asd.jpg?dl=0', 1, 3),
(3, 'Sandalias', 'Sandalias 2 suelas', '2.jpg', 1, 2),
(4, 'Sandalia de cuero', 'De', 'https://smhttp-ssl-83681.nexcesscdn.net/media/catalog/product/cache/1/thumbnail/600x/05e17a266b0e9cc26fb81a2e0bed7e78/base/2GD306_GRENDHA.jpg', 1, 2),
(5, 'Tacon Taoffen', 'Zapato tacón de mujer, colores nuevos, primavera Otoño, Zapatos de tacón alto y grueso.', 'https://dl.dropboxusercontent.com/s/9buuhzk7n1npbee/tacon.png?dl=0', 2, 1),
(6, 'Sandalia DaHoo', 'Zapatos de verano de moda para mujeres, sandalias con banda de cuerina, ideales para playa, plana con cordones estilo Roma, zapatos de punta ovalada femenina.', 'https://dl.dropboxusercontent.com/s/v9flpwxirpmx9gj/sandalia.jpg?dl=0', 3, 2),
(7, 'Botas Pensamiento', 'Botas altas por encima de la rodilla para mujer, de talla grande 37-39, modelo de otoño, sexys, de tacón alto delgado, zapatos cómodos de plataforma para mujer.', 'https://dl.dropboxusercontent.com/s/sguu9izvifcx7x4/Bota.png?dl=0', 4, 3),
(8, 'Pantufla Favolook', 'Pantuflas de Mujer, para interior Casa de felpa, suave algodón, son antideslizantes, cómodos e ideales para el dormitorio.', 'https://dl.dropboxusercontent.com/s/la5a4x28hbc9clm/pantufla.jpg?dl=0', 3, 4),
(9, 'Chancla YOUDEYISI', 'Chanclas planas con flores bonitas, nuevos modelos con flores; zapatos deslizantes suaves para mujer, sandalias casuales de playa brillantes con estampado Floral para mujer.', 'https://dl.dropboxusercontent.com/s/2m4h6uu39t22brp/Chancla.jpg?dl=0', 2, 5),
(10, 'Botas Largas', 'Botas largas en colores variados con cierre', 'https://dl.dropboxusercontent.com/s/6hqmfhkh5nmyw8q/botas2.jpg?dl=0', 4, 3),
(11, 'Zapatillas de tela', 'Zapatillas de Tela, clásicos de alta calidad para mujer, zapatos planos altos de otoño, vulcanizados de fábrica.', 'https://dl.dropboxusercontent.com/s/6bzrgd7g8dira3s/zapatilladetela.jpg?dl=0', 5, 6),
(12, 'Zueco D´liro', 'Zapato Zuecos, estilo tipo Sandalias de moda, de piel con tacón y plataforma de madera, sandalias de primera calidad para mujer. Zuecos de madera con tapa y filips de goma.', 'https://dl.dropboxusercontent.com/s/txpjh802qfm030i/zueco.jpg?dl=0', 2, 7),
(13, 'Botas de agua Refined', 'Botas de agua de material sintético, deja entrever un forro con fibras de lúrex, la plantilla está personalizada con el logo y el tacón tiene una cómoda altura de 5,5 cm.', 'https://dl.dropboxusercontent.com/s/wzcyu7ff7jlsfru/botasdeagua.jpg?dl=0', 6, 8),
(14, 'Zapatillas Fujin', 'Zapatillas Fujin Sneakers mujer 2020, transpirable Mesh Casual Shoes, zapatilla de deporte de alta ocio para mujer, Vulcanize zapato plataforma, con una planta de goma super flexible.', 'https://dl.dropboxusercontent.com/s/tywmz0ompzjmu85/zapatillas.jpg?dl=0', 7, 9),
(15, 'Zapato taco Bigtree', 'Zapatos de taco para mujer, con brillantes finos, tacones altos de aguja ostentosos, zapatos de Cenicienta para boda, con purpurina y una suela de cuero.', 'https://dl.dropboxusercontent.com/s/ns9rae7jknsak6i/zapatotaco.jpg?dl=0', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecalzado`
--

CREATE TABLE `detallecalzado` (
  `idDetallaCalzado` int(11) NOT NULL,
  `idCalzado` int(11) NOT NULL,
  `idTalla` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallecalzado`
--

INSERT INTO `detallecalzado` (`idDetallaCalzado`, `idCalzado`, `idTalla`, `color`, `stock`, `precio`) VALUES
(2, 2, 4, 'Azul', 25, 12.00),
(3, 2, 5, 'Negro', 24, 14.00),
(20, 2, 5, 'azull', 36, 15.00),
(22, 4, 11, 'Rojo', 27, 15.00),
(23, 4, 12, 'Azul', 26, 17.00),
(24, 4, 4, 'Verde', 27, 18.00),
(25, 4, 4, 'Naranja', 28, 12.00),
(26, 5, 8, 'Negro', 21, 96.00),
(27, 5, 8, 'Blanco', 24, 96.00),
(28, 5, 9, 'Rojo', 24, 99.00),
(29, 5, 9, 'Rosado', 26, 99.00),
(30, 5, 10, 'Vino', 24, 105.00),
(31, 6, 8, 'Palo Rosa', 26, 59.00),
(32, 6, 8, 'Palo Rosa', 25, 59.00),
(33, 6, 10, 'Negro', 26, 63.00),
(34, 6, 10, 'Blanco', 23, 63.00),
(35, 6, 11, 'Blanco', 23, 65.00),
(36, 7, 8, 'Negro', 25, 250.00),
(37, 7, 8, 'Blanco', 26, 250.00),
(38, 7, 10, 'Negro', 25, 253.00),
(39, 7, 10, 'Blanco', 23, 253.00),
(40, 7, 12, 'Negro', 24, 255.00),
(41, 8, 8, 'Azul', 26, 46.00),
(42, 8, 8, 'Rosado', 25, 46.00),
(43, 8, 10, 'Azul', 24, 49.00),
(44, 8, 10, 'Blanco', 26, 49.00),
(45, 8, 10, 'Rosado', 24, 49.00),
(46, 9, 8, 'Blanco', 25, 37.00),
(47, 9, 8, 'Negro', 26, 37.00),
(48, 9, 8, 'Rosado', 24, 37.00),
(49, 9, 9, 'Rosado', 24, 40.00),
(50, 11, 10, 'Vino', 24, 42.00),
(51, 12, 8, 'Cuero', 23, 125.00),
(52, 12, 9, 'Cuero', 23, 127.00),
(53, 12, 10, 'Cuero', 23, 129.00),
(54, 12, 11, 'Cuero', 23, 131.00),
(55, 12, 12, 'Cuero', 23, 133.00),
(56, 9, 6, 'verde', 80, 25.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `idDetalleVenta` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `Total` decimal(9,2) DEFAULT NULL,
  `idVenta` int(11) NOT NULL,
  `idDetallaCalzado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`idDetalleVenta`, `cantidad`, `Total`, `idVenta`, `idDetallaCalzado`) VALUES
(1, 2, '24.00', 4, 2),
(2, 1, '15.00', 4, 22),
(3, 1, '15.00', 4, 20),
(4, 2, '24.00', 5, 2),
(5, 1, '15.00', 5, 22),
(6, 1, '15.00', 5, 20),
(7, 1, '253.00', 6, 39),
(8, 3, '288.00', 6, 26),
(9, 1, '96.00', 7, 26),
(10, 1, '96.00', 8, 27),
(11, 1, '49.00', 9, 43),
(12, 1, '12.00', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `telefono` char(7) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `telefono`, `direccion`, `estado`) VALUES
(1, 'Rosa', '1234567', '???', '1'),
(2, 'Henry Flores Chavez', '7412569', 'V.E.S, S1, G10, MzL,', '1'),
(3, 'Alejandro Lopez Torr', '7528469', 'V.E.S, S2, G15, MzK,', '1'),
(4, 'Lizeth Rojas Garcia', '7968452', 'Plaza 30 de Agosto s', '1'),
(5, 'Miguel Huaman Rodrig', '7327156', 'AV Arenales 1302 Jes', '1'),
(6, 'Joselyn Vasquez Ramo', '7327892', 'direccion 1..', '1'),
(7, 'Maria Ruiz Castro', '7986541', 'direccion 2..', '1'),
(8, 'David Espinoza Casti', '7223965', 'direccion 3..', '0'),
(9, 'Carolina Quispe Guti', '7561234', 'direccion 4..', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Admnistrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `idTalla` int(11) NOT NULL,
  `tamaño` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`idTalla`, `tamaño`) VALUES
(1, 30),
(3, 31),
(4, 32),
(5, 33),
(6, 34),
(7, 35),
(8, 36),
(9, 37),
(10, 38),
(11, 39),
(12, 40),
(13, 41),
(14, 42),
(15, 43),
(16, 44),
(17, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocalzado`
--

CREATE TABLE `tipocalzado` (
  `idTipoCalzado` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocalzado`
--

INSERT INTO `tipocalzado` (`idTipoCalzado`, `nombre`) VALUES
(1, 'tacon'),
(2, 'sandalia'),
(3, 'bota'),
(4, 'pantufla'),
(5, 'chancla'),
(6, 'zapatillaTela'),
(7, 'zueco'),
(8, 'botaAgua'),
(9, 'zapatilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoP` varchar(20) NOT NULL,
  `apellidoM` varchar(20) NOT NULL,
  `DNI` char(8) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `celular` char(9) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `pasword` varchar(250) NOT NULL,
  `idRol` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidoP`, `apellidoM`, `DNI`, `direccion`, `celular`, `usuario`, `pasword`, `idRol`, `estado`) VALUES
(1, 'Rosa', 'Choquepata', 'Turpo', '12345678', '???', '987654324', 'grupo4', '202cb962ac59075b964b07152d234b70', 1, '1'),
(2, 'Maximiliano', 'Vienta', 'Solctri', '70918235', 'Manzana A Lote 10 VES', '951499365', 'maxi', 'e99a18c428cb38d5f260853678922e03', 2, '1'),
(3, 'Brandi', 'Cáceres', 'Turpo', '70918245', 'Jr Los gatos cuadra', '123123123', 'SOLGELTY', 'd41d8cd98f00b204e9800998ecf8427e', 2, ''),
(18, 'Gato', 'A', 'B', '70918245', 'Jr Los gatos cuadra', '123123123', 'SOLGELTY', '202cb962ac59075b964b07152d234b70', 2, '1'),
(19, 'joseph', 'Collantes', 'morales', '70334674', 'av cordillera', '987663251', 'ecux', 'ea221f08a9a16bb630d468f0ce045c05', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fecha`, `idCliente`) VALUES
(1, '2020-08-07', 2),
(2, '2020-08-07', 2),
(3, '2020-08-07', 2),
(4, '2020-08-07', 2),
(5, '2020-08-07', 2),
(6, '2020-08-13', 1),
(7, '2020-08-13', 1),
(8, '2020-08-13', 19),
(9, '2020-08-13', 19),
(10, '2020-08-13', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calzado`
--
ALTER TABLE `calzado`
  ADD PRIMARY KEY (`idCalzado`),
  ADD KEY `R_16` (`idProveedor`),
  ADD KEY `idTipoCalzado` (`idTipoCalzado`);

--
-- Indices de la tabla `detallecalzado`
--
ALTER TABLE `detallecalzado`
  ADD PRIMARY KEY (`idDetallaCalzado`),
  ADD KEY `R_14` (`idCalzado`),
  ADD KEY `R_15` (`idTalla`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `R_11` (`idVenta`),
  ADD KEY `R_13` (`idDetallaCalzado`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idTalla`);

--
-- Indices de la tabla `tipocalzado`
--
ALTER TABLE `tipocalzado`
  ADD PRIMARY KEY (`idTipoCalzado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `R_54` (`idRol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `R_43` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calzado`
--
ALTER TABLE `calzado`
  MODIFY `idCalzado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detallecalzado`
--
ALTER TABLE `detallecalzado`
  MODIFY `idDetallaCalzado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calzado`
--
ALTER TABLE `calzado`
  ADD CONSTRAINT `R_16` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`),
  ADD CONSTRAINT `calzado_ibfk_1` FOREIGN KEY (`idTipoCalzado`) REFERENCES `tipocalzado` (`idTipoCalzado`);

--
-- Filtros para la tabla `detallecalzado`
--
ALTER TABLE `detallecalzado`
  ADD CONSTRAINT `R_14` FOREIGN KEY (`idCalzado`) REFERENCES `calzado` (`idCalzado`),
  ADD CONSTRAINT `R_15` FOREIGN KEY (`idTalla`) REFERENCES `talla` (`idTalla`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`),
  ADD CONSTRAINT `R_13` FOREIGN KEY (`idDetallaCalzado`) REFERENCES `detallecalzado` (`idDetallaCalzado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `R_54` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `R_43` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
