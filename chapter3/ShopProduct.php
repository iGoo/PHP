<?php

class ShopProduct {

    public $title = '商品标题';
    public $producerMainName = 'main name';
    public $producerFirstName = 'first name';
    public $price = 0;

    function __construct($title, $producerMainName, $producerFirstName, $price)
    {
        $this->title = $title;
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
    }


}

// $product = new ShopProduct('Apple', 'Json', 'Cao', 100);
// var_dump($product->title, $product->producerMainName);
