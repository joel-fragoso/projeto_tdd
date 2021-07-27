<?php

declare(strict_types=1);

namespace App\Shopping;

/**
 * Order class
 */
class Order
{
    private $client;

    private $totalValue;

    private $itemsQuantity;

    /**
     * Order construct
     *
     * @param $client,
     * @param $totalValue
     * @param $itemsQuantity
     */
    public function __construct($client, $totalValue, $itemsQuantity)
    {
        $this->client        = $client;
        $this->totalValue    = $totalValue;
        $this->itemsQuantity = $itemsQuantity;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getTotalValue()
    {
        return $this->totalValue;
    }

    public function getItemsQuantity()
    {
        return $this->itemsQuantity;
    }
}
