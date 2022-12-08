-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2022 at 06:32 AM
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
-- Table structure for table `vle_course_assignment`
--

CREATE TABLE `vle_course_assignment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_assignment`
--

INSERT INTO `vle_course_assignment` (`id`, `user_id`, `course_id`, `type`) VALUES
(1, 1, 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_assignments`
--

CREATE TABLE `vle_course_assignments` (
  `assignment_id` int NOT NULL,
  `module_id` int NOT NULL,
  `name` text NOT NULL,
  `due_date` datetime NOT NULL,
  `available_date` datetime NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_assignments`
--

INSERT INTO `vle_course_assignments` (`assignment_id`, `module_id`, `name`, `due_date`, `available_date`, `value`) VALUES
(1, 1, 'Assignment Demo 1', '2022-12-04 01:11:35', '2022-12-02 01:11:35', '<h1>HTML Ipsum Presents</h1>  				<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href=\"#\">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>  				<h2>Header Level 2</h2>  				<ol> 				   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li> 				   <li>Aliquam tincidunt mauris eu risus.</li> 				</ol>  				<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>  				<h3>Header Level 3</h3>  				<ul> 				   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li> 				   <li>Aliquam tincidunt mauris eu risus.</li> 				</ul>  				<pre><code> 				#header h1 a { 				  display: block; 				  width: 300px; 				  height: 80px; 				} 				</code></pre>'),
(2, 2, 'Assignment Demo 2', '2022-12-02 01:11:52', '2022-12-14 01:11:52', '<h1>HTML Ipsum Presents</h1>  				<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href=\"#\">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>  				<h2>Header Level 2</h2>  				<ol> 				   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li> 				   <li>Aliquam tincidunt mauris eu risus.</li> 				</ol>  				<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>  				<h3>Header Level 3</h3>  				<ul> 				   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li> 				   <li>Aliquam tincidunt mauris eu risus.</li> 				</ul>  				<pre><code> 				#header h1 a { 				  display: block; 				  width: 300px; 				  height: 80px; 				} 				</code></pre>');

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
(1, 1, 'Exam 1', '2022-12-08 01:09:52', '2022-11-01 01:09:52'),
(2, 2, 'Exam 2', '2022-12-10 01:10:04', '2022-11-01 01:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_exams_grades`
--

CREATE TABLE `vle_course_exams_grades` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `user_id` int NOT NULL,
  `grade` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_exams_grades`
--

INSERT INTO `vle_course_exams_grades` (`id`, `exam_id`, `user_id`, `grade`, `date`) VALUES
(8, 1, 1, 0, '2022-12-08 06:08:03'),
(9, 2, 1, 50, '2022-12-08 06:09:17'),
(10, 2, 1, 0, '2022-12-08 06:09:31'),
(11, 1, 1, 25, '2022-12-08 06:12:56'),
(12, 1, 1, 25, '2022-12-08 06:13:36'),
(13, 1, 1, 0, '2022-12-08 06:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_exam_questions`
--

CREATE TABLE `vle_course_exam_questions` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `options` json NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_exam_questions`
--

INSERT INTO `vle_course_exam_questions` (`id`, `exam_id`, `question`, `type`, `options`, `answer`) VALUES
(1, 1, 'What is Question 1? ', 'select', '{\"options\": [\"Question 1\", \"Question 2\", \"Question 3\", \"Question 4\"]}', 'Question 1'),
(2, 1, 'What is Question 2? ', 'select', '{\"options\": [\"Question 1\", \"Question 2\", \"Question 3\", \"Question 4\"]}', 'Question 2'),
(3, 1, 'What is Question 3? ', 'select', '{\"options\": [\"Question 1\", \"Question 2\", \"Question 3\", \"Question 4\"]}', 'Question 3'),
(4, 1, 'What is Question 4? ', 'select', '{\"options\": [\"Question 1\", \"Question 2\", \"Question 3\", \"Question 4\"]}', 'Question 4'),
(5, 2, 'What is Question 5? ', 'select', '{\"options\": [\"Question 5\", \"Question 6\", \"Question 7\", \"Question 8\"]}', 'Question 5'),
(6, 2, 'What is Question 6? ', 'select', '{\"options\": [\"Question 5\", \"Question 6\", \"Question 7\", \"Question 8\"]}', 'Question 6');

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
(1, 1, 'Quiz 1', '2022-12-06 01:10:52', '2022-11-01 01:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_quizes_grades`
--

CREATE TABLE `vle_course_quizes_grades` (
  `id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `user_id` int NOT NULL,
  `grade` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_quizes_grades`
--

INSERT INTO `vle_course_quizes_grades` (`id`, `quiz_id`, `user_id`, `grade`, `date`) VALUES
(4, 1, 1, 50, '2022-12-08 05:14:40'),
(5, 1, 1, 50, '2022-12-08 06:07:48'),
(6, 1, 1, 50, '2022-12-08 06:12:51'),
(7, 1, 1, 0, '2022-12-08 06:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `vle_course_quiz_questions`
--

CREATE TABLE `vle_course_quiz_questions` (
  `id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `question` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `options` json NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vle_course_quiz_questions`
--

INSERT INTO `vle_course_quiz_questions` (`id`, `quiz_id`, `question`, `type`, `options`, `answer`) VALUES
(1, 1, 'What is Quiz Question 3?', 'select', '{\"options\": [\"Quiz Question 5\", \"Quiz Question 6\", \"Quiz Question 7\", \"Quiz Question 8\"]}', 'Quiz Question 8'),
(2, 1, 'What is Quiz Question 2?', 'select', '{\"options\": [\"Quiz Question 2\", \"Quiz Question 3\", \"Quiz Question 7\", \"Quiz Question 8\"]}', 'Quiz Question 2');

-- --------------------------------------------------------

--
-- Table structure for table `vle_users`
--

CREATE TABLE `vle_users` (
  `id` int NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
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

INSERT INTO `vle_users` (`id`, `username`, `email`, `pass_hash`, `first_name`, `last_name`, `school`, `acct_type`, `last_login`, `login_ip`, `u_hash`) VALUES
(1, 'admin', 'test@test.com', '$2y$10$t21ZA7xikf/cumfp3Bt74u/L/qYvuQPPhUSPApHuD8QXtAM/9GeVO', 'William', 'Smith', 'Test School', 1, 'October 28, 2022, 10:11 pm', '10.2.45.150', '135142306d7955a5bfe21eba8354c27dcad79ade598e935414f88a203592ef13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vle_classes`
--
ALTER TABLE `vle_classes`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `vle_course_assignment`
--
ALTER TABLE `vle_course_assignment`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vle_course_exams_grades`
--
ALTER TABLE `vle_course_exams_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vle_course_exam_questions`
--
ALTER TABLE `vle_course_exam_questions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vle_course_quizes_grades`
--
ALTER TABLE `vle_course_quizes_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vle_course_quiz_questions`
--
ALTER TABLE `vle_course_quiz_questions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `vle_course_assignment`
--
ALTER TABLE `vle_course_assignment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `vle_course_exams_grades`
--
ALTER TABLE `vle_course_exams_grades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vle_course_exam_questions`
--
ALTER TABLE `vle_course_exam_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `vle_course_quizes_grades`
--
ALTER TABLE `vle_course_quizes_grades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vle_course_quiz_questions`
--
ALTER TABLE `vle_course_quiz_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vle_users`
--
ALTER TABLE `vle_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
