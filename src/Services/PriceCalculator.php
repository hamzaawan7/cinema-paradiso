<?php

namespace Fairwalter\Cinema\Services;

use Fairwalter\Cinema\Traits\MathOperations;

/**
 * Class PriceCalculator
 * @package Fairwalter\Cinema\Services
 */
class PriceCalculator
{
    use MathOperations;

    /**
     * @param array $orders
     * @return float
     */
    public function getSubTotal(array $orders): float
    {
        $subTotal = 0;

        foreach ($orders as $order) {
            $subTotal += $order->getPrice();
        }

        return $this->formatValue($subTotal);
    }

    /**
     * @param float $subTotal
     * @return float
     */
    public function getTaxes(float $subTotal): float
    {
        return $this->formatValue($subTotal * 0.2);
    }

    /**
     * @param float $subTotal
     * @param float $taxes
     * @return float
     */
    public function getGrandTotal(float $subTotal, float $taxes): float
    {
        return $this->formatValue($subTotal + $taxes);
    }
}
