-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 oct. 2022 à 22:08
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
(100, 4, 'Garage Parker', 'Lamborghini', 'Lamborghini Huracàn', 102000, 54123, '06/2019', '2019', 'Essence', 'Coupé', 'Occasion', 'Lamborghini Huracàn, toutes options, parfait état, bleue et orange, pour les amaterus de vitesses', 'P. Parker', 'Lamborghini-Hurcán-STO.jpg');

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
(1, 2, 'Stark Tony', 'stark@hotmail.fr', '125547890', 'Coucou :)');

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
(1, 2, 100, 'Lamborghini', 'Lamborghini Huracàn', '102000', 'Lamborghini-Hurcán-STO.jpg');

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
(4, 'Parker Peter', 'rue de la Paix', 'CP8502', 'Madrid', 'Espagne', 'spidey@gmail.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

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
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `utilisateur` (`ID`);

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
