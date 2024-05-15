-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 11:06 AM
-- Server version: 8.0.32
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projtrac_webiste`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL,
  `pt_id` int NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `first_login` int NOT NULL DEFAULT '1',
  `password` varchar(200) NOT NULL,
  `type` int NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `pt_id`, `email`, `first_login`, `password`, `type`, `date`) VALUES
(1, 1, 'biwottech@gmail.com', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(118, 2, 'denkytheka@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(119, 3, 'kkipe15@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(120, 4, 'pkorir59@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(121, 5, 'korirkipngetich@yahoo.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(122, 6, 'kiplishi@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(123, 7, 'nicholaskoskey@gmail.com', 0, '$2y$10$aKqdJ1LCKAwF7jL4FYeQ/O6V3SNV5.q7GNb04GkS3HM/gi28b.LwW', 1, '2024-02-16 09:01:31'),
(124, 8, 'neranickenterprises@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(126, 63, 'gasywip@mailinator.com', 1, '$2y$10$fDxRTp1R78147GHZNbyUzu0exo4ALMATpvpJyEd9B6QVVDGUKbcmK', 1, '2024-02-16 09:01:31'),
(127, 64, 'mynahmc1@gmail.com', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(128, 65, 'kiplish@gmail.com', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(130, 67, 'p.korir@ombudsman.go.ke', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(131, 68, 'projtrac1@gmail.com', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(132, 69, 'ecornf@gmail.com', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(133, 70, 'PEKIPP254@GMAIL.COM', 0, '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG', 1, '2024-02-16 09:01:31'),
(134, 71, 'neranickenterprise@gmail.com', 0, '$2y$10$COQJSlMu48qd1S8rA94G4O8R2TgtgYQgOB9WBlhFtiSA3X4y0vHGS', 1, '2024-02-16 09:01:31'),
(135, 72, 'mynahmc@gmail.com', 1, '$2y$10$ypfbdZYGbRo4lXu1xCYlr.tlzvgxSWaC1aOtyHpaIhMZPViS5cTPC', 1, '2024-02-16 09:01:31'),
(136, 73, 'isaacharris749@gmail.com', 0, '$2y$10$wLTSIQ3zQhptstHzqeOvR.Qg4RDpdQmj4n38jR.Ts5WT3.nC8C9vC', 1, '2024-02-16 09:01:31'),
(137, 74, 'mle88709@gmail.com', 1, '$2y$10$mW5Lgb2SSivBh9OAUW9Jc.pMgNegqfE4ogDmAF2DFK6/SQjo2ZXmi', 1, '2024-02-16 09:01:31'),
(138, 75, 'charlesfiverrwriter@gmail.com', 1, '$2y$10$ykfLSKaPSBeUwIL2PWkMYeRhbDxmKL997jU7CnK6kdLaQH1p3OnrO', 1, '2024-02-16 09:01:31'),
(139, 76, 'denkytheka2@gmail.com', 1, '$2y$10$YBIyjLraRaGbRyEn3bhaAOObDsJ9kxIsA8WnpwvQwzAaEFlJQcHKS', 1, '2024-02-16 09:01:31'),
(140, 77, 'denkytheka3@gmail.com', 1, '$2y$10$pvmNwKFKBsbGY3baA.jiy.66HLR3Uq5nmIXIZOh9o5symvENk1i5.', 1, '2024-02-16 09:01:31'),
(141, 78, 'denkytheka4@gmail.com', 0, '$2y$10$weGy7Nx2UAa5QFVXXy7F9Ojgis9gd5B1lFChmcQZSjjqGdgAolf..', 1, '2024-02-16 09:01:31'),
(142, 79, 'denkytheka@gmail.com', 1, '$2y$10$b4G77cUsmMrgOhUdSkCYtejNLo8RA9hjqbDBQ0XhF1vH9M4b2WDsa', 1, '2024-02-16 09:01:31'),
(143, 80, 'info@projtrac.co.ke', 0, '$2y$10$c9eRIWQWTKkAArzR6ORfOOHwmDIZosMAaWlgbJSSFd.5ADJDyJY6a', 1, '2024-02-16 09:01:31'),
(144, 81, 'peter.korir@projtrac.co.ke', 1, '$2y$10$kZsk4piorAQwPLU0PKyOmOBWkFSDO.nw4G6Lzw.TCtSO6fP.g/.Q6', 1, '2024-02-16 09:01:31'),
(145, 82, 'kkipe@gmail.com', 1, '$2y$10$sGdYTQv6rtXbOGM3v3ZadO7XVqzNuF9/hmRZbzlb3btupjXOCtWNW', 1, '2024-02-16 09:01:31'),
(146, 83, 'kkipe20@gmail.com', 1, '$2y$10$BdkYUniw71Ld0WNyOEqf5.3.30tCoKAnhUcAs2FNeWGOETpd/xKAe', 1, '2024-02-16 09:01:31'),
(147, 84, 'kkipe155@gmail.com', 1, '$2y$10$azC7poow9pAQSb4SZr6jTOnZrcW.5IFNZgZNn7xXSPt3XJvjOZesS', 1, '2024-02-16 09:01:31'),
(148, 85, 'pkorir50@gmail.com', 1, '$2y$10$vF/Z7fGRzc82JwknEHC2dua8jBlqSgwSJnYrtDc1lIEMHWJ8Jt6iS', 1, '2024-02-16 09:01:31'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `adm_id` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
