<?php
include __DIR__ . '/includes/header.php';

if (Session::get('login') == TRUE) {
    $welcomeMsg = Session::get('user_firstname');

    echo $username =  "Username: " . Session::get('user_login') . " (" . Session::get('user_id') . ")";
}



?>


<h1>Hey <?php echo $welcomeMsg; ?>,</h1>






<?php
include __DIR__ . '/includes/footer.php';