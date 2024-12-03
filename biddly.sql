-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 09:06:36
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

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`ID`, `producto`, `comprador`, `precio`) VALUES
(12, 21, 'adrian', 15),
(13, 21, 'adrian', 16),
(14, 21, 'adrian', 18),
(15, 21, 'adrian', 20),
(16, 21, 'adrian', 25),
(17, 21, 'adrian', 30),
(18, 22, 'adrian', 200),
(19, 21, 'adrian', 50),
(20, 21, 'Admin', 60),
(21, 23, 'adrian', 20);

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
(21, 'Raquetas de pádel', 'Perfectas para jugadores intermedios', 2, 60, 'https://padeljoy.com/wp-content/uploads/2019/08/racket-shape.jpg', '2024-12-01 10:15:00', 'Juan', 0, 'yes'),
(22, 'Sofá marrón', 'Cómodo y elegante para tu sala de estar', 6, 200, 'https://yourconcept.hu/images/com_hikashop/upload/lounger2.jpg', '2024-12-02 14:30:00', 'María', 0, 'yes'),
(23, 'Un mundo feliz', 'Novela distópica clásica de Aldous Huxley', 5, 20, 'https://http2.mlstatic.com/D_NQ_NP_2X_975670-MLA77601691617_072024-F.webp', '2024-12-03 08:45:00', 'María', 0, 'yes'),
(24, 'La metamorfosis', 'Relato transformador de Franz Kafka', 5, 15, 'https://laliebrelibros.wordpress.com/wp-content/uploads/2012/08/metamorofosis.jpg', '2024-12-04 16:00:00', 'Juan', 0, 'yes'),
(25, 'Zapatillas NIKE', 'Cómodas y perfectas para uso diario', 1, 23, 'https://dnvefa72aowie.cloudfront.net/business-profile/bizPlatform/profile/19215602/1701777969378/MzUyZmRlNjRkZjUxOTE2MGEzYTA3OTE0MmViYzQ2ZDM3NDI4OTkwMWQ2ZjdhYzI2Njk5NTM3NWU5Yjc2MWZmM18wLmpwZWc=.jpeg?q=95&s=1440x1440&t=inside', '2024-12-05 09:20:00', 'María', 0, 'yes'),
(26, 'Cascos JBL', 'Sonido de alta calidad con diseño moderno', 3, 78, 'https://i.blogs.es/f4cefe/jbl00/1366_2000.jpg', '2024-12-06 18:10:00', 'Juan', 0, 'yes'),
(27, 'Renault Espace', 'Vehículo espacioso y cómodo para viajes largos', 4, 5000, 'https://www.autoesa.cz/files/cars/221223182/221223182-1.jpg', '2024-12-07 12:30:00', 'Juan', 0, 'yes'),
(28, 'Peugeot 308 S', 'Coche compacto y eficiente, ideal para la ciudad', 4, 2048, 'https://cdn.am-online.com/media/1/peugeot/12665.jpg', '2024-12-08 17:45:00', 'María', 0, 'yes'),
(29, 'Macbook Pro', 'Portátil potente para trabajo y creatividad', 3, 1000, 'https://photos.smugmug.com/photos/i-JBWqZn6/0/63b5255f/L/i-JBWqZn6-L.jpg', '2024-12-09 11:05:00', 'Juan', 0, 'yes'),
(30, 'Mesa de comedor', 'Ideal para cenas familiares, estilo moderno', 6, 90, 'https://www.treasure-f.com/images/blog/700/w500/202101041858232.jpg', '2024-12-10 19:00:00', 'María', 0, 'yes');

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
  `Cuenta_bancaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Contraseña`, `Correo_electronico`, `Telefono`, `DNI`, `Direccion`, `Cuenta_bancaria`) VALUES
('Admin', '1234', 'asd@asd.com', 666666666, '12345678A', '', 0),
('adrian', '1234', 'asd@asd.com', 666666666, '12345678A', '', 0),
('Juan', '1234', 'juan@gmail.com', 111111111, '11111111A', 'Calle Ejemplo 123', 0),
('Maria', '1234', 'maria@gmail.com', 222222222, '22222222B', 'Calle Ejemplo 456', 0);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
