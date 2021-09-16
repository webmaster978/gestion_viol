-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 11:12 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_viol`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `datenaissance` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `numtel` varchar(15) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `nom`, `postnom`, `datenaissance`, `sexe`, `numtel`, `ville`, `created_at`) VALUES
(1, 'joel', 'tsongo', '2006-02-01', 'Masculin', '099987654', 'Goma', '2021-09-02 19:54:20'),
(2, 'joel', 'tsongoiiiii', '2006-02-01', 'Masculin', '099987654', 'Goma', '2021-09-15 15:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'chris', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `numtel` varchar(15) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`id`, `nom`, `postnom`, `sexe`, `numtel`, `ville`, `created_at`) VALUES
(1, 'blaise', 'blaisencnc', 'Masculin', '099987654', 'Goma', '2021-09-14 07:28:02'),
(2, 'danny', 'dannynv', 'Masculin', '099987654', 'Goma', '2021-09-14 07:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `victime`
--

CREATE TABLE `victime` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `datenaissance` varchar(20) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `numtel` varchar(15) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victime`
--

INSERT INTO `victime` (`id`, `nom`, `postnom`, `datenaissance`, `sexe`, `numtel`, `ville`, `created_at`) VALUES
(1, 'blaisesS', 'blaiseF', '2008-01-30', 'Mascu', '099987654', 'Goma', '2021-09-14 07:20:12'),
(2, 'ble', 'blaise', '2008-01-30', 'Mascu', '099987654', 'Goma', '2021-09-13 07:41:36'),
(3, 'omar', 'blaise', '2008-01-30', 'Mascu', '099987654', 'Goma', '2021-09-13 07:38:54'),
(4, 'blaisessssss', 'blaise', '2008-01-24', 'Mascu', '099987654', 'Goma', '2021-09-14 07:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `viol`
--

CREATE TABLE `viol` (
  `id` int(11) NOT NULL,
  `datedebut` varchar(20) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `victime` varchar(50) NOT NULL,
  `suspect` varchar(50) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viol`
--

INSERT INTO `viol` (`id`, `datedebut`, `etat`, `victime`, `suspect`, `agent`, `created_at`) VALUES
(1, '2021-09-03', 'en cours', 'blaisesS', 'blaise', 'joel', '2021-09-15 08:55:10'),
(2, '2021-09-03', 'au debut', 'fanny', 'danny', 'joel', '2021-09-04 05:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `victime`
--
ALTER TABLE `victime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viol`
--
ALTER TABLE `viol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suspect`
--
ALTER TABLE `suspect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `victime`
--
ALTER TABLE `victime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viol`
--
ALTER TABLE `viol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
