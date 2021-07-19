<?php

declare(strict_types=1);

namespace App\Shopping;

class Product
{
    private string $name;

    private float $price;

    /**
     * Product construct
     */
    public function __construct(string $name, float $price)
    {
        $this->name  = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
