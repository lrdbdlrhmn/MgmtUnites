-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 15 mai 2021 à 10:01
-- Version du serveur :  5.7.24
-- Version de PHP :  7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `armeesb`
--

-- --------------------------------------------------------

--
-- Structure de la table `bataillons`
--

DROP TABLE IF EXISTS `bataillons`;
CREATE TABLE IF NOT EXISTS `bataillons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bataillons_region_id_foreign` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bataillons`
--

INSERT INTO `bataillons` (`id`, `libelle`, `libellear`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'b1ePpFtCl1', 'OjH47c43ey', 5, NULL, NULL),
(2, 'xjWQYgIHfc', 'e0yGAEj6ds', 2, NULL, NULL),
(3, 'CxzZfySNOX', 'VwDlenz8yd', 5, NULL, NULL),
(4, 'YpeCBV2k2H', 'Fj02XLbDdW', 3, NULL, NULL),
(5, 'FOlTM5ShWU', 'fUPAHuKoRd', 4, NULL, NULL),
(6, 'TE7deCSWfb', 'zNAo5oUxT5', 2, NULL, NULL),
(7, '30Ty9T8aUE', 'ALy6cAEcmf', 4, NULL, NULL),
(8, 'zbJ0t1gEnp', '0oDjN4p7T5', 5, NULL, NULL),
(9, '998C228xht', 'VFHKtvL2ra', 3, NULL, NULL),
(10, 'usDpK2De66', 'S3KBD3Y1zE', 4, NULL, NULL),
(11, 'J5XJFR7wGd', 'BAbdgqeEXQ', 2, NULL, NULL),
(12, 'IuTc07yT5U', '72IGpYawQu', 1, NULL, NULL),
(13, 'lWTv765KKr', 'QtqEjIyn5S', 4, NULL, NULL),
(14, 'whu1WJgXAG', 'n3iJgUdXLY', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `libellear`, `created_at`, `updated_at`) VALUES
(1, 'Automobile', 'Automobilear', NULL, NULL),
(2, 'Optique', 'Optiquear', NULL, NULL),
(3, 'Armement', 'Armementar', NULL, NULL),
(4, 'Transmission', 'Transmissionar', NULL, NULL),
(5, 'Transmission', 'Transmissionar', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `classeps`
--

DROP TABLE IF EXISTS `classeps`;
CREATE TABLE IF NOT EXISTS `classeps` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classeps`
--

