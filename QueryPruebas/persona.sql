-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-07-2022 a las 00:29:19
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saber`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `dni_Persona` int NOT NULL,
  `tipoDNI_persona` int DEFAULT NULL,
  `nombre_Persona` varchar(45) DEFAULT NULL,
  `apellido_persona` varchar(45) DEFAULT NULL,
  `id_domicilio` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `fechaAlta_Persona` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dni_Persona`),
  KEY `idDomicilio_Persona_idx` (`id_domicilio`),
  KEY `idTipoDocumento_Persona_idx` (`tipoDNI_persona`),
  KEY `idUsuario_Persona_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `idDomicilio_Persona` FOREIGN KEY (`id_domicilio`) REFERENCES `domicilio` (`idDomicilio`),
  ADD CONSTRAINT `idTipoDocumento_Persona` FOREIGN KEY (`tipoDNI_persona`) REFERENCES `tipodocumento` (`id_TipoDocumento`),
  ADD CONSTRAINT `idUsuario_Persona` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



SELECT per.dni_persona, tipDNI.nom_TipoDocumento, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov, Us.mail_Usuario,per.fechaAlta_Persona
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us
        WHERE per.dni_persona=35878790 
        and tipDNI.id_TipoDocumento=per.tipoDNI_persona 
        and dom.idDomicilio=id_domicilio 
        and barr.idBarrio=dom.idBarrio 
        and loc.idLocalidad=barr.idLocalidad 
        and pro.idProvincia=loc.idProvincia
        and Us.id_Usuario=per.id_usuario;

        SELECT per.dni_persona, tipDNI.nom_TipoDocumento, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov, Us.mail_Usuario,per.fechaAlta_Persona
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro ,tipodocumento as tipDNI, usuario as Us WHERE tipDNI.id_TipoDocumento=per.tipoDNI_persona and dom.idDomicilio=id_domicilio and barr.idBarrio=dom.idBarrio and loc.idLocalidad=barr.idLocalidad and pro.idProvincia=loc.idProvincia and Us.id_Usuario=per.id_usuario;