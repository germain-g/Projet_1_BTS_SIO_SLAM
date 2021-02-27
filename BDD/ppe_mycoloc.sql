-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 fév. 2021 à 00:12
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ppe_mycoloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `mycoloc_bdd`
--

CREATE TABLE `mycoloc_bdd` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `option_annonceur` varchar(255) NOT NULL,
  `annonces` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mycoloc_bdd`
--

INSERT INTO `mycoloc_bdd` (`id`, `prenom`, `nom`, `mail`, `mot_de_passe`, `option_annonceur`, `annonces`) VALUES
(1, 'Marc', 'DUBOIS', 'marc@yahoo.fr', '1234', 'Je cherche une chambre', 'Bonjour à tous, moi c\'est Marc ingénieur en informatique, je recherche une colocation en île de france\r\navec un budget de 600 euros.'),
(2, 'Lise', 'DEPP', 'lise@gmail.com', '7853', 'Je propose un logement', 'Bonjour, moi c\'est Lise propriétaire d\'un appartement dans le val de marne que je met à disposition pour une colocation.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mycoloc_bdd`
--
ALTER TABLE `mycoloc_bdd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mycoloc_bdd`
--
ALTER TABLE `mycoloc_bdd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
