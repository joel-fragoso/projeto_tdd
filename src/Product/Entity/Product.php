<?php

declare(strict_types=1);

namespace Product\Entity;

use Ramsey\Uuid\Uuid;

/**
 * Class Product
 *
 * @package Product\Entity
 */
class Product
{
    /**
     * @var string|null
     */
    private ?string $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string|null
     */
    private ?string $summary = null;

    /**
     * @var string|null
     */
    private ?string $content = null;

    /**
     * @var string|null
     */
    private ?string $sku = null;

    /**
     * @var float
     */
    private float $price;

    /**
     * @var float|null
     */
    private ?float $discount = 0;

    /**
     * @var int
     */
    private int $quantity;

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
     * Product construct
     */
    public function __construct()
    {
        $this->id = (Uuid::uuid4())->toString();
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @param string $id
     * @return Product
     */
    public function setId(string $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $summary
     * @return Product
     */
    public function setSummary(string $summary): Product
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string $content
     * @return Product
     */
    public function setContent(string $content): Product
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $sku
     * @return Product
     */
    public function setSku(string $sku): Product
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $discount
     * @return Product
     */
    public function setDiscount(float $discount): Product
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param int $quantity
     * @return Product
     */
    public function setQuantity(int $quantity): Product
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param bool $active
     * @return Product
     */
    public function setActive(bool $active): Product
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
     * @return Product
     */
    public function setCreatedAt(): Product
    {
        $this->createdAt = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return Product
     */
    public function setUpdatedAt(): Product
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
