<?php

namespace Fairwalter\Cinema\Services;

use Fairwalter\Cinema\Order;
use Fairwalter\Cinema\Traits\MathOperations;

/**
 * Class ReceiptGenerator
 * @package Fairwalter\Cinema\Services
 */
class ReceiptGenerator
{
    use MathOperations;

    /**
     * @var PriceCalculator
     */
    private PriceCalculator $priceCalculator;

    /**
     * ReceiptGenerator constructor.
     * @param PriceCalculator $priceCalculator
     */
    public function __construct(PriceCalculator $priceCalculator)
    {
        $this->priceCalculator = $priceCalculator;
    }

    /**
     * @param array $orders
     * @return string
     */
    public function printReceipt(array $orders): string
    {
        $subTotal = $this->priceCalculator->getSubTotal($orders);
        $taxes = $this->priceCalculator->getTaxes($subTotal);

        $receipt = "Ordered on " . date('d.m.Y') . " at " . date('H:i:s') . "\n";
        $receipt .= "==========================================\n";

        foreach ($orders as $order) {
            $receipt .= $this->concatenatePurchase($order);
        }

        $receipt .= "==========================================\n";
        $receipt .= "Subtotal:\t\\$" . $subTotal . "\n";
        $receipt .= "Taxes:\t\t\\$" . $taxes . "\n";
        $receipt .= "Grand Total:\t\\$" . $this->priceCalculator->getGrandTotal($subTotal, $taxes) . "\n";

        return $receipt;
    }

    /**
     * @param Order $order
     * @return string
     */
    private function concatenatePurchase(Order $order): string
    {
        $purchase = $order->getName();
        $purchase .= $order->getQuantity() > 1 ? " x" . $order->getQuantity() : "";
        $purchase .= $this->addTabularSpaces($purchase);
        $purchase .= "[" . $order->getCategory() . "]\t\\$" . $this->formatValue($order->getPrice()) . "\n";

        return $purchase;
    }

    /**
     * @param string $value
     * @return string
     */
    private function addTabularSpaces(string $value): string
    {
        if (strlen($value) > 19) {
            return "\t";
        }

        if (strlen($value) > 13) {
            return "\t\t";
        }

        if (strlen($value) > 7) {
            return "\t\t\t";
        }

        return "\t\t\t\t";
    }
}
