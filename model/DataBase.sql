-- MySQL Workbench Synchronization
-- Generated: 2020-03-06 09:35
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Xavier.CARREL

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `snows` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

CREATE TABLE IF NOT EXISTS `snows`.`rents` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  `start_on` DATE NOT NULL,
  `user_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbllocation_tblClient1` (`user_id` ASC) VISIBLE,
  CONSTRAINT `FK_rents_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `snows`.`users` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 34
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `snows`.`rentsdetails` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `snow_id` INT(10) NOT NULL,
  `rent_id` INT(11) NOT NULL,
  `nbDays` INT(11) NULL DEFAULT NULL,
  `status` VARCHAR(20) NULL DEFAULT 'sorti',
  PRIMARY KEY (`id`),
  INDEX `fk_tblLocationSurf_tblsurf` (`snow_id` ASC) VISIBLE,
  INDEX `fk_tblLocationSurf_tbllocation1` (`rent_id` ASC) VISIBLE,
  CONSTRAINT `FK_rentsdetails_rents`
    FOREIGN KEY (`rent_id`)
    REFERENCES `snows`.`rents` (`id`),
  CONSTRAINT `FK_rentsdetails_snows`
    FOREIGN KEY (`snow_id`)
    REFERENCES `snows`.`snows` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `snows`.`snows` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(4) NOT NULL,
  `length` INT(4) UNSIGNED NOT NULL,
  `state` TINYINT(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 = new\n1 = good\n2 = old\n4 = dead\n',
  `snowtype_id` INT(11) NOT NULL,
  `available` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `snow_code` (`code` ASC) VISIBLE,
  INDEX `fk_snows_snowtypes1_idx` (`snowtype_id` ASC) VISIBLE,
  CONSTRAINT `fk_snows_snowtypes1`
    FOREIGN KEY (`snowtype_id`)
    REFERENCES `snows`.`snowtypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `snows`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `type` INT(1) NOT NULL DEFAULT '1',
  `firstname` VARCHAR(45) NULL DEFAULT NULL,
  `lastname` VARCHAR(45) NULL DEFAULT NULL,
  `phonenumber` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `userEmailAddress` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `snows`.`snowtypes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(45) NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  `description` VARCHAR(2000) NULL DEFAULT NULL,
  `photo` VARCHAR(45) NULL DEFAULT NULL,
  `pricenew` INT(11) NULL DEFAULT NULL,
  `pricegood` INT(11) NULL DEFAULT NULL,
  `priceold` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `snows`.`news` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL DEFAULT current_timestamp,
  `title` VARCHAR(45) NOT NULL,
  `text` VARCHAR(5000) NOT NULL,
  `user_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_news_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `snows`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
