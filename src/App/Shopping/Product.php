<?php

declare(strict_types=1);

namespace App\Shopping;

/**
 * Class Product
 *
 * @package App\Shopping
 */
class Product
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $price;

    /**
     * Product construct
     *
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
