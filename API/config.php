<?php

// Database connection details
define('DB_HOST', 'localhost');
define('DB_NAME', 'findhousequick_db');
define('DB_USER', 'findhousequick_user');
define('DB_PASS', 'your_database_password');

// API settings
define('API_VERSION', 'v1');
define('DEBUG_MODE', false); // Set to false in production

// JWT secret for authentication
define('JWT_SECRET', 'your_very_secret_key_here'); 

// Error reporting (adjust based on your environment)
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0); // Turn off error reporting in production
    ini_set('display_errors', '0');
}