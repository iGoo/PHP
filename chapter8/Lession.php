<?php
//课程抽象类
abstract class Lesson {
    protected $duration; //持续时间
    const FIXED = 1;
    const TIMED = 2;
    private $constType; //计费类型

    function __construct($duration, $constType) {
        $this->duration = $duration;
        $this->constType = $constType;
    }

    public function const()
    {
        switch ($this->constType) {
            case self::TIMED:
                return (5 * $this->duration);
                break;
            case self::FIXED:
                return 30;
                break;
            default:
                $this->constType = self::FIXED;
                return 30;
                break;
        }
    }
    public function chargeType()
    {
        switch ($this->constType) {
            case self::TIMED:
                return '按小时计费';
                break;
            case self::FIXED:
                return '按固定课程计费';
                break;
            default:
                $this->constType = self::FIXED; //这个是啥意思
                return '按固定课程计费';
                break;
        }
    }
}

//演讲类继承上面的Lesson抽象类
class Lecture extends Lesson {

}

//讨论类也同样继承Lesson抽象类
class Seminar extends Lesson {

}

$lecture = new Lecture(5, Lesson::FIXED);
print "{$lecture->const()} ({$lecture->chargeType()}) \n";

$seminar = new Seminar(3, Lesson::TIMED);
print "{$seminar->const()} ({$seminar->chargeType()}) \n";