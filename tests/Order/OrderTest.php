<?php


namespace App\Tests\Order;

use App\Order;
use App\Payment\PaymentGatewayInterface;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    public function testNonExistingPaymentGateway()
    {

        $mockedPaymentGateway = $this->getMockBuilder(PaymentGatewayInterface::class)
            ->setMethods(['charge'])
            ->getMock();

        $mockedPaymentGateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($mockedPaymentGateway);
        $order->amount = 200;

        $this->assertTrue($order->process());

    }

}