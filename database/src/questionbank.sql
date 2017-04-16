-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 09:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(10) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `right_answer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `right_answer`) VALUES
(1, 21, ' 6.25'),
(2, 35, '35\r\n'),
(4, 23, '   24 years\r\n'),
(27, 36, '40'),
(28, 37, '50'),
(29, 38, '100'),
(30, 39, '90');

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(20) NOT NULL,
  `choice_index` int(20) NOT NULL,
  `answer_id` int(20) NOT NULL,
  `choice_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`id`, `choice_index`, `answer_id`, `choice_text`) VALUES
(1, 1, 1, '6.0'),
(2, 2, 1, '7.0'),
(3, 3, 1, '6.25'),
(4, 4, 1, '7.25'),
(5, 1, 4, '   24 years\r\n'),
(6, 2, 4, '\r\n23 years\r\n\r\n'),
(7, 3, 4, '\r\n25 years\r\n\r\n'),
(8, 4, 4, ' None of these\r\n'),
(1033, 1, 2, '35'),
(1034, 2, 2, '45'),
(1035, 3, 2, '90'),
(1036, 4, 2, '60'),
(1037, 1, 27, '90'),
(1038, 2, 27, '40'),
(1039, 3, 27, '60'),
(1040, 4, 27, '100'),
(1041, 1, 28, '60'),
(1042, 2, 28, '70'),
(1043, 3, 28, '45'),
(1045, 1, 29, '100'),
(1046, 2, 29, '200'),
(1047, 3, 29, '506'),
(1048, 4, 29, '250'),
(1049, 1, 30, '100'),
(1050, 2, 30, '200'),
(1051, 3, 30, '90'),
(1052, 4, 30, '250');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) NOT NULL,
  `sector_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `sector_id`, `name`) VALUES
(1, 1, 'Science'),
(2, 1, 'Commerce'),
(3, 4, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject`
--

