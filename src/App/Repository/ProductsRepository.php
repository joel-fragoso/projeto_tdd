<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;

use function array_push;

/**
 * Class ProductsRepository
 *
 * @package App\Repository
 */
class ProductsRepository implements RepositoryInterface
{
    /**
     * @var array
     */
    private array $products = [];

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return $this->products;
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function findById(int $id): ?Product
    {
        foreach ($this->products as $product) {
            if ($id === $product['id']) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function create(Product $product): Product
    {
        array_push($this->products, $product);

        return $product;
    }
}
