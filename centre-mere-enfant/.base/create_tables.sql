-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 mai 2022 à 15:04
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cme`
--

-- --------------------------------------------------------

--
-- Structure de la table `cme_activite`
--

CREATE TABLE `cme_activite` (
  `id_activite` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_activite`
--

INSERT INTO `cme_activite` (`id_activite`, `type`, `date_debut`, `date_fin`) VALUES
(7, 'Cantine', '2007-01-07', '0000-00-00'),
(8, 'Gargote', '2007-07-01', '0000-00-00'),
(9, 'Pépinière', '2005-01-01', '0000-00-00'),
(10, 'Visite médicale', '2005-01-01', '0000-00-00'),
(11, 'Clube ado', '2005-01-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `cme_administrateur`
--

CREATE TABLE `cme_administrateur` (
  `id_admin` int(11) NOT NULL,
  `num_matricule` varchar(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_metier` int(11) NOT NULL,
  `id_siege` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_administrateur`
--

INSERT INTO `cme_administrateur` (`id_admin`, `num_matricule`, `nom`, `prenom`, `sexe`, `id_etat`, `id_metier`, `id_siege`, `login`, `mdp`) VALUES
(1, '2', 'Martina', 'PAFUMI', 'F', 1, 2, 1, 'made.cme@mademada.org', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '3', 'Razanakolona', 'Narindra', 'F', 1, 3, 1, 'narindra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '4', ' RAKOTONIRINA', 'Hanitra', 'F', 1, 5, 1, 'cme.sociale@mademada.org', 'e10adc3949ba59abbe56e057f20f883e'),
(4, '5', 'RALAIVAHITRINIMANANA', 'Zoly ', 'F', 1, 6, 1, 'cme.scolarisation@mademada.org', 'e10adc3949ba59abbe56e057f20f883e'),
(5, '6', 'RAKOTONDRAFARA', 'Hervé', 'H', 1, 7, 1, 'cme.sad@mademada.org', 'e10adc3949ba59abbe56e057f20f883e'),
(6, '1', 'TODESCATO', 'Laura ', 'F', 1, 1, 1, 'made@mademada.org', 'e10adc3949ba59abbe56e057f20f883e'),
(7, '12', 'Andriamahenintsoa', 'Tafita', 'H', 1, 1, 1, 'tafitaeinstein@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, '13', 'Miary', 'Alberto', 'H', 1, 8, 1, 'miary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `cme_article`
--

CREATE TABLE `cme_article` (
  `id_article` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_article`
--

INSERT INTO `cme_article` (`id_article`, `designation`) VALUES
(1, 'Produit non périsable'),
(2, 'Produit périsable');

-- --------------------------------------------------------

--
-- Structure de la table `cme_classe`
--

CREATE TABLE `cme_classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(20) NOT NULL,
  `nom_classe_italien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_classe`
--

INSERT INTO `cme_classe` (`id_classe`, `nom_classe`, `nom_classe_italien`) VALUES
(1, '12 ème', '12 ème'),
(2, '11 ème', '11 ème'),
(3, '10 ème', '10 ème'),
(4, '9 ème', '9 ème'),
(5, '8 ème', '8 ème'),
(6, '7 ème', '7 ème'),
(7, '6 ème', '6 ème'),
(8, '5 ème', '5 ème'),
(9, '4 ème', '4 ème'),
(10, '3 ème', '3 ème'),
(11, '2 nd', '2 nd'),
(12, '1 ère', '1 ère'),
(13, 'Terminal', 'Terminal');

-- --------------------------------------------------------

--
-- Structure de la table `cme_ecole`
--

CREATE TABLE `cme_ecole` (
  `id_ecole` int(11) NOT NULL,
  `nom_ecole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_ecole`
--

INSERT INTO `cme_ecole` (`id_ecole`, `nom_ecole`) VALUES
(8, 'CEG 67Ha'),
(9, 'Privé Fanavotana'),
(10, 'Ottyno'),
(11, 'Notre Dame de Rosaire'),
(12, 'Lycée techinque Mahamasina'),
(13, 'Charlemagne'),
(14, 'Saint Augustin Tsaramasay'),
(15, 'Lycée Professionnel Ampefiloha'),
(16, 'EPP Ankazomanga'),
(17, 'Zoara Fitahiana'),
(18, 'IESTIME'),
(19, 'EPP Antanimena I');

-- --------------------------------------------------------

--
-- Structure de la table `cme_enfant`
--

CREATE TABLE `cme_enfant` (
  `id_enfant` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `num_matricule` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `flDonneesPersonnellesValides` int(11) DEFAULT 0,
  `id_etat` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  `enregistre` int(11) DEFAULT 0,
  `scolarise` int(11) DEFAULT 0,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_enfant`
--

INSERT INTO `cme_enfant` (`id_enfant`, `id_mere`, `num_matricule`, `nom`, `prenom`, `date_naissance`, `sexe`, `flDonneesPersonnellesValides`, `id_etat`, `id_activite`, `enregistre`, `scolarise`, `photo`) VALUES
(18, 3, '163', 'NOMENJANAHARY', 'Fitia', '2008-09-19', 'F', 0, 1, 7, 0, 1, ''),
(19, 4, '3', 'RATAHINJANAHARY', 'Stella', '2005-09-24', 'H', 0, 1, 11, 0, 1, ''),
(20, 4, '4', 'RANDRIANANDRASANA ', 'Solohery ', '2003-06-16', 'H', 0, 1, 7, 0, 1, ''),
(21, 5, '393', 'RANDRIATSILAVINA', 'Jerry Scott', '2007-03-28', 'H', 0, 1, 11, 0, 1, ''),
(22, 6, '171', 'RAINIZANAJATOVO ', 'Fitia Marie Charlotte', '2011-11-29', 'F', 0, 2, 7, 0, 1, ''),
(23, 7, '275', 'CHRISTOPHINE', 'Faniriantsoa', '2011-05-28', 'H', 0, 1, 9, 0, 1, ''),
(24, 7, '389', 'ANDRIANANTENAINA', 'Fitahiana Tiavina', '2008-05-10', 'H', 0, 1, 7, 0, 1, ''),
(25, 8, '175', 'JEAN WILLIAM', 'Fetraniaina', '2009-07-01', 'H', 0, 1, 7, 0, 1, ''),
(26, 9, '176', 'RANDRIANARIVO                 ', 'Ronaldino ', '2010-02-06', 'H', 0, 1, 7, 0, 1, ''),
(27, 10, '281', 'RAJAOBELINA', 'Mamisoa Marie', '2011-01-19', 'F', 0, 1, 7, 0, 1, ''),
(28, 10, '446', 'RANDRIARIMANGA', 'Antonio', '2008-02-03', 'H', 0, 1, 7, 0, 1, ''),
(29, 11, '183', 'FETRANIAINA', 'Andry ', '2008-07-12', 'H', 0, 1, 11, 0, 1, ''),
(30, 3, '543', 'NOMENJANAHARY', 'Niriko Arela/ZAFIKELY', '2014-05-13', 'H', 0, 2, 7, 0, 1, ''),
(31, 6, '43', 'RANDRIANJATOVO', 'Fetra Nirinasoa', '2003-11-11', 'H', 1, 1, 11, 0, 1, ''),
(42, 11, '86', 'RAMINOARISOA', 'Ravakiniaina', '2005-11-26', 'F', 1, 3, 7, 0, 1, ''),
(43, 12, '675', 'NOMENJANAHARY', 'Fenosoa Nantenaina', '2012-10-18', 'H', 0, 1, 7, 0, 1, ''),
(44, 13, '186', 'RANIVOARISOA', 'Tiavina Priscie', '2009-08-31', 'F', 0, 3, 7, 0, 1, ''),
(45, 13, '586', 'RAKOTONDRABE', 'Fanomezantsoa Jean Eric', '2011-07-16', 'F', 0, 1, 7, 0, 1, ''),
(46, 14, '447', 'RAZAFINDRAMANGA', 'Miora Elisabeth', '2005-07-25', 'F', 0, 1, 7, 0, 1, ''),
(47, 15, '16', 'RASOAMANAMBELO', 'Hanitsoa Rinah', '2005-09-23', 'F', 0, 1, 7, 0, 1, ''),
(48, 15, '17', 'RASOANANTENAINA', 'Annie Angeline', '2002-11-13', 'F', 0, 2, 7, 0, 1, ''),
(49, 16, '54', 'RAKOTOMAMONJY', 'Fréderic', '2006-02-18', 'H', 0, 1, 7, 0, 1, ''),
(50, 16, '55', 'FANJANIRINA', 'Patricia', '2003-10-20', 'F', 0, 1, 7, 0, 1, ''),
(51, 17, '50', 'RAZAFINANDRASANA', 'Haingo Fitiavana Sonya', '2006-09-15', 'F', 0, 1, 7, 0, 1, ''),
(52, 17, '409', 'RAKOTONIRINA', 'Tolotriniaina Manampy Finoana', '2014-02-03', 'H', 0, 2, 7, 0, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `cme_etat`
--

CREATE TABLE `cme_etat` (
  `id_etat` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_etat`
--

INSERT INTO `cme_etat` (`id_etat`, `description`) VALUES
(1, 'Actif'),
(2, 'Non Actif'),
(3, 'Suspondue');

-- --------------------------------------------------------

--
-- Structure de la table `cme_historique_enfant`
--

CREATE TABLE `cme_historique_enfant` (
  `id_histo` int(11) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `nb_statu_miseAjour` int(11) DEFAULT 0,
  `observation` varchar(100) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_historique_enfant`
--

INSERT INTO `cme_historique_enfant` (`id_histo`, `id_enfant`, `id_mere`, `nb_statu_miseAjour`, `observation`, `date_debut`, `date_fin`) VALUES
(20, 18, 3, 0, '', '2022-04-13', NULL),
(21, 19, 4, 0, '', '2022-04-13', NULL),
(22, 20, 4, 0, '', '2022-04-13', NULL),
(23, 21, 5, 0, '', '2022-04-13', NULL),
(24, 22, 6, 0, '', '2022-04-13', NULL),
(25, 23, 7, 0, '', '2022-04-13', NULL),
(26, 24, 7, 0, '', '2022-04-13', NULL),
(27, 25, 8, 0, '', '2022-04-13', NULL),
(28, 26, 9, 0, '', '2022-04-13', NULL),
(29, 27, 10, 0, '', '2022-04-13', NULL),
(30, 28, 10, 0, '', '2022-04-13', NULL),
(31, 29, 11, 0, '', '2022-04-13', NULL),
(32, 30, 3, 0, '', '2022-04-26', NULL),
(33, 31, 6, 0, '', '2022-04-26', NULL),
(34, 42, 11, 0, '', '2022-04-26', NULL),
(35, 43, 12, 0, '', '2022-04-26', NULL),
(36, 44, 13, 0, '', '2022-04-26', NULL),
(37, 45, 13, 0, '', '2022-04-26', NULL),
(38, 46, 14, 0, '', '2022-04-26', NULL),
(39, 47, 15, 0, '', '2022-04-26', NULL),
(40, 48, 15, 0, '', '2022-04-26', NULL),
(41, 49, 16, 0, '', '2022-04-26', NULL),
(42, 50, 16, 0, '', '2022-04-26', NULL),
(43, 51, 17, 0, '', '2022-04-26', NULL),
(44, 52, 17, 0, '', '2022-04-26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cme_mere`
--

CREATE TABLE `cme_mere` (
  `id_mere` int(11) NOT NULL,
  `num_matricule` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `flDonneesPersonnellesValides` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `statu_pmer` varchar(20) NOT NULL DEFAULT 'MERE',
  `situation_matrimoniale` varchar(30) NOT NULL,
  `num_tel` varchar(15) DEFAULT NULL,
  `num_tel_ext` varchar(15) DEFAULT NULL,
  `lien_ext` varchar(15) DEFAULT NULL,
  `cin_num` varchar(20) DEFAULT NULL,
  `cin_date_delivrance` date DEFAULT NULL,
  `cin_lieu_delivrance` varchar(50) DEFAULT NULL,
  `acte_naissance` varchar(20) DEFAULT NULL,
  `revenu_mere` double DEFAULT 0,
  `nom_conjoint` varchar(50) DEFAULT NULL,
  `date_naissance_conjoint` date DEFAULT NULL,
  `poste_conjoint` varchar(50) DEFAULT NULL,
  `revenu_conjoint` varchar(100) DEFAULT NULL,
  `depense_mensuel` varchar(20) DEFAULT NULL,
  `nb_enfant` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_mere`
--

INSERT INTO `cme_mere` (`id_mere`, `num_matricule`, `nom`, `prenom`, `sexe`, `date_naissance`, `flDonneesPersonnellesValides`, `id_etat`, `adresse`, `statu_pmer`, `situation_matrimoniale`, `num_tel`, `num_tel_ext`, `lien_ext`, `cin_num`, `cin_date_delivrance`, `cin_lieu_delivrance`, `acte_naissance`, `revenu_mere`, `nom_conjoint`, `date_naissance_conjoint`, `poste_conjoint`, `revenu_conjoint`, `depense_mensuel`, `nb_enfant`) VALUES
(3, '10', 'RAZANAMARO', 'Julienne( grand-mère)', 'F', '1956-01-01', 0, 1, 'IVP 35Antsalovana', 'MERE', 'grand-mère', '', '', '', '', '0000-00-00', '', 'oui', 80000, '', '0000-00-00', '', '', '90000', 6),
(4, '38', 'RAZAFINDRAMANGA', 'Noeline', 'F', '1974-12-20', 0, 1, 'TH Tsena atody', 'MERE', 'union libre', '', '', '', '509.092.002.740', '1992-07-13', 'Antananarivo I', 'oui', 100000, 'RAZANAPAHATELO', '1975-01-01', 'coiffeur', '0', '360000', 5),
(5, '62', 'RAZANOELINA', 'Harisoa', 'F', '1985-01-01', 0, 1, 'IVP73 Antsalovana', 'MERE', 'abandonnée par le père de fami', '', '', '', '101.212.115.628', '2004-03-31', 'Antananarivo I', 'oui', 60000, '', '0000-00-00', '', '', '120000', 2),
(6, '74', 'RABODONIRINA', 'Marie Odile', 'F', '1971-04-15', 0, 1, 'III F 74 Antohomadinika', 'MERE', 'veuve', '', '', '', '101.212.286.230', '0000-00-00', 'Antananarivo I', 'oui', 45000, '', '0000-00-00', '', '', '351500', 4),
(7, '89', 'RAVELOARISOA', 'Marie Aimée', 'F', '1982-04-12', 0, 1, 'III F 162 B', 'MERE', 'mariée', '', '', '', '101.212.173632', '2003-10-01', 'Antananarivo I', 'oui', 100000, 'RANDRIANANTOANINA Jean Michel', '1982-01-01', 'Peintre occasionnel', '100000', '450000', 8),
(8, '95', 'RASOAMALALA', 'Hanitra', 'F', '1976-08-22', 0, 1, 'III F 160', 'MERE', 'veuve et se remariée', '', '', '', '', '0000-00-00', '', 'oui', 100000, '', '0000-00-00', 'JOHN', '100000', '150000', 5),
(9, '96', 'RAZANADRAIBE', 'Edwine Romance', 'F', '1984-12-03', 0, 1, 'III F 162 Antohomadinika', 'MERE', 'mère célibataire', '', '', '', '101.202.239.217', '2016-12-29', 'Antananarivo ', 'oui', 100000, '', '0000-00-00', '', '', '150000', 3),
(10, '116', 'RAJAOBELINA', 'Mamisoa Alice', 'F', '1989-11-02', 0, 1, 'III F 127TER Antohomadinika', 'MERE', 'mariée', '', '', '', '', '0000-00-00', '', 'oui', 96000, 'ANDRIAMANGA RogerLuc Maria', '1986-01-01', 'docker', '200000', '300000', 4),
(11, '160', 'RASOARINORO', 'Viviane', 'F', '1988-06-04', 0, 1, 'III F 57', 'MERE', 'mère célibataire', '', '', '', '101.212.186062', '2006-09-06', 'Antananarivo I', 'oui', 12000, 'HERINIAINA Frederic', '0000-00-00', 'laveur devoiture', '60000', '90000', 1),
(12, '178', 'FENOSOATIANA', 'Lalao Violette', 'F', '1978-11-27', 0, 1, 'III F 127 Ter', 'MERE', 'veuve depuis 2012', '', '', '', '101 212 448 858', '1997-07-04', 'Antananarivo I', 'oui', 40000, '', '0000-00-00', '', '', '90000', 5),
(13, '189', 'RANAIVOARISOA ', 'Hanitra Hortence', 'F', '1982-10-19', 0, 1, 'III F 76 Antohomadinika', 'MERE', 'separée depuis 2019', '', '', '', '101 212 161 482', '2000-08-23', 'Antananarivo ', 'oui', 6000, 'NJAKA', '1977-01-01', 'mécanicien', '', '90000', 1),
(14, '195', 'RAZAFINDRAMANGA ', 'Mariette', 'F', '1984-06-16', 0, 1, 'IVP 66 Antsalovana', 'MERE', 'veuve depuis 2013', '', '', '', '', '0000-00-00', '', 'oui', 100000, '', '0000-00-00', '', '', '150000', 4),
(15, '197', 'RASOANANTENAINA', 'Marie Adeline', 'F', '1976-12-28', 0, 1, 'III 81 BIS', 'MERE', 'séparée', '', '', '', '', '0000-00-00', '', 'oui', 5000, 'Marcel', '0000-00-00', 'coordonier', '', '150000', 1),
(16, '202', 'RAVAOARISOA', 'Clarisse', 'F', '1978-01-01', 0, 1, 'III fF 78 Antohomadinika', 'MERE', 'veuve depuis 2018', '', '', '', '', '0000-00-00', '', 'oui', 100000, '', '0000-00-00', '', '', '120000', 4),
(17, '213', 'RAZAFINANDRASANA', 'Haingoniaina', 'F', '1988-11-11', 0, 1, 'III F 126 Antohomadinika Centre', 'MERE', 'divorcé et retourné en janvier', '0332389217', '', '', '', '0000-00-00', '', 'oui', 80000, 'RAKOTONIRINA Tolotriniaina charle', '1986-01-01', 'temporaire depuis janvier 2022 au CUA', '', '120000', 2),
(18, '229', 'RASAMOELIARISOA', 'Hanitriniaina Marcelle Yvonne', 'F', '1981-06-26', 0, 1, 'III F 81 Bis', 'MERE', 'mariée légitime', '0342372268', '', '', '101242110944', '2000-02-28', 'Antananarivo IV', 'oui', 90000, 'RAZAFINDRALAMBO Solofondraibe DinaFrederic', '0000-00-00', 'maconnerie', '26600', '150000', 5);

-- --------------------------------------------------------

--
-- Structure de la table `cme_metier`
--

CREATE TABLE `cme_metier` (
  `id_metier` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_metier`
--

INSERT INTO `cme_metier` (`id_metier`, `titre`, `role`) VALUES
(1, 'Directeur adjoint Maison de famille (CMF)', 'Representante Pays MADE a Madagascar'),
(2, 'Assistante de coordination CME', 'Responsable de la coordination du centre'),
(3, 'Secretaire caissiere', 'Responsable de la comptabilité'),
(4, 'Volet education', 'Responsable salle etude'),
(5, 'Assistante sociale', 'responsable volet sociale'),
(6, 'Animateur', 'responsable salle informatique'),
(7, 'Educateur specialise', 'responsable programme SAD'),
(8, 'Employé normale', 'Gardien'),
(9, 'Employé normale', 'Cuisinière');

-- --------------------------------------------------------

--
-- Structure de la table `cme_mois`
--

CREATE TABLE `cme_mois` (
  `id_mois` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `nb_jour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_mois`
--

INSERT INTO `cme_mois` (`id_mois`, `numero`, `nom`, `nb_jour`) VALUES
(1, 1, 'Janvier', 31),
(2, 2, 'Février', 28),
(3, 3, 'Mars', 31),
(4, 4, 'Avril', 30),
(5, 5, 'Mai', 31),
(6, 6, 'Juin', 30),
(7, 7, 'Juillet', 31),
(8, 8, 'Aout', 31),
(9, 9, 'Septembre', 30),
(10, 10, 'Octobre', 31),
(11, 11, 'Novembre', 30),
(12, 12, 'Décembre', 31);

-- --------------------------------------------------------

--
-- Structure de la table `cme_pointage`
--

CREATE TABLE `cme_pointage` (
  `id_pointage` int(11) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  `date_pointage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cme_pointage_admin`
--

CREATE TABLE `cme_pointage_admin` (
  `id_pointage_admin` int(11) NOT NULL,
  `date_entree` datetime NOT NULL,
  `date_sortie` datetime DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cme_sad`
--

CREATE TABLE `cme_sad` (
  `id_sad` int(11) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `num_matricule` varchar(10) NOT NULL,
  `id_donateur` int(11) DEFAULT NULL,
  `adopt_progressive` int(11) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `date_envoye_en_Italie` date DEFAULT NULL,
  `date_adhesion` date DEFAULT NULL,
  `frequence_de_payement` varchar(50) DEFAULT NULL,
  `date_recu_payement` date DEFAULT NULL,
  `num_liste` int(11) NOT NULL,
  `observation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_sad`
--

INSERT INTO `cme_sad` (`id_sad`, `id_enfant`, `id_mere`, `num_matricule`, `id_donateur`, `adopt_progressive`, `date_debut`, `date_fin`, `date_envoye_en_Italie`, `date_adhesion`, `frequence_de_payement`, `date_recu_payement`, `num_liste`, `observation`) VALUES
(6, 18, 3, '035', NULL, NULL, '2016-02-02', '0000-00-00', '2016-01-30', '2016-02-02', 'année', '2016-02-11', 5, ''),
(7, 19, 4, '002', NULL, NULL, '2013-09-10', '0000-00-00', '2013-08-01', '2013-09-10', 'année', '2013-10-25', 1, 'Soeur du SAD 01/012'),
(8, 20, 4, '012', NULL, NULL, '2014-01-09', '0000-00-00', '2013-08-01', '2014-01-09', 'année', '2014-09-04', 1, 'Frère du SAD 01-002'),
(9, 21, 5, '021', NULL, NULL, '2015-02-26', '0000-00-00', '2014-12-10', '2015-02-26', 'semestre', '2015-03-17', 2, ''),
(10, 31, 6, '010', NULL, NULL, '2014-06-08', '0000-00-00', '2013-08-01', '2014-06-08', 'mois', '2014-06-25', 1, ''),
(11, 23, 7, '053', NULL, NULL, '2018-01-11', '0000-00-00', '2018-01-20', '2018-01-11', 'mois', '2018-02-15', 5, 'soeur du SAD 02/018'),
(12, 24, 7, '018', NULL, NULL, '2014-12-15', '0000-00-00', '2014-12-10', '2014-12-15', 'mois', '2015-02-02', 2, 'Frère du SAD 05/053'),
(13, 25, 8, '072', NULL, NULL, '2019-02-19', '0000-00-00', '2018-05-25', '2019-02-19', 'année', '2019-03-06', 6, ''),
(14, 26, 9, '081', NULL, NULL, '2021-01-25', '0000-00-00', '2019-07-19', '2021-01-25', 'mois', '2021-02-02', 7, ''),
(15, 27, 10, '060', NULL, NULL, '2017-12-15', '0000-00-00', '2018-01-29', '2017-12-15', 'trimestre', '2018-02-21', 5, 'Soeur du SAD 03/037'),
(16, 28, 10, '037', NULL, NULL, '2016-04-11', '0000-00-00', '2016-01-30', '2016-04-11', 'année', '2016-04-28', 3, 'frère du SAD 05/060'),
(17, 29, 11, '054', NULL, NULL, '2017-12-27', '0000-00-00', '2018-01-29', '2017-12-27', 'année', '2018-02-20', 5, ''),
(18, 43, 12, '079', NULL, NULL, '2020-09-01', '0000-00-00', '2019-07-19', '2020-09-01', 'année', '0000-00-00', 7, ''),
(19, 45, 13, '078', NULL, NULL, '2019-11-26', '0000-00-00', '2019-07-19', '2019-11-26', 'mois', '2019-12-02', 7, ''),
(20, 46, 14, '062', NULL, NULL, '2018-03-05', '0000-00-00', '2018-01-29', '2018-03-05', 'semestre', '2018-04-17', 5, ''),
(21, 47, 15, '015', NULL, NULL, '2014-11-21', '0000-00-00', '2013-08-01', '2014-11-21', 'mois', '2014-12-03', 1, ''),
(22, 49, 16, '003', NULL, NULL, '2013-11-06', '0000-00-00', '2013-08-01', '2013-11-06', 'semestre', '2013-12-17', 1, 'Frère du SAD 01/008'),
(23, 50, 16, '008', NULL, NULL, '2014-03-01', '0000-00-00', '2013-08-01', '2014-03-01', 'mois', '2014-03-04', 1, 'Soeur du SAD 01/003'),
(24, 51, 17, '09', NULL, NULL, '2014-05-16', '0000-00-00', '2013-08-01', '2014-05-16', 'semestre', '2014-05-19', 1, 'Septembre 2021 - La fille a demenagèe avec le pere dans une autre ville');

-- --------------------------------------------------------

--
-- Structure de la table `cme_scolarisation`
--

CREATE TABLE `cme_scolarisation` (
  `id_scolarisation` int(11) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `id_ecole` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `annee_scolaire` varchar(10) NOT NULL,
  `moyenne` decimal(10,0) DEFAULT 0,
  `evaluation` varchar(50) DEFAULT NULL,
  `annee_ratee` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cme_stock`
--

CREATE TABLE `cme_stock` (
  `id_stock` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `qte_entree` double DEFAULT 0,
  `qte_sortie` double DEFAULT 0,
  `date_action` date NOT NULL,
  `observation` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_stock`
--

INSERT INTO `cme_stock` (`id_stock`, `id_article`, `description`, `id_unite`, `qte_entree`, `qte_sortie`, `date_action`, `observation`) VALUES
(1, 1, 'Ball bascket', 2, 12, 0, '2021-12-27', '                            '),
(2, 1, 'Huile', 1, 7, 0, '2021-12-28', '                            '),
(3, 1, 'Huile', 1, 1, 5.3, '2022-02-03', '                            '),
(4, 2, 'Mangue', 2, 45, 0, '2022-02-01', '                            '),
(5, 1, 'Ball bascket', 2, 0, 2, '2022-02-01', '                            '),
(6, 1, 'Ball bascket', 2, 0, 3.89, '2022-02-02', '                            '),
(7, 1, 'Ball bascket', 2, 2.75, 0, '2022-02-08', '                            '),
(8, 1, 'Ball bascket', 2, 0, 7.95, '2022-02-08', '                            '),
(10, 1, 'Mangue', 2, 123, 0, '2022-02-16', '                            ');

-- --------------------------------------------------------

--
-- Structure de la table `cme_unite`
--

CREATE TABLE `cme_unite` (
  `id_unite` int(11) NOT NULL,
  `unite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cme_unite`
--

INSERT INTO `cme_unite` (`id_unite`, `unite`) VALUES
(1, 'litre'),
(2, 'Pièce'),
(3, 'carton');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_admin`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_admin` (
`id_admin` int(11)
,`num_matricule` varchar(10)
,`nom` varchar(100)
,`prenom` varchar(100)
,`sexe` varchar(1)
,`id_etat` int(11)
,`id_metier` int(11)
,`id_siege` int(11)
,`login` varchar(50)
,`mdp` varchar(100)
,`description` varchar(20)
,`titre` varchar(50)
,`role` varchar(200)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_administrateur`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_administrateur` (
`id_admin` int(11)
,`num_matricule` varchar(10)
,`nom` varchar(100)
,`prenom` varchar(100)
,`sexe` varchar(1)
,`id_etat` int(11)
,`id_metier` int(11)
,`id_siege` int(11)
,`login` varchar(50)
,`mdp` varchar(100)
,`etat` varchar(20)
,`titre` varchar(50)
,`role` varchar(200)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_enfant`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_enfant` (
`id_enfant` int(11)
,`num_matricule_enf` varchar(10)
,`nom_enf` varchar(50)
,`prenom_enf` varchar(50)
,`sexe` varchar(1)
,`id_mere` int(11)
,`num_matricule_mer` varchar(10)
,`nom_mere` varchar(50)
,`prenom_mere` varchar(50)
,`id_activite` int(11)
,`activite` varchar(30)
,`id_etat` int(11)
,`etat` varchar(20)
,`id_sad` int(11)
,`num_matricule_sad` varchar(10)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_sad`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_sad` (
`id_enfant` int(11)
,`num_matricule_enf` varchar(10)
,`nom` varchar(50)
,`prenom` varchar(50)
,`sexe` varchar(1)
,`date_naissance` date
,`id_etat` int(11)
,`id_sad` int(11)
,`num_matricule_sad` varchar(10)
,`date_envoye_en_Italie` date
,`date_adhesion` date
,`frequence_de_payement` varchar(50)
,`num_liste` int(11)
,`observation` varchar(100)
,`adopt_progressive` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_scolarisation`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_scolarisation` (
`id_enfant` int(11)
,`id_mere` int(11)
,`id_scolarisation` int(11)
,`annee_scolaire` varchar(10)
,`moyenne` decimal(10,0)
,`evaluation` varchar(50)
,`annee_ratee` varchar(10)
,`nom_ecole` varchar(50)
,`nom_classe` varchar(20)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_stat_nb_enfant`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_stat_nb_enfant` (
`admis` bigint(21)
,`attente` bigint(21)
,`abandonne` bigint(21)
,`sad_actif` bigint(21)
,`sad_non_actif` bigint(21)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_stock`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_stock` (
`id_stock` int(11)
,`description` varchar(100)
,`qte_entree` double
,`qte_sortie` double
,`date_action` date
,`observation` varchar(300)
,`article` varchar(50)
,`unite` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cme_stock_restant`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cme_stock_restant` (
`description` varchar(100)
,`article` varchar(50)
,`unite` varchar(50)
,`total_entree` double
,`total_sortie` double
,`qte_restant` double(19,2)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_admin`
--
DROP TABLE IF EXISTS `v_cme_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_admin`  AS SELECT `cme_administrateur`.`id_admin` AS `id_admin`, `cme_administrateur`.`num_matricule` AS `num_matricule`, `cme_administrateur`.`nom` AS `nom`, `cme_administrateur`.`prenom` AS `prenom`, `cme_administrateur`.`sexe` AS `sexe`, `cme_administrateur`.`id_etat` AS `id_etat`, `cme_administrateur`.`id_metier` AS `id_metier`, `cme_administrateur`.`id_siege` AS `id_siege`, `cme_administrateur`.`login` AS `login`, `cme_administrateur`.`mdp` AS `mdp`, `cme_etat`.`description` AS `description`, `cme_metier`.`titre` AS `titre`, `cme_metier`.`role` AS `role` FROM ((`cme_administrateur` join `cme_etat` on(`cme_administrateur`.`id_etat` = `cme_etat`.`id_etat`)) join `cme_metier` on(`cme_administrateur`.`id_metier` = `cme_metier`.`id_metier`)) ORDER BY `cme_administrateur`.`num_matricule` ASC ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_administrateur`
--
DROP TABLE IF EXISTS `v_cme_administrateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_administrateur`  AS SELECT `admin`.`id_admin` AS `id_admin`, `admin`.`num_matricule` AS `num_matricule`, `admin`.`nom` AS `nom`, `admin`.`prenom` AS `prenom`, `admin`.`sexe` AS `sexe`, `admin`.`id_etat` AS `id_etat`, `admin`.`id_metier` AS `id_metier`, `admin`.`id_siege` AS `id_siege`, `admin`.`login` AS `login`, `admin`.`mdp` AS `mdp`, `etat`.`description` AS `etat`, `metier`.`titre` AS `titre`, `metier`.`role` AS `role` FROM ((`cme_administrateur` `admin` join `cme_etat` `etat` on(`etat`.`id_etat` = `admin`.`id_etat`)) join `cme_metier` `metier` on(`metier`.`id_metier` = `admin`.`id_metier`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_enfant`
--
DROP TABLE IF EXISTS `v_cme_enfant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_enfant`  AS SELECT `enf`.`id_enfant` AS `id_enfant`, `enf`.`num_matricule` AS `num_matricule_enf`, `enf`.`nom` AS `nom_enf`, `enf`.`prenom` AS `prenom_enf`, `enf`.`sexe` AS `sexe`, `mere`.`id_mere` AS `id_mere`, `mere`.`num_matricule` AS `num_matricule_mer`, `mere`.`nom` AS `nom_mere`, `mere`.`prenom` AS `prenom_mere`, `act`.`id_activite` AS `id_activite`, `act`.`type` AS `activite`, `etat`.`id_etat` AS `id_etat`, `etat`.`description` AS `etat`, `sad`.`id_sad` AS `id_sad`, `sad`.`num_matricule` AS `num_matricule_sad` FROM (((((`cme_enfant` `enf` join `cme_mere` `mere` on(`mere`.`id_mere` = `enf`.`id_mere`)) join `cme_activite` `act` on(`act`.`id_activite` = `enf`.`id_activite`)) join `cme_etat` `etat` on(`etat`.`id_etat` = `enf`.`id_etat`)) left join `cme_historique_enfant` `histo` on(`histo`.`id_enfant` = `enf`.`id_enfant` and `histo`.`id_mere` = `enf`.`id_mere`)) left join `cme_sad` `sad` on(`sad`.`id_enfant` = `enf`.`id_enfant`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_sad`
--
DROP TABLE IF EXISTS `v_cme_sad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_sad`  AS SELECT `enf`.`id_enfant` AS `id_enfant`, `enf`.`num_matricule` AS `num_matricule_enf`, `enf`.`nom` AS `nom`, `enf`.`prenom` AS `prenom`, `enf`.`sexe` AS `sexe`, `enf`.`date_naissance` AS `date_naissance`, `enf`.`id_etat` AS `id_etat`, `sad`.`id_sad` AS `id_sad`, `sad`.`num_matricule` AS `num_matricule_sad`, `sad`.`date_envoye_en_Italie` AS `date_envoye_en_Italie`, `sad`.`date_adhesion` AS `date_adhesion`, `sad`.`frequence_de_payement` AS `frequence_de_payement`, `sad`.`num_liste` AS `num_liste`, `sad`.`observation` AS `observation`, `sad`.`adopt_progressive` AS `adopt_progressive` FROM (`cme_sad` `sad` join `cme_enfant` `enf` on(`enf`.`id_enfant` = `sad`.`id_enfant` and `enf`.`id_mere` = `sad`.`id_mere`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_scolarisation`
--
DROP TABLE IF EXISTS `v_cme_scolarisation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_scolarisation`  AS SELECT `scol`.`id_enfant` AS `id_enfant`, `scol`.`id_mere` AS `id_mere`, `scol`.`id_scolarisation` AS `id_scolarisation`, `scol`.`annee_scolaire` AS `annee_scolaire`, `scol`.`moyenne` AS `moyenne`, `scol`.`evaluation` AS `evaluation`, `scol`.`annee_ratee` AS `annee_ratee`, `ecole`.`nom_ecole` AS `nom_ecole`, `classe`.`nom_classe` AS `nom_classe` FROM ((`cme_scolarisation` `scol` join `cme_ecole` `ecole` on(`ecole`.`id_ecole` = `scol`.`id_ecole`)) join `cme_classe` `classe` on(`classe`.`id_classe` = `scol`.`id_classe`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_stat_nb_enfant`
--
DROP TABLE IF EXISTS `v_cme_stat_nb_enfant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_stat_nb_enfant`  AS SELECT (select count('id_enfant') AS `admis` from `v_cme_enfant` where `v_cme_enfant`.`id_etat` = '1') AS `admis`, (select count('id_enfant') AS `attente` from `v_cme_enfant` where `v_cme_enfant`.`id_etat` = '2') AS `attente`, (select count('id_enfant') AS `abandonne` from `v_cme_enfant` where `v_cme_enfant`.`id_etat` = '3') AS `abandonne`, (select count('id_enfant') AS `sad_actif` from `v_cme_enfant` where `v_cme_enfant`.`id_etat` = '1' and `v_cme_enfant`.`id_sad` > 0) AS `sad_actif`, (select count('id_enfant') AS `sad_non_actif` from `v_cme_enfant` where `v_cme_enfant`.`id_etat` > '1' and `v_cme_enfant`.`id_sad` > 0) AS `sad_non_actif`, (select count('id_enfant') AS `total` from `cme_enfant`) AS `total` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_stock`
--
DROP TABLE IF EXISTS `v_cme_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_stock`  AS SELECT `stock`.`id_stock` AS `id_stock`, `stock`.`description` AS `description`, `stock`.`qte_entree` AS `qte_entree`, `stock`.`qte_sortie` AS `qte_sortie`, `stock`.`date_action` AS `date_action`, `stock`.`observation` AS `observation`, `article`.`designation` AS `article`, `unite`.`unite` AS `unite` FROM ((`cme_stock` `stock` join `cme_article` `article` on(`article`.`id_article` = `stock`.`id_article`)) join `cme_unite` `unite` on(`unite`.`id_unite` = `stock`.`id_unite`)) ORDER BY `article`.`designation` ASC, `stock`.`description` ASC, `stock`.`date_action` ASC ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_cme_stock_restant`
--
DROP TABLE IF EXISTS `v_cme_stock_restant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cme_stock_restant`  AS SELECT `stock`.`description` AS `description`, `stock`.`article` AS `article`, `stock`.`unite` AS `unite`, coalesce(sum(`stock`.`qte_entree`),0) AS `total_entree`, coalesce(sum(`stock`.`qte_sortie`),0) AS `total_sortie`, round(coalesce(sum(`stock`.`qte_entree`) - sum(`stock`.`qte_sortie`),0),2) AS `qte_restant` FROM `v_cme_stock` AS `stock` GROUP BY `stock`.`description`, `stock`.`article`, `stock`.`unite` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cme_activite`
--
ALTER TABLE `cme_activite`
  ADD PRIMARY KEY (`id_activite`);

--
-- Index pour la table `cme_administrateur`
--
ALTER TABLE `cme_administrateur`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `num_matricule` (`num_matricule`),
  ADD KEY `cme_titre_cme_administrateur_fk` (`id_metier`),
  ADD KEY `cme_etat_cme_administrateur_fk` (`id_etat`);

--
-- Index pour la table `cme_article`
--
ALTER TABLE `cme_article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `cme_classe`
--
ALTER TABLE `cme_classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `cme_ecole`
--
ALTER TABLE `cme_ecole`
  ADD PRIMARY KEY (`id_ecole`);

--
-- Index pour la table `cme_enfant`
--
ALTER TABLE `cme_enfant`
  ADD PRIMARY KEY (`id_enfant`,`id_mere`),
  ADD UNIQUE KEY `num_matricule` (`num_matricule`),
  ADD KEY `cme_activite_cme_enfant_fk` (`id_activite`),
  ADD KEY `cme_mere_cme_utilisateur_fk` (`id_mere`);

--
-- Index pour la table `cme_etat`
--
ALTER TABLE `cme_etat`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `cme_historique_enfant`
--
ALTER TABLE `cme_historique_enfant`
  ADD PRIMARY KEY (`id_histo`),
  ADD KEY `cme_enfant_cme_historique_enfant_fk` (`id_enfant`,`id_mere`);

--
-- Index pour la table `cme_mere`
--
ALTER TABLE `cme_mere`
  ADD PRIMARY KEY (`id_mere`),
  ADD UNIQUE KEY `num_matricule` (`num_matricule`);

--
-- Index pour la table `cme_metier`
--
ALTER TABLE `cme_metier`
  ADD PRIMARY KEY (`id_metier`);

--
-- Index pour la table `cme_mois`
--
ALTER TABLE `cme_mois`
  ADD PRIMARY KEY (`id_mois`);

--
-- Index pour la table `cme_pointage`
--
ALTER TABLE `cme_pointage`
  ADD PRIMARY KEY (`id_pointage`),
  ADD KEY `cme_activite_cme_pointage_fk` (`id_activite`),
  ADD KEY `cme_enfant_cme_pointage_fk` (`id_enfant`,`id_mere`);

--
-- Index pour la table `cme_pointage_admin`
--
ALTER TABLE `cme_pointage_admin`
  ADD PRIMARY KEY (`id_pointage_admin`),
  ADD KEY `cme_administrateur_cme_pointage_admin_fk` (`id_admin`);

--
-- Index pour la table `cme_sad`
--
ALTER TABLE `cme_sad`
  ADD PRIMARY KEY (`id_sad`,`id_enfant`,`id_mere`),
  ADD UNIQUE KEY `num_matricule` (`num_matricule`),
  ADD KEY `cme_enfant_cme_sad_fk` (`id_enfant`,`id_mere`);

--
-- Index pour la table `cme_scolarisation`
--
ALTER TABLE `cme_scolarisation`
  ADD PRIMARY KEY (`id_scolarisation`),
  ADD KEY `cme_ecole_cme_scolarisation_fk` (`id_ecole`),
  ADD KEY `cme_classe_cme_scolarisation_fk` (`id_classe`),
  ADD KEY `cme_enfant_cme_scolarisation_fk` (`id_enfant`,`id_mere`);

--
-- Index pour la table `cme_stock`
--
ALTER TABLE `cme_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `unite_cme_stock_fk` (`id_unite`),
  ADD KEY `cme_article_cme_stock_fk` (`id_article`);

--
-- Index pour la table `cme_unite`
--
ALTER TABLE `cme_unite`
  ADD PRIMARY KEY (`id_unite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cme_activite`
--
ALTER TABLE `cme_activite`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cme_administrateur`
--
ALTER TABLE `cme_administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cme_article`
--
ALTER TABLE `cme_article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cme_classe`
--
ALTER TABLE `cme_classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `cme_ecole`
--
ALTER TABLE `cme_ecole`
  MODIFY `id_ecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `cme_enfant`
--
ALTER TABLE `cme_enfant`
  MODIFY `id_enfant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `cme_etat`
--
ALTER TABLE `cme_etat`
  MODIFY `id_etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cme_historique_enfant`
--
ALTER TABLE `cme_historique_enfant`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `cme_mere`
--
ALTER TABLE `cme_mere`
  MODIFY `id_mere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `cme_metier`
--
ALTER TABLE `cme_metier`
  MODIFY `id_metier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cme_mois`
--
ALTER TABLE `cme_mois`
  MODIFY `id_mois` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cme_pointage`
--
ALTER TABLE `cme_pointage`
  MODIFY `id_pointage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `cme_pointage_admin`
--
ALTER TABLE `cme_pointage_admin`
  MODIFY `id_pointage_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `cme_sad`
--
ALTER TABLE `cme_sad`
  MODIFY `id_sad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `cme_scolarisation`
--
ALTER TABLE `cme_scolarisation`
  MODIFY `id_scolarisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `cme_stock`
--
ALTER TABLE `cme_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cme_unite`
--
ALTER TABLE `cme_unite`
  MODIFY `id_unite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cme_administrateur`
--
ALTER TABLE `cme_administrateur`
  ADD CONSTRAINT `cme_etat_cme_administrateur_fk` FOREIGN KEY (`id_etat`) REFERENCES `cme_etat` (`id_etat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cme_titre_cme_administrateur_fk` FOREIGN KEY (`id_metier`) REFERENCES `cme_metier` (`id_metier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_enfant`
--
ALTER TABLE `cme_enfant`
  ADD CONSTRAINT `cme_activite_cme_enfant_fk` FOREIGN KEY (`id_activite`) REFERENCES `cme_activite` (`id_activite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cme_mere_cme_utilisateur_fk` FOREIGN KEY (`id_mere`) REFERENCES `cme_mere` (`id_mere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_historique_enfant`
--
ALTER TABLE `cme_historique_enfant`
  ADD CONSTRAINT `cme_enfant_cme_historique_enfant_fk` FOREIGN KEY (`id_enfant`,`id_mere`) REFERENCES `cme_enfant` (`id_enfant`, `id_mere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_pointage`
--
ALTER TABLE `cme_pointage`
  ADD CONSTRAINT `cme_activite_cme_pointage_fk` FOREIGN KEY (`id_activite`) REFERENCES `cme_activite` (`id_activite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cme_enfant_cme_pointage_fk` FOREIGN KEY (`id_enfant`,`id_mere`) REFERENCES `cme_enfant` (`id_enfant`, `id_mere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_pointage_admin`
--
ALTER TABLE `cme_pointage_admin`
  ADD CONSTRAINT `cme_administrateur_cme_pointage_admin_fk` FOREIGN KEY (`id_admin`) REFERENCES `cme_administrateur` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_sad`
--
ALTER TABLE `cme_sad`
  ADD CONSTRAINT `cme_enfant_cme_sad_fk` FOREIGN KEY (`id_enfant`,`id_mere`) REFERENCES `cme_enfant` (`id_enfant`, `id_mere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_scolarisation`
--
ALTER TABLE `cme_scolarisation`
  ADD CONSTRAINT `cme_classe_cme_scolarisation_fk` FOREIGN KEY (`id_classe`) REFERENCES `cme_classe` (`id_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cme_ecole_cme_scolarisation_fk` FOREIGN KEY (`id_ecole`) REFERENCES `cme_ecole` (`id_ecole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cme_enfant_cme_scolarisation_fk` FOREIGN KEY (`id_enfant`,`id_mere`) REFERENCES `cme_enfant` (`id_enfant`, `id_mere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cme_stock`
--
ALTER TABLE `cme_stock`
  ADD CONSTRAINT `cme_article_cme_stock_fk` FOREIGN KEY (`id_article`) REFERENCES `cme_article` (`id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unite_cme_stock_fk` FOREIGN KEY (`id_unite`) REFERENCES `cme_unite` (`id_unite`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
