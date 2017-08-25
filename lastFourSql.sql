-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Août 2017 à 09:26
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
  `entite` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `nomDemandeur` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `dateDemande` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `raisonDemande` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `siret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `complementSiret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `tva` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `raisonSociale` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `voieRue` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `codePostal` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
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
  `bilan` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `kbis` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `domaineValidation` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `tablefrs`
--

INSERT INTO `tablefrs` (`ID`, `entite`, `nomDemandeur`, `fonction`, `dateDemande`, `raisonDemande`, `siret`, `complementSiret`, `tva`, `raisonSociale`, `voieRue`, `codePostal`, `ville`, `pays`, `telephone`, `fax`, `siteInternet`, `raisonSocialePaiement`, `voieRuePaiement`, `codePostalPaiement`, `villePaiement`, `paysPaiement`, `groupeAppartenance`, `natureFournisseur`, `incoterm`, `lieuVilleRegleGroupe`, `francoDePortRegleGroupe`, `motifDerogationHorsGroupe`, `BSSTypeProduit`, `devise`, `modeReglement`, `conditionReglement`, `ca`, `nbEmployes`, `iso`, `bilan`, `kbis`, `domaineValidation`, `Timestamp`) VALUES
(1, '610', 'NOYER', '    DSI            ', '20170725', 'test redirect', '123456789', '12345', 'FR123456789', 'Rs cde', 'rue cde ', '07310', 'ville cde', 'FR', '0671781756', '0475648660', 'noyer.com', 'COMECA', 'RUE DES GENETS', '34397', 'St MATHIEU', 'FR', '', ' ', '&D', '', '', '   tyes\'ertqert ', '', '', 'BOR', '', '    ^Ã¹Ã®oÃ¹', '', '', NULL, '', 'admin', '2017-08-25 10:41:15'),
(2, '610', 'toto', '        ', '20170726', '', '', '', '', '5', '', '', '5', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '', '  ', '', '', NULL, NULL, '', '2017-08-25 10:41:15'),
(3, '109', 'test popup', '        ', '20170726', '', '', '', '', '55', '5', '5', '5', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '', '  ', '', '', NULL, NULL, 'Movex', '2017-08-25 10:41:15'),
(4, '400', '55', '        ', '20170726', '', '', '', '', '555', '', '', '555', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '', '  ', '', '', NULL, NULL, '', '2017-08-25 10:41:15'),
(5, '430', '55', '  55      ', '20170726', '55555', '', '', '', '55555', '', '55', '555', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '', '  ', '', '', NULL, NULL, '', '2017-08-25 10:41:15'),
(6, '080', 'test 1', '   dsi         ', '20170726', 'test ', '888888888', '88888', 'FR88888888', 'ABB ENTRELEC', '23, RUE PERFORMANCE', '59000', 'VILLENEUVE D\'ASCQ   ', 'FR', '0801020304 ', '0901020304', 'abb@gmail.com', ' ABB ENTRELEC sas', '23, RUE PERFORMANCE', '5900', 'VILLENEUVE D\'ASCQ ', 'FR', 'V2', 'PRODUCTION', 'CIP', 'VILLENEUVE D\'ASCQ', '1200', ' Attention a ala livraison   ', 'Serv', 'EUR', 'BOR', '45F', '    123 000', '15', 'non', NULL, NULL, '', '2017-08-25 10:41:15'),
(7, '080', 'nn', '    ', '20170726', 'vfg', '', '', '', 'sdfg', '', '', 'sfg', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', ' ', '', '', 'BOR', '', ' ', '', '', NULL, NULL, '', '2017-08-25 10:41:15'),
(8, '080', 'zreza', '              erzea                                          ', '20170726', '', '', '', '', 'ezrazae', '', '', 'eraze', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '              ', '', '', 'BOR', '', '              ', '', '', 'Array', 'Array', 'compta', '2017-08-25 10:41:15'),
(9, '080', 'zreza', '   erzea         ', '20170726', '', '', '', '', 'ezrazae', '', '', 'eraze', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '   ', '', '', 'BOR', '', '   ', '', '', 'Array', 'Array', 'compta', '2017-08-25 10:41:15'),
(10, '080', 'zreza', 'erzea', '20170726', '', '', '', '', 'ezrazae', '', '', 'eraze', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', 'cache_config2.sql', '', 'achats', '2017-08-25 10:41:15'),
(11, '080', '5555', '', '20170726', '', '555', '', '', '5555', '', '', '5555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', 'cache_config-data.txt', '', 'achats', '2017-08-25 10:41:15'),
(12, '080', '5555', '', '20170726', '', '555', '', '', '5555', '', '', '5555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', 'cache_config-data.txt', '', 'achats', '2017-08-25 10:41:15'),
(13, '080', '5555', '', '20170726', '', '555', '', '', '5555', '', '', '5555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', 'cache_config-data.txt', '', 'achats', '2017-08-25 10:41:15'),
(14, '080', '5555', '', '20170726', '', '555', '', '', '5555', '', '', '5555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', 'cache_config-data.txt', '', 'achats', '2017-08-25 10:41:15'),
(15, '080', '5555', '', '20170726', '', '555', '', '', '5555', '', '', '5555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', '20170726cache_config-data.txt', '20170726', 'achats', '2017-08-25 10:41:15'),
(16, '080', '555555', '55555', '20170726', '', '', '', '', '5555', '', '', '55555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', '20170726cache_config_Wil', '20170726', 'achats', '2017-08-25 10:41:15'),
(17, '080', '555555', '55555', '20170726', '', '', '', '', '5555', '', '', '55555', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', 'SÃ©lectionner une valeur', '', '', '', '20170726cache_config_Wil', '20170726', 'achats', '2017-08-25 10:41:15'),
(18, '080', '5', 'hjk', '20170726', '', '', '', '', 'jhk', 'jhk', '', 'jhk', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', '20170726DevisFrs_3634375.pdf', '201707261111874_ALSTO.pdf', 'achats', '2017-08-25 10:41:15'),
(19, '080', 'ghfg', 'gfh', '20170726', 'fggfhfg', '', '', '', 'fghfgdh', '', NULL, 'gfdhfg', 'FR', '', 'fgh', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', NULL, '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(20, '080', 'ABBER', 'DSI', '20170726', 'test', '123456789', '12345', 'FR123456789', 'ABB ENTRELEC', '23, RUE PERFORMANCE', '59000', 'ST MARTIN', 'FR', '0801020304', '0901020304', 'vvvv@gmail.com', ' ', '', '', '', 'FR', 'X34', 'PRODUCTION', 'DDP', 'LE CHEYLARD', '0', ' ', 'Bien', 'EUR', 'BOR', '45F', ' 333 565', '12 ', 'oui', NULL, NULL, '', '2017-08-25 10:41:15'),
(21, '610', 'test Nadine', '     hngnhgn               ', '20170726', 'RÃ© Affichage page encours ap^res update', 'ghngng', '', '', 'nghnhgn', 'hnhn', '', 'dnhnhnh', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '     ', '', '', 'BOR', '45F', '     ', '', '', NULL, NULL, 'Movex', '2017-08-25 10:41:15'),
(22, '080', 'dzadza', '   dzadazdzadza         ', '20170726', '', 'dzadzadza', '', '', 'dzadzazdaz', 'dzaazdz', '', 'zdazdadzadza', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '   ', '', '', 'BOR', '45F', '   ', '', '', 'Array', 'Array', 'Movex', '2017-08-25 10:41:15'),
(23, '080', 'dfbvrfg', '   bgfbfgb         ', '20170726', '', 'fgbfgbfg', '', '', 'bfgbgfbgf', 'bfggffgbfgbfgbbfg', '', 'bfgbfgbfg', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '   ', '', '', 'BOR', '45F', '   ', '', '', NULL, NULL, 'compta', '2017-08-25 10:41:15'),
(24, '080', 'gbfbfg', ' bfgbfgbfgb   ', '20170726', '', 'bfgbfg', 'bbfgb', '', 'bgfbfgb', 'fgbfgb', 'fgfgb', 'fgbfgbfgb', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', ' ', '', '', 'BOR', '45F', ' ', '', '', NULL, NULL, 'compta', '2017-08-25 10:41:15'),
(25, '080', 'gbfbfg', 'bfgbfgbfgb', '20170726', '', 'bfgbfg', 'bbfgb', '', 'bgfbfgb', 'fgbfgb', 'fgfgb', 'fgbfgbfgb', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', '1111673_01977_1.pdf', '', 'compta', '2017-08-25 10:41:15'),
(26, '080', 'dfbvdfb', 'dfbdfbdfbfdfbdf', '20170726', '', '', '', '', 'dfbfdbfbdb', 'fbfdb', 'bfdf', 'bfdb', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', '1111673_01977_1.pdf', '', 'achats', '2017-08-25 10:41:15'),
(27, '080', '54254', '245245', '20170726', '4254254254', '45245254', '', '', '2542', '452542', '25542', '2452', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', 'Devis_3630655.pdf', '', 'achats', '2017-08-25 10:41:15'),
(28, '080', 'dsqdsqd', 'qsdsqd', '20170726', 'sqdsqdqs', 'dqsdqdq', '', '', 'sqdsq', 'dsqdsq', 'dsqds', 'dsqsdqdqs', 'FR', '', '', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', 'BP__1110534.pdf', 'Bl_1112416.pdf', 'achats', '2017-08-25 10:41:15'),
(29, '080', 'Ruggiero', '   DSI         ', '20170726', 'rs demande', 'SIRET', 'COMP', 'TVA', 'rs commannde', 'voie commande', '34970', 'lattes', 'AR', '0622030466', '04446655582', 'comeca.com', 'rs paiement', 'rue paiement', '07200', 'LE CHEYLARD', 'AD', 'V4#', 'FRAISGEN', 'DAT', 'aix en provence', '65', 'parce que    ', 'Serv', 'MYR', 'VIE', '410', '   150 000', '01015', 'oui', '20170726cache_config2.sql', '20170726', '', '2017-08-25 10:41:15'),
(30, '610', 'nadine', ' dsi   ', '20170726', 'sdcsdcsdc', 'dscsdcsd', '', '', 'csdcsdcs', 'sdcsdc', 'csdc', 'sdcsdc', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', '', 'BOR', '45F', '  ', '', '', '20170726', '20170726cache_config-data.txt', '', '2017-08-25 10:41:15'),
(31, '400', '123466', '        vvdvvfdf                        ', '20170726', '', 'vdf', 'vdfvd', 'dvvfdf', 'v', 'dfvf', 'fvfv', 'vfvffvfv', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '        ', '', '', 'BOR', '45F', '        ', '', '', '20170726cache_config-data.txt', NULL, '', '2017-08-25 10:41:15'),
(32, '610', 'Renaud', '  DSI      ', '20170727', 'Le perou c\'est fini', '123456789', '12345', 'fr123456789', 'VISIER', 'TTTT', '34000', 'montaud', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '  ', '', 'EUR', 'BOR', '45F', '  ', '', '', '20170727BL_11117781_301116_01837.pdf', '201707271111514_INEOP.pdf', '', '2017-08-25 10:41:15'),
(33, '400', 'Nadine', ' DSI   ', '20170823', 'test maj appi et msg', '77777777', '77777', 'fr77777777', 'maison Noyer', 'Crezenoux', '07310', 'ST MARTIN', 'FR', '0671781756 ', '0475648660', 'nnnn@orange.fr', 'Rugguerio', 'rue e macron', '34000', 'lattes', 'FR', 'X37', 'PRODUCTION', 'DDU', 'MONTPELLIER', '1200', ' ', 'Bien', 'EUR', 'BOR', '45F', ' 35266', '4', 'oui', NULL, NULL, '', '2017-08-25 10:41:15'),
(34, '400', 'Nadine', 'DSI', '20170824', 'test api', '123456789', '12345', 'FR123456789', 'ABB ENTRELEC', '23, RUE PERFORMANCE', '59000', 'VILLENEUVE D\'ASCQ', 'FR', '0671781756', '0901020304', 'abb@gmail.com', ' ', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(35, '400', 'Nadine', 'DSI', '20170824', 'test api', '123456789', '12345', 'FR123456789', 'ABB ENTRELEC', '23, RUE PERFORMANCE', '59000', 'VILLENEUVE D\'ASCQ', 'FR', '0671781756', '0901020304', 'abb@gmail.com', ' ', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(36, '400', 'Nadine', 'DSI', '20170824', 'test api', '123456789', '12345', 'FR123456789', 'ABB ENTRELEC', '23, RUE PERFORMANCE', '59000', 'VILLENEUVE D\'ASCQ', 'FR', '0671781756', '0901020304', 'abb@gmail.com', ' ', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(37, '080', 'tttt', 'hgghfg', '20170824', '', '777777777', '88888', 'FR123456789', 'ABB ENTRELEC', 'Crezenoux', '59000', 'VILLENEUVE D\'ASCQ', 'FR', '0801020304', '04756486660', '', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(38, '080', 'erdfy', 'g', '20170824', 'guyg', 'uyg', 'uy', 'guy', 'guy', 'gy', 'uyg', 'uy', 'GU', 'guy', 'guy', 'g', 'guyguyuy', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(39, '080', 'zaeaze', 'azeazeaz', '20170825', 'eazeazeaze', 'azeaze', 'azeaz', 'eazeaz', 'eazeaze', 'azeze', 'zeaze', 'ezaeazeazeaz', 'FR', 'eaze', 'eaze', 'azeza', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(40, '080', 'BLABLA', 'hbn', '20170825', 'hj', 'bjh', 'b', 'jhb', 'jhb', 'jhb', 'jh', 'hb', 'JM', 'hb', 'hb', 'jhb', 'jhb', 'jh', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(41, '080', 'zaeazeezvvv', 'bhj', '20170825', 'bjh', 'bjh', 'bjh', 'bjh', 'bjh', 'bjh', 'bjh', 'b', 'HR', 'bjh', 'bjh', 'bh', 'bjh', 'bjhbjh', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:15'),
(42, '080', 'zrara', 'rtf', '20170825', 'tyf', 'tyf', 'tyft', 'f', 'tyf', 'tyfty', 'ffyt', 'tyf', 'TJ', 'fty', 'ftyf', 'yf', 'fy', 't', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:41:26'),
(43, '080', 'zaee', 'gvgv', '20170825', 'uy', 'uyg', 'yg', 'g', 'u', 'yguyg', 'g', 'yyug', 'UY', 'uyg', 'uyg', 'uyggy', 'guyuy', 'guygu', 'guygg', 'uyg', 'GA', 'uyg', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:43:11'),
(44, '080', 'dazd', 'h', '20170825', 'bjh', 'b', 'jhb', 'jhb', 'hj', 'bhb', 'jhb', 'h', 'JM', 'bjh', 'b', 'jb', 'jhb', 'b', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:46:22'),
(45, '080', 'v', 'ghvgh', '20170825', 'ghv', 'gh', 'vhg', 'vh', 'vhg', 'vghvgh', 'gh', 'sd', 'GH', 'gh', 'gh', 'vv', 'hh', 'vvgh', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:55:13'),
(46, '080', 'BABAOULA', ',jkanjj', '20170825', 'jkn', '', 'ujn', 'jkn', 'jk', 'bnjk', 'bh', 'jb', 'JM', '', 'jhb', 'jhb', 'jhb', 'jhbj', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:55:41'),
(47, '080', 'BBABAEH', 'njk', '20170825', 'jkn', 'jkn', 'jkn', 'jkn', 'jkn', 'jkn', 'n', 'jk', 'JM', 'kj', 'n', 'jk', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:57:04'),
(48, '080', 'azeaz', 'eazeaz', '20170825', 'eazeaze', 'azeaz', 'eaze', 'eazeazeaz', 'azeeaeazeaz', 'eazeaz', 'eazea', 'eazeaz', 'FR', 'azeaz', 'ezaea', 'zeaz', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', '2017-08-25 10:58:09'),
(49, '080', 'CREATION TEST', '      zefzefzef                  ', '20170825', 'zefzefzef\r\n', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', ' ', '&D', '', '', '      ', '', '', 'BOR', '45F', '      ', '', '', NULL, NULL, 'compta', '2017-08-25 11:05:35'),
(50, '080', 'Test historisation', 'Historisation modification', '20170825', 'nj', 'njk', 'njk', 'njk', 'njk', 'nkjn', 'n', 'kn', 'KY', 'njk', 'nk', 'n', '', '', '', '', 'FR', '', ' ', '&D', '', '', ' ', '', '', 'BOR', '45F', ' ', '', '', NULL, NULL, 'compta', '2017-08-25 11:18:29');

-- --------------------------------------------------------

--
-- Structure de la table `tablefrshisto`
--

CREATE TABLE `tablefrshisto` (
  `statut` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `entite` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `nomDemandeur` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `dateDemande` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `raisonDemande` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `siret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `complementSiret` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `tva` varchar(30) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `raisonSociale` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `voieRue` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `codePostal` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
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
  `bilan` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `kbis` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `domaineValidation` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `domaineInitial` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'Demande'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `tablefrshisto`
--

INSERT INTO `tablefrshisto` (`statut`, `ID`, `entite`, `nomDemandeur`, `fonction`, `dateDemande`, `raisonDemande`, `siret`, `complementSiret`, `tva`, `raisonSociale`, `voieRue`, `codePostal`, `ville`, `pays`, `telephone`, `fax`, `siteInternet`, `raisonSocialePaiement`, `voieRuePaiement`, `codePostalPaiement`, `villePaiement`, `paysPaiement`, `groupeAppartenance`, `natureFournisseur`, `incoterm`, `lieuVilleRegleGroupe`, `francoDePortRegleGroupe`, `motifDerogationHorsGroupe`, `BSSTypeProduit`, `devise`, `modeReglement`, `conditionReglement`, `ca`, `nbEmployes`, `iso`, `bilan`, `kbis`, `domaineValidation`, `domaineInitial`) VALUES
(0, 48, '080', 'azeaz', 'eazeaz', '20170825', 'eazeaze', 'azeaz', 'eaze', 'eazeazeaz', 'azeeaeazeaz', 'eazeaz', 'eazea', 'eazeaz', 'FR', 'azeaz', 'ezaea', 'zeaz', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', 'Demande'),
(1, 49, '080', 'CREATION TEST', 'zefzefzef', '20170825', 'zefzefzef', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 49, '080', 'CREATION TEST', ' zefzefzef   ', '20170825', 'zefzefzef', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', NULL, ' ', NULL, '', '', ' ', '', NULL, NULL, NULL, ' ', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 49, '080', 'CREATION TEST', '   zefzefzef         ', '20170825', 'zefzefzef', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', ' ', '&D', '', '', '   ', '', '', 'BOR', '45F', '   ', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 49, '080', 'CREATION TEST', '    zefzefzef            ', '20170825', 'zefzefzef', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', ' ', '&D', '', '', '    ', '', '', 'BOR', '45F', '    ', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 49, '080', 'CREATION TEST', '     zefzefzef               ', '20170825', 'zefzefzef\r\n', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', ' ', '&D', '', '', '     ', '', '', 'BOR', '45F', '     ', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 49, '080', 'CREATION TEST', '      zefzefzef                  ', '20170825', 'zefzefzef\r\n', 'bjh', 'bh', 'bhjbh', 'jbhh', 'bhjbj', 'bj', 'bjhbjh', 'BS', 'jbjh', 'bj', 'bjhbjh', 'bjh', 'bjh', '', '', 'FR', '', ' ', '&D', '', '', '      ', '', '', 'BOR', '45F', '      ', '', '', NULL, NULL, 'achats', 'Demande'),
(1, 50, '080', 'Test historisation', 'j', '20170825', 'nj', 'njk', 'njk', 'njk', 'njk', 'nkjn', 'n', 'kn', 'KY', 'njk', 'nk', 'n', '', '', '', '', 'FR', '', '', '', '', '', '', '', '', 'BOR', '45F', '', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 50, '080', 'Test historisation', 'Historisation modification', '20170825', 'nj', 'njk', 'njk', 'njk', 'njk', 'nkjn', 'n', 'kn', 'KY', 'njk', 'nk', 'n', '', '', '', '', 'FR', '', ' ', '&D', '', '', ' ', '', '', 'BOR', '45F', ' ', '', '', NULL, NULL, 'achats', 'Demande'),
(2, 9, '080', 'zreza', '   erzea         ', '20170726', '', '', '', '', 'ezrazae', '', '', 'eraze', 'FR', '', '', '', '', '', '', '', 'FR', '', ' ', '&D', '', '', '   ', '', '', 'BOR', '', '   ', '', '', NULL, NULL, 'compta', 'achats');

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
(2, 'compta', 'compta', 2),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
