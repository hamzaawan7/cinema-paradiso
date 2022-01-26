<?php

namespace Fairwalter\Cinema;

/**
 * Class OrderCollection
 * @package Fairwalter\Cinema
 */
class OrderCollection
{
    /**
     * @var array
     */
    private array $orders;

    /**
     * OrderCollection constructor.
     */
    public function __construct()
    {
        $this->orders = [];
    }

    /**
     * @param array $orders
     * @param array $data
     * @return void
     */
    public function setOrders(array $orders, array $data): void
    {
        foreach ($orders as $orderName) {
            if ($order = $this->searchOrder($orderName)) {
                $order->increaseQuantity();
                $order->setPrice($data[$orderName]['price']);

                continue;
            }

            $order = new Order($orderName);

            $order->setName($orderName);
            $order->setCategory($data[$orderName]['category']);
            $order->setPrice($data[$orderName]['price']);

            $this->orders[] = $order;
        }
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param string $name
     * @return Order|false
     */
    public function searchOrder(string $name)
    {
        foreach ($this->orders as $order) {
            if ($order->getName() === $name) {
                return $order;
            }
        }

        return false;
    }
}
