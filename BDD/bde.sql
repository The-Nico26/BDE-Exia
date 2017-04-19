-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `bde`;

DROP TABLE IF EXISTS `Album`;
CREATE TABLE `Album` (
  `ID_Album` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Album`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `Album` (`ID_Album`, `Titre`, `Description`) VALUES
(1,	'Test dede',	'Pourquoi pas');

DROP TABLE IF EXISTS `avoir_permission`;
CREATE TABLE `avoir_permission` (
  `ID_Permission` int(11) NOT NULL,
  `ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`ID_Permission`,`ID_Membre`),
  KEY `FK_avoir_permission_ID_Membre` (`ID_Membre`),
  CONSTRAINT `FK_avoir_permission_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`),
  CONSTRAINT `FK_avoir_permission_ID_Permission` FOREIGN KEY (`ID_Permission`) REFERENCES `Permission` (`ID_Permission`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `CommEvent`;
CREATE TABLE `CommEvent` (
  `ID_CommEvent` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) DEFAULT NULL,
  `Temps` date DEFAULT NULL,
  `ID_Event` int(11) NOT NULL,
  PRIMARY KEY (`ID_CommEvent`),
  KEY `FK_CommEvent_ID_Event` (`ID_Event`),
  CONSTRAINT `FK_CommEvent_ID_Event` FOREIGN KEY (`ID_Event`) REFERENCES `Event` (`ID_Event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `CommIdee`;
CREATE TABLE `CommIdee` (
  `ID_CommIdee` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) DEFAULT NULL,
  `Temps` date DEFAULT NULL,
  `ID_Idee` int(11) NOT NULL,
  `ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`ID_CommIdee`),
  KEY `FK_CommIdee_ID_Idee` (`ID_Idee`),
  KEY `FK_CommIdee_ID_Membre` (`ID_Membre`),
  CONSTRAINT `FK_CommIdee_ID_Idee` FOREIGN KEY (`ID_Idee`) REFERENCES `Idee` (`ID_Idee`),
  CONSTRAINT `FK_CommIdee_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `CommPhoto`;
CREATE TABLE `CommPhoto` (
  `ID_CommPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) DEFAULT NULL,
  `Temps` date DEFAULT NULL,
  `ID_Photo` int(11) NOT NULL,
  `ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`ID_CommPhoto`),
  KEY `FK_CommPhoto_ID_Photo` (`ID_Photo`),
  KEY `FK_CommPhoto_ID_Membre` (`ID_Membre`),
  CONSTRAINT `FK_CommPhoto_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`),
  CONSTRAINT `FK_CommPhoto_ID_Photo` FOREIGN KEY (`ID_Photo`) REFERENCES `Photo` (`ID_Photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `contenir_produit`;
