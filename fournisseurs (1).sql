-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 28 Juillet 2017 à 12:11
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fournisseurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `tablefrs`
--

CREATE TABLE `tablefrs` (
  `ID` int(11) NOT NULL,
  `entite` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `nomDemandeur` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `dateDemande` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `raisonDemande` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `siret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `complementSiret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `tva` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `raisonSociale` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `voieRue` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `codePostal` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `siteInternet` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `raisonSocialePaiement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `voieRuePaiement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `codePostalPaiement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `villePaiement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `paysPaiement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `groupeAppartenance` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `natureFournisseur` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `incoterm` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `lieuVilleRegleGroupe` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `francoDePortRegleGroupe` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `motifDerogationHorsGroupe` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `BSSTypeProduit` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `devise` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `modeReglement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `conditionReglement` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `ca` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `nbEmployes` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `iso` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `bilanAFournir` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `domaineValidation` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `tablefrs`
--

INSERT INTO `tablefrs` (`ID`, `entite`, `nomDemandeur`, `fonction`, `dateDemande`, `raisonDemande`, `siret`, `complementSiret`, `tva`, `raisonSociale`, `voieRue`, `codePostal`, `ville`, `pays`, `telephone`, `fax`, `siteInternet`, `raisonSocialePaiement`, `voieRuePaiement`, `codePostalPaiement`, `villePaiement`, `paysPaiement`, `groupeAppartenance`, `natureFournisseur`, `incoterm`, `lieuVilleRegleGroupe`, `francoDePortRegleGroupe`, `motifDerogationHorsGroupe`, `BSSTypeProduit`, `devise`, `modeReglement`, `conditionReglement`, `ca`, `nbEmployes`, `iso`, `bilanAFournir`, `domaineValidation`) VALUES
(1, '109', 'NOYER', 'DSI', '20170725', NULL, NULL, NULL, NULL, 'Rs cde', 'rue cde ', NULL, 'ville cde', 'pays cde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'achats'),
(2, '080', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '080', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '080', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '080', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '080', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '080', '55', 'ezdfzefze', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '400', '5', '55', '20170726', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '080', '5', '5', '20170726', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '080', '55', '55', '20170726', '5', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '080', '1564156', '151', '20170726', '5156', '156', '156', '156', '156', '156156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '080', 'zaeaze', 'azeazeaz', '20170726', 'eazeaz', 'eazeaze', 'azeaaze', 'zeazeaze', 'azeeza', 'azeaze', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'achats'),
(13, '080', '55', '5', '20170726', '5', '5', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SÃ©lectionner une valeur', 'achats'),
(14, '080', '5156', '156', '20170726', '156', '156', '156', '156', '1', '56156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'SÃ©lectionner une valeur', 'achats'),
(15, '080', '5', '56', '20170726', '156', '156', '1561', '561', '561', '56156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(16, '080', '156', '156', '20170726', '156', '15', '1651', '561', '5615', '156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(17, '080', '56156', '1561', '20170726', '561', '56156', '156', '1', '56161', '561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(18, '080', '156156156', '1561', '20170726', '156', '156', '1', '561', '561', '561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(19, '080', '1256', '156', '20170726', '561', '5656', '1', '56156', '15', '156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(20, '080', '851', '561', '20170726', '561', '561', '561', '561', '561', '561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(21, '080', '156', '151', '20170726', '561', '561', '561', '561', '561', '561', NULL, NULL, NULL, NULL, NULL, NULL, '1', '', NULL, '', '', '', '', '', NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(22, '080', '151561', '5651', '20170726', '561', '561', '561', '56156', '156', '156', NULL, '156', '156', '156', '156', '156', '165', '', NULL, '', '', '', '', '', NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(23, '080', '55', '51', '20170726', '5656', '156', '156', '156', '156', '1561', NULL, '16', '1561', '56', '156', '156', '1561', '56', '', '', '', '', '', '', NULL, '', NULL, '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(24, '080', '156415641', '11', '20170726', '1', '56', '15', '61', '561', '56156', '156', '156', '56', '1561', '5661', '56', '1561', '56', '1', '', '', '', '', '', '', '', '', '', 'SÃ©lectionner une valeur', '', '45F', '', '', '', 'SÃ©lectionner une valeur', 'achats'),
(25, '200', '51', '  561      ', '20170726', '561', '515', '6156', '156', '151', '56', '1561', '56156', 'AF', '156', '15', '15', '56156', '156', '151', '', 'AF', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '45F', '  ', '', '', 'SÃ©lectionner une valeur', 'Movex'),
(26, '420', 'NOYER', '   DSI         ', '20170726', 'Informatiique Ruggiero', '123456789', '12345', 'FR77899644', 'COMECA', 'rue des genets', '34970', 'LATTES', 'AF', '06220033322', '01215123154', 'comeca.com', 'COMECA', 'ererf', '13975', 'aix', 'AF', '', 'FRAISGEN', 'CIF', 'aix', '65', 'motifs    ', 'Bien', 'EUR', 'BOR', '', '   150000', '15', 'oui', '', 'Movex'),
(27, '410', 'NOYER', '   DSI         ', '20170726', 'azad', '0215489894', '15515615', 'FR77899644', 'COMECA', 'rue des genets', '034970', 'LATTES', 'AF', '00012156665', '210021215', 'comeca.com', 'COMECA', 'fz,ejkf,nzk,', 'azeaz', 'eazeazeea', 'AF', '', 'FRAISGEN', 'CFR', 'eazeazeea', '65', '   ', 'Serv', 'AUD', 'DIV', '110', '   11', '21', 'non', 'AUD', 'Movex'),
(28, '150', 'zerfzef', '         zefzefze                           ', '20170726', 'fzefzefzef', 'zfeeffze', 'fzefze', 'fzef', 'zefefzfezfzefze', '', '', 'fzefzef', 'AF', '', '', '', '', '', '', '', 'AF', '', ' ', '&D', '', '', '         ', '', '', 'BOR', '10F', '         ', '', '', '', 'Movex');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_IDENTIFIANT` char(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `USER_PASSWORD` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `USER_IDENT` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_IDENTIFIANT`, `USER_PASSWORD`, `USER_IDENT`) VALUES
(1, 'admin', 'admin', 0),
(2, 'compta', 'comptamdp', 2),
(3, 'achats', 'achats', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tablefrs`
--
ALTER TABLE `tablefrs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tablefrs`
--
ALTER TABLE `tablefrs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
