-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 07:36 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isic`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) NOT NULL,
  `created_date` int(10) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `created_date`, `user`, `module`, `type`, `message`, `ip`) VALUES
(1, 1507562822, 'Asith Eranga', 'Activity Log', 'delete', '------ Activity Log Cleared --------', '::1'),
(2, 1507562827, 'Asith Eranga', 'Users', 'Login', 'Logged Out.', '::1'),
(3, 1507562835, 'Asith Eranga', 'Users', 'Login', 'Logged in Successfully', '::1'),
(4, 1507562835, 'Asith Eranga', 'Users', 'Login', 'Logged in Successfully', '::1'),
(5, 1507562835, 'Asith Eranga', 'Users', 'Login', 'Logged in Successfully', '::1'),
(6, 1507563198, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(7, 1507563198, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(8, 1507563211, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(9, 1507563211, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(10, 1507563222, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(11, 1507563222, 'Asith Eranga Abeykoon', 'Users', 'edit', 'User Details has been Updated Successfully.', '::1'),
(12, 1507563230, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(13, 1507563235, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(14, 1507563235, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(15, 1507563235, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(16, 1507563594, 'Asith Eranga Abeykoon', 'User Permission', 'add', 'User Permission has been added Successfully', '::1'),
(17, 1507563604, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(18, 1507563612, 'Asith Eranga Abeykoon', 'User Permission', 'delete', 'User Permission has been deleted Successfully', '::1'),
(19, 1507563985, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(20, 1507563987, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(21, 1507563987, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(22, 1507563987, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(23, 1507565883, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(24, 1507565891, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(25, 1507565893, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(26, 1507565893, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(27, 1507565893, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(28, 1507567576, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(29, 1507567610, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(30, 1507567624, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(31, 1507567785, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(32, 1507567796, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(33, 1507567808, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(34, 1507567814, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(35, 1507651847, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(36, 1507651847, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(37, 1507651847, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(38, 1507651864, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(39, 1507651866, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(40, 1507651868, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(41, 1507651869, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(42, 1507651869, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(43, 1507652066, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(44, 1507652068, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(45, 1507652068, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(46, 1507652069, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(47, 1507655763, 'Asith Eranga Abeykoon', 'Testimonials', 'add', 'New Testimonial has been added successfully', '::1'),
(48, 1507655771, 'Asith Eranga Abeykoon', 'Testimonials', 'delete', 'Testimonial Deleted successfully.', '::1'),
(49, 1507825529, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(50, 1507825530, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(51, 1507825530, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(52, 1507825591, 'Asith Eranga Abeykoon', 'Testimonials', 'add', 'New Testimonial has been added successfully', '::1'),
(53, 1507825599, 'Asith Eranga Abeykoon', 'Testimonials', 'delete', 'Testimonial Deleted successfully.', '::1'),
(54, 1508776981, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(55, 1508776981, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(56, 1508776981, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(57, 1508778117, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(58, 1508778239, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(59, 1508778254, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(60, 1508778505, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(61, 1508778618, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(62, 1508778639, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(63, 1508778683, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(64, 1508778686, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(65, 1508778686, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(66, 1508778686, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(67, 1508779978, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(68, 1508779983, 'Asith Eranga Abeykoon', 'Home Page', 'edit', 'Home page content has been Updated successfully.', '::1'),
(69, 1508781299, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(70, 1508781370, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(71, 1508781649, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(72, 1508781748, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(73, 1508781787, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(74, 1508781829, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(75, 1508781926, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(76, 1508782072, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(77, 1508782141, 'Asith Eranga Abeykoon', 'About Page', 'edit', 'About page content has been Updated successfully.', '::1'),
(78, 1508785833, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(79, 1508785836, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(80, 1508785839, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(81, 1508785839, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(82, 1508785839, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(83, 1508786586, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(84, 1508786594, 'Asith Eranga Abeykoon', 'Cards', 'delete', 'Card Deleted successfully.', '::1'),
(85, 1508786599, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(86, 1508786614, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(87, 1508786626, 'Asith Eranga Abeykoon', 'Cards', 'delete', 'Card Deleted successfully.', '::1'),
(88, 1508786629, 'Asith Eranga Abeykoon', 'Cards', 'delete', 'Card Deleted successfully.', '::1'),
(89, 1508786959, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(90, 1508787355, 'Asith Eranga Abeykoon', 'Users', 'add', 'New User has been added Successfully', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `title_1` varchar(200) DEFAULT NULL,
  `title_2` varchar(200) DEFAULT NULL,
  `title_3` varchar(200) DEFAULT NULL,
  `description_1` text,
  `description_2` text,
  `description_3` text,
  `date_of_issue` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `itinerary` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(15) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `title_1`, `title_2`, `title_3`, `description_1`, `description_2`, `description_3`, `date_of_issue`, `price`, `itinerary`, `image`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(4, 'Student', 'THE INTERNATIONAL  STUDENT IDENTITY CARD (ISIC)', 'WHAT I GET', 'WHAT DO I NEED TO GET AN ISIC CARD?', '<p>The ISIC card is your ultimate student lifestyle card. Want awesome travel deals, money off online shopping, discounts on restaurants, cafes and takeaways? We\'ve got you covered, ISIC is the only internationally-recognized student ID. It is your ticket to fantastic discounts and services in Sri Lanka and globally.&nbsp;<br />There are over 150,000 discounts worldwide - so you will never be short of a bargain. Want to know more, Check out our local discounts and our international discounts.</p>\r\n<table style="width: 996px;">\r\n<tbody>\r\n<tr>\r\n<td style="width: 464px;">&nbsp;</td>\r\n<td style="width: 540px;">\r\n<h2 class="h1 txt-black text-upper" style="padding-left: 30px;">AM I ELIGIBLE?</h2>\r\n<p style="padding-left: 30px;">If you are a full-time student at school, college or university, aged 12 or over, you can apply fire student card with ISIC. It\'s a hassle-free process, and in no time at all you&bull;11 be enjoying thou-sands of discounts and benefits at home and away.</p>\r\n<p style="padding-left: 30px;">If you are not a full time student, you may be eligible for our youth card (if you\'re 30 years old or younger) or our teacher card (if you are a full time teacher).</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<ul class="doted pos-rela marg-rgt-15">\r\n<li>\r\n<p class="txt-white">Over 150,000 benefits worldwide</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">50+ benefits in Sri Lanka</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">Discounts at ultra trendy and popular retailers - GFlock, Cotton Collection</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">Get your caffeine fix with a discount from Coffee Bean, Cioconut, Coco Verandah &amp; ff Java Lounge</p>\r\n</li>\r\n</ul>', '', '12 months  from the  date of issue', 'LKR 1000', 'ISIC / IYTC / ITIC  cards are non-refundable', '', 1, 1, 2, '1508786959', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_about`
