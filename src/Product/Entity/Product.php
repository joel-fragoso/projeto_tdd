<?php

declare(strict_types=1);

namespace Product\Entity;

use DateTime;
use Ramsey\Uuid\Uuid;

class Product
{
    private ?string $id;

    private string $name;

    private ?string $summary = null;

    private ?string $content = null;

    private ?string $sku = null;

    private float $price;

    private ?float $discount = 0;

    private int $quantity;

    private bool $active = true;

    private DateTime $createdAt;

    private ?DateTime $updatedAt = null;

    /**
     * Product construct
     */
    public function __construct()
    {
        $this->id        = (Uuid::uuid4())->toString();
        $this->createdAt = new DateTime('now');
    }

    public function setId(string $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSummary(string $summary): Product
    {
        $this->summary = $summary;
        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setContent(string $content): Product
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setSku(string $sku): Product
    {
        $this->sku = $sku;
        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setDiscount(float $discount): Product
    {
        $this->discount = $discount;
        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setQuantity(int $quantity): Product
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setActive(bool $active): Product
    {
        $this->active = $active;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setCreatedAt(): Product
    {
        $this->createdAt = new DateTime('now');
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(): Product
    {
        $this->updatedAt = new DateTime('now');
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }
}
