<?php

namespace AppBundle;

class Car
{
    private $name;
    private $carEngine;

    public function __construct($name, CarEngineInterface $carEngine)
    {
        $this->name = $name;
        $this->carEngine = $carEngine;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPower()
    {
        if ($this->carEngine->isBroken()) {
            throw new \InvalidArgumentException('This engine is broken');
        }

        $power = $this->carEngine->getPower();

        return ($this->carEngine->isTurbo()) ? $power + 25 : $power;

    }


}
