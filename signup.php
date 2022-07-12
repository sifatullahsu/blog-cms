<?php
include 'includes/template/header.php';

$user = new User;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $result = $user->user_signup($_POST);
}






?>
<div class="container">
    <?php
    if (isset($result)) {
        echo $result;
    }
    ?>
    <form action="signup.php" method="POST">
        <div>
            <label for="first_name">First name</label>
            <input type="text" name="first_name">
        </div>
        <div>
            <label for="last_name">Last name</label>
            <input type="text" name="last_name">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" name="signup" value="SignUp">
        </div>
    </form>
</div>
<?php

include 'includes/template/footer.php';