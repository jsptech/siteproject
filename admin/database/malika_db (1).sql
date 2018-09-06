-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 11:51 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malika_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `title`, `content_body`, `status`) VALUES
(1, 'विद्यालयको परिचय', 'कठोर राणा शासनको अन्त्यपछि नेपालभरी सर्वत्र पाठशालाहरु स्थापना हुने सिलसिला शुरु भयो । शिक्षा बहुमुखी विकासको श्रोत हो भन्ने कुरालाई हृदयङ्गम गरी यस भेकका तत्कालीन चौमाला राणा दरबारवाट सूर्य प्रकाश राणाले आफ्नै दरबारको एउटा कक्षमा शिक्षालय स्थापना गर्न प्रेरणा दिएको सुनिन्छ । जनश्रुति अनुसार वि.सं. २०१६ साल श्रीपञ्चमीका दिनदेखि सु–सञ्चालन गर्ने भनी स्थानीय शिक्षाप्रेमी हरद्वारी रानाको अध्यक्षतामा र लोक बहादुर शाहीको सेकरेटरीसीपमा गठित पाठशाला सञ्चालन समितिको र जनसमुदायको सहभागितामा उक्त राणा दरवारमा भएको बालवालिकाहरुको नामाङ्ककनबाट वर्तमान मालिका मा.वि. को प्रथम सोपान स्वरुप प्राइमरी पाठशाला चौमालाको जग बसेको हो भन्ने सुनिन्छ ।', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE IF NOT EXISTS `news_events` (
  `id` int(11) NOT NULL,
  `news_event` varchar(10) NOT NULL,
  `news_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_file_id` varchar(1000) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `posted_date` datetime NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `news_event`, `news_title`, `news_content`, `image_file_id`, `posted_by`, `posted_date`, `statuss`) VALUES
(30, 'Events', 'नेपालकाे समाचार', '<h1>मलाई माफ गरिदेउ</h1><h2>म तिमिबिना मरिहाल्छु नि ।<br></h2><h3>म मरेक पजलजज<br></h3><p>जज<img alt=""><br></p><p>\r\n\r\n</p><h1>मलाई माफ गरिदेउ</h1><h2>म तिमिबिना मरिहाल्छु नि ।<br></h2><h3>म मरेक पजलजज<br></h3><p>जज</p>\r\n\r\n<br><p></p><p><br></p><p>\r\n\r\n</p><h1>मलाई माफ गरिदेउ</h1><h2>म तिमिबिना मरिहाल्छु नि ।<br></h2><h3>म मरेक पजलजज<br></h3><p>जज<img alt=""></p>\r\n\r\n<br><p></p>', 'upload/_1536159447.', 'prabin', '2018-09-05 08:42:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `specialized_subject` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email_id`, `username`, `password`, `user_type`, `status`) VALUES
(1, 'Prabin Chandra Basnet', 'basnetprabin444@gmail.com', 'prabin', '656eda2157995d59cb97c7c2e3b2b11faf03deca', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
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
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
