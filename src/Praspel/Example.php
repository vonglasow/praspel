<?php

namespace Praspel;

class Example
{
    /**
     * @invariant number: boundInteger(0, 100);
     */
    private $number;

    /**
     * @invariant world: boundInteger(1, 3);
     */
    private $world;

    /**
     * @ensures \result: this->number;
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @ensures \result: this->world;
     */
    public function getWorld()
    {
        return $this->world;
    }
}
