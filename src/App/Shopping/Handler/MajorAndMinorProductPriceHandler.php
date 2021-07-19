<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\Cart;
use App\Shopping\Product;

class MajorAndMinorProductPriceHandler
{
    private Product $minor;

    private Product $major;

    public function find(Cart $cart)
    {
        foreach ($cart->getProducts() as $product) {
            if (empty($this->minor) || $product->getPrice() < $this->minor->getPrice()) {
                $this->minor = $product;
            }

            if (empty($this->major) || $product->getPrice() > $this->major->getPrice()) {
                $this->major = $product;
            }
        }
    }

    public function getMinor(): Product
    {
        return $this->minor;
    }

    public function getMajor(): Product
    {
        return $this->major;
    }
}
