<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ERROR);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$product1 = (new \App\Entity\Product())
    ->setName('Geladeira')
    ->setPrice(450);

$product2 = (new \App\Entity\Product())
    ->setName('Liquidificador')
    ->setPrice(250);

$productsRepository = new \App\Repository\ProductsRepository();

$productsRepository->create($product1);
$productsRepository->create($product2);

$products = $productsRepository->findAll();

var_dump($products);

