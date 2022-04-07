-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`equipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(20) NULL,
  `imagen` VARCHAR(60) NULL,
  `ip` VARCHAR(15) NULL,
  `sistemaOperativo` VARCHAR(15) NULL,
  `serial` VARCHAR(30) NULL,
  `ofimatica` VARCHAR(15) NULL,
  `activo` VARCHAR(8) NULL,
  `marca` VARCHAR(20) NULL,
  `modelo` VARCHAR(15) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`activos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`activos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `inventario` VARCHAR(10) NULL DEFAULT NULL,
  `observaciones` LONGTEXT NULL DEFAULT NULL,
  `equipos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `equipos_id`),
  INDEX `fk_activo_equipos1_idx` (`equipos_id` ASC),
  CONSTRAINT `fk_activo_equipos1`
    FOREIGN KEY (`equipos_id`)
    REFERENCES `inventario`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 82
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`responsables`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`responsables` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NULL,
  `cargo` VARCHAR(45) NULL,
  `equipos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_responsables_equipos1_idx` (`equipos_id` ASC),
  CONSTRAINT `fk_responsables_equipos1`
    FOREIGN KEY (`equipos_id`)
    REFERENCES `inventario`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`ubicacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `centro` VARCHAR(5) NULL DEFAULT NULL,
  `area` VARCHAR(20) NULL DEFAULT NULL,
  `departamento` VARCHAR(30) NULL DEFAULT NULL,
  `extencion` VARCHAR(4) NULL,
  `activos_id` INT NOT NULL,
  `responsables_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ubicacion_activos_idx` (`activos_id` ASC),
  INDEX `fk_ubicacion_responsables1_idx` (`responsables_id` ASC),
  CONSTRAINT `fk_ubicacion_activos`
    FOREIGN KEY (`activos_id`)
    REFERENCES `inventario`.`activos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ubicacion_responsables1`
    FOREIGN KEY (`responsables_id`)
    REFERENCES `inventario`.`responsables` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(20) NULL DEFAULT NULL,
  `apellido` VARCHAR(20) NULL DEFAULT NULL,
  `cargo` VARCHAR(30) NULL DEFAULT NULL,
  `regional` VARCHAR(20) NULL DEFAULT NULL,
  `idUsuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`table1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`table1` (
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
