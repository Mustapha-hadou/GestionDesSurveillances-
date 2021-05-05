-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 mai 2021 à 12:00
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_seviannces`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `Nom_admin` varchar(255) NOT NULL,
  `mdp_admiin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `Nom_admin`, `mdp_admiin`) VALUES
(1, 'dounia', 'mustapha');

-- --------------------------------------------------------

--
-- Structure de la table `element_module`
--

CREATE TABLE `element_module` (
  `id_element` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `id_Respo` int(11) NOT NULL,
  `id_Module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id` varchar(255) NOT NULL,
  `date_examen` date NOT NULL,
  `heure_debut` varchar(100) NOT NULL,
  `heure_fin` varchar(100) NOT NULL,
  `id_Module` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_Filliere` int(11) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`id`, `date_examen`, `heure_debut`, `heure_fin`, `id_Module`, `type`, `id_Filliere`, `semestre`, `annee`) VALUES
('2021-03-1213', '2021-03-12', '08:00', '10:00', 3, 'ds1', 1, 'semestre1', 2021),
('2021-04-06710', '2021-04-06', '16:00', '18:00', 10, 'ds1', 7, 'semestre2', 2021),
('2021-04-06811', '2021-04-06', '14:00', '16:00', 11, 'ds1', 8, 'semestre1', 2021),
('2021-04-1213', '2021-04-12', '10:00', '12:00', 3, 'ds1', 1, 'semestre1', 2021),
('2021-04-1217', '2021-04-12', '16:00', '18:00', 7, 'ds1', 1, 'semestre1', 2021),
('2021-04-1226', '2021-04-12', '10:00', '12:00', 6, 'ds1', 2, 'semestre1', 2021),
('2021-04-12811', '2021-04-12', '08:00', '10:00', 11, 'ds2', 8, 'semestre1', 2021),
('2021-04-1418', '2021-04-14', '08:00', '11:00', 8, 'ds1', 1, 'semestre1', 2021),
('2021-04-1426', '2021-04-14', '10:00', '12:00', 6, 'ds1', 2, 'semestre1', 2021),
('2021-04-1569', '2021-04-15', '08:00', '10:00', 9, 'ds1', 6, 'semestre1', 2021),
('2021-08-1217', '2021-08-12', '08:00', '10:00', 7, 'ds2', 1, 'semestre1', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `exam_prof_local`
--

CREATE TABLE `exam_prof_local` (
  `id` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_exam` varchar(255) NOT NULL,
  `id_local` int(11) NOT NULL,
  `date_exam` date NOT NULL DEFAULT current_timestamp(),
  `heureD` varchar(100) NOT NULL,
  `heureF` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exam_prof_local`
--

INSERT INTO `exam_prof_local` (`id`, `id_prof`, `id_exam`, `id_local`, `date_exam`, `heureD`, `heureF`) VALUES
(108, 2, '2021-04-1213', 1, '2021-04-12', '10:00', '12:00'),
(109, 6, '2021-04-1213', 2, '2021-04-12', '10:00', '12:00'),
(110, 5, '2021-04-1226', 3, '2021-04-12', '10:00', '12:00'),
(111, 6, '2021-08-1217', 1, '2021-08-12', '08:00', '10:00'),
(112, 3, '2021-04-12811', 2, '2021-04-12', '08:00', '10:00'),
(113, 4, '2021-04-12811', 2, '2021-04-12', '08:00', '10:00'),
(114, 6, '2021-04-12811', 3, '2021-04-12', '08:00', '10:00'),
(115, 2, '2021-04-06811', 2, '2021-04-06', '14:00', '16:00'),
(116, 6, '2021-04-06811', 2, '2021-04-06', '14:00', '16:00'),
(117, 3, '2021-04-1426', 1, '2021-04-14', '10:00', '12:00'),
(118, 3, '2021-04-1426', 2, '2021-04-14', '10:00', '12:00'),
(119, 3, '2021-04-06710', 3, '2021-04-06', '16:00', '18:00'),
(120, 4, '2021-04-06710', 3, '2021-04-06', '16:00', '18:00'),
(121, 5, '2021-04-1418', 1, '2021-04-14', '08:00', '11:00'),
(122, 6, '2021-04-1418', 2, '2021-04-14', '08:00', '11:00'),
(123, 2, '2021-04-1569', 1, '2021-04-15', '08:00', '10:00'),
(124, 3, '2021-04-1569', 1, '2021-04-15', '08:00', '10:00'),
(125, 5, '2021-04-1569', 2, '2021-04-15', '08:00', '10:00'),
(126, 2, '2021-03-1213', 1, '2021-03-12', '08:00', '10:00'),
(127, 3, '2021-03-1213', 1, '2021-03-12', '08:00', '10:00'),
(128, 5, '2021-03-1213', 2, '2021-03-12', '08:00', '10:00'),
(129, 5, '2021-04-1217', 1, '2021-04-12', '16:00', '18:00'),
(130, 6, '2021-04-1217', 1, '2021-04-12', '16:00', '18:00'),
(131, 2, '2021-04-1217', 4, '2021-04-12', '16:00', '18:00'),
(132, 4, '2021-04-1217', 4, '2021-04-12', '16:00', '18:00'),
(133, 2, '2021-04-1217', 1, '2021-04-12', '12:52', '15:53'),
(134, 3, '2021-04-1217', 1, '2021-04-12', '12:52', '15:53'),
(135, 4, '2021-04-1217', 3, '2021-04-12', '12:52', '15:53'),
(136, 5, '2021-04-1217', 3, '2021-04-12', '12:52', '15:53');

-- --------------------------------------------------------

--
-- Structure de la table `filliere`
--

CREATE TABLE `filliere` (
  `id_filliere` int(11) NOT NULL,
  `Nom_filliere` varchar(255) NOT NULL,
  `Departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filliere`
--

INSERT INTO `filliere` (`id_filliere`, `Nom_filliere`, `Departement`) VALUES
(1, '2 eme Informatique', 'informatique'),
(2, '2 eme Reseau', 'informatique'),
(4, '2 eme industriel', 'industriel'),
(5, '2 eme gpmc', 'industriel'),
(6, 'CP1', 'Cycle preparatoire'),
(7, 'CP2', 'Cycle preparatoire'),
(8, '1er informatique', 'informatique'),
(10, '1 er reseau et telecome', 'informatique'),
(11, '1 er gpmc', 'industriel');

-- --------------------------------------------------------

--
-- Structure de la table `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `Nom_local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `local`
--

INSERT INTO `local` (`id_local`, `Nom_local`) VALUES
(1, 'salle1'),
(2, 'salle2'),
(3, 'salle3'),
(4, 'Atelier1');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `Nom_Module` varchar(255) NOT NULL,
  `id_Respo` int(11) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `id_filliere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `Nom_Module`, `id_Respo`, `semestre`, `id_filliere`) VALUES
