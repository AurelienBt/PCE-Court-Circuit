-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 23 jan. 2020 à 20:24
-- Version du serveur :  10.3.21-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `courtCircuit`
--
CREATE DATABASE IF NOT EXISTS `courtCircuit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `courtCircuit`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'john', 'f18bd055eec95965ee175fa9badd35ae6dbeb98f');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'fruits'),
(2, 'legumes'),
(3, 'fromages'),
(4, 'charcuterie'),
(5, 'epicerie'),
(6, 'boissons');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com', 1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES
(46, 'Christian', 'Hamida', '15 Rue de la paix', '', 'Saint Etienne', '42000', '0477213145', 'chr.hamida@gmail.com'),
(47, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com'),
(48, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr'),
(49, 'Louise', 'Delaroche', '12 avenue condorcet', 'étage 2', 'Saint Priest', '45097', '0526117898', 'louise.delaroche@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, '1', 'Hamidou', 'd6ee53abcd3b045befa8af69f445fafc33f1f88b'),
(2, '2', 'Delaroche', '56a5d2bd85e6c9956d122f59f79540ee0f75e5ad');

-- --------------------------------------------------------

--
-- Structure de la table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orderitems`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) DEFAULT NULL,
  `payment_type` varchar(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `quantity`) VALUES
(1, 1, 'Poires (1kg)', 'Poires de la variété Louise Bonne, très justeuses, chair fine et parfumée. À croquer et à cuisiner en pâtisserie.', 'poire.png', 3.85, 12),
(2, 1, 'Pommes (1kg)', 'Pommes de la variété Delbard Estivale, croquante, juteuse et rafraichissante. À croquer et à utiliser pour vos desserts.', 'pomme.png', 3.25, 5),
(3, 1, 'Cassis (100g)', 'Le fruit parfait pour apporter une touche gourmande et acidulée à vos salades de fruits !', 'cassis.jpg', 2.25, 12),
(4, 1, 'Mirabelles (1kg)', 'Ces petites prunes jaunes parfumées et sucrées sont délicieuses dégustées nature ou en clafoutis. ', 'mirabelle.jpg', 3.65, 3),

(5, 2, 'Poireaux', 'Ces poireaux issus de l\'agriculture biologique pourront être utilisés dans une soupe, un gratin, une tarte et plus encore.', 'poireau.jpg', 3.25, 4),
(6, 2, 'Pommes de terre (1kg)', 'Les pommes de terre bio Monalisa ont une chair ferme très polyvalente, à cuisiner en salade, gratin, purée ou vapeur.', 'patate.jpg', 4.35, 12),
(7, 2, 'Brocolis', 'Son goût très doux et son croquant font des merveilles dans tous types de recettes salées.', 'brocoli.jpg', 4.21, 12),
(8, 2, 'Oignons', 'Son goût frais et légèrement piquant souligne la saveur des viandes, relève les salades et les légumes. Cuit, il possède une saveur plus douce.', 'oignon.jpg', 2.25, 12),

(9, 3, 'Abondance (250g)', 'L\'abondance est un fromage fabriqué à partir de lait cru, à pâte pressée demi-cuite souple et fondante. Son goût est fruité avec une pointe de noisettes', 'abondance.jpg', 6.30, 4),
(10, 3, 'Emmental (250g)', 'L\'emmental de Savoie est le plus fruité des fromages français. Sa texture est souple et il est fabriqué à partir de lait cru.', 'emmental.jpg', 6.50, 12),
(11, 3, 'Raclette au lait cru (250g)', 'C\'est un fromage à pâte pressée demi-cuite qui se mange généralement accompagnée de charcuterie et de pommes de terre.', 'raclette.jpg', 3.25, 12),
(12, 3, 'Tomme de chèvre Maurienne (250g)', 'Son goût de chèvre est très prononcé, accompagné de notes fruitées et une pointe de noisette.', 'tomme.jpg', 6.50, 0),

