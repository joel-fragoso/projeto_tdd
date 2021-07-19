<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ERROR);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use Product\Repository\ProductsRepository;
use Product\Handler\CreateProductHandler;
use Product\Service\ProductsService;

$productsRepository = new ProductsRepository();
$productsService = new ProductsService($productsRepository);
$createProductHandler = new CreateProductHandler($productsService);

$product = $createProductHandler->handle([
    'name'     => 'Geladeira',
    'price'    => 450,
    'quantity' => 1,
    'active'   => true,
]);

var_dump($product);
