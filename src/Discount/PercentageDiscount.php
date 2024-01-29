<?php

namespace App\Discount;

use App\Discount\Discount;

class PercentageDiscount extends Discount
{
    protected function __construct(int $value)
    {
        $this->value = $value;
    }

    public function calculate(float $price): float
    {
        return $price - ($price * ($this->value / 100));
    }
}