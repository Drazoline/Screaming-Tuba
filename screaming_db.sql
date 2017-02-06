-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 03:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `screaming_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL,
  `text` varchar(30) NOT NULL,
  `timestamp` date NOT NULL,
  `id_file` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_file` (`id_file`),
  KEY `fk_user` (`id_user`),
  KEY `id_file` (`id_file`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL,
  `data` longblob NOT NULL,
  `times_played` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `timestamp` date NOT NULL,
  `visibility` enum('PUBLIC','PRIVATE','GROUP') NOT NULL DEFAULT 'PRIVATE',
  PRIMARY KEY (`id_file`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `id_folder` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`id_folder`),
  KEY `id_file` (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder_file`
--

CREATE TABLE IF NOT EXISTS `folder_file` (
  `id_folder_file` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `timestamp` date NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`id_folder_file`),
  KEY `id_folder` (`id_folder`,`id_file`),
  KEY `id_file` (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id_group` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_owner` int(11) NOT NULL,
  PRIMARY KEY (`id_group`),
  KEY `fk_file` (`id_file`),
  KEY `fk_owner` (`id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE IF NOT EXISTS `group_user` (
  `id_group_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_group_user`),
  KEY `id_group` (`id_group`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id_permission` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perm_group_user`
--

CREATE TABLE IF NOT EXISTS `perm_group_user` (
  `id_perm_group_user` int(11) NOT NULL,
  `id_perm` int(11) NOT NULL,
  `id_group_user` int(11) NOT NULL,
  PRIMARY KEY (`id_perm_group_user`),
  KEY `id_perm` (`id_perm`,`id_group_user`),
  KEY `id_group` (`id_group_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id_subscription` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  PRIMARY KEY (`id_subscription`),
  KEY `id_owner` (`id_owner`,`id_target`),
  KEY `id_target` (`id_target`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_image` blob,
  `subscription` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `subscription` (`subscription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_file_like`
--

CREATE TABLE IF NOT EXISTS `user_file_like` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_user` (`id_user`,`id_file`),
  KEY `id_file` (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `file` (`id_file`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `folder_file`
--
ALTER TABLE `folder_file`
  ADD CONSTRAINT `folder_file_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `file` (`id_file`),
  ADD CONSTRAINT `folder_file_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folder` (`id_folder`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `file` (`id_file`),
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`),
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `perm_group_user`
--
ALTER TABLE `perm_group_user`
  ADD CONSTRAINT `perm_group_user_ibfk_1` FOREIGN KEY (`id_perm`) REFERENCES `permission` (`id_permission`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_file_like`
--
ALTER TABLE `user_file_like`
  ADD CONSTRAINT `user_file_like_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `user_file_like_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `file` (`id_file`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
