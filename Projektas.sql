-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2022 at 05:48 AM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Projektas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Marsrutas`
--

CREATE TABLE `Marsrutas` (
  `IsvykimoData` date NOT NULL,
  `Periodinis` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `PradinisTaskasId` int(11) NOT NULL,
  `GalinisTaskasId` int(11) NOT NULL,
  `VezejasId` int(11) NOT NULL,
  `Svoris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Marsrutas`
--

INSERT INTO `Marsrutas` (`IsvykimoData`, `Periodinis`, `id`, `PradinisTaskasId`, `GalinisTaskasId`, `VezejasId`, `Svoris`) VALUES
('2022-12-24', 0, 3, 2, 3, 2, 50),
('2023-01-28', 1, 4, 5, 4, 2, 30),
('2022-12-22', 1, 5, 3, 2, 13, 10),
('2022-12-23', 1, 6, 4, 5, 14, 15),
('2022-12-23', 1, 7, 4, 5, 13, 15),
('2023-01-07', 0, 8, 6, 4, 13, 10),
('2022-12-22', 0, 9, 6, 3, 13, 15),
('2022-12-31', 1, 10, 3, 2, 14, 50),
('2022-12-22', 1, 11, 2, 1, 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Miestas`
--

CREATE TABLE `Miestas` (
  `Pavadinimas` varchar(20) NOT NULL,
  `KoordinateLon` decimal(10,7) NOT NULL,
  `KoordinateLat` decimal(10,7) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Miestas`
--

INSERT INTO `Miestas` (`Pavadinimas`, `KoordinateLon`, `KoordinateLat`, `id`) VALUES
('Alytus', '54.3963500', '24.0414200', 1),
('Kaunas', '54.8985210', '23.9035970', 2),
('Klaipėda', '55.7032970', '21.1442790', 3),
('Mariampolė', '54.5578120', '23.3498124', 4),
('Mažeikiai', '56.3166700', '22.3333300', 5),
('Panevežys', '55.7333300', '24.3500000', 6),
('Šiauliai', '55.9333300', '23.3166700', 7),
('Vilnius', '54.6871570', '25.2796520', 8);

-- --------------------------------------------------------

--
-- Table structure for table `RegistracijaMarsrutui`
--

CREATE TABLE `RegistracijaMarsrutui` (
  `BagazoSvoris` float NOT NULL,
  `RegistracijosData` date NOT NULL,
  `PakeleivisId` int(11) NOT NULL,
  `MarsrutoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RegistracijaMarsrutui`
--

INSERT INTO `RegistracijaMarsrutui` (`BagazoSvoris`, `RegistracijosData`, `PakeleivisId`, `MarsrutoId`) VALUES
(3, '2022-12-21', 15, 3),
(10, '2022-12-21', 15, 8),
(2, '2022-12-21', 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `RegistruotasNaudotojas`
--

CREATE TABLE `RegistruotasNaudotojas` (
  `RegistracijosData` date NOT NULL,
  `Vardas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Pavarde` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Aktyvus` tinyint(1) NOT NULL,
  `PrisijungimoVardas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `SifrSlaptazodis` varchar(100) CHARACTER SET latin1 NOT NULL,
  `TelNumeris` varchar(14) CHARACTER SET latin1 NOT NULL,
  `Epastas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Role` int(2) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RegistruotasNaudotojas`
--

INSERT INTO `RegistruotasNaudotojas` (`RegistracijosData`, `Vardas`, `Pavarde`, `Aktyvus`, `PrisijungimoVardas`, `SifrSlaptazodis`, `TelNumeris`, `Epastas`, `Role`, `uid`) VALUES
('2022-11-24', 'Jonas', 'Petrauskas', 1, 'vezejas', '$2y$10$QG93xSG9PyXcSxRm.0WCzuWFjI1k927yv4u8JxycAdzhpzNo/FWue', '123', 'test@test.com', 2, 2),
('2022-11-27', 'Tomas', 'Jankauskas', 0, 'pakeleivis', '$2y$10$QG93xSG9PyXcSxRm.0WCzuWFjI1k927yv4u8JxycAdzhpzNo/FWue', '+37062694780', '123@123.com', 2, 12),
('2022-12-20', 'Danas', 'Kesintis', 0, 'ssss', '$2y$10$9z3AhDashOUuuwvXfz1SreV9M4gO/hd5nSnXILz5ox.2hqqT4HVLi', '+37062694780', '123@123.com', 2, 13),
('2022-12-21', 'Justas', 'Pranauskis', 0, 'Justas', '$2y$10$hYDh5xuNvPO4h4Ky3ZM80e9tDmJ8Z5Bt0FIAAfBxOp5ZgINVMJske', '+37062694780', 'test123@test.com', 2, 14),
('2022-12-21', 'Pakeleivis', 'Pakeleivis', 0, 'Pakeleivis1', '$2y$10$cqhgu0g7wjWp7NJciNYoeeawVEXKOEtmwiNPR1l3BQjhpBa1DGI9a', '+37062694780', 'test123@test.com', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `Role` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `Role`) VALUES
(1, 'Pakeleivis'),
(2, 'Vezejas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Marsrutas`
--
ALTER TABLE `Marsrutas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PradinisTaskas` (`PradinisTaskasId`),
  ADD KEY `GalinisTaskas` (`GalinisTaskasId`),
  ADD KEY `Vezejas` (`VezejasId`);

--
-- Indexes for table `Miestas`
--
ALTER TABLE `Miestas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RegistracijaMarsrutui`
--
ALTER TABLE `RegistracijaMarsrutui`
  ADD PRIMARY KEY (`MarsrutoId`),
  ADD KEY `Pakeleivis` (`PakeleivisId`),
  ADD KEY `MarsrutoId` (`MarsrutoId`);

--
-- Indexes for table `RegistruotasNaudotojas`
--
ALTER TABLE `RegistruotasNaudotojas`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `Role` (`Role`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Marsrutas`
--
ALTER TABLE `Marsrutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Miestas`
--
ALTER TABLE `Miestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `RegistruotasNaudotojas`
--
ALTER TABLE `RegistruotasNaudotojas`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Marsrutas`
--
ALTER TABLE `Marsrutas`
  ADD CONSTRAINT `GalinisTaskas` FOREIGN KEY (`GalinisTaskasId`) REFERENCES `Miestas` (`id`),
  ADD CONSTRAINT `PradinisTaskas` FOREIGN KEY (`PradinisTaskasId`) REFERENCES `Miestas` (`id`),
  ADD CONSTRAINT `Registruojasi` FOREIGN KEY (`VezejasId`) REFERENCES `RegistruotasNaudotojas` (`uid`);

--
-- Constraints for table `RegistracijaMarsrutui`
--
ALTER TABLE `RegistracijaMarsrutui`
  ADD CONSTRAINT `RegistracijaMarsrutui_ibfk_1` FOREIGN KEY (`MarsrutoId`) REFERENCES `Marsrutas` (`id`),
  ADD CONSTRAINT `Registruoja` FOREIGN KEY (`PakeleivisId`) REFERENCES `RegistruotasNaudotojas` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
