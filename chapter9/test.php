<?php

class Member {
    protected $name;
    protected $age;
    protected $error;

    function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function login1($id) {
        $info = M('users')->where('id', $id)->find();
        if (empty($info)) {
            return false;
        } elseif ($info['status'] == 0) {
            return false;
        }

        return true;
    }
    public function login2() {
        $info = M('users')->where('id', $id)->find();
        if (empty($info)) {
            return ['code' => 10, 'msg' => '用户不存在'];
        } elseif ($info['status'] == 0) {
            return ['code' => 20, 'msg' => '用户已被禁用'];
        }
        return true;
    }

    public function login3() {
        if (empty($info)) {
            $this->error = '用户不存在';
            return false;
        } elseif ($info['status'] == 0) {
            $this->error = '用户已被禁用';
            return false;
        }
    }

    public function getError() {
        return $this->error;
    }
    public function __get($property) {
        $method = 'get' . ucfirst($property);
        try {
            // if (! method_exists($this, $method)) {
            //     throw new Exception('请检测您的调用属性');
            // }
            if (! is_callable([$this, $method])) {
               throw new Exception('is_callable检测不可调用'); 
            }
            return $this->$method();
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }

    }
}

$mermber = new Member('iGoo', 27);
$mermber->login3('22');
// $error = $mermber->getError();
$error = $mermber->errors;

var_dump($error);