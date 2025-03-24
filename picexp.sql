-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 18:00:20
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
-- Base de datos: `picexp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anyo`
--

CREATE TABLE `anyo` (
  `Id_an` int(11) NOT NULL,
  `Anyo_an` varchar(4) NOT NULL,
  `Descripcion_an` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `Id_area` int(11) NOT NULL,
  `Nombre_area` varchar(25) NOT NULL,
  `Descripcion_area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`Id_area`, `Nombre_area`, `Descripcion_area`) VALUES
(1, 'Espiritual', 'Espiritual'),
(2, 'Cognitiva', 'Cognitiva'),
(3, 'Física', 'Física'),
(4, 'Socio-emocional', 'Socio-emocional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `Codigo_ben` varchar(11) NOT NULL,
  `Nombre_ben` varchar(80) NOT NULL,
  `Apellidos_ben` varchar(80) NOT NULL,
  `Telefono1_ben` varchar(9) DEFAULT NULL,
  `Telefono2_ben` varchar(9) DEFAULT NULL,
  `Fechanac_ben` date NOT NULL,
  `Id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`Codigo_ben`, `Nombre_ben`, `Apellidos_ben`, `Telefono1_ben`, `Telefono2_ben`, `Fechanac_ben`, `Id_usu`) VALUES
