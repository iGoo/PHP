<?php
/** http://www.cnblogs.com/lcw/p/3802790.html */
/** http://www.phppan.com/2010/05/php-design-pattern-3-abstract-factory/ */
/** 抽象工厂 */
interface Creator {
    public function factoryMethod();
}

/** 具体工厂角色A */
class ConcreteCreatorA implements Creator {
    public function factoryMethod() {
        return new ConcreteProductA();
    }
}

class ConcreteCreatorB implements Creator {
    public function factoryMethod() {
        return new ConcreteProductB();
    }
}

interface Product {
    public function operation();
}
//这是A产品，会放到ConcreteCreatorA工厂中进行加工生产
class ConcreteProductA implements Product {
    public function operation() {
        echo '我是Ａ产品' .PHP_EOL;
    }
}
//这是B产品，会放到ConcreteCreatorB工厂中进行加工生产
class ConcreteProductB implements Product {
    public function operation() {
        echo '我是B产品' .PHP_EOL;
    }
}

/** 客户端代码 */
class Client {
    public static function main() {
        $creatorA = new ConcreteCreatorA();
        $productA = $creatorA->factoryMethod(); //抽象**产品**的引用
        $productA->operation();

        $creatorB = new ConcreteCreatorB();
        $productB = $creatorB->factoryMethod();
        $productB->operation();
    }
}
Client::main();