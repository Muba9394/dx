-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 02:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dxb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_table`
--

CREATE TABLE `answer_table` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `cr_ans` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer_table`
--

INSERT INTO `answer_table` (`id`, `q_id`, `option_a`, `option_b`, `option_c`, `option_d`, `cr_ans`) VALUES
(11, 1, 'Hypertext Preprocessor', 'Pretext Hypertext Preprocessor', 'Personal Home Processor', 'None of the above', 'option_a'),
(12, 2, '! (Exclamation)', '$ (Dollar)', '& (Ampersand)', '# (Hash)', 'option_b'),
(13, 3, '.php', '.html', '.xhtml', '.xml', 'option_a'),
(14, 4, 'Extern', 'Local', 'Static', 'Global', 'option_a'),
(15, 5, '& …… &', '// ……', '/* …… */', 'Both (b) and (c)', 'option_d'),
(16, 6, 'echo', 'write', 'print', 'Both (a) and (c)', 'option_d'),
(17, 7, 'The strlen() function returns the type of string', 'The strlen() function returns the length of string', 'The strlen() function returns the value of string', 'The strlen() function returns both value and type of string', 'option_d'),
(18, 8, '+ (plus)', '* (Asterisk)', '. (dot)', 'append()', 'option_c'),
(19, 9, 'Inbuilt constants', 'User-defined constants', 'Magic constants', 'Default constants', 'option_c'),
(20, 10, 'The strpos() function is used to search for the spaces in a string', 'The strpos() function is used to search for a number in a string', 'The strpos() function is used to search for a character/text in a string', 'The strpos() function is used to search for a capitalize character in a string', 'option_c'),
(21, 11, 'PHP extension and application repository', 'PHP enhancement and application reduce', 'PHP event and application repository', 'None of the above', 'option_a'),
(22, 12, 'Create myFunction()', 'New_function myFunction()', 'function myFunction()', 'None of the above', 'option_c'),
(23, 13, 'id()', 'mdid()', 'uniqueid()', 'None of the above', 'option_c');

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`id`, `question`, `status`) VALUES
(1, 'PHP stands for', '1'),
(2, 'Variable name in PHP starts with', '1'),
(3, 'Which of the following is the default file extension of PHP?', '1'),
(4, 'Which of the following is not a variable scope in PHP?', '1'),
(5, 'Which of the following is correct to add a comment in php?', '1'),
(6, 'Which of the following is used to display the output in PHP?', '1'),
(7, 'Which of the following is the use of strlen() function in PHP?', '1'),
(8, 'Which of the following is used for concatenation in PHP?', '1'),
(9, 'Which of the following starts with __ (double underscore) in PHP?', '1'),
(10, 'Which of the following is the use of strpos() function in PHP?', '1'),
(11, 'What does PEAR stands for?', '1'),
(12, 'Which of the following is the correct way to create a function in PHP?', '1'),
(13, 'Which of the following PHP function is used to generate unique id?', '1');

-- --------------------------------------------------------

--
-- Table structure for table `result_table`
--

CREATE TABLE `result_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `status` enum('skipped','correct','wrong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_table`
--

INSERT INTO `result_table` (`id`, `user_id`, `session_id`, `q_id`, `status`) VALUES
(111, 1, 80, 11, 'skipped'),
(112, 1, 80, 14, 'skipped'),
(113, 1, 80, 9, 'skipped'),
(114, 1, 80, 6, 'skipped'),
(115, 1, 80, 2, 'skipped'),
(116, 1, 80, 2, 'skipped'),
(117, 1, 80, 14, 'skipped'),
(118, 1, 80, 8, 'skipped'),
(119, 1, 80, 12, 'skipped'),
(120, 1, 17, 1, 'correct'),
(121, 1, 17, 4, 'correct'),
(122, 1, 17, 7, 'wrong'),
(123, 1, 17, 4, 'correct'),
(124, 1, 17, 4, 'correct'),
(125, 1, 17, 6, 'correct'),
(126, 1, 17, 2, 'correct'),
(127, 1, 17, 3, 'correct'),
(128, 1, 17, 13, 'correct'),
(129, 1, 17, 10, 'correct'),
(130, 1, 77, 1, 'correct'),
(131, 1, 80, 1, 'skipped'),
(132, 1, 80, 1, 'skipped'),
(133, 1, 80, 1, 'skipped'),
(134, 1, 80, 0, 'skipped'),
(135, 1, 80, 0, 'skipped'),
(136, 1, 80, 0, 'skipped'),
(137, 1, 80, 8, 'skipped'),
(138, 1, 80, 9, 'skipped'),
(139, 1, 77, 1, 'correct'),
(140, 1, 77, 2, 'correct'),
(141, 1, 77, 3, 'correct'),
(142, 1, 77, 4, 'correct'),
(143, 1, 77, 0, 'skipped'),
(144, 1, 77, 0, 'skipped'),
(145, 1, 77, 0, 'skipped'),
(146, 1, 35, 1, 'skipped'),
(147, 1, 35, 2, 'skipped'),
(148, 1, 35, 3, 'skipped'),
(149, 1, 35, 4, 'skipped'),
(150, 1, 35, 5, 'skipped'),
(151, 1, 35, 6, 'skipped'),
(152, 1, 35, 7, 'skipped'),
(153, 1, 35, 8, 'skipped'),
(154, 1, 35, 9, 'skipped'),
(155, 1, 30, 1, 'correct'),
(156, 1, 30, 2, 'wrong'),
(157, 1, 30, 3, 'correct'),
(158, 1, 30, 4, 'correct'),
(159, 1, 30, 5, 'correct'),
(160, 1, 30, 6, 'wrong'),
(161, 1, 30, 7, 'wrong'),
(162, 1, 30, 8, 'wrong'),
(163, 1, 30, 9, 'correct');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `status`, `created_at`) VALUES
(1, 'khan', '0', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_table`
--
ALTER TABLE `answer_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_table`
--
ALTER TABLE `result_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_table`
--
ALTER TABLE `answer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `result_table`
--
ALTER TABLE `result_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
