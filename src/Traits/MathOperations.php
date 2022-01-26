<?php

namespace Fairwalter\Cinema\Traits;

/**
 * Trait MathOperations
 * @package Fairwalter\Cinema
 */
trait MathOperations
{
    /**
     * @param string $price
     * @return float
     */
    public function getFloatValue(string $price): float
    {
        return (float) filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    /**
     * @param float $price
     * @return string
     */
    public function formatValue(float $price): string
    {
        return number_format($price, 2, '.', '');
    }
}
