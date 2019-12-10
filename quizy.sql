-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 02:22 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_quiz`
--

CREATE TABLE `tb_hasil_quiz` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `soal_benar` int(11) NOT NULL,
  `soal_salah` int(11) NOT NULL,
  `soal_kosong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil_quiz`
--

INSERT INTO `tb_hasil_quiz` (`id`, `user_id`, `quiz_id`, `tanggal`, `soal_benar`, `soal_salah`, `soal_kosong`) VALUES
(7, 3, 1, '2019-12-05', 1, 2, 3),
(8, 4, 1, '2019-12-05', 1, 2, 2),
(9, 4, 7, '2019-12-05', 1, 1, 0),
(10, 4, 8, '2019-12-05', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilihan`
--

CREATE TABLE `tb_pilihan` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `pilihan` text NOT NULL,
  `status` enum('benar','salah') NOT NULL DEFAULT 'salah'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pilihan`
--

INSERT INTO `tb_pilihan` (`id`, `soal_id`, `pilihan`, `status`) VALUES
(69, 22, '1', 'benar'),
(70, 22, '2dsf', 'salah'),
(71, 22, '3', 'salah'),
(72, 22, '4sd', 'salah'),
(73, 23, 'sdfds', 'benar'),
(74, 23, 'sdf', 'salah'),
(75, 23, 'r5dfg', 'salah'),
(76, 23, 'sdfsf', 'salah'),
(77, 26, '3', 'benar'),
(78, 26, '5', 'salah'),
(79, 26, '4', 'salah'),
(80, 26, '8', 'salah'),
(85, 28, '1', 'benar'),
(86, 28, '2', 'salah'),
(87, 28, '3', 'salah'),
(88, 28, '4', 'salah'),
(89, 29, '1', 'benar'),
(90, 29, '2', 'salah'),
(91, 29, '4', 'salah'),
(92, 29, '5', 'salah'),
(93, 30, '1', 'benar'),
(94, 30, '2', 'salah'),
(95, 30, '3', 'salah'),
(96, 30, '4', 'salah'),
(97, 31, '1', 'benar'),
(98, 31, '2', 'salah'),
(99, 31, '3', 'salah'),
(100, 31, '4', 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quiz`
--

CREATE TABLE `tb_quiz` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_quiz`
--

INSERT INTO `tb_quiz` (`id`, `nama`, `user_id`) VALUES
(1, 'Sholat', 3),
(2, 'Quiz 11', 3),
(3, 'Bisakah', 3),
(7, 'halo', 3),
(8, 'QUIZ ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `gambar` text,
  `quiz_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `soal`, `gambar`, `quiz_id`, `nilai`) VALUES
(22, 'tanya yaa', NULL, 1, 10),
(23, 'awsdfs', NULL, 1, 33),
(24, 'asfsd', NULL, 1, 445),
(25, 'bisa dong', NULL, 1, 90),
(26, 'bisa dong', NULL, 1, 90),
(28, 'halo', NULL, 7, 100),
(29, 'adasd', NULL, 7, 2000),
(30, 'halo', NULL, 8, 10),
(31, 'soal2', NULL, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text,
  `level` enum('admin','player') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `nama`, `password`, `foto`, `level`) VALUES
(3, 'admin', 'admin@admin.com', 'admin', 'admin', NULL, 'admin'),
(4, 'users', 'users@users.com', 'users', 'user', NULL, 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hasil_quiz`
--
ALTER TABLE `tb_hasil_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`quiz_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hasil_quiz`
--
ALTER TABLE `tb_hasil_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hasil_quiz`
--
ALTER TABLE `tb_hasil_quiz`
  ADD CONSTRAINT `tb_hasil_quiz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_hasil_quiz_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `tb_quiz` (`id`);

--
-- Constraints for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  ADD CONSTRAINT `tb_pilihan_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `tb_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD CONSTRAINT `tb_quiz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `tb_quiz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
