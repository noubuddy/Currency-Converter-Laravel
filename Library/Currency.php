<?php

namespace Library;

class Currency
{
    private $currency = [];

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
