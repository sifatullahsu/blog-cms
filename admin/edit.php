<?php
include __DIR__ . '/includes/header.php';


if (Session::get('login') == TRUE) {
    echo "User: " .  Session::get('user_id') . " - " . Session::get('user_login');
}


echo "<br>";
echo basename(__FILE__);








include __DIR__ . '/includes/footer.php';