﻿--
-- Script was generated by Devart dbForge Studio 2020 for MySQL, Version 9.0.791.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 22/6/2022 13:07:01
-- Server version: 10.4.22
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE mvc;

--
-- Drop table `itemcompras`
--
DROP TABLE IF EXISTS itemcompras;

--
-- Drop table `ordencompras`
--
DROP TABLE IF EXISTS ordencompras;

--
-- Drop table `productos`
--
DROP TABLE IF EXISTS productos;

--
-- Drop table `usuarios`
--
DROP TABLE IF EXISTS usuarios;

--
-- Set default database
--
USE mvc;

--
-- Create table `usuarios`
--
CREATE TABLE usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL DEFAULT '',
  email VARCHAR(50) NOT NULL DEFAULT '',
  password VARCHAR(255) DEFAULT NULL,
  rol VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 22,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `productos`
--
CREATE TABLE productos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) DEFAULT NULL,
  descripcion VARCHAR(255) DEFAULT NULL,
  precio INT(11) DEFAULT NULL,
  stock INT(11) DEFAULT NULL,
  imagen VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 32,
AVG_ROW_LENGTH = 2340,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `ordencompras`
--
CREATE TABLE ordencompras (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) DEFAULT NULL,
  nombre VARCHAR(255) DEFAULT NULL,
  apellido VARCHAR(255) DEFAULT NULL,
  direccion VARCHAR(255) DEFAULT NULL,
  provincia VARCHAR(255) DEFAULT NULL,
  telefono VARCHAR(255) DEFAULT NULL,
  codigoPostal VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 39,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `itemcompras`
--
CREATE TABLE itemcompras (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_ordenCompra INT(11) DEFAULT NULL,
  id_producto INT(11) DEFAULT NULL,
  cantidad INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 2048,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

-- 
-- Dumping data for table usuarios
--
INSERT INTO usuarios VALUES
(3, 'admin', 'admin@mail.com', '$2y$10$xS7xLiG4RZPt9rYJQsrOWOcKyvOIBjVwWeFXU4oijv/KzC2s5cOES', 'Administrador'),
(4, 'nacho', 'nacho@mail.com', '$2y$10$6Vrkcj0KlkaAqRXSHjAVj.1UP65qn5JSMVkprWxMC/rYlhEilLuAC', 'Administrador'),
(17, 'Juan', 'juan@mail.com', '$2y$10$QyWNhZzzClCSBGAYUbTw/e3dhPKz0F/YF1gZPABenB/wLYAnt6Bm2', 'Cliente'),
(21, 'Pepe', 'pepe@mail.com', '$2y$10$4yxXS4HGGd1APIkvUl04du6JpxBMZvCH9vC30TvfPK.bM2dGnSgfm', 'Cliente');

-- 
-- Dumping data for table productos
--
INSERT INTO productos VALUES
(19, 'Remeron Amarillo', 'Remeron de mujer amarillo. ', 1500, 0, '3619yellow-5263498_1280.jpg'),
(20, 'Musculosa Blanca', 'Musculosa blanca de mujer', 700, 9, '3810fashion-4785546_1280.jpg'),
(21, 'Top negro', 'Top negro de mujer', 700, 0, '4128fashion-5328924_1280.jpg'),
(23, 'Conjunto', 'Conjunto blusa y pantalon', 3000, 0, '4506fashion-5138277_1280.jpg'),
(24, 'Conjunto', 'Conjunto violeta', 3000, 3, '5019purple-5400725_1280.jpg'),
(25, 'Pollera', 'Pollera', 2000, 2, '1033fashion-5304132_1280.jpg'),
(26, 'Cartera', 'Cartera de cuero marron', 5000, 3, '1313bag-5400665_1280.jpg');

-- 
-- Dumping data for table ordencompras
--
INSERT INTO ordencompras VALUES
(33, 18, 'Jose', 'Rodriguez', 'Calle Falsa 123', 'CABA', '1512341234', '1234'),

-- 
-- Dumping data for table itemcompras
--
INSERT INTO itemcompras VALUES
(1, 33, 26, 1),
(2, 33, 20, 1),

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;