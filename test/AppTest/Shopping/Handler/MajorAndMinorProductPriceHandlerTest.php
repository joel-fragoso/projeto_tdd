<?php

declare(strict_types=1);

namespace AppTest\Shopping\Handler;

use App\Shopping\Cart;
use App\Shopping\Handler\MajorAndMinorProductPriceHandler;
use App\Shopping\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class MajorAndMinorProductValueHandlerTest
 */
class MajorAndMinorProductValueHandlerTest extends TestCase
{
    /**
     * @var Cart
     */
    private Cart $cart;

    /**
     * private MajorAndMinorProductHandler
     */
    private MajorAndMinorProductPriceHandler $majorAndMinor;

    public function setUp(): void
    {
        $this->cart = new Cart();
        $this->majorAndMinor = new MajorAndMinorProductPriceHandler();
    }

    public function testShouldBeAbleToReturnsAProductInstance()
    {
        $this->cart->addProduct(new Product('Geladeira', 450));

        $this->majorAndMinor->find($this->cart);

        $this->assertInstanceOf('App\Shopping\Product', $this->majorAndMinor->getMinor());
        $this->assertInstanceOf('App\Shopping\Product', $this->majorAndMinor->getMajor());
    }

    public function testShouldBeAbleToReturnsTheManjorAndMinorProductsInDescendingOrder()
    {
        $this->cart->addProduct(new Product('Geladeira', 450))
            ->addProduct(new Product('Liquidificador', 250))
            ->addProduct(new Product('Jogo de pratos', 70));

        $this->majorAndMinor->find($this->cart);

        $this->assertEquals('Jogo de pratos', $this->majorAndMinor->getMinor()->getName());
        $this->assertEquals('Geladeira', $this->majorAndMinor->getMajor()->getName());
    }

    public function testShouldBeAbleToReturnsWithJustOneProductInCart()
    {
        $this->cart->addProduct(new Product('Geladeira', 450));

        $this->majorAndMinor->find($this->cart);

        $this->assertEquals('Geladeira', $this->majorAndMinor->getMinor()->getName());
        $this->assertEquals('Geladeira', $this->majorAndMinor->getMajor()->getName());
    }
}
