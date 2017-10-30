<?php
//雇员
abstract class Employee {
    protected $name;
    function __construct($name) {
        $this->name = $name;
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
$boss->addEmployee(new Minion('曹鹏'));
$boss->addEmployee(new CluedUp('元芳'));
$boss->projectFails();
$boss->projectFails();
