<?php

session_start();

if (!isset($_SESSION["usersData"])) {
    $_SESSION["usersData"] = [];
}


// ! REGISTER  Structure

if (isset($_POST["btn-register"])) {

    $userName = $_POST["name"];
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];


    if ($userPassword != $confirmPassword) {

        echo "Passwords do not match";
        exit;
    }


    $user = [
        "userName" => $userName,
        "userEmail" => $userEmail,
        "userPassword" => $userPassword
    ];


    array_push($_SESSION["usersData"], $user);


   header("Location: ../Day1/index.php?message=Registration Successfully");
    exit;
}


// ! Login Structure

if (isset($_POST["btn-login"])) {

    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];

    $found = false;


    foreach ($_SESSION["usersData"] as $user) {

        if (
            $user["userEmail"] == $userEmail &&
            $user["userPassword"] == $userPassword
        ) {

            $found = true;

            $_SESSION["login"] = true;

            header("Location: allUsersdata.php");
            exit;
        }
    }


    if (!$found) {

        header("Location: ../Day1/index.php?error_message=Check your email or password");
        exit;
    }
}

?>