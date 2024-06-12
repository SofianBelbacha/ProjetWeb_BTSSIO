-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 juin 2024 à 20:49
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `belbachaboutiqueharware`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `_requeteConsultation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `_requeteConsultation` (IN `param_champ` VARCHAR(255), IN `param_table` VARCHAR(255), IN `param_condition` VARCHAR(1000))   BEGIN
    DECLARE sql_query VARCHAR(2000);

    -- Initialisation de la requête
    SET @sql_query = CONCAT('SELECT ', param_champ, ' FROM ', param_table);

    -- Ajout de la condition si elle est spécifiée
    IF param_condition IS NOT NULL AND param_condition != '' THEN
        SET @sql_query = CONCAT(@sql_query, ' WHERE ', param_condition);
    END IF;

    -- Exécution de la requête dynamique
    PREPARE stmt FROM @sql_query;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

--
-- Fonctions
--
DROP FUNCTION IF EXISTS `_GetQuantiteTotaleProduit`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `_GetQuantiteTotaleProduit` (`productId` INT) RETURNS INT  BEGIN
    DECLARE total INT;

    -- Sélectionner la quantité totale livrée du produit en utilisant la table livrer
    SELECT SUM(qteLivrer)AS qteTotal INTO total
    FROM livrer
    WHERE idProduit = productId;

    -- Si aucune quantité n'est trouvée, initialiser total à 0
    IF total IS NULL THEN
        SET total := 0;
    END IF;

    -- Retourner la quantité totale livrée
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`) VALUES
(1, 'Carte-mère'),
(2, 'Processeur'),
(3, 'mémoire vive RAM'),
(4, 'Disque dure'),
(5, 'Carte graphique'),
(6, 'Tour'),
(7, 'Alimentation');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rue` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `codePostal` int DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idUtilisateur`, `nom`, `prenom`, `rue`, `codePostal`, `ville`, `telephone`) VALUES
(1, 'Belbacha', 'Sofian', '5791 Mollis St.', 7740, 'San Rafael', '04 11 62 97 80'),
(2, 'Rhoda', 'Reese', 'Ap #677-898 Ut Street', 20913, 'Szczecin', '08 07 13 10 31'),
(11, 'Nouvel', 'Utilixatr', NULL, 34000, 'Béziers', '0154545454'),
(12, 'Nouvel', 'Utilixatr', 'rueutilisateut', 34000, 'Béziers', '0154545454'),
(13, 'Nouvel', 'Utilixatr', 'rueutilisateut', 34000, 'Béziers', '0154545454');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `idClient` int NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `idClient`) VALUES
(9, '2024-04-25', 9),
(8, '2024-04-24', 1),
(7, '2024-04-23', 7),
(6, '2024-04-22', 6),
(5, '2024-04-21', 5),
(4, '2024-04-20', 4),
(3, '2024-04-19', 3),
(2, '2024-04-18', 2),
(1, '2024-04-17', 1),
(10, '2024-04-17', 10),
(11, '2024-04-17', 10),
(12, '2024-04-17', 9);

--
-- Déclencheurs `commande`
--
DROP TRIGGER IF EXISTS `before_commande_delete`;
DELIMITER $$
CREATE TRIGGER `before_commande_delete` BEFORE DELETE ON `commande` FOR EACH ROW BEGIN
    DELETE FROM lignedecommande WHERE idCommande = OLD.idCommande;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idFournisseur` int NOT NULL,
  `nomSociete` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `codePostal` int DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `nomSociete`, `rue`, `codePostal`, `ville`, `telephone`, `email`) VALUES
(9, 'Diam Inc.', 'Ap #148-1883 Integer Road', 11443, 'Spaniard\'s Bay', '03 42 88 55 34', 'vulputate@hotmail.couk'),
(8, 'Magna A Ltd', 'P.O. Box 374, 5417 Adipiscing Av.', 79454, 'Sundrie', '07 18 49 72 52', 'neque@google.org'),
(7, 'Odio Foundation', 'P.O. Box 351, 3103 Elit Street', 66672, 'Bridgwater', '02 10 24 57 68', 'lobortis@google.net'),
(6, 'Amet Risus Donec Institute', 'Ap #973-9927 Curabitur Road', 55334, 'Guarulhos', '03 25 12 92 27', 'et@outlook.couk'),
(5, 'Semper Cursus Corporation', 'P.O. Box 599, 6177 Etiam Avenue', 85827, 'Söderhamn', '04 81 67 26 44', 'litora.torquent@yahoo.edu'),
(4, 'Ac LLP', '4464 Ligula. Street', 23188, 'Görlitz', '05 16 86 57 61', 'quam.a@yahoo.ca'),
(3, 'Nibh Phasellus Institute', 'Ap #402-365 Quam Av.', 71361, 'Borlänge', '02 01 10 27 63', 'pede.et.risus@yahoo.ca'),
(2, 'Quis Pede Corp.', '842-176 Nam Ave', 4622, 'Yurimaguas', '05 28 95 85 44', 'ut.dolor.dapibus@yahoo.net'),
(1, 'Posuere Corp.', '1177 Molestie St.', 43244, 'Tacurong', '06 48 11 32 82', 'volutpat@icloud.net'),
(10, 'Libero Mauris Industries', 'Ap #863-2173 At Street', 22066, 'Dipolog', '03 53 56 25 40', 'aenean@outlook.couk'),
(11, 'Dictum Augue Company', '6459 In Road', 1928, 'Biên Hòa', '02 84 33 16 79', 'eget.venenatis@aol.com');

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `idProduit` int NOT NULL,
  `idCommande` int NOT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`idProduit`,`idCommande`),
  KEY `idCommande` (`idCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `lignedecommande`
