<?php


namespace App;


use App\Payment\PaymentGatewayInterface;

class OrderService
{

    /**
     * @var int
     */
    public $amount = 0;

    /**
     * @var int
     */
    public $discount = 0;

    /**
     * @var PaymentGatewayInterface
     */
    private $paymentGateway;

    /**
     * Order constructor.
     * @param PaymentGatewayInterface $payment
     */
    public function __construct(PaymentGatewayInterface $payment)
    {
        $this->paymentGateway = $payment;
    }

    /**
     * @return bool
     */
    public function process(): bool
    {

        $this->amount -= $this->discount;

        return $this->paymentGateway->charge($this->amount);
    }

}