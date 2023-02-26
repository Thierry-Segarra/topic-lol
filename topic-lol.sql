-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 04:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topic-lol`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
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
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `date`, `contenue`, `pseudo_user`, `id_user`, `id_topic`) VALUES
(12, '2022-10-22', 'e&quot;zstsetes', 'mast', 2, 3),
(13, '2022-10-22', 'e&quot;zstsetes', 'mast', 2, 3),
(14, '2022-10-22', 'test1', 'mast', 2, 2),
(15, '2022-11-06', 'qsvqvsqvsqv', 'mast', 1, 1),
(23, '2022-11-06', 'fdp', 'mast', 3, 14),
(26, '2022-11-06', 'fqsfqsfqs', 'mast', 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `titre`, `message`, `id_user`, `date_publication`) VALUES
(4, 'sdgsdgsd', 'gsdgsdgdsgdsgsdg', 3, '2022-11-06 16:04:48'),
(5, 'dhrhdrhrdhdrh', 'drhdrhdrdr', 3, '2022-11-06 16:11:57'),
(6, 'drhdrhdrhdrhdrh', 'hdrhdrh', 3, '2022-11-06 16:12:00'),
(7, 'hrdhdrhdr', 'drhrdhdr', 3, '2022-11-06 16:12:03'),
(8, 'gdsgsdgsdg', 'sdgsdgsdgsdgsd', 3, '2022-11-06 16:12:08'),
(9, 'qsfqsfqsf', 'qsfsqfqsfqsfsqf', 3, '2022-11-06 16:12:15'),
(10, 'qsfqsqsfqsf', 'qsfsq', 3, '2022-11-06 16:12:17'),
(11, 'qsqsqs', 'fqsfqsfqsf', 4, '2022-11-06 16:42:21'),
(12, 'PD', 'PDPDPDPDPD', 4, '2022-11-06 16:42:29'),
(16, 'sqsqfqs', 'fsqfqsfqsfsqf', 3, '2022-11-06 21:23:32'),
(17, 'sqfqsfqs', 'fsfqsfqsfqsffq', 3, '2022-11-06 21:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `role`, `date_inscription`) VALUES
(3, '', '', 'mast', '', '0900e541147919e8c782dd33de06d8c3', 'admin', '2022-11-06 16:03:40'),
(4, '', '', 'erwan', '', '929615fb29de3208e05d4a978df7e857', NULL, '2022-11-06 17:43:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
