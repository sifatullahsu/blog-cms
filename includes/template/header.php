<?php
include "./includes/autoload.php";

Session::init();


if (Session::get('login') == TRUE) {
    echo Session::get('user_id') . " - " . Session::get('user_login');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog CMS</title>
</head>

<body>
    <header>
        <nav>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">SignUp</a></li>
            <li><a href="archive.php">Archive</a></li>
        </nav>
    </header>