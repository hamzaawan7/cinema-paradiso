<?php

use Fairwalter\Cinema\CinemaPriceEngine;
use Fairwalter\Cinema\Services\PriceCalculator;
use Fairwalter\Cinema\Services\ReceiptGenerator;

require 'vendor/autoload.php';
$data = require('data/data.php');

$priceCalculator = new PriceCalculator();
$receiptGenerator = new ReceiptGenerator($priceCalculator);
$engine = new CinemaPriceEngine($receiptGenerator, $data);

//ORDER:
$order1 = [
    'items' => [
        'cola',
        'medium pop-corn box',
        'small pop-corn box',
        'cinema ticket',
        'cola',
        'cinema ticket',
        'large pop-corn box',
        'sprite',
        'fanta',
        'Yoda figure from Star Wars',
        'Yoda figure from Star Wars',
        'T-Shirt',
        'T-Shirt',
    ],
];

echo $engine->getOrderBill($order1);
