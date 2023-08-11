<?php
declare(strict_types=1);

namespace Models;

use PDO;

class Product extends Database
{
    public function findAll(int $limit = 0): array
    {
        if ($limit === 0) {
            $sql = "SELECT * FROM products";
        } else {
            $sql = "SELECT * FROM products LIMIT " . $limit;
        }
        $stmt = $this->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function find(string $productCode): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM products WHERE productCode = ?",
            [$productCode]
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}