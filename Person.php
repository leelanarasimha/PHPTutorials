<?php
class Person {

    private $name;
    private $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age * 365;
    }

    public function setAge($age) {
        if ($age < 18) {
            throw new Exception('Age should not be less than 18');
        }
        $this->age = $age;
    }
}

$leela = new Person('Leela');
$leela->setAge(25);




$harika = new Person('Harika');
$harika->setAge(19);
echo $harika->getAge();

$aruna = new Person('Aruna');
$aruna->setAge(25);


