<?php
abstract class Person {
    private $name;
    private $address;

    public function __construct($name, $address) {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    abstract public function toString();
}


class Student extends Person {
    private $program;
    private $year;
    private $fee;

    public function __construct($name, $address, $program, $year, $fee) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function getProgram() {
        return $this->program;
    }

    public function setProgram($program) {
        $this->program = $program;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getFee() {
        return $this->fee;
    }

    public function setFee($fee) {
        $this->fee = $fee;
    }

    public function toString() {
        return "Student[Person[name=" . $this->getName() . ", address=" . $this->getAddress() . "], program=" . $this->program . ", year=" . $this->year . ", fee=" . $this->fee . "]";
    }
}



class Staff extends Person {
    private $school;
    private $pay;

    public function __construct($name, $address, $school, $pay) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function getSchool() {
        return $this->school;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function getPay() {
        return $this->pay;
    }

    public function setPay($pay) {
        $this->pay = $pay;
    }

    public function toString() {
        return "Staff[Person[name=" . $this->getName() . ", address=" . $this->getAddress() . "], school=" . $this->school . ", pay=" . $this->pay . "]";
    }
}



abstract class Shape {
    protected $color = "red";
    protected $filled = true;

    public function __construct($color = "red", $filled = true) {
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function isFilled() {
        return $this->filled;
    }

    public function setFilled($filled) {
        $this->filled = $filled;
    }

    abstract public function getArea();
    abstract public function getPerimeter();

    public function toString() {
        $filledStr = $this->filled ? "true" : "false";
        return "Shape[color=" . $this->color . ", filled=" . $filledStr . "]";
    }
}


class Circle extends Shape {
    protected $radius = 1.0;

    public function __construct($radius = 1.0, $color = "red", $filled = true) {
        parent::__construct($color, $filled);
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * $this->radius * $this->radius;
    }

    public function getPerimeter() {
        return 2 * pi() * $this->radius;
    }

    public function toString() {
        return "Circle[" . parent::toString() . ", radius=" . $this->radius . "]";
    }
}