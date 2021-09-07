-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2021 at 09:13 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emails_database`
--

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`email_id`, `email_address`, `dt`) VALUES
(30, 'mschwartz@msn.com', '2021-09-02 05:31:28'),
(29, 'stakasa@outlook.com', '2021-09-02 05:31:25'),
(28, 'odlyzko@sbcglobal.net', '2021-09-02 05:31:22'),
(27, 'houle@aol.com', '2021-09-02 05:31:19'),
(37, 'jgwang@me.com', '2021-09-02 05:31:54'),
(155, 'inbox@inbox.lv', '2021-09-06 16:54:02'),
(156, 'tatjana@inbox.lv', '2021-09-06 16:58:03'),
(157, 'userAdmin@gmail.com', '2021-09-06 17:16:13'),
(158, 'userAdmin@gmail.com', '2021-09-07 07:05:23'),
(159, 'tatjana@inbox.lv', '2021-09-07 07:14:03'),
(160, 'userAdmin@gmail.com', '2021-09-07 08:45:40'),
(161, 'userAdmin@gmail.com', '2021-09-07 08:46:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
