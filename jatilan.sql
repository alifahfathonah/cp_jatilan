-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2015 at 04:25 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jatilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jtl_about`
--

CREATE TABLE IF NOT EXISTS `jtl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jtl_about`
--

INSERT INTO `jtl_about` (`id`, `title`, `content`, `image`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(4, 'cvcvc xx BB', 'vcvcv xx BB', 'images/happy_girl_2-wallpaper-1366x768.jpg', '2015-08-28 21:22:58', '2015-08-29 05:49:47', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_accessories`
--

CREATE TABLE IF NOT EXISTS `jtl_accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descriptions` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jtl_accessories`
--

INSERT INTO `jtl_accessories` (`id`, `name`, `descriptions`, `image`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(5, 'uuiui', 'uiuiuiui', 'images/alat/asia_beauty-wallpaper-1366x768.jpg', '2015-08-30 10:21:03', '2015-08-30 10:21:03', 2, 1),
(6, 'dfdfd xx zz', 'ddfdfd xxx zz', 'images/alat/one_boring_afternoon-wallpaper-1366x768.jpg', '2015-08-30 10:39:18', '2015-08-30 11:22:25', 2, 1),
(7, 'alfdadfj', 'lasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf alasdfjalf alsf aslfslaf salf a', 'images/alat/Sweet-Girls-Wallpapers.jpg', '2015-08-30 13:14:32', '2015-08-30 13:14:32', 2, 1),
(8, 'lfjsa fasf ld', 'lasdjf adfal f afals falsf ldfjalf aslfaslfasf alfalfd', 'images/alat/asia_beauty-wallpaper-1366x768.jpg', '2015-08-30 13:14:45', '2015-08-30 13:14:45', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_blogs`
--

CREATE TABLE IF NOT EXISTS `jtl_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `category_blog` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `profile_id` (`profile_id`),
  KEY `category_blog` (`category_blog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jtl_blogs`
--

INSERT INTO `jtl_blogs` (`id`, `title`, `content`, `image`, `date_created`, `date_updated`, `category_blog`, `user_id`, `profile_id`) VALUES
(7, 'ererere', 'rererer', 'images/blogs/asia_beauty-wallpaper-1366x768.jpg', '2015-08-29 12:18:37', '2015-08-29 12:18:37', 7, 2, 1),
(8, 'Indonesia adalah negara terbesar di dunia', 'Indonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di duniaIndonesia adalah negara terbesar di dunia', 'images/blogs/jannina-W.jpg', '2015-08-30 14:20:55', '2015-08-30 14:20:55', 6, 2, 1),
(9, 'dfdfdfdf', 'dfdfdf', 'images/blogs/Jannina-W-5.jpg', '2015-08-31 11:00:46', '2015-08-31 11:00:46', 7, 2, 1),
(10, 'Indonesia 2', 'safdasfsafsafsf', 'images/blogs/Jannina-W-5.jpg', '2015-08-31 15:44:43', '2015-08-31 15:44:43', 6, 2, 1),
(11, 'apa pun 3 Indonesia ', 'sfasfasfasd', 'images/blogs/Sweet-Girls-Wallpapers.jpg', '2015-08-31 15:45:02', '2015-08-31 15:45:02', 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_category_blog`
--

CREATE TABLE IF NOT EXISTS `jtl_category_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descriptions` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jtl_category_blog`
--

INSERT INTO `jtl_category_blog` (`id`, `name`, `descriptions`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(6, 'rtrtrt xxx', 'rtrtrtr xx', '2015-08-29 08:48:56', '2015-08-29 09:36:09', 2, 1),
(7, 'ererer wewewe', 'ererere wewewe', '2015-08-29 08:49:00', '2015-08-29 08:49:06', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_category_gallery`
--

CREATE TABLE IF NOT EXISTS `jtl_category_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descriptions` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jtl_category_gallery`
--

INSERT INTO `jtl_category_gallery` (`id`, `name`, `descriptions`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(2, 'cvcvcvcvc xx zz', 'vcvcvcvcvcvcvcv xx zz', '2015-08-29 08:40:11', '2015-08-29 09:36:57', 2, 1),
(3, 'ererere ww', 'erererererewww', '2015-08-29 08:45:29', '2015-08-29 09:36:43', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_category_members`
--

CREATE TABLE IF NOT EXISTS `jtl_category_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descriptions` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jtl_category_members`
--

INSERT INTO `jtl_category_members` (`id`, `name`, `descriptions`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(4, 'rtrtrtr', 'trtrtrtr', '2015-08-29 09:27:24', '2015-08-29 09:27:24', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_contacts`
--

CREATE TABLE IF NOT EXISTS `jtl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contacts` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jtl_contacts`
--

INSERT INTO `jtl_contacts` (`id`, `contacts`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(4, 'ererereerererere gggg', '2015-08-30 11:39:38', '2015-08-30 11:39:41', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_gallery`
--

CREATE TABLE IF NOT EXISTS `jtl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `descriptions` text NOT NULL,
  `category_gallery` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`),
  KEY `category_gallery` (`category_gallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jtl_gallery`
--

INSERT INTO `jtl_gallery` (`id`, `image`, `descriptions`, `category_gallery`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(6, 'images/gallery/happy_girl_2-wallpaper-1366x768.jpg', 'ddfdfdfdfd xxx v', 3, '2015-08-29 22:27:58', '2015-08-30 06:11:37', 2, 1),
(7, 'images/gallery/1835629 (copy).jpg', 'ddfdfdfd', 3, '2015-08-29 22:46:16', '2015-08-29 22:46:16', 2, 1),
(8, 'images/gallery/jannina-W.jpg', 'asasasa xxxxxx', 2, '2015-08-29 22:46:36', '2015-08-29 22:55:47', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_general`
--

CREATE TABLE IF NOT EXISTS `jtl_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(100) NOT NULL,
  `site_tagline` varchar(100) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jtl_general`
--

INSERT INTO `jtl_general` (`id`, `site_title`, `site_tagline`, `site_url`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(7, 'Jatilan Indonesia', 'wwq', 'qww', '2015-08-29 10:45:38', '2015-08-30 11:48:28', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_members`
--

CREATE TABLE IF NOT EXISTS `jtl_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(100) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `self_status` int(1) NOT NULL,
  `motto` text NOT NULL,
  `facebook_url` varchar(50) NOT NULL,
  `twitter_url` varchar(50) NOT NULL,
  `instagram_url` varchar(50) NOT NULL,
  `active_status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `category_member` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`),
  KEY `category_member` (`category_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jtl_members`
--

INSERT INTO `jtl_members` (`id`, `member_name`, `gender`, `address`, `image`, `self_status`, `motto`, `facebook_url`, `twitter_url`, `instagram_url`, `active_status`, `date_created`, `date_updated`, `category_member`, `user_id`, `profile_id`) VALUES
(11, 'zxzxzxz qqq', 1, 'zxzxzx qqq', 'images/members/one_boring_afternoon-wallpaper-1366x768.jpg', 2, 'zxzx qqq', 'zxzxzx qqq', 'zxzx qq', 'zxzx qq', 2, '2015-08-30 09:00:28', '2015-08-30 10:06:47', 4, 2, 1),
(12, 'safasfasd', 1, 'asdfas', 'images/members/jannina-W.jpg', 1, 'afd', 'afdasf', 'asfdas', 'asdfa', 1, '2015-08-30 12:38:30', '2015-08-30 12:38:30', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_profiles`
--

CREATE TABLE IF NOT EXISTS `jtl_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` int(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `facebook_name` varchar(100) NOT NULL,
  `facebook_url` varchar(50) NOT NULL,
  `twitter_name` varchar(100) NOT NULL,
  `twitter_url` varchar(50) NOT NULL,
  `instagram_name` varchar(100) NOT NULL,
  `instagram_url` varchar(50) NOT NULL,
  `youtube_name` varchar(100) NOT NULL,
  `youtube_url` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jtl_profiles`
--

INSERT INTO `jtl_profiles` (`id`, `nick_name`, `full_name`, `address`, `phone_number`, `image`, `facebook_name`, `facebook_url`, `twitter_name`, `twitter_url`, `instagram_name`, `instagram_url`, `youtube_name`, `youtube_url`, `date_created`, `date_updated`, `user_id`) VALUES
(1, 'paijoR', 'vvvv', 'bbbb', 2222, 'images/profiles/jannina-W.jpg', 'bbb', 'vvvv', 'bbb', 'vvv', 'bbb', 'vvv', 'bbb', 'vvv', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(4, 'Admin1', '', '', 0, 'images/profiles/Jannina-W-5.jpg', '', '', '', '', '', '', '', '', '2015-08-28 19:57:41', '2015-08-28 19:57:41', 10),
(5, 'user1', '', '', 0, 'images/profiles/jannina-W.jpg', '', '', '', '', '', '', '', '', '2015-08-28 19:58:58', '2015-08-28 19:58:58', 11),
(6, 'TestWaktu', '', '', 0, 'images/profiles/jannina-W.jpg', '', '', '', '', '', '', '', '', '2015-08-28 20:19:23', '2015-08-28 20:19:23', 12);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_social_media`
--

CREATE TABLE IF NOT EXISTS `jtl_social_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jtl_social_media`
--

INSERT INTO `jtl_social_media` (`id`, `name`, `link`, `icon`, `status`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(4, 'Facebook dd', 'www.facebook.com', 'images/social_media/1377992.jpg', 1, '2015-08-29 06:01:48', '2015-08-29 06:15:58', 2, 1),
(5, 'Twitter', 'twiiter.com', 'images/social_media/asia_beauty-wallpaper-1366x768.jpg', 2, '2015-08-29 06:02:04', '2015-08-29 06:02:04', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_sponsors`
--

CREATE TABLE IF NOT EXISTS `jtl_sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jtl_sponsors`
--

INSERT INTO `jtl_sponsors` (`id`, `name`, `link`, `icon`, `status`, `date_created`, `date_updated`, `user_id`, `profile_id`) VALUES
(9, 'rtrtrt', 'rtrtr', 'images/sponsors/happy_girl_2-wallpaper-1366x768.jpg', 1, '2015-08-30 10:39:07', '2015-08-30 10:39:07', 2, 1),
(10, 'rtrtrtr', 'rtrtr', 'images/sponsors/Sweet-Girls-Wallpapers.jpg', 1, '2015-08-30 11:57:23', '2015-08-30 11:57:23', 2, 1),
(11, 'ererere', 'ererer', 'images/sponsors/1656555 (1).jpg', 1, '2015-08-30 11:57:30', '2015-08-30 11:57:30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jtl_users`
--

CREATE TABLE IF NOT EXISTS `jtl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `pass2` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jtl_users`
--

INSERT INTO `jtl_users` (`id`, `email`, `pass`, `pass2`, `level`, `status`, `date_created`, `date_updated`) VALUES
(2, 'tiyan@amikom.ac.id', '875f26fdb1cecf20ceb4ca028263dec6', '875f26fdb1cecf20ceb4ca028263dec6', 1, 1, '2015-08-28 11:17:19', '2015-08-28 18:49:06'),
(10, 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'e00cf25ad42683b3df678c61f42c6bda', 1, 1, '2015-08-28 19:38:12', '2015-08-28 19:38:12'),
(11, 'user1@gmail.com', '343b1c4a3ea721b2d640fc8700db0f36', '343b1c4a3ea721b2d640fc8700db0f36', 2, 1, '2015-08-28 19:38:28', '2015-08-28 20:18:20'),
(12, 'testWaktu@gmail.com', 'd785c99d298a4e9e6e13fe99e602ef42', 'd785c99d298a4e9e6e13fe99e602ef42', 1, 1, '2015-08-28 20:13:05', '2015-08-28 20:18:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jtl_about`
--
ALTER TABLE `jtl_about`
  ADD CONSTRAINT `jtl_about_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_about_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_accessories`
--
ALTER TABLE `jtl_accessories`
  ADD CONSTRAINT `jtl_accessories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_accessories_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_blogs`
--
ALTER TABLE `jtl_blogs`
  ADD CONSTRAINT `jtl_blogs_ibfk_1` FOREIGN KEY (`category_blog`) REFERENCES `jtl_category_blog` (`id`),
  ADD CONSTRAINT `jtl_blogs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_blogs_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_category_blog`
--
ALTER TABLE `jtl_category_blog`
  ADD CONSTRAINT `jtl_category_blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_category_blog_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_category_gallery`
--
ALTER TABLE `jtl_category_gallery`
  ADD CONSTRAINT `jtl_category_gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_category_gallery_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_category_members`
--
ALTER TABLE `jtl_category_members`
  ADD CONSTRAINT `jtl_category_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_category_members_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_contacts`
--
ALTER TABLE `jtl_contacts`
  ADD CONSTRAINT `jtl_contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_contacts_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_gallery`
--
ALTER TABLE `jtl_gallery`
  ADD CONSTRAINT `jtl_gallery_ibfk_1` FOREIGN KEY (`category_gallery`) REFERENCES `jtl_category_gallery` (`id`),
  ADD CONSTRAINT `jtl_gallery_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_gallery_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_general`
--
ALTER TABLE `jtl_general`
  ADD CONSTRAINT `jtl_general_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_general_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_members`
--
ALTER TABLE `jtl_members`
  ADD CONSTRAINT `jtl_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_members_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`),
  ADD CONSTRAINT `jtl_members_ibfk_3` FOREIGN KEY (`category_member`) REFERENCES `jtl_category_members` (`id`);

--
-- Constraints for table `jtl_profiles`
--
ALTER TABLE `jtl_profiles`
  ADD CONSTRAINT `jtl_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`);

--
-- Constraints for table `jtl_social_media`
--
ALTER TABLE `jtl_social_media`
  ADD CONSTRAINT `jtl_social_media_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_social_media_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

--
-- Constraints for table `jtl_sponsors`
--
ALTER TABLE `jtl_sponsors`
  ADD CONSTRAINT `jtl_sponsors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jtl_users` (`id`),
  ADD CONSTRAINT `jtl_sponsors_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `jtl_profiles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