(13, 4, 'Saucisson à l\'ail des ours (200g)', 'Le saucisson à l\'ail des ours de Savoie est fabriqué à l\'aide de viande fraîche française, de boyaux naturels et de morceaux d\'ail des ours.', 'saucissonAil.jpg', 5.90, 7),
(14, 4, 'Jambon cru de Savoie (80g)', 'Jambon cru affiné 9 mois fabriqué dans le respect des traditions en Savoie. La viande de porc est exclusivement française.', 'jambonCru.jpg', 2.40, 4),
(15, 4, 'Coppa de Savoie (50g)', 'Coppa de Haute-Savoie fabriquée dans le respect des traditions. Idéale pour accompagner tous vos apéritifs ou raclettes.', 'coppa.jpg', 1.50, 12),
(16, 4, 'Diots (150g)', 'Les diots frais sont élaborés à l\'aide de viande de porc française provenant de bêtes élevées aux grains en Savoie.', 'diots.jpg', 2.25, 12),

(17, 5, 'Biscuits aux raisins ', 'De délicieux biscuits aux raisins secs pour éveiller les sens de toute la famille, des plus petits aux plus grands !', 'biscuitRaisin.jpeg', 6.90, 2),
(18, 5, 'Cookies au pépites de chocolat', 'Cookies croquants préparés avec de l\'avoine et des pépites de chocolat fondantes.\r\nPaquet de 15 cookies', 'cookiesChocolat.jpg', 6.30, 10),
(19, 5, 'Assortiment de biscuits secs', 'Boîte de 20 biscuits composée de galettes, cookies, crêpes dentelles et sablés', 'assortimentBiscuitsSecs.jpg', 12.90, 0),
(20, 5, 'Biscuits de Noël', 'De doux biscuits de Noël à la cannelle, au chocolat, et sablés pour assurer de belles et uniques fêtes de Noël', 'biscuitNoel.png', 10.50, 3),

(21, 6, 'Jus de pommes', 'Pommes issues d\'agricultures biologiques.\r\nBouteille d\'un litre dans une bouteille en verre ', 'jusPomme.jpg', 4.20, 8),
(22, 6, 'Jus de pommes myrtilles', 'Jus de pommes myrtilles issu de l\'agriculture biologique élaboré en Savoie à partir de fruits frais sans colorant ni conservateur.', 'jusPommeMyrtille.jpeg', 5.20, 8),
(23, 6, 'Jus de citron', 'Bouteille d\'un litre de jus de citron frais issus d\'agricultures responsables et biologiques', 'jusCitron.jpg', 5.20, 3),
(24, 6, 'Apremont, Vin Blanc', 'Ce vin blanc de Savoie AOP, nerveux et acidulé, est idéalement adapté à la gastronomie de montagne.', 'vinBlanc.jpg', 9.64, 18),
(25, 6, 'Sachets de thé à la canelle', '15 sachets au gout authentique de thé à la cannelle. Nouveauté chez courtCircuit ! ', 'theCannelle.jpg', 10.50, 9),
(26, 6, 'Infusion au citron', 'Paquet de 20 sachets d\'infusion au citron pour partager un moment unique avec les plus petits ou les plus grands', 'infusionCitron.jpg', 15.30, 15);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_product` int(2) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `photo_user` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_product`, `name_user`, `photo_user`, `stars`, `title`, `description`) VALUES
(1, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(1, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(2, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(2, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(3, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(3, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(4, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(4, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(5, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(5, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(6, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(6, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(7, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(7, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(8, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(8, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(9, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(9, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(10, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(10, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(11, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(11, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(12, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(12, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(13, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(13, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(14, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(14, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(15, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(15, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(16, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(16, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(17, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(17, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(18, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(18, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(19, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(19, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(20, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(20, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(21, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(21, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(22, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(22, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(23, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(23, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(24, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(24, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(25, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(25, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(26, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop bon '),
(26, 'Michelle', 'femme.png', 3, 'super', 'cool');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `review/product` (`id_product`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review/product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
