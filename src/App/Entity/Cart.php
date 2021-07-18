<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Class Cart
 *
 * @package App\Entity
 */
class Cart
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var Product
     */
    private Product $product;

    /**
     * @var bool
     */
    private bool $active = true;

    /**
     * @var \DateTime
     */
    private \DateTime $createdAt;

    /**
     * @var \DateTime|null
     */
    private ?\DateTime $updatedAt = null;

    /**
     * Cart construct
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param Product $product
     * @return Cart
     */
    public function setProduct(Product $product): Cart
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param bool $active
     * @return Cart
     */
    public function setActive(bool $active): Cart
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return Cart
     */
    public function setUpdatedAt(): Cart
    {
        $this->updatedAt = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
}
