-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 04:57 PM
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
USE screaming_db;
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(30) NOT NULL,
  `timestamp` date NOT NULL,
  `id_file` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_file` (`id_file`),
  KEY `fk_user` (`id_user`),
  KEY `id_file` (`id_file`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `data` longblob NOT NULL,
  `times_played` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `timestamp` date NOT NULL,
  `visibility` enum('PUBLIC','PRIVATE','GROUP') NOT NULL DEFAULT 'PRIVATE',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder_files`
--

CREATE TABLE IF NOT EXISTS `folder_files` (
  `id` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `timestamp` date NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_folder` (`id_folder`,`id_file`),
  KEY `id_file` (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder_owners`
--

CREATE TABLE IF NOT EXISTS `folder_owners` (
  `id` int(11) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_group` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_folder` (`id_folder`),
  KEY `id_group` (`id_user`),
  KEY `id_group_2` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_file` (`id_file`),
  KEY `fk_owner` (`id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE IF NOT EXISTS `group_users` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_group` (`id_group`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perm_group_users`
--

CREATE TABLE IF NOT EXISTS `perm_group_users` (
  `id` int(11) NOT NULL,
  `id_perm` int(11) NOT NULL,
  `id_group_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_perm` (`id_perm`,`id_group_user`),
  KEY `id_group` (`id_group_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_owner` (`id_owner`,`id_target`),
  KEY `id_target` (`id_target`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_image` blob,
  `subscription` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subscriptions` (`subscription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_file_likes`
--

CREATE TABLE IF NOT EXISTS `user_file_likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_file`),
  KEY `id_file` (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `folder_files`
--
ALTER TABLE `folder_files`
  ADD CONSTRAINT `folder_file_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folders` (`id`),
  ADD CONSTRAINT `folder_file_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `files` (`id`);

--
-- Constraints for table `folder_owners`
--
ALTER TABLE `folder_owners`
  ADD CONSTRAINT `folder_owner_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `folder_owner_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folders` (`id`),
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`id_owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `perm_group_users`
--
ALTER TABLE `perm_group_users`
  ADD CONSTRAINT `perm_group_user_ibfk_1` FOREIGN KEY (`id_perm`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `perm_group_user_ibfk_2` FOREIGN KEY (`id_group_user`) REFERENCES `group_users` (`id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_file_likes`
--
ALTER TABLE `user_file_likes`
  ADD CONSTRAINT `user_file_likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_file_likes_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `files` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
