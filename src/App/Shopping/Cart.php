<?php

declare(strict_types=1);

namespace App\Shopping;

use function array_push;
use function count;

class Cart
{
    /** @var array */
    private array $products;

    /**
     * Cart construct
     */
    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct(Product $product): Cart
    {
        array_push($this->products, $product);
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getMajorPrice(): int
    {
        if (0 === count($this->getProducts())) {
            return 0;
        }

        $majorPrice = $this->getProducts()[0]->getPrice();

        foreach ($this->getProducts() as $product) {
            if ($majorPrice < $product->getPrice()) {
                $majorPrice = $product->getPrice();
            }
        }

        return $majorPrice;
    }
}
