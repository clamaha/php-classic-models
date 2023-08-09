    <?php
        $pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );
    ?>