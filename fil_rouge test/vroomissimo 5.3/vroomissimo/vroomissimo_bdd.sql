-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 oct. 2022 à 15:13
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vroomissimo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `num_annonce` int(100) NOT NULL,
  `idvendeur` int(11) NOT NULL,
  `vendeur` varchar(100) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `km` int(100) NOT NULL,
  `annee_circul` varchar(100) NOT NULL,
  `annee_production` varchar(100) NOT NULL,
  `carburant` varchar(100) NOT NULL,
  `carrosserie` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `contact_vendeur` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`num_annonce`, `idvendeur`, `vendeur`, `marque`, `modele`, `prix`, `km`, `annee_circul`, `annee_production`, `carburant`, `carrosserie`, `etat`, `description`, `contact_vendeur`, `image`) VALUES
(100, 4, 'Garage Parker', 'Lamborghini', 'Lamborghini Huracàn', 102000, 54123, '06/2019', '2019', 'Essence', 'Coupé', 'Occasion', 'Lamborghini Huracàn, toutes options, parfait état, bleue et orange, pour les amaterus de vitesses', 'P. Parker', 'Lamborghini-Hurcán-STO.jpg'),
(101, 4, 'Garage Parker', 'Peugeot', '308 GTI', 23000, 2686, '12-2021', '2021', 'Diesel', 'Berline', 'Occasion', 'Peugeot 308 GTI, boite manuelle, grise, 5 portes, toutes options', 'P. Parker', 'S7-modele--peugeot-308.jpg'),
(102, 5, 'Garage Michel', 'Audi', 'Audi Q2 TFsi110', 46000, 18000, '08-2021', '2021', 'Diesel', 'Berline', 'Occasion', 'Audi Q2, boite manuelle, Blanche', 'M. Michel', 'audiq2.jpg'),
(103, 5, 'Garage Michel', 'Porsche', 'Porsche 911 S8', 42599, 14569, '12-2021', '2021', 'Essence', 'Coupé', 'Occasion', 'Porsche 911 toutes options, boite manuelle, tout confort', 'M. Michel', 'S8-modele--porsche-911-type-992.jpg'),
(104, 1, 'Chimot Automobiles', 'Ferrari', 'Ferrari F1', 12000000, 150000, '01-2021', '2021', 'Essence', 'F1', 'Occasion', 'Vends F1, bon état, peu servie, 0 confort, 1 personne seulement, boite automatique', 'Chimot Cedric', '2200120-f1-75th-anniversary-yellow-656x410.jpg'),
(105, 1, 'Chimot Automobiles', 'BMW', 'BMW I8 Coupé', 78000, 18000, '12-2021', '2021', 'Electrique', 'Coupé', 'Occasion', 'BMW I8 coupé, Blanche,  clignotant en option', 'Chimot Cedric', 'bmw-i8-coupe-sport-hybride.jpg'),
(106, 1, 'Chimot Automobiles', 'BMW', 'BMW M4', 56990, 12500, '06-2021', '2021', 'Essence', 'Coupé', 'Occasion', 'BMW M4 bleue, 3 portes, peu servie, contrôle technique ok, toutes options', 'Chimot Cedric', 'BMW-M4.jpg'),
(107, 1, 'Chimot Automobiles', 'BMW', 'BMW X1', 65000, 0, '10-2022', '2022', 'Essence', 'SUV', 'Neuf', 'BMW X1 toutes options, orange, 5 portes, idéal pour les longs trajets en voiture', 'Chimot Cedric', 'bmw-x1.jpg'),
(108, 1, 'Chimot Automobiles', 'Renault', 'Twingo 2', 18599, 12500, '12-2021', '2021', 'Diesel', 'Berline', 'Occasion', 'Renault Twingo toutes options, neuves, boite automatique', 'Chimot Cedric', 'twingo2.jpeg'),
(109, 1, 'Chimot Automobiles', 'Volkswagen', 'Golf VII GTI 2.0', 25000, 18000, '06-2019', '2019', 'Diesel', 'Berline', 'Occasion', 'Vends Golf VII GTI, toutes options, boite manuelle', 'Chimot Cedric', 'Golf _VII_GTI.jpg'),
(110, 1, 'Chimot Automobiles', 'Audi', 'Audi A3', 59000, 0, '10-2022', '2022', 'Essence', 'SUV', 'Neuf', 'Audi A3, boite manuelle, Bleue, toutes options', 'Chimot Cedric', 'audi-a3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paiement` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `total_articles` varchar(1000) NOT NULL,
  `prix_total` int(100) NOT NULL,
  `date_commande` varchar(50) NOT NULL,
  `statut_paiement` varchar(20) NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `client_id`, `nom`, `telephone`, `email`, `paiement`, `adresse`, `cp`, `ville`, `pays`, `total_articles`, `prix_total`, `date_commande`, `statut_paiement`) VALUES
