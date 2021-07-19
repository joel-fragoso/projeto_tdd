<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\Cart;
use App\Shopping\Product;

/**
 * Class MajorAndMinorProductPriceHandler
 *
 * @package App\Shopping\Handler
 */
class MajorAndMinorProductPriceHandler
{
    /**
     * @var Product
     */
    private Product $minor;

    /**
     * @var Product
     */
    private Product $major;

    /**
     * @param Cart $cart
     */
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

    /**
     * @return Product
     */
    public function getMinor(): Product
    {
        return $this->minor;
    }

    /**
     * @return Product
     */
    public function getMajor(): Product
    {
        return $this->major;
    }
}
