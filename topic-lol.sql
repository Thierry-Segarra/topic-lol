-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 06 nov. 2022 à 18:53
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `topic-lol`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenue` varchar(256) NOT NULL,
  `pseudo_user` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `date`, `contenue`, `pseudo_user`, `id_user`, `id_topic`) VALUES
(12, '2022-10-22', 'e&quot;zstsetes', 'mast', 2, 3),
(13, '2022-10-22', 'e&quot;zstsetes', 'mast', 2, 3),
(14, '2022-10-22', 'test1', 'mast', 2, 2),
(15, '2022-11-06', 'qsvqvsqvsqv', 'mast', 1, 1),
(18, '2022-11-06', 'indise je joue h 24 au lieu de travailler\r\n\r\n\r\nje suis je suis ALEXENDRE', 'erxanpd', 5, 13),
(22, '2022-11-06', 'fqsqfqsf', 'erxanpd', 5, 13);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `titre`, `message`, `id_user`, `date_publication`) VALUES
(3, 'test', 'gesdgsdgsdg\r\n', 3, '2022-11-06 15:39:10'),
(4, 'sdgsdgsd', 'gsdgsdgdsgdsgsdg', 3, '2022-11-06 16:04:48'),
(5, 'dhrhdrhrdhdrh', 'drhdrhdrdr', 3, '2022-11-06 16:11:57'),
(6, 'drhdrhdrhdrhdrh', 'hdrhdrh', 3, '2022-11-06 16:12:00'),
(7, 'hrdhdrhdr', 'drhrdhdr', 3, '2022-11-06 16:12:03'),
(8, 'gdsgsdgsdg', 'sdgsdgsdgsdgsd', 3, '2022-11-06 16:12:08'),
(9, 'qsfqsfqsf', 'qsfsqfqsfqsfsqf', 3, '2022-11-06 16:12:15'),
(10, 'qsfqsqsfqsf', 'qsfsq', 3, '2022-11-06 16:12:17'),
(11, 'qsqsqs', 'fqsfqsfqsf', 4, '2022-11-06 16:42:21'),
(12, 'PD', 'PDPDPDPDPD', 4, '2022-11-06 16:42:29'),
(13, 'je usi erxan mais pas erwan ', 'enculé de mals Si tu ne comprends pas, ou ne maîtrises pas, la notion de coefficient binomial, inutile de chercher à calculer toi-même les nombres de Catalan, que tu découvris dans cette obscure revue américaine d\'algèbre, croyant qu\'il s\'agissait de “nomb', 5, '2022-11-06 17:22:14'),
(14, 'qsfsqfqsf', ' Si tu ne comprends pas, ou ne maîtrises pas, la notion de coefficient binomial, inutile de chercher à calculer toi-même les nombres de Catalan, que tu découvris dans cette obscure revue américaine d\'algèbre, croyant qu\'il s\'agissait de “nombres catalans” (l\'anglais Catalan numbers est équivoque), avant de faire le chemin historique et de découvrir qu\'ils auraient tout aussi bien pu se nommer suite d\'Euler, entiers de Seger, ou nombres de Ming Antu.\r\n\r\nDes textes en 16.796 signes ? Un roman de 58.786 mots ? Tu n\'y penses pas !\r\n\r\n  Si tu ne comprends pas, ou ne maîtrises pas, la notion de coefficient binomial, inutile de chercher à calculer toi-même les nombres de Catalan, que tu découvris dans cette obscure revue américaine d\'algèbre, croyant qu\'il s\'agissait de “nombres catalans” (l\'anglais Catalan numbers est équivoque), avant de faire le chemin historique et de découvrir qu\'ils auraient tout aussi bien pu se nommer suite d\'Euler, entiers de Seger, ou nombres de Ming Antu.\r\n\r\nDes textes en 16.796 signes ? Un roman de 58.786 mots ? Tu n\'y penses pas !\r\n\r\n ', 5, '2022-11-06 17:23:42');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(25) DEFAULT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `role`, `date_inscription`) VALUES
(3, '', '', 'mast', '', '0900e541147919e8c782dd33de06d8c3', 'admin', '2022-11-06 16:03:40'),
(4, '', '', 'erwan', '', '929615fb29de3208e05d4a978df7e857', NULL, '2022-11-06 17:43:06'),
(5, '', '', 'erxanpd', '', '34f3ea67901f3ee943ca23d6933459d3', NULL, '2022-11-06 17:21:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
