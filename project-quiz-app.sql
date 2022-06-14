-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 05:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-quiz-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `role`) VALUES
(16, 'participant1', '$2y$10$KXt.VXa5CODPlkVssn2cMOaPJ8osbygY8/idurdw3fpdDNXU/EGWK', 'participant'),
(17, 'participant2', '$2y$10$D4Xz48Cw/oJlKB8Fh4uGpOJhJdZQtWndXyNq6EGIgLqQq7XBkiDwi', 'participant'),
(18, 'participant3', '$2y$10$esHXzHYd1vLJ/eFCKwQp6e0DhlOlthOorpHdSYgxNnCialW7Runo2', 'participant'),
(20, 'creator', '$2y$10$sKKlqv0.q4NRmvp9s2YEVOI7rN/RMDtAkeYERB3snS8njynJkpW6K', 'creator'),
(21, 'creator2', '$2y$10$SrqobmO8G9Npfy1lAed8yOnSuGgHCWO7yEC5ZzlE9noVtViabwTG2', 'creator'),
(22, 'participant4', '$2y$10$iD8xZ4.lyl1Qe3N7VxOBbOyS872eM3WBrwNQJ7X89zCiiH7VTGqlu', 'participant');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(5) NOT NULL,
  `question_no` varchar(3) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `id_quiz` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `question_no`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `id_quiz`) VALUES
(1, '1', 'Siapakah Dosen Basis Data?', 'Dedi Kiswanto', 'Ahlijati Nuraminah', 'Reyhand', 'Ihsan Shiddiq', 'Ahlijati Nuraminah', 7),
(2, '2', 'Ada berapa minggu dalam mata kuliah ini?', '16 Minggu', '15 Minggu', '14 Minggu', '13 Minggu', '16 Minggu', 7),
(3, '3', 'Berapa jumlah SKS mata kuliah Basis Data?', '4 SKS', '3 SKS', '2 SKS', '5 SKS', '4 SKS', 7),
(4, '4', 'Berapa minimal absensi kelas?', '60 %', '50 % ', '70 %', '40 %', '60 %', 7),
(5, '1', 'Siapakah Dosen Pemrograman Web?', 'Dedi Kiswanto', 'Ahlijati Nuraminah', 'Ahmad Nur Ihsan', 'Ihsan Shiddiq', 'Ahmad Nur Ihsan', 8),
(6, '2', 'Ada berapa minggu dalam mata kuliah ini?', '16 Minggu', '15 Minggu', '14 Minggu', '13 Minggu', '16 Minggu', 8),
(7, '1', 'Siapakah Dosen Jaringan Komputer?', 'Dedi Kiswanto', 'Ahlijati Nuraminah', 'Ihsan Shiddiq', 'Ahmad Nur Ihsan', 'Dedi Kiswanto', 10);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(5) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `quiz_timer` varchar(5) NOT NULL,
  `id_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `quiz_name`, `quiz_timer`, `id_creator`) VALUES
(7, 'Basis Data', '5', 20),
(8, 'Pemrograman Web', '5', 20),
(10, 'Jaringan Komputer', '5', 21);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id_result` int(5) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_quiz` int(5) NOT NULL,
  `total_question` varchar(3) NOT NULL,
  `correct_answer` varchar(3) NOT NULL,
  `wrong_answer` varchar(3) NOT NULL,
  `quiz_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id_result`, `id_participant`, `id_quiz`, `total_question`, `correct_answer`, `wrong_answer`, `quiz_time`) VALUES
(2, 16, 7, '4', '4', '0', '2022-06-07 11:52:51'),
(3, 16, 8, '2', '1', '1', '2022-06-07 11:53:05'),
(4, 16, 7, '4', '4', '0', '2022-06-13 09:13:37'),
(5, 17, 8, '2', '2', '0', '2022-06-13 09:14:05'),
(6, 22, 7, '4', '3', '1', '2022-06-13 09:51:14'),
(7, 22, 7, '4', '3', '1', '2022-06-13 09:57:03'),
(8, 17, 10, '1', '1', '0', '2022-06-13 10:21:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_quiz` (`id_quiz`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `fk_creator` (`id_creator`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `fk_quiz` (`id_quiz`),
  ADD KEY `fk_QuizParticipant` (`id_participant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id_result` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_creator` FOREIGN KEY (`id_creator`) REFERENCES `account` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `fk_QuizParticipant` FOREIGN KEY (`id_participant`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `fk_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