--

CREATE TABLE `content_about` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_about`
--

INSERT INTO `content_about` (`id`, `title`, `image`, `description`, `sort_order`, `modified_by`, `modified_date`) VALUES
(1, 'WHAT IS ISIC?', '', '<p>The International Student Identity Card (ISIC) is your passport to fantastic discounts and services at home and around the world.&nbsp;<br /><br />The ISIC card is the only internationally recognised student ID and ISIC card holders are members of a truly global club. Every year more than 4.5 million students from 120 countries use their student card to take advantage of offers on travel, shopping, museums and more, worldwide. The ISIC card and its benefits are now available to all Sri Lankan students. Sign up today and join our ever expanding community...</p>\r\n<table style="width: 1011px;">\r\n<tbody>\r\n<tr style="height: 62px;">\r\n<td style="width: 218px; height: 62px;"><img src="http://localhost/isic/uploads/id-card.jpg" alt="" width="280" height="177" /></td>\r\n<td style="width: 803px; height: 62px; text-align: justify;">\r\n<p style="padding-left: 30px;">The ISIC card is the only internationally recognised student ID and ISIC card holders are members of a truly global club. Every year more than 4.5 million students from 120 countries use their student card to take advantage of offers on travel, shopping, museums and more, worldwide. The ISIC card and its benefits are now available to all Sri Lankan students. Sign up today and join our ever expanding community.The ISIC card and its benefits are now available to all Sri Lankan students. Sign up today and join our ever expanding communityThe ISIC card and its benefits are now available to all Sri Lankan students. Sign up today and join our ever expanding communityThe ISIC card and its benefits.<br /><br /></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;<br />The International Student Identity Card (ISIC) is your passport to fantastic discounts and services at home and around the world.</p>', 0, 2, '1508781829'),
(2, 'WHY ISIC?', '', '<p>The ISIC card is the only internationally recognised student ID and ISIC card holders are members of a truly global club. Every year more than 4.5 million students from 120 countries use their student card to take advantage of offers on travel, shopping, museums and more, worldwide.</p>', 1, 2, '1508781926'),
(3, 'FOR WHO?', '', '<p>The ISIC card is the only internationally recognised student ID and ISIC card holders are members of a truly global club. Every year more than 4.5 million students from 120 countries use their student.</p>', 2, 2, '1508782141');

-- --------------------------------------------------------

--
-- Table structure for table `content_home`
--

CREATE TABLE `content_home` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_home`
--