('ES077001074', 'Melanie Lissette', 'Escobar Maradiaga', NULL, NULL, '2019-07-24', 2),
('ES077001075', 'Yeison Ezequiel', 'Ortiz Requeno', NULL, NULL, '2019-05-15', 2),
('ES077001076', 'Arlette Valentina', 'Servellon Manzano', NULL, NULL, '2019-03-02', 2),
('ES077001077', 'Jared Matías', 'Ruiz Torres', NULL, NULL, '2019-05-15', 2),
('ES077001078', 'Isabella Santin', 'Segovia', NULL, NULL, '2019-03-12', 2),
('ES077001079', 'Emma Eliana', 'Rubio Rodríguez', NULL, NULL, '2019-04-23', 2),
('ES077001080', 'Luciana Giselle', 'Solorzano Lopez', NULL, NULL, '2019-03-03', 2),
('ES077001081', 'Vladimir Ernesto', 'Martínez Muñoz', NULL, NULL, '2018-12-04', 2),
('ES077001082', 'Liam Stanley', 'Oliva Benavidez', NULL, NULL, '2018-12-21', 2),
('ES077001083', 'Irma Emilia', 'Monroy Alas', NULL, NULL, '2018-08-22', 2),
('ES077001084', 'Xochilt Alexandra', 'Cruz Salgado', NULL, NULL, '2018-08-31', 2),
('ES077001085', 'Daysi Beatriz', 'Requeno Marin', NULL, NULL, '2018-08-13', 2),
('ES077001086', 'Jackeline Sarai', 'Palacios Roque', NULL, NULL, '2018-08-09', 2),
('ES077001087', 'Camila Elizabeth', 'Juárez', NULL, NULL, '2017-12-06', 2),
('ES077001088', 'Rachelle Yamileth', 'Aguillon Muñoz', NULL, NULL, '2017-11-11', 2),
('ES077001089', 'Ian Ezequiel', 'Zamora Alemán', NULL, NULL, '2017-09-18', 2),
('ES077001090', 'Salma Eunice', 'Astacio Henríquez', NULL, NULL, '2017-09-03', 2),
('ES077001091', 'Luna Yareli', 'De Leon', NULL, NULL, '2017-08-03', 2),
('ES077001092', 'Kathleen Ester', 'Chiquillo', NULL, NULL, '2017-07-23', 2),
('ES077001093', 'Dennis Ernesto', 'Hernández Rodríguez', NULL, NULL, '2017-04-27', 2),
('ES077001094', 'Katheryne Melissa', 'Rodríguez Meléndez', NULL, NULL, '2017-05-22', 2),
('ES077001095', 'Katherine Alejandra', 'Deodanes Sánchez', NULL, NULL, '2017-03-12', 2),
('ES077001096', 'Alisson Rachel', 'Mejia Rodriguez', NULL, NULL, '2016-12-15', 2),
('ES077001097', 'Cristina Raquel', 'Gonzalez Medrano', NULL, NULL, '2016-11-11', 2),
('ES077001098', 'Hamilton Jeremias', 'Garcia Sanchez', NULL, NULL, '2016-11-09', 2),
('ES077001099', 'Camila Nicole', 'Alas Carrillo', NULL, NULL, '2016-06-28', 2),
('ES077001100', 'Dominic Lisandro', 'Linares Hernandez', NULL, NULL, '2016-05-28', 2),
('ES077001101', 'Kyler Abraham', 'Ramos Quintanilla', NULL, NULL, '2016-04-02', 2),
('ES077001102', 'Mia Luana', 'Santin Segovia', NULL, NULL, '2017-02-16', 2),
('ES077001103', 'Mateo Ezequiel', 'Guzman Gomez', NULL, NULL, '2015-11-27', 2),
('ES077001104', 'Dennis Josue', 'Perdomo Rodriguez', NULL, NULL, '2015-12-08', 2),
('ES077001105', 'Joseph Neymar', 'Flores Arteaga', NULL, NULL, '2016-01-06', 2),
('ES077001106', 'Edward Isaac', 'Martinez Gonzalez', NULL, NULL, '2015-11-04', 2),
('ES077001107', 'Carlos Valentin', 'Portillo Duran', NULL, NULL, '2015-10-10', 2),
('ES077001108', 'Derek Albeiro', 'Arevalo Martinez', NULL, NULL, '2015-12-02', 2),
('ES077001109', 'Angel Adonay', 'Requeno Cardona', NULL, NULL, '2016-01-05', 2),
('ES077001110', 'Daniel Alexander', 'Martinez Alvarado', NULL, NULL, '2015-09-27', 2),
('ES077001111', 'Roberto Antonio', 'Brioso Valiente', NULL, NULL, '2015-09-21', 2),
('ES077001112', 'Jeremy Remberto', 'Rubio Lara', NULL, NULL, '2015-08-22', 1),
('ES077001113', 'Kimberly Dayana', 'Parada Henriquez', NULL, NULL, '2015-08-15', 1),
('ES077001114', 'Josue Eliezer', 'Ayala Antillon', NULL, NULL, '2015-03-16', 1),
('ES077001115', 'Gladis Saori', 'Solorzano Lopez', NULL, NULL, '2015-06-18', 1),
('ES077001116', 'Camila Elizabeth', 'Martinez Mejia', NULL, NULL, '2016-02-12', 2),
('ES077001117', 'Rocio Eunice', 'Moreno Morales', NULL, NULL, '2015-09-08', 2),
('ES077001118', 'Britany Adriana', 'Sanchez Aviles', NULL, NULL, '2015-08-10', 1),
('ES077001119', 'Miley Larissa', 'Gomez Monterrosa', NULL, NULL, '2015-07-06', 1),
('ES077001120', 'Emily Aurora', 'Escobar Rivas', NULL, NULL, '2015-04-13', 1),
('ES077001121', 'Rosa Elena', 'Monterrosa Hernandez', NULL, NULL, '2015-02-02', 1),
('ES077001122', 'Debora Graciela', 'Marin Portillo', NULL, NULL, '2014-03-15', 1),
('ES077001123', 'Genesis Massiel', 'Villalta Melara', NULL, NULL, '2015-02-12', 1),
('ES077001124', 'Fabricio Otoniel', 'Aguilar Choto', NULL, NULL, '2015-01-23', 1),
('ES077001125', 'Oscar Alexis', 'Palacios Mendoza', NULL, NULL, '2015-01-07', 1),
('ES077001126', 'Wilber Stanley', 'Alfaro Hernandez', NULL, NULL, '2014-07-27', 1),
('ES077001127', 'Jolie Alessandra', 'Perez Cocar', NULL, NULL, '2014-03-15', 1),
('ES077001128', 'Anghely Estrella', 'Henriquez Hernandez', NULL, NULL, '2014-04-28', 1),
('ES077001129', 'Stephanie Michelle', 'Espino Mejia', NULL, NULL, '2014-03-26', 1),
('ES077001130', 'Alisson Mariana', 'Deodanes Sanchez', NULL, NULL, '2014-11-22', 1),
('ES077001131', 'Gabriel Alexander', 'Martinez Mejia', NULL, NULL, '2014-03-26', 1),
('ES077001132', 'Jeremy Alexander', 'Rivera Peña', NULL, NULL, '2013-11-26', 1),
('ES077001133', 'Cristian Rikelmi', 'Luna Espinal', NULL, NULL, '2013-09-02', 1),
('ES077001134', 'Vasti Ariana', 'Zuniga Flores', NULL, NULL, '2013-06-20', 1),
('ES077001135', 'Estrella Eilyn', 'Ramos Escobar', NULL, NULL, '2013-06-16', 1),
('ES077001136', 'Victor Emanuel', 'Monterosa Hernandez', NULL, NULL, '2012-12-03', 1),
('ES077001137', 'Gustavo Isaac', 'Marin Requeno', NULL, NULL, '2012-12-09', 1),
('ES077001138', 'Angel Jose', 'Hernandez Martinez', NULL, NULL, '2012-11-23', 1),
('ES077001139', 'Griselda Yamileth', 'Oliva Garcia', NULL, NULL, '2012-12-18', 1),
('ES077001140', 'Xiomara Yamileth', 'Monge Pineda', NULL, NULL, '2012-11-27', 1),
('ES077001141', 'Douglas Bladimir', 'Martinez Medina', NULL, NULL, '2012-09-27', 1),
('ES077001142', 'Maria Jose', 'Villalta Figueroa', NULL, NULL, '2012-06-24', 1),
('ES077001143', 'Gerardo Alexis', 'Araujo Guardado', NULL, NULL, '2012-07-17', 1),
('ES077001144', 'Grecia Nayeli', 'de Paz', NULL, NULL, '2012-06-18', 1),
('ES077001145', 'Genesis Nahomi', 'Alvarado Hernandez', NULL, NULL, '2012-05-21', 1),
('ES077001146', 'Adonis Josue', 'Ruiz Rodriguez', NULL, NULL, '2012-05-22', 1),
('ES077001147', 'Camila Alessandra', 'Jimenez Rodriguez', NULL, NULL, '2012-03-09', 1),
('ES077001148', 'Daniel Alexander', 'Guevara Landaverde', NULL, NULL, '2012-05-04', 1),
('ES077001149', 'Axel Armando', 'Gonzalez Guillen', NULL, NULL, '2012-02-08', 1),
('ES077001150', 'Alisson Beatriz', 'Gonzalez Guillen', NULL, NULL, '2012-02-08', 1),
('ES077001151', 'Arlette Alexandra', 'Hernandez Luna', NULL, NULL, '2011-12-13', 1),
('ES077001152', 'Ronald Isaac', 'Ramos Gonzalez', NULL, NULL, '2011-06-14', 1),
('ES077001153', 'Jeremy Daniel', 'Menjivar Manzano', NULL, NULL, '2011-11-06', 1),
('ES077001154', 'Sofia Beatriz', 'Cruz Romero', NULL, NULL, '2012-01-07', 1),
('ES077001155', 'Camila Sahory', 'Garcia Ortega', NULL, NULL, '2012-01-03', 1),
('ES077001156', 'Josue David', 'Martinez Juarez', NULL, NULL, '2011-12-28', 1),
('ES077001157', 'Daniel Ezequiel', 'Gonzalez Martinez', NULL, NULL, '2011-11-23', 1),
('ES077001158', 'Jesmarie Isabella', 'Rivera Hernandez', NULL, NULL, '2011-12-20', 1),
('ES077001159', 'Jostin Anthony', 'Ruiz Martinez', NULL, NULL, '2011-09-20', 1),
('ES077001160', 'Cesar Noel', 'Rivas Gonzalez', NULL, NULL, '2011-07-30', 1),
('ES077001161', 'Christopher Ernesto', 'Gonzalez Sanchez', NULL, NULL, '2012-01-25', 1),
('ES077001162', 'Celia Berenice', 'Lemus Orellana', NULL, NULL, '2011-08-20', 1),
('ES077001163', 'Natalia Beatriz', 'Oliva Garcia', NULL, NULL, '2010-05-30', 1),
('ES077001164', 'Fatima Gabriela', 'Flores Rico', NULL, NULL, '2010-05-13', 1),
('ES077001165', 'Humberto Abraham', 'Medina Melchor', NULL, NULL, '2011-01-22', 1),
('ES077001166', 'Miguel Aristides', 'Villalta Melara', NULL, NULL, '2010-11-16', 1),
('ES077001167', 'Marelyn Nicole', 'Luna Ingles', NULL, NULL, '2010-07-31', 1),
('ES077001168', 'Gabriela Michelle', 'Juarez Aguillon', NULL, NULL, '2010-06-23', 1),
('ES077001169', 'Karla Valeria', 'Medina Alvarado', NULL, NULL, '2008-06-04', 2),
('ES077001170', 'Xavier Steven', 'De Paz', NULL, NULL, '2008-03-29', 2),
('ES077001171', 'Jose Daniel', 'Rodriguez Melendez', NULL, NULL, '2008-09-07', 2),
('ES077001172', 'Miguel Esau', 'Flores Luna', NULL, NULL, '2007-05-11', 2),
('ES077001173', 'Sofia Marcela', 'Lopez Pineda', NULL, NULL, '2007-10-03', 2),
('ES077001174', 'Jose Steven', 'Carranza Melara', NULL, NULL, '2007-07-20', 2),
('ES077001175', 'Yamileth Guadalupe', 'Ayala Medrano', NULL, NULL, '2007-04-13', 2),
('ES077001176', 'Karla Michelle', 'Garcia Rivas', NULL, NULL, '2008-02-12', 2),
('ES077001177', 'Michael Jonathan', 'Rivas Maradiaga', NULL, NULL, '2007-09-18', 2),
('ES077001178', 'Denis Alexander', 'Monterrosa', NULL, NULL, '2007-09-04', 2),
('ES077001179', 'Alisson Masiel', 'Ramos Rico', NULL, NULL, '2006-07-26', 2),
('ES077001180', 'Karla Yahaira', 'Carranza Melara', NULL, NULL, '2006-07-15', 2),
('ES077001181', 'Eliazar Alexander', 'Bonilla Rosales', NULL, NULL, '2007-01-25', 2),
('ES077001182', 'Fredy Alexis', 'Alvarado Batres', NULL, NULL, '2006-08-21', 2),
('ES077001183', 'Ana Mabel', 'Hernandez Garcia', NULL, NULL, '2006-11-23', 2),
('ES077001184', 'Diego Josue', 'Yraheta Sambrano', NULL, NULL, '2006-06-05', 2),
('ES077001185', 'Jeffrey Alexander', 'Guerra Aguilar', NULL, NULL, '2006-03-27', 2),
('ES077001186', 'Jose Eduardo', 'Lopez Carranza', NULL, NULL, '2006-05-17', 2),
('ES077001187', 'Javier Alessandro', 'Morales', NULL, NULL, '2007-01-13', 2),
('ES077001188', 'Brian Enrique', 'Martinez Vasquez', NULL, NULL, '2005-04-20', 2),
('ES077001189', 'Josue Alejandro', 'Argueta Nolasco', NULL, NULL, '2006-02-24', 2),
('ES077001190', 'Elizabeth Betsaida', 'Fuentes Castro', NULL, NULL, '2005-11-29', 2),
('ES077001191', 'Gabriela Yasmin', 'Rosales Puac', NULL, NULL, '2005-09-15', 2),
('ES077001192', 'Erick Gabriel', 'Chinchilla Cruz', NULL, NULL, '2005-08-11', 2),
('ES077001193', 'Julissa Mercedes', 'Melara Gonzalez', NULL, NULL, '2005-05-23', 2),
('ES077001195', 'Keyrin Berenisse', 'Chicas Gonzalez', NULL, NULL, '2004-04-06', 2),
('ES077001196', 'David Steven', 'Salamanca Moreno', NULL, NULL, '2004-06-29', 2),
('ES077001197', 'Angelo Ernesto', 'Amaya Mejía', NULL, NULL, '2004-12-11', 2),
('ES077001198', 'Josselin Julissa', 'Rubio Amaya', NULL, NULL, '2004-12-22', 2),
('ES077001199', 'Gabriel Adrian', 'Torres Flores', NULL, NULL, '2004-10-17', 2),
('ES077001200', 'Paola Alejandra', 'Gomez Henriquez', NULL, NULL, '2004-12-21', 2),
('ES077001201', 'Keiry Alejandra', 'Bonilla Torres', NULL, NULL, '2005-01-17', 2),
('ES077001202', 'Daniel Jassir', 'Leiva Monge', NULL, NULL, '2004-09-29', 2),
('ES077001203', 'Stephanie Alexandra', 'Segovia Nolasco', NULL, NULL, '2004-09-09', 2),
('ES077001204', 'David Natanael', 'Escobar Romero', NULL, NULL, '2004-06-16', 2),
('ES077001205', 'Eduardo Josue', 'Alvarado Requeno', NULL, NULL, '2004-05-06', 2),
('ES077001206', 'Henry David', 'Martinez', NULL, NULL, '2004-04-28', 2),
('ES077001207', 'Cristian Alexander', 'Franco Juarez', NULL, NULL, '2004-03-04', 2),
('ES077001208', 'Dayana Nicole', 'Gómez Monterrosa', NULL, NULL, '2004-11-17', 2),
('ES077001209', 'Maria Elizabeth', 'Ayala Medrano', NULL, NULL, '2003-05-13', 2),
('ES077001210', 'Walter Isaias', 'Bonilla Rosales', NULL, NULL, '2004-02-16', 2),
('ES077001211', 'Christian Antonio', 'Espinoza', NULL, NULL, '2004-02-16', 2),
('ES077001212', 'Adrian Alessandro', 'Rodriguez Erazo', NULL, NULL, '2003-08-26', 2),
('ES077001213', 'Nathaly Rebeca', 'Castro Rodriguez', NULL, NULL, '2004-01-02', 2),
('ES077001214', 'Daniel Alexander', 'Leiva Argueta', NULL, NULL, '2003-11-06', 2),
('ES077001215', 'Juan Carlos', 'Hernandez Castillo', NULL, NULL, '2003-12-07', 2),
('ES077001216', 'Gabriela Abigail', 'Rosales Gomez', NULL, NULL, '2003-07-23', 2),
('ES077001217', 'Luis Antonio', 'Amaya', NULL, NULL, '2003-03-06', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edades`
--

CREATE TABLE `edades` (
  `Id_eda` int(11) NOT NULL,
  `Grupo_eda` int(11) NOT NULL COMMENT 'Se guarda int, ya que se guardara el indice del select',
  `Descripcion_eda` varchar(22) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `Id_foto` int(11) NOT NULL,
  `Codigo_ben` varchar(11) NOT NULL,
  `Id_area` int(11) NOT NULL,
  `Id_sec` int(11) NOT NULL,
  `Id_an` int(11) NOT NULL
  `Foto_foto` varchar(200) DEFAULT NULL,
  `Tema_foto` varchar(150) DEFAULT NULL,
  `Fecha_foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `Id_sec` int(11) NOT NULL,
  `Nombre_sec` varchar(25) NOT NULL,
  `Descripcion_sec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`Id_sec`, `Nombre_sec`, `Descripcion_sec`) VALUES
(1, '1', 'Seccion 1'),
(2, '2', 'Seccion 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id_tipo_usu` int(11) NOT NULL,
  `Tipo_usu` varchar(20) NOT NULL,
  `Descripcion_usu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id_tipo_usu`, `Tipo_usu`, `Descripcion_usu`) VALUES
