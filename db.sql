-- MySQL Script generated by MySQL Workbench
-- 03/24/16 16:35:27
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema chat_private
-- -----------------------------------------------------
-- Amine Rifi

-- -----------------------------------------------------
-- Schema chat_private
--
-- Amine Rifi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chat_private` DEFAULT CHARACTER SET utf8 ;
USE `chat_private` ;

-- -----------------------------------------------------
-- Table `chat_private`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`groups` (
  `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `chat_private`.`login_attempts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`login_attempts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15) NOT NULL,
  `login` VARCHAR(100) NOT NULL,
  `time` INT(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `chat_private`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(45) NOT NULL,
  `username` VARCHAR(100) NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `salt` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `activation_code` VARCHAR(40) NULL DEFAULT NULL,
  `forgotten_password_code` VARCHAR(40) NULL DEFAULT NULL,
  `forgotten_password_time` INT(11) UNSIGNED NULL DEFAULT NULL,
  `remember_code` VARCHAR(40) NULL DEFAULT NULL,
  `created_on` INT(11) UNSIGNED NOT NULL,
  `last_login` INT(11) UNSIGNED NULL DEFAULT NULL,
  `active` TINYINT(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` VARCHAR(50) NULL DEFAULT NULL,
  `last_name` VARCHAR(50) NULL DEFAULT NULL,
  `company` VARCHAR(100) NULL DEFAULT NULL,
  `phone` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `chat_private`.`users_groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`users_groups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `group_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uc_users_groups` (`user_id` ASC, `group_id` ASC),
  INDEX `fk_users_groups_users1_idx` (`user_id` ASC),
  INDEX `fk_users_groups_groups1_idx` (`group_id` ASC),
  CONSTRAINT `fk_users_groups_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `chat_private`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `chat_private`.`groups` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `chat_private`.`conversation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`conversation` (
  `c_id` INT NOT NULL AUTO_INCREMENT,
  `user_one` INT(11) UNSIGNED NOT NULL,
  `user_two` INT(11) UNSIGNED NOT NULL,
  `ip` VARCHAR(30) NULL,
  `time` INT(11) NULL,
  PRIMARY KEY (`c_id`),
  INDEX `fk_conversation_users1_idx` (`user_one` ASC),
  INDEX `fk_conversation_users2_idx` (`user_two` ASC),
  CONSTRAINT `fk_conversation_users1`
    FOREIGN KEY (`user_one`)
    REFERENCES `chat_private`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversation_users2`
    FOREIGN KEY (`user_two`)
    REFERENCES `chat_private`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chat_private`.`conversation_reply`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chat_private`.`conversation_reply` (
  `cr_id` INT NOT NULL AUTO_INCREMENT,
  `reply` TEXT NULL,
  `user_id_fk` INT(11) UNSIGNED NOT NULL,
  `ip` VARCHAR(30) NOT NULL,
  `time` INT(11) NULL,
  `c_id_fk` INT NOT NULL,
  `_read` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`cr_id`),
  INDEX `fk_conversation_reply_conversation1_idx` (`c_id_fk` ASC),
  INDEX `fk_conversation_reply_users1_idx` (`user_id_fk` ASC),
  CONSTRAINT `fk_conversation_reply_conversation1`
    FOREIGN KEY (`c_id_fk`)
    REFERENCES `chat_private`.`conversation` (`c_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversation_reply_users1`
    FOREIGN KEY (`user_id_fk`)
    REFERENCES `chat_private`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;