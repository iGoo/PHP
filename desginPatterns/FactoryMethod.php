<?php
/** http://www.cnblogs.com/lcw/p/3802790.html */
/** http://www.phppan.com/2010/05/php-design-pattern-3-abstract-factory/ */
/** 抽象工厂 */
interface Creator {
    public function create();
}

/** 具体工厂角色A (美的)*/
class ConcreteCreatorA implements Creator {
    public function create() {
        // return new ConcreteProductA();
        return new Bridge();
    }
}
/** 具体工厂角色B (格力)*/
class ConcreteCreatorB implements Creator {
    public function create() {
        // return new ConcreteProductB();
        return new Tv();
    }
}

/***************************************************/
interface Product {
    public function operation();
}
//这是A产品，会放到ConcreteCreatorA工厂中进行加工生产
class Bridge implements Product {
    public function operation() {
        echo '我是Bridge产品' .PHP_EOL;
    }
}
//这是B产品，会放到ConcreteCreatorB工厂中进行加工生产
class Tv implements Product {
    public function operation() {
        echo '我是TV产品' .PHP_EOL;
    }
}

/** 客户端代码 */
class Client {
    public static function main() {
        $creatorA = new ConcreteCreatorA();
        $productA = $creatorA->create(); //抽象**产品**的引用
        $productA->operation();

        $creatorB = new ConcreteCreatorB();
        $productB = $creatorB->create();
        $productB->operation();
    }
}
Client::main();