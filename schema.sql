-- ========================================================
-- IRKGP Services - Complete Database Schema for Live Server
-- Safe Import for Hostinger / cPanel / phpMyAdmin
-- ========================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- 1. Table structure for `admins`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) DEFAULT 'admin',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default Admin Credentials: admin@irkgpservices.com / Admin@123
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'IRKGP Admin', 'admin@irkgpservices.com', '$2y$10$wW5V1v47mO2j3X7V2Q8jUe4V.gXk.M5h5n2Q5Z8G.j5h5n2Q5Z8G.', 'admin')
ON DUPLICATE KEY UPDATE `id`=`id`;

-- --------------------------------------------------------
-- 2. Table structure for `jobs`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `job_type` VARCHAR(50) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `requirements` TEXT NOT NULL,
  `status` ENUM('active', 'inactive') DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 3. Table structure for `job_applications`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `job_id` INT DEFAULT NULL,
  `applicant_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(30) NOT NULL,
  `experience` VARCHAR(50) DEFAULT NULL,
  `notes` TEXT DEFAULT NULL,
  `status` ENUM('new', 'reviewed', 'shortlisted', 'rejected') DEFAULT 'new',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
