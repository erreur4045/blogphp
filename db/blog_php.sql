-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 juin 2019 à 14:16
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
-- Base de données :  `testblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_commentaire`
--

DROP TABLE IF EXISTS `blogphp_commentaire`;
CREATE TABLE IF NOT EXISTS `blogphp_commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_commentaire`
--

INSERT INTO `blogphp_commentaire` (`id`, `postid`, `autor`, `text`, `comment_date`, `approved`) VALUES
(96, 54, 'pierre', 'Super interessant, j\'ai hate de tester', '2019-06-19 15:41:57', 0),
(100, 53, 'maxime', 'Oui, super nouvelle', '2019-06-19 15:44:38', 1),
(99, 53, 'jean', 'Enfin !', '2019-06-19 15:43:59', 1),
(98, 57, 'jean', 'Super', '2019-06-19 15:43:23', 0),
(97, 52, 'pierre', 'Le python c\'est la vie', '2019-06-19 15:42:20', 0);

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_membres`
--

DROP TABLE IF EXISTS `blogphp_membres`;
CREATE TABLE IF NOT EXISTS `blogphp_membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datesub` date NOT NULL,
  `grade` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_membres`
--

INSERT INTO `blogphp_membres` (`id`, `pseudo`, `pass`, `email`, `datesub`, `grade`) VALUES
(15, 'maxime', '$2y$10$KdnY030rqlIDgJojJ/Kxj.UtdC/XgTfxAcC9ABzb3bjucuPd3CfqO', 'maxime.mm@gmail.com', '2019-05-03', 1),
(24, 'jean', '$2y$10$7zw2K15wes/WzITSmIPVMu3ql1jLmf3Z/4v8ywI/5iHunqMSD/Jk6', 'mm@jean.fr', '2019-06-06', 2),
(34, 'pierre', '$2y$10$/NIL05PZtbOGPRWnqlmZ/.wRpkr8QzIUSpqfw9LHBJZdWTmUCHQnW', 'kk@ndf.fr', '2019-06-19', 2);

-- --------------------------------------------------------

--
-- Structure de la table `blogphp_posts`
--

