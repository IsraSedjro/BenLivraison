-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 avr. 2023 à 08:16
-- Version du serveur :  8.0.32-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ben_livraison`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `email` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb3_swedish_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8mb3_swedish_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT (now()),
  `balance_portefeuille` double NOT NULL DEFAULT '0',
  `password` varchar(500) COLLATE utf8mb3_swedish_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT (1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`email`, `lastname`, `firstname`, `gender`, `telephone`, `address`, `date_joined`, `balance_portefeuille`, `password`, `role`, `is_active`) VALUES
('baba@gmail.com', 'Baba', 'Baba', 'Masculin', '34353637', 'Chez lui', '2023-04-03 17:30:45', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 1),
('yao@gmail.com', 'Yao', 'Yao', 'Féminin', '45678908', 'dfghjkLmùMlk', '2023-04-08 22:25:47', 0, '8cb2237d0679ca88db6464eac60da96345513964', 0, 1),
('you@gmail.com', 'you', 'you', 'Féminin', '32436578', 'fghjkl', '2023-04-05 13:43:32', 0, '8cb2237d0679ca88db6464eac60da96345513964', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comment` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `note` double DEFAULT NULL,
  `id_offre` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `num_livraison` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT (now()),
  `status` varchar(255) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_swedish_ci NOT NULL,
  `recovery_place` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `recovery_phone` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `delivery_place` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `delivery_phone` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `execution_date` datetime NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `id_livreur` int NOT NULL,
  `identity_piece` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `ifu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `residence_proof` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `type_identity_piece` varchar(30) COLLATE utf8mb3_swedish_ci NOT NULL,
  `num_residence_proof` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `num_ifu` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `num_identity_piece` text COLLATE utf8mb3_swedish_ci NOT NULL,
  `expiration_date_piece` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `amount` double NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `reception_key` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `delivery_key` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `id_livreur` int NOT NULL,
  `num_livraison` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `num_transaction` int NOT NULL,
  `description` text COLLATE utf8mb3_swedish_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `date_transaction` datetime NOT NULL DEFAULT (now()),
  `amount` double NOT NULL,
  `reference` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `sender_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `receiver_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `client_commentaire` (`email`),
  ADD KEY `offre_commentaire` (`id_offre`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`num_livraison`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id_livreur`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `offre_livreur` (`id_livreur`),
  ADD KEY `num_livraison` (`num_livraison`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`num_transaction`),
  ADD KEY `client_transaction` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `num_livraison` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id_livreur` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `num_transaction` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `client_commentaire` FOREIGN KEY (`email`) REFERENCES `client` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_commentaire` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`email`) REFERENCES `client` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`num_livraison`) REFERENCES `livraison` (`num_livraison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_livreur` FOREIGN KEY (`id_livreur`) REFERENCES `livreur` (`id_livreur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `client_transaction` FOREIGN KEY (`email`) REFERENCES `client` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
