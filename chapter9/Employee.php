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

    public function addEmployee($employeeName) {
        $this->employees[] = new Minion($employeeName);
    }
    public function projectFails() {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
$boss = new NastyBoss();
$boss->addEmployee('曹大鹏');
$boss->addEmployee('樂猪');
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();