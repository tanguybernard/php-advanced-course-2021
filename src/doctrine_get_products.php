<?php
// list_products.php
use Course\Infrastructure\Typeorm\Entities\Product;

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

$productRepository = $entityManager->getRepository(Product::class);
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("- %s\n", $product->getName());
}