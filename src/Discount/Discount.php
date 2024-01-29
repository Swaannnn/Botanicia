<?php

namespace App\Discount;

use App\Entity\Coupon;

abstract class Discount
{
    protected int $value;

    abstract public function calculate(float $price): float;

    public static function factory(Coupon $coupon): Discount
    {
        if (str_contains($coupon->getCode(), 'BOTANICIAFA')) {
            return new FixedAmountDiscount(intval(substr($coupon->getCode(), -2)));
        } elseif (str_contains($coupon->getCode(), 'BOTANICIAPE')) {
            return new PercentageDiscount(intval(substr($coupon->getCode(), -2)));
        } else {
            throw new \Exception('Code de réduction invalide');
        }
    }
}