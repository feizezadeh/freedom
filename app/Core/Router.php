<?php

namespace App\Core;

// This is a very basic router. In a real application, you'd use a more robust library
// or a more feature-rich custom implementation.

class Router {
    protected $routes = [
        'GET' => [],
        'POST' => []
        // Add other HTTP methods as needed (PUT, DELETE, etc.)
    ];

    public static function load($file) {
        $router = new static;
        // In a real app, you might have a dedicated routes file (e.g., routes/web.php)
        // require $file;
        return $router;
    }

    public function get($uri, $controllerAction) {
        $this->routes['GET'][$uri] = $controllerAction;
    }

    public function post($uri, $controllerAction) {
        $this->routes['POST'][$uri] = $controllerAction;
    }

    public function direct($uri, $requestType) {
        // Normalize URI: remove query string
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        // Trim trailing slashes for consistency, unless it's the root URI
        if ($uri !== '/' && substr($uri, -1) === '/') {
            $uri = rtrim($uri, '/');
        }


        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        // Handle dynamic routes with parameters (very basic example)
        foreach ($this->routes[$requestType] as $route => $action) {
            // Convert route to regex: /users/{id} -> /users/([^/]+)
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches); // Remove the full match
                return $this->callAction(...explode('@', $action), $matches);
            }
        }

        // In a real app, throw an exception or return a 404 view
        http_response_code(404);
        // Make sure BASE_PATH is defined if you use this file standalone for testing
        // Or, better, pass it as a dependency or make View class handle base path.
        if (defined('BASE_PATH')) {
             // require BASE_PATH . '/app/Views/errors/404.php'; // Assuming you have a 404 view
        } else {
            echo "404 Not Found - Route not defined for URI: {$uri} and Method: {$requestType}";
        }
        return null;
    }

    protected function callAction($controller, $action, $params = []) {
        // Assumes controllers are in App\Controllers namespace
        $controllerClass = "App\\Controllers\\{$controller}";

        if (!class_exists($controllerClass)) {
            // In a real app, throw an exception or show a more specific error
            throw new \Exception("Controller class {$controllerClass} not found.");
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $action)) {
            // In a real app, throw an exception
            throw new \Exception(
                "Action {$action} not defined on controller {$controllerClass}."
            );
        }

        // Call the controller action with parameters
        return $controllerInstance->$action(...$params);
    }
}

?>