CREATE TABLE `contenir_produit` (
  `ID_Panier` int(11) NOT NULL,
  `ID_Produit` int(11) NOT NULL,
  PRIMARY KEY (`ID_Panier`,`ID_Produit`),
  KEY `FK_contenir_produit_ID_Produit` (`ID_Produit`),
  CONSTRAINT `FK_contenir_produit_ID_Panier` FOREIGN KEY (`ID_Panier`) REFERENCES `Panier` (`ID_Panier`),
  CONSTRAINT `FK_contenir_produit_ID_Produit` FOREIGN KEY (`ID_Produit`) REFERENCES `Produit` (`ID_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Event`;
CREATE TABLE `Event` (
  `ID_Event` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Formulaire` varchar(255) DEFAULT NULL,
  `Calendrier` date DEFAULT NULL,
  `Lieu` varchar(255) DEFAULT NULL,
  `ID_Album` int(11) NOT NULL,
  PRIMARY KEY (`ID_Event`),
  KEY `FK_Event_ID_Album` (`ID_Album`),
  CONSTRAINT `FK_Event_ID_Album` FOREIGN KEY (`ID_Album`) REFERENCES `Album` (`ID_Album`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `Event` (`ID_Event`, `Titre`, `Description`, `Formulaire`, `Calendrier`, `Lieu`, `ID_Album`) VALUES
(2,	'Titre de test',	'Couou',	'input',	'2017-04-18',	'A gland',	1);

DROP TABLE IF EXISTS `Idee`;
CREATE TABLE `Idee` (
  `ID_Idee` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Calendrier` date DEFAULT NULL,
  `Pbleu` int(11) DEFAULT NULL,
  `Prouge` int(11) DEFAULT NULL,
  `ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`ID_Idee`),
  KEY `FK_Idee_ID_Membre` (`ID_Membre`),
  CONSTRAINT `FK_Idee_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `Idee` (`ID_Idee`, `Titre`, `Description`, `Calendrier`, `Pbleu`, `Prouge`, `ID_Membre`) VALUES
(1,	'Superbe soirée de malade',	'Mâchage de soirée ;)',	'2017-04-18',	0,	0,	2);

DROP TABLE IF EXISTS `Membre`;
CREATE TABLE `Membre` (
  `ID_Membre` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `PassWord` text,
  `Role` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Promotion` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Membre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `Membre` (`ID_Membre`, `Prenom`, `Nom`, `PassWord`, `Role`, `Mail`, `Promotion`, `Token`) VALUES
(1,	'Clem',	'T',	NULL,	'Membre',	'cl.@e.Fr',	NULL,	NULL),
(2,	'Nicolas',	'Mazard',	NULL,	'Sudo su',	'ni@c.f',	NULL,	NULL),
(3,	'Alec',	't',	NULL,	'HTMLeur',	'n@d.f',	NULL,	NULL),
(4,	'Clement',	'Chat',	'Truc',	'Macheur',	'cl.ch@viacesi.fr',	NULL,	NULL);

DROP TABLE IF EXISTS `Panier`;
CREATE TABLE `Panier` (
  `ID_Panier` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`ID_Panier`),
  KEY `FK_Panier_ID_Membre` (`ID_Membre`),
  CONSTRAINT `FK_Panier_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `participer`;
CREATE TABLE `participer` (
  `ID_Membre` int(11) NOT NULL,
  `ID_Event` int(11) NOT NULL,
  PRIMARY KEY (`ID_Membre`,`ID_Event`),
  KEY `FK_participer_ID_Event` (`ID_Event`),
  CONSTRAINT `FK_participer_ID_Event` FOREIGN KEY (`ID_Event`) REFERENCES `Event` (`ID_Event`),
  CONSTRAINT `FK_participer_ID_Membre` FOREIGN KEY (`ID_Membre`) REFERENCES `Membre` (`ID_Membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Permission`;
CREATE TABLE `Permission` (
  `ID_Permission` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Permission`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Photo`;
CREATE TABLE `Photo` (
  `ID_Photo` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(255) DEFAULT NULL,
  `ID_Album` int(11) NOT NULL,
  PRIMARY KEY (`ID_Photo`),
  KEY `FK_Photo_ID_Album` (`ID_Album`),
  CONSTRAINT `FK_Photo_ID_Album` FOREIGN KEY (`ID_Album`) REFERENCES `Album` (`ID_Album`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `Photo` (`ID_Photo`, `URL`, `ID_Album`) VALUES
(1,	'http://i1.wp.com/www.photos-a-la-con.fr/wp-content/uploads/2016/06/image-drole-sol.jpg?resize=600%2C482',	1),
(2,	'https://images.duckduckgo.com/iu/?u=http%3A%2F%2F2.bp.blogspot.com%2F-yLd1FCI4J9c%2FUfc3mM0QIeI%2FAAAAAAAAOao%2FG4B4TnadQZc%2Fs1600%2FMovie-Minion-Wallpaper.jpg&f=1',	1);

DROP TABLE IF EXISTS `Produit`;
CREATE TABLE `Produit` (
  `ID_Produit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `Description` text,
  `Prix` float DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Produit`)
) ENGINE=InnoDB AUTO_INCREMENT=1141 DEFAULT CHARSET=latin1;

INSERT INTO `Produit` (`ID_Produit`, `Nom`, `Description`, `Prix`, `URL`) VALUES
(1136,	'Nicolas',	'Grosse cigogne',	4,	'http://4.bp.blogspot.com/_s4kUuiviweI/S8X6KOLIc_I/AAAAAAAAFcQ/m-2KaxZ8hIo/s1600/cigueña2.jpg'),
(1137,	'Alexis',	'Grosse cigogne',	4,	'http://4.bp.blogspot.com/_s4kUuiviweI/S8X6KOLIc_I/AAAAAAAAFcQ/m-2KaxZ8hIo/s1600/cigue%C3%B1a2.jpg'),
(1139,	'Le sol',	'Gratuit avec -50%',	-500,	'http://i1.wp.com/www.photos-a-la-con.fr/wp-content/uploads/2016/06/image-drole-sol.jpg?resize=600,48200%2C482'),
(1140,	'Clement',	'Grosse cigogne',	4,	'http://4.bp.blogspot.com/_s4kUuiviweI/S8X6KOLIc_I/AAAAAAAAFcQ/m-2KaxZ8hIo/s1600/cigueña2.jpg');

-- 2017-04-19 08:44:18
