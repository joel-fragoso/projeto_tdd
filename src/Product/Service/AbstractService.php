<?php

declare(strict_types=1);

namespace Product\Service;

use Exception;
use Product\Entity\Product;
use Product\Repository\RepositoryInterface;

abstract class AbstractService
{
    protected RepositoryInterface $repository;

    /**
     * ServiceAbstract construct
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function findAll(): array
    {
        try {
            return $this->repository->findAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @throws Exception
     */
    public function findById(string $id): ?Product
    {
        try {
            return $this->repository->findById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $product
     * @throws Exception
     */
    public function create(Product $product): Product
    {
        try {
            $product = $this->repository->create($product);

            return $product;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