--

INSERT INTO `lignedecommande` (`idProduit`, `idCommande`, `quantite`) VALUES
(8, 8, 1),
(7, 7, 1),
(6, 6, 1),
(5, 5, 1),
(4, 4, 1),
(3, 3, 1),
(2, 2, 1),
(1, 1, 1),
(11, 11, 2),
(9, 10, 2),
(10, 12, 8);

-- --------------------------------------------------------

--
-- Structure de la table `livrer`
--

DROP TABLE IF EXISTS `livrer`;
CREATE TABLE IF NOT EXISTS `livrer` (
  `idProduit` int NOT NULL,
  `idFournisseur` int NOT NULL,
  `dateLivraison` datetime NOT NULL,
  `qteLivrer` int DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProduit`,`idFournisseur`,`dateLivraison`),
  KEY `idFournisseur` (`idFournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livrer`
--

INSERT INTO `livrer` (`idProduit`, `idFournisseur`, `dateLivraison`, `qteLivrer`, `prix`) VALUES
(1, 1, '2024-04-18 08:00:00', 108, '78.25'),
(1, 2, '2024-04-18 09:00:00', 200, '80.00'),
(3, 3, '2024-04-18 10:00:00', 201, '105.00'),
(4, 4, '2024-04-18 11:00:00', 120, '60.00'),
(5, 5, '2024-04-18 12:00:00', 80, '40.00'),
(6, 6, '2024-04-18 13:00:00', 90, '45.00'),
(7, 7, '2024-04-18 14:00:00', 110, '55.00'),
(8, 8, '2024-04-18 15:00:00', 130, '65.00'),
(9, 9, '2024-04-18 16:00:00', 140, '70.00'),
(10, 10, '2024-04-18 17:00:00', 160, '80.00'),
(8, 7, '2024-04-19 11:49:41', 787, '112.36');

-- --------------------------------------------------------

--
-- Structure de la table `prixproduit`
--

DROP TABLE IF EXISTS `prixproduit`;
CREATE TABLE IF NOT EXISTS `prixproduit` (
  `idProduit` int NOT NULL,
  `JJMMAAAA` datetime NOT NULL,
  `prix` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProduit`,`JJMMAAAA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prixproduit`
--

INSERT INTO `prixproduit` (`idProduit`, `JJMMAAAA`, `prix`) VALUES
(1, '2024-04-17 15:49:57', '450'),
(2, '2024-04-17 15:50:20', '225.23'),
(3, '0000-00-00 00:00:00', '18.00'),
(4, '2024-04-15 00:00:00', '9.00'),
(5, '2024-04-15 00:00:00', '13.00'),
(6, '2024-04-15 00:00:00', '18.00'),
(7, '2024-04-15 00:00:00', '10.00'),
(8, '2024-04-15 00:00:00', '25.00'),
(9, '2024-04-15 00:00:00', '30.00'),
(10, '2024-04-15 00:00:00', '15.00'),
(11, '2024-04-15 00:00:00', '23.00'),
(12, '2024-04-15 00:00:00', '17.00'),
(1, '2024-04-27 13:58:10', '2000.45');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `idCategorie` int NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `description`, `image`, `couleur`, `idCategorie`) VALUES
(1, 'Asus GeForce RTX 2080 Ti STRIX', 'grâce à la rtx 2080 ti découvrez la réalité virtuel s', 'carteAsus.jpg', 'Noire', 5),
(2, 'AeroCool Boitier Moyen Tour ATX ', 'le boîtier moyen tour aerocool bolt offre un envir', 'Tour.jpg', 'Noire', 6),
(3, 'Asus TUF Gaming B450M-PLUS II - ', 'la carte mère asus tuf gaming b450-plus ii est idée', 'carteMere.jpg', 'Noire', 1),
(4, 'AMD Ryzen 5 5600X Wraith Stealth (3.7 GHz / 4.6 GHz)', 'Le processeur AMD Ryzen 5 5600X est taillé pour le', 'Processeur.jpg', 'Blanc', 2),
(5, 'Corsair Vengeance RGB PRO -', 'Les mémoires PC haut de gamme Vengeance RGB PRO Se', 'ram.jpg', 'noire', 3),
(6, 'Tacens 2FERROX Boîtier PC ATX Moyen-Tour', ' Le FERROX offre un vaste espace interne, supporta', 'Tacens 2FERROX.jpg', 'Noire', 6),
(7, 'Boîtier ATX Semi-Tour PC Case MPC-45 Noir', ' Châssis compact conçu pour répondre aux besoins d', 'Boîtier ATX Semi-Tour PC Case MPC-45 Noir.jpg', 'Noire', 6),
(8, 'Boitier PC Moyen Tour Zalman T8 ', '  Le T8 de Zalman mise sur un look discret avec un', 'Boitier-PC-Moyen-Tour-Zalman T8.jpg', 'Noire', 6),
(9, 'ROG STRIX B550-F GAMING –', 'ROG STRIX B550-A GAMING - Carte mère gaming AMD B5', 'ROG STRIX B550-F GAMING –.jpg', 'Rouge', 1),
(10, 'MSI MAG B650 Tomahawk WiFi Carte mère, ATX - ', ' La carte mère MAG B650 TOMAHAWK WIFI est un modèl', '81iGt-IPEEL._AC_SX425_.jpg', 'Orange', 1),
(11, 'MSI MPG B550 Gaming Plus Carte Mère ATX - ', ' La MPG B550 GAMING PLUS est une carte mère ATX or', 'MSI MPG B550 Gaming Plus Carte Mère ATX.jpg', 'Orange', 1),
(12, 'Intel® Core™ i5-12400F, processeur pour PC', 'Processeur de bureau Intel Core i5-12400F de 12e g', 'intel_proc.jpg', 'Bleue', 2);

