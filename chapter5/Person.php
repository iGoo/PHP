<?php namespace My;

class Persion {
    public $name = 'lepig';
    private static $age = 27;

    protected $email = 'lepig@qq.com';


    function getName() {
        echo get_class();
        return $this->name;
    }
    static function getAge() {
        return self::$age;
    }
}

//print_r(get_class_vars('My\Persion'));
//print_r(get_class_methods('My\Persion'));

//print_r(get_object_vars(new Persion)); //属性

//print_r(get_class(new Persion)); //包括namespace名称
// print_r(\My\Persion::class);
// 
(new Persion)->getName();