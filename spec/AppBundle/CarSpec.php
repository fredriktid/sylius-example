<?php

namespace spec\AppBundle;

use AppBundle\Car;
use AppBundle\CarEngine;
use AppBundle\CarEngineInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CarSpec extends ObjectBehavior
{
    function let(CarEngineInterface $carEngine)
    {
        $this->beConstructedWith('Jaguar', $carEngine);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Car::class);
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('Jaguar');
    }

    function its_power_depends_on_the_engine_installed(CarEngineInterface $carEngine)
    {
        $carEngine->isBroken()->willReturn(false);
        $carEngine->getPower()->willReturn(125);
        $carEngine->isTurbo()->willReturn(false);

        $this->getPower()->shouldReturn(125);
    }

    function it_get_additional_25_power_if_engine_is_turbo(CarEngineInterface $carEngine)
    {
        $carEngine->isBroken()->willReturn(false);
        $carEngine->getPower()->willReturn(100);
        $carEngine->isTurbo()->willReturn(true);

        $this->getPower()->shouldReturn(125);

    }

    function it_throws_an_exception_when_calculating_power_if_engine_is_broken(CarEngineInterface $carEngine)
    {
        $carEngine->isBroken()->willReturn(true);

        $this
            ->shouldThrow(new \InvalidArgumentException('This engine is broken'))
            ->during('getPower');

    }
}
