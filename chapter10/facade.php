<?php

function getProductFileLines($file) {
    return file($file);
}

function getProductObjectFromId($id, $productname) {
    return new Product($id, $productname);
}

function getNameFromLine($line) {
    if (preg_match('/.*-(.*)\s\d+/', $line, $array)) {
        return str_replace('-', ' ', $array[1]);
    }
}
function getIDFromLine($line) {
    if (preg_match('/^(\d{1,3})-/', $line, $array)) {
        return $array[1];
    }
    return -1;
}
class Product {
    public $id;
    public $name;
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

$lines = getProductFileLines('test.txt');
$objects = array();
foreach ($lines as $line) {
    $id = getIDFromLine($line);
    $name = getNameFromLine($line);
    $objects[$id] = getProductObjectFromId($id, $name);
}
// var_dump($objects);

// 改造后的示例
class ProductFacade {
    private $products = array();
    function __construct($file) {
        $this->file = $file;
        $this->compile();
    }
    private function compile() {
        $lines = getProductFileLines($this->file);
        foreach ($lines as $line) {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $this->products[$id] = getProductObjectFromId($id, $name);
        }
    }
    public function getProducts() {
        return $this->products;
    }
    public function getProduct($id) {
        return $this->products[$id];
    }
}

$facade = new ProductFacade('test.txt');
$ret = $facade->getProducts();
var_dump($ret);