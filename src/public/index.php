<?php
declare(strict_types=1);

session_start();

require_once 'controllers/ProductController.php';
require_once 'controllers/AuthController.php';

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    if ($url_path === "" || $url_path === "index.php") {
        $productController = new ProductController();
        $productController->index();
    }

    if ($url_path === "product") {
        $productController = new ProductController();
        $productController->show($_GET['productCode']);
    }

    if ($url_path === "product/create") {
        $productController = new ProductController();
    }

    if ($url_path === "login") {
        $authController = new AuthController();
        if ($method === "GET") $authController->showLoginForm();
        if ($method === "POST") $authController->login($_POST['username'], $_POST['password']);
    }

    if ($url_path === "logout") {
        $authController = new AuthController();
        $authController->logout();
    }

    if ($url_path === "register") {
        $authController = new AuthController();
        if ($method === "GET") $authController->showRegistrationForm();
        if ($method === "POST") $authController->register($_POST['username'],$_POST['email'], $_POST['password']);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}