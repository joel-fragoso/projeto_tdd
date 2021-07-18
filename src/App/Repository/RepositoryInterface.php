<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * Interface RepositoryInterface
 *
 * @package App\Repository
 */
interface RepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;
}
