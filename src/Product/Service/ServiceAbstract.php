<?php

declare(strict_types=1);

namespace Product\Service;

use Product\Entity\Product;
use Product\Repository\RepositoryInterface;

/**
 * Class ServiceAbstract
 *
 * @package Product\Service
 */
abstract class ServiceAbstract
{
    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $repository;

    /**
     * ServiceAbstract construct
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array
    {
        try {
            $products = $this->repository->findAll();

            return $products;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param string $id
     * @return Product|null
     * @throws \Exception
     */
    public function findById(string $id): ?Product
    {
        try {
            $product = $this->repository->findById($id);

            return $product;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $product
     * @return Product
     * @throws \Exception
     */
    public function create(Product $product): Product
    {
        try {
            $product = $this->repository->create($product);

            return $product;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