INSERT INTO `classeps` (`id`, `libelle`, `libellear`, `created_at`, `updated_at`) VALUES
(1, 'Officiers', 'Officierar', NULL, NULL),
(2, 'HDT', 'HDTar', NULL, NULL),
(3, 'Sous-Officiers', 'Sous-Officiers ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `classep_unites`
--

DROP TABLE IF EXISTS `classep_unites`;
CREATE TABLE IF NOT EXISTS `classep_unites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unite_id` bigint(20) NOT NULL,
  `classep_id` bigint(20) NOT NULL,
  `theorique` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classep_unites_unite_id_foreign` (`unite_id`),
  KEY `classep_unites_classep_id_foreign` (`classep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classep_unites`
--

INSERT INTO `classep_unites` (`id`, `unite_id`, `classep_id`, `theorique`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, NULL, '2021-03-29 13:49:49'),
(2, 1, 2, 35, NULL, '2021-03-29 13:49:49'),
(3, 1, 3, 150, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionps`
--

DROP TABLE IF EXISTS `fonctionps`;
CREATE TABLE IF NOT EXISTS `fonctionps` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonctionps`
--

INSERT INTO `fonctionps` (`id`, `libelle`, `libellear`, `created_at`, `updated_at`) VALUES
(1, 'Cdt BIM', 'Cdt BIM', NULL, NULL),
(2, 'AdjointCdt BIM', 'AdjointCdt BIM', NULL, NULL),
(3, 'Cdt CIE', 'Cdt CIE', NULL, NULL),
(4, 'COIR', 'COIR', NULL, NULL),
(5, 'Chef Section Cbt', 'Chef Section Cbt', NULL, NULL),
(6, 'Chef Section Soutien', 'Chef Section Soutien', NULL, NULL),
(7, 'Chef Section CDT', 'Chef Section CDT', NULL, NULL),
(8, 'Tireur ', 'Tireur ', NULL, NULL),
(9, 'Chiffreur', 'Chiffreur', NULL, NULL),
(10, 'S/off ordinaire', 'S/off ordinaire', NULL, NULL),
(11, 'S/off de tir', 'S/off de tir', NULL, NULL),
(12, 'Infirmier major', 'Infirmier major', NULL, NULL),
(13, 'S/off Topographies', 'S/off Topographies', NULL, NULL),
(14, 'S/off  TAM', 'S/off  TAM', NULL, NULL),
(15, 'S/off de Rens', 'S/off de Rens', NULL, NULL),
(16, 'Secrétaire ', 'Secrétaire ', NULL, NULL),
(17, 'Radio graphiste', 'Radio graphiste', NULL, NULL),
(18, 'Comptable matière', 'Comptable matière', NULL, NULL),
(19, 'Chef atelier méca', 'Chef atelier méca', NULL, NULL),
(20, 'Mecaniciens', 'Mecaniciens', NULL, NULL),
(21, 'Electrician auto', 'Electrician auto', NULL, NULL),
(22, 'S/off  hydro', 'S/off  hydro', NULL, NULL),
(23, 'Comptable', 'Comptable', NULL, NULL),
(24, 'Infrimier', 'Infrimier', NULL, NULL),
(25, 'Fourrier ', 'Fourrier ', NULL, NULL),
(26, 'Chef de bord', 'Chef de bord', NULL, NULL),
(27, 'Chef de GroupeCbt', 'Chef de GroupeCbt', NULL, NULL),
(28, 'Chef de EquipeCbt', 'Chef de EquipeCbt', NULL, NULL),
(29, 'Artificier', 'Artificier', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classep_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grades_classep_id_foreign` (`classep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grades`
--

INSERT INTO `grades` (`id`, `libelle`, `libellear`, `classep_id`, `created_at`, `updated_at`) VALUES
(1, 'General de Division', 'General de Division ar', 1, NULL, NULL),
(2, 'General de Brigade', 'General de Brigade ar', 1, NULL, NULL),
(3, 'Colonel', 'Colonel', 1, NULL, NULL),
(4, 'Lieutenant-Colonel', 'Lieutenant-Colonel', 1, NULL, NULL),
(5, 'Commandant', 'Commandant', 1, NULL, NULL),
(6, 'Capitaine', 'Capitaine', 1, NULL, NULL),
(7, 'Lieutenant', 'Lieutenant', 1, NULL, NULL),
(8, 'Sous-Lieutenant', 'Sous-Lieutenant', 1, NULL, NULL),
(9, 'Adjudant-chef', 'Adjudant-chef', 2, NULL, NULL),
(10, 'Adjudant ', 'Adjudant ', 2, NULL, NULL),
(11, 'Sergent-chef', 'Sergent-chef', 2, NULL, NULL),
(12, 'Sergent', 'Sergent', 2, NULL, NULL),
(13, 'Caporale', 'Caporale', 3, NULL, NULL),
(14, '1° Classe', '1° Classe', 3, NULL, NULL),
(15, '2° Classe', '2° Classe', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materiels_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`id`, `libelle`, `libellear`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'EFF', 'EFF', 1, NULL, NULL),
(2, 'VL', 'VL', 2, NULL, NULL),
(3, 'PL', 'PL', 3, NULL, NULL),
(4, 'PA', 'PA', 1, NULL, NULL),
(5, 'FA', 'FA', 1, NULL, NULL),
(6, 'FM', 'FM', 2, NULL, NULL),
(7, 'MIT LORD', 'MIT LORD', 4, NULL, NULL),
(8, 'LRAC CP', 'LRAC CP', 4, NULL, NULL),
(9, 'LRAC MP', 'LRAC MP', 2, NULL, NULL),
(10, 'MORT', 'MORT', 3, NULL, NULL),
(11, 'SML', 'SML', 3, NULL, NULL),
(12, 'HF', 'HF', 4, NULL, NULL),
(13, 'VHF', 'VHF', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `materiel_unites`
--

DROP TABLE IF EXISTS `materiel_unites`;
CREATE TABLE IF NOT EXISTS `materiel_unites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unite_id` bigint(20) NOT NULL,
  `materiel_id` bigint(20) NOT NULL,
  `theorique` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materiel_unites_unite_id_foreign` (`unite_id`),
  KEY `materiel_unites_materiel_id_foreign` (`materiel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `materiel_unites`
--

INSERT INTO `materiel_unites` (`id`, `unite_id`, `materiel_id`, `theorique`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 15, NULL, '2021-03-29 11:34:55'),
(2, 1, 2, 15, NULL, '2021-03-29 11:34:55'),
(3, 1, 3, 15, NULL, '2021-03-29 11:34:55'),
(4, 1, 4, 15, NULL, '2021-03-29 11:34:55'),
(5, 1, 5, 20, NULL, '2021-03-29 11:36:11'),
(6, 19, 5, 20, '2021-03-30 00:10:14', '2021-03-30 00:10:14'),
(7, 20, 1, 15, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(8, 20, 2, 15, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(9, 20, 3, 15, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(10, 20, 4, 15, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(11, 20, 5, 20, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(12, 21, 1, 15, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(13, 21, 2, 15, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(14, 21, 3, 15, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(15, 21, 4, 15, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(16, 21, 5, 20, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(17, 22, 1, 15, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(18, 22, 2, 15, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(19, 22, 3, 15, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(20, 22, 4, 15, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(21, 22, 5, 20, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(22, 2, 1, 15, NULL, NULL),
(23, 2, 2, 20, NULL, NULL),
(24, 2, 3, 18, NULL, NULL),
(25, 2, 8, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_27_115423_create_regions_table', 1),
(5, '2021_03_27_115714_create_bataillons_table', 1),
(6, '2021_03_27_115741_create_unites_table', 1),
(7, '2021_03_27_115818_create_fonctionps_table', 1),
(8, '2021_03_27_115849_create_qualifications_table', 1),
(9, '2021_03_27_115928_create_classeps_table', 1),
(10, '2021_03_27_115948_create_grades_table', 1),
(11, '2021_03_27_120350_create_categories_table', 1),
(12, '2021_03_27_120425_create_materiels_table', 1),
(13, '2021_03_27_120503_create_personnes_table', 1),
(14, '2021_03_27_150617_create_classep_unites_table', 1),
(15, '2021_03_27_152021_create_materiel_unites_table', 1),
(20, '2021_03_27_171456_create_personne_unites_table', 5),
(21, '2021_03_27_171853_create_pieces_table', 6),
(18, '2021_03_27_190910_create_qualification_unites_table', 3),
(19, '2021_03_28_004151_create_personne_qualifications_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `matricule`, `nom`, `prenom`, `created_at`, `updated_at`) VALUES
(1, '23B', 'Sass', 'Vadel', '2021-03-28 00:38:12', '2021-03-28 00:38:12'),
(2, '24BA', 'Salem', 'Vadel', '2021-03-28 00:51:09', '2021-03-28 00:51:09'),
(3, '25BA', 'Mokhtar', 'Ahmed', '2021-03-28 00:52:04', '2021-03-28 00:52:04'),
(4, '24BV', 'Ahmed', 'Mahfodh', '2021-03-28 00:52:04', '2021-03-28 00:52:04'),
(5, '345', 'Boubacar', 'Abdellahi', '2021-03-28 00:52:04', '2021-03-28 00:52:04'),
(6, '566', 'Sidaty', 'Sidaty', '2021-03-28 00:52:04', '2021-03-28 00:52:04'),
(7, '24Bt', 'Salem', 'Vadel', '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(8, '25Bvf', 'Mokhtar', 'Ahmed', '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(9, '24Byu', 'Ahmed', 'Mahfodh', '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(10, '345bh', 'Boubacar', 'Abdellahi', '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(11, '566A', 'Sidaty', 'Sidaty', '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(12, 'ghj', 'egd', 'Jeil', '2021-05-14 21:11:38', '2021-05-14 21:11:38');

-- --------------------------------------------------------

--
-- Structure de la table `personne_qualifications`
--

DROP TABLE IF EXISTS `personne_qualifications`;
CREATE TABLE IF NOT EXISTS `personne_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `personne_id` bigint(20) NOT NULL,
  `qualification_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personne_qualifications_personne_id_foreign` (`personne_id`),
  KEY `personne_qualifications_qualification_id_foreign` (`qualification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne_qualifications`
--

INSERT INTO `personne_qualifications` (`id`, `personne_id`, `qualification_id`, `created_at`, `updated_at`) VALUES
(1, 1, 88, '2021-03-28 00:52:04', '2021-03-28 00:52:04'),
(2, 2, 66, '2021-03-28 00:52:04', '2021-03-28 00:52:04');

-- --------------------------------------------------------

--
-- Structure de la table `personne_unites`
--

DROP TABLE IF EXISTS `personne_unites`;
CREATE TABLE IF NOT EXISTS `personne_unites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unite_id` bigint(20) NOT NULL,
  `personne_id` bigint(20) NOT NULL,
  `grade_id` bigint(20) NOT NULL,
  `fonctionp_id` bigint(20) NOT NULL,
  `qualification_id` bigint(20) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personne_unites_unite_id_foreign` (`unite_id`),
  KEY `personne_unites_personne_id_foreign` (`personne_id`),
  KEY `personne_unites_fonctionp_id_foreign` (`fonctionp_id`),
  KEY `personne_unites_qualification_id_foreign` (`qualification_id`),
  KEY `personne_unites_grade_id_foreign` (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne_unites`
--

INSERT INTO `personne_unites` (`id`, `unite_id`, `personne_id`, `grade_id`, `fonctionp_id`, `qualification_id`, `etat`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10, 64, 2, '2021-03-28', '2021-03-28 00:46:13', '2021-03-28 00:46:36'),
(2, 4, 1, 1, 10, 64, 1, '2021-03-28', '2021-03-28 00:46:36', '2021-03-28 00:46:36'),
(3, 4, 2, 4, 28, 90, 2, '2021-03-28', '2021-03-28 00:51:09', '2021-03-28 00:52:04'),
(4, 4, 2, 4, 28, 90, 2, '2021-03-28', '2021-03-28 00:52:04', '2021-03-28 00:54:08'),
(5, 4, 3, 6, 13, 89, 2, '2021-03-28', '2021-03-28 00:52:04', '2021-03-28 00:54:08'),
(6, 4, 4, 4, 10, 91, 2, '2021-03-28', '2021-03-28 00:52:04', '2021-03-28 00:54:08'),
(7, 4, 5, 1, 18, 88, 2, '2021-03-28', '2021-03-28 00:52:04', '2021-03-28 00:54:08'),
(8, 4, 6, 14, 7, 67, 2, '2021-03-28', '2021-03-28 00:52:04', '2021-03-28 00:54:08'),
(9, 8, 2, 4, 28, 90, 2, '2021-03-28', '2021-03-28 00:54:08', '2021-03-28 00:59:07'),
(10, 8, 3, 6, 13, 89, 2, '2021-03-28', '2021-03-28 00:54:08', '2021-03-28 00:59:07'),
(11, 8, 4, 4, 10, 91, 2, '2021-03-28', '2021-03-28 00:54:08', '2021-03-28 00:59:07'),
(12, 8, 5, 1, 18, 88, 2, '2021-03-28', '2021-03-28 00:54:08', '2021-03-28 00:59:07'),
(13, 8, 6, 14, 7, 67, 2, '2021-03-28', '2021-03-28 00:54:08', '2021-03-28 00:59:07'),
(14, 8, 2, 4, 28, 90, 2, '2021-03-28', '2021-03-28 00:59:07', '2021-03-29 23:11:01'),
(15, 8, 3, 6, 13, 89, 2, '2021-03-28', '2021-03-28 00:59:07', '2021-03-29 23:11:01'),
(16, 8, 4, 4, 10, 91, 2, '2021-03-28', '2021-03-28 00:59:07', '2021-03-29 23:11:01'),
(17, 8, 5, 1, 18, 88, 2, '2021-03-28', '2021-03-28 00:59:07', '2021-03-29 23:11:01'),
(18, 8, 6, 14, 7, 67, 2, '2021-03-28', '2021-03-28 00:59:07', '2021-03-29 23:11:01'),
(19, 2, 2, 4, 24, 90, 2, '2021-03-30', '2021-03-29 23:11:01', '2021-03-29 23:13:06'),
(20, 2, 3, 6, 16, 89, 2, '2021-03-30', '2021-03-29 23:11:01', '2021-03-29 23:13:06'),
(21, 2, 4, 4, 17, 91, 2, '2021-03-30', '2021-03-29 23:11:01', '2021-03-29 23:13:06'),
(22, 2, 5, 1, 29, 88, 2, '2021-03-30', '2021-03-29 23:11:01', '2021-03-29 23:13:06'),
(23, 2, 6, 14, 8, 67, 2, '2021-03-30', '2021-03-29 23:11:01', '2021-03-29 23:13:06'),
(24, 2, 2, 4, 24, 90, 1, '2021-03-30', '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(25, 2, 3, 6, 16, 89, 1, '2021-03-30', '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(26, 2, 4, 4, 17, 91, 1, '2021-03-30', '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(27, 2, 5, 1, 29, 88, 1, '2021-03-30', '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(28, 2, 6, 14, 8, 67, 1, '2021-03-30', '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(29, 2, 7, 4, 24, 88, 2, '2021-03-30', '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(30, 2, 8, 6, 16, 88, 2, '2021-03-30', '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(31, 2, 9, 4, 17, 27, 2, '2021-03-30', '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(32, 2, 10, 1, 29, 17, 2, '2021-03-30', '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(33, 2, 11, 14, 8, 67, 2, '2021-03-30', '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(34, 8, 7, 4, 24, 88, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(35, 8, 8, 6, 16, 88, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(36, 8, 9, 4, 17, 27, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(37, 8, 10, 1, 29, 17, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(38, 8, 11, 14, 8, 67, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(39, 8, 12, 4, 9, 89, 2, '2021-05-14', '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(40, 8, 7, 4, 24, 88, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(41, 8, 8, 6, 16, 88, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(42, 8, 9, 4, 17, 27, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(43, 8, 10, 1, 29, 17, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(44, 8, 11, 14, 8, 67, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(45, 8, 12, 4, 9, 89, 2, '2021-05-14', '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(46, 1, 7, 4, 24, 88, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(47, 1, 8, 6, 16, 88, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(48, 1, 9, 4, 17, 27, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(49, 1, 10, 1, 29, 17, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(50, 1, 11, 14, 8, 67, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(51, 1, 12, 4, 9, 89, 1, '2021-05-14', '2021-05-14 21:12:36', '2021-05-14 21:12:36');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `num_serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite_id` bigint(20) NOT NULL,
  `materiel_id` bigint(20) NOT NULL,
  `etat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pieces_unite_id_foreign` (`unite_id`),
  KEY `pieces_materiel_id_foreign` (`materiel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id`, `num_serie`, `unite_id`, `materiel_id`, `etat`, `created_at`, `updated_at`) VALUES
(1, '345YT', 8, 8, 2, '2021-03-28 00:59:07', '2021-03-28 00:59:07'),
(2, '55', 8, 10, 2, '2021-03-28 00:59:07', '2021-03-29 23:13:06'),
(3, '27JU', 8, 12, 2, '2021-03-28 00:59:07', '2021-03-29 23:13:06'),
(4, '78AB09', 8, 6, 2, '2021-03-28 00:59:07', '2021-03-29 23:13:06'),
(5, '998AV', 8, 3, 2, '2021-03-28 00:59:07', '2021-03-29 23:13:06'),
(6, '345YT', 2, 8, 2, '2021-03-29 23:13:06', '2021-03-29 23:13:06'),
(7, '55', 2, 10, 2, '2021-03-29 23:13:06', '2021-03-30 15:39:51'),
(8, '27JU', 2, 12, 2, '2021-03-29 23:13:06', '2021-03-30 15:39:51'),
(9, '78AB09', 2, 6, 2, '2021-03-29 23:13:06', '2021-03-30 15:39:51'),
(10, '998AV', 2, 3, 2, '2021-03-29 23:13:06', '2021-03-30 15:39:51'),
(11, '345YT', 2, 8, 2, '2021-03-30 15:39:51', '2021-03-30 15:39:51'),
(12, '55', 2, 10, 2, '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(13, '27JU', 2, 12, 2, '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(14, '78AB09', 2, 6, 2, '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(15, '998AV', 2, 3, 2, '2021-03-30 15:39:51', '2021-05-14 21:11:38'),
(16, '345YT', 8, 8, 2, '2021-05-14 21:11:38', '2021-05-14 21:11:38'),
(17, '55', 8, 10, 2, '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(18, '27JU', 8, 12, 2, '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(19, '78AB09', 8, 6, 2, '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(20, '998AV', 8, 3, 2, '2021-05-14 21:11:38', '2021-05-14 21:12:14'),
(21, '345YT', 8, 8, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:14'),
(22, '55', 8, 10, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(23, '27JU', 8, 12, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(24, '78AB09', 8, 6, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(25, '998AV', 8, 3, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(26, '1342', 8, 8, 2, '2021-05-14 21:12:14', '2021-05-14 21:12:36'),
(27, '345YT', 1, 8, 2, '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(28, '55', 1, 10, 1, '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(29, '27JU', 1, 12, 1, '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(30, '78AB09', 1, 6, 3, '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(31, '998AV', 1, 3, 1, '2021-05-14 21:12:36', '2021-05-14 21:12:36'),
(32, '1342', 1, 8, 3, '2021-05-14 21:12:36', '2021-05-14 21:12:36');

-- --------------------------------------------------------

--
-- Structure de la table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE IF NOT EXISTS `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualifications`
--

INSERT INTO `qualifications` (`id`, `libelle`, `libellear`, `created_at`, `updated_at`) VALUES
(1, 'DEM', 'DEM', NULL, NULL),
(2, 'CPOS ', 'CPOS ', NULL, NULL),
(3, 'CPOS CAVALERIE', 'CPOS CAVALERIE', NULL, NULL),
(4, 'APL ABC', 'APL ABC', NULL, NULL),
(5, 'DA', 'DA', NULL, NULL),
(6, 'APL AUTO', 'APL AUTO', NULL, NULL),
(7, 'AP RENS', 'AP RENS', NULL, NULL),
(8, 'APL GENIE', 'APL GENIE', NULL, NULL),
(9, 'APL TRAIN', 'APL TRAIN', NULL, NULL),
(10, 'AP TRANS', 'AP TRANS', NULL, NULL),
(11, 'MEDECIN OFF', 'MEDECIN OFF', NULL, NULL),
(12, 'MEDECIN DENTISTE', 'MEDECIN DENTISTE', NULL, NULL),
(13, 'AP ADM', 'AP ADM', NULL, NULL),
(14, 'AP CHANC', 'AP CHANC', NULL, NULL),
(15, 'BT CHANC', 'BT CHANC', NULL, NULL),
(16, 'BT DOC', 'BT DOC', NULL, NULL),
(17, 'CT2 CHANC', 'CT2 CHANC', NULL, NULL),
(18, 'CT2 EFF', 'CT2 EFF', NULL, NULL),
(19, 'CT1 ARMEMENT', 'CT1 ARMEMENT', NULL, NULL),
(20, 'BT TDG', 'BT TDG', NULL, NULL),
(21, 'BT HYDRO', 'BT HYDRO', NULL, NULL),
(22, 'BT RAV', 'BT RAV', NULL, NULL),
(23, 'TAM', 'TAM', NULL, NULL),
(24, 'CT2 TDG', 'CT2 TDG', NULL, NULL),
(25, 'CT2 ELEC AUTO', 'CT2 ELEC AUTO', NULL, NULL),
(26, 'CT1 TDG', 'CT1 TDG', NULL, NULL),
(27, 'BT ARMEMENT', 'BT ARMEMENT', NULL, NULL),
(28, 'BT COMPT MAT', 'BT COMPT MAT', NULL, NULL),
(29, 'BT ELEC AUTO', 'BT ELEC AUTO', NULL, NULL),
(30, 'BT MECA AUTO', 'BT MECA AUTO', NULL, NULL),
(31, 'BT MUNITIONS', 'BT MUNITIONS', NULL, NULL),
(32, 'BT TRAIN', 'BT TRAIN', NULL, NULL),
(33, 'CT1 AIDE ELEC', 'CT1 AIDE ELEC', NULL, NULL),
(34, 'CT1 AIDE MECA AUTO', 'CT1 AIDE MECA AUTO', NULL, NULL),
(35, 'CT1 ARMEMENT', 'CT1 ARMEMENT', NULL, NULL),
(36, 'CT1 MUNITIONS', 'CT1 MUNITIONS', NULL, NULL),
(37, 'CT1 TOLLIET', 'CT1 TOLLIET', NULL, NULL),
(38, 'CT1-CT2 HYDRO', 'CT1-CT2 HYDRO', NULL, NULL),
(39, 'CT2 APPRO', 'CT2 APPRO', NULL, NULL),
(40, 'CT2 ARMEMENT', 'CT2 ARMEMENT', NULL, NULL),
(41, 'CT2 MECA AUTO', 'CT2 MECA AUTO', NULL, NULL),
(42, 'CT2 MUNITIONS', 'CT2 MUNITIONS', NULL, NULL),
(43, 'PERMIS PL', 'PERMIS PL', NULL, NULL),
(44, 'PERMIS VL', 'PERMIS VL', NULL, NULL),
(45, 'BT TRANS', 'BT TRANS', NULL, NULL),
(46, '251 TRANS', '251 TRANS', NULL, NULL),
(47, '267', '267', NULL, NULL),
(48, '167', '167', NULL, NULL),
(49, '151', '151', NULL, NULL),
(50, 'CT2 CHIFFRE', 'CT2 CHIFFRE', NULL, NULL),
(51, 'CT1 CHIFFRE', 'CT1 CHIFFRE', NULL, NULL),
(52, 'BT INFO', 'BT INFO', NULL, NULL),
(53, 'CT1-CT2 SECT', 'CT1-CT2 SECT', NULL, NULL),
(54, 'BT ADM', 'BT ADM', NULL, NULL),
(55, 'CT2 ADM', 'CT2 ADM', NULL, NULL),
(56, 'CT1-CT2 ORDINAIRE', 'CT1-CT2 ORDINAIRE', NULL, NULL),
(57, 'CT1 CUIS', 'CT1 CUIS', NULL, NULL),
(58, 'CT1-CT2 HOTELERIE', 'CT1-CT2 HOTELERIE', NULL, NULL),
(59, 'BS SANTE', 'BS SANTE', NULL, NULL),
(60, 'BT PHARM', 'BT PHARM', NULL, NULL),
(61, 'CT2 INFIRMIER', 'CT2 INFIRMIER', NULL, NULL),
(62, 'CT1 AID INFIRIMIER ', 'CT1 AID INFIRIMIER ', NULL, NULL),
(63, 'CT2 LABO', 'CT2 LABO', NULL, NULL),
(64, 'CT2- RADIO', 'CT2- RADIO', NULL, NULL),
(65, 'BT GENIE', 'BT GENIE', NULL, NULL),
(66, 'BT TRAVAUX', 'BT TRAVAUX', NULL, NULL),
(67, 'CT1 MAҪONNERIE', 'CT1 MAҪONNERIE', NULL, NULL),
(68, 'CT2 MAҪONNERIE', 'CT2 MAҪONNERIE', NULL, NULL),
(69, 'CT1-CT2 ARTIFICIER ', 'CT1-CT2 ARTIFICIER ', NULL, NULL),
(70, 'CT1-PLOMBERIE', 'CT1-PLOMBERIE', NULL, NULL),
(71, 'CT1  FERAILLER', 'CT1  FERAILLER', NULL, NULL),
(72, 'CT1 PEINTRE', 'CT1 PEINTRE', NULL, NULL),
(73, 'CT1 MENUISERIE', 'CT1 MENUISERIE', NULL, NULL),
(74, 'CT1 ELECT BATIMENT', 'CT1 ELECT BATIMENT', NULL, NULL),
(75, 'CT1-CT2 GENIE SOUDEUR', 'CT1-CT2 GENIE SOUDEUR', NULL, NULL),
(76, 'BT MECA ART', 'BT MECA ART', NULL, NULL),
(77, 'BT TOPO', 'BT TOPO', NULL, NULL),
(78, 'CT2 ASA', 'CT2 ASA', NULL, NULL),
(79, 'CT1 ASA', 'CT1 ASA', NULL, NULL),
(80, 'CT1 ASS', 'CT1 ASS', NULL, NULL),
(81, 'CT2 MECA ART', 'CT2 MECA ART', NULL, NULL),
(82, 'CT1 MECA ART', 'CT1 MECA ART', NULL, NULL),
(83, 'CT1 TOPO', 'CT1 TOPO', NULL, NULL),
(84, 'BT MECA CHAR', 'BT MECA CHAR', NULL, NULL),
(85, 'PILOTE CHAR', 'PILOTE CHAR', NULL, NULL),
(86, 'CT-CT2- MECA CHAR', 'CT-CT2- MECA CHAR', NULL, NULL),
(87, 'CT-CT2 ELEC CHAR', 'CT-CT2 ELEC CHAR', NULL, NULL),
(88, 'CT1-CT2 MUSIQUE', 'CT1-CT2 MUSIQUE', NULL, NULL),
(89, 'BA1-BA2', 'BA1-BA2', NULL, NULL),
(90, 'CIA', 'CIA', NULL, NULL),
(91, 'CA2', 'CA2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `qualification_unites`
--

DROP TABLE IF EXISTS `qualification_unites`;
CREATE TABLE IF NOT EXISTS `qualification_unites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unite_id` bigint(20) NOT NULL,
  `qualification_id` bigint(20) NOT NULL,
  `theorique` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qualification_unites_unite_id_foreign` (`unite_id`),
  KEY `qualification_unites_qualification_id_foreign` (`qualification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualification_unites`
--

INSERT INTO `qualification_unites` (`id`, `unite_id`, `qualification_id`, `theorique`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL),
(2, 1, 2, 3, NULL, NULL),
(3, 1, 3, 4, NULL, NULL),
(4, 1, 4, 10, NULL, NULL),
(5, 1, 5, 7, NULL, NULL),
(6, 1, 6, 8, NULL, NULL),
(7, 22, 1, 2, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(8, 22, 2, 3, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(9, 22, 3, 4, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(10, 22, 4, 10, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(11, 22, 5, 7, '2021-03-31 10:30:17', '2021-03-31 10:30:17'),
(12, 22, 6, 8, '2021-03-31 10:30:17', '2021-03-31 10:30:17');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `libelle`, `libellear`, `created_at`, `updated_at`) VALUES
(1, 'kJstiJZYfE', 'CdGCNrcIAF', NULL, NULL),
(2, 'fFV0mikoBi', 'n0WprdHu1G', NULL, NULL),
(3, 'UZ2A2S8njM', 'TI9fy2LAYz', NULL, NULL),
(4, 'xJQVHFH3hs', 'f6EHxIjpns', NULL, NULL),
(5, 'dCg1J5z8Bo', 'p9sOWHuj90', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bataillon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unites_bataillon_id_foreign` (`bataillon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`id`, `libelle`, `libellear`, `bataillon_id`, `created_at`, `updated_at`) VALUES
(1, 'OAHQSS', 'pYuq7L', 5, NULL, NULL),
(2, 'znsreU', 'sJaS4G', 3, NULL, NULL),
(3, 'qdiSo3', 'RqwPd6', 11, NULL, NULL),
(4, 'dGKdTa', '8nxsvH', 3, NULL, NULL),
(5, 'aMb0PU', 'rnVv3t', 1, NULL, NULL),
(6, 'z2z5lm', 'c2MUJU', 11, NULL, NULL),
(7, 'LIXK6U', 'pM3X23', 14, NULL, NULL),
(8, 'jw4UQP', 'C58IcC', 8, NULL, NULL),
(9, 'CKiueW', 'SKQ9QK', 2, NULL, NULL),
(10, 'PzpGUv', 'BZoPzO', 11, NULL, NULL),
(11, 'jgYaz9', 'O4RAZX', 11, NULL, NULL),
(12, '2WxBK4', '3eSosA', 6, NULL, NULL),
(13, 'bCj0XV', 'lxGBIo', 6, NULL, NULL),
(14, '8js8bT', 'pt0eJv', 5, NULL, NULL),
(15, 'Unite 5', 'Unite ar 5', 5, '2021-03-29 23:42:16', '2021-03-29 23:42:16'),
(16, 'unite gsi', 'unite gsi ar', 2, '2021-03-30 00:03:49', '2021-03-30 00:03:49'),
(17, 'unite gsi', 'unite gsi ar', 2, '2021-03-30 00:08:05', '2021-03-30 00:08:05'),
(18, 'unite gsi', 'unite gsi ar', 2, '2021-03-30 00:08:12', '2021-03-30 00:08:12'),
(19, 'unite gsi', 'unite gsi ar', 2, '2021-03-30 00:10:14', '2021-03-30 00:10:14'),
(20, 'ggggg', 'gggg', 2, '2021-03-30 00:11:58', '2021-03-30 00:11:58'),
(21, 'Unite BS', 'Unite BS ar', 4, '2021-03-30 23:52:53', '2021-03-30 23:52:53'),
(22, 'Unite BS2', 'Unite BS ar2', 1, '2021-03-31 10:30:17', '2021-03-31 10:30:17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
