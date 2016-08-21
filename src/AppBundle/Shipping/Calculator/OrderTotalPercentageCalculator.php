<?php

namespace AppBundle\Shipping\Calculator;

use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShippingSubjectInterface;

class OrderTotalPercentageCalculator implements CalculatorInterface
{
    public function calculate(ShippingSubjectInterface $subject, array $configuration)
    {
        return (int) ($configuration['percent'] * $subject->getOrder()->getItemsTotal());
    }

    public function getType()
    {
        return 'order_total_percentage';
    }
}
