<?php
include 'includes/template/header.php';

$user = new User;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $username_email = validation($_POST['username_email']);
    $password       = validation($_POST['password']);
    $password_md5   = md5($password);

    $result = $user->user_auth($username_email, $password_md5);

    var_dump($result);
}


?>
<div class="container">
    <form action="login.php" method="POST">
        <div>
            <label for="username_email">Username or email</label>
            <input type="text" name="username_email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password">
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
    </form>
</div>
<?php

include 'includes/template/footer.php';