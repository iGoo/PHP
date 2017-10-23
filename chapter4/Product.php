<?php

class Product {
    public $name;
    public $price;

    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProcessSale {
    private $callbacks; //回调函数数组

    public function registerCallback ($callback) {
        if (! is_callable($callback)) {
            throw new Exception("$callback is not avaliable");
        }
        $this->callbacks[] = $callback;
    }

    public function sale($product)
    {
        print "$product->name: processing \n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }

}

class Totalizer {
    public static function warnAmount($amount) {
        $count = 0;
        return function ($product) use (&$count, $amount) {
            $count += $product->price; 
            if ($count > $amount) {
                print "当前金额({$count})已经超过指定金额($amount)";
            }
        };   
    }
}

// $logger = create_function(
//     '$product',
//     'print " logging ({$product->name}) \n ";'
// );

// $logger2 = function ($product) {
//     print " logging $product->name \n";
// };

$processor = new ProcessSale();
$processor->registerCallback(Totalizer::warnAmount(8));
$processor->sale(new Product("shoes", 6));
$processor->sale(new Product("coffee", 10));


print_r(get_class_vars('Product'));