-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 oct. 2022 à 09:20
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `Numero_annonce` varchar(50) NOT NULL,
  `IDvendeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`Numero_annonce`, `IDvendeur`) VALUES
('DEP1240-SFP', 1),
('DEP1244-SFP', 1),
('9743734MB2022040181.00a', 2),
('7439914', 3),
('mera2-GC-315-VF_24022000', 4);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `IDcaracteristiques` int(11) NOT NULL,
  `Puissance_KW(CH)` varchar(50) DEFAULT NULL,
  `Transmission` varchar(50) NOT NULL,
  `Vitesses` int(11) DEFAULT NULL,
  `Couleur` varchar(50) NOT NULL,
  `Coul_interieure` varchar(50) DEFAULT NULL,
  `Garniture` varchar(50) DEFAULT NULL,
  `IDvoiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`IDcaracteristiques`, `Puissance_KW(CH)`, `Transmission`, `Vitesses`, `Couleur`, `Coul_interieure`, `Garniture`, `IDvoiture`) VALUES
(1, '180Kw (245CH)', 'Boite automatique', 7, 'Rouge foncé', 'Gris', 'Cuir partiel', 1),
(2, NULL, 'Boite manuelle', 6, 'Blanche', NULL, NULL, 2),
(3, '147 kW (200 CH)', 'Boite automatique', 6, 'Gris foncé', 'Noir', 'Tissu', 3),
(4, '96 kW (131 CH)', 'Boite manuelle', 6, 'Gris', NULL, NULL, 4),
(5, NULL, 'Boite automatique', NULL, 'Alpinweiss uni', NULL, 'Alcantara', 5);

-- --------------------------------------------------------

--
-- Structure de la table `carburant`
--

