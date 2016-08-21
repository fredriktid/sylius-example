<?php

namespace spec\AppBundle\Shipping\Calculator;

use AppBundle\Shipping\Calculator\OrderTotalPercentageCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShippingSubjectInterface;

class OrderTotalPercentageCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(OrderTotalPercentageCalculator::class);
    }

    function it_is_shipping_cost_calculator()
    {
        $this->shouldImplement(CalculatorInterface::class);
    }

    function it_has_type()
    {
        $this->getType()->shouldReturn('order_total_percentage');
    }

    function it_calculates_shipping_cost_as_percent_of_order_total(ShipmentInterface $shipment, OrderInterface $order)
    {
        $shipment->getOrder()->willReturn($order);
        $order->getItemsTotal()->willReturn(10000);

        $this->calculate($shipment, ['percent' => 0.20 ])->shouldReturn(2000);
        $this->calculate($shipment, ['percent' => 0.15 ])->shouldReturn(1500);

    }
}
