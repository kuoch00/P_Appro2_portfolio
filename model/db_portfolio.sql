-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 04 avr. 2022 à 06:09
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_portfolio`
--
CREATE DATABASE IF NOT EXISTS `db_portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE IF NOT EXISTS `t_article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `artName` varchar(50) NOT NULL,
  `artPrice` int(11) NOT NULL,
  `artDescription` varchar(5000) NOT NULL,
  `artStock` int(11) NOT NULL,
  `artImage` varchar(100) NOT NULL,
  PRIMARY KEY (`idArticle`),
  UNIQUE KEY `ID_t_article_IND` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_article`
--

INSERT INTO `t_article` (`idArticle`, `artName`, `artPrice`, `artDescription`, `artStock`, `artImage`) VALUES
(1, 't_shirt', 15, 'un t-shirt doux et confortable', 15, 'tshirt.jpg'),
(2, 't-shirt noir', 15, 'un t-shirt doux et soyeux. il vous réconfortera grâce à ses propriétés calmantes et rafraîchissantes.', 100, 'tshirtnoir.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE IF NOT EXISTS `t_category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(20) NOT NULL,
  `catImage` varchar(50) NOT NULL,
  `catCard` varchar(50) DEFAULT NULL,
  `catDescription` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`idCategory`),
  UNIQUE KEY `ID_t_category_IND` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`, `catImage`, `catCard`, `catDescription`) VALUES
(1, 'school work', '', '', NULL),
(2, 'Son of Wrath', '3.png', '', NULL),
(3, 'truc', '2.png', NULL, 'tetà');

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

CREATE TABLE IF NOT EXISTS `t_client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `cliPassword` varchar(60) NOT NULL,
  `cliFirstName` varchar(32) NOT NULL,
  `cliLastName` varchar(36) NOT NULL,
  `cliAddress` varchar(32) NOT NULL,
  `cliPostalCode` varchar(10) NOT NULL,
  `cliCity` varchar(32) NOT NULL,
  `cliState` varchar(32) NOT NULL,
  `cliCountry` varchar(20) NOT NULL,
  `cliPhoneNumber` varchar(20) NOT NULL,
  `cliEmailAddress` varchar(254) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `ID_t_client_IND` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_image`
--

CREATE TABLE IF NOT EXISTS `t_image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) NOT NULL,
  `idSubCategory` int(11) NOT NULL,
  `imaFilename` varchar(100) NOT NULL,
  PRIMARY KEY (`idImage`),
  UNIQUE KEY `ID_t_image_IND` (`idImage`),
  KEY `FKt_has_IND` (`idCategory`),
  KEY `FKt_contains_IND` (`idSubCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_image`
--

INSERT INTO `t_image` (`idImage`, `idCategory`, `idSubCategory`, `imaFilename`) VALUES
(1, 2, 2, 'treasuremap.jpg'),
(2, 1, 5, 'holy.png'),
(3, 2, 2, 'maud.png'),
(4, 3, 3, 'boat.png'),
(5, 1, 2, 'charactermodelsheet.png'),
(6, 1, 2, 'file.png');

-- --------------------------------------------------------

--
-- Structure de la table `t_include`
--

CREATE TABLE IF NOT EXISTS `t_include` (
  `idArticle` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `incQuantity` char(2) NOT NULL,
  PRIMARY KEY (`idArticle`,`idOrder`),
  UNIQUE KEY `ID_t_include_IND` (`idArticle`,`idOrder`),
  KEY `FKt_i_t_o_IND` (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_order`
--

CREATE TABLE IF NOT EXISTS `t_order` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `ordNumber` varchar(20) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idOrder`),
  UNIQUE KEY `ID_t_order_IND` (`idOrder`),
  KEY `FKt_orders_IND` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_subcategory`
--

CREATE TABLE IF NOT EXISTS `t_subcategory` (
  `idSubCategory` int(11) NOT NULL AUTO_INCREMENT,
  `subName` varchar(20) NOT NULL,
  PRIMARY KEY (`idSubCategory`),
  UNIQUE KEY `ID_t_subcategory_IND` (`idSubCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_subcategory`
--

INSERT INTO `t_subcategory` (`idSubCategory`, `subName`) VALUES
(1, 'Illustration'),
(2, 'Character Design'),
(3, 'Environment Design'),
(4, 'Layout'),
(5, 'Traditional Drawing');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_image`
--
ALTER TABLE `t_image`
  ADD CONSTRAINT `FKt_contains_FK` FOREIGN KEY (`idSubCategory`) REFERENCES `t_subcategory` (`idSubCategory`),
  ADD CONSTRAINT `FKt_has_FK` FOREIGN KEY (`idCategory`) REFERENCES `t_category` (`idCategory`);

--
-- Contraintes pour la table `t_include`
--
ALTER TABLE `t_include`
  ADD CONSTRAINT `FKt_i_t_a` FOREIGN KEY (`idArticle`) REFERENCES `t_article` (`idArticle`),
  ADD CONSTRAINT `FKt_i_t_o_FK` FOREIGN KEY (`idOrder`) REFERENCES `t_order` (`idOrder`);

--
-- Contraintes pour la table `t_order`
--
ALTER TABLE `t_order`
  ADD CONSTRAINT `FKt_orders_FK` FOREIGN KEY (`idClient`) REFERENCES `t_client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
