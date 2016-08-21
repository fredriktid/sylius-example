<?php

namespace AppBundle;

class CarEngine implements CarEngineInterface
{
    private $power;
    private $turbo = true;
    private $broken = false;

    public function __construct($power)
    {
        $this->power = $power;
    }

    /**
     * @return boolean
     */
    public function isTurbo()
    {
        return $this->turbo;
    }

    /**
     * @return boolean
     */
    public function isBroken()
    {
        return $this->broken;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

}
