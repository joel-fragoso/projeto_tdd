<?php

declare(strict_types=1);

namespace AppTest\Builder;

use App\Shopping\Cart;
use App\Shopping\Product;

use function func_get_args;

class CartBuilder
{
    private Cart $cart;

    /**
     * CartBuilder construct
     */
    public function __construct()
    {
        $this->cart = new Cart();
    }

    /**
     * @return CartBuilder
     */
    public function addItems()
    {
        $i      = 1;
        $prices = func_get_args();

        foreach ($prices as $price) {
            $this->cart->addProduct(new Product("Product {$i}", $price, 1));
            $i++;
        }

        return $this;
    }

    /**
     * @return Cart
     */
    public function build()
    {
        return $this->cart;
    }
}
