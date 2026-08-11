<?php
// Database Configuration for IRKGP Services
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'Manish@9661');
define('DB_NAME', 'irkgp_db');

function getDBConnection() {
    static $pdo = null;

    if ($pdo === null) {
        try {
            // Direct connection to existing database
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        } catch (PDOException $e) {
            die("Database Connection Failure: " . $e->getMessage());
        }
    }

    return $pdo;
}

/*
// Reference Code for Fresh Installation / Setup (Commented out):
// Used when database "irkgp_db" or tables do not exist yet on a new server.

function initDatabaseAndTables() {
    // 1. Connect without DB_NAME to create database if not exists
    $serverPdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $serverPdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // 2. Connect to irkgp_db
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // 3. Admins Table Creation
    $pdo->exec("CREATE TABLE IF NOT EXISTS `admins` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `email` VARCHAR(150) UNIQUE NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `role` VARCHAR(50) DEFAULT 'admin',
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");

    // Seed default admin if empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM `admins`");
    if ($stmt->fetchColumn() == 0) {
        $defaultPassword = password_hash('Admin@123', PASSWORD_BCRYPT);
        $insertStmt = $pdo->prepare("INSERT INTO `admins` (`name`, `email`, `password`, `role`) VALUES (:name, :email, :pass, 'admin')");
        $insertStmt->execute([
            ':name' => 'IRKGP Admin',
            ':email' => 'admin@irkgpservices.com',
            ':pass' => $defaultPassword
        ]);
    }

    // 4. Jobs Table Creation
    $pdo->exec("CREATE TABLE IF NOT EXISTS `jobs` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(150) NOT NULL,
        `category` VARCHAR(100) NOT NULL,
        `job_type` VARCHAR(50) NOT NULL,
        `location` VARCHAR(100) NOT NULL,
        `description` TEXT NOT NULL,
        `requirements` TEXT NOT NULL,
        `status` ENUM('active', 'inactive') DEFAULT 'active',
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");
}
*/
