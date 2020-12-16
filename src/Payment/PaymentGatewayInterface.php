<?php


namespace App\Payment;

interface PaymentGatewayInterface
{
    /**
     * @param float $amount
     * @return bool
     */
    public function charge(float $amount): bool;
}
