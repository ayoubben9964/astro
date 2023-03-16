-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 15 mars 2023 à 16:49
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `astronomie`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `titre` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`titre`, `contenu`, `image_url`, `id_utilisateur`, `created_at`) VALUES
('La découverte de nouvelles planètes dans notre galaxie', 'Des astronomes ont découvert de nouvelles planètes dans notre galaxie grâce à des télescopes de pointe. Découvrez ces nouvelles trouvailles.', 'https://example.com/images/planets.jpg', 1, '2023-03-14 12:00:00'),
('La mission Mars 2024', 'La mission Mars 2024 prévoit d\'envoyer des humains sur la planète rouge pour y établir une colonie permanente. Découvrez les défis que représente cette mission.', 'https://example.com/images/mars.jpg', 2, '2023-03-12 09:15:00'),
('La naissance des étoiles', 'Les étoiles naissent de nuages de gaz et de poussière dans notre galaxie. Découvrez comment ce processus se déroule.', 'https://example.com/images/stars.jpg', 3, '2023-03-10 16:30:00'),
('Le mystère de la matière noire', 'La matière noire est une substance invisible qui compose la majorité de l\'univers. Découvrez les théories qui tentent d\'expliquer cette énigme.', 'https://example.com/images/darkmatter.jpg', 4, '2023-03-08 14:45:00'),
('Les météorites et leur impact sur la Terre', 'Les météorites sont des roches spatiales qui tombent sur Terre. Découvrez comment ces impacts ont façonné notre planète.', 'https://example.com/images/meteorites.jpg', 5, '2023-03-06 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `pwd`, `email`, `role`, `created_at`) VALUES
(1, 'Smith', 'John', 'password1', 'john.smith@example.com', 'scientifique', '2023-03-14 12:00:00'),
(2, 'Johnson', 'Emily', 'password2', 'emily.johnson@example.com', 'scientifique', '2023-03-12 09:15:00'),
(3, 'Davis', 'Michael', 'password3', 'michael.davis@example.com', 'scientifique', '2023-03-10 16:30:00'),
(4, 'Wilson', 'Ava', 'password4', 'ava.wilson@example.com', 'scientifique', '2023-03-08 14:45:00'),
(5, 'Brown', 'David', 'password5', 'david.brown@example.com', 'scientifique', '2023-03-06 11:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
