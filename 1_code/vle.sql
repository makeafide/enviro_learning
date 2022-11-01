-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2022 at 05:23 AM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vle`
--

-- --------------------------------------------------------

--
-- Table structure for table `vle_classes`
--

CREATE TABLE `vle_classes` (
  `course_id` int NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `course_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_classes`
--

INSERT INTO `vle_classes` (`course_id`, `class_name`, `course_code`) VALUES
(1, 'IT Course', 'INFO-123'),
(2, 'Computer Course', 'INFO-456'),
(3, 'Three Computer Courses', 'INFO-789');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_assignments`
--

CREATE TABLE `vle_course_assignments` (
  `assignment_id` int NOT NULL,
  `module_id` int NOT NULL,
  `name` text NOT NULL,
  `due_date` datetime NOT NULL,
  `available_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_assignments`
--

INSERT INTO `vle_course_assignments` (`assignment_id`, `module_id`, `name`, `due_date`, `available_date`) VALUES
(1, 1, 'Assignment Demo 1', '2022-11-01 01:11:35', '2022-11-01 01:11:35'),
(2, 2, 'Assignment Demo 2', '2022-11-01 01:11:52', '2022-11-01 01:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_assignment_grades`
--

CREATE TABLE `vle_course_assignment_grades` (
  `id` int NOT NULL,
  `assignment_id` int NOT NULL,
  `student_id` int NOT NULL,
  `score` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_exams`
--

CREATE TABLE `vle_course_exams` (
  `exam_id` int NOT NULL,
  `module_id` int NOT NULL,
  `name` text NOT NULL,
  `due_date` datetime NOT NULL,
  `available_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_exams`
--

INSERT INTO `vle_course_exams` (`exam_id`, `module_id`, `name`, `due_date`, `available_date`) VALUES
(1, 1, 'Exam 1', '2022-11-01 01:09:52', '2022-11-01 01:09:52'),
(2, 2, 'Exam 2', '2022-11-01 01:10:04', '2022-11-01 01:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_modules`
--

CREATE TABLE `vle_course_modules` (
  `module_id` int NOT NULL,
  `course_id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_modules`
--

INSERT INTO `vle_course_modules` (`module_id`, `course_id`, `name`) VALUES
(1, 1, 'Module 1'),
(2, 1, 'Module 2');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_quizes`
--

CREATE TABLE `vle_course_quizes` (
  `quiz_id` int NOT NULL,
  `module_id` int NOT NULL,
  `name` text NOT NULL,
  `due_date` datetime NOT NULL,
  `available_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_quizes`
--

INSERT INTO `vle_course_quizes` (`quiz_id`, `module_id`, `name`, `due_date`, `available_date`) VALUES
(1, 1, 'Quiz 1', '2022-11-01 01:10:52', '2022-11-01 01:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `vle_users`
--

CREATE TABLE `vle_users` (
  `id` int NOT NULL,
  `username` varchar(1000) NOT NULL,
  `pass_hash` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `school` varchar(1000) NOT NULL,
  `acct_type` int NOT NULL,
  `last_login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login_ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `u_hash` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_users`
--

INSERT INTO `vle_users` (`id`, `username`, `pass_hash`, `first_name`, `last_name`, `school`, `acct_type`, `last_login`, `login_ip`, `u_hash`) VALUES
(1, 'admin', '$2y$10$PT5No7gn2w8G5b1ffWwkueoqllUsRGOQoMUT6nz1SaTvqm0aSkC36', 'William', 'Smith', 'Test School', 1, 'October 28, 2022, 10:11 pm', '10.2.45.150', '9241c6f4812a5f849655db6ad650aa6d55a4e793dee1ee2dad48f811e13321e0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vle_classes`
--
ALTER TABLE `vle_classes`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `vle_course_assignments`
--
ALTER TABLE `vle_course_assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `vle_course_assignment_grades`
--
ALTER TABLE `vle_course_assignment_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vle_course_exams`
--
ALTER TABLE `vle_course_exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `vle_course_modules`
--
ALTER TABLE `vle_course_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `vle_course_quizes`
--
ALTER TABLE `vle_course_quizes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `vle_users`
--
ALTER TABLE `vle_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u-hash` (`u_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vle_classes`
--
ALTER TABLE `vle_classes`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vle_course_assignments`
--
ALTER TABLE `vle_course_assignments`
  MODIFY `assignment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vle_course_assignment_grades`
--
ALTER TABLE `vle_course_assignment_grades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vle_course_exams`
--
ALTER TABLE `vle_course_exams`
  MODIFY `exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vle_course_modules`
--
ALTER TABLE `vle_course_modules`
  MODIFY `module_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vle_course_quizes`
--
ALTER TABLE `vle_course_quizes`
  MODIFY `quiz_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vle_users`
--
ALTER TABLE `vle_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
