<?php

class Persion {
    public $name;

    function __construct($name) {
        $this->name = $name;
    }
}

interface Module {
    function execute();
}

class FtpModule implements Module {
    function setHost($host) {
        print "FtpModule::setHost() : $host";
    }
    function setUser($user) {
        print "FtpModule::setUser() : $host";
    }
    function execute() {
        //dosomething
    }
}
class PersonModule implements Module {
    function setPersion ($person) {
        print "PersonModule::setPersion() : {$person->name}";
    }
    function execute() {
        //dosomething
    }
}
class ModuleRunner {
    private $configData = [
        "PersonModule" => ['person' => 'bob'],
        'FtpModule' => [
            'host' => 'example.com',
            'user' => 'lepig'
        ]
    ];

    private $modules = [];

    function init() {
        $interface = new ReflectionClass('Module'); //反射Module接口
        foreach ($this->configData as $moduleName => $params) {
            $moduleClass = new ReflectionClass($moduleName);
            if (! $moduleClass->isSubclassOf($interface)) {
                throw new Exception("unknown module type: $moduleName");
            }
            $module = $moduleClass->newInstance(); //根据moduleName创建实例
            foreach ($moduleClass->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
            }
        }
        array_push($this->modules, $module);
    }
}

$test = new ModuleRunner;
$test->init();