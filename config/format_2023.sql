-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mars 2023 à 07:13
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `format_2023`
--

-- --------------------------------------------------------

--
-- Structure de la table `ancheres`
--

DROP TABLE IF EXISTS `ancheres`;
CREATE TABLE IF NOT EXISTS `ancheres` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref` char(50) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `datEdite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_fin` int(11) NOT NULL,
  `statut` char(20) NOT NULL DEFAULT 'EN COURS',
  `dateMaj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table des CONTACTS';

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref` char(50) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `categorie` char(50) NOT NULL,
  `datEdite` int(11) NOT NULL,
  `prix_depart` int(11) NOT NULL,
  `prix_final` int(11) NOT NULL,
  `date_fin` int(11) NOT NULL,
  `modele` char(50) NOT NULL,
  `marque` char(50) NOT NULL,
  `puissance` int(11) NOT NULL,
  `annee` int(4) NOT NULL DEFAULT '2023',
  `message` text,
  `statut` char(20) NOT NULL DEFAULT 'EN COURS',
  `dateMaj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table des CONTACTS';

-- --------------------------------------------------------

--
-- Structure de la table `cadeaux`
--

DROP TABLE IF EXISTS `cadeaux`;
CREATE TABLE IF NOT EXISTS `cadeaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` char(16) NOT NULL,
  `datEdite` int(11) NOT NULL,
  `prix` int(11) NOT NULL DEFAULT '10',
  `dateFin` int(11) NOT NULL,
  `nomUser` char(30) NOT NULL,
  `prenomUser` char(50) NOT NULL,
  `nomAgent` char(30) NOT NULL,
  `prenomAgent` char(50) NOT NULL,
  `dateMaj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='Table des bons des cadeaux';

--
-- Déchargement des données de la table `cadeaux`
--

INSERT INTO `cadeaux` (`id`, `ref`, `datEdite`, `prix`, `dateFin`, `nomUser`, `prenomUser`, `nomAgent`, `prenomAgent`, `dateMaj`) VALUES
(1, '03-2023-41', 1678719660, 1000, 1710342060, 'UN NOM', 'Prienoeo', 'AUTRE NOM', 'Prenomhdo', 1678719680);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(30) NOT NULL,
  `prenom` char(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` char(12) NOT NULL,
  `messagee` text,
  `datEdite` int(11) NOT NULL,
  `statut` char(20) NOT NULL DEFAULT 'EN COURS',
  `dateMaj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Table des CONTACTS';

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `telephone`, `messagee`, `datEdite`, `statut`, `dateMaj`) VALUES
(1, 'ABOUDOU', 'Assoumeni', 'ahoudoie@gmail.com', '102030405', 'Encore un message', 1678808672, 'EN COURS', 1678808672),
(2, 'LUDO', 'Vic', 'ludovic@gmail.com', '1020304', 'Je dois comprendre les message', 1678808778, 'EN COURS', 1678808778);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(30) NOT NULL,
  `nom` char(30) NOT NULL,
  `prenom` char(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` char(12) NOT NULL,
  `password` varchar(200) NOT NULL,
  `details` text,
  `datEdite` int(11) NOT NULL,
  `statut` char(20) NOT NULL DEFAULT 'EN COURS',
  `dateMaj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table des CONTACTS';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
