<?php
include 'includes/template/header.php';



// test
$title = "how-to-track-user-activity-in-wordpress";
$post_new = new Post_New;
$test_reault = $post_new->check_slug('post', $title);

print_r_custom($test_reault);


include 'includes/template/footer.php';