--           BDD format_2023         --
-- STRUCTURE DE LA TABLE DES CADEAUX --

CREATE TABLE IF NOT EXISTS `cadeaux` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `ref` CHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `datEdite` INT NOT NULL ,
    `prix` INT NOT NULL DEFAULT '10' ,
    `dateFin` INT NOT NULL ,
    `nomUser` CHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `prenomUser` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `nomAgent` CHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `prenomAgent` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `dateMaj` INT NOT NULL ,
    PRIMARY KEY (`id`), INDEX (`id`), UNIQUE (`id`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci COMMENT = 'Table des bons des cadeaux';


--           BDD format_2023          --
-- STRUCTURE DE LA TABLE DES CONTACTS --

CREATE TABLE IF NOT EXISTS `contacts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `nom` CHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `prenom` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `email` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `telephone` CHAR(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `message` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ,
    `datEdite` INT NOT NULL ,
    `statut` CHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'EN COURS',
    `dateMaj` INT NOT NULL ,
    PRIMARY KEY (`id`), INDEX (`id`), UNIQUE (`id`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci COMMENT = 'Table des CONTACTS';


--           BDD format_2023          --
-- STRUCTURE DE LA TABLE DES UTILISATEURS --

CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `login` CHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `nom` CHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `prenom` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `email` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `telephone` CHAR(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `password` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `details` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ,
    `datEdite` INT NOT NULL ,
    `statut` CHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'EN COURS',
    `dateMaj` INT NOT NULL ,
    PRIMARY KEY (`id`), INDEX (`id`), UNIQUE (`id`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci COMMENT = 'Table des UTILISATEURS';


--           BDD format_2023          --
-- STRUCTURE DE LA TABLE DES ANNONCES --

CREATE TABLE IF NOT EXISTS `annonces` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `ref` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `userID` INT(11) UNSIGNED NOT NULL ,
    `categorie` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `datEdite` INT(11) NOT NULL ,
    `prix_depart` INT(11) NOT NULL ,
    `prix_final` INT(11) NOT NULL ,
    `date_fin` INT(11) NOT NULL ,
    `modele` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `marque` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `puissance` INT(11) NOT NULL ,
    `annee` INT(4) NOT NULL DEFAULT '2023',
    `message` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ,
    `statut` CHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'EN COURS',
    `dateMaj` INT NOT NULL ,
    PRIMARY KEY (`id`), INDEX (`id`), UNIQUE (`id`),
    FOREIGN KEY (userID) REFERENCES utilisateurs(id)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci COMMENT = 'Table des ANNONCES';


--           BDD format_2023          --
-- STRUCTURE DE LA TABLE DES ENCHERES --

CREATE TABLE IF NOT EXISTS `ancheres` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `ref` CHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `userID` INT(11) UNSIGNED NOT NULL ,
    `datEdite` INT(11) NOT NULL ,
    `prix` INT(11) NOT NULL ,
    `date_fin` INT(11) NOT NULL ,
    `statut` CHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'EN COURS',
    `dateMaj` INT NOT NULL ,
    PRIMARY KEY (`id`), INDEX (`id`), UNIQUE (`id`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci COMMENT = 'Table des ENCHERES';


