-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2014 at 04:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rewards`
--
CREATE DATABASE IF NOT EXISTS `rewards` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rewards`;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `plan_id` int(3) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `is_card` int(1) DEFAULT '0',
  `is_phone` int(1) DEFAULT '0',
  `date_registered` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlet_settings`
--

CREATE TABLE IF NOT EXISTS `outlet_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `checkin_points` int(6) DEFAULT NULL,
  `min_checkin_period` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `business_id` int(10) NOT NULL,
  `points` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
