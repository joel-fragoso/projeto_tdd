<?php

declare(strict_types=1);

namespace Product\Repository;

use Product\Entity\Product;

/**
 * Interface RepositoryInterface
 *
 * @package Product\Repository
 */
interface RepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param string $id
     * @return Product|null
     */
    public function findById(string $id): ?Product;

    /**
     * @param Product $product
     * @return Product
     */
    public function create(Product $product): Product;
}
