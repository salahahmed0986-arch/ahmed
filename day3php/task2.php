<?php

///////////// 

class Account{

    // variables
    private $id;
    private $name;
    private $balance;

    //constructor 
    function __construct($id , $name , $balance)
    {
        $this->id=$id;
        $this->name=$name;
        $this->balance=$balance;
    }

    //getid
    function getid()
    {
        return $this->id;
    }
    
    //getname
    function getname()
    {
        return $this->name;
    }
    function getbalance()
    {
        return $this->balance;
    }
        //add amount to balance
    function credit($amount)
    {
        $this->balance += $amount;
        return $this->balance;
    }

    function debit($amount)
    {
        if($amount<=$this->balance)
            {
                $this->balance-=$amount;
            }
            else{
                echo "Amount exceeded balance " ;
            }
            return $this->balance;
    }

    function transeferto($another , $amount)
    {
        if($amount<=$this->balance)
            {
                $this->balance-=$amount;
                $another->credit($amount);
            }
        else{
            echo "Amount exceeded balance ";
        }
        return $this->balance;
    }
    function tostring()
    {
        return "Account[id={$this->id}, Name={$this->name}, balance={$this->balance}]";
    }
}

// object 
$acc1 = new Account(1, "Salma", 5000);
$acc2 = new Account(2, "Ahmed", 3000);

echo $acc1->toString() . "<br>";
echo $acc2->toString() . "<br><br>";

$acc1->transeferto($acc2, 1000);

echo $acc1->toString() . "<br>";
echo $acc2->toString();



///////////////////////////////// 

class Ball
{
    private $x;
    private $y;
    private $radius;
    private $xDelta;
    private $yDelta;

    function __construct($x, $y, $radius, $xDelta, $yDelta)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->xDelta = $xDelta;
        $this->yDelta = $yDelta;
    }

    // Getters & Setters

    function getX()
    {
        return $this->x;
    }

    function setX($x): void
    {
        $this->x = $x;
    }

    function getY()
    {
        return $this->y;
    }

    function setY($y): void
    {
        $this->y = $y;
    }

    function getRadius()
    {
        return $this->radius;
    }

    function setRadius($radius): void
    {
        $this->radius = $radius;
    }

    function getXDelta()
    {
        return $this->xDelta;
    }

    function setXDelta($xDelta): void
    {
        $this->xDelta = $xDelta;
    }

    function getYDelta()
    {
        return $this->yDelta;
    }

    function setYDelta($yDelta): void
    {
        $this->yDelta = $yDelta;
    }

    // Move one step
    function move(): void
    {
        $this->x += $this->xDelta;
        $this->y += $this->yDelta;
    }

    // Δx = -Δx
    function reflectHorizontal(): void
    {
        $this->xDelta = -$this->xDelta;
    }

    // Δy = -Δy
    function reflectVertical(): void
    {
        $this->yDelta = -$this->yDelta;
    }

    function toString(): string
    {
        return "Ball[({$this->x},{$this->y}),speed=({$this->xDelta},{$this->yDelta})]";
    }
}


// Object
$ball = new Ball(10, 20, 5, 2, 3);

echo "<br> <br >" . $ball->toString() . "<br>";

$ball->move();
echo $ball->toString() . "<br>";

$ball->reflectHorizontal();
$ball->move();
echo $ball->toString() . "<br>";

$ball->reflectVertical();
$ball->move();
echo $ball->toString();



?>