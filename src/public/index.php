<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use Controllers\AuthController;
use Controllers\PageController;
use Controllers\ProductController;

session_start();

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    switch ($url_path) {
        case "":
        case "/index.php":
            $productController = new ProductController();
            $productController->index();
            break;
        case "product":
            $productController = new ProductController();
            $productController->show($_GET['productCode']);
            break;
        case "login":
            $authController = new AuthController();
            if ($method === "GET") $authController->showLoginForm();
            if ($method === "POST") $authController->login($_POST['username'], $_POST['password']);
            break;
        case "logout":
            $authController = new AuthController();
            $authController->logout();
            break;
        case "register":
            $authController = new AuthController();
            if ($method === "GET") $authController->showRegistrationForm();
            if ($method === "POST") $authController->register($_POST['username'],$_POST['email'], $_POST['password']);
            break;
        default:
            $pageController = new PageController();
            $pageController->page_404();
    }
} catch (Exception $e) {
    $pageController = new PageController();
    $pageController->page_500($e->getMessage());
}