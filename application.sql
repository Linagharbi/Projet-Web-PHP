-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 23 mai 2018 à 23:21
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `application`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `ID_archive` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date_naissance` date NOT NULL,
  `role` int(1) NOT NULL,
  `login` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_archive`),
  KEY `ID_utilisateur` (`ID_utilisateur`),
  KEY `ID_utilisateur_2` (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ID_event` int(11) NOT NULL AUTO_INCREMENT,
  `ID_exp` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `categories` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_event`),
  KEY `ID_exp` (`ID_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`ID_event`, `ID_exp`, `details`, `date`, `categories`) VALUES
(2, 66, 'évènement de ...', '2018-05-10', 'Evènement'),
(3, 65, 'on a un projet ..', '2018-05-04', 'Important'),
(4, 66, 'gfhsf', '2018-05-12', 'Important');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_dest` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `sujet` varchar(150) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `date_env` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `flag_arch` int(11) NOT NULL DEFAULT '0',
  `flag_lu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_message`),
  KEY `id_dest` (`id_dest`),
  KEY `id_exp` (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_message`, `id_dest`, `id_exp`, `sujet`, `objet`, `date_env`, `file`, `flag_arch`, `flag_lu`) VALUES
(51, 66, 66, 'J\'ai un projet à traiter ..&nbsp;', 'Projet', '2018-05-04', 'C:/wamp642/www/web/main/images/', 1, 1),
(55, 66, 65, 'Un nouveau projet à traiter', 'Projet', '2018-05-11', 'C:/wamp642/www/web/main/images/', 0, 1),
(56, 72, 65, 'vous avez une formation en .. à ..', 'Formation', '2018-05-11', 'C:/wamp642/www/web/main/images/', 0, 1),
(58, 65, 66, 'Bien reçu', 'reçu', '2018-05-11', 'C:/wamp642/www/web/main/images/', 1, 1),
(59, 72, 66, 'Vous avez une tâche à faire', 'tâche à faire', '2018-05-11', 'C:/wamp642/www/web/main/images/', 0, 0),
(60, 75, 66, 'On a un réunion à ...', 'Reunion', '2018-05-11', 'C:/wamp642/www/web/main/images/', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `ID_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `flag_pr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_projet`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`ID_projet`, `nom`, `date_debut`, `date_fin`, `description`, `statut`, `user`, `flag_pr`) VALUES
(67, 'Projet 1', '2018-01-05', '2018-04-20', 'projet de gestion', 'Nouveau', 66, 1),
(68, 'Projet 2', '2018-02-01', '2018-05-26', 'projet de crédit', 'Nouveau', 73, 1),
(70, 'Projet 4', '2018-05-01', '2018-07-24', 'projet marketing', 'Terminé', 66, 3),
(71, 'Projet 5', '2018-02-16', '2018-05-16', 'projet d\'entreprise', 'En Cours', 73, 2);

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `ID_relation` int(11) NOT NULL AUTO_INCREMENT,
  `ID_event` int(11) NOT NULL,
  `ID_dest` int(11) NOT NULL,
  PRIMARY KEY (`ID_relation`),
  KEY `ID_event` (`ID_event`,`ID_dest`),
  KEY `ID_dest` (`ID_dest`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `relation`
--

INSERT INTO `relation` (`ID_relation`, `ID_event`, `ID_dest`) VALUES
(2, 2, 65),
(3, 3, 66),
(4, 3, 73),
(5, 4, 74);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_role` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_role`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ID_role`, `type`) VALUES
(1, 'Administrateur'),
(2, 'Chef de projet'),
(3, 'Employe');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `ID_tache` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `projet` int(11) NOT NULL,
  `flag_t` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_tache`),
  KEY `id_projet` (`projet`),
  KEY `utilisateur` (`utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`ID_tache`, `sujet`, `description`, `statut`, `date_debut`, `date_fin`, `utilisateur`, `projet`, `flag_t`) VALUES
(1, 'tache 1', 'tache de ..', 'Validée', '2018-05-03', '2018-05-25', 72, 67, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `role` int(2) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_utilisateur`),
  UNIQUE KEY `login` (`login`),
  KEY `id_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `nom`, `prenom`, `email`, `password`, `date_naissance`, `role`, `login`) VALUES
(65, 'Rafrafi   ', 'Nawress   ', 'rafrafinawress@gmail.com   ', 'nawress1', '1995-08-02', 1, 'rafrafinawress1   '),
(66, 'Gharbi ', 'Lina ', 'linagharbi8@gmail.com ', 'lina1', '1996-08-29', 2, 'gharbilina1'),
(72, 'Douzi  ', 'Dhia  ', 'dhiadouzi@gmail.com  ', 'dhia1', '1990-05-01', 3, 'douzidhia1'),
(73, 'Selmi', 'Salma', 'salmaselmi@yahoo.fr', 'salma1', '1992-01-01', 2, 'selmisalma1'),
(74, 'Haded', 'Syrine', 'syrinehaded@gmail.com', 'syrine1', '1983-09-09', 3, 'hadedsyrine1'),
(75, 'Jerbi', 'Meriem', 'meriemjerbi@yahoo.fr', 'meriem1', '1990-10-19', 3, 'jerbimeriem1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`ID_exp`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_dest`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_exp`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`user`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`ID_event`) REFERENCES `event` (`ID_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`ID_dest`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projet` (`ID_projet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`ID_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
