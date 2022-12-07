-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2022 at 09:00 PM
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
-- Table structure for table `Automobilis`
--

CREATE TABLE `Automobilis` (
  `Marke` varchar(20) NOT NULL,
  `KuroSanaudos100km` float NOT NULL,
  `VietuSk` int(11) NOT NULL,
  `BagazoSvoris` float NOT NULL,
  `id` int(11) NOT NULL,
  `VairuotojasId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Automobilis`
--

INSERT INTO `Automobilis` (`Marke`, `KuroSanaudos100km`, `VietuSk`, `BagazoSvoris`, `id`, `VairuotojasId`) VALUES
('BMW', 10, 5, 100, 3, 2);

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
  `VezejasId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Miestas`
--

CREATE TABLE `Miestas` (
  `Pavadinimas` varchar(20) NOT NULL,
  `KoordinateLon` decimal(10,7) NOT NULL,
  `KoordinateLat` decimal(10,7) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Miestas`
--

INSERT INTO `Miestas` (`Pavadinimas`, `KoordinateLon`, `KoordinateLat`, `id`) VALUES
('Alytus', '54.3963500', '24.0414200', 1),
('Kaunas', '54.8985210', '23.9035970', 2),
('Klaipeda', '55.7032970', '21.1442790', 3),
('Mariampole', '54.5578120', '23.3498124', 4),
('Mazeikiai', '56.3166700', '22.3333300', 5),
('Panevezys', '55.7333300', '24.3500000', 6),
('Siauliai', '55.9333300', '23.3166700', 7),
('Vilnius', '54.6871570', '25.2796520', 8);

-- --------------------------------------------------------

--
-- Table structure for table `RegistracijaMarsrutui`
--

CREATE TABLE `RegistracijaMarsrutui` (
  `BagazoSvoris` float NOT NULL,
  `KeleiviuSk` int(11) NOT NULL,
  `RegistracijosData` date NOT NULL,
  `PakeleivisId` int(11) NOT NULL,
  `MarsrutoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RegistruotasNaudotojas`
--

CREATE TABLE `RegistruotasNaudotojas` (
  `RegistracijosData` date NOT NULL,
  `Vardas` varchar(20) NOT NULL,
  `Pavarde` varchar(20) NOT NULL,
  `Aktyvus` tinyint(1) NOT NULL,
  `PrisijungimoVardas` varchar(20) NOT NULL,
  `SifrSlaptazodis` varchar(100) NOT NULL,
  `TelNumeris` varchar(14) NOT NULL,
  `Epastas` varchar(20) NOT NULL,
  `Role` int(2) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RegistruotasNaudotojas`
--

INSERT INTO `RegistruotasNaudotojas` (`RegistracijosData`, `Vardas`, `Pavarde`, `Aktyvus`, `PrisijungimoVardas`, `SifrSlaptazodis`, `TelNumeris`, `Epastas`, `Role`, `uid`) VALUES
('2022-11-24', 'Jonas', 'Petrauskas', 1, 'vezejas', '$2y$10$QG93xSG9PyXcSxRm.0WCzuWFjI1k927yv4u8JxycAdzhpzNo/FWue', '123', 'test@test.com', 2, 2),
('2022-11-27', 'test', 'test', 0, 'pakeleivis', '$2y$10$QG93xSG9PyXcSxRm.0WCzuWFjI1k927yv4u8JxycAdzhpzNo/FWue', '+37062694780', '123@123.com', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `Automobilis`
--
ALTER TABLE `Automobilis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Vairuotojas` (`VairuotojasId`);

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
-- AUTO_INCREMENT for table `Automobilis`
--
ALTER TABLE `Automobilis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Marsrutas`
--
ALTER TABLE `Marsrutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Miestas`
--
ALTER TABLE `Miestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `RegistruotasNaudotojas`
--
ALTER TABLE `RegistruotasNaudotojas`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Automobilis`
--
ALTER TABLE `Automobilis`
  ADD CONSTRAINT `Vairuoja` FOREIGN KEY (`VairuotojasId`) REFERENCES `RegistruotasNaudotojas` (`uid`);

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
