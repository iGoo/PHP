<?php

class ShopProduct {
    function __toString()
    {
        return 'The Object shout not be print or echo!';
    }
}

$product1 = new ShopProduct;
$product2 = new ShopProduct;


// var_dump($product1);
// var_dump($product2);
echo $product1;