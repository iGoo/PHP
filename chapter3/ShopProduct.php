<?php

class ShopProduct {
    function __toString()
    {
        return 'The Object shout not be print or echo!';
    }

    public $title = '商品标题';
    public $producerMainName = 'main name';
    public $producerFirstName = 'first name';
    public $price = 0;


}

$product1 = new ShopProduct;

echo $product1->title;

