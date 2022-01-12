-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 11:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerwritting`
--

CREATE TABLE `answerwritting` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `videolink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answerwritting`
--

INSERT INTO `answerwritting` (`id`, `user_id`, `file_name`, `videolink`) VALUES
(1, 1, 'Answer Writting', 'https://www.youtube.com/embed/WmVYLK6G-eQ'),
(2, 1, 'DHAJI', 'https://www.youtube.com/embed/kZQ8zBRJZIk');

-- --------------------------------------------------------

--
-- Table structure for table `answer_script`
--

CREATE TABLE `answer_script` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `file_name` varchar(1000) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_script`
--

INSERT INTO `answer_script` (`id`, `student_name`, `file_name`, `active`, `created_date`) VALUES
(1, 'Asma', 'ansCopy.pdf', 0, '2020-03-11 12:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `board_name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `board_name`, `created_date`, `active`) VALUES
(1, 'All', '2020-04-15 06:40:04', 0),
(2, 'CBSE', '2020-04-15 06:40:16', 0),
(3, 'ICSE', '2020-04-15 06:40:56', 0),
(4, 'State', '2020-04-15 06:41:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_img` varchar(100) NOT NULL,
  `book_price` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `standard`, `book_name`, `book_img`, `book_price`, `active`, `created_date`) VALUES
(1, 'XII th', 'Biology', 'biology.jpg', 399, 0, '2020-02-13 17:15:55'),
(2, 'VII th', 'English Grammer', 'english.jpg', 399, 0, '2020-02-13 17:22:29'),
(3, 'IV th', 'Environmental Science', 'evs.jpg', 399, 0, '2020-02-13 17:23:01'),
(4, '', 'IAS/IPS Book', 'ias.png', 399, 0, '2020-02-13 17:24:09'),
(5, 'V', 'Test', 'img2.jpeg', 100, 0, '2020-04-07 09:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `books_order_details`
--

CREATE TABLE `books_order_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `Payment_Id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_order_details`
--

INSERT INTO `books_order_details` (`id`, `name`, `contact`, `email`, `address`, `city`, `state`, `zip`, `book_id`, `amount`, `txn_id`, `Payment_Id`, `status`, `active`, `purchase_date`) VALUES
(1, 'AsmaSultana', '9164690169', 'umme94@gmail.com', 'JP Nagar', 'Bangalore', 'Karnataka', 560078, 1, 399, 0, '', 'Completed', 0, '2020-04-14 10:11:59'),
(2, 'Umme', '8618287735', 'asmasultana377@gmail.com', 'Jayanagar', 'Bangalore', 'Karnataka', 560011, 1, 399, 0, '', '', 0, '2020-02-22 15:34:37'),
(3, 'Chaitra', '9164690169', 'chaitra@gmail.com', 'RBI Layout', 'Bangalore', 'Karnataka', 560078, 2, 399, 0, '', '', 0, '2020-02-22 15:47:18'),
(4, 'AsmaSultana', '8618287735', 'umme94@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'Bangalore', 'Karnataka', 560076, 3, 399, 0, '', '', 0, '2020-02-22 15:53:22'),
(5, 'AsmaSultana', '9164690169', 'student999@gmail.com', 'Doddakamnahalli Road', 'Bangalore', 'Karnataka', 560076, 1, 399, 0, '', '', 0, '2020-02-24 05:56:49'),
(6, 'AsmaSultana', '1234567890', 'student399@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'Bangalore', 'Karnataka', 560076, 4, 399, 0, '', '', 0, '2020-02-24 05:57:40'),
(7, 'AsmaSultana', '9164690169', 'anuradha.sugathan@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'HulimavuBangalore', 'Karnataka', 560076, 1, 399, 0, '', '', 0, '2020-03-05 06:30:26'),
(8, 'AsmaSultana', '1234567890', 'anuradha.sugathan@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'HulimavuBangalore', 'Karnataka', 560076, 1, 399, 0, '', '', 0, '2020-03-05 14:39:36'),
(9, 'jarvislmathew', '1234567890', 'anuradha.sugathan@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'HulimavuBangalore', 'Karnataka', 560076, 3, 399, 0, '', '', 0, '2020-03-07 09:10:49'),
(10, 'Asma', '1234567890', 'asma@gmail.com', 'Testing', 'Bangalore', 'Karnataka', 560078, 2, 399, 0, '', '', 0, '2020-05-11 08:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapters_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `class_id` varchar(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapters_name` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `course_material` varchar(1000) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quiz_status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapters_id`, `board_id`, `class_id`, `course_id`, `chapters_name`, `file_name`, `course_material`, `active`, `status`, `quiz_status`, `created_date`) VALUES
(1, 1, '2', 1, 'Real', 'Quality_Check_Results_-_enX_-_April_15,_20201.pdf', '', 0, 0, 0, '2020-07-07 08:02:35'),
(2, 1, '2', 1, 'POLYNOMIALS', '', '', 0, 0, 0, '2020-07-07 08:24:18'),
(3, 1, '2', 1, 'LINEAR EQUATION', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(4, 1, '2', 1, 'QUADRATIC EQUATIONS', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(5, 1, '2', 1, 'ARITHMETIC PROGRESSION', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(6, 1, '2', 1, 'COORDINATE GEOMETRY', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(7, 1, '2', 1, 'TRIANGLES', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(8, 1, '2', 1, 'CIRCLES', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(9, 1, '2', 1, 'CONSTRUCTIONS', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(10, 1, '2', 1, 'INTRODUCTION TO TRIGONOMETRY', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(11, 1, '2', 1, 'SOME APPLICATIONS OF TRIGONOMETRY', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(12, 1, '2', 1, 'AREAS RELATED TO CIRCLES', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(13, 1, '2', 1, 'SURFACE AREAS AND VOLUMES', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(14, 1, '2', 1, 'STATISTICS', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(15, 1, '2', 1, 'PROBABILITY', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(16, 1, '2', 2, 'CHEMICAL REACTIONS AND EQUATIONS', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(17, 1, '2', 2, 'ACIDS, BASE, AND SALTS', '', '', 0, 0, 0, '2020-01-06 09:52:51'),
(18, 1, '2', 2, 'METAL AND NON-METALS', '', '', 0, 0, 0, '2020-01-20 00:41:21'),
(19, 1, '2', 2, 'CARBON AND ITS COMPOUNDS', '', '', 0, 0, 0, '2020-01-20 00:42:33'),
(20, 1, '2', 2, 'PERIODIC CLASSIFICATION OF ELEMENTS', '', '', 0, 0, 0, '2020-01-20 00:42:33'),
(21, 1, '2', 2, 'LIFE PROCESSES', '', '', 0, 0, 0, '2020-01-20 00:43:38'),
(22, 1, '2', 2, 'CONTROL AND COORDINATION', '', '', 0, 0, 0, '2020-01-20 00:43:38'),
(23, 1, '2', 2, 'HOW DO ORGANISMS REPRODUCE?', '', '', 0, 0, 0, '2020-01-20 00:44:31'),
(24, 1, '2', 2, 'HEREDITY AND EVOLUTION', '', '', 0, 0, 0, '2020-01-20 00:44:31'),
(25, 1, '2', 2, 'LIGHT-REFLECTION AND REFRACTION', '', '', 0, 0, 0, '2020-01-20 00:45:15'),
(26, 1, '2', 2, 'HUMAN EYE AND COLOURFULL WORLD', '', '', 0, 0, 0, '2020-01-20 00:45:15'),
(27, 1, '2', 2, 'ELECTRICITY', '', '', 0, 0, 0, '2020-01-20 00:46:03'),
(28, 1, '2', 2, 'MAGNETIC EFFECTS OF ELECTRIC CURRENT', '', '', 0, 0, 0, '2020-01-20 00:46:03'),
(29, 1, '2', 2, 'SOURCES OF ENERGY', '', '', 0, 0, 0, '2020-01-20 00:47:23'),
(30, 1, '2', 2, 'OUR ENVIRONMENT', '', '', 0, 0, 0, '2020-01-20 00:47:23'),
(31, 1, '2', 2, 'MANAGEMENT OF NATURAL RESOURCES', '', '', 0, 0, 0, '2020-01-20 00:48:11'),
(32, 0, '', 3, 'Moral Story of Study Smarter, Not Harder', '', '', 0, 0, 0, '2020-04-18 10:55:07'),
(33, 0, '', 3, 'Did I study Correctly?', '', '', 0, 0, 0, '2020-04-18 10:55:08'),
(34, 0, '', 3, 'Our Brain Capacity and It\'s Functioning', '', '', 0, 0, 0, '2020-04-18 10:55:10'),
(35, 0, '', 3, 'How to Use Our Sense Organ for Remembering', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(36, 0, '', 3, 'The Art of Meditation', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(37, 0, '', 3, 'The Art of Concentration', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(38, 0, '', 3, 'The Art of Attention', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(39, 0, '', 3, 'To Know the Process of Memory in Brain', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(40, 0, '', 3, 'Why Do We Forgetting?', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(41, 0, '', 3, 'Storage and Transfer of STM to LTM', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(42, 0, '', 3, 'How to Train the Memory', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(43, 0, '', 3, 'Mnemonics Technique for Remembering', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(44, 0, '', 3, 'How to Convert the Numbers Into Words', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(45, 0, '', 3, 'How to Develop the Right Brain', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(46, 0, '', 3, 'Neurobics for the Brain', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(47, 0, '', 3, 'The Benefits of Yoga for Studying', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(48, 0, '', 3, 'Importance of Aim in Student\'s Life', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(49, 0, '', 3, 'How to Get the Success in Our Aim', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(50, 0, '', 3, 'How to Prepare Good Notes', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(51, 0, '', 3, 'Brain Mapping and Flow Chart for Notes', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(52, 0, '', 3, 'Time Management for Studying', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(53, 0, '', 3, 'Good Atmosphere for Studying', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(54, 0, '', 3, 'Golden Tips for Studying ', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(55, 0, '', 3, 'Platinum Tips for the Examinations', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(56, 0, '', 3, 'Role of the Parent\'s for Students', '', '', 0, 0, 0, '2020-01-20 06:50:21'),
(84, 0, '', 0, '', '', '', 0, 0, 0, '2020-01-20 06:58:59'),
(85, 1, '2', 5, 'test', 'MCQ\'s.pdf', 'MCQ\'s.pdf', 1, 0, 0, '2020-03-02 09:39:14'),
(86, 1, '2', 2, 'Testing', 'ansCopy1.pdf', 'ansCopy1.pdf', 1, 0, 0, '2020-04-18 11:59:20'),
(87, 1, '2', 2, 'Testing', 'ansCopy2.pdf', 'ansCopy2.pdf', 1, 0, 0, '2020-04-18 11:59:22'),
(88, 1, '2', 2, 'Testing', 'ansCopy.pdf', 'Ch_1_Real_Numbers.pdf', 1, 0, 0, '2020-03-10 09:29:52'),
(89, 4, '3', 8, 'Test1', 'Google_Maps_API_Documentation.pdf', 'Google_Maps_API_Documentation1.pdf', 0, 0, 0, '2020-04-07 10:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_name`, `active`, `created_date`) VALUES
(1, 1, 'Visakhapatnam', 0, '2020-04-15 01:11:57'),
(2, 1, 'Vijayawada', 0, '2020-04-15 01:11:57'),
(3, 1, 'Guntur', 0, '2020-04-15 01:11:57'),
(4, 1, 'Nellore', 0, '2020-04-15 01:11:57'),
(5, 1, 'Kurnool', 0, '2020-04-15 01:11:57'),
(6, 1, 'Kakinada', 0, '2020-04-15 01:11:57'),
(7, 1, 'Rajamahendravaram', 0, '2020-04-15 01:11:57'),
(8, 1, 'Kadapa', 0, '2020-04-15 01:11:57'),
(9, 1, 'Tirupati', 0, '2020-04-15 01:11:57'),
(10, 1, 'Eluru', 0, '2020-04-15 01:11:57'),
(11, 1, 'Ongole', 0, '2020-04-15 01:15:49'),
(12, 1, 'Anantapur', 0, '2020-04-15 01:15:49'),
(13, 1, 'Vizianagaram', 0, '2020-04-15 01:15:49'),
(14, 1, 'Tenali', 0, '2020-04-15 01:15:49'),
(15, 1, 'Proddatur', 0, '2020-04-15 01:15:49'),
(16, 1, 'Nandyal', 0, '2020-04-15 01:15:49'),
(17, 1, 'Adoni', 0, '2020-04-15 01:15:49'),
(18, 1, 'Madanapalle', 0, '2020-04-15 01:15:49'),
(19, 1, 'Machilipatnam', 0, '2020-04-15 01:15:49'),
(20, 1, 'Chittoor', 0, '2020-04-15 01:15:49'),
(21, 1, 'Hindupur', 0, '2020-04-15 01:15:49'),
(22, 1, 'Bhimavaram', 0, '2020-04-15 01:15:49'),
(23, 1, 'Srikakulam', 0, '2020-04-15 01:15:49'),
(24, 1, 'Anakapalle', 0, '2020-04-15 01:15:49'),
(25, 2, 'Bordumsa', 0, '2020-04-16 14:00:35'),
(26, 2, 'Tawang', 0, '2020-04-16 14:11:53'),
(27, 2, 'Itanagar', 0, '2020-04-16 14:11:53'),
(28, 2, 'Bhismaknagar', 0, '2020-04-16 14:11:53'),
(29, 2, 'Pasighat', 0, '2020-04-16 14:11:53'),
(30, 2, 'Dharampur', 0, '2020-04-16 14:11:53'),
(31, 2, 'Ziro', 0, '2020-04-16 14:11:53'),
(32, 2, 'Bomdila', 0, '2020-04-16 14:11:53'),
(33, 3, 'Dispur', 0, '2020-04-16 14:14:16'),
(34, 3, 'Guwahati', 0, '2020-04-16 14:14:16'),
(35, 3, 'Tezpur', 0, '2020-04-16 14:14:16'),
(36, 3, 'Dibrugarh', 0, '2020-04-16 14:14:16'),
(37, 3, 'Silchar', 0, '2020-04-16 14:14:16'),
(38, 3, 'North Lakhimpur', 0, '2020-04-16 14:14:16'),
(39, 4, 'Patna', 0, '2020-04-16 14:16:06'),
(40, 4, 'Gaya', 0, '2020-04-16 14:16:06'),
(41, 4, 'Biharsharif', 0, '2020-04-16 14:16:06'),
(42, 4, 'Darbhanga', 0, '2020-04-16 14:16:06'),
(43, 4, 'Bhagalpur', 0, '2020-04-16 14:16:06'),
(45, 6, 'Raipur', 0, '2020-04-16 14:19:45'),
(46, 6, 'Bilaspur', 0, '2020-04-16 14:19:45'),
(47, 6, 'Korba', 0, '2020-04-16 14:19:45'),
(48, 6, 'Durg-Bhilainagar', 0, '2020-04-16 14:19:45'),
(49, 6, 'Raigarh', 0, '2020-04-16 14:19:45'),
(50, 6, 'Rajnandgaon', 0, '2020-04-16 14:19:45'),
(51, 10, 'Panaji', 0, '2020-04-16 14:43:34'),
(52, 10, 'Vasco-da-Gama', 0, '2020-04-16 14:43:34'),
(53, 10, 'Ponda', 0, '2020-04-16 14:43:34'),
(54, 10, 'Margao', 0, '2020-04-16 14:43:34'),
(55, 10, 'Mapusa', 0, '2020-04-16 14:43:34'),
(56, 10, 'Goa Velha', 0, '2020-04-16 14:43:34'),
(57, 11, 'Gandhinagar', 0, '2020-04-16 14:46:19'),
(58, 11, 'Ahmedabad', 0, '2020-04-16 14:46:19'),
(59, 11, 'Surat', 0, '2020-04-16 14:46:19'),
(60, 11, 'Rajkot', 0, '2020-04-16 14:46:19'),
(61, 11, 'Junagadh', 0, '2020-04-16 14:46:19'),
(62, 11, 'Vadodara', 0, '2020-04-16 14:46:19'),
(63, 12, 'Chandigarh', 0, '2020-04-16 14:49:43'),
(64, 12, 'Faridabad', 0, '2020-04-16 14:49:43'),
(65, 12, 'Gurgaon', 0, '2020-04-16 14:49:43'),
(66, 12, 'Sonipat', 0, '2020-04-16 14:49:43'),
(67, 12, 'Panipat', 0, '2020-04-16 14:49:43'),
(68, 12, 'Ambala', 0, '2020-04-16 14:49:43'),
(69, 13, 'Shimla', 0, '2020-04-16 14:52:07'),
(70, 13, 'Dharamshala', 0, '2020-04-16 14:52:07'),
(71, 13, 'Mandi', 0, '2020-04-16 14:52:07'),
(72, 13, 'Solan', 0, '2020-04-16 14:52:07'),
(73, 13, 'Bilaspur', 0, '2020-04-16 14:52:07'),
(74, 13, 'Chamba', 0, '2020-04-16 14:52:07'),
(75, 15, 'Ranchi', 0, '2020-04-16 14:54:19'),
(76, 15, 'Bokaro Steel City', 0, '2020-04-16 14:54:19'),
(77, 15, 'Jamshedpur', 0, '2020-04-16 14:55:41'),
(78, 15, 'Deoghar', 0, '2020-04-16 14:55:41'),
(79, 15, 'Hazaribagh', 0, '2020-04-16 14:55:41'),
(80, 15, 'Dhanbad', 0, '2020-04-16 14:55:41'),
(81, 16, 'Mysore', 0, '2020-04-16 14:58:28'),
(82, 16, 'Davangere', 0, '2020-04-16 14:58:28'),
(83, 16, 'Mangalore', 0, '2020-04-16 14:58:28'),
(84, 16, 'Hubli-Dharwad', 0, '2020-04-16 14:58:28'),
(85, 16, 'Belgaum', 0, '2020-04-16 14:58:28'),
(86, 16, 'Banaglore', 0, '2020-04-16 14:58:41'),
(87, 17, 'Thiruvananthapuram', 0, '2020-04-16 15:01:01'),
(88, 17, 'Kochi', 0, '2020-04-16 15:01:01'),
(89, 17, 'Kozhikode', 0, '2020-04-16 15:01:01'),
(90, 17, 'Thrissur', 0, '2020-04-16 15:01:01'),
(91, 17, 'Malappuram', 0, '2020-04-16 15:01:01'),
(92, 20, 'Bhopal', 0, '2020-04-16 15:02:49'),
(93, 20, 'Indore', 0, '2020-04-16 15:02:50'),
(94, 20, 'Gwalior', 0, '2020-04-16 15:02:50'),
(95, 20, 'Jabalpur', 0, '2020-04-16 15:02:50'),
(96, 20, 'Ujjain', 0, '2020-04-16 15:02:50'),
(97, 20, 'Sagar', 0, '2020-04-16 15:02:50'),
(98, 21, 'Mumbai', 0, '2020-04-16 15:04:53'),
(99, 21, 'Pune', 0, '2020-04-16 15:04:53'),
(100, 21, 'Nagpur', 0, '2020-04-16 15:04:53'),
(101, 21, 'Nashik', 0, '2020-04-16 15:04:53'),
(102, 21, 'Aurangabad', 0, '2020-04-16 15:04:53'),
(103, 21, 'Solapur', 0, '2020-04-16 15:04:53'),
(104, 22, 'Imphal', 0, '2020-04-16 15:07:56'),
(105, 22, 'Bishnupur', 0, '2020-04-16 15:07:56'),
(106, 22, 'Ukhrul', 0, '2020-04-16 15:09:33'),
(107, 22, 'Tamenglong', 0, '2020-04-16 15:09:33'),
(108, 22, 'Chandel', 0, '2020-04-16 15:09:33'),
(109, 22, 'Senapati', 0, '2020-04-16 15:09:33'),
(110, 23, 'Shillong', 0, '2020-04-16 15:11:22'),
(111, 23, 'Cherrapunji', 0, '2020-04-16 15:11:22'),
(112, 23, 'Tura', 0, '2020-04-16 15:11:22'),
(113, 23, 'Jowai', 0, '2020-04-16 15:11:22'),
(114, 23, 'Baghmara', 0, '2020-04-16 15:11:22'),
(115, 23, 'Nongpoh', 0, '2020-04-16 15:11:22'),
(116, 24, 'Aizawl', 0, '2020-04-16 15:13:40'),
(117, 24, 'Lunglei', 0, '2020-04-16 15:13:40'),
(118, 24, 'Serchhip', 0, '2020-04-16 15:13:40'),
(119, 24, 'Champhai', 0, '2020-04-16 15:13:40'),
(120, 24, 'Tuipang', 0, '2020-04-16 15:13:40'),
(121, 24, 'Mamit', 0, '2020-04-16 15:13:40'),
(122, 25, 'Kohima', 0, '2020-04-16 15:16:06'),
(123, 25, 'Tuensang', 0, '2020-04-16 15:16:06'),
(124, 25, 'Zunheboto', 0, '2020-04-16 15:16:06'),
(125, 25, 'Mokokchung', 0, '2020-04-16 15:16:06'),
(126, 25, 'Kiphire Sadar', 0, '2020-04-16 15:16:06'),
(127, 25, 'Phek', 0, '2020-04-16 15:16:06'),
(128, 26, 'Bhubaneswar', 0, '2020-04-16 15:17:53'),
(129, 26, 'Rourkela', 0, '2020-04-16 15:17:53'),
(130, 26, 'Cuttack', 0, '2020-04-16 15:17:53'),
(131, 26, 'Brahmapur', 0, '2020-04-16 15:17:53'),
(132, 26, 'Puri', 0, '2020-04-16 15:17:54'),
(133, 26, 'Sambalpur', 0, '2020-04-16 15:17:54'),
(134, 28, 'Chandigarh', 0, '2020-04-16 15:20:18'),
(135, 28, 'Amritsar', 0, '2020-04-16 15:20:18'),
(136, 28, 'Jalandhar', 0, '2020-04-16 15:20:18'),
(137, 28, 'Ludhiana', 0, '2020-04-16 15:20:18'),
(138, 28, 'Patiala', 0, '2020-04-16 15:20:18'),
(139, 28, 'Kapurthala', 0, '2020-04-16 15:20:18'),
(140, 29, 'Jaipur', 0, '2020-04-16 15:23:05'),
(141, 29, 'Bikaner', 0, '2020-04-16 15:23:05'),
(142, 29, 'Jaisalmer', 0, '2020-04-16 15:23:05'),
(143, 29, 'Jodhpur', 0, '2020-04-16 15:23:05'),
(144, 29, 'Udaipur', 0, '2020-04-16 15:23:05'),
(145, 29, 'Ajmer', 0, '2020-04-16 15:23:05'),
(146, 30, 'Gangtok', 0, '2020-04-16 15:24:42'),
(147, 30, 'Namchi', 0, '2020-04-16 15:29:24'),
(148, 30, 'Gyalshing', 0, '2020-04-16 15:29:24'),
(149, 30, 'Mangan', 0, '2020-04-16 15:29:24'),
(150, 30, 'Rabdentse', 0, '2020-04-16 15:29:24'),
(151, 31, 'Chennai', 0, '2020-04-16 15:27:28'),
(152, 31, 'Tiruchirappalli', 0, '2020-04-16 15:30:04'),
(153, 31, 'Madurai', 0, '2020-04-16 15:30:05'),
(154, 31, 'Erode', 0, '2020-04-16 15:30:05'),
(155, 31, 'Vellore', 0, '2020-04-16 15:30:05'),
(156, 31, 'Coimbatore', 0, '2020-04-16 15:30:05'),
(157, 32, 'Hyderabad', 0, '2020-04-16 15:31:49'),
(158, 32, 'Warangal', 0, '2020-04-16 15:31:49'),
(159, 32, 'Nizamabad', 0, '2020-04-16 15:31:49'),
(160, 32, 'Karimnagar', 0, '2020-04-16 15:31:49'),
(161, 32, 'Adilabad', 0, '2020-04-16 15:31:49'),
(162, 32, 'Khammam', 0, '2020-04-16 15:31:49'),
(163, 33, 'Agartala', 0, '2020-04-16 15:35:25'),
(164, 33, 'Amarpur', 0, '2020-04-16 15:35:25'),
(165, 33, 'Kumarghat', 0, '2020-04-16 15:35:25'),
(166, 33, 'Udaipur', 0, '2020-04-16 15:35:25'),
(167, 33, 'Gakulnagar', 0, '2020-04-16 15:35:25'),
(168, 33, 'Kunjaban', 0, '2020-04-16 15:35:25'),
(169, 34, 'Lucknow', 0, '2020-04-16 15:37:35'),
(170, 35, 'Noida', 0, '2020-04-16 15:37:35'),
(171, 36, 'Varanasi', 0, '2020-04-16 15:37:35'),
(172, 37, 'Allahabad', 0, '2020-04-16 15:37:35'),
(173, 38, 'Agra', 0, '2020-04-16 15:37:35'),
(174, 39, 'Kanpur', 0, '2020-04-16 15:37:35'),
(175, 35, 'Dehradun', 0, '2020-04-16 15:40:36'),
(176, 35, 'Haridwar', 0, '2020-04-16 15:40:36'),
(177, 35, 'Roorkee', 0, '2020-04-16 15:40:36'),
(178, 35, 'Rishikesh', 0, '2020-04-16 15:40:36'),
(179, 35, 'Kashipur', 0, '2020-04-16 15:47:43'),
(180, 35, 'Haldwani', 0, '2020-04-16 15:40:36'),
(181, 36, 'Kolkata', 0, '2020-04-16 15:42:29'),
(182, 36, 'Darjeeling', 0, '2020-04-16 15:42:29'),
(183, 36, 'Siliguri', 0, '2020-04-16 15:42:29'),
(184, 36, 'Asansol', 0, '2020-04-16 15:42:29'),
(185, 36, 'Howrah', 0, '2020-04-16 15:42:29'),
(186, 36, 'Durgapur', 0, '2020-04-16 15:42:29'),
(187, 8, 'Daman', 0, '2020-04-16 15:46:33'),
(188, 19, 'Kavaratti', 0, '2020-04-16 15:46:33'),
(189, 9, 'Delhi', 0, '2020-04-16 15:48:16'),
(200, 27, 'Puducherry', 0, '2020-04-16 15:48:16'),
(201, 14, 'Jammu', 0, '2020-04-16 15:48:16'),
(202, 14, 'Srinagar', 0, '2020-04-16 15:48:16'),
(203, 18, 'Leh', 0, '2020-04-16 15:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `board_id`, `class_name`, `created_date`, `active`) VALUES
(1, 1, 'Extra', '2020-04-15 06:41:48', 0),
(2, 2, 'X', '2020-04-15 06:41:59', 0),
(3, 2, 'XI', '2020-04-15 06:42:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `comment_title` varchar(100) NOT NULL,
  `comment_details` text NOT NULL,
  `commented_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `firstname`, `comment_title`, `comment_details`, `commented_date`) VALUES
(1, 3, 'Zara', 'Real Numbers', 'What are real numbers', '2020-02-02 14:20:53'),
(2, 2, 'Asma', 'Polynomials', 'What are polynomials', '2020-02-02 14:29:20'),
(3, 2, 'Asma', 'testing', 'fdgf', '2020-02-25 10:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment_title` varchar(100) NOT NULL,
  `answer` text NOT NULL,
  `comment_reply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_reply`
--

INSERT INTO `comment_reply` (`id`, `comment_id`, `user_id`, `username`, `comment_title`, `answer`, `comment_reply_date`) VALUES
(1, 1, 2, 'Asma', 'Real Numbers', 'The type of number we normally use, such as 1, 15.82, ?0.1, 3/4, etc. Positive or negative, large or small, whole numbers or decimal numbers are all Real Numbers. They are called \"Real Numbers\" because they are not Imaginary Numbers.', '2020-02-02 14:21:15'),
(2, 2, 3, 'Zara', 'Polynomials', 'Polynomials are sums of terms of the form k?x?, where k is any number and n is a positive integer. For example, 3x+2x-5 is a polynomial. Introduction to polynomials. This video covers common terminology like terms, degree, standard form, monomial, binomial and trinomial.', '2020-02-02 14:35:19'),
(3, 2, 1, 'Admin', 'Polynomials', 'a polynomial is an expression consisting of variables (also called indeterminates) and coefficients, that involves only the operations of addition, subtraction, multiplication, and non-negative integer exponents of variables', '2020-02-02 15:04:49'),
(4, 1, 1, 'Admin', 'Real Numbers', 'fdgfh', '2020-02-02 15:34:07'),
(5, 1, 1, 'Admin', 'Real Numbers', 'sdaf', '2020-02-02 15:36:10'),
(6, 2, 1, 'Admin', 'Polynomials', 'fdsgdfh', '2020-02-02 15:38:51'),
(7, 2, 1, 'Admin', 'Polynomials', 'fdsgdfh', '2020-02-02 15:39:15'),
(8, 2, 1, 'Admin', 'Polynomials', 'dfdgf', '2020-02-02 15:40:08'),
(9, 2, 1, 'Admin', 'Polynomials', 'dfdgf', '2020-02-02 15:40:32'),
(10, 2, 1, 'Admin', 'Polynomials', 'dsfsd', '2020-02-02 15:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `class_id` varchar(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_img` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `board_id`, `class_id`, `course_name`, `course_img`, `price`, `active`, `created_date`) VALUES
(1, 1, '2', 'Mathematics', 'maths.jpg', 0, 0, '2020-01-06 10:19:26'),
(2, 1, '2', 'Science', 'science.png', 0, 0, '2020-01-06 10:19:30'),
(3, 4, '3', 'MGSH', 'mgsh.png', 1, 0, '2020-04-07 14:01:07'),
(4, 4, '3', 'MGLH', 'mglh.jpg', 399, 0, '2020-04-07 14:01:09'),
(5, 1, '2', 'Biology', '', 399, 0, '2020-02-24 07:22:42'),
(6, 1, '2', 'Chemistry', '', 399, 0, '2020-04-07 13:15:58'),
(8, 4, '3', 'Test', '', 0, 1, '2020-04-07 14:15:56'),
(9, 2, '2', 'Test', 'img_avatar21.png', 0, 0, '2020-04-15 08:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `img`, `price`, `is_active`) VALUES
(1, 'Mathematics', 'Real Numbers, Algorithms', 'b1.jpg', 100, 0),
(2, 'Science', 'Dissection', 'b2.jpg', 100, 0),
(3, 'Excel', 'Basic, Advance', 'b3.jpg', 100, 0),
(4, 'English', 'Test', '', 100, 1),
(5, 'Hindi', 'test1', '', 100, 0),
(6, 'Kannada', 'test2', '', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(11) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `typeofpaper` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`id`, `grade`, `course`, `typeofpaper`, `year`, `file`, `created_date`, `active`) VALUES
(1, 'X', 'Mathematics', 'Previous Question Paper', 2018, 'ansCopy.pdf', '0000-00-00 00:00:00', 1),
(2, 'X', 'Mathematics', 'Previous Question Paper', 2011, 'Email_Template.docx', '2020-04-07 11:31:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `extracoursecheckout`
--

CREATE TABLE `extracoursecheckout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `Payment_Id` varchar(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extracoursecheckout`
--

INSERT INTO `extracoursecheckout` (`id`, `user_id`, `course_name`, `price`, `txn_id`, `Payment_Id`, `payment_date`, `exp_date`, `status`, `created_date`) VALUES
(1, 2, 'MGSH', '1', 23562333, '0', '2020-03-27 12:13:56', '2020-03-22 22:46:58', 1, '2020-03-27 17:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `fee_id` int(11) NOT NULL,
  `board_id` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`fee_id`, `board_id`, `class_id`, `subject`, `fees`, `duration`, `discount`, `active`) VALUES
(1, '1', 1, 'Full Course', '399', 'Yearly', 0, 0),
(2, '2', 2, 'Full Course', '1100', 'Yearly', 0, 0),
(3, '2', 2, 'Test only', '399', 'Quaterly', 0, 0),
(4, '2', 2, 'Full Course', '11000', 'Yearly', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_img` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_img`) VALUES
(1, 'img1.jpeg'),
(2, 'img2.jpeg'),
(3, 'img3.jpeg'),
(4, 'img4.jpeg'),
(5, 'img5.jpeg'),
(6, 'img6.jpeg'),
(7, 'img1.jpeg'),
(8, 'img2.jpeg'),
(9, 'img3.jpeg'),
(10, 'img4.jpeg'),
(11, 'img5.jpeg'),
(12, 'img6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_address` varchar(100) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`id`, `user_id`, `relation`, `guardian_name`, `guardian_address`, `phone_number`, `email`) VALUES
(1, 2, 'Mother', 'Urusa', 'No.82, K V Layout, 30th Cross Rd, LIC Colony, 4th Block, Jayanagar,', '8892753436', 'urusa@gmail.com'),
(2, 3, 'Brother', 'Yaseen', 'Jayanagar 3rd Block East', '8892753436', 'myj619@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `help_center`
--

CREATE TABLE `help_center` (
  `id` int(11) NOT NULL,
  `title_body` varchar(100) NOT NULL,
  `title_content` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mock_test_papers`
--

CREATE TABLE `mock_test_papers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mock_test_papers`
--

INSERT INTO `mock_test_papers` (`id`, `title`, `file_name`, `created_date`, `status`) VALUES
(1, 'Mathematics', 'Ch_1_Real Numbers.pdf', '2020-03-10 09:56:21', 0),
(2, 'Introduction', 'Historical_Statement.pdf', '2020-03-10 09:58:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myself`
--

CREATE TABLE `myself` (
  `id` int(11) NOT NULL,
  `gallery_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myself`
--

INSERT INTO `myself` (`id`, `gallery_img`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '20150515_1250212.jpg'),
(8, '20160102_1724532.jpg'),
(9, '20171121_1050272.jpg'),
(10, '20150308182020_0012.jpg'),
(11, '201506021913262.jpg'),
(12, 'BeautyPlusMe_20180125112258_save2.jpg'),
(13, 'BeautyPlusMe_20180127212546_save2.jpg'),
(14, 'BeautyPlusMe_20180201110248_save2.jpg'),
(15, 'Copy_of_IMG_20150209_0918372.jpg'),
(16, 'Copy_of_IMG_20150515_101942212_HDR2.jpg'),
(17, 'Copy_of_IMG_20150926_1257482.jpg'),
(18, 'Copy_of_IMG_20150926_125949.jpg'),
(19, 'Copy_of_IMG_20150926_130208.jpg'),
(20, 'Copy_of_IMG_20150926_1303162.jpg'),
(21, 'Copy_of_IMG_20150927_1701542.jpg'),
(22, 'Copy_of_IMG_20150927_170154_14435535735482.jpg'),
(23, 'Copy_of_IMG_20151024_193900.jpg'),
(24, 'Copy_of_IMG_20151024_194420.jpg'),
(25, 'Copy_of_IMG_20160716_001644.jpg'),
(26, 'Copy_of_IMG_20160716_002313.jpg'),
(27, 'Copy_of_IMG_20160724_191601.jpg'),
(28, 'Copy_of_IMG_20160817_195648.jpg'),
(29, 'Copy_of_IMG_20160817_195859.jpg'),
(30, 'IMG_20150515_102302555_HDR_(1).jpg'),
(31, 'IMG_20150515_102302555_HDR.jpg'),
(32, 'IMG_20150926_130035.jpg'),
(33, 'IMG_20150926_130208.jpg'),
(34, 'IMG_20150926_130229.jpg'),
(35, 'IMG_20160715_201649.jpg'),
(36, 'IMG_20160716_001644.jpg'),
(37, 'IMG_20160716_002313.jpg'),
(38, 'IMG_20160717_161600_1470026458972.jpg'),
(39, 'IMG_20160718_003534.jpg'),
(40, 'IMG_20160718_003540.jpg'),
(41, 'IMG_20170504_082659.jpg'),
(42, 'IMG_20170509_090929.jpg'),
(43, 'IMG_20170525_120639.jpg'),
(44, 'IMG_20170525_120643.jpg'),
(45, 'IMG_20170602_081752.jpg'),
(46, 'IMG_20170626_162456.jpg'),
(47, 'IMG_20170902_114219.jpg'),
(48, 'IMG_20170910_155913.jpg'),
(49, 'IMG_20170911_175344.jpg'),
(50, 'IMG_20170911_192238_(1).jpg'),
(51, 'IMG_20170911_192238.jpg'),
(52, 'IMG_20170911_192424.jpg'),
(53, 'IMG_20170911_192855.jpg'),
(54, 'IMG_20170911_221827.jpg'),
(55, 'IMG_20170911_221837.jpg'),
(56, 'IMG_20170912_101740.jpg'),
(57, 'IMG_20170917_135615.jpg'),
(58, 'IMG_20171008_193744.jpg'),
(59, 'IMG_20171019_102924.jpg'),
(60, 'IMG_20171019_102928.jpg'),
(61, 'IMG_20171106_065807.jpg'),
(62, 'IMG_20171106_072750.jpg'),
(63, 'IMG_20171106_072814.jpg'),
(64, 'IMG_20171106_072933.jpg'),
(65, 'IMG_20171106_072937.jpg'),
(66, 'IMG_20171106_072947.jpg'),
(67, '7.jpg'),
(68, 'IMG_20171106_073029.jpg'),
(69, 'IMG_20171106_073040_(1).jpg'),
(70, 'IMG_20171106_073040.jpg'),
(71, 'IMG_20171121_090935.jpg'),
(72, 'IMG_20171121_091715.jpg'),
(73, 'IMG_20171121_091727.jpg'),
(74, 'IMG_20171121_091728.jpg'),
(75, 'IMG_20171121_092528.jpg'),
(76, 'IMG_20171121_092537.jpg'),
(77, 'IMG_20171121_092540.jpg'),
(78, 'IMG_20171121_130227.jpg'),
(79, 'IMG_20171121_131150.jpg'),
(80, 'IMG_20171122_064717.jpg'),
(81, 'IMG_20180419_231236.jpg'),
(82, 'IMG_20180419_231241.jpg'),
(83, 'IMG_20180419_234245.jpg'),
(84, 'IMG_20180420_005502.jpg'),
(85, 'IMG_20180420_212236.jpg'),
(86, 'IMG_20180420_213045.jpg'),
(87, 'IMG_20180420_220959.jpg'),
(88, 'IMG_20180421_174526.jpg'),
(89, 'IMG_20180421_174553.jpg'),
(90, 'IMG_20180421_174619.jpg'),
(91, 'IMG_20180421_174641.jpg'),
(92, 'IMG_20180421_174653.jpg'),
(93, 'IMG_20180422_220351.jpg'),
(94, 'IMG_20180422_220358.jpg'),
(95, 'IMG_20180422_220405.jpg'),
(96, 'IMG_20180422_231016.jpg'),
(97, 'IMG_20180422_231017.jpg'),
(98, 'IMG_20180422_231031.jpg'),
(99, 'IMG_20180422_231312.jpg'),
(100, 'IMG_20180422_231316.jpg'),
(101, 'IMG_20180621_094942.jpg'),
(102, 'IMG_20180621_095003.jpg'),
(103, 'IMG_20180621_095015.jpg'),
(104, 'IMG_20180630_113703.jpg'),
(105, 'IMG_20180703_102518.jpg'),
(106, 'IMG_20180703_102619.jpg'),
(107, 'IMG_20180703_103255.jpg'),
(108, 'IMG_20180712_121150.jpg'),
(109, 'IMG_20180804_092122.jpg'),
(110, 'IMG_20180810_115104.jpg'),
(111, 'IMG_20180810_115110.jpg'),
(112, 'IMG_20180811_130813.jpg'),
(113, 'IMG_20180811_131244.jpg'),
(114, 'IMG_20180822_213259.jpg'),
(115, 'IMG_20180909_191033.jpg'),
(116, 'IMG_20180914_132114.jpg'),
(117, 'IMG_20180917_100325.jpg'),
(118, 'IMG_20180921_160706.jpg'),
(119, 'IMG_20180925_135216.jpg'),
(120, 'IMG_20181109_190420.jpg'),
(121, 'IMG_20181114_113543.jpg'),
(122, 'IMG_20181114_113638.jpg'),
(123, 'IMG_20181128_194957.jpg'),
(124, 'IMG_20181128_195008.jpg'),
(125, 'IMG_20181128_195014.jpg'),
(126, 'IMG_20181205_134609.jpg'),
(127, 'IMG_20181206_092124.jpg'),
(128, 'IMG_20190121_163501.jpg'),
(129, 'IMG_20190127_104741.jpg'),
(130, 'IMG_20190127_104743.jpg'),
(131, 'IMG_20190226_135624.jpg'),
(132, 'IMG_20190301_112715.jpg'),
(133, 'IMG_20190311_113256.jpg'),
(134, 'IMG_20190311_120600.jpg'),
(135, 'IMG_20190311_140148.jpg'),
(136, 'IMG_20190311_140216.jpg'),
(137, 'IMG_20190311_140354.jpg'),
(138, 'IMG_20190311_140356.jpg'),
(139, 'IMG_20190311_140549.jpg'),
(140, 'IMG_20190311_162826.jpg'),
(141, 'IMG-20170303-WA0007_(1).jpg'),
(142, 'IMG-20170303-WA0007.jpg'),
(143, 'IMG-20170304-WA0025.jpg'),
(144, 'IMG-20170308-WA0011.jpg'),
(145, 'IMG-20170317-WA0009.jpg'),
(146, 'IMG-20170317-WA0010.jpg'),
(147, 'IMG-20170616-WA0004.jpg'),
(148, 'IMG-20170901-WA0005.jpg'),
(149, 'IMG-20170901-WA0006.jpg'),
(150, 'IMG-20170901-WA0007.jpg'),
(151, 'IMG-20171023-WA0001.jpg'),
(152, 'IMG-20171109-WA0055_(1).jpg'),
(153, 'IMG-20171109-WA0055.jpg'),
(154, 'IMG-20171109-WA0156.jpg'),
(155, 'IMG-20171109-WA0157.jpg'),
(156, 'IMG-20171109-WA0180.jpg'),
(157, 'IMG-20171109-WA0187.jpg'),
(158, 'IMG-20171109-WA0261.jpg'),
(159, 'IMG-20171109-WA0276.jpg'),
(160, 'IMG-20171109-WA0308.jpg'),
(161, 'IMG-20180822-WA0077.jpg'),
(162, 'IMG-20180822-WA0079.jpg'),
(163, 'IMG-20181202-WA0000.jpg'),
(164, 'IMG-20181214-WA0014.jpg'),
(165, 'IMG-20190328-WA0008.jpg'),
(166, 'IMG-20190413-WA0038.jpg'),
(167, 'IMG-20190413-WA0039.jpg'),
(168, 'IMG-20190413-WA0171.jpg'),
(169, 'IMG-20190413-WA0184.jpg'),
(170, 'IMG-20190413-WA0190.jpg'),
(171, 'IMG-20190413-WA0207.jpg'),
(172, 'IMG-20190413-WA0245.jpg'),
(173, 'img1489039106341.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `message`) VALUES
(1, '50% Discount on all courses... Grab the opportunity!!!'),
(2, '<b>Important!!</b><div>50% Discount</div><div><br></div>');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_attempt`
--

CREATE TABLE `no_of_attempt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `noofattempt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_of_attempt`
--

INSERT INTO `no_of_attempt` (`id`, `user_id`, `chapter_id`, `noofattempt`) VALUES
(1, 2, 2, 1),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `Payment_Id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `name`, `contact`, `email`, `address`, `city`, `state`, `zip`, `book_id`, `amount`, `txn_id`, `Payment_Id`, `status`, `active`, `purchase_date`) VALUES
(1, 'AsmaSultana', '9164690169', 'umme94@gmail.com', 'JP Nagar', 'Bangalore', 'Karnataka', 560078, 1, 399, 0, '', '', 0, '2020-02-22 14:56:05'),
(2, 'Umme', '8618287735', 'asmasultana377@gmail.com', 'Jayanagar', 'Bangalore', 'Karnataka', 560011, 1, 399, 0, '', '', 0, '2020-02-22 15:34:37'),
(3, 'Chaitra', '9164690169', 'chaitra@gmail.com', 'RBI Layout', 'Bangalore', 'Karnataka', 560078, 2, 399, 0, '', '', 0, '2020-02-22 15:47:18'),
(4, 'AsmaSultana', '8618287735', 'umme94@gmail.com', 'Flat No. 720, Ascot Block,\r\nRaja Aristos, Doddakamnahalli Road', 'Bangalore', 'Karnataka', 560076, 3, 399, 0, '', '', 0, '2020-02-22 15:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exp_date` datetime NOT NULL,
  `Payment_Id` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `plan_name`, `plan_amount`, `user_id`, `txn_id`, `payment_date`, `exp_date`, `Payment_Id`, `status`) VALUES
(1, 'Full Course', 1100, 2, 78531808, '2020-03-27 16:16:53', '2020-03-26 16:12:19', 'pay_EG91zyAbwPBCc2', 1),
(2, 'Test only', 399, 3, 89247108, '2020-03-02 16:49:47', '2020-02-11 11:52:23', '', 1),
(4, 'Full Course', 1100, 9, 61644355, '2020-03-04 11:42:18', '2021-03-04 11:42:18', 'pay_EO72jXYMa1jEhg', 1),
(5, 'Full Course', 0, 13, 0, '2020-07-05 16:54:08', '2021-07-05 16:54:08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `pimg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answer` varchar(100) NOT NULL,
  `weightage_marks` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `course_id`, `chapter_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `weightage_marks`, `active`) VALUES
(1, 1, 1, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1950s', 'b', 1, 0),
(2, 1, 1, 'What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'b', 1, 0),
(3, 1, 1, '\'OS\' computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'c', 1, 0),
(4, 1, 1, 'In which decade with the first transatlantic radio broadcast occur?', '1850s', '1860s', '1870s', '1900s', 'd', 1, 0),
(5, 1, 1, '\'.MOV\' extension refers usually to what kind of file?', 'Image file', 'Animation/movie file', 'Audio file', 'MS Office document', 'b', 1, 0),
(6, 1, 1, 'Grand Central Terminal, Park Avenue, New York is the world\'s', 'largest railway station', 'highest railway station', 'longest railway station', 'None of the above', 'a', 1, 0),
(7, 1, 1, 'Entomology is the science that studies', 'Behavior of human beings', 'Insects', 'The origin and history of technical and scientific terms', 'The formation of rocks', 'b', 1, 0),
(8, 1, 1, '	 Eritrea, which became the 182nd member of the UN in 1993, is in the continent of', 'Asia', 'Africa', 'Europe', 'Australia', 'b', 1, 0),
(9, 1, 1, 'Garampani sanctuary is located at', 'Junagarh, Gujarat', 'Diphu, Assam', 'Kohima, Nagaland', 'Gangtok, Sikkim', 'b', 1, 0),
(10, 1, 1, '	 For which of the following disciplines is Nobel Prize awarded?', 'Physics and Chemistry', 'Physiology or Medicine', 'Literature, Peace and Economics', '	All of the above', 'd', 1, 0),
(11, 1, 1, 'test', '1', '2', '3', '4', 'c', 1, 0),
(12, 0, 3, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1900s', 'd', 1, 0),
(13, 0, 3, 'In which decade with the first transatlantic radio broadcast occur?', '1850s', '1860s', '1870s', '1900s', 'c', 1, 0),
(14, 0, 13, '', '', '', '', '', 'c', 1, 0),
(15, 0, 7, '', '', '', '', '', 'd', 1, 0),
(16, 0, 14, '<p>fdgfd</p>\r\n', '', '', '', '', 'a', 1, 0),
(17, 0, 11, '<p>&nbsp;</p>\r\n\r\n<p>a)[-141-30-;73-;9]b)???-;63-;52-;3-;11', '<p>&nbsp;</p>\r\n\r\n<p>a)[-141-30-;73-;9]b)???-;63-;52-;3-;11', '<p>&nbsp;</p>\r\n\r\n<p>A=[5&minus;92&minus;27&minus;7&minus;311]=[a11a21a12a22a13a23a14a24]</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>I1=[1],I2=[1001],I3=???100010001???</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>u=???6002&minus;20&minus;572???L=???6&minus;2100&minus;29002???U=[62&minus;50&mi', 'a', 1, 0),
(18, 0, 19, '<p>gfnhf h</p>\r\n', '<p>fhgbgb</p>\r\n', '<p>bgfhh</p>\r\n', '<p>tyryjuy,</p>\r\n', '<p>ytyjjuy</p>\r\n', 'b', 1, 1),
(19, 0, 12, 'Select the unit vector in the direction of \\vec{v}=\\left( -8, 5 \\right) \r\nv\r\n =(?8,5)v, with, vector, on top, equals, left parenthesis, minus, 8, comma, 5, right parenthesis.', '<p>(&minus;889?1?,589?1?)</p>\r\n', '<p>(&minus;589?1?,889?1?)</p>\r\n', '<p>(&minus;89?8?,89?5?)</p>\r\n', '<p>(889??,589??)</p>\r\n', 'b', 1, 0),
(20, 0, 2, '<p>$$ {Select the unit vector in the direction of&nbsp;\\vec{v}=\\left( -8, 5 \\right)v=(&minus;8,5)v, with, vector, on top, equals, left parenthesis, minus, 8, comma, 5, right parenthesis.</strong>} $$</p>\r\n', '<p>$$ {\\left( {-\\dfrac{1}{8\\sqrt{89}}} ,{\\dfrac{1}{5\\sqrt{89}}}\\right)(&minus;889?1?,589?1?)} $$</p>\r\n', '<p>$$ {\\left( {-\\dfrac{1}{5\\sqrt{89}}} ,{\\dfrac{1}{8\\sqrt{89}}}\\right)(&minus;589?1?,889?1?)} $$</p>\r\n', '<p>$$ {\\left( {-\\dfrac{8}{\\sqrt{89}}} ,{\\dfrac{5}{\\sqrt{89}}}\\right)(&minus;89?8?,89?5?)} $$</p>\r\n', '<p>$$ {\\left( \\dfrac{\\sqrt{89}}{8} ,\\dfrac{\\sqrt{89}}{5}\\right)(889??,589??)} $$</p>\r\n', 'a', 1, 0),
(21, 0, 5, '<p>$$ {Select the unit vector in the direction of&nbsp;\\vec{v}=\\left( -8, 5 \\right)v=(&minus;8,5)v, with, vector, on top, equals, left parenthesis, minus, 8, comma, 5, right parenthesis.</strong>} $$</p>\r\n', '<p>$${(&minus;889?1?,589?1?)}$$</p>\r\n', '<p>$${(&minus;589?1?,889?1?)}$$</p>\r\n', '<p>$${&minus;589?1?,889?1}$$</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>$${\\left( \\dfrac{\\sqrt{89}}{8} ,\\dfrac{\\sqrt{89}}{5}\\right)(889??,589??)}$$</p>\r\n', 'a', 1, 0),
(22, 0, 6, '<p>Select the unit vector in the direction of $$\\vec{v}=\\left( -8, 5 \\right) $$</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>$$\\left( {-\\dfrac{1}{8\\sqrt{89}}} ,{\\dfrac{1}{5\\sqrt{89}}}\\right)$$</p>\r\n', '<p>$$ \\left( {-\\dfrac{1}{5\\sqrt{89}}} ,{\\dfrac{1}{8\\sqrt{89}}}\\right) $$</p>\r\n', '<p>$$ \\left( {-\\dfrac{8}{\\sqrt{89}}} ,{\\dfrac{5}{\\sqrt{89}}}\\right)$$</p>\r\n', '<p>$$ \\left( \\dfrac{\\sqrt{89}}{8} ,\\dfrac{\\sqrt{89}}{5}\\right) $$</p>\r\n', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizstatus`
--

CREATE TABLE `quizstatus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `quiz_status` int(11) NOT NULL,
  `completed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `q_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `q_answer` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acitve` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`q_id`, `course_id`, `chapter_id`, `question_id`, `q_answer`, `user_id`, `acitve`, `created_date`) VALUES
(1, 1, 1, 20, 'undefined', 2, 0, '2020-04-18 12:00:02'),
(2, 1, 2, 3, 'undefined', 2, 0, '2020-04-18 12:00:07'),
(3, 1, 3, 7, 'undefined', 2, 0, '2020-04-18 12:00:17'),
(4, 1, 4, 11, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(5, 1, 5, 10, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(6, 1, 6, 5, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(7, 1, 7, 8, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(8, 1, 8, 2, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(9, 1, 9, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(10, 1, 10, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(11, 1, 11, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(12, 1, 12, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(13, 1, 13, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(14, 1, 14, 1, 'undefined', 2, 0, '2020-04-18 12:00:25'),
(15, 1, 15, 1, 'undefined', 2, 0, '2020-04-18 12:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact_phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `point_of_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `search_course`
--

CREATE TABLE `search_course` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `images` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_course`
--

INSERT INTO `search_course` (`id`, `title`, `description`, `images`, `price`, `is_active`) VALUES
(1, 'Mathematics', 'Real Numbers, Algorithms', 'b1.jpg', 100, 0),
(2, 'Science', 'Dissection', 'b2.jpg', 100, 0),
(3, 'Excel', 'Basic, Advance', 'b3.jpg', 100, 0),
(4, 'English', 'Test', '', 100, 1),
(5, 'Hindi', 'test1', '', 100, 0),
(6, 'Kannada', 'test2', '', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `section_content` text NOT NULL,
  `video_path` varchar(100) NOT NULL,
  `video_time` time NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `course_id`, `class_id`, `board_id`, `chapter_id`, `section_name`, `section_content`, `video_path`, `video_time`, `active`, `created_date`) VALUES
(1, 1, 2, 1, 1, 'Elucid Lemma', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta eius enim inventoreus optio ratione veritatis. Beatae deserunt illum ipsam magniima mollitia officiis quia tempora!', '1_Euclid\'s Division Lemma.mp4', '00:04:50', 0, '2020-03-02 09:48:51'),
(2, 1, 2, 1, 1, 'The Fundamental Theorem of Arithmetic', '', '2_The Fundamental Theorem of Arithmetic.mp4', '00:04:11', 0, '2020-03-03 07:05:19'),
(3, 1, 2, 1, 1, 'Revisiting Irrational Numbers', '', '3_Revisiting Irrational Numbers.mp4', '00:01:50', 0, '2020-03-03 07:05:40'),
(4, 1, 2, 1, 1, 'Revisiting Rational Numbers and Their Decimal Expansions', '', '4_Revisiting Rational Numbers and Their Decimal Expansions.mp4', '00:03:50', 0, '2020-03-03 07:05:44'),
(5, 1, 2, 1, 1, 'Use of Euclid Divison Algorithm', '', '5_Use of Euclid Divison Algorithm.mp4', '00:02:32', 0, '2020-03-03 07:05:48'),
(6, 1, 2, 1, 1, 'Prime Factorization Of Numbers', '', '6_Prime Factorization Of Numbers.mp4', '00:00:53', 0, '2020-03-03 07:05:51'),
(7, 1, 2, 1, 1, 'Application of Euclids Division Lemma', '', '7_Application of Euclids Division Lemma.mp4', '00:02:06', 0, '2020-03-03 07:05:54'),
(8, 1, 2, 1, 2, 'Geometrical Meaning of the Zeroes of a Polynomial', '', '', '00:00:00', 0, '2020-01-27 13:19:28'),
(9, 1, 2, 1, 2, 'Relationship between Zeroes and Coefficients of a Polynomial', '', '', '00:04:19', 0, '2020-01-20 00:59:28'),
(10, 1, 2, 1, 2, 'Division Algorithm for Polynomials', '', '', '00:02:44', 0, '2020-01-20 00:59:56'),
(11, 1, 2, 1, 2, 'Division Of Polynomials With Other Polynomials By Long Division Method-I', '', '', '00:01:20', 0, '2020-01-20 01:01:09'),
(12, 1, 2, 1, 2, ' Division Of Polynomials With Other Polynomials By Long Division Method-II', '', '', '00:01:41', 0, '2020-01-20 01:01:45'),
(13, 1, 2, 1, 2, 'Finding Divisor Using Division Algorithm', '', '', '00:01:51', 0, '2020-01-20 01:02:11'),
(14, 1, 2, 1, 3, 'Pair of linear equation in Two Variables', '', '', '00:02:05', 0, '2020-01-20 01:18:59'),
(15, 1, 2, 1, 3, 'Graphical Method of Solution of a Pair of Linear Equations', '', '', '00:02:23', 0, '2020-01-20 01:20:37'),
(16, 1, 2, 1, 3, 'Algebraic Methods of Solving a Pair of Linear Equations', '', '', '00:07:26', 0, '2020-01-20 01:20:37'),
(17, 1, 2, 1, 3, 'Equations Reducible to a Pair of Linear Equations in Two Variables', '', '', '00:01:49', 0, '2020-01-20 01:23:42'),
(18, 1, 2, 1, 3, 'Elimination Method To Solve A Pair Of Linear Equations', '', '', '00:01:35', 0, '2020-01-20 01:23:42'),
(19, 1, 2, 1, 3, 'Elimination Method To Solve A Pair Of Linear Equations-II', '', '', '00:02:18', 0, '2020-01-20 01:23:42'),
(20, 1, 2, 1, 3, 'Graphical Solution Of A Pair Of Linear Equations  In Two Variables', '', '', '00:02:02', 0, '2020-01-20 01:23:42'),
(21, 1, 2, 1, 3, 'Possibilities on Plotting a Pair of Linear Equations', '', '', '00:02:25', 0, '2020-01-20 01:23:42'),
(22, 1, 2, 1, 4, 'Quadratic Equations', '', '', '00:02:17', 0, '2020-01-20 01:29:24'),
(23, 1, 2, 1, 4, 'Examples of Quadratic Equations', '', '', '00:03:21', 0, '2020-01-20 01:29:24'),
(24, 1, 2, 1, 4, 'Solution of a Quadratic Equation by Factorisation', '', '', '00:07:44', 0, '2020-01-20 01:29:24'),
(25, 1, 2, 1, 4, 'Solution of a Quadratic Equation by Completing the Square', '', '', '00:03:47', 0, '2020-01-20 01:29:24'),
(26, 1, 2, 1, 4, 'Nature of Roots', '', '', '00:03:18', 0, '2020-01-20 01:29:24'),
(27, 1, 2, 1, 5, 'Arithmetic Progressions', '', '', '00:02:22', 0, '2020-01-20 02:09:44'),
(28, 1, 2, 1, 5, 'nth Term of an Arithmetic Progression', '', '', '00:02:11', 0, '2020-01-20 02:09:44'),
(29, 1, 2, 1, 5, 'Sum of First n Terms of an AP', '', '', '00:02:08', 0, '2020-01-20 02:09:44'),
(30, 1, 2, 1, 5, 'nth Term Of An Arithmetic Progression', '', '', '00:01:09', 0, '2020-01-20 02:09:44'),
(31, 1, 2, 1, 5, 'nth Term Of An Arithmetic Progression_1', '', '', '00:02:09', 0, '2020-01-20 02:09:44'),
(32, 1, 2, 1, 5, 'nth Term Of An Arithmetic Progression_2', '', '', '00:02:04', 0, '2020-01-20 02:09:44'),
(33, 1, 2, 1, 5, 'nth Term Of An Arithmetic Progression_3', '', '', '00:01:48', 0, '2020-01-20 02:09:44'),
(34, 1, 2, 1, 5, 'Use Of Formula For Sum Of n Terms Of An Arithmetic Progression-I', '', '', '00:02:03', 0, '2020-01-20 02:09:44'),
(35, 1, 2, 1, 5, 'Use Of Formula For Sum Of n Terms Of An Arithmetic Progression-II', '', '', '00:02:04', 0, '2020-01-20 02:09:44'),
(36, 1, 2, 1, 6, 'Coordinate Geometry', '', '', '00:03:03', 0, '2020-01-20 02:14:51'),
(37, 1, 2, 1, 6, 'Distance Formula', '', '', '00:06:01', 0, '2020-01-20 02:14:51'),
(38, 1, 2, 1, 6, 'Section Formula', '', '', '00:05:09', 0, '2020-01-20 02:14:51'),
(39, 1, 2, 1, 6, 'Area of Triangle', '', '', '00:03:56', 0, '2020-01-20 02:14:51'),
(40, 1, 2, 1, 6, 'Example of Distance Formula', '', '', '00:01:48', 0, '2020-01-20 02:14:51'),
(41, 1, 2, 1, 6, 'Example of Section Formula-I', '', '', '00:01:46', 0, '2020-01-20 02:14:51'),
(42, 1, 2, 1, 6, ' Example of Section Formula-II', '', '', '00:02:02', 0, '2020-01-20 02:14:51'),
(43, 1, 2, 1, 7, 'Similar Figures', '', '', '00:03:53', 0, '2020-01-20 02:18:51'),
(44, 1, 2, 1, 7, 'Similarity of Triangles', '', '', '00:04:32', 0, '2020-01-20 02:18:51'),
(45, 1, 2, 1, 7, 'Criteria for Similarity of Triangles', '', '', '00:02:47', 0, '2020-01-20 02:18:51'),
(46, 1, 2, 1, 7, 'Criteria for Similarity of Triangles -II', '', '', '00:03:08', 0, '2020-01-20 02:18:51'),
(47, 1, 2, 1, 7, 'Areas of Similar Triangles', '', '', '00:04:28', 0, '2020-01-20 02:18:51'),
(48, 1, 2, 1, 7, 'Pythagoras Theorem', '', '', '00:03:28', 0, '2020-01-20 02:18:51'),
(49, 1, 2, 1, 8, ' Circles', '', '', '00:01:00', 0, '2020-01-20 02:27:23'),
(50, 1, 2, 1, 8, 'Tangent to a Circle', '', '', '00:02:04', 0, '2020-01-20 02:27:23'),
(51, 1, 2, 1, 8, 'Two tangents parallel to a given secant', '', '', '00:02:45', 0, '2020-01-20 02:27:23'),
(52, 1, 2, 1, 8, 'Number of Tangents from a Point on a Circle', '', '', '00:00:55', 0, '2020-01-20 02:27:23'),
(53, 1, 2, 1, 8, ' Lengths Of Tangents', '', '', '00:01:50', 0, '2020-01-20 02:27:23'),
(54, 1, 2, 1, 8, 'Tangents Drawn From An External Point To A Circle', '', '', '00:02:00', 0, '2020-01-20 02:27:23'),
(55, 1, 2, 1, 8, ' Concept Of Tangent At Any Point Of The Circle', '', '', '00:02:13', 0, '2020-01-20 02:27:23'),
(56, 1, 2, 1, 9, 'Division of a Line Segment', '', '', '00:03:10', 0, '2020-01-20 02:31:44'),
(57, 1, 2, 1, 9, 'Examples of  Division of a Line Segment', '', '', '00:01:24', 0, '2020-01-20 02:31:44'),
(58, 1, 2, 1, 9, 'Construct a triangle similar to a given triangle', '', '', '00:01:57', 0, '2020-01-20 02:31:44'),
(59, 1, 2, 1, 9, 'Construct a triangle similar to a given triangle_part 2', '', '', '00:01:45', 0, '2020-01-20 02:31:44'),
(60, 1, 2, 1, 9, 'Construct the Tangents to a Circle', '', '', '00:01:53', 0, '2020-01-20 02:31:44'),
(61, 1, 2, 1, 9, 'Some more examples', '', '', '00:01:13', 0, '2020-01-20 02:31:44'),
(62, 1, 2, 1, 10, 'Trigonometric Ratios', '', '', '00:03:20', 0, '2020-01-20 02:35:31'),
(63, 1, 2, 1, 10, ' Trigonometric Ratios of Some Specific Angles', '', '', '00:02:47', 0, '2020-01-20 02:35:31'),
(64, 1, 2, 1, 10, 'Trigonometric Ratios of Complementary Angles', '', '', '00:02:55', 0, '2020-01-20 02:35:31'),
(65, 1, 2, 1, 10, 'Trigonometric Ratios of Complementary Angles-II', '', '', '00:02:17', 0, '2020-01-20 02:35:31'),
(66, 1, 2, 1, 10, 'Trigonometric Identities', '', '', '00:03:53', 0, '2020-01-20 02:35:31'),
(67, 1, 2, 1, 10, 'Examples of Trigonometric Identities', '', '', '00:03:18', 0, '2020-01-20 02:35:31'),
(68, 1, 2, 1, 11, 'Height and Distance', '', '', '00:04:03', 0, '2020-01-20 02:38:17'),
(69, 1, 2, 1, 11, 'Examples of Angle of Elevation', '', '', '00:03:13', 0, '2020-01-20 02:38:17'),
(70, 1, 2, 1, 11, 'Examples of Angle of Depression', '', '', '00:04:10', 0, '2020-01-20 02:38:17'),
(71, 1, 2, 1, 11, 'Example of Height and distance - I', '', '', '00:02:46', 0, '2020-01-20 02:38:17'),
(72, 1, 2, 1, 11, 'Example of Height and distance - II', '', '', '00:01:42', 0, '2020-01-20 02:38:17'),
(73, 1, 2, 1, 12, 'Circle', '', '', '00:01:12', 0, '2020-01-20 02:42:30'),
(74, 1, 2, 1, 12, 'Perimeter and Area of Circle', '', '', '00:02:48', 0, '2020-01-20 02:42:30'),
(75, 1, 2, 1, 12, 'Application of Area of Circle', '', '', '00:01:23', 0, '2020-01-20 02:42:30'),
(76, 1, 2, 1, 12, 'Application of Circumference of Circle', '', '', '00:01:54', 0, '2020-01-20 02:42:30'),
(77, 1, 2, 1, 12, 'Areas of Sector and Segment of a Circle', '', '', '00:02:55', 0, '2020-01-20 02:42:30'),
(78, 1, 2, 1, 12, 'Areas of Combinations of Plane Figures', '', '', '00:02:16', 0, '2020-01-20 02:42:30'),
(79, 1, 2, 1, 12, 'Example of Areas of Combinations', '', '', '00:02:02', 0, '2020-01-20 02:42:30'),
(80, 1, 2, 1, 13, 'Surface Area of a Combination of Solids', '', '', '00:01:30', 0, '2020-01-20 02:50:25'),
(81, 1, 2, 1, 13, 'Examples of Combination of Solids', '', '', '00:03:31', 0, '2020-01-20 02:50:25'),
(82, 1, 2, 1, 13, 'Volume of a Combination of Solids', '', '', '00:03:16', 0, '2020-01-20 02:50:25'),
(83, 1, 2, 1, 13, 'Conversion of Solid from One Shape to Another', '', '', '00:03:22', 0, '2020-01-20 02:50:25'),
(84, 1, 2, 1, 13, 'Frustum of a Cone', '', '', '00:03:00', 0, '2020-01-20 02:50:25'),
(85, 1, 2, 1, 14, 'Mean of Grouped Data', '', '', '00:05:57', 0, '2020-01-20 02:53:14'),
(86, 1, 2, 1, 14, 'Mode of Grouped Data', '', '', '00:02:56', 0, '2020-01-20 02:53:14'),
(87, 1, 2, 1, 14, 'Median of Grouped Data', '', '', '00:03:43', 0, '2020-01-20 02:53:14'),
(88, 1, 2, 1, 14, ' Example of the median of grouped data', '', '', '00:02:30', 0, '2020-01-20 02:53:14'),
(89, 1, 2, 1, 14, 'Graphical Representation of Cumulative Frequency Distribution', '', '', '00:02:42', 0, '2020-01-20 02:53:14'),
(90, 1, 2, 1, 15, 'Probability - A Theoretical Approach_1', '', '', '00:03:45', 0, '2020-01-20 02:58:58'),
(91, 1, 2, 1, 15, 'Examples of equally likely or not equally likely outcomes', '', '', '00:02:58', 0, '2020-01-20 02:58:58'),
(92, 1, 2, 1, 15, 'Examples of Probability - I', '', '', '00:02:51', 0, '2020-01-20 02:58:58'),
(93, 1, 2, 1, 15, 'Terms of Probability', '', '', '00:01:41', 0, '2020-01-20 02:58:58'),
(94, 1, 2, 1, 15, 'Some more example of probability', '', '', '00:04:05', 0, '2020-01-20 02:58:58'),
(95, 1, 2, 1, 15, 'Example of Probability - II', '', '', '00:00:37', 0, '2020-01-20 02:58:58'),
(96, 1, 2, 1, 15, 'Application of Probability', '', '', '00:00:54', 0, '2020-01-20 02:58:58'),
(97, 1, 2, 1, 15, 'Example of Probability - III', '', '', '00:01:10', 0, '2020-01-20 02:58:58'),
(98, 2, 2, 1, 16, 'CHEMICAL CHANGES', '', '', '00:00:00', 0, '2020-01-27 13:31:30'),
(99, 2, 2, 1, 16, 'BALANCED CHEMICAL EQUATIONS', '', '', '00:02:32', 0, '2020-01-20 03:06:06'),
(100, 2, 2, 1, 16, 'COMBINATION REACTIONS', '', '', '00:01:23', 0, '2020-01-20 03:06:06'),
(101, 2, 2, 1, 16, 'DECOMPOSITION REACTIONS', '', '', '00:03:57', 0, '2020-01-20 03:06:06'),
(102, 2, 2, 1, 16, 'DISPLACEMENT REACTIONS', '', '', '00:02:06', 0, '2020-01-20 03:06:06'),
(103, 2, 2, 1, 16, ' OXIDATION AND REDUCTION', '', '', '00:02:25', 0, '2020-01-20 03:06:06'),
(104, 2, 2, 1, 16, 'CORROSION', '', '', '00:01:46', 0, '2020-01-20 03:06:06'),
(105, 2, 2, 1, 16, 'RANCIDITY', '', '', '00:00:45', 0, '2020-01-20 03:06:06'),
(106, 2, 2, 1, 17, 'ACIDS AND BASES ', '', '', '00:01:23', 0, '2020-01-20 03:16:48'),
(107, 2, 2, 1, 17, ' ACIDS AND BASES IN THE LABORATORY', '', '', '00:02:28', 0, '2020-01-20 03:16:48'),
(108, 2, 2, 1, 17, 'REACTIONS OF ACIDS AND BASE WITH METALS', '', '', '00:00:59', 0, '2020-01-20 03:16:48'),
(109, 2, 2, 1, 17, 'REACTION OF METAL CARBONATE AND METAL BICARBONATE WITH ACIDS', '', '', '00:01:11', 0, '2020-01-20 03:16:48'),
(110, 2, 2, 1, 17, 'REACTION OF METALLIC OXIDES WITH ACIDS', '', '', '00:00:32', 0, '2020-01-20 03:16:48'),
(111, 2, 2, 1, 17, 'ACTION OF ACIDS OR BASES IN WATER SOLUTION', '', '', '00:00:55', 0, '2020-01-20 03:16:48'),
(112, 2, 2, 1, 17, 'BAKING SODA', '', '', '00:01:18', 0, '2020-01-20 03:16:48'),
(113, 2, 2, 1, 17, 'BLEACHING POWDER', '', '', '00:00:34', 0, '2020-01-20 03:16:48'),
(114, 2, 2, 1, 17, 'DO ALL ACIDS AND BASES PRODUCE HYDROGEN IONS?', '', '', '00:00:39', 0, '2020-01-20 03:16:48'),
(115, 2, 2, 1, 17, 'IMPORTANCE OF pH IN EVERYDAY LIFE', '', '', '00:02:52', 0, '2020-01-20 03:16:48'),
(116, 2, 2, 1, 17, 'NEUTRALIZATION REACTION ', '', '', '00:01:03', 0, '2020-01-20 03:16:48'),
(117, 2, 2, 1, 17, 'pH ', '', '', '00:01:18', 0, '2020-01-20 03:16:48'),
(118, 2, 2, 1, 17, 'PLASTER OF PARIS', '', '', '00:01:15', 0, '2020-01-20 03:16:48'),
(119, 2, 2, 1, 17, 'SODIUM HYDROXIDE', '', '', '00:01:25', 0, '2020-01-20 03:16:48'),
(120, 2, 2, 1, 17, 'THE ARRHENIUS THEORY', '', '', '00:00:29', 0, '2020-01-20 03:16:48'),
(121, 2, 2, 1, 17, 'THE BRONSTED-LOWRY', '', '', '00:00:49', 0, '2020-01-20 03:16:48'),
(122, 2, 2, 1, 17, 'WASHING SODA', '', '', '00:00:58', 0, '2020-01-20 03:16:48'),
(123, 2, 2, 1, 17, 'WATER OF CRYSTALLIZATION', '', '', '00:58:00', 0, '2020-01-20 03:16:48'),
(124, 2, 2, 1, 18, 'Conditions Necessary for the Rusting of Iron', '', '', '00:00:59', 0, '2020-01-20 04:55:53'),
(125, 2, 2, 1, 18, ' Corrosion', '', '', '00:03:14', 0, '2020-01-20 04:55:53'),
(126, 2, 2, 1, 18, 'Electricity Conduction in Ionic Compounds - I', '', '', '00:00:37', 0, '2020-01-20 04:55:53'),
(127, 2, 2, 1, 18, ' Electricity Conduction in Ionic Compounds - II', '', '', '00:00:29', 0, '2020-01-20 04:55:53'),
(128, 2, 2, 1, 18, 'Electrolytic Refining of Metals', '', '', '00:01:16', 0, '2020-01-20 04:55:53'),
(129, 2, 2, 1, 18, ' Extraction of metals at the top of the activity series', '', '', '00:00:35', 0, '2020-01-20 04:55:53'),
(130, 2, 2, 1, 18, 'Extraction of metals in the middle of the activity series', '', '', '00:00:53', 0, '2020-01-20 04:55:53'),
(131, 2, 2, 1, 18, 'Extraction of metals low in the activity series', '', '', '00:00:47', 0, '2020-01-20 04:55:53'),
(132, 2, 2, 1, 18, 'Ionic Compounds', '', '', '00:01:15', 0, '2020-01-20 04:55:53'),
(133, 2, 2, 1, 18, 'Melting Points and Boiling Points of Ionic Compounds', '', '', '00:00:36', 0, '2020-01-20 04:55:53'),
(134, 2, 2, 1, 18, 'Occurrence of metals', '', '', '00:00:30', 0, '2020-01-20 04:55:53'),
(135, 2, 2, 1, 18, 'Physical Properties of metals', '', '', '00:02:41', 0, '2020-01-20 04:55:53'),
(136, 2, 2, 1, 18, 'Physical properties of non-metals', '', '', '00:00:40', 0, '2020-01-20 04:55:53'),
(137, 2, 2, 1, 18, 'Properties of Ionic Compounds', '', '', '00:01:02', 0, '2020-01-20 04:55:53'),
(138, 2, 2, 1, 18, 'Reaction of Metals and Non-metals with Air', '', '', '00:01:42', 0, '2020-01-20 04:55:53'),
(139, 2, 2, 1, 18, 'Reaction of metals with Acids', '', '', '00:00:44', 0, '2020-01-20 04:55:53'),
(140, 2, 2, 1, 18, ' Reaction of Metals with Solutions of other Metal Salts', '', '', '00:00:50', 0, '2020-01-20 04:55:53'),
(141, 2, 2, 1, 18, 'Reaction of Metals with Water - I', '', '', '00:00:31', 0, '2020-01-20 04:55:53'),
(142, 2, 2, 1, 18, 'Reaction of Metals with Water - II', '', '', '00:00:41', 0, '2020-01-20 04:55:53'),
(143, 2, 2, 1, 18, 'Solubility of Ionic Compounds', '', '', '00:00:37', 0, '2020-01-20 04:55:53'),
(144, 2, 2, 1, 18, 'Thermit reactions', '', '', '00:00:36', 0, '2020-01-20 04:55:53'),
(145, 2, 2, 1, 19, 'Acetic Acid is a Weak Acid', '', '', '00:00:29', 0, '2020-01-20 05:11:51'),
(146, 2, 2, 1, 19, 'Addition reaction', '', '', '00:00:13', 0, '2020-01-20 05:11:51'),
(147, 2, 2, 1, 19, 'Allotropes of carbon', '', '', '00:02:25', 0, '2020-01-20 05:11:51'),
(148, 2, 2, 1, 19, 'Classification of hydrocarbons', '', '', '00:00:43', 0, '2020-01-20 05:11:51'),
(149, 2, 2, 1, 19, 'Combustion Reaction', '', '', '00:01:28', 0, '2020-01-20 05:11:51'),
(150, 2, 2, 1, 19, 'Covalent bond', '', '', '00:02:21', 0, '2020-01-20 05:11:51'),
(151, 2, 2, 1, 19, 'Detergents', '', '', '00:01:09', 0, '2020-01-20 05:11:51'),
(152, 2, 2, 1, 19, 'Esterification', '', '', '00:00:48', 0, '2020-01-20 05:11:51'),
(153, 2, 2, 1, 19, 'Ethanoic Acid', '', '', '00:00:33', 0, '2020-01-20 05:11:51'),
(154, 2, 2, 1, 19, ' Ethanol', '', '', '00:01:12', 0, '2020-01-20 05:11:51'),
(155, 2, 2, 1, 19, ' Functional Group', '', '00:00:44', '00:00:00', 0, '2020-01-20 05:11:51'),
(156, 2, 2, 1, 19, 'Homologous Series', '', '', '00:02:00', 0, '2020-01-20 05:11:51'),
(157, 2, 2, 1, 19, 'Isomerism', '', '', '00:00:57', 0, '2020-01-20 05:11:51'),
(158, 2, 2, 1, 19, 'IUPAC Name of Chlorine Compounds', '', '', '00:00:47', 0, '2020-01-20 05:11:51'),
(159, 2, 2, 1, 19, 'Lewis dotted Structure of Hydrocarbon', '', '', '00:01:52', 0, '2020-01-20 05:11:51'),
(160, 2, 2, 1, 19, 'Naming of Hydrocarbon', '', '', '00:02:39', 0, '2020-01-20 05:11:51'),
(161, 2, 2, 1, 19, ' Oxidation Reaction of Ethanol', '', '', '00:00:45', 0, '2020-01-20 05:11:51'),
(162, 2, 2, 1, 19, 'Reaction of Ethanoic Acid with Carbonates and Hydrogencarbonates', '', '', '00:00:42', 0, '2020-01-20 05:11:51'),
(163, 2, 2, 1, 19, 'Saponification', '', '', '00:00:25', 0, '2020-01-20 05:11:51'),
(164, 2, 2, 1, 19, 'Soap', '', '', '00:01:43', 0, '2020-01-20 05:11:51'),
(165, 2, 2, 1, 19, 'Substitution reaction', '', '', '00:00:28', 0, '2020-01-20 05:11:51'),
(166, 2, 2, 1, 19, 'Tetravalency of Carbon', '', '', '00:01:37', 0, '2020-01-20 05:11:51'),
(167, 2, 2, 1, 19, ' VERSATILE NATURE OF CARBON', '', '', '00:01:18', 0, '2020-01-20 05:11:51'),
(168, 2, 2, 1, 20, 'Atomic size ( Radius of the atom)', '', '', '00:00:33', 0, '2020-01-20 05:15:43'),
(169, 2, 2, 1, 20, 'Dobereiner\'s Triads Law', '', '', '00:01:16', 0, '2020-01-20 05:15:43'),
(170, 2, 2, 1, 20, 'Mendeleev\'s Periodic law', '', '', '00:02:17', 0, '2020-01-20 05:15:43'),
(171, 2, 2, 1, 20, 'Modern periodic law', '', '', '00:00:18', 0, '2020-01-20 05:15:43'),
(172, 2, 2, 1, 20, ' Newland\'s octaves', '', '', '00:01:04', 0, '2020-01-20 05:15:43'),
(173, 2, 2, 1, 20, 'Valence electrons and Valency', '', '', '00:01:17', 0, '2020-01-20 05:15:43'),
(174, 2, 2, 1, 21, ' Activity to show that carbon dioxide is necessary for photosynthesis', '', '', '00:01:10', 0, '2020-01-20 05:23:14'),
(175, 2, 2, 1, 21, 'Autotrophic Nutrition - I', '', '', '00:01:06', 0, '2020-01-20 05:23:14'),
(176, 2, 2, 1, 21, 'Autotrophic Nutrition - II', '', '', '00:00:45', 0, '2020-01-20 05:23:14'),
(177, 2, 2, 1, 21, 'Excretion in Human Beings', '', '', '00:01:55', 0, '2020-01-20 05:23:14'),
(178, 2, 2, 1, 21, 'Heterotrophic Nutrition - I', '', '', '00:01:34', 0, '2020-01-20 05:23:14'),
(179, 2, 2, 1, 21, 'Heterotrophic Nutrition - II', '', '', '00:01:07', 0, '2020-01-20 05:23:14'),
(180, 2, 2, 1, 21, 'Life Processes', '', '', '00:00:26', 0, '2020-01-20 05:23:14'),
(181, 2, 2, 1, 21, ' Nutrition', '', '', '00:00:44', 0, '2020-01-20 05:23:14'),
(182, 2, 2, 1, 21, 'Respiration - I', '', '', '00:01:29', 0, '2020-01-20 05:23:14'),
(183, 2, 2, 1, 21, 'Respiration - II', '', '', '00:01:15', 0, '2020-01-20 05:23:14'),
(184, 2, 2, 1, 21, 'Test for salivary amylase', '', '', '00:00:51', 0, '2020-01-20 05:23:14'),
(185, 2, 2, 1, 21, 'Test for starch', '', '', '00:01:19', 0, '2020-01-20 05:23:14'),
(186, 2, 2, 1, 21, 'Transportation - I', '', '', '00:01:03', 0, '2020-01-20 05:23:14'),
(187, 2, 2, 1, 21, 'Transportation in plants', '', '', '00:00:55', 0, '2020-01-20 05:23:14'),
(188, 2, 2, 1, 22, 'Central nervous system', '', '', '00:01:21', 0, '2020-01-20 05:30:19'),
(189, 2, 2, 1, 22, 'Control and Coordination', '', '', '00:01:02', 0, '2020-01-20 05:30:19'),
(190, 2, 2, 1, 22, 'Coordination in Plant - I', '', '', '00:00:42', 0, '2020-01-20 05:30:19'),
(191, 2, 2, 1, 22, 'Coordination in Plant - II', '', '', '00:00:51', 0, '2020-01-20 05:30:19'),
(192, 2, 2, 1, 22, 'Feedback mechanism of hormones in Animal', '', '', '00:01:41', 0, '2020-01-20 05:30:19'),
(193, 2, 2, 1, 22, 'Hormones in Animals', '', '', '00:01:29', 0, '2020-01-20 05:30:19'),
(194, 2, 2, 1, 22, 'Human brain', '', '', '00:00:47', 0, '2020-01-20 05:30:19'),
(195, 2, 2, 1, 22, ' Movement in Plants', '', '', '00:01:18', 0, '2020-01-20 05:30:19'),
(196, 2, 2, 1, 22, 'Reflex Action', '', '', '00:00:47', 0, '2020-01-20 05:30:19'),
(197, 2, 2, 1, 23, 'Asexual Reproduction - Budding', '', '', '00:00:40', 0, '2020-01-20 05:39:25'),
(198, 2, 2, 1, 23, ' Asexual Reproduction - Fission', '', '', '00:00:35', 0, '2020-01-20 05:39:25'),
(199, 2, 2, 1, 23, 'Asexual Reproduction - Fragmentation', '', '', '00:00:54', 0, '2020-01-20 05:39:25'),
(200, 2, 2, 1, 23, ' Asexual Reproduction - Regeneration', '', '', '00:00:34', 0, '2020-01-20 05:39:25'),
(201, 2, 2, 1, 23, 'Asexual Reproduction - Spore formation', '', '', '00:00:47', 0, '2020-01-20 05:39:25'),
(202, 2, 2, 1, 23, 'Female reproductive system', '', '', '00:01:28', 0, '2020-01-20 05:39:25'),
(203, 2, 2, 1, 23, 'Fertilization in Plants', '', '', '00:01:28', 0, '2020-01-20 05:39:25'),
(204, 2, 2, 1, 23, ' How do organisms reproduce', '', '', '00:00:45', 0, '2020-01-20 05:39:25'),
(205, 2, 2, 1, 23, 'Introduction to Sexual Reproduction', '', '', '00:00:33', 0, '2020-01-20 05:39:25'),
(206, 2, 2, 1, 23, 'Male reproductive system', '', '', '00:01:29', 0, '2020-01-20 05:39:25'),
(207, 2, 2, 1, 23, 'Reproduction in human beings', '', '', '00:00:32', 0, '2020-01-20 05:39:25'),
(208, 2, 2, 1, 23, 'Sexual reproduction in plants', '', '', '00:01:01', 0, '2020-01-20 05:39:25'),
(209, 2, 2, 1, 23, 'Vegetative Propagation', '', '', '00:00:58', 0, '2020-01-20 05:39:25'),
(210, 2, 2, 1, 24, 'Accumulation of variation during reproduction', '', '', '00:01:30', 0, '2020-01-20 06:00:40'),
(211, 2, 2, 1, 24, 'Acquired and Inherited Traits', '', '', '00:02:05', 0, '2020-01-20 06:00:40'),
(212, 2, 2, 1, 24, 'Evolution and Classification', '', '', '00:01:45', 0, '2020-01-20 06:00:40'),
(213, 2, 2, 1, 24, 'Evolution and progress', '', '', '00:01:33', 0, '2020-01-20 06:00:40'),
(214, 2, 2, 1, 24, 'Evolution', '', '', '00:02:32', 0, '2020-01-20 06:00:40'),
(215, 2, 2, 1, 24, ' Expression of traits', '', '', '00:02:47', 0, '2020-01-20 06:00:40'),
(216, 2, 2, 1, 24, 'Fossils and Evolution by Stages', '', '', '00:02:47', 0, '2020-01-20 06:00:40'),
(217, 2, 2, 1, 24, ' Inherited Traits', '', '', '00:02:22', 0, '2020-01-20 06:00:40'),
(218, 2, 2, 1, 24, 'Sex Determination', '', '', '00:01:28', 0, '2020-01-20 06:00:40'),
(219, 2, 2, 1, 24, 'Speciation', '', '', '00:01:13', 0, '2020-01-20 06:00:40'),
(220, 2, 2, 1, 25, ' Image formation by a Convex Mirror', '', '', '00:01:00', 0, '2020-01-20 05:57:09'),
(221, 2, 2, 1, 25, 'Image Formed by a Plane Mirror', '', '', '00:00:31', 0, '2020-01-20 05:57:09'),
(222, 2, 2, 1, 25, 'Image Formed by Concave Mirror', '', '', '00:00:57', 0, '2020-01-20 05:57:09'),
(223, 2, 2, 1, 25, 'Images formed by concave lens', '', '', '00:00:28', 0, '2020-01-20 05:57:09'),
(224, 2, 2, 1, 25, 'Images formed by convex lens', '', '', '00:01:05', 0, '2020-01-20 05:57:09'),
(225, 2, 2, 1, 25, 'Reflection of Light', '', '', '00:00:35', 0, '2020-01-20 05:57:09'),
(226, 2, 2, 1, 25, 'Refraction of Light through a Rectangular Glass Slab', '', '', '00:01:45', 0, '2020-01-20 05:57:09'),
(227, 2, 2, 1, 25, 'Refraction', '', '', '00:01:30', 0, '2020-01-20 05:57:09'),
(228, 2, 2, 1, 25, ' Representation of Images Formed by Spherical Mirrors Using Ray Diagrams', '', '', '00:01:18', 0, '2020-01-20 05:57:09'),
(229, 2, 2, 1, 25, 'Rules of Image formation', '', '', '00:00:47', 0, '2020-01-20 05:57:09'),
(230, 2, 2, 1, 25, ' Sign convention for spherical lenses', '', '', '00:01:17', 0, '2020-01-20 05:57:09'),
(231, 2, 2, 1, 25, 'Sign Convention, Notations, Mirror Formula and Magnification', '', '', '00:01:24', 0, '2020-01-20 05:57:09'),
(232, 2, 2, 1, 25, 'Spherical lenses', '', '', '00:00:50', 0, '2020-01-20 05:57:09'),
(233, 2, 2, 1, 25, 'Spherical mirror', '', '', '00:02:38', 0, '2020-01-20 05:57:09'),
(234, 2, 2, 1, 26, 'Advance sunrise and delayed sunset', '', '', '00:00:33', 0, '2020-01-20 06:03:19'),
(235, 2, 2, 1, 26, 'Colour of the Sun at Sunrise and Sunset', '', '', '00:02:28', 0, '2020-01-20 06:03:19'),
(236, 2, 2, 1, 26, 'DEFECTS OF VISION AND THEIR CORRECTION', '', '', '00:03:07', 0, '2020-01-20 06:03:19'),
(237, 2, 2, 1, 26, ' DISPERSION OF WHITE LIGHT BY A GLASS PRISM', '', '', '00:01:34', 0, '2020-01-20 06:03:19'),
(238, 2, 2, 1, 26, 'Power of Accommodation of Eye', '', '', '00:00:55', 0, '2020-01-20 06:03:19'),
(239, 2, 2, 1, 26, 'REFRACTION OF LIGHT THROUGH A PRISM', '', '', '00:02:33', 0, '2020-01-20 06:03:19'),
(240, 2, 2, 1, 26, 'The Human Eyes', '', '', '00:01:18', 0, '2020-01-20 06:03:19'),
(241, 2, 2, 1, 26, 'The Rainbow', '', '', '00:00:51', 0, '2020-01-20 06:03:19'),
(242, 2, 2, 1, 26, 'Twinkling of stars', '', '', '00:00:59', 0, '2020-01-20 06:03:19'),
(243, 2, 2, 1, 26, 'Tyndall Effect', '', '', '00:00:28', 0, '2020-01-20 06:03:19'),
(244, 2, 2, 1, 26, 'Why is the colour of the clear Sky Blue?', '', '', '00:00:41', 0, '2020-01-20 06:03:19'),
(245, 2, 2, 1, 27, ' ELECTRIC CURRENT AND CIRCUIT', '', '', '00:01:13', 0, '2020-01-20 06:07:54'),
(246, 2, 2, 1, 27, ' ELECTRIC POTENTIAL AND POTENTIAL DIFFERENCE', '', '', '00:01:35', 0, '2020-01-20 06:07:54'),
(247, 2, 2, 1, 27, 'Electrical Power', '', '', '00:01:24', 0, '2020-01-20 06:07:54'),
(248, 2, 2, 1, 27, 'FACTORS ON WHICH THE RESISTANCE OF A CONDUCTOR DEPENDS', '', '', '00:02:36', 0, '2020-01-20 06:07:54'),
(249, 2, 2, 1, 27, 'Heating effect of electric current', '', '', '00:03:30', 0, '2020-01-20 06:07:54'),
(250, 2, 2, 1, 27, 'OHM\'S LAW', '', '', '00:00:57', 0, '2020-01-20 06:07:54'),
(251, 2, 2, 1, 27, 'Resistance of a System of Resistors in Parallel', '', '', '00:02:38', 0, '2020-01-20 06:07:54'),
(252, 2, 2, 1, 27, 'RESISTANCE OF A SYSTEM OF RESISTORS IN SERIES', '', '', '00:03:46', 0, '2020-01-20 06:07:54'),
(253, 2, 2, 1, 27, 'Resistance', '', '', '00:01:43', 0, '2020-01-20 06:07:54'),
(254, 2, 2, 1, 28, ' Electric generator', '', '', '00:02:49', 0, '2020-01-20 06:15:21'),
(255, 2, 2, 1, 28, 'Electric motor', '', '', '00:02:49', 0, '2020-01-20 06:15:21'),
(256, 2, 2, 1, 28, 'ELECTROMAGNETIC INDUCTION', '', '', '00:03:45', 0, '2020-01-20 06:15:21'),
(257, 2, 2, 1, 28, 'Fleming\'s Right Hand Rule', '', '', '00:00:30', 0, '2020-01-20 06:15:21'),
(258, 2, 2, 1, 28, 'FORCE ON A CURRENT-CARRYING CONDUCTOR IN A MAGNETIC FIELD', '', '', '00:01:43', 0, '2020-01-20 06:15:21'),
(259, 2, 2, 1, 28, 'Magnetic Effects of Electric Current', '', '', '00:01:02', 0, '2020-01-20 06:15:21'),
(260, 2, 2, 1, 28, 'MAGNETIC FIELD AND FIELD LINES', '', '', '00:02:08', 0, '2020-01-20 06:15:21'),
(261, 2, 2, 1, 28, 'Magnetic Field due to a Current in a Solenoid', '', '', '00:01:20', 0, '2020-01-20 06:15:21'),
(262, 2, 2, 1, 28, ' Magnetic field due to a current through a circular loop', '', '', '00:00:58', 0, '2020-01-20 06:15:21'),
(263, 2, 2, 1, 28, 'Magnetic Field due to a Current through a Straight Conductor', '', '', '00:01:51', 0, '2020-01-20 06:16:04'),
(264, 2, 2, 1, 28, 'MAGNETIC FIELD DUE TO A CURRENT-CARRYING CONDUCTOR', '', '', '00:01:03', 0, '2020-01-20 06:17:41'),
(265, 2, 2, 1, 28, 'Right-Hand Thumb Rule', '', '', '00:00:40', 0, '2020-01-20 06:17:23'),
(266, 2, 2, 1, 29, ' Biomass energy', '', '', '00:01:13', 0, '2020-01-20 06:23:51'),
(267, 2, 2, 1, 29, 'Energy from the Sea', '', '', '00:01:16', 0, '2020-01-20 06:23:51'),
(268, 2, 2, 1, 29, 'Fossil Fuels', '', '', '00:01:00', 0, '2020-01-20 06:23:51'),
(269, 2, 2, 1, 29, 'Geothermal energy', '', '', '00:00:30', 0, '2020-01-20 06:23:51'),
(270, 2, 2, 1, 29, 'Hydro power plants', '', '', '00:01:11', 0, '2020-01-20 06:23:51'),
(271, 2, 2, 1, 29, 'Nuclear Energy', '', '', '00:01:25', 0, '2020-01-20 06:23:51'),
(272, 2, 2, 1, 29, 'Solar energy', '', '', '00:02:01', 0, '2020-01-20 06:23:51'),
(273, 2, 2, 1, 29, 'Sources of Energy', '', '', '00:00:53', 0, '2020-01-20 06:23:51'),
(274, 2, 2, 1, 29, 'Thermal power plants', '', '', '00:01:21', 0, '2020-01-20 06:23:51'),
(275, 2, 2, 1, 29, 'Wind energy', '', '', '00:01:00', 0, '2020-01-20 06:23:51'),
(276, 2, 2, 1, 30, ' Biological magnification', '', '', '00:01:29', 0, '2020-01-20 06:28:35'),
(277, 2, 2, 1, 30, ' Ecosystem and its Components', '', '', '00:02:03', 0, '2020-01-20 06:28:35'),
(278, 2, 2, 1, 30, 'Environment and waste', '', '', '00:01:13', 0, '2020-01-20 06:28:35'),
(279, 2, 2, 1, 30, 'Food Chain', '', '', '00:01:18', 0, '2020-01-20 06:28:35'),
(280, 2, 2, 1, 30, 'Food Web', '', '', '00:00:46', 0, '2020-01-20 06:28:35'),
(281, 2, 2, 1, 30, ' Ozone layer depletion', '', '', '00:01:39', 0, '2020-01-20 06:28:35'),
(282, 2, 2, 1, 31, ' Conservation of Water Resources - I', '', '', '00:00:47', 0, '2020-01-20 06:32:22'),
(283, 2, 2, 1, 31, 'Conservation of Water Resources - II', '', '', '00:00:43', 0, '2020-01-20 06:32:22'),
(284, 2, 2, 1, 31, 'Forests as Wild Life - I', '', '', '00:00:48', 0, '2020-01-20 06:32:22'),
(285, 2, 2, 1, 31, 'Forests as Wild Life - II', '', '', '00:01:07', 0, '2020-01-20 06:32:22'),
(286, 2, 2, 1, 31, 'Management of coal and petroleum', '', '', '00:01:17', 0, '2020-01-20 06:32:22'),
(287, 2, 2, 1, 31, 'Management of Natural Resources - I', '', '', '00:00:54', 0, '2020-01-20 06:32:22'),
(288, 2, 2, 1, 31, 'Management of Natural Resources - II', '', '', '00:01:09', 0, '2020-01-20 06:32:22'),
(289, 2, 2, 1, 31, 'Water Harvesting', '', '', '00:01:30', 0, '2020-01-20 06:32:22'),
(290, 1, 2, 1, 15, 'Testing', '', '3_Revisiting_Irrational_Numbers.mp4', '00:00:00', 1, '2020-03-10 09:05:06'),
(291, 1, 2, 1, 14, 'test', '', '1_Euclid_s-Division-Lemma1.webm', '00:00:00', 0, '2020-04-06 08:20:32'),
(292, 1, 2, 1, 87, 'test', '', 'videoplayback.mp4', '00:00:00', 0, '2020-04-06 09:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(6, 'Chhattisgarh'),
(8, 'Daman and Diu'),
(9, 'Delhi'),
(10, 'Goa'),
(11, 'Gujarat'),
(12, 'Haryana'),
(13, 'Himachal Pradesh'),
(14, 'Jammu and Kashmir'),
(15, 'Jharkhand'),
(16, 'Karnataka'),
(17, 'Kerala'),
(18, 'Ladakh'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `contact_phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `course_status` tinyint(4) NOT NULL,
  `completed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`id`, `user_id`, `class_id`, `course_id`, `chapter_id`, `course_status`, `completed_date`) VALUES
(1, 2, 2, 1, 1, 1, '2020-04-18 17:38:39'),
(2, 2, 2, 1, 2, 1, '2020-04-18 17:38:39'),
(3, 2, 2, 1, 3, 1, '2020-04-18 17:38:39'),
(4, 2, 2, 1, 4, 1, '2020-04-18 17:38:39'),
(5, 2, 2, 1, 5, 1, '2020-04-18 17:38:39'),
(6, 2, 2, 1, 6, 1, '2020-04-18 17:38:39'),
(7, 2, 2, 1, 7, 1, '2020-04-18 17:38:39'),
(8, 2, 2, 1, 8, 1, '2020-04-18 17:38:39'),
(9, 2, 2, 1, 9, 1, '2020-04-18 17:38:39'),
(10, 2, 2, 1, 10, 1, '2020-04-18 17:38:39'),
(11, 2, 2, 1, 11, 1, '2020-04-18 17:38:39'),
(12, 2, 2, 1, 12, 1, '2020-04-18 17:38:39'),
(13, 2, 2, 1, 13, 1, '2020-04-18 17:38:39'),
(14, 2, 2, 1, 14, 1, '2020-04-18 17:38:39'),
(15, 2, 2, 1, 15, 1, '2020-04-18 17:38:39'),
(16, 2, 2, 1, 1, 1, '2020-07-01 14:15:48'),
(17, 2, 2, 1, 1, 1, '2020-07-01 14:15:54'),
(18, 2, 2, 1, 1, 1, '2020-07-01 14:22:24'),
(19, 2, 2, 1, 1, 1, '2020-07-04 15:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `student_school_info`
--

CREATE TABLE `student_school_info` (
  `id` int(11) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `school_address` text NOT NULL,
  `pointofcontact` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `curriculum` varchar(100) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_accessed_time` datetime NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_school_info`
--

INSERT INTO `student_school_info` (`id`, `school_name`, `school_address`, `pointofcontact`, `board`, `grade`, `curriculum`, `medium`, `state`, `city`, `user_id`, `last_accessed_time`, `created_date`) VALUES
(2, 'IIT', 'Bannerghatta Road', '', 'CBSE', 'X', 'Full Course', 'English', '16', '86', 13, '2020-07-05 16:57:08', '2020-07-05 16:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `subjectwiseview`
--

CREATE TABLE `subjectwiseview` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `videolink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectwiseview`
--

INSERT INTO `subjectwiseview` (`id`, `user_id`, `file_name`, `videolink`) VALUES
(1, 1, 'SubjectWise View', 'https://www.youtube.com/embed/rD9PGi8hHvY');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `plan_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_amount` int(11) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`plan_id`, `board_id`, `class_id`, `plan_name`, `plan_amount`, `duration`, `discount`, `active`) VALUES
(1, 1, 2, 'Full Course', 1, 'Yearly', 10, 0),
(2, 1, 1, 'Test only', 1, 'Quaterly', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment_content` varchar(200) NOT NULL,
  `comment_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `stdId` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `verify_email` tinyint(4) DEFAULT NULL,
  `last_accessed_time` datetime DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `approve` int(4) NOT NULL,
  `deleteStudent` tinyint(4) NOT NULL,
  `extraCourseStatus` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `stdId`, `firstname`, `lastname`, `contact`, `email`, `password`, `code`, `role_id`, `verify_email`, `last_accessed_time`, `active`, `plan_name`, `status`, `approve`, `deleteStudent`, `extraCourseStatus`, `created_date`, `role`) VALUES
(1, 0, 'Admin', 'dhaji', '1234567890', 'admin@gmail.com', 'admin', '', 1, NULL, '2020-02-03 20:45:31', 0, '', 0, 0, 1, 0, '2020-02-03 20:45:31', 'Admin'),
(2, 0, 'Salma', 'Sultana', '9164690169', 'ummeasma9094@gmail.com', '5515', 'Ra4srFpOzgoM', 2, 1, '2020-03-04 11:40:51', 0, 'Full Course', 1, 1, 0, 0, '2020-02-28 09:53:16', ''),
(3, 1234, 'Umme', 'Sultana', '8618287735', 'student399@gmail.com', 'student', 'G6VO5eWSzFsb', 3, 1, '2020-02-03 16:23:54', 0, 'Full Course', 1, 1, 0, 0, '2020-02-03 16:22:12', ''),
(4, 0, 'Student', 'Student', '1234567890', 'student99@gmail.com', 'student', '4ybcJIRvketz', 2, 0, NULL, 0, '', 0, 0, 1, 0, '2020-02-21 10:18:09', ''),
(5, 0, 'Lijo', 'Mathew', '1234567890', 'lijo12@gmail.com', 'lijo@123', 'eHZPabjoB3nE', 2, 1, '2020-03-10 14:59:22', 0, '', 1, 1, 0, 0, '2020-02-21 10:23:25', ''),
(6, 0, 'ASMA', 'SULTANA', '1234567890', 'stude99@gmail.com', 'asma', 'IbHl1AC6wxcN', 2, 0, NULL, 0, '', 1, 1, 0, 0, '2020-02-21 10:24:21', ''),
(7, 0, 'ASMA', 'SULTANA', '1234567890', 'asma@gmail.com', '5305', 'ungONbLea8Dw', 2, 0, NULL, 0, '', 1, 0, 0, 0, '2020-02-21 10:25:55', ''),
(8, 0, 'Asma', 'Sultana', '1234567890', 'umme94@gmail.com', 'asma1234', 'gZqdeX9lStP7', 2, 1, '2020-03-03 21:18:36', 0, '', 1, 1, 0, 0, '2020-02-21 10:58:21', ''),
(10, 4278, 'Zara', 'Fathima', '1234325467', 'asmasultana377@gmail.com', '1899', 'zPcjFafDutQR', 2, 1, NULL, 0, 'Test Only', 0, 0, 1, 0, '2020-03-11 19:10:55', ''),
(12, 0, 'Test', 'test', '1234567890', 'test@gmail.com', 'test1234', 'r3nZgpHxw54M', 2, 1, '2020-04-10 16:45:12', 0, 'Full Course', 1, 1, 0, 0, '2020-04-10 13:14:38', ''),
(13, 0, 'Chaitra', 'R', '1234567890', 'asma.arsc@gmail.com', 'asma1234', '7bFUCWwBKQ1J', 2, 1, '2020-07-05 16:57:08', 0, 'Full Course', 1, 1, 0, 0, '2020-07-05 16:54:08', ''),
(15, 2875, 'Asma', 'Sultana', '9164690169', 'haniarsc8@gmail.com', 'asma1234', 'Zekbqc7xLCH1', 2, 1, NULL, 0, '', 0, 0, 0, 0, '2021-06-02 16:57:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_details` text NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`id`, `user_id`, `cart_details`, `active`) VALUES
(1, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(2, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(3, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(4, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(5, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(6, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(7, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(8, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1),
(9, 9, '{\"31412e89425a75eca1d85b13a3800a60\":{\"id\":\"prd01\",\"image\":\"Chicken_Thigh_Boneless.jpg\",\"name\":\"Chicken Thigh\",\"type\":\"Mince\",\"weight\":\"500\",\"price\":350,\"qty\":1,\"rowid\":\"31412e89425a75eca1d85b13a3800a60\",\"subtotal\":350},\"c4ca4238a0b923820dcc509a6f75849b\":{\"id\":\"1\",\"name\":\"Mathematics\",\"price\":100,\"qty\":5,\"rowid\":\"c4ca4238a0b923820dcc509a6f75849b\",\"subtotal\":500},\"c81e728d9d4c2f636f067f89cc14862c\":{\"id\":\"2\",\"name\":\"Science\",\"price\":100,\"qty\":4,\"rowid\":\"c81e728d9d4c2f636f067f89cc14862c\",\"subtotal\":400}}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_upload`
--

CREATE TABLE `test_upload` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `download_file` varchar(2000) NOT NULL,
  `upload_file` varchar(2000) NOT NULL,
  `uploaded` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_upload`
--

INSERT INTO `test_upload` (`id`, `user_id`, `firstname`, `class`, `subject`, `download_file`, `upload_file`, `uploaded`, `active`, `created_date`) VALUES
(1, 2, 'Asma', 'IX', 'Physics', 'Historical_Statement1.pdf', 'Historical_Statement1.pdf', 0, 0, '2020-07-27 09:13:27'),
(2, 2, 'Asma', 'X', 'Botany', 'Email_Template1.docx', 'jarvis.docx', 1, 0, '2020-07-27 09:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `time_spent`
--

CREATE TABLE `time_spent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_spent`
--

INSERT INTO `time_spent` (`id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 2, '2020-02-20 08:08:47', '2020-07-27 12:00:38'),
(2, 2, '2020-03-04 08:10:33', '2020-07-27 12:00:38'),
(3, 2, '2020-02-20 08:11:29', '2020-07-27 12:00:38'),
(4, 2, '2020-03-04 13:59:48', '2020-07-27 12:00:38'),
(5, 2, '2020-03-05 06:46:38', '2020-07-27 12:00:38'),
(6, 2, '2020-03-05 07:05:39', '2020-07-27 12:00:38'),
(7, 2, '2020-03-05 07:09:51', '2020-07-27 12:00:38'),
(8, 2, '2020-03-05 14:22:57', '2020-07-27 12:00:38'),
(9, 2, '2020-03-05 14:52:25', '2020-07-27 12:00:38'),
(10, 2, '2020-03-05 15:39:53', '2020-07-27 12:00:38'),
(11, 2, '2020-03-09 06:48:35', '2020-07-27 12:00:38'),
(12, 2, '2020-03-10 08:28:42', '2020-07-27 12:00:38'),
(13, 2, '2020-03-10 10:33:08', '2020-07-27 12:00:38'),
(14, 2, '2020-03-10 10:35:48', '2020-07-27 12:00:38'),
(15, 2, '2020-03-12 08:45:08', '2020-07-27 12:00:38'),
(16, 2, '2020-03-12 08:52:51', '2020-07-27 12:00:38'),
(17, 2, '2020-03-12 13:24:17', '2020-07-27 12:00:38'),
(18, 2, '2020-03-16 05:54:53', '2020-07-27 12:00:38'),
(19, 2, '2020-03-24 16:15:20', '2020-07-27 12:00:38'),
(20, 2, '2020-03-26 16:34:19', '2020-07-27 12:00:38'),
(21, 2, '2020-03-26 17:37:07', '2020-07-27 12:00:38'),
(22, 2, '2020-03-27 10:27:31', '2020-07-27 12:00:38'),
(23, 2, '2020-03-27 11:46:15', '2020-07-27 12:00:38'),
(24, 2, '2020-03-27 11:47:07', '2020-07-27 12:00:38'),
(25, 2, '2020-03-27 11:58:19', '2020-07-27 12:00:38'),
(26, 2, '2020-03-27 12:02:26', '2020-07-27 12:00:38'),
(27, 2, '2020-03-27 12:03:16', '2020-07-27 12:00:38'),
(28, 2, '2020-03-27 12:17:05', '2020-07-27 12:00:38'),
(29, 2, '2020-03-27 17:24:53', '2020-07-27 12:00:38'),
(30, 2, '2020-03-27 18:18:11', '2020-07-27 12:00:38'),
(31, 2, '2020-04-02 08:30:37', '2020-07-27 12:00:38'),
(32, 2, '2020-04-02 08:31:18', '2020-07-27 12:00:38'),
(33, 2, '2020-04-07 13:40:24', '2020-07-27 12:00:38'),
(34, 2, '2020-04-07 14:20:26', '2020-07-27 12:00:38'),
(35, 2, '2020-04-07 16:14:37', '2020-07-27 12:00:38'),
(36, 2, '2020-04-09 11:55:40', '2020-07-27 12:00:38'),
(37, 2, '2020-04-10 13:49:52', '2020-07-27 12:00:38'),
(38, 2, '2020-04-14 11:22:18', '2020-07-27 12:00:38'),
(39, 2, '2020-04-16 10:29:46', '2020-07-27 12:00:38'),
(40, 2, '2020-04-16 10:30:27', '2020-07-27 12:00:38'),
(41, 2, '2020-04-16 10:43:53', '2020-07-27 12:00:38'),
(42, 2, '2020-04-18 12:44:26', '2020-07-27 12:00:38'),
(43, 2, '2020-04-18 13:53:11', '2020-07-27 12:00:38'),
(44, 2, '2020-04-19 16:37:49', '2020-07-27 12:00:38'),
(45, 2, '2020-04-20 11:06:25', '2020-07-27 12:00:38'),
(46, 2, '2020-04-23 10:08:48', '2020-07-27 12:00:38'),
(47, 2, '2020-06-10 13:23:37', '2020-07-27 12:00:38'),
(48, 2, '2020-06-10 14:44:40', '2020-07-27 12:00:38'),
(49, 2, '2020-06-18 10:39:28', '2020-07-27 12:00:38'),
(50, 2, '2020-06-18 10:39:56', '2020-07-27 12:00:38'),
(51, 2, '2020-06-18 10:41:09', '2020-07-27 12:00:38'),
(52, 2, '2020-06-26 13:04:39', '2020-07-27 12:00:38'),
(53, 2, '2020-07-01 11:37:45', '2020-07-27 12:00:38'),
(54, 2, '2020-07-01 14:15:45', '2020-07-27 12:00:38'),
(55, 2, '2020-07-01 14:16:16', '2020-07-27 12:00:38'),
(56, 2, '2020-07-01 16:03:31', '2020-07-27 12:00:38'),
(57, 2, '2020-07-04 14:26:46', '2020-07-27 12:00:38'),
(58, 2, '2020-07-04 15:09:37', '2020-07-27 12:00:38'),
(59, 2, '2020-07-04 15:32:14', '2020-07-27 12:00:38'),
(60, 2, '2020-07-04 17:46:16', '2020-07-27 12:00:38'),
(61, 2, '2020-07-05 16:57:17', '2020-07-27 12:00:38'),
(62, 2, '2020-07-22 16:25:49', '2020-07-27 12:00:38'),
(63, 2, '2020-07-23 10:50:40', '2020-07-27 12:00:38'),
(64, 2, '2020-07-23 10:54:39', '2020-07-27 12:00:38'),
(65, 2, '2020-07-27 11:11:58', '2020-07-27 12:00:38'),
(66, 2, '2020-07-27 11:17:03', '2020-07-27 12:00:38'),
(67, 2, '2020-10-14 12:43:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `toppersview`
--

CREATE TABLE `toppersview` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `videolink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toppersview`
--

INSERT INTO `toppersview` (`id`, `user_id`, `file_name`, `videolink`) VALUES
(1, 1, 'Toppers View', 'https://www.youtube.com/embed/n24OBVGHufQ'),
(2, 1, 'test', 'https://www.youtube.com/embed/kZQ8zBRJZIk');

-- --------------------------------------------------------

--
-- Table structure for table `toppers_picture`
--

CREATE TABLE `toppers_picture` (
  `id` int(11) NOT NULL,
  `toppers_img` varchar(1000) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppers_picture`
--

INSERT INTO `toppers_picture` (`id`, `toppers_img`, `active`, `created_date`) VALUES
(1, 'img21.jpeg', 0, '2020-03-11 12:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `toppers_videos`
--

CREATE TABLE `toppers_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `video_link` varchar(1000) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppers_videos`
--

INSERT INTO `toppers_videos` (`id`, `user_id`, `file_name`, `video_link`, `active`, `created_date`) VALUES
(1, 1, 'Kalyan Hatti', 'https://www.youtube.com/embed/kZQ8zBRJZIk', 0, '2020-03-11 12:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$0KJgyQYm7w3MNmoP5pRyNeP2JhJ.Yass82QWdCDML9uQEDtEUa6KK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1576483845, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `NotificationID` int(11) NOT NULL,
  `NotificationContent` varchar(500) NOT NULL,
  `NotificationSenderID` int(11) NOT NULL,
  `NotificationReceiverID` int(11) NOT NULL,
  `NotificationRedirect` varchar(200) NOT NULL,
  `IsRead` tinyint(4) NOT NULL DEFAULT 0,
  `NotificationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `CreatedDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`NotificationID`, `NotificationContent`, `NotificationSenderID`, `NotificationReceiverID`, `NotificationRedirect`, `IsRead`, `NotificationStatus`, `CreatedDateTime`) VALUES
(1, 'AdminReplied to yourquestion', 1, 0, '/dhaji_lms/student_controller/comment_controller/commentReply/', 0, 0, '2020-02-02 20:06:10'),
(2, 'AdminReplied to yourquestion', 1, 0, '/dhaji_lms/student_controller/comment_controller/fetch_comment/', 0, 0, '2020-02-02 20:10:32'),
(3, 'AdminReplied to yourquestion', 1, 0, '/dhaji_lms/student_controller/comment_controller/fetch_comment/', 0, 0, '2020-02-02 20:20:00'),
(4, 'AsmaAsked a question', 0, 0, '/dhaji_lms/student_controller/comment_controller/fetch_comment/', 0, 0, '2020-02-25 14:53:26'),
(5, ' Reviewed Answer papers uploaded', 0, 0, '/dhaji(09-01-20)/student_controller/files/index', 0, 0, '2020-03-10 13:12:53'),
(6, ' Mock Test Paper uploaded', 0, 0, '/dhaji_lms/student_controller/files/index', 0, 0, '2020-10-01 18:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `video_path`
--

CREATE TABLE `video_path` (
  `video_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timePlayed` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_path`
--

INSERT INTO `video_path` (`video_id`, `course_id`, `chapter_id`, `section_id`, `user_id`, `timePlayed`, `active`) VALUES
(30, 0, 1, 5, 2, 97, 1),
(32, 0, 1, 4, 2, 104, 1),
(33, 0, 1, 2, 2, 239, 1),
(34, 0, 1, 3, 2, 214, 1),
(35, 0, 1, 6, 2, 61, 1),
(36, 0, 1, 7, 2, 8, 1),
(37, 0, 1, 1, 2, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerwritting`
--
ALTER TABLE `answerwritting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_script`
--
ALTER TABLE `answer_script`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_order_details`
--
ALTER TABLE `books_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapters_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracoursecheckout`
--
ALTER TABLE `extracoursecheckout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_center`
--
ALTER TABLE `help_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mock_test_papers`
--
ALTER TABLE `mock_test_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myself`
--
ALTER TABLE `myself`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_of_attempt`
--
ALTER TABLE `no_of_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quizstatus`
--
ALTER TABLE `quizstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_course`
--
ALTER TABLE `search_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_school_info`
--
ALTER TABLE `student_school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectwiseview`
--
ALTER TABLE `subjectwiseview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_upload`
--
ALTER TABLE `test_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_spent`
--
ALTER TABLE `time_spent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppersview`
--
ALTER TABLE `toppersview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppers_picture`
--
ALTER TABLE `toppers_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppers_videos`
--
ALTER TABLE `toppers_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `video_path`
--
ALTER TABLE `video_path`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answerwritting`
--
ALTER TABLE `answerwritting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answer_script`
--
ALTER TABLE `answer_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books_order_details`
--
ALTER TABLE `books_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extracoursecheckout`
--
ALTER TABLE `extracoursecheckout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee_structure`
--
ALTER TABLE `fee_structure`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `help_center`
--
ALTER TABLE `help_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mock_test_papers`
--
ALTER TABLE `mock_test_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `myself`
--
ALTER TABLE `myself`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `no_of_attempt`
--
ALTER TABLE `no_of_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizstatus`
--
ALTER TABLE `quizstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_course`
--
ALTER TABLE `search_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_school_info`
--
ALTER TABLE `student_school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjectwiseview`
--
ALTER TABLE `subjectwiseview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_upload`
--
ALTER TABLE `test_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_spent`
--
ALTER TABLE `time_spent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `toppersview`
--
ALTER TABLE `toppersview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toppers_picture`
--
ALTER TABLE `toppers_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toppers_videos`
--
ALTER TABLE `toppers_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video_path`
--
ALTER TABLE `video_path`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
