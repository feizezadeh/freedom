<?php

// Application Configuration

// --- Database Configuration ---
define('DB_HOST', 'localhost');         // MySQL host (e.g., '127.0.0.1' or 'localhost')
define('DB_NAME', 'doktoryab_clone');   // Your database name
define('DB_USER', 'root');              // Your database username
define('DB_PASS', '');                  // Your database password
define('DB_CHARSET', 'utf8mb4');        // Database charset

// --- Application Settings ---
define('APP_NAME', 'Doktoryab Clone');
define('APP_ENV', 'development'); // 'development', 'production', 'testing'

// Base URL of the application (important for links, assets, redirects)
// Try to determine it dynamically, but can be set manually if needed.
// Ensure it ends with a slash if it's not empty.
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
// If your app is in a subdirectory of the web root, you might need to adjust SCRIPT_NAME or add the subdirectory path.
// For example, if your app is at http://localhost/my_project/, then APP_URL should be http://localhost/my_project/
// A common way to get the base path if public/index.php is the entry point:
$script_dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
define('APP_URL', $protocol . $host . $script_dir); // Example: http://localhost/ or http://localhost/my_project/

// --- Paths ---
// BASE_PATH is already defined in public/index.php as dirname(__DIR__)
// define('BASE_PATH', dirname(__DIR__)); // Root directory of the project
define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('CONFIG_PATH', BASE_PATH . '/config');
define('VIEWS_PATH', APP_PATH . '/Views');
define('LOGS_PATH', BASE_PATH . '/logs'); // Ensure this directory exists and is writable if you use it

// --- Error Reporting ---
if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    // TODO: Implement a robust logging mechanism for production errors
}

// --- Timezone ---
date_default_timezone_set('Asia/Tehran'); // Set to your application's timezone

// --- Session Configuration (if you plan to use PHP sessions) ---
// session_name('YourAppSessionName');
// session_set_cookie_params([
// 'lifetime' => 0, // 0 = until browser close
// 'path' => '/',
// 'domain' => '', // Set your domain for production
// 'secure' => isset($_SERVER['HTTPS']), // Send only over HTTPS
// 'httponly' => true, // Prevent JavaScript access
// 'samesite' => 'Lax' // Or 'Strict'
// ]);

// --- Other Configurations ---
// API keys, third-party service credentials, etc.
// define('SOME_API_KEY', 'your_api_key_here');


// --- Autoloader (Simple Example) ---
// A more robust solution would be to use Composer's autoloader.
spl_autoload_register(function ($class) {
    // Project-specific namespace prefix
    $prefix = 'App\\';

    // Base directory for the namespace prefix
    // Assumes BASE_PATH is defined and points to the project root
    $base_dir = defined('BASE_PATH') ? BASE_PATH . '/app/' : __DIR__ . '/../app/';


    // Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // No, move to the next registered autoloader
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

// Include the Database configuration into the Database class itself
// or ensure Database.php reads from these constants.
// For the current Database.php, it has hardcoded values.
// It should be modified to use these defines.

// Example of how Database.php could use these constants:
/*
In Database.php:
require_once dirname(__DIR__) . '/config/config.php'; // Adjust path if necessary

private function __construct() {
    $this->host = DB_HOST;
    $this->db_name = DB_NAME;
    $this->username = DB_USER;
    $this->password = DB_PASS;
    $charset = DB_CHARSET;

    $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$charset}";
    // ... rest of the constructor
}
*/

?>
