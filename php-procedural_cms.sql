-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2013 at 02:35 PM
-- Server version: 5.1.68-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shahida2_tk2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_access_levels`
--

CREATE TABLE IF NOT EXISTS `cms_access_levels` (
  `access_lvl` tinyint(4) NOT NULL AUTO_INCREMENT,
  `access_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`access_lvl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_access_levels`
--

INSERT INTO `cms_access_levels` (`access_lvl`, `access_name`) VALUES
(1, 'User'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles`
--

CREATE TABLE IF NOT EXISTS `cms_articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `date_submitted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_published` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` mediumtext NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `IdxArticle` (`author_id`,`date_submitted`),
  FULLTEXT KEY `IdxText` (`title`,`body`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_articles`
--

INSERT INTO `cms_articles` (`article_id`, `author_id`, `is_published`, `date_submitted`, `date_published`, `title`, `body`) VALUES
(1, 1, 1, '2013-03-03 17:16:33', '2013-03-03 17:16:45', 'etst', 'hellovOVKVL: m  zdbm nzjkn jkzn j'),
(2, 1, 1, '2013-03-03 19:47:18', '2013-03-03 18:21:37', 'Test', '<p>\r\n	<em style="margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Helvetica, Arial, sans-serif;">frequently among the dominant players in their respective industries o leverage the potential of technology for practical business advantage and improve services to customer and stakeholders to increase profitability, productivity and market share, among other goals.o leverage the potential of technology for practical business advantage and improve services to customer and stakeholders to increase profitability, productivity and market share, among other goals.</em></p>\r\n<p>\r\n	<img alt="" src="http://mrdtechsystems.com/skins/blues/images/ctl.jpg" style="width: 192px; height: 180px;" /><img alt="" src="/kcfinder/upload/images/contactus_banner.jpg" style="width: 300px; height: 74px;" /></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cms_comments`
--

CREATE TABLE IF NOT EXISTS `cms_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_user` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `IdxComment` (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `date_submitted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_published` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` mediumtext NOT NULL,
  PRIMARY KEY (`page_id`),
  KEY `IdxPage` (`author_id`,`date_submitted`),
  FULLTEXT KEY `IdxText` (`title`,`body`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `cms_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `passwd` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `access_lvl` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `email`, `passwd`, `name`, `access_lvl`) VALUES
(1, 'admin', 'admin123', 'Admin', 3);