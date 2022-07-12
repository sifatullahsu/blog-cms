<?php
include 'includes/template/header.php';

$user = new User;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $result = $user->user_auth($_POST);
}


?>
<div class="container">
    <?php
    if (isset($result)) {
        echo $result;
    }
    ?>
    <form action="login.php" method="POST">
        <div>
            <label for="username_email">Username or email</label>
            <input type="text" name="username_email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
    </form>
</div>
<?php

include 'includes/template/footer.php';