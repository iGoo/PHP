<?php

class ShopProduct {

    const AVAILABLE = 0;
    const OUT_OF_STOCK = array(1, 2, 3); 

    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $producerMainName, $producerFirstName, $price)
    {
        $this->title = $title;
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
    }

    public function getProducer()
    {
        return "{$this->producerFirstName} {$this->producerMainName}";
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";

        return $base;
    }
}
