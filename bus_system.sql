-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 01:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) DEFAULT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `telNo` varchar(32) DEFAULT NULL,
  `pwd` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `telNo`, `pwd`) VALUES
(1, 'Kwizera', 'Pacifique', 'kwizerapacifique19@gmail.com', '0784330649', '$2y$10$sw1bOlowDWbOADsjY1dr/.QY/zAt8MjA310OfHRwHnpF5hMLowC0S'),
(2, 'Ishimwe', 'Eric', 'ericish12@yahoo.com', '0785330333', '$2y$10$liWqn1tC4VCi8z.NICzu7e6EWK2pma9nTlVn1dxM32279LhTLGM2y');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `busNo` int(11) NOT NULL,
  `d_fname` varchar(32) DEFAULT NULL,
  `d_lname` varchar(32) DEFAULT NULL,
  `plackNo` varchar(6) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `line` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`busNo`, `d_fname`, `d_lname`, `plackNo`, `seats`, `line`) VALUES
(10, 'Mugwaneza', 'Sostene', 'RAA123', 29, 'RUSIZI-HUYE'),
(18, 'Kalinda', 'Claude', 'RAC119', 31, 'MUHANGA-RUHANGO'),
(23, 'Ishimwe', 'Eric', 'RAC225', 24, 'HUYE-KIGALI'),
(25, 'Ngarukiyimana', 'Sostene', 'RAC420', 32, 'KIGALI-HUYE');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telNo` varchar(32) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `u_status` varchar(8) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `email`, `telNo`, `pwd`, `u_status`, `sex`) VALUES
(1, 'Kwizera', 'Pacific', 'kwizerapacifique19@gmail.com', '0784330649', '$2y$10$tOdrfX.MkFUTg1ts2D7uSexsW6k0v.Q6HCe6ML0nH32OAoZOHGveC', 'offline', NULL),
(3, 'Ishimwe', 'Cedrick', 'ericish12@yahoo.com', '0785330333', '$2y$10$dxqdRUzLcV6nyCgX9WrJgedP2j5EjA26rK3MwtwOGWrCOazCTMO8G', 'offline', NULL),
(4, 'Kalisa', 'Claude', 'kalisa12@gmail.com', '0782130644', '$2y$10$9B4BLbS1KkGG7yj9ufbsneojHLC/mQBB/bWSqX/Fhbk9DbXapeI3i', NULL, NULL),
(6, 'Abimana', 'Aline', 'aline12@gmail.com', '0721230367', '$2y$10$j/O2RGNypX1MWiD2CC7cfOFAM5mw5fDpeJfADT/Utay2eU092x68u', 'online', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `description`, `time`) VALUES
(1, 6, 'Logged out as user Abimana Aline', '2021-08-06 00:00:41'),
(2, 6, 'Logged in as user Abimana Aline', '2021-08-06 00:01:00'),
(3, 6, 'Successfully reported a query to the administrator.', '2021-08-06 00:13:32'),
(4, 6, 'Logged out as user Abimana Aline', '2021-08-06 00:32:19'),
(12, 6, 'Logged in as user Abimana Aline', '2021-08-07 22:30:54'),
(14, 1, 'Logged in as user Kwizera Pacifique', '2021-08-21 12:49:23'),
(15, 1, 'Logged out as user Kwizera Pacifique', '2021-08-21 12:49:43'),
(16, 1, 'Logged in as user Kwizera Pacifique', '2021-08-21 14:08:21'),
(17, 1, 'Logged out as user Kwizera Pacifique', '2021-08-21 14:21:56'),
(28, 1, 'Logged in as user Kwizera Pacifique', '2021-08-22 09:50:55'),
(29, 1, 'Logged out as user Kwizera Pacifique', '2021-08-22 09:51:19'),
(32, 1, 'Logged in as user Kwizera Pacific', '2021-08-22 11:03:22'),
(33, 1, 'Logged out as user Kwizera Pacific', '2021-08-22 11:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `timeOfSubmit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `user_id`, `timeOfSubmit`) VALUES
(10, 'Response', 'Workin\' on it already, Ma\'am!', 6, '2021-08-05 22:40:48'),
(12, 'Reservation', 'Your ticket number is 13 and you will have to board bus number 23 which will be on the road HUYE-KIGALI not later than 23:45 Today. stay safe!', 6, '2021-08-05 22:53:52'),
(13, 'Query reported', 'Your query has been sent to the administrator and your will soon receive an answer.', 6, '2021-08-05 23:05:00'),
(14, 'Reservation', 'Your ticket number is 16 and you will have to board bus number 18 which will be on the road MUHANGA-RUHANGO not later than 01:00 Today. stay safe!', 6, '2021-08-05 23:26:16'),
(17, 'Reservation', 'Your ticket number is 17 and you will have to board bus number 10 which will be on the road RUSIZI-HUYE not later than 02:15 Today. stay safe!', 6, '2021-08-05 23:35:54'),
(18, 'Query reported', 'Your query has been sent to the administrator and your will soon receive an answer.', 6, '2021-08-06 00:09:09'),
(19, 'Query reported', 'Your query has been sent to the administrator and your will soon receive an answer.', 6, '2021-08-06 00:11:18'),
(20, 'Query reported', 'Your query has been sent to the administrator and your will soon receive an answer.', 6, '2021-08-06 00:13:32'),
(24, 'Reservation', 'Your ticket number is 21 and you will have to board bus number 23 which will be on the road HUYE-KIGALI not later than 13:00 Today. stay safe!', 1, '2021-08-22 09:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `prob` text NOT NULL,
  `timeOfSubmit` datetime DEFAULT NULL,
  `response` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `fname`, `lname`, `title`, `prob`, `timeOfSubmit`, `response`) VALUES
