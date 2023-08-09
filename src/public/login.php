<?php
declare(strict_types=1);

session_start();

if (empty($_POST)) {
    // 1 - Afficher le formulaire

    include 'public/views/layout/header.view.php';
    include 'public/views/login.view.php';
    include 'public/views/layout/footer.view.php';
} else {
    try {
        // 2 - Connexion à la DB
        $pdo = new PDO(
            'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>