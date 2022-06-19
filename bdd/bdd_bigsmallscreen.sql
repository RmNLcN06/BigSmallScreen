-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 19 juin 2022 à 21:31
-- Version du serveur : 8.0.27
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_bigsmallscreen`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nickname`, `firstname`, `lastname`, `mail`, `pwd`, `created_at`, `updated_at`) VALUES
(1, 'AdminRom1', 'Romain', 'Luciano', 'romain.luciano@orange.fr', '$2y$10$E2N4gy7uibJoR9PZSNERku/40fPnIknudA7WOPwM3VIBpCal9FtPS', '2022-06-01 09:49:40', '2022-06-08 20:31:50'),
(2, 'AdminFlo', 'Florian', 'Luciano', 'florian.luciano@orange.fr', 'adminPass_1991', '2022-06-02 13:03:39', '0000-00-00 00:00:00'),
(13, 'AminRetsuko', 'Retsuko', 'Lapraz', 'retsuko.melon@melonpan.fr', '$2y$10$sxxeXSbeuhkMA32y.xjokezLPzMDz0L95O0M3mmndnSi2/ugEpb/m', '2022-06-06 14:56:39', '0000-00-00 00:00:00'),
(6, 'AdminMarius', 'Marius', 'Luciano', 'marius.luciano@orange.fr', '$2y$10$xocKWZfvXcwFjoAD2FE8cOqRnETm3X7mkl/nbhnwixLuYq7rw2LLe', '2022-06-02 14:46:13', '0000-00-00 00:00:00'),
(9, 'AdminCarole', 'Carole', 'Luciano', 'carole.luciano@whatever.fr', '$2y$10$DqHdJ/eRM/9NE72jy529HutuyEVq8QuhcI5./3bls0d0GMCJePGSS', '2022-06-03 06:17:48', '0000-00-00 00:00:00'),
(8, 'AdminIsa', 'Isabelle', 'Lapraz', 'isa.lapraz@orange.fr', '$2y$10$ngH9zPdKGAxHTjZ9gJaZSe5v5OQgNVXpF2skTsahYtDDfZotHr.ey', '2022-06-03 06:16:42', '0000-00-00 00:00:00'),
(11, 'AdminRom1', 'Rom', 'Lucia', 'romrom@orange.fr', '$2y$10$4kaQtz5ddhOfuXHVRi31Hei8D6972MmmomajptAxgIiWbWhhJ26UC', '2022-06-03 06:39:19', '0000-00-00 00:00:00'),
(14, 'AdminTest', 'TestNom', 'TestPrénom', 'test.test@test.fr', '$2y$10$EEh38xJ.1CIwG/RFNEXfVuJAq45ai6t.Djp/ORWwktDKJF0wG4zc.', '2022-06-08 08:06:20', '0000-00-00 00:00:00'),
(15, 'AdminTest02', 'Test02', 'Test02', 'test02.test02@test02.com', '$2y$10$nOnrrLFWMzvffA2U/6.JsuS24OinoL0w1993fd4/vdBvuiwnGACe6', '2022-06-08 09:10:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_year` smallint NOT NULL,
  `nbr_season` smallint NOT NULL,
  `work_status` varchar(255) DEFAULT NULL,
  `director_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `director_two` varchar(255) DEFAULT NULL,
  `director_three` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `director_four` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `actor_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actor_img_one` varchar(255) NOT NULL,
  `actor_role_one` varchar(125) NOT NULL,
  `actor_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actor_img_two` varchar(255) NOT NULL,
  `actor_role_two` varchar(125) NOT NULL,
  `actor_three` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actor_img_three` varchar(255) NOT NULL,
  `actor_role_three` varchar(125) NOT NULL,
  `actor_four` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actor_img_four` varchar(255) NOT NULL,
  `actor_role_four` varchar(125) NOT NULL,
  `actor_five` varchar(255) NOT NULL,
  `actor_img_five` varchar(255) NOT NULL,
  `actor_role_five` varchar(125) NOT NULL,
  `synopsis` longtext NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `path_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `release_year`, `nbr_season`, `work_status`, `director_one`, `director_two`, `director_three`, `director_four`, `actor_one`, `actor_img_one`, `actor_role_one`, `actor_two`, `actor_img_two`, `actor_role_two`, `actor_three`, `actor_img_three`, `actor_role_three`, `actor_four`, `actor_img_four`, `actor_role_four`, `actor_five`, `actor_img_five`, `actor_role_five`, `synopsis`, `content`, `admin_firstname`, `type_id`, `created_at`, `updated_at`, `path_img`) VALUES
