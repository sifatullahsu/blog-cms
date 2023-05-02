-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 08:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachments`
--

CREATE TABLE `tbl_attachments` (
  `att_id` int(11) NOT NULL,
  `att_author` int(11) NOT NULL,
  `att_title` varchar(300) NOT NULL,
  `att_alt` varchar(300) NOT NULL,
  `att_description` varchar(500) NOT NULL,
  `att_slug` varchar(300) NOT NULL,
  `att_status` varchar(20) NOT NULL,
  `att_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attachments`
--

INSERT INTO `tbl_attachments` (`att_id`, `att_author`, `att_title`, `att_alt`, `att_description`, `att_slug`, `att_status`, `att_date`) VALUES
(8, 0, '', '', '', 'uploads/2022/08/code.png', '', '0000-00-00 00:00:00'),
(9, 0, '', '', '', 'code-3png', '', '0000-00-00 00:00:00'),
(10, 0, '', '', '', 'code-3png', '', '0000-00-00 00:00:00'),
(11, 0, '', '', '', 'code-2png', '', '0000-00-00 00:00:00'),
(12, 0, '', '', '', 'code-2png', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_content` text NOT NULL,
  `post_excerpt` varchar(256) NOT NULL,
  `post_featured` varchar(300) NOT NULL,
  `post_slug` varchar(300) NOT NULL,
  `post_status` varchar(15) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_modified` datetime NOT NULL,
  `post_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_author`, `post_title`, `post_content`, `post_excerpt`, `post_featured`, `post_slug`, `post_status`, `post_date`, `post_modified`, `post_type`) VALUES
(1, 1, '4 How to Track User Activity in WordPress with Security Audit Logs', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website. Every activity log has a unique event ID, user details, time, user’s IP address, and details of what changed. Do you want to monitor user activity on your WordPress site?\r\n\r\nKeeping an activity log in WordPress helps you track and monitor user actions on your website. Because It helps you to identify suspicious activities like failed login attempts, plugin activation deactivation, and even DDoS attacks. Or if you think to see exactly what people are doing on your site. This article is for you.\r\n\r\nIn this article, I’ll show you how to track user activity and keep a security audit log in WordPress.', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website.', '', 'how-to-track-user-activity-in-wordpress-4', 'publish', '2022-07-06 21:56:06', '2022-07-12 00:00:00', 'post'),
(2, 1, 'How to Track User Activity in WordPress with Security Audit Logs', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website. Every activity log has a unique event ID, user details, time, user’s IP address, and details of what changed. Do you want to monitor user activity on your WordPress site?\r\n\r\nKeeping an activity log in WordPress helps you track and monitor user actions on your website. Because It helps you to identify suspicious activities like failed login attempts, plugin activation deactivation, and even DDoS attacks. Or if you think to see exactly what people are doing on your site. This article is for you.\r\n\r\nIn this article, I’ll show you how to track user activity and keep a security audit log in WordPress.', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website.', '', 'how-to-track-user-activity-in-wordpress', 'publish', '2022-07-12 00:00:00', '2022-07-12 00:00:00', 'projects'),
(3, 1, '3 How to Track User Activity in WordPress with Security Audit Logs', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website. Every activity log has a unique event ID, user details, time, user’s IP address, and details of what changed. Do you want to monitor user activity on your WordPress site?\r\n\r\nKeeping an activity log in WordPress helps you track and monitor user actions on your website. Because It helps you to identify suspicious activities like failed login attempts, plugin activation deactivation, and even DDoS attacks. Or if you think to see exactly what people are doing on your site. This article is for you.\r\n\r\nIn this article, I’ll show you how to track user activity and keep a security audit log in WordPress.', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website.', '', 'how-to-track-user-activity-in-wordpress-3', 'publish', '2022-07-12 00:00:00', '2022-07-12 00:00:00', 'post'),
(4, 1, '2 How to Track User Activity in WordPress with Security Audit Logs', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website. Every activity log has a unique event ID, user details, time, user’s IP address, and details of what changed. Do you want to monitor user activity on your WordPress site?\r\n\r\nKeeping an activity log in WordPress helps you track and monitor user actions on your website. Because It helps you to identify suspicious activities like failed login attempts, plugin activation deactivation, and even DDoS attacks. Or if you think to see exactly what people are doing on your site. This article is for you.\r\n\r\nIn this article, I’ll show you how to track user activity and keep a security audit log in WordPress.', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website.', '', 'how-to-track-user-activity-in-wordpress-2', 'publish', '2022-07-12 00:00:00', '2022-07-12 00:00:00', 'post'),
(5, 1, '1 How to Track User Activity in WordPress with Security Audit Logs', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website. Every activity log has a unique event ID, user details, time, user’s IP address, and details of what changed. Do you want to monitor user activity on your WordPress site?\r\n\r\nKeeping an activity log in WordPress helps you track and monitor user actions on your website. Because It helps you to identify suspicious activities like failed login attempts, plugin activation deactivation, and even DDoS attacks. Or if you think to see exactly what people are doing on your site. This article is for you.\r\n\r\nIn this article, I’ll show you how to track user activity and keep a security audit log in WordPress.', 'Activity logs are also known as audit logs, security logs, or security audit logs. It records every change that happens on a website.', '', 'how-to-track-user-activity-in-wordpress', 'publish', '2022-07-12 00:00:00', '2022-07-12 00:00:00', 'post'),
(6, 1, 'sss', 'sssss', 'post_excerpt', '123', 'sss', 'Publish', '2022-07-18 02:50:24', '2022-07-18 02:50:24', 'post'),
(7, 1, 'sss', 'sssssssssssssss', 'post_excerpt', '123', 'sss-2', 'Publish', '2022-07-18 02:50:27', '2022-07-18 02:50:27', 'post'),
(8, 1, 'sss', 'sssssssssssss', 'post_excerpt', '123', 'sss', 'Publish', '2022-07-18 02:55:57', '2022-07-18 02:55:57', 'portfilio'),
(9, 1, 'sss', 'ssssssssssssss', 'post_excerpt', '123', 'sss-2', 'Publish', '2022-07-18 02:56:02', '2022-07-18 02:56:02', 'portfilio'),
(10, 1, 'sss', 'ssssssssssssss', 'post_excerpt', '123', 'sss-3', 'Publish', '2022-07-18 02:56:02', '2022-07-18 02:56:02', 'portfilio'),
(11, 1, 'sss', 'ssssssssssssss', 'post_excerpt', '123', 'sss-4', 'Publish', '2022-07-18 02:56:02', '2022-07-18 02:56:02', 'portfilio');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_nickname` varchar(30) NOT NULL,
  `user_displayname` varchar(30) NOT NULL,
  `user_status` varchar(30) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_login`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_nickname`, `user_displayname`, `user_status`, `user_role`, `user_registered`) VALUES
(1, 'sifatullah', 'personal.sifat@gmail.com', '827CCB0EEA8A706C4C34A16891F84E7B', 'Sifat', 'Ullah', 'Sifat', 'Sifat Ullah', 'active', 'administrator', '2022-07-12'),
(2, 'shihab', 'shihab@email.com', '827CCB0EEA8A706C4C34A16891F84E7B', 'Shihab', 'Ullah', 'Shihab', 'Shihab Ullah', 'active', 'subscriber', '2022-07-12'),
(3, 'shafi', 'shafi@email.com', '123456', 'Shafi', 'Ullah', '', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attachments`
--
ALTER TABLE `tbl_attachments`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attachments`
--
ALTER TABLE `tbl_attachments`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
