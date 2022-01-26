<?php

namespace Fairwalter\Cinema;

use Fairwalter\Cinema\Services\ReceiptGenerator;

/**
 * Class CinemaPriceEngine
 * @package Fairwalter\Cinema
 */
class CinemaPriceEngine
{
    /**
     * Contains all test data
     * @see `data/data.php`
     *
     * @var array
     */
    private array $data;

    /**
     * @var ReceiptGenerator
     */
    private ReceiptGenerator $receiptGenerator;

    /**
     * @param ReceiptGenerator $receiptGenerator
     * @param array $data
     */
    public function __construct(ReceiptGenerator $receiptGenerator, array $data)
    {
        $this->receiptGenerator = $receiptGenerator;
        $this->data = $data;
    }

    /**
     * @param array $orderData
     * @return string
     */
    public function getOrderBill(array $orderData): string
    {
        $orderCollection = new OrderCollection();

        $orderCollection->setOrders($orderData['items'], $this->data['products']);

        return $this->receiptGenerator->printReceipt($orderCollection->getOrders());
    }
}
