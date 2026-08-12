-- ====================================================================
-- IRKGP Services - Complete Database Schema & Seed Data for Production
-- Suitable for Hostinger / cPanel / Local MySQL Import
-- ====================================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";

-- --------------------------------------------------------------------
-- 1. Table Structure for `admins`
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) DEFAULT 'admin',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed Default Admin (Email: admin@irkgpservices.com | Password: Admin@123)
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'IRKGP Admin', 'admin@irkgpservices.com', '$2y$12$WKS9IzVEHXxmYpGbxMf34.zhchf5i.iFoNZAW9vlQWwx0etmEtEeS', 'admin', '2026-08-01 10:00:00');

-- --------------------------------------------------------------------
-- 2. Table Structure for `jobs`
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
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

-- Seed Sample Job Openings
INSERT INTO `jobs` (`id`, `title`, `category`, `job_type`, `location`, `description`, `requirements`, `status`, `created_at`) VALUES
(1, 'Senior Data Entry Operator', 'Data Operator', 'Full Time', 'Purnia, Bihar (HO)', 'Responsible for accurate data entry, managing electronic records, processing daily operational reports, and maintaining data privacy standards for enterprise clients.', 'Minimum 2+ years experience in Data Entry\nProficiency in MS Excel, MS Word, and Hindi/English typing (35+ WPM)\nGraduate in any discipline\nStrong attention to detail', 'active', '2026-08-05 09:30:00'),
(2, 'Office Attendant (Parichari)', 'Parichari (Attendant)', 'Full Time', 'Patna, Bihar Branch', 'Assisting daily office administration, file movement, guest hospitality, handling mail dispatch, and supporting general office maintenance tasks.', 'Minimum 10th or 12th Pass\nGood communication skills and polite behavior\nPunctual and trustworthy\nPrior experience as office boy/attendant preferred', 'active', '2026-08-06 11:15:00'),
(3, 'Junior Administrative Clerk (Lipik)', 'Clerk', 'Full Time', 'Madhubani, Purnia', 'Managing office correspondence, record verification, billing documentation, and coordinating between field personnel and head office management.', 'Bachelor Degree in Commerce, Arts, or Science\nBasic computer certification (DCA / ADCA)\nKnowledge of office filing and documentation\n1+ years relevant administrative experience', 'active', '2026-08-08 14:20:00'),
(4, 'Remote Operations Assistant', 'Data Operator', 'Remote', 'Work From Home (Remote)', 'Managing virtual customer support queries, updating online database portals, scheduling client appointments, and assisting regional project leads remotely.', 'High-speed internet connection and personal laptop/PC\nExcellent communication in Hindi and English\nAbility to work independently with minimal supervision\nFresher / 1+ year experience welcome', 'active', '2026-08-10 16:45:00'),
(5, 'Facility Maintenance Supervisor', 'Lipik', 'Hybrid', 'Purnia & Field Units', 'Supervising security personnel, housekeeping teams, and facility maintenance ops across client sites. Ensuring quality compliance and shift reporting.', 'Diploma or Degree in Management / Technical field\n3+ years experience in workforce or facility supervision\nStrong leadership and conflict resolution skills\nMust have own two-wheeler for local client site visits', 'active', '2026-08-11 10:00:00');

-- --------------------------------------------------------------------
-- 3. Table Structure for `job_applications`
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `job_applications`;
CREATE TABLE `job_applications` (
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

-- Seed Sample Candidate Applications
INSERT INTO `job_applications` (`id`, `job_id`, `applicant_name`, `email`, `phone`, `experience`, `notes`, `status`, `created_at`) VALUES
(1, 1, 'Rahul Kumar', 'rahul.kumar@gmail.com', '9876543210', '3-5 Years', 'I have 3.5 years of experience in data entry and MS Office suite. Looking forward to joining IRKGP Services.', 'shortlisted', '2026-08-06 14:10:00'),
(2, 2, 'Ankur', 'ankur@gmail.com', '8787878787', '5+ Years', '5+ years experience in office assistance and hospitality management.', 'reviewed', '2026-08-07 16:30:00'),
(3, 3, 'Amit Verma', 'amit.verma@yahoo.com', '8765432109', '1-2 Years', 'Completed DCA computer diploma and worked 1.5 years as office clerk.', 'new', '2026-08-09 11:00:00'),
(4, 4, 'Priya Singh', 'priya.singh@outlook.com', '7654321098', 'Fresher', 'Fresh graduate eager to start career as remote operations assistant.', 'new', '2026-08-11 15:45:00');

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
