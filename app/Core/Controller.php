<?php

namespace App\Core;

class Controller {
    /**
     * Render a view file.
     *
     * @param string $view The view file to render (e.g., 'home/index' or 'users/profile').
     * @param array $data Data to extract and pass to the view.
     */
    protected function view($view, $data = []) {
        // Construct the full path to the view file
        // Assumes BASE_PATH is defined in public/index.php
        $viewPath = BASE_PATH . "/app/Views/{$view}.php";

        if (file_exists($viewPath)) {
            extract($data); // Extracts keys from array to variables: ['name' => 'Jules'] becomes $name = 'Jules'

            // Start output buffering
            ob_start();

            // Include the view file
            require $viewPath;

            // Get the content of the buffer and clean it
            $content = ob_get_clean();

            // By default, we might want to render this content within a layout
            // For simplicity now, just echo it.
            // A more advanced approach would involve a Layout class or rendering sections.
            echo $content;

        } else {
            // In a real application, throw an exception or show a specific error view
            throw new \Exception("View file not found: {$viewPath}");
        }
    }

    /**
     * Render a view file within a layout.
     *
     * @param string $layout The layout file (e.g., 'layouts/main').
     * @param string $view The view file to render within the layout.
     * @param array $data Data to pass to the view and layout.
     */
    protected function render($layout, $view, $data = []) {
        $viewPath = BASE_PATH . "/app/Views/{$view}.php";
        $layoutPath = BASE_PATH . "/app/Views/{$layout}.php";

        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$viewPath}");
        }
        if (!file_exists($layoutPath)) {
            throw new \Exception("Layout file not found: {$layoutPath}");
        }

        extract($data);

        // Render the main content (view) first
        ob_start();
        require $viewPath;
        $contentForLayout = ob_get_clean(); // This variable will be available in the layout

        // Now render the layout, which should include $contentForLayout
        require $layoutPath;
    }


    /**
     * Redirect to a given URL.
     *
     * @param string $url The URL to redirect to.
     */
    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }

    /**
     * Get JSON input from the request body.
     *
     * @return mixed Decoded JSON data or null if input is not valid JSON.
     */
    protected function getJsonInput() {
        $input = file_get_contents('php://input');
        return json_decode($input, true);
    }

    /**
     * Send a JSON response.
     *
     * @param mixed $data Data to encode as JSON.
     * @param int $statusCode HTTP status code.
     */
    protected function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

?>
