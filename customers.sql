-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 sep. 2022 à 08:42
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
-- Base de données : `customers`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(70) DEFAULT NULL,
  `ContactName` varchar(70) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(70) DEFAULT NULL,
  `City` varchar(70) DEFAULT NULL,
  `Country` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `ContactName`, `Adress`, `PostalCode`, `City`, `Country`) VALUES
(1, 'Alfreds Futterkiste', 'Maria Anders', 'Obere Str. 57', '12209', 'Germany', 'Berlin'),
(2, 'Ana Trujillo Emparedados y helados ', 'Ana Trujillo', 'Avda. de la Constitución 2222 ', '05023', 'México D.F.05023', 'Mexico'),
(3, 'Chimot Cedric', 'Chimot Cedric', 'Chez moi', '15000', 'New York City', 'United States'),
(4, 'Toto', 'Toto TOTO', 'Totos Pizza', '75000', 'Paris', 'France'),
(5, 'Machin', 'Marie Machin', 'Chez Machin', '10000', 'Tokyo', 'Japon'),
(6, 'Lulu Company', 'Lulu Lucienne', 'rue du Boucher', 'CP1520', 'Madrid', 'Spain'),
(7, 'Etablissements Oui Oui', 'Oui Oui', 'rue du Taxi', '02500', 'Jouet City', 'Italy'),
(8, 'La ferme dans la montagne', 'Heidi', 'Chemin de la Montagne', '25690', 'Genève', 'Suisse'),
(9, 'Chez Manu', 'Emmanuel Macron', 'rue des Imbéciles', '75000', 'Paris', 'France'),
(10, 'Société Athena', 'Athena Athènes', 'rue du Monument', '89012', 'Athènes', 'Greece'),
(11, 'Léa Coiffure', 'Dupont Léa', 'rue des Ciseaux', '79900', 'Los Angeles', 'United States'),
(12, 'Jean Michel', 'Durand Jean Michel', 'rue du Café', '82000', 'Moscou', 'Russia'),
(13, 'Laura Martin', 'Laura Martin', 'rue du Pain', '75010', 'Paris', 'France'),
(14, 'Orange', 'Monsieur Leon', 'rue de la Panne', '02500', 'Rome', 'Italy'),
(15, 'SFR', 'Leon Dupuis', 'Chemin du Réseau', '25690', 'Barcelone', 'Spain'),
(16, 'Consolidated Holdings', 'Elizabeth Brown', 'Berkeley Gardens 12 Brewery', 'WX1 6LT', 'London', 'UK'),
(17, 'Drachenblut Delikatessend', 'Sven Ottlieb', 'Walserweg 21', '52066', 'Aachen', 'Germany'),
(18, 'Du monde entier', 'Janine Labrune', '67, rue des Cinquante Otages', '44000', 'Nantes', 'France'),
(19, 'Eastern Connection', 'Ann Devon', '35 King George', 'WX3 6FW', 'London', 'UK'),
(20, 'Ernst Handel', 'Roland Mendel', 'Kirchgasse 6', '8010', 'Graz', 'Austria'),
(21, 'NeoGenomics, Inc.', 'Shawnee', '08 Bonner Circle', NULL, 'Põltsamaa', 'Estonia'),
(22, 'RADA Electronic Industries Ltd.', 'Carmencita', '14 Lakewood Alley', '3606', 'Nueve de Julio', 'Argentina'),
(23, 'Discovery Communications, Inc.', 'Hynda', '1613 Jana Terrace', '187003', 'Tosno', 'Russia'),
(24, 'Forum Merger Corporation', 'Tomlin', '53 Laurel Alley', NULL, 'Cirangrang', 'Indonesia'),
(25, 'Apollo Commercial Real Estate Finance', 'Jaime', '361 Artisan Junction', NULL, 'Tajike’abati', 'China'),
(26, 'YPF Sociedad Anonima', 'Wheeler', '4 Debs Terrace', NULL, 'Dajing', 'China'),
(27, 'Cerecor Inc.', 'Ingram', '64435 Dwight Place', NULL, 'Sidayu', 'Indonesia'),
(28, 'Lincoln Electric Holdings, Inc.', 'Olin', '0399 Stang Avenue', '3110', 'Dulian', 'Philippines'),
(29, 'Qiagen N.V.', 'Jeremie', '1061 Katie Alley', '89110-000', 'Gaspar', 'Brazil'),
(30, 'Perficient, Inc.', 'Pippa', '242 American Ash Terrace', NULL, 'Cao Thượng', 'Vietnam'),
(31, 'Infinity Pharmaceuticals, Inc.', 'Laurianne', '6 Beilfuss Junction', '32825', 'Orlando', 'United States'),
(32, 'BioCryst Pharmaceuticals, Inc.', 'Erv', '5 Warner Drive', NULL, 'Temblador', 'Venezuela'),
(33, 'Asia Pacific Fund, Inc. (The)', 'Jehu', '20 Fairfield Center', '9213', 'Leleque', 'Argentina'),
(34, 'Enviva Partners, LP', 'Thedric', '30283 Holmberg Park', NULL, 'Pavlivka', 'Ukraine'),
(35, 'TC PipeLines, LP', 'Shell', '28 Monument Alley', '309975', 'Urazovo', 'Russia'),
(36, 'Howard Hughes Corporation (The)', 'Hunt', '887 Nevada Avenue', '35487', 'Tuscaloosa', 'United States'),
(37, 'Diebold Nixdorf Incorporated', 'Meade', '8193 Hallows Parkway', '15540', 'Kota Bharu', 'Malaysia'),
(38, 'Elbit Imaging Ltd.', 'Mufinella', '4926 Kinsman Plaza', NULL, 'Kapan', 'Armenia'),
(39, 'GAIN Capital Holdings, Inc.', 'Fancie', '05 Elmside Place', '943057', 'Mapiripán', 'Colombia'),
(40, 'AppFolio, Inc.', 'Jarret', '339 Hermina Circle', NULL, 'Banyumas', 'Indonesia'),
(41, 'Companhia Brasileira de Distribuicao', 'Godfrey', '1962 Swallow Junction', NULL, 'Kallífytos', 'Greece'),
(42, 'Kosmos Energy Ltd.', 'Ardath', '1845 Derek Center', NULL, 'Yanfolila', 'Mali'),
(43, 'Matson, Inc.', 'Leshia', '69 Morrow Center', '62-560', 'Skulsk', 'Poland'),
(44, 'Texas Capital Bancshares, Inc.', 'Talbert', '8 Cody Court', '18160', 'Sao Hai', 'Thailand'),
(45, 'MYOS RENS Technology Inc.', 'Charmine', '34 Swallow Lane', NULL, 'Banjarejo', 'Indonesia'),
(46, 'Genworth Financial Inc', 'Deloris', '99 Annamark Court', '2425-405', 'Boco', 'Portugal'),
(47, 'Allegiant Travel Company', 'Norris', '6223 Michigan Drive', NULL, 'Kissidougou', 'Guinea'),
(48, 'Andina Acquisition Corp. II', 'Doralynne', '00 Brown Terrace', '8601', 'Buenavista', 'Philippines'),
(49, 'Medovex Corp.', 'Evin', '22 Stoughton Court', NULL, 'Caiyuan', 'China'),
(50, 'Marcus & Millichap, Inc.', 'Osmund', '40540 Tony Junction', NULL, 'Dadianzi', 'China'),
(51, 'Nuveen Georgia Quality Municipal Income Fund ', 'Blair', '8 Norway Maple Terrace', NULL, 'Xingcheng', 'China'),
(52, 'Gabelli Multi-Media Trust Inc. (The)', 'Nata', '5331 Monument Alley', NULL, 'Gastoúni', 'Greece'),
(53, 'iShares Fallen Angels USD Bond ETF', 'Grenville', '4938 Hazelcrest Plaza', NULL, 'Pāvilosta', 'Latvia'),
(54, 'ICC Holdings, Inc.', 'Weber', '893 3rd Place', '354084', 'Sochi', 'Russia'),
(55, 'Guaranty Bancorp', 'Carolyne', '24 Glendale Lane', '8720', 'Del Pilar', 'Philippines'),
(56, 'Nuveen Build America Bond Opportunity Fund', 'Scot', '43 Golf View Avenue', NULL, 'Luoshui', 'China'),
(57, 'Watsco, Inc.', 'Jecho', '03653 Arkansas Center', NULL, 'Yangxi', 'China'),
(58, 'MacroGenics, Inc.', 'Bette-ann', '2 Browning Alley', NULL, 'Xiqi', 'China'),
(59, 'Hemisphere Media Group, Inc.', 'Golda', '270 Springview Court', '94627', 'Oakland', 'United States'),
(60, 'Determine, Inc. ', 'Sue', '2 Linden Park', NULL, 'Indramayu', 'Indonesia'),
(61, 'Morgan Stanley Asia-Pacific Fund, Inc.', 'Joellyn', '48514 Boyd Junction', NULL, 'Xichangmen', 'China'),
(62, 'Western Asset Mortgage Defined Opportunity Fund Inc', 'Roanna', '80 Sutteridge Alley', '8601', 'Buenavista', 'Philippines'),
(63, 'ONE Gas, Inc.', 'Nissie', '02 Spaight Parkway', '10702', 'Padre Las Casas', 'Dominican Republic'),
(64, 'Aercap Holdings N.V.', 'Winnifred', '11 Cherokee Circle', NULL, 'Fengjiang', 'China'),
(65, 'M/I Homes, Inc.', 'Marlie', '7 Sloan Plaza', '2860-424', 'Penteado', 'Portugal'),
(66, 'Targa Resources Partners LP', 'Frasier', '7818 Comanche Terrace', '19900-000', 'Ourinhos', 'Brazil'),
(67, 'KBS Fashion Group Limited', 'Husein', '902 Eagle Crest Hill', NULL, 'Mungui', 'Peru'),
(68, 'ServiceSource International, Inc.', 'Annemarie', '1 Chive Place', NULL, 'Dīvāndarreh', 'Iran'),
(69, 'Zions Bancorporation', 'Conant', '50 Hanson Crossing', '422338', 'Spirovo', 'Russia'),
(70, 'MidWestOne Financial Group, Inc.', 'Harmonia', '6251 Ridge Oak Junction', NULL, 'Émponas', 'Greece'),
(71, 'TCF Financial Corporation', 'Paulie', '2 5th Point', '6328', 'Calape', 'Philippines'),
(72, 'Luxoft Holding, Inc.', 'Peter', '075 Oak Valley Circle', '53716', 'Madison', 'United States'),
(73, 'America First Multifamily Investors, L.P.', 'Winifred', '9309 Summit Plaza', NULL, 'Spitak', 'Armenia'),
(74, 'O2Micro International Limited', 'Frazier', '769 Fordem Way', NULL, 'Yanguan', 'China'),
(75, 'Alliance Holdings GP, L.P.', 'Kitti', '77457 Banding Park', NULL, 'Embi', 'Kazakhstan'),
(76, 'Zions Bancorporation', 'Dianemarie', '8 Service Pass', '99601', 'Sodankylä', 'Finland'),
(77, 'FS Bancorp, Inc.', 'Kelley', '1 Utah Avenue', NULL, 'Lingdangge', 'China'),
(78, 'Southcross Energy Partners, L.P.', 'Karlens', '82 Corben Avenue', '3080-352', 'Serra da Boa Viagem', 'Portugal'),
(79, 'Syndax Pharmaceuticals, Inc.', 'Malynda', '457 Clove Lane', '24212 CEDEX', 'Sarlat-la-Canéda', 'France'),
(80, 'Vanda Pharmaceuticals Inc.', 'Jordon', '60338 Waubesa Alley', '90110', 'Bang Klam', 'Thailand'),
(81, 'Laboratory Corporation of America Holdings', 'Evaleen', '85292 Kingsford Lane', NULL, 'Lingdi', 'China'),
(82, 'Travelzoo', 'Robyn', '371 Tony Center', '4960-130', 'Passal', 'Portugal'),
(83, 'Vanguard Global ex-U.S. Real Estate ETF', 'Donnamarie', '53984 Memorial Terrace', '3220-331', 'Pisão', 'Portugal'),
(84, 'Stantec Inc', 'Selestina', '2 Macpherson Avenue', NULL, 'Semey', 'Kazakhstan'),
(85, 'Noble Energy Inc.', 'Eben', '9 Gerald Circle', NULL, 'Maurole', 'Indonesia'),
(86, 'Entergy Louisiana, Inc.', 'Rochella', '62231 Melvin Circle', '566 24', 'Habo', 'Sweden'),
(87, 'Columbus McKinnon Corporation', 'Budd', '4 Upham Place', NULL, 'Shigongqiao', 'China'),
(88, 'Gabelli Dividend', 'Ginny', '1891 Moose Circle', NULL, 'Koufália', 'Greece'),
(89, 'Yext, Inc.', 'Martelle', '76082 Autumn Leaf Point', NULL, 'Shuinanxu', 'China'),
(90, 'Pampa Energia S.A.', 'Meridel', '02290 Basil Drive', '2845-487', 'Belverde', 'Portugal'),
(91, 'Viavi Solutions Inc.', 'Jess', '8678 Anzinger Center', NULL, 'Shaffa', 'Nigeria'),
(92, 'Tyson Foods, Inc.', 'Ade', '161 Toban Avenue', '854019', 'Maní', 'Colombia'),
(93, 'United Insurance Holdings Corp.', 'Rochella', '9 Beilfuss Parkway', '2727', 'Cabittaogan', 'Philippines'),
(94, 'Invesco Trust  for Investment Grade New York Municipal', 'Janella', '2 Laurel Alley', NULL, 'Xêgar', 'China'),
(95, 'Global X Robotics & Artificial Intelligence ETF', 'Howie', '261 Lakeland Junction', NULL, 'Salam', 'Indonesia'),
(96, 'Grupo Supervielle S.A.', 'Nehemiah', '99 Stone Corner Road', NULL, 'Lantang', 'China'),
(97, 'OncoSec Medical Incorporated', 'Ferdinand', '5 Annamark Place', '67604 CEDEX', 'Sélestat', 'France'),
(98, 'KLA-Tencor Corporation', 'Kin', '9 Haas Place', NULL, 'Xiaoling', 'China'),
(99, 'First Trust Small Cap Value AlphaDEX Fund', 'Lora', '464 Oriole Terrace', '1527', 'Benoni', 'South Africa'),
(100, 'Consolidated Water Co. Ltd.', 'Marrilee', '71708 Walton Pass', '39820', 'Kihniö', 'Finland');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderNumber` int(6) DEFAULT NULL,
  `EmployeeName` varchar(255) DEFAULT NULL,
  `OrderDate` varchar(15) DEFAULT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderNumber`, `EmployeeName`, `OrderDate`, `CustomerID`) VALUES
(1, 10248, 'Louis', '7/4/1996', 90),
(2, 10249, 'Louison', '7/4/2012', 35),
(3, 10250, 'Martin', '17/12/2022', 10),
(4, 10251, 'Mike', '7/4/2012', 24),
(5, 10252, 'Louis', '7/4/2018', 25),
(6, 10253, 'Louison', '28/8/2021', 1),
(7, 10254, 'Michel', '4/12/2014', 33),
(8, 10255, 'Mike', '27/11/2022', 17),
(9, 10256, 'Michel', '10/10/2002', 11),
(10, 10257, 'Martin', '17/4/2001', 19);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_orders` (`CustomerID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
