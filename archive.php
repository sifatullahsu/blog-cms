<?php
include 'includes/template/header.php';

$post   = new Post;


if (isset($_GET['post_type'])) {
    $post_type  = validation($_GET['post_type']);
} else {
    $post_type  = 'post';
}

if (isset($_GET['page'])) {
    $current_page   = validation(check_int($_GET['page']));
} else {
    $current_page   = 1;
}

$args = array(
    'post_type'     => $post_type,
    'current_page'  => $current_page,
    'limit'         => 3
);

$result = $post->getPosts($args);
$total_page     = $result['pagination']['total_page'];
$current_page   = $result['pagination']['current_page'];



/* ========= Check If Found Any Dedicated Archive Page For Post Type ========== */
/* == START == */

$file_name = "archive-{$post_type}.php";

if (file_exists($file_name)) {
    include $file_name;

    $function = "get__{$post_type}__archive";

    /**
     * Calling Post Type Archive Function
     * e.g. get__projects__archive
     */
    $function($result);

    exit();
}
/* == END == */
/* ========= Check If Found Any Dedicated Archive Page For Post Type ========== */



?>
<div class="container" style="width: 1000px; margin: 0 auto; padding: 50px;">
    <?php
    if ($result) {
        foreach ($result['data'] as $data) {
    ?>
    <div class="box" style="margin-bottom: 20px; background: #f0f0f0; padding: 20px;">
        <span><?php echo $data['post_type']; ?></span>
        <h2><?php echo $data['post_title']; ?></h2>
        <p><?php echo $data['post_excerpt']; ?></p>
        <a href="single.php?post_type=<?php echo $data['post_type']; ?>&post_slug=<?php echo $data['post_slug']; ?>">Read
            More..</a>
    </div>
    <?php
        }
    }

    get_pagination($result);

    ?>
</div>
<?php

include 'includes/template/footer.php';