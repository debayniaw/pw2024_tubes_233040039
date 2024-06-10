-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2024 at 05:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040039`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `name`, `image`, `artist`, `details`) VALUES
(1, 'Salvator Mundi   ', 'salvator-mundi.jpg', 'Leonardo Da Vinci   ', 'Lukisan ini menggambarkan Kristus sebagai Juruselamat Dunia. Ia ditampilkan dalam pakaian Renaisans , dengan dua jari terulur saat ia memberikan berkat . Di tangan kirinya, dia memegang bola kristal, yang melambangkan bola kristal dari langit, mengacu pada perannya sebagai penguasa kosmos.'),
(2, 'Interchange ', 'interchange.jpg', 'Willem De Kooning ', ' Lukisan ini dibuat pada tahun 1955 yang mana tidak menggambarkan suatu objek apapun. Lukisan ini memiliki fokus pada bentuk merah muda besar yang bisa diinterpretasikan sebagai bentuk dari seorang perempuan yang sedang berbaring.'),
(3, 'The Card Players ', 'the-card-players.jpg', 'Paul Cezanne ', '  Lukisan ini menggambarkan petani Provençal yang tenggelam dalam pipa dan kartu remi. Subjeknya, semuanya laki-laki, ditampilkan sebagai orang yang rajin bermain kartu, mata tertuju ke bawah, dan fokus pada permainan yang ada. '),
(4, 'Nafea Faa Ipoipo ', 'nafea-faa-ipoipo.jpg', 'Paul Gauguin ', ' Nafea Faa Ipoipo menggambarkan dua perempuan muda yang berpakaian gaya misionaris, yang melambangkan paduan Eropa dan adat Polinesia.'),
(5, 'Number 17A ', 'number17-a.jpg', 'Jackson Pollock ', ' Nomor 17A adalah lukisan abstrak ekspresionis karya pelukis Amerika Jackson Pollock , dari tahun 1948. Lukisan tersebut merupakan cat minyak di atas papan serat dan merupakan lukisan tetes , dibuat dengan cara memercikkan cat ke permukaan horizontal.'),
(6, 'Pendant Portraits of MaertenSoolmans and Oopjen  Coppit       ', 'gambar6.jpg', 'Rembrandt Van Rijn          ', 'Lukisan ini dilukis oleh Rembrandt pada acara pernikahan Maerten Soolmans dan Oopjen Coppit pada tahun 1634. Meskipun subjeknya dilukis secara individual, potret-potret tersebut tetap disimpan bersama sejak awal.Berbeda dengan banyak pasangan potret abad ke-17, keduanya selalu digantung berdampingan dalam berbagai koleksi yang berbasis di Amsterdam atau Paris .');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'debay', '$2y$10$ZFjW1Llo6OsEfT2Oyf/MnefSXbxKzsD996P.n.UwK/izl6xke7hTu'),
(2, 'hilmy', '$2y$10$5A1JQF9gN.TEpJqo7UaUFePWdQWkAezUnjn2QQbJkPljc1kq29dpi'),
(3, 'zaki', '$2y$10$jiN5vz3yA4.uGFQ33VTNKuAnvcuKgnfLv5dNcXOvUIy18bOztM4Z2'),
(4, 'adakami', '$2y$10$rbh5d6ZXVTVCP/J11bwiZOAJInzNim4K4U7jRGGqicfLfwcLDn4GC'),
(5, 'ada', '$2y$10$Z4klQ2sBotKPu31sgMNAwuM/H34lGGmkFAqWmJM2PXkCLMYq3M7rq'),
(6, 'weaja', '$2y$10$VTKC5ro38HZ0BWWHB0icVOYlVNmZW6125y9ClCcrx3GeojNQXfC1O'),
(7, '123', '$2y$10$D55cdESmhXVnD0w9FMN6oeC83xP/oxcsQ6tPn93PFcPuS7wTgen/2'),
(8, 'qwe', '$2y$10$BvF27AaC4d1hE64avK6cSOMrEBU0L9aIoOJqSjCu2S8.OEsJ8AEQC'),
(9, 'we', '$2y$10$sXJJhItmfw.rq3rrwKA8JeFILb75hq691fO6lrAfd2o0ZxKsdU5Sm'),
(10, 'debayku', '$2y$10$WgebfpUUw3PrKcBLkFGLdecFcOKUOJkB.uNYQQ5ovHpwuYrwk4JEe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
