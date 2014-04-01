-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2014 at 12:47 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `order`) VALUES
(1, 'News', 'news', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `blog_category_id` int(3) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_posted` date NOT NULL,
  `is_draft` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `summary`, `content`, `image`, `blog_category_id`, `author`, `date_posted`, `is_draft`) VALUES
(1, 'Awesome Blog Post', 'awesome-blog-post', '<p>I noticed that every time I released a guide on a topic that has already been beaten to death or one that is basic, I barely got any visitors. For example, the guide to online marketing for beginners only received 68,319 visitors.</p>', '<p>I noticed that every time I released a guide on a topic that has already been beaten to death or one that is basic, I barely got any visitors. For example, the guide to online marketing for beginners only received 68,319 visitors.</p>\r\n\r\n<p>On the flip side, my guide on growth hacking has already received over 414,209 visitors.</p>\r\n\r\n<p>Every time I release a guide on an advanced topic, I receive at least a few hundred thousand visitors.</p>\r\n\r\n<p>The same trend exists with my blog. Every time I write on an advanced topic and give detailed steps, my traffic goes through the roof. And basic blog posts tend to flop.</p>\r\n\r\n<p>If you are going to invest the time and energy into writing a detailed guide, make sure you pick advanced topics that are continually growing in popularity. You can check this by using Google Trends.</p>\r\n\r\n<p>All you have to do is enter in a keyword or phrase of the topic you are trying to write about such as “growth hacking.”</p>', 'blog1.jpg', 1, 'Neal', '2014-03-03', 0),
(2, 'Grow Your Traffic', 'grow-your-traffic', '<p>Growing your web traffic can be an overwhelming task. There are hundreds of web tactics that you can follow and there are thousands of articles that explain each strategy. If you had all of the time in the world, this wouldn’t be an issue, but the reality is, you don’t.</p>', '<p>Growing your web traffic can be an overwhelming task. There are hundreds of web tactics that you can follow and there are thousands of articles that explain each strategy. If you had all of the time in the world, this wouldn’t be an issue, but the reality is, you don’t.</p>\r\n\r\n<p>So how do you grow your traffic? Luckily for you, we have created a step-by-step plan for you to follow over the next 30 days. For each day you are going to be given one task, as well as a homework assignment. If you follow it step by step, you should be able to drastically increase your traffic.</p>\r\n\r\n<p>Before we get started, you need to first learn how to build the right foundation by choosing keywords that are going to help you versus ones that will just drive traffic that doesn’t convert.</p>', NULL, 1, 'Neal Howarth', '2014-03-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `plan_id` int(3) NOT NULL,
  `email_confirmation` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `email`, `password`, `first_name`, `last_name`, `plan_id`, `email_confirmation`, `is_active`) VALUES
(2, 'neal_howarth@tiscali.co.uk', '6062ac89be1e4ecbee73d81296d69746', 'Neal', 'Howarth', 3, 'hj6nu0dm745n5kw7tmhaq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
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

CREATE TABLE `outlets` (
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
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `business_id`, `name`, `street`, `town`, `county`, `postcode`, `telephone`, `fax`, `email`, `website`, `twitter`, `facebook`, `image`, `is_active`) VALUES
(9, 2, 'Test Outlet', '142 Market Street', 'Bury', 'Lancashire', 'BL8 3LS', '01204 782715', NULL, '', 'http://www.how-media.co.uk', '', '', 'ipad-store.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlet_settings`
--

CREATE TABLE `outlet_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `checkin_points` int(6) DEFAULT NULL,
  `min_checkin_period` int(3) DEFAULT NULL,
  `new_customer_bonus` int(5) DEFAULT NULL,
  `vip_status_visit_amount` int(5) DEFAULT NULL,
  `vip_status_bonus_points` int(5) DEFAULT NULL,
  `vip_status_reward` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `outlet_settings`
--

INSERT INTO `outlet_settings` (`id`, `outlet_id`, `checkin_points`, `min_checkin_period`, `new_customer_bonus`, `vip_status_visit_amount`, `vip_status_bonus_points`, `vip_status_reward`) VALUES
(1, 9, 5, 12, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `setup_fee` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `interval_length` int(2) NOT NULL,
  `interval_unit` varchar(10) NOT NULL,
  `cancel_after` int(2) NOT NULL,
  `active` int(1) NOT NULL,
  `is_visible` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `setup_fee`, `price`, `interval_length`, `interval_unit`, `cancel_after`, `active`, `is_visible`) VALUES
(1, 'App Only', 0.00, 9.99, 1, 'month', 12, 1, 1),
(2, 'Basic', 0.00, 24.99, 1, 'month', 12, 1, 1),
(3, 'Pro', 0.00, 29.99, 1, 'month', 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_purchases`
--

CREATE TABLE `plan_purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) NOT NULL,
  `plan_id` int(3) NOT NULL,
  `resource_id` varchar(255) DEFAULT NULL,
  `resource_type` varchar(255) DEFAULT NULL,
  `resource_uri` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan_purchases`
--

INSERT INTO `plan_purchases` (`id`, `business_id`, `plan_id`, `resource_id`, `resource_type`, `resource_uri`, `signature`, `amount`, `created_at`, `status`, `is_active`) VALUES
(3, 2, 3, '0K67DF43CY', 'subscription', 'https://sandbox.gocardless.com/api/v1/subscriptions/0K67DF43CY', '487ba62933f6c16260aac022e84af40bae093bd59ad0dec94a74b0b098d49260', 29.99, '2014-03-29T23:04:47Z', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `business_id` int(10) NOT NULL,
  `points` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `outlet_id`, `business_id`, `points`, `title`, `details`, `is_active`, `is_deleted`) VALUES
(1, 9, 2, 5, 'Get a High Five', 'Get a High Five', 1, 0),
(2, 9, 2, 10, 'Get a free sticker', 'Get a free sticker', 1, 0),
(3, 9, 2, 20, 'Get a free Coffee', 'Get a free Coffee', 1, 0),
(4, 9, 2, 50, 'Get a free slice of cake', 'Get a free slice of cake', 1, 0),
(5, 9, 2, 100, 'Get a free soup and roll', 'Get a free soup and roll', 1, 0),
(6, 9, 2, 150, 'Get something', 'Get something', 1, 0),
(7, 9, 2, 200, 'Get something else', 'Get something else', 1, 0),
(8, 9, 2, 250, 'Git sum', 'Get some', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `outlet_id` int(10) NOT NULL,
  `reward_id` int(10) NOT NULL,
  `points` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
