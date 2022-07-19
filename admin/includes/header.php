<?php

include_once __DIR__ . '/../../includes/autoload.php ';

Session::init();

if (Session::get('login') != TRUE) {
    header("Location: __DIR__/../../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/css/style.css?ver<?php echo (rand(10, 1000)) ?>">
    <script src="https://kit.fontawesome.com/757cb348f3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#default'
    });
    </script>
    <title>Admin Section</title>
</head>

<body>
    <main>
        <?php include_once __DIR__ . '/topbar.php'; ?>