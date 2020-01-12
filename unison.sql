-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 jan. 2020 à 13:41
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `unison`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D4E6F81A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `charity`
--

DROP TABLE IF EXISTS `charity`;
CREATE TABLE IF NOT EXISTS `charity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `charity`
--

INSERT INTO `charity` (`id`, `name`, `website`, `image`) VALUES
(1, 'WWF', 'https://www.wwf.fr/', 'logo0.png'),
(2, 'Les restaurants du cœur', '#', 'logo1.png'),
(3, 'Secours populaire français', '#', 'logo2.png'),
(4, 'UNICEF', '#', 'logo3.png'),
(5, 'Action contre La Faim', '#', 'logo4.png'),
(6, 'Sea Shepherd Conservation Society', '#', 'logo5.png'),
(7, 'Croix-Rouge française', '#', 'logo6.png'),
(8, 'Médecins sans frontières', '#', 'logo7.png'),
(9, '30 Millions d\' Amis', '#', 'logo8.png'),
(10, 'Institut Pasteur', '#', 'logo9.png');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_665648E94584665A` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `product_id`, `name`, `image`) VALUES
(1, 1, 'blanc', 'blanc.jpg'),
(2, 1, 'noir', 'noir.jpg'),
(3, 2, 'Noir', 'noir.jpg'),
(4, 3, 'Jaune', 'jaune.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'Nom du produit', 3550),
(2, 'Chemise tendance', 5500),
(3, 'Contre le racisme', 8500);

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6117D13BA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_charity`
--

DROP TABLE IF EXISTS `purchase_charity`;
CREATE TABLE IF NOT EXISTS `purchase_charity` (
  `purchase_id` int(11) NOT NULL,
  `charity_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`charity_id`),
  KEY `IDX_98A77D67558FBEB9` (`purchase_id`),
  KEY `IDX_98A77D67F5C97E37` (`charity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_color`
--

DROP TABLE IF EXISTS `purchase_color`;
CREATE TABLE IF NOT EXISTS `purchase_color` (
  `purchase_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`color_id`),
  KEY `IDX_B29DCBC3558FBEB9` (`purchase_id`),
  KEY `IDX_B29DCBC37ADA1FB5` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `charity_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3B8BA7C7F5C97E37` (`charity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `text`
--

INSERT INTO `text` (`id`, `charity_id`, `description`) VALUES
(1, 1, 'On sauve des animaux!\r\n'),
(2, 2, 'L\'histoire de l\'altruisme d\'un homme qui touche le coeur de la france.\r\nUne association aussi connue pour les spectacles qu\'elle à organiser.\r\n'),
(3, 2, 'Fondé par Coluche'),
(4, 3, 'test'),
(5, 3, 'test'),
(8, 4, 'riri'),
(9, 4, 'riri'),
(10, 5, 'loulou'),
(11, 5, 'loulou'),
(12, 6, 'Fondée en 1977 par le capitaine Paul Watson, SEA SHEPHERD est l\\\'ONG de défense des océans la plus combative au monde.'),
(13, 6, 'Sea Shepherd travaille sur troix axes majeurs :'),
(14, 6, 'Dépasser la seule protestation et intervenir de manière active et non violente dans les cas d \'atteintes illégales à la vie marine et aux écosystèmes marins.'),
(15, 6, 'Exposer les abus et les pratiques non durables ou non éthiques d\' atteintes à la vie marine et à l\' intégrité des écosystèmes marins en alertant les médias et l\' opinion publique.'),
(16, 6, 'Dernier paragraphe à ajouter dans la base de données.'),
(17, 7, 'Croix rouge'),
(18, 9, 'On sauve des animaux! \r\n'),
(19, 9, 'Un repas offert tout les 15 euros, une association qui existe depuis maintenant bien longtemps.'),
(20, 10, 'Recherche contre le cancer, contre l\'Alzheimer, maladie touchant près de 900 000 personnes en France.'),
(21, 10, 'Texte à rajouter.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D6495D8BC1F8` (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `info_id`, `email`, `roles`, `password`, `firstname`, `lastname`) VALUES
(1, NULL, 'riri@roro.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dk5CNVlrVy5EcmRCT2hrLg$E1XKBp4jpeKtXJ2cwHO6lFN4PB2FSEFahdg0KcUk8OI', 'roro', 'riri'),
(2, NULL, 'riot@game.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Y0NIdXlEcUdGR3o5bUJnag$c07YLlJKSPyqk2iLt8VMxkYKbirC4cEw7CYuoLId3mE', 'dsfdsf', 'sdfds'),
(4, NULL, 'dummy@email.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ekM0ZFdhZmtNckpnVElFZw$rl5JSYlX/l0wi0bUg2XyFET9Q+8OVlow6M9eXY2LTHE', 'dummy', 'dummy'),
(5, NULL, 'test@test.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$eEZQZkNyNi95dS5ReEJ5bA$PSKQqSQo6PDUEJZtYOx2BqFTgmZfJ8xHz6af4LbeFaw', 'test', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `FK_665648E94584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `FK_6117D13BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `purchase_charity`
--
ALTER TABLE `purchase_charity`
  ADD CONSTRAINT `FK_98A77D67558FBEB9` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_98A77D67F5C97E37` FOREIGN KEY (`charity_id`) REFERENCES `charity` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `purchase_color`
--
ALTER TABLE `purchase_color`
  ADD CONSTRAINT `FK_B29DCBC3558FBEB9` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B29DCBC37ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `text`
--
ALTER TABLE `text`
  ADD CONSTRAINT `FK_3B8BA7C7F5C97E37` FOREIGN KEY (`charity_id`) REFERENCES `charity` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6495D8BC1F8` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
