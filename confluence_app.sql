-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 09:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confluence_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `friend_student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_id`, `student_id`, `friend_student_id`) VALUES
('friend1', 'stud1', 'stud1'),
('friend2', 'stud1', 'stud3'),
('friend3', 'stud1', 'stud4'),
('friend4', 'stud2', 'stud8');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `like_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `page_id`, `student_id`, `like_date`) VALUES
(1, 1, 'stud2', '2023-05-02'),
(2, 1, 'stud5', '2023-05-03'),
(3, 2, 'stud5', '2023-05-12'),
(4, 4, 'stud8', '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `student_id`, `title`, `content`) VALUES
(1, 'stud1', 'Robots', 'A robot is a machine—especially one programmable by a computer—capable of carrying out a complex series of actions automatically'),
(2, 'stud2', 'Future', 'The future is the time after the past and present. Its arrival is considered inevitable due to the existence of time and the laws of physics.'),
(3, 'stud2', 'Heat', 'Heat is defined as the form of energy crossing the boundary of a thermodynamic system by virtue of a temperature difference at boundary.'),
(4, 'stud4', 'Disease', 'A disease is a particular abnormal condition that negatively affects the structure or function of all or part of an organism'),
(5, 'stud2', 'Servers', 'In computing, a server is a piece of computer hardware or software that provides functionality for other programs or devices, called clients.'),
(6, 'stud6', 'Hosting', 'Web hosting is an online service that enables you to publish your website or web application on the internet.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `password`) VALUES
('stud1', 'Rahul', 'rahul@gmail.com', 'rahul@123'),
('stud10', 'Carl', 'carl@gmail.com', 'carl@123'),
('stud2', 'Rene', 'rene@gmail.com', 'rene@123'),
('stud3', 'Cera', 'cera@gmail.com', 'cera@123'),
('stud4', 'James', 'james@gmail.com', 'james@123'),
('stud5', 'Jeny', 'jeny@gmail.com', 'jeny@123'),
('stud6', 'Steve', 'steve@gmail.com', 'steve@123'),
('stud7', 'Don', 'don@gmail.com', 'don@123'),
('stud8', 'Merry', 'merry@gmail.com', 'merry@123'),
('stud9', 'Henna', 'henna@gmail.com', 'henna@123');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `receiver_id` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `sender_id`, `receiver_id`, `amount`, `transaction_date`) VALUES
(1, 'stud3', 'stud1', 250, '2023-05-29'),
(2, 'stud2', 'stud1', 100, '2023-05-29'),
(3, 'stud1', 'stud2', 100, '2023-05-29'),
(4, 'stud2', 'stud4', 150, '2023-05-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`),
  ADD KEY `fk6` (`student_id`),
  ADD KEY `fk7` (`friend_student_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `fk2` (`page_id`),
  ADD KEY `fk3` (`student_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `fk1` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk4` (`sender_id`),
  ADD KEY `fk5` (`receiver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `fk6` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk7` FOREIGN KEY (`friend_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`page_id`) REFERENCES `page` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`sender_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk5` FOREIGN KEY (`receiver_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
