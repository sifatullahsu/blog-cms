<?php
include __DIR__ . '/includes/header.php';
// include_once ABSPATH . 'admin/includes/header.php';


$post   = new Post;


if (isset($_GET['post_type'])) {
    $post_type = validation($_GET['post_type']);
} else {
    $post_type = 'post';
}

if (isset($_GET['page'])) {
    $current_page   = validation(check_int($_GET['page']));
} else {
    $current_page   = 1;
}

$args = array(
    'post_type'     => $post_type,
    'current_page'  => $current_page,
    'limit'         => 10
);

$result = $post->getPosts($args);
$total_page     = $result['pagination']['total_page'];
$current_page   = $result['pagination']['current_page'];

print_r_custom($result);



echo ABSPATH;

?>

<h2 style="margin-bottom: 20px;">Add New Post</h2>


<?php
include __DIR__ . '/includes/footer.php';