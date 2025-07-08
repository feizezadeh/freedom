<?php

namespace App\Controllers;

use App\Core\Controller; // Make sure this path is correct based on your autoloader and Core directory

class HomeController extends Controller {

    public function index() {
        // Data to pass to the view
        $appName = defined('APP_NAME_FA') ? APP_NAME_FA : APP_NAME;
        $data = [
            'pageTitle' => 'صفحه اصلی',
            'welcomeMessage' => 'به ' . $appName . ' خوش آمدید! سفر شما به سوی سلامتی بهتر از اینجا آغاز می‌شود.'
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
