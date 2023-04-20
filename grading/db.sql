-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 12:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `section_bin`
--

CREATE TABLE `section_bin` (
  `bin_id` int(11) NOT NULL,
  `class_id` varchar(45) NOT NULL,
  `sy_id` varchar(45) NOT NULL,
  `grade_level` varchar(45) NOT NULL,
  `section` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_bin`
--

INSERT INTO `section_bin` (`bin_id`, `class_id`, `sy_id`, `grade_level`, `section`) VALUES
(6, '7', '3', 'G7', 'Mahogany');

-- --------------------------------------------------------

--
-- Table structure for table `student_bin`
--

CREATE TABLE `student_bin` (
  `bin_id` int(11) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `lrn` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middle_initial` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_bin`
--

CREATE TABLE `subject_bin` (
  `bin_id` int(11) NOT NULL,
  `subject_id` varchar(45) NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sy_bin`
--

CREATE TABLE `sy_bin` (
  `bin_id` int(11) NOT NULL,
  `sy_id` varchar(45) NOT NULL,
  `schoolyear` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middle_initial` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `role`) VALUES
(1, 'admin', 'admin', 'Lebron', 'James', 'A', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `sy_id` varchar(45) NOT NULL,
  `grade_level` varchar(45) NOT NULL,
  `section` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `sy_id`, `grade_level`, `section`) VALUES
(5, '1', 'Grade 7', 'Mahogany'),
(14, '3', 'Grade 8', 'Narra'),
(17, '1', 'Grade 8', 'Toyo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gradequarter`
--

CREATE TABLE `tbl_gradequarter` (
  `quarter_id` int(11) NOT NULL,
  `gradequarter` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gradequarter`
--

INSERT INTO `tbl_gradequarter` (`quarter_id`, `gradequarter`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grade_id` int(11) NOT NULL,
  `subject_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `teacher_id` varchar(45) NOT NULL,
  `first` varchar(45) NOT NULL,
  `second` varchar(45) NOT NULL,
  `third` varchar(45) NOT NULL,
  `fourth` varchar(45) NOT NULL,
  `class_id` varchar(45) NOT NULL,
  `sy_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`grade_id`, `subject_id`, `student_id`, `teacher_id`, `first`, `second`, `third`, `fourth`, `class_id`, `sy_id`) VALUES
(1, '2', '1', '2', '90', '86', '87', '87', '5', '1'),
(2, '11', '1', '2', '86', '86', '85', '80', '5', '1'),
(4, '7', '1', '1', '87', '85', '80', '79', '5', '1'),
(5, '3', '1', '8', '75', '70', '76', '74', '5', '1'),
(6, '10', '1', '3', '80', '98', '78', '78', '5', '1'),
(7, '9', '1', '3', '90', '90', '85', '86', '5', '1'),
(8, '5', '1', '3', '87', '88', '86', '80', '5', '1'),
(9, '12', '1', '4', '90', '87', '84', '78', '5', '1'),
(11, '8', '1', '4', '80', '85', '81', '83', '5', '1'),
(12, '4', '1', '7', '87', '85', '86', '78', '5', '1'),
(16, '6', '1', '5', '80', '90', '87', '86', '5', '1'),
(18, '6', '1', '5', '95', '', '', '', '14', '3'),
(19, '6', '2', '5', '', '', '', '', '5', '1'),
(20, '6', '2', '5', '', '', '', '', '14', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schoolyear`
--

CREATE TABLE `tbl_schoolyear` (
  `sy_id` int(11) NOT NULL,
  `schoolyear` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schoolyear`
--

INSERT INTO `tbl_schoolyear` (`sy_id`, `schoolyear`) VALUES
(1, '2023-2024'),
(3, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `class_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `class_id`, `student_id`) VALUES
(1, '5', '1'),
(3, '14', '1'),
(5, '14', '2'),
(6, '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section_sub`
--

CREATE TABLE `tbl_section_sub` (
  `section_sub_id` int(11) NOT NULL,
  `subject_id` varchar(45) NOT NULL,
  `class_id` varchar(45) NOT NULL,
  `teacher_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_section_sub`
--

INSERT INTO `tbl_section_sub` (`section_sub_id`, `subject_id`, `class_id`, `teacher_id`) VALUES
(3, '6', '5', '5'),
(4, '10', '5', '3'),
(5, '7', '5', '1'),
(6, '3', '5', '8'),
(7, '2', '5', '2'),
(8, '12', '5', '4'),
(9, '4', '5', '7'),
(10, '9', '5', '3'),
(11, '11', '5', '2'),
(13, '5', '5', '3'),
(14, '8', '5', '4'),
(15, '6', '14', '5'),
(16, '10', '14', '1'),
(17, '12', '14', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(11) NOT NULL,
  `lrn` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middle_initial` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `lrn`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `role`) VALUES
(1, '108174140070', 'Philip', 'Philip', 'Philip', 'Aquino', 'B', 'student'),
(2, '108174140031', 'Aslie', 'Aslie', 'Nyl Aslie', 'Arupio', 'V', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `subject_name`, `description`) VALUES
(2, 'Filipino', 'Filipino'),
(3, 'English', 'English'),
(4, 'Mathematics', 'Mathematics'),
(5, 'Science', 'Science'),
(6, 'Araling Panlipunan', 'AP'),
(7, 'Edukasyon sa Pagpapakatao', 'EsP'),
(8, 'Technology & Livelihood Education', 'TLE'),
(9, 'Music', 'MAPEH'),
(10, 'Arts', 'MAPEH'),
(11, 'Physical Education', 'MAPEH'),
(12, 'Health', 'MAPEH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middle_initial` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `middle_initial`, `role`) VALUES
(1, 'Lizzete', 'Lizzete', 'Anna Lizzete', 'De Guzman', 'C', 'teacher'),
(2, 'Mariel', 'Mariel', 'Mariel', 'Olano', 'A', 'teacher'),
(3, 'Roxan', 'Roxan', 'Roxan', 'Bernabe', 'H', 'teacher'),
(4, 'Queenie', 'Queenie', 'Queenie', 'Eligoyo', 'S', 'teacher'),
(5, 'Lolita', 'Lolita', 'Lolita', 'Adriano', 'R', 'teacher'),
(6, 'Ronalyn', 'Ronalyn', 'Ronalyn', 'Peji', 'C', 'teacher'),
(7, 'Jacquelyn', 'Jacquelyn', 'Jacquelyn', 'Leysico', '', 'teacher'),
(8, 'Erica', 'Erica', 'Erica', 'Ramos', 'C', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_bin`
--

CREATE TABLE `teacher_bin` (
  `bin_id` int(11) NOT NULL,
  `teacher_id` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middle_initial` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `section_bin`
--
ALTER TABLE `section_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `student_bin`
--
ALTER TABLE `student_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `subject_bin`
--
ALTER TABLE `subject_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `sy_bin`
--
ALTER TABLE `sy_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_gradequarter`
--
ALTER TABLE `tbl_gradequarter`
  ADD PRIMARY KEY (`quarter_id`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_section_sub`
--
ALTER TABLE `tbl_section_sub`
  ADD PRIMARY KEY (`section_sub_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_bin`
--
ALTER TABLE `teacher_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section_bin`
--
ALTER TABLE `section_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_bin`
--
ALTER TABLE `student_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_bin`
--
ALTER TABLE `subject_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sy_bin`
--
ALTER TABLE `sy_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_gradequarter`
--
ALTER TABLE `tbl_gradequarter`
  MODIFY `quarter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_section_sub`
--
ALTER TABLE `tbl_section_sub`
  MODIFY `section_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_bin`
--
ALTER TABLE `teacher_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
