-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 11:09 AM
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
-- Table structure for table `tbl_projteam2`
--

-- CREATE TABLE `tbl_projteam2` (
--   `ptid` int NOT NULL,
--   `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
--   `firstname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
--   `middlename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
--   `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
--   `title` int NOT NULL,
--   `designation` int NOT NULL,
--   `ministry` int DEFAULT NULL,
--   `department` int DEFAULT NULL,
--   `directorate` int DEFAULT NULL,
--   `role_group` int NOT NULL,
--   `levelA` int NOT NULL,
--   `levelB` int NOT NULL,
--   `levelC` int NOT NULL,
--   `floc` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'uploads/passport.jpg',
--   `filename` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
--   `ftype` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
--   `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
--   `email` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
--   `phone` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
--   `availability` int NOT NULL DEFAULT '1' COMMENT '0 is Unavailable; 1 is Available',
--   `disabled` int NOT NULL DEFAULT '0',
--   `createdby` int NOT NULL,
--   `datecreated` date NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_projteam2`
--

INSERT INTO `tbl_projteam2` (`ptid`, `fullname`, `firstname`, `middlename`, `lastname`, `title`, `designation`, `ministry`, `department`, `directorate`, `role_group`, `levelA`, `levelB`, `levelC`, `floc`, `filename`, `ftype`, `level`, `email`, `phone`, `availability`, `disabled`, `createdby`, `datecreated`) VALUES
(1, 'Evans Koech', 'Evans', 'Koech', 'Koech', 4, 1, 0, 0, 0, 4, 0, 0, 0, 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg', 'FQldlziXsAIzlbe.jpeg', 'jpeg', '6', 'biwottech@gmail.com', '0727044818', 1, 0, 1, '2022-01-16'),
(2, 'Super  Admin', 'Super ', 'Admin', 'Admin', 2, 1, 0, 0, 0, 4, 0, 0, 0, 'uploads/staff/7726_File_download 8.png', 'download 8.png', 'png', NULL, 'denkytheka@gmail.com', '+254 727 044 818', 1, 0, 4, '2022-04-21'),
(3, 'Group1 Peter', 'Group1', '', 'Peter', 5, 7, 10, 17, 44, 1, 0, 0, 0, 'uploads/staff/2905_File_download 3.jpg', 'download 3.jpg', 'jpg', NULL, 'kkipe15@gmail.com', '+1 (974) 627-3956', 1, 0, 4, '2022-04-21'),
(4, 'Peter Korir', 'Peter', 'Director', 'Korir', 3, 7, 10, 18, 41, 1, 0, 0, 0, 'uploads/staff/1196_File_download 10.jpg', 'download 10.jpg', 'jpg', '0', 'pkorir59@gmail.com', '+1 (434) 901-5837', 1, 0, 4, '2022-04-21'),
(5, 'John Doe', 'John', '', 'Doe', 5, 8, 9, 23, 38, 2, 0, 0, 0, 'uploads/staff/1452_File_download.jpg', 'download.jpg', 'jpg', NULL, 'korirkipngetich@yahoo.com', '+1 (353) 294-5142', 1, 0, 4, '2022-04-21'),
(6, 'Millicent Okonjo', 'Millicent', 'Cherono', 'Okonjo', 3, 6, 10, 18, 0, 1, 0, 0, 0, 'uploads/staff/7829_File_milicent okonjo.jpg', 'milicent okonjo.jpg', 'jpg', NULL, 'kiplishi@gmail.com', '+1 (822) 298-7736', 1, 0, 4, '2022-04-21'),
(7, 'Nick Arap Nick', 'Nick', '', 'Arap Nick', 5, 7, 15, 19, 22, 2, 0, 0, 0, 'uploads/staff/7419_File_download 4.png', 'download 4.png', 'png', NULL, 'nicholaskoskey@gmail.com', '+1 (641) 903-5245', 1, 0, 4, '2022-04-21'),
(8, 'Group2 Nick 2', 'Group2', '', 'Nick 2', 5, 7, 15, 19, 40, 2, 0, 0, 0, 'uploads/staff/7882_File_download 5.png', 'download 5.png', 'png', NULL, 'neranickenterprises@gmail.com', '+1 (598) 789-1108', 1, 0, 4, '2022-04-21'),
(61, 'Orson Farmer', 'Orson', 'Callie Glenn', 'Farmer', 5, 2, 0, 0, 0, 1, 0, 0, 0, 'uploads/staff/7050_File_cover.jpg', '7050_File_cover.jpg', 'jpg', NULL, 'wovudy@mailinator.com', '+1 (616) 254-2865', 1, 0, 4, '2022-07-20'),
(62, 'Natalie Owen', 'Natalie', 'Meredith Gallagher', 'Owen', 7, 11, 9, 23, 38, 1, 0, 0, 0, 'uploads/staff/8509_File_cover.jpg', '8509_File_cover.jpg', 'jpg', NULL, 'bizanitib@mailinator.com', '+1 (217) 335-1717', 1, 0, 4, '2022-07-20'),
(63, 'Callum Rivera', 'Callum', 'Allistair Copeland', 'Rivera', 3, 4, 0, 0, 0, 3, 0, 0, 0, 'uploads/staff/7275_File_download 13.jpg', 'download 13.jpg', 'jpg', NULL, 'gasywip@mailinator.com', '+1 (869) 341-6354', 1, 0, 4, '2022-07-20'),
(64, 'Julius Rotich', 'Julius', '', 'Rotich', 5, 6, 15, 0, 0, 2, 0, 0, 0, 'uploads/staff/4891_File_Julius-Rotich-co-roads.jpeg', 'Julius-Rotich-co-roads.jpeg', 'jpeg', '0', 'mynahmc1@gmail.com', '0722114423', 0, 0, 4, '2022-07-20'),
(65, 'Peter Korir MnE', 'Peter', '', 'Korir MnE', 2, 7, 10, 18, 42, 1, 0, 0, 0, 'uploads/staff/2846_File_avator1.png', '2846_File_avator1.png', 'png', '0', 'kiplish@gmail.com', '0722114423', 1, 0, 4, '2022-07-20'),
(67, 'Procurement Officer', 'Procurement', '', 'Officer', 5, 7, 10, 17, 43, 1, 0, 0, 0, 'uploads/staff/2626_File_download 2.jpg', 'download 2.jpg', 'jpg', '6', 'p.korir@ombudsman.go.ke', '0727044818', 1, 0, 1, '2022-01-16'),
(68, 'Simon Kemei', 'Simon', '', 'Kemei', 5, 6, 9, 23, 0, 2, 0, 0, 0, 'uploads/staff/3690_File_Mr.-Simon-Kemei-Chief-Officer-Environment-Water-Energy-and-Natural-Resources.jpg', 'Mr.-Simon-Kemei-Chief-Officer-Environment-Water-Energy-and-Natural-Resources.jpg', 'jpg', NULL, 'projtrac1@gmail.com', '0722114471', 1, 0, 4, '2022-07-23'),
(69, 'Myles Ecorn', 'Myles', '', 'Ecorn', 4, 13, 5, 6, 48, 2, 0, 0, 0, 'uploads/staff/2742_File_linked icon.jpg', 'linked icon.jpg', 'jpg', NULL, 'ecornf@gmail.com', '0722114471', 1, 0, 4, '2022-07-23'),
(70, 'Kipngetich Kippe', 'Kipngetich', '', 'Kippe', 5, 13, 10, 18, 42, 1, 0, 0, 0, 'uploads/staff/5970_File_PETER.jpg', '5970_File_PETER.jpg', 'jpg', NULL, 'PEKIPP254@GMAIL.COM', '0720941928', 1, 0, 4, '2022-08-24'),
(71, 'Officer Group3', 'Officer', 'Officer', 'Group3', 5, 13, 15, 19, 40, 2, 0, 0, 0, 'uploads/staff/6624_File_user.png', '6624_File_user.png', 'png', NULL, 'neranickenterprise@gmail.com', '+1 (598) 789-1108', 1, 0, 4, '2022-04-21'),
(72, 'Stabex  Macharia', 'Stabex ', 'M', 'Macharia', 5, 7, 5, 6, 48, 2, 0, 0, 0, 'uploads/staff/5258_File_Screenshot (1).png', '5258_File_Screenshot (1).png', 'png', NULL, 'mynahmc@gmail.com', '829920', 1, 0, 4, '2022-11-03'),
(73, 'Jonathan Bii', 'Jonathan', 'Kimeli', 'Bii', 1, 2, 0, 0, 0, 3, 0, 0, 0, 'uploads/staff/4135_File_jonathan Bii.jpg', 'jonathan Bii.jpg', 'jpg', NULL, 'isaacharris749@gmail.com', '0727044818', 1, 0, 118, '2022-11-16'),
(74, 'John  Barorot', 'John ', 'Kibet', 'Barorot', 1, 3, 0, 0, 0, 3, 0, 0, 0, 'uploads/staff/4114_File_download 17.jpeg', 'download 17.jpeg', 'jpeg', NULL, 'mle88709@gmail.com', '0727044818', 1, 0, 118, '2022-11-16'),
(75, 'Peter Chesoss', 'Peter', 'Kipruto', 'Chesoss', 5, 6, 10, 17, 0, 2, 0, 0, 0, 'uploads/staff/5450_File_Peter-Kipruto-Chesoss-Chief-Officer-Finance.jpg', '5450_File_Peter-Kipruto-Chesoss-Chief-Officer-Finance.jpg', 'jpg', NULL, 'charlesfiverrwriter@gmail.com', '0727044818', 1, 0, 118, '2022-11-17'),
(76, 'Anthony Sitienei', 'Anthony', 'Cheruiyot', 'Sitienei', 5, 5, 13, 0, 0, 2, 0, 0, 0, 'uploads/staff/1469_File_Anthony Cheruiyot Sitienei.jpg', '1469_File_Anthony Cheruiyot Sitienei.jpg', 'jpg', NULL, 'denkytheka2@gmail.com', '0727044818', 1, 0, 118, '2022-11-17'),
(77, 'Micah Rogony', 'Micah', 'Kipkosgei', 'Rogony', 7, 6, 5, 6, 0, 2, 0, 0, 0, 'uploads/staff/1447_File_Micah Kipkosgei Rogony.jpg', '1447_File_Micah Kipkosgei Rogony.jpg', 'jpg', NULL, 'denkytheka3@gmail.com', '0727044818', 1, 0, 118, '2022-11-17'),
(78, 'Abraham Serem', 'Abraham', 'Kipkemboi', 'Serem', 3, 5, 9, 0, 0, 2, 0, 0, 0, 'uploads/staff/4119_File_Mr.-Simon-Kemei-Chief-Officer-Environment-Water-Energy-and-Natural-Resources.jpg', '4119_File_Mr.-Simon-Kemei-Chief-Officer-Environment-Water-Energy-and-Natural-Resources.jpg', 'jpg', NULL, 'denkytheka4@gmail.com', '0727044818', 1, 0, 118, '2022-11-17'),
(79, 'Joseph Lagat', 'Joseph', '', 'Lagat', 4, 5, 15, 0, 0, 2, 0, 0, 0, 'uploads/staff/1982_File_eng Joseph Lagat.jpg', '1982_File_eng Joseph Lagat.jpg', 'jpg', NULL, 'denkytheka@gmail.com', '0727044818', 1, 0, 118, '2022-11-17'),
(80, 'Isa  Galgalo', 'Isa ', '', 'Galgalo', 4, 13, 9, 23, 38, 2, 0, 0, 0, 'uploads/staff/6122_File_SamplePhoto_6.jpg', '6122_File_SamplePhoto_6.jpg', 'jpg', NULL, 'info@projtrac.co.ke', '0733467811', 1, 0, 118, '2023-03-01'),
(81, 'Kule Kulenyo', 'Kule', '', 'Kulenyo', 4, 7, 9, 23, 38, 2, 0, 0, 0, 'uploads/staff/6195_File_SamplePhoto_6.jpg', '6195_File_SamplePhoto_6.jpg', 'jpg', NULL, 'peter.korir@projtrac.co.ke', '+254726136397', 1, 0, 118, '2023-03-01'),
(82, 'Myles Kimutai', 'Myles', '', 'Kimutai', 5, 7, 1, 2, 49, 2, 0, 0, 0, 'uploads/staff/6735_File_passport.jpg', '6735_File_passport.jpg', 'jpg', NULL, 'kkipe@gmail.com', '0722941928', 1, 0, 118, '2023-12-02'),
(83, 'Nathan Kiptoo', 'Nathan', '', 'Kiptoo', 5, 12, 1, 2, 49, 2, 0, 0, 0, 'uploads/staff/6824_File_Trans Nzoia1.jpg', '6824_File_Trans Nzoia1.jpg', 'jpg', NULL, 'kkipe20@gmail.com', '0733234432', 1, 0, 118, '2023-12-02'),
(84, 'Nathan  Kiptoo', 'Nathan ', '', 'Kiptoo', 2, 12, 5, 6, 48, 2, 0, 0, 0, 'uploads/staff/3933_File_passport.jpg', '3933_File_passport.jpg', 'jpg', NULL, 'kkipe155@gmail.com', '0733467810', 1, 0, 118, '2023-12-19'),
(85, 'Reuben Logong', 'Reuben', '', 'Logong', 3, 12, 9, 23, 46, 2, 0, 0, 0, 'uploads/staff/9103_File_passport.jpg', '9103_File_passport.jpg', 'jpg', NULL, 'pkorir50@gmail.com', '0733467810', 1, 0, 118, '2024-01-26')


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_projteam2`
--
-- ALTER TABLE `tbl_projteam2`
--   ADD PRIMARY KEY (`ptid`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `tbl_projteam2`
-- --
-- ALTER TABLE `tbl_projteam2`
--   MODIFY `ptid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