CREATE TABLE `carburant` (
  `IDcarburant` int(11) NOT NULL,
  `Carburant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carburant`
--

INSERT INTO `carburant` (`IDcarburant`, `Carburant`) VALUES
(1, 'Essence'),
(2, 'Diesel');

-- --------------------------------------------------------

--
-- Structure de la table `carrosserie`
--

CREATE TABLE `carrosserie` (
  `IDcarrosserie` int(11) NOT NULL,
  `Carrosserie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carrosserie`
--

INSERT INTO `carrosserie` (`IDcarrosserie`, `Carrosserie`) VALUES
(1, 'Berline'),
(2, 'Coupé'),
(3, 'Break'),
(4, 'Monospace'),
(5, 'Fourgonnette');

-- --------------------------------------------------------

--
-- Structure de la table `cate_vendeur`
--

CREATE TABLE `cate_vendeur` (
  `IDcategorie` int(11) NOT NULL,
  `Categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cate_vendeur`
--

INSERT INTO `cate_vendeur` (`IDcategorie`, `Categorie`) VALUES
(1, 'Professionnel'),
(2, 'Particulier');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `IDetat` int(11) NOT NULL,
  `Etat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`IDetat`, `Etat`) VALUES
(1, 'Neuf'),
(2, 'Occasion');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `IDmarque` int(11) NOT NULL,
  `Marque` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`IDmarque`, `Marque`) VALUES
(1, 'Volkswagen'),
(2, 'Renault'),
(3, 'Peugeot'),
(4, 'Citroen'),
(5, 'Audi'),
(6, 'BMW');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `IDphoto` int(11) NOT NULL,
  `Photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`IDphoto`, `Photo`) VALUES
(1, 'Photo Golf'),
(2, 'Photo Audi'),
(3, 'Photo Polo'),
(4, 'Photo Peugeot'),
(5, 'Photo BMW');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `IDvendeur` int(11) NOT NULL,
  `Nom_vendeur` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `CP` int(11) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `Contact` varchar(50) DEFAULT NULL,
  `IDcategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDvendeur`, `Nom_vendeur`, `Adresse`, `CP`, `Ville`, `Pays`, `Contact`, `IDcategorie`) VALUES
(1, 'Latour Automobiles', '425 rue du Commerce', 83140, 'Six-Fours-Les-Plages', 'France', 'D. LATOUR', 1),
(2, 'E-Motors France Troyes', 'ZAC DUT MOUTOT', 10150, 'LAVAU', 'France', 'Service commercial', 1),
(3, 'TALLERES HERMINDO', 'Rua Real, 60', 36860, 'PONTEAEREAS', 'Espagne', NULL, 1),
(4, 'BMW MINI ARLES AUTOSPHERE', '16 Avenue des Arches', 13200, 'ARLES', 'France', 'Service commercial', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `IDvoiture` int(11) NOT NULL,
  `Modele` varchar(50) NOT NULL,
  `Km` int(11) NOT NULL,
  `Année_circulation` varchar(50) NOT NULL,
  `Annee_production` int(11) DEFAULT NULL,
  `Prix` varchar(50) NOT NULL,
  `Sieges` int(11) DEFAULT NULL,
  `Portes` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Numero_annonce` varchar(50) NOT NULL,
  `IDmarque` int(11) NOT NULL,
  `IDetat` int(11) NOT NULL,
  `IDcarrosserie` int(11) NOT NULL,
  `IDcarburant` int(11) NOT NULL,
  `IDphoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`IDvoiture`, `Modele`, `Km`, `Année_circulation`, `Annee_production`, `Prix`, `Sieges`, `Portes`, `Description`, `Numero_annonce`, `IDmarque`, `IDetat`, `IDcarrosserie`, `IDcarburant`, `IDphoto`) VALUES
(1, 'Golf VII GTI 2.0', 63000, '06/2018', 2018, '27990€', 5, 5, 'ABS,Accoudoir central AR,Accoudoir central AV,Aide démarrage en côte,Aide freinage d\'urgence,Airbags frontaux,Airbags latéraux,Alarme,Anti démarrage,Anti-patinage,Attelage amovible,Auto radio commandé au volant,Avec Direction assistée,Banquette 1/3 - 2/3,Bluetooth,Boîte à gant réfrigérée,Boîte automatique,Caméra de recul,CD,Climatisation automatique,Climatisation multizone,Contrôle pression pneus,Détecteur de pluie,Direction assistée,ESP,Fermeture centralisée,Feux Allumage auto,Feux de jour,Feux Led,Feux Xénon,Frein parking auto,GPS Couleur,GPS Tactile,Limiteur de vitesse,MP3,MP3,Non-fumeur,Ordinateur de bord,Palettes au volant,Phare antibrouillard arrières,Prises AUX/USB,Radar Aide Stationnement,Radar de détection AR,Radar de détection AV,Radio CD,Reconnaissance vocale,Régulateur de vitesse,Rétroviseurs Dégivrants,Rétroviseurs Electriques,Rétroviseurs Electrochrome,Rétroviseurs Rabattables,Sièges Chauffants,Sièges Isofix,Sièges Sport,Sport,Start and Stop,Surveillance angle mort,Suspension Sport,Téléphone bluetooth,Toit Ouvrant élec verre,USB,Vitres arrière électriques,Vitres avant électriques,Vitres électriques,Vitres surteintées,Volant Multifonction,Volant Réglable,Volant Sport', 'DEP1240-SFP', 1, 2, 1, 1, 1),
(2, 'Audi Q2', 2686, '04/2022', NULL, '29900€', NULL, 5, 'Cette voiture sera facturée 24 917 euros HT + TVA, dans certains cas la TVA est récupérable, exemple : organisme bancaire, société de location, parfois mise en statut 2 places, Exportation... renseignez vous aupr¨s du service commercial si possible, Equipements : Accoudoir central AV, Airbags latéraux AV avec syst¨me d\'airbags de tªte, Audi Parking System : signal acoustique d\'aide au stationnement AR, Audi pre sense front, Ciel de pavillon en tissu Gris Titane, Climatisation automatique 2 zones, Coques de rétroviseurs extérieurs couleur carrosserie, Désactivation de l et #146;airbag passager AV, Détecteur de pluie et de luminosité, Direction progressive, Dossier de banquette AR rabattable en deux parties 40 : 60 ou enti¨rement, Interface Bluetooth, L¨ve-vitres électriques AV et AR, Limiteur de vitesse, Réception radio numérique DAB, Régulateur de vitesse + incluant limiteur de vitesse, Si¨ge conducteur et passager AV réglable en hauteur, Volant en cuir style 3 branches avec multifonctions, Audi Virtual Cockpit, Audi connect navigation et divertissement, Détecteur de fatigue, Lecteur de CD, Détecteur de fatigue, Lecteur de CD, Jantes en alliage 16\'.', '9743734MB2022040181.00a', 5, 2, 1, 1, 2),
(3, 'Polo GTI 2.0', 53000, '03/2019', 2019, '25990€', 5, 4, 'Boîte automatique,Historique du véhicule,Non-fumeur,Vitres surteintées,Bluetooth,Vitres avant électriques,Vitres arrière électriques,Climatisation automatique,USB,MP3,Avec Direction assistée,Radar Aide Stationnement,Climatisation multizone,Feux Led,Feux Antibrouillard,Feux Allumage auto,Rétroviseurs Electriques,Rétroviseurs Dégivrants,Rétroviseurs Rabattables,Rétroviseurs Electrochrome,Accoudoir central AV,Banquette 1/3 - 2/3,Clé main libre,Détecteur de pluie,Direction assistée,GPS,Auto radio commandé au volant,MP3,Prises AUX/USB,Ordinateur de bord,Téléphone bluetooth,Téléphone main libre,Radar de détection AV,Radar de détection AR,Aide démarrage en côte,Aide freinage d\'urgence,Régulateur de vitesse,Limiteur de vitesse,Sièges Chauffants,Sièges Isofix,Start and Stop,Vitres électriques,Volant Réglable,Volant Sport,Volant Multifonction,ABS,Airbags frontaux,Airbags latéraux,Anti démarrage,Anti-patinage,Contrôle pression pneus,ESP,Fermeture centralisée,Virtual cockpit, Pack son Beats, Roue de secours.', 'DEP1244-SFP', 1, 2, 1, 1, 3),
(4, 'Peugeot 308', 48750, '03/2019', NULL, '15500€', 5, 5, 'Climatisation\r\nClimatisation automatique\r\nDétecteur de pluie\r\nRétroviseurs latéraux électriques\r\nVitres teintées\r\nVitres électriques\r\nVolant multifonctions\r\nBluetooth\r\nDispositif mains libres\r\nUSB\r\nDirection assistée\r\nFeux anti-brouillard\r\nIsofix\r\nVerrouillage centralisé\r\nJantes alliage', '7439914', 3, 2, 1, 2, 4),
(5, 'BMW 118', 2500, '11/2021', NULL, '34990€', 5, 5, 'Marque: BMWModèle: SERIE 1Version: 118iA 136ch M Sport DKG7Energie: EssenceAnnée: 2021Couleur: Alpinweiss uniCarroserie: CitadineBoite: AutomatiquePortes: 5Places: 5Cylindrée: 1499Garantie: CONSTRUCTEUREquipements: ABS, Accoudoir central AV avec rangement, AFIL, Aide au démarrage en côte, Airbag conducteur, Airbag passager déconnectable, Airbags latéraux avant, Airbags rideaux AV et AR, Alpinweiss, Antidémarrage électronique, Antipatinage, Appel d\'Urgence Localisé, Arrêt et redémarrage auto. du moteur, Bacs de portes avant, BAS, Boite à gants fermée, Calandre chromée, Caméra de recul, Capteur de luminosité, Capteur de pluie, Clim automatique, Commandes du système audio au volant, Commandes vocales, Compte tours, Contrôle de couple en courbe, Contrôle de freinage en courbe, Contrôle de Traction, Contrôle élect. de la pression des pneus, Démarrage sans clé, Disque dur multimédia, EBD, Eclairage au sol, Eclairage d\'ambiance, Ecran multifonction couleur, Ecran tactile, ESP, Feux arrière à LED, Feux de jour à LED, Filtre à Pollen, Follow me home, Fonction MP3, GPS Cartographique, Indicateur de limitation de vitesse, Interface Media, Jantes Alu, Kit mains-libres Bluetooth, Miroir de courtoisie conducteur éclairé, Miroir de courtoisie passager éclairé, Ordinateur de bord, Phares antibrouillard LED, Phares avant LED, Poches d\'aumonières, Porte-gobelets avant, Prise 12V, Prise USB, Radio, Radio numérique DAB, Régulateur de vitesse, Rétroviseurs dégivrants, Rétroviseurs électriques, Rétroviseurs rabattables électriquement, Services connectés, Siège conducteur réglable en hauteur, Sièges avant sport, Sortie d\'échappement chromée, Suspensions Sport, Système d\'assistance au stationnement, Système de mesure de place disponible, Température extérieure, TMC, Verrouillage auto. des portes en roulant, Verrouillage centralisé à distance, Vitres arrière électriques, Vitres avant électriques, Volant cuir, Volant multifonction, Volant réglable en profondeur et hauteur, Volant sport, Accès Confort avec prépa BMW Digital Key, Becquet arrière M, Capacité du réservoir augmentée, Climatisation automatiques bi-zone, Kit de Mobilité, Rétroviseur intérieur électrochrome, Sièges M Sport, Tissu /Alcantara Trigon/Schwarz.', 'mera2-GC-315-VF_24022000', 6, 2, 1, 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`Numero_annonce`),
  ADD KEY `IDvendeur` (`IDvendeur`);

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`IDcaracteristiques`),
  ADD KEY `IDvoiture` (`IDvoiture`);

