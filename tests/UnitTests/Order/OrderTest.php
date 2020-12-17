<?php

namespace App\Tests\UnitTests\Order;

use App\OrderService;
use App\Payment\PaymentGatewayInterface;
use App\Tests\TestCase;

/**
 * @coversDefaultClass \App\OrderService
 */
class OrderTest extends TestCase
{

    /** @var PaymentGatewayInterface */
    private $mockedPaymentGateway;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockedPaymentGateway = $this->getMockBuilder(PaymentGatewayInterface::class)
            ->setMethods(['charge'])
            ->getMock();
    }

    /**
     * @covers  ::process
     */
    public function testOrderProcess(): void
    {

        $amount = 200; // TL odeme

        $this->mockedPaymentGateway->expects(self::once())
            ->method('charge')
            ->willReturn(true)
            ->with(self::equalTo($amount));


        $order = new OrderService($this->mockedPaymentGateway);
        $order->amount = $amount;

        self::assertTrue($order->process());

    }

    /**
     * @covers  ::process
     */
    public function testOrderProcessWithDiscount(): void
    {
        $amount = 200;
        $discount = 100; // 100 tl indirim uyguladik

        // 100 lira gecek odeme gatewayinden
        $this->mockedPaymentGateway->expects(self::once())
            ->method('charge')
            ->with(self::equalTo(100))
            ->willReturn(true);

        $order = new OrderService($this->mockedPaymentGateway);
        $order->amount = $amount;
        $order->discount = $discount;

        self::assertTrue($order->process());

    }

}
