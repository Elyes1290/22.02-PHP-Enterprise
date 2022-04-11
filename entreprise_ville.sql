-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : maria_db:3306
-- Généré le : ven. 08 avr. 2022 à 14:47
-- Version du serveur :  10.7.3-MariaDB-1:10.7.3+maria~focal
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `apiphp_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_ville`
--

CREATE TABLE `entreprise_ville` (
  `entreprise_id` int(10) NOT NULL,
  `ville_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise_ville`
--

INSERT INTO `entreprise_ville` (`entreprise_id`, `ville_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise_ville`
--
ALTER TABLE `entreprise_ville`
  ADD KEY `lien_entreprise` (`entreprise_id`),
  ADD KEY `lien_ville` (`ville_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entreprise_ville`
--
ALTER TABLE `entreprise_ville`
  ADD CONSTRAINT `lien_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `lien_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);
COMMIT;