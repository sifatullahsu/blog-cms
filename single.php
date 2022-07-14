<?php
include 'includes/template/header.php';

$post   = new Post;


if (isset($_GET['post_type'])) {
    $post_type  = validation($_GET['post_type']);
}

if (isset($_GET['post_slug'])) {
    $post_slug   = validation($_GET['post_slug']);
}

$args = array(
    'post_type'     => $post_type,
    'post_slug'     => $post_slug,
);

$result = $post->getPostBySlug($args);

if (empty($result)) {
    header('Location: 404.php');
}



/* ========= Check If Found Any Dedicated Single Archive For Post Type ========== */
/* == START == */

$file_name = "single-{$post_type}.php";

if (file_exists($file_name)) {
    include $file_name;

    $function = "get__{$post_type}__single_archive";

    /**
     * Calling Post Type Single Archive Function
     * e.g. get__projects__single_archive
     */
    $function($result);

    exit();
}
/* == END == */
/* ========= Check If Found Any Dedicated Single Archive For Post Type ========== */


if ($result) {
}

?>
<div class="container" style="width: 1000px; margin: 0 auto; margin-top: 50px; padding: 50px; background: #f0f0f0;">
    <span><?php echo $result['post_type']; ?></span>
    <h1><?php echo $result['post_title']; ?></h1>
    <p><?php echo $result['post_slug']; ?></p>
    <p><?php echo $result['post_content']; ?></p>
</div>
<?php

include 'includes/template/footer.php';