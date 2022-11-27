<?php

use Course\Infrastructure\Typeorm\Entities\Product;

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

$newProductName = $argv[1];
var_dump($newProductName);

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
