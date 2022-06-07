-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema quadrado
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema quadrado
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quadrado` DEFAULT CHARACTER SET utf8 ;
USE `quadrado` ;

-- -----------------------------------------------------
-- Table `quadrado`.`tabuleiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quadrado`.`tabuleiro` (
  `idtabuleiro` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL,
  PRIMARY KEY (`idtabuleiro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quadrado`.`quadrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quadrado`.`quadrado` (
  `idquadrado` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL,
  `cor` VARCHAR(45) NULL,
  `tabuleiro_idtabuleiro` INT NOT NULL,
  PRIMARY KEY (`idquadrado`),
  INDEX `fk_quadrado_tabuleiro_idx` (`tabuleiro_idtabuleiro` ASC) VISIBLE,
  CONSTRAINT `fk_quadrado_tabuleiro`
    FOREIGN KEY (`tabuleiro_idtabuleiro`)
    REFERENCES `quadrado`.`tabuleiro` (`idtabuleiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quadrado`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quadrado`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
