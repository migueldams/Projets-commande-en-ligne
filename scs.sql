-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 02:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `name_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name_categorie`) VALUES
(1, 'huile'),
(2, 'savon'),
(3, 'plastique'),
(4, 'detergent ');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` enum('en_attente','en_cours','expédiée','livrée','annulée') DEFAULT 'en_attente',
  `total` decimal(10,2) DEFAULT NULL,
  `numeros_com` int(11) NOT NULL,
  `nom_com` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_naiss` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `date_commande`, `statut`, `total`, `numeros_com`, `nom_com`, `address`, `date_naiss`) VALUES
(1, 1, '2025-05-02 07:36:15', 'en_attente', 3.00, 0, '', '', '2025-05-02'),
(49, 1, '2025-05-03 19:37:30', 'en_attente', 0.00, 0, '', '', '2025-05-03'),
(50, 1, '2025-05-03 19:38:48', 'en_attente', 0.00, 0, '', '', '2025-05-03'),
(69, 1, '2025-05-04 12:17:44', 'en_attente', 7.00, 0, '', '', '2025-05-04'),
(70, 1, '2025-05-04 12:53:16', 'en_attente', 7.00, 0, '', '', '2025-05-04'),
(71, 1, '2025-05-04 12:53:40', 'en_attente', 7.00, 0, '', '', '2025-05-04'),
(72, 1, '2025-05-04 20:42:27', 'en_attente', 7.00, 0, '', '', '2025-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `commande_details`
--

CREATE TABLE `commande_details` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix_unitaire` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande_details`
--

INSERT INTO `commande_details` (`id`, `commande_id`, `produit_id`, `quantite`, `prix_unitaire`) VALUES
(1, 1, 3, 3, 13000.00),
(14, 1, 3, 3, 5000.00),
(15, 1, 3, 3, 5000.00),
(16, 1, NULL, 2, NULL),
(18, 1, 3, 3, 5000.00),
(19, 1, 3, 3, 5000.00),
(20, 1, 3, 3, 5000.00),
(21, 1, 3, 3, 5000.00),
(22, 1, 3, 3, 5000.00),
(23, 1, 3, 3, 15000.00),
(24, 1, 3, 3, 15000.00),
(25, 1, 3, 3, 15000.00),
(26, 1, 3, 3, 15000.00),
(27, 1, 3, 3, 15000.00),
(28, 1, 3, 3, 15000.00),
(29, 1, 3, 3, 15000.00),
(30, 1, 3, 3, 15000.00),
(31, 1, 3, 3, 15000.00),
(32, 1, 3, 3, 5000.00),
(33, 1, 3, 3, 5000.00),
(34, 1, 3, 3, 5000.00),
(35, 1, 3, 3, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `date_facture` timestamp NOT NULL DEFAULT current_timestamp(),
  `montant_total` decimal(10,2) DEFAULT NULL,
  `statut_paiement` enum('en_attente','payée','échouée') DEFAULT 'en_attente',
  `mode_paiement` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id`, `commande_id`, `date_facture`, `montant_total`, `statut_paiement`, `mode_paiement`) VALUES
(1, 1, '2025-05-02 07:40:38', 39000.00, 'en_attente', 'Orange Money'),
(9, 1, '2025-05-03 19:37:30', 23000.00, 'en_attente', NULL),
(10, 1, '2025-05-03 19:38:48', 23000.00, 'en_attente', NULL),
(11, 1, '2025-05-03 19:53:42', 23000.00, 'en_attente', NULL),
(12, 1, '2025-05-03 20:06:04', 23000.00, 'en_attente', NULL),
(13, 1, '2025-05-03 20:25:38', 23000.00, 'en_attente', NULL),
(14, 1, '2025-05-03 20:25:42', 23000.00, 'en_attente', NULL),
(15, 1, '2025-05-03 20:25:45', 23000.00, 'en_attente', NULL),
(17, 1, '2025-05-04 10:29:37', 15000.00, 'en_attente', NULL),
(18, 1, '2025-05-04 10:29:44', 15000.00, 'en_attente', NULL),
(19, 1, '2025-05-04 10:29:45', 15000.00, 'en_attente', NULL),
(20, 1, '2025-05-04 10:29:47', 15000.00, 'en_attente', NULL),
(21, 1, '2025-05-04 10:32:57', 15000.00, 'en_attente', NULL),
(22, 1, '2025-05-04 10:32:58', 15000.00, 'en_attente', NULL),
(23, 1, '2025-05-04 10:32:59', 15000.00, 'en_attente', NULL),
(24, 1, '2025-05-04 10:33:40', 15000.00, 'en_attente', NULL),
(25, 1, '2025-05-04 10:34:54', 15000.00, 'en_attente', NULL),
(26, 1, '2025-05-04 12:17:44', 41000.00, 'en_attente', NULL),
(27, 1, '2025-05-04 12:53:16', 17300.00, 'en_attente', NULL),
(28, 1, '2025-05-04 12:53:40', 17300.00, 'en_attente', NULL),
(29, 1, '2025-05-04 20:42:27', 17300.00, 'en_attente', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `date_paiement` timestamp NOT NULL DEFAULT current_timestamp(),
  `montant` decimal(10,2) DEFAULT NULL,
  `methode` varchar(50) DEFAULT NULL,
  `statut` enum('réussi','échoué','en_attente') DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `facture_id`, `date_paiement`, `montant`, `methode`, `statut`) VALUES
(1, 1, '2025-05-02 07:43:53', 32000.00, 'Orange Money', 'réussi');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `date_ajout` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_utilisateur`, `id_produit`, `quantite`, `date_ajout`) VALUES
(3, 1, 7, 0, '2025-05-04 12:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT 0,
  `categorie_id` int(11) DEFAULT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom`, `description`, `prix`, `quantite`, `categorie_id`, `image`) VALUES
(3, 'huile ola pure ', 'Goût raffiné, cuisson parfaite, l’essence dorée de vos plats.\r\n\r\n', 5000.00, 100, 1, 'bg1.jpg'),
(7, 'ola plus', 'Sublime chaque bouchée d’un voile doré et savoureux.', 15000.00, 100, 1, 'olaplus.webp'),
(8, 'huile star oil', 'Nourrit votre cuisine avec une touche d’excellence authentique.\r\n', 2300.00, 100, 1, 'bg5.jpg'),
(9, 'huil bonheur', 'Secrets gustatifs, éclat doré, pour des plats inoubliables.', 12000.00, 100, 1, 'WhatsApp-Image-2024-05-17-a-12.39.14_ecd9477e-1024x765.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL CHECK (`email` is not null or `numero` is not null),
  `role` enum('admin','client') DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `numero`, `role`) VALUES
(1, 'Tchinda douanla miguel', 'douanlmiguel@gmail.com', '695410804', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `commande_details`
--
ALTER TABLE `commande_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facture_id` (`facture_id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `commande_details`
--
ALTER TABLE `commande_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `commande_details`
--
ALTER TABLE `commande_details`
  ADD CONSTRAINT `commande_details_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `commande_details_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id_produit`);

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`);

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
