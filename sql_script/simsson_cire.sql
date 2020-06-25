-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 25 juin 2020 à 17:37
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simsson_cire`
--

-- --------------------------------------------------------

--
-- Structure de la table `email_reservations`
--

CREATE TABLE `email_reservations` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `produit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `email_reservations`
--

INSERT INTO `email_reservations` (`id`, `email`, `produit`) VALUES
(1, 'cidmarcoux@gmail.com', 'version de pas base');

-- --------------------------------------------------------

--
-- Structure de la table `sub_disco_produits`
--

CREATE TABLE `sub_disco_produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `prix` varchar(250) NOT NULL,
  `desc1` text NOT NULL,
  `desc2` text NOT NULL,
  `desc3` text NOT NULL,
  `desc4` text NOT NULL,
  `desc5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_disco_produits`
--

INSERT INTO `sub_disco_produits` (`id`, `nom`, `img`, `prix`, `desc1`, `desc2`, `desc3`, `desc4`, `desc5`) VALUES
(1, 'Version de base', 'Sub-disco-1', '1250,99$', 'Bonne pour deux utilisations.', 'Elle attire 50 % des molécule atomique 15 pied autour de l\'utilisateur.', 'Pour plus de sécurité elle est impossible à modifier.', 'Elle est blanche.', ''),
(2, 'version de pas base', 'Sub-disco-2', '3050.74$', 'Bonne pour deux utilisations.', 'Elle attire 25 % des molécule atomique 10 pied autour de l\'utilisateur.', 'Pour plus de sécurité elle est trempée dans un plastique qui la rend\r\nmonobloc et impénétrable.', 'Elle est de couleur pastel', ''),
(3, 'version de gros gros luxe', 'Sub-disco-3', '10287.23$', 'Bonne pour deux utilisations.', 'Elle n\'attire aucune molécule nocive.', 'Pour plus de sécurité elle est trempée dans un plastique qui la rend\r\nmonobloc et impénétrable qui elle est recouverte d’une couche d’acier\r\npour plus d’impénétrabilité.', 'De plus une couverture de fonte permet de ne pas le perdre car au poids\r\nqu\'il a vous ne pouvez l\'oublier!', 'Elle a deux choix de couleurs vive Rouge ou brun vif.');

-- --------------------------------------------------------

--
-- Structure de la table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_admin`
--

INSERT INTO `user_admin` (`id`, `user`, `password`) VALUES
(1, 'root', 'root');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `email_reservations`
--
ALTER TABLE `email_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_disco_produits`
--
ALTER TABLE `sub_disco_produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `email_reservations`
--
ALTER TABLE `email_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sub_disco_produits`
--
ALTER TABLE `sub_disco_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
