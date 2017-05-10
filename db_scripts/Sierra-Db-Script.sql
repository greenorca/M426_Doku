SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Project-Sierra
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Project-Sierra` ;
CREATE SCHEMA IF NOT EXISTS `Project-Sierra` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Project-Sierra` ;

-- -----------------------------------------------------
-- Table `Project-Sierra`.`Groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`Groups` (
  `idGroups` INT NOT NULL AUTO_INCREMENT,
  `Groupname` VARCHAR(45) NULL,
  PRIMARY KEY (`idGroups`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `firstname` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `fk_id_group` INT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `fk_id_group_idx` (`fk_id_group` ASC),
  CONSTRAINT `fk_id_group`
    FOREIGN KEY (`fk_id_group`)
    REFERENCES `Project-Sierra`.`Groups` (`idGroups`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`Messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`Messages` (
  `idMessages` INT NOT NULL AUTO_INCREMENT,
  `message_text` VARCHAR(250) NOT NULL,
  `fk_id_user_from` INT NULL,
  `fk_id_user_to` INT NULL,
  `fk_group_to` INT NULL,
  PRIMARY KEY (`idMessages`),
  INDEX `fk_id_user_from_idx` (`fk_id_user_from` ASC),
  INDEX `fk_id_user_to_idx` (`fk_id_user_to` ASC),
  INDEX `fk_id_group_to_idx` (`fk_group_to` ASC),
  CONSTRAINT `fk_id_user_from`
    FOREIGN KEY (`fk_id_user_from`)
    REFERENCES `Project-Sierra`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_user_to`
    FOREIGN KEY (`fk_id_user_to`)
    REFERENCES `Project-Sierra`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_group_to`
    FOREIGN KEY (`fk_group_to`)
    REFERENCES `Project-Sierra`.`Groups` (`idGroups`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`Modul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`Modul` (
  `idModul` INT NOT NULL AUTO_INCREMENT,
  `modulname` VARCHAR(45) NULL,
  `modulnummer` VARCHAR(4) NULL,
  PRIMARY KEY (`idModul`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`User_Modul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`User_Modul` (
  `lb` DOUBLE NULL,
  `zp1` DOUBLE NULL,
  `zp2` DOUBLE NULL,
  `mj` DOUBLE NULL,
  `percentage_lb` INT NULL CHECK (percentage_lb > 1 AND percentage_lb <100),
  `percentage_zp1` INT NULL CHECK (percentage_zp1 > 1 AND percentage_zp1 <100),
  `percentage_zp2` INT NULL CHECK (percentage_zp2 > 1 AND percentage_zp2 <100),
  `percentage_mj` INT NULL CHECK (percentage_mj > 1 AND percentage_mj <100),
  `fk_id_user` INT NULL,
  `fk_id_modul` INT NULL,
 
  INDEX `fk_id_user_idx` (`fk_id_user` ASC),
  INDEX `fk_id_modul_idx` (`fk_id_modul` ASC),
  CONSTRAINT `fk_id_user`
    FOREIGN KEY (`fk_id_user`)
    REFERENCES `Project-Sierra`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_modul`
    FOREIGN KEY (`fk_id_modul`)
    REFERENCES `Project-Sierra`.`Modul` (`idModul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
