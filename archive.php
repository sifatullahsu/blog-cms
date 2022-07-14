<?php
include 'includes/template/header.php';

$post   = new Post;


if (isset($_GET['post_type'])) {
    $post_type  = validation($_GET['post_type']);
} else {
    $post_type  = 'post';
}

if (isset($_GET['page'])) {
    $current_page   = (int)validation($_GET['page']);
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
        <a href="single.php/?post_slug=<?php echo $data['post_slug']; ?>">Read More..</a>
    </div>
    <?php
        }
    }
    ?>

    <div class="pagination">
        <ul>
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                $active = ($i == $current_page) ? 'active' : '';
                echo "<li class='$active'><a href='archive.php/?post_type=$post_type&page=$i'>$i</a></li>";
            }
            ?>
        </ul>
    </div>
</div>
<?php

include 'includes/template/footer.php';


/* 

$pagination     = $post->pagination($current_page, 3, $post_type);

$total_record   = $pagination['total_record'];
$current_page   = $pagination['current_page'];
$offset         = $pagination['offset'];
$limit          = $pagination['limit'];

$result         = $post->getPosts($post_type, $offset, $limit);

*/




/* $limit          = 3;
$total_record   = $post->postsCount($post_type);

if ($total_record) {
    echo $total_record = ceil($total_record / $limit); // Output 4
}

if (isset($_GET['page'])) {
    $page_num   = (int)validation($_GET['page']);
    $offset     = ($page_num - 1) * $limit;
} else {
    $page_num   = 1;
    $offset     = 0;
} */