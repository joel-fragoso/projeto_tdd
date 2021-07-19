<?php

declare(strict_types=1);

namespace Product\Repository;

use Product\Entity\Product;

/**
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;

    public function findById(string $id): ?Product;

    public function create(Product $product): Product;
}