(1, 'admin', 'Usuario Administrador'),
(2, 'Tutor', 'Usuario Tutor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usu` int(11) NOT NULL,
  `Nombre_usu` varchar(120) NOT NULL,
  `Correo_usu` varchar(120) NOT NULL,
  `Usuario_usu` varchar(20) NOT NULL,
  `Clave_usu` varchar(22) NOT NULL,
  `Telefono_usu` varchar(9) NOT NULL,
  `Id_tipo_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usu`, `Nombre_usu`, `Correo_usu`, `Usuario_usu`, `Clave_usu`, `Telefono_usu`, `Id_tipo_usu`) VALUES
(1, 'Diego Ramírez', '4.diegoalrama@gmail.com', 'Diego', '123', '70985575', 1),
(2, 'Marisol Vides', 'marisolvides7775@gmail.com', 'Marisol', '123', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anyo`
--
ALTER TABLE `anyo`
  ADD PRIMARY KEY (`Id_an`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`Id_area`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`Codigo_ben`),
  ADD KEY `Id_eda` (`Id_usu`),
  ADD KEY `FK_Id_eda` (`Id_usu`);

--
-- Indices de la tabla `edades`
--
ALTER TABLE `edades`
  ADD PRIMARY KEY (`Id_eda`),
  ADD KEY `FK_Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`Id_foto`),
  ADD KEY `FK_Id_sec` (`Id_sec`),
  ADD KEY `FK_Id_area` (`Id_area`),
  ADD KEY `FK_Id_an` (`Id_an`),
  ADD KEY `Codigo_ben` (`Codigo_ben`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`Id_sec`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id_tipo_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usu`),
  ADD KEY `FK_tipo_usu` (`Id_usu`),
  ADD KEY `Id_tipo_usu` (`Id_tipo_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anyo`
--
ALTER TABLE `anyo`
  MODIFY `Id_an` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `Id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `edades`
--
ALTER TABLE `edades`
  MODIFY `Id_eda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `Id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `Id_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id_tipo_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`Id_usu`) REFERENCES `usuario` (`Id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `edades`
--
ALTER TABLE `edades`
  ADD CONSTRAINT `edades_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`Id_an`) REFERENCES `anyo` (`Id_an`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`Id_area`) REFERENCES `areas` (`Id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotos_ibfk_3` FOREIGN KEY (`Id_sec`) REFERENCES `seccion` (`Id_sec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotos_ibfk_4` FOREIGN KEY (`Codigo_ben`) REFERENCES `beneficiario` (`Codigo_ben`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipo_usu`) REFERENCES `tipo_usuario` (`Id_tipo_usu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
