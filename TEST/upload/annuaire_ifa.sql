-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Septembre 2017 à 16:53
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `annuaire_ifa`
--

-- --------------------------------------------------------

--
-- Structure de la table `belong_to`
--

CREATE TABLE `belong_to` (
  `user_id` int(11) NOT NULL COMMENT 'Cl? primaire auto increment de la table User',
  `prom_id` int(11) NOT NULL COMMENT 'Identifiant d''une promotion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `belong_to`
--

INSERT INTO `belong_to` (`user_id`, `prom_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL COMMENT 'Cat?gorie d''un utilisateur',
  `cat_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Libell? de la cat?gorie d''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cat?gorie d''un utilisateur';

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Eleve'),
(2, NULL),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL COMMENT 'Identifiant d''une entreprise (company)',
  `comp_name` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'Nom de l''entreprise',
  `comp_adress` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'adresse de l''entreprise',
  `comp_zipcode` int(11) DEFAULT NULL COMMENT 'Code postal d''une adresse ',
  `comp_city` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Ville de l''entreprise'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `form_id` int(11) NOT NULL,
  `form_name` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'Libell? de la formation'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`form_id`, `form_name`) VALUES
(1, 'Développeur Web et Objets connectés'),
(2, 'BTS Actions Commerciales');

-- --------------------------------------------------------

--
-- Structure de la table `gives`
--

CREATE TABLE `gives` (
  `skill_id` int(11) NOT NULL COMMENT 'Identifant d''un comp?tence',
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `gives`
--

INSERT INTO `gives` (`skill_id`, `form_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `prom_id` int(11) NOT NULL COMMENT 'Identifiant d''une promotion',
  `prom_begin` date NOT NULL COMMENT 'Date de d?but de la formation',
  `prom_end` date NOT NULL COMMENT 'Date de fin de la fomation',
  `prom_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Promotion d''une formation';

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_begin`, `prom_end`, `prom_name`, `form_id`) VALUES
(1, '2017-06-11', '2017-11-30', 'session1', 1),
(2, '2017-10-04', '2024-05-20', 'session', 2);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL COMMENT 'Identifant d''un comp?tence',
  `skill_name` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'Libell? de la comp?tence'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Comp?tences acquises lors de la formation';

--
-- Contenu de la table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_name`) VALUES
(1, 'PHP'),
(2, 'MySQL'),
(3, 'Anglais'),
(4, 'JavaScript');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL COMMENT 'Cl? primaire auto increment de la table Eleve',
  `user_lastname` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'Nom d''un el?ve',
  `user_birthname` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nom de naissance pour les femmes',
  `user_firstname` varchar(25) COLLATE latin1_general_ci NOT NULL COMMENT 'Pr?nom d''un ?l?ve',
  `user_adress` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'Adresse de l''?l?ve',
  `user_zipcode` int(11) NOT NULL COMMENT 'Code postal de l''adresse de l''?l?ve',
  `user_city` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'Ville de l''adresse de l?l?ve',
  `user_country` varchar(25) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Pays de l''adresse de l?l?ve',
  `user_phone` char(15) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'T?l?phone personnel de l''?l?ve',
  `user_phone_pro` char(15) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'T?l?phone professionnel de l''?l?ve',
  `user_mail` varchar(50) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Adresse mail de l''?l?ve',
  `user_password` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `user_picture` varchar(50) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Photo de l''utilisateur si c''est un el?ve',
  `cat_id` int(11) NOT NULL COMMENT 'Cat?gorie d''un utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Table de gestion des utilisateurs qui peuvent ?tre des el?ves';

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_lastname`, `user_birthname`, `user_firstname`, `user_adress`, `user_zipcode`, `user_city`, `user_country`, `user_phone`, `user_phone_pro`, `user_mail`, `user_password`, `user_picture`, `cat_id`) VALUES
(3, 'LAUER', NULL, 'Mathieu', 'route de star Wars', 57600, 'Forbach', 'FRANCE', '06 06 06 06 06', NULL, 'lauer.mathieu@orange.fr', 'IFA', NULL, 1),
(4, 'WIDLOECHER', 'WIDLOECHER', 'Amélie', 'route du sport', 54910, 'Valleroy', 'FRANCE', '06 06 06 06 06', NULL, 'amelie.widloecher@gmail.com', 'IFA', NULL, 1),
(5, 'MOURIES', 'GALLAND', 'Virginie', 'route de la mise à jour', 57100, 'Thionville', 'FRANCE', '06 06 06 06 06', NULL, 'virginie.mouries@wanadoo.fr', 'IFA', NULL, 1),
(6, 'BIMBO', 'BIMBO', 'Nabila', 'route de du néant', 57000, 'Metz', 'FRANCE', '06 06 06 06 06', NULL, 'nabila.bimbo@notmail.fr', 'IFA', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `worked`
--

CREATE TABLE `worked` (
  `user_id` int(11) NOT NULL COMMENT 'Cl? primaire auto increment de la table User',
  `comp_id` int(11) NOT NULL COMMENT 'Identifiant d''une entreprise'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `belong_to`
--
ALTER TABLE `belong_to`
  ADD PRIMARY KEY (`user_id`,`prom_id`),
  ADD KEY `FK_belong_to_prom_id` (`prom_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`form_id`);

--
-- Index pour la table `gives`
--
ALTER TABLE `gives`
  ADD PRIMARY KEY (`skill_id`,`form_id`),
  ADD KEY `FK_gives_form_id` (`form_id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`prom_id`),
  ADD KEY `FK_Promotion_form_id` (`form_id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_User_cat_id` (`cat_id`);

--
-- Index pour la table `worked`
--
ALTER TABLE `worked`
  ADD PRIMARY KEY (`user_id`,`comp_id`),
  ADD KEY `FK_worked_comp_id` (`comp_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Cat?gorie d''un utilisateur', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant d''une entreprise (company)';
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant d''une promotion', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifant d''un comp?tence', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Cl? primaire auto increment de la table Eleve', AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `belong_to`
--
ALTER TABLE `belong_to`
  ADD CONSTRAINT `FK_belong_to_prom_id` FOREIGN KEY (`prom_id`) REFERENCES `promotion` (`prom_id`),
  ADD CONSTRAINT `FK_belong_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gives`
--
ALTER TABLE `gives`
  ADD CONSTRAINT `FK_gives_form_id` FOREIGN KEY (`form_id`) REFERENCES `formation` (`form_id`),
  ADD CONSTRAINT `FK_gives_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_Promotion_form_id` FOREIGN KEY (`form_id`) REFERENCES `formation` (`form_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Contraintes pour la table `worked`
--
ALTER TABLE `worked`
  ADD CONSTRAINT `FK_worked_comp_id` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`),
  ADD CONSTRAINT `FK_worked_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
