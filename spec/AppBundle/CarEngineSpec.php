<?php

namespace spec\AppBundle;

use AppBundle\CarEngine;
use AppBundle\CarEngineInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CarEngineSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(400);
    }

    function it_implements_car_engine_interface()
    {
        $this->shouldImplement(CarEngineInterface::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CarEngine::class);
    }

    function is_has_power_value()
    {
        $this->getPower()->shouldReturn(400);
    }

    function it_is_not_broken_by_default()
    {
        $this->shouldNotBeBroken();
    }

    function it_is_turbo_by_default()
    {
        $this->shouldBeTurbo();
    }
}
