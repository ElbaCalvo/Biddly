-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2025 a las 10:40:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biddly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `Nombre`) VALUES
(1, 'Ropa'),
(2, 'Deportes'),
(3, 'Tecnología'),
(4, 'Vehículos'),
(5, 'Libros'),
(6, 'Mobiliaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `ID` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `ID` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `comprador` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUsuario` varchar(255) NOT NULL,
  `FechaEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Categoria` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `URL_Imagen` varchar(255) NOT NULL,
  `Fecha_fin_subasta` datetime NOT NULL,
  `Vendedor` varchar(255) NOT NULL,
  `Numero_Likes` int(11) NOT NULL,
  `activo` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Categoria`, `Precio`, `URL_Imagen`, `Fecha_fin_subasta`, `Vendedor`, `Numero_Likes`, `activo`) VALUES
(31, 'Camiseta Radiohead', 'Camiseta de algodón 100% suave al tacto, con un corte clásico y cómodo.', 1, 15, 'https://images1.vinted.net/t/02_0124c_B7FmTe9PqUhzBmmPG8FePzvy/f800/1690213930.jpeg?s=d0c70e4399c93b023c961e5573edd0251604e239', '2025-03-11 10:00:00', 'Juan', 0, 'yes'),
(32, 'Bicicleta de montaña', 'Bicicleta de montaña diseñada para resistir terrenos difíciles.', 2, 300, 'https://images1.vinted.net/t/03_01f2b_1Y2K1cJirawsq6DSJb9zSSMz/f800/1702210628.jpeg?s=5d692d2844e8acc4eeeb931174120fc145c01886', '2025-03-12 14:20:00', 'Juan', 0, 'yes'),
(33, 'Samsung Galaxy', 'Smartphone Samsung Galaxy con pantalla Super AMOLED de 6.5 pulgadas.', 3, 650, 'https://s.alicdn.com/@sc04/kf/H098f0241915b4b17aa02c8a3e692551fV.jpg_720x720q50.jpg', '2025-02-25 11:30:00', 'Maria', 0, 'yes'),
(34, 'Chaise longue', 'Perfecta para interiores o exteriores, su estructura de metal y cojines.', 6, 120, 'https://cdn.wallapop.com/images/10420/g3/p0/__/c10420p973665358/i4707970685.jpg?pictureSize=W640', '2025-03-14 09:45:00', 'Juan', 4, 'yes'),
(35, 'El gran Gatsby', 'Icónica de la literatura estadounidense. Escrita por F. Scott Fitzgerald.', 5, 18, 'https://static.nadirkitap.com/fotograf/166367/30/Kitap_202301181454131663672.jpg', '2025-03-15 10:00:00', 'Juan', 0, 'yes'),
(36, 'Chaqueta negra', 'Chaqueta perfecta para días fríos.', 1, 52, 'https://images1.vinted.net/t/02_025d9_JeneTx7waVATN78SqQZruWcN/f800/1604882365.jpeg?s=ecd20b795501b8a7b19f078f0195e6e1cc9427ba', '2025-03-16 12:00:00', 'Maria', 0, 'yes'),
(37, 'Auriculares Bose', 'Con cancelación de ruido para una experiencia auditiva sin interrupciones.', 3, 150, 'https://cdn.wallapop.com/images/10420/hk/r1/__/c10420p1062778917/i5199970442.jpg?pictureSize=W640', '2025-02-25 14:00:00', 'Maria', 2, 'yes'),
(38, 'Honda Civic', 'Motor de 1.5L, vehículo de alto rendimiento y eficiencia de combustible.', 4, 8500, 'https://cdn.wallapop.com/images/10420/eb/ph/__/c10420p866191147/i3084119536.jpg?pictureSize=W640', '2025-02-22 12:50:00', 'Maria', 0, 'yes'),
(39, 'iPad Pro', '12.9 pulgadas, procesador M1 y pantalla Liquid Retina.', 3, 900, 'https://www.pc-koubou.jp/upload/save_image/used/SELLMORE/2350005668100-20314.jpg', '2025-03-19 11:15:00', 'Juan', 0, 'yes'),
(40, 'Escritorio de oficina', 'Incluye cajones para almacenamiento y fabricado con material duradero.', 6, 75, 'https://images1.vinted.net/t/03_00ac0_8tJ51du2DVEA4g8r3dLsSeue/f800/1719320933.jpeg?s=5fe8fbcdbd9c3b597575155b851d76eae057d25d', '2025-12-20 16:00:00', 'Juan', 0, 'yes'),
(41, 'Raquetas de pádel', 'Perfectas para jugadores intermedios.', 2, 60, 'https://http2.mlstatic.com/D_NQ_NP_875184-MLA80285932908_112024-O.webp', '2025-03-01 10:15:00', 'Maria', 0, 'yes'),
(42, 'Sofá blanco', 'Cómodo y elegante para tu sala de estar.', 6, 200, 'https://i5.walmartimages.com/seo/MUZZ-Modern-Linen-3-Seater-Sofa-with-5-9-Upholstered-Cushion-for-Living-Room-Apartment-Beige_958a4586-9ef4-40ac-8647-345e1a6abe1f.8fbf66a4bfe7d778ee44383009d1094d.png', '2025-03-02 14:30:00', 'Juan', 25, 'yes'),
(43, 'Un mundo feliz', 'Novela distópica clásica de Aldous Huxley.', 5, 20, 'https://http2.mlstatic.com/D_NQ_NP_892369-MLC40452237328_012020-O-libro-un-mundo-feliz-aldous-huxley-envio-gratis.webp', '2025-03-03 09:20:00', 'Juan', 0, 'yes'),
(44, 'La metamorfosis', 'Relato transformador de Franz Kafka.', 5, 15, 'https://cloud10.todocoleccion.online/libros-segunda-mano-literatura/tc/2020/07/22/18/44732143_223096672_tcimg_1970DA60.webp', '2025-03-04 16:30:00', 'Maria', 20, 'yes'),
(45, 'Sudadera polo', 'Sudadera azul marino con logo en rojo.', 1, 23, 'https://i.ebayimg.com/images/g/s5sAAOSwZcBnk6Jh/s-l1600.jpg', '2025-03-05 09:50:00', 'Maria', 0, 'yes'),
(46, 'Auriculares JBL', 'Sonido de alta calidad con diseño moderno.', 3, 78, 'https://i.ebayimg.com/images/g/BjsAAOSwvOVierYL/s-l1600.jpg', '2025-02-24 18:10:00', 'Juan', 7, 'yes'),
(47, 'Renault Espace', 'Vehículo espacioso y cómodo para viajes largos.', 4, 5000, 'https://images.milanuncios.com/api/v1/ma-ad-media-pro/images/a955f1fc-5740-4e4e-9232-341de935ada8?rule=hw396_70', '2025-03-07 20:20:00', 'Juan', 0, 'yes'),
(48, 'Peugeot 308 S', 'Coche compacto y eficiente, ideal para la ciudad.', 4, 2048, 'https://cdn.wallapop.com/images/10420/i2/ag/__/c10420p1092238582/i5365500769.jpg?pictureSize=W640', '2025-03-08 17:45:00', 'Maria', 0, 'yes'),
(49, 'Macbook Pro', 'Portátil potente para trabajo y creatividad.', 3, 1500, 'https://cdn.wallapop.com/images/10420/i5/ai/__/c10420p1097279887/i5390019666.jpg?pictureSize=W640', '2025-03-09 11:05:00', 'Juan', 52, 'yes'),
(50, 'Mesa de comedor', 'Ideal para cenas familiares, estilo moderno.', 6, 90, 'https://bai.com.uy/cdn/shop/files/6075101-1.png?v=1735564512&width=600', '2025-03-10 19:00:00', 'Maria', 0, 'yes'),
(51, 'BMW X5', 'Equipado con un motor V6 y tracción total, ofrece un manejo excepcional.', 4, 4500, 'https://motorfy.lv/design/img/upload/car/9618/m.francis.photography-43.webp', '2025-02-21 10:00:00', 'Juan', 20, 'yes'),
(52, 'Ford Mustang GT', 'Deportivo con un motor V8 de 5.0L que ofrece una aceleración impresionante', 4, 3250, 'https://cdn.wallapop.com/images/10420/h3/hx/__/c10420p1033800887/i5151357421.jpg?pictureSize=W640', '2025-03-01 17:17:00', 'Juan', 3, 'yes'),
(53, 'Balón de fútbol', 'Balón de fútbol Nike de alta calidad, con diseño profesional.', 2, 25, 'https://cdn.wallapop.com/images/10420/gg/22/__/c10420p994429259/i4826136810.jpg?pictureSize=W640', '2025-02-23 10:00:00', 'Maria', 10, 'yes'),
(54, 'Set de pesas ajustable', 'Permiten modificar el peso según tu rutina.', 2, 80, 'https://cdn.wallapop.com/images/10420/i5/2f/__/c10420p1096902588/i5388070474.jpg?pictureSize=W640', '2025-02-24 12:30:00', 'Juan', 0, 'yes'),
(55, 'Pantalones vaqueros', 'Pantalones vaqueros modelo clásico, hechos de denim de alta calidad.', 1, 27, 'https://img.joomcdn.net/614613f5384edb9f8893373804f471ee4fed2139_original.jpeg', '2025-02-25 09:25:00', 'Maria', 0, 'yes'),
(56, 'Chaqueta de abrigo', 'Chaqueta de abrigo perfecta para mantenerte abrigado en condiciones frías.', 1, 35, 'https://i5.walmartimages.com/seo/MUZZ-Modern-Linen-3-Seater-Sofa-with-5-9-Upholstered-Cushion-for-Living-Room-Apartment-Beige_958a4586-9ef4-40ac-8647-345e1a6abe1f.8fbf66a4bfe7d778ee44383009d1094d.png', '2025-02-26 14:00:00', 'Juan', 0, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Correo_electronico` varchar(255) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Cuenta_bancaria` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Contraseña`, `Correo_electronico`, `Telefono`, `DNI`, `Direccion`, `Cuenta_bancaria`) VALUES
('Admin', '1234', 'asd@asd.com', 666666666, '12345678A', '', '0'),
('adrian', '1234', 'asd@asd.com', 666666666, '12345678A', '', '0'),
('Juan', '1234', 'juan@gmail.com', 111111111, '11111111A', 'Calle Ejemplo 123', '0'),
('Maria', '1234', 'maria@gmail.com', 222222222, '22222222B', 'Calle Ejemplo 456', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `favoritos_productos` (`producto`),
  ADD KEY `favoritos_usuarios` (`usuario`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ofertas_productos` (`producto`),
  ADD KEY `ofertas_comprador` (`comprador`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `clave_foranea_usuario` (`idUsuario`),
  ADD KEY `clave_foranea_producto` (`idProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productos_categoria` (`Categoria`),
  ADD KEY `productos_usuario` (`Vendedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_productos` FOREIGN KEY (`producto`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `favoritos_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`Nombre`);

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_comprador` FOREIGN KEY (`comprador`) REFERENCES `usuarios` (`Nombre`),
  ADD CONSTRAINT `ofertas_productos` FOREIGN KEY (`producto`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `clave_foranea_producto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `clave_foranea_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`Nombre`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID`),
  ADD CONSTRAINT `productos_usuario` FOREIGN KEY (`Vendedor`) REFERENCES `usuarios` (`Nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
