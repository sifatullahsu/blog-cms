<?php

include_once __DIR__ . '/../../includes/autoload.php ';

Session::init();

if (Session::get('login') != TRUE) {
    header("Location: __DIR__/../../login.php");
}



?>

<!-- Admin Area Start -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section</title>

    <!-- Boostrap CSS Link -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- Style CSS Link -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Fontawesome Script -->
    <script src="https://kit.fontawesome.com/757cb348f3.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- Include Topbar -->
    <?php include_once __DIR__ . "/topbar.php"; ?>

    <main class="d-flex">


        <!-- Include Admin Sidebar -->
        <?php include_once __DIR__ . "/sidebar.php"; ?>


        <!-- Admin Body Start -->
        <section class="bg-light p-4" style="flex: auto;">