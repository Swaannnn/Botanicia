<?php

namespace App\Discount;

use App\Discount\Discount;

class FixedAmountDiscount extends Discount
{
    protected function __construct(int $value)
    {
        $this->value = $value;
    }

    public function calculate(float $price): float
    {
        return $price - $this->value;
    }
}