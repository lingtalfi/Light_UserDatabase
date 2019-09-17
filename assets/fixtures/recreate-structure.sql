-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `lud_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lud_user` ;

CREATE TABLE IF NOT EXISTS `lud_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `identifier` VARCHAR(128) NOT NULL,
  `pseudo` VARCHAR(64) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `avatar_url` VARCHAR(512) NOT NULL,
  `extra` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lud_permission_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lud_permission_group` ;

CREATE TABLE IF NOT EXISTS `lud_permission_group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lud_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lud_permission` ;

CREATE TABLE IF NOT EXISTS `lud_permission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lud_user_has_permission_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lud_user_has_permission_group` ;

CREATE TABLE IF NOT EXISTS `lud_user_has_permission_group` (
  `user_id` INT NOT NULL,
  `permission_group_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `permission_group_id`),
  INDEX `fk_lud_user_has_lud_permission_group_lud_permission_group1_idx` (`permission_group_id` ASC),
  INDEX `fk_lud_user_has_lud_permission_group_lud_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_lud_user_has_lud_permission_group_lud_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `lud_user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lud_user_has_lud_permission_group_lud_permission_group1`
    FOREIGN KEY (`permission_group_id`)
    REFERENCES `lud_permission_group` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lud_permission_group_has_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lud_permission_group_has_permission` ;

CREATE TABLE IF NOT EXISTS `lud_permission_group_has_permission` (
  `permission_group_id` INT NOT NULL,
  `permission_id` INT NOT NULL,
  PRIMARY KEY (`permission_group_id`, `permission_id`),
  INDEX `fk_lud_permission_group_has_lud_permission_lud_permission1_idx` (`permission_id` ASC),
  INDEX `fk_lud_permission_group_has_lud_permission_lud_permission_g_idx` (`permission_group_id` ASC),
  CONSTRAINT `fk_lud_permission_group_has_lud_permission_lud_permission_gro1`
    FOREIGN KEY (`permission_group_id`)
    REFERENCES `lud_permission_group` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lud_permission_group_has_lud_permission_lud_permission1`
    FOREIGN KEY (`permission_id`)
    REFERENCES `lud_permission` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- inserts
-- -----------------------------------------------------
INSERT INTO `lud_permission` (`id`, `name`) VALUES
(1, '*');

INSERT INTO `lud_permission_group` (`id`, `name`) VALUES
(1, 'root');

INSERT INTO `lud_permission_group_has_permission` (`permission_group_id`, `permission_id`) VALUES
(1, 1);

INSERT INTO `lud_user` (`id`, `identifier`, `pseudo`, `password`, `avatar_url`, `extra`) VALUES
(1, 'root', 'root', '$2y$10$0.aAsAzNOFhLjOqnzGddsuc3qnl6aHeLbupLJQj/fAzV1fSHeLpnO', '', '');

INSERT INTO `lud_user_has_permission_group` (`user_id`, `permission_group_id`) VALUES
(1, 1);



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
