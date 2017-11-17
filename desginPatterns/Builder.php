<?php
/**
 * 将复杂对象的构建过程抽象出来。分割为不同的构造函数去实现
 */
//抽象构造类
interface Builder {
    public function buildTyre(); //建造一个汽车轮子
    public function buildEngine(); //发动机
    public function buildWheel(); //方向盘

    public function getResult(); //获取最终结果和组装过程进行分离
}

//具体构造类
class CarBuilder implements Builder {
    function __construct(Car $car) {
        $this->car = $car; //这个也可以使用组合模式来注入进来
    }

    public function buildTyre() {
        $this->car->setTyre();
    }
    public function buildEngine() {
        $this->car->setEngin();
    }
    public function buildWheel() {
        $this->car->setWheel();
    }
    public function getResult() {
        return $this->car; //结果应该是有建造者返回，而不是指挥者
    }
}

//指挥者
class Director {
    private $builder;
    function __construct(Builder $builder) {
        $this->builder = $builder;
    }
    //进行组装
    public function construct() {
        $this->builder->buildTyre();
        $this->builder->buildEngine();
        $this->builder->buildWheel();
        // return $this->builder; //
    }
}
/****************************************************/
abstract class Car {
    abstract function setTyre();
    abstract function setEngin();
    abstract function setWheel();
}
/**
 * 具体的产品类(通过具体构造类产生出来)
 * 奔驰汽车
 */
class Benz extends Car{
    public function setTyre() {
        $this->tyre = '米其林';
        echo '轮胎组装成功' . PHP_EOL;
    }
    public function setEngin() {
        $this->engin = '日本丰田';
        echo '发送机组装成功' . PHP_EOL;
    }
    public function setWheel() {
        $this->wheel = '奥赛斯';
        echo '方向盘组装成功' . PHP_EOL;
    }
}

$carbuilder = new CarBuilder(new Benz());
$director = new Director($carbuilder);
$director->construct();
$product = $carbuilder->getResult();

print_r($product);