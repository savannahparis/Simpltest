-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 22 Avril 2019 à 13:47
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-1+0~20181208203126.8+stretch~1.gbp2ff763

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simptest`
--
CREATE DATABASE IF NOT EXISTS `simptest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `simptest`;

-- --------------------------------------------------------

--
-- Structure de la table `attributions`
--

DROP TABLE IF EXISTS `attributions`;
CREATE TABLE `attributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordinateur_user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `attributions`
--
DROP TRIGGER IF EXISTS `after_delete_attrib`;
DELIMITER $$
CREATE TRIGGER `after_delete_attrib` AFTER DELETE ON `attributions` FOR EACH ROW BEGIN
DELETE FROM ordinateurs_users
WHERE id = OLD.ordinateur_user_id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ordinateurs`
--

DROP TABLE IF EXISTS `ordinateurs`;
CREATE TABLE `ordinateurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ordinateurs`
--

INSERT INTO `ordinateurs` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'PC1', NULL, NULL),
(2, 'PC2', NULL, NULL),
(3, 'PC3', NULL, NULL),
(4, 'PC4', NULL, NULL),
(5, 'PC5', NULL, NULL),
(6, 'PC6', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ordinateurs_users`
--

DROP TABLE IF EXISTS `ordinateurs_users`;
CREATE TABLE `ordinateurs_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordinateur_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` enum('gestionnaire','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(107, 'samsung', 'samsung@gmail.com', 'f955679ae2869c7da6d5750bfdeb5e01', 'gestionnaire', 'GeHLcv5axFljyoI2vosv2NBp2ytXPpGTDqwhIkJidvbJ0aivGNtO9WFq2x7y', '2019-04-19 16:36:39', '2019-04-19 16:36:39');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attributions`
--
ALTER TABLE `attributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delete` (`ordinateur_user_id`);

--
-- Index pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordinateurs_nom_unique` (`nom`);

--
-- Index pour la table `ordinateurs_users`
--
ALTER TABLE `ordinateurs_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordinateurs_users_ordinateur_id_unique` (`ordinateur_id`),
  ADD UNIQUE KEY `ordinateurs_users_user_id_unique` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attributions`
--
ALTER TABLE `attributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;
--
-- AUTO_INCREMENT pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ordinateurs_users`
--
ALTER TABLE `ordinateurs_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ordinateurs_users`
--
ALTER TABLE `ordinateurs_users`
  ADD CONSTRAINT `ordinateurs_users_ordinateur_id_foreign` FOREIGN KEY (`ordinateur_id`) REFERENCES `ordinateurs` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `ordinateurs_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
