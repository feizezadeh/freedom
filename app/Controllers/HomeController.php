<?php

namespace App\Controllers;

use App\Core\Controller; // Make sure this path is correct based on your autoloader and Core directory

class HomeController extends Controller {

    public function index() {
        // Data to pass to the view
        $data = [
            'pageTitle' => 'Welcome Home',
            'welcomeMessage' => 'Welcome to ' . APP_NAME . '! Your journey to better health starts here.'
        ];

        // Render the view within the main layout
        // 'layouts/main' is the layout file (e.g., Views/layouts/main.php)
        // 'home/index' is the content view file (e.g., Views/home/index.php)
        $this->render('layouts/main', 'home/index', $data);
    }

    // Example of another action
    // public function about() {
    //     $data = [
    //         'pageTitle' => 'About Us'
    //     ];
    //     $this->render('layouts/main', 'pages/about', $data); // Assumes Views/pages/about.php
    // }
}

?>
