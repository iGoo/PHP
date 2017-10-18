<?php
class Person {
    public $name = '1';
    private $age = '2';

    public function getName()
    {
        return $this->name;
    }

    public function __clone() {
        $this->name = 'New Name fro clone';
    }
}

$person = new Person;
$p = new Person;
$p1 = clone $person;
print_r($person);
print_r($p);
print_r($p1);












exit;
/*
class Person
{
    public function __construct(PersonWriter $pw)
    {
        $this->writer = $pw;
    }
    public function __call($method, $args)
    {
        if (method_exists($this->writer, $method)) {
            echo 'calling' . PHP_EOL;
            return $this->writer->$method($this);
        }
    }

    public function getName() {
        return 'lePIg';
    }

    
}

class PersonWriter
{
    public function writeName(Person $p)
    {
        print $p->getName();
    }
    
}


$p = new Person(new PersonWriter);
echo $p->writeName();
*/