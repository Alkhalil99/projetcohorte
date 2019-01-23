-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 23 Janvier 2019 à 13:43
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cohorte`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure_deb` time NOT NULL,
  `heure_fin` time NOT NULL,
  `nb_etudiants` int(11) DEFAULT NULL,
  `nb_absences` int(11) DEFAULT NULL,
  `nb_presences` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FDCA8C9CF46CD258` (`matiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `date`, `heure_deb`, `heure_fin`, `nb_etudiants`, `nb_absences`, `nb_presences`, `matiere_id`) VALUES
(1, '2019-01-10', '08:30:00', '12:00:00', 3, 2, 2, 1),
(2, '2019-01-10', '13:45:00', '17:00:00', 3, 1, 2, 2),
(3, '2019-01-11', '08:30:00', '12:00:00', 3, 2, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `cours_user`
--

CREATE TABLE IF NOT EXISTS `cours_user` (
  `cours_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cours_id`,`user_id`),
  KEY `IDX_5EE5E9A67ECF78B0` (`cours_id`),
  KEY `IDX_5EE5E9A6A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cours_user`
--

INSERT INTO `cours_user` (`cours_id`, `user_id`) VALUES
(1, 4),
(1, 5),
(2, 4),
(2, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_responsable_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nb_etudiants` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_404021BFE9A2D430` (`prof_responsable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `prof_responsable_id`, `intitule`, `nb_etudiants`) VALUES
(1, 1, 'PLS', 3),
(2, 2, 'EI2D', 3);

-- --------------------------------------------------------

--
-- Structure de la table `formation_matiere`
--

CREATE TABLE IF NOT EXISTS `formation_matiere` (
  `formation_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  PRIMARY KEY (`formation_id`,`matiere_id`),
  KEY `IDX_D5EB12315200282E` (`formation_id`),
  KEY `IDX_D5EB1231F46CD258` (`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `formation_matiere`
--

INSERT INTO `formation_matiere` (`formation_id`, `matiere_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chemin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `name`, `chemin`) VALUES
(1, '1.png', 'image/1.png'),
(2, '0.png', 'image/0.png');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professeur_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9014574ABAB22EE9` (`professeur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `professeur_id`, `intitule`) VALUES
(1, 3, 'BASE DE DONNEES AVANCEES'),
(2, 2, 'TND'),
(3, 1, 'LEE');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cours_id` int(11) DEFAULT NULL,
  `present` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etudiant_id` int(11) DEFAULT NULL,
  `matiere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6977C7A57ECF78B0` (`cours_id`),
  KEY `IDX_6977C7A5DDEAB1A3` (`etudiant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `presence`
--

INSERT INTO `presence` (`id`, `cours_id`, `present`, `etudiant_id`, `matiere`) VALUES
(1, 1, 'absent', 4, 'BASE DE DONNEES'),
(2, 1, 'absent', 5, 'BASE DE DONNEES'),
(5, 2, 'present', 4, 'TND'),
(6, 2, 'present', 5, 'TND'),
(7, 1, 'absent', 6, 'BASE DE DONNEES'),
(8, 2, 'absent', 6, 'TND'),
(9, 3, 'present', 6, 'LEE'),
(10, 3, 'absent', 4, 'LEE'),
(11, 3, 'absent', 5, 'LEE');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id`, `lieu`) VALUES
(1, 'G215'),
(2, 'FERMAT'),
(3, 'F207');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ine` int(11) DEFAULT NULL,
  `formation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nb_absences` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`user_email`),
  KEY `FK_8D93D64986383B10` (`avatar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `avatar_id`, `username`, `username_canonical`, `user_email`, `email_canonical`, `enabled`, `salt`, `user_password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `prenom`, `nom`, `ine`, `formation`, `nb_absences`) VALUES
(1, 1, 'boudes', 'pierre', 'boudes@lipn.univ-paris13.fr', 'kader@gmail.comboudes@lipn.univ-paris13.fr', 1, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-02 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'pierre', 'boudes', NULL, 'PLS', 0),
(2, 1, 'bennani', 'younes', 'bennani@lipn.univ-paris13.fr', 'bennani@lipn.univ-paris13.fr', 1, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-10 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'younes', 'Bennani', NULL, 'EI2D', 0),
(3, 1, 'boufares', 'faouzi', 'boufares@lipn.univ-paris13.fr', 'boufares@lipn.univ-paris13.fr', 1, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-10 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'boufares', 'faouzi', NULL, 'EI2D', 0),
(4, 1, 'dame', 'ndiaye', 'dame@gmail.com', 'dame@gmail.com', 0, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-10 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Dame', 'NDIAYE', 11587895, 'EI2D', 1),
(5, 2, 'kader', 'moussa', 'kader@gmail.com', 'kader@gmail.com', 0, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-10 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Kader', 'Moussa', 11984827, 'EI2D', 1),
(6, 1, 'fatou', 'ba', 'fatou@gmail.com', 'fatou@gmail.com', 0, 'fsrpa7ia540gck0k8owcs0wcgc8k80s', 'passer', '2019-01-10 01:01:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'fatou', 'ba', NULL, 'EI2D', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_FDCA8C9CF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `cours_user`
--
ALTER TABLE `cours_user`
  ADD CONSTRAINT `FK_5EE5E9A67ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BFE9A2D430` FOREIGN KEY (`prof_responsable_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `formation_matiere`
--
ALTER TABLE `formation_matiere`
  ADD CONSTRAINT `FK_D5EB12315200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D5EB1231F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `FK_6977C7A57ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_6977C7A5DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_8D93D64986383B10` FOREIGN KEY (`avatar_id`) REFERENCES `image` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
