-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema saber_bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema saber_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `saber_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `saber_bd` ;

-- -----------------------------------------------------
-- Table `saber_bd`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`autor` (
  `id_Autor` INT NOT NULL,
  `nomb_Autor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_Autor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`provincia` (
  `idProvincia` INT NOT NULL AUTO_INCREMENT,
  `nom_prov` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProvincia`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`localidad` (
  `idLocalidad` INT NOT NULL AUTO_INCREMENT,
  `nom_localidad` VARCHAR(45) NOT NULL,
  `idProvincia` INT NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  INDEX `_idx` (`idProvincia` ASC) VISIBLE,
  CONSTRAINT `idProvincia`
    FOREIGN KEY (`idProvincia`)
    REFERENCES `saber_bd`.`provincia` (`idProvincia`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`barrio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`barrio` (
  `idBarrio` INT NOT NULL AUTO_INCREMENT,
  `idLocalidad` INT NOT NULL,
  `nom_barrio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBarrio`),
  INDEX `idLocalidad_idx` (`idLocalidad` ASC) VISIBLE,
  CONSTRAINT `idLocalidad`
    FOREIGN KEY (`idLocalidad`)
    REFERENCES `saber_bd`.`localidad` (`idLocalidad`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`domicilio` (
  `idDomicilio` INT NOT NULL AUTO_INCREMENT,
  `nom_calle` VARCHAR(45) NOT NULL,
  `alt_calle` INT NULL DEFAULT NULL,
  `idBarrio` INT NOT NULL,
  PRIMARY KEY (`idDomicilio`),
  INDEX `IdBarrio_idx` (`idBarrio` ASC) VISIBLE,
  CONSTRAINT `IdBarrio`
    FOREIGN KEY (`idBarrio`)
    REFERENCES `saber_bd`.`barrio` (`idBarrio`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`tipodocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`tipodocumento` (
  `id_TipoDocumento` INT NOT NULL,
  `nom_TipoDocumento` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_TipoDocumento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`tipo_usuario` (
  `idTipo_Usuario` INT NOT NULL,
  `nom_TipoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`usuario` (
  `id_Usuario` INT NOT NULL AUTO_INCREMENT,
  `mail_Usuario` VARCHAR(45) NULL DEFAULT NULL,
  `clave_Usuario` VARCHAR(45) NULL DEFAULT NULL,
  `idTipo_Usuario` INT NULL DEFAULT NULL,
  `metodoCifrado_Usuario` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_Usuario`),
  INDEX `idTipoUsuario_Usuario_idx` (`idTipo_Usuario` ASC) VISIBLE,
  CONSTRAINT `idTipoUsuario_Usuario`
    FOREIGN KEY (`idTipo_Usuario`)
    REFERENCES `saber_bd`.`tipo_usuario` (`idTipo_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`persona` (
  `dni_Persona` INT NOT NULL,
  `tipoDNI_persona` INT NULL DEFAULT NULL,
  `nombre_Persona` VARCHAR(20) NOT NULL,
  `apellido_persona` VARCHAR(45) NULL DEFAULT NULL,
  `id_domicilio` INT NULL DEFAULT NULL,
  `id_usuario` INT NULL DEFAULT NULL,
  `fechaAlta_Persona` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_socio` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`dni_Persona`),
  INDEX `idDomicilio_Persona_idx` (`id_domicilio` ASC) VISIBLE,
  INDEX `idTipoDocumento_Persona_idx` (`tipoDNI_persona` ASC) VISIBLE,
  INDEX `idUsuario_Persona_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `idDomicilio_Persona`
    FOREIGN KEY (`id_domicilio`)
    REFERENCES `saber_bd`.`domicilio` (`idDomicilio`),
  CONSTRAINT `idTipoDocumento_Persona`
    FOREIGN KEY (`tipoDNI_persona`)
    REFERENCES `saber_bd`.`tipodocumento` (`id_TipoDocumento`),
  CONSTRAINT `idUsuario_Persona`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `saber_bd`.`usuario` (`id_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`bibliotecario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`bibliotecario` (
  `dni_Biblioteario` INT NOT NULL,
  `id_bibliotecario` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bibliotecario`),
  INDEX `dniBibliotecario_Persona` (`dni_Biblioteario` ASC) VISIBLE,
  CONSTRAINT `dniBibliotecario_Persona`
    FOREIGN KEY (`dni_Biblioteario`)
    REFERENCES `saber_bd`.`persona` (`dni_Persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`categoria_provee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`categoria_provee` (
  `idCategoria_Provee` INT NOT NULL,
  `tipo_provee` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria_Provee`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`categorialibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`categorialibro` (
  `id_CateLibro` INT NOT NULL,
  `categoria_cateLibro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_CateLibro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`categoriasocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`categoriasocio` (
  `id_CategoriaSocio` INT NOT NULL AUTO_INCREMENT,
  `nom_CategoriaSocio` VARCHAR(45) NOT NULL,
  `valorCuota` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`id_CategoriaSocio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`cuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`cuota` (
  `id_MesAnio_Cuota` DATETIME NOT NULL,
  `fechaVenc_Cuota` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_MesAnio_Cuota`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`estadosocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`estadosocio` (
  `id_EstadoSocio` INT NOT NULL AUTO_INCREMENT,
  `nom_EstadoSocio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoSocio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`socio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`socio` (
  `dni_Socio` INT NOT NULL,
  `idcategoria_Socio` INT NOT NULL,
  `id_socio` INT NOT NULL AUTO_INCREMENT,
  `id_EstadoSocio` INT NOT NULL,
  PRIMARY KEY (`id_socio`),
  INDEX `idCategoria_Socio_idx` (`idcategoria_Socio` ASC) VISIBLE,
  INDEX `idEstadoSocio_Socio_idx` (`id_EstadoSocio` ASC) VISIBLE,
  INDEX `dniPersona_dniSocio` (`dni_Socio` ASC) VISIBLE,
  CONSTRAINT `dniPersona_dniSocio`
    FOREIGN KEY (`dni_Socio`)
    REFERENCES `saber_bd`.`persona` (`dni_Persona`),
  CONSTRAINT `idCategoria_Socio`
    FOREIGN KEY (`idcategoria_Socio`)
    REFERENCES `saber_bd`.`categoriasocio` (`id_CategoriaSocio`),
  CONSTRAINT `idEstadoSocio_Socio`
    FOREIGN KEY (`id_EstadoSocio`)
    REFERENCES `saber_bd`.`estadosocio` (`id_EstadoSocio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`cobrocuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`cobrocuota` (
  `idCobroCuota` INT NOT NULL AUTO_INCREMENT,
  `fecha_CobroCuota` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `idCuota` DATETIME NOT NULL,
  `CobroCuotacol` VARCHAR(45) NULL DEFAULT NULL,
  `idSocio` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idCobroCuota`),
  INDEX `idCuota_Cuota_idx` (`idCuota` ASC) VISIBLE,
  INDEX `idSocio_Socio_idx` (`idSocio` ASC) VISIBLE,
  CONSTRAINT `idCuota_Cuota`
    FOREIGN KEY (`idCuota`)
    REFERENCES `saber_bd`.`cuota` (`id_MesAnio_Cuota`),
  CONSTRAINT `idSocio_Socio`
    FOREIGN KEY (`idSocio`)
    REFERENCES `saber_bd`.`socio` (`id_socio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`proveedor` (
  `cuitProveedor` INT NOT NULL AUTO_INCREMENT,
  `nom_prove` VARCHAR(45) NOT NULL,
  `idDomicilio` INT NOT NULL,
  `idBibliotecario` INT NOT NULL,
  `idCategoria_Provee` INT NOT NULL,
  PRIMARY KEY (`cuitProveedor`),
  INDEX `idDomicilio_idx` (`idDomicilio` ASC) VISIBLE,
  INDEX `idCategoria_Proveedor_idx` (`idCategoria_Provee` ASC) VISIBLE,
  INDEX `idBibliotecario_Bibliotecario_idx` (`idBibliotecario` ASC) VISIBLE,
  CONSTRAINT `idBibliotecario_Bibliotecario`
    FOREIGN KEY (`idBibliotecario`)
    REFERENCES `saber_bd`.`bibliotecario` (`dni_Biblioteario`),
  CONSTRAINT `idCategoria_Proveedor`
    FOREIGN KEY (`idCategoria_Provee`)
    REFERENCES `saber_bd`.`categoria_provee` (`idCategoria_Provee`),
  CONSTRAINT `idDomicilio`
    FOREIGN KEY (`idDomicilio`)
    REFERENCES `saber_bd`.`domicilio` (`idDomicilio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`contacto` (
  `idContacto` INT NOT NULL,
  PRIMARY KEY (`idContacto`),
  CONSTRAINT `Id_Contacto_proveedor`
    FOREIGN KEY (`idContacto`)
    REFERENCES `saber_bd`.`proveedor` (`cuitProveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`contacto_persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`contacto_persona` (
  `dni_persona` INT NOT NULL,
  `idContacto` INT NOT NULL,
  INDEX `dni_Persona_idx` (`dni_persona` ASC) VISIBLE,
  INDEX `idContacto_Contacto_idx` (`idContacto` ASC) VISIBLE,
  CONSTRAINT `dni_Persona`
    FOREIGN KEY (`dni_persona`)
    REFERENCES `saber_bd`.`persona` (`dni_Persona`),
  CONSTRAINT `idContacto_Contacto`
    FOREIGN KEY (`idContacto`)
    REFERENCES `saber_bd`.`contacto` (`idContacto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`contacto_proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`contacto_proveedor` (
  `id_Propietario` INT NOT NULL,
  `idContacto` INT NOT NULL,
  INDEX `Id_Contacto_idx` (`idContacto` ASC) VISIBLE,
  INDEX `id_Proveedor` (`id_Propietario` ASC) VISIBLE,
  CONSTRAINT `Id_Contacto`
    FOREIGN KEY (`idContacto`)
    REFERENCES `saber_bd`.`contacto` (`idContacto`),
  CONSTRAINT `id_Proveedor`
    FOREIGN KEY (`id_Propietario`)
    REFERENCES `saber_bd`.`proveedor` (`cuitProveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`detallecobro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`detallecobro` (
  `id_DetalleCobro` INT NOT NULL AUTO_INCREMENT,
  `idCobroCuota` INT NOT NULL,
  `valorCuota` FLOAT NOT NULL,
  `estadoCobroCuota` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_DetalleCobro`),
  INDEX `IdCobroCuota_Cobro_idx` (`idCobroCuota` ASC) VISIBLE,
  CONSTRAINT `IdCobroCuota_Cobro`
    FOREIGN KEY (`idCobroCuota`)
    REFERENCES `saber_bd`.`cobrocuota` (`idCobroCuota`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`detallecuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`detallecuota` (
  `id_DetalleCuota` INT NOT NULL,
  `id_Cuota` DATETIME NOT NULL,
  `estadoCuota_DetCuota` INT NOT NULL,
  `valorCuota` INT NOT NULL,
  `id_Socio` INT NOT NULL,
  PRIMARY KEY (`id_DetalleCuota`),
  INDEX `idSocio_DetCuota_idx` (`id_Socio` ASC) VISIBLE,
  INDEX `idCuota_DetCuota_idx` (`id_Cuota` ASC) VISIBLE,
  CONSTRAINT `idCuota_DetCuota`
    FOREIGN KEY (`id_Cuota`)
    REFERENCES `saber_bd`.`cuota` (`id_MesAnio_Cuota`),
  CONSTRAINT `idSocio_DetCuota`
    FOREIGN KEY (`id_Socio`)
    REFERENCES `saber_bd`.`socio` (`id_socio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`estadolibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`estadolibro` (
  `id_EstadoLibro` INT NOT NULL,
  `nom_EstadoLibro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoLibro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`editorial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`editorial` (
  `id_Editorial` INT NOT NULL,
  `nom_editorial` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_Editorial`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`libro` (
  `id_Isbn` VARCHAR(20) NOT NULL,
  `titulo_libro` VARCHAR(45) NOT NULL,
  `subtitulo_libro` VARCHAR(45) NULL DEFAULT NULL,
  `idioma_libro` VARCHAR(45) NULL DEFAULT NULL,
  `numEdicion_libro` INT NULL DEFAULT NULL,
  `edit_libro` INT NOT NULL,
  `categoria_libro` INT NULL DEFAULT NULL,
  `fecPublicacion_libro` DATETIME NULL DEFAULT NULL,
  `cantidadStock_libro` INT NULL DEFAULT NULL,
  `fechaIng_libro` DATETIME NULL DEFAULT NULL,
  `prove_libro` INT NULL DEFAULT NULL,
  `ubiEstanteria_libro` VARCHAR(45) NULL DEFAULT NULL,
  `responsableCarga_libro` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id_Isbn`),
  INDEX `idPorveedor_Libro_idx` (`prove_libro` ASC) VISIBLE,
  INDEX `idCateLibro_Libro_idx` (`categoria_libro` ASC) VISIBLE,
  INDEX `idEditorial_Libro_idx` (`edit_libro` ASC) VISIBLE,
  INDEX `idBibliotecario_Libro_idx` (`responsableCarga_libro` ASC) VISIBLE,
  CONSTRAINT `idBibliotecario_Libro`
    FOREIGN KEY (`responsableCarga_libro`)
    REFERENCES `saber_bd`.`bibliotecario` (`dni_Biblioteario`),
  CONSTRAINT `idCateLibro_Libro`
    FOREIGN KEY (`categoria_libro`)
    REFERENCES `saber_bd`.`categorialibro` (`id_CateLibro`),
  CONSTRAINT `idEditorial_Libro`
    FOREIGN KEY (`edit_libro`)
    REFERENCES `saber_bd`.`editorial` (`id_Editorial`),
  CONSTRAINT `idPorveedor_Libro`
    FOREIGN KEY (`prove_libro`)
    REFERENCES `saber_bd`.`proveedor` (`cuitProveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`ejemplarlibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`ejemplarlibro` (
  `id_EjemplarLibro` INT NOT NULL,
  `id_Libro` VARCHAR(45) NOT NULL,
  `id_EstadoLibro` INT NOT NULL,
  `estadoRegistro_Ejemplar` BIT(1) NOT NULL,
  PRIMARY KEY (`id_EjemplarLibro`),
  INDEX `idLibro_EjemplarLibro_idx` (`id_Libro` ASC) VISIBLE,
  INDEX `idEstadoLibro_EjeplarLibro_idx` (`id_EstadoLibro` ASC) VISIBLE,
  CONSTRAINT `idEstadoLibro_EjeplarLibro`
    FOREIGN KEY (`id_EstadoLibro`)
    REFERENCES `saber_bd`.`estadolibro` (`id_EstadoLibro`),
  CONSTRAINT `idLibro_EjemplarLibro`
    FOREIGN KEY (`id_Libro`)
    REFERENCES `saber_bd`.`libro` (`id_Isbn`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`prestamolibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`prestamolibro` (
  `idPrestamoLibro` INT NOT NULL,
  `id_socio` INT NOT NULL,
  PRIMARY KEY (`idPrestamoLibro`),
  INDEX `idSocio_PrestamoLibro_idx` (`id_socio` ASC) VISIBLE,
  CONSTRAINT `idSocio_PrestamoLibro`
    FOREIGN KEY (`id_socio`)
    REFERENCES `saber_bd`.`socio` (`id_socio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`tipoprestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`tipoprestamo` (
  `id_TPrestamo` INT NOT NULL,
  `nom_TipoPrestamo` VARCHAR(45) NOT NULL,
  `cantEjemplares_TipoPrestamo` INT NOT NULL,
  PRIMARY KEY (`id_TPrestamo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`detalleprestamolibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`detalleprestamolibro` (
  `id_DetallePrestamoLibro` INT NOT NULL,
  `id_bibliotecario` INT NOT NULL,
  `id_tipoPrestamo` INT NOT NULL,
  `fechaDevolucion` DATE NULL DEFAULT NULL,
  `fechaPrestamo` DATE NOT NULL,
  `id_PrestamoLibro` INT NOT NULL,
  `id_EjemplarLibro` INT NOT NULL,
  `estado_PrestamoLibro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_DetallePrestamoLibro`),
  INDEX `idBibliotecario_DetallePrestamo_idx` (`id_bibliotecario` ASC) VISIBLE,
  INDEX `idTipoPrestamo_DetallePrestamo_idx` (`id_tipoPrestamo` ASC) VISIBLE,
  INDEX `idPretamoLibro_DetallePrestamo_idx` (`id_PrestamoLibro` ASC) VISIBLE,
  INDEX `idEjemplarLibro_DetallePrestamo_idx` (`id_EjemplarLibro` ASC) VISIBLE,
  CONSTRAINT `idBibliotecario_DetallePrestamo`
    FOREIGN KEY (`id_bibliotecario`)
    REFERENCES `saber_bd`.`bibliotecario` (`id_bibliotecario`),
  CONSTRAINT `idEjemplarLibro_DetallePrestamo`
    FOREIGN KEY (`id_EjemplarLibro`)
    REFERENCES `saber_bd`.`ejemplarlibro` (`id_EjemplarLibro`),
  CONSTRAINT `idPretamoLibro_DetallePrestamo`
    FOREIGN KEY (`id_PrestamoLibro`)
    REFERENCES `saber_bd`.`prestamolibro` (`idPrestamoLibro`),
  CONSTRAINT `idTipoPrestamo_DetallePrestamo`
    FOREIGN KEY (`id_tipoPrestamo`)
    REFERENCES `saber_bd`.`tipoprestamo` (`id_TPrestamo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`estadoreserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`estadoreserva` (
  `id_EstadoReserva` INT NOT NULL AUTO_INCREMENT,
  `nom_EstRes` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoReserva`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`reserva` (
  `id_Reserva` INT NOT NULL,
  `id_Socio` INT NOT NULL,
  PRIMARY KEY (`id_Reserva`),
  INDEX `idSocio_idx` (`id_Socio` ASC) VISIBLE,
  CONSTRAINT `idSocio`
    FOREIGN KEY (`id_Socio`)
    REFERENCES `saber_bd`.`socio` (`id_socio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`detallereserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`detallereserva` (
  `id_DetalleReserva` INT NOT NULL,
  `id_Reserva` INT NOT NULL,
  `id_EjemplarLibro` INT NOT NULL,
  `id_EstadoReserva` INT NOT NULL,
  `id_TipoPrest` INT NOT NULL,
  `fechaReserva_DetRes` DATE NOT NULL,
  `fechaRetiro_DetRes` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_DetalleReserva`),
  INDEX `idReserva_DetReserva_idx` (`id_Reserva` ASC) VISIBLE,
  INDEX `idEjemplarL_DetReserva_idx` (`id_EjemplarLibro` ASC) VISIBLE,
  INDEX `id_TipoPrest_idx` (`id_TipoPrest` ASC) VISIBLE,
  INDEX `idEstadoReserva_idx` (`id_EstadoReserva` ASC) VISIBLE,
  CONSTRAINT `id_TipoPrest`
    FOREIGN KEY (`id_TipoPrest`)
    REFERENCES `saber_bd`.`tipoprestamo` (`id_TPrestamo`),
  CONSTRAINT `idEjemplarL_DetReserva`
    FOREIGN KEY (`id_EjemplarLibro`)
    REFERENCES `saber_bd`.`ejemplarlibro` (`id_EjemplarLibro`),
  CONSTRAINT `idEstadoReserva`
    FOREIGN KEY (`id_EstadoReserva`)
    REFERENCES `saber_bd`.`estadoreserva` (`id_EstadoReserva`),
  CONSTRAINT `idReserva_DetReserva`
    FOREIGN KEY (`id_Reserva`)
    REFERENCES `saber_bd`.`reserva` (`id_Reserva`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`libro_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`libro_autor` (
  `id_Isbn` VARCHAR(20) NOT NULL,
  `id_autor` INT NOT NULL,
  INDEX `idAutor_Libro_idx` (`id_autor` ASC) VISIBLE,
  INDEX `idLibro_Autor_idx` (`id_Isbn` ASC) VISIBLE,
  CONSTRAINT `idAutor_Libro`
    FOREIGN KEY (`id_autor`)
    REFERENCES `saber_bd`.`autor` (`id_Autor`),
  CONSTRAINT `idLibro_Autor`
    FOREIGN KEY (`id_Isbn`)
    REFERENCES `saber_bd`.`libro` (`id_Isbn`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`sesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`sesion` (
  `id_Sesion` INT NOT NULL,
  `evento_Sesion` VARCHAR(45) NULL DEFAULT NULL,
  `fechaHora_Sesion` DATETIME NULL DEFAULT NULL,
  `id_Usuario` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id_Sesion`),
  INDEX `idUsuario_Sesion_idx` (`id_Usuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario_Sesion`
    FOREIGN KEY (`id_Usuario`)
    REFERENCES `saber_bd`.`usuario` (`id_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `saber_bd`.`tipo_contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saber_bd`.`tipo_contacto` (
  `idTipo_Contacto` INT NOT NULL,
  `tipo_Contacto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_Contacto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
