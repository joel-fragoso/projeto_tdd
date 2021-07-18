<?php

declare(strict_types=1);

namespace AppTest\Product;

use App\Entity\Cart;
use PHPUnit\Framework\TestCase;

class MajorAndMinorProductValueTest extends TestCase
{
    public function testProductInDescendingOrder()
    {
        $cart = (new Cart())
            ->addProduct('Geladeira', 450)
            ->addProduct('Liquidificador', 250)
            ->addProduct('Jogo de pratos', 70);

        $majorAndMinorProductValue = (new MajorAndMinorProductValue())
            ->find($cart);

        $this->assertEquals('Jogo de pratos', $majorAndMinorProductValue->getMinor()->getName());
        $this->assertEquals('Geladeira', $majorAndMinorProductValue->getMajor()->getName());
    }
}
