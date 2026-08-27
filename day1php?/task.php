<?php

// 1- Print "Welcome to php"
echo "Welcome to php";

echo "<hr>";


// 2- Define variables
$x = 5;
$y = "Welcome";
$z = true;


// 3- Display the type of each variable
echo "Type of x: ";
echo gettype($x);

echo "<br>";

echo "Type of y: ";
echo gettype($y);

echo "<br>";

echo "Type of z: ";
echo gettype($z);

echo "<hr>";


// 4- Print numbers from 0 to 15 using 2 methods

// Method 1: for loop
echo "Using for loop:<br>";

for ($i = 0; $i <= 15; $i++) {
    echo $i . " ";
}

echo "<br><br>";

// Method 2: while loop
echo "Using while loop:<br>";

$i = 0;

while ($i <= 15) {
    echo $i . " ";
    $i++;
}

echo "<hr>";


// 5- Define a constant with value "ITI"
define("INSTITUTE", "ITI");

echo "Constant value: " . INSTITUTE;

echo "<hr>";


// 6- Print the gettype of all variables

echo "gettype(x): " . gettype($x) . "<br>";
echo "gettype(y): " . gettype($y) . "<br>";
echo "gettype(z): " . gettype($z) . "<br>";

echo "<hr>";


// 7- Print the isset of all variables

echo "isset(x): ";
var_dump(isset($x));

echo "<br>";

echo "isset(y): ";
var_dump(isset($y));

echo "<br>";

echo "isset(z): ";
var_dump(isset($z));

echo "<hr>";


// 8- Print the empty of all variables

echo "empty(x): ";
var_dump(empty($x));

echo "<br>";

echo "empty(y): ";
var_dump(empty($y));

echo "<br>";

echo "empty(z): ";
var_dump(empty($z));

echo "<hr>";


// 9- Add two numbers m and n
$m = 30;
$n = 25;

$result = $m + $n;

echo "Result = " . $result . "<br>";

if ($result > 50) {
    echo "Accepted";
} else {
    echo "Not accepted";
}

echo "<hr>";


// 10- Display strings and values within a table

$nameA = "Salary of Mr. A is";
$salaryA = 1000;

$nameB = "Salary of Mr. B is";
$salaryB = 1200;

$nameC = "Salary of Mr. C is";
$salaryC = 1400;


echo "<table border='1'>";

echo "<tr>";
echo "<td>$nameA</td>";
echo "<td>$salaryA$</td>";
echo "</tr>";

echo "<tr>";
echo "<td>$nameB</td>";
echo "<td>$salaryB$</td>";
echo "</tr>";

echo "<tr>";
echo "<td>$nameC</td>";
echo "<td>$salaryC$</td>";
echo "</tr>";

echo "</table>";

echo "<hr>";


// Number to String

$num1 = 123;
$num2 = 999;

// Method 1
$string1 = (string)$num1;

echo $string1;

echo "<br>";

// Method 2
$string2 = strval($num2);

echo $string2;

?>