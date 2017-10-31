<?php

class Preferences {
    private $props = array();
    private static $instance;
    //定义一个私有的构造方法使类不能够被实例化
    private function __construct() { }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

    public function setProperty($key, $value) {
        $this->props[$key] = $value;
    }
    public function getProperty($key) {
        return $this->props[$key];
    }
}

$p = Preferences::getInstance();
$p->setProperty('name', 'iGoo');
echo $p->getProperty('name');

unset($p);

$p2 = Preferences::getInstance();
echo $p2->getProperty('name');