(2, 1, 'Kwizera', 'Pacifique', 'Lagging', 'Hi, your website seems to be stuttering on some low end PCs.\r\nthanks.', '2021-07-31 18:18:33', 'shut up!'),
(3, 1, 'Kwizera', 'Pacifique', 'Lost Ticket', 'Hi, I lost my ticket this afternoon and I was hoping you can get me a copy. the number was 23', '2021-08-03 08:37:54', 'Okay pacifique, we are going to recover your ticket soon.'),
(4, 1, 'Ishimwe', 'Cedrick', 'Late', 'Hey! I was supposed to leave 30min ago.....your services are the worst!!!', '2021-08-03 22:03:40', 'Hi, thanks for letting us know this we are terribly sorry about the inconvenience we\'re going to help you.'),
(5, 1, 'Kwizera', 'Pacifique', 'Updating info', 'Hi, I was hoping you could improve your system and add a way a user can update the account\'s information. thanks.', '2021-08-03 22:21:19', 'Hello pacific, thanks for reaching out we are already working on that kind of upgrade.'),
(6, 1, 'Kwizera', 'Pacifique', 'Webiste bad on mobile', 'Hi, looks like this website is not optimised for smart phone browsing, you really need to work that out!', '2021-08-03 22:48:15', 'Already workin\' on it sir!'),
(7, 1, 'Kwizera', 'Pacifique', 'Hello', 'Just saying hello!', '2021-08-05 21:06:23', 'greetings'),
(8, 6, 'Abimana', 'Aline', 'New here', 'The website is a mess on my phone', '2021-08-05 21:55:00', 'Workin\' on it already, Ma\'am!'),
(10, 6, 'Abimana', 'Aline', 'Good interface', 'Well done lads! the interface is awesome, one the best I\'ve ever interacted with.\r\nKeep it up!', '2021-08-05 23:05:00', NULL),
(13, 6, 'Abimana', 'Aline', 'Website looking good', 'You only need to add some few features and fix few bugs, keep it up lads!', '2021-08-06 00:13:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `line` varchar(32) NOT NULL,
  `depart` varchar(6) NOT NULL,
  `busNo` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `line`, `depart`, `busNo`, `date`) VALUES
(11, 1, 'HUYE-KIGALI', '22:30', 23, '2021-08-03'),
(12, 1, 'HUYE-KIGALI', '23:45', 23, '2021-08-03'),
(15, 6, 'HUYE-KIGALI', '23:45', 23, '2021-08-05'),
(16, 6, 'MUHANGA-RUHANGO', '01:00', 18, '2021-08-05'),
(19, 6, 'RUSIZI-HUYE', '02:15', 10, '2021-08-05'),
(21, 1, 'HUYE-KIGALI', '13:00', 23, '2021-08-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`busNo`),
  ADD UNIQUE KEY `plackNo` (`plackNo`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `busNo` (`busNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`busNo`) REFERENCES `buses` (`busNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
