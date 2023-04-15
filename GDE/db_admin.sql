-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 mars 2022 à 21:57
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `nom_dep` varchar(100) NOT NULL,
  `Nbr_Emp` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE `effectuer` (
  `id` int(11) DEFAULT NULL,
  `nom_p` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `nom_p` varchar(100) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpire`) VALUES
(8, 'Allsafe.Superuser@gmail.com', 'e6e065463bd7adad', '$2y$10$A/syT0HPJuZ/36qLctdfPeCgPYYC5sK6N.fTQXJnKqf6VEc23xkLG', '1647792563'),
(9, 'lkn@gmail.com', 'f5b1a186a593ad69', '$2y$10$ig62DXtUcKti2WbtJvDHa.6DTxkth30HYDxLaJlT71EbnnNqEnwAy', '1647792699'),
(10, 'azz@gmail.com', 'c65001bd37ec9b86', '$2y$10$vVd1kYRnk5RtGMfRwT6RC.7ko7zeXKQbUA99BbynRahr18MlG6yfe', '1647792775'),
(14, 'dkljsf@gmail.com', '46b0afc132906bf3', '$2y$10$O56Ywi5WA9UEZZYrekMPTe4LJo86oPw2QbQ4tW2fx4se34qMPuB4W', '1647792845'),
(22, 'fgd@gmail.com', '08e808aa87b7315d', '$2y$10$.LFk7Gq05qH0GfqLkCccRu8s3W8SQXGlMHYpxVUJw95QKjU2o9ujO', '1647793940'),
(28, 'elmahdi20erraji@gmail.com', '1bfa71f02b3f78bf', '$2y$10$q0zs9rlrI.Lf06URF7kP9ug4xT8q9yToli/kxKO1V9yHn1waQg52i', '1647801136'),
(29, '', '22bcaba646b43129', '$2y$10$rbJBdWb7bHXRfGNDstwXP.HCvuJrrTm4EgGPRFEfI.TctbpyuGMg2', '1647802575');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL COMMENT 'role_id',
  `role` varchar(255) DEFAULT NULL COMMENT 'role_text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `created_at`, `updated_at`, `verify_token`) VALUES
(15, 'Sanjia Akther', 'Sanjida', 'sanjida@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-12 18:32:27', '2020-03-12 18:32:27', NULL),
(16, 'Abid Ali', 'Abid', 'abid@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 3, 0, '2020-03-13 04:08:26', '2020-03-13 04:08:26', NULL),
(17, 'Abdur Rouf', 'Rouf', 'rouf@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-13 04:08:53', '2020-03-13 04:08:53', NULL),
(18, 'Maruf Jaman', 'Maruf', 'maruf@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-13 04:09:18', '2020-03-13 04:09:18', NULL),
(19, 'Humayun ', 'Munna', 'munna@gmail.com', '66c3241204bea40578eb993f41f7c4b1ab982dab', '01717090233', 1, 0, '2020-03-13 04:09:49', '2020-03-13 04:09:49', NULL),
(22, 'mehdi', 'tech', 'Mehdi@gmail.com', '9164d2887de6b2700ac8b68b00250bc8cf709093', '0651925000', 1, 0, '2022-03-10 12:01:16', '2022-03-10 12:01:16', NULL),
(23, 'Younes', 'yanny', 'younes@gmail.com', '8a8ee6cd640689bb082e1a4611fab625e2507062', '061625414', 2, 0, '2022-03-15 14:51:34', '2022-03-15 14:51:34', NULL),
(24, 'badr', 'raji', 'badr@gmail.com', '5137f07ca4d273841441206434b505f1f701007a', '0612365478', 3, 0, '2022-03-15 16:18:48', '2022-03-15 16:18:48', NULL),
(26, 'mehdi', 'test', 'elmahdi20erraji@gmail.com', 'a3933ddfbf469cb53298d83b0c59175a6daad76f', '0651925000', 1, 0, '2022-03-20 14:01:10', '2022-03-20 14:01:10', '1bb550267d7185b9264e820d135fa048');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`nom_dep`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`nom_p`);

--
-- Index pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Index pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'role_id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
