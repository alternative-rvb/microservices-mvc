-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 09 avr. 2023 à 21:33
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `microservices_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `ms_posts`
--

CREATE TABLE `ms_posts` (
  `microservice_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ms_posts`
--

INSERT INTO `ms_posts` (`microservice_id`, `title`, `content`, `price`, `image`, `user_id`) VALUES
(2, 'Intégration d&#039;un blog', 'Ajouter un blog à un site web existant, en utilisant une plateforme de gestion de contenu (CMS) comme WordPress ou Ghost, et en personnalisant le design pour qu&#039;il corresponde à l&#039;identité visuelle du site.', 800.00, '64332e5fd3c10.jpg', 1),
(3, 'Mise en place d&#039;une boutique en ligne', 'Intégrer une solution e-commerce comme WooCommerce, Shopify ou PrestaShop à un site web existant, pour permettre la vente de produits ou services en ligne.', 5000.00, '64332e52053cd.jpg', 1),
(4, 'Optimisation du référencement naturel (SEO)', 'Améliorer le classement d&#039;un site web dans les moteurs de recherche en optimisant la structure du site, les balises méta, le contenu et en créant des liens de qualité.', 99.99, '64332e494cd34.jpg', 1),
(5, 'Création d&#039;un formulaire de contact', 'Concevoir et intégrer un formulaire de contact personnalisé sur un site web, avec validation des données saisies et envoi des informations par e-mail au propriétaire du site.', 150.00, '6426f42702e31.jpg', 1),
(6, 'Adaptation de thèmes et plugins', 'Personnaliser un thème ou un plugin existant pour répondre aux besoins spécifiques d&#039;un client, en modifiant le code source ou en ajoutant des fonctionnalités supplémentaires.', 299.00, '6426f43933939.jpg', 1),
(65, '', '', 0.00, '', 0),
(68, 'Kit de survie pour le web', 'Maintenance de site web et refonte graphique.', 300.00, '64332eaa40dcf.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ms_users`
--

CREATE TABLE `ms_users` (
  `user_id` int NOT NULL,
  `last_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ms_users`
--

INSERT INTO `ms_users` (`user_id`, `last_name`, `first_name`, `email`, `password`, `role`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', '$2y$10$BWhNQ00D6eKuA5AhV0KrOu1TqMK.uZrPuapy8HMiX3s8JYMF9dpyC', 0),
(2, 'Stracke', 'Francesco', '', NULL, NULL),
(3, 'MacGyver', 'Melyna', '', NULL, NULL),
(4, 'Mayert', 'Ivory', '', NULL, NULL),
(5, 'Swaniawski', 'Tremaine', '', NULL, NULL),
(6, 'Kris', 'Merritt', '', NULL, NULL),
(7, 'Corwin', 'Madeline', '', NULL, NULL),
(8, 'Isaac', 'DuBuque', '', NULL, NULL),
(9, 'Kihn', 'Laurianne', '', NULL, NULL),
(10, 'Kihn', 'Mawson', '', NULL, NULL),
(11, 'Sponge', 'Bob', '', NULL, NULL),
(12, 'Star', 'Patrick', '', NULL, NULL),
(13, 'Tentacles', 'Squidward', '', NULL, NULL),
(14, 'Cheeks', 'Sandy', '', NULL, NULL),
(15, 'Krabs', 'Eugene', '', NULL, NULL),
(16, '', '', '', NULL, NULL),
(43, 'Mich', 'Muche', 'mich.muche@example.com', '$2y$10$Wc9RxLvuaY/5x3acIN502OVLrQsCQjDDjJTpwvVWT6KSAAKw9afdC', 1),
(44, 'A', 'A', 'jane.doe@example.com', '$2y$10$Ujo1ovWJ3fE5Bdo7cwZi9eiQa8DjgYBQfXFI9E17QdKkvghP9YHWu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ms_posts`
--
ALTER TABLE `ms_posts`
  ADD PRIMARY KEY (`microservice_id`);

--
-- Index pour la table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ms_posts`
--
ALTER TABLE `ms_posts`
  MODIFY `microservice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `ms_users`
--
ALTER TABLE `ms_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
