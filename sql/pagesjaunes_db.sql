-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Février 2017 à 09:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pagesjaunes_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_abonnement`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_abonnement` (
  `abonnement_id` int(11) NOT NULL AUTO_INCREMENT,
  `abonnement_entrepriseid` int(11) DEFAULT NULL,
  `abonnement_nomoffre` varchar(250) DEFAULT NULL,
  `abonnement_datedebut` date DEFAULT NULL,
  `abonnement_datefin` date DEFAULT NULL,
  `abonnement_dureeval` float DEFAULT NULL,
  `abonnement_dureetype` tinyint(2) DEFAULT NULL,
  `abonnement_montant` decimal(19,2) DEFAULT NULL,
  `abonnement_removalstatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`abonnement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pagesjaunes_abonnement`
--

INSERT INTO `pagesjaunes_abonnement` (`abonnement_id`, `abonnement_entrepriseid`, `abonnement_nomoffre`, `abonnement_datedebut`, `abonnement_datefin`, `abonnement_dureeval`, `abonnement_dureetype`, `abonnement_montant`, `abonnement_removalstatus`) VALUES
(1, 24, 'Offre one', '2017-07-02', '2017-02-17', 4, 2, '4568.54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `namealias` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `annonceur` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `duree` int(4) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_publication` datetime DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  `is_removed` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `modificator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pagesjaunes_ads`
--

INSERT INTO `pagesjaunes_ads` (`id`, `name`, `namealias`, `type`, `description`, `annonceur`, `images`, `duree`, `is_default`, `is_publie`, `date_publication`, `date_creation`, `date_modification`, `is_removed`, `creator_id`, `modificator_id`) VALUES
(1, 'pub132', 'pub132', 2, '', 0, 'brahman.jpg', 8, 1, 1, NULL, '2017-01-28 07:49:27', '2017-02-02 12:40:06', 0, 1, 1),
(2, 'pub2', 'pub2', 1, '', 17, 'yaNNAZ_canal+.jpg', 20, 1, 1, NULL, '2017-01-28 07:59:51', '2017-01-29 08:46:51', 0, 1, 1),
(3, 'Publicité222', '', 1, '', 18, 'bg4.jpg', 0, 0, 1, '2017-01-28 10:40:21', '2017-01-28 08:20:06', '2017-01-28 11:18:53', 1, 1, 1),
(4, 'Eleven pub', 'elevenpub', 2, '', 17, 'iphone_and_ipad-wallpaper-1600x900.jpg', 10, 0, 1, '2017-01-28 08:22:05', '2017-01-28 08:22:05', '2017-01-29 08:46:42', 0, 1, 1),
(5, '', '', 1, '', 0, 'bg3.jpg', 0, 0, 0, NULL, '2017-01-28 08:31:33', '2017-01-28 11:19:12', 1, 1, 1),
(6, 'publicitéss', '', 1, 'ceci est sa description', 17, 'bg1.png', 0, 0, 1, '2017-01-28 08:49:25', '2017-01-28 08:49:25', '2017-01-28 11:18:53', 1, 1, 1),
(7, 'Soif d''aujourd''hui', '', 1, '', 21, 'iphone_and_ipad-wallpaper-300x600-1.jpg', 3, 0, 0, '2017-01-28 10:35:35', '2017-01-28 10:04:15', '2017-01-29 08:46:31', 0, 1, 1),
(8, 'Pension complete', '', 1, '', 20, 'PENSION+COMPLETE.JPG-1.jpg', 5, 0, 1, '2017-01-29 07:36:17', '2017-01-29 07:36:17', '2017-01-29 08:46:13', 0, 1, 1),
(9, 'Essai D', '', 1, '', 19, 'yaNNAZ_canal+-1.jpg', 10, 0, 1, '2017-01-29 08:44:52', '2017-01-29 08:44:52', '2017-02-02 12:40:26', 1, 1, 1),
(10, 'Defile', 'defile', 1, '', 23, 'yaNNAZ_canal+-2.jpg', 2, 0, 1, '2017-02-04 06:01:01', '2017-02-04 06:01:01', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_config`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_config` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(50) NOT NULL,
  `contact_mail` varchar(255) NOT NULL,
  `payment_methods` varchar(10) NOT NULL,
  `edit_ads` tinyint(1) NOT NULL,
  `payment_after_moderate` tinyint(1) NOT NULL,
  `new_window` tinyint(1) NOT NULL,
  `upload_image` tinyint(1) NOT NULL,
  `security_question` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pagesjaunes_ads_config`
--

INSERT INTO `pagesjaunes_ads_config` (`id`, `website_name`, `contact_mail`, `payment_methods`, `edit_ads`, `payment_after_moderate`, `new_window`, `upload_image`, `security_question`) VALUES
(1, 'Pages jaunes Madagascar', 'contact@pagesjaunes.com', 'cheque', 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_souscategorie`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_souscategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_id` int(11) NOT NULL,
  `souscategorie_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `pagesjaunes_ads_souscategorie`
--

INSERT INTO `pagesjaunes_ads_souscategorie` (`id`, `ads_id`, `souscategorie_id`, `date_creation`) VALUES
(1, 0, 1, '2017-01-28 08:22:05'),
(2, 0, 2, '2017-01-28 08:22:05'),
(3, 5, 2, '2017-01-28 08:31:33'),
(4, 5, 8, '2017-01-28 08:31:33'),
(6, 7, 1, '2017-01-28 10:04:15'),
(7, 7, 2, '2017-01-28 10:04:15'),
(8, 6, 2, '2017-01-28 10:15:26'),
(9, 6, 8, '2017-01-28 10:15:26'),
(10, 3, 1, '2017-01-28 10:40:21'),
(11, 3, 2, '2017-01-28 10:40:21'),
(12, 8, 2, '2017-01-29 07:36:17'),
(13, 8, 3, '2017-01-29 07:36:17'),
(14, 9, 3, '2017-01-29 08:44:52'),
(15, 10, 1, '2017-02-04 06:01:01'),
(16, 10, 3, '2017-02-04 06:01:02');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_type`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `namealias` varchar(255) NOT NULL,
  `format` varchar(20) NOT NULL,
  `type_fichier` varchar(100) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_publication` datetime DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `modificator_id` int(11) NOT NULL,
  `is_removed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pagesjaunes_ads_type`
--

INSERT INTO `pagesjaunes_ads_type` (`id`, `name`, `namealias`, `format`, `type_fichier`, `is_publie`, `date_publication`, `date_creation`, `date_modification`, `creator_id`, `modificator_id`, `is_removed`) VALUES
(1, 'Skyskraper', 'skyskraper', '300x600', 'jpg, png, gif', 1, '2017-01-27 21:57:13', '2017-01-27 21:57:13', '2017-01-27 23:35:11', 1, 1, 0),
(2, 'Ad carrée', 'adcarree', '300x300', 'jpg, png, gif', 1, '2017-01-27 22:28:51', '2017-01-27 22:01:50', '2017-02-02 13:26:12', 1, 1, 0),
(3, 'essai', 'essai', '100x100', 'jpg, png, gif', 0, NULL, '2017-01-27 22:42:19', '2017-01-27 22:42:26', 1, 1, 1),
(4, 'essaiType', 'essaitype', '650x210', 'jpg, png, gif', 0, NULL, '2017-02-02 12:38:07', '2017-02-02 12:38:21', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_zone`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_zone` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cost_model` varchar(10) NOT NULL,
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `slots_columns` int(5) NOT NULL,
  `slots_row` int(5) NOT NULL,
  `number_rotation` int(5) NOT NULL,
  `number_client` int(5) NOT NULL,
  `line_height` int(5) NOT NULL,
  `number_ads_default` int(3) NOT NULL,
  `ads_display_method` tinyint(1) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_publication` datetime DEFAULT NULL,
  `creator` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pagesjaunes_ads_zone`
--

INSERT INTO `pagesjaunes_ads_zone` (`id`, `name`, `cost_model`, `width`, `height`, `slots_columns`, `slots_row`, `number_rotation`, `number_client`, `line_height`, `number_ads_default`, `ads_display_method`, `is_publie`, `date_creation`, `date_update`, `date_publication`, `creator`) VALUES
(3, 'Zone1', 'jour', 300, 600, 1, 1, 10, 100, 10, 0, 0, 1, '2017-02-14 12:53:45', NULL, '2017-02-14 17:20:06', 'RAKOTOARIJAONA'),
(4, 'zone2', 'clic', 100, 100, 1, 1, 10, 110, 10, 0, 0, 1, '2017-02-14 13:18:49', NULL, '2017-02-14 13:18:49', 'RAKOTOARIJAONA');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_zone_default`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_zone_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(3) NOT NULL,
  `rang` int(3) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `souscategorie_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `html` text,
  `link` varchar(255) DEFAULT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_publication` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `creator` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pagesjaunes_ads_zone_default`
--

INSERT INTO `pagesjaunes_ads_zone_default` (`id`, `zone_id`, `rang`, `type`, `categorie_id`, `souscategorie_id`, `image`, `html`, `link`, `is_publie`, `date_creation`, `date_publication`, `date_update`, `creator`) VALUES
(1, 3, 10, 1, NULL, NULL, 'brahman-2.jpg', NULL, NULL, 1, '2017-02-15 16:01:24', '2017-02-15 16:01:24', NULL, 'RAKOTOARIJAONA'),
(2, 3, 10, 1, NULL, 13, 'PENSION+COMPLETE.JPG-2.jpg', NULL, NULL, 1, '2017-02-15 16:03:07', '2017-02-15 16:03:07', NULL, 'RAKOTOARIJAONA'),
(3, 3, 10, 2, NULL, NULL, NULL, NULL, NULL, 1, '2017-02-15 16:12:36', '2017-02-15 16:12:36', NULL, 'RAKOTOARIJAONA'),
(4, 3, 10, 2, NULL, NULL, NULL, NULL, NULL, 1, '2017-02-16 11:32:30', '2017-02-16 11:32:30', NULL, 'RAKOTOARIJAONA');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_ads_zone_price`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_ads_zone_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `unity` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `pagesjaunes_ads_zone_price`
--

INSERT INTO `pagesjaunes_ads_zone_price` (`id`, `zone_id`, `price`, `number`, `unity`) VALUES
(1, 3, 10000, 1, 'jour'),
(3, 4, 1000, 1, 'clic'),
(4, 4, 1500, 2, 'clic'),
(5, 7, 1200, 1, 'jour'),
(6, 7, 2400, 2, 'jour'),
(7, 8, 112, 12, 'jour'),
(8, 9, 12300, 1, 'jour'),
(9, 10, 12, 12, 'jour'),
(10, 11, 12, 12, 'jour'),
(11, 12, 1000, 1, 'jour'),
(12, 13, 123, 12, 'jour'),
(13, 3, 20000, 2, 'jour'),
(14, 3, 30000, 3, 'jour');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_catalogue`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_produit` varchar(25) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `image_produit` varchar(50) NOT NULL,
  `description_produit` mediumtext NOT NULL,
  `marque_produit` varchar(50) NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `pagesjaunes_catalogue`
--

INSERT INTO `pagesjaunes_catalogue` (`id`, `reference_produit`, `entreprise_id`, `nom_produit`, `image_produit`, `description_produit`, `marque_produit`, `prix_produit`, `is_publie`, `date_creation`, `date_update`) VALUES
(13, 'produit1', 17, 'prod', 'produit1.png', 'dfqsdfqsdf', 'qsdfqsdf', 100100, 1, '2017-01-19 00:00:00', '2017-02-11 03:48:49'),
(14, 'Ref12', 17, 'ReProd', 'Ref12.jpg', 'reprod ref12', 'marque1', 120000, 1, '2017-01-22 00:00:00', '0000-00-00 00:00:00'),
(15, 'Produit12', 17, 'Connexion', 'Produit12.jpg', 'ssss', 'telma', 300000, 1, '2017-01-29 00:00:00', '0000-00-00 00:00:00'),
(16, 'serv321', 17, 'Séries', 'serv321.jpg', 'Lorem ipsum', 'lorem', 100000, 1, '2017-01-29 18:16:31', '0000-00-00 00:00:00'),
(17, 'ref321', 17, 'Produit23', 'ref321.gif', 'qsdfqdfqdf', 'marque1', 321321, 1, '2017-01-29 18:39:03', '2017-01-29 18:47:55'),
(20, 'ref321', 31, 'Produit321', 'ref321.png', 'azertyuiop', 'marque32', 32000, 1, '2017-02-04 06:19:19', '2017-02-04 06:19:39'),
(21, 'Ref2234', 27, 'prod22365', 'bg3.jpg', 'ceci est un test ehh', 'test', 200, 0, '2017-02-08 14:45:25', '2017-02-11 03:10:55'),
(24, 'ref333', 27, 'prod333', 'image1-1.png', 'desc321', 'marque', 3211111, 1, '2017-02-10 17:02:38', '2017-02-10 17:17:04'),
(25, 'ref14', 27, 'prod15', 'ambohipo.jpg', 'desceecececec', 'sqdf', 3132136, 0, '2017-02-10 17:18:49', '0000-00-00 00:00:00'),
(26, 'a', 31, 'b', 'pensioncompletejpg.jpg', 'ssdf', 'dfdd', 2322, 0, '2017-02-15 15:21:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_categorie`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_categorie` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(150) NOT NULL,
  `categorie_namealias` varchar(255) NOT NULL,
  `categorie_vignette` varchar(255) NOT NULL,
  `categorie_ispublie` tinyint(1) NOT NULL,
  `categorie_datepublication` datetime DEFAULT NULL,
  `categorie_datecreation` datetime NOT NULL,
  `categorie_datemodification` datetime DEFAULT NULL,
  PRIMARY KEY (`categorie_id`),
  UNIQUE KEY `categorie_name` (`categorie_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `pagesjaunes_categorie`
--

INSERT INTO `pagesjaunes_categorie` (`categorie_id`, `categorie_name`, `categorie_namealias`, `categorie_vignette`, `categorie_ispublie`, `categorie_datepublication`, `categorie_datecreation`, `categorie_datemodification`) VALUES
(11, 'Restauration, hotelerie et voyages', 'restauration-hotelerie-et-voyages', 'conseil-et-services-aux-entreprises,-éducation.png', 1, '2017-01-11 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(12, 'communication', 'communication', 'communication-publicité-édition.png', 0, NULL, '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(13, 'Electricité-électronique', 'electricite-electronique', 'Electricité-Electronique.png', 1, '2016-12-18 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(15, 'immobilier-btp', 'immobilier-btp', 'immobilier-btp-construction.png', 1, NULL, '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(16, 'Transport, vehicule', 'transport-vehicule', 'Transports,-véhicules-et-logistique,-entretien.png', 1, '2016-12-18 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(17, 'Textile, habillement', 'textile-habillement', 'Textile,-habillement,-artisanat.png', 1, '2016-12-18 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(26, 'essai2', 'essai2', 'Informatique,-Télécommunication.png', 0, NULL, '2017-02-01 00:00:00', '2017-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_contenuhomepage`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_contenuhomepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `background_parallax` varchar(255) NOT NULL,
  `titre_parallax` varchar(255) NOT NULL,
  `description_parallax` mediumtext NOT NULL,
  `titre_reference` varchar(255) NOT NULL,
  `description_reference` mediumtext NOT NULL,
  `image_reference` varchar(255) NOT NULL,
  `position_image_reference` tinyint(1) NOT NULL,
  `bloc_marketing` mediumtext NOT NULL,
  `image_marketing` varchar(255) NOT NULL,
  `position_image_marketing` tinyint(1) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pagesjaunes_contenuhomepage`
--

INSERT INTO `pagesjaunes_contenuhomepage` (`id`, `background_parallax`, `titre_parallax`, `description_parallax`, `titre_reference`, `description_reference`, `image_reference`, `position_image_reference`, `bloc_marketing`, `image_marketing`, `position_image_marketing`, `is_publie`, `date_creation`, `date_update`) VALUES
(1, 'bg4-1.jpg', 'La solution pour être contacté rapidement', '<p>Facilitez vous la vie, trouvez ce que vous recherchez dans pagesjaunes.mg</p>\r\n', 'MULTIPLATEFORME', '<p>Consultez pagesjaunes.mg &agrave; tout moment. Il s&#39;adaptera quelque soit le terminal sur lequel il est consult&eacute;</p>\r\n', 'devices-re-size.png', 0, '<h2>&nbsp;</h2>\r\n\r\n<h2>Hazovato&nbsp;</h2>\r\n\r\n<p><strong>&nbsp;</strong>Depuis sa fondation en 1956 hazovato &reg; n&rsquo;a eu de cesse de d&eacute;couvrir, transformer et mettre en valeur les ressources naturelles de Madagascar pour la fabrication de meubles en palissandre, meubles en pin, maisons en bois, des mat&eacute;riaux de construction, ossatures, charpentes en bois. Elle utilise &eacute;galement les pierres comme le marbre, l&rsquo;aragonite, le basalte, la labradorite, le jaspe, l&rsquo;agate, le bois fossilis&eacute; et bien d&#39;autres, pour la fabrication des mat&eacute;riaux de rev&ecirc;tement, mobiliers de d&eacute;coration, gravure sur marbre&hellip;</p>\r\n\r\n<p>En malgache les mots <em>Hazo</em> et <em>Vato</em> signifient <em>bois</em> et <em>pierre</em>. Petite ironie linguistique&nbsp;; la r&eacute;union de ces deux mots, &laquo;&nbsp;vatohazo&nbsp;&raquo;, signifie &laquo;&nbsp;bois silicifi&eacute;&nbsp;&raquo;, un des min&eacute;raux les plus remarquables de Madagascar et que nous travaillons depuis des d&eacute;cennies.</p>\r\n\r\n<h4><strong><a href="http://localhost/pagesjaunes_wp/entreprise/hazovato-r/">Lire la suite</a></strong></h4>\r\n', 'photo4.jpg', 1, 1, '2016-12-20 00:00:00', '2017-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_email`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Contenu de la table `pagesjaunes_email`
--

INSERT INTO `pagesjaunes_email` (`id`, `entreprise_id`, `email`, `is_publie`, `date_creation`, `date_update`) VALUES
(14, 0, 'rojo@yahoo.com', 1, '2017-01-04 00:00:00', NULL),
(15, 0, 'rojo@yahoo.com', 1, '2017-01-04 00:00:00', NULL),
(32, 17, 'eleven2@gmail.com', 1, '2017-01-13 00:00:00', '2017-01-20 00:00:00'),
(33, 18, 'nara@gmail.com', 1, '2017-01-18 00:00:00', NULL),
(34, 19, 'dqd@gma.com', 1, '2017-01-18 00:00:00', NULL),
(35, 20, 'eaaner@gmi.com', 1, '2017-01-18 00:00:00', NULL),
(36, 21, 'nra@gm.com', 1, '2017-01-19 00:00:00', NULL),
(37, 22, 'aaer@gm.com', 1, '2017-01-19 00:00:00', NULL),
(38, 23, 'nana@gmail.com', 1, '2017-01-19 00:00:00', NULL),
(39, 24, 'entre@gmail.com', 1, '2017-01-24 00:00:00', NULL),
(40, 25, 'aezraezra@gmal.com', 1, '2017-01-26 19:36:17', NULL),
(41, 26, 'sd@gmal.com', 1, '2017-01-26 20:22:40', NULL),
(92, 27, 'rojo@gmail.com', 1, '2017-01-31 21:02:19', '2017-02-08 21:26:44'),
(93, 28, 'our@gmail.com', 1, '2017-02-04 01:37:24', NULL),
(94, 29, 'eem@gmail.com', 1, '2017-02-04 01:41:40', NULL),
(95, 30, 'qsdf@g.com', 1, '2017-02-04 01:45:33', NULL),
(96, 31, 'ssdfsd@gmail.com', 1, '2017-02-04 06:14:18', NULL),
(99, 27, 'res@gm.com', 1, '2017-02-08 21:14:30', '2017-02-08 21:26:44');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_entreprise`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raisonsociale` varchar(255) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `adresse` mediumtext NOT NULL,
  `region` varchar(50) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `contact_interne` varchar(150) NOT NULL,
  `fonction_contact` varchar(150) NOT NULL,
  `url_website` varchar(255) DEFAULT NULL,
  `video_presentation_active` tinyint(1) NOT NULL,
  `video_presentation` varchar(255) DEFAULT NULL,
  `qui_sommes_nous_active` tinyint(1) NOT NULL,
  `qui_sommes_nous` longtext,
  `nos_services_active` tinyint(1) NOT NULL,
  `nos_services` longtext,
  `nos_references_active` tinyint(1) NOT NULL,
  `nos_references` longtext,
  `videos_active` tinyint(1) NOT NULL,
  `galerie_image_active` tinyint(1) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `position_recherche` tinyint(1) NOT NULL,
  `nombre_visite` int(11) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `catalogue_active` tinyint(1) NOT NULL DEFAULT '0',
  `editer_front_active` tinyint(1) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `clear_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `pagesjaunes_entreprise`
--

INSERT INTO `pagesjaunes_entreprise` (`id`, `raisonsociale`, `activite`, `adresse`, `region`, `logo`, `contact_interne`, `fonction_contact`, `url_website`, `video_presentation_active`, `video_presentation`, `qui_sommes_nous_active`, `qui_sommes_nous`, `nos_services_active`, `nos_services`, `nos_references_active`, `nos_references`, `videos_active`, `galerie_image_active`, `latitude`, `longitude`, `position_recherche`, `nombre_visite`, `is_publie`, `date_creation`, `date_update`, `catalogue_active`, `editer_front_active`, `weight`, `login`, `password`, `clear_password`) VALUES
(17, 'Eleven design', 'Une Agence de conception graphique', 'Lot VT A', '', 'Elevendesignlogo.jpg', 'personne', 'fonction', 'elevendesign.mg', 1, 'entreprisepresentation2017-01-1313940.mp4', 1, '<p>Les designers de Eleven proposent la cr&eacute;ation d&rsquo;un concept de communication fort, d&eacute;clin&eacute; au sein d&rsquo;un univers graphique et applicable &agrave; l&rsquo;ensemble des supports de communication :<br />\r\n&bull; Cr&eacute;ation de logo<br />\r\n&bull; Cr&eacute;ation de charte graphique<br />\r\n&bull; Concepts campagnes publicitaires<br />\r\n&bull; Cr&eacute;ation d&rsquo;annonces presse<br />\r\n&bull; Plaquettes / Flyers / Catalogues &hellip;<br />\r\n&bull; Journaux et magazines<br />\r\n&bull; Rapports d&rsquo;activit&eacute;s<br />\r\n&bull; Pochettes et fiches produits<br />\r\n&bull; Conception r&eacute;daction<br />\r\n&bull; packaging<br />\r\n&bull; Design 3D</p>\r\n\r\n<p><strong>Motion design :</strong></p>\r\n\r\n<p>Films d&rsquo;entreprises, campagnes publicitaires TV, &eacute;v&eacute;nementiel, nos &eacute;quipes assurent la conception, la cr&eacute;ation du territoire sonore, les voix et le montage de tout support audiovisuels 2D et 3D.<br />\r\n&bull; Films Campagnes publicitaires<br />\r\n&bull; Films institutionnels<br />\r\n&bull; Films de promotion produits<br />\r\n&bull; Films d&rsquo;animation</p>\r\n\r\n<p>Communiquons autrement !</p>\r\n', 1, '<p>Les designers de Eleven proposent la cr&eacute;ation d&rsquo;un concept de communication fort, d&eacute;clin&eacute; au sein d&rsquo;un univers graphique et applicable &agrave; l&rsquo;ensemble des supports de communication :<br />\r\n&bull; Cr&eacute;ation de logo<br />\r\n&bull; Cr&eacute;ation de charte graphique<br />\r\n&bull; Concepts campagnes publicitaires<br />\r\n&bull; Cr&eacute;ation d&rsquo;annonces presse<br />\r\n&bull; Plaquettes / Flyers / Catalogues &hellip;<br />\r\n&bull; Journaux et magazines<br />\r\n&bull; Rapports d&rsquo;activit&eacute;s<br />\r\n&bull; Pochettes et fiches produits<br />\r\n&bull; Conception r&eacute;daction<br />\r\n&bull; packaging<br />\r\n&bull; Design 3D</p>\r\n\r\n<p><strong>Motion design :</strong></p>\r\n\r\n<p>Films d&rsquo;entreprises, campagnes publicitaires TV, &eacute;v&eacute;nementiel, nos &eacute;quipes assurent la conception, la cr&eacute;ation du territoire sonore, les voix et le montage de tout support audiovisuels 2D et 3D.<br />\r\n&bull; Films Campagnes publicitaires<br />\r\n&bull; Films institutionnels<br />\r\n&bull; Films de promotion produits<br />\r\n&bull; Films d&rsquo;animation</p>\r\n\r\n<p>Communiquons autrement !</p>\r\n', 1, NULL, 1, 1, '-18.898308395210417', '47.52641424536705', 0, 15, 1, '2017-01-13 00:00:00', '2017-02-10 18:24:47', 1, 1, 20, 'OmCd90Zg', 'b14a94391a2a8e0700471ac4c80ef48556bae60a', '!QoC6h6hU!'),
(18, 'Entreprise1', 'essai', 'aaaaaaaaaaaa', '', 'Entreprise1logo.jpg', 'aera', 'aere', 'aeraer', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 19, 1, '2017-01-18 00:00:00', '2017-02-11 03:44:57', 0, 0, 1, 'ig9QSJ5c', '34c89a7d7db1056718d98c64687778b8a76fd6e3', '3%1DhSf!Hd'),
(19, 'Entreprise2', 'essai2', 'qdfdsf', '', NULL, 'qdf', 'fqdfq', 'qdsfqdsfqd', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 2, 1, '2017-01-18 00:00:00', '2017-02-11 03:51:39', 0, 0, 0, 'bcaSmlRk', '9e1ef2f300116a6151a3f2a53b6cc7c2d0ea5a42', 'zPY9Z?_dw0'),
(20, 'entreprise3', 'aera', 'raeraer', '', NULL, 'areraezr', 'rzaerzer', 'aezraezr', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 56, 1, '2017-01-18 00:00:00', '2017-02-11 03:45:50', 0, 0, 0, 'MN5fqKLf', '2f3a96b9f83f204fc957c441e8fc22b8f0e6686c', '2Pqd,^9BcA'),
(21, 'Entreprise4', 'pertinente', 'adresse14', '', 'Entreprise4logo.png', 'personne', 'personne', 'Entreprise4.com', 1, 'entreprisepresentation2017-01-1916934.mp4', 1, '<p>qsdfqsdfqsf</p>\r\n', 1, '<p>qsdfqdsfqsdf</p>\r\n', 1, '<p>qsdffffzzfzfzf</p>\r\n', 1, 1, NULL, NULL, 0, 3, 1, '2017-01-19 00:00:00', '2017-02-11 03:43:05', 0, 0, 19, 'BkGPS9dX', 'f799a7ae2296d042982ec811a7612215ebfecf06', 'C$2hIqs,P8'),
(22, 'entreprise5', 'aezraerzaer', 'sdfqdf', '', 'entreprise5logo.png', 'aaar', 'raerae', 'qsdfqsdfq', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 2, 1, '2017-01-19 00:00:00', '2017-02-11 03:43:38', 0, 0, 1, 'EIsODdtt', '704032d0d48bb3b0c40e032ff256f3a0b28dc542', 'bTz4^2b~MK'),
(23, 'enttreprise6', 'aerare', 'raera', '', NULL, 'arerar', 'arar', 'areaer', 0, NULL, 0, NULL, 1, '<p>qdfqdfqsdfq</p>\r\n', 0, NULL, 0, 0, NULL, NULL, 0, 2, 1, '2017-01-19 00:00:00', '2017-02-11 03:40:16', 0, 0, 4, '5CBAyOMQ', '7cf518f15cba49a025eaf30a04befe4531d0dd5f', 'p4l4%BiK'),
(24, 'Entreprise12', 'Dynamisation ds entrp', 'aa', 'Antananarivo', 'Entreprise12logo.png', 'persone', 'perso', 'adf.com', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 3, 1, '2017-01-24 00:00:00', '2017-02-11 03:45:20', 0, 1, 1, 'logiun', '1c1fdb27849a277674a71fdc8e0cc24c07135699', '7bf3@LjF*Y'),
(25, 'Raison', 'sociale laeraemzrzeja', 'azeraeraraeraer', '', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 2, '2017-01-26 19:36:16', '2017-02-11 03:42:38', 0, 0, 0, 'AoF17jFJ', 'c05cfaa84213597a247332b79848fb53fb87b88b', 'onRP15,T,v'),
(26, 'Raison2', 'azeruyio poiu qsdfqm', 'amkjmkajaemlkajemrlaejk', '', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 1, '2017-01-26 20:22:40', '2017-02-11 06:42:43', 0, 0, 0, 'hqHubQRw', 'f688cfe4417908cc54237b6029debcfd6c5dfaae', 'Cyf#RoO7$8'),
(27, 'raison322', 'Description courte de votre activité', 'Description courte de votre activité', 'Antananarivo', 'raison322logo.png', '', '', 'Adresse', 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, 1, '45654', '546465', 0, 2, 1, '2017-01-26 20:32:33', '2017-02-11 10:08:22', 1, 1, 20, '1tUc8lFL', 'ec69268e9ffcec71ec9ef39a5c000f6e1dfcdc5e', '?kD2Vv*7Rj'),
(28, 'Our team', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 0, '2017-02-04 01:37:24', '2017-02-11 03:46:30', 0, 0, 0, 'OQQJ2IGQ', '659295be5352a436eb05d3ddfb0ae1922d6a4e16', 'BR5b?L1^kt'),
(29, 'nouvelle Entreprise', 'gestion des utilisateurs ', 'adresse sdfsdsf', 'regoin', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 0, '2017-02-04 01:41:40', '2017-02-11 03:46:44', 0, 0, 0, 'rojo', 'cc8b0c09cf40e00f05a694671e1a8d6f78946005', 'rojobe'),
(30, 'Starcraft', 'jeu mondiale', 'adresse sdfsdsfs', 'regoin', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 0, '2017-02-04 01:45:33', '2017-02-11 03:45:35', 0, 0, 0, 'mlkj', '5db8927ab9d47fbf134c00c12e7419beb9971eb8', 'rojobeezraer'),
(31, 'great feautres now', 'workflow Donec sed em lori', 'Conference on the sales results for the previous year', 'Tana', NULL, 'peron', '', NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, 0, 0, 0, '2017-02-04 06:14:18', '2017-02-11 03:43:18', 0, 0, 3, 'bru9LkzT', 'd151d609a0b91c352d1fae97b41b26be3bafb41e', '5M2dcH%%Kn');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_entreprise_search`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_entreprise_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `raisonsociale` varchar(50) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `region` varchar(50) NOT NULL,
  `services` text NOT NULL,
  `produits` text NOT NULL,
  `marques` text NOT NULL,
  `catalogues` text NOT NULL,
  `souscategories` text NOT NULL,
  `motscles` text NOT NULL,
  `telephones` text NOT NULL,
  `is_publie` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `srv_prod_marque` (`services`,`produits`,`marques`,`catalogues`),
  FULLTEXT KEY `regionfulltext` (`adresse`,`region`),
  FULLTEXT KEY `telephonesfulltext` (`telephones`),
  FULLTEXT KEY `allfulltext` (`raisonsociale`,`activite`,`adresse`,`region`,`services`,`produits`,`marques`,`catalogues`,`souscategories`,`motscles`,`telephones`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `pagesjaunes_entreprise_search`
--

INSERT INTO `pagesjaunes_entreprise_search` (`id`, `entreprise_id`, `raisonsociale`, `activite`, `adresse`, `region`, `services`, `produits`, `marques`, `catalogues`, `souscategories`, `motscles`, `telephones`, `is_publie`) VALUES
(1, 27, 'raison322', 'Description courte de votre activité', 'Description courte de votre activité', 'Antananarivo', 'Services1 Services6', 'Produits4 ici le produit', ' Marques48484 ici la marque', ' prod22365 prod333 prod15', ' Restauration Electronique textile', '', ' 030303030 032654987', 1),
(2, 31, 'great feautres now', 'workflow Donec sed em lori', 'Conference on the sales results for the previous year', 'Tana', ' serb131 serb..', ' ptof33', ' maq', ' Produit321', ' Restauration hotelerie', '', ' +261 33 45 987 63', 0),
(3, 17, 'Eleven design', 'Une Agence de conception graphique', 'Lot VT A', '', ' print design web design motion design packaging', ' videos flyers', '', ' prod ReProd Connexion Séries Produit23', ' publicités', 'eleven design', '', 1),
(4, 23, 'enttreprise6', 'aerare', 'raera', '', '', '', '', '', ' voyage hotelerie publicités', 'qsdf', ' 033 54 656 99', 1),
(5, 25, 'Raison', 'sociale laeraemzrzeja', 'azeraeraraeraer', '', '', '', '', '', '', '', ' 0320320320', 2),
(6, 19, 'Entreprise2', 'essai2', 'qdfdsf', '', '', '', '', '', ' Restauration voyage hotelerie', 'essai', ' 033 24 655 65', 1),
(7, 21, 'Entreprise4', 'pertinente', 'adresse14', '', ' serv1', ' rer', ' marque', '', ' publicités', 'entreprise e', ' 033 12 542 25', 1),
(8, 22, 'entreprise5', 'aezraerzaer', 'sdfqdf', '', ' sde', ' ff', ' qdsfsdf', '', ' voyage publicités', 'aer', ' 033 12 545 65', 1),
(9, 26, 'Raison2', 'azeruyio poiu qsdfqm', 'amkjmkajaemlkajemrlaejk', '', 'service1 service2', 'produit1', ' marque1 marque2', '', ' Restauration', '', ' 033 223 323', 1),
(10, 18, 'Entreprise1', 'essai', 'aaaaaaaaaaaa', '', '', '', '', '', ' Restauration voyage hotelerie Eléctricité publicités', 'entreprise', ' 032 03 523 32', 1),
(11, 24, 'Entreprise12', 'Dynamisation ds entrp', 'aa', 'Antananarivo', '', '', '', '', ' Restauration voyage publicités', 'entreprsie', ' 033 21 456 85', 1),
(13, 30, 'Starcraft', 'jeu mondiale', 'adresse sdfsdsfs', 'regoin', '', '', '', '', ' test communication', '', ' 3213', 0),
(14, 20, 'entreprise3', 'aera', 'raeraer', '', '', '', '', '', ' Restauration publicités Eléctricité', 'entreprise3', ' 033 25 265 23', 1),
(15, 28, 'Our team', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', '', '', '', '', ' Restauration Souss voyages', '', ' 21313', 0),
(16, 29, 'nouvelle Entreprise', 'gestion des utilisateurs ', 'adresse sdfsdsf', 'regoin', '', '', '', '', ' Restauration', '', ' 3213213', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_entreprise_souscategorie`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_entreprise_souscategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `souscategorie_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Contenu de la table `pagesjaunes_entreprise_souscategorie`
--

INSERT INTO `pagesjaunes_entreprise_souscategorie` (`id`, `entreprise_id`, `souscategorie_id`, `date_creation`, `date_update`) VALUES
(62, 17, 3, '2017-01-13 00:00:00', '2017-02-10 18:24:47'),
(63, 18, 1, '2017-01-18 00:00:00', '2017-02-11 03:44:57'),
(64, 18, 2, '2017-01-18 00:00:00', '2017-02-11 03:44:57'),
(65, 18, 8, '2017-01-18 00:00:00', '2017-02-11 03:44:57'),
(66, 18, 4, '2017-01-18 00:00:00', '2017-02-11 03:44:57'),
(67, 19, 1, '2017-01-18 00:00:00', '2017-02-11 03:51:39'),
(68, 19, 2, '2017-01-18 00:00:00', '2017-02-11 03:51:39'),
(69, 19, 8, '2017-01-18 00:00:00', '2017-02-11 03:51:39'),
(70, 20, 1, '2017-01-18 00:00:00', '2017-02-11 03:45:50'),
(71, 20, 3, '2017-01-18 00:00:00', '2017-02-11 03:45:50'),
(72, 20, 4, '2017-01-18 00:00:00', '2017-02-11 03:45:50'),
(73, 21, 3, '2017-01-19 00:00:00', '2017-02-11 03:43:05'),
(74, 18, 3, '2017-01-19 00:00:00', '2017-02-11 03:44:57'),
(76, 22, 2, '2017-01-19 00:00:00', '2017-02-11 03:43:38'),
(77, 22, 3, '2017-01-19 00:00:00', '2017-02-11 03:43:38'),
(78, 23, 2, '2017-01-19 00:00:00', '2017-02-11 03:40:16'),
(79, 23, 8, '2017-01-19 00:00:00', '2017-02-11 03:40:17'),
(80, 23, 3, '2017-01-19 00:00:00', '2017-02-11 03:40:17'),
(81, 24, 1, '2017-01-24 00:00:00', '2017-02-11 03:45:20'),
(82, 24, 2, '2017-01-24 00:00:00', '2017-02-11 03:45:20'),
(83, 24, 3, '2017-01-24 00:00:00', '2017-02-11 03:45:20'),
(88, 28, 1, '2017-02-04 01:37:24', '2017-02-11 03:46:30'),
(89, 28, 15, '2017-02-04 01:37:24', '2017-02-11 03:46:30'),
(90, 28, 16, '2017-02-04 01:37:24', '2017-02-11 03:46:31'),
(91, 29, 1, '2017-02-04 01:41:40', '2017-02-11 03:46:44'),
(92, 30, 23, '2017-02-04 01:45:34', '2017-02-11 03:45:35'),
(93, 31, 1, '2017-02-04 06:14:19', '2017-02-11 03:43:18'),
(94, 31, 8, '2017-02-04 06:14:19', '2017-02-11 03:43:18'),
(95, 26, 1, '2017-02-11 06:42:43', NULL),
(96, 27, 1, '2017-02-11 10:08:22', NULL),
(97, 27, 5, '2017-02-11 10:08:23', NULL),
(98, 27, 6, '2017-02-11 10:08:23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_images`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `pagesjaunes_images`
--

INSERT INTO `pagesjaunes_images` (`id`, `entreprise_id`, `image`, `is_publie`, `date_creation`, `date_update`) VALUES
(12, 17, 'girl-notebook.png', 1, '2017-01-17 00:00:00', NULL),
(13, 17, 'exode-1.jpg', 1, '2017-01-18 00:00:00', NULL),
(16, 17, 'farm-2-wallpaper-1600x900-1.jpg', 1, '2017-01-18 00:00:00', NULL),
(18, 17, 'new-york-6-wallpaper-640x900.jpg', 1, '2017-01-18 00:00:00', NULL),
(19, 21, 'logo-vertical-quadrichrome.png', 1, '2017-01-19 00:00:00', NULL),
(20, 27, 'bg1-1.png', 1, '2017-01-31 18:12:29', NULL),
(21, 27, 'bg4-1.jpg', 1, '2017-01-31 18:12:45', NULL),
(22, 27, 'iphone-and-ipad-wallpaper-1600x900-1.jpg', 1, '2017-01-31 20:34:23', NULL),
(23, 27, 'bg3-1.jpg', 1, '2017-01-31 20:35:04', NULL),
(24, 27, 'logornf-1.png', 1, '2017-01-31 20:44:09', NULL),
(26, 31, 'bg4-1.jpg', 1, '2017-02-04 06:16:51', NULL),
(27, 31, 'iphone-and-ipad-wallpaper-1600x900-1.jpg', 1, '2017-02-04 06:17:00', NULL),
(29, 27, 'download-1.png', 1, '2017-02-08 03:44:56', NULL),
(32, 27, 'bg2-1.jpg', 1, '2017-02-08 12:03:30', NULL),
(33, 27, 'pension-complete.JPG', 1, '2017-02-10 17:20:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jacl2_group`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jacl2_group` (
  `id_aclgrp` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `namealias` varchar(125) NOT NULL,
  `grouptype` tinyint(4) NOT NULL DEFAULT '0',
  `ownerlogin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_aclgrp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pagesjaunes_jacl2_group`
--

INSERT INTO `pagesjaunes_jacl2_group` (`id_aclgrp`, `name`, `namealias`, `grouptype`, `ownerlogin`) VALUES
('superadmin', 'Super Admin', 'superadmin', 0, NULL),
('__priv_admin', 'admin', 'admin', 2, 'admin'),
('__priv_administrateur', 'administrateur', 'administrateur', 2, 'administrateur'),
('__priv_useressai', 'useressai', 'useressai', 2, 'useressai'),
('administrateur', 'Administrateur', 'administrateur', 0, NULL),
('__priv_user2', 'user2', 'user2', 2, 'user2'),
('__priv_usertest', 'usertest', '', 2, 'usertest'),
('custom', 'custom3', 'custom', 0, NULL),
('__priv_rija', 'rija', '', 2, 'rija'),
('__priv_Rijatina', 'Rijatina', '', 2, 'Rijatina'),
('editeur', 'Editeur', '', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jacl2_rights`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jacl2_rights` (
  `id_aclsbj` varchar(100) NOT NULL,
  `id_aclgrp` varchar(50) NOT NULL,
  `id_aclres` varchar(100) NOT NULL DEFAULT '-',
  `canceled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_aclsbj`,`id_aclgrp`,`id_aclres`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pagesjaunes_jacl2_rights`
--

INSERT INTO `pagesjaunes_jacl2_rights` (`id_aclsbj`, `id_aclgrp`, `id_aclres`, `canceled`) VALUES
('jprefs.prefs.list', 'admins', '-', 0),
('categorie.update', 'administrateur', '-', 0),
('user.create', 'administrateur', '-', 0),
('categorie.list', 'administrateur', '-', 0),
('categorie.create', 'administrateur', '-', 0),
('homepage.update', 'administrateur', '-', 0),
('right.list', 'administrateur', '-', 0),
('slideshow.list', 'administrateur', '-', 0),
('homepage.update', 'superadmin', '-', 0),
('entreprise.create', 'administrateur', '-', 0),
('profile.list', 'superadmin', '-', 0),
('acl.group.create', '__priv_admin', '-', 0),
('acl.group.delete', '__priv_admin', '-', 0),
('acl.group.modify', '__priv_admin', '-', 0),
('acl.group.view', '__priv_admin', '-', 0),
('acl.user.modify', '__priv_admin', '-', 0),
('acl.user.view', '__priv_admin', '-', 0),
('auth.user.change.password', '__priv_admin', '-', 0),
('auth.user.modify', '__priv_admin', '-', 0),
('auth.user.view', '__priv_admin', '-', 0),
('auth.users.change.password', '__priv_admin', '-', 0),
('auth.users.create', '__priv_admin', '-', 0),
('auth.users.delete', '__priv_admin', '-', 0),
('auth.users.list', '__priv_admin', '-', 0),
('auth.users.modify', '__priv_admin', '-', 0),
('auth.users.view', '__priv_admin', '-', 0),
('jprefs.prefs.list', '__priv_admin', '-', 0),
('topsrecherche.delete', 'superadmin', '-', 0),
('topsrecherche.update', 'superadmin', '-', 0),
('categorie.create', 'superadmin', '-', 0),
('slideshow.delete', 'superadmin', '-', 0),
('topsrecherche.list', 'superadmin', '-', 0),
('topsrecherche.list', 'administrateur', '-', 0),
('topsrecherche.create', 'superadmin', '-', 0),
('topsrecherche.create', 'administrateur', '-', 0),
('slideshow.update', 'superadmin', '-', 0),
('slideshow.list', 'superadmin', '-', 0),
('slideshow.create', 'superadmin', '-', 0),
('entreprise.delete', 'superadmin', '-', 0),
('entreprise.list', 'administrateur', '-', 0),
('entreprise.update', 'superadmin', '-', 0),
('entreprise.list', 'superadmin', '-', 0),
('entreprise.create', 'superadmin', '-', 0),
('dashboard.menu', 'superadmin', '-', 0),
('right.update', 'superadmin', '-', 0),
('right.list', 'superadmin', '-', 0),
('admin.right.update', 'superadmin', '-', 0),
('admin.right.list', 'superadmin', '-', 0),
('user.delete', 'superadmin', '-', 0),
('user.menu', 'superadmin', '-', 0),
('user.update', 'superadmin', '-', 0),
('user.list', 'superadmin', '-', 0),
('user.create', 'superadmin', '-', 0),
('profile.delete', 'superadmin', '-', 0),
('profile.menu', 'superadmin', '-', 0),
('profile.update', 'superadmin', '-', 0),
('profile.create', 'superadmin', '-', 0),
('topsrecherche.delete', 'administrateur', '-', 0),
('topsrecherche.update', 'administrateur', '-', 0),
('categorie.delete', 'administrateur', '-', 0),
('right.update', 'administrateur', '-', 0),
('profile.list', 'administrateur', '-', 0),
('admin.right.list', 'administrateur', '-', 0),
('admin.right.update', 'administrateur', '-', 0),
('user.menu', 'administrateur', '-', 0),
('user.delete', 'administrateur', '-', 0),
('user.list', 'administrateur', '-', 0),
('user.update', 'administrateur', '-', 0),
('profile.delete', 'administrateur', '-', 0),
('profile.menu', 'administrateur', '-', 0),
('profile.update', 'administrateur', '-', 0),
('profile.create', 'administrateur', '-', 0),
('categorie.list', 'superadmin', '-', 0),
('categorie.update', 'superadmin', '-', 0),
('entreprise.update', 'administrateur', '-', 0),
('categorie.delete', 'superadmin', '-', 0),
('keywords.create', 'superadmin', '-', 0),
('keywords.list', 'superadmin', '-', 0),
('keywords.update', 'superadmin', '-', 0),
('entreprise.delete', 'administrateur', '-', 0),
('keywords.delete', 'superadmin', '-', 0),
('homepage.menu', 'superadmin', '-', 0),
('keywords.create', 'administrateur', '-', 0),
('keywords.list', 'administrateur', '-', 0),
('keywords.update', 'administrateur', '-', 0),
('keywords.delete', 'administrateur', '-', 0),
('homepage.menu', 'administrateur', '-', 0),
('pages.update', 'administrateur', '-', 0),
('pages.list', 'administrateur', '-', 0),
('pages.update', 'superadmin', '-', 0),
('pages.list', 'superadmin', '-', 0),
('pages.create', 'superadmin', '-', 0),
('pages.delete', 'superadmin', '-', 0),
('pages.create', 'administrateur', '-', 0),
('ads.list', 'superadmin', '-', 0),
('ads.create', 'superadmin', '-', 0),
('ads.update', 'superadmin', '-', 0),
('ads.delete', 'superadmin', '-', 0),
('ads.type.list', 'superadmin', '-', 0),
('ads.type.create', 'superadmin', '-', 0),
('ads.type.update', 'superadmin', '-', 0),
('ads.type.delete', 'superadmin', '-', 0),
('profile.restrictall', 'custom', '-', 0),
('right.list', 'custom', '-', 0),
('dashboard.restrictall', 'custom', '-', 0),
('dashboard.menu', 'custom', '-', 0),
('admin.right.restrictall', 'custom', '-', 0),
('profile.create', 'custom', '-', 0),
('profile.list', 'custom', '-', 0),
('profile.menu', 'custom', '-', 0),
('pages.delete', 'administrateur', '-', 0),
('pages.restrictall', 'administrateur', '-', 0),
('ads.create', 'administrateur', '-', 0),
('ads.list', 'administrateur', '-', 0),
('ads.update', 'administrateur', '-', 0),
('ads.delete', 'administrateur', '-', 0),
('ads.restrictall', 'administrateur', '-', 0),
('ads.type.create', 'administrateur', '-', 0),
('ads.type.list', 'administrateur', '-', 0),
('ads.type.update', 'administrateur', '-', 0),
('ads.type.delete', 'administrateur', '-', 0),
('ads.type.restrictall', 'administrateur', '-', 0),
('profile.restrictall', 'administrateur', '-', 0),
('user.restrictall', 'administrateur', '-', 0),
('entreprise.update', 'custom', '-', 0),
('entreprise.list', 'custom', '-', 0),
('dashboard.menu', 'administrateur', '-', 0),
('entreprise.create', 'custom', '-', 0),
('homepage.menu', 'custom', '-', 0),
('entreprise.delete', 'custom', '-', 0),
('topsrecherche.list', 'custom', '-', 0),
('topsrecherche.restrictall', 'custom', '-', 0),
('pages.create', 'custom', '-', 0),
('pages.list', 'custom', '-', 0),
('ads.create', 'custom', '-', 0),
('ads.list', 'custom', '-', 0),
('ads.update', 'custom', '-', 0),
('ads.delete', 'custom', '-', 0),
('ads.restrictall', 'custom', '-', 0),
('ads.type.create', 'custom', '-', 0),
('ads.type.list', 'custom', '-', 0),
('ads.type.restrictall', 'custom', '-', 0),
('abonnement.create', 'superadmin', '-', 0),
('abonnement.list', 'superadmin', '-', 0),
('abonnement.update', 'superadmin', '-', 0),
('abonnement.delete', 'superadmin', '-', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jacl2_subject`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jacl2_subject` (
  `id_aclsbj` varchar(100) NOT NULL,
  `label_key` varchar(100) DEFAULT NULL,
  `id_aclsbjgrp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_aclsbj`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pagesjaunes_jacl2_subject`
--

INSERT INTO `pagesjaunes_jacl2_subject` (`id_aclsbj`, `label_key`, `id_aclsbjgrp`) VALUES
('acl.user.view', 'jacl2db~acl2db.acl.user.view', 'acl.grp.user.management'),
('acl.user.modify', 'jacl2db~acl2db.acl.user.modify', 'acl.grp.user.management'),
('acl.group.modify', 'jacl2db~acl2db.acl.group.modify', 'acl.grp.group.management'),
('acl.group.create', 'jacl2db~acl2db.acl.group.create', 'acl.grp.group.management'),
('acl.group.delete', 'jacl2db~acl2db.acl.group.delete', 'acl.grp.group.management'),
('acl.group.view', 'jacl2db~acl2db.acl.group.view', 'acl.grp.group.management'),
('auth.users.list', 'jelix~auth.acl.users.list', 'auth.grp.user.management'),
('auth.users.view', 'jelix~auth.acl.users.view', 'auth.grp.user.management'),
('auth.users.modify', 'jelix~auth.acl.users.modify', 'auth.grp.user.management'),
('auth.users.create', 'jelix~auth.acl.users.create', 'auth.grp.user.management'),
('auth.users.delete', 'jelix~auth.acl.users.delete', 'auth.grp.user.management'),
('auth.users.change.password', 'jelix~auth.acl.users.change.password', 'auth.grp.user.management'),
('auth.user.view', 'jelix~auth.acl.user.view', 'auth.grp.user.management'),
('auth.user.modify', 'jelix~auth.acl.user.modify', 'auth.grp.user.management'),
('auth.user.change.password', 'jelix~auth.acl.user.change.password', 'auth.grp.user.management'),
('jprefs.prefs.list', 'jpref_admin~admin.acl.prefs.list', 'jprefs.prefs.management'),
('user.menu', 'user~acl2.menu', NULL),
('user.create', 'user~acl2.create', NULL),
('user.update', 'user~acl2.update', NULL),
('user.delete', 'user~acl2.delete', NULL),
('user.list', 'user~acl2.list', NULL),
('profile.menu', 'profile~acl2.menu', NULL),
('profile.create', 'profile~acl2.create', NULL),
('profile.update', 'profile~acl2.update', NULL),
('profile.delete', 'profile~acl2.delete', NULL),
('profile.list', 'profile~acl2.list', NULL),
('right.menu', 'right~acl2.menu', NULL),
('right.create', 'right~acl2.create', NULL),
('right.update', 'right~acl2.update', NULL),
('right.delete', 'right~acl2.delete', NULL),
('right.list', 'right~acl2.list', NULL),
('dashboard.menu', 'dashboard~acl2.menu', NULL),
('entreprise.menu', 'entreprise~acl2.menu', NULL),
('entreprise.create', 'entreprise~acl2.create', NULL),
('entreprise.update', 'entreprise~acl2.update', NULL),
('entreprise.delete', 'entreprise~acl2.delete', NULL),
('entreprise.list', 'entreprise~acl2.list', NULL),
('entreprise.restrictall', 'entreprise~acl2.restrictall', NULL),
('slideshow.menu', 'slideshow~acl2.menu', NULL),
('slideshow.create', 'slideshow~acl2.create', NULL),
('slideshow.list', 'slideshow~acl2.list', NULL),
('slideshow.update', 'slideshow~acl2.update', NULL),
('slideshow.restrictall', 'slideshow~acl2.restrictall', NULL),
('slideshow.delete', 'slideshow~acl2.delete', NULL),
('categorie.menu', 'categorie~acl2.menu', NULL),
('categorie.create', 'categorie~acl2.create', NULL),
('categorie.list', 'categorie~acl2.list', NULL),
('categorie.update', 'categorie~acl2.update', NULL),
('categorie.restrictall', 'categorie~acl2.restrictall', NULL),
('categorie.delete', 'categorie~acl2.delete', NULL),
('keywords.menu', 'keywords~acl2.menu', NULL),
('keywords.create', 'keywords~acl2.create', NULL),
('keywords.list', 'keywords~acl2.list', NULL),
('keywords.update', 'keywords~acl2.update', NULL),
('keywords.restrictall', 'keywords~acl2.restrictall', NULL),
('keywords.delete', 'keywords~acl2.delete', NULL),
('homepage.menu', 'homepage~acl2.menu', NULL),
('admin.right.list', 'right~acl2.admin.right.list', NULL),
('admin.right.update', 'right~acl2.admin.right.update', NULL),
('homepage.create', 'homepage~acl2.create', NULL),
('homepage.update', 'homepage~acl2.update', NULL),
('topsrecherche.list', 'right~acl2.topsrecherche.list', NULL),
('topsrecherche.create', 'right~acl2.topsrecherche.create', NULL),
('topsrecherche.delete', 'right~acl2.topsrecherche.delete', NULL),
('topsrecherche.restrictall', 'right~acl2.topsrecherche.restrictall', NULL),
('topsrecherche.update', 'right~acl2.topsrecherche.update', NULL),
('pages.list', 'pages~acl2.list', NULL),
('pages.update', 'pages~acl2.update', NULL),
('pages.create', 'pages~acl2.create', NULL),
('pages.delete', 'pages~acl2.delete', NULL),
('ads.list', 'ads~acl2.list', NULL),
('ads.create', 'ads~acl2.create', NULL),
('ads.update', 'ads~acl2.update', NULL),
('ads.delete', 'ads~acl2.delete', NULL),
('ads.type.list', 'ads~acl2.type.list', NULL),
('ads.type.create', 'ads~acl2.type.create', NULL),
('ads.type.update', 'ads~acl2.type.update', NULL),
('ads.type.delete', 'ads~acl2.type.delete', NULL),
('dashboard.restrictall', 'dashboard~acl2.restrictall', NULL),
('homepage.restrictall', 'homepage~acl2.restrictall', NULL),
('profile.restrictall', 'profile~acl2.restrictall', NULL),
('right.restrictall', 'right~acl2.restrictall', NULL),
('user.restrictall', 'user~acl2.restrictall', NULL),
('ads.restrictall', 'ads~acl2.restrictall', NULL),
('ads.type.restrictall', 'ads~acl2.type.restrictall', NULL),
('pages.restrictall', 'pages~acl2.restrictall', NULL),
('admin.right.restrictall', 'right~acl2.admin.right.restrictall', NULL),
('abonnement.create', '', NULL),
('abonnement.list', '', NULL),
('abonnement.update', '', NULL),
('abonnement.delete', '', NULL),
('abonnement.restrictall', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jacl2_subject_group`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jacl2_subject_group` (
  `id_aclsbjgrp` varchar(50) NOT NULL,
  `label_key` varchar(60) NOT NULL,
  PRIMARY KEY (`id_aclsbjgrp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pagesjaunes_jacl2_subject_group`
--

INSERT INTO `pagesjaunes_jacl2_subject_group` (`id_aclsbjgrp`, `label_key`) VALUES
('acl.grp.user.management', 'jacl2db~acl2db.acl.grp.user.management'),
('acl.grp.group.management', 'jacl2db~acl2db.acl.grp.group.management'),
('auth.grp.user.management', 'jelix~auth.acl.grp.user.management'),
('jprefs.prefs.management', 'jpref_admin~admin.acl.grp.prefs.management');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jacl2_user_group`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jacl2_user_group` (
  `login` varchar(50) NOT NULL,
  `id_aclgrp` varchar(50) NOT NULL,
  PRIMARY KEY (`login`,`id_aclgrp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pagesjaunes_jacl2_user_group`
--

INSERT INTO `pagesjaunes_jacl2_user_group` (`login`, `id_aclgrp`) VALUES
('admin', 'superadmin'),
('rija', 'superadmin'),
('rija', '__priv_rija'),
('Rijatina', 'administrateur'),
('Rijatina', '__priv_Rijatina'),
('rolland', 'superadmin'),
('usertest', 'administrateur'),
('usertest', '__priv_usertest'),
('usertest2', 'administrateur'),
('usertest23', 'custom');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_jlx_user`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_jlx_user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_profile_id` int(11) DEFAULT NULL,
  `usr_login` varchar(50) NOT NULL,
  `usr_loginalias` varchar(50) NOT NULL,
  `usr_password` varchar(120) NOT NULL DEFAULT '',
  `usr_password_clear` varchar(120) DEFAULT NULL,
  `usr_email` varchar(50) NOT NULL DEFAULT '',
  `usr_name` varchar(60) DEFAULT NULL,
  `usr_firstname` varchar(60) DEFAULT NULL,
  `usr_lastname` varchar(60) DEFAULT NULL,
  `usr_photo` varchar(150) DEFAULT NULL,
  `usr_token` varchar(250) DEFAULT NULL,
  `usr_date_token` datetime DEFAULT NULL,
  `usr_date_creation` datetime DEFAULT NULL,
  `usr_date_update` datetime DEFAULT NULL,
  `usr_date_lastlogin` datetime DEFAULT NULL,
  `usr_publication_status` tinyint(1) NOT NULL DEFAULT '2',
  `usr_activation_status` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_login` (`usr_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `pagesjaunes_jlx_user`
--

INSERT INTO `pagesjaunes_jlx_user` (`usr_id`, `usr_profile_id`, `usr_login`, `usr_loginalias`, `usr_password`, `usr_password_clear`, `usr_email`, `usr_name`, `usr_firstname`, `usr_lastname`, `usr_photo`, `usr_token`, `usr_date_token`, `usr_date_creation`, `usr_date_update`, `usr_date_lastlogin`, `usr_publication_status`, `usr_activation_status`) VALUES
(1, NULL, 'rolland', 'admin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', NULL, 'admin@localhost.localdoma', 'Superadmin', NULL, NULL, 'silence-1.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1),
(21, NULL, 'rija', 'rija', 'a9cdd2d6c41835bf41ab19aed243098f574af872', NULL, 'rolland@gmail.com', 'RAKOTOARIJAONA', NULL, 'Rolland', 'bg2-1.jpg', NULL, NULL, NULL, NULL, NULL, 2, 2),
(22, NULL, 'Rijatina', 'rijatina', '5b7d0b0a87b2f53e6692069f8148decd59961107', NULL, 'rijatina@gmail.com', NULL, NULL, NULL, 'njara.jpg', NULL, NULL, NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_marque`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `pagesjaunes_marque`
--

INSERT INTO `pagesjaunes_marque` (`id`, `entreprise_id`, `name`, `is_publie`, `date_creation`, `date_update`) VALUES
(6, 21, 'marque', 1, '2017-01-19 00:00:00', NULL),
(7, 22, 'qdsfsdf', 1, '2017-01-19 00:00:00', NULL),
(8, 26, 'marque1', 1, '2017-01-26 20:22:40', NULL),
(9, 26, 'marque2', 1, '2017-01-26 20:22:40', NULL),
(10, 27, 'Marques48484', 1, '2017-01-26 20:32:34', '2017-02-08 21:26:44'),
(18, 31, 'maq', 1, '2017-02-04 06:17:33', NULL),
(21, 27, 'ici la marque', 1, '2017-02-08 21:22:19', '2017-02-08 21:26:44');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_motscles`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_motscles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mot` varchar(50) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `pagesjaunes_motscles`
--

INSERT INTO `pagesjaunes_motscles` (`id`, `mot`, `is_publie`, `date_creation`, `date_update`) VALUES
(1, 'sakafo', 1, '2016-12-27 00:00:00', NULL),
(2, 'laoka', 1, '2016-12-27 00:00:00', NULL),
(3, 'vary', 1, '2016-12-27 00:00:00', NULL),
(4, 'hena', 1, '2016-12-27 00:00:00', NULL),
(5, 'sotro', 1, '2016-12-27 00:00:00', NULL),
(6, 'pub', 1, '2016-12-27 00:00:00', NULL),
(7, 'publicité', 1, '2016-12-27 00:00:00', NULL),
(8, 'radio', 1, '2016-12-27 00:00:00', NULL),
(9, 'télé', 1, '2016-12-27 00:00:00', NULL),
(10, 'média', 1, '2016-12-27 00:00:00', NULL),
(11, 'electricité', 1, '2016-12-27 00:00:00', NULL),
(12, 'elec', 1, '2016-12-27 00:00:00', NULL),
(13, 'courant', 1, '2016-12-27 00:00:00', NULL),
(14, 'electrique', 1, '2016-12-27 00:00:00', NULL),
(15, 'electronique', 1, '2016-12-27 00:00:00', NULL),
(16, 'réparation', 1, '2016-12-27 00:00:00', NULL),
(17, 'ordinateur', 1, '2016-12-27 00:00:00', NULL),
(18, 'ménager', 1, '2016-12-27 00:00:00', NULL),
(19, 'electro', 1, '2016-12-27 00:00:00', NULL),
(20, 'voiture', 1, '2016-12-27 00:00:00', NULL),
(21, 'taxi', 1, '2016-12-27 00:00:00', NULL),
(22, 'taxi-be', 1, '2016-12-27 00:00:00', NULL),
(23, 'sprinter', 1, '2016-12-27 00:00:00', NULL),
(24, 'goal', 1, '2016-12-27 00:00:00', NULL),
(25, 'akanjo', 1, '2016-12-27 00:00:00', NULL),
(26, 'lamba', 1, '2016-12-27 00:00:00', NULL),
(27, 'couverture', 1, '2016-12-27 00:00:00', NULL),
(28, '', 1, '2016-12-27 00:00:00', NULL),
(29, 'drap', 1, '2016-12-27 00:00:00', NULL),
(30, 'voyage', 1, '2016-12-27 00:00:00', NULL),
(31, 'étranger', 1, '2016-12-27 00:00:00', NULL),
(32, 'avion', 1, '2016-12-27 00:00:00', NULL),
(33, 'automobile', 1, '2016-12-27 00:00:00', NULL),
(34, 'Les mots clés sont séparés de comma ou virgule', 1, '2016-12-27 00:00:00', NULL),
(35, 'qsdfqsdfqsdfq', 1, '2017-01-03 00:00:00', NULL),
(36, 'kqkdf', 1, '2017-01-03 00:00:00', NULL),
(37, 'qsdfqdfqdsf', 1, '2017-01-03 00:00:00', NULL),
(38, '1231', 1, '2017-01-03 00:00:00', NULL),
(39, 'hhh', 1, '2017-01-03 00:00:00', NULL),
(40, 'cyber', 1, '2017-01-03 00:00:00', NULL),
(41, 'internet', 1, '2017-01-03 00:00:00', NULL),
(42, 'doma', 1, '2017-01-04 00:00:00', NULL),
(43, 'lol', 1, '2017-01-04 00:00:00', NULL),
(44, 'llklklkkl', 1, '2017-01-05 00:00:00', NULL),
(45, 'hotel', 1, '2017-01-05 00:00:00', NULL),
(46, 'trano', 1, '2017-01-05 00:00:00', NULL),
(47, 'mots', 1, '2017-01-05 00:00:00', NULL),
(48, 'cles', 1, '2017-01-05 00:00:00', NULL),
(49, 'tags', 1, '2017-01-05 00:00:00', NULL),
(50, 'dev', 1, '2017-01-06 00:00:00', NULL),
(51, 'info', 1, '2017-01-06 00:00:00', NULL),
(52, 'sublim', 1, '2017-01-06 00:00:00', NULL),
(53, 'qsdf', 1, '2017-01-06 00:00:00', NULL),
(54, 'qdfdf', 1, '2017-01-06 00:00:00', NULL),
(55, 'vente', 1, '2017-01-11 00:00:00', NULL),
(56, 'shop', 1, '2017-01-11 00:00:00', NULL),
(57, 'shoprite', 1, '2017-01-11 00:00:00', NULL),
(58, 'ser', 1, '2017-01-11 00:00:00', NULL),
(59, 'tech', 1, '2017-01-11 00:00:00', NULL),
(60, 'eleven', 1, '2017-01-13 00:00:00', NULL),
(61, 'design', 1, '2017-01-13 00:00:00', NULL),
(62, 'entreprise', 1, '2017-01-18 00:00:00', NULL),
(63, 'essai', 1, '2017-01-18 00:00:00', NULL),
(64, 'entreprise3', 1, '2017-01-18 00:00:00', NULL),
(65, 'e', 1, '2017-01-19 00:00:00', NULL),
(66, 'aer', 1, '2017-01-19 00:00:00', NULL),
(67, 'entreprsie', 1, '2017-01-24 00:00:00', NULL),
(68, 'souss', 1, '2017-02-02 00:00:00', NULL),
(69, 'cle', 1, '2017-02-02 00:00:00', NULL),
(70, 'mot', 1, '2017-02-02 00:00:00', NULL),
(71, 'restauration', 1, '2017-02-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_motscles_entreprise`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_motscles_entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motscles_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=215 ;

--
-- Contenu de la table `pagesjaunes_motscles_entreprise`
--

INSERT INTO `pagesjaunes_motscles_entreprise` (`id`, `motscles_id`, `entreprise_id`, `date_creation`, `date_update`) VALUES
(203, 60, 17, '2017-02-10 18:24:47', NULL),
(204, 61, 17, '2017-02-10 18:24:47', NULL),
(205, 53, 23, '2017-02-11 03:40:17', NULL),
(207, 62, 21, '2017-02-11 03:43:05', NULL),
(208, 65, 21, '2017-02-11 03:43:05', NULL),
(209, 66, 22, '2017-02-11 03:43:38', NULL),
(211, 62, 18, '2017-02-11 03:44:57', NULL),
(212, 67, 24, '2017-02-11 03:45:20', NULL),
(213, 64, 20, '2017-02-11 03:45:50', NULL),
(214, 63, 19, '2017-02-11 03:51:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_motscles_souscategorie`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_motscles_souscategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motscles_id` int(11) NOT NULL,
  `souscategorie_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Contenu de la table `pagesjaunes_motscles_souscategorie`
--

INSERT INTO `pagesjaunes_motscles_souscategorie` (`id`, `motscles_id`, `souscategorie_id`, `date_creation`, `date_update`) VALUES
(24, 7, 3, '2016-12-27 00:00:00', NULL),
(25, 8, 3, '2016-12-27 00:00:00', NULL),
(26, 9, 3, '2016-12-27 00:00:00', NULL),
(27, 10, 3, '2016-12-27 00:00:00', NULL),
(28, 6, 3, '2016-12-27 00:00:00', NULL),
(47, 15, 5, '2016-12-27 00:00:00', NULL),
(48, 12, 5, '2016-12-27 00:00:00', NULL),
(49, 16, 5, '2016-12-27 00:00:00', NULL),
(50, 19, 5, '2016-12-27 00:00:00', NULL),
(65, 21, 7, '2016-12-27 00:00:00', NULL),
(66, 22, 7, '2016-12-27 00:00:00', NULL),
(67, 23, 7, '2016-12-27 00:00:00', NULL),
(68, 24, 7, '2016-12-27 00:00:00', NULL),
(74, 25, 6, '2016-12-27 00:00:00', NULL),
(75, 26, 6, '2016-12-27 00:00:00', NULL),
(76, 27, 6, '2016-12-27 00:00:00', NULL),
(77, 29, 6, '2016-12-27 00:00:00', NULL),
(79, 30, 2, '2016-12-27 00:00:00', NULL),
(80, 31, 2, '2016-12-27 00:00:00', NULL),
(81, 32, 2, '2016-12-27 00:00:00', NULL),
(82, 33, 2, '2016-12-27 00:00:00', NULL),
(84, 45, 8, '2017-01-05 00:00:00', NULL),
(85, 46, 8, '2017-01-05 00:00:00', NULL),
(86, 68, 15, '2017-02-02 00:00:00', NULL),
(87, 69, 15, '2017-02-02 00:00:00', NULL),
(88, 70, 15, '2017-02-02 00:00:00', NULL),
(93, 11, 4, '2017-02-02 00:00:00', NULL),
(94, 12, 4, '2017-02-02 00:00:00', NULL),
(95, 13, 4, '2017-02-02 00:00:00', NULL),
(96, 14, 4, '2017-02-02 00:00:00', NULL),
(97, 34, 9, '2017-02-02 00:00:00', NULL),
(98, 71, 1, '2017-02-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_pages`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `label` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `is_publie` tinyint(1) NOT NULL DEFAULT '0',
  `is_removed` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `has_pub` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `pagesjaunes_pages`
--

INSERT INTO `pagesjaunes_pages` (`id`, `name`, `label`, `title`, `content`, `is_publie`, `is_removed`, `meta_title`, `meta_description`, `has_pub`) VALUES
(1, 'A propos', 'a-propos', 'A propos', '<main class="pro-about">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-4">\r\n<div class="about-intro">\r\n<p><strong>www.pagesjaunes.mg</strong> est un portail web qui permettra aux utilisateurs de <span class="highlight">chercher des produits et services pr&eacute;cis</span> aupr&egrave;s des professionnels inscrits.</p>\r\n\r\n<blockquote>Chaque professionnel aura acc&egrave;s &agrave; un Espace Pro pour g&eacute;rer les contenus de sa page personnelle</blockquote>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-8">\r\n<div class="row about-intro-cols">\r\n<div class="col-xs-6 col-sm-3">\r\n<p><span>Description de la soci&eacute;t&eacute; ou de l&rsquo;activit&eacute; professionnelle</span></p>\r\n</div>\r\n\r\n<div class="col-xs-6 col-sm-3">\r\n<p><span>Coordonn&eacute;es (tel, email, web, g&eacute;olocalisation)</span></p>\r\n</div>\r\n\r\n<div class="col-xs-6 col-sm-3">\r\n<p><span>Liste des produits, services et marques</span></p>\r\n</div>\r\n\r\n<div class="col-xs-6 col-sm-3">\r\n<p><span>Galerie photos et vid&eacute;os</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="about-presence">\r\n<div class="container">\r\n<h2>LA PRESENCE SUR INTERNET</h2>\r\n\r\n<div class="row">\r\n<ul class="col-md-8 col-md-offset-4">\r\n	<li class="clearfix">\r\n	<p class="chiffre">90<span class="percent">%</span></p>\r\n\r\n	<p class="text"><strong>des clients vont d&#39;abord sur internet avant de venir chez vous.</strong> Plus aucun commerce ou entreprise ne peut croire dans un d&eacute;veloppement sans une pr&eacute;sence appropri&eacute;e sur internet. Pour g&eacute;n&eacute;rer du trafic et de la visite, rencontrer des prospects, gagner de nouveaux clients, le web est devenu incontournable.</p>\r\n	</li>\r\n	<li class="clearfix">\r\n	<p class="chiffre">97<span class="percent">%</span></p>\r\n\r\n	<p class="text"><strong>des consommateurs recherchent des entreprises locales sur internet.</strong> Les utilisateurs, consommateurs, clients, acheteurs, investisseurs, prospects, contacts... vont d&#39;abord sur internet avant de venir chez vous ou vos concurrents.</p>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="about-pagesjaunes">\r\n<div class="container">\r\n<div class="row row-eq-height">\r\n<div class="col-sm-4 col-1">\r\n<h2>POURQUOI SUR PAGESJAUNES.MG ?</h2>\r\n\r\n<p>Nous reposons nos atouts sur une valeur : <strong>LA FACILITE.</strong></p>\r\n\r\n<p>La facilit&eacute; de recherche et la facilit&eacute; d&rsquo;utilisation</p>\r\n\r\n<p>Ainsi nous avons beaucoup mis&eacute; sur <strong>2 points.</strong></p>\r\n</div>\r\n\r\n<div class="col-sm-4 col-2">\r\n<h3><span>Dans notre r&eacute;f&eacute;rencement web</span></h3>\r\n\r\n<p>Nous avons comme objectif d&rsquo;&ecirc;tre dans le <strong>Top 3 des sites web malgaches le plus consult&eacute;s</strong>, et de nous positionner en leader dans les portails web malgache.</p>\r\n\r\n<p class="highlight">NOUS SOMMES BIEN POSITIONNE, VOUS GAGNEZ EN VISIBILITE</p>\r\n</div>\r\n\r\n<div class="col-sm-4 col-3">\r\n<h3><span>Dans un moteur de recherche</span></h3>\r\n\r\n<p>Le v&eacute;ritable <strong>c&oelig;ur du site pagesjaunes.mg est son moteur de recherche.</strong> Il permettra aux internautes de faire des recherches &agrave; partir de simple mots cl&eacute;s.</p>\r\n\r\n<p class="highlight">AVEC PAGESJAUNES.MG, ON VOUS TROUVERA PLUS RAPIDEMENT</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n', 1, 0, '', '', 1),
(2, 'Condition d''utilisation', 'condition-d-utilisation', 'Condition d''utilisation', '<div class="form-wrapper">\r\n<p style="text-align: justify;"><strong>Conditions g&eacute;n&eacute;rales d&rsquo;utilisation </strong></p>\r\n\r\n<p style="text-align: justify;">Ce document vous offre les conditions g&eacute;n&eacute;rales d&rsquo;utilisation afin d&rsquo;informer les internautes naviguant sur notre site web des modalit&eacute;s de son utilisation, des droits, obligations et responsabilit&eacute;s r&eacute;ciproques.</p>\r\n\r\n<p style="text-align: justify;">Le pr&eacute;sent document a pour objet de d&eacute;finir les modalit&eacute;s et conditions dans lesquelles d&rsquo;une part, la soci&eacute;t&eacute; IPT SARL, ci-apr&egrave;s d&eacute;nomm&eacute; l&rsquo;EDITEUR, met &agrave; la disposition de ses utilisateurs le site, et les services disponibles sur le site et d&rsquo;autre part, la mani&egrave;re par laquelle l&rsquo;utilisateur acc&egrave;de au site et utilise ses services.</p>\r\n\r\n<p style="text-align: justify;">Toute connexion au site est subordonn&eacute;e au respect des pr&eacute;sentes conditions.</p>\r\n\r\n<p style="text-align: justify;">Pour l&rsquo;utilisateur, le simple acc&egrave;s au site de la soci&eacute;t&eacute; IPT Sarl &agrave; www.pagesjaunes.mg implique l&rsquo;acceptation de l&rsquo;ensemble des conditions d&eacute;crites ci-apr&egrave;s.</p>\r\n\r\n<p style="text-align: justify;"><strong>Propri&eacute;t&eacute; intellectuelle</strong></p>\r\n\r\n<p style="text-align: justify;">La marque &quot;Pages jaunes. Mg&quot; est une marque d&eacute;pos&eacute;e par la soci&eacute;t&eacute; IPT Sarl. Toute repr&eacute;sentation et/ou reproduction et/ou exploitation partielle ou totale de la marque, de quelque nature que ce soit, est totalement prohib&eacute;e.La structure g&eacute;n&eacute;rale du site Pagesjaunes.mg, ainsi que les textes, graphiques, images, sons et vid&eacute;os la composant, sont la propri&eacute;t&eacute; de l&#39;&eacute;diteur ou de ses partenaires. Tous les &eacute;l&eacute;ments de ce site, y compris les documents t&eacute;l&eacute;chargeables ne peuvent &ecirc;tre utilis&eacute;s &agrave; des fins commerciales et publicitaires.Toute repr&eacute;sentation et/ou reproduction des pages de ce site et/ou exploitation partielle ou totale des contenus et services propos&eacute;s par le site Pagesjaunes mg, par quelque proc&eacute;d&eacute; que ce soit, sans l&#39;autorisation pr&eacute;alable et par &eacute;crit de la soci&eacute;t&eacute; IPT Sarl et/ou de ses partenaires est strictement interdite et serait susceptible de constituer une contrefa&ccedil;on.</p>\r\n\r\n<p style="text-align: justify;">Etant donn&eacute; que PAGESJAUNES.MG est une marque l&eacute;gale d&eacute;pos&eacute;e aupr&egrave;s de l&rsquo;OMAPI, tout usage de la marque ou du nom commercial qui lui ressemble au point d&rsquo;induire le public en erreur pour les produits et services pour lesquels la marque a &eacute;t&eacute; enregistr&eacute;e est strictement interdite sous peine de poursuite.</p>\r\n\r\n<p style="text-align: justify;"><strong>Responsabilit&eacute; de l&rsquo;&eacute;diteur</strong></p>\r\n\r\n<p style="text-align: justify;">Les informations et/ou documents figurant sur ce site et/ou accessibles par ce site proviennent de sources consid&eacute;r&eacute;es comme &eacute;tant fiables c&rsquo;est-&agrave;-dire les soci&eacute;t&eacute;s annonceurs direct.</p>\r\n\r\n<p style="text-align: justify;">Toutefois, ces informations et/ou documents sont susceptibles de contenir des inexactitudes techniques et des erreurs typographiques.</p>\r\n\r\n<p style="text-align: justify;">La soci&eacute;t&eacute; IPT Sarl se r&eacute;serve le droit de les corriger, d&egrave;s que ces erreurs sont port&eacute;es &agrave; sa connaissance.</p>\r\n\r\n<p style="text-align: justify;">Il est fortement recommand&eacute; de v&eacute;rifier l&rsquo;exactitude et la pertinence des informations et/ou documents mis &agrave; disposition sur ce site.</p>\r\n\r\n<p style="text-align: justify;">Les informations et/ou documents disponibles sur ce site sont susceptibles d&rsquo;&ecirc;tre modifi&eacute;s &agrave; tout moment, et peuvent avoir fait l&rsquo;objet de mises &agrave; jour. En particulier, ils peuvent avoir fait l&rsquo;objet d&rsquo;une mise &agrave; jour entre le moment de leur t&eacute;l&eacute;chargement et celui o&ugrave; l&rsquo;utilisateur en prend connaissance.</p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisation des informations et/ou documents disponibles sur ce site se fait sous l&rsquo;enti&egrave;re et seule responsabilit&eacute; de l&rsquo;utilisateur, qui assume la totalit&eacute; des cons&eacute;quences pouvant en d&eacute;couler, sans que la soci&eacute;t&eacute; IPT Sarl puisse &ecirc;tre recherch&eacute;e &agrave; ce titre, et sans recours contre ce dernier.</p>\r\n\r\n<p style="text-align: justify;">La soci&eacute;t&eacute; IPT Sarl ne pourra en aucun cas &ecirc;tre tenu responsable de tout dommage de quelque nature qu&rsquo;il soit r&eacute;sultant de l&rsquo;interpr&eacute;tation ou de l&rsquo;utilisation des informations et/ou documents disponibles sur ce site.</p>\r\n\r\n<p style="text-align: justify;"><strong>Acc&egrave;s au site</strong></p>\r\n\r\n<p style="text-align: justify;">L&rsquo;&eacute;diteur s&rsquo;efforce de permettre l&rsquo;acc&egrave;s au site 24 heures sur 24, 7 jours sur 7, sauf en cas de force majeure ou d&rsquo;un &eacute;v&eacute;nement hors du contr&ocirc;le de la soci&eacute;t&eacute; IPT Sarl, et sous r&eacute;serve des &eacute;ventuelles pannes et interventions de maintenance n&eacute;cessaires au bon fonctionnement du site et des services.</p>\r\n\r\n<p style="text-align: justify;">Par cons&eacute;quent, la soci&eacute;t&eacute; IPT Sarl ne peut garantir une disponibilit&eacute; du site et/ou des services, une fiabilit&eacute; des transmissions et des performances en termes de temps de r&eacute;ponse ou de qualit&eacute;. Il n&rsquo;est pr&eacute;vu aucune assistance technique vis &agrave; vis de l&rsquo;utilisateur que ce soit par des moyens &eacute;lectronique ou t&eacute;l&eacute;phonique.</p>\r\n\r\n<p style="text-align: justify;">Par ailleurs, la soci&eacute;t&eacute; IPT Sarl peut &ecirc;tre amen&eacute;e &agrave; interrompre le site ou une partie des services, &agrave; tout moment sans pr&eacute;avis, le tout sans droit &agrave; indemnit&eacute;s. L&rsquo;utilisateur ainsi que les clients annonceursreconna&icirc;t et accepte que l&rsquo;EDITEUR ne soit pas responsable des interruptions, et des cons&eacute;quences qui peuvent en d&eacute;couler pour l&rsquo;utilisateur ou tout tiers.</p>\r\n\r\n<p style="text-align: justify;">La responsabilit&eacute; de l&rsquo;&eacute;diteur ne saurait &ecirc;tre engag&eacute;e en cas d&rsquo;impossibilit&eacute; d&rsquo;acc&egrave;s &agrave; ce site et/ou d&rsquo;utilisation des services.</p>\r\n\r\n<p style="text-align: justify;">&nbsp;</p>\r\n\r\n<p style="text-align: justify;"><strong>Modification des conditions d&rsquo;utilisation</strong></p>\r\n\r\n<p style="text-align: justify;">La soci&eacute;t&eacute; IPT Sarl se r&eacute;serve la possibilit&eacute; de modifier, &agrave; tout moment et sans pr&eacute;avis, les pr&eacute;sentes conditions d&rsquo;utilisation afin de les adapter aux &eacute;volutions du site et/ou de son exploitation.</p>\r\n\r\n<p style="text-align: justify;"><strong>R&egrave;gles d&#39;usage d&#39;Internet</strong></p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisateur d&eacute;clare accepter les caract&eacute;ristiques et les limites d&rsquo;Internet, et notamment reconna&icirc;t que :</p>\r\n\r\n<p style="text-align: justify;">La soci&eacute;t&eacute; IPT Sarl n&rsquo;assume aucune responsabilit&eacute; sur les services accessibles par Internet et n&rsquo;exerce aucun contr&ocirc;le de quelque forme que ce soit sur la nature et les caract&eacute;ristiques des donn&eacute;es qui pourraient transiter par l&rsquo;interm&eacute;diaire de son centre serveur.</p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisateur reconna&icirc;t que les donn&eacute;es circulant sur Internet ne sont pas prot&eacute;g&eacute;es notamment contre les d&eacute;tournements &eacute;ventuels. La pr&eacute;sence du logo Pages jaunes.mg institue une pr&eacute;somption simple de validit&eacute;. La communication de toute information jug&eacute;e par l&rsquo;utilisateur de nature sensible ou confidentielle se fait &agrave; ses risques et p&eacute;rils.</p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisateur reconna&icirc;t que les donn&eacute;es circulant sur Internet peuvent &ecirc;tre r&eacute;glement&eacute;es en termes d&rsquo;usage ou &ecirc;tre prot&eacute;g&eacute;es par un droit de propri&eacute;t&eacute;.</p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisateur est seul responsable de l&rsquo;usage des donn&eacute;es qu&rsquo;il consulte, interroge et transf&egrave;re sur Internet.</p>\r\n\r\n<p style="text-align: justify;">L&rsquo;utilisateur reconna&icirc;t que la soci&eacute;t&eacute; IPT Sarl ne dispose d&rsquo;aucun moyen de contr&ocirc;le sur le contenu des services accessibles sur Internet</p>\r\n\r\n<p style="text-align: justify;"><strong>Droit applicable</strong></p>\r\n\r\n<p style="text-align: justify;">Tant le pr&eacute;sent site que les modalit&eacute;s et conditions de son utilisation sont r&eacute;gis par le droit Malagasy, quel que soit le lieu d&rsquo;utilisation. En cas de contestation &eacute;ventuelle, et apr&egrave;s l&rsquo;&eacute;chec de toute tentative de recherche d&rsquo;une solution amiable, le tribunal de premi&egrave;re instance d&rsquo;Antananarivo sera seul comp&eacute;tent pour conna&icirc;tre de ce litige.</p>\r\n\r\n<p style="text-align: justify;">Pour toute question relative aux pr&eacute;sentes conditions d&rsquo;utilisation du site, vous pouvez nous &eacute;crire &agrave; l&rsquo;adresse suivante :</p>\r\n\r\n<p style="text-align: justify;">contact@pagesjaunes.mg</p>\r\n</div>\r\n', 1, 0, '', '', 2),
(3, 'Annonces et publicités', 'annonces-et-publicites', 'Options de visibilité et publicités', '<main class="pro-publicites">\r\n<div class="pub-row1">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-sm-4 col-1">\r\n<p class="intro">Pour accro&icirc;tre la visibilit&eacute; internet, <strong>Pagesjaunes.mg</strong> propose aux professionnels</p>\r\n\r\n<p class="chiffre">2</p>\r\n\r\n<p class="solutions">solutions</p>\r\n</div>\r\n\r\n<div class="col-sm-8">\r\n<div class="video-wrapper">\r\n<div class="video-container"><iframe allowfullscreen="" class="video-iframe" frameborder="0" src="https://www.youtube.com/embed/Y9Y7KpLkB-0?rel=0&amp;autoplay=1"></iframe></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="pub-row2">\r\n<div class="container">\r\n<h2>LA PUBLICIT&Eacute;</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-4">\r\n<h3>TOP BANNER</h3>\r\n\r\n<div class="format">\r\n<p><strong>Format : 1600 x 600</strong><br />\r\nType de fichiers : jpeg, png, gif</p>\r\n</div>\r\n\r\n<p>Il est l&rsquo;encart publicitaire le plus important du site. Visible d&egrave;s l&rsquo;acc&egrave;s sur www.pagesjaunes.mg</p>\r\n\r\n<p class="nb">Cet encart est r&eacute;serv&eacute; uniquement &agrave; 3 annonceurs.</p>\r\n</div>\r\n\r\n<div class="col-md-4">\r\n<h3>BOTTOM TARGET</h3>\r\n\r\n<div class="format">\r\n<p><strong>Format : 300 x 600 pixels</strong><br />\r\nType de fichiers : jpeg, png, gif</p>\r\n</div>\r\n\r\n<p>Pour une publicit&eacute; cibl&eacute;e et impactante.</p>\r\n\r\n<p>En option, vous pouvez &eacute;galement choisir de figurer dans des sous cat&eacute;gories de votre choix. (Exemple : annonce d&rsquo;un d&eacute;corateur d&rsquo;int&eacute;rieur lors d&rsquo;une recherche d&rsquo;agence immobili&egrave;re)</p>\r\n</div>\r\n\r\n<div class="col-md-4">\r\n<h3>BOTTOM STANDARD</h3>\r\n\r\n<div class="format">\r\n<p><strong>Format : 300 x 300 pixels</strong><br />\r\nType de fichiers : jpeg, png, gif</p>\r\n</div>\r\n\r\n<p>Son mode d&rsquo;affichage est al&eacute;atoire.</p>\r\n\r\n<p class="nb">Cet encart est r&eacute;serv&eacute; uniquement &agrave; 10 annonceurs</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="pub-row3">\r\n<div class="container">\r\n<h2>LES OPTIONS DE VISIBILIT&Eacute;</h2>\r\n\r\n<div class="row">\r\n<div class="col-sm-6">\r\n<h3>TOP RECHERCHE</h3>\r\n<img src="http://localhost/pagesjaunes/frontlibraries/images/top-search.png" />\r\n<p>Cet outil vous permet d&rsquo;&ecirc;tre positionn&eacute; dans les trois premi&egrave;res places dans les recherches effectu&eacute;es par les utilisateurs.</p>\r\n</div>\r\n\r\n<div class="col-sm-6">\r\n<h3>MOTION COVER</h3>\r\n<img src="http://localhost/pagesjaunes/frontlibraries/images/motion-cover.png" />\r\n<p>Elle se pr&eacute;sente comme l&rsquo;introduction de votre page perso et r&eacute;sume en quelques secondes en animation vid&eacute;o votre soci&eacute;t&eacute; ou votre activit&eacute; : animation logo, slogan, activit&eacute; et produits.</p>\r\n</div>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="col-sm-6">\r\n<h3>OPENWRITE</h3>\r\n<img src="http://localhost/pagesjaunes/frontlibraries/images/open-write.png" />\r\n<p>Il vous permet de r&eacute;diger librement un article.</p>\r\n\r\n<ul>\r\n	<li>La mani&egrave;re d&rsquo;entretenir une relation, un lien avec les internautes</li>\r\n	<li>L&rsquo;outil ad&eacute;quat pour faire connaitre en quelques phrases vos activit&eacute;s, produits, &hellip;</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-sm-6">\r\n<h3>GALERIE VIDEO ET PHOTOS</h3>\r\n<img src="http://localhost/pagesjaunes/frontlibraries/images/gallerie.png" />\r\n<p>Partagez des photos et vid&eacute;os de votre soci&eacute;t&eacute;, des produits, des &eacute;v&egrave;nements, des locaux.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n', 1, 0, '', '', 1),
(4, 'Plan du site', 'plan-du-site', 'Plan du site', '<div class="container">\r\n<div class="row">\r\n<div class="col-md-12">\r\n<h2 id="pages" style="color:#ffdd00;">Pages</h2>\r\n<br />\r\n<a href="http://localhost/pagesjaunes/">Page d&#39;accueil</a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/pages?p=espace-pro">Page professionnelle</a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/pages?p=a-propos">Page &agrave; propos</a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/inscription">Page s&#39;enregistrer</a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/pages?p=condition-d-utilisation">Page de conditions d&#39;utilistation </a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/pages?p=plan-du-site">Page plan du site</a><br />\r\n<a href="http://localhost/pagesjaunes/index.php/front_office/default/pages?p=annonces-et-publicites">Page annonces et publicit&eacute;s</a></div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n', 1, 0, '', '', 1),
(5, 'Espace pro', 'espace-pro', 'Espace pro', '<main class="pro-accueil">\r\n<div class="container">\r\n<h1>PROFESSIONNEL <span>les clients ont besoin de <span class="highlight">vous trouver rapidement</span></span></h1>\r\n\r\n<div class="row">\r\n<div class="col-md-5 col-sm-6 text-intro">\r\n<p><strong>Pagesjaunes.mg</strong> propose aux professionnels des solutions pour accroitre leur <u>visibilit&eacute; internet</u>. En entretenant votre visibilit&eacute; sur Internet, vous permettez aux visiteurs de pagesjaunes.mg d&#39;acc&eacute;der aux coordonn&eacute;es de votre entreprise, au descriptif de vos activit&eacute;s, vos services et vos r&eacute;f&eacute;rences. <span class="highlight">Vous int&eacute;resserez donc des clients potentiels</span>. Vous gagnerez &agrave; vous faire connaitre dans la mesure o&ugrave; les visiteurs de pagesjaunes.mg se souviendront de vous et parlent de vous.</p>\r\n</div>\r\n\r\n<div class="col-sm-6 col-md-offset-1 illustre"><img src="{$j_basepath}frontlibraries/images/landing_illustration.png" /></div>\r\n</div>\r\n\r\n<div class="pro-solutions">\r\n<h2>Nos<br />\r\nsolutions</h2>\r\n\r\n<div class="row">\r\n<div class="col-sm-6">\r\n<div class="solution-perso">\r\n<h3>Page perso</h3>\r\n\r\n<p>Misez sur votre pr&eacute;sence web</p>\r\n</div>\r\n</div>\r\n\r\n<div class="col-sm-6">\r\n<div class="solution-pub">\r\n<h3>Publicit&eacute;</h3>\r\n\r\n<p>Stimulez vos ventes gr&acirc;ce &agrave; la publicit&eacute; en ligne</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n', 1, 0, '', '', 1),
(6, 'Remerciement', 'remerciement', 'Remerciement', '<!-- contenus -->\r\n<main class="landing-page">\r\n<div class="container">\r\n<div class="landing-header">\r\n<div class="row">\r\n<div class="col-sm-6">\r\n<p class="chapo">+ de <strong>5000</strong> entreprises r&eacute;pertori&eacute;es sur <strong>240</strong> domaines d&rsquo;activit&eacute;s.</p>\r\n\r\n<p>Pagesjaunes.mg vous remercie et vous donne rendez-vous sur le site <a alt="www.pagesjaunes.mg" href="www.pagesjaunes.mg">www.pagesjaunes.mg</a></p>\r\n</div>\r\n\r\n<div class="col-sm-6">\r\n<div class="video-wrapper">\r\n<div class="video-container"><iframe allowfullscreen="" class="video-iframe" frameborder="0" src="https://www.youtube.com/embed/h5hXL-FDBb8?rel=0&amp;autoplay=1"></iframe></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="landing-footer">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-sm-6">\r\n<p>Pour profiter de cette<br />\r\n<span>opportunit&eacute;</span></p>\r\n</div>\r\n\r\n<div class="col-sm-6 btn-wrapper"><a class="btn btn-default" href="{jurl ''front_office~default:inscription''}" role="button">Inscrivez-vous</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</main>\r\n', 1, 0, '', '', 1),
(7, 'Remerciement édition', 'remerciement-edition', 'Pagesjaunes.mg vous remercie', '<div class="form-wrapper">\r\n<p>Vos informations seront mis &agrave; jour le plus t&ocirc;t possible, une fois valid&eacute; par nos mod&eacute;rateurs.</p>\r\n</div>\r\n', 1, 0, '', '', 2),
(9, 'Nous contacter', 'nous-contacter', 'Nous contacter', '', 1, 0, 'Nous contacter', 'pages jaunes madagascar&&contact', 1),
(10, 'Accueil', 'accueil', 'Accueil', '', 1, 0, 'Pages jaunes Madagascar Accueil', '', 1),
(11, 'Inscription', 'inscription', 'Inscription', '', 1, 0, 'Pages jaunes Madagascar Inscription', '', 1),
(12, 'Résultats de recherche', 'resultats-de-recherche', 'Résultats de recherche', '', 1, 0, 'Pages jaunes Madagascar Résultat', '', 1),
(13, 'Formulaire d''édition entreprise', 'formulaire-d-edition-entreprise', 'Formulaire d''édition entreprise', '', 1, 0, 'Pages jaunes Madagascar Formulaire d''édition entreprise', '', 1),
(14, 'Essai page24', 'essai_page24', 'PAGE TEST', '', 0, 1, '', '', 1),
(15, 'Essai ajout', 'essai_ajout', 'essai de l''ajout', '', 0, 1, '', '', 1),
(16, 'qdqssqd', 'qdqssqd', 'qsdqsdqsd', '', 0, 1, '', '', 1),
(17, 'qsdqsdqsdqsdsdd', 'qsdqsdqsdqsdsdd', 'dadadadadad', '', 0, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_produit`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `pagesjaunes_produit`
--

INSERT INTO `pagesjaunes_produit` (`id`, `entreprise_id`, `name`, `is_publie`, `date_creation`, `date_update`) VALUES
(7, 17, 'videos', 1, '2017-01-13 00:00:00', NULL),
(9, 21, 'rer', 1, '2017-01-19 00:00:00', NULL),
(10, 22, 'ff', 1, '2017-01-19 00:00:00', NULL),
(12, 17, 'flyers', 1, '2017-01-20 00:00:00', NULL),
(13, 26, 'produit1', 1, '2017-01-26 20:22:40', NULL),
(14, 27, 'Produits4', 1, '2017-01-26 20:32:34', '2017-02-08 21:26:44'),
(29, 31, 'ptof33', 1, '2017-02-04 06:17:29', '2017-02-04 06:17:40'),
(30, 27, 'ici le produit', 1, '2017-02-08 21:22:19', '2017-02-08 21:26:44');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_profile`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_label` int(11) DEFAULT NULL,
  `profile_activationStatus` tinyint(1) DEFAULT '2',
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_service`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `pagesjaunes_service`
--

INSERT INTO `pagesjaunes_service` (`id`, `entreprise_id`, `name`, `is_publie`, `date_creation`, `date_update`) VALUES
(5, 17, 'print design', 1, '2017-01-13 00:00:00', '2017-01-13 00:00:00'),
(8, 17, 'web design', 1, '2017-01-13 00:00:00', NULL),
(11, 21, 'serv1', 1, '2017-01-19 00:00:00', NULL),
(12, 22, 'sde', 1, '2017-01-19 00:00:00', NULL),
(13, 17, 'motion design', 1, '2017-01-20 00:00:00', NULL),
(14, 17, 'packaging', 1, '2017-01-20 00:00:00', NULL),
(15, 26, 'service1', 1, '2017-01-26 20:22:40', NULL),
(16, 26, 'service2', 1, '2017-01-26 20:22:40', NULL),
(17, 27, 'Services1', 1, '2017-01-26 20:32:33', '2017-02-08 21:26:44'),
(18, 27, 'Services6', 1, '2017-01-26 20:32:34', '2017-02-08 21:26:44'),
(20, 31, 'serb131', 1, '2017-02-04 06:17:23', '2017-02-04 06:17:57'),
(21, 31, 'serb..', 1, '2017-02-04 06:17:45', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_slideshow`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_slideshow` (
  `slideshow_id` int(11) NOT NULL AUTO_INCREMENT,
  `slideshow_identifiant` varchar(25) NOT NULL,
  `slideshow_namealias` varchar(125) NOT NULL,
  `slideshow_entrepriseId` int(11) NOT NULL,
  `slideshow_imageonly` tinyint(1) NOT NULL,
  `slideshow_publicationstatus` tinyint(1) NOT NULL,
  `slideshow_titre` varchar(255) NOT NULL,
  `slideshow_introductiontext` text NOT NULL,
  `slideshow_visuelbackground` varchar(50) NOT NULL,
  `slideshow_buttontitle` varchar(50) NOT NULL,
  `slideshow_contentposition` varchar(10) NOT NULL,
  `slideshow_urlpage` varchar(100) NOT NULL,
  `slideshow_creationdate` datetime NOT NULL,
  `slideshow_updatedate` datetime DEFAULT NULL,
  `slideshow_publicationdate` datetime DEFAULT NULL,
  PRIMARY KEY (`slideshow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `pagesjaunes_slideshow`
--

INSERT INTO `pagesjaunes_slideshow` (`slideshow_id`, `slideshow_identifiant`, `slideshow_namealias`, `slideshow_entrepriseId`, `slideshow_imageonly`, `slideshow_publicationstatus`, `slideshow_titre`, `slideshow_introductiontext`, `slideshow_visuelbackground`, `slideshow_buttontitle`, `slideshow_contentposition`, `slideshow_urlpage`, `slideshow_creationdate`, `slideshow_updatedate`, `slideshow_publicationdate`) VALUES
(26, 'slide2234', 'slide2234', 17, 0, 1, 'Tournes''oil', '<p>Proin venenatis, <em>ipsum vel iaculis dictum</em>, <strong>purus lectus</strong> pulvinar libero, in tempus augue mauris vel lectus.</p>\r\n', 'desktop-aquarium-wallpaper-1600x900-1.jpg', 'Découvrir', 'center', '[fiche]', '2017-01-12 00:00:00', '2017-02-04 06:29:01', '2017-01-12 00:00:00'),
(27, 'slide show numéro 3', 'slide-show-numero-3', 27, 0, 1, 'SUNRISE', '<p>Proin venenatis, ipsum vel iaculis dictum, purus lectus pulvinar libero, in tempus augue mauris vel lectus.</p>\r\n', 'farm-2-wallpaper-1600x900.jpg', 'découvrir', 'right', '[fiche]', '2017-01-12 00:00:00', '2017-02-02 05:27:38', '2017-01-13 06:52:09'),
(28, 'slide22', 'slide22', 0, 1, 0, '', '', 'girl-mobile.jpg', '', '', '[fiche]', '2017-01-12 20:51:29', '2017-02-02 12:15:54', '2017-01-12 20:51:28'),
(29, 'slide5', 'slide5', 0, 1, 0, '', '', 'exode.jpg', '', '', '', '2017-01-12 20:52:19', '2017-02-02 07:43:04', '2017-01-15 20:14:06'),
(30, 'slidejeiss', 'slidejeiss', 0, 1, 1, '', '', 'image1.png', '', 'left', '', '2017-01-13 07:53:56', '2017-02-02 07:43:15', '2017-01-13 07:53:54'),
(31, 'EssaiAjout', 'essaiajout', 23, 1, 1, '', '', 'bg2.jpg', '', 'left', 'http://www.lol.mg', '2017-02-02 04:03:54', '2017-02-02 07:43:39', '2017-02-02 04:03:53'),
(33, 'Essai ajout', 'essai-ajout', 0, 1, 1, '', '', 'bg4-1.jpg', '', 'left', '', '2017-02-02 08:22:36', '0000-00-00 00:00:00', '2017-02-02 08:22:34'),
(34, 'Url tsy mety ve?', 'url-tsy-mety-ve', 30, 1, 1, '', '', 'vetements.jpg', '', 'left', '', '2017-02-11 06:56:11', '0000-00-00 00:00:00', '2017-02-11 06:56:10');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_souscategorie`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_souscategorie` (
  `souscategorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `souscategorie_categorieid` int(11) NOT NULL,
  `souscategorie_name` varchar(150) NOT NULL,
  `souscategorie_namealias` varchar(255) NOT NULL,
  `souscategorie_ispublie` tinyint(1) NOT NULL,
  `souscategorie_datecreation` datetime NOT NULL,
  `souscategorie_dateupdate` datetime DEFAULT NULL,
  `souscategorie_datepublie` datetime DEFAULT NULL,
  PRIMARY KEY (`souscategorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `pagesjaunes_souscategorie`
--

INSERT INTO `pagesjaunes_souscategorie` (`souscategorie_id`, `souscategorie_categorieid`, `souscategorie_name`, `souscategorie_namealias`, `souscategorie_ispublie`, `souscategorie_datecreation`, `souscategorie_dateupdate`, `souscategorie_datepublie`) VALUES
(1, 11, 'Restauration', 'restauration', 1, '2017-02-01 00:00:00', '2017-02-01 00:00:00', NULL),
(2, 11, 'voyage', 'voyage', 1, '2017-02-01 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(3, 12, 'publicités', '', 1, '2017-01-15 00:00:00', '2017-01-15 00:00:00', NULL),
(4, 13, 'Eléctricité', '', 1, '2016-12-18 00:00:00', NULL, '2016-12-18 00:00:00'),
(5, 13, 'Electronique', '', 1, '2016-12-18 00:00:00', NULL, '2016-12-18 00:00:00'),
(6, 17, 'textile', '', 1, '2016-12-18 00:00:00', NULL, '2016-12-18 00:00:00'),
(7, 16, 'taxi-be', '', 1, '2016-12-18 00:00:00', NULL, '2016-12-18 00:00:00'),
(8, 11, 'hotelerie', 'hotelerie', 1, '2017-02-01 00:00:00', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(9, 13, 'Electricité-électronique', '', 1, '2016-12-19 00:00:00', NULL, '2016-12-19 00:00:00'),
(10, 15, 'immobilier', '', 1, '2017-01-03 00:00:00', NULL, '2017-01-03 00:00:00'),
(13, 12, 'conseil et services aux entreprises', '', 1, '2017-02-01 00:00:00', NULL, '2017-02-01 00:00:00'),
(15, 11, 'Souss', 'souss', 0, '2017-02-01 00:00:00', '2017-02-01 00:00:00', NULL),
(16, 11, 'voyages', 'voyages', 0, '2017-02-01 00:00:00', '2017-02-01 00:00:00', NULL),
(17, 11, 'essai', 'essai', 0, '2017-02-01 00:00:00', '2017-02-01 00:00:00', NULL),
(18, 26, 'Ce nom est ,visible partout _sur le site.', 'ce-nom-est-visible-partout-sur-le-site', 0, '2017-02-01 00:00:00', NULL, NULL),
(19, 13, 'Ce nom est ,visible partout _sur le site2.', 'ce-nom-est-visible-partout-sur-le-site2', 0, '2017-02-01 00:00:00', NULL, NULL),
(20, 26, 'essai323', 'essai323', 0, '2017-02-01 00:00:00', NULL, NULL),
(23, 12, 'test communication', 'test-communication', 0, '2017-02-02 00:00:00', NULL, NULL),
(24, 26, 'Test agro', 'test-agro', 1, '2017-02-03 00:00:00', NULL, '2017-02-03 00:00:00'),
(25, 17, 'test essai', 'test-essai', 1, '2017-02-04 00:00:00', NULL, '2017-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_telephone`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_telephone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Contenu de la table `pagesjaunes_telephone`
--

INSERT INTO `pagesjaunes_telephone` (`id`, `entreprise_id`, `numero`, `is_publie`, `date_creation`, `date_update`) VALUES
(33, 17, '033 13 456 45', 1, '2017-01-13 00:00:00', '2017-01-24 20:41:11'),
(35, 18, '032 03 523 32', 1, '2017-01-18 00:00:00', NULL),
(36, 19, '033 24 655 65', 1, '2017-01-18 00:00:00', NULL),
(37, 20, '033 25 265 23', 1, '2017-01-18 00:00:00', NULL),
(38, 21, '033 12 542 25', 1, '2017-01-19 00:00:00', NULL),
(39, 22, '033 12 545 65', 1, '2017-01-19 00:00:00', NULL),
(40, 23, '033 54 656 99', 1, '2017-01-19 00:00:00', NULL),
(41, 24, '033 21 456 85', 1, '2017-01-24 00:00:00', NULL),
(42, 17, '261 34 52 654 23', 1, '2017-01-24 20:41:06', NULL),
(43, 25, '0320320320', 1, '2017-01-26 19:36:17', NULL),
(44, 26, '033 223 323', 1, '2017-01-26 20:22:40', NULL),
(144, 27, '030303030', 1, '2017-01-31 21:02:18', '2017-02-08 21:26:43'),
(146, 28, '21313', 1, '2017-02-04 01:37:24', NULL),
(147, 29, '3213213', 1, '2017-02-04 01:41:40', NULL),
(148, 30, '3213', 1, '2017-02-04 01:45:34', NULL),
(149, 31, '+261 33 45 987 63', 1, '2017-02-04 06:14:18', NULL),
(151, 27, '032654987', 1, '2017-02-08 21:14:30', '2017-02-08 21:26:44');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_toprecherche`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_toprecherche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `souscategorie_id` int(11) NOT NULL,
  `entreprise_id_top1` int(11) NOT NULL,
  `entreprise_id_top2` int(11) DEFAULT NULL,
  `entreprise_id_top3` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `pagesjaunes_toprecherche`
--

INSERT INTO `pagesjaunes_toprecherche` (`id`, `souscategorie_id`, `entreprise_id_top1`, `entreprise_id_top2`, `entreprise_id_top3`, `date_creation`, `date_update`) VALUES
(31, 2, 18, 19, 22, '2017-02-03 00:00:00', '2017-02-03 00:00:00'),
(32, 1, 18, 19, 20, '2017-02-03 00:00:00', '2017-02-03 00:00:00'),
(33, 3, 17, 24, 18, '2017-02-03 00:00:00', '2017-02-03 00:00:00'),
(38, 16, 28, 0, 0, '2017-02-04 00:00:00', '0000-00-00 00:00:00'),
(39, 15, 28, 0, 0, '2017-02-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pagesjaunes_videos`
--

CREATE TABLE IF NOT EXISTS `pagesjaunes_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_id` int(11) NOT NULL,
  `url_youtube` varchar(255) NOT NULL,
  `vignette_video` varchar(255) NOT NULL,
  `is_publie` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `pagesjaunes_videos`
--

INSERT INTO `pagesjaunes_videos` (`id`, `entreprise_id`, `url_youtube`, `vignette_video`, `is_publie`, `date_creation`, `date_update`) VALUES
(13, 21, 'https://www.youtube.com/watch?v=kMy-6RtoOVU', 'Entreprise4logo_vertical-Quadrichrome.png', 1, '2017-01-19 00:00:00', NULL),
(14, 17, 'https://www.youtube.com/watch?v=3OiBZGMWIgs', 'Elevendesignambohipo.jpg', 1, '2017-01-26 08:55:04', '2017-02-11 03:50:29'),
(18, 27, 'https://www.youtube.com/watch?v=v4Qv26IWyGU', 'download-1.png', 1, '2017-01-31 19:24:39', '2017-02-11 03:34:57'),
(20, 31, 'http://youtubelalala.com', 'greatfeautresvlcsnap-2017-01-11-17h17m48s154.png', 1, '2017-02-04 06:16:17', '2017-02-04 06:16:38'),
(23, 27, 'https://www.youtube.com/watch?v=uIz3cb_igD4', 'bg3.jpg', 1, '2017-02-08 08:57:17', '2017-02-11 03:14:51'),
(24, 27, 'https://www.youtube.com/watch?v=v4Qv26IWyGU', 'brahman-1.jpg', 1, '2017-02-10 17:19:31', '2017-02-10 17:19:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
