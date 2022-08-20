CREATE DATABASE  IF NOT EXISTS `saber_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `saber_bd`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: saber_bd
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id_Autor` int NOT NULL AUTO_INCREMENT,
  `nomb_Autor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Autor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Marc Augé');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barrio`
--

DROP TABLE IF EXISTS `barrio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barrio` (
  `idBarrio` int NOT NULL AUTO_INCREMENT,
  `idLocalidad` int NOT NULL,
  `nom_barrio` varchar(45) NOT NULL,
  PRIMARY KEY (`idBarrio`),
  KEY `idLocalidad_idx` (`idLocalidad`),
  CONSTRAINT `idLocalidad` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barrio`
--

LOCK TABLES `barrio` WRITE;
/*!40000 ALTER TABLE `barrio` DISABLE KEYS */;
INSERT INTO `barrio` VALUES (1,1,'Cristian Cortés'),(2,1,'50 viv');
/*!40000 ALTER TABLE `barrio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bibliotecario`
--

DROP TABLE IF EXISTS `bibliotecario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bibliotecario` (
  `dni_Bibliotecario` int NOT NULL,
  `id_bibliotecario` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bibliotecario`),
  KEY `dniBibliotecario_Persona` (`dni_Bibliotecario`),
  CONSTRAINT `dniBibliotecario_Persona` FOREIGN KEY (`dni_Bibliotecario`) REFERENCES `persona` (`dni_Persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bibliotecario`
--

LOCK TABLES `bibliotecario` WRITE;
/*!40000 ALTER TABLE `bibliotecario` DISABLE KEYS */;
INSERT INTO `bibliotecario` VALUES (33673150,2),(35878790,1);
/*!40000 ALTER TABLE `bibliotecario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_provee`
--

DROP TABLE IF EXISTS `categoria_provee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_provee` (
  `idCategoria_Provee` int NOT NULL AUTO_INCREMENT,
  `tipo_provee` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria_Provee`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_provee`
--

LOCK TABLES `categoria_provee` WRITE;
/*!40000 ALTER TABLE `categoria_provee` DISABLE KEYS */;
INSERT INTO `categoria_provee` VALUES (1,'Provincia'),(2,'Nacion'),(3,'Privado'),(4,'Donacion');
/*!40000 ALTER TABLE `categoria_provee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorialibro`
--

DROP TABLE IF EXISTS `categorialibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorialibro` (
  `id_CateLibro` int NOT NULL AUTO_INCREMENT,
  `categoria_cateLibro` varchar(45) NOT NULL,
  PRIMARY KEY (`id_CateLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorialibro`
--

LOCK TABLES `categorialibro` WRITE;
/*!40000 ALTER TABLE `categorialibro` DISABLE KEYS */;
INSERT INTO `categorialibro` VALUES (1,'Fisico-quimica'),(2,'Matemática'),(3,'Lengua y Literatura'),(4,'Ciencia Ficción'),(5,'Historia'),(6,'Arte'),(7,'Química'),(8,'Física'),(9,'Lectura'),(10,'Idiomas');
/*!40000 ALTER TABLE `categorialibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriasocio`
--

DROP TABLE IF EXISTS `categoriasocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoriasocio` (
  `id_CategoriaSocio` int NOT NULL AUTO_INCREMENT,
  `nom_CategoriaSocio` varchar(45) NOT NULL,
  `valorCuota` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_CategoriaSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriasocio`
--

LOCK TABLES `categoriasocio` WRITE;
/*!40000 ALTER TABLE `categoriasocio` DISABLE KEYS */;
INSERT INTO `categoriasocio` VALUES (1,'Docente',100),(2,'Alumno',50),(3,'Tutor',100),(4,'Institucion',100);
/*!40000 ALTER TABLE `categoriasocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobrocuota`
--

DROP TABLE IF EXISTS `cobrocuota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cobrocuota` (
  `idCobroCuota` int NOT NULL AUTO_INCREMENT,
  `fecha_CobroCuota` datetime DEFAULT CURRENT_TIMESTAMP,
  `idCuota` datetime NOT NULL,
  `CobroCuotacol` varchar(45) DEFAULT NULL,
  `idSocio` int DEFAULT NULL,
  PRIMARY KEY (`idCobroCuota`),
  KEY `idCuota_Cuota_idx` (`idCuota`),
  KEY `idSocio_Socio_idx` (`idSocio`),
  CONSTRAINT `idCuota_Cuota` FOREIGN KEY (`idCuota`) REFERENCES `cuota` (`id_MesAnio_Cuota`),
  CONSTRAINT `idSocio_Socio` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`id_socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobrocuota`
--

LOCK TABLES `cobrocuota` WRITE;
/*!40000 ALTER TABLE `cobrocuota` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobrocuota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto` (
  `idContacto` int NOT NULL AUTO_INCREMENT,
  `contact` varchar(45) NOT NULL,
  `id_tipoContacto` int DEFAULT NULL,
  PRIMARY KEY (`idContacto`),
  KEY `idTipoCont_Contacto_idx` (`id_tipoContacto`),
  CONSTRAINT `IdTipoContacto_contacto` FOREIGN KEY (`id_tipoContacto`) REFERENCES `tipo_contacto` (`idTipo_Contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (13,'2994712095',1),(14,'29489874125',1),(15,'251987564123',1);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_persona`
--

DROP TABLE IF EXISTS `contacto_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto_persona` (
  `id_contactoPersona` int NOT NULL AUTO_INCREMENT,
  `dni_persona` int NOT NULL,
  `idContacto` int NOT NULL,
  PRIMARY KEY (`id_contactoPersona`),
  KEY `dni_Persona_idx` (`dni_persona`),
  KEY `idContacto_ContactoPersona_idx` (`idContacto`),
  CONSTRAINT `dni_Persona` FOREIGN KEY (`dni_persona`) REFERENCES `persona` (`dni_Persona`),
  CONSTRAINT `idContacto_ContactoPersona` FOREIGN KEY (`idContacto`) REFERENCES `contacto` (`idContacto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_persona`
--

LOCK TABLES `contacto_persona` WRITE;
/*!40000 ALTER TABLE `contacto_persona` DISABLE KEYS */;
INSERT INTO `contacto_persona` VALUES (2,987456321,13),(3,98745632,14),(4,963258741,15);
/*!40000 ALTER TABLE `contacto_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_proveedor`
--

DROP TABLE IF EXISTS `contacto_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto_proveedor` (
  `id_Propietario` int NOT NULL,
  `idContacto` int NOT NULL,
  KEY `id_Proveedor` (`id_Propietario`),
  KEY `IdContacto_ContactoProveedor_idx` (`idContacto`),
  CONSTRAINT `id_Proveedor` FOREIGN KEY (`id_Propietario`) REFERENCES `proveedor` (`cuitProveedor`),
  CONSTRAINT `IdContacto_ContactoProveedor` FOREIGN KEY (`idContacto`) REFERENCES `contacto` (`idContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_proveedor`
--

LOCK TABLES `contacto_proveedor` WRITE;
/*!40000 ALTER TABLE `contacto_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuota`
--

DROP TABLE IF EXISTS `cuota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuota` (
  `id_MesAnio_Cuota` datetime NOT NULL,
  `fechaVenc_Cuota` datetime DEFAULT NULL,
  PRIMARY KEY (`id_MesAnio_Cuota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuota`
--

LOCK TABLES `cuota` WRITE;
/*!40000 ALTER TABLE `cuota` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecobro`
--

DROP TABLE IF EXISTS `detallecobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallecobro` (
  `id_DetalleCobro` int NOT NULL AUTO_INCREMENT,
  `idCobroCuota` int NOT NULL,
  `valorCuota` float NOT NULL,
  `estadoCobroCuota` varchar(45) NOT NULL,
  PRIMARY KEY (`id_DetalleCobro`),
  KEY `IdCobroCuota_Cobro_idx` (`idCobroCuota`),
  CONSTRAINT `IdCobroCuota_Cobro` FOREIGN KEY (`idCobroCuota`) REFERENCES `cobrocuota` (`idCobroCuota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecobro`
--

LOCK TABLES `detallecobro` WRITE;
/*!40000 ALTER TABLE `detallecobro` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecuota`
--

DROP TABLE IF EXISTS `detallecuota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallecuota` (
  `id_DetalleCuota` int NOT NULL,
  `id_Cuota` datetime NOT NULL,
  `estadoCuota_DetCuota` int NOT NULL,
  `valorCuota` int NOT NULL,
  `id_Socio` int NOT NULL,
  PRIMARY KEY (`id_DetalleCuota`),
  KEY `idSocio_DetCuota_idx` (`id_Socio`),
  KEY `idCuota_DetCuota_idx` (`id_Cuota`),
  CONSTRAINT `idCuota_DetCuota` FOREIGN KEY (`id_Cuota`) REFERENCES `cuota` (`id_MesAnio_Cuota`),
  CONSTRAINT `idSocio_DetCuota` FOREIGN KEY (`id_Socio`) REFERENCES `socio` (`id_socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecuota`
--

LOCK TABLES `detallecuota` WRITE;
/*!40000 ALTER TABLE `detallecuota` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecuota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleprestamolibro`
--

DROP TABLE IF EXISTS `detalleprestamolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleprestamolibro` (
  `id_DetallePrestamoLibro` int NOT NULL AUTO_INCREMENT,
  `id_bibliotecario` int NOT NULL,
  `id_tipoPrestamo` int NOT NULL,
  `fechaDevolucion` date DEFAULT NULL,
  `fechaPrestamo` date NOT NULL,
  `id_PrestamoLibro` int NOT NULL,
  `id_EjemplarLibro_Libro` int NOT NULL,
  `Id_estado_PrestamoLibro` int NOT NULL,
  PRIMARY KEY (`id_DetallePrestamoLibro`),
  KEY `idBibliotecario_DetallePrestamo_idx` (`id_bibliotecario`),
  KEY `idTipoPrestamo_DetallePrestamo _idx` (`id_tipoPrestamo`),
  KEY `idEjemplarLibro_DetallePrestamo_idx` (`id_EjemplarLibro_Libro`),
  KEY `idPrestamoLibro_DetallePrestamo_idx` (`id_PrestamoLibro`),
  KEY `idEstadoPrestamo_DetallePrestamo_idx` (`Id_estado_PrestamoLibro`),
  CONSTRAINT `idBibliotecario_DetallePrestamo` FOREIGN KEY (`id_bibliotecario`) REFERENCES `bibliotecario` (`id_bibliotecario`),
  CONSTRAINT `idEjemplarLibro_DetallePrestamo` FOREIGN KEY (`id_EjemplarLibro_Libro`) REFERENCES `ejemplarlibro` (`id_EjemplarLibro`),
  CONSTRAINT `idEstadoPrestamo_DetallePrestamo` FOREIGN KEY (`Id_estado_PrestamoLibro`) REFERENCES `estadoprestamo` (`id_EstadoPrestamo`),
  CONSTRAINT `idPrestamoLibro_DetallePrestamo` FOREIGN KEY (`id_PrestamoLibro`) REFERENCES `prestamolibro` (`idPrestamoLibro`),
  CONSTRAINT `idTipoPrestamo_DetallePrestamo ` FOREIGN KEY (`id_tipoPrestamo`) REFERENCES `tipoprestamo` (`id_TPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleprestamolibro`
--

LOCK TABLES `detalleprestamolibro` WRITE;
/*!40000 ALTER TABLE `detalleprestamolibro` DISABLE KEYS */;
INSERT INTO `detalleprestamolibro` VALUES (7,1,2,'2022-07-24','2022-07-17',28,6,1),(8,1,1,'2022-07-24','2022-07-17',29,7,1),(9,1,1,'2022-07-24','2022-07-17',30,8,1),(10,2,2,'2022-07-24','2022-07-17',31,5,1);
/*!40000 ALTER TABLE `detalleprestamolibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallereserva`
--

DROP TABLE IF EXISTS `detallereserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallereserva` (
  `id_DetalleReserva` int NOT NULL,
  `id_Reserva` int NOT NULL,
  `id_EjemplarLibro_Libro` int NOT NULL,
  `id_EstadoReserva` int NOT NULL,
  `id_TipoPrest` int NOT NULL,
  `fechaReserva_DetRes` date NOT NULL,
  `fechaRetiro_DetRes` date DEFAULT NULL,
  PRIMARY KEY (`id_DetalleReserva`),
  KEY `idReserva_DetReserva_idx` (`id_Reserva`),
  KEY `idEstadoReserva_idx` (`id_EstadoReserva`),
  KEY `id_TipoPrest_idx` (`id_TipoPrest`),
  KEY `idEjemplarL_DetReserva_idx` (`id_EjemplarLibro_Libro`),
  CONSTRAINT `id_TipoPrest` FOREIGN KEY (`id_TipoPrest`) REFERENCES `tipoprestamo` (`id_TPrestamo`),
  CONSTRAINT `idEjemplarL_DetReserva` FOREIGN KEY (`id_EjemplarLibro_Libro`) REFERENCES `ejemplarlibro` (`id_EjemplarLibro`),
  CONSTRAINT `idEstadoReserva` FOREIGN KEY (`id_EstadoReserva`) REFERENCES `estadoreserva` (`id_EstadoReserva`),
  CONSTRAINT `idReserva_DetReserva` FOREIGN KEY (`id_Reserva`) REFERENCES `reserva` (`id_Reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallereserva`
--

LOCK TABLES `detallereserva` WRITE;
/*!40000 ALTER TABLE `detallereserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallereserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio` (
  `idDomicilio` int NOT NULL AUTO_INCREMENT,
  `nom_calle` varchar(45) NOT NULL,
  `alt_calle` int DEFAULT NULL,
  `idBarrio` int NOT NULL,
  PRIMARY KEY (`idDomicilio`),
  KEY `IdBarrio_idx` (`idBarrio`),
  CONSTRAINT `IdBarrio` FOREIGN KEY (`idBarrio`) REFERENCES `barrio` (`idBarrio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
INSERT INTO `domicilio` VALUES (1,'Arroyo Loncopué',500,1),(2,'Mallin del toro',200,2);
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editorial` (
  `id_Editorial` int NOT NULL AUTO_INCREMENT,
  `nom_editorial` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial`
--

LOCK TABLES `editorial` WRITE;
/*!40000 ALTER TABLE `editorial` DISABLE KEYS */;
INSERT INTO `editorial` VALUES (1,'Editorial Kapelusz‎'),(2,'Sudamericana‎ '),(3,'Puerto de Palos'),(4,'Editorial Estrada'),(5,'Ediciones de Mente'),(6,'Ediciones INTA');
/*!40000 ALTER TABLE `editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejemplarlibro`
--

DROP TABLE IF EXISTS `ejemplarlibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ejemplarlibro` (
  `id_EjemplarLibro` int NOT NULL AUTO_INCREMENT,
  `estadoRegistro_Ejemplar` bit(1) NOT NULL DEFAULT b'1',
  `id_EstadoLibro` int NOT NULL,
  `Id_InstitucionalLibro` varchar(45) NOT NULL,
  `id_Libro` varchar(20) NOT NULL,
  PRIMARY KEY (`id_EjemplarLibro`),
  KEY `idEstadoLibro_EjeplarLibro_idx` (`id_EstadoLibro`),
  KEY `IdLibro_Libro_idx` (`id_Libro`),
  CONSTRAINT `id_Libro_ISBN` FOREIGN KEY (`id_Libro`) REFERENCES `libro` (`id_Isbn`),
  CONSTRAINT `idEstadoLibro_EjeplarLibro` FOREIGN KEY (`id_EstadoLibro`) REFERENCES `estadolibro` (`id_EstadoLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejemplarlibro`
--

LOCK TABLES `ejemplarlibro` WRITE;
/*!40000 ALTER TABLE `ejemplarlibro` DISABLE KEYS */;
INSERT INTO `ejemplarlibro` VALUES (5,_binary '',2,'B12/1234','1111111111111'),(6,_binary '',2,'B12/1234','A123456789B12'),(7,_binary '',2,'B12/1235','A123456789B12'),(8,_binary '',2,'B12/1236','A123456789B12');
/*!40000 ALTER TABLE `ejemplarlibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadolibro`
--

DROP TABLE IF EXISTS `estadolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadolibro` (
  `id_EstadoLibro` int NOT NULL,
  `nom_EstadoLibro` varchar(45) NOT NULL,
  PRIMARY KEY (`id_EstadoLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadolibro`
--

LOCK TABLES `estadolibro` WRITE;
/*!40000 ALTER TABLE `estadolibro` DISABLE KEYS */;
INSERT INTO `estadolibro` VALUES (1,'Disponible'),(2,'Prestado'),(3,'Reservado');
/*!40000 ALTER TABLE `estadolibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoprestamo`
--

DROP TABLE IF EXISTS `estadoprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoprestamo` (
  `id_EstadoPrestamo` int NOT NULL AUTO_INCREMENT,
  `nom_EstadoPrestamo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_EstadoPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoprestamo`
--

LOCK TABLES `estadoprestamo` WRITE;
/*!40000 ALTER TABLE `estadoprestamo` DISABLE KEYS */;
INSERT INTO `estadoprestamo` VALUES (1,'Prestado'),(2,'Devuelto');
/*!40000 ALTER TABLE `estadoprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoreserva`
--

DROP TABLE IF EXISTS `estadoreserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoreserva` (
  `id_EstadoReserva` int NOT NULL AUTO_INCREMENT,
  `nom_EstRes` varchar(45) NOT NULL,
  PRIMARY KEY (`id_EstadoReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoreserva`
--

LOCK TABLES `estadoreserva` WRITE;
/*!40000 ALTER TABLE `estadoreserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoreserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadosocio`
--

DROP TABLE IF EXISTS `estadosocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadosocio` (
  `id_EstadoSocio` int NOT NULL AUTO_INCREMENT,
  `nom_EstadoSocio` varchar(45) NOT NULL,
  PRIMARY KEY (`id_EstadoSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadosocio`
--

LOCK TABLES `estadosocio` WRITE;
/*!40000 ALTER TABLE `estadosocio` DISABLE KEYS */;
INSERT INTO `estadosocio` VALUES (1,'Activo'),(2,'Deudor Libros'),(3,'Moroso'),(4,'Moroso Deudor Libros');
/*!40000 ALTER TABLE `estadosocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idioma` (
  `id_idioma` int NOT NULL AUTO_INCREMENT,
  `nom_idioma` varchar(20) NOT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` VALUES (1,'Español'),(2,'Inglés'),(3,'Frances'),(4,'Mapudugun');
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro` (
  `id_Isbn` varchar(20) NOT NULL,
  `titulo_libro` varchar(45) NOT NULL,
  `subtitulo_libro` varchar(45) DEFAULT NULL,
  `id_idioma` int DEFAULT NULL,
  `numEdicion_libro` int DEFAULT NULL,
  `edit_libro` int NOT NULL,
  `categoria_libro` int DEFAULT NULL,
  `fecPublicacion_libro` date DEFAULT NULL,
  `cantidadStock_libro` int DEFAULT NULL,
  `fechaIng_libro` datetime DEFAULT CURRENT_TIMESTAMP,
  `prove_libro` int DEFAULT NULL,
  `ubiEstanteria_libro` varchar(45) DEFAULT NULL,
  `responsableCarga_libro` int DEFAULT NULL,
  PRIMARY KEY (`id_Isbn`),
  KEY `idPorveedor_Libro_idx` (`prove_libro`),
  KEY `idBibliotecario_Libro_idx` (`responsableCarga_libro`),
  KEY `idCategoria_Libro_idx` (`categoria_libro`),
  KEY `idEditorial_Libro_idx` (`edit_libro`),
  KEY `idIdioma_Libro` (`id_idioma`),
  CONSTRAINT `idBibliotecario_Libro` FOREIGN KEY (`responsableCarga_libro`) REFERENCES `bibliotecario` (`id_bibliotecario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idCategoria_Libro` FOREIGN KEY (`categoria_libro`) REFERENCES `categorialibro` (`id_CateLibro`),
  CONSTRAINT `idEditorial_Libro` FOREIGN KEY (`edit_libro`) REFERENCES `editorial` (`id_Editorial`),
  CONSTRAINT `idIdioma_Libro` FOREIGN KEY (`id_idioma`) REFERENCES `idioma` (`id_idioma`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idPorveedor_Libro` FOREIGN KEY (`prove_libro`) REFERENCES `proveedor` (`cuitProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES ('1','Prueba de Formulario',NULL,1,1,5,6,'2022-07-01',1,'2022-07-14 00:00:00',1322222123,'2',1),('1111111111111','Prueba de Formulario Nivel 3','Esta es otra prueba',3,1,1,1,'2022-07-27',1,'2022-07-14 18:05:35',123456789,'b',1),('123789654qwer','Libros Nuevo1','Esta es otra prueba',1,1,1,1,'2022-07-12',1,'2022-07-15 20:29:30',123456789,'arriba del todo',1),('3Intento','UnaVez +','Esta es otra prueba',1,1,1,6,'2022-07-01',1,'2022-07-14 15:57:43',123456789,'x',1),('98745632114789','LA CASA','',1,2,3,9,'2007-02-02',1,'2022-07-16 01:27:19',123456789,'A la mano',1),('A123456789B12','Escoba Nueva...','...No sabe de polvo',1,1,5,9,'2022-07-16',1,'2022-07-16 15:53:37',123456789,'arriba del todo',1),('Una','Prueba de Formulario','dsa',1,1,1,1,'2022-07-01',1,'2022-07-14 15:55:48',123456789,'a',1),('UnaAlaVez','Prueba de Formulario','dsa',1,1,1,1,'2022-07-01',1,'2022-07-14 15:54:10',123456789,'a',1);
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro_autor`
--

DROP TABLE IF EXISTS `libro_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro_autor` (
  `id_Isbn` varchar(20) NOT NULL,
  `id_autor` int NOT NULL,
  KEY `idLibro_Autor_idx` (`id_Isbn`),
  KEY `idAutor_Libro_idx` (`id_autor`),
  CONSTRAINT `idAutor_Libro` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_Autor`),
  CONSTRAINT `idLibro_Autor` FOREIGN KEY (`id_Isbn`) REFERENCES `libro` (`id_Isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro_autor`
--

LOCK TABLES `libro_autor` WRITE;
/*!40000 ALTER TABLE `libro_autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `libro_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidad`
--

DROP TABLE IF EXISTS `localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localidad` (
  `idLocalidad` int NOT NULL AUTO_INCREMENT,
  `nom_localidad` varchar(45) NOT NULL,
  `idProvincia` int NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `_idx` (`idProvincia`),
  CONSTRAINT `idProvincia` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidad`
--

LOCK TABLES `localidad` WRITE;
/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
INSERT INTO `localidad` VALUES (1,'Loncopué',1),(2,'Cutral-Co',1),(3,'San Rafael',2),(4,'Córdoba capital',8),(5,'Ushuaia',6),(6,'Loncopué',1),(7,'Cutral-Co',1),(8,'San Rafael',2),(9,'Córdoba capital',8),(10,'Ushuaia',6);
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `dni_Persona` int NOT NULL,
  `tipoDNI_persona` int NOT NULL,
  `nombre_Persona` varchar(20) NOT NULL,
  `apellido_persona` varchar(45) NOT NULL,
  `id_domicilio` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `fechaAlta_Persona` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_socio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Profile_avatar.png',
  PRIMARY KEY (`dni_Persona`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `idDomicilio_Persona_idx` (`id_domicilio`),
  KEY `idTipoDocumento_Persona_idx` (`tipoDNI_persona`),
  CONSTRAINT `idDomicilio_Persona` FOREIGN KEY (`id_domicilio`) REFERENCES `domicilio` (`idDomicilio`),
  CONSTRAINT `idTipoDocumento_Persona` FOREIGN KEY (`tipoDNI_persona`) REFERENCES `tipodocumento` (`id_TipoDocumento`),
  CONSTRAINT `idUsuario_Persona` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (33673150,1,'Noelia','Zuñiga',1,2,'2022-07-13 12:23:04','women.svg'),(35878790,1,'Adrian','Finochio',1,1,'2022-07-13 12:23:04','men.svg'),(36587456,1,'Julio','Cesar',2,3,'2022-07-13 12:23:04','men.svg'),(98745632,1,'Joaquin','Garcia',NULL,13,'2022-07-18 17:34:35',''),(963258741,1,'Fualano','deTal',NULL,14,'2022-07-18 18:10:29',''),(987456321,1,'Adrian','Finochio',NULL,12,'2022-07-18 17:17:21','');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamolibro`
--

DROP TABLE IF EXISTS `prestamolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamolibro` (
  `idPrestamoLibro` int NOT NULL AUTO_INCREMENT,
  `id_socio` int NOT NULL,
  PRIMARY KEY (`idPrestamoLibro`),
  KEY `idSocio_PrestamoLibro_idx` (`id_socio`),
  CONSTRAINT `idSocio_PrestamoLibro` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamolibro`
--

LOCK TABLES `prestamolibro` WRITE;
/*!40000 ALTER TABLE `prestamolibro` DISABLE KEYS */;
INSERT INTO `prestamolibro` VALUES (28,1),(29,1),(30,1),(31,12);
/*!40000 ALTER TABLE `prestamolibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `cuitProveedor` int NOT NULL AUTO_INCREMENT,
  `nom_prove` varchar(45) NOT NULL,
  `idDomicilio` int NOT NULL,
  `idBibliotecario` int NOT NULL,
  `idCategoria_Provee` int NOT NULL,
  PRIMARY KEY (`cuitProveedor`),
  KEY `idDomicilio_idx` (`idDomicilio`),
  KEY `idBibliotecario_Bibliotecario_idx` (`idBibliotecario`),
  KEY `idCategoria_Proveedor_idx` (`idCategoria_Provee`),
  CONSTRAINT `idBibliotecario_Bibliotecario` FOREIGN KEY (`idBibliotecario`) REFERENCES `bibliotecario` (`dni_Bibliotecario`),
  CONSTRAINT `idCategoria_Proveedor` FOREIGN KEY (`idCategoria_Provee`) REFERENCES `categoria_provee` (`idCategoria_Provee`),
  CONSTRAINT `idDomicilio` FOREIGN KEY (`idDomicilio`) REFERENCES `domicilio` (`idDomicilio`)
) ENGINE=InnoDB AUTO_INCREMENT=1322222124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (123456789,'Julio Verne',2,33673150,4),(1322222123,'Cesar Ernesto',1,33673150,3);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provincia` (
  `idProvincia` int NOT NULL AUTO_INCREMENT,
  `nom_prov` varchar(45) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Neuquén'),(2,'Mendoza'),(3,'La pampa'),(4,'Rio Negro'),(5,'Chubut'),(6,'Tierra del Fuego'),(7,'Santa Fe'),(8,'Córdoba'),(9,'Jujuy'),(10,'Misiones');
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva` (
  `id_Reserva` int NOT NULL,
  `id_Socio` int NOT NULL,
  PRIMARY KEY (`id_Reserva`),
  KEY `idSocio_idx` (`id_Socio`),
  CONSTRAINT `idSocio` FOREIGN KEY (`id_Socio`) REFERENCES `socio` (`id_socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesion`
--

DROP TABLE IF EXISTS `sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sesion` (
  `id_Sesion` int NOT NULL AUTO_INCREMENT,
  `evento_Sesion` varchar(45) DEFAULT NULL,
  `fechaHora_Sesion` datetime DEFAULT NULL,
  `id_Usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_Sesion`),
  KEY `idUsuario_Sesion_idx` (`id_Usuario`),
  CONSTRAINT `idUsuario_Sesion` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesion`
--

LOCK TABLES `sesion` WRITE;
/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socio`
--

DROP TABLE IF EXISTS `socio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socio` (
  `dni_Socio` int NOT NULL,
  `idcategoria_Socio` int NOT NULL,
  `id_socio` int NOT NULL AUTO_INCREMENT,
  `id_EstadoSocio` int NOT NULL,
  `fechaAlta_socio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_socio`),
  UNIQUE KEY `dni_Socio` (`dni_Socio`),
  KEY `idCategoria_Socio_idx` (`idcategoria_Socio`),
  KEY `idEstadoSocio_Socio_idx` (`id_EstadoSocio`),
  CONSTRAINT `dniPersona_dniSocio` FOREIGN KEY (`dni_Socio`) REFERENCES `persona` (`dni_Persona`),
  CONSTRAINT `idCategoria_Socio` FOREIGN KEY (`idcategoria_Socio`) REFERENCES `categoriasocio` (`id_CategoriaSocio`),
  CONSTRAINT `idEstadoSocio_Socio` FOREIGN KEY (`id_EstadoSocio`) REFERENCES `estadosocio` (`id_EstadoSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socio`
--

LOCK TABLES `socio` WRITE;
/*!40000 ALTER TABLE `socio` DISABLE KEYS */;
INSERT INTO `socio` VALUES (35878790,1,1,1,'2022-07-15 13:22:52'),(33673150,1,12,1,'2022-07-15 13:23:26');
/*!40000 ALTER TABLE `socio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contacto`
--

DROP TABLE IF EXISTS `tipo_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_contacto` (
  `idTipo_Contacto` int NOT NULL AUTO_INCREMENT,
  `tipo_Contacto` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipo_Contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contacto`
--

LOCK TABLES `tipo_contacto` WRITE;
/*!40000 ALTER TABLE `tipo_contacto` DISABLE KEYS */;
INSERT INTO `tipo_contacto` VALUES (1,'Celular');
/*!40000 ALTER TABLE `tipo_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `idTipo_Usuario` int NOT NULL,
  `nom_TipoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipo_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Bibliotecario'),(3,'Docente'),(4,'Socio');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipodocumento` (
  `id_TipoDocumento` int NOT NULL,
  `nom_TipoDocumento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_TipoDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumento`
--

LOCK TABLES `tipodocumento` WRITE;
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` VALUES (1,'DNI'),(2,'DNI-provisorio');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoprestamo`
--

DROP TABLE IF EXISTS `tipoprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoprestamo` (
  `id_TPrestamo` int NOT NULL AUTO_INCREMENT,
  `nom_TipoPrestamo` varchar(45) NOT NULL,
  `cantEjemplares_TipoPrestamo` int NOT NULL,
  PRIMARY KEY (`id_TPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoprestamo`
--

LOCK TABLES `tipoprestamo` WRITE;
/*!40000 ALTER TABLE `tipoprestamo` DISABLE KEYS */;
INSERT INTO `tipoprestamo` VALUES (1,'Uso en biblioteca',5),(2,'Uso en Aula (Docente)',30),(3,'Uso en Aula (Alumno)',3),(4,'Préstamo a Domicilio (Docente)',5),(5,'Préstamo a Domicilio (NO Docente)',3);
/*!40000 ALTER TABLE `tipoprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_Usuario` int NOT NULL AUTO_INCREMENT,
  `mail_Usuario` varchar(45) NOT NULL,
  `clave_Usuario` varchar(45) DEFAULT NULL,
  `idTipo_Usuario` int DEFAULT NULL,
  `metodoCifrado_Usuario` varchar(45) DEFAULT NULL,
  `activo_Usuario` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_Usuario`),
  UNIQUE KEY `mail_Usuario` (`mail_Usuario`),
  KEY `idTipoUsuario_Usuario_idx` (`idTipo_Usuario`),
  CONSTRAINT `idTipoUsuario_Usuario` FOREIGN KEY (`idTipo_Usuario`) REFERENCES `tipo_usuario` (`idTipo_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'finochio.adrian@outlook.com','d22a1ee1583f0ac6233c886dca8445b2',1,'md5',1),(2,'Biblioteca@gmail.com','d22a1ee1583f0ac6233c886dca8445b2',2,'md5',1),(3,'docente@gmail.com','d22a1ee1583f0ac6233c886dca8445b2',4,'md5',1),(4,'alumno1@gmail.com','d22a1ee1583f0ac6233c886dca8445b2',4,'md5',1),(8,'Prueba@gmail.com','d22a1ee1583f0ac6233c886dca8445b2',4,'md5',1),(12,'alumno@gmail.com','25d55ad283aa400af464c76d713c07ad',4,'md5',1),(13,'alumno2@outlook.com','6ebe76c9fb411be97b3b0d48b791a7c9',4,'md5',1),(14,'FulanoDeTal@correo.com','25d55ad283aa400af464c76d713c07ad',4,'md5',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-18 18:18:05
