<?php
//雇员
abstract class Employee {
    protected $name;
    private static $types = ['Minion', 'CluedUp'];
    function __construct($name) {
        $this->name = $name;
    }
    /** 委托生成对象 */
    public static function recruit($name) {
        $i = rand(1, count(self::$types)) - 1;
        $class = self::$types[$i];
        return new $class($name);
    }
    abstract function fire();
}
//受压迫的员工
class Minion extends Employee {
    public function fire() {
        print "{$this->name}: 我会清理我的桌子 \n";
    }
}
//苛刻的Boss
class NastyBoss {
    protected $class;
    private $employees = [];



    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee; //传入的Employee子类
    }
    public function projectFails() {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
class CluedUp extends Employee {
    public function fire() {
        print "{$this->name}: 我会打电话给我的律师 \n";
    }
}

$boss = new NastyBoss();
$boss->addEmployee(Employee::recruit('曹鹏'));
$boss->addEmployee(Employee::recruit('YF'));
$boss->projectFails();
$boss->projectFails();



/**
 * 在Employee中增加了一个子类实例生成器recruit来统一返回Employee子类
 * 
 */