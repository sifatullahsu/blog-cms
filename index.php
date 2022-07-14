<?php
include 'includes/template/header.php';

// test
$title = "how-to-track-user-activity-in-wordpress";
$post_new = new Post_New;
$test_reault = $post_new->check_slug('post', $title);

custom_print_r($test_reault);


include 'includes/template/footer.php';