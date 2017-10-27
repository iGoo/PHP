<?php

abstract class Lesson {
    private $duration;
    private $costStrategy;
    function __construct($duration, CostStrategy $costStrategy) {
        $this->duration = $duration;
        $this->costStrategy = $costStrategy;
    }
    public function cost() {
        return $this->costStrategy->cost($this);
    }
    public function chargeType() {
        return $this->costStrategy->chargeType();
    }
    public function getDuration() {
        return $this->duration;
    }
}
class Lecture extends Lesson {

}
class Seminar extends Lesson {

}

abstract class CostStrategy {
    abstract function cost(Lesson $lesson);
    abstract function chargeType();
}
class TimedCostStrategy extends CostStrategy {
    function cost(Lesson $lesson) {
        //传this到cost方法是为了演示调用Lesson中的方法
        return (5 * $lesson->getDuration());
    }

    function chargeType() {
        return '按小时计费';
    }   
}
class FixedCostStrategy extends CostStrategy {
    function cost(Lesson $lesson) {
        return 30;
    }
    function chargeType() {
        return '固定课程计费';
    }
}

$lessons[] = new Lecture(4, new TimedCostStrategy);
$lessons[] = new Seminar(4, new FixedCostStrategy);
foreach ($lessons as $lesson) {
    print "lesson charge {$lesson->cost()} \n";
    print "Charge Type: {$lesson->chargeType()} \n";
}