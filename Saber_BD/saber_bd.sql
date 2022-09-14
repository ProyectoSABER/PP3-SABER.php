-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-09-2022 a las 15:03:30
-- Versión del servidor: 8.0.29
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saber_bd`
--
CREATE DATABASE IF NOT EXISTS `saber_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `saber_bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_Autor` int NOT NULL AUTO_INCREMENT,
  `nomb_Autor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_Autor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_Autor`, `nomb_Autor`) VALUES
(1, 'Marc Augé');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE IF NOT EXISTS `barrio` (
  `idBarrio` int NOT NULL AUTO_INCREMENT,
  `idLocalidad` int NOT NULL,
  `nom_barrio` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idBarrio`),
  KEY `idLocalidad_idx` (`idLocalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`idBarrio`, `idLocalidad`, `nom_barrio`) VALUES
(1, 1, 'Cristian Cortés'),
(2, 1, '50 viv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecario`
--

CREATE TABLE IF NOT EXISTS `bibliotecario` (
  `dni_Bibliotecario` int NOT NULL,
  `id_bibliotecario` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bibliotecario`),
  KEY `dniBibliotecario_Persona` (`dni_Bibliotecario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bibliotecario`
--

INSERT INTO `bibliotecario` (`dni_Bibliotecario`, `id_bibliotecario`) VALUES
(33673150, 2),
(35878790, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorialibro`
--

CREATE TABLE IF NOT EXISTS `categorialibro` (
  `id_CateLibro` int NOT NULL AUTO_INCREMENT,
  `categoria_cateLibro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_CateLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorialibro`
--

INSERT INTO `categorialibro` (`id_CateLibro`, `categoria_cateLibro`) VALUES
(1, 'Fisico-quimica'),
(2, 'Matemática'),
(3, 'Lengua y Literatura'),
(4, 'Ciencia Ficción'),
(5, 'Historia'),
(6, 'Arte'),
(7, 'Química'),
(8, 'Física'),
(9, 'Lectura'),
(10, 'Idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasocio`
--

CREATE TABLE IF NOT EXISTS `categoriasocio` (
  `id_CategoriaSocio` int NOT NULL AUTO_INCREMENT,
  `nom_CategoriaSocio` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valorCuota` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_CategoriaSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriasocio`
--

INSERT INTO `categoriasocio` (`id_CategoriaSocio`, `nom_CategoriaSocio`, `valorCuota`) VALUES
(1, 'Docente', '100'),
(2, 'Alumno', '50'),
(3, 'Tutor', '100'),
(4, 'Institucion', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_provee`
--

CREATE TABLE IF NOT EXISTS `categoria_provee` (
  `idCategoria_Provee` int NOT NULL AUTO_INCREMENT,
  `tipo_provee` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idCategoria_Provee`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_provee`
--

INSERT INTO `categoria_provee` (`idCategoria_Provee`, `tipo_provee`) VALUES
(1, 'Provincia'),
(2, 'Nacion'),
(3, 'Privado'),
(4, 'Donacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobrocuota`
--

CREATE TABLE IF NOT EXISTS `cobrocuota` (
  `idCobroCuota` int NOT NULL AUTO_INCREMENT,
  `fecha_CobroCuota` datetime DEFAULT CURRENT_TIMESTAMP,
  `idCuota` datetime NOT NULL,
  `CobroCuotacol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idSocio` int DEFAULT NULL,
  PRIMARY KEY (`idCobroCuota`),
  KEY `idCuota_Cuota_idx` (`idCuota`),
  KEY `idSocio_Socio_idx` (`idSocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int NOT NULL AUTO_INCREMENT,
  `contact` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tipoContacto` int DEFAULT NULL,
  PRIMARY KEY (`idContacto`),
  KEY `idTipoCont_Contacto_idx` (`id_tipoContacto`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `contact`, `id_tipoContacto`) VALUES
(13, '2994712095', 1),
(15, '251987564123', 1),
(16, '2995530258', 1),
(17, '29484789561', 1),
(18, '29489632581', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_persona`
--

CREATE TABLE IF NOT EXISTS `contacto_persona` (
  `id_contactoPersona` int NOT NULL AUTO_INCREMENT,
  `dni_persona` int NOT NULL,
  `idContacto` int NOT NULL,
  PRIMARY KEY (`id_contactoPersona`),
  KEY `dni_Persona_idx` (`dni_persona`),
  KEY `idContacto_ContactoPersona_idx` (`idContacto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto_persona`
--

INSERT INTO `contacto_persona` (`id_contactoPersona`, `dni_persona`, `idContacto`) VALUES
(2, 987456321, 13),
(4, 963258741, 15),
(6, 78965412, 17),
(7, 74581236, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_proveedor`
--

CREATE TABLE IF NOT EXISTS `contacto_proveedor` (
  `id_Propietario` int NOT NULL,
  `idContacto` int NOT NULL,
  KEY `id_Proveedor` (`id_Propietario`),
  KEY `IdContacto_ContactoProveedor_idx` (`idContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
  `id_MesAnio_Cuota` datetime NOT NULL,
  `fechaVenc_Cuota` datetime DEFAULT NULL,
  PRIMARY KEY (`id_MesAnio_Cuota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecobro`
--

CREATE TABLE IF NOT EXISTS `detallecobro` (
  `id_DetalleCobro` int NOT NULL AUTO_INCREMENT,
  `idCobroCuota` int NOT NULL,
  `valorCuota` float NOT NULL,
  `estadoCobroCuota` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_DetalleCobro`),
  KEY `IdCobroCuota_Cobro_idx` (`idCobroCuota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprestamolibro`
--

CREATE TABLE IF NOT EXISTS `detalleprestamolibro` (
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
  KEY `idEstadoPrestamo_DetallePrestamo_idx` (`Id_estado_PrestamoLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleprestamolibro`
--

INSERT INTO `detalleprestamolibro` (`id_DetallePrestamoLibro`, `id_bibliotecario`, `id_tipoPrestamo`, `fechaDevolucion`, `fechaPrestamo`, `id_PrestamoLibro`, `id_EjemplarLibro_Libro`, `Id_estado_PrestamoLibro`) VALUES
(29, 2, 1, '2022-07-19', '2022-07-19', 50, 9, 2),
(32, 2, 1, '2022-07-19', '2022-07-19', 53, 11, 2),
(33, 2, 1, '2022-07-21', '2022-07-21', 54, 9, 2),
(34, 2, 1, '2022-08-23', '2022-08-06', 55, 6, 2),
(35, 2, 5, NULL, '2022-09-02', 56, 13, 1),
(36, 2, 1, '2022-09-02', '2022-09-02', 57, 5, 2),
(37, 2, 1, '2022-09-12', '2022-09-12', 58, 14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereserva`
--

CREATE TABLE IF NOT EXISTS `detallereserva` (
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
  KEY `idEjemplarL_DetReserva_idx` (`id_EjemplarLibro_Libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE IF NOT EXISTS `domicilio` (
  `idDomicilio` int NOT NULL AUTO_INCREMENT,
  `nom_calle` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alt_calle` int DEFAULT NULL,
  `idBarrio` int NOT NULL,
  PRIMARY KEY (`idDomicilio`),
  KEY `IdBarrio_idx` (`idBarrio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`idDomicilio`, `nom_calle`, `alt_calle`, `idBarrio`) VALUES
(1, 'CPEM10', NULL, 1),
(2, 'Mallin del toro', 200, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_Editorial` int NOT NULL AUTO_INCREMENT,
  `nom_editorial` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_Editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_Editorial`, `nom_editorial`) VALUES
(1, 'Editorial Kapelusz‎'),
(2, 'Sudamericana‎ '),
(3, 'Puerto de Palos'),
(4, 'Editorial Estrada'),
(5, 'Ediciones de Mente'),
(6, 'Ediciones INTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplarlibro`
--

CREATE TABLE IF NOT EXISTS `ejemplarlibro` (
  `id_EjemplarLibro` int NOT NULL AUTO_INCREMENT,
  `estadoRegistro_Ejemplar` bit(1) NOT NULL DEFAULT b'1',
  `id_EstadoLibro` int NOT NULL,
  `Id_InstitucionalLibro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_Libro` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_EjemplarLibro`),
  KEY `idEstadoLibro_EjeplarLibro_idx` (`id_EstadoLibro`),
  KEY `IdLibro_Libro_idx` (`id_Libro`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejemplarlibro`
--

INSERT INTO `ejemplarlibro` (`id_EjemplarLibro`, `estadoRegistro_Ejemplar`, `id_EstadoLibro`, `Id_InstitucionalLibro`, `id_Libro`) VALUES
(5, b'1', 1, 'B12/1234', '1111111111111'),
(6, b'1', 1, 'B12/1234', 'A123456789B12'),
(7, b'1', 1, 'B12/1235', 'A123456789B12'),
(8, b'1', 1, 'B12/1236', 'A123456789B12'),
(9, b'1', 1, 'B12/1234', '98745632114789'),
(10, b'1', 1, '789/casa', '98745632114789'),
(11, b'1', 1, 'abc/1', '12358852987abc'),
(12, b'1', 1, 'abc/2', '12358852987abc'),
(13, b'1', 2, 'M/01', 'qwerty1234568'),
(14, b'1', 1, 'Prueba 100', '12345678912345687');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadolibro`
--

CREATE TABLE IF NOT EXISTS `estadolibro` (
  `id_EstadoLibro` int NOT NULL,
  `nom_EstadoLibro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_EstadoLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadolibro`
--

INSERT INTO `estadolibro` (`id_EstadoLibro`, `nom_EstadoLibro`) VALUES
(1, 'Disponible'),
(2, 'Prestado'),
(3, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoprestamo`
--

CREATE TABLE IF NOT EXISTS `estadoprestamo` (
  `id_EstadoPrestamo` int NOT NULL AUTO_INCREMENT,
  `nom_EstadoPrestamo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_EstadoPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoprestamo`
--

INSERT INTO `estadoprestamo` (`id_EstadoPrestamo`, `nom_EstadoPrestamo`) VALUES
(1, 'Prestado'),
(2, 'Devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoreserva`
--

CREATE TABLE IF NOT EXISTS `estadoreserva` (
  `id_EstadoReserva` int NOT NULL AUTO_INCREMENT,
  `nom_EstRes` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_EstadoReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosocio`
--

CREATE TABLE IF NOT EXISTS `estadosocio` (
  `id_EstadoSocio` int NOT NULL AUTO_INCREMENT,
  `nom_EstadoSocio` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_EstadoSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadosocio`
--

INSERT INTO `estadosocio` (`id_EstadoSocio`, `nom_EstadoSocio`) VALUES
(1, 'Activo'),
(2, 'Deudor Libros'),
(3, 'Moroso'),
(4, 'Moroso Deudor Libros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
  `id_idioma` int NOT NULL AUTO_INCREMENT,
  `nom_idioma` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `nom_idioma`) VALUES
(1, 'Español'),
(2, 'Inglés'),
(3, 'Frances'),
(4, 'Mapudugun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id_Isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titulo_libro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitulo_libro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_idioma` int DEFAULT NULL,
  `numEdicion_libro` int DEFAULT NULL,
  `edit_libro` int NOT NULL,
  `categoria_libro` int DEFAULT NULL,
  `fecPublicacion_libro` date DEFAULT NULL,
  `cantidadStock_libro` int DEFAULT NULL,
  `fechaIng_libro` datetime DEFAULT CURRENT_TIMESTAMP,
  `prove_libro` int DEFAULT NULL,
  `ubiEstanteria_libro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responsableCarga_libro` int DEFAULT NULL,
  PRIMARY KEY (`id_Isbn`),
  KEY `idPorveedor_Libro_idx` (`prove_libro`),
  KEY `idBibliotecario_Libro_idx` (`responsableCarga_libro`),
  KEY `idCategoria_Libro_idx` (`categoria_libro`),
  KEY `idEditorial_Libro_idx` (`edit_libro`),
  KEY `idIdioma_Libro` (`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_Isbn`, `titulo_libro`, `subtitulo_libro`, `id_idioma`, `numEdicion_libro`, `edit_libro`, `categoria_libro`, `fecPublicacion_libro`, `cantidadStock_libro`, `fechaIng_libro`, `prove_libro`, `ubiEstanteria_libro`, `responsableCarga_libro`) VALUES
('1', 'Prueba de Formulario', NULL, 1, 1, 5, 6, '2022-07-01', 1, '2022-07-14 00:00:00', 1322222123, '2', 1),
('1111111111111', 'Prueba de Formulario Nivel 3', 'Esta es otra prueba', 3, 1, 1, 1, '2022-07-27', 1, '2022-07-14 18:05:35', 123456789, 'b', 1),
('12345678912345687', 'Libro Prueba 1', '', 1, 1, 1, 1, '2022-09-02', 1, '2022-09-12 18:36:46', 123456789, 'arriba del todo', 2),
('12358852987abc', 'Libro Prueba 1', '', 1, 1, 1, 1, '2022-06-01', 1, '2022-07-19 00:36:34', 123456789, 'Estante 10', 2),
('123789654qwer', 'Libros Nuevo1', 'Esta es otra prueba', 1, 1, 1, 1, '2022-07-12', 1, '2022-07-15 20:29:30', 123456789, 'arriba del todo', 1),
('3Intento', 'UnaVez +', 'Esta es otra prueba', 1, 1, 1, 6, '2022-07-01', 1, '2022-07-14 15:57:43', 123456789, 'x', 1),
('98745632114789', 'LA CASA', '', 1, 2, 3, 9, '2007-02-02', 1, '2022-07-16 01:27:19', 123456789, 'A la mano', 1),
('A123456789B12', 'Escoba Nueva...', '...No sabe de polvo', 1, 1, 5, 9, '2022-07-16', 1, '2022-07-16 15:53:37', 123456789, 'arriba del todo', 1),
('qwerty1234568', 'Manuelita', '', 1, 1, 1, 9, '2022-09-02', 5, '2022-09-02 17:34:45', 1322222123, '5estanteriaa lado de peguajo', 2),
('Una', 'Prueba de Formulario', 'dsa', 1, 1, 1, 1, '2022-07-01', 1, '2022-07-14 15:55:48', 123456789, 'a', 1),
('UnaAlaVez', 'Prueba de Formulario', 'dsa', 1, 1, 1, 1, '2022-07-01', 1, '2022-07-14 15:54:10', 123456789, 'a', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--

CREATE TABLE IF NOT EXISTS `libro_autor` (
  `id_Isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_autor` int NOT NULL,
  KEY `idLibro_Autor_idx` (`id_Isbn`),
  KEY `idAutor_Libro_idx` (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `idLocalidad` int NOT NULL AUTO_INCREMENT,
  `nom_localidad` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idProvincia` int NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `_idx` (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `nom_localidad`, `idProvincia`) VALUES
(1, 'Loncopué', 1),
(2, 'Cutral-Co', 1),
(3, 'San Rafael', 2),
(4, 'Córdoba capital', 8),
(5, 'Ushuaia', 6),
(6, 'Loncopué', 1),
(7, 'Cutral-Co', 1),
(8, 'San Rafael', 2),
(9, 'Córdoba capital', 8),
(10, 'Ushuaia', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `dni_Persona` int NOT NULL,
  `tipoDNI_persona` int NOT NULL,
  `nombre_Persona` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_persona` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_domicilio` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `fechaAlta_Persona` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_socio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Profile_avatar.png',
  PRIMARY KEY (`dni_Persona`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `idDomicilio_Persona_idx` (`id_domicilio`),
  KEY `idTipoDocumento_Persona_idx` (`tipoDNI_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`dni_Persona`, `tipoDNI_persona`, `nombre_Persona`, `apellido_persona`, `id_domicilio`, `id_usuario`, `fechaAlta_Persona`, `foto_socio`) VALUES
(33673150, 1, 'Noelia', 'Zuñiga', 1, 2, '2022-07-13 12:23:04', 'women.svg'),
(35878790, 1, 'Adrian', 'Finochio', 1, 1, '2022-07-13 12:23:04', 'men.svg'),
(36587456, 1, 'Julio', 'Cesar', 2, 3, '2022-07-13 12:23:04', 'men.svg'),
(74581236, 1, 'Juan', 'Rodriguez', 1, 17, '2022-07-19 00:28:03', ''),
(78965412, 1, 'carolina', 'damaris', 1, 16, '2022-07-19 00:20:43', ''),
(987456321, 1, 'Ezequiel', 'Vargas', 1, 12, '2022-07-18 17:17:21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamolibro`
--

CREATE TABLE IF NOT EXISTS `prestamolibro` (
  `idPrestamoLibro` int NOT NULL AUTO_INCREMENT,
  `id_socio` int NOT NULL,
  PRIMARY KEY (`idPrestamoLibro`),
  KEY `idSocio_PrestamoLibro_idx` (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamolibro`
--

INSERT INTO `prestamolibro` (`idPrestamoLibro`, `id_socio`) VALUES
(50, 18),
(55, 18),
(56, 18),
(57, 18),
(58, 18),
(53, 22),
(54, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `cuitProveedor` int NOT NULL AUTO_INCREMENT,
  `nom_prove` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idDomicilio` int NOT NULL,
  `idBibliotecario` int NOT NULL,
  `idCategoria_Provee` int NOT NULL,
  PRIMARY KEY (`cuitProveedor`),
  KEY `idDomicilio_idx` (`idDomicilio`),
  KEY `idBibliotecario_Bibliotecario_idx` (`idBibliotecario`),
  KEY `idCategoria_Proveedor_idx` (`idCategoria_Provee`)
) ENGINE=InnoDB AUTO_INCREMENT=1322222124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cuitProveedor`, `nom_prove`, `idDomicilio`, `idBibliotecario`, `idCategoria_Provee`) VALUES
(123456789, 'Julio Verne', 2, 33673150, 4),
(1322222123, 'Cesar Ernesto', 1, 33673150, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idProvincia` int NOT NULL AUTO_INCREMENT,
  `nom_prov` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nom_prov`) VALUES
(1, 'Neuquén'),
(2, 'Mendoza'),
(3, 'La pampa'),
(4, 'Rio Negro'),
(5, 'Chubut'),
(6, 'Tierra del Fuego'),
(7, 'Santa Fe'),
(8, 'Córdoba'),
(9, 'Jujuy'),
(10, 'Misiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_Reserva` int NOT NULL,
  `id_Socio` int NOT NULL,
  PRIMARY KEY (`id_Reserva`),
  KEY `idSocio_idx` (`id_Socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `id_Sesion` int NOT NULL AUTO_INCREMENT,
  `evento_Sesion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechaHora_Sesion` datetime DEFAULT NULL,
  `id_Usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_Sesion`),
  KEY `idUsuario_Sesion_idx` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `dni_Socio` int NOT NULL,
  `idcategoria_Socio` int NOT NULL,
  `id_socio` int NOT NULL AUTO_INCREMENT,
  `id_EstadoSocio` int NOT NULL,
  `fechaAlta_socio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_socio`),
  UNIQUE KEY `dni_Socio` (`dni_Socio`),
  KEY `idCategoria_Socio_idx` (`idcategoria_Socio`),
  KEY `idEstadoSocio_Socio_idx` (`id_EstadoSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`dni_Socio`, `idcategoria_Socio`, `id_socio`, `id_EstadoSocio`, `fechaAlta_socio`) VALUES
(987456321, 2, 18, 1, '2022-07-18 18:48:36'),
(74581236, 2, 22, 1, '2022-07-19 00:34:16'),
(36587456, 2, 23, 2, '2022-08-05 21:36:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `id_TipoDocumento` int NOT NULL,
  `nom_TipoDocumento` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_TipoDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_TipoDocumento`, `nom_TipoDocumento`) VALUES
(1, 'DNI'),
(2, 'DNI-provisorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoprestamo`
--

CREATE TABLE IF NOT EXISTS `tipoprestamo` (
  `id_TPrestamo` int NOT NULL AUTO_INCREMENT,
  `nom_TipoPrestamo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantEjemplares_TipoPrestamo` int NOT NULL,
  PRIMARY KEY (`id_TPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoprestamo`
--

INSERT INTO `tipoprestamo` (`id_TPrestamo`, `nom_TipoPrestamo`, `cantEjemplares_TipoPrestamo`) VALUES
(1, 'Uso en biblioteca', 5),
(2, 'Uso en Aula (Docente)', 30),
(3, 'Uso en Aula (Alumno)', 3),
(4, 'Préstamo a Domicilio (Docente)', 5),
(5, 'Préstamo a Domicilio (NO Docente)', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contacto`
--

CREATE TABLE IF NOT EXISTS `tipo_contacto` (
  `idTipo_Contacto` int NOT NULL AUTO_INCREMENT,
  `tipo_Contacto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idTipo_Contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_contacto`
--

INSERT INTO `tipo_contacto` (`idTipo_Contacto`, `tipo_Contacto`) VALUES
(1, 'Celular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idTipo_Usuario` int NOT NULL,
  `nom_TipoUsuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idTipo_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipo_Usuario`, `nom_TipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Bibliotecario'),
(3, 'Docente'),
(4, 'Socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_Usuario` int NOT NULL AUTO_INCREMENT,
  `mail_Usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave_Usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idTipo_Usuario` int DEFAULT NULL,
  `metodoCifrado_Usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activo_Usuario` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_Usuario`),
  UNIQUE KEY `mail_Usuario` (`mail_Usuario`),
  KEY `idTipoUsuario_Usuario_idx` (`idTipo_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `mail_Usuario`, `clave_Usuario`, `idTipo_Usuario`, `metodoCifrado_Usuario`, `activo_Usuario`) VALUES
(1, 'finochio.adrian@outlook.com', 'd22a1ee1583f0ac6233c886dca8445b2', 1, 'md5', 1),
(2, 'Biblioteca@gmail.com', 'd22a1ee1583f0ac6233c886dca8445b2', 2, 'md5', 1),
(3, 'docente@gmail.com', 'd22a1ee1583f0ac6233c886dca8445b2', 4, 'md5', 1),
(12, 'alumno@gmail.com', '25d55ad283aa400af464c76d713c07ad', 4, 'md5', 1),
(16, 'AlumnoNuevo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 4, 'md5', 1),
(17, 'alumno3@outlook.com', 'd22a1ee1583f0ac6233c886dca8445b2', 4, 'md5', 1),
(18, 'jorgito@gmail.com', 'd22a1ee1583f0ac6233c886dca8445b2', 4, 'md5', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `idLocalidad` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);

--
-- Filtros para la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD CONSTRAINT `dniBibliotecario_Persona` FOREIGN KEY (`dni_Bibliotecario`) REFERENCES `persona` (`dni_Persona`);

--
-- Filtros para la tabla `cobrocuota`
--
ALTER TABLE `cobrocuota`
  ADD CONSTRAINT `idCuota_Cuota` FOREIGN KEY (`idCuota`) REFERENCES `cuota` (`id_MesAnio_Cuota`),
  ADD CONSTRAINT `idSocio_Socio` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`id_socio`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `IdTipoContacto_contacto` FOREIGN KEY (`id_tipoContacto`) REFERENCES `tipo_contacto` (`idTipo_Contacto`);

--
-- Filtros para la tabla `contacto_persona`
--
ALTER TABLE `contacto_persona`
  ADD CONSTRAINT `dni_Persona` FOREIGN KEY (`dni_persona`) REFERENCES `persona` (`dni_Persona`),
  ADD CONSTRAINT `idContacto_ContactoPersona` FOREIGN KEY (`idContacto`) REFERENCES `contacto` (`idContacto`);

--
-- Filtros para la tabla `contacto_proveedor`
--
ALTER TABLE `contacto_proveedor`
  ADD CONSTRAINT `id_Proveedor` FOREIGN KEY (`id_Propietario`) REFERENCES `proveedor` (`cuitProveedor`),
  ADD CONSTRAINT `IdContacto_ContactoProveedor` FOREIGN KEY (`idContacto`) REFERENCES `contacto` (`idContacto`);

--
-- Filtros para la tabla `detallecobro`
--
ALTER TABLE `detallecobro`
  ADD CONSTRAINT `IdCobroCuota_Cobro` FOREIGN KEY (`idCobroCuota`) REFERENCES `cobrocuota` (`idCobroCuota`);

--
-- Filtros para la tabla `detalleprestamolibro`
--
ALTER TABLE `detalleprestamolibro`
  ADD CONSTRAINT `idBibliotecario_DetallePrestamo` FOREIGN KEY (`id_bibliotecario`) REFERENCES `bibliotecario` (`id_bibliotecario`),
  ADD CONSTRAINT `idEjemplarLibro_DetallePrestamo` FOREIGN KEY (`id_EjemplarLibro_Libro`) REFERENCES `ejemplarlibro` (`id_EjemplarLibro`),
  ADD CONSTRAINT `idEstadoPrestamo_DetallePrestamo` FOREIGN KEY (`Id_estado_PrestamoLibro`) REFERENCES `estadoprestamo` (`id_EstadoPrestamo`),
  ADD CONSTRAINT `idPrestamoLibro_DetallePrestamo` FOREIGN KEY (`id_PrestamoLibro`) REFERENCES `prestamolibro` (`idPrestamoLibro`),
  ADD CONSTRAINT `idTipoPrestamo_DetallePrestamo ` FOREIGN KEY (`id_tipoPrestamo`) REFERENCES `tipoprestamo` (`id_TPrestamo`);

--
-- Filtros para la tabla `detallereserva`
--
ALTER TABLE `detallereserva`
  ADD CONSTRAINT `id_TipoPrest` FOREIGN KEY (`id_TipoPrest`) REFERENCES `tipoprestamo` (`id_TPrestamo`),
  ADD CONSTRAINT `idEjemplarL_DetReserva` FOREIGN KEY (`id_EjemplarLibro_Libro`) REFERENCES `ejemplarlibro` (`id_EjemplarLibro`),
  ADD CONSTRAINT `idEstadoReserva` FOREIGN KEY (`id_EstadoReserva`) REFERENCES `estadoreserva` (`id_EstadoReserva`),
  ADD CONSTRAINT `idReserva_DetReserva` FOREIGN KEY (`id_Reserva`) REFERENCES `reserva` (`id_Reserva`);

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `IdBarrio` FOREIGN KEY (`idBarrio`) REFERENCES `barrio` (`idBarrio`);

--
-- Filtros para la tabla `ejemplarlibro`
--
ALTER TABLE `ejemplarlibro`
  ADD CONSTRAINT `id_Libro_ISBN` FOREIGN KEY (`id_Libro`) REFERENCES `libro` (`id_Isbn`),
  ADD CONSTRAINT `idEstadoLibro_EjeplarLibro` FOREIGN KEY (`id_EstadoLibro`) REFERENCES `estadolibro` (`id_EstadoLibro`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `idBibliotecario_Libro` FOREIGN KEY (`responsableCarga_libro`) REFERENCES `bibliotecario` (`id_bibliotecario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idCategoria_Libro` FOREIGN KEY (`categoria_libro`) REFERENCES `categorialibro` (`id_CateLibro`),
  ADD CONSTRAINT `idEditorial_Libro` FOREIGN KEY (`edit_libro`) REFERENCES `editorial` (`id_Editorial`),
  ADD CONSTRAINT `idIdioma_Libro` FOREIGN KEY (`id_idioma`) REFERENCES `idioma` (`id_idioma`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idPorveedor_Libro` FOREIGN KEY (`prove_libro`) REFERENCES `proveedor` (`cuitProveedor`);

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `idAutor_Libro` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_Autor`),
  ADD CONSTRAINT `idLibro_Autor` FOREIGN KEY (`id_Isbn`) REFERENCES `libro` (`id_Isbn`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `idProvincia` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `idDomicilio_Persona` FOREIGN KEY (`id_domicilio`) REFERENCES `domicilio` (`idDomicilio`),
  ADD CONSTRAINT `idTipoDocumento_Persona` FOREIGN KEY (`tipoDNI_persona`) REFERENCES `tipodocumento` (`id_TipoDocumento`),
  ADD CONSTRAINT `idUsuario_Persona` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `prestamolibro`
--
ALTER TABLE `prestamolibro`
  ADD CONSTRAINT `idSocio_PrestamoLibro` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `idBibliotecario_Bibliotecario` FOREIGN KEY (`idBibliotecario`) REFERENCES `bibliotecario` (`dni_Bibliotecario`),
  ADD CONSTRAINT `idCategoria_Proveedor` FOREIGN KEY (`idCategoria_Provee`) REFERENCES `categoria_provee` (`idCategoria_Provee`),
  ADD CONSTRAINT `idDomicilio` FOREIGN KEY (`idDomicilio`) REFERENCES `domicilio` (`idDomicilio`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `idSocio` FOREIGN KEY (`id_Socio`) REFERENCES `socio` (`id_socio`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `idUsuario_Sesion` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `dniPersona_dniSocio` FOREIGN KEY (`dni_Socio`) REFERENCES `persona` (`dni_Persona`),
  ADD CONSTRAINT `idCategoria_Socio` FOREIGN KEY (`idcategoria_Socio`) REFERENCES `categoriasocio` (`id_CategoriaSocio`),
  ADD CONSTRAINT `idEstadoSocio_Socio` FOREIGN KEY (`id_EstadoSocio`) REFERENCES `estadosocio` (`id_EstadoSocio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idTipoUsuario_Usuario` FOREIGN KEY (`idTipo_Usuario`) REFERENCES `tipo_usuario` (`idTipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
