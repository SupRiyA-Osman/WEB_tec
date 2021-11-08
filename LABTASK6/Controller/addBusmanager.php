<?php

require_once 'Model/Model.php';

session_start();

$msg = $nameErr = $emailErr  = $passErr = $conPassErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $nameErr = "*Please enter your full name";
        $valid = 0;
    } else if (str_word_count($_POST["name"]) < 5) {
        $nameErr = "*Full name must be at least 5 words";
        $valid = 0;
       }

    if (empty($_POST["email"])) {
        $emailErr = "*Please enter your email address";
        $valid = 0;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "*Please enter a valid email address";
        $valid = 0;
    }

    if (empty($_POST["password"])) {
        $passErr = "*Please enter a password";
        $valid = 0;
    } else if (strlen($_POST["password"]) < 6) {
        $passErr = "*Password must not be less than six (6) characters";
        $valid = 0;
    } else if (!preg_match('/[A-Z]+/', $_POST["password"])) {
        $passErr = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        $valid = 0;
    }
    else if (!preg_match('/[0-9]+/', $_POST["password"])) {
        $passErr = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        $valid = 0;
    }

    if (empty($_POST["confirmPassword"])) {
        $conPassErr = "*Please enter confirm password";
        $valid = 0;
    } else if ($_POST["password"] != $_POST["confirmPassword"]) {
        $conPassErr = "*Password and confirm password does not match";
        $valid = 0;
    }


    if ($valid) {
        $_SESSION['name'] = test_input($_POST["name"]);
        $_SESSION['email'] = test_input($_POST["email"]);
        $_SESSION['password'] = test_input($_POST["password"]);

        if (file_exists('BusManager.json')) {
            $msg = addCustomer($_POST);
            header("location:Public_Home.php");
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
    } else {
        $msg = '<span class="red">Registration failed</span>';
    }
}