(65, 4, 'La critique 28', 1895, 0, 'En production', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Test Synopsis 15:50', 'Test Contenu 15:50', 'Romain', 1, '2022-05-25 14:25:01', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(64, 4, 'La critique 27', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-23 14:25:01', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(63, 4, 'La critique 26', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-05-23 14:25:01', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(62, 4, 'La critique 25', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-23 14:24:43', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(61, 4, 'La critique 24', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-05-23 14:24:43', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(60, 4, 'La critique 23', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:24:43', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(59, 4, 'La critique 22', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:24:25', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(58, 3, 'L\'actualité 1', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:24:25', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(57, 4, 'La critique 21', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:24:25', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(56, 4, 'La critique 20', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(54, 4, 'La critique 18', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(53, 4, 'La critique 17', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(52, 4, 'La critique 16', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(51, 4, 'La critique 15', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(50, 4, 'La critique 14', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(49, 4, 'La critique 13', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(48, 4, 'La critique 12', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(47, 4, 'La critique 11', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(46, 4, 'La critique 10', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(45, 4, 'La critique 9', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(44, 4, 'La critique 8', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(43, 4, 'La critique 7', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(42, 4, 'La critique 6', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(41, 4, 'La critique 5', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(40, 4, 'La critique 4', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(39, 4, 'La critique 3', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(38, 4, 'La critique 2', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(37, 4, 'La critique 1', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-05-23 14:23:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(66, 3, 'L\'actualité 2', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-05-24 09:37:01', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(67, 3, 'L\'actualité 3', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-25 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(68, 3, 'L\'actualité 4', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-26 10:40:39', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(69, 3, 'L\'actualité 5', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-26 22:00:00', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(70, 3, 'L\'actualité 6', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-28 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(71, 3, 'L\'actualité 7', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-29 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(72, 3, 'L\'actualité 8', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-30 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(73, 3, 'L\'actualité 9', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-05-31 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(74, 3, 'L\'actualité 10', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-01 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(75, 3, 'L\'actualité 11', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-02 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(76, 3, 'L\'actualité 12', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-03 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(77, 3, 'L\'actualité 13', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-04 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(78, 3, 'L\'actualité 14', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-05 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(79, 3, 'L\'actualité 15', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-06 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(80, 3, 'L\'actualité 16', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-07 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(81, 3, 'L\'actualité 17', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-08 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(82, 3, 'L\'actualité 18', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-09 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(83, 3, 'L\'actualité 19', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-10 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(84, 3, 'L\'actualité 20', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-11 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(85, 3, 'L\'actualité 21', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-12 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(86, 3, 'L\'actualité 22', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-13 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(87, 3, 'L\'actualité 23', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-14 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(88, 3, 'L\'actualité 24', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-06-15 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(89, 3, 'L\'actualité 25', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-16 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(90, 3, 'L\'actualité 26', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-17 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(91, 3, 'L\'actualité 272', 1895, 0, 'En production', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Synopsis Test', 'Contenu de l\'article Test', 'Romain', 2, '2022-06-18 06:02:20', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(92, 1, 'Film 1', 0, 0, '0', 'Réalisateur test', 'Deuxième réalisateur test', '', '', 'Acteur 1 test', '', '', 'Acteur 2 test', '', '', 'Acteur 3 test', '', '', 'Acteur 4 test', '', '', '', '', '', 'Ceci est un test pour voir si le synopsis s\'affiche.', 'Ceci est un test pour voir si le contenu s\'affiche.', 'Romain', 2, '2022-06-04 09:38:49', '2022-06-15 16:23:38', '../../img/62a9e8332c4478.71676019.jpg'),
(93, 1, 'Film 2', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-06-04 09:38:49', '2022-06-15 16:23:44', '../../img/62a9e8332c4478.71676019.jpg'),
(94, 1, 'Film 3', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-04 09:38:49', '2022-06-15 16:26:49', '../../img/62a9e8332c4478.71676019.jpg'),
(95, 1, 'Film 4', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(96, 1, 'Film 5', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(97, 1, 'Film 6', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(98, 1, 'Film 7', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(99, 1, 'Film 8', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(100, 1, 'Film 9', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(101, 1, 'Film 10', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-15 16:25:29', '../../img/62a9e8332c4478.71676019.jpg'),
(102, 1, 'Film 11', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-15 16:25:27', '../../img/62a9e8332c4478.71676019.jpg'),
(103, 1, 'Film 12', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-06-04 09:38:49', '2022-06-15 16:25:25', '../../img/62a9e8332c4478.71676019.jpg'),
(104, 1, 'Film 13', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-15 16:24:44', '../../img/62a9e8332c4478.71676019.jpg'),
(105, 1, 'Film 14', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-15 16:24:25', '../../img/62a9e8332c4478.71676019.jpg'),
(106, 1, 'Film 15', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-15 16:24:18', '../../img/62a9e8332c4478.71676019.jpg'),
(107, 1, 'Film 16', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-15 16:24:16', '../../img/62a9e8332c4478.71676019.jpg'),
(108, 2, 'Série 1', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(109, 2, 'Série 2', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(110, 2, 'Série 3', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(111, 2, 'Série 4', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(112, 2, 'Série 5', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(113, 2, 'Série 6', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(114, 2, 'Série 7', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(115, 2, 'Série 8', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(116, 2, 'Série 9', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(117, 2, 'Série 10', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(118, 2, 'Série 11', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(119, 2, 'Série 12', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(120, 2, 'Série 13', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(121, 2, 'Série 14', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(122, 2, 'Série 15', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(123, 2, 'Série 16', 0, 0, '0', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2022-06-04 09:38:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(125, 2, 'Test_01', 0, 0, NULL, 'Franck Darabont', 'Stephen King', '', '', 'Acteur 1', '', '', 'Acteur 2', '', '', 'Acteur 3', '', '', 'Acteur 4', '', '', '', '', '', 'Coucou ceci est un test pour vérifier que ça marche !', 'Blabla tout le long !', '', 0, '2022-06-08 08:55:49', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(126, 1, 'Test_02', 0, 0, NULL, 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Coucou ceci est un test pour vérifier que celà fonctionne !', 'BlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlabla', 'Romain', 0, '2022-06-08 09:06:41', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(127, 1, 'Warrior', 0, 0, NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2022-06-09 09:13:36', '2022-06-15 16:24:07', '../../img/62a9e8332c4478.71676019.jpg'),
(128, 0, 'La Ligne Verte', 0, 0, NULL, 'Franck Darabont', 'Stephen King', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Coucou ceci est un test pour vérifier si le synopsis fonctionne !', 'Coucou ceci est un test pour vérifier si le contenu de l\'article fonctionne !', 'Romain', 0, '2022-06-09 09:13:36', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(129, 1, 'Coucoutest', 0, 0, NULL, 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Coucou ceci est un test pour vérifier si le synopsis fonctionne !', 'Coucou ceci est un test pour vérifier si le contenu de l\'article fonctionne !', 'Romain', 0, '2022-06-09 09:20:53', '2022-06-15 16:24:03', '../../img/62a9e8332c4478.71676019.jpg'),
(131, 2, 'TestNbrSeason', 2002, 6, NULL, 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Test pour vérifier synopsis fonctionne !', 'Test pour vérifier contenu de l\'article fonctionne !', 'Romain', 0, '2022-06-09 09:38:54', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(132, 2, 'TestWorkStatus', 2021, 1, 'En production', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Ceci est un test pour vérifier si le synopsis fonctionne !', 'Ceci est un test pour vérifier si le contenu de l\'article fonctionne !', 'Romain', 0, '2022-06-09 09:56:03', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(133, 2, 'TestTags', 2000, 10, 'Terminée', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Ceci est un test pour le synopsis', 'Ceci est un test pour le contenu des articles', 'Romain', 0, '2022-06-09 11:12:39', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(134, 2, 'TestRework', 1900, 16, 'Terminée', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Test Synopsis', 'Test Contenu de l\'article', 'Romain', 0, '2022-06-09 11:25:16', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(135, 3, 'TestAll', 1991, 2, 'Terminée', 'Premier réalisatrice', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Test Synopsis', 'Test Contenu de l\'article', 'Romain', 0, '2022-06-09 11:27:38', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(136, 2, 'TestMid', 1959, 10, 'En production', 'Franck Darabont', 'Second réalisateur', '', '', 'Acteur 1', '', '', 'Seconde Actrice', '', '', 'Acteur 3', '', '', 'Quatrième Actrice', '', '', '', '', '', 'C\'est un test pour le synopsis', 'C\'est un test pour le contenu de l\'article', 'Romain', 0, '2022-06-09 13:14:00', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(137, 2, 'TestEncoreBis', 2002, 7, 'Annulée', 'Franck Darabont', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Ceci est le synopsis !', 'Ceci est le contenu de l\'article !', 'Romain', 0, '2022-06-09 15:03:42', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(138, 2, 'TestTags21h', 1911, 16, 'Annulée', 'Franck Darabont', 'Second réalisateur', '', '', 'Premier Acteur', '', '', 'Seconde Actrice', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Test Synopsis', 'Test Contenu de l\'article', 'Romain', 0, '2022-06-09 19:16:46', '2022-06-16 07:42:23', '../../img/62a9e8332c4478.71676019.jpg'),
(139, 1, 'TestMinuit', 1945, 8, 'Terminée', 'Premier réalisatrice', 'Stephen King', '', '', 'Acteur 1', '', '', 'Acteur 2', '', '', 'Troisième Acteur', '', '', 'Quatrième Actrice', '', '', '', '', '', 'Coucou pompidou !', 'Pourquoi ça ne veut pas marcher ?!?!', 'Romain', 0, '2022-06-09 21:50:43', '2022-06-15 16:23:18', '../../img/62a9e8332c4478.71676019.jpg'),
(140, 1, 'TestImg', 1910, 0, 'Terminée', 'Réal 1', 'Réal 2', '', '', 'Act 1', '', '', 'Act 2', '', '', 'Act 3', '', '', 'Act 4', '', '', '', '', '', 'Test Synopsis', 'Test Contenu de l\'article', 'Romain', 0, '2022-06-15 13:42:11', '2022-06-15 16:22:39', '../../img/62a9e8332c4478.71676019.jpg'),
(141, 1, 'TestImg2', 1900, 0, 'Terminée', 'Réal 1', 'Réal 2', '', '', 'Act 1', '', '', 'Act 2', '', '', 'Act 3', '', '', 'Act 4', '', '', '', '', '', 'Test pour Synopsis', 'Test pour contenu de l\'article', 'Romain', 0, '2022-06-15 13:54:03', '2022-06-15 16:26:22', '../../img/62a9e8332c4478.71676019.jpg'),
(142, 1, 'TestImg3', 1908, 0, 'Terminée', 'Réal 1', 'Réal 2', '', '', 'Act 1', '', '', 'Act 2', '', '', 'Act 3', '', '', 'Act 4', '', '', '', '', '', 'Test Synopsis', 'Test Contenu de l\'article', 'Romain', 0, '2022-06-15 14:09:55', '0000-00-00 00:00:00', '../../img/62a9e8332c4478.71676019.jpg'),
(143, 1, 'TestMiniImage', 1895, 0, 'Sortie', 'Réal 1', 'Réal 2', 'Réal 3', 'Réal 4', 'Act 1', '../../img/actors/62ade8d9247af2.06254575.jpg', '', 'Act 2', '../../img/actors/62ade8d924aab7.91689861.jpg', '', 'Act 3', '../../img/actors/62ade8d924cf38.78728351.jpg', '', 'Act 4', '../../img/actors/62ade8d924f2c7.71505217.jpg', '', 'Act 5', '../../img/actors/62ade8d9251c65.60360729.jpg', '', 'Synopsis de test', 'Contenu de l\'article test', 'Romain', 0, '2022-06-18 15:01:45', '0000-00-00 00:00:00', '../../img/62ade8d92542e8.86271315.jpg'),
(144, 2, 'TestMiniatureRole', 2000, 11, 'Terminée', 'Réal 1', 'Réal 2', 'Réal 3', 'Réal 4', 'Act 1', '../../img/actors/62af1858b63e06.67878385.jpg', 'Le Méchant', 'Act 2', '../../img/actors/62af1858b6ad88.39363680.jpg', 'Le Gros Méchant', 'Act 3', '../../img/actors/62af1858b6d965.18170902.jpg', 'La Gentille', 'Act 4', '../../img/actors/62af1858b704c0.45359044.jpg', 'La Brute', 'Act 5', '../../img/actors/62af1858b73e05.20261702.jpg', 'Le Truand', 'Ceci est le synopsis du nouveau test !', 'Et voici bien entendu le contenu de l\'article !', 'Romain', 0, '2022-06-19 12:36:40', '0000-00-00 00:00:00', '../../img/62af1858b776b8.67716075.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `articles_types`
--

DROP TABLE IF EXISTS `articles_types`;
CREATE TABLE IF NOT EXISTS `articles_types` (
  `articles_id` int DEFAULT NULL,
  `types_id` int NOT NULL,
  KEY `types_id` (`types_id`),
  KEY `articles_type_id` (`articles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles_types`
--

INSERT INTO `articles_types` (`articles_id`, `types_id`) VALUES
(86, 5),
(86, 4),
(85, 3),
(85, 2),
(85, 1),
(86, 6),
(86, 7),
(92, 1),
(92, 4),
(92, 5),
(93, 3),
(93, 4),
(93, 2),
(94, 2),
(94, 4),
(94, 6),
(95, 1),
(95, 4),
(NULL, 1),
(NULL, 16),
(NULL, 10),
(NULL, 8),
(NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Films', '0000-00-00 00:00:00'),
(2, 'Séries', '0000-00-00 00:00:00'),
(3, 'Actualités', '0000-00-00 00:00:00'),
(4, 'Critiques', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `articles_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_nickname` varchar(100) DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `articles_id`, `user_id`, `user_nickname`, `content`, `created_at`, `updated_at`) VALUES
(1, 92, 1, '', 'Coucou !', '2022-06-10 07:40:59', '0000-00-00 00:00:00'),
(2, 92, 2, '', 'Coucou !', '2022-06-10 07:41:25', '0000-00-00 00:00:00'),
(3, 92, 2, '', 'Coucou !', '2022-06-10 07:42:03', '0000-00-00 00:00:00'),
(4, 92, 4, '', 'Coucou !', '2022-06-10 07:46:07', '0000-00-00 00:00:00'),
(5, 92, 5, '', 'Coucou !', '2022-06-10 07:46:34', '0000-00-00 00:00:00'),
(6, 138, NULL, '', 'Ce commentaire a été modifié !', '2022-06-15 05:43:25', '0000-00-00 00:00:00'),
(7, 138, NULL, '', 'Bonjour ! Super article !', '2022-06-15 05:49:48', '0000-00-00 00:00:00'),
(8, 138, NULL, '', 'Coucou ceci est un test !', '2022-06-15 06:43:54', '0000-00-00 00:00:00'),
(9, 138, 0, '', 'Coucou ceci est un test !', '2022-06-15 06:56:17', '0000-00-00 00:00:00'),
(10, 138, 0, '', 'Coucou ceci est un test !', '2022-06-15 06:56:33', '0000-00-00 00:00:00'),
(11, 138, 0, '', 'Coucou ceci est un test !', '2022-06-15 06:58:50', '0000-00-00 00:00:00'),
(12, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:22:04', '0000-00-00 00:00:00'),
(13, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:24:17', '0000-00-00 00:00:00'),
(14, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:24:27', '0000-00-00 00:00:00'),
(15, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:25:53', '0000-00-00 00:00:00'),
(16, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:26:30', '0000-00-00 00:00:00'),
(17, 138, NULL, '', 'Coucou ceci est un autre test !', '2022-06-15 07:29:08', '0000-00-00 00:00:00'),
(18, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:24:32', '0000-00-00 00:00:00'),
(19, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:33:02', '0000-00-00 00:00:00'),
(20, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:46:54', '0000-00-00 00:00:00'),
(21, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:48:17', '0000-00-00 00:00:00'),
(22, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:49:05', '0000-00-00 00:00:00'),
(23, 138, 16, 'Rom55', 'Coucou ceci est un autre test !', '2022-06-15 08:51:43', '0000-00-00 00:00:00'),
(24, 138, 16, 'Rom55', 'Ce nouveau message devrait me rendre heureux !', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 138, 16, 'Rom55', 'Nouveau message avec la bonne date je l&#039;espère !', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 138, 16, 'Rom55', 'Nouveau message avec la bonne date je l&#039;espère !', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 138, 16, 'Rom55', 'Bonne date ?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 138, 16, 'Rom55', 'Bonne date ?', '2022-06-15 09:40:36', '0000-00-00 00:00:00'),
(29, 138, 16, 'Rom55', 'Dernier test avant la joie !', '2022-06-15 09:41:03', '0000-00-00 00:00:00'),
(30, 139, 16, 'Rom55', 'Nouveau commentaire pour un film !', '2022-06-15 09:42:06', '0000-00-00 00:00:00'),
(31, 139, 16, 'Rom55', 'Nouveau commentaire pour un film !', '2022-06-15 09:47:31', '0000-00-00 00:00:00'),
(32, 139, 16, 'Rom55', 'Nouveau commentaire pour un film !', '2022-06-15 09:47:48', '0000-00-00 00:00:00'),
(33, 139, 16, 'Rom55', 'Nouveau commentaire pour un film !', '2022-06-15 09:48:24', '0000-00-00 00:00:00'),
(34, 139, 16, 'Rom55', 'Juste un essai', '2022-06-15 09:48:42', '0000-00-00 00:00:00'),
(35, 139, 16, 'Rom55', 'Juste un essai', '2022-06-15 09:48:53', '0000-00-00 00:00:00'),
(36, 139, 16, 'Rom55', 'Juste un essai', '2022-06-15 09:49:17', '0000-00-00 00:00:00'),
(37, 139, 16, 'Rom55', 'Juste un essai', '2022-06-15 09:49:43', '0000-00-00 00:00:00'),
(38, 138, 16, 'Rom55', 'Nouveau message pour ce sujet !', '2022-06-17 10:20:22', '0000-00-00 00:00:00'),
(39, 138, 16, 'Rom55', 'Je suis d&#039;accord c&#039;est un bon article !', '2022-06-17 10:21:10', '0000-00-00 00:00:00'),
(40, 142, 16, 'Rom55', 'Ceci est un premier message pour cet article !', '2022-06-17 11:46:15', '0000-00-00 00:00:00'),
(41, 142, 16, 'Rom55', 'Ceci est un second message !', '2022-06-17 11:50:31', '0000-00-00 00:00:00'),
(42, 65, 16, 'Rom55', 'C&#039;est le premier message ! C&#039;est très sympa !', '2022-06-17 11:51:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`) VALUES
(1, 'Utilisateur', '2022-05-20 09:49:53'),
(2, 'Premium', '2022-05-20 09:49:53'),
(3, 'Rédacteur', '2022-05-20 09:49:53'),
(4, 'Modérateur', '2022-05-20 09:49:53'),
(5, 'Administrateur', '2022-05-20 09:49:53');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`) VALUES
(1, 'Science-fiction', '2022-05-24 13:31:13'),
(2, 'Comédie', '2022-05-24 13:31:13'),
(3, 'Comédie dramatique', '2022-05-24 13:31:13'),
(4, 'Horreur', '2022-05-24 13:31:13'),
(5, 'Thriller', '2022-05-24 13:31:13'),
(6, 'Romance', '2022-05-24 13:31:13'),
(7, 'Biographie', '2022-05-24 13:31:13'),
(8, 'Aventure', '2022-05-24 13:31:13'),
(9, 'Action', '2022-05-24 13:31:13'),
(10, 'Drame', '2022-05-24 13:31:13'),
(11, 'Fantastique', '2022-05-24 13:31:13'),
(12, 'Guerre', '2022-05-24 13:31:13'),
(13, 'Policier', '2022-05-24 13:31:13'),
(14, 'Western', '2022-05-24 13:31:13'),
(15, 'Documentaire', '2022-05-24 13:31:13'),
(16, 'Biopic', '2022-05-24 13:31:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `firstname`, `lastname`, `mail`, `pwd`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Flop', 'Florian', 'Lucian', 'florian.luciano@whatever.fr', '$2y$10$vxPoqPE3yS6Leb.fo0LccuiJTs7WHPpL1JRBbbJ1gfVAXfJeHmzlO', 1, '0000-00-00 00:00:00', '2022-06-03 12:26:48'),
(2, 'AurelieFaure', 'Aurelie', 'Faure', 'aurelie.faure@whatever.com', '$2y$10$Y7gAbs.TYG1LwiY6Dn0G2.e6y4ajkXI2Uq0dignlYNztV/GsEV.WC', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Ibaba', 'Isabelle', 'Lapraz', 'isabelle.lapraz@whatever.com', '$2y$10$uuyONVKhf2jaNQjVitun3uyUgtim/0lqIoQERB.EK2LQ8aiJ5bV72', 1, '2022-05-20 09:35:03', '2022-05-20 09:35:03'),
(4, 'Rom1', 'Romain', 'Luciano', 'romain.luciano@whatever.com', '$2y$10$rQ0Bg5sGkdXV2XvxuI.6peHFNhhPzLa7HWyGlOfhmLpzLsY4bNw3e', 1, '2022-05-20 11:52:24', '2022-05-20 11:52:24'),
(5, 'Marius58', 'Marius', 'Luciano', 'marius.luciano@whatever.fr', '$2y$10$lKLPEVsVPRS4WobB0yxhlOHeoTSr5d7I6jCTavlJPPDN/VijSaBdy', 1, '2022-05-20 11:57:07', '2022-05-20 11:57:07'),
(6, 'Carole58', 'Carole', 'Luciano', 'carole.luciano@whatever.fr', '$2y$10$UqLNdKVkx037fqbmb9s68u0OTmv27zQinkQo17KPinhhEEhCaDRkm', 1, '2022-05-20 12:00:33', '2022-05-20 12:00:33'),
(7, 'Retsuko88', 'Retsuko', 'Lapraz', 'retsuko.lapraz@melonpan.fr', '$2y$10$zAfIPrT4UBUcSSXSCP0CmO1jLNavnDjxkvEVBgxlRIRagDpjisQNa', 1, '2022-05-20 12:05:33', '2022-05-20 12:05:33'),
(8, 'Polar22', 'Polar', 'Luciano', 'polar.luciano@toutou.fr', '$2y$10$UEm3p3bUDzcA4.vj2FSlZ.OXJCQ8W157aq7qLqz0yDIYDafjT76Me', 1, '2022-05-20 12:07:53', '2022-05-20 12:07:53'),
(10, 'Gogol1', 'Romain', 'Sylvon', 'sylvon@orange.fr', '$2y$10$nu956Bwpw3.vy7Wl.dpyl.89JBXRT0hLyCFKG/ueUo58kRUQayVO.', 1, '2022-05-31 12:57:11', '2022-05-31 12:57:11'),
(11, 'Prout2', 'Prout', 'Proutp', 'prout@orange.fr', '$2y$10$ZnNBGzV1AmuwhgF1GwuGgeYJ.RUELPcDhpYKBUmryRFcXRr3HfGIC', 1, '2022-05-31 20:33:29', '2022-05-31 20:33:29'),
(12, 'Rom2', 'Romain', 'Lucinao', 'romain.luciano@orange.fr', '$2y$10$nwuFFjlhlbbUDoQF4XWTp.9BKqk.wBmXrfHMShFOnD4TDjYQxqoSC', 1, '2022-06-01 08:53:20', '2022-06-01 08:53:20'),
(13, 'TestNono', 'Nono', 'Lucia', 'testnono@orange.fr', '$2y$10$NtbLayBPQ1QhNV/w1/5YjOs1B/qkjDoXgIB8NUvjdX9K65uKkUcXu', 1, '2022-06-03 08:02:31', '2022-06-06 07:13:36'),
(14, 'Rom33', 'Test3', 'Ptest3', 'test33@test.fr', '$2y$10$Osug4guLJ4cvQZeeWl31wuaMVMVoO.luQkOzqAVoxdsayog47eOqu', 1, '2022-06-08 13:24:45', '2022-06-08 14:45:59'),
(15, 'Rom4', 'Test4', 'Ptest4', 'test4@test.fr', '$2y$10$MbeTTkMuYu22HHia7w.ztOWlscdiM1a6kWuG4Bj0/T0022S5KwUCG', 1, '2022-06-08 14:55:44', '2022-06-13 08:40:18'),
(16, 'Rom55', 'Test5', 'PTest5', 'test5@test.fr', '$2y$10$4ZILPkwJvWqNzPAaQ3uNAu7ZmlXGjU.KNbKprpmf.4oUKDTJiHCOC', 1, '2022-06-13 09:04:31', '2022-06-14 12:17:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