(1, 2, 'Stark Tony', '1234376679', 'stark@hotmail.fr', 'Paiement à la livraison', 'rue des Héros', '85075P', 'Rome', 'Italie', 'Audi, Audi Q2 TFsi110', 46000, '16-Oct-2022', 'completee'),
(3, 3, 'Rogers Steve', '1234376679', 'captain@yahoo.com', 'Virement bancaire', 'rue de la Paix', '58DE45 678Z', 'Berlin', 'Allemagne', 'Renault, Twingo 2', 18599, '17-Oct-2022', 'completee'),
(4, 6, 'Le Belge Tintin', '1146890071', 'tintinmilou@gmail.be', 'Paiement à la livraison', 'rue de la BD', '75075', 'Paris', 'France', 'BMW, BMW M4', 56990, '19-Oct-2022', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `client_id`, `nom`, `email`, `telephone`, `message`) VALUES
(1, 2, 'Stark Tony', 'stark@hotmail.fr', '125547890', 'Coucou :)'),
(2, 6, 'Le Belge Tintin', 'tintinmilou@gmail.be', '1146890071', 'Coucou à la team Vroomissimo :)');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `client_id` int(100) NOT NULL,
  `num_annonce` int(100) DEFAULT NULL,
  `marque` varchar(100) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `client_id`, `num_annonce`, `marque`, `modele`, `prix`, `image`) VALUES
(11, 3, 100, 'Lamborghini', 'Lamborghini Huracàn', '102000', 'Lamborghini-Hurcán-STO.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(15) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `adresse`, `cp`, `ville`, `pays`, `email`, `password`, `type_user`) VALUES
(1, 'Chimot Cedric', 'rue des Héros', '75000', 'Paris', 'France', 'ced02830@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'Stark Tony', 'rue des Héros', '85075P', 'Rome', 'Italie', 'stark@hotmail.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'client'),
(3, 'Rogers Steve', 'rue de la Paix', '58DE45 678Z', 'Berlin', 'Allemagne', 'captain@yahoo.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'client'),
(4, 'Parker Peter', 'rue de la Paix', 'CP8502', 'Madrid', 'Espagne', 'spidey@gmail.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(5, 'Garage Michel', 'rue de la Paix', '75010', 'Paris', 'France', 'gmichel@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(6, 'Le Belge Tintin', 'rue de la BD', '75075', 'Rome', 'France', 'tintinmilou@gmail.be', '81dc9bdb52d04dc20036dbd8313ed055', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`num_annonce`),
  ADD KEY `idvendeur` (`idvendeur`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `num_annonce` (`num_annonce`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`num_annonce`) REFERENCES `annonce` (`num_annonce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- sql de la table pou PHPmyadmin

-- CREATE TABLE `annonce` (
--   `num_annonce` int(100) NOT NULL,
--   `idvendeur` int(11) NOT NULL,
--   `vendeur` varchar(100) NOT NULL,
--   `marque` varchar(255) NOT NULL,
--   `modele` varchar(100) NOT NULL,
--   `prix` int(100) NOT NULL,
--   `km` int(100) NOT NULL,
--   `annee_circul` varchar(100) NOT NULL,
--   `annee_production` varchar(100) NOT NULL,
--   `carburant` varchar(100) NOT NULL,
--   `carrosserie` varchar(100) NOT NULL,
--   `etat` varchar(100) NOT NULL,
--   `description` longtext NOT NULL,
--   `contact_vendeur` varchar(100) NOT NULL,
--   `image` varchar(1000) NOT NULL,
--    PRIMARY KEY (`num_annonce`),
--    FOREIGN KEY (`idvendeur`) REFERENCES `utilisateur` (`ID`)
-- );

-- CREATE TABLE `commande` (
--   `id` int(100) AUTO_INCREMENT NOT NULL,
--   `client_id` int(100) NOT NULL,
--   `nom` varchar(100) NOT NULL,
--   `telephone` varchar(100) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `paiement` varchar(100) NOT NULL,
--   `adresse` varchar(100) NOT NULL,
--   `cp` varchar(100) NOT NULL,
--   `ville` varchar(100) NOT NULL,
--   `pays` varchar(100) NOT NULL,
--   `total_articles` varchar(1000) NOT NULL,
--   `prix_total` int(100) NOT NULL,
--   `date_commande` varchar(50) NOT NULL,
--   `statut_paiement` varchar(20) NOT NULL DEFAULT 'en attente',
--    PRIMARY KEY (`id`),
--    FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`)
-- );

-- CREATE TABLE `message` (
--   `id` int(100) NOT NULL AUTO_INCREMENT,
--   `client_id` int(100) NOT NULL,
--   `nom` varchar(100) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `telephone` varchar(12) NOT NULL,
--   `message` varchar(500) NOT NULL,
--   PRIMARY KEY (`id`),
--   FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`)
-- );

-- CREATE TABLE `panier` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `client_id` int(100) NOT NULL,
--   `num_annonce` int(100) DEFAULT NULL,
--   `marque` varchar(100) NOT NULL,
--   `modele` varchar(100) NOT NULL,
--   `prix` varchar(100) NOT NULL,
--   `image` varchar(100) NOT NULL,
--   PRIMARY KEY (`id`),
--   FOREIGN KEY (`client_id`) REFERENCES `utilisateur` (`ID`),
--   FOREIGN KEY (`num_annonce`) REFERENCES `annonce` (`num_annonce`)
-- );

-- CREATE TABLE `utilisateur` (
--   `ID` int(15) NOT NULL AUTO_INCREMENT,
--   `nom` varchar(100) NOT NULL,
--   `adresse` varchar(100) NOT NULL,
--   `cp` varchar(100) NOT NULL,
--   `ville` varchar(100) NOT NULL,
--   `pays` varchar(100) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `password` varchar(100) NOT NULL,
--   `type_user` varchar(100) NOT NULL,
--   PRIMARY KEY (`ID`)
-- )