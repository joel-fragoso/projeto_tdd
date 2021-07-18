<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\RepositoryInterface;

/**
 * Class ProductsService
 *
 * @package App\Service
 */
class ProductsService
{
    /**
     * @var RepositoryInterface
     */
    private RepositoryInterface $repository;

    /**
     * ProductsService construct
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @return RepositoryInterface|null
     */
    public function findById(int $id): ?RepositoryInterface
    {
        return $this->repository->findById($id);
    }
}
