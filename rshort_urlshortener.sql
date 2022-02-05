-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 11:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rshort_urlshortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `custom` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `custom`, `level`, `status`, `time`) VALUES
(17, 'mcsegypt17@gmail.com', '$2y$10$oIxTzf1L2ob8JG/zNWKXqOcqhIBiQdEGvNDCOfUQF3mojqIR8KuJi', 'un_custom', 'great_user_admin', 'active', '1621164460'),
(22, 'rimba123@gmail.com', '$2y$10$dlqsZy8c149kS34KbZZguO55GjYm7bsaDa9SNg6E.wP5dU6Tsa80S', 'un_custom', 'user', 'active', '1625117827');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `owner_ad` varchar(100) NOT NULL,
  `title_ad` varchar(100) NOT NULL,
  `decsription` varchar(355) NOT NULL,
  `status` varchar(15) NOT NULL,
  `pict` varchar(255) NOT NULL,
  `time_session` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `message`, `waktu`) VALUES
(1, 'rimba dirgantara', 'rimba@gmail.com', 'Testing', 'hanya testing', '1620299250'),
(2, 'Rimba Dirgantara', 'masterroosevelt17@gm', '***** for your website', 'Hi Dev, i like your web\r\nIts very help me to work', '1620895455');

-- --------------------------------------------------------

--
-- Table structure for table `link_free`
--

CREATE TABLE `link_free` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `link` varchar(5000) NOT NULL,
  `short_link` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `pkg` varchar(20) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link_free`
--

INSERT INTO `link_free` (`id`, `nama`, `link`, `short_link`, `status`, `pkg`, `waktu`) VALUES
(77, 'free', 'asdfgjk.com', 'F3gE', 'un_custom', '', '1621044841'),
(78, 'rimba123@gmail.com', 'asdfgjk.com', 'xQat', 'un_custom', '', '1621044855'),
(79, 'rimba123@gmail.com', 'asdfgjk.com', 'Roh6', 'un_custom', '', '1621044870'),
(88, 'rimbabeatbox01@gmail', 'facebook.com', 'fb', 'custom_link', '1_month', '1625103284'),
(89, 'rimba123@gmail.com', 'thelongestdomainnameintheworldandthensomeandthensomemoreandmore.com/', 'Qv1w', 'un_custom', '', '1625119335'),
(90, 'free', 'www.abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz.com', 'OZPH', 'un_custom', '', '1625128757');

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `status` varchar(25) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`, `status`, `time`) VALUES
(32, 'mcsegypt17@gmail.com', '8cW1kBJqDP0JzdBQyTG5Bgc4yDvVArQPTp6BcNghHZ0=', 'forget password', '1625048430'),
(33, 'mcsegypt17@gmail.com', 'd0ONs1PyDDidFctR1506yR/chKtImpvB3Vz6uzac9Dk=', 'forget password', '1625048433'),
(34, 'mcsegypt17@gmail.com', '1zjT15Elb3NVj9sygEJNFe7bsAl/xZyKBKdx3Pf+Qtc=', 'forget password', '1625048436');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_free`
--
ALTER TABLE `link_free`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `link_free`
--
ALTER TABLE `link_free`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
