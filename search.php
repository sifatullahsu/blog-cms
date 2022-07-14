<?php
include 'includes/template/header.php';

$post   = new Post;


if (isset($_GET['query'])) {
    $query = validation($_GET['query']);
} else {
    $query = "";
}


$args = array(
    'post_type'     => 'none',
    'current_page'  => 2,
    'limit'         => 3,
    'query'         => $query
);

$result = $post->getPosts($args);
$total_page     = $result['pagination']['total_page'];
$current_page   = $result['pagination']['current_page'];


print_r_custom($result);


include 'includes/template/footer.php';