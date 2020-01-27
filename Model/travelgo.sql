-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 29 juin 2019 à 12:58
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `travelgo`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `libelle` longtext NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `fax` varchar(8) NOT NULL,
  `mat_fiscale` int(10) NOT NULL,
  `num_aff_cnss` int(10) NOT NULL,
  `nbr_voiture` int(11) NOT NULL,
  `id_agent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `nom`, `libelle`, `adresse`, `telephone`, `fax`, `mat_fiscale`, `num_aff_cnss`, `nbr_voiture`, `id_agent`) VALUES
(1, 'Anouar rent a car', 'Anouar Rent A Car est l’une des premières agences de location de voiture en Tunisie, avec plus de 20 ans sur le marché Tunisien, notre agence s’est forgé une forte notoriété autour de la location voiture  Si vous désirez louer une voiture pour vos vacances en Tunisie, nous mettons à votre service des véhicules de toutes les marques et les tailles avec des points de dépôt à L’aéroport et en villes.', '35 Avenue de Madrid، Tunis 1001', '98 327 596', '', 0, 0, 20, 8),
(2, 'Energy-rentacar | Location voiture en Tunisie', 'Energy-RentaCar, agence de location de voitures en tunisie, vous propose ses services ainsi que ses voitures récentes et trés bien entretenues à des prix compétitif, pour vos vacances en tunisie en toute sérénité et confort.\r\n\r\nDécouvrez les offres de location de véhicules de tourisme en tunisie. Nos tarifs sont attractifs et dégressifs selon la durée, à partir de 14€/jour. Avec possibilité de livraison du véhicule à l\'aéroport, l\'hôtels et les ports. Location véhicule en tunisie à bas prix Quel que soit votre besoin, pour votre location de véhicule en tunisie, Energy-RentaCar vous propose toujours un large parc de véhicules adaptés aux différents budgets et besoins.\r\nPour vos location courte ou longue durée, on vous propose des voitures récentes à prix préferentiel. Notre équipe répondra à toutes vos questions rapidement, demandez un devis sur notre site en quelques clics. Réservation d\'une voiture de location en ligne\r\nréserver une automobile à votre gré sur le site de l\'agence de location de voiture Energy-rentaCar.com \r\nn’hésitez pas de demander un devis gratuit en ligne, Energy-rentaCar peut vous apporter une réponse réactive, professionnelle et de qualité. Commencez dès maintenant de consulter le site internet et compléter le formulaire et calculer le montant à payer on consultant un devis en ligne immédiat.', 'itures à Ariana, TunBloc 65, Rue Abderrahmen Ibn A', '71 236 937', '', 0, 0, 200, 8),
(3, 'Location voitures RENTPOINT\r\n', 'Que vous souhaitiez visiter la Tunisie, de Bizerte à Tataouine ou que vous ayez besoin d\'une location voiture tunisie pour vos déplacements professionnels , personnels ,et touristiques . optez pour la location de voiture serie noir en tunisie. Avec rentpoint .tn, vous êtes assuré d\'avoir un véhicule à disposition dans la ville de votre choix, à Bizerte, Tabarka, Tunis, Hammamet, Nabeul, Sousse, Monastir , Mehdia ou encore le Sahara. Vous n\'aurez qu\'a choisir, parmi nos modèles de marque luxueuse, celui qui vous conviendra le mieux pour découvrir les magnifiques régions Tunisienne.  Vous serez bien surpris par nos prix location voiture tunisie imbattable ainsi que par la qualité de nos produits.   Nos prix de location voiture tunisie comprennent l\'assurance et la TVA mais nous vous proposons aussi une assurance pour vous protéger en cas d\'accident ou de vol. Facilitez-vous la vie et choisissez Rentpoint pour la location d\'une voiture en serie Noir. Notre agence de location voiutre tunisie se trouve aussi dans le ville suivant :  La marsa Hammamet Monastir Tunis', 'Avenue Du Roi Abdelaziz El Saoud, Tunis', '52 216 505', '', 0, 0, 2334, 8),
(4, 'TUNISIA RENT CAR ® : Aéroport Tunis Carthage', 'Devis de location voiture avec chauffeur en Tunisie et réservation en ligne sans prépaiement. Tunisia-Rent-Car : Agence de location de voiture en Tunisie (Location voiture aéroport Tunis Carthage , Tunis Centre ville, Gammarth, La Marsa, Megrine, Bizerte, Nabeul, , Location voiture hammamet, Zaghouan, Sousse, Monastir, Sfax, Tozeur, Aéroport Enfidha, Aéroport Djerba ) Préparez vos vacances et votre moyen de transport en Tunisie avec Tunisia-Rent-Car :Location voiture en Tunisie et réservation en ligne sans prépaiement.', 'aeroport tunis carthage, Tunis 1080', '50 222 151', '', 0, 0, 765, 12345678),
(5, 'Anouar Rent a Car', 'Aucune Formation', '35 Avenue de Madrid, Tunis 1001', '98 327 597', '', 0, 0, 467, 123456578);

-- --------------------------------------------------------

--
-- Structure de la table `agent_agence`
--

CREATE TABLE `agent_agence` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `agent_hotel`
--

CREATE TABLE `agent_hotel` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL,
  `photo` text NOT NULL,
  `titre` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `contenu` longtext NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `date_publication`, `date_modification`, `photo`, `titre`, `type`, `contenu`, `id_agent`, `id_hotel`, `id_voiture`) VALUES
(1, '2019-06-29 11:23:39', '2019-06-14 00:00:00', '', '1er enfant -6 ans Gratuit', 'promo', '27 DT en LS au lieu de 34 DT', 12345678, 1, 0),
(2, '2019-06-29 10:54:02', '0000-00-00 00:00:00', '', 'Distination travel', 'News', 'VOUS VOULEZ SUPPORTER L\'EQUIPE NATIONALE A LA CAN 2019 ET PROFITER POUR VISITER CE BEAU PAYS QUI EST L\'EGYPTE NOUS ORGANISONS UN SÉJOUR DE 15 NUITS / 16 JOURS DU 26 JUIN AU 11 JUILLET ENTRE LE CAIRE ET CHARM EL CHEIKH EN HÔTELS 5 ETOILES \r\nPOUR PLUS DE RENSEIGNEMENTS CONTACTEZ NOUS AU:\r\n05 35 62 14 02 / 06 OU 05 24 42 00 11 / 15', 12345678, 0, 0),
(3, '2019-06-29 11:29:59', '0000-00-00 00:00:00', '1.jpg', 'Promotion 30%', 'Nouvelle', 'Le premiere location 30%', 12345678, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique`
--

CREATE TABLE `caracteristique` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `libelle` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristique`
--

INSERT INTO `caracteristique` (`id`, `type`, `libelle`) VALUES
(1, 'Suite Senior', 'Une grande suite avec deux chambres séparées et un salon.'),
(2, 'Suites Junior', 'De petites suites pleines de charme.'),
(3, 'Chambres Single', 'Petites chambres pour une personne.');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `nombre` int(11) NOT NULL,
  `prix` float NOT NULL,
  `photo` text NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_caracteristique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `description`, `nombre`, `prix`, `photo`, `id_hotel`, `id_caracteristique`) VALUES
(1, 'un véritable petit appartement composé d\'une chambre à deux lits jumeaux, d\'une petite chambre à lits superposés, d\'un salon avec ses fauteuils en cuir et d\'une luxueuse salle de bains en marbre vous permettant de vous ressourcer dans le luxe et le calme.', 3, 500, '38626-room-details3.jpg', 2, 2),
(2, 'petites chambres idéales pour une personne seule ou pour des enfants avec espace et confort.', 1, 287, 'room-details2.jpg', 1, 3),
(3, ' petites suites lumineuses situées en façade avec vue sur le golf.\r\nTV satellite - Téléphone direct - Mini-bar - Sèche-cheveux dans la salle de bain - Baignoire et douche', 2, 298, 'room-details3.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `ncin` varchar(8) NOT NULL,
  `photo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `sexe` set('Homme','Femme') NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `etat` set('Actif','Bloquée') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `ncin`, `photo`, `nom`, `prenom`, `email`, `adresse`, `telephone`, `sexe`, `login`, `mdp`, `etat`) VALUES
(1, '', '', 'Abidi', 'Amani', '', '', '', '', '', '', ''),
(8, '87654321', '87734-01.jpg', 'Abidi', 'Amani', 'amaniabidi@gmail.com', 'Jendouba,Hwaylia', '57776769', 'Femme', 'amani', 'amani', ''),
(12345678, '', '81090-03.jpg', 'Abidi', 'Amani', 'amaniabidi@gmail.com', '', '8874987', 'Femme', '', '', ''),
(12345679, '', '', 'Amani', 'Abidi', 'amaniabidi@gmail.com', '', '', '', '', 'lkjkddiuhcf', '');

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `image` text NOT NULL,
  `libelle` longtext NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `categorie` varchar(10) NOT NULL,
  `nbr_chambre` int(11) NOT NULL,
  `nbr_personne` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `nom`, `image`, `libelle`, `adresse`, `telephone`, `categorie`, `nbr_chambre`, `nbr_personne`, `id_agent`) VALUES
(1, 'Hotel Menara', '10072-room8.jpg', 'L\'hôtel Menara est situé en plein cœur de la partie sud de la station balnéaire d\'Hammamet.\r\n\r\nLes chambres climatisées sont confortables et offrent une vue sur la piscine ou le jardin.\r\n\r\nL\'hôtel Menara propose de nombreuses installations telles qu\'une piscine intérieure, 2 piscines extérieures, un centre de bien-être, un court de tennis, une discothèque et un minigolf. Vous pourrez par ailleurs vous rendre à la plage à pied.\r\n\r\nL\'établissement organise des activités pour les adultes et les enfants. Les animations et les activités sont assurées tout au long de l\'année et tout est mis en œuvre pour rendre votre séjour agréable.\r\n\r\nNous parlons votre langue !', 'Avenue De La Paix Bp 57, 8050 Hammamet', 78770076, '3', 236, 3, 12345678),
(2, 'La Badira - Adult Only', 'room5.jpg', 'Situé à Hammamet, l\'établissement La Badira - Adult Only possède 3 piscines extérieures et donne accès à une plage privée. Une connexion Wi-Fi est disponible gratuitement.\r\n\r\nToutes les chambres sont climatisées et disposent d\'une terrasse, d\'une télévision par satellite, d\'un minibar ainsi que d\'un coffre-fort. Leur salle de bains privative est pourvue de peignoirs. Vous pourrez profiter d\'une vue sur la mer et la piscine depuis le balcon de votre hébergement.\r\n\r\nUn petit-déjeuner buffet est servi tous les matins au restaurant Zahilah. Vous pourrez également déguster une cuisine locale au restaurant Adra.\r\n\r\nL\'établissement est doté de salles de réunion, d\'un bureau d\'excursions, d\'une bagagerie, d\'une piscine intérieure, d\'une salle de sport et de yoga ainsi que d\'un centre de spa et de bien-être proposant des soins avec des produits Thémaé.\r\n\r\nVous aurez la possibilité de pratiquer différentes activités sur place ou dans les environs, telles que le golf. Un court de tennis et un parking gratuit avec service de voiturier sont également à votre disposition.\r\n\r\nL\'hôtel se trouve à 3,4 km de la médina, 10,6 km de Yasmine Hammamet et 12 km du parcours de golf Citrus. L\'aéroport international de Tunis-Carthage est, quant à lui, situé à 73 km. Un service de navette aéroport peut être assuré sur demande.\r\n\r\nCet établissement a également été bien noté pour son excellent emplacement à Hammamet ! Les clients en sont plus satisfaits en comparaison avec d\'autres établissements dans cette ville.\r\n\r\nLes couples apprécient particulièrement l\'emplacement de cet établissement. Ils lui donnent la note de 8,9 pour un séjour à deux.\r\n\r\nCet établissement a également été bien noté pour son excellent rapport qualité/prix à Hammamet ! Les clients en ont plus pour leur argent en comparaison avec d\'autres établissements dans cette ville.\r\n\r\nNous parlons votre langue !\r\n\r\nL\'établissement La Badira - Adult Only accueille des clients Booking.com depuis le 20 oct. 2014.', ' Hammamet, 8050 Hammamet', 0, '5', 756, 8, 12345678),
(3, 'Sentido Le Sultan', 'room3.jpg', 'Doté d\'un accès direct à la plage d\'Hammamet, l\'hôtel 4 étoiles Sentido Le Sultan dispose de 2 piscines. Le centre-ville d\'Hammamet est à 3 km.\r\n\r\nAffichant une décoration de style classique, les chambres comportent la climatisation, un balcon privé, un minibar et une télévision par satellite. Leur salle de bains en marbre est munie d\'une paroi en verre.\r\n\r\nLe Restaurant Les Voiliers sert une cuisine méditerranéenne sur la terrasse. Vous pourrez déguster une cuisine fusion au Sakura. Vous trouverez également un café maure. Tous les matins, vous pourrez savourer un petit-déjeuner buffet au restaurant Le Serail. L\'hôtel Sultan possède 5 bars, dont le piano-bar Sherazade.\r\n\r\nLors de votre séjour, vous pourrez profiter d\'un spa et d\'une connexion Internet accessible dans l\'ensemble des locaux. Vous bénéficierez gratuitement d\'un service de navette vers le parcours de golf de Yasmine et le centre de plongée sous-marine PADI.\r\n\r\nUn parking privé est disponible gratuitement sur place. Vous séjournerez à 8 km de la gare de Bir Bourekba.\r\n\r\nLes couples apprécient particulièrement l\'emplacement de cet établissement. Ils lui donnent la note de 8,5 pour un séjour à deux.\r\n\r\nNous parlons votre langue !\r\n\r\nL\'établissement Sentido Le Sultan accueille des clients Booking.com depuis le 11 juin 2009.', 'Route Touristique Bp 11, 8050 Hammamet,', 0, '4', 433, 4, 89378897),
(4, 'Sentido Aziza Beach Golf & Spa - Adult Only', 'room4.jpg', 'L\'un de nos meilleurs choix pour Hammamet.\r\nSitué sur le front de mer, cet hôtel 4 étoiles est réservé aux adultes et se trouve à 3 km du centre-ville d\'Hammamet. Il dispose de 2 piscines, d\'un centre de remise en forme et d\'une réception ouverte 24h/24 faisant également office de bureau d\'excursions.\r\n\r\nLes chambres climatisées du Sentido Aziza Beach Golf & Spa sont pourvues d\'un minibar et d\'un balcon offrant une vue sur la mer. Équipées d\'une télévision à écran plat, elles comprennent également une salle de bains privative avec sèche-cheveux.\r\n\r\nLe café maure sert du thé à la menthe et organise des divertissements tels que des concerts ou des spectacles de danse du ventre. Lors de votre séjour au Sentido Aziza Beach Golf & Spa, vous pourrez déguster des spécialités tunisiennes sur la terrasse avec vue panoramique. Le petit-déjeuner est proposé tous les matins.\r\n\r\nLe spa de l\'hôtel dispense des massages sur demande. Vous pourrez en outre vous divertir en jouant au billard. Une connexion Wi-Fi gratuite est disponible dans l\'ensemble de l\'établissement.\r\n\r\nVous profiterez gratuitement du parking privé gratuit sur place et d\'une navette à destination du parcours de golf Yasmine.\r\n\r\nLes couples apprécient particulièrement l\'emplacement de cet établissement. Ils lui donnent la note de 8,1 pour un séjour à deux.\r\n\r\nCet établissement a également été bien noté pour son excellent rapport qualité/prix à Hammamet ! Les clients en ont plus pour leur argent en comparaison avec d\'autres établissements dans cette ville.\r\n\r\nNous parlons votre langue !', 'Rue Assed Ibne El Fourat - BP 218, 8050 Hammamet,', 75009990, '5', 543, 9, 89378897),
(5, 'Diar Lemdina Hotel', 'room5.jpg', 'L\'un de nos meilleurs choix pour Hammamet.\r\nSitué en plein cœur du quartier moderne de Yasmine Hammamet, l\'hôtel Diar Lemdina se trouve à seulement 300 mètres de la plage. Ce complexe 4 étoiles dispose d\'un parc à thèmes, d\'un spa, d\'un sauna et d\'une piscine.\r\n\r\nLe Diar Lemdina propose des chambres décorées dans un style tunisien traditionnel. Les chambres sont climatisées et dotées d\'un balcon, d\'une terrasse ou d\'un patio. Chaque chambre est également équipée de la télévision par câble et d\'une kitchenette.\r\n\r\nLe Lemdina possède un restaurant tunisien. Le restaurant Shéhérazade propose quant à lui des spécialités orientales et des spectacles de divertissement. Vous pourrez également apprécier diverses boissons et collations au Café Lemdina.\r\n\r\nVous pourrez aisément partir à la découverte de la médina autour de l\'établissement. Les parcours de golf de Citrus et de Yasmine se trouvent à environ 10 km.\r\n\r\nCet établissement a également été bien noté pour son excellent rapport qualité/prix à Hammamet ! Les clients en ont plus pour leur argent en comparaison avec d\'autres établissements dans cette ville.\r\n\r\nNous parlons votre langue !\r\n\r\nL\'établissement Diar Lemdina Hotel accueille des clients Booking.com depuis le 1 oct. 2009.', 'Medina Yasmine Hammamet, 8057 Hammamet', 78432456, '2', 230, 2, 12345678);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_voiture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `date_debut`, `date_fin`, `date_ajout`, `id_voiture`, `id_client`) VALUES
(1, '2019-06-17', '2019-06-30', '2019-06-10 13:00:00', 1, 1),
(6, '2019-06-13', '2019-06-13', '0000-00-00 00:00:00', 1, 1),
(7, '2019-06-21', '2019-06-13', '2019-06-29 11:12:36', 1, 1),
(8, '2019-06-14', '2019-06-21', '2019-06-29 11:35:32', 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `option_voiture`
--

CREATE TABLE `option_voiture` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `texte` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL,
  `reponse` varchar(10) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `sujet`, `texte`, `etat`, `reponse`, `date_ajout`, `id_client`) VALUES
(4, '', '', 0, '', '2019-06-29 11:02:32', 87654321),
(5, '', '', 0, '', '2019-06-29 11:07:47', 87654321),
(6, '', '', 0, '', '2019-06-29 11:08:10', 87654321),
(7, '', '', 0, '', '2019-06-29 11:08:12', 87654321),
(8, '', '', 0, '', '2019-06-29 11:08:29', 87654321),
(9, '', '', 0, '', '2019-06-29 11:08:38', 87654321),
(10, '', '', 0, '', '2019-06-29 11:08:48', 87654321),
(11, '', '', 0, '', '2019-06-29 11:08:56', 87654321),
(12, '', '', 0, '', '2019-06-29 11:09:17', 87654321),
(13, '', '', 0, '', '2019-06-29 11:09:27', 87654321),
(14, '', '', 0, '', '2019-06-29 11:09:36', 87654321),
(15, '', '', 0, '', '2019-06-29 11:09:45', 87654321),
(16, '', '', 0, '', '2019-06-29 11:10:13', 87654321),
(17, '', '', 0, '', '2019-06-29 11:10:27', 87654321),
(18, '', '', 0, '', '2019-06-29 11:11:08', 87654321),
(19, '', '', 0, '', '2019-06-29 11:11:09', 87654321),
(20, '', '', 0, '', '2019-06-29 11:11:29', 87654321),
(21, '', '', 0, '', '2019-06-29 11:11:50', 87654321),
(22, '', '', 0, '', '2019-06-29 11:12:08', 87654321),
(23, '', '', 0, '', '2019-06-29 11:12:36', 87654321),
(24, '', '', 0, '', '2019-06-29 11:18:34', 87654321),
(25, '', '', 0, '', '2019-06-29 11:19:57', 87654321),
(26, 'Sfa', 's,dlkejfioezkfjioez', 0, '', '2019-06-29 11:36:00', 87654321),
(27, 'Sfa', 's,dlkejfioezkfjioez', 0, '', '2019-06-29 11:36:00', 87654321);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `date_debut`, `date_fin`, `date_ajout`, `id_chambre`, `id_client`) VALUES
(8, '2019-06-21', '2019-06-20', '0000-00-00 00:00:00', 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `ncin` varchar(8) NOT NULL,
  `photo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sexe` set('Homme','Femme') NOT NULL,
  `raison_social` varchar(20) NOT NULL,
  `mat_fiscale` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `profil` set('agent_agence','agent_hotel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `ncin`, `photo`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `sexe`, `raison_social`, `mat_fiscale`, `login`, `mdp`, `profil`) VALUES
(8, '', '37744-02.jpg', 'Abidi', 'Amani', 'Hwailyas', '57776769', 'amaniabidi@gmail.com', 'Femme', 'JDOIEHFIUs', 'KHFIFHs', 'agence', 'agence', 'agent_agence'),
(12345, '', '', 'Abidi', 'Amani', '', '', '', '', '', '', 'administrateur', 'administrateur', ''),
(12345678, '07984394', '62936-02.jpg', 'Abidi', 'Amani', 'Hwailyas', '8874985', 'amaniabidi@gmail.com', 'Homme', 'JDOIEHFIUs', 'KHFIFHs', 'hotel', 'hotel', 'agent_hotel');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `marque` varchar(100) NOT NULL,
  `model` text NOT NULL,
  `couleur` varchar(10) NOT NULL,
  `annee` year(4) NOT NULL,
  `carburant` varchar(20) NOT NULL,
  `kilometrage` varchar(20) NOT NULL,
  `prix` float NOT NULL,
  `num_matr` int(11) NOT NULL,
  `id_agence` int(11) NOT NULL,
  `id_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `photo`, `marque`, `model`, `couleur`, `annee`, `carburant`, `kilometrage`, `prix`, `num_matr`, `id_agence`, `id_option`) VALUES
(1, '52020-4.jpg', 'Hyundai Elantra GT SPORT2', 'hhhhhhhZ', 'BlancA', 2013, 'hhhhhhA', 'hhhhhA', 2203, 12345678, 2, 0),
(2, '2.jpg', 'Hyundai Elantra GT Sport', 'hhhhhhhh', 'Blanc', 2016, 'hhhhhh', 'hhhh', 320, 243534654, 1, 1),
(3, '3.jpg', 'Hyundai Elantra GT Sport', 'hhhhhhhhhh', 'Béj', 2017, 'hhhhhhhhhh', 'hhhhhhhhh', 345, 45435467, 5, 1),
(4, '5.jpg', 'Hyundai Elantra GT Sport', 'hhhhhhh', 'Grise', 2018, 'hhhhhh', 'hhhh', 500, 545435469, 1, 1),
(5, '6.jpg', 'Hyundai Elantra GT Sport', 'HHHHHHHHHHHH', 'Noir', 2019, 'HHHHHHHHHHHHH', 'HHHHHHHHHH', 800, 478947598, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_agent`);

--
-- Index pour la table `agent_agence`
--
ALTER TABLE `agent_agence`
  ADD KEY `id` (`id`);

--
-- Index pour la table `agent_hotel`
--
ALTER TABLE `agent_hotel`
  ADD KEY `id` (`id`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agent` (`id_agent`);

--
-- Index pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_caracteristique` (`id_caracteristique`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agent` (`id_agent`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_voiture` (`id_voiture`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `option_voiture`
--
ALTER TABLE `option_voiture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chambre` (`id_chambre`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agence` (`id_agence`),
  ADD KEY `id_option` (`id_option`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345680;

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `option_voiture`
--
ALTER TABLE `option_voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345679;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