DROP TABLE IF EXISTS `blogphp_posts`;
CREATE TABLE IF NOT EXISTS `blogphp_posts` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blogphp_posts`
--

INSERT INTO `blogphp_posts` (`number`, `title`, `content`, `date`, `author`) VALUES
(52, 'Deep learning, Hacking ethique ou coder avec Python dernières promos avant les vacances', 'Apprenez la programmation Python de manière progressive et pratique, sans aucune connaissance de base de Python.\r\n\r\nCette formation est entièrement réalisée avec la version 3.7 de Python.\r\n\r\nElle inclue les toutes dernières nouveautés du langage comme les f-string et la nouvelle syntaxe pour l’orienté objet.\r\n\r\nDans cette formation Python complète, je te montre pas à pas tout ce que tu as besoin de savoir pour tes premiers projets en Python.\r\n\r\nCette formation Udemy représente une véritable expérience de formation, telle que tu pourrais la retrouver dans un cours en présentiel.\r\n\r\nDans ce cours, il ne s’agit pas seulement de regarder des vidéos, tu vas pouvoir tester abondamment tes connaissances grâce aux nombreux quiz, exercices pratiques et examens associés à chaque vidéo théorique.\r\n\r\nPlusieurs projets te permettront également de mettre en commun plusieurs notions abordées lors des parties théoriques.', '2019-06-19 15:33:47', 'maxime'),
(54, 'Graviton : éditeur de code minimaliste et open source', 'Je viens de tester Graviton, un éditeur de code open source, et comme c’est pas tout mal je me suis dit que ça pourrait vous intéresser.\r\n\r\nL’outil est développé par Marc Espin, un développeur de 16 ans, qui nous propose une interface plutôt épurée et disponible en plusieurs langues (anglais, espagnol, italien et catalan. Le français est en cours).\r\n\r\nGraviton est déjà multiplateformes (Windows, Linux et macOS) et propose pas mal des fonctionnalités classiques que vous pouvez attendre d’un tel éditeur : autocomplétion, mise en évidence de la syntaxe, personnalisation de l’interface, split screen …', '2019-06-19 15:36:36', 'jean'),
(53, 'Où trouver des thèses et autres papiers scientifiques pour vos recherches ?', 'Si vous vous passionnez pour un sujet et que vous souhaitez l’approfondir, ce que vous allez faire naturellement c’est d’acheter quelques bouquins, de regarder des vidéos en ligne, voire de suivre une petite formation ou essayer de rencontrer des gens passionnés par le même sujet.\r\n\r\nMais il existe tout un univers de ressources sur lequel nous sommes peu à nous pencher : les papiers scientifiques et autres thèses d’étudiants / chercheurs.\r\n\r\nEn effet, dans le cadre de leurs travaux de recherche ou de leurs études, ces derniers produisent du contenu de qualité, totalement défriché avec des analyses qui sortent un peu des sentiers battus. Bref, c’est super intéressant.\r\n\r\nMais comment faire pour trouver ces ressources passionnantes ? Et bien il existe plusieurs sites les référençant. Je vous ai sélectionné ceux qui donnent un accès rapide au contenu, gratuitement.\r\nhttps://www.researchgate.net/\r\nhttps://worldwidescience.org/', '2019-06-19 15:35:30', 'maxime'),
(55, 'Dotez votre smartphone Android de plusieurs distribs Linux avec UserLand', 'UserLand n’est pas la première appli qui vous permet de faire tourner une distrib Linux sur un système Android, mais elle rend les choses beaucoup plus simples et pratiques.\r\n\r\nSimple déjà parce qu’elle permet de lancer plusieurs distributions différentes : Ubuntu, Debian, ArchLinux, Alpine OS ou encore Kali.\r\n\r\nVous choisissez celle que vous voulez et vous suivez les modules d’installation selon vos préférences. Une fois que c’est fait, l’appli téléchargera et configurera les fichiers nécessaires au démarrage des options sélectionnées.', '2019-06-19 15:37:02', 'jean'),
(56, 'Le Chili prépare la COP 25 en abandonnant le charbon', 'En novembre 2019, le Chili accueillera la COP 25. Un choix logique puisque le pays d’Amérique du Sud est engagé dans une ambitieuse stratégie de transition énergétique. Il vise en effet la sortie du charbon d’ici 2040, alors que cette ressource assure encore 40% de son mix électrique. Dans cette optique, une étape cruciale vient d’être franchie. Le Chili a annoncé, le 4 juin 2019, son intention de fermer huit centrales à charbon d’ici 2024. Une décision courageuse pour un pays en pleine croissance, mais qui ne semble pas satisfaire certaines ONG…', '2019-06-19 15:39:54', 'pierre'),
(57, 'La France est le premier pays européen à interdire la voiture à essence', 'Lundi 3 juin 2019, Elisabeth Borne, la ministre des Transports, a présenté devant l’Assemblée nationale le projet de loi mobilités. La future loi d’orientation doit promouvoir les alternatives à la voiture à essence. En effet, elle prépare l’interdiction totale de la vente des voitures thermiques en France…\r\n\r\nMoins d’émissions de CO2 pour des déplacements plus verts. Voilà le cap général que souhaite tenir le projet de loi d’orientation des mobilités. Porté par la ministre des Transports, Elisabeth Borne, est actuellement examiné à l’Assemblée nationale. Il prévoit plusieurs mesures phares pour mettre en place la mobilité durable en France d’ici à 2040. D’après Elisabeth Borne : “Cette loi vise à proposer à tous les Français des transports plus faciles, plus propres et moins coûteux.”', '2019-06-19 15:40:30', 'pierre'),
(58, '11 millions d’emplois dans le monde grâce aux énergies renouvelables', 'L’Agence internationale pour les énergies renouvelables (Irena) a publié ce jeudi 13 juin 2019 un communiqué particulièrement intéressant. Celui-ci fait état d’une forte création d’emplois dans le domaine des énergies renouvelables. Désormais 11 millions de personnes à travers le monde travaillent dans ce secteur, et 700 000 nouveaux emplois ont été créés en 2018. Un record historique très positif malgré un rythme de développement des EnR moins élevé l’année dernière. L’Asie est le premier bénéficiaire de ces emplois…\r\n\r\nLes énergies renouvelables comme créatrices d’emplois\r\nAvec la transition énergétique mondiale en cours, les énergies renouvelables ont un fort impact sur l’emploi. L’Irena a procédé à son évaluation annuelle et 2018 s’avère très positive avec un total de 11 millions d’emplois directement liés aux EnR. L’agence basée à Abu Dhabi note que « le nombre d’emplois concernés est plus haut que jamais, malgré le tassement de la croissance sur certains marchés de premier plan, notamment la Chine ». L’année 2018 a même été exceptionnelle puisque ce sont 700 000 nouveaux emplois qui ont été crées dans le monde.\r\n\r\nFrancesco La Camera, le directeur général de l’Irena indique que « les gouvernements ont aujourd’hui une vision qui déborde les objectifs climatiques ; ils s’intéressent aux énergies renouvelables car la transition vers ces dernières ouvre la porte à une croissance économique pauvre en carbone et peut créer des emplois en masse ». Autrement dit, les EnR possèdent plusieurs atouts dont la création d’emplois dans des secteurs comme l’ingénierie, le commerce et la construction d’installations.', '2019-06-19 15:41:30', 'pierre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
