<?php

namespace Fairwalter\Cinema;

use Fairwalter\Cinema\Traits\MathOperations;

/**
 * Class Order
 * @package Fairwalter\Cinema
 */
class Order
{
    use MathOperations;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $price;

    /**
     * @var string
     */
    private string $category;

    /**
     * @var int
     */
    private int $quantity;

    /**
     * Order constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->price = "";
        $this->category = "";
        $this->quantity = 1;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $price
     * @return void
     */
    public function setPrice(string $price): void
    {
        $this->price = $this->getFloatValue($price) * $this->quantity;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $category
     * @return void
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return void
     */
    public function increaseQuantity(): void
    {
        $this->quantity++;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
