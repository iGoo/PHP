<?php
/**
 * 面向对象设计和过程式编程
 */
abstract class ParamHandler {
    protected $source;
    protected $params = [];

    function __construct($source) {
        $this->source = $source;
    }

    public function addParam($key, $value) {
        $this->params[$key] = $value;
    }
    public function getAllParams() {
        return $this->params;
    }
    public static function getInstance($filename) {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);
    }
    public abstract function write();
    public abstract function read();
}

/**
 * 子类继承抽象类以后不需要判断文件类型
 * 只要直接调用write和read方法进行操作就可以了
 */
class TextParamHandler extends ParamHandler {
    public function write() {
        //写入逻辑 将$params数组中的数据写入文件
    }
    public function read() {
        //读取后赋值给$params数组后返回
        return $this->params;
    }
}
$test = TextParamHandler::getInstance('./params.xml');
$test->addParam("key1", "value1");
$test->addParam("key2", "value2");
$test->write(); //有些像数据库的入库操作

$test->read(); //从文件读取键值数据
