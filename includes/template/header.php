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

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="./includes/assets/css/bootstrap.min.css">

    <!-- Style Link -->
    <link rel="stylesheet" href="./includes/assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">SignUp</a></li>
            <li><a href="archive.php">Archive</a></li>
            <li><a href="admin/index.php">Dashboard</a></li>
            <li><a href="login.php?action=logout">Logout</a></li>
        </nav>

        <form action="search.php" method="GET">
            <div>
                <label for="query">Search</label>
                <input type="text" name="query">
            </div>
            <div>
                <input type="submit" name="search" value="Search">
            </div>
        </form>
    </header>