<?php

namespace AppBundle;

interface CarEngineInterface
{
    public function getPower();

    public function isTurbo();

    public function isBroken();
}
