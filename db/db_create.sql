-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema buzz
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema buzz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `buzz` DEFAULT CHARACTER SET utf8 ;
USE `buzz` ;

-- -----------------------------------------------------
-- Table `buzz`.`authors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buzz`.`authors` ;

CREATE TABLE IF NOT EXISTS `buzz`.`authors` (
  `idauthors` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`idauthors`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buzz`.`posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buzz`.`posts` ;

CREATE TABLE IF NOT EXISTS `buzz`.`posts` (
  `idposts` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `slug` VARCHAR(100) NULL,
  `body` TEXT NULL,
  `image` VARCHAR(100) NULL,
  `published` TINYINT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `authors_idauthors` INT NOT NULL,
  PRIMARY KEY (`idposts`, `authors_idauthors`),
  CONSTRAINT `fk_posts_authors1`
    FOREIGN KEY (`authors_idauthors`)
    REFERENCES `buzz`.`authors` (`idauthors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_posts_authors1_idx` ON `buzz`.`posts` (`authors_idauthors` ASC);


-- -----------------------------------------------------
-- Table `buzz`.`tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buzz`.`tags` ;

CREATE TABLE IF NOT EXISTS `buzz`.`tags` (
  `idtags` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`idtags`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buzz`.`posts_tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buzz`.`posts_tags` ;

CREATE TABLE IF NOT EXISTS `buzz`.`posts_tags` (
  `posts_idposts` INT NOT NULL,
  `tags_idtags` INT NOT NULL,
  PRIMARY KEY (`posts_idposts`, `tags_idtags`),
  CONSTRAINT `fk_posts_has_tags_posts`
    FOREIGN KEY (`posts_idposts`)
    REFERENCES `buzz`.`posts` (`idposts`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_has_tags_tags1`
    FOREIGN KEY (`tags_idtags`)
    REFERENCES `buzz`.`tags` (`idtags`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_posts_has_tags_tags1_idx` ON `buzz`.`posts_tags` (`tags_idtags` ASC);

CREATE INDEX `fk_posts_has_tags_posts_idx` ON `buzz`.`posts_tags` (`posts_idposts` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