(3, 'PHP', 2, 'semestre1', 1),
(4, 'ASP', 3, 'semestre2', 1),
(6, 'CCNA2', 5, 'semestre1', 2),
(7, 'Android', 6, 'semestre1', 1),
(8, 'C#', 6, 'semestre1', 1),
(9, 'Analyse', 2, 'semestre1', 6),
(10, 'Mecanique', 4, 'semestre2', 7),
(11, 'html & css', 6, 'semestre1', 8),
(12, 'java', 6, 'semestre2', 8);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(250) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `Nom`, `Prenom`, `Email`, `Departement`) VALUES
(2, 'Mr Bouaarifi', 'Walid', 'walid@gmail.com', 'Informatique'),
(3, 'Mr ABOULIATIM', 'Younes', 'y.abouliatim@uca.ma', 'Industriel'),
(4, 'Mr ABOURRICHE ', 'Abdelkrim', 'a.abourriche@uca.ma', 'Industriel'),
(5, 'Mr AMMAR', 'Abdelghali', 'a.abourriche@uca.ma', 'Informatique'),
(6, 'Mr HEDABOU', 'Mustapha', 'm.hedabou@uca.ma', 'informatique'),
(10, 'ejrafi', 'abdellilah', 'ejrafi@gamil.com', 'Informatique'),
(11, 'Hadou', 'Muatapha', 'mustapha@gamil.com', 'Informatique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exam_prof_local`
--
ALTER TABLE `exam_prof_local`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filliere`
--
ALTER TABLE `filliere`
  ADD PRIMARY KEY (`id_filliere`);

--
-- Index pour la table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `exam_prof_local`
--
ALTER TABLE `exam_prof_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT pour la table `filliere`
--
ALTER TABLE `filliere`
  MODIFY `id_filliere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