--
-- Déclencheurs `produit`
--
DROP TRIGGER IF EXISTS `before_produit_delete`;
DELIMITER $$
CREATE TRIGGER `before_produit_delete` BEFORE DELETE ON `produit` FOR EACH ROW BEGIN
    -- Supprimer les lignes de la table livrer liées au produit
    DELETE FROM livrer WHERE idProduit = OLD.idProduit;

    -- Supprimer les lignes de la table lignedecommande liées au produit
    DELETE FROM lignedecommande WHERE idProduit = OLD.idProduit;

    -- Supprimer les lignes de la table PrixProduit liées au produit
    DELETE FROM PrixProduit WHERE idProduit = OLD.idProduit;

    -- Supprimer les lignes de la table Produit_Specification liées au produit
    DELETE FROM Produit_Specification WHERE idProduit = OLD.idProduit;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `produit_specification`
--

DROP TABLE IF EXISTS `produit_specification`;
CREATE TABLE IF NOT EXISTS `produit_specification` (
  `idProduit` int NOT NULL,
  `idSpecification` int NOT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProduit`,`idSpecification`),
  KEY `idSpecification` (`idSpecification`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `specification`
--

DROP TABLE IF EXISTS `specification`;
CREATE TABLE IF NOT EXISTS `specification` (
  `idSpecification` int NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSpecification`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passe` varchar(50) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `email`, `passe`, `isAdmin`) VALUES
(1, 'SofianBelbacha4', 'sofianbelbacha@gmail.com', '2fadffa8df37fccb021c46fe1c055264b5e631fd', 1),
(2, 'nonAdmin', 'nonadmin@gmail.com', '2fadffa8df37fccb021c46fe1c055264b5e631fd', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
