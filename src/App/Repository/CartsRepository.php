<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Cart;

/**
 * Class CartsRepository
 *
 * @package App\Repository
 */
class CartsRepository implements RepositoryInterface
{
    /**
     * @var array
     */
    private array $carts = [];

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return $this->carts;
    }

    /**
     * @param int $id
     * @return Cart|null
     */
    public function findById(int $id): ?Cart
    {
        foreach ($this->carts as $cart) {
            if ($id === $cart['id']) {
                return $cart;
            }
        }

        return null;
    }

    /**
     * @param Cart $cart
     * @return Cart
     */
    public function create(Cart $cart): Cart
    {
        array_push($this->carts, $cart);

        return $cart;
    }
}
