-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 08:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `ID` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'exist',
  `canvas_link` text NOT NULL,
  `preview_image` text NOT NULL,
  `css_code` text NOT NULL,
  `javascript_code` text NOT NULL,
  `php_code` text NOT NULL,
  `sass_code` text NOT NULL,
  `html_code` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `Template_origin` varchar(100) NOT NULL,
  `Develop_by` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_edited` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ID`, `module_name`, `status`, `canvas_link`, `preview_image`, `css_code`, `javascript_code`, `php_code`, `sass_code`, `html_code`, `description`, `tags`, `Template_origin`, `Develop_by`, `date_created`, `last_edited`) VALUES
(26, 'module-1', 'exist', 'https://admin.roya.com/Site-4a7941d0-0235-4a0d-adb2-e80192a45738/WebPage-9c8e6139-1db1-46e5-9592-22ba786d0429', 'https://s3.amazonaws.com/static.organiclead.com/Site-4a7941d0-0235-4a0d-adb2-e80192a45738/module_1.JPG', '', '', '', '.module-1{\n  display: flex;\n  justify-content: space-between;\n  margin-bottom: 20px;\n  @include max(767px){\n    flex-direction: column;\n    align-items: center;\n  }\n  h1,h2,h3,h4,h5,h6,p{\n    @include max(767px){\n      text-align: center;\n    }\n  }\n  h1,h2,h3,h4,h5,h6{\n    @include font-size(20px,26px,320px,1600px);\n  }\n  .ry-box-left{\n    width: 25%;\n    @include max(500px){\n      width: 50%;\n    }\n    img{\n      @include max(767px){\n        margin-bottom: 20px;\n      }\n    }\n  }\n  .ry-box-right{\n    width: 70%;\n    @include max(767px){\n      width: 100%;\n    }\n  }\n}', ' ', 'Default Layout / 2box view usually used for meet the team', '', 'SVP inner pages', '', '2019-04-23 12:34:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_module`
--

CREATE TABLE `temp_module` (
  `ID` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `temp_module`
--
ALTER TABLE `temp_module`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `temp_module`
--
ALTER TABLE `temp_module`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
