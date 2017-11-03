<?php
/**
 * 单例模式示例
 */
class Singleton {
    private static $_instance;
    private function __construct() {}

    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    // 防止实例被克隆
    public function __clone() {
        die('Clone is not allow.' . E_USER_ERROR);
    }
}


$o1 = Singleton::getInstance();
$o2 = Singleton::getInstance();
$o3 = Singleton::getInstance();
var_dump($o1, $o2, $o3);
$o4 = clone $o3;
var_dump($o4);