CREATE TABLE `faculty_subject` (
  `id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `faculty_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_subject`
--

INSERT INTO `faculty_subject` (`id`, `subject_id`, `faculty_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(7, 1, 2),
(8, 1, 3),
(9, 2, 1),
(10, 2, 3),
(15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `faculty_subject_id` int(20) NOT NULL,
  `type_id` int(20) NOT NULL,
  `importance` int(10) NOT NULL,
  `diffuculty` int(10) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '                                                        '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `faculty_subject_id`, `type_id`, `importance`, `diffuculty`, `user_id`, `entry_date`) VALUES
(4, 'What is B ', 9, 3, 4, 2, 10, '2017-04-03 10:36:28'),
(5, 'What is the Sum of 1&2 ?\r\nA. 1 B. 2 C.3 D.4', 9, 3, 4, 2, 2, '2017-04-10 08:37:02'),
(6, 'What is the Sum of 2&2 ?\r\nA. 1 B. 2 C.3 D.4', 9, 3, 4, 2, 2, '2017-04-10 08:37:32'),
(8, 'What is multiplication 5 & 2 ?', 9, 3, 4, 2, 9, '2017-04-10 08:40:13'),
(9, 'What is multiplication 5 & 4 ? A. 10  B.0 C. 20 D. 30', 9, 3, 4, 2, 9, '2017-04-10 08:41:36'),
(10, 'What is multiplication 5 & 5 ? A. 10  B.0 C. 20 D. 25', 9, 3, 4, 2, 9, '2017-04-10 08:43:42'),
(11, 'What is multiplication 5 & 6 ? A. 10  B.0 C. 20 D. 30', 9, 3, 4, 2, 9, '2017-04-10 08:43:59'),
(12, 'What is Sumation 5 & 4 ? A. 9  B.0 C. 20 D. 30', 9, 3, 4, 2, 9, '2017-04-10 08:45:44'),
(13, 'What is calculus ? \r\nA. 565  B. jrgh C. hjdrfgjh D. djsfrng\r\n', 9, 3, 5, 5, 10, '2017-04-10 12:35:09'),
(14, 'What is Derivative ? \r\nA. 565  B. jrgh C. hjdrfgjh D. djsfrng\r\n', 9, 3, 5, 3, 10, '2017-04-10 12:37:14'),
(16, 'what is force? A. B. C. D.  ', 9, 3, 5, 2, 9, '2017-04-10 12:41:42'),
(21, 'What should be 40 overs to reach the target of 282 runs?', 9, 2, 5, 1, 9, '2017-04-15 14:35:08'),
(23, 'If the ages of these two are excluded, the average than What is the average age of the team?\r\n', 9, 2, 5, 2, 7, '2017-04-15 14:41:42'),
(24, 'Creative Question ', 1, 1, 5, 1, 9, '2017-04-15 17:17:03'),
(26, 'This is SSC Math Science question High, easy', 9, 1, 5, 1, 7, '2017-04-15 18:21:50'),
(28, 'This is SSC Math Science question High, High', 9, 3, 5, 5, 10, '2017-04-15 18:21:50'),
(29, 'This is SSC Math Science question High, easy', 9, 1, 5, 1, 7, '2017-04-15 18:21:55'),
(31, 'This is SSC Math Science question High, High', 9, 3, 5, 5, 10, '2017-04-15 18:21:55'),
(32, 'It can be used when you\'re in the middle of studying a topic as a way of enlivening\r\n students\' curiosity. And it can be used when you are near the end of studying a \r\ntopic, as a way of showing students how the knowledge they have gained about the \r\ntopic helps them to ask ever more interesting questions.\r\n\r\nA ) A Tornado is coming. What do you do?\r\nB ) What Quality is Most Attractive to You?\r\nC )What Do You Listen To On Your Morning Commute?\r\nD )What Animal are you most Afraid of?\r\n', 9, 1, 5, 1, 3, '2017-04-15 23:52:23'),
(35, 'What is the angle of mmmm ?', 9, 2, 5, 2, 13, '2017-04-16 03:22:22'),
(36, 'What is angle of the two objects ?', 9, 2, 5, 1, NULL, '2017-04-16 03:52:02'),
(37, 'What is the cross gunon of F and X vector ?', 8, 2, 5, 1, NULL, '2017-04-16 03:52:02'),
(38, 'What is momentum objects ?', 9, 2, 5, 2, NULL, '2017-04-16 03:52:41'),
(39, 'What is the cross gunon of Velocity and X vector ?', 8, 2, 5, 1, NULL, '2017-04-16 03:52:41'),
(41, 'What is gravitational constant ? ', 9, 2, 4, 1, NULL, '2017-04-16 05:08:59'),
(47, 'What is gravitational of the constant ? ', 9, 2, 4, 1, NULL, '2017-04-16 05:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(100) NOT NULL,
  `typename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `typename`) VALUES
(1, 'CQ'),
(2, 'MCQ');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(3, 'Admin'),
(6, 'Gold Member'),
(2, 'Silver Member');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`) VALUES
(3, 'Admission'),
(2, 'HSC'),
(1, 'SSC'),
(4, 'University');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(4, 'Biology'),
(3, 'Chemistry'),
(1, 'Math'),
(2, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Creative Question'),
(2, 'MCQ '),
(3, 'Wriiten');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `mobile_or_email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(20) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `full_name`, `mobile_or_email`, `password`, `role_id`) VALUES
(1, 'Hasan', 'Rakibul ', '01950641081', '1234', 2),
(2, 'john', 'John Cenna', 'john@gmail.com', '1234', 2),
(3, 'rakib', 'Rakibul Hasan', '01711354654', '1234', 2),
(4, 'tuly', 'Tithi Mollik', '01521456789', '1234', 2),
(5, 'tuli', 'Tithi Mollik', '01521456788', '1234', 2),
(6, 'tulii', 'Tithi Mollik', '01521456780', '1234', 2),
(7, 'Zohel', 'Sheikh Sohel Moon', '01977662888', '12345678', 2),
(8, 'tz', 'Tausif Ahmed Turzo', '01521411853', '1234', 2),
(9, 'mesu', 'Mesu', '01625668814', '1234', 2),
(10, 'afnan', 'Afnan Rahman', '01556555652', '1234', 2),
(11, 'yasin', 'Yeasin Mollik', '01752110931', '1234', 2),
(12, 'mostafa', 'Abu Hena', '0198565667', '4321', 2),
(13, 'rakin', 'Md. Rakin', 'rakin06@gmail.com', '0', 2),
(14, 'rakin06', 'Md. Rakin', 'rakin07@gmail.com', '81', 2),
(15, 'delo', 'Md Deloar', 'delo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(16, 'fbf', 'dhnhm', 'abv@gdfgfhsd.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(17, 'anik', 'Md. Anik', 'anik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `sector_id` (`sector_id`);

--
-- Indexes for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `faculty_subject_id` (`faculty_subject_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile_or_email` (`mobile_or_email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1495;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  ADD CONSTRAINT `faculty_subject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_subject_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`faculty_subject_id`) REFERENCES `faculty_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
