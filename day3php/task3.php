<?php

//////////////////////

class Author
{
    private $name;
    private $email;
    private $gender;

    function __construct($name, $email, $gender)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    function getName()
    {
        return $this->name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email): void
    {
        $this->email = $email;
    }

    function getGender()
    {
        return $this->gender;
    }

    function toString()
    {
        return "Author[name={$this->name},email={$this->email},gender={$this->gender}]";
    }
}


// Object Author

$author = new Author(
    "Salma Sallam",
    "salma@gmail.com",
    "f"
);

echo $author->toString() . "<br>";
echo "Name: " . $author->getName() . "<br>";
echo "Email: " . $author->getEmail() . "<br>";
echo "Gender: " . $author->getGender() . "<br>";

$author->setEmail("salma_new@gmail.com");

echo "Updated Email: " . $author->getEmail() . "<br><br>";


// ////////////////////

class Book
{
    private $name;
    private $author;
    private $price;
    private $qty;

    function __construct($name, $author, $price, $qty = 0)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->qty = $qty;
    }

    function getName()
    {
        return $this->name;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($price): void
    {
        $this->price = $price;
    }

    function getQty()
    {
        return $this->qty;
    }

    function setQty($qty): void
    {
        $this->qty = $qty;
    }

    function toString()
    {
        return "Book[name={$this->name},"
            . $this->author->toString()
            . ",price={$this->price},qty={$this->qty}]";
    }
}


// Object Book

$book = new Book(
    "PHP OOP",
    $author,
    250.50,
    10
);

echo $book->toString();


//////////////////////////

class Cylinder extends Circle {
    private $height = 1.0;

    
    public function __construct($radius = 1.0, $height = 1.0, $color = "red") {
        parent::__construct($radius, $color);
        $this->height = $height;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    
    public function getVolume() {
        return $this->getArea() * $this->height;
    }

    public function toString() {
        return "Cylinder[subclass of " . parent::toString() . ", height=" . $this->height . "]";
    }
}

?>