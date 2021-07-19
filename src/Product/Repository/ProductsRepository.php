<?php

declare(strict_types=1);

namespace Product\Repository;

use Exception;
use Product\Entity\Product;

use function array_push;

class ProductsRepository implements RepositoryInterface
{
    /** @var array */
    private array $products = [];

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function findAll(): array
    {
        try {
            return $this->products;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function findById(string $id): ?Product
    {
        try {
            foreach ($this->products as $product) {
                if ($id === $product->getId()) {
                    return $product;
                }
            }

            return null;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function create(Product $product): Product
    {
        try {
            array_push($this->products, $product);

            return $product;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
