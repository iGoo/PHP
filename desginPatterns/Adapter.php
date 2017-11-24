<?php
/**
 * 适配器模式
 * 目标抽象类 (客户端调用此类中的方法)
 * 适配器类 (内部转换的)
 * 适配者类 (mysql、mysqli、postgresql)
 * 客户端类
 */

interface DbInterface {
    public function connect($host, $user, $password, $db, $port);
    public function query($sql);
    public function close();
}

class DbMySQLi implements DbInterface {
    function __construct($host, $user, $password, $db, $port = 3306) {
        $this->db = $this->connect(
            $host, $user, $password, $db, $port
        );
    }
    public function connect($host, $user, $password, $db, $port) {
        $mysqli = $this->dbhandler = new mysqli($host, $user, $password, $db, $port);
        if ($mysqli->connect_error) {
            printf ( "Connect failed: %s\n" ,  $mysqli->connect_error );
            exit();
        }
        return $mysqli;
    }
    public function query($sql) {
        return $this->db->query($sql);
    }
    public function close() {
        mysqli_close($this->db);
    }
    function __destruct() {
        $this->close();
    }
}
class DbPostgresql implements DbInterface {
    public function connect($host, $user, $password, $db, $port) {

    }
    public function query($sql) {

    }
    public function close() {

    }
}

class Clinet {
    public $host = "127.0.0.1";
    public $user = "root";
    public $password = "root";
    public $db = "we7";

    
    public function getResult() {
        $mysqli = new DbMySQLi($this->host, $this->user, $this->password, $this->db);
        return $mysqli->query("SELECT * FROM ims_users limit 3")->fetch_all();
    }
}

$c = new Clinet;
print_r($c->getResult());