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
-- Table `Project-Sierra`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`group` (
  `group_id` INT NOT NULL AUTO_INCREMENT,
  `group_name` VARCHAR(45) NULL,
  PRIMARY KEY (`group_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `last_name` VARCHAR(45) NULL,
  `first_name` VARCHAR(60) NULL,
  `password` VARCHAR(60) NULL,
  `email` VARCHAR(55) NULL,
  `is_admin` TINYINT(1) NULL,
  `fk_group_id` INT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_group_id_idx` (`fk_group_id` ASC),
  CONSTRAINT `fk_group_id`
    FOREIGN KEY (`fk_group_id`)
    REFERENCES `Project-Sierra`.`group` (`group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`message` (
  `message_id` INT NOT NULL AUTO_INCREMENT,
  `message_text` VARCHAR(250) NOT NULL,
  `fk_user_id_from` INT NULL,
  `fk_user_id_to` INT NULL,
  `fk_group_to` INT NULL,
  PRIMARY KEY (`message_id`),
  INDEX `fk_user_id_from_idx` (`fk_user_id_from` ASC),
  INDEX `fk_user_id_to_idx` (`fk_user_id_to` ASC),
  INDEX `fk_group_id_to_idx` (`fk_group_to` ASC),
  CONSTRAINT `fk_user_id_from`
    FOREIGN KEY (`fk_user_id_from`)
    REFERENCES `Project-Sierra`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_id_to`
    FOREIGN KEY (`fk_user_id_to`)
    REFERENCES `Project-Sierra`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_id_to`
    FOREIGN KEY (`fk_group_to`)
    REFERENCES `Project-Sierra`.`group` (`group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`modul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`modul` (
  `modul_id` INT NOT NULL AUTO_INCREMENT,
  `modul_name` VARCHAR(45) NULL,
  `modul_number` VARCHAR(4) NULL,
  PRIMARY KEY (`modul_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Project-Sierra`.`user_modul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Project-Sierra`.`user_modul` (
  `lb` DOUBLE NULL,
  `zp1` DOUBLE NULL,
  `zp2` DOUBLE NULL,
  `mj` DOUBLE NULL,
  `percentage_lb` INT NULL,
  `percentage_zp1` INT NULL,
  `percentage_zp2` INT NULL,
  `percentage_mj` INT NULL,
  `fk_user_id` INT NULL,
  `fk_modul_id` INT NULL,
  INDEX `fk_user_id_idx` (`fk_user_id` ASC),
  INDEX `fk_modul_id_idx` (`fk_modul_id` ASC),
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`fk_user_id`)
    REFERENCES `Project-Sierra`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modul_id`
    FOREIGN KEY (`fk_modul_id`)
    REFERENCES `Project-Sierra`.`modul` (`modul_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
