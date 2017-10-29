-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 06:00 PM
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
(90, 1508787355, 'Asith Eranga Abeykoon', 'Users', 'add', 'New User has been added Successfully', '::1'),
(91, 1508852280, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(92, 1508852280, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(93, 1508852280, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(94, 1508856844, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(95, 1508856859, 'Asith Eranga Abeykoon', 'Cards', 'delete', 'Card Deleted successfully.', '::1'),
(96, 1508857218, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(97, 1508857241, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(98, 1508859106, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(99, 1508859122, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(100, 1508859746, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(101, 1508860164, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(102, 1508860490, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(103, 1508860532, 'Asith Eranga Abeykoon', 'Cards', 'add', 'New Card has been added successfully', '::1'),
(104, 1508860552, 'Asith Eranga Abeykoon', 'Cards', 'edit', 'Card Details has been Updated successfully.', '::1'),
(105, 1508860562, 'Asith Eranga Abeykoon', 'Cards', 'delete', 'Card Deleted successfully.', '::1'),
(106, 1508863210, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(107, 1508863213, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(108, 1508863213, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(109, 1508863213, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(110, 1508863228, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(111, 1508863234, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(112, 1508863236, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(113, 1508863236, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(114, 1508863236, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(115, 1508863919, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(116, 1508863921, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(117, 1508863921, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(118, 1508863921, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(119, 1508865138, 'Asith Eranga Abeykoon', 'Mod Discounts', 'add', 'New discount detail has been added successfully', '::1'),
(120, 1508865583, 'Asith Eranga Abeykoon', 'Mod Discounts', 'delete', 'Discount detail Deleted successfully.', '::1'),
(121, 1508865602, 'Asith Eranga Abeykoon', 'Mod Discounts', 'add', 'New discount detail has been added successfully', '::1'),
(122, 1508865612, 'Asith Eranga Abeykoon', 'Mod Discounts', 'edit', 'Discount detail has been Updated successfully.', '::1'),
(123, 1509041543, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(124, 1509041543, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(125, 1509041543, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(126, 1509042009, 'Asith Eranga Abeykoon', 'Testimonials', 'add', 'New Testimonial has been added successfully', '::1'),
(127, 1509042110, 'Asith Eranga Abeykoon', 'Testimonials', 'add', 'New Testimonial has been added successfully', '::1'),
(128, 1509201555, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(129, 1509201555, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(130, 1509201555, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(131, 1509208631, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(132, 1509208634, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(133, 1509208637, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(134, 1509208637, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(135, 1509208637, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(136, 1509208982, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(137, 1509208986, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(138, 1509208986, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(139, 1509208986, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(140, 1509209122, 'Asith Eranga Abeykoon', 'Partner With Isic', 'add', 'New detail has been added successfully', '::1'),
(141, 1509209264, 'Asith Eranga Abeykoon', 'Partner With Isic', 'edit', 'Details has been Updated successfully.', '::1'),
(142, 1509209774, 'Asith Eranga Abeykoon', 'Partner With Isic', 'delete', 'Detail Deleted successfully.', '::1'),
(143, 1509210294, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(144, 1509210297, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(145, 1509210299, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(146, 1509210299, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(147, 1509210300, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(148, 1509210438, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(149, 1509210441, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(150, 1509210443, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(151, 1509210443, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(152, 1509210443, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(153, 1509210510, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(154, 1509210513, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(155, 1509210513, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(156, 1509210513, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(157, 1509251364, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(158, 1509251364, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(159, 1509251364, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(160, 1509251481, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(161, 1509251495, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(162, 1509251497, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(163, 1509251497, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(164, 1509251498, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(165, 1509257572, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(166, 1509257609, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(167, 1509257613, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(168, 1509257616, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(169, 1509257616, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(170, 1509257616, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(171, 1509293373, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(172, 1509293374, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(173, 1509293374, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(174, 1509293819, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(175, 1509293821, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(176, 1509293821, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(177, 1509293821, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(178, 1509293863, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(179, 1509293863, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(180, 1509293863, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(181, 1509293993, 'Asith Eranga Abeykoon', 'Travel With Us', 'add', 'New detail has been added successfully', '::1'),
(182, 1509294036, 'Asith Eranga Abeykoon', 'Travel With Us', 'edit', 'Details has been Updated successfully.', '::1'),
(183, 1509294056, 'Asith Eranga Abeykoon', 'Travel With Us', 'delete', 'Detail Deleted successfully.', '::1'),
(184, 1509294314, 'Asith Eranga Abeykoon', 'User Permission', 'edit', 'User Permission has been updated Successfully', '::1'),
(185, 1509294317, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged Out.', '::1'),
(186, 1509294320, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(187, 1509294320, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(188, 1509294348, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(189, 1509294348, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(190, 1509294348, 'Asith Eranga Abeykoon', 'Users', 'Login', 'Logged in Successfully', '::1'),
(191, 1509295599, 'Asith Eranga Abeykoon', 'Take A Vacation', 'add', 'New detail has been added successfully', '::1'),
(192, 1509295804, 'Asith Eranga Abeykoon', 'Take A Vacation', 'delete', 'Detail Deleted successfully.', '::1'),
(193, 1509295921, 'Asith Eranga Abeykoon', 'Travel With Us', 'add', 'New detail has been added successfully', '::1'),
(194, 1509295963, 'Asith Eranga Abeykoon', 'Travel With Us', 'add', 'New detail has been added successfully', '::1'),
(195, 1509297693, 'Asith Eranga Abeykoon', 'Partner With Isic', 'add', 'New detail has been added successfully', '::1'),
(196, 1509297971, 'Asith Eranga Abeykoon', 'Take A Vacation', 'add', 'New detail has been added successfully', '::1'),
(197, 1509299417, 'Asith Eranga Abeykoon', 'Partner With Isic', 'edit', 'Details has been Updated successfully.', '::1'),
(198, 1509299434, 'Asith Eranga Abeykoon', 'Partner With Isic', 'add', 'New detail has been added successfully', '::1'),
(199, 1509299545, 'Asith Eranga Abeykoon', 'Partner With Isic', 'edit', 'Details has been Updated successfully.', '::1'),
(200, 1509299576, 'Asith Eranga Abeykoon', 'Partner With Isic', 'edit', 'Details has been Updated successfully.', '::1'),
(201, 1509299790, 'Asith Eranga Abeykoon', 'Take A Vacation', 'edit', 'Details has been Updated successfully.', '::1'),
(202, 1509299813, 'Asith Eranga Abeykoon', 'Take A Vacation', 'add', 'New detail has been added successfully', '::1');

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
(4, 'Student', 'THE INTERNATIONAL  STUDENT IDENTITY CARD (ISIC)', 'WHAT I GET', 'WHAT DO I NEED TO GET AN ISIC CARD?', '<p>The ISIC card is your ultimate student lifestyle card. Want awesome travel deals, money off online shopping, discounts on restaurants, cafes and takeaways? We\'ve got you covered, ISIC is the only internationally-recognized student ID. It is your ticket to fantastic discounts and services in Sri Lanka and globally.&nbsp;<br />There are over 150,000 discounts worldwide - so you will never be short of a bargain. Want to know more, Check out our local discounts and our international discounts.</p>\r\n<table style="width: 948px;">\r\n<tbody>\r\n<tr>\r\n<td style="width: 464px;">&nbsp;</td>\r\n<td style="width: 494px;">\r\n<h2 class="h1 txt-black text-upper" style="padding-left: 30px;">AM I ELIGIBLE?</h2>\r\n<p style="padding-left: 30px;">If you are a full-time student at school, college or university, aged 12 or over, you can apply fire student card with ISIC. It\'s a hassle-free process, and in no time at all you&bull;11 be enjoying thou-sands of discounts and benefits at home and away.</p>\r\n<p style="padding-left: 30px;">If you are not a full time student, you may be eligible for our youth card (if you\'re 30 years old or younger) or our teacher card (if you are a full time teacher).</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<ul class="doted pos-rela marg-rgt-15">\r\n<li>\r\n<p class="txt-white">Over 150,000 benefits worldwide</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">50+ benefits in Sri Lanka</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">Discounts at ultra trendy and popular retailers - GFlock, Cotton Collection</p>\r\n</li>\r\n<li>\r\n<p class="txt-white">Get your caffeine fix with a discount from Coffee Bean, Cioconut, Coco Verandah &amp; ff Java Lounge</p>\r\n</li>\r\n</ul>', '<p>You\'ll need the following ready in addition to your application.</p>\r\n<ul>\r\n<li>A document, that provesbthat you are currently studying full time at a recognized school, college or university. Examples below:\r\n<ul>\r\n<li>A copy of your university or student card, which is dated, including you are currently a full time student.</li>\r\n<li>A signed and dated letter on official university or school stationery, which status you are a currently a full time student.</li>\r\n</ul>\r\n</li>\r\n<li>Passport style head and shoulders photo.&nbsp;&nbsp;</li>\r\n</ul>', '12 months', 'LKR 1000', 'ISIC / IYTC / ITIC  cards are non-refundable', '', 1, 1, 2, '1508786959', 2, '1508860490');

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
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `display_type` text,
  `card_type` text,
  `category` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(15) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `description`, `display_type`, `card_type`, `category`, `image`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'test', '<p>test</p>', '0', '2', '3', '', 1, 1, 2, '1508865602', 2, '1508865612');

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
-- Table structure for table `partner_with_isic`
--

CREATE TABLE `partner_with_isic` (
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

--
-- Dumping data for table `partner_with_isic`
--

INSERT INTO `partner_with_isic` (`id`, `name`, `image`, `description`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'test 1', 'http://localhost/isic/uploads/travel_2.jpg', '<p>test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description</p>', 1, 1, 2, '1509297693', 2, '1509299545'),
(3, 'test 2', 'http://localhost/isic/uploads/travel_1.jpg', '<p>test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description</p>', 2, 1, 2, '1509299434', 2, '1509299576');

-- --------------------------------------------------------

--
-- Table structure for table `take_a_vacation`
--

CREATE TABLE `take_a_vacation` (
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

--
-- Dumping data for table `take_a_vacation`
--

INSERT INTO `take_a_vacation` (`id`, `name`, `image`, `description`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'Test 1', 'http://localhost/isic/uploads/travel_1.jpg', '<p>test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description&nbsp;test 1 description</p>', 1, 1, 2, '1509297971', 2, '1509299790'),
(3, 'test 2', 'http://localhost/isic/uploads/travel_2.jpg', '<p>test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description&nbsp;test 2 description</p>', 2, 1, 2, '1509299813', NULL, NULL);

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

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `description`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(3, 'Saj. Melbourne', '', '<pre>&ldquo;Went for dinner to this great little restaurant down the road from where I live. Found it through the ISIC App. The food was amazing but I re-ceived a 20% off my meal with my ISIC - that was even better!"</pre>', 1, 1, 2, '1509042009', NULL, NULL),
(4, 'jyujyu', '', '<p>yujuyjyu</p>', 2, 1, 2, '1509042110', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `travel_with_us`
--

CREATE TABLE `travel_with_us` (
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

--
-- Dumping data for table `travel_with_us`
--

INSERT INTO `travel_with_us` (`id`, `name`, `image`, `description`, `sort_order`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'ITS TIME TO FLY FAVOURITE', 'http://localhost/isic/uploads/travel_1.jpg', '<p>The ISIC card is your ultimate student lifestyle card. Want awesome travel deals, money off online shopping, discounts on restaurants, cafes and takeaways? We\'ve got you covered, ISIC is the only internationally-recognized student ID. It is your ticket to fantastic discounts and services in Sri Lanka and globally.&nbsp;<br />There are over 150,000 discounts worldwide.</p>', 1, 1, 2, '1509295921', NULL, NULL),
(3, 'YOU DO YOUR THINGS', 'http://localhost/isic/uploads/travel_2.jpg', '<p>The ISIC card is your ultimate student lifestyle card. Want awesome travel deals, money off online shopping, discounts on restaurants, cafes and takeaways? We\'ve got you covered, ISIC is the only internationally-recognized student ID. It is your ticket to fantastic discounts and services in Sri Lanka and globally.&nbsp;<br />There are over 150,000 discounts worldwide.</p>', 2, 1, 2, '1509295963', NULL, NULL);

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
(2, 0, 'Asith Eranga', 'Abeykoon', '1', 'asith2u@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'asith2u@yahoo.com', 1509294348),
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
(1, 'Super User', '{"mod_about_page":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_cards":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_discounts":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_home_page":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_partner_with_isic":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_take_a_vacation":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_testimonials":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_travel_with_us":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_user_permission":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}],"mod_users":[{"view":[1],"add":[1],"edit":[1],"delete":[1],"other":[1]}]}', 'a:3:{i:0;s:12:"activity-log";i:1;s:14:"email-settings";i:2;s:16:"variable-manager";}');

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
(6, 'mod_testimonials_status', 'Disable,Enable', 1, 'mod_testimonials'),
(7, 'mod_cards_status', 'Disable,Enable', 1, 'mod_cards'),
(8, 'mod_discounts_status', 'Disable,Enable', 1, 'mod_discounts'),
(9, 'mod_discounts_display_types', 'Normal,Special', 1, 'mod_discounts'),
(10, 'mod_discounts_card_types', 'ISIC,ITIC,IYTC', 1, 'mod_discounts'),
(11, 'mod_discounts_categories', 'ACCOMMODATION,ACTIVITIES,ATTRACTIONS,DINING AND TAKEAWAY,EDUCATION,ENTERTAINMENT', 1, 'mod_discounts'),
(12, 'mod_partner_with_isic_status', 'Disable,Enable', 1, 'mod_partner_with_isic'),
(13, 'mod_travel_with_us_status', 'Disable,Enable', 1, 'mod_travel_with_us'),
(14, 'mod_take_a_vacation_status', 'Disable,Enable', 1, 'mod_take_a_vacation');

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
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_with_isic`
--
ALTER TABLE `partner_with_isic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_a_vacation`
--
ALTER TABLE `take_a_vacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_with_us`
--
ALTER TABLE `travel_with_us`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `partner_with_isic`
--
ALTER TABLE `partner_with_isic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `take_a_vacation`
--
ALTER TABLE `take_a_vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `travel_with_us`
--
ALTER TABLE `travel_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
