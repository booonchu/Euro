-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2016 at 01:19 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.6.27-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musicschool2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_category_id` int(10) unsigned NOT NULL,
  `usercode` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total_classes` int(11) NOT NULL,
  `class_hours` int(11) NOT NULL,
  `standard_cost` decimal(10,2) NOT NULL,
  `standard_saleprice` decimal(10,2) NOT NULL,
  `is_non_kawai` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(2000) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercode` (`usercode`),
  KEY `name` (`name`),
  KEY `course_category_id` (`course_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_category_id`, `usercode`, `name`, `total_classes`, `class_hours`, `standard_cost`, `standard_saleprice`, `is_non_kawai`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'C0001', 'เปียโน เริ่มต้น 1', 10, 60, '180.00', '200.00', 0, NULL, 'ACTIVE', NULL, NULL),
(3, 1, 'C0002', 'เปียโน เริ่มต้น 2', 10, 60, '180.00', '200.00', 0, NULL, 'ACTIVE', NULL, NULL),
(4, 1, 'C0003', 'เปียโน เริ่มต้น 3', 10, 60, '180.00', '200.00', 0, NULL, 'ACTIVE', NULL, NULL),
(5, 1, 'C0000', 'เปียโน ทดลอง', 1, 30, '0.00', '0.00', 1, 'ใช้สำหรับทดลองและทำโปรโมชั่น', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
CREATE TABLE IF NOT EXISTS `course_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'เปียโน เริ่มต้น', 'สำหรับผู้เริ่มต้นฝึกหัด', 'ACTIVE', NULL, NULL),
(2, 'เปียโน ขั้นสูง', 'สำหรับผู้ที่มีความรู้พื้นฐานแล้ว', 'ACTIVE', NULL, NULL),
(3, 'กลอง', 'สำหรับคนทั่วไป', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `holiday_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `school_id`, `name`, `holiday_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'วันขึ้นปีใหม่', '2016-01-01', NULL, NULL),
(2, 2, 'วันสงกรานต์', '2016-03-13', NULL, NULL),
(3, 2, 'วันพ่อแห่งชาติ', '2016-12-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` tinyint(4) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `school_id`, `name`, `capacity`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'เปียโน 1', 2, 'สำหรับเปียโนมาตรฐาน', 'ACTIVE', NULL, NULL),
(2, 2, 'เปียโน 2', 1, 'สำหรับเปียโนขั้นสูง', 'ACTIVE', NULL, NULL),
(3, 2, 'ทั่วไป', 4, 'สำหรับอบรมภาคทฤษฎี', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usercode` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercode` (`usercode`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `usercode`, `name`, `contact_email`, `contact_phone`, `address`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'S0001', 'สาขาเซ็นทรัลเวิลด์', 'schoolcentralworld@gmail.com', '02999999', 'ชั้น16 อาคารเซนเวิลด์ ราชประสงค์ ถนนราชดำริ', NULL, 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_courses`
--

DROP TABLE IF EXISTS `school_courses`;
CREATE TABLE IF NOT EXISTS `school_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `saleprice` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id_course_id` (`school_id`,`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_courses`
--

INSERT INTO `school_courses` (`id`, `school_id`, `course_id`, `saleprice`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '200.00', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_course_cost_history`
--

DROP TABLE IF EXISTS `school_course_cost_history`;
CREATE TABLE IF NOT EXISTS `school_course_cost_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_courses_id` int(10) unsigned NOT NULL,
  `effective_date` date NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `effective_date` (`effective_date`),
  KEY `school_courses_id` (`school_courses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_course_cost_history`
--

INSERT INTO `school_course_cost_history` (`id`, `school_courses_id`, `effective_date`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-11-08', '180.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_loyalty_fee_history`
--

DROP TABLE IF EXISTS `school_loyalty_fee_history`;
CREATE TABLE IF NOT EXISTS `school_loyalty_fee_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `effective_date` date NOT NULL,
  `loyalty_fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `effective_date` (`effective_date`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_loyalty_fee_history`
--

INSERT INTO `school_loyalty_fee_history` (`id`, `school_id`, `effective_date`, `loyalty_fee`, `created_at`, `updated_at`) VALUES
(1, 2, '2016-11-24', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `usercode` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `referrer_name` varchar(100) DEFAULT NULL,
  `referrer_phone` varchar(50) DEFAULT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id_usercode` (`school_id`,`usercode`),
  KEY `school_id` (`school_id`),
  KEY `firstname` (`firstname`),
  KEY `id_card` (`id_card`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `usercode`, `firstname`, `lastname`, `id_card`, `birth_date`, `sex`, `email`, `phone`, `address`, `referrer_name`, `referrer_phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'S0001', 'สมคิด', 'เก่งเรียน', '1111111111111', '2000-01-07', 'MALE', 'dang@gmail.com', '022222222', '84 ซอย3 วิภาวดี จตุจักร์ 20144 กรุงเทพฯ', 'นายปิติ สมมติ', '028888888', '- จบการศึกษาชั้นมัธยมศึกษาจาก โรงเรียนบางกะปิ \r\n- จบระดับปริญญาตรีจาก คณะสถาปัตยกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย\r\n- สามารถเปียโนขั้นพื้นฐานได้', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subscriptions`
--

DROP TABLE IF EXISTS `student_subscriptions`;
CREATE TABLE IF NOT EXISTS `student_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `ref` varchar(10) NOT NULL,
  `main_teacher_id` int(10) unsigned NOT NULL,
  `main_room_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'HELD',
  `closed_date` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`ref`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`),
  KEY `status` (`status`),
  KEY `closed_date` (`closed_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_subscriptions`
--

INSERT INTO `student_subscriptions` (`id`, `student_id`, `course_id`, `ref`, `main_teacher_id`, `main_room_id`, `start_date`, `day`, `start_time`, `status`, `closed_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0001', 1, 1, '2016-12-05', 'MON', '09:00:00', 'HELD', NULL, NULL, '2016-11-17 17:00:00', NULL),
(2, 1, 1, '0002', 1, 1, '2016-12-02', 'FRI', '09:00:00', 'CANCELLED', '2016-11-18 00:00:00', 'ขาดการติดต่อ', '2016-11-17 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subscription_classes`
--

DROP TABLE IF EXISTS `student_subscription_classes`;
CREATE TABLE IF NOT EXISTS `student_subscription_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `student_subscription_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_moved` tinyint(1) NOT NULL DEFAULT '0',
  `saleprice` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'HELD',
  `cancelled_date` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_subscription_id` (`student_subscription_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `room_id` (`room_id`),
  KEY `school_id` (`school_id`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`),
  KEY `status` (`status`),
  KEY `cancelled_date` (`cancelled_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_subscription_classes`
--

INSERT INTO `student_subscription_classes` (`id`, `school_id`, `student_subscription_id`, `teacher_id`, `room_id`, `start_date`, `end_date`, `is_paid`, `is_moved`, `saleprice`, `status`, `cancelled_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, '2016-12-05 09:00:00', '2016-12-05 10:00:00', 1, 0, '200.00', 'HELD', NULL, NULL, '2016-11-17 17:00:00', NULL),
(2, 2, 1, 1, 1, '2016-12-02 09:00:00', '2016-12-02 10:00:00', 0, 1, '200.00', 'CANCELLED', '2016-11-18 00:00:00', 'ระบุวันที่ผิด', '2016-11-17 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subscription_payments`
--

DROP TABLE IF EXISTS `student_subscription_payments`;
CREATE TABLE IF NOT EXISTS `student_subscription_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_subscription_id` int(10) unsigned NOT NULL,
  `ref1` varchar(50) DEFAULT NULL,
  `ref2` varchar(50) DEFAULT NULL,
  `discount_class` int(11) DEFAULT NULL,
  `payment_method` varchar(10) NOT NULL DEFAULT 'CASH',
  `cheque_bank` varchar(50) DEFAULT NULL,
  `cheque_branch` varchar(50) DEFAULT NULL,
  `cheque_no` varchar(50) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `bankdeposit_bank` varchar(50) DEFAULT NULL,
  `bankdeposit_branch` varchar(50) DEFAULT NULL,
  `bankdeposit_no` varchar(50) DEFAULT NULL,
  `bankdeposit_date` date DEFAULT NULL,
  `creditcard_issuer` varchar(50) DEFAULT NULL,
  `creditcard_no` varchar(50) DEFAULT NULL,
  `main_teacher_id` int(10) unsigned NOT NULL,
  `main_room_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'HELD',
  `cancelled_date` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_subscription_id` (`student_subscription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_subscription_payments`
--

INSERT INTO `student_subscription_payments` (`id`, `student_subscription_id`, `ref1`, `ref2`, `discount_class`, `payment_method`, `cheque_bank`, `cheque_branch`, `cheque_no`, `cheque_date`, `bankdeposit_bank`, `bankdeposit_branch`, `bankdeposit_no`, `bankdeposit_date`, `creditcard_issuer`, `creditcard_no`, `main_teacher_id`, `main_room_id`, `start_date`, `day`, `start_time`, `status`, `cancelled_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, '2559', '12/001', 10, 'CASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2016-12-05', 'MON', '09:00:00', 'HELD', NULL, NULL, '2016-11-17 17:00:00', NULL),
(2, 1, '2559', '12/001', 10, 'CASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2016-12-05', 'MON', '09:00:00', 'CANCELLED', '2016-11-18 00:00:00', 'ระบุคาบเรียนไม่ถูกต้อง', '2016-11-17 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subscription_payment_classes`
--

DROP TABLE IF EXISTS `student_subscription_payment_classes`;
CREATE TABLE IF NOT EXISTS `student_subscription_payment_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_subscription_payment_id` int(10) unsigned NOT NULL,
  `student_subscription_class_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_subscription_class_id` (`student_subscription_class_id`),
  KEY `student_subscription_payment_id` (`student_subscription_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_subscription_payment_others`
--

DROP TABLE IF EXISTS `student_subscription_payment_others`;
CREATE TABLE IF NOT EXISTS `student_subscription_payment_others` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_subscription_payment_id` int(10) unsigned NOT NULL,
  `name` varchar(10) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_subscription_payment_id` (`student_subscription_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `usercode` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `description` text,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id_usercode` (`school_id`,`usercode`),
  KEY `school_id` (`school_id`),
  KEY `firstname` (`firstname`),
  KEY `id_card` (`id_card`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `school_id`, `usercode`, `firstname`, `lastname`, `id_card`, `birth_date`, `sex`, `email`, `phone`, `address`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'T0001', 'สมชาย', 'ดีงาม', '1111111111111', '1980-05-13', 'MALE', 'teacher1@gmail.com', '022222222', '333/3 ถนนวิภาวดีรังสิต แขวงจอมพล เขตจตุจักร กรุงเทพมหานคร ', '- เข้าศึกษาที่โรงเรียนกฎหมาย กระทรวงยุติธรรม และศึกษาภาษาฝรั่งเศสที่เนติบัณฑิตยสภา\r\n- เข้าศึกษาวิชากฎหมายที่มหาวิทยาลัยกอง \r\n- ศึกษาระดับปริญญาเอกสาขานิติศาสตร์ จากคณะนิติศาสตร์ มหาวิทยาลัยปารีส', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

DROP TABLE IF EXISTS `teacher_courses`;
CREATE TABLE IF NOT EXISTS `teacher_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teacher_id_course_id` (`teacher_id`,`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`id`, `teacher_id`, `course_id`, `is_approved`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'ACTIVE', '2016-11-16 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `firstname` (`firstname`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `firstname`, `lastname`, `sex`, `phone`, `school_id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user1@gmail.com', 'manakaisa', '$2y$10$PzM5GTQCW4PPasKqf/FbzOYFjL9dKyo6y1X7UpdKR27sKXHDaBDIe', 'Mana', 'Noname', 'MALE', '025555555', 2, 'ADMIN', 'ACTIVE', '2016-11-06 03:06:20', '2016-11-06 03:06:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
