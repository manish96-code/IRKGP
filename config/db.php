<?php
// Database Configuration for IRKGP Services
// Admin Access Credentials: Email = admin@irkgpservices.com | Password = Admin@123

// Helper function to parse and load .env file
function loadEnv($envPath) {
    if (!file_exists($envPath)) {
        return;
    }

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }

        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            // Strip surrounding quotes if present
            $value = preg_replace('/^["\'](.*)["\']$/', '$1', $value);

            if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
                putenv("{$key}={$value}");
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }
}

// Load environment variables from .env
loadEnv(__DIR__ . '/../.env');

define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');
define('DB_NAME', getenv('DB_NAME') ?: 'irkgp_db');

function getDBConnection() {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            // Ensure Applications Table exists
            ensureApplicationsTable($pdo);

        } catch (PDOException $e) {
            die("Database Connection Failure: " . $e->getMessage());
        }
    }

    return $pdo;
}

function ensureApplicationsTable($pdo) {
    $pdo->exec("CREATE TABLE IF NOT EXISTS `job_applications` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `job_id` INT DEFAULT NULL,
        `applicant_name` VARCHAR(150) NOT NULL,
        `email` VARCHAR(150) NOT NULL,
        `phone` VARCHAR(30) NOT NULL,
        `experience` VARCHAR(50) DEFAULT NULL,
        `notes` TEXT DEFAULT NULL,
        `status` ENUM('new', 'reviewed', 'shortlisted', 'rejected') DEFAULT 'new',
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");
}
