-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 mars 2022 à 08:51
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
-- Index pour les tables déchargées
--

--
-- Index pour la table `cme_mere`
--
ALTER TABLE `cme_mere`
  ADD PRIMARY KEY (`id_mere`),
  ADD UNIQUE KEY `num_matricule` (`num_matricule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cme_mere`
--
ALTER TABLE `cme_mere`
  MODIFY `id_mere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