--
-- Index pour la table `carburant`
--
ALTER TABLE `carburant`
  ADD PRIMARY KEY (`IDcarburant`);

--
-- Index pour la table `carrosserie`
--
ALTER TABLE `carrosserie`
  ADD PRIMARY KEY (`IDcarrosserie`);

--
-- Index pour la table `cate_vendeur`
--
ALTER TABLE `cate_vendeur`
  ADD PRIMARY KEY (`IDcategorie`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`IDetat`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`IDmarque`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`IDphoto`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`IDvendeur`),
  ADD KEY `IDcategorie` (`IDcategorie`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`IDvoiture`),
  ADD UNIQUE KEY `Numero_annonce` (`Numero_annonce`),
  ADD KEY `IDmarque` (`IDmarque`),
  ADD KEY `IDetat` (`IDetat`),
  ADD KEY `IDcarrosserie` (`IDcarrosserie`),
  ADD KEY `IDcarburant` (`IDcarburant`),
  ADD KEY `IDphoto` (`IDphoto`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`IDvendeur`) REFERENCES `vendeur` (`IDvendeur`);

--
-- Contraintes pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD CONSTRAINT `caracteristiques_ibfk_1` FOREIGN KEY (`IDvoiture`) REFERENCES `voiture` (`IDvoiture`);

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `vendeur_ibfk_1` FOREIGN KEY (`IDcategorie`) REFERENCES `cate_vendeur` (`IDcategorie`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`Numero_annonce`) REFERENCES `annonce` (`Numero_annonce`),
  ADD CONSTRAINT `voiture_ibfk_2` FOREIGN KEY (`IDmarque`) REFERENCES `marque` (`IDmarque`),
  ADD CONSTRAINT `voiture_ibfk_3` FOREIGN KEY (`IDetat`) REFERENCES `etat` (`IDetat`),
  ADD CONSTRAINT `voiture_ibfk_4` FOREIGN KEY (`IDcarrosserie`) REFERENCES `carrosserie` (`IDcarrosserie`),
  ADD CONSTRAINT `voiture_ibfk_5` FOREIGN KEY (`IDcarburant`) REFERENCES `carburant` (`IDcarburant`),
  ADD CONSTRAINT `voiture_ibfk_6` FOREIGN KEY (`IDphoto`) REFERENCES `photos` (`IDphoto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
