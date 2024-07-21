-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 01:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welfare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `email`, `password`, `token`) VALUES
(2, 'sohailemi52@gmail.com', '12345', '12345678987sd647');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `message` varchar(100) NOT NULL,
  `timestamp` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `reason`, `message`, `timestamp`) VALUES
(40, 'Hilel Golden', 'wykory@mailinator.com', '+1 (507) 747-8419', 'Quam velit quae sit ', 'Labore aliqua Sed p', '00:00:00.000000'),
(42, 'Travis Roy', 'marisur@mailinator.com', '+1 (605) 517-8781', 'Porro obcaecati et a', 'Error tempora omnis ', '00:00:00.000000'),
(43, 'Shea Moran', 'nocuvogy@mailinator.com', '+1 (901) 118-6723', 'Maiores dolore debit', 'Ex consequat Anim e', '09:25:59.000000'),
(44, 'Pascale Beard', 'wujybohypi@mailinator.com', '+1 (155) 338-8814', 'Illo dolorem sed nis', 'Perspiciatis quisqu', '00:20:24.000000'),
(45, 'Igor Ochoa', 'qicecizuv@mailinator.com', '+1 (358) 268-8924', 'Dolores dolore beata', 'Ullam labore odio ir', '09:28:34.000000'),
(46, 'Cadman Hurley', 'reci@mailinator.com', '+1 (284) 405-2419', 'Alias et impedit no', 'Quia ipsum quasi off', '13:30:03.000000'),
(47, 'Melanie May', 'fatudun@mailinator.com', '+1 (616) 569-9997', 'Pariatur Ex neque m', 'Eius numquam iure qu', '13:30:58.000000'),
(48, 'Amir Petersen', 'qene@mailinator.com', '+1 (696) 536-9257', 'Aliquip anim dolorib', 'Aute fugiat culpa i', '16:19:01.000000'),
(49, 'Cathleen Blackwell', 'refujopilo@mailinator.com', '+1 (326) 965-8605', 'Alias magni eos vol', 'Atque molestiae ex i', '12:20:20.000000'),
(50, 'Cedric French', 'qiramoqi@mailinator.com', '+1 (922) 987-1717', 'Adipisci qui autem i', 'Nemo explicabo Volu', '13:44:20.000000'),
(51, 'Lewis Harrison', 'morof@mailinator.com', '+1 (564) 618-4034', 'Voluptate modi dolor', 'Consequatur minima ', '13:45:17.000000'),
(52, 'Sohail', 'sohail@gmail.com', '02345364765', 'CHVEWKYVC,MZC ', 'sadjvcwugflSMANC hgqfd', '20:31:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `message`, `id`, `image`) VALUES
('Perry Pate', 'Temporibus fugiat ip', 19, '65c330b7ac8e73.42144790.png'),
('Leslie Sanchez', 'Laboris ratione moll', 20, '65c330fb048a98.29792027.jpg'),
('Shoshana Guerrero', 'Quae veniam odit et', 21, '65c475979004f3.38926643.jpg'),
('Sohail Younas', 'interesting Website ', 22, '65d332e3bc5777.97505329.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rawara_profile`
--

CREATE TABLE `rawara_profile` (
  `ID` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawara_profile`
--

INSERT INTO `rawara_profile` (`ID`, `username`, `email`, `age`, `gender`, `status`, `country`, `education`, `caste`, `religion`, `profile_image`, `contact`) VALUES
(9, 'Harlan Larsen', 'tuwi@mailinator.com', 'Molestiae laboris ul', 'Male', 'Divorced', 'Aland Islands', 'Inter', 'Rajpoot', 'Hindu', '65c72c6a9c1a23.89614666.jpg', 'Porro aliquam in omn'),
(10, 'Mona Jameel', 'wuluhol@mailinator.com', 'Enim animi tempor d', 'Female', 'Single', 'Aland Islands', 'M phil', 'Rajpoot', 'Sikh', '65d86d1eab194.jpg', 'Voluptatem beatae pa');

-- --------------------------------------------------------

--
-- Table structure for table `rdsignup`
--

CREATE TABLE `rdsignup` (
  `ID` int(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Cpassword` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rdsignup`
--

INSERT INTO `rdsignup` (`ID`, `first_name`, `last_name`, `email`, `password`, `Cpassword`, `date_of_birth`, `city_id`, `phone`, `token`) VALUES
(6, 'Asher', 'Bell', 'sohailemi52@gmail.com', 'younas', 'Pa$$w0rd!', '1983-07-07', 'Islamabad', '66', '75955a4bf60fa69b67932c810141ca'),
(7, 'sana', 'fatima', 'sanag@gmail.com', '54321', '54321', '1999-03-04', 'Lahore', '03224132678', '3800e527a72d377bc59401803a90cf');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `ID` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Cpassword` varchar(1000) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `caste_id` varchar(255) NOT NULL,
  `religion_id` varchar(255) NOT NULL,
  `education_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`ID`, `first_name`, `last_name`, `email`, `password`, `Cpassword`, `gender`, `date_of_birth`, `marital_status`, `country_id`, `state_id`, `city_id`, `caste_id`, `religion_id`, `education_id`, `phone`, `token`) VALUES
(48, 'Kamran', 'Ali', 'sohailemi52@gmail.com', 'younas', 'Pa$$w0rd!', 'female', '1981-01-04', 'Single', 'Andorra', 'Sindh', 'Lahore', 'Bhatti', 'Hindu', 'Inter', '37', '6e28f6b8887ca09ee56094fc6ca930d8'),
(49, 'Tanek', 'Stokes', 'hizij@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'female', '1976-02-04', 'Widowed', 'Afghanistan', 'punjab', 'Lahore', 'Mughal', 'Religion', 'MS', '85', '98a5b73d72dba404855b24405de64bdb'),
(50, 'Lareina', 'Kemp', 'mavuxypiq@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'female', '1982-08-26', 'Single', 'Andorra', 'Sindh', 'Karachi', 'Bhatti', 'Islam', 'MS', '20', '90ce04ac30e4666ab9ca977d6cc93a20'),
(51, 'Anastasia', 'Mccarthy', 'foveh@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'male', '1995-02-15', 'separated', 'American Samoa', 'punjab', 'Islamabad', 'Rajpoot', 'Religion', 'Inter', '29', '6bde0343cfcb749df49ab5531b5a500a'),
(52, 'sohail ', 'younas', 'pecumonike@gmail.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'female', '2005-03-18', 'separated', 'Andorra', 'Sindh', 'Lahore', 'Mughal', 'Islam', 'MS', '75', '3ff609b47db76fe266f73e15d40f9b71'),
(53, 'nasra', 'abbas', 'saithg0303@gmail.com', '12345', '12345', 'female', '2005-08-11', 'Single', 'Andorra', 'punjab', 'Lahore', 'Jutt', 'Islam', 'BS', '0342678532', '690a60bb44b21f68d83371dce65a822d');

-- --------------------------------------------------------

--
-- Table structure for table `tasktodo`
--

CREATE TABLE `tasktodo` (
  `id` int(50) NOT NULL,
  `Task` varchar(255) NOT NULL,
  `Time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasktodo`
--

INSERT INTO `tasktodo` (`id`, `Task`, `Time`) VALUES
(42, 'here i want to tell you', '16:22:40.000000'),
(43, 'here i want to tell you', '16:22:43.000000'),
(44, 'here i want to tell you', '16:22:46.000000'),
(46, 'want to do some ', '21:34:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `weddingprof`
--

CREATE TABLE `weddingprof` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weddingprof`
--

INSERT INTO `weddingprof` (`ID`, `name`, `email`, `phone`, `age`, `gender`, `status`, `country`, `city`, `education`, `caste`, `religion`, `image`) VALUES
(56, 'kamran Akram', 'sohailemi52@gmail.com', 'Voluptates in facili', 'Similique labore non', 'male', 'separated', 'Algeria', 'Lahore', 'Mphil', 'Mughal', 'Islam', '65d868751a945.jpg'),
(57, 'Sohail Younas', 'pecumonike@gmail.com', 'Sed aute vel eum inv', 'Cupiditate itaque ob', 'female', 'Divorced', 'Andorra', 'Islamabad', 'Inter', 'Bhatti', 'Islam', '65d8420d58c887.25605936.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawara_profile`
--
ALTER TABLE `rawara_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rdsignup`
--
ALTER TABLE `rdsignup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tasktodo`
--
ALTER TABLE `tasktodo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weddingprof`
--
ALTER TABLE `weddingprof`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rawara_profile`
--
ALTER TABLE `rawara_profile`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rdsignup`
--
ALTER TABLE `rdsignup`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tasktodo`
--
ALTER TABLE `tasktodo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `weddingprof`
--
ALTER TABLE `weddingprof`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
