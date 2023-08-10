<h2>List of products</h2>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach($products as $product): ?>
            <li>
                <a href="/product?productCode=<?= $product['productCode'] ?>">
                    <?= $product['productName'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
