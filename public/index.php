<?php
// Main entry point for the application

<?php

// Main entry point for the application

// Define BASE_PATH for easy file includes and consistency
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// Load configuration (which includes the autoloader)
require_once BASE_PATH . '/config/config.php';

// Error reporting is now handled in config.php

// Start session if configured to do so (example, actual start might be conditional)
// if (session_status() === PHP_SESSION_NONE && defined('SESSION_AUTO_START') && SESSION_AUTO_START) {
//     session_start();
// }


// --- Routing ---
use App\Core\Router;

// Determine the request URI
// This logic attempts to get the path relative to the application's base directory,
// especially if the app is not in the web root.
$base_url_path = rtrim(parse_url(APP_URL, PHP_URL_PATH), '/');
$request_uri = $_SERVER['REQUEST_URI'];

// Remove query string from URI
if (false !== $pos = strpos($request_uri, '?')) {
    $request_uri = substr($request_uri, 0, $pos);
}

// Remove the base URL path from the request URI if the app is in a subdirectory
if ($base_url_path && strpos($request_uri, $base_url_path) === 0) {
    $uri = substr($request_uri, strlen($base_url_path));
} else {
    $uri = $request_uri;
}
// Ensure URI starts with a slash and handle empty URI for root
$uri = '/' . ltrim($uri, '/');


$request_method = $_SERVER['REQUEST_METHOD'];

// Instantiate the router and define routes
// In a larger application, routes would be in a separate file (e.g., routes/web.php)
$router = new Router();

// Example Routes (to be moved to a routes file later)
$router->get('/', 'HomeController@index');
// $router->get('/about', 'PageController@about');
// $router->get('/users/{id}', 'UserController@show'); // Example with parameter
// $router->post('/contact', 'ContactController@store');


// Dispatch the request
try {
    $router->direct($uri, $request_method);
} catch (\Exception $e) {
    // Log the error
    // error_log($e->getMessage() . "\n" . $e->getTraceAsString()); // Basic logging

    // Show a generic error page in production, or detailed error in development
    if (APP_ENV === 'development') {
        echo "<h1>Error</h1>";
        echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . htmlspecialchars($e->getLine()) . "</p>";
        echo "<h3>Stack Trace:</h3><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    } else {
        // require_once BASE_PATH . '/app/Views/errors/500.php'; // Generic error page
        http_response_code(500);
        echo "An unexpected error occurred. Please try again later.";
    }
}

?>