INSERT INTO `content_home` (`id`, `title`, `image`, `description`, `sort_order`, `modified_by`, `modified_date`) VALUES
(1, 'WHAT IS ISIC?', 'http://localhost/isic/uploads/id-card.jpg', '<p>The International Student Identity Card (ISIC) is your passport to fantastic discounts and services at home and around the world.</p>\r\n<p>The ISIC card is the only internationally recognised student ID and ISIC card holders are members of a truly global club. Every year more than 4.5 million students from 120 countries use their student card to take advantage of offers on travel, shopping, museums and more, worldwide. The ISIC card and its benefits are now available to all Sri Lankan students. Sign up today and join our ever expanding community...</p>', 0, 2, '1508779983'),
(2, 'WHY ISIC?', '', '<p>You\'ll use your ISIC card to save money as you travel the world on a well deserved break from college. And it\'s just as useful back home. There are tens of thousands of student discounts on offer, so check what\'s available at your local restaurants, cinemas and shops.</p>', 1, 2, '1508778618');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(10) NOT NULL,
  `smtp_status` int(10) DEFAULT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_port` int(10) DEFAULT NULL,
  `smtp_mailport` int(10) DEFAULT NULL,
  `smtp_authentication` int(10) DEFAULT NULL,
  `smtp_username` varchar(200) DEFAULT NULL,
  `smtp_password` varchar(200) DEFAULT NULL,
  `smtp_type` varchar(10) DEFAULT NULL,
  `user_group` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `smtp_status`, `smtp_host`, `smtp_port`, `smtp_mailport`, `smtp_authentication`, `smtp_username`, `smtp_password`, `smtp_type`, `user_group`) VALUES
(1, 0, '', 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(15) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `user_permission` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `firstname`, `lastname`, `user_permission`, `username`, `password`, `email`, `last_login`) VALUES
(2, 0, 'Asith Eranga', 'Abeykoon', '1', 'asith2u@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'asith2u@yahoo.com', 1508785839),
(3, 0, 'Demo', 'User', '1', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'asith2u@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(100) DEFAULT NULL,
  `permission` text,
  `system_manager_permission` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `permission_name`, `permission`, `system_manager_permission`) VALUES
(1, 'Super User', '{"mod_about_page":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_cards":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_home_page":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_testimonials":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_user_permission":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_users":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}]}', 'a:3:{i:0;s:12:"activity-log";i:1;s:14:"email-settings";i:2;s:16:"variable-manager";}');

-- --------------------------------------------------------

--
-- Table structure for table `variable_manager`
--

CREATE TABLE `variable_manager` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` tinytext,
  `owner_type` int(11) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variable_manager`
--

INSERT INTO `variable_manager` (`id`, `name`, `value`, `owner_type`, `owner`) VALUES
(2, 'general_template', 'default', 1, 'system'),
(5, 'mod_special_tours_status', 'Disable,Enable', 1, 'mod_special_tours'),
(6, 'mod_testimonials_status', 'Disable,Enable', 1, 'mod_testimonials'),
(7, 'mod_cards_status', 'Disable,Enable', 1, 'mod_cards');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_about`
--
ALTER TABLE `content_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_home`
--
ALTER TABLE `content_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variable_manager`
--
ALTER TABLE `variable_manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `content_about`
--
ALTER TABLE `content_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `content_home`
--
ALTER TABLE `content_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `variable_manager`
--
ALTER TABLE `variable_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
