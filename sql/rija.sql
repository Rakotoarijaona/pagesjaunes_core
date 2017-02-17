-- 2017-02-17

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