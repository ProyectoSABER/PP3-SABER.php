-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SABER_BD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SABER_BD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SABER_BD` DEFAULT CHARACTER SET utf8 ;
USE `SABER_BD` ;

-- -----------------------------------------------------
-- Table `SABER_BD`.`Tipo_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Tipo_Usuario` (
  `idTipo_Usuario` INT NOT NULL,
  `nom_TipoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_Usuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `SABER_BD`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Usuario` (
  `id_Usuario` INT NOT NULL AUTO_INCREMENT,
  `mail_Usuario` VARCHAR(45) NULL,
  `clave_Usuario` VARCHAR(45) NULL,
  `idTipo_Usuario` INT NULL,
  `metodoCifrado_Usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Usuario`),
  INDEX `idTipoUsuario_Usuario_idx` (`idTipo_Usuario` ASC) VISIBLE,
  CONSTRAINT `idTipoUsuario_Usuario`
    FOREIGN KEY (`idTipo_Usuario`)
    REFERENCES `SABER_BD`.`Tipo_Usuario` (`idTipo_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `SABER_BD`.`Provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Provincia` (
  `idProvincia` INT NOT NULL AUTO_INCREMENT,
  `nom_prov` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProvincia`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `SABER_BD`.`Sesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Sesion` (
  `id_Sesion` INT NOT NULL,
  `evento_Sesion` VARCHAR(45) NULL,
  `fechaHora_Sesion` DATETIME NULL,
  `id_Usuario` INT NULL,
  PRIMARY KEY (`id_Sesion`),
  INDEX `idUsuario_Sesion_idx` (`id_Usuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario_Sesion`
    FOREIGN KEY (`id_Usuario`)
    REFERENCES `SABER_BD`.`Usuario` (`id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `SABER_BD`.`Localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Localidad` (
  `idLocalidad` INT NOT NULL AUTO_INCREMENT,
  `nom_localidad` VARCHAR(45) NOT NULL,
  `idProvincia` INT NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  INDEX `_idx` (`idProvincia` ASC) VISIBLE,
  CONSTRAINT `idProvincia`
    FOREIGN KEY (`idProvincia`)
    REFERENCES `SABER_BD`.`Provincia` (`idProvincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Barrio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Barrio` (
  `idBarrio` INT NOT NULL AUTO_INCREMENT,
  `idLocalidad` INT NOT NULL,
  `nom_barrio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBarrio`),
  INDEX `idLocalidad_idx` (`idLocalidad` ASC) VISIBLE,
  CONSTRAINT `idLocalidad`
    FOREIGN KEY (`idLocalidad`)
    REFERENCES `SABER_BD`.`Localidad` (`idLocalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Domicilio` (
  `idDomicilio` INT NOT NULL AUTO_INCREMENT,
  `nom_calle` VARCHAR(45) NOT NULL,
  `alt_calle` INT NULL,
  `idBarrio` INT NOT NULL,
  PRIMARY KEY (`idDomicilio`),
  INDEX `IdBarrio_idx` (`idBarrio` ASC) VISIBLE,
  CONSTRAINT `IdBarrio`
    FOREIGN KEY (`idBarrio`)
    REFERENCES `SABER_BD`.`Barrio` (`idBarrio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Categoria_Provee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Categoria_Provee` (
  `idCategoria_Provee` INT NOT NULL,
  `tipo_provee` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria_Provee`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`TipoDocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`TipoDocumento` (
  `id_TipoDocumento` INT NOT NULL,
  `nom_TipoDocumento` VARCHAR(45) NULL,
  PRIMARY KEY (`id_TipoDocumento`))
ENGINE = InnoDB;







-- -----------------------------------------------------
-- Table `SABER_BD`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Persona` (
  `dni_Persona` INT NOT NULL,
  `tipoDNI_persona` INT NULL,
  `apellido_persona` VARCHAR(45) NULL,
  `id_domicilio` INT NULL,
  `id_usuario` INT NULL,
  `fechaAlta_Persona` DATETIME NOT NULL DEFAULT CURRENT_DATE(),
  PRIMARY KEY (`dni_Persona`),
  INDEX `idDomicilio_Persona_idx` (`id_domicilio` ASC) VISIBLE,
  INDEX `idTipoDocumento_Persona_idx` (`tipoDNI_persona` ASC) VISIBLE,
  INDEX `idUsuario_Persona_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `idDomicilio_Persona`
    FOREIGN KEY (`id_domicilio`)
    REFERENCES `SABER_BD`.`Domicilio` (`idDomicilio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idTipoDocumento_Persona`
    FOREIGN KEY (`tipoDNI_persona`)
    REFERENCES `SABER_BD`.`TipoDocumento` (`id_TipoDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idUsuario_Persona`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `SABER_BD`.`Usuario` (`id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-------
1 era insercion
------

-- -----------------------------------------------------
-- Table `SABER_BD`.`Bibliotecario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Bibliotecario` (
  `dni_Biblioteario` INT NOT NULL,
  `id_bibliotecario` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bibliotecario`),
  CONSTRAINT `dniBibliotecario_Persona`
    FOREIGN KEY (`dni_Biblioteario`)
    REFERENCES `SABER_BD`.`Persona` (`dni_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Proveedor` (
  `cuitProveedor` INT NOT NULL AUTO_INCREMENT,
  `nom_prove` VARCHAR(45) NOT NULL,
  `idDomicilio` INT NOT NULL,
  `idBibliotecario` INT NOT NULL,
  `idCategoria_Provee` INT NOT NULL,
  PRIMARY KEY (`cuitProveedor`),
  INDEX `idDomicilio_idx` (`idDomicilio` ASC) VISIBLE,
  INDEX `idCategoria_Proveedor_idx` (`idCategoria_Provee` ASC) VISIBLE,
  INDEX `idBibliotecario_Bibliotecario_idx` (`idBibliotecario` ASC) VISIBLE,
  CONSTRAINT `idDomicilio`
    FOREIGN KEY (`idDomicilio`)
    REFERENCES `SABER_BD`.`Domicilio` (`idDomicilio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCategoria_Proveedor`
    FOREIGN KEY (`idCategoria_Provee`)
    REFERENCES `SABER_BD`.`Categoria_Provee` (`idCategoria_Provee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idBibliotecario_Bibliotecario`
    FOREIGN KEY (`idBibliotecario`)
    REFERENCES `SABER_BD`.`Bibliotecario` (`dni_Biblioteario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Tipo_Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Tipo_Contacto` (
  `idTipo_Contacto` INT NOT NULL,
  `tipo_Contacto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_Contacto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Contacto` (
  `idContacto` INT NOT NULL,
  PRIMARY KEY (`idContacto`),
  CONSTRAINT `Id_Contacto_proveedor`
    FOREIGN KEY (`idContacto`)
    REFERENCES `SABER_BD`.`Proveedor` (`cuitProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `SABER_BD`.`Contacto_Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Contacto_Proveedor` (
  `id_Propietario` INT NOT NULL,
  `idContacto` INT NOT NULL,
  INDEX `Id_Contacto_idx` (`idContacto` ASC) VISIBLE,
  CONSTRAINT `id_Proveedor`
    FOREIGN KEY (`id_Propietario`)
    REFERENCES `SABER_BD`.`Proveedor` (`cuitProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Id_Contacto`
    FOREIGN KEY (`idContacto`)
    REFERENCES `SABER_BD`.`Contacto` (`idContacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Contacto_Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Contacto_Persona` (
  `dni_persona` INT NOT NULL,
  `idContacto` INT NOT NULL,
  INDEX `dni_Persona_idx` (`dni_persona` ASC) VISIBLE,
  INDEX `idContacto_Contacto_idx` (`idContacto` ASC) VISIBLE,
  CONSTRAINT `dni_Persona`
    FOREIGN KEY (`dni_persona`)
    REFERENCES `SABER_BD`.`Persona` (`dni_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idContacto_Contacto`
    FOREIGN KEY (`idContacto`)
    REFERENCES `SABER_BD`.`Contacto` (`idContacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`CategoriaLibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`CategoriaLibro` (
  `id_CateLibro` INT NOT NULL,
  `categoria_cateLibro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_CateLibro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Editorial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Editorial` (
  `id_Editorial` INT NOT NULL,
  `nom_editorial` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Editorial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Libro` (
  `id_Isbn` VARCHAR(20) NOT NULL,
  `titulo_libro` VARCHAR(45) NOT NULL,
  `subtitulo_libro` VARCHAR(45) NULL,
  `idioma_libro` VARCHAR(45) NULL,
  `numEdicion_libro` INT NULL,
  `edit_libro` INT NOT NULL,
  `categoria_libro` INT NULL,
  `fecPublicacion_libro` DATETIME NULL,
  `cantidadStock_libro` INT NULL,
  `fechaIng_libro` DATETIME NULL,
  `prove_libro` INT NULL,
  `ubiEstanteria_libro` VARCHAR(45) NULL,
  `responsableCarga_libro` INT NULL,
  PRIMARY KEY (`id_Isbn`),
  INDEX `idPorveedor_Libro_idx` (`prove_libro` ASC) VISIBLE,
  INDEX `idCateLibro_Libro_idx` (`categoria_libro` ASC) VISIBLE,
  INDEX `idEditorial_Libro_idx` (`edit_libro` ASC) VISIBLE,
  INDEX `idBibliotecario_Libro_idx` (`responsableCarga_libro` ASC) VISIBLE,
  CONSTRAINT `idPorveedor_Libro`
    FOREIGN KEY (`prove_libro`)
    REFERENCES `SABER_BD`.`Proveedor` (`cuitProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCateLibro_Libro`
    FOREIGN KEY (`categoria_libro`)
    REFERENCES `SABER_BD`.`CategoriaLibro` (`id_CateLibro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEditorial_Libro`
    FOREIGN KEY (`edit_libro`)
    REFERENCES `SABER_BD`.`Editorial` (`id_Editorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idBibliotecario_Libro`
    FOREIGN KEY (`responsableCarga_libro`)
    REFERENCES `SABER_BD`.`Bibliotecario` (`dni_Biblioteario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Autor` (
  `id_Autor` INT NOT NULL,
  `nomb_Autor` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Autor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Libro_Autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Libro_Autor` (
  `id_Isbn` VARCHAR(20) NOT NULL,
  `id_autor` INT NOT NULL,
  INDEX `idAutor_Libro_idx` (`id_autor` ASC) VISIBLE,
  INDEX `idLibro_Autor_idx` (`id_Isbn` ASC) VISIBLE,
  CONSTRAINT `idLibro_Autor`
    FOREIGN KEY (`id_Isbn`)
    REFERENCES `SABER_BD`.`Libro` (`id_Isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idAutor_Libro`
    FOREIGN KEY (`id_autor`)
    REFERENCES `SABER_BD`.`Autor` (`id_Autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Sesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Sesion` (
  `id_Sesion` INT NOT NULL,
  `evento_Sesion` VARCHAR(45) NULL,
  `fechaHora_Sesion` DATETIME NULL,
  `id_Usuario` INT NULL,
  PRIMARY KEY (`id_Sesion`),
  INDEX `idUsuario_Sesion_idx` (`id_Usuario` ASC) VISIBLE,
  CONSTRAINT `idUsuario_Sesion`
    FOREIGN KEY (`id_Usuario`)
    REFERENCES `SABER_BD`.`Usuario` (`id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`CategoriaSocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`CategoriaSocio` (
  `id_CategoriaSocio` INT NOT NULL AUTO_INCREMENT,
  `nom_CategoriaSocio` VARCHAR(45) NOT NULL,
  `valorCuota` DECIMAL NOT NULL,
  PRIMARY KEY (`id_CategoriaSocio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`EstadoSocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`EstadoSocio` (
  `id_EstadoSocio` INT NOT NULL AUTO_INCREMENT,
  `nom_EstadoSocio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoSocio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Socio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Socio` (
  `dni_Socio` INT NOT NULL,
  `idcategoria_Socio` INT NOT NULL,
  `id_socio` INT NOT NULL AUTO_INCREMENT,
  `id_EstadoSocio` INT NOT NULL,
  INDEX `idCategoria_Socio_idx` (`idcategoria_Socio` ASC) VISIBLE,
  PRIMARY KEY (`id_socio`),
  INDEX `idEstadoSocio_Socio_idx` (`id_EstadoSocio` ASC) VISIBLE,
  CONSTRAINT `idCategoria_Socio`
    FOREIGN KEY (`idcategoria_Socio`)
    REFERENCES `SABER_BD`.`CategoriaSocio` (`id_CategoriaSocio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `dniPersona_dniSocio`
    FOREIGN KEY (`dni_Socio`)
    REFERENCES `SABER_BD`.`Persona` (`dni_Persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEstadoSocio_Socio`
    FOREIGN KEY (`id_EstadoSocio`)
    REFERENCES `SABER_BD`.`EstadoSocio` (`id_EstadoSocio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`PrestamoLibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`PrestamoLibro` (
  `idPrestamoLibro` INT NOT NULL,
  `id_socio` INT NOT NULL,
  PRIMARY KEY (`idPrestamoLibro`),
  INDEX `idSocio_PrestamoLibro_idx` (`id_socio` ASC) VISIBLE,
  CONSTRAINT `idSocio_PrestamoLibro`
    FOREIGN KEY (`id_socio`)
    REFERENCES `SABER_BD`.`Socio` (`id_socio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`TipoPrestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`TipoPrestamo` (
  `id_TPrestamo` INT NOT NULL,
  `nom_TipoPrestamo` VARCHAR(45) NOT NULL,
  `cantEjemplares_TipoPrestamo` INT NOT NULL,
  PRIMARY KEY (`id_TPrestamo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`EstadoLibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`EstadoLibro` (
  `id_EstadoLibro` INT NOT NULL,
  `nom_EstadoLibro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoLibro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`EjemplarLibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`EjemplarLibro` (
  `id_EjemplarLibro` INT NOT NULL,
  `id_Libro` VARCHAR(45) NOT NULL,
  `id_EstadoLibro` INT NOT NULL,
  `estadoRegistro_Ejemplar` BIT(1) NOT NULL,
  PRIMARY KEY (`id_EjemplarLibro`),
  INDEX `idLibro_EjemplarLibro_idx` (`id_Libro` ASC) VISIBLE,
  INDEX `idEstadoLibro_EjeplarLibro_idx` (`id_EstadoLibro` ASC) VISIBLE,
  CONSTRAINT `idLibro_EjemplarLibro`
    FOREIGN KEY (`id_Libro`)
    REFERENCES `SABER_BD`.`Libro` (`id_Isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEstadoLibro_EjeplarLibro`
    FOREIGN KEY (`id_EstadoLibro`)
    REFERENCES `SABER_BD`.`EstadoLibro` (`id_EstadoLibro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`DetallePrestamoLibro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`DetallePrestamoLibro` (
  `id_DetallePrestamoLibro` INT NOT NULL,
  `id_bibliotecario` INT NOT NULL,
  `id_tipoPrestamo` INT NOT NULL,
  `fechaDevolucion` DATE NULL,
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
    REFERENCES `SABER_BD`.`Bibliotecario` (`id_bibliotecario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idTipoPrestamo_DetallePrestamo`
    FOREIGN KEY (`id_tipoPrestamo`)
    REFERENCES `SABER_BD`.`TipoPrestamo` (`id_TPrestamo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idPretamoLibro_DetallePrestamo`
    FOREIGN KEY (`id_PrestamoLibro`)
    REFERENCES `SABER_BD`.`PrestamoLibro` (`idPrestamoLibro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEjemplarLibro_DetallePrestamo`
    FOREIGN KEY (`id_EjemplarLibro`)
    REFERENCES `SABER_BD`.`EjemplarLibro` (`id_EjemplarLibro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Reserva` (
  `id_Reserva` INT NOT NULL,
  `id_Socio` INT NOT NULL,
  PRIMARY KEY (`id_Reserva`),
  INDEX `idSocio_idx` (`id_Socio` ASC) VISIBLE,
  CONSTRAINT `idSocio`
    FOREIGN KEY (`id_Socio`)
    REFERENCES `SABER_BD`.`Socio` (`id_socio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`EstadoReserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`EstadoReserva` (
  `id_EstadoReserva` INT NOT NULL AUTO_INCREMENT,
  `nom_EstRes` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_EstadoReserva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`DetalleReserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`DetalleReserva` (
  `id_DetalleReserva` INT NOT NULL,
  `id_Reserva` INT NOT NULL,
  `id_EjemplarLibro` INT NOT NULL,
  `id_EstadoReserva` INT NOT NULL,
  `id_TipoPrest` INT NOT NULL,
  `fechaReserva_DetRes` DATE NOT NULL,
  `fechaRetiro_DetRes` DATE NULL,
  PRIMARY KEY (`id_DetalleReserva`),
  INDEX `idReserva_DetReserva_idx` (`id_Reserva` ASC) VISIBLE,
  INDEX `idEjemplarL_DetReserva_idx` (`id_EjemplarLibro` ASC) VISIBLE,
  INDEX `id_TipoPrest_idx` (`id_TipoPrest` ASC) VISIBLE,
  INDEX `idEstadoReserva_idx` (`id_EstadoReserva` ASC) VISIBLE,
  CONSTRAINT `idReserva_DetReserva`
    FOREIGN KEY (`id_Reserva`)
    REFERENCES `SABER_BD`.`Reserva` (`id_Reserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEjemplarL_DetReserva`
    FOREIGN KEY (`id_EjemplarLibro`)
    REFERENCES `SABER_BD`.`EjemplarLibro` (`id_EjemplarLibro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_TipoPrest`
    FOREIGN KEY (`id_TipoPrest`)
    REFERENCES `SABER_BD`.`TipoPrestamo` (`id_TPrestamo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEstadoReserva`
    FOREIGN KEY (`id_EstadoReserva`)
    REFERENCES `SABER_BD`.`EstadoReserva` (`id_EstadoReserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;





-- -----------------------------------------------------
2 da insercion
-- -----------------------------------------------------





-- -----------------------------------------------------
-- Table `SABER_BD`.`Cuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Cuota` (
  `id_MesAnio_Cuota` DATETIME NOT NULL,
  `fechaVenc_Cuota` DATETIME NULL,
  PRIMARY KEY (`id_MesAnio_Cuota`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`DetalleCuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`DetalleCuota` (
  `id_DetalleCuota` INT NOT NULL,
  `id_Cuota` DATETIME NOT NULL,
  `estadoCuota_DetCuota` INT NOT NULL,
  `valorCuota` INT NOT NULL,
  `id_Socio` INT NOT NULL,
  PRIMARY KEY (`id_DetalleCuota`),
  INDEX `idSocio_DetCuota_idx` (`id_Socio` ASC) VISIBLE,
  INDEX `idCuota_DetCuota_idx` (`id_Cuota` ASC) VISIBLE,
  CONSTRAINT `idSocio_DetCuota`
    FOREIGN KEY (`id_Socio`)
    REFERENCES `SABER_BD`.`Socio` (`id_socio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCuota_DetCuota`
    FOREIGN KEY (`id_Cuota`)
    REFERENCES `SABER_BD`.`Cuota` (`id_MesAnio_Cuota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`CobroCuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`CobroCuota` (
  `idCobroCuota` INT NOT NULL AUTO_INCREMENT,
  `fecha_CobroCuota` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `idCuota` DATETIME NOT NULL,
  `CobroCuotacol` VARCHAR(45) NULL,
  `idSocio` INT NULL,
  PRIMARY KEY (`idCobroCuota`),
  INDEX `idCuota_Cuota_idx` (`idCuota` ASC) VISIBLE,
  INDEX `idSocio_Socio_idx` (`idSocio` ASC) VISIBLE,
  CONSTRAINT `idCuota_Cuota`
    FOREIGN KEY (`idCuota`)
    REFERENCES `SABER_BD`.`Cuota` (`id_MesAnio_Cuota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idSocio_Socio`
    FOREIGN KEY (`idSocio`)
    REFERENCES `SABER_BD`.`Socio` (`id_socio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`DetalleCobro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`DetalleCobro` (
  `id_DetalleCobro` INT NOT NULL AUTO_INCREMENT,
  `idCobroCuota` INT NOT NULL,
  `valorCuota` FLOAT NOT NULL,
  `estadoCobroCuota` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_DetalleCobro`),
  INDEX `IdCobroCuota_Cobro_idx` (`idCobroCuota` ASC) VISIBLE,
  CONSTRAINT `IdCobroCuota_Cobro`
    FOREIGN KEY (`idCobroCuota`)
    REFERENCES `SABER_BD`.`CobroCuota` (`idCobroCuota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SABER_BD`.`Cuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SABER_BD`.`Cuota` (
  `id_MesAnio_Cuota` DATETIME NOT NULL,
  `fechaVenc_Cuota` DATETIME NULL,
  PRIMARY KEY (`id_MesAnio_Cuota`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
