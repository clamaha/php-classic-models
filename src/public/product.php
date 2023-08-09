<?php
declare(strict_types=1);

try {
    // 1 - Connexion à la DB
    $pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );

    // 2 - Récupérer le produit

    $stmt = $pdo->prepare("SELECT * FROM products WHERE productCode = :code");
    $stmt->bindParam(":code", $_GET['productCode']);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($product)) {
        echo '404 - no product found';
        die;
    }

    // 3 - Afficher la page
    include 'public/views/layout/header.view.php';
    include 'public/views/product.view.php';
    include 'public/views/layout/footer.view.php';

} catch (Exception $e) {
    print_r($e->getMessage());
}
?>