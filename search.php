<?php
include 'includes/template/header.php';

$post   = new Post;


if (isset($_GET['query'])) {
    $query = validation($_GET['query']);
} else {
    $query = "";
}

if (isset($_GET['page'])) {
    $current_page   = validation(check_int($_GET['page']));
} else {
    $current_page   = 1;
}


$result = '';
if ($query != '') {

    $args = array(
        'post_type'     => 'none',
        'current_page'  => $current_page,
        'limit'         => 3,
        'query'         => $query
    );

    $result = $post->getPosts($args);

    $total_page     = $result['pagination']['total_page'];
    $current_page   = $result['pagination']['current_page'];
    $post_type      = $result['pagination']['post_type'];

    print_r_custom($result);
}


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
        ?>
    <div class="pagination">
        <ul>
            <?php
                for ($i = 1; $i <= $total_page; $i++) {
                    $active = ($i == $current_page) ? 'active' : '';
                    echo "<li class='$active'><a href='archive.php?post_type=$post_type&page=$i'>$i</a></li>";
                }
                ?>
        </ul>
    </div>
    <?php
    } else {
        echo "<h1>Result Not Found..</h1>";
    }


    ?>
</div>
<?php


include 'includes/template/footer.php';