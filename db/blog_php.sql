-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 juin 2019 à 16:03
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_commentaire`
--

DROP TABLE IF EXISTS `blogphp_commentaire`;
CREATE TABLE IF NOT EXISTS `blogphp_commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(5000) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blogphp_commentaire_blogphp_membres1_idx` (`author`),
  KEY `fk_blogphp_commentaire_blogphp_posts1_idx` (`postid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_commentaire`
--

INSERT INTO `blogphp_commentaire` (`id`, `text`, `comment_date`, `approved`, `author`, `postid`) VALUES
(2, 'Super interessant, j\'ai hate de tester', '2019-06-11 00:00:00', 1, 3, 4),
(3, 'Top', '2019-06-03 11:15:15', 0, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_membres`
--

DROP TABLE IF EXISTS `blogphp_membres`;
CREATE TABLE IF NOT EXISTS `blogphp_membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `datesub` date DEFAULT NULL,
  `grade` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_membres`
--

INSERT INTO `blogphp_membres` (`id`, `pseudo`, `pass`, `email`, `datesub`, `grade`) VALUES
(1, 'maxime', '$2y$10$KdnY030rqlIDgJojJ/Kxj.UtdC/XgTfxAcC9ABzb3bjucuPd3CfqO', 'jlks@skald.de', '2019-06-05', 1),
(2, 'pierre', '$2y$10$/NIL05PZtbOGPRWnqlmZ/.wRpkr8QzIUSpqfw9LHBJZdWTmUCHQnW', 'pierre@dfsd.fr', '2019-06-11', 2),
(3, 'ugo', '$2y$10$UbI7BTdi89XpFQSpIui05OdghjmsnVYnqaQZKf71wHXULH/Y3GzYq', 'ugo@fdsfsd.fr', '2019-06-04', 2);

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_posts`
--

DROP TABLE IF EXISTS `blogphp_posts`;
CREATE TABLE IF NOT EXISTS `blogphp_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `authorpost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blogphp_posts_blogphp_membres1_idx` (`authorpost`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_posts`
--

INSERT INTO `blogphp_posts` (`id`, `title`, `content`, `date`, `authorpost`) VALUES
(2, 'Où trouver des thèses et autres papiers scientifiques pour vos recherches ?', 'Si vous vous passionnez pour un sujet et que vous souhaitez l’approfondir, ce que vous allez faire naturellement c’est d’acheter quelques bouquins, de regarder des vidéos en ligne, voire de suivre une petite formation ou essayer de rencontrer des gens passionnés par le même sujet.', '2019-06-24 17:01:44', 1),
(3, 'Le Chili prépare la COP 25 en abandonnant le charbon', 'En novembre 2019, le Chili accueillera la COP 25. Un choix logique puisque le pays d’Amérique du Sud est engagé dans une ambitieuse stratégie de transition énergétique. Il vise en effet la sortie du charbon d’ici 2040, alors que cette ressource assure encore 40% de son mix électrique. Dans cette optique, une étape cruciale vient d’être franchie. Le Chili a annoncé, le 4 juin 2019, son intention de fermer huit centrales à charbon d’ici 2024. Une décision courageuse pour un pays en pleine croissance, mais qui ne semble pas satisfaire certaines ONG…', '2019-06-19 15:39:54', 2),
(4, 'La France est le premier pays européen à interdire la voiture à essence', 'Lundi 3 juin 2019, Elisabeth Borne, la ministre des Transports, a présenté devant l’Assemblée nationale le projet de loi mobilités. La future loi d’orientation doit promouvoir les alternatives à la voiture à essence. En effet, elle prépare l’interdiction totale de la vente des voitures thermiques en France…\r\n', '2019-06-19 15:40:30', 2),
(5, '11 millions d’emplois dans le monde grâce aux énergies renouvelables', 'L’Agence internationale pour les énergies renouvelables (Irena) a publié ce jeudi 13 juin 2019 un communiqué particulièrement intéressant. Celui-ci fait état d’une forte création d’emplois dans le domaine des énergies renouvelables. Désormais 11 millions de personnes à travers le monde travaillent dans ce secteur, et 700 000 nouveaux emplois ont été créés en 2018. Un record historique très positif malgré un rythme de développement des EnR moins élevé l’année dernière. L’Asie est le premier bénéficiaire de ces emplois…\r\n', '2019-06-19 15:41:30', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blogphp_commentaire`
--
ALTER TABLE `blogphp_commentaire`
  ADD CONSTRAINT `fk_blogphp_commentaire_blogphp_membres1` FOREIGN KEY (`author`) REFERENCES `blogphp_membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_blogphp_commentaire_blogphp_posts1` FOREIGN KEY (`postid`) REFERENCES `blogphp_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `blogphp_posts`
--
ALTER TABLE `blogphp_posts`
  ADD CONSTRAINT `fk_blogphp_posts_blogphp_membres1` FOREIGN KEY (`authorpost`) REFERENCES `blogphp_membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
