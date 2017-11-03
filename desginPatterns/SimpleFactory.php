<?php
/**
 * 简单工厂模式(静态工厂模式)
 */
//生产产品的工厂
class SimpleFactory
{
    public static function getInstance($product) {
        switch (strtolower($product)) {
            case 'fridge':
                return new $product;
            case 'tv':
                return new $product;
            default:
                return '没有匹配的商品类,无法实例化';
                break;
        }
    }
}

//商品接口
interface IProduct {
    public function run();
}
//具体的冰箱角色
class Fridge implements IProduct{
    public function run() {
        echo "冰箱开始制冷 \n";
    }
}
//具体的空调角色
class Tv implements IProduct{
    public function run() {
        echo "电视机开始播放电影 \n";
    }
}

$fridge = SimpleFactory::getInstance('Fridge');
$tv     = SimpleFactory::getInstance('tv');
$other  = SimpleFactory::getInstance('other');
var_dump($fridge, $tv, $other);