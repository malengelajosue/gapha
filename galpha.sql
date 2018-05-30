-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 06:30 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `id` int(11) NOT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `dateAppro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvisionnement`
--

INSERT INTO `approvisionnement` (`id`, `idArticle`, `idUtilisateur`, `quantite`, `dateAppro`) VALUES
(1, 2, NULL, 10, '2018-04-21 00:00:00'),
(2, 2, NULL, 9, '2018-04-21 00:00:00'),
(3, 2, NULL, 9, '2018-04-21 00:00:00'),
(4, 2, NULL, 120, '2018-04-21 00:00:00'),
(5, 2, NULL, 10, '2018-04-21 00:00:00'),
(6, 3, NULL, 20, '2018-02-05 00:00:00'),
(7, 2, NULL, 20, '2018-02-05 00:00:00'),
(8, 2, NULL, 20, '2018-02-05 00:00:00'),
(9, 1, NULL, 20, '2018-02-05 00:00:00'),
(10, 3, NULL, 30, '0000-00-00 00:00:00'),
(11, 3, NULL, 30, '0000-00-00 00:00:00'),
(12, 1, NULL, 30, '0000-00-00 00:00:00'),
(13, 1, NULL, 5, '2018-04-26 14:15:38'),
(14, 3, 1, 30, '2018-05-07 13:36:02'),
(15, 1, 1, 5, '2018-05-15 10:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `codeArticle` varchar(50) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `prix` double(11,2) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `idFournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `codeArticle`, `designation`, `stock`, `prix`, `idCategorie`, `idFournisseur`) VALUES
(1, '98645132', 'Tomate', 5, 10.00, 3, 2),
(2, '456789', 'Salade', 0, 20.00, 2, 2),
(3, '4545454', 'Haricot', 35, 30.00, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'premiere', 'premiere'),
(2, 'deuxieme', 'deuxieme'),
(3, 'Categorie 1', 'description de la categorie 1');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(60) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `adresse`, `tel`, `email`) VALUES
(2, 'josue', 'mai', '4567890', 'ssg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detailVente`
--

CREATE TABLE `detailVente` (
  `id` int(11) NOT NULL,
  `numFacture` varchar(20) DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `total` double(10,2) DEFAULT NULL,
  `dateVente` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailVente`
--

INSERT INTO `detailVente` (`id`, `numFacture`, `idArticle`, `idClient`, `quantite`, `discount`, `total`, `dateVente`, `idUtilisateur`) VALUES
(20, '2147483647', 3, 2, 1, 0, 10.00, '2018-04-24 22:57:42', 1),
(21, '2147483647', 2, 2, 1, 0, 20.00, '2018-04-24 23:02:38', 1),
(22, '180424230342', 1, 2, 1, 0, 10.00, '2018-04-24 23:03:51', 1),
(23, '180426092453', 2, 2, 13, 0, 260.00, '2018-04-26 11:05:16', 1),
(24, '180426092453', 3, 2, 2, 0, 20.00, '2018-04-26 11:05:17', 1),
(25, '180426092453', 1, 2, 16, 0, 160.00, '2018-04-26 11:05:17', 1),
(26, '180426110541', 2, 2, 10, 0, 232.00, '2018-04-26 11:39:18', 1),
(27, '180426110541', 3, 2, 4, 0, 46.40, '2018-04-26 11:39:18', 1),
(28, '180426110541', 1, 2, 3, 0, 34.80, '2018-04-26 11:39:19', 1),
(29, '180426114228', 2, 2, 8, 0, 185.60, '2018-04-26 11:42:46', 1),
(30, '180426115304', 3, 2, 1, 0, 11.60, '2018-04-26 11:53:21', 1),
(31, '1805040933195', 3, 2, 1, 0, 34.80, '2018-05-04 11:59:02', 1),
(32, '1805040933195', 2, 2, 10, 0, 232.00, '2018-05-04 11:59:03', 1),
(33, '1805040933195', 1, 2, 14, 0, 162.40, '2018-05-04 11:59:03', 1),
(34, '1805041159413', 2, 2, 1, 0, 23.20, '2018-05-04 12:00:45', 1),
(35, '18050412012936', 2, 2, 1, 0, 23.20, '2018-05-04 12:01:34', 1),
(36, '18050412030844', 2, 2, 1, 0, 23.20, '2018-05-04 12:03:14', 1),
(37, '18050412055546', 2, 2, 1, 0, 23.20, '2018-05-04 12:11:36', 1),
(38, '18050413320423', 2, 2, 10, 0, 232.00, '2018-05-04 13:35:04', 1),
(39, '18050413320423', 3, 2, 3, 0, 104.40, '2018-05-04 13:35:04', 1),
(40, '18050413370213', 2, 2, 1, 0, 23.20, '2018-05-04 13:37:19', 1),
(41, '18050413412431', 2, 2, 1, 0, 23.20, '2018-05-04 13:41:55', 1),
(42, '18050413442618', 3, 2, 1, 0, 34.80, '2018-05-04 13:44:33', 1),
(43, '1805070841173', 2, 2, 1, 0, 23.20, '2018-05-07 09:42:16', 1),
(44, '1805070841173', 1, 2, 1, 0, 11.60, '2018-05-07 09:42:17', 1),
(45, '18050709433331', 2, 2, 1, 0, 23.20, '2018-05-07 09:43:43', 1),
(46, '18050709470844', 2, 2, 1, 0, 23.20, '2018-05-07 09:57:58', 1),
(47, '18050709585610', 2, 2, 1, 0, 23.20, '2018-05-07 10:14:44', 1),
(48, '18050710151943', 3, 2, 1, 0, 34.80, '2018-05-07 10:15:31', 1),
(49, '18050710161431', 3, 2, 1, 0, 34.80, '2018-05-07 10:16:30', 1),
(50, '18050710171622', 3, 2, 1, 0, 34.80, '2018-05-07 10:17:28', 1),
(51, '18050710180442', 2, 2, 1, 0, 23.20, '2018-05-07 10:18:17', 1),
(52, '18050710180442', 2, 2, 1, 0, 23.20, '2018-05-07 10:21:59', 1),
(53, '18050710252212', 3, 2, 1, 0, 34.80, '2018-05-07 10:25:34', 1),
(54, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:37:10', 1),
(55, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:38:01', 1),
(56, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:40:37', 1),
(57, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:41:23', 1),
(58, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:41:35', 1),
(59, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:41:52', 1),
(60, '18050710360532', 1, 2, 1, 0, 11.60, '2018-05-07 10:42:02', 1),
(61, '1805071046154', 3, 2, 1, 0, 34.80, '2018-05-07 10:48:51', 1),
(62, '1805071050064', 3, 2, 1, 0, 34.80, '2018-05-07 10:50:15', 1),
(63, '18050710505723', 3, 2, 1, 0, 34.80, '2018-05-07 10:51:03', 1),
(64, '18050710513614', 2, 2, 1, 0, 23.20, '2018-05-07 10:51:49', 1),
(65, '18050710525617', 2, 2, 1, 0, 23.20, '2018-05-07 10:53:42', 1),
(66, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 10:57:01', 1),
(67, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 10:57:32', 1),
(68, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 10:57:37', 1),
(69, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 10:57:44', 1),
(70, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 10:58:09', 1),
(71, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:02:10', 1),
(72, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:03:08', 1),
(73, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:03:26', 1),
(74, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:04:07', 1),
(75, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:04:27', 1),
(76, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:05:28', 1),
(77, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:06:09', 1),
(78, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:07:15', 1),
(79, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:10:20', 1),
(80, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:12:59', 1),
(81, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:14:03', 1),
(82, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:15:08', 1),
(83, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:16:21', 1),
(84, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:18:18', 1),
(85, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:18:46', 1),
(86, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:19:26', 1),
(87, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:21:22', 1),
(88, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:23:09', 1),
(89, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:28:38', 1),
(90, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:31:17', 1),
(91, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:32:05', 1),
(92, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:32:13', 1),
(93, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:32:42', 1),
(94, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:37:03', 1),
(95, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:39:00', 1),
(96, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:39:33', 1),
(97, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:40:47', 1),
(98, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:46:05', 1),
(99, '18050710564927', 3, 2, 1, 0, 34.80, '2018-05-07 11:46:19', 1),
(100, '1805071146271', 2, 2, 1, 0, 23.20, '2018-05-07 11:46:35', 1),
(101, '1805071146271', 1, 2, 1, 0, 11.60, '2018-05-07 11:46:36', 1),
(102, '1805071146271', 3, 2, 1, 0, 34.80, '2018-05-07 11:46:36', 1),
(103, '1805071146271', 2, 2, 1, 0, 23.20, '2018-05-07 11:47:18', 1),
(104, '1805071146271', 1, 2, 1, 0, 11.60, '2018-05-07 11:47:18', 1),
(105, '1805071146271', 3, 2, 1, 0, 34.80, '2018-05-07 11:47:18', 1),
(106, '18050711490925', 2, 2, 13, 0, 301.60, '2018-05-07 11:49:28', 1),
(107, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 12:53:01', 1),
(108, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 12:53:18', 1),
(109, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 13:08:20', 1),
(110, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 13:17:28', 1),
(111, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 13:17:43', 1),
(112, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 13:18:05', 1),
(113, '18050711513214', 3, 2, 1, 0, 34.80, '2018-05-07 15:07:58', 1),
(114, '18050808502349', 3, 2, 1, 0, 34.80, '2018-05-08 08:50:58', 1),
(115, '18050808502349', 3, 2, 1, 0, 34.80, '2018-05-08 08:51:14', 1),
(116, '18050808502349', 3, 2, 1, 0, 34.80, '2018-05-08 09:00:31', 1),
(117, '18050809022845', 3, 2, 1, 0, 34.80, '2018-05-08 09:02:46', 1),
(118, '18050809050338', 2, 2, 1, 2, 22.74, '2018-05-08 09:08:23', 1),
(119, '18050809050338', 1, 2, 7, 2, 79.58, '2018-05-08 09:08:24', 1),
(120, '18051509411844', 3, 2, 1, 0, 34.80, '2018-05-15 09:42:01', 0),
(121, '18051509441042', 2, 2, 1, 0, 23.20, '2018-05-15 09:44:19', 0),
(122, '18051509464011', 2, 2, 8, 0, 185.60, '2018-05-15 09:47:04', 0),
(123, '18051509532744', 2, 2, 1, 0, 23.20, '2018-05-15 09:53:49', 1),
(124, '18051509532744', 3, 2, 5, 0, 174.00, '2018-05-15 09:53:49', 1),
(125, '1805151007501', 1, 2, 4, 0, 46.40, '2018-05-15 10:08:03', 1),
(126, '18051511101824', 2, 2, 22, 0, 510.40, '2018-05-15 11:10:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `nomResponsable` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `tel`, `email`, `adresse`, `nomResponsable`) VALUES
(2, 'Fourninsseur1', '23456789', 'mail@mail.com', 'av fournisseur', 'Kaleb'),
(3, 'Fournisseur2', '345678', 'mail@mail.com', 'av fournisseur2', 'Patrick');

-- --------------------------------------------------------

--
-- Table structure for table `prixArticle`
--

CREATE TABLE `prixArticle` (
  `id` int(11) NOT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `prix` double(10,5) DEFAULT NULL,
  `dateFixation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prixArticle`
--

INSERT INTO `prixArticle` (`id`, `idArticle`, `prix`, `dateFixation`) VALUES
(1, 1, 10.00000, '2018-04-22 00:00:00'),
(2, 3, 10.00000, '2018-02-05 00:00:00'),
(3, 2, 20.00000, '2018-02-05 00:00:00'),
(4, 3, 60.00000, '0000-00-00 00:00:00'),
(5, 3, 30.00000, '0000-00-00 00:00:00'),
(6, 3, 30.00000, '2018-04-26 14:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `typeUtilisateur`
--

CREATE TABLE `typeUtilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeUtilisateur`
--

INSERT INTO `typeUtilisateur` (`id`, `nom`, `description`) VALUES
(1, 'administrateur', 'Cet utilisateur aura acces a toutes les fonctionalites du logiciel.'),
(2, 'Employe', 'Ce type concerne les employés simple de l\' entreprise');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dateNaissance` datetime DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `matricule` varchar(30) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `dateNaissance`, `tel`, `email`, `matricule`, `pwd`, `idType`) VALUES
(1, 'Kazadi', 'Kelnga', '0000-00-00 00:00:00', '964513', 'mail@mail.com', 'ka0001', '1234', 1),
(2, 'emp1', 'emp1', '2018-05-03 23:34:08', 'fghjhkj', 'mail@mail.com2', '', '123', 2),
(3, 'MWAMBA', 'George', '2018-05-04 13:16:03', '4865132', 'mwamba@gmail.com', 'mg002', '12345678', 2),
(4, 'KALALA', 'Addo', '2018-05-22 16:50:10', '08216548', 'kalaladdo@gmail.com', 'ka0005', '123456789', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_approvisionnement`
-- (See below for the actual view)
--
CREATE TABLE `v_approvisionnement` (
`id` int(11)
,`idArticle` varchar(255)
,`idUtilisateur` varchar(101)
,`quantite` int(11)
,`dateAppro` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_article`
-- (See below for the actual view)
--
CREATE TABLE `v_article` (
`id` int(11)
,`codeArticle` varchar(50)
,`designation` varchar(255)
,`stock` int(11)
,`prix` double(11,2)
,`idCategorie` varchar(50)
,`idFournisseur` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bestseller`
-- (See below for the actual view)
--
CREATE TABLE `v_bestseller` (
`id` int(11)
,`codeArticle` varchar(50)
,`designation` varchar(255)
,`stock` int(11)
,`prix` double(11,2)
,`idCategorie` varchar(50)
,`idFournisseur` varchar(50)
,`totalVente` bigint(21)
,`mois` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detailVente`
-- (See below for the actual view)
--
CREATE TABLE `v_detailVente` (
`id` int(11)
,`numFacture` varchar(20)
,`idArticle` varchar(255)
,`idClient` varchar(50)
,`quantite` int(11)
,`total` double(10,2)
,`idUtilisateur` varchar(101)
,`dateVente` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prixArticle`
-- (See below for the actual view)
--
CREATE TABLE `v_prixArticle` (
`id` int(11)
,`idArticle` varchar(255)
,`prix` double(10,5)
,`dateFixation` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_utilisateur`
-- (See below for the actual view)
--
CREATE TABLE `v_utilisateur` (
`id` int(11)
,`nom` varchar(50)
,`prenom` varchar(50)
,`dateNaissance` datetime
,`matricule` varchar(30)
,`tel` varchar(20)
,`email` varchar(50)
,`pwd` varchar(255)
,`idType` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_approvisionnement`
--
DROP TABLE IF EXISTS `v_approvisionnement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_approvisionnement`  AS  select `app`.`id` AS `id`,`a`.`designation` AS `idArticle`,concat(`u`.`prenom`,' ',`u`.`nom`) AS `idUtilisateur`,`app`.`quantite` AS `quantite`,`app`.`dateAppro` AS `dateAppro` from ((`approvisionnement` `app` join `article` `a` on((`a`.`id` = `app`.`idArticle`))) left join `utilisateur` `u` on((`u`.`id` = `app`.`idUtilisateur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_article`
--
DROP TABLE IF EXISTS `v_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_article`  AS  select `a`.`id` AS `id`,`a`.`codeArticle` AS `codeArticle`,`a`.`designation` AS `designation`,`a`.`stock` AS `stock`,`a`.`prix` AS `prix`,`c`.`nom` AS `idCategorie`,`f`.`nom` AS `idFournisseur` from ((`article` `a` join `categorie` `c` on((`a`.`idCategorie` = `c`.`id`))) join `fournisseur` `f` on((`a`.`idFournisseur` = `f`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_bestseller`
--
DROP TABLE IF EXISTS `v_bestseller`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bestseller`  AS  select `a`.`id` AS `id`,`a`.`codeArticle` AS `codeArticle`,`a`.`designation` AS `designation`,`a`.`stock` AS `stock`,`a`.`prix` AS `prix`,`c`.`nom` AS `idCategorie`,`f`.`nom` AS `idFournisseur`,count(0) AS `totalVente`,month(sysdate()) AS `mois` from (((`article` `a` join `detailVente` `d` on((`d`.`idArticle` = `a`.`id`))) join `categorie` `c` on((`c`.`id` = `a`.`idCategorie`))) join `fournisseur` `f` on((`f`.`id` = `a`.`idFournisseur`))) where (month(`d`.`dateVente`) = month(sysdate())) group by `d`.`idArticle`,`a`.`idCategorie`,`a`.`idFournisseur` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_detailVente`
--
DROP TABLE IF EXISTS `v_detailVente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detailVente`  AS  select `d`.`id` AS `id`,`d`.`numFacture` AS `numFacture`,`a`.`designation` AS `idArticle`,`c`.`nom` AS `idClient`,`d`.`quantite` AS `quantite`,`d`.`total` AS `total`,concat(`u`.`nom`,' ',`u`.`prenom`) AS `idUtilisateur`,`d`.`dateVente` AS `dateVente` from (((`detailVente` `d` left join `client` `c` on((`c`.`id` = `d`.`idClient`))) left join `article` `a` on((`a`.`id` = `d`.`idArticle`))) join `utilisateur` `u` on((`u`.`id` = `d`.`idUtilisateur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_prixArticle`
--
DROP TABLE IF EXISTS `v_prixArticle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prixArticle`  AS  select `p`.`id` AS `id`,`a`.`designation` AS `idArticle`,`p`.`prix` AS `prix`,`p`.`dateFixation` AS `dateFixation` from (`prixArticle` `p` join `article` `a` on((`p`.`idArticle` = `a`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_utilisateur`
--
DROP TABLE IF EXISTS `v_utilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_utilisateur`  AS  select `u`.`id` AS `id`,`u`.`nom` AS `nom`,`u`.`prenom` AS `prenom`,`u`.`dateNaissance` AS `dateNaissance`,`u`.`matricule` AS `matricule`,`u`.`tel` AS `tel`,`u`.`email` AS `email`,`u`.`pwd` AS `pwd`,`t`.`nom` AS `idType` from (`utilisateur` `u` join `typeUtilisateur` `t` on((`u`.`idType` = `t`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_appro_article` (`idArticle`),
  ADD KEY `fk_appro_utilisateur` (`idUtilisateur`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_art_cat` (`idCategorie`),
  ADD KEY `fk_art_four` (`idFournisseur`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailVente`
--
ALTER TABLE `detailVente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_art` (`idArticle`),
  ADD KEY `fk_detail_client` (`idClient`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prixArticle`
--
ALTER TABLE `prixArticle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prix_art` (`idArticle`);

--
-- Indexes for table `typeUtilisateur`
--
ALTER TABLE `typeUtilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ut_type` (`idType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detailVente`
--
ALTER TABLE `detailVente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prixArticle`
--
ALTER TABLE `prixArticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `typeUtilisateur`
--
ALTER TABLE `typeUtilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `fk_appro_article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_appro_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_art_cat` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `fk_art_four` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`id`);

--
-- Constraints for table `detailVente`
--
ALTER TABLE `detailVente`
  ADD CONSTRAINT `fk_detail_art` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_detail_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Constraints for table `prixArticle`
--
ALTER TABLE `prixArticle`
  ADD CONSTRAINT `fk_prix_art` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_ut_type` FOREIGN KEY (`idType`) REFERENCES `typeUtilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
